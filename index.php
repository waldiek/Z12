<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>datalogi.pl</title>
		<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->
		<link rel="stylesheet" href="Bootstrap/css/bootstrap.css" type="text/css"/>
		<link rel="stylesheet" href="Bootstrap/css/sidebar.css" type="text/css"/>
		<link rel="stylesheet" href="style.css" type="text/css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="Bootstrap/js/scripts.js"></script>
		<script src="Bootstrap/js/sliiide.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		  <script src="http://code.jquery.com/jquery-latest.js"></script>
		
		<?php
			session_start();
		?>
		
	</head>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Grupowanie Tytułu i przycisku rozwijania mobilnego menu -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Rozwiń nawigację</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">dataLogi.pl</a>
        </div>

        <!-- Grupowanie elementów menu aby było lepszy wyświetlanie na telefonach itp. -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav" id="active">
                <li class="start">
                    <a href="index.php">Start</a>
                </li>
				<?php if ($_SESSION['zalogowany']==false){?>
				 <li class="rejestracja">
                    <a href="index.php?id=rejestracja">Rejestracja</a>
                </li>
                <li class="logowanie">
                    <a href="index.php?id=logowanie">Logowanie</a>
                </li>
				<?php }; if ($_SESSION['zalogowany']==true){?>
				<li class="forum">
                    <a href="index.php?id=pliki">Moje pliki</a>
                </li>
				<li class="nowywatek">
                    <a href="index.php?id=create_folder">Nowy folder</a>
                </li>
				<li class="profil">
                    <a href="index.php?id=mojprofil">Moj profil</a>
                </li>

			</ul>
			<ul class="nav navbar-nav navbar-right" id="active">
				<p class="navbar-text">Signed in as <?php echo($_SESSION['login']);?></p>
				
			
				<li class="wyloguj">
                    <a href="index.php?id=wyloguj">Wyloguj</a>
                </li>
				<?php };?>
			</ul>
            
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<header>
    <div class="col-sm-2" style="background-color: transparent;"></div>
    <div class="col-sm-8" id="headerstyle"></div>
    <div class="col-sm-2" style="background-color: transparent;"></div>
</header>


	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-2" style="background-color: transparent;">

				</div>
				<div class="col-sm-8" id="mainpage" >
				<?php
					if (isset($_GET['id'])) { include ('pages/'.$_GET['id'].'.php');} else { include ('pages/index.php'); }
				?>
				<div class="col-sm-2" style="background-color: transparent;"></div>
				</div>
			</div>
		</div>
	</body>
	<footer>
		<div class="col-sm-2" style="background-color: transparent;"></div>
		<div class="col-sm-8" id="footerstyle" style="background-color: #d1d1d1; height:30px;">
			dataLogi.pl
		</div>
		<div class="col-sm-2" style="background-color: transparent;"></div>
	</footer>
</html>