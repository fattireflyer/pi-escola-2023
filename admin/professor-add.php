<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
      
       include "../DB_connection.php";
       include "data/disciplina.php";
       include "data/nota.php";
       $disciplinas = getTodasDisciplinas($conn);
       $notas = getTodasNotas($conn);

       $primeiro_nome = '';
       $ultimo_nome = '';
       $usuario = '';

       if (isset($_GET['primeiro_nome'])) $primeiro_nome = $_GET['primeiro_nome'];
       if (isset($_GET['ultimo_nome'])) $ultimo_nome = $_GET['ultimo_nome'];
       if (isset($_GET['usuario'])) $usuario = $_GET['usuario'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Adicionar Professor</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        include "inc/navbar.php";
     ?>
     <div class="container mt-5">
        <a href="professor.php"
           class="btn btn-dark">Voltar</a>

        <form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="req/teacher-add.php">
        <h3>Adicionar Novo Professor</h3><hr>
        <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert">
           <?=$_GET['error']?>
          </div>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success" role="alert">
           <?=$_GET['success']?>
          </div>
        <?php } ?>
        <div class="mb-3">
          <label class="form-label">Primeiro Nome</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$primeiro_nome?>" 
                 name="primeiro_nome">
        </div>
        <div class="mb-3">
          <label class="form-label">Último Nome</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$ultimo_nome?>"
                 name="ultimo_nome">
        </div>
        <div class="mb-3">
          <label class="form-label">Usuário</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$usuario?>"
                 name="usuario">
        </div>
        <div class="mb-3">
          <label class="form-label">Senha</label>
          <div class="input-group mb-3">
              <input type="text" 
                     class="form-control"
                     name="pass"
                     id="passInput">
              <button class="btn btn-secondary"
                      id="gBtn">
                      Random</button>
          </div>
          
        </div>
        <div class="mb-3">
          <label class="form-label">Disciplina</label>
          <div class="row row-cols-5">
            <?php foreach ($disciplinas as $disciplina): ?>
            <div class="col">
              <input type="checkbox"
                     name="disciplinas[]"
                     value="<?=$disciplina['disciplina_id']?>">
                     <?=$disciplina['disciplina']?>
            </div>
            <?php endforeach ?>
             
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Nota</label>
          <div class="row row-cols-5">
            <?php foreach ($notas as $nota): ?>
            <div class="col">
              <input type="checkbox"
                     name="notas[]"
                     value="<?=$nota['nota_id']?>">
                     <?=$nota['nota_codigo']?>-<?=$nota['nota']?>
            </div>
            <?php endforeach ?>
             
          </div>
        </div>

      <button type="submit" class="btn btn-primary">Adicionar</button>
     </form>
     </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(2) a").addClass('active');
        });

        function makePass(length) {
            var result           = '';
            var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
              result += characters.charAt(Math.floor(Math.random() * 
         charactersLength));

           }
           var passInput = document.getElementById('passInput');
           passInput.value = result;
        }

        var gBtn = document.getElementById('gBtn');
        gBtn.addEventListener('click', function(e){
          e.preventDefault();
          makePass(4);
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