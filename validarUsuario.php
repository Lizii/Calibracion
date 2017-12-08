<?php
	include_once("DBManager.php");
	
	$objCon = new DBManager;
	
	if ($objCon->conectar()==true)
	{	  
		$usuario = $_POST["usuario"];   
		$pwd = $_POST["pwd"];
						   
		$result = mysql_query("SELECT * FROM tbsr WHERE Usuario = '$usuario'");
		if($row = mysql_fetch_array($result))
		{     
			if($row["Pwd"] == $pwd)
			{
				session_start();  
				$_SESSION['usuario'] = $usuario; 
				$_SESSION['tipo_usuario'] = $row['Tipo_Usuario']; 
				$_SESSION['nombre'] = $row['Nombre']; 
				$_SESSION['correo'] = $row['Correo']; 
				//Redireccionamos a la página: index.php
				echo "<script language='JavaScript'>
					      window.location.href='index.php'
					  </script>";  
			}
			
			else
			{
				echo "<script languaje='JavaScript'>
					      alert('¡Contraseña Incorrecta!');
					      window.location.href='login.php'
				      </script>";				 
			}
		}
		
		else
		{
			//En caso que el nombre de administrador es incorrecto enviamos un msj y redireccionamos a login.php
			echo "<script languaje='javascript'>
				      alert('¡El nombre de usuario es incorrecto!');
				      window.location.href = 'login.php';
				  </script>";
		}
		//Mysql_free_result() se usa para liberar la memoria empleada al realizar una consulta
		mysql_free_result($result);
		mysql_close();
	}
?>