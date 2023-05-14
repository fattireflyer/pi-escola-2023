<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['professor_id'])) {

  if ($_SESSION['role'] == 'Admin') {
     include "../DB_connection.php";
     include "data/professor.php";

     $id = $_GET['professor_id'];
     if (removeprofessor($id, $conn)) {
     	$sm = "Removido com sucesso!";
        header("Location: professor.php?success=$sm");
        exit;
     }else {
        $em = "Erro";
        header("Location: professor.php?error=$em");
        exit;
     }


  }else {
    header("Location: professor.php");
    exit;
  } 
}else {
	header("Location: professor.php");
	exit;
} 