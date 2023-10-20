<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<style>
  img {
    width: 100%;
  }

  .login {
    height: 100vh;
    width: 100%;
    /* background: radial-gradient(#653d84, #332042); */
    position: relative;
  }

  .login_box {
    width: 1050px;
    height: 600px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #fff;
    border-radius: 10px;
    box-shadow: 1px 4px 22px -8px #0004;
    display: flex;
    overflow: hidden;
  }

  .login_box .left {
    width: 41%;
    height: 100%;
    padding: 25px 25px;

  }

  .login_box .right {
    width: 59%;
    height: 100%
  }

  .left .top_link a {
    color: #452A5A;
    font-weight: 400;
  }

  .left .top_link {
    height: 20px
  }

  .left .contact {
    display: flex;
    align-items: center;
    justify-content: center;
    align-self: center;
    height: 100%;
    width: 73%;
    margin: auto;
  }

  .left h3 {
    text-align: center;
    margin-bottom: -5px;
    color: #6E7C7C
  }

  .left input {
    border: none;
    width: 80%;
    margin: 15px 0px 10px;
    border-bottom: 1px solid #4f30677d;
    padding: 7px 9px;
    width: 100%;
    overflow: hidden;
    background: transparent;
    font-weight: 600;
    font-size: 14px;
  }

  .left {
    background: linear-gradient(-45deg, #dcd7e0, #fff);
  }

  .submit {
    border: none;
    padding: 15px 70px;
    border-radius: 8px;
    display: block;
    margin: auto;
    margin-top: 120px;
    background-color: #6E7C7C;
    color: #fff;
    font-weight: bold;
    -webkit-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
    -moz-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
    box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
  }

  .submit:hover {
    background-color: #A6A9B6;
  }

  .right {
    background: linear-gradient(to bottom, rgba(245, 246, 252, 0.52), #6E7C7C), url(https://static.seattletimes.com/wp-content/uploads/2019/01/web-typing-ergonomics-1020x680.jpg);
    color: #fff;
    position: relative;
  }

  .right .right-text {
    height: 100%;
    position: relative;
    transform: translate(0%, 45%);
  }

  .right-text h2 {
    display: block;
    width: 100%;
    text-align: center;
    font-size: 50px;
    font-weight: 500;
  }

  .right-text h5 {
    display: block;
    width: 100%;
    text-align: center;
    font-size: 19px;
    font-weight: 400;
  }

  .right .right-inductor {
    position: absolute;
    width: 70px;
    height: 7px;
    background: #fff0;
    left: 50%;
    bottom: 70px;
    transform: translate(-50%, 0%);
  }

  .top_link img {
    width: 28px;
    padding-right: 7px;
    margin-top: -3px;
  }

  @media (max-width:600px) {
    .login_box {

      margin-left: 20rem;
    }
  }

  .form-group {
    position: relative;
  }

  .password-toggle {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    right: 10px;
    /* Anda bisa menyesuaikan jarak kanan sesuai kebutuhan */
    cursor: pointer;
  }
</style>

<body>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <body>
    <section class="login">
      <div class="login_box">
        <div class="left">
          <div class="top_link"><a href="/absensi-codeigniter3"><img src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download" alt="">Return home</a></div>
          <div class="contact">
            <form action="<?php echo base_url(); ?>Auth/register_karyawan" method="post" enctype="multipart/form-data">
              <h3>SIGN UP</h3>
              <input style="margin-top:25px" type="email" name="email" placeholder="EMAIL" required>
              <input type="username" name="username" placeholder="USERNAME" required>
              <input type="text" name="nama_depan" placeholder="NAMA DEPAN" required="">
              <input type="text" name="nama_belakang" placeholder="NAMA BELAKANG" required="">
              <input type="hidden" name="role" value="admin">
              <input type="hidden" name="foto" value="user.png">
              <div class="form-group">
                <input type="password" name="password" id="password" class="form-control" placeholder="PASSWORD" required>
                <i class="password-toggle fa fa-eye" onclick="togglePassword()"></i>
              </div>
              <button class="submit">REGISTER</button>
            </form>
          </div>
        </div>
        <div class="right">
          <div class="right-text">
            <h2>REGISTER</h2>
            <h5>TO GO TO THE NEXT PAGE </h5>
          </div>

        </div>
      </div>
    </section>
  </body>

</html>
<script type="text/javascript">
  function togglePassword() {
    var passwordField = document.getElementById('password');
    var passwordToggle = document.querySelector('.password-toggle');

    if (passwordField.type === "password") {
      passwordField.type = "text";
      passwordToggle.classList.remove('fa-eye-slash');
      passwordToggle.classList.add('fa-eye');
    } else {
      passwordField.type = "password";
      passwordToggle.classList.remove('fa-eye');
      passwordToggle.classList.add('fa-eye-slash');
    }
  }
</script>

</body>

</html>