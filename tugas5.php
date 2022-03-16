<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
<center><font face="Arial" size="7">Data Mahasiswa</font></center>
<font face="Arial" size="3">
    <form action="" method="post">
<table align="center" bgcolor="CornflowerBlue" cellspacing="20">

<tr>
    <td>NIM</td>
    <td>:</td>
    <td><input type="text" name="txtnim" id=""></td>
</tr>
<tr>
    <td>NAMA</td>
    <td>:</td>
    <td><input type="text" name="txtnama" id=""></td>
</tr>
<tr>
    <td>Jurusan</td>
    <td>:</td>
    <td><select name="txtjur" id="">
        <option value="TI">Teknik Informatika</option>
        <option value="SK">Sistem Komputer</option>
        <option value="DKV">Desain Komunikasi Visual</option>
        <option value="AK">Akuntansi</option>
        <option value="MN">Manajemen</option>
    </select></td>
</tr>
<tr>
    <td>Jenis Kelamin</td>
    <td>:</td>
    <td><input type="radio" name="txtjk" id="" value="cowok">Pria <input type="radio" name="txtjk" id="" value="cewek">Wanita</td>
</tr>
<tr>
    <td>Alamat Rumah</td>
    <td>:</td>
    <td><textarea name="txtalm" id="" cols="30" rows="10"></textarea></td>
</tr>
<tr>
    <td>Tanggal Lahir</td>
    <td>:</td>
    <td><input type="date" name="txttgl" id=""></td>
</tr>

<tr>
<td></td>
<td></td>
<td><input type="submit" value="Kirim" name="cmdkirim"><input type="reset" value="Bersih" name="cmdbersih"></td>
</tr>

</table>
</form></font>
<?php
    include('kumpulan.php');
    error_reporting(0);
    $nim=$_POST['txtnim'];
    $nama=$_POST['txtnama'];
    $jur=$_POST['txtjur'];
    $jk=$_POST['txtjk'];
    $alm=$_POST['txtalm'];
    $tgl=$_POST['txttgl'];
    if (isset($_POST['cmdkirim'])){
        echo "<h2 style='font-family:Arial' align='center'>Hai... ".$nama.", kamu jurusan ".$jur." di Institut Asia Malang ya..., kamu ".$jk." yang rumahnya di ".$alm.". O ya, NIM mu ".$nim."kan...... <br>Kamu Lahir pada hari : ".harian($tgl)." Tanggal ".date('j',strtotime($tgl))." Bulan ".bulanan($tgl)." Tahun ".date('Y',strtotime($tgl))."<br>Selamat belajar ya....</h2>";
    }

?>
</body>
</html>