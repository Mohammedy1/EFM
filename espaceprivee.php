<?php
include 'efm.php';
$stg=$connect->prepare('SELECT * FROM stagiaire');
$stg->execute();
$stagiaire=$stg->fetchAll(PDO::FETCH_ASSOC);



$heure=date('h');
$cc="";
if($heure>=5 && $heure<=18){
    $cc="bonjour";
}else{
    $cc="bonsoir";
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
    <section>
        <?php session_start() ;?>
        <h1> <?php echo $cc . " ".  $_SESSION['nom'];" ".$_SESSION['prenom'];?></h1>
       
    </section>
   
        <table border="2">
            <tr>
            <td>ID</td>
                <td>nom</td>
                <td>prenom</td>
                <td>date de naissance</td>
                <td>photo</td>
                <td>filier</td>
                <td>modifier</td>
                <td>supremer</td>
            </tr>
            <?php foreach($stagiaire as $values): ?>

            <tr>
                <td><?php echo $values['idStagiaire'] ?></td>
                <td><?php echo $values['nom'] ?></td>
                <td><?php echo $values['prenom'] ?></td>
                <td><?php echo $values['dateNaissance'] ?></td>
                <td><?php echo $values['photoProfil'] ?></td>
                <td><?php echo $values['idFiliere'] ?></td>
                <td><a href="#">supprimer</a></td>
                <td><a href="#">modifier</a></td>

               

            </tr>
            <?php endforeach; ?>
        </table>
   
    
</body>
</html>