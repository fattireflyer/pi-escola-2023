<?php 

// All disciplinas
function getTodasDisciplinas($conn){
   $sql = "SELECT * FROM disciplinas";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $disciplinas = $stmt->fetchAll();
     return $disciplinas;
   }else {
   	return 0;
   }
}

// Get disciplinas by ID
function getDisciplinaById($disciplina_id, $conn){
   $sql = "SELECT * FROM disciplinas
           WHERE disciplina_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$disciplina_id]);

   if ($stmt->rowCount() == 1) {
     $disciplina = $stmt->fetch();
     return $disciplina;
   }else {
   	return 0;
   }
}

 ?>