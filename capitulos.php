<!DOCTYPE html>
<html lang="en">
<?php
    require("controller/capitulos.php");
    require("template/header.html");
    $url = getConfig('url');
?>
<body>
    <main>
        <div class="manga-info">
        <?php
            echo '<img src="'. $mangaData['capa'] .'">';
            echo '<h2>'. $mangaData['nome'] .'</h2>';
            echo '<p>'. $mangaData['sinopse'] .'</p>';
        ?>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Capítulo</th>
                    <th>Título</th>
                    <th>Ler</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for($i=0; $i<count($capitulos); $i++){
                    echo '<tr>';
                    echo '<td>'. $capitulos[$i]['numero'] .'</td>';
                    echo '<td>'. $capitulos[$i]['titulo'] .'</td>';
                    echo '<td><a href="'. $url .'/leitor.php?id='. $capitulos[$i]['id'] .'">Ler</a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </main>
<?php
    require("template/footer.html");
?>
</body>
</html>
