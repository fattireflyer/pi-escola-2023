<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="logo.png">
</head>
<body class="body-login">
    <div class="black-fill"><br /> <br />
    	<div class="d-flex justify-content-center align-items-center flex-column">
    	<form class="login" 
    	      method="post"
    	      action="req/login.php">

    		<div class="text-center">
    			<img src="logo.png"
    			     width="100">
    		</div>
    		<h3>LOGIN</h3>
    		<?php if (isset($_GET['error'])) { ?>
    		<div class="alert alert-danger" role="alert">
			  <?=$_GET['error']?>
			</div>
			<?php } ?>
		  <div class="mb-3">
		    <label class="form-label">Usuário</label>
		    <input type="text" 
		           class="form-control"
		           name="usuario">
		  </div>
		  
		  <div class="mb-3">
		    <label class="form-label">Senha</label>
		    <input type="password" 
		           class="form-control"
		           name="senha">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Tipo de usuário</label>
		    <select class="form-control"
		            name="role">
		    	<option value="1">Admin</option>
		    	<option value="3">Aluno</option>
		    	<option value="2">Professor</option>
				<option value="4">Fornecedor</option>
		    </select>
		  </div>

		  <button type="submit" class="btn btn-primary login-button">Login</button>
		  <div onclick="window.location.href = 'index.php';" class="btn btn-primary home-button"> Home </div>
		  <!-- <a href="index.php" class="text-decoration-none">Home</a> -->
		</form>
        
        <br /><br />
        <div class="text-center text-light">
        	Copyright &copy; 2022. Todos direitos reservados.
        </div>

    	</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
</body>
</html>