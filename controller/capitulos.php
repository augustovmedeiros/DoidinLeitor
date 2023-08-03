<?php
    require("dbcontroller.php");
    if($_GET["id"]){
        $mangaData = getManga($_GET["id"]);
        if(!$mangaData){
            header('Location: index.php');
        }
        $capitulos = getCapitulos($_GET["id"]);
    }
    else{
        header('Location: index.php');
    }
?>