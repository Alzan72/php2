<?php
include 'koneksi.php';


$hapus=$_POST['id'];
if (isset($hapus)) {
    # code...

foreach ($hapus as $key => $d) {
$data_split = explode(',', $d);
// echo $key . ': ' . $data_split[0] . ' - ' . $data_split[1] . '<br>';
$id_pen=$data_split[0];
$id_prof=$data_split[1];
// var_dump($id_pen);
// var_dump($id_prof);die;
$mysql="SELECT foto FROM profil WHERE ID=$id_prof";
$hasil=$conn->query($mysql);
$data=$hasil->fetch_assoc();
$file=@$data['foto'];
unlink('img/'.$file);

$sql="DELETE FROM penempatan WHERE `penempatan`.`id` = $id_pen";
$conn->query($sql);
$sql="DELETE FROM profil WHERE ID = $id_prof  ";
$conn->query($sql);


  };
  header("location:tampil.php?pesan=hapus");
}
else {
    header("location:tampil.php?pesan=gagal");
}
?>