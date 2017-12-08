<?php
    include_once ("iniciar.php"); 
?>

<html> 
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=8" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="css/estilos.css" />
        <link rel="icon" type="image/png" href="img/NCPR logo.png" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script>
            $(document).ready(function() 
            {
                var table= $(e.target).closest('table');

                $('td input[type="radio"]').on('change', function() 
                {
                    $(this).siblings('td input[type="radio"]').not(this).prop('checked', false);
                });
            });
        </script>
    </head>
    
    <body>
        <div id="contenedor">
            <br>
            <br>
            <?php 
                include_once("menu.php");
            ?>
            <br><br>
        </div>
    </body>
</html>