<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
        

if (isset($_POST['primeiro_nome'])      &&
    isset($_POST['ultimo_nome'])      &&
    isset($_POST['usuario'])   &&
    isset($_POST['aluno_id']) &&
    isset($_POST['nota'])) {
    
    include '../../DB_connection.php';
    include "../data/aluno.php";

    $primeiro_nome = $_POST['primeiro_nome'];
    $ultimo_nome = $_POST['ultimo_nome'];
    $usuario = $_POST['usuario'];

    $aluno_id = $_POST['aluno_id'];
    
    $nota = $_POST['nota'];

    $data = 'aluno_id='.$aluno_id;

    if (empty($primeiro_nome)) {
        $em  = "Necessário primeiro nome";
        header("Location: ../aluno-edit.php?error=$em&$data");
        exit;
    }else if (empty($ultimo_nome)) {
        $em  = "Necessário último nome";
        header("Location: ../aluno-edit.php?error=$em&$data");
        exit;
    }else if (empty($usuario)) {
        $em  = "Necessário usuário";
        header("Location: ../aluno-edit.php?error=$em&$data");
        exit;
    }else if (!userNameEhUnico($usuario, $conn, $aluno_id)) {
        $em  = "Usuário já em uso! Escolha outro!";
        header("Location: ../aluno-edit.php?error=$em&$data");
        exit;
    }else {
        $sql = "UPDATE alunos SET
                usuario = ?, primeiro_nome=?, ultimo_nome=?, nota=?
                WHERE aluno_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$usuario,$primeiro_nome, $ultimo_nome, $nota, $aluno_id]);
        $sm = "Alterado com sucesso!";
        header("Location: ../aluno-edit.php?success=$sm&$data");
        exit;
    }
    
  }else {
    $em = "Erro";
    header("Location: ../aluno-edit.php?error=$em");
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
