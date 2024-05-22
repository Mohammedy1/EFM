<?php
$server='mysql:host=localhost;dbname=films22';
$name='root';
$pass="youssef12345678";
try{
    $connect=new PDO($server,$name,$pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
   
}catch(PDOException $e){
    echo "error :" . $e->getMessage();
}
?>
