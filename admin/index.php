<!DOCTYPE html>
<html lang="en">
<?php
    require("../controller/dbcontroller.php");
    require("../template/header.html");
    $mangas = getMangas(5);
?>
<body>
    <main>
        <div class="crud-form">
            <h2>Adicionar Novo Mangá</h2>
            <form action="../controller/addmanga.php" method="post">
                <label for="title">Título:</label>
                <input type="text" id="title" name="title" required>

                <label for="sinopse">Sinopse:</label>
                <input type="text" id="sinopse" name="sinopse" required>

                <label for="cover">Capa (URL):</label>
                <input type="text" id="cover" name="cover" required>

                <button type="submit">Adicionar</button>
            </form>
        </div>

        <div class="manga-list">
        <?php     
            for($i=0; $i<count($mangas); $i++){
                echo '<div class="manga-item">';
                echo '<img src="'. $mangas[$i]["capa"] .'">';
                echo '<h3>'. $mangas[$i]["nome"] .'</h3>';
                echo '<button class="edit-button"><a href="../admin/capitulos.php?id='. $mangas[$i]["id"] .'">Editar</a></button>';
                echo '<button class="delete-button"><a href="../controller/removemanga.php?id='. $mangas[$i]["id"] .'">Excluir</a></button>';
                echo '</div>';
            }
            ?>
        </div>
    </main>
    <?php
    require("../template/footer.html");
    ?>
</body>
</html>
