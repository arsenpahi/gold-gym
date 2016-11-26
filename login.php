<?php
 ob_start();
 session_start();
 require("dbconnect.php");
 
 // it will never let you open index(login) page if session is set
 //if ( isset($_SESSION['user'])!="" ) 
 //{
	//header("Location: home.php");
	//exit;
 //}
 
 $error = false;
 
 if( isset($_POST['btn-login']) ) 
 { 
		
	  // prevent sql injections/ clear user invalid inputs
	  $email = trim($_POST['email']);
	  $email = strip_tags($email);
	  $email = htmlspecialchars($email);
	  
	  $pass = trim($_POST['pass']);
	  $pass = strip_tags($pass);
	  $pass = htmlspecialchars($pass);
	  // prevent sql injections / clear user invalid inputs
  
	  if(empty($email))
	  {
		   $error = true;
		   $emailError = "Entrez votre adresse e-mail.";
	  } 
	  else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) 
	  {
		   $error = true;
		   $emailError = "Entrez une adresse e-mail valide.";
	  }
  
	  if(empty($pass))
	  {
		   $error = true;
		   $passError = "Entrez votre mot de passe.";
	  }
  
	  // if there's no error, continue to login
	  if (!$error) 
	  {
	   
			$password = hash('sha256', $pass); // password hashing using SHA256
	  
			$result = $conn->query("SELECT userId, userName, userPass FROM users WHERE userEmail='$email'");
			$row = $result->fetch(PDO::FETCH_ASSOC);
			$count = $result->rowCount();
			if($count == 1 && $row['userPass']==$password)
			{
				$_SESSION['user'] = $row['userId'];
				header("Location: index.php");
			}
			else
			{
				$errMSG = "Information incorrecte, essayez encore...";
			}		
	  }
  
 }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Entrer</title>
<link rel="stylesheet" href="css/logreg.css" media="screen" type="text/css" />
</head>
<body>

<div id="home">
	<a href="index.php"><img src="img/home.png" height="80" width="80" alt="" title="Home"></a>
</div>				

<div id="login">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            
        <?php
			if (isset($errMSG)) { ?>
			
			<p>
				<?php echo $errMSG; ?>
			</p>
		
        <?php } ?>	
            
            <p>
				<span class="fontawesome-envelope"></span>
				<input type="email" placeholder="Entrez votre e-mail" name="email" maxlength="40" />
				<?php if (isset ($emailError))
						echo $emailError; ?>	
			</p> 
            <p>
				<span class="fontawesome-lock"></span>
				<input type="password" placeholder="Entrez votre mot de passe" name="pass" maxlength="15" />
				<?php if (isset ($passError))
						echo $passError; ?>
			</p>       
            <p>
				<input type="submit" value="Entrer" name="btn-login"/>
			</p>           
            
            <p>Voulez-vous vous inscrire? &nbsp;&nbsp;
				<a href="register.php">S'inscrire</a>
			</p>   
    </form>
</div>
</body>
</html>
<?php ob_end_flush();?>