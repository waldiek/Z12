<?php
session_start();
	require_once "connect.php";
	
				mysql_connect($serwer, $login, $haslo);
				mysql_select_db($baza);
?>

<?php
if (isset($_GET['wyloguj'])==1) 
{
	$_SESSION['zalogowany'] = false;
	session_destroy();
}
?>

<?php
function filtruj($zmienna) 
{
    if(get_magic_quotes_gpc())
        $zmienna = stripslashes($zmienna); // usuwamy slashe

	// usuwamy spacje, tagi html oraz niebezpieczne znaki
    return mysql_real_escape_string(htmlspecialchars(trim($zmienna))); 
}

if (isset($_POST['loguj'])) 
{
	$login = filtruj($_POST['login']);
	$haslo = filtruj($_POST['haslo']);
	$ip = filtruj($_SERVER['REMOTE_ADDR']);
	
	// sprawdzamy czy login i hasło są dobre
	if (mysql_num_rows(mysql_query("SELECT user_name, user_pass FROM z12_users WHERE user_name = '".$login."' AND user_pass = '".md5($haslo)."';")) > 0) 
	{	
		// uaktualniamy date logowania oraz ip
		mysql_query("UPDATE `z8_users` SET `user_date`=NOW(), `user_ip`='" . $ip . "' WHERE `user_name`='" . $login . "';");
		
		$wynik = mysql_query("SELECT user_name, user_id FROM z12_users WHERE user_name ='".$login."';");
		
		while($rek = mysql_fetch_array($wynik)) { 
					$user_id = $rek['user_id'];
		}
		
		$_SESSION['zalogowany'] = true;
		$_SESSION['login'] = $login;
		$_SESSION['user_id'] = $user_id;
		
		// zalogowany

	}
	else echo "Wpisano złe dane.";
}

if ($_SESSION['zalogowany']==true)
{
	//echo("UPDATE `z8_users` SET `user_date`=NOW(), `user_ip`='" . $ip . "' WHERE `user_name`='" . $login . "';");
	header("Location: index.php");
}
?>

<?php if ($_SESSION['zalogowany']==false): ?>

<form method="POST" action="index.php?id=logowanie">
<b>Login: </b> <input type="text" name="login"><br>
<b>Hasło: </b> <input type="password" name="haslo"><br>
<input type="submit" value="Zaloguj" name="loguj">
</form> 

<?php endif; ?>



<?php mysql_close(); ?>