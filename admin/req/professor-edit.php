<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['primeiro_nome'])      &&
    isset($_POST['ultimo_nome'])      &&
    isset($_POST['usuario'])   &&
    isset($_POST['professor_id']) &&
    isset($_POST['disciplinas'])   &&
    isset($_POST['notas'])) {
    
    include '../../DB_connection.php';
    include "../data/professor.php";

    $primeiro_nome = $_POST['primeiro_nome'];
    $ultimo_nome = $_POST['ultimo_nome'];
    $usuario = $_POST['usuario'];

    $professor_id = $_POST['professor_id'];
    
    $notas = "";
    foreach ($_POST['notas'] as $nota) {
    	$notas .=$nota;
    }

    $disciplinas = "";
    foreach ($_POST['disciplinas'] as $disciplina) {
    	$disciplinas .=$disciplina;
    }

    $data = 'professor_id='.$professor_id;

    if (empty($primeiro_nome)) {
		$em  = "Necessário primeiro nome";
		header("Location: ../professor-edit.php?error=$em&$data");
		exit;
	}else if (empty($ultimo_nome)) {
		$em  = "Necessário último nome";
		header("Location: ../professor-edit.php?error=$em&$data");
		exit;
	}else if (empty($usuario)) {
		$em  = "Necessário usuário";
		header("Location: ../professor-edit.php?error=$em&$data");
		exit;
	}else if (!userNameEhUnico($usuario, $conn, $professor_id)) {
		$em  = "Usuário em uso! Escolha outro";
		header("Location: ../professor-edit.php?error=$em&$data");
		exit;
	}else {
        $sql = "UPDATE professores SET
                usuario = ?, primeiro_nome=?, ultimo_nome=?, disciplinas=?, notas=?
                WHERE professor_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$usuario,$primeiro_nome, $ultimo_nome, $disciplinas, $notas, $professor_id]);
        $sm = "Atualizado com sucesso!";
        header("Location: ../professor-edit.php?success=$sm&$data");
        exit;
	}
    
  }else {
  	$em = "Erro";
    header("Location: ../professor-edit.php?error=$em");
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
