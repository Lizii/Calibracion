<html>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" type="image/png" href="img/NCPR logo.png" />
	
	<body>
		<div id="login">
			<form action="validarUsuario.php" method="post">
		      <fieldset>
		       	<legend class="legend"> Iniciar Sesión </legend>
		      
		        <div class="input">
		      	  <input type="text" placeholder="Usuario" name="usuario" required />
		          <span><i class="fa fa-user"></i></span>
		        </div>
		      
		        <div class="input">
		      	  <input type="password" placeholder="Contraseña" name="pwd" required />
		          <span><i class="fa fa-lock"></i></span>
		        </div>
		      
		        <button type="submit" class="submit"><i class="fa fa-long-arrow-right"></i></button>
		      </fieldset>
		    </form>
		</div>
	    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	    <script src="js/index.js"></script>
	</body>
</html>