<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include('koneksi.php');
    $sql="select * from tblbarang";
    $hasil=mysqli_query($con,$sql);
    //$jdata=mysqli_num_rows($hasil);
?>    
    <h1 align="center">TABEL BARANG</h1>
    <center>
    <form method="post" action="tambah.php">
        <input type="text" name="txtinput" id="" placeholder="Masukkan Kode yang dicari">
        <input type="submit" name="cmdcari" value="Cari"/></form></center>
    <table border="1" cellpadding="0" cellspacing="0" align="center">
    <thead>
        <tr>
            <th>NO</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Jenis</th>
            <th>Gambar</th>
            <th>Action</th>
        </tr>
    </thead>
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
            <td><img src="<?php echo $data['gambar'];?>" alt="" width="150"></td>
            <td><center>&nbsp;&nbsp;&nbsp;<a href="edit_kls.php/?idbrg=<?php echo $data['kodebrg'];?>">Edit</a> &nbsp;&nbsp;&nbsp; Hapus&nbsp;&nbsp;&nbsp;</center></td>
        </tr>
<?php
        $no++;
    }
?>
    </table>

</body>
</html>