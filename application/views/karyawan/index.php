<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
  @import 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet';

  :root {
    --dk-gray-100: #F3F4F6;
    --dk-gray-200: #E5E7EB;
    --dk-gray-300: #D1D5DB;
    --dk-gray-400: #9CA3AF;
    --dk-gray-500: #6B7280;
    --dk-gray-600: #4B5563;
    --dk-gray-700: #374151;
    --dk-gray-800: #1F2937;
    --dk-gray-900: #111827;
    --dk-dark-bg: #313348;
    /* --dk-darker-bg: #2a2b3d; */
    --navbar-bg-color: #252636;
    --sidebar-bg-color: #252636;
    --sidebar-width: 250px;
  }

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: 'Inter', sans-serif;
    /* background-color: var(--dk-darker-bg); */
    font-size: .925rem;
  }

  #wrapper {
    margin-left: var(--sidebar-width);
    transition: all .3s ease-in-out;
  }

  #wrapper.fullwidth {
    margin-left: 0;
  }



  /** --------------------------------
 -- Sidebar
-------------------------------- */
  .sidebar {
    background-color: var(--sidebar-bg-color);
    width: var(--sidebar-width);
    transition: all .3s ease-in-out;
    transform: translateX(0);
    z-index: 9999999
  }

  .sidebar .close-aside {
    position: absolute;
    top: 7px;
    right: 7px;
    cursor: pointer;
    color: #EEE;
  }

  .sidebar .sidebar-header {
    border-bottom: 1px solid #2a2b3c
  }

  .sidebar .sidebar-header h5 a {
    color: var(--dk-gray-300)
  }

  .sidebar .sidebar-header p {
    color: var(--dk-gray-400);
    font-size: .825rem;
  }

  .sidebar .search .form-control~i {
    color: #2b2f3a;
    right: 40px;
    top: 22px;
  }

  .sidebar>ul>li {
    padding: .7rem 1.75rem;
  }

  .sidebar ul>li>a {
    color: var(--dk-gray-400);
    text-decoration: none;
  }

  /* Start numbers */
  .sidebar ul>li>a>.num {
    line-height: 0;
    border-radius: 3px;
    font-size: 14px;
    padding: 0px 5px
  }

  .sidebar ul>li>i {
    font-size: 18px;
    margin-right: .7rem;
    color: var(--dk-gray-500);
  }

  .sidebar ul>li.has-dropdown>a:after {
    content: '\eb3a';
    font-family: unicons-line;
    font-size: 1rem;
    line-height: 1.8;
    float: right;
    color: var(--dk-gray-500);
    transition: all .3s ease-in-out;
  }

  .sidebar ul .opened>a:after {
    transform: rotate(-90deg);
  }

  /* Start dropdown menu */
  .sidebar ul .sidebar-dropdown {
    padding-top: 10px;
    padding-left: 30px;
    display: none;
  }

  .sidebar ul .sidebar-dropdown.active {
    display: block;
  }

  .sidebar ul .sidebar-dropdown>li>a {
    font-size: .85rem;
    padding: .5rem 0;
    display: block;
  }

  /* End dropdown menu */

  .show-sidebar {
    transform: translateX(-270px);
  }

  @media (max-width: 767px) {
    .sidebar ul>li {
      padding-top: 12px;
      padding-bottom: 12px;
    }

    .sidebar .search {
      padding: 10px 0 10px 30px
    }
  }




  /** --------------------------------
 -- welcome
-------------------------------- */
  .welcome {
    color: var(--dk-gray-300);
  }

  .welcome .content {
    background-color: var(--dk-dark-bg);
  }

  .welcome p {
    color: var(--dk-gray-400);
  }




  /** --------------------------------
 -- Statistics
-------------------------------- */
  .statistics {
    color: var(--dk-gray-200);
  }

  .statistics .box {
    background-color: var(--dk-dark-bg);
  }

  .statistics .box i {
    width: 60px;
    height: 60px;
    line-height: 60px;
  }

  .statistics .box p {
    color: var(--dk-gray-400);
  }




  /** --------------------------------
 -- Charts
-------------------------------- */
  .charts .chart-container {
    background-color: var(--dk-dark-bg);
  }

  .charts .chart-container h3 {
    color: var(--dk-gray-400)
  }




  /** --------------------------------
 -- users
-------------------------------- */
  .admins .box .admin {
    background-color: var(--dk-dark-bg);
  }

  .admins .box h3 {
    color: var(--dk-gray-300);
  }

  .admins .box p {
    color: var(--dk-gray-400)
  }




  /** --------------------------------
 -- statis
-------------------------------- */
  .statis {
    color: var(--dk-gray-100);
  }

  .statis .box {
    position: relative;
    overflow: hidden;
    border-radius: 3px;
  }

  .statis .box h3:after {
    content: "";
    height: 2px;
    width: 70%;
    margin: auto;
    background-color: rgba(255, 255, 255, 0.12);
    display: block;
    margin-top: 10px;
  }

  .statis .box i {
    position: absolute;
    height: 70px;
    width: 70px;
    font-size: 22px;
    padding: 15px;
    top: -25px;
    left: -25px;
    background-color: rgba(255, 255, 255, 0.15);
    line-height: 60px;
    text-align: right;
    border-radius: 50%;
  }





  .main-color {
    color: #ffc107
  }

  /** --------------------------------
 -- Please don't do that in real-world projects!
 -- overwrite Bootstrap variables instead.
-------------------------------- */

  .navbar {
    background-color: var(--navbar-bg-color) !important;
    border: none !important;
  }

  .navbar .dropdown-menu {
    right: auto !important;
    left: 0 !important;
  }

  .navbar .navbar-nav>li>a {
    color: #EEE !important;
    line-height: 55px !important;
    padding: 0 10px !important;
  }

  .navbar .navbar-brand {
    color: #FFF !important
  }

  .navbar .navbar-nav>li>a:focus,
  .navbar .navbar-nav>li>a:hover {
    color: #EEE !important
  }

  .navbar .navbar-nav>.open>a,
  .navbar .navbar-nav>.open>a:focus,
  .navbar .navbar-nav>.open>a:hover {
    background-color: transparent !important;
    color: #FFF !important
  }

  .navbar .navbar-brand {
    line-height: 55px !important;
    padding: 0 !important
  }

  .navbar .navbar-brand:focus,
  .navbar .navbar-brand:hover {
    color: #FFF !important
  }

  .navbar>.container .navbar-brand,
  .navbar>.container-fluid .navbar-brand {
    margin: 0 !important
  }

  @media (max-width: 767px) {
    .navbar>.container-fluid .navbar-brand {
      margin-left: 15px !important;
    }

    .navbar .navbar-nav>li>a {
      padding-left: 0 !important;
    }

    .navbar-nav {
      margin: 0 !important;
    }

    .navbar .navbar-collapse,
    .navbar .navbar-form {
      border: none !important;
    }
  }

  .navbar .navbar-nav>li>a {
    float: left !important;
  }

  .navbar .navbar-nav>li>a>span:not(.caret) {
    background-color: #e74c3c !important;
    border-radius: 50% !important;
    height: 25px !important;
    
    width: 25px !important;
    padding: 2px !important;
    font-size: 11px !important;
    position: relative !important;
    top: -10px !important;
    right: 5px !important
  }

  .dropdown-menu>li>a {
    padding-top: 5px !important;
    padding-right: 5px !important;
  }

  .navbar .navbar-nav>li>a>i {
    font-size: 18px !important;
  }




  /* Start media query */

  @media (max-width: 767px) {
    #wrapper {
      margin: 0 !important
    }

    .statistics .box {
      margin-bottom: 25px !important;
    }

    .navbar .navbar-nav .open .dropdown-menu>li>a {
      color: #CCC !important
    }

    .navbar .navbar-nav .open .dropdown-menu>li>a:hover {
      color: #FFF !important
    }

    .navbar .navbar-toggle {
      border: none !important;
      color: #EEE !important;
      font-size: 18px !important;
    }

    .navbar .navbar-toggle:focus,
    .navbar .navbar-toggle:hover {
      background-color: transparent !important
    }
  }


  ::-webkit-scrollbar {
    background: transparent;
    width: 5px;
    height: 5px;
  }

  ::-webkit-scrollbar-thumb {
    background-color: #3c3f58;
  }

  ::-webkit-scrollbar-thumb:hover {
    background-color: rgba(0, 0, 0, 0.3);
  }

  .table td,
  .table th {
    padding: 25px 28px;
    text-align: left;
    font-size: 14px;
    cursor: pointer;
  }

  .table tr:nth-child(even) {
    background: #f1f8f8;
  }

  .table tr:nth-child(4) {
    background: #5bb9c0;
    color: #fff;
  }
  @media (max-width: 600px) {


tbody {
    text-align: left;
}

.option-select {
    font-size: 12px;
}

.td {
    padding-right: none;
    display: flex;
    justify-content: left;
}

.responsive-3 {
    width: 100%;
}

th {
    display: none;
}

td {
    display: grid;
    gap: 0.5rem;
    grid-template-columns: 15ch auto;
    padding: 0.75em 1rem;
}

td:first-child {
    padding-top: 2rem;
}

td::before {
    content: attr(data-cell) "  : ";
    font-weight: bold;
}
}
</style>
<body>
  <aside class="sidebar position-fixed top-0 left-0 overflow-auto h-100 float-left" id="show-side-navigation1">
    <i class="fa-solid fa-xmark close-aside d-md-none d-lg-none" data-close="show-side-navigation1"></i>
     <?php foreach ($user as $data_akun) : ?>
      <div class="sidebar-header d-flex justify-content-center align-items-center px-3 py-4">
        <img class="rounded-pill img-fluid" width="65" src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907008/medium/1501685726/enhance" alt="">
        <div class="ms-2">
          <h5 class="fs-6 mb-0">
            <a class="text-decoration-none" href="karyawan/profil"><?php echo $data_akun->username ?></a>
          </h5>
          <!-- <p class="mt-1 mb-0">Lorem ipsum dolor sit amet consectetur.</p> -->
        </div>
      </div>
      <ul class="categories list-unstyled">
      <li>
        <i class="fa-solid fa-table-columns"></i><a href="/absensi-codeigniter3/karyawan">Dashboard</a>
      </li>
      <li class="">
        <i class="fa-solid fa-clock-rotate-left"></i><a href="karyawan/history_absen">History Absen</a>
      </li>
      <li>
        <!-- <i class="fa-solid fa-bars"></i><a href="karyawan/menu_absensi"> Menu Absensi</a>
      </li>
      <li>
        <i class="fa-solid fa-bars"></i><a href="karyawan/menu_izin">Menu Izin</a>
      </li> -->
      </ul>
  </aside>

  <section id="wrapper">
    <nav class="navbar navbar-expand-md">
      <div class="container-fluid mx-2">
        <div class="navbar-header">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#toggle-navbar" aria-controls="toggle-navbar" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-caret-down"></i>
          </button>
          <a class="navbar-brand" href="#">absen<span class="main-color">si</span></a>
        </div>
        <div class="collapse navbar-collapse" id="toggle-navbar">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Settings
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                  <a class="dropdown-item" href="karyawan/profile">My account</a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="<?php echo base_url('auth/logout'); ?>">Log out</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <!-- <i class="fa-solid fa-bars"></i> -->
                <i data-show="show-side-navigation1" class="fa-solid fa-bars show-side-btn"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="p-4">
      <div class="welcome">
        <div class="content rounded-3 p-3">
          <h1 class="fs-3">Welcome to Dashboard</h1>
          <p class="mb-0">Hello <?php echo $data_akun->username ?>, welcome to your awesome dashboard!</p>
        </div>
      </div>
    <?php endforeach; ?>

      <section class="statistics mt-4">
        <div class="row">
          <div class="col-lg-4">
            <div class="box d-flex rounded-2 align-items-center mb-4 mb-lg-0 p-3">
              <i class="uil-envelope-shield fs-2 text-center bg-primary rounded-circle"></i>
              <div class="ms-3">
                <div class="d-flex align-items-center">
                  <h3 class="mb-0"><?php echo $total_absen ?></h3> <span class="d-block ms-2">Total Masuk Kerja</span>
                </div>
                <p class="fs-normal mb-0">Lorem ipsum dolor sit amet</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="box d-flex rounded-2 align-items-center mb-4 mb-lg-0 p-3">
              <i class="uil-file fs-2 text-center bg-danger rounded-circle"></i>
              <div class="ms-3">
                <div class="d-flex align-items-center">
                  <h3 class="mb-0"><?php echo $total_izin ?></h3> <span class="d-block ms-2">Total Cuti</span>
                </div>
                <p class="fs-normal mb-0">Lorem ipsum dolor sit amet</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="box d-flex rounded-2 align-items-center p-3">
              <i class="uil-users-alt fs-2 text-center bg-success rounded-circle"></i>
              <div class="ms-3">
                <div class="d-flex align-items-center">
                  <h3 class="mb-0">5,245</h3> <span class="d-block ms-2">Total Users</span>
                </div>
                <p class="fs-normal mb-0">Lorem ipsum dolor sit amet</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="charts mt-4">
        <div class="table">
          <table>
            <tr>
              <th>No</th>
              <th>Nama Karyawan</th>
              <th>Kegiatan</th>
              <th>Date</th>
              <th>Jam Masuk</th>
              <th>Jam Pulang</th>
              <th>Keterangan Izin</th>
              <th>Status</th>
            </tr>
            <?php $no = 0;
            foreach ($karyawan as $row) : $no++ ?>
              <tr>
                <td data-cell="No">
                  <?php echo $no ?>
                </td>
                <td data-cell="Nama Karyawan">
                  <?php echo $row->nama_depan . ' ' . $row->nama_belakang; ?>
                </td>
                <td data-cell="Kegiatan">
                  <?php echo $row->kegiatan; ?>
                </td>
                <td data-cell="Date">
                  <?php echo $row->date; ?>
                </td>
                <td data-cell="Jam masuk">
                  <?php echo $row->jam_masuk; ?>
                </td>
                <td data-cell="Jam Pulang">
                  <?php echo $row->jam_pulang; ?>
                </td>
                <td data-cell="Keterangan izin">
                  <?php echo $row->keterangan_izin; ?>
                </td>
                <td data-cell="Status">
                  <?php echo $row->status; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
      </section>
      <script>
        function $(selector) {
          return document.querySelector(selector)
        }

        function find(el, selector) {
          let finded
          return (finded = el.querySelector(selector)) ? finded : null
        }

        function siblings(el) {
          const siblings = []
          for (let sibling of el.parentNode.children) {
            if (sibling !== el) {
              siblings.push(sibling)
            }
          }
          return siblings
        }

        const showAsideBtn = $('.show-side-btn')
        const sidebar = $('.sidebar')
        const wrapper = $('#wrapper')

        showAsideBtn.addEventListener('click', function() {
          $(`#${this.dataset.show}`).classList.toggle('show-sidebar')
          wrapper.classList.toggle('fullwidth')
        })

        if (window.innerWidth < 767) {
          sidebar.classList.add('show-sidebar');
        }

        window.addEventListener('resize', function() {
          if (window.innerWidth > 767) {
            sidebar.classList.remove('show-sidebar')
          }
        })
        $('.sidebar .close-aside').addEventListener('click', function() {
          $(`#${this.dataset.close}`).classList.add('show-sidebar')
          wrapper.classList.remove('margin')
        })
      </script>
</body>

</html>