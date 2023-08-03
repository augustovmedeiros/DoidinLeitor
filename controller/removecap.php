<?php
require("dbcontroller.php");
if($_GET){
    if(!$_GET['id']){
        die("Informação faltando.");
    }
    else{
        removeCapitulo($_GET['id']);
    }
}
else{
    die("Sem informação!");
}
header('Location: ../admin/');
?>