<?php
include "efm.php";


$login = "";
$password = "";
$loginError = "";
$passwordError = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];
    
    if (empty($login) || empty($password)) {
        header('Location: authentifier.php'); //ghadi imchi lpage lkhra italae lmess
        exit(); 
    }
    else{
        $select=$connect->prepare('SELECT * FROM compteadministrateur WHERE loginAdmin=? AND motPasse=? ');
        $select->execute([$login,$password]);


        if($select->rowCount()>0){
            $values=$select->fetch(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['nom']=$values["nom"];
            $_SESSION['prenom']=$values["prenom"];
            header("Location: espaceprivee.php");
            exit();
            echo "kyna shih";
        }else{
            header('Location: authentifier.php');
            exit(); 
        }
        
        // if ($select->rowCount() > 0) {
        //     $values = $select->fetch(PDO::FETCH_ASSOC);
        //     header("Location: espaceprivee.php");
        //     exit();
        //     // This line won't be executed because the script has already exited
        //     echo "kyna shih";
        // } else {
        //     header('Location: authentifier.php');
        //     exit(); 
        // }
        
    }
    }

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
        <input type="text" name="login"><br><br>
        <input type="password" name="password"><br><br>
        <input type="submit" value="submit">
    </form>
    
</body>
</html>