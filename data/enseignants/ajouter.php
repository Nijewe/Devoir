<?php

require("../../database.php"); 

if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $table = [
                'nom' => $_POST['nom'], 
                'prenom' => $_POST['prenom'], 
                'email' => $_POST['email'], 
                'telephone' => $_POST['telephone'], 
                'adresse' => $_POST['adresse'], 
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

                $sql = "INSERT INTO Enseignants($string_columns) VALUES($string_values)";

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
