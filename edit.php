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
    if (empty($hasiljoin2['id_kelompok'])) {
    $sql="INSERT INTO penempatan (id,id_profil,id_kelompok) values (NULL, $id,$kelompok)   ";
   $conn->query($sql);
   $sql2="UPDATE profil p
   INNER JOIN penempatan pe ON p.ID = pe.id_profil
   INNER JOIN kelompok k ON pe.id_kelompok = k.ID
   SET p.nama = '$nama', pe.id_kelompok = '$kelompok', p.jurusan=   '$jurusan' , p.alamat = '$alamat', p.foto = '$filelama'
   WHERE pe.id_profil = $id OR p.ID = $id;";

   $conn->query($sql2);

   header("location:tampil.php?pesan=ubah");

    }else{
        $sql=" UPDATE profil p
        INNER JOIN penempatan pe ON p.ID = pe.id_profil
        INNER JOIN kelompok k ON pe.id_kelompok = k.ID
        SET p.nama = '$nama', pe.id_kelompok = '$kelompok', p.jurusan='$jurusan' , p.alamat = '$alamat', p.foto = '$filelama'
        WHERE pe.id_profil = $id OR p.ID = $id;        
        ";

    $conn->query($sql);
    header("location:tampil.php?pesan=ubah");
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

            if (empty($hasiljoin2['id_kelompok'])) {
                $sql="INSERT INTO penempatan (id,id_profil,id_kelompok) values (NULL, $id,$kelompok)   ";
               $conn->query($sql);
               $sql2="UPDATE profil p
               INNER JOIN penempatan pe ON p.ID = pe.id_profil
               INNER JOIN kelompok k ON pe.id_kelompok = k.ID
               SET p.nama = '$nama', pe.id_kelompok = '$kelompok',p.jurusan=$jurusan , p.alamat = '$alamat', p.foto = '$namafilesimpan'
               WHERE pe.id_profil = $id AND p.ID = $id;";
            
               $conn->query($sql2);
            
               header("location:tampil.php?pesan=ubah");
            
                }
                else{
                    $sql=" UPDATE profil p
                    INNER JOIN penempatan pe ON p.ID = pe.id_profil
                    INNER JOIN kelompok k ON pe.id_kelompok = k.ID
                    SET p.nama = '$nama', pe.id_kelompok = '$kelompok',p.jurusan=$jurusan , p.alamat = '$alamat', p.foto = '$namafilesimpan'
                    WHERE pe.id_profil = $id OR p.ID = $id;        
                    ";
            
                $conn->query($sql);
                header("location:tampil.php?pesan=ubah");

                }
            
        }
    }    
}

?>