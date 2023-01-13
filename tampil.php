<<<<<<< HEAD
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
    
<div class="container">
  <?php
  $menu='Data';
  include 'navbar.php';
  ?>
 
    <div class="row">
        <div class="col">
        <table class="table">
  <thead>
    <tr>
    <th scope="col">#</th>
      <th scope="col">Pilih</th>
      <th scope="col">Nama</th>
      <th scope="col">Jenis-kelamin</th>
      <th scope="col">Alamat</th>
      <th scope="col">Kelompok</th>
      <th scope="col">Jurusan</th>
      <th scope="col">Foto</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <form action="hapus.php" method="post">
  <?php

  session_start();

  // if (@$_SESSION['status']!="sukses") {
  //   header("location:login.php?pesan=belum");
  // }else {
  //   echo"";
  // }
    if (isset($_COOKIE['login'])) {
      if ($_COOKIE['login']=='berhasil') {
          $_SESSION['status']='sukses';
          $_SESSION['user']=$_COOKIE['user'];
      };
    };


  if(@$_SESSION['status']!="sukses" ){
    header("location:login.php?pesan=belum");
  } 

if (isset($_GET['pesan'])) {
  if ($_GET['pesan']=='hapus') {
    echo "<script>alert('Data berhasil dihapus')</script>";
}elseif ($_GET['pesan']=='gagal') {
  echo "<script>alert('Pilih data yang ingin dihapus')</script>";
} elseif ($_GET['pesan']=='ubah') {
  echo "<script>alert('Data berhasil diubah')</script>";
} 
elseif ($_GET['pesan']=='ukuran') {
  echo "<script>alert('Ukuran file maksimal 2MB')</script>";
} 
elseif ($_GET['pesan']=='ekstensi') {
  echo "<script>alert('File harus .jpg  .png  .jpeg')</script>";
} 
// elseif ($_GET['pesan']=='belum') {
//   echo "<script>alert('Login dahulu')</script>";
// } 
}

  include 'koneksi.php';
  $cari=@$_GET['cari'];
  $car=@$_GET['car'];
  if (isset($cari)) {
    $sql="SELECT `profil`.*,kelompok.Kelompok, penempatan.id FROM profil Left JOIN penempatan on penempatan.id_profil=profil.ID LEFT join kelompok on kelompok.ID=penempatan.id_kelompok WHERE Nama LIKE'%$cari%' OR Alamat LIKE'%$cari%' OR Kelompok LIKE'%$cari%' OR Jurusan LIKE'%$cari%'  ";
  } else {
    $sql=" SELECT `profil`.*,kelompok.Kelompok, penempatan.id FROM profil Left JOIN penempatan on penempatan.id_profil=profil.ID LEFT join kelompok on kelompok.ID=penempatan.id_kelompok;";
  }

  

  $hasil=$conn->query($sql);
  $no=1;

  echo '<form action="hapus.php" method="post">';
 while ($data=$hasil->fetch_assoc()) {

 ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $no ?></th>
      <td><input type="checkbox" name="id[]"value="<?php echo $data['id'] ?>, <?php echo $data['ID'] ?>">
      <td><?php echo $data['nama'];?></td>
      <td><?php echo $data['jenis-kelamin'];?></td>
      <td><?php echo $data['alamat'];?></td>
      <td><?php echo $data['Kelompok'] ?></td>
      <td><?php echo $data['jurusan'];?></td>
      <td><?php echo "<img src='img/".$data['foto']."' width=60px height=60px alt=''>"?></td>
      <input type="hidden" name="file" value="<?php echo $data['foto'] ?>">
    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-id="<?php echo $data['ID']?>">Ubah</button>

  
</td>
    
      <?php
      $no++;  
      ?>
    </tr>
    
  </tbody>
  <?php
  }
  ?>
  <button class="btn btn-danger text-end" onclick="confirm('Apakah anda yakin ingin menghapus')" >X Hapus </button>
    </form>
  
</table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- FORM -->
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-aksi="ubah">Ubah</button> -->
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

</body>


<script>
   
    $(document).ready(function() {
        // alert('Hallo');

        const modal = document.getElementById('exampleModal')
        modal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget
            const id = button.getAttribute('data-bs-id');
            // const ubah = button.getAttribute('data-bs-aksi');
            $.post('getdata-copy.php', {id}, function () {

            }).done(function (x) {
                // alert:("done")
                $('.modal-body').html(x);
            })
            .fail(function(){
                alert:("error");
            })
            .always(function() {

            });
        });
    });
</script>
</html>

<?php
// List script

// SELECT `profil`.* ,penempatan.id,kelompok.Kelompok FROM profil JOIN penempatan on penempatan.id_profil=profil.ID JOIN kelompok on kelompok.ID=penempatan.id_kelompok;

//SELECT `profil`.*,kelompok.Kelompok FROM profil Left JOIN penempatan on penempatan.id_profil=profil.ID join kelompok on kelompok.ID=penempatan.id_kelompok;

?>


<!--  <div class="row text-end">
    <div class="col"><a href="logout.php" class="btn btn-warning text-end"><<-- Log out</a></div>
    <div class="col">
      <form action="" method="get">
       
      <input class="" type="text" name="cari" placeholder="Cari kata...">
      <button name="car">Search</button>
    </form></div>
=======
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
    
<div class="container">
  <?php
  $menu='Data';
  include 'navbar.php';
  ?>
 
    <div class="row">
        <div class="col">
        <table class="table">
  <thead>
    <tr>
    <th scope="col">#</th>
      <th scope="col">Pilih</th>
      <th scope="col">Nama</th>
      <th scope="col">Jenis-kelamin</th>
      <th scope="col">Alamat</th>
      <th scope="col">Kelompok</th>
      <th scope="col">Jurusan</th>
      <th scope="col">Foto</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <form action="hapus.php" method="post">
  <?php

  session_start();

  // if (@$_SESSION['status']!="sukses") {
  //   header("location:login.php?pesan=belum");
  // }else {
  //   echo"";
  // }
    if (isset($_COOKIE['login'])) {
      if ($_COOKIE['login']=='berhasil') {
          $_SESSION['status']='sukses';
          $_SESSION['user']=$_COOKIE['user'];
      };
    };


  if(@$_SESSION['status']!="sukses" ){
    header("location:login.php?pesan=belum");
  } 

if (isset($_GET['pesan'])) {
  if ($_GET['pesan']=='hapus') {
    echo "<script>alert('Data berhasil dihapus')</script>";
}elseif ($_GET['pesan']=='gagal') {
  echo "<script>alert('Pilih data yang ingin dihapus')</script>";
} elseif ($_GET['pesan']=='ubah') {
  echo "<script>alert('Data berhasil diubah')</script>";
} 
elseif ($_GET['pesan']=='ukuran') {
  echo "<script>alert('Ukuran file maksimal 2MB')</script>";
} 
elseif ($_GET['pesan']=='ekstensi') {
  echo "<script>alert('File harus .jpg  .png  .jpeg')</script>";
} 
// elseif ($_GET['pesan']=='belum') {
//   echo "<script>alert('Login dahulu')</script>";
// } 
}

  include 'koneksi.php';
  $cari=@$_GET['cari'];
  $car=@$_GET['car'];
  if (isset($cari)) {
    $sql="SELECT `profil`.*,kelompok.Kelompok, penempatan.id FROM profil Left JOIN penempatan on penempatan.id_profil=profil.ID LEFT join kelompok on kelompok.ID=penempatan.id_kelompok WHERE Nama LIKE'%$cari%' OR Alamat LIKE'%$cari%' OR Kelompok LIKE'%$cari%' OR Jurusan LIKE'%$cari%'  ";
  } else {
    $sql=" SELECT `profil`.*,kelompok.Kelompok, penempatan.id FROM profil Left JOIN penempatan on penempatan.id_profil=profil.ID LEFT join kelompok on kelompok.ID=penempatan.id_kelompok;";
  }

  

  $hasil=$conn->query($sql);
  $no=1;

  echo '<form action="hapus.php" method="post">';
 while ($data=$hasil->fetch_assoc()) {

 ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $no ?></th>
      <td><input type="checkbox" name="id[]"value="<?php echo $data['id'] ?>, <?php echo $data['ID'] ?>">
      <td><?php echo $data['nama'];?></td>
      <td><?php echo $data['jenis-kelamin'];?></td>
      <td><?php echo $data['alamat'];?></td>
      <td><?php echo $data['Kelompok'] ?></td>
      <td><?php echo $data['jurusan'];?></td>
      <td><?php echo "<img src='img/".$data['foto']."' width=60px height=60px alt=''>"?></td>
      <input type="hidden" name="file" value="<?php echo $data['foto'] ?>">
    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-id="<?php echo $data['ID']?>">Ubah</button>

  
</td>
    
      <?php
      $no++;  
      ?>
    </tr>
    
  </tbody>
  <?php
  }
  ?>
  <button class="btn btn-danger text-end" onclick="confirm('Apakah anda yakin ingin menghapus')" >X Hapus </button>
    </form>
  
</table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- FORM -->
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-aksi="ubah">Ubah</button> -->
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

</body>


<script>
   
    $(document).ready(function() {
        // alert('Hallo');

        const modal = document.getElementById('exampleModal')
        modal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget
            const id = button.getAttribute('data-bs-id');
            // const ubah = button.getAttribute('data-bs-aksi');
            $.post('getdata-copy.php', {id}, function () {

            }).done(function (x) {
                // alert:("done")
                $('.modal-body').html(x);
            })
            .fail(function(){
                alert:("error");
            })
            .always(function() {

            });
        });
    });
</script>
</html>

<?php
// List script

// SELECT `profil`.* ,penempatan.id,kelompok.Kelompok FROM profil JOIN penempatan on penempatan.id_profil=profil.ID JOIN kelompok on kelompok.ID=penempatan.id_kelompok;

//SELECT `profil`.*,kelompok.Kelompok FROM profil Left JOIN penempatan on penempatan.id_profil=profil.ID join kelompok on kelompok.ID=penempatan.id_kelompok;

?>


<!--  <div class="row text-end">
    <div class="col"><a href="logout.php" class="btn btn-warning text-end"><<-- Log out</a></div>
    <div class="col">
      <form action="" method="get">
       
      <input class="" type="text" name="cari" placeholder="Cari kata...">
      <button name="car">Search</button>
    </form></div>
>>>>>>> 4396171c90a3b988b1e92d78850edc245ff6987c
  </div> -->