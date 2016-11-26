<?php
 ob_start();
 session_start();
 require("dbconnect.php");
 
 if (isset($_SESSION['user']))
  {
	 $login = true;
	 $result = $conn->query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	 $userRow = $result->fetch(PDO::FETCH_ASSOC);
	 
	 $userId = $_SESSION['user'];
	 $userName = $userRow['userName'];
	 $userEmail = $userRow['userEmail'];
  }
  else
  {
	$login = false;
	$userName = "";
	$userEmail = "";
	$errLogin = "Désolé, mais vous n'êtes pas connecté!";
  }
 
 $error = false;

 $submit = false;
 if (isset($_POST['btn-entry'])) 
 {
	
	$submit = true;
	// clean user inputs to prevent sql injections
  
	  $serviceName = $_POST['serviceName'];
	  $abonementName = $_POST['abonementName'];
	  $coachName = $_POST['coachName'];
	  $date = date("Y-m-d");
	  
	  if( !$error ) 
	  {
   
		   $query = "INSERT INTO subscriptions(userId,serviceName,abonementName,coachName,date) VALUES($userId,'$serviceName','$abonementName','$coachName','$date')";
		   $res = $conn->query($query);
			
		   if ($res) 
		   {
				$errMSG = "Vous avez enregistré pour la formation!";
				header('Refresh: 2; url=index.php' );
		   } 
		   else 
		   {
				$errMSG = "Quelque chose allait mal, essayer encore plus tard..."; 
		   }    
	  } 
  
 }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Abonnement</title>
<link rel="stylesheet" href="css/logreg.css" media="screen" type="text/css" />
</head>
<body>

<div id="home">
	<a href="index.php"><img src="img/home.png" height="80" width="80" alt="" title="Home"></a>
</div>				

<?php if ($login && !$submit) { ?>
  <div id="entry">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">	
		<fieldset class="clearfix">
                <p>
					<span>Nom:</span>
					<input type="text" placeholder="Entrez votre nom" name="userName" maxlength="50" value="<?php echo $userName ?>" />	
				</p> 
				<p>
					<span>E-mail:</span>
					<input type="email" placeholder="Entrez votre e-mail" name="userEmail" maxlength="40" value="<?php echo $userEmail ?>" />		
				</p> 
                <p>
					<span>Choisissez le service:</span>
					<select name="serviceName">
						<option>Gym</option>
						<option>Aptitude</option>
						<option>Pilates</option>
						<option>Yoga</option>
						<option>Boxe</option>
						<option>Massage</option>
					</select>
				</p>
				<p>
					<span>Choisissez l'abonnement:</span>
					<select name="abonementName">
						<option>One time</option>
						<option>8 tr. per month</option>
						<option>12 tr. per month</option>
						<option>Bezlim</option>
					</select>
				</p>
				<p>
					<span>Choisissez l'entraîneur:</span>
					<select name="coachName">
						<option>Alexander</option>
						<option>Nikolay</option>
						<option>Elizaveta</option>
						<option>Yulia</option>
						<option>Alla</option>
						<option>Vladislav</option>
						
					</select>
				</p>
                <p id="lastp">
					<input type="submit" value="D'accord" name="btn-entry">
				</p>
        </fieldset>
    </form>
  </div>
<?php }
elseif (!$login) { ?>
	<div class="notlogin">
		<span><?php echo $errLogin; ?></span>
		<p>Voulez-vous entrer? &nbsp;&nbsp;
			<a href="login.php">Entrer</a>
		</p>
	</div>
<?php } 
elseif ($submit) { ?>
	<div class="submit_success">
		<span><?php echo $errMSG; ?></span>
	</div>
<?php } ?>

</body>
</html>
<?php ob_end_flush(); ?>