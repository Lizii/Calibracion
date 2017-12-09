<?php
    include_once ("iniciar.php"); 
    $USUARIO=strtoupper($_SESSION['usuario']); 
?>

<!DOCTYPE html>
<html>
    <head>
        <title> NCPR </title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="/ncpr/css/menu.css" media="screen">
        <link rel="stylesheet" type="text/css" href="/ncpr/css/estilos.css">
        <link rel="icon" type="image/png" href="/ncpr/img/NCPR logo.png" />
        <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'>
    </head>
	
    <body>
        <div id="titulo" > NCPR (NON-CONFORMANT PRODUCT REPORT) DATABASE <br> BASE DE DATOS CALIBRACIONES </div>
		
            <div id="wrap">
                <header>
                    <div class="inner relative">
                        <a class="logo" href="/ncpr/index.php"><img src="/ncpr/img/logotipo.png" width="263" height="50"> alt="logotipo"></a>
                        <a id="ncpr-toggle" class="button dark" href="#"><i class="icon-reorder"></i></a>
                        
                        <nav id="navigation">
                            <ul id="main-ncpr">
                                <li class="parent"><a href="#"> SISTEMA DE CALIBRACIONES </a>
                                    <ul class="sub-ncpr">
                                        <li><a href="/calibracion/AltaEquipo.php"><i class="fa fa-file"></i> ALTA EQUIPO </a></li>
										<li><a href="/calibracion/reports/ReporteCalibracion.php"><i class="fa fa-file"></i> Reporte </a></li>
										<li><a href="/calibracion/reports/NuevaCalibracion.php"><i class="fa fa-file"></i> NUEVA CALIBRACION </a></li>
                                    </ul>
                                </li>
								
								<li class="parent"><a href="#"> NCPR </a>
                                    <ul class="sub-ncpr">
                                        <li><a href="/ncpr/AltaNcpr.php"><i class="fa fa-file"></i> Generar NCPR </a></li>
                                    </ul>
                                </li>
                                
                                <li class="parent"><a href="#"> REPORTES </a>
                                    <ul class="sub-ncpr">
                                        <li><a href="/ncpr/reports/ReporteNcprs.php"><i class="fa fa-file-text-o"></i> Reporte de NCPR's </a></li>
                                        <li><a href="/ncpr/reports/reporteNCPRFechas.php"><i class="fa fa-file-text-o"></i> Reporte de NCPR's por fecha </a></li>
										<li><a href="/calibracion/reports/reporteCalibracion.php"><i class="fa fa-file-text-o"></i> Reporte de Calibraciones </a></li>
                                    </ul>
                                </li>

                                <?php
                                    if($_SESSION['tipo_usuario']=="Administrador")
                                    {
                                ?>
                                        <li class="parent"><a href="#"> USUARIO </a>
                                            <ul class="sub-ncpr">
                                              <li><a href="/ncpr/AltaUsuarios.php"><i class="fa fa-users"></i> Alta de Usuarios </a></li>
                                              <li><a href="/ncpr/reports/ReporteUsuarios.php"><i class="fa fa-terminal"></i> Modificar Usuarios </a></li>
                                            </ul>
                                        </li>
                                <?php
                                    }
                                ?>    

                                <li class="parent"><a href="#"> <?php echo "$USUARIO" ?> </a>
                                    <ul class="sub-ncpr">
                                        <li><a href="/calibracion/logout.php"><i class="fa fa-sign-out"></i> Cerrar Sesión </a></li>
                                    </ul>
                                </li>

                            </ul>
                        </nav>
                        <div class="clear"></div>
                    </div>
                </header>   
            </div>
        </body>  
    </body>
</html>