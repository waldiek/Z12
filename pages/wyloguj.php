<?php
	$_SESSION['zalogowany'] = false;
	session_destroy();
	header("Location: index.php");
?>