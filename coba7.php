<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    include('koneksi.php');

?>
<body>
<form action="" method="post">
<table align="center" width="50%">
<tr>
<td>
    Masukkan Nama Barang : <input type="text" name="txtcari" id=""><input type="submit" value="Cari" name="cmdcari">
</td>
</tr>
</table>
</form>
<?php
    if (isset($_POST['cmdcari'])){
        $tcari=$_POST['txtcari'];
        $sql="select * from tblbarang where namabrg like '%$tcari%'";
        $hasil=mysqli_query($con,$sql);
    

?>
    <h1 align="center">Tabel Barang</h1>
    <table align="center" border="1"cellspacing="0" cellpadding="0">
        <tr>
            <th>NO</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Jenis</th>
            <th>Gambar</th>
        </tr>
<?php
    $no=1;
    while ($data=mysqli_fetch_array($hasil))
    {
?>
        <tr>
            <td><?php echo $no;?></td>
            <td><?php echo $data['kodebrg'];?></td>
            <td><?php echo $data['namabrg'];?></td>
            <td><?php echo $data['jumlah'];?></td>
            <td><?php echo $data['harga'];?></td>
            <td><?php echo $data['jenis'];?></td>
            <td><img src="<?php echo $data['gambar'];?>" alt="" width="200"></td>
        </tr>
<?php
        $no++;
    }
?>
    </table>
<?php
    }
?>
</body>
</html>