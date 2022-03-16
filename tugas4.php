<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <center>Jumlah Gambar : <input type="text" name="txtinput" id=""><input type="submit" value="Ok" name="cmdOk"></center>
    </form><br><br>
<?php
    error_reporting(0);
    if (isset($_POST['cmdOk'])){
        $angk=$_POST['txtinput'];
?>
<table border="0" cellpadding="0" cellspacing="0" align="center" width="60%">
<tr>
<?php
    for($i=1;$i<=$angk;$i++){
        $sisa=$i % 3;
?>
        <td><center><img src="gambar/<?php echo $i;?>.jpg" alt="" width="70%"></center>
        <p align='center'><font face='arial' size='2'>Batch Product : <?php echo $i;?></font></p></td>
<?php
    if ($sisa==0){
        echo "</tr><tr>";
        }
    }
?>

</tr>
</table>
<?php
    }
?>
</body>
</html>