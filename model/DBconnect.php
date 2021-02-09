<?php
    $db_conn = new mysqli("localhost", "root", "sjml0724@@", "relay_cartoon");
	if($db_conn->connect_error){
		die("데이베이스에 오류가 생겼습니다.");
	}

	$db_conn->set_charset('uft8mb4');
?>