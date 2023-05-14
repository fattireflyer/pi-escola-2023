<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       include "data/aluno.php";
       include "data/nota.php";
       $alunos = getTodosAlunos($conn);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Alunos</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        include "inc/navbar.php";
        if ($alunos != 0) {
     ?>
     <div class="container mt-5">
        <a href="aluno-add.php"
           class="btn btn-dark">Adicionar novo aluno</a>

           <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger mt-3 n-table" 
                 role="alert">
              <?=$_GET['error']?>
            </div>
            <?php } ?>

          <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-info mt-3 n-table" 
                 role="alert">
              <?=$_GET['success']?>
            </div>
            <?php } ?>

           <div class="table-responsive">
              <table class="table table-bordered mt-3 n-table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Primeiro Nome</th>
                    <th scope="col">Último Nome</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Nota</th>
                    <th scope="col">Ação</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0; foreach ($alunos as $aluno ) { 
                    $i++;  ?>
                  <tr>
                    <th scope="row"><?=$i?></th>
                    <td><?=$aluno['aluno_id']?></td>
                    <td><?=$aluno['primeiro_nome']?></td>
                    <td><?=$aluno['ultimo_nome']?></td>
                    <td><?=$aluno['usuario']?></td>
                    <td>
                      <?php 
                           $nota = $aluno['nota'];
                           $g_temp = getNotaById($nota, $conn);
                           if ($g_temp != 0) {
                              echo $g_temp['nota_codigo'].'-'.
                                     $g_temp['nota'];
                            }
                        ?>
                    </td>
                    <td>
                        <a href="aluno-edit.php?aluno_id=<?=$aluno['aluno_id']?>"
                           class="btn btn-warning">Editar</a>
                        <a href="aluno-delete.php?aluno_id=<?=$aluno['aluno_id']?>"
                           class="btn btn-danger">Deletar</a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
           </div>
         <?php }else{ ?>
             <div class="alert alert-info .w-450 m-5" 
                  role="alert">
                Vazio!
              </div>
         <?php } ?>
     </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(3) a").addClass('active');
        });
    </script>

</body>
</html>
<?php 

  }else {
    header("Location: ../login.php");
    exit;
  } 
}else {
	header("Location: ../login.php");
	exit;
} 

?>