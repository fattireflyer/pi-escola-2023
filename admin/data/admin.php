<?php 

function verificaSenhaAdmin($admin_senha, $conn, $admin_id){
   $sql = "SELECT * FROM admin
           WHERE admin_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$admin_id]);

   if ($stmt->rowCount() == 1) {
     $admin = $stmt->fetch();
     $pass  = $admin['senha'];

     if (password_verify($admin_senha, $pass)) {
     	return 1;
     }else {
     	return 0;
     }
   }else {
    return 0;
   }
}