<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Masukkan Angka : <input type="text" name="txtinput" id=""><input type="submit" value="OK" name="cmdOK">
    </form>
<?php
    error_reporting(0);
    if(isset($_POST["cmdOK"])){
        $inputan=$_POST["txtinput"];
        echo "Hasil Inputan : ".$inputan;
    }
?>
</body>
</html>