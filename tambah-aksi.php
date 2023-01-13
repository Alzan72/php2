<<<<<<< HEAD
    <?php
include 'koneksi.php';

$nama=@$_POST['nama'];
$alamat=@$_POST['alamat'];
$jk=@$_POST['jk'];
$jurusan=@$_POST['jurusan'];

//file
$namafile=@$_FILES['file']['name'];
$ukuranfile=@$_FILES['file']['size'];
$temp=@$_FILES['file']['tmp_name'];
$tipefile=strtolower(pathinfo($namafile,PATHINFO_EXTENSION));
$ekstensi=['png','jpg','jpeg'];
$random=rand();
$namafilesimpan=$random.'-'.$namafile;
$direktori='img/';
// move_uploaded_file($temp, $direktori.$namafile);
if ($ukuranfile > 2000000) {
    header("location:index.php?pesan=ukuran");
} else {
    if (!in_array($tipefile,$ekstensi)) {
        header("location:index.php?pesan=ekstensi");
    }else {
        move_uploaded_file($temp, $direktori.$namafilesimpan);
        $sql="INSERT INTO `profil` (`nama`,  `jenis-kelamin`,`alamat`, `jurusan`, `foto`) VALUES ('$nama', '$jk','$alamat', '$jurusan', '$namafilesimpan');";

$conn->query($sql);
header("location:index.php?pesan=berhasil");
    }
}



=======
    <?php
include 'koneksi.php';

$nama=@$_POST['nama'];
$alamat=@$_POST['alamat'];
$jk=@$_POST['jk'];
$jurusan=@$_POST['jurusan'];

//file
$namafile=@$_FILES['file']['name'];
$ukuranfile=@$_FILES['file']['size'];
$temp=@$_FILES['file']['tmp_name'];
$tipefile=strtolower(pathinfo($namafile,PATHINFO_EXTENSION));
$ekstensi=['png','jpg','jpeg'];
$random=rand();
$namafilesimpan=$random.'-'.$namafile;
$direktori='img/';
// move_uploaded_file($temp, $direktori.$namafile);
if ($ukuranfile > 2000000) {
    header("location:index.php?pesan=ukuran");
} else {
    if (!in_array($tipefile,$ekstensi)) {
        header("location:index.php?pesan=ekstensi");
    }else {
        move_uploaded_file($temp, $direktori.$namafilesimpan);
        $sql="INSERT INTO `profil` (`nama`,  `jenis-kelamin`,`alamat`, `jurusan`, `foto`) VALUES ('$nama', '$jk','$alamat', '$jurusan', '$namafilesimpan');";

$conn->query($sql);
header("location:index.php?pesan=berhasil");
    }
}



>>>>>>> 4396171c90a3b988b1e92d78850edc245ff6987c
?>