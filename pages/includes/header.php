<!DOCTYPE html>
<html>
<head>
	<title>Projeto EAD</title>
	<meta charset="viewport" content="width=device-width;initial-scale=1.0;maximum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>estilo/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>estilo/style.css">
</head>
<body>
<base base="<?php echo INCLUDE_PATH; ?>" />
<header>
	<div class="container">
		<div class="logo"><a href="<?php echo INCLUDE_PATH ?>">EAD</a></div>
		<nav class="desktop">
			<ul>
				<li><a href="<?php echo INCLUDE_PATH ?>?cursos">Conheça os Cursos</a></li>
				<li><a href="">Sobre</a></li>
				<li><a href="">Contato</a></li>
				<?php 
				if(!isset($_SESSION['login_aluno'])){
					echo '<li><a href="'.INCLUDE_PATH.'?login">Login</a></li>';
				}	
					if(isset($_SESSION['login_aluno'])){
						echo '<li><a href="'.INCLUDE_PATH.'?deslogar">Logout</a></li>';
					}					
				?>
			</ul>	
		</nav>
		<div class="clear"></div>
	</div><!--container-->
</header>