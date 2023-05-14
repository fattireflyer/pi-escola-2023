<?php

$host = "localhost";
$user = "escola";
$senha  = "senha-escola";
$db = "escola";

try {
	$conn = new PDO('mysql:host='.$host.';dbname='. $user, $db, $senha);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	$message = $e->getMessage();
	echo 'Connection failed: '. $message;
	exit;
}


/* 
--- criar usuario escola no mysql
SET GLOBAL validate_password.policy=LOW;
SET GLOBAL validate_password.length = 4;
SET GLOBAL validate_password.number_count = 0;
CREATE USER 'escola'@'localhost' IDENTIFIED WITH mysql_native_password BY 'senha-escola';

-- dar todos os privilegios de acesso ao usuario escola
GRANT ALL PRIVILEGES ON *.* TO 'escola'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
*/