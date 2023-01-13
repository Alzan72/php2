<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total data</title>

    <!-- Bootstarp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <?php include 'koneksi.php' ;
    include 'function.php';

    ?>
    
</head>
<body>
<div class="row">
<table>
    <div class="col">
        <tr><td>No.</td><td>Jenis kelamin</td> <td>Jumlah</td></tr>
        <?php
        $no=1;
        totalData('jenis-kelamin');
        while ($data=$hasil->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $data['jenis-kelamin']?></td>
                <td><?php echo $data['jumlah']?></td>
        </tr>
          <?php  
          $no++;
        };
        ?>
    </div>
</table>
</div>
    
</body>
</html>