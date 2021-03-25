<?php
	session_start();
	session_unset();
	session_destroy();
  $cookie_name = 'id';
  setcookie($cookie_name, $_COOKIE[$cookie_name], time()-60);
	header("location: Log_in.php")
?>
