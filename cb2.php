<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    //Koneksi
    $con=mysqli_connect("localhost","root","","kelas_ssp") or die("koneksi gagal");
?>
<body>
    <h1 align="center">Tabel Barang</h1>
    <table cellpadding="0" cellspacing="0" border="1" align="center">
    <tr align="center">
        <td>No</td>
        <td>Kode</td>
        <td>Nama</td>
        <td>Jumlah</td>
        <td>Harga</td>
        <td>Jenis</td>
        <td>Gambar</td>
    </tr>
<?php
    $sql="select * from tblbarang";
    $hasil=mysqli_query($con,$sql);
    while ($data=mysqli_fetch_array($hasil))
    {
?>
    <tr>
        <td>&nbsp;</td>
        <td><?php echo $data['kodebrg'];?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
<?php
    }
?>
    </table>
</body>
</html>