<html>
	<head>
		</head>
<body>

<?php
	session_start();
	require_once "connect.php";
	mysql_connect($serwer, $login, $haslo);
	mysql_select_db($baza);
	
	header('Content-type: text/html; charset=utf-8');
	mysql_query("SET CHARSET utf8");
	mysql_query("SET NAMES 'utf8' COLLATE 'utf8_bin'");
	
	$home_dir = "/users/0023/sh181891/www/datalogi.pl/z12/";


	echo '<h2>Nowy folder</h2>';
	if($_SESSION['zalogowany']  == false)
	{
		//the user is not signed in
		echo 'Sorry, you have to be <a href="/logowanie.php">signed in</a> to create a folder.';
	}
	else
	{

		?>

		<form method="post" action="index.php?id=create_folder_result">
		Tytuł: <input type="text" name="nazwa_folderu" size="48"/>	</td>
		<input type="submit" value="Create folder" />

		</form>
<?php
	}
	?>
</body>
</html>