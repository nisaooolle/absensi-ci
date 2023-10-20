<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller
{

  function __construct()


  
  {
    parent::__construct();
    // m_model untuk menyambungkan ke file m_model
    $this->load->model('m_model');
    // untuk menambahkan foto ke folder images admin
    $this->load->library('upload');
    // fungsi validasi dibawah untuk ngecek ketika masuk ke halaman admin , data sdh true atau blm
    // kalo blm true maka akan kembali ke page auth
    if ($this->session->userdata('logged_in') != true || $this->session->userdata('role') != 'admin') {
      redirect(base_url() . 'auth');
    }
  }
  public function dasboard()
  {
    //menghitung data user
    $data['karya'] = $this->m_model->get_data('user')->num_rows(); 
    // get data by id sesuai login admin
    $data['user'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
    $data['karyawan'] = $this->m_model->get_data('user')->result();
    $this->load->view('admin/dasboard', $data);
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
    // memanggil data dri database
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
  public function export_rekap_mingguan()
  {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $end_date = date('Y-m-d');
    $start_date = date('Y-m-d', strtotime('-7 days', strtotime($end_date)));
    $end_date = date('W', strtotime($end_date));
    $start_date = date('W', strtotime($start_date));
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

    $sheet->getStyle('A3')->applyFromArray($style_col);
    $sheet->getStyle('B3')->applyFromArray($style_col);
    $sheet->getStyle('C3')->applyFromArray($style_col);
    $sheet->getStyle('D3')->applyFromArray($style_col);
    $sheet->getStyle('E3')->applyFromArray($style_col);
    $sheet->getStyle('F3')->applyFromArray($style_col);
    $sheet->getStyle('G3')->applyFromArray($style_col);

    $data_karyawan = $this->m_model->getAbsensiLast7Days($start_date, $end_date);

    $no = 1;
    $numrow = 4;
    foreach ($data_karyawan as $data) {
      $sheet->setCellValue('A' . $numrow, $data['id']);
      $sheet->setCellValue('B' . $numrow, $data['nama_depan'] . ' ' . $data['nama_belakang']);
      $sheet->setCellValue('C' . $numrow, $data['kegiatan']);
      $sheet->setCellValue('D' . $numrow, $data['date']);
      $sheet->setCellValue('E' . $numrow, $data['jam_masuk']);
      $sheet->setCellValue('F' . $numrow, $data['jam_pulang']);
      $sheet->setCellValue('G' . $numrow, $data['keterangan_izin']);


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

    $sheet->setTitle("LAPORAN DATA REKAPAN MINGGUAN");
    header('Content-Type: aplication/vnd.openxmlformants-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="REKAPAN MINGGUAN.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
  }

  // export harian
  public function export_rekap_harian()
  {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $date = date('Y-m-d');
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

    $sheet->getStyle('A3')->applyFromArray($style_col);
    $sheet->getStyle('B3')->applyFromArray($style_col);
    $sheet->getStyle('C3')->applyFromArray($style_col);
    $sheet->getStyle('D3')->applyFromArray($style_col);
    $sheet->getStyle('E3')->applyFromArray($style_col);
    $sheet->getStyle('F3')->applyFromArray($style_col);
    $sheet->getStyle('G3')->applyFromArray($style_col);

    $data_karyawan = $this->m_model->getDailyData($date);

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

    $sheet->setTitle("LAPORAN DATA REKAPAN HARIAN");
    header('Content-Type: aplication/vnd.openxmlformants-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="REKAPAN HARIAN.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
  }


  // export bulanan
  public function export_rekap_bulanan()
  {
    $bulan= $this->input->post('bulan');
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

    $sheet->getStyle('A3')->applyFromArray($style_col);
    $sheet->getStyle('B3')->applyFromArray($style_col);
    $sheet->getStyle('C3')->applyFromArray($style_col);
    $sheet->getStyle('D3')->applyFromArray($style_col);
    $sheet->getStyle('E3')->applyFromArray($style_col);
    $sheet->getStyle('F3')->applyFromArray($style_col);
    $sheet->getStyle('G3')->applyFromArray($style_col);

    $data_karyawan = $this->m_model->getbulanan($bulan);

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

    $sheet->setTitle("LAPORAN DATA REKAPAN BULANAN");
    header('Content-Type: aplication/vnd.openxmlformants-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="REKAPAN BULANAN.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
  }

   // export seluruh
   public function export_rekap_seluruh()
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
 
     $sheet->getStyle('A3')->applyFromArray($style_col);
     $sheet->getStyle('B3')->applyFromArray($style_col);
     $sheet->getStyle('C3')->applyFromArray($style_col);
     $sheet->getStyle('D3')->applyFromArray($style_col);
     $sheet->getStyle('E3')->applyFromArray($style_col);
     $sheet->getStyle('F3')->applyFromArray($style_col);
     $sheet->getStyle('G3')->applyFromArray($style_col);
 
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
 
     $sheet->setTitle("LAPORAN DATA KESELURUHAN");
     header('Content-Type: aplication/vnd.openxmlformants-officedocument.spreadsheetml.sheet');
     header('Content-Disposition: attachment; filename="REKAPAN KESELURUHAN.xlsx"');
     header('Cache-Control: max-age=0');
 
     $writer = new Xlsx($spreadsheet);
     $writer->save('php://output');
   }
  public function hapus_karyawan($id)
  {
    $this->m_model->delete('absensi', 'id', $id);
    redirect(base_url('karyawan/history_absen'));
  }
  public function rekapan_harian()
  {
    $data['user'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
    $tanggal = date('Y-m-d');
    $data['absensi'] = $this->m_model->getDailyData($tanggal);
    $this->load->view('admin/rekapan_harian', $data);
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
    $data['absensi'] = $this->m_model->getbulanan($bulan);
    $this->load->view('admin/rekap_bulanan', $data);
  }

  public function rekap_seluruh()
  {
    $data['user'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
    $data['absensi'] = $this->m_model->getData();
    $this->load->view('admin/rekap_seluruh', $data);
  }

  public function profile()
  {
    $data['user'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
    $this->load->view('admin/profile', $data);
  }

  public function aksi_akun()
  {
    $foto = $this->upload_images('foto');
    $email = $this->input->post('email');
    $username = $this->input->post('username');
    $password_baru = $this->input->post('password_baru');
    $konfirmasi_password = $this->input->post('konfirmasi_password');

    $foto = $this->upload_images('foto');
    if ($foto[0] == false) {
      $data = [
        'foto' => 'User.png',
        'email' => $email,
        'username' => $username,
      ];
    } else {
      $data = [
        'foto' => $foto[1],
        'email' => $email,
        'username' => $username,
      ];
    }

    // jika ada pasword baru
    if (!empty($password_baru)) {
      // pastikan pasword sama
      if ($password_baru === $konfirmasi_password) {
        $data['password'] = md5($password_baru);
      } else {
        $this->session->set_flashdata('message', 'password baru dan konfirmasi password harus sama...');
        redirect(base_url('admin/profile'));
      }
    }
    // lakukan pembaruan data
    $this->session->set_userdata($data);
    $update_result = $this->m_model->ubah_data('user', $data, array('id' => $this->session->userdata('id')));
    if ($update_result) {
      redirect(base_url('admin/profile'));
    } else {
      redirect(base_url('admin/profile'));
    }
  }
 
  public function aksi_ubah_profile()
  {
      $foto = $_FILES['image']['name'];
      $foto_temp = $_FILES['image']['tmp_name'];
      $password_baru = $this->input->post('password');
      $konfirmasi_password = $this->input->post('con_pass');
      $username = $this->input->post('username');
      $nama_depan = $this->input->post('nama_depan');
      $nama_belakang = $this->input->post('nama_belakang');
  
      if ($foto) {
          $kode = round(microtime(true) * 1000);
          $file_name = $kode . '_' . $foto;
          $upload_path = './images/' . $file_name;
          $old_file = $this->m_model->get_foto_by_id($this->session->userdata('id'));
          if ($old_file != 'User.png') {
              unlink('./images/' . $old_file);
          }
          if (move_uploaded_file($foto_temp, $upload_path)) {
              $data = [
                  'image' => $file_name,
                  'username' => $username,
                  'nama_depan' => $nama_depan,
                  'nama_belakang' => $nama_belakang,
              ];
              
              if (!empty($password_baru) && strlen($password_baru) >= 8) {
                  if ($password_baru === $konfirmasi_password) {
                      $data['password'] = md5($password_baru);
                  } else {
                      $this->session->set_flashdata('message', 'Password baru dan konfirmasi password harus sama');
                      redirect(base_url('admin/profile'));
                  }
              }
              
              $this->session->set_userdata($data);
              $update_result = $this->m_model->update('user', $data, array('id' => $this->session->userdata('id')));
              redirect(base_url('admin/profile'));
          } else {
              // Gagal mengunggah foto baru
              redirect(base_url('admin/profile'));
          }
      } else {
          // Jika tidak ada foto yang diunggah
          $data = [
              'username' => $username,
              'nama_depan' => $nama_depan,
              'nama_belakang' => $nama_belakang,
          ];
          
          if (!empty($password_baru) && strlen($password_baru) >= 8) {
              if ($password_baru === $konfirmasi_password) {
                  $data['password'] = md5($password_baru);
              } else {
                  $this->session->set_flashdata('message', 'Password baru dan konfirmasi password harus sama');
                  redirect(base_url('admin/profile'));
              }
          }
          
          $this->session->set_userdata($data);
          $update_result = $this->m_model->update('user', $data, array('id' => $this->session->userdata('id')));
          redirect(base_url('admin/profile'));
      }
  }
  // menambahkan foto ke folder images admin
  public function upload_images($value)
  {
    $kode = round(microtime(true)  * 1000);
    $config['upload_path'] = './images/admin/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size'] = '30000';
    $config['file_name'] = $kode;
    $this->upload->initialize($config);
    if (!$this->upload->do_upload($value)) {
      return array(false, '');
    } else {
      $fn = $this->upload->data();
      $nama = $fn['file_name'];
      return array(true, $nama);
    }
  }
}
