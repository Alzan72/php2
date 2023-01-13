

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- css&js bs -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>
<body>

<?php
session_start();
$menu='Daftar';
include 'navbar.php';

if ($_SESSION['status']!="sukses") {
  header("location:login.php?pesan=belum");
}
if (isset($_GET['pesan'])) {
  # code...

if ($_GET['pesan']=='berhasil') {
    echo "<script>alert('Data berhasil masuk')</script>";
}elseif ($_GET['pesan']=='ukuran') {
  echo "<script>alert('Ukuran file maksimal 2MB')</script>";
} elseif ($_GET['pesan']=='ekstensi') {
  echo "<script>alert('Ekstensi harus .jpg  .png  .jpeg')</script>";
} 
}
?>

<!-- Form -->

<div class="row text-end">
    <div class="col"><a href="logout.php" class="btn btn-warning text-end"><-- Log out</a></div>
  </div>
<form action="tambah-aksi.php" method="post"  enctype="multipart/form-data">
<div class="container mt-5">
  <!-- nama -->
<div class="form-floating mb-3">
  <input type="text" name="nama" class="form-control" id="floatingInput" placeholder="Masukkan nama" required>
  <label for="floatingInput">Nama</label>
</div>

<div><h5>Jenis kelamin</h5></div>
<!-- JK -->
<div class="form-check">
  <input class="form-check-input" type="radio" name="jk" id="flexRadioDefault1" value="laki-laki" required>
  <label class="form-check-label" for="">
    Laki-laki
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="jk" id="flexRadioDefault2" value="perempuan" required>
  <label class="form-check-label" for="">
    Perempuan
  </label>
</div>
<br>

<!-- alamat -->
<div class="form-floating">
  <input type="text" name="alamat" class="form-control" id="floatingPassword" placeholder="Alamat" required>
  <label for="floatingPassword">Alamat</label>
</div><br>

<!-- Jurusan -->
<select name="jurusan" id="jurusan" class="form-select" required>
  <option >Jurusan</option>
  <option value="tkj">TKJ</option>
  <option value="programer">Programer</option>
  <option value="desainer">Desainer</option>
</select>
<br>
<label for="alasan" id="label-alasan" style="display:none;">Alasan memilih jurusan TKJ:</label><br>
  <input type="text" id="alasan" name="alasan" style="display:none;"><br>

<!-- foto -->
<div class="mb-3">
  <label for="formFile" class="form-label">Masukkan foto anda
  </label>
  <input class="form-control" type="file" name="file" id="formFile" required>
</div>


<button  class="btn btn-primary">Tambah</button>
</div>  
</form>  

<script>
   // Fungsi untuk menampilkan input alasan jika opsi TKJ dipilih
   function showAlasan() {
    var jurusan = document.getElementById("jurusan").value;
    if (jurusan == "tkj") {
      document.getElementById("label-alasan").style.display = "block";
      document.getElementById("alasan").style.display = "block";
    } else {
      document.getElementById("label-alasan").style.display = "none";
      document.getElementById("alasan").style.display = "none";
    }
  }
  // Memanggil fungsi showAlasan saat opsi jurusan dipilih
  document.getElementById("jurusan").addEventListener("change", showAlasan);

</script>


</body>
=======

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- css&js bs -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>
<body>

<?php
session_start();
$menu='Daftar';
include 'navbar.php';

if ($_SESSION['status']!="sukses") {
  header("location:login.php?pesan=belum");
}
if (isset($_GET['pesan'])) {
  # code...

if ($_GET['pesan']=='berhasil') {
    echo "<script>alert('Data berhasil masuk')</script>";
}elseif ($_GET['pesan']=='ukuran') {
  echo "<script>alert('Ukuran file maksimal 2MB')</script>";
} elseif ($_GET['pesan']=='ekstensi') {
  echo "<script>alert('Ekstensi harus .jpg  .png  .jpeg')</script>";
} 
}
?>

<!-- Form -->

<div class="row text-end">
    <div class="col"><a href="logout.php" class="btn btn-warning text-end"><-- Log out</a></div>
  </div>
<form action="tambah-aksi.php" method="post"  enctype="multipart/form-data">
<div class="container mt-5">
  <!-- nama -->
<div class="form-floating mb-3">
  <input type="text" name="nama" class="form-control" id="floatingInput" placeholder="Masukkan nama" required>
  <label for="floatingInput">Nama</label>
</div>

<div><h5>Jenis kelamin</h5></div>
<!-- JK -->
<div class="form-check">
  <input class="form-check-input" type="radio" name="jk" id="flexRadioDefault1" value="laki-laki" required>
  <label class="form-check-label" for="">
    Laki-laki
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="jk" id="flexRadioDefault2" value="perempuan" required>
  <label class="form-check-label" for="">
    Perempuan
  </label>
</div>
<br>

<!-- alamat -->
<div class="form-floating">
  <input type="text" name="alamat" class="form-control" id="floatingPassword" placeholder="Alamat" required>
  <label for="floatingPassword">Alamat</label>
</div><br>

<!-- Jurusan -->
<select name="jurusan" id="jurusan" class="form-select" required>
  <option >Jurusan</option>
  <option value="tkj">TKJ</option>
  <option value="programer">Programer</option>
  <option value="desainer">Desainer</option>
</select>
<br>
<label for="alasan" id="label-alasan" style="display:none;">Alasan memilih jurusan TKJ:</label><br>
  <input type="text" id="alasan" name="alasan" style="display:none;"><br>

<!-- foto -->
<div class="mb-3">
  <label for="formFile" class="form-label">Masukkan foto anda
  </label>
  <input class="form-control" type="file" name="file" id="formFile" required>
</div>


<button  class="btn btn-primary">Tambah</button>
</div>  
</form>  

<script>
   // Fungsi untuk menampilkan input alasan jika opsi TKJ dipilih
   function showAlasan() {
    var jurusan = document.getElementById("jurusan").value;
    if (jurusan == "tkj") {
      document.getElementById("label-alasan").style.display = "block";
      document.getElementById("alasan").style.display = "block";
    } else {
      document.getElementById("label-alasan").style.display = "none";
      document.getElementById("alasan").style.display = "none";
    }
  }
  // Memanggil fungsi showAlasan saat opsi jurusan dipilih
  document.getElementById("jurusan").addEventListener("change", showAlasan);

</script>


</body>
>>>>>>> 4396171c90a3b988b1e92d78850edc245ff6987c
</html>