<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstarp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>
<body>

<?php
if (isset($_GET['pesan'])) {
    if ($_GET['pesan']=='gagal') {
      echo "<script>alert('Username atau password salah')</script>";
  } 
    elseif ($_GET['pesan']=='belum') {
      echo "<script>alert('Login dahulu')</script>";
  } 
    elseif ($_GET['pesan']=='logout') {
      echo "<script>alert('Anda telah logout')</script>";
  } 
}
?>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-sm-5">
        <form class="form-signin" action="login-cek.php" method="post">
  <h1 class="h3 mb-3 font-weight-normal text-center">Please sign in</h1>
  <label for="inputEmail" class="sr-only">Username</label>
  <input type="text" id="inputusername" name="username" class="form-control mb-2" placeholder="Username" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" name="password" class="form-control mb-3" placeholder="Password" required>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember" name="remember"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018</p>
</form>

    </div>
</div>
</div>

</body>
</html>