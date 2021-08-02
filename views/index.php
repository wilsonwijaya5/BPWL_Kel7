<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../assets/Login/fonts/icomoon/style.css">

  <link rel="stylesheet" href="../assets/Login/css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../assets/Login/css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="../assets/Login/css/style.css">

  <title>Login</title>
</head>

<body>


  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('../assets/Login/images/gg.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3><strong>Login</strong></h3>
            <form action="../controllers/proses.php?aksi=login" method="post">
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="Your Username" name="username">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Your Password" name="password">
              </div>

              <div class="form-group mb-4">
                <label for="loremipsum"></label>
                <input type="submit" value="Log In" class="btn btn-block btn-primary">
              </div>


              <a href="register.php">Register </a>
          </div>

          </form>
        </div>
      </div>
    </div>
  </div>


  </div>



  <script src="../assets/Login/js/jquery-3.3.1.min.js"></script>
  <script src="../assets/Login/js/popper.min.js"></script>
  <script src="../assets/Login/js/bootstrap.min.js"></script>
  <script src="../assets/Login/js/main.js"></script>
</body>

</html>