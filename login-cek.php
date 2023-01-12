<?php
session_start();
include 'koneksi.php';

$username=$_POST['username'];
$password=$_POST['password'];

$sql="SELECT * FROM `login` WHERE username='$username' and password='$password'";

$hasil=$conn->query($sql);
$cek=$hasil->num_rows;

if ($cek > 0) {
    if (isset($_POST['remember'])) {
        setcookie('login','berhasil',time()+60);
        setcookie('user',$username , time()+60);
    }
    
    // @$_SESSION['user']=$username;
    // @$_SESSION['status']="sukses";
    // header("location:tampil.php");

    //multi-user
    $data=$hasil->fetch_assoc();
    if ($data['hak']=='admin') {
    @$_SESSION['user']=$username;
    @$_SESSION['status']="sukses";
    header("location:tampil.php");

    }elseif ($data['hak']=='user') {
     $_SESSION['user']=$username;
    $_SESSION['status']="sukses";

    header("location:index.php?pesan=sukses");
    }
    
}else {
    header("location:login.php?pesan=gagal");
}

?>