<!doctype html>
<html>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Login - E-Man</title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
  <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    .background {
      background-color: rgba(0, 0, 0, 0.7);
    }

    body.snippet-body {
      font-size: 14px;
      background-image: url(<?= base_url(); ?>assets/assets/img/suryati.jpg) !important;
      background-size: cover !important;
      background-position: center top !important;
    }

    .upper {
      padding: 6vh 6vh 3vh 6vh;
    }

    .lower {
      padding: 3vh 0 3vh;
      text-align: center;
    }

    .heading {
      display: flex;
      align-items: center;
      vertical-align: middle;
    }

    .heading p {
      margin-bottom: 0;
    }

    input {
      border: 1px solid rgba(0, 0, 0, 0.137);
      padding: 0.75rem;
      outline: none;
      width: 100%;
      min-width: unset;
      background: rgba(151, 151, 151, 0.212) !important;
    }

    .form-element {
      margin: 3vh 0;
    }

    form .col-3,
    .col-9,
    .col-1,
    .col--11 {
      padding: 0;
      width: min-content;
    }

    form .col-11 {
      padding-left: 10px;
    }

    form .col-1 {
      display: flex;
      align-items: center;
      color: red;
      font-size: 3vh;
      justify-content: center;
    }

    #code {
      text-align: center;
    }

    form .row {
      margin: 0;
    }

    hr {
      margin: 0;
      border-top: 2px solid rgba(0, 0, 0, .1);
    }

    #input-header {
      color: grey;
    }

    .invalid {
      color: grey;
      line-height: 1.2;
    }

    .btn {
      width: 50%;

      color: white;
      padding: 1.5vh 0;
    }

    .btn:focus {
      box-shadow: none;
      outline: none;
      box-shadow: none;
      color: white;
      -webkit-box-shadow: none;
      -webkit-user-select: none;
      transition: none;
    }

    .btn:hover {
      color: white;
    }

    input {
      border: none;
    }

    input[type="submit"] {
      color: #fff;
      background-color: #17583a !important;
      border-color: #17583a !important;
      font-size: 17px !important;
      text-transform: uppercase;
      border-radius: 5px !important;
    }

    p>a {
      display: flex;
      justify-content: center;
    }

    div#infoMessage p {
      text-align: center;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 0;
      padding: 10px;
    }

    form {
      margin-top: 20px;
    }

    .backToHome {
      text-decoration: none;
    }

    i#passwordIcon {
      color: #17583a;
    }

    button#togglePassword {
      background-color: transparent !important;
      border: 1px solid #ced4da;
      width: 18%;
    }

    input#identity {
      height: 50px;
    }
  </style>
</head>

<body class='snippet-body'>
  <div class="Container">
    <div class="row">
      <div class="col-lg-12 background">
        <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
          <div class="card" style="background-color: #fff !important; border:solid 0px !important;">
            <div class="upper">
              <div class="row">
                <h1 class="text-center"><?php echo lang('login_heading'); ?></h1><br>
                <div class="alert-warning" id="infoMessage"><?php echo $message; ?></div>
              </div>

              <form action="<?php echo base_url('auth/login'); ?>" method="post">
                <div class="input-group mb-3">
                  <input class="form-control" type="text" name="identity" id="identity" value="<?php echo set_value('identity'); ?>" placeholder="Email">
                </div>

                <div class="input-group">
                  <input type="password" name="password" id="password" value="<?php echo set_value('password'); ?>" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="togglePassword">
                  <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                    <i class="bi bi-eye-slash-fill" id="passwordIcon"></i>
                  </button>
                </div>


                <p class="mt-5">
                  <input type="submit" name="submit" value="Login">
                </p>
              </form>
              <div class="row d-flex justify-content-center">
                <a class="backToHome mt-4 text-center w-100" href="<?= base_url('/') ?>">Kembali ke Beranda</a>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'></script>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password');
        const passwordIcon = document.getElementById('passwordIcon');

        togglePassword.addEventListener('click', function() {
          const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
          passwordField.setAttribute('type', type);
          if (type === 'password') {
            passwordIcon.classList.remove('bi-eye-fill');
            passwordIcon.classList.add('bi-eye-slash-fill');
          } else {
            passwordIcon.classList.remove('bi-eye-slash-fill');
            passwordIcon.classList.add('bi-eye-fill');
          }
        });
      });
    </script>
</body>

</html>