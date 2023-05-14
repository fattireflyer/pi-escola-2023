<?php  

// puxa professor por id
function getProfessorById($professor_id, $conn){
   $sql = "SELECT * FROM professores
           WHERE professor_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$professor_id]);

   if ($stmt->rowCount() == 1) {
     $professor = $stmt->fetch();
     return $professor;
   }else {
    return 0;
   }
}

// puxa todos professores
function getAllProfessores($conn){
   $sql = "SELECT * FROM professores";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $professores = $stmt->fetchAll();
     return $professores;
   }else {
   	return 0;
   }
}

// checa se usuário é unico
function userNameEhUnico($usuario, $conn, $professor_id=0){
   $sql = "SELECT usuario, professor_id FROM professores
           WHERE usuario=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$usuario]);
   
   if ($professor_id == 0) {
     if ($stmt->rowCount() >= 1) {
       return 0;
     }else {
      return 1;
     }
   }else {
    if ($stmt->rowCount() >= 1) {
       $professor = $stmt->fetch();
       if ($professor['professor_id'] == $professor_id) {
         return 1;
       }else {
        return 0;
      }
     }else {
      return 1;
     }
   }  
}

// deleta por id
function removeProfessor($id, $conn){
   $sql  = "DELETE FROM professores
           WHERE professor_id=?";
   $stmt = $conn->prepare($sql);
   $re   = $stmt->execute([$id]);
   if ($re) {
     return 1;
   }else {
    return 0;
   }
}