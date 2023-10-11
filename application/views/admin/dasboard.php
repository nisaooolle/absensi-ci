<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
  }

  :root {
    --grey-color: #b1adad;
    --border-color: #e7e8ea;
  }

  .container {
    display: flex;
    height: 100vh;
    letter-spacing: 1px;
  }


  /*----- Dark Mode -----*/

  .dark-mode {
    background: #000;
    color: #fff;
  }


  /*----- Left SideBar -----*/

  .left_sidebar {
    flex-basis: 20%;
    position: sticky;
    top: 0px;
    align-self: flex-start;
    transition: all .3s ease-in-out;
  }

  .left_sidebar .close_hamburger_btn {
    position: absolute;
    top: 30px;
    left: 30px;
    font-size: 34px;
    cursor: pointer;
    color: #000;
    display: none;
  }

  .left_sidebar .logo h2 {
    padding: 20px 30px;
    font-weight: 600;
    font-size: 32px;
    font-style: italic;
  }

  .left_sidebar .menu_items .menu_item {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 17px;
    color: var(--grey-color);
    padding: 20px 30px;
    cursor: pointer;
  }


  /*----- Main Content -----*/

  .main_content {
    flex-basis: 60%;
    display: flex;
    flex-direction: column;
    gap: 30px;
    padding: 0 20px;
    transition: all .3s ease-in-out;
    overflow-y: scroll;
  }

  .main_content .main_navbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
  }

  .main_content .main_navbar .dark_mode_icon i {
    background: var(--border-color);
    color: #000;
    font-size: 18px;
    padding: 10px;
    margin-top: 15px;
    border-radius: 50%;
    cursor: pointer;
  }

  .main_content .main_navbar .dark_mode_icon .bx-sun {
    display: none;
  }

  .main_content .left_right_sidebar_opener {
    font-size: 45px;
    cursor: pointer;
    margin-top: 20px;
    display: none;
  }

  .main_content .left_right_sidebar_opener .student {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .main_content .left_right_sidebar_opener .student img {
    height: 50px;
    width: 50px;
    border-radius: 50%;
    object-fit: cover;
    background-position: center;
    margin-top: 15px;
  }

  .main_content .left_right_sidebar_opener .student p {
    font-size: 18px;
  }

  .search_box {
    background: var(--border-color);
    display: flex;
    gap: 15px;
    padding: 12px;
    margin-top: 20px;
    align-items: center;
    color: #000;
    width: 100%;
    border-radius: 5px;
    font-size: 20px;
    width: 90%;
  }

  .search_box input {
    width: 100%;
    border: none;
    background: #e9eaec;
    outline: none;
  }

  .menu_item_name_and_filter {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 4px 0;
  }

  .menu_item_name_and_filter .menu_item_name h2 {
    font-weight: 600;
    font-size: 24px;
  }

  .menu_item_name_and_filter .filter_and_sort {
    display: flex;
    gap: 20px;
    align-items: center;
  }

  .menu_item_name_and_filter .filter_and_sort .sort_and_filter {
    display: flex;
    align-items: center;
    gap: 10px;
    background: var(--border-color);
    color: #000;
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 14px;
    cursor: pointer;
  }

  .tabs {
    display: flex;
    justify-content: space-between;
    font-size: 16px;
    margin-left: 15px;
  }

  .tabs .tab_name {
    display: flex;
    gap: 50px;
    width: 100%;
    border-bottom: 2px solid var(--border-color);
    padding-bottom: 15px;
    cursor: pointer;
    position: relative;
  }

  .tabs .tab_name p {
    margin-left: 12px;
  }

  .tabs .tab_name::after {
    content: "";
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 12%;
    height: 2px;
    background-color: #808080;
  }

  .main_content .table {
    overflow-x: auto;
  }

  .main_content table {
    border-collapse: collapse;
    width: 100%;
  }

  .table td,
  .table th {
    padding: 25px 20px;
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

  .table img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
  }

  .table .profile_name {
    display: flex;
    align-items: center;
    gap: 7px;
  }


  /*----- Right SideBar -----*/

  .right_sidebar {
    flex-basis: 20%;
    position: sticky;
    top: 0px;
    align-self: flex-start;
    transition: all 0.3s ease-in-out;
  }

  .notification_and_name {
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    margin-top: 20px;
    padding-bottom: 35px;
    border-bottom: 2px solid var(--border-color);
    cursor: pointer;
    position: relative;
  }

  .notification_and_name .close_btn {
    position: absolute;
    right: 30px;
    font-size: 26px;
    display: none;
  }

  .notification_and_name img {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background-position: center;
    object-fit: cover;
    margin-right: -20px;
  }

  .notification_and_name .bell {
    position: relative;
    font-size: 20px;
  }

  .notification_and_name span {
    position: absolute;
    background: #ff0000;
    height: 5px;
    width: 5px;
    right: 0px;
    top: 2px;
    border-radius: 50%;
  }

  .profile {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-top: 30px;
    margin-bottom: 30px;
    gap: 15px;
  }

  .profile img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    background-position: center;
  }

  .profile .name_and_class {
    text-align: center;
  }

  .profile .name_and_class P {
    font-weight: 600;
  }

  .profile .name_and_class span {
    font-size: 14px;
    color: var(--grey-color);
  }

  .profile .contact_info {
    display: flex;
    gap: 30px;
    font-size: 22px;
    cursor: pointer;
  }

  .profile .about {
    margin: 15px 0;
  }

  .profile .about h4,
  .profile .other_info h4 {
    font-weight: 600;
    font-size: 14px;
  }

  .profile .about p,
  .profile .other_info p {
    font-size: 12px;
    margin-top: 10px;
    color: var(--grey-color);
  }

  .profile .other_info {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
  }

  .profile .other_info div {
    width: 120px;
  }

  .profile .student_from_same_class {
    width: 300px;
  }

  .profile .student_from_same_class img {
    width: 30px;
    height: 30px;
    object-fit: cover;
    background-position: center;
    margin-left: -8px;
  }

  .profile .student_from_same_class img:nth-child(1) {
    margin-left: 0 !important;
  }

  .profile .student_from_same_class h4 {
    font-weight: 600;
    font-size: 14px;
    margin: 10px 0;
  }

  .profile .student_same_class_img {
    display: flex;
    align-items: center;
    cursor: pointer;
  }

  .profile .student_same_class_img span {
    color: #5bb9c0;
    font-size: 14px;
    margin-left: 12px;
  }


  /*----- Media Query -----*/

  @media (max-width: 500px) {

    /*----- left_sidebar -----*/
    .left_sidebar {
      transform: translateX(-150%);
      overflow: hidden;
      z-index: 100;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #fff;
      width: 330px;
      height: 100%;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
    }

    .left_sidebar .close_hamburger_btn {
      display: block;
    }

    .left_sidebar .logo h2 {
      margin-top: 100px;
      margin-bottom: 20px;
      color: #000;
    }

    .left_sidebar .menu_items .menu_item {
      font-size: 16px;
    }

    /*----- right_sidebar -----*/
    .right_sidebar {
      transform: translateX(150%);
      overflow: hidden;
      z-index: 100;
      position: fixed;
      top: 0;
      right: 0;
      background-color: #fff;
      width: 100%;
      height: 100%;
      overflow: scroll;
    }

    .right_sidebar .profile {
      gap: 25px;
      padding: 25px;
      text-align: center;
    }

    .profile .other_info {
      justify-content: center;
    }

    .profile .name_and_class P,
    .profile .about h4,
    .profile .other_info h4 {
      font-size: 15px;
      color: #000;
    }

    .profile .name_and_class span {
      font-size: 15px;
    }

    .notification_and_name {
      color: #000;
    }

    .notification_and_name .bx-chevron-down {
      display: none;
    }

    .notification_and_name .close_btn,
    .notification_and_name .bell {
      font-size: 28px;
    }

    .profile .contact_info {
      font-size: 24px;
      gap: 20px;
      color: #000;
    }

    .profile .about p,
    .profile .other_info p,
    .profile .student_from_same_class h4 {
      font-size: 14px;
    }

    .notification_and_name img {
      height: 50px;
      width: 50px;
    }

    .notification_and_name {
      justify-content: center;
      gap: 35px;
    }

    .student_from_same_class {
      display: flex;
      flex-direction: column;
      gap: 10px;
      justify-content: center;
      align-items: center;
    }

    .notification_and_name .close_btn {
      display: block;
    }

    /*----- Main Content -----*/
    .main_content {
      flex-basis: 100%;
      width: 100%;
    }

    .main_content .left_right_sidebar_opener {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .main_content .left_right_sidebar_opener .hamburger {
      text-align: left;
      display: inline;
    }

    .main_content .left_right_sidebar_opener .user {
      text-align: right;
      display: inline;
    }

    .table td,
    .table th {
      font-size: 15px;
    }

    input::placeholder {
      font-size: 14px;
    }
  }

  @media (min-width: 501px) and (max-width: 768px) {

    /*----- left_sidebar -----*/
    .left_sidebar {
      transform: translateX(-150%);
      overflow: hidden;
      z-index: 100;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #fff;
      width: 330px;
      height: 100%;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
    }

    .left_sidebar .close_hamburger_btn {
      display: block;
    }

    .left_sidebar .logo h2 {
      margin-top: 100px;
      margin-bottom: 20px;
      color: #000;
    }

    .left_sidebar .menu_items .menu_item {
      font-size: 16px;
    }

    /*----- right_sidebar -----*/
    .right_sidebar {
      transform: translateX(150%);
      overflow: hidden;
      z-index: 100;
      position: fixed;
      top: 0;
      right: 0;
      background-color: #fff;
      width: 100%;
      height: 100%;
      overflow: scroll;
    }

    .right_sidebar .profile {
      gap: 25px;
      padding: 25px;
      text-align: center;
    }

    .profile .other_info {
      justify-content: center;
    }

    .profile .name_and_class P,
    .profile .about h4,
    .profile .other_info h4 {
      font-size: 15px;
      color: #000;
    }

    .profile .name_and_class span {
      font-size: 15px;
    }

    .notification_and_name {
      color: #000;
    }

    .notification_and_name .bx-chevron-down {
      display: none;
    }

    .notification_and_name .close_btn,
    .notification_and_name .bell {
      font-size: 28px;
    }

    .profile .contact_info {
      font-size: 24px;
      gap: 20px;
      color: #000;
    }

    .profile .about p,
    .profile .other_info p,
    .profile .student_from_same_class h4 {
      font-size: 14px;
    }

    .notification_and_name img {
      height: 50px;
      width: 50px;
    }

    .notification_and_name {
      justify-content: center;
      gap: 35px;
    }

    .student_from_same_class {
      display: flex;
      flex-direction: column;
      gap: 10px;
      justify-content: center;
      align-items: center;
    }

    .notification_and_name .close_btn {
      display: block;
    }

    /*----- Main Content -----*/
    .main_content {
      flex-basis: 100%;
      width: 100%;
    }

    .main_content .left_right_sidebar_opener {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .main_content .left_right_sidebar_opener .hamburger {
      text-align: left;
      display: inline;
    }

    .main_content .left_right_sidebar_opener .user {
      text-align: right;
      display: inline;
    }

    .table td,
    .table th {
      font-size: 15px;
    }

    input::placeholder {
      font-size: 14px;
    }
  }

  @media(min-width: 769px) and (max-width: 1200px) {

    /*----- left_sidebar -----*/
    .left_sidebar {
      transform: translateX(-150%);
      overflow: hidden;
      z-index: 100;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #fff;
      width: 330px;
      height: 100%;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
    }

    .left_sidebar .close_hamburger_btn {
      display: block;
    }

    .left_sidebar .logo h2 {
      margin-top: 100px;
      margin-bottom: 20px;
      color: #000;
    }

    .left_sidebar .menu_items .menu_item {
      font-size: 16px;
    }

    /*----- right_sidebar -----*/
    .right_sidebar {
      transform: translateX(150%);
      overflow: hidden;
      z-index: 100;
      position: fixed;
      top: 0;
      right: 0;
      background-color: #fff;
      width: 100%;
      height: 100%;
      overflow: scroll;
    }

    .right_sidebar .profile {
      gap: 25px;
      padding: 25px;
      text-align: center;
    }

    .profile .other_info {
      justify-content: center;
    }

    .profile .name_and_class P,
    .profile .about h4,
    .profile .other_info h4 {
      font-size: 15px;
      color: #000;
    }

    .profile .name_and_class span {
      font-size: 15px;
    }

    .notification_and_name {
      color: #000;
    }

    .notification_and_name .bx-chevron-down {
      display: none;
    }

    .notification_and_name .close_btn,
    .notification_and_name .bell {
      font-size: 28px;
    }

    .profile .contact_info {
      font-size: 24px;
      gap: 20px;
      color: #000;
    }

    .profile .about p,
    .profile .other_info p,
    .profile .student_from_same_class h4 {
      font-size: 14px;
    }

    .notification_and_name img {
      height: 50px;
      width: 50px;
    }

    .notification_and_name {
      justify-content: center;
      gap: 35px;
    }

    .student_from_same_class {
      display: flex;
      flex-direction: column;
      gap: 10px;
      justify-content: center;
      align-items: center;
    }

    .notification_and_name .close_btn {
      display: block;
    }

    /*----- Main Content -----*/
    .main_content {
      flex-basis: 100%;
      width: 100%;
    }

    .main_content .left_right_sidebar_opener {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .main_content .left_right_sidebar_opener .hamburger {
      text-align: left;
      display: inline;
    }

    .main_content .left_right_sidebar_opener .user {
      text-align: right;
      display: inline;
    }

    .table td,
    .table th {
      font-size: 15px;
    }

    input::placeholder {
      font-size: 14px;
    }
  }
</style>

<body>
  <div class="container ">
    <div class="left_sidebar">
      <div class="close_hamburger_btn">
        <i class='bx bx-x-circle'></i>
      </div>
      <div class="logo ">
        <h2 onclick="myFunction()">School</h2>
      </div>
      <div class="menu_items ">
        <div class="menu_item ">
          <i class='bx bxs-dashboard'></i>
          <p>Dashboard</p>
        </div>
        <div class="menu_item ">
          <i class='bx bx-message-rounded-dots'></i>
          <p>Messenger</p>
          <i class="fa-regular fa-circle-2 "></i>
        </div>
        <div class="menu_item ">
          <i class='bx bx-calendar'></i>
          <p>Calender</p>
        </div>
        <div class="menu_item ">
          <i class='bx bx-file-blank'></i>
          <p>Database</p>
        </div>
        <div class="menu_item ">
          <i class='bx bx-signal-4'></i>
          <p>Attendance</p>
        </div>
        <div class="menu_item ">
          <i class='bx bx-cog'></i>
          <p>Settings</p>
        </div>
      </div>
    </div>
    <div class="main_content">
      <div class="left_right_sidebar_opener">
        <div class="hamburger">
          <i class='bx bx-menu'></i>
        </div>
        <div class="student">
          <div class="profile_img">
            <img src="https://i.postimg.cc/Sxb6gssQ/img-1.jpg" alt="profile img">
          </div>
          <div class="profile_name">
            <p>Kery Roy</p>
          </div>
        </div>
      </div>
      <div class="main_navbar">
        <!-- <div class="search_box">
          <i class='bx bx-search-alt-2'></i> <input type="text " placeholder="Search">
        </div>
        <div class="dark_mode_icon" onclick="darkMode()">
          <i class='bx bx-moon'></i>
          <i class='bx bx-sun'></i>
        </div> -->
      </div>
      <div class="menu_item_name_and_filter ">
        <div class="menu_item_name">
          <h2>Database</h2>
        </div>
        <div class="filter_and_sort">
          <div class="sort sort_and_filter">
            <p>Sort</p>
            <i class='bx bx-sort-down'></i>
          </div>
          <div class="filter sort_and_filter">
            <p>Filter</p>
            <i class='bx bx-filter'></i>
          </div>
        </div>
      </div>
      <div class="tabs">
        <div class="tab_name">
          <p>Student</p>
          <p>Teacher</p>
          <p>Staff</p>
        </div>
        <div class="three_dots">
          <i class='bx bx-dots-vertical-rounded'></i>
        </div>
      </div>
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
              <td data-th="No">
                <?php echo $no ?>
              </td>
              <td data-th="Nama Karyawan">
                <?php echo $row->nama_depan . ' ' . $row->nama_belakang; ?>
              </td>
              <td data-th="Kegiatan">
                <?php echo $row->kegiatan; ?>
              </td>
              <td data-th="Date">
                <?php echo $row->date; ?>
              </td>
              <td data-th="Jam masuk">
                <?php echo $row->jam_masuk; ?>
              </td>
              <td data-th="Jam Pulang">
                <?php echo $row->jam_pulang; ?>
              </td>
              <td data-th="Keterangan izin">
                <?php echo $row->keterangan_izin; ?>
              </td>
              <td data-th="Status">
                <?php echo $row->status; ?>
              </td>
            </tr>
          <?php endforeach; ?>
          
        </table>
      </div>
    </div>
    <div class="right_sidebar ">
      <div class="notification_and_name ">
        <div class="close_btn ">
          <i class='bx bx-x-circle'></i>
        </div>
        <div class="bell ">
          <i class='bx bx-bell'></i>
          <span></span>
        </div>
        <img src="https://i.postimg.cc/Sxb6gssQ/img-1.jpg " alt="profile ">
        <p>Kery Roy</p>
        <i class='bx bx-chevron-down'></i>
      </div>
      <div class="profile ">
        <div class="img ">
          <img src="https://i.postimg.cc/g2M32zcz/image.png " alt="studentImg ">
        </div>
        <div class="name_and_class ">
          <p>Hermione Granger</p>
          <span>BCA Student</span>
        </div>
        <div class="contact_info ">
          <i class='bx bx-message-rounded-dots'></i>
          <i class='bx bx-phone-call'></i>
          <i class='bx bx-envelope'></i>
        </div>
        <div class="about ">
          <h4>About</h4>
          <p>BCA student studied at ABC School of Commerce and Computer studies. I really enjoy solving problems as well as making things pretty and easy to use. I can't stop learning new things; the more, the better.</p>
        </div>
        <div class="other_info ">
          <div class="age ">
            <h4>Age</h4>
            <p>18</p>
          </div>
          <div class="gender ">
            <h4>Gender</h4>
            <p>Female</p>
          </div>
          <div class="dob ">
            <h4>DOB</h4>
            <p>12/11/2006</p>
          </div>
          <div class="address ">
            <h4>Address</h4>
            <p>USA</p>
          </div>
        </div>
        <div class="student_from_same_class ">
          <div class="student_same_class_heading ">
            <h4>Student from the same class</h4>
          </div>
          <div class="student_same_class_img ">
            <img src="https://i.postimg.cc/qBbpBPZB/img-2.jpg " alt="img ">
            <img src="https://i.postimg.cc/BvPJ7FHN/img1.jpg " alt="img ">
            <img src="https://i.postimg.cc/SRkqKt5t/img2.jpg " alt="img ">
            <img src="https://i.postimg.cc/xCR77pg2/dahiana-waszaj-XQWfro4LrVs-unsplash.jpg " alt="img ">
            <img src="https://i.postimg.cc/9MXPK7RT/news2.jpg " alt="img ">
            <span>+12 More</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
  $(document).ready(function() {
    $('.hamburger').click(function() {
      $('.left_sidebar').css({
        'transform': 'translateX(0)'
      });
    });
    $('.student').click(function() {
      $('.right_sidebar').css({
        'transform': 'translateX(0)'
      });
    });

    $('.close_btn').click(function() {
      $('.right_sidebar').css({
        'transform': 'translateX(150%)'
      })
    })

    $('.close_hamburger_btn').click(function() {
      $('.left_sidebar').css({
        'transform': 'translateX(-150%)'
      })
    })

  });

  function darkMode() {
    $('body').toggleClass('dark-mode');
    $('.table tr:nth-child(even)').css({
      'color': '#000',
    })
    $('.table tr:nth-child(4)').css({
      'background-color': '#5bb9c0',
      'color': '#fff',
    })

    $('.main_content .main_navbar .dark_mode_icon .bx-sun').click(function() {
      $(this).css('display', 'none');
      $('.main_content .main_navbar .dark_mode_icon .bx-moon').css('display', 'block');
    });

    $('.main_content .main_navbar .dark_mode_icon .bx-moon').click(function() {
      $(this).css('display', 'none');
      $('.main_content .main_navbar .dark_mode_icon .bx-sun').css('display', 'block');
    });
  }
</script>

</html>