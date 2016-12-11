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
	



	echo '<h2>Nowy folder</h2>';
	if($_SESSION['zalogowany']  == false)
	{
		//the user is not signed in
		echo 'Sorry, you have to be <a href="/forum/signin.php">signed in</a> to create a topic.';
	}
	else
	{

		?>

		<form method="post" action="">
		Tytuł: <input type="text" name="topic_subject" size="48"/>	</td>
		<input type="submit" value="Create folder" />

		</form>

		<?php
		{
			//after a lot of work, the query succeeded!
			//echo 'You have successfully created new folder</a>.';
		}
	}
?>
</body>
</html>