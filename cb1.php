<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <table>
    <tr>
        <td>Username</td>
        <td><input type="text" name="txtuser" id=""></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type="password" name="txtpass" id=""></td>
    </tr>
    <tr>
        <td><input type="submit" value="Ok" name="cmdOk"></td>
        <td></td>
    </tr>
    </table>
    </form>
    <?php
    if (isset($_POST['cmdOk'])){
        $user=$_POST['txtuser'];
        $pass=$_POST['txtpass'];
        if (preg_match("/[0-9]/",$user)){
            echo "Nama User nggak valid";
        }
        if (preg_match("/[A-Za-z0-9]{8,}/",$pass)){
            echo "Pass Ok";
        }
        else{ echo "Pass not OK";}
    }
    ?>
</body>
</html>