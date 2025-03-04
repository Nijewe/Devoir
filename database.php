<?php

$dsn = 'mysql:host=localhost; dbname=Classe';
$user = 'root';
// $password = 'iyonyene';
$password = 'g0j0sat0ru'; 
// $pdo = null; 


try{
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo 'Connexion reussi';
}
catch(PDOException $e){
    echo 'Connexion echouee'. $e->getMessage();
}
?>