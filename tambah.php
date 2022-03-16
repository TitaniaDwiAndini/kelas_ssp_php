<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if (isset($_POST['cmdtambah'])){
        //echo "Hai";
        error_reporting(0);
?>
    <h1 align="center">Tambah Data Barang</h1>
        <form action="" method="post">
        <table border="0" align="center">
            <tr>
                <td>Kode Barang</td>
                <td><input type="text" name="txtkode" id=""></td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="txtnama" id=""></td>
            </tr>
            <tr>
                <td>Jumlah / Qty</td>
                <td><input type="text" name="txtjum" id=""></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="txtharga" id=""></td>
            </tr>
            <tr>
                <td>Jenis</td>
                <td><input type="text" name="txtjenis" id=""></td>
            </tr>
            <tr>
                <td>Link Gambar</td>
                <td><input type="text" name="txtgambar" id=""></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan" name="cmdsimpan"></td>
            </tr>
            </table>
        </form>
<?php
    }
    
    //koneksi
    include('koneksi.php');
    if (isset($_POST['cmdsimpan'])){
        $tkode=$_POST['txtkode'];
        $tnama=$_POST['txtnama'];
        $tjum=$_POST['txtjum'];
        $tharga=$_POST['txtharga'];
        $tjenis=$_POST['txtjenis'];
        $tgambar=$_POST['txtgambar'];
        $sql="select * from tbarang where kodebrg like '$tkode'";
        $hasil=mysqli_query($con,$sql);
        $jdata=mysqli_num_rows($hasil);
        echo "tkode : ".$tkode;
        echo "Data : ".$jdata;
    }
?>    
</body>
</html>
