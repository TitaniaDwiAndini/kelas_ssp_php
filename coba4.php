<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php
    include('funct.php');
    echo hai();
    echo "<br>Hasil Luas dari 4 x 3 adalah : ".luas(4,3)."<br>";
    $nim="18201007";
    $angk="20".substr($nim,0,2);
    echo "Angkatan : ".$angk;
    $jur=substr($nim,4,1);
     echo $jur;
    // echo "Jurusan  : ".$jur;
    $jurusan = array(1 =>  'TI','SK');
    echo "<br>Jurusan  : ".$jurusan[$jur];    
    echo date('d-m-Y', strtotime('1945-08-17'));
    echo "<br/>Bulan Sekarang : ".date('l');
?>
</body>
</html>