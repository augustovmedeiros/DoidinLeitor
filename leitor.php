<!DOCTYPE html>
<html lang="en">
<?php
    require("controller/capitulo.php");
    require("template/header.html");
    $url = getConfig('url');
?>
<body>
    <main>
        <div class="chapter-pages">
            <div class="paginaChoose">
                <select onchange="trocarPag()" id="page-select">
                </select>
            </div>
            <div class="current-page">
                <img onclick="avancarPag()" class="pagina-img" src="/imgs/mangas/1/1/1.jpg">
            </div>
            <div class="page-navigation">
                <button onclick="voltarPag()" id="prev-page">Anterior</button>
                <button onclick="avancarPag()" id="next-page">Próxima</button>
            </div>
        </div>
    </main>
    <script>
    var actualPage = 1;
    <?php
    echo 'var totalPages = '. $capData['paginas'] .';';
    echo 'var capUrl = "' . $url . '/imgs/mangas/'. $capData['manga_id'] . '/'. $capData['id'] . '/";';
    ?>
    document.getElementById('page-select').innerHTML += "<?php
    for($i=1; $i<=$capData['paginas']; $i++){
        echo '<option value='. $i .'>Página '. $i .'</option>';
    }      
    ?>";
    function voltarPag(){
        if(actualPage > 1){
            actualPage--;
            pageUrl = capUrl + actualPage + ".jpg";
            document.getElementsByClassName('pagina-img')[0].src = pageUrl;
            document.getElementById('page-select').value = actualPage;
        }
    }
    function avancarPag(){
        if(actualPage < totalPages){
            actualPage++;
            pageUrl = capUrl + actualPage + ".jpg";
            document.getElementsByClassName('pagina-img')[0].src = pageUrl;
            document.getElementById('page-select').value = actualPage;
        }
    }
    function trocarPag(){
        actualPage = document.getElementById('page-select').value
        pageUrl = capUrl + actualPage + ".jpg";
        document.getElementsByClassName('pagina-img')[0].src = pageUrl;
        document.getElementById('page-select').value = actualPage;
    }
</script>
<?php
    require("template/footer.html");
?>
</body>
</html>