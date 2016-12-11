<html>
	<head>
	</head>
	<body>
	  <?PHP      
		/*Simple, good looking recursive function for printing directories.
		Just copy/paste and it is ready to go!*/
		
		function printCurrentDirRecursively($originDirectory, $printDistance=0){
			$mydir = $_GET['kat'];
			// just a little html-styling
			if($printDistance==0)echo '<div style="color:#35a; font-family:Verdana; font-size:15px;">';
			$leftWhiteSpace = "";
			for ($i=0; $i < $printDistance; $i++)  $leftWhiteSpace = $leftWhiteSpace."&nbsp;";
			
			
			$CurrentWorkingDirectory = dir($originDirectory . "/pliki/" . $mydir);
			while($entry=$CurrentWorkingDirectory->read()){
				if($entry != "." && $entry != ".."){
					if(is_dir($originDirectory."\\".$entry)){
						echo $leftWhiteSpace."<b>".$entry."</b><br>\n";
						printCurrentDirRecursively($originDirectory."\\".$entry, $printDistance+2);
					 }
					else{
						echo $leftWhiteSpace.$entry."<br>\n";
					}
				}
			}
			$CurrentWorkingDirectory->close();
			
			if($printDistance==0)echo "</div>";
		}

		//TEST IT!
		printCurrentDirRecursively(getcwd());

	?>
	</body>
</html>