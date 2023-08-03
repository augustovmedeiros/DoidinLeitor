<?php
    require("dbcontroller.php");
    if($_GET["id"]){
        $capData = getCapitulo($_GET["id"]);
        if(!$capData){
            header('Location: index.php');
        }
    }
    else{
        header('Location: index.php');
    }
?>