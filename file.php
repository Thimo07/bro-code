<?php
session_start();
if(isset($_POST['submit']))
{
  $code=$_POST['code'];
	if ($code) 
	{
		$connect=mysql_connect("localhost","root","") or die("Erreur de connexion à la base");
		mysql_select_db("bddformation");
		$query=mysql_query("SELECT code FROM agent WHERE code='$code'");
		$rows=mysql_num_rows($query);
		if($rows==1)
		{
			$_SESSION['code']=$code;
			header('location:membre.php');
		}else echo "Code incorrect";
	}else echo "Veuillez entrer votre code agent";
}



?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
		<link rel="icon" type="image/png" href="images/favicon.png" />
		<title>Accueuil</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<div class="block">
<form method="POST" action="login.php">
<h1>Veuillez entrer votre code agent</h1>
<input type="text" name="code" maxlength="8" autocomplete="off" class="textcode" /></br>
<input type="submit" value="s'incrire" name="submit" class="bouton_submit">
</form>
		</div>
	</body>
</html>
