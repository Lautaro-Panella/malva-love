<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="apple-mobbile-web-app-capable" content="yes">
	<meta name="apple-mobbile-web-app-title" content="">
	<link rel="icon" href="images/logo.png">	
	<!--=====================================
	Marcado HTML5
	======================================-->
	<meta name="title" content="USERS">
	<meta name="description" content="Administración de usuarios">
	<meta name="keyword" content="suers, perfil, web"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!--=====================================
	   CSS STYLES
	   ======================================-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/materialize.min.css">
	<link rel="stylesheet" href="css/main.css">
	<!--=====================================
	   JAVASCRIPT SCRIPTS
	   ======================================-->
	<script src="js/materialize.min.js"></script>
</head>
<body>
	<!--=====================================
	  HEADER
	   ======================================-->
    <header class="navbar-fixed">
        <nav class="pink lighten-3">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="#!" class="brand-logo left">
                        <img src="images/logo.png" width="45"></img>
                    </a>
                    <em class="brand-logo right">Love for clothes!</em>
                </div>
            </div>
        </nav>
    </header>
	<!--=====================================
	  HERO
	   ======================================-->
	<section class="section-hero">
		<div class="hero">
			<div class="container">
				<div class="container-form">
                    <div class="card">
						<?php if(isset($_SESSION['mensaje'])) { ?>
                        <div><?= $_SESSION['mensaje'] ?></div>
                        <?php session_unset(); } ?>
                        <form action="gestor.php" method="POST">
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="icon_prefix1" type="text" name="username" class="validate">
                                    <label for="icon_prefix1">Usuario o E-mail</label>
                                </div>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">lock_outline</i>
                                    <input id="icon_prefix2" type="password" name="password" class="validate">
                                    <label for="icon_prefix2">Contraseña</label>
                                </div>
                                <div class="col s12">
                                    <div class="center">
										<button type="submit" name="ingresar" class="waves-effect wives-light btn green darken-3">INGRESAR</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
			</div>
		</div>
	</section>
	<!--=====================================
	  FOOTER
	   ======================================-->
	<footer class="black">
		<div class="container">
			<p class="copy">
				&copy;Todos los derechos reservados - malva-love.
			</p>
		</div>
	</footer>

	<div class="scrolltop scrolltop-dark"></div>
	<script src="js/app.js"></script>
</body>
</html>