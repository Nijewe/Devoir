<?php

require("../../database.php"); 

if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = intval($_POST['id']); 
        try{
                $sql = "DELETE FROM Cours WHERE id=:id";
                $stmt = $pdo->prepare($sql); 
                $stmt->bindParam(':id', $id);
                $stmt->execute(); 
                header('Location: ../../index.php'); 
        }
        catch(PDOException $e){
                echo "Connection Error: ". $e->getMessage();
        }
}
