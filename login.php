<!DOCTYPE html>
<html> 
<head> 
<link rel="stylesheet" type="text/css" href="style.css"/>
<meta charset="UTF-8">
<title>Index</title>
</head>

<body>
<div id="formwrap">
<h1> Login </h1>
<form id="form" action="index.php" method="POST">
Gebruikersnaam: <input type="text" name="user" /><br/>
Wachtwoord: <input type="password" name="pass"/> <br/>
<input id= "submit" type="submit" value="Submit" name="submit" />
</form>
</div>
</body>
</html>


<?php

if(isset($_POST['user']) && isset($_POST['pass'])){
	if (empty($_POST['user']) or empty($_POST['pass'])) {
    echo '<div id="rood"><p>Vul je gebruikersnaam en wachtwoord in.</p></div>';
	}
	else {
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	
	echo 'Je gebruikersnaam is: ' . $user . '<br>' . '<br>';
	echo 'Je wachtwoord is: ' . $pass . '<br>';
	
	include 'connectdb.php';
	$sql = "SELECT GebruikersID, Gebruikersnaam, Wachtwoord FROM gebruikers WHERE gebruikersnaam = '$user' AND Wachtwoord = '$pass' LIMIT 1";
	$query = mysql_query($sql, $connect);
	$rij = mysql_fetch_row($query);
	$gebruikersid = $rij[0];
	$dbuser = $rij[1];
	$dbpass = $rij[2];
	
	if ($user == $dbuser && $pass == $dbpass) {
	
		echo '<br>' . '<div id="groen"><p>Je hebt succesvol ingelogd.<p></div>';
		}
	
	
	else{
		echo '<br>' . '<div id="rood"><p>Je gebruikersnaam of wachtwoord is verkeerd ingevuld of de gebruiker bestaat niet.</p></div>';
		}
	}
}

?>
