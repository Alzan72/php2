<?php
$host='localhost';
$user='root';
$pass='';
$dbname='php2';

$conn= new mysqli($host,$user,$pass,$dbname);

if (!$conn) {
    die('koneksi gagal');
}

?>