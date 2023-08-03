<?php
    require("dbcontroller.php");
    if($_POST){
        if(!$_POST['title'] || !$_POST['sinopse'] || !$_POST['cover']){
            die("Informação faltando.");
        }
        else{
            addManga($_POST['title'], $_POST['sinopse'], $_POST['cover']);
        }
    }
    else{
        die("Sem informações!");
    }
    header('Location: ../admin/');
?>