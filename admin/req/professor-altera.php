<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['admin_senha']) &&
    isset($_POST['nova_senha'])   &&
    isset($_POST['c_nova_senha']) &&
    isset($_POST['professor_id'])) {
    
    include '../../DB_connection.php';
    include "../data/professor.php";
    include "../data/admin.php";

    $admin_senha = $_POST['admin_senha'];
    $nova_senha = $_POST['nova_senha'];
    $c_nova_senha = $_POST['c_nova_senha'];

    $professor_id = $_POST['professor_id'];
    $id = $_SESSION['admin_id'];
    
    $data = 'professor_id='.$professor_id.'#altera_senha';

    if (empty($admin_senha)) {
		$em  = "Admin Necessário senha";
		header("Location: ../professor-altera.php?perror=$em&$data");
		exit;
	}else if (empty($nova_senha)) {
		$em  = "New Necessário senha";
		header("Location: ../professor-altera.php?perror=$em&$data");
		exit;
	}else if (empty($c_nova_senha)) {
		$em  = "Confirmation Necessário senha";
		header("Location: ../professor-altera.php?perror=$em&$data");
		exit;
	}else if ($nova_senha !== $c_nova_senha) {
        $em  = "New senha and confirm senha does not match";
        header("Location: ../professor-altera.php?perror=$em&$data");
        exit;
    }else if (!verificaSenhaAdmin($admin_senha, $conn, $id)) {
        $em  = "Senha de admin incorreta";
        header("Location: ../professor-altera.php?perror=$em&$data");
        exit;
    }else {
        // hashing the senha
        $nova_senha = password_hash($nova_senha, PASSWORD_DEFAULT);

        $sql = "UPDATE professores SET
                senha = ?
                WHERE professor_id=?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$nova_senha, $professor_id]);
        $sm = "Senha alterada com sucesso!";
        header("Location: ../professor-altera.php?psuccess=$sm&$data");
        exit;
	}
    
  }else {
  	$em = "Erro";
    header("Location: ../professor-altera.php?error=$em&$data");
    exit;
  }

  }else {
    header("Location: ../../logout.php");
    exit;
  } 
}else {
	header("Location: ../../logout.php");
	exit;
} 
