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
    $cari=$_GET["idbrg"];
    $sql="select * from tblbarang where kodebrg like '$cari'";
    $hasil=mysqli_query($con,$sql);
    $data=mysqli_fetch_array($hasil);
?>
    <h1 align="center">Edit Data Barang</h1>
        <form action="" method="post">
        <table border="0" align="center">
            <tr>
                <td>Kode Barang</td>
                <td><input type="text" name="txtkode" id="" value="<?php echo $data['kodebrg'];?>"></td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="txtnama" id="" value="<?php echo $data['namabrg'];?>"></td>
            </tr>
            <tr>
                <td>Jumlah / Qty</td>
                <td><input type="text" name="txtjum" id="" value="<?php echo $data['jumlah'];?>"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="txtharga" id="" value="<?php echo $data['harga'];?>"></td>
            </tr>
            <tr>
                <td>Jenis</td>
                <td><input type="text" name="txtjenis" id="" value="<?php echo $data['jenis'];?>"></td>
            </tr>
            <tr>
                <td>Link Gambar</td>
                <td><input type="text" name="txtgambar" id="" value="<?php echo $data['gambar'];?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan" name="cmdsimpan"></td>
            </tr>
            </table>
        </form>

<?php
    
    if (isset($_POST['cmdsimpan'])){
        $tkode=$_POST['txtkode'];
        $tnama=$_POST['txtnama'];
        $tjum=$_POST['txtjum'];
        $tharga=$_POST['txtharga'];
        $tjenis=$_POST['txtjenis'];
        $tgambar=$_POST['txtgambar'];

        $sql="update tblbarang set namabrg = '$tnama', jumlah = '$tjum', harga = '$tharga', jenis = '$tjenis', gambar = '$tgambar' where kodebrg = '$tkode'";
        $hasil=mysqli_query($con,$sql);
        echo "<script>alert('Data Terupdate !')
        document.location='tampil kelas.php';
        </script>";
      }
?>             
</body>
</html>