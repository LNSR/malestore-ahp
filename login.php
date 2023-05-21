<?php
error_reporting(1);

ob_start();
session_start();

<<<<<<< Updated upstream
$koneksi = new mysqli("localhost", "root", "", "malestore");

if ($_SESSION['admin'] || $_SESSION['user']) {

  header("location:?page=index");
} else {

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="shortcut icon" href="img/logo.png" />
    <title>MALESTORE | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <!-- Bootstrap -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/plugins/nprogress/nprogress.css">
    <link rel="stylesheet" href="assets/plugins/build/css/custom.min.css">
    <style type="text/css">
      body {
        background-image: url('img/alog.jpg');
        background-size: 100%;
      }

      .login-page {
        width: 400px;
        margin: 45px auto;
        border-radius: 10px;
      }

      .form {
        z-index: 1;
        background: rgba(255, 255, 255);
        max-width: 400px;
        padding: 35px;
        text-align: center;
        border-radius: 10px;
      }

      h1,
      a,
      p {
        color: #000;
      }
    </style>
  </head>

  <body>
    <div>
      <div class="login-page">
        <div class="form">
          <img src="img/logo.jpg" width="200px">
          <h3 style="color: #555; font-weight: bold; padding-top: 50px;">Silahkan Login
          </h3>
          <section class="login_content" style="padding-top: 0px;">
            <form action="login.php" method="post">
              <div class="col-xs-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" id="username" name="username" placeholder="Username" style="margin-bottom: 5px;">
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
=======
// if user is already logged in, redirect to index.php if true
if (isset($_SESSION['admin']) || isset($_SESSION['karyawan'])) {
  header("location:index.php");
  exit;
}

// Define form fields as an array
$form_fields = array(
  array(
    'id' => 'username',
    'name' => 'username',
    'placeholder' => 'Username',
    'icon' => 'fa-user'
  ),
  array(
    'id' => 'password',
    'name' => 'password',
    'placeholder' => 'Password',
    'icon' => 'fa-lock'
  )
);

// Check if login form is submitted
if (isset($_POST['Login'])) {
  // Get username and password from form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Query database for user with matching username
  $sql = $koneksi->prepare("SELECT * from user where username=?");
  $sql->bind_param("s", $username);
  $sql->execute();
  $result = $sql->get_result();

  // Fetch user data and count number of rows returned
  $data = $result->fetch_assoc();
  $ketemu = $result->num_rows;

  // If user is found, verify password and set session variable and redirect to index.php
  if ($ketemu >= 1 && password_verify($password, $data['password'])) {
    $_SESSION[$data['tipe']] = $data['nama'];
    $_SESSION[$data['admin']] = $data['id_users'];
    header("location:index.php");
    exit;
  } else {
    // If user is not found or password is incorrect, display error message using JavaScript
    echo "<script>alert('Login Gagal !! Username atau Password Salah, Silahkan Ulangi Lagi');</script>";
  }

  // Check if password needs to be updated (e.g. when using a new hashing algorithm or a stronger one)
  if (isset($data) && password_needs_rehash($data['password'], PASSWORD_DEFAULT)) {
    // Generate new hashed password and update the record
    $new_hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = $koneksi->prepare("UPDATE user SET password=? WHERE username=?");
    $sql->bind_param("ss", $new_hashed_password, $username);
    $sql->execute();
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="img/logo.png" />
  <title>MALESTORE | Log in</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="assets/plugins/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/plugins/nprogress/nprogress.css">
  <link rel="stylesheet" href="assets/plugins/build/css/custom.min.css">
  <style type="text/css">
    body {
      background-image: url('img/alog.jpg');
      background-size: 100%;
    }
    .login-page {
      width: 400px;
      margin: 45px auto;
      border-radius: 10px;
    }
    .form {
      z-index: 1;
      background: rgba(255, 255, 255);
      max-width: 400px;
      padding: 35px;
      text-align: center;
      border-radius: 10px;
    }
    h1, a, p {
      color: #000;
    }
  </style>
</head>
<body>
  <div>
    <div class="login-page">
      <div class="form">
        <img src="img/logo.jpg" width="200px">
        <h3 style="color: #555; font-weight: bold; padding-top: 50px;">Silahkan Login</h3>
        <section class="login_content" style="padding-top: 0px;">
          <form action="login.php" method="post">
            <?php
            // Loop through form fields array and output HTML for each field
            foreach ($form_fields as $field) {
              echo '<div class="col-xs-12 form-group has-feedback">';
              echo '<input type="' . ($field['name'] == 'password' ? 'password' : 'text') . '" class="form-control has-feedback-left" id="' . $field['id'] . '" name="' . $field['name'] . '" placeholder="' . $field['placeholder'] . '" style="margin-bottom: 5px;">';
              echo '<span class="fa ' . $field['icon'] . ' form-control-feedback left" aria-hidden="true"></span>';
              echo '</div>';
            }
            ?>
            <div>
              <button class="btn btn-primary" style="width: 94%; margin-bottom: 30px; margin-left: 5px; background-color: #0033aa; border-radius: 20px; height: 40px; font-size: 15px;" type="submit" name="Login">Login</button>
            </div>
            <div class="separator">
              <br />
              <div>
                <p>Aplikasi Penilaian Kinerja Karyawan Malestore</p>
>>>>>>> Stashed changes
              </div>
              <div class="col-xs-12 form-group has-feedback">
                <input type="password" class="form-control has-feedback-left" id="password" name="password" placeholder="Password" required>
                <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div>
                <button class="btn btn-primary" style="width: 94%; margin-bottom: 30px; margin-left: 5px; background-color: #0033aa; border-radius: 20px; height: 40px; font-size: 15px;" type="submit" name="Login">Login</button>
              </div>
              <div class="separator">
                <br />

                <div>
                  <p>Aplikasi Penilaian Kinerja Karyawan Malestore</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>

  </html>
  <?php
  if (isset($_POST['Login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = $koneksi->query("SELECT * from user where username='$username' and password='$password'");

    $data = $sql->fetch_assoc();

    $ketemu = $sql->num_rows;

    if ($ketemu >= 1) {

      session_start();

      if ($data['tipe'] == "admin") {

        $_SESSION['admin'] = $data['nama'];

        header("location:index.php");
      } else if ($data['tipe'] == "user") {

        $_SESSION['user'] = $data['nama'];

        header("location:index.php");
      } else if ($data['tipe'] == "karyawan") {

        $_SESSION['karyawan'] = $data['nama'];

        header("location:indexkaryawan.php");
      }
    } else {

  ?>
      <script type="text/javascript">
        alert("Login Gagal !! Username atau Password Salah, Silahkan Ulangi Lagi");
      </script>
<?php
    }
  }
}
?>