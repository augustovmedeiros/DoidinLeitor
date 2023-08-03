<!DOCTYPE html>
<html lang="en">
<?php
    require("controller/dbcontroller.php");
    require("template/header.html");
    $mangas = getMangas();
    $url = getConfig('url');
?>
<body>
    <main>
        <div class="manga-list">
            <?php
            for($i=0; $i<count($mangas); $i++){
                echo '<a href="' . $url . '/capitulos.php?id=' . $mangas[$i]["id"] . '">';
                echo '<div class="manga-item">';
                echo '<img src="'. $mangas[$i]["capa"] .'">';
                echo '<h2>'. $mangas[$i]["nome"] .'</h2>';
                echo '</div>';
                echo '</a>';
            }
            ?>
        </div>
    </main>
<?php
    require("template/footer.html");
?>    
</body>
</html>
