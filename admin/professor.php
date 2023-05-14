<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       include "data/professor.php";
       include "data/disciplina.php";
       include "data/nota.php";
       $professores = getAllProfessores($conn);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Professores</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        include "inc/navbar.php";
        if ($professores != 0) {
     ?>
     <div class="container mt-5">
        <a href="professor-add.php"
           class="btn btn-dark">Adicionar Professor</a>

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
                    <th scope="col">Disciplina</th>
                    <th scope="col">Nota</th>
                    <th scope="col">Ação</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0; foreach ($professores as $professor ) { 
                    $i++;  ?>
                  <tr>
                    <th scope="row"><?=$i?></th>
                    <td><?=$professor['professor_id']?></td>
                    <td><?=$professor['primeiro_nome']?></td>
                    <td><?=$professor['ultimo_nome']?></td>
                    <td><?=$professor['usuario']?></td>
                    <td>
                       <?php 
                           $s = '';
                           $disciplinas = str_split(trim($professor['disciplinas']));
                           foreach ($disciplinas as $disciplina) {
                              $s_temp = getDisciplinaById($disciplina, $conn);
                              if ($s_temp != 0) 
                                $s .=$s_temp['disciplina_codigo'].', ';
                           }
                           echo $s;
                        ?>
                    </td>
                    <td>
                      <?php 
                           $g = '';
                           $notas = str_split(trim($professor['notas']));
                           foreach ($notas as $nota) {
                              $g_temp = getNotaById($nota, $conn);
                              if ($g_temp != 0) 
                                $g .=$g_temp['nota_codigo'].'-'.
                                     $g_temp['nota'].', ';
                           }
                           echo $g;
                        ?>
                    </td>
                    <td>
                        <a href="professor-edit.php?professor_id=<?=$professor['professor_id']?>"
                           class="btn btn-warning">Editar</a>
                        <a href="professor-delete.php?professor_id=<?=$professor['professor_id']?>"
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
             $("#navLinks li:nth-child(2) a").addClass('active');
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