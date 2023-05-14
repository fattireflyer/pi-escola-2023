<?php 

function getTodasNotas($conn){
   $sql = "SELECT * FROM notas";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $notas = $stmt->fetchAll();
     return $notas;
   }else {
    return 0;
   }
}

function getNotaById($nota_id, $conn){
   $sql = "SELECT * FROM notas
           WHERE nota_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$nota_id]);

   if ($stmt->rowCount() == 1) {
     $nota = $stmt->fetch();
     return $nota;
   }else {
    return 0;
   }
}