<?php
 ob_start();
 session_start();
 require("dbconnect.php");
 
  if (isset($_SESSION['user']))
  {
	 $result = $conn->query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	 $userRow = $result->fetch(PDO::FETCH_ASSOC);
	 $userName = $userRow['userName'];
  }
  else
  {
	 $userName = "";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contact</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<div class="container clearfix">
				<div id="login">
					<?php
						if (isset($_SESSION['user'])) { ?>
							<a href="logout.php?logout"><img src="img/logout.png" height="80" width="80" alt="" title="Log Out"></a>
					<?php } else { ?>
							<a href="login.php"><img src="img/login.png" height="80" width="80" alt="" title="Log In"></a>
					<?php } ?>
				</div>
			
				<div class="logo">
					<a href="index.php"><img src="img/logo.png" height="110" width="110" alt=""></a>
				</div>
				<ul class="nav">
					<li><a href="index.php">Accueil</a></li>
					<li><a href="services.php">Services</a></li>
					<li><a href="gallery.php">Galerie</a></li>
					<li><a href="staff.php">Notre équipe</a></li>
					<li id="active"><a href="contact.php">Contact</a></li>
				</ul>
			</div>
		</div>

		<div id="welcome">
			<div class="container">
				<h3>
					<?php 
						if (isset($_SESSION['user']))
							echo "Bienvenue au GOLD'S GYM, " .$userName."!";
						else 
							echo "Bienvenue au GOLD'S GYM!";
					?>
				</h3>
				<h1>Nous vous ferons mieux</h1>
				<a href="entry_form.php">
					<button class="btn">Commencer</button>
				</a>
			</div>
		</div>
				
		<div id="contact" class="box">
	
			
			<div class="container">
				<h2 class="title">Contactez nous</h2>
				
				<div class="contact-wrap clearfix">
					<div class="contact-item">
						<img src="img/email.png" height="110" width="110" alt="">
						<h5 class="title">E-MAIL</h5>
						<p class="cat">gold.gym@gmail.com</p>
					</div>
					<div class="contact-item">
						<img src="img/phone.png" height="110" width="110" alt="">
						<h5 class="title">PHONE</h5>
						<p class="cat">+38 (050) 6403905</p>
					</div>
					<div class="contact-item">
						<img src="img/address.png" height="110" width="110" alt="">
						<h5 class="title">ADRESSE</h5>
						<p class="cat">Kharkov, Buchma str, 4</p>
					</div>					
				</div>
				
				<form action="contact.php" method="post" id="messege">
					<div class="clearfix">
						<div class="left">
							<input type="text" placeholder="Votre nom *" name="fio">
							<input type="text" placeholder="Votre e-mail *" name="email">
							<input type="text" placeholder="Sujet" name="subject">
						</div>
						<div class="right">
							<textarea cols="30" rows="10" placeholder="Votre message *" name="textarea"></textarea>
						</div>
					</div>
					<input class="btn" type="submit" value="Envoyer">
				</form>				
			</div>
		</div>
		
		

		<div id="copyright-contact">
			<div class="container clearfix">
				<p class="left">&copy; Copyright 2016. Créé par Arsen Pahi.</p>
				<div class="social">
					<a href="#" class="social-icon facebook-black"></a>
					<a href="#" class="social-icon twitter-black"></a>
					<a href="#" class="social-icon instagram-black"></a>
					<a href="#" class="social-icon google"></a>
				</div>
			</div>
		</div>

	</div>
</body>
</html>