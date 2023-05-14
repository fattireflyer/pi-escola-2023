<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['primeiro_nome']) &&
    isset($_POST['ultimo_nome']) &&
    isset($_POST['usuario']) &&
    isset($_POST['senha']) &&
    isset($_POST['disciplinas']) &&
    isset($_POST['notas'])) {
    
    include '../../DB_connection.php';
    include "../data/professor.php";

    $primeiro_nome = $_POST['primeiro_nome'];
    $ultimo_nome = $_POST['ultimo_nome'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    
    $notas = "";
    foreach ($_POST['notas'] as $nota) {
    	$notas .=$nota;
    }

    $disciplinas = "";
    foreach ($_POST['disciplinas'] as $disciplina) {
    	$disciplinas .=$disciplina;
    }
    $data = 'usuario='.$usuario.'&primeiro_nome='.$primeiro_nome.'&ultimo_nome='.$ultimo_nome;

    if (empty($primeiro_nome)) {
		$em  = "Necessário primeiro nome";
		header("Location: ../professor-add.php?error=$em&$data");
		exit;
	}else if (empty($ultimo_nome)) {
		$em  = "Necessário último nome";
		header("Location: ../professor-add.php?error=$em&$data");
		exit;
	}else if (empty($usuario)) {
		$em  = "Necessário usuário";
		header("Location: ../professor-add.php?error=$em&$data");
		exit;
	}else if (!userNameEhUnico($usuario, $conn)) {
		$em  = "Usuário em uso! Escolha outro";
		header("Location: ../professor-add.php?error=$em&$data");
		exit;
	}else if (empty($senha)) {
		$em  = "Necessário senha";
		header("Location: ../professor-add.php?error=$em&$data");
		exit;
	}else {
        // hashing the senha
        $senha = password_hash($senha, PASSWORD_DEFAULT);

        $sql  = "INSERT INTO
                 professores(usuario, senha, primeiro_nome, ultimo_nome, disciplinas, notas)
                 VALUES(?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$usuario, $senha, $primeiro_nome, $ultimo_nome, $disciplinas, $notas]);
        $sm = "New teacher registered successfully";
        header("Location: ../professor-add.php?success=$sm");
        exit;
	}
    
  }else {
  	$em = "Erro";
    header("Location: ../professor-add.php?error=$em");
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
