<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- <?php
    $a=11;
    if ($a==1){
?>
    <h1>Kondisi Terpenuhi</h1>
<?php
    }
    else {
?>
    <h1>Kondisi Salah</h1>
<?php
    }

    for ($i=1;$i<=10;$i=$i+2){
        echo "ini adalah perulangan ke :".$i."<br>";
    }
?> -->
<form action="" method="post">
Masukkan angka : <input type="text" name="txtinput" id=""><input type="submit" value="OK" name="cmdOk">
</form>
<?php
if (isset($_POST['cmdOk'])){
    $input=$_POST['txtinput'];
    echo "Bilangannya adalah : ".$input."<br>";
    if ($input%2==0){
        echo "Ini Bilangan Genap";
    }
    else {
        echo "Ini Bilangan Ganjil";
    }
}
$angka = array(1 =>  'satu','dua','tiga','empat','lima');
echo $angka[4];
?>
<?php 
$string = "Hello world. Beautiful day today.";
$token = strtok($string, " ");
while ($token != false){
    echo "$token<br />";
    $token = strtok(" ");
    } ?> 


</body>
</html>