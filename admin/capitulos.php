<!DOCTYPE html>
<html lang="en">
<?php
    require("../controller/capitulos.php");
    require("../template/header.html");
    $url = getConfig('url');
?>
<body>
    <main>
        <div class="crud-form">
            <h2>Adicionar Capítulo</h2>
            <form action="../controller/addcap.php?id=<?php echo $mangaData["id"] ?>" method="post">
                <label for="chapter">Capítulo:</label>
                <input type="text" id="chapter" name="chapter" required>

                <label for="title">Título:</label>
                <input type="text" id="title" name="title" required>

                <label for="pages">Pagínas:</label>
                <input type="number" id="pages" name="pages" required>

                <button type="submit">Salvar</button>
            </form>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Capítulo</th>
                    <th>Título</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for($i=0; $i<count($capitulos); $i++){
                    echo '<tr>';
                    echo '<td>'. $capitulos[$i]['numero'] .'</td>';
                    echo '<td>'. $capitulos[$i]['titulo'] .'</td>';
                    echo '<td><a href="'. $url . '/controller/removecap.php?id='. $capitulos[$i]['id'] .'">Deletar</a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </main>
    <?php
        require("../template/footer.html");
    ?>
</body>
</html>
