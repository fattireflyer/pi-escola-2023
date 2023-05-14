<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['primeiro_nome']) &&
    isset($_POST['ultimo_nome']) &&
    isset($_POST['usuario']) &&
    isset($_POST['senha']) &&
    isset($_POST['nota'])) {
    
    include '../../DB_connection.php';
    include "../data/aluno.php";

    $primeiro_nome = $_POST['primeiro_nome'];
    $ultimo_nome = $_POST['ultimo_nome'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $nota = $_POST['nota'];
    

    $data = 'usuario='.$usuario.'&primeiro_nome='.$primeiro_nome.'&ultimo_nome='.$ultimo_nome;

    if (empty($primeiro_nome)) {
		$em  = "Necessário primeiro nome";
		header("Location: ../aluno-add.php?error=$em&$data");
		exit;
	}else if (empty($ultimo_nome)) {
		$em  = "Necessário último nome";
		header("Location: ../aluno-add.php?error=$em&$data");
		exit;
	}else if (empty($usuario)) {
		$em  = "Necessário usuario";
		header("Location: ../aluno-add.php?error=$em&$data");
		exit;
	}else if (!userNameEhUnico($usuario, $conn)) {
		$em  = "Nome de usuário já está em uso";
		header("Location: ../aluno-add.php?error=$em&$data");
		exit;
	}else if (empty($senha)) {
		$em  = "Necessário senha";
		header("Location: ../aluno-add.php?error=$em&$data");
		exit;
	}else {
    
        $senha = password_hash($senha, PASSWORD_DEFAULT);

        $sql  = "INSERT INTO
                 alunos(usuario, senha, primeiro_nome, ultimo_nome, nota)
                 VALUES(?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$usuario, $senha, $primeiro_nome, $ultimo_nome, $nota]);
        $sm = "Novo aluno";
        header("Location: ../aluno-add.php?success=$sm");
        exit;
	}
    
  }else {
  	$em = "Erro";
    header("Location: ../aluno-add.php?error=$em");
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
