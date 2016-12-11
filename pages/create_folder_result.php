<html>
	<head>
		</head>
<body>

		<?php
		{
			session_start();
			$home_dir = "/users/0023/sh181891/www/datalogi.pl/z12/";
			//after a lot of work, the query succeeded!
			//echo 'You have successfully created new folder</a>.';
			
			$folder = $_POST['nazwa_folderu'];
			if(!file_exists("pliki/$folder"))
			{
				mkdir ("pliki/$folder", 0755);
				echo "<b>Folder o nazwie: <i>$folder</i> został stworzony!</b>";
			}
			else
			{
				echo "<b>Folder o nazwie: <i>$folder</i>  już istnieje!</b>";
			}
		}
		?>
	</body>
</html>