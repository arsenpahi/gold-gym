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
	<title>Notre équipe</title>
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
					<li id="active"><a href="#">Notre équipe</a></li>
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
		
		<div id="team" class="box">
			<div class="container">
				<h2 class="title">Notre équipe étonnante</h2>
				<p class="descr">Nous vous présentons notre équipe de professionnels</p>
				<div class="team-wrap clearfix">
					<div class="team-item">
						<img src="img/arsen.jpg" height="220" width="220" alt="">
						<h5 class="title">Arsen Pahi</h5>
						<p class="cat">Administrator</p>
						<div class="social">
							<a href="#" class="social-icon facebook"></a>
							<a href="#" class="social-icon twitter"></a>
							<a href="#" class="social-icon instagram"></a>
						</div>
					</div>
					<div class="team-item">
						<img src="img/natalia.jpg" height="220" width="220" alt="">
						<h5 class="title">Natalia Prokopenko</h5>
						<p class="cat">Administrator</p>
						<div class="social">
							<a href="#" class="social-icon facebook"></a>
							<a href="#" class="social-icon twitter"></a>
							<a href="#" class="social-icon instagram"></a>
						</div>
					</div>
					<div class="team-item">
						<img src="img/alexander.jpg" height="220" width="220" alt="">
						<h5 class="title">Alexander Derevianko</h5>
						<p class="cat">Coach of the gym</p>
						<div class="social">
							<a href="#" class="social-icon facebook"></a>
							<a href="#" class="social-icon twitter"></a>
						</div>
					</div>
					<div class="team-item">
						<img src="img/kolya.jpg" height="220" width="220" alt="">
						<h5 class="title">Nikolay Vovk</h5>
						<p class="cat">Coach of the gym</p>
						<div class="social">
							<a href="#" class="social-icon facebook"></a>
							<a href="#" class="social-icon twitter"></a>
						</div>
					</div>
					<div class="team-item">
						<img src="img/liza.jpg" height="220" width="220" alt="">
						<h5 class="title">Elizaveta Horbatenko</h5>
						<p class="cat">Coach of the fitness</p>
						<div class="social">
							<a href="#" class="social-icon facebook"></a>
							<a href="#" class="social-icon instagram"></a>
						</div>
					</div>
					<div class="team-item">
						<img src="img/yulia.jpg" height="220" width="220" alt="">
						<h5 class="title">Yulia Skulskaya</h5>
						<p class="cat">Coach of the pilates</p>
						<div class="social">
							<a href="#" class="social-icon facebook"></a>
							<a href="#" class="social-icon twitter"></a>
							<a href="#" class="social-icon instagram"></a>
						</div>
					</div>
					<div class="team-item">
						<img src="img/alla.jpg" height="220" width="220" alt="">
						<h5 class="title">Alla Chizhova</h5>
						<p class="cat">Coach of the yoga</p>
						<div class="social">
							<a href="#" class="social-icon twitter"></a>
							<a href="#" class="social-icon instagram"></a>
						</div>
					</div>
					<div class="team-item">
						<img src="img/vlad.jpg" height="220" width="220" alt="">
						<h5 class="title">Vladislav Neychev</h5>
						<p class="cat">Coach of the boxing</p>
						<div class="social">
							<a href="#" class="social-icon facebook"></a>
							<a href="#" class="social-icon twitter"></a>
							<a href="#" class="social-icon instagram"></a>
						</div>
					</div>
					<div class="team-item">
						<img src="img/valik.jpg" height="220" width="220" alt="">
						<h5 class="title">Valentin Chugreev</h5>
						<p class="cat">Massage master</p>
						<div class="social">
							<a href="#" class="social-icon facebook"></a>
							<a href="#" class="social-icon instagram"></a>
						</div>
					</div>
				</div>
				<p class="descr team-info">Our team consists of real professionals who work every day to help you get better.</p>
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
