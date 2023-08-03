<?php
    require("dbcontroller.php");
    if($_GET["id"]){
        if($_POST){
            if(!$_POST['chapter'] || !$_POST['title'] || !$_POST['pages']){
                die("Informação faltando.");
            }
            else{
                addCapitulo($_GET["id"], $_POST['chapter'], $_POST['title'], $_POST['pages']);
            }
        }
        else{
            die("Sem informações!");
        }
    }
    else{
        die("Sem informações!"); 
    }
    header('Location: ../admin/');
?>