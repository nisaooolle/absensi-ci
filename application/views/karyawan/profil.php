<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<style>
  h2 {
    font-family: "Poppins";
    font-size: 36px;

    margin-bottom: 15px;
  }

  h3 {
    font-size: 24px;
    font-weight: 500;
    color: rgba(34, 34, 34, 0.5);

    margin-bottom: 25px;
    margin-top: 0px;
  }

  h3,
  span,
  p {
    font-family: "Avenir";
  }

  .profile_container,
  .info,
  .back {
    margin: 60px 100px 0px;
    max-width: 900px;
    display: flex;
    overflow-x: hidden;
  }

  .back {
    display: flex;
    align-items: center;
    color: rgba(34, 34, 34, 0.5);
  }

  .back i {
    margin-right: 15px;
  }

  .profile_img-LG {
    height: 400px;
    width: 300px;
    border-radius: 40px;

    object-fit: cover;
    object-position: 50% 50%;

    background-position: 40% 50%;
  }

  .flag_wrapper {
    width: 50px;
    height: 50px;
    background-color: #f2f2f2;
    border-radius: 100%;
    position: relative;
    top: -70px;
    left: 230px;
  }

  .flag {
    width: 30px;
    height: 30px;
    position: absolute;
    right: 0;
    left: 0;
    top: 0;
    bottom: 0;
    margin: auto auto;
  }

  .description {
    margin-bottom: 30px;
    margin-top: 0px;
  }

  .profile_img_section {
    margin-right: 50px;
  }

  .profile_desc_section {
    display: flex;
    flex-direction: column;

    margin-left: 50px;
  }

  .interests_item {
    display: inline-block;
    padding: 5px 15px;
    margin-right: 7.5px;
    margin-bottom: 10px;
    line-height: 35px;
    background-color: #e6e6e6;
    border-radius: 5px;

    color: rgba(34, 34, 34, 0.5);
  }

  .info {
    margin-top: -20px;
    margin-left: 100px;
  }

  .link_img_wrapper {
    width: 40px;
    height: 40px;
    background-color: #f2f2f2;
    border-radius: 10px;
    position: relative;
  }

  .link_img {
    height: 20px;
    width: 20px;
    position: absolute;
    right: 0;
    left: 0;
    top: 0;
    bottom: 0;
    margin: auto auto;
  }

  ul {
    padding: 0px;
  }

  li {
    display: flex;
    flex-direction: row;
    align-items: center;
    margin-bottom: 5px;
  }

  li p {
    margin-left: 30px;
    color: rgba(34, 34, 34, 0.5);
  }

  @media screen and (max-width: 1000px) {

    .profile_container,
    .info,
    .back {
      margin: 60px 33px 0px;
    }

    .profile_container {
      flex-direction: column;
    }

    .profile_img_section {
      margin: 0 auto;
    }

    .profile_img-LG {
      width: 300px;
      height: 300px;
      border-radius: 100%;
    }

    .flag_wrapper {}

    .profile_desc_section {
      margin-left: 0px;
      margin-bottom: 10px;
      margin-top: -40px;
    }

    .info {
      margin-top: 10px;
      margin-left: 33px;
    }
  }
</style>

<body>
  <span class="back">
  <i class="fa-solid fa-backward"></i><a href="/absensi-codeigniter3/karyawan">
    back</a>
  </span>

  <section class="profile_container">
  <?php foreach($user as $row ): ?>
    <div class="profile_img_section">
    <img src="<?php echo base_url('images/karyawan/' . $row->image) ?>" width="50" alt="">
        <img class="flag" src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/240/apple/271/flag-south-korea_1f1f0-1f1f7.png" alt="South Korean Flag" />
      </div>
      <?php endforeach; ?>
    </div>
    <div class="d-flex align-items-center">
          <div class="card w-100 m-auto p-3 ">
              <?php foreach($user as $data_akun ): ?>
              <h3 class="text-center">Akun</h3>
              <form action="<?php echo base_url('karyawan/profil')?>" enctype="multipart/form-data" method="post" class="row">
                  <div class="mb-3 col-6">
                      <label for="nama" class="form-label">Email</label>
                      <input type="text" class="form-control" id="email" name="email" value="<?php echo $data_akun->email?>">
                  </div>
                  <div class="mb-3 col-6">
                      <label for="nama" class="form-label">Username</label>
                      <input type="text" class="form-control" id="username" name="username"value="<?php echo $data_akun->username?>">
                  </div>
                  <div class="mb-3 col-6">
                      <label for="nama" class="form-label">Password Baru</label>
                      <input type="text" class="form-control" id="password_baru" name="password_baru" placeholder="Password Baru">
                  </div>
                  <div class="mb-3 col-6">
                      <label for="kelas" class="form-label">Konfirmasi Password</label>
                      <input type="text" class="form-control" id="konfirmasi_password" name="konfirmasi_password" placeholder="Konfirmasi Password">
                  </div>
                  <div class="mb-3 col-6">
                      <label for="nama" class="form-label">Foto</label>
                      <input type="file" class="form-control" id="foto" name="image">
                  </div>
                  <button type="submit" class="btn btn-primary" name="submit">Ubah</button>
              </form>
              <?php endforeach; ?>
          </div>
      </div>
  </section>
</body>

</html>