<?php
require('../../database.php'); 

if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = intval($_POST['id']); 

        $columns = [
                'nom' => $_POST['nom'], 
                'id_enseignant' => intval($_POST['enseignant']), 
                'volume_horaire' => intval($_POST['volume_horaire']), 
        ]; 

        $column_names = array_keys($columns);
        $column_values = array_values($columns);

        for($i=0; $i < count($column_names); $i++){
                try{
                        $sql = "UPDATE Cours SET $column_names[$i]=:column_value WHERE id=:id"; 
                        $stmt = $pdo->prepare($sql); 
                        $stmt->bindParam(':column_value', $column_values[$i]);
                        $stmt->bindParam(':id', $id);
                        $stmt->execute(); 
                        
                        header('Location: ../../index.php'); 
                }
                catch(PDOException $e){
                        echo "Connection Error: ". $e->getMessage();
                }
        }
}
?>
