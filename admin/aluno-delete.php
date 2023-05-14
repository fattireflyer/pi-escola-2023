<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['aluno_id'])) {

  if ($_SESSION['role'] == 'Admin') {
     include "../DB_connection.php";
     include "data/aluno.php";

     $id = $_GET['aluno_id'];
     if (removeStudent($id, $conn)) {
     	$sm = "Removido com sucesso!";
        header("Location: aluno.php?success=$sm");
        exit;
     }else {
        $em = "Erro";
        header("Location: aluno.php?error=$em");
        exit;
     }


  }else {
    header("Location: aluno.php");
    exit;
  } 
}else {
	header("Location: professor.php");
	exit;
} 