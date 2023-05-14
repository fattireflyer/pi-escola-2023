<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['admin_senha']) &&
    isset($_POST['nova_senha'])   &&
    isset($_POST['c_nova_senha']) &&
    isset($_POST['aluno_id'])) {
    
    include '../../DB_connection.php';
    include "../data/admin.php";

    $admin_senha = $_POST['admin_senha'];
    $nova_senha = $_POST['nova_senha'];
    $c_nova_senha = $_POST['c_nova_senha'];

    $aluno_id = $_POST['aluno_id'];
    $id = $_SESSION['admin_id'];
    
    $data = 'aluno_id='.$aluno_id.'#altera_senha';

    if (empty($admin_senha)) {
		$em  = "Necessário senha de admin";
		header("Location: ../aluno-altera.php?perror=$em&$data");
		exit;
	}else if (empty($nova_senha)) {
		$em  = "Necessário senha nova";
		header("Location: ../aluno-altera.php?perror=$em&$data");
		exit;
	}else if (empty($c_nova_senha)) {
		$em  = "Necessário confirmação de senha noava";
		header("Location: ../aluno-altera.php?perror=$em&$data");
		exit;
	}else if ($nova_senha !== $c_nova_senha) {
        $em  = "Senha nova e senha de confirmação não corresepondem";
        header("Location: ../aluno-altera.php?perror=$em&$data");
        exit;
    }else if (!verificaSenhaAdmin($admin_senha, $conn, $id)) {
        $em  = "Senha de admin incorreta";
        header("Location: ../aluno-altera.php?perror=$em&$data");
        exit;
    }else {
        //FAZENDO HASH DA SENHA
        $nova_senha = password_hash($nova_senha, PASSWORD_DEFAULT);

        $sql = "UPDATE alunos SET
                senha = ?
                WHERE aluno_id=?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$nova_senha, $aluno_id]);
        $sm = "Senha alterada com sucesso!";
        header("Location: ../aluno-altera.php?psuccess=$sm&$data");
        exit;
	}
    
  }else {
  	$em = "Erro";
    header("Location: ../aluno-altera.php?error=$em&$data");
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
