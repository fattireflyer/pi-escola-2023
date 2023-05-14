<?php
session_start();
if (isset($_SESSION['professor_id']) && 
    isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'Professor') {
 ?>
<!DOCTYPE html>
        <html lang="pt-br">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin - Home</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="../css/style.css">
            <link rel="icon" href="../logo.png">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        </head>

        <body class="body-home">
            <?php            
            include "inc/navbar.php";
            ?>
            
            <div class="container text-center">
                <div>
                    <i class="fa fa-user-circle-o" aria-hidden="true" style="font-size: 100px; color: #fff"></i>
                    <br>
                    <h4 style="color: #fff">Professora: <?php echo 'Clara Setovick' ?></h4>
                </div>
                <br>
                <div style="color: #fff; font-size: 20px; background-color: #11348F; border-radius: 20px; padding: 10px; border: 2px solid #FFFFFF;">
                    Notificações
                    <?php echo '!Atenção: As notas da turma A1 devem ser lançadas até 02/07/2023 às 23:59.' ?>
                    <br></br>
                    <?php echo 'Você tem uma mensagem no fórum da turma 1T2022ARQ' ?> 
                </div>
            </div>
            <div class="container mt-5">
                <div class="container text-center">
                    <div class="row row-cols-5">
                        <a href="" class="col btn btn-primary m-2 py-3" style="border: 2px solid #FFFFFF; border-radius: 20px;">
                            <i class="fa fa-calendar fs-1" aria-hidden="true"></i><br>
                            Grade Horária
                        </a>
                        <a href="professor-turmas.php" class="col btn btn-primary m-2 py-3" style="border: 2px solid #FFFFFF; border-radius: 20px;"">
                            <i class="fa fa-book fs-1" 1aria-hidden="true"></i><br>
                            Turmas
                        </a>
                        <a href="" class="col btn btn-primary m-2 py-3" style="border: 2px solid #FFFFFF; border-radius: 20px;"">
                            <i class="fa fa-money fs-1" aria-hidden="true"></i><br>
                            Holerite
                        </a>
                        <a href="" class="col btn btn-primary m-2 py-3" style="border: 2px solid #FFFFFF; border-radius: 20px;"">
                            <i class="fa fa-envelope fs-1" aria-hidden="true"></i><br>
                            Fórum
                        </a>
                        <a href="" class="col btn btn-primary m-2 py-3 col-5" style="border: 2px solid #FFFFFF; border-radius: 20px;"">
                            <i class="fa fa-cogs fs-1" aria-hidden="true"></i><br>
                            Configurações
                        </a>
                        <a href="../logout.php" class="col btn btn-primary m-2 py-3 col-5" style="border: 2px solid #FFFFFF; border-radius: 20px;">
                            <i class="fa fa-sign-out fs-1" aria-hidden="true"></i><br>
                            Logout
                        </a>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
            <script>
                $(document).ready(function() {
                    $("#navLinks li:nth-child(1) a").addClass('active');
                });
            </script>

        </body>

        </html>

<?php 

  } else {
    header('Location: ../login.php');
    exit;
  }
} else {
	header('Location: ../login.php');
	exit;
}
?>