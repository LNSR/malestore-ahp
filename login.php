<?php
// Include config file and start session
require 'config.php';
session_start();
error_reporting(1);
// Check if user is already logged in, redirect to index.php if true
if (isset($_SESSION['admin']) || isset($_SESSION['karyawan'])) {
  header("location:index.php");
  exit;
}

// Check if login form is submitted
if (isset($_POST['Login'])) {
  // Get username and password from form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Query database for user with matching username
  $stmt = $koneksi->prepare("SELECT * FROM user WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();

  // If user is found, verify password and set session variable
  if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();

    // Check if the password needs to be updated
    if (password_needs_rehash($user['password'], PASSWORD_DEFAULT)) {
      // Generate a new password hash and update the database
      $new_password = password_hash($password, PASSWORD_DEFAULT);
      $stmt = $koneksi->prepare("UPDATE user SET password = ? WHERE username = ?");
      $stmt->bind_param("ss", $new_password, $username);
      $stmt->execute();
    
      echo "<script>alert('Update Keamanan, silakan login memakai password yang sama');</script>";
    }

    if (password_verify($password, $user['password'])) {
      $_SESSION[$user['tipe']] = $user['nama'];
      $_SESSION['id_users'] = $user['id_users'];
      $_SESSION['tipe'] = $user['tipe'];

      header("location:index.php");
      exit;
    }
  }

  // If user is not found or password is incorrect, display error message
  echo "<script>alert('Login Gagal !! Username atau Password Salah');</script>";
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
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.css">
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.css">
  <link rel="stylesheet" href="assets/plugins/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="assets/plugins/nprogress/nprogress.css">
  <link rel="stylesheet" href="assets/plugins/build/css/custom.css">
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
              </div>
            </div>
          </form>
        </section>
      </div>
    </div>
  </div>
</body>
</html>