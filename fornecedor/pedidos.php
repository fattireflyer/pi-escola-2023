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
            <link rel="stylesheet" href="./global.css" />
            <link rel="stylesheet" href="./index.css" />
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
               
            </div>
            <div class="container mt-5">
                <divclass="container text-center">
                <div class="telapedidofornecedor">
                   
                    <div class="fundo-avisos"></div>
                    <div class="fundo-avisos1"></div>
                        <b class="pincel-marcador-preto">Pincel Marcador Preto</b>
                        <b class="cartucho-impressora-hp">Cartucho impressora HP Preto</b>
                        <b class="pincel-marcador-azul">Pincel Marcador Azul</b>
                        <b class="impresso-av1-">Impressão AV1 - Matemática</b>
                        <b class="quant">Quant.</b>
                        <b class="descrio">Descrição</b>
                        <b class="impresso-av1-1">Impressão AV1 - Econômia</b>
                        <b class="b">20</b>
                        <b class="b1">1</b>
                        <b class="b2">7</b>
                        <b class="b3">27</b>
                        <b class="b4">30</b>
                    <div class="fundo-avisos2"></div>
                    <b class="cd-item">Cód.</b>
                    <b class="b5">67</b>
                    <b class="b6">54</b>
                    <b class="b7">66</b>
                    <b class="b8">549</b>
                    <b class="b9">548</b>
                    <div class="fundo-avisos3"></div>
                    <b class="unit">$ Unit.</b>
                    <b class="b10">3,50</b>
                    <b class="b11">118,00</b>
                    <b class="b12">3,50</b>
                    <b class="b13">0,93</b>
                    <b class="b14">0,89</b>
                    <div class="fundo-avisos4"></div>
                    <div class="fundo-avisos5"></div>
                    <div class="fundo-avisos6"></div>
                    <b class="b15">264,31</b>
                    <b class="total">$ Total</b>
                    <b class="b16">70,00</b>
                    <b class="b17">118,00</b>
                    <b class="b18">24,50</b>
                    <b class="b19">25,11</b>
                    <b class="b20">26,7</b>
                    <b class="valor-da-compra-container">
                        <p class="valor-da-compra">Valor da Compra:</p>
                    </b>
                    <b class="emitir-nota-fiscal">Emitir Nota Fiscal</b>
                    <b class="pedido-de-compra">PEDIDO DE COMPRA</b>
                    <b class="pedido-n-248787">PEDIDO Nº 248787</b>
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