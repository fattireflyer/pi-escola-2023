<?php 

// puxar todos alunos
function getTodosAlunos($conn){
   $sql = "SELECT * FROM alunos";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $alunos = $stmt->fetchAll();
     return $alunos;
   }else {
   	return 0;
   }
}

// DELETAR
function removeAluno($id, $conn){
   $sql  = "DELETE FROM alunos
           WHERE aluno_id=?";
   $stmt = $conn->prepare($sql);
   $re   = $stmt->execute([$id]);
   if ($re) {
     return 1;
   }else {
    return 0;
   }
}

// puxar aluno por id
function getAlunoById($id, $conn){
   $sql = "SELECT * FROM alunos
           WHERE aluno_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id]);

   if ($stmt->rowCount() == 1) {
     $aluno = $stmt->fetch();
     return $aluno;
   }else {
    return 0;
   }
}


// checar se usuario é unico
function userNameEhUnico($usuario, $conn, $aluno_id=0){
   $sql = "SELECT usuario, aluno_id FROM alunos
           WHERE usuario=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$usuario]);
   
   if ($aluno_id == 0) {
     if ($stmt->rowCount() >= 1) {
       return 0;
     }else {
      return 1;
     }
   }else {
    if ($stmt->rowCount() >= 1) {
       $aluno = $stmt->fetch();
       if ($aluno['aluno_id'] == $aluno_id) {
         return 1;
       }else {
        return 0;
      }
     }else {
      return 1;
     }
   }
   
}

 ?>