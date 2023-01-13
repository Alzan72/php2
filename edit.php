<?php

include 'koneksi.php';

$id=@$_POST['id'];
$nama=@$_POST['nama'];
$alamat=@$_POST['alamat'];
$jk=@$_POST['jk'];
$kelompok=@$_POST['kelompok'];
$jurusan=@$_POST['jurusan'];
$filelama=@$_POST['filelama'];

// file
$namafile=@$_FILES['file']['name'];
$ukuranfile=@$_FILES['file']['size'];
$temp=@$_FILES['file']['tmp_name'];
$tipefile=strtolower(pathinfo($namafile,PATHINFO_EXTENSION));
$ekstensi=['png','jpg','jpeg'];
$random=rand();
$namafilesimpan=$random.'-'.$namafile;

$sqljoin="SELECT * FROM penempatan WHERE id_profil=$id";
$hasiljoin=$conn->query($sqljoin);
$hasiljoin2=$hasiljoin->fetch_assoc();
// var_dump($hasiljoin);die;

if (empty($namafile)) {
    if (empty($hasiljoin2['id_kelompok']) && $kelompok > 0) {
            insertKelompok();
            updateDataJoin();

    }elseif (isset($hasiljoin2)){
       updateDataJoin();
} else{
   updateDataProfil();
}

}
else {
    if (!in_array($tipefile,$ekstensi)) {
        header("location:tampil.php?pesan=ekstensi");
    } else {
        if ($ukuranfile > 2000000) {
            header("location:tampil.php?pesan=ukuran");
        }
        else {
            $direktori='img/';
            unlink($direktori.$filelama);
            move_uploaded_file($temp, $direktori.$namafilesimpan);

            if (empty($hasiljoin2['id_kelompok']) && $kelompok > 1) {
                insertKelompok();
                updateDataJoin();
                }
                elseif (isset($hasiljoin2)){
                   updateDataJoin();
                }
                else{
                   updateDataProfil();
                }
            
        }
    }    
}
