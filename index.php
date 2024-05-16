
<!DOCTYPE html>
<html>
<head>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <br>
    <h4><CENTER>MAHASISWA UNBARA M. RIDUWAN</CENTER></h4>
	
<?php

    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['NPM'])) {
        $NPM=htmlspecialchars($_GET["NPM"]);

        $sql="delete from anggota where NPM='$NPM' ";
        $hasil=mysqli_query($Kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>

   <tr class="table-danger">
    <table class="my-3 table table-bordered">
        <br>
        <thead>
        <tr class="table-primary">
            <th>No</th>
            <th>NPM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>No HP</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>
        <?php
        include "koneksi.php";
        $sql="select * from anggota order by NPM desc";

        $hasil=mysqli_query($Kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["NPM"]; ?></td>
                <td><?php echo $data["nama"];   ?></td>
                <td><?php echo $data["alamat"];   ?></td>
                <td><?php echo $data["email"];   ?></td>
                <td><?php echo $data["no_hp"];   ?></td>
                <td>
                    <a href="http://localhost/r/uas/update.php?NPM=<?php echo htmlspecialchars($data['NPM']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?NPM=<?php echo $data['NPM']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="http://localhost/r/uas/create.php" class="btn btn-primary" role="button">Tambah Data</a>

</div>

</body>
</html>
