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
	<title>Galerie</title>
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
					<li id="active"><a href="#">Galerie</a></li>
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
		
		<div id="gallery" class="box">
			<div class="container">
				<h2 class="title">Our gallery</h2>
				<p class="descr">Thus looks our halls for training</p>
				
				<div class="images">
					<img src="img/gallery1.jpg" alt=""/>
					<img src="img/gallery2.jpg" alt=""/>
					<img src="img/gallery3.jpg" alt=""/>
					<img src="img/gallery4.jpg" alt=""/>
					<img src="img/gallery5.jpg" alt=""/>
					<img src="img/gallery6.jpg" alt=""/>
					<img src="img/gallery7.jpg" alt=""/>
					<img src="img/gallery8.jpg" alt=""/>
					<img src="img/gallery9.jpg" alt=""/>
					<img src="img/gallery10.jpg" alt=""/>
					<img src="img/gallery11.jpg" alt=""/>
					<img src="img/gallery12.jpg" alt=""/>
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