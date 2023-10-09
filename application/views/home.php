<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>HomePage</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  </head>
  <style>
    body {
  margin: 0;
  font-family: "Lucida Grande";
}

a {
  text-decoration: none;
}

.container {
  width: 1170px;
  padding: 0 15px;
  margin: 0 auto;
}

.top-wrapper {
  padding: 180px 0 100px 0;
  background-image: url(https://anotherorion.com/wp-content/uploads/2020/10/aplikasi-mengatur-waktu-pekerja.jpg);
  background-size: cover;
  color: white;
  text-align: center;
}

.top-wrapper h1 {
  opacity: 0.7;
  font-size: 45px;
  letter-spacing: 5px;
  margin-bottom: 10px;
}

.top-wrapper p {
  opacity: 0.7;
  margin-bottom: 3px;
}

.btn-wrapper {
  margin: 20px 0;
}

.btn-wrapper p {
  margin: 10px 0;
}

.signup {
  background-color: #239b76;
}

.facebook {
  background-color: #3b5998;
  margin-right: 10px;
}

.twitter {
  background-color: #55acee;
}

.btn {
  padding: 12px 24px;
  color: white;
  display: inline-block;
  opacity: 0.8;
  border-radius: 4px;
}

.btn:hover {
  opacity: 1;
}

.fa {
  margin-right: 5px;
}

header {
  height: 65px;
  width: 100%;
  background-color: rgba(34, 49, 52, 0.9);
  /* Ubah position ke fixed, dan top ke 0 */
  position:fixed;
  top:0;
  /* Ubah z-index ke 10 */
  z-index:10;
}

.logo {
  width: 124px;
  margin-top: 20px;
}

.header-left {
  float: left;
}

.header-right {
  float: right;
  background-color: rgba(255, 255, 255, 0.3);
  transition: all 0.5s;
}

.header-right:hover {
  background-color: rgba(255, 255, 255, 0.5);
}

.header-right a {
  line-height: 65px;
  padding: 0 25px;
  color: white;
  display: block;
}

.lesson-wrapper {
  height: 500px;
  padding-bottom: 80px;
  background-color: #f7f7f7;
  text-align: center;
}

.heading {
  padding-top: 60px;
  padding-bottom: 30px;
  color: #5f5d60;
}

.heading h2 {
  font-weight: normal;
}

.lesson {
  float: left;
  width: 25%;
}

.lesson-icon {
  position: relative;
}

.lesson-icon p {
  position: absolute;
  top: 90px;
  width: 100%;
  color: white;
}

.txt-contents {
  width: 80%;
  display: inline-block;
  margin-top: 20px;
  font-size: 15px;
  color: #b3aeb5;
}

.heading h3 {
  font-weight: normal;
}

.message-wrapper {
  border-bottom: 1px solid #eee;
  padding-bottom: 80px;
  text-align: center;
}

.message {
  padding: 15px 40px;
  background-color: #5dca88;
  cursor: pointer;
  box-shadow: 0 7px #1a7940;
}

.message:active {
  position: relative;
  top: 7px;
  box-shadow: none;
}

footer img {
  width: 125px;
}

footer p {
  color: #b3aeb5;
  font-size: 12px;
}

footer {
  padding-top: 30px;
}
  </style>
  <body>
    <header>
      <div class="container">
        <div class="header-left">
          <img class="logo" src="https://prog-8.com/images/html/advanced/main_logo.png">
        </div>
        <div class="header-right">
          <a href="auth" class="login">Log in</a>
        </div>
      </div>
    </header>
    <div class="top-wrapper">
      <div class="container">
        <h1>ABSENSI KARYAWAN.</h1>
        <h1>BELAJAR MENJADI LEBIH KREATIF.</h1>
        <p>Progate adalah platform online untuk belajar coding.</p>
        <p>Kami menawarkan lingkungan pemograman yang lengkap untuk mempermudah Anda memulai.</p>
        <!-- <div class="btn-wrapper">
          <a href="#" class="btn signup">Daftar dengan Email</a>
          <p>atau</p>
          <a href="#" class="btn facebook"><span class="fa fa-facebook"></span>Daftar dengan Facebook</a>
          <a href="#" class="btn twitter"><span class="fa fa-twitter"></span>Daftar dengan Twitter</a>
        </div> -->
      </div>
    </div>
    <div class="lesson-wrapper">
      <div class="container">
        <div class="heading">
          <h2>Cari tau dari mana Anda mau memulai!</h2>
        </div>
        <div class="lessons">
          <div class="lesson">
            <div class="lesson-icon">
              <img src="https://prog-8.com/images/html/advanced/html.png">
               <p>HTML & CSS</p>
            </div>
            <p class="txt-contents">Bahasa yang digunakan untuk membuat dan mendesain tampilan situs web Anda. </p>
          </div>
          <div class="lesson">
            <div class="lesson-icon">
              <img src="https://prog-8.com/images/html/advanced/jQuery.png">
              <p>jQuery</p>
            </div>
            <p class="txt-contents">Library JavaScript yang cepat, kaya akan fitur, dan mudah digunakan yang menangani animasi dan permintaan Ajax.</p>
          </div>
          <div class="lesson">
            <div class="lesson-icon">
              <img src="https://prog-8.com/images/html/advanced/ruby.png">
              <p>Ruby</p>
            </div>
            <p class="txt-contents">Bahasa dinamis, serba guna yang sederhana dan produktif. Ruby sering digunakan untuk membuat aplikasi web yang responsive.</p>
          </div>
          <div class="lesson">
            <div class="lesson-icon">
              <img src="https://prog-8.com/images/html/advanced/php.png">
              <p>PHP</p>
            </div>
            <p class="txt-contents">Bahasa skrip open source yang dapat disematkan ke dalam HTML, dan cocok untuk pengembangan web.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="message-wrapper">
      <div class="container">
        <div class="heading">
          <h2>Apakah Anda siap untuk menjadi programer yang handal?</h2>
          <h3>Ayo belajar coding, ayo belajar menjadi lebih kreatif!</h3>
        </div>
        <span class="btn message">Mulai Belajar</span>
      </div>
    </div>
    <footer>
      <div class="container">
        <img src="https://prog-8.com/images/html/advanced/footer_logo.png">
        <p>Learn to code, learn to be creative.</p>
      </div>
    </footer>
  </body>
</html>