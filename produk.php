<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include('koneksi.php');
    $sql="Select * from tblbarang";
    $hasil=mysqli_query($con,$sql);
    $angk=mysqli_num_rows($hasil);
?>
<table border="0" cellpadding="0" cellspacing="0" align="center" width="60%">
<tr>
<?php
    $i=1;
    while ($data=mysqli_fetch_array($hasil)){
        $sisa=$i % 3;
?>
        <td><center><img src="<?php echo $data['gambar'];?>" alt="" width="70%"></center>
        <p align='center'><font face='arial' size='2'><b>Nama Produk :</b> <?php echo $data['namabrg'];?></font></p></td>
<?php
    if ($sisa==0){
        echo "</tr><tr>";
        }
        $i++;
    }
?>

</tr>
</table>
</body>
</html>