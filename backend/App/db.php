<?php
    global$Server;
	require_once("Classes.php");
	$Server = new Server("usersdb",'mysql_db',"root","root");
	$Server->ConnectServer();
	$Server->ConnectDB('usersdb');
	$Server->SetCharset("UTF8");
?>