<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<font face="Arial" size="3">
    <form action="" method="post">
<table align="center" bgcolor="CornflowerBlue" cellspacing="20">

<tr>
    <td>*User name</td>
    <td>:</td>
    <td><input type="text" name="txtnama" id=""></td>
</tr>
<tr>
    <td>*Password</td>
    <td>:</td>
    <td><input type="text" name="txtpass" id=""></td>
</tr>
<tr>
    <td>*E-mail</td>
    <td>:</td>
    <td><input type="text" name="txtemail" id=""></td>
</tr>

<tr>
<td></td>
<td></td>
<td><input type="submit" value="Kirim" name="cmdkirim"><input type="reset" value="Bersih" name="cmdbersih"></td>
</tr>
</table>
</form> 
<h4>Syarat :</h4>   
<ol>
<li>Username
    <ul><li>Diawali dengan angka atau huruf kecil</li>
    <li>Hanya terdiri dari huruf, angka dan karakter _ (underscore)</li>
    <li>Minimum 2 digit, maksimum 28 digit karakter/angka</li></ul>
</li>
<li>Password
<ul><li>Minimal 8 karakter</li>
<li>Terdapat sedikitnya 1 angka</li>
<li>Terdapat sedikitnya 1 huruf besar</li>
<li>Terdapat sedikitnya 1 huruf kecil</li></ul>
</li>
<li>Email
<ul><li>Terdiri dari karakter @ dan . (dot)</li></ul>
</li>
<li>Semua Inputan TIDAK BOLEH KOSONG</li>
</ol>
<?php
    //username : /^[a-z0-9][a-z0-9_]{2,28}[a-z0-9]$/
    //username : ^[a-z0-9][a-z0-9_]*[a-z0-9]$
    //pass : ^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$
    //pass : /[^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$]/
    //email: /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix

?>
</body>
</html>