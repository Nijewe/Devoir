<?php

require("../../database.php"); 

if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $table = [
                'id_cours' => intval($_POST['cours']), 
                'id_etudiant' => intval($_POST['etudiant']), 
                'nbr_heures' => intval($_POST['nbr_heures']), 
        ]; 
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
        try{
                $existing_line = "SELECT id, nbr_heures FROM Fiche WHERE id_cours=:id_cours AND id_etudiant=:id_etudiant"; 
                $stmt = $pdo->prepare($existing_line); 
                $stmt->bindParam(':id_cours', $table['id_cours']);
                $stmt->bindParam(':id_etudiant', $table['id_etudiant']);
                $stmt->execute();
                $elts = $stmt->fetch(); 
                $id = $elts['id']; 
                $nbr_heures = $elts['nbr_heures']; 

                if($id){
                        $nbr_heures += $table['nbr_heures']; 
                        $sql = "UPDATE Fiche SET nbr_heures=:nbr_heures WHERE id=:id"; 
                        $stmt = $pdo->prepare($sql); 
                        $stmt->bindParam(':nbr_heures', $nbr_heures);
                        $stmt->bindParam(':id', $id);
                        $stmt->execute(); 
                }
                else{
        
                        $sql = "INSERT INTO Fiche($string_columns) VALUES($string_values)";
        
                        $stmt = $pdo->prepare($sql); 
                        
                        $string_values = explode(',', $string_values); 
                        
                        for($i=0; $i < count($columns); $i++){
                                $stmt->bindParam($string_values[$i], $values[$i]); 
                        }
        
                        $stmt->execute(); 

                }


                header('Location: ../../index.php'); 
                
        }
        catch(PDOException $e){
                echo "Connection Error: ". $e->getMessage();
        }

}
