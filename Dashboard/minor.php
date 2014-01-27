<html>
	<head>
		<script type="text/javascript">
			<!--
			function delayer(){
				window.location = "minor.php"
			}
			//-->
		</script>
	</head>
	<body onLoad="setTimeout('delayer()', 5000)">
<?php 

	if(isset($_POST) and !empty($_POST)){
	
		//Alle variabelen instellen
		$device = 1;
		$user = 1;
		$hartslag = 1;
		$datum = date('Y-m-d');
		$tijd = date('H:i:s');
		
		if(isset($_POST['device']) and !empty($_POST['device'])){
			$device = (int) $_POST['device'];
		}
		
		if(isset($_POST['user']) and !empty($_POST['user'])){
			$user = (int) $_POST['user'];
		}
		
		if(isset($_POST['hartslag']) and !empty($_POST['hartslag'])){
			$hartslag = (int) $_POST['hartslag'];
		}
		
		if(isset($_POST['datum']) and !empty($_POST['datum'])){
			$datum = date('Y-m-d',strtotime($_POST['datum']));
		}
		
		if(isset($_POST['tijd']) and !empty($_POST['tijd'])){
			$tijd = date('H:i:s',strtotime($_POST['tijd']));
		}
	
		// set file to write 
		$file = 'MinorPost.txt';
		
		$somecontent = "\r\n---------------------------------\r\n";
		$somecontent .= "Datum:".$datum."\r\n";
		$somecontent .= "Tijd:".$tijd."\r\n";
		$somecontent .= "Hartslag:".$hartslag."\r\n";
		$somecontent .= "User:".$user."\r\n";
		$somecontent .= "Device:".$device."\r\n";
		
		$fh = fopen($file, 'a') or die("can't open file");
		fwrite($fh, $somecontent);
		fclose($fh); 
		
		$con=mysqli_connect("127.0.0.1","schoolminor","schoolminor","schoolminor");
		// Check connection
		if (mysqli_connect_errno($con)){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$sql = "INSERT INTO devicedata (date,time,state,value,creator,create_date,device) VALUES ('".date('Y-m-d')."','".date('H:i:s')."',1,'".$_POST['hartslag']."','".$_POST['user']."','".date('Y-m-d H:i:s')."','".$device."')";

		if (!mysqli_query($con,$sql)){
			die('Error: ' . mysqli_error($con));
		}
		
		mysqli_close($con);
		
	}

	if(isset($_GET) and !empty($_GET)){
		// set file to write 
		$file = 'MinorGet.txt'; 
		$somecontent = file_get_contents($file);
		$somecontent .= print_r($_GET);  
		echo $somecontent;// see sample output below 
		
		// open file  
		$fp = fopen($file, 'w') or die('Could not open the get file!');
		
		// write to file  
		fwrite($fp, "$somecontent") or die('Could not write to the POST file');
		
		// close file  
		fclose($fp);
	} 	

?>
		<?php
		
			if(!isset($_POST) or empty($_POST)){
			
		?>
		<fieldset>
			<legend>Virtueel aanmaken</legend>
			<?php include('minorform.php'); ?>
		</fieldset>
		<fieldset>
			<legend>Aanwezig in database</legend>
			<?php require_once('MinorTable.php'); ?>
		</fieldset>
		<?php
		
			}
			
		?>
	</body>
</html>