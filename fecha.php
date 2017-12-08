<?php
	$FECHA="17-07-2016";

	echo "$FECHA";

	echo "<br>";
	echo "<br>";
		
	$f_dia=substr($FECHA,  0, 2);
	$f_mes=substr($FECHA,  3, 2);
	$f_anio=substr($FECHA, 6, 4);

	echo "$f_dia";
	echo "<br>";
	echo "$f_mes";
	echo "<br>";
	echo "$f_anio";
?>