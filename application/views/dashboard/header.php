<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>

        <meta charset="utf-8">
        <title>Admin</title>

        <meta
            name='viewport'
            content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'
            />

        <link href="https://fonts.googleapis.com/css?family=Muli:400,600,700" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">



    </head>
    <body>

        <div class="todo">

            <nav clas="navbar">
                <ul>
                    <li><a href="<?php echo base_url()?>Dashboard"> Strona glowna</a></li>
                    <li><a href="<?php echo base_url()?>CsvImport">Importuj plik CSV</a></li>
                    <li><a href="<?php echo base_url()?>Api/updateTrackingLog">Wymuś aktualizację API</a></li>
                    <li><a href="<?php echo base_url()?>Dashboard/logout">Wyloguj</a></li>
                    
                </ul>
                <div id="flash_info">
                    
                </div>
            </nav>

