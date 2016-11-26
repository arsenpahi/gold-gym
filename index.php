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
	<title>Accueil</title>
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
					<li id="active"><a href="#">Accueil</a></li>
					<li><a href="services.php">Services</a></li>
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
		
		<div id="home" class="box">
			<div class="container">
				<blockquote>
					<p>"Le plus grand plaisir dans la vie est de réaliser ce que les autres vous pensent incapables de réaliser"</p>
					<cite>Walter Bagehot</cite>
				</blockquote>
				
				<p>
				La vie sédentaire provoque le flou de votre silhouette, l’augmentation de la tension artérielle et la perte de l’appétit. Vos os deviennent plus fragiles, les muscles – plus mous et douloureux. Vous vous fatiguez très vite, le moral tombe. Vous êtes souvent déprimés. La norme médicale simple du mouvement d’un individu prévoit 15000 pas (10 km) par jour.
				</p>
				<p>
				Si vous aviez vécu il y a plusieurs siècles, vous auriez dû bouger beaucoup afin de vous procurer de la nourriture, construire une maison, fabriquer les vêtements etc. En plus, vous auriez joué à courir, dansé les danses traditionnelles, participé à des compétitions en lancement du poids, vous seriez descendus des montagnes et auriez joué à de différents jeux ce qui nécessite être en bonne forme physique.
				</p>
				<p>
				A notre époque, pour s’habiller et se nourrir il ne faut pas faire de gros efforts physiques, pourtant vous avez toujours besoin des exercices physiques.
				</p>
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
<?php ob_end_flush(); ?>