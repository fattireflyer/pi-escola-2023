<?php
session_start();
if (isset($_SESSION['fornecedor_id']) && 
    isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'Fornecedor') {
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
                    <h4 style="color: #fff">Fornecedor: <?php echo 'Carlos Teixeira' ?></h4>
                </div>
                <br>
                <div style="color: #fff; font-size: 20px; background-color: #11348F; border-radius: 20px; padding: 10px; border: 2px solid #FFFFFF;">
                    Notificações
                    <?php echo 'Você tem um novo pedido de compra!' ?>
                    <br></br>
                    <?php echo 'Data de entrega do pedido PED1234: 15/05/2023 ' ?> 
                </div>
            </div>
            <div class="container mt-5">
                <div class="container text-center">
                    <div class="row row-cols-5">
                        <a href="" class="col btn btn-primary m-2 py-3" style="border: 2px solid #FFFFFF; border-radius: 20px;">
                            <i class="fa fa-cart-arrow-down fs-1" aria-hidden="true"></i><br>
                            Solicitação de Compras
                        </a>
                        <a href="pedidos.php" class="col btn btn-primary m-2 py-3" style="border: 2px solid #FFFFFF; border-radius: 20px;"">
                            <i class="fa fa-check-square fs-1" 1aria-hidden="true"></i><br>
                            Pedidos
                        </a>
                        <a href="" class="col btn btn-primary m-2 py-3" style="border: 2px solid #FFFFFF; border-radius: 20px;"">
                            <i class="fa fa-spinner fs-1" aria-hidden="true"></i><br>
                            Atualizar Status
                        </a>
                        <a href="" class="col btn btn-primary m-2 py-3" style="border: 2px solid #FFFFFF; border-radius: 20px;"">
                            <i class="fa fa-money fs-1" aria-hidden="true"></i><br>
                            Financeiro
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