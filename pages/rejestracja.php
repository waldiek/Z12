<?php
	session_start();
?>
</br></br>
<form method="POST" action="index.php?id=rejestracja">
<b>Login:               <b> <input type="text" name="login"><br>
<b>Hasło:              </b> <input type="password" name="haslo1"><br>
<b>Powtórz hasło:</b> <input type="password" name="haslo2"><br>
<b>Email:              </b> <input type="text" name="email"><br>
<input type="submit" value="Zarejestruj" name="loguj">
</form> 
</br>
<?php

	require_once "connect.php";


				mysql_connect($serwer, $login, $haslo);
				mysql_select_db($baza);


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
	$haslo1 = filtruj($_POST['haslo1']);
	$haslo2 = filtruj($_POST['haslo2']);
	$email = filtruj($_POST['email']);
	$ip = filtruj($_SERVER['REMOTE_ADDR']);
	
	// sprawdzamy czy login nie jest już w bazie
	if (mysql_num_rows(mysql_query("SELECT user_name FROM z12_users WHERE user_name = '".$login."';")) == 0) 
	{
		if ($haslo1 == $haslo2) // sprawdzamy czy hasła takie same
		{
			mysql_query("INSERT INTO `z12_users` (`user_name`, `user_pass`, `user_email`, `user_date`, `user_ip`)
				VALUES ('".$login."', '".md5($haslo1)."', '".$email."', NOW(), '".$ip."');");

			header("Location: index.php?id=rejestracja2");
		}
		else echo "Hasła nie są takie same";
	}
	else echo "Podany login jest już zajęty.";
}
?>

<?php mysql_close(); ?>