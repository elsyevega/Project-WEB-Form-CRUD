<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Koneksi Database MySQL</title>
</head>
<body>
    <h2>Koneksi database Mysql</h2>
    <?php
        $conn=mysqli_connect('localhost','root','', 'form');
        if ($conn){
            echo 'OK Connected';
        }else {
            echo 'server not connected'; 
        }
    ?>

</body>
</html>