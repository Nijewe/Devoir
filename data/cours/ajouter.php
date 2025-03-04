<?php

require("../../database.php"); 

if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $table = [
                'nom' => $_POST['nom'], 
                'id_enseignant' => intval($_POST['enseignant']), 
                'volume_horaire' => intval($_POST['volume_horaire']), 
        ]; 
        try{
                $columns = array_keys($table);
                $values = array_values($table);

                $string_columns = '';
                $string_values = ''; 

                for($i=0; $i < count($columns); $i++){
                        if($i == 0){
                                $string_columns = "$columns[$i]"; 
                                $string_values = ":value_$i"; 
                        }
                        else{
                                $string_columns .= ",$columns[$i]"; 
                                $string_values .= ",:value_$i"; 
                        }
                }

                $sql = "INSERT INTO Cours($string_columns) VALUES($string_values)";

                $stmt = $pdo->prepare($sql); 
                
                $string_values = explode(',', $string_values); 
                
                for($i=0; $i < count($columns); $i++){
                        $stmt->bindParam($string_values[$i], $values[$i]); 
                }

                $stmt->execute(); 

                header('Location: ../../index.php'); 
                
        }
        catch(PDOException $e){
                echo "Connection Error: ". $e->getMessage();
        }

}
