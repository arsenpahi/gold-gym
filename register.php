<?php
 ob_start();
 session_start();
 if( isset($_SESSION['user'])!= "" )
 {
	header("Location: index.php");
 }
 
 include ("dbconnect.php");

 $error = false;

 if ( isset($_POST['btn-signup']) ) {
  
  // clean user inputs to prevent sql injections
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  // basic name validation
  if (empty($name)) 
  {
	   $error = true;
	   $nameError = "Entrez votre nom complet.";
  } 
  else if (strlen($name) < 3) 
  {
	   $error = true;
	   $nameError = "Le nom doit contenir au moins 3 caractères.";
  } 
  else if (!preg_match("/^[a-zA-Z ]+$/",$name)) 
  {
	   $error = true;
	   $nameError = "Le nom doit contenir les lettres seulement.";
  }
  
  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) 
  {
	   $error = true;
	   $emailError = "Entrez une adresse e-mail valide.";
  } 
  else 
  {
	   // check email exist or not
	   $result = $conn->query("SELECT userEmail FROM users WHERE userEmail='$email'");
	   $count = $result->rowCount();
	   if($count!=0)
	   {
			$error = true;
			$emailError = "Cet email est déjà utilisé.";
	   }
  }
  // password validation
  if (empty($pass))
  {
	   $error = true;
	   $passError = "Entrez votre mot de passe.";
  } 
  else if(strlen($pass) < 6) 
  {
	   $error = true;
	   $passError = "Le mot de passe doit contenir au moins 6 caractères.";
  }
  
  // password encrypt using SHA256();
  $password = hash('sha256', $pass);
  
  // if there's no error, continue to signup
  if( !$error ) 
  {
   
	   $query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$password')";
	   $res = $conn->query($query);
		
	   if ($res) 
	   {
			$errTyp = "succès";
			$errMSG = "Enregistré avec succès, vous pouvez entrer maintenant.";
			unset($name);
			unset($email);
			unset($pass);
	   } 
	   else 
	   {
		$errTyp = "danger";
		$errMSG = "Quelque chose allait mal, essayer encore plus tard..."; 
	   } 
    
  }
  
  
 }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>S'inscrire</title>
<link rel="stylesheet" href="css/logreg.css" media="screen" type="text/css" />
</head>
<body>

<div id="home">
	<a href="index.php"><img src="img/home.png" height="80" width="80" alt="" title="Home"></a>
</div>				

 <div id="register">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
		<?php
			if ( isset($errMSG) ) 
			{ ?>
				<p>
					<?php echo $errMSG; ?>
				</p>
		
        <?php } ?>				
		
		<fieldset class="clearfix">
                <p>
					<span class="fontawesome-user"></span>
					<input type="text" placeholder="Entrez votre nom" name="name" maxlength="50" value="<?php //echo $name ?>" />
					<?php if (isset($nameError))
						echo $nameError; ?>		
				</p> 
				<p>
					<span class="fontawesome-envelope"></span>
					<input type="email" placeholder="Entrez votre e-mail" name="email" maxlength="40" value="<?php //echo $email ?>" />
					<?php if (isset($emailError)) 
					echo $emailError; ?>		
				</p> 
                <p>
					<span class="fontawesome-lock"></span>
					<input type="password" placeholder="Entrez votre mot de passe" name="pass" maxlength="15" />
					<?php if (isset($passError)) 
					echo $passError; ?>
				</p>
                <p>
					<input type="submit" value="S'inscrire" name="btn-signup">
				</p>
        </fieldset>
        
		<p>Voulez-vous entrer? &nbsp;&nbsp;
			<a href="login.php">Entrer</a>
		</p>   
    </form>
 </div>
</body>
</html>
<?php ob_end_flush(); ?>