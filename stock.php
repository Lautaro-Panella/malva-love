<!DOCTYPE html>
<html lang="en">
<?php include 'dataBase.php';?>
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
                    <a href="#" data-target="nav-movil" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="historial.php" class="waves-effect wives-light btn black">Historial</a></li>
						<li><a href="ventas.php" class="waves-effect wives-light btn black">&ensp;Ventas&ensp;</a></li>
						<li><a href="stock.php" class="waves-effect wives-light btn black">&ensp;&nbsp;Stock&nbsp;&ensp;</a></li>
						<li><a href="login.php">Salir</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <ul class="sidenav" id="nav-movil">
            <li><a href="stock.php" class="waves-effect wives-light btn black">&ensp;&nbsp;Stock&nbsp;&ensp;</a></li>
            <li><a href="ventas.php" class="waves-effect wives-light btn black">&ensp;Ventas&ensp;</a></li>
            <li><a href="historial.php" class="waves-effect wives-light btn black">Historial</a></li>
            <li><a href="login.php">Salir</a></li>
        </ul>
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
                                    <input placeholder="Descripción" name="descripcion" id="descripcion" type="text" class="validate" required>
                                    <label class="active" for="descripcion">Cargá una nueva prenda acá:</label>
                                </div>
                                <div class="input-field col s6">
                                    <input placeholder="Código" name="codigo" id="codigo" type="text" class="validate" required>
                                    
                                </div>
                                <div class="input-field col s6">
                                    <input placeholder="Categoría" name="categoria" id="categoria" type="number" class="validate" required>
                                </div>
                                <div class="input-field col s6">
                                    <input placeholder="Cantidad" name="cantidad" id="cantidad" type="number" class="validate" required>
                                </div>
                                <div class="input-field col s6">
                                    <input placeholder="Costo" name="costo" id="costo" type="number" class="validate" required>
                                </div>
                                <div class="col s12">
                                    <div class="center">
                                        <button type="submit" name="guardar" class="waves-effect wives-light btn green darken-3">&ensp;GUARDAR&ensp;</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form action="gestor.php" method="POST">
                            <div>
                                <div class="input-field col s12">
                                    <select name="prenda" required>
                                        <option value="" disabled selected>Elegí una prenda</option>
                                        <?php 
                                            $query = "SELECT * FROM producto";
                                            $resultado = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_array($resultado)) { ?>
                                                <option value="<?php echo $row['codigo'];?>"><?php echo $row['descripcion']. " | Stock: " .$row['cantidad']. " uni.";?></option>
                                        <?php } ?>
                                    </select>
                                    <label>Consultá tu stock acá:</label>
                                </div>
                                <div class="col s12">
                                    <div>
                                        <div class="center">
                                            <button type="submit" name="verDetalle" class="waves-effect wives-light btn black">DETALLE<i class="material-icons left">send</i></button>
                                            <button type="submit" name="borrar" class="waves-effect wives-light btn black">BORRAR<i class="material-icons left">delete</i></button>
                                        </div>
                                    </div>
                                </div>
                                <?php if(isset($_SESSION['codigo'])) { ?>
                                    <div class="col s12">
                                        <br><span><?php echo $_SESSION['descripcion']. " | Stock: " .$_SESSION['cantidad']. " uni. | Costo: $" .$_SESSION['costo']. " | Código: " .$_SESSION['codigo']. " | Categoría: " .$_SESSION['categoria']?></span>
                                    </div>
                                <?php session_unset(); } ?>
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
    <script type="text/javascript">
          document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
</body>
</html>