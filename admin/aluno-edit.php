<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['aluno_id'])) {

    if ($_SESSION['role'] == 'Admin') {
      
       include "../DB_connection.php";
       include "data/disciplina.php";
       include "data/nota.php";
       include "data/aluno.php";
       $disciplinas = getTodasDisciplinas($conn);
       $notas = getTodasNotas($conn);
       
       $aluno_id = $_GET['aluno_id'];
       $aluno = getAlunoById($aluno_id, $conn);

       if ($aluno == 0) {
         header("Location: aluno.php");
         exit;
       }


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Editar aluno</title>
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
        <a href="aluno.php"
           class="btn btn-dark">Voltar</a>

        <form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="req/aluno-edit.php">
        <h3>Editar info do aluno</h3><hr>
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
          <label class="form-label">Primeiro nome</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$aluno['primeiro_nome']?>" 
                 name="primeiro_nome">
        </div>
        <div class="mb-3">
          <label class="form-label">Último nome</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$aluno['ultimo_nome']?>"
                 name="ultimo_nome">
        </div>
        <div class="mb-3">
          <label class="form-label">Usuário</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$aluno['usuario']?>"
                 name="usuario">
        </div>
        <input type="text"
                value="<?=$aluno['aluno_id']?>"
                name="aluno_id"
                hidden>

        <div class="mb-3">
          <label class="form-label">Nota</label>
          <div class="row row-cols-5">
            <?php 
            $nota_ids = str_split(trim($aluno['nota']));
            foreach ($notas as $nota){ 
              $checked =0;
              foreach ($nota_ids as $nota_id ) {
                if ($nota_id == $nota['nota_id']) {
                   $checked =1;
                }
              }
            ?>
            <div class="col">
              <input type="radio"
                     name="nota"
                     <?php if($checked) echo "checked"; ?>
                     value="<?=$nota['nota_id']?>">
                     <?=$nota['nota_codigo']?>-<?=$nota['nota']?>
            </div>
            <?php } ?>
             
          </div>
        </div>

      <button type="submit" 
              class="btn btn-primary">
              Update</button>
     </form>

     <form method="post"
              class="shadow p-3 my-5 form-w" 
              action="req/aluno-altera.php"
              id="altera_senha">
        <h3>Alterar senha</h3><hr>
          <?php if (isset($_GET['perror'])) { ?>
            <div class="alert alert-danger" role="alert">
             <?=$_GET['perror']?>
            </div>
          <?php } ?>
          <?php if (isset($_GET['psuccess'])) { ?>
            <div class="alert alert-success" role="alert">
             <?=$_GET['psuccess']?>
            </div>
          <?php } ?>

       <div class="mb-3">
            <div class="mb-3">
            <label class="form-label">Senha admin</label>
                <input type="senha" 
                       class="form-control"
                       name="admin_senha"> 
          </div>

            <label class="form-label">Nova senha</label>
            <div class="input-group mb-3">
                <input type="text" 
                       class="form-control"
                       name="nova_senha"
                       id="passInput">
                <button class="btn btn-secondary"
                        id="gBtn">
                        Random</button>
            </div>
            
          </div>
          <input type="text"
                value="<?=$aluno['aluno_id']?>"
                name="aluno_id"
                hidden>

          <div class="mb-3">
            <label class="form-label">Confirmar nova senha</label>
                <input type="text" 
                       class="form-control"
                       name="c_nova_senha"
                       id="passInput2"> 
          </div>
          <button type="submit" 
              class="btn btn-primary">
              Change</button>
        </form>
     </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(3) a").addClass('active');
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
           var passInput2 = document.getElementById('passInput2');
           passInput.value = result;
           passInput2.value = result;
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
    header("Location: aluno.php");
    exit;
  } 
}else {
	header("Location: aluno.php");
	exit;
} 

?>