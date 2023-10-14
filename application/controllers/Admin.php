<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Admin extends CI_Controller
{

  // untuk meload model & helper kalian
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_model');
    // $this->load->helper('my_helper');
    // $this->load->library('upload');
    // fungsi validasi dibawah untuk ngecek ketika masuk ke halaman admin , data sdh true atau blm
    // kalo blm true maka akan kembali ke page auth
    if ($this->session->userdata('logged_in') != true || $this->session->userdata('role') != 'admin') {
      redirect(base_url() . 'auth');
    }
  }
  public function dasboard()
  {
    $data['karya'] = $this->m_model->get_data('user')->num_rows();
    $data['absen'] = $this->m_model->get_history('absensi', $this->session->userdata('id'))->result();
    $data['total_absen'] = $this->m_model->get_absen('absensi', $this->session->userdata('id'))->num_rows();
    $data['total_izin'] = $this->m_model->get_izin('absensi', $this->session->userdata('id'))->num_rows();
    $data['user'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
    $data['karyawan'] = $this->m_model->get_data('user')->result();
    $this->load->view('admin/dasboard', $data);
  }
  public function rekapan()
  {
    $data['user'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
    $data['karyawan'] = $this->m_model->getData();
    $this->load->view('admin/rekapan', $data);
  }
  // export user
  public function export()
  {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $style_col = [
      'font' => ['bold' => true],
      'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\style\Alignment::VERTICAL_CENTER
      ],
      'borders' => [
        'top' => ['borderstyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
        'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
        'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
        'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN]
      ]
    ];

    $style_row = [
      'alignment' => [
        'vertical' => \PhpOffice\PhpSpreadsheet\style\Alignment::VERTICAL_CENTER
      ],
      'borders' => [
        'top' => ['borderstyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
        'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
        'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
        'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN]
      ]
    ];

    $sheet->setCellValue('A1', "DATA KARYAWAN");
    $sheet->mergeCells('A1:E1');
    $sheet->getStyle('A1')->getFont()->setBold(true);

    $sheet->setCellValue('A3', "ID");
    $sheet->setCellValue('B3', "EMAIL");
    $sheet->setCellValue('C3', "USERNAME");
    $sheet->setCellValue('D3', "NAMA DEPAN");
    $sheet->setCellValue('E3', "NAMA BELAKANG");

    $sheet->getStyle('A3')->applyFromArray($style_col);
    $sheet->getStyle('B3')->applyFromArray($style_col);
    $sheet->getStyle('C3')->applyFromArray($style_col);
    $sheet->getStyle('D3')->applyFromArray($style_col);
    $sheet->getStyle('E3')->applyFromArray($style_col);

    $data_karyawan = $this->m_model->get_data('user')->result();

    $no = 1;
    $numrow = 4;
    foreach ($data_karyawan as $data) {
      $sheet->setCellValue('A' . $numrow, $data->id);
      $sheet->setCellValue('B' . $numrow, $data->email);
      $sheet->setCellValue('C' . $numrow, $data->username);
      $sheet->setCellValue('D' . $numrow, $data->nama_depan);
      $sheet->setCellValue('E' . $numrow, $data->nama_belakang);

      $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
      $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
      $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
      $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
      $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);

      $no++;
      $numrow++;
    }

    $sheet->getColumnDimension('A')->setWidth(5);
    $sheet->getColumnDimension('B')->setWidth(25);
    $sheet->getColumnDimension('C')->setWidth(25);
    $sheet->getColumnDimension('D')->setWidth(20);
    $sheet->getColumnDimension('E')->setWidth(30);

    $sheet->getDefaultRowDimension()->setRowHeight(-1);

    $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

    $sheet->setTitle("LAPORAN DATA KARYAWAN");
    header('Content-Type: aplication/vnd.openxmlformants-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="KARYAWAN.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
  }

  // export rekapan absensi
  public function export_rekapan()
  {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $style_col = [
      'font' => ['bold' => true],
      'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\style\Alignment::VERTICAL_CENTER
      ],
      'borders' => [
        'top' => ['borderstyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
        'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
        'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
        'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN]
      ]
    ];

    $style_row = [
      'alignment' => [
        'vertical' => \PhpOffice\PhpSpreadsheet\style\Alignment::VERTICAL_CENTER
      ],
      'borders' => [
        'top' => ['borderstyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
        'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
        'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
        'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN]
      ]
    ];

    $sheet->setCellValue('A1', "DATA KARYAWAN");
    $sheet->mergeCells('A1:E1');
    $sheet->getStyle('A1')->getFont()->setBold(true);

    $sheet->setCellValue('A3', "ID");
    $sheet->setCellValue('B3', "NAMA KARYAWAN");
    $sheet->setCellValue('C3', "KEGIATAN");
    $sheet->setCellValue('D3', "DATE");
    $sheet->setCellValue('E3', "JAM MASUK");
    $sheet->setCellValue('F3', "JAM PULANG");
    $sheet->setCellValue('G3', "KETERANGAN IZIN");
    $sheet->setCellValue('H3', "STATUS");

    $sheet->getStyle('A3')->applyFromArray($style_col);
    $sheet->getStyle('B3')->applyFromArray($style_col);
    $sheet->getStyle('C3')->applyFromArray($style_col);
    $sheet->getStyle('D3')->applyFromArray($style_col);
    $sheet->getStyle('E3')->applyFromArray($style_col);
    $sheet->getStyle('F3')->applyFromArray($style_col);
    $sheet->getStyle('G3')->applyFromArray($style_col);
    $sheet->getStyle('H3')->applyFromArray($style_col);

    $data_karyawan = $this->m_model->getData();

    $no = 1;
    $numrow = 4;
    foreach ($data_karyawan as $data) {
      $sheet->setCellValue('A' . $numrow, $data->id);
      $sheet->setCellValue('B' . $numrow, $data->nama_depan . ' ' . $data->nama_belakang);
      $sheet->setCellValue('C' . $numrow, $data->kegiatan);
      $sheet->setCellValue('D' . $numrow, $data->date);
      $sheet->setCellValue('E' . $numrow, $data->jam_masuk);
      $sheet->setCellValue('F' . $numrow, $data->jam_pulang);
      $sheet->setCellValue('G' . $numrow, $data->keterangan_izin);
      $sheet->setCellValue('H' . $numrow, $data->status);

      $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
      $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
      $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
      $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
      $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);
      $sheet->getStyle('F' . $numrow)->applyFromArray($style_row);

      $no++;
      $numrow++;
    }

    $sheet->getColumnDimension('A')->setWidth(5);
    $sheet->getColumnDimension('B')->setWidth(25);
    $sheet->getColumnDimension('C')->setWidth(25);
    $sheet->getColumnDimension('D')->setWidth(20);
    $sheet->getColumnDimension('E')->setWidth(30);

    $sheet->getDefaultRowDimension()->setRowHeight(-1);

    $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

    $sheet->setTitle("LAPORAN DATA REKAPAN");
    header('Content-Type: aplication/vnd.openxmlformants-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="REKAPAN.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
  }
  public function hapus_karyawan($id)
  {
    $this->m_model->delete('absensi', 'id', $id);
    redirect(base_url('karyawan/history_absen'));
  }
  public function rekap_mingguan()
  {
    $data['user'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
    $data['absensi'] = $this->m_model->getAbsensiLast7Days();
    $this->load->view('admin/rekap_mingguan', $data);
  }
  public function rekap_bulanan()
  {
    $data['user'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
    $bulan = $this->input->post('bulan');
    $data['absensi'] = $this->m_model->getAbsensiLast30Days($bulan);
    $this->load->view('admin/rekap_bulanan', $data);
  }
}
