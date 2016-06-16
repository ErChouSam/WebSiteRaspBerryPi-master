<?php 
	$mysqli = mysqli_connect("localhost","root","","userdata");#"192.168.1.17"/
	if (!$mysqli) {
	    printf("Échec de la connexion : %s\n", $mysqli->connect_error);
	    exit();
	}
	echo "Connecter";
	$Pseudo = $_POST['Pseudo']; 
	$MDP = $_POST['mdp']; 
	$TRUE = 0;
	$query = "SELECT username,password FROM usertable";
	if ($select = mysqli_prepare($mysqli, $query)) {
	    mysqli_stmt_execute($select);
	    mysqli_stmt_bind_result($select, $BDUsername, $BDPassword);
	    while (mysqli_stmt_fetch($select)) {
	        if($BDUsername == $Pseudo){
	        	if ($BDPassword == $MDP) {
	        		header('Location: index.php?connexion=' .$sucess="sucess");
	        		$TRUE = 1;
	        	}
	        }
	    }
	    if ($TRUE == 0) {
	    	header('Location: Error.php');
	    }
	    mysqli_stmt_close($select);
	}
	mysqli_close($mysqli);
?>