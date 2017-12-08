<?php 
    class DBManager
	{
		var $conect;
		
		function DBManager(){}
		function conectar() 
		{
		    if(!($con=@mysql_connect("192.168.2.14","adminphp","visionphp")))
			{
			    echo"Error al conectar a la base de datos";	
				exit();
			}
				
			if (!@mysql_select_db("bdcalibracion",$con)) 
			{ 
			    echo "Error al seleccionar la base de datos";  
				exit();
			}			   
			
			$this->conect=$con;
			return true;	
        }
    }
?>
