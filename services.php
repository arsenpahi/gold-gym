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
	<title>Services</title>
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
					<li id="active"><a href="#">Services</a></li>
					<li><a href="gallery.php">Galerie</a></li>
					<li><a href="staff.php">Notre équipe</a></li>
					<li><a href="contact.php">Contact</a></li>
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
		
		<div id="services" class="box_service">
			<div class="container">
				<h2 class="title">Services</h2>
				<p class="descr">Vous devriez l'essayer</p>
				<div class="services-wrap clearfix">
					<div class="services-item gym">
						<h5 class="title">Salle de gym</h5>
						<p>Votre corps deviendra plus fort, vous serez plus sûr de vous. Nos entraineurs peuvent toujours vous aider.
						</p>
					</div>
					<div class="services-item fitness">
						<h5 class="title">Aptitude</h5>
						<p>Vous avez toujours rêvé de la silhouette élancée? Alors, cette solution est faite pour vous. 
						</p>
					</div>
					<div class="services-item yoga">
						<h5 class="title">Yoga</h5>
						<p>​Nos spécialistes vont vous apprendre à utiliser votre corps pour arriver à des résultats souhaités. 
						</p>
					</div>
					
					<div class="services-item pilates">
						<h5 class="title">Pilates</h5>
						<p>C’est une forme intéressante du fitness qui ne laissera personne indifférent. Vous allez voir les résultats dans les meilleurs délais. 
						</p>
					</div>
					<div class="services-item boks">
						<h5 class="title">Boxe</h5>
						<p>Avoir de la défense est une qualité très importante dans la société moderne. 
						</p>
					</div>
					<div class="services-item massage">
						<h5 class="title">Massage</h5>
						<p>Nos spécialistes vous aideront à vous relaxer après l’entrainement intensif ou après la journée de travail. 
						</p>
					</div>
				</div>
			</div>
		</div>

		<div id="copyright">
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