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
        --grey-color: #6E7C7C;
        --border-color: #e7e8ea;
    }

    .container {
        display: flex;
        height: 100vh;
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
        text-decoration: none;
    }


    /*----- Main Content -----*/

    .main_content {
        flex-direction: column;
        gap: 30px;
        padding: 0 20px;
        transition: all .3s ease-in-out;
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
        margin: 20px 0;
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
        display: flex;
        gap: 50px;
        width: 100%;
        border-bottom: 2px solid var(--border-color);
        padding-bottom: 15px;
        cursor: pointer;
        position: relative;
    }

    /* .tabs .tab_name {
    display: flex;
    gap: 50px;
    width: 100%;
    border-bottom: 2px solid var(--border-color);
    padding-bottom: 15px;
    cursor: pointer;
    position: relative;
  } */

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

    .cards-list {
        z-index: 0;
        width: 100%;
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
    }

    .card {
        margin: 30px auto;
        width: 250px;
        height: 150px;
        border-radius: 40px;
        box-shadow: 5px 5px 30px 7px rgba(0, 0, 0, 0.25), -5px -5px 30px 7px rgba(0, 0, 0, 0.22);
        cursor: pointer;
        transition: 0.4s;
    }

    .card .card_image {
        width: inherit;
        height: inherit;
        border-radius: 40px;
    }

    .card .card_image img {
        width: inherit;
        height: inherit;
        border-radius: 40px;
        object-fit: cover;
    }

    .card .card_title {
        text-align: center;
        border-radius: 0px 0px 40px 40px;
        font-family: sans-serif;
        font-weight: bold;
        font-size: 30px;
        margin-top: -80px;
        height: 40px;
    }

    .card:hover {
        transform: scale(0.9, 0.9);
        box-shadow: 5px 5px 30px 15px rgba(0, 0, 0, 0.25),
            -5px -5px 30px 15px rgba(0, 0, 0, 0.22);
    }

    .title-white {
        color: white;
    }

    .title-black {
        color: black;
    }

    @media all and (max-width: 500px) {
        .card-list {
            /* On small screens, we are no longer using row direction but column */
            flex-direction: column;
        }
    }

    .submit {
        border: none;
        padding: 15px 70px;
        border-radius: 8px;
        display: block;
        margin: auto;
        margin-top: 20px;
        background-color: #6E7C7C;
        color: #fff;
        font-weight: bold;
        -webkit-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
        -moz-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
        box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
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
                <a href="/absensi-codeigniter3/karyawan">
                <div class="menu_item ">
                        <i class="fa-solid fa-gauge"></i>
                        <p>Dashboard</p>
                    </div>
                </a>
                <div class="menu_item ">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                    <p>History Absen</p>
                </div>
                <div class="menu_item ">
                    <i class="fa-solid fa-bars"></i>
                    <p>Menu Absensi</p>
                </div>
                <div class="menu_item ">
                    <i class="fa-solid fa-bars"></i>
                    <p>Menu Izin</p>
                </div>
                <div class="menu_item ">
                    <i class="fa-solid fa-user"></i>
                    <p>Users</p>
                </div>
                <div class="menu_item ">
                    <i class='bx bx-cog'></i>
                    <p>Settings</p>
                </div>
            </div>
        </div>
        <div class="main_content">
            <div class="menu_item_name_and_filter ">
                <div class="menu_item_name">
                    <h2>MENU ABSENSI</h2>
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

                <div class="three_dots">
                    <i class='bx bx-dots-vertical-rounded'></i>
                </div>
            </div>
            <br><br>
            <div class="texta">
                <form action="">
                    <label for="" style="color:#6E7C7C;
    font-weight: bold;">Absen Kegiatan</label>
                    <br>
                    <textarea name="kegiatan" id="" cols="150" rows="10"></textarea>
                    <button class="submit">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>