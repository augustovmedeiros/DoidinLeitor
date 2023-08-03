<?php
function conectar(){
    try{
        $con = new mysqli("localhost", "doidin", "(g_EvyQcRw8Qye@7", "doidinleitor");
        return $con;
    } catch (Exception $e){
        error_log($e->getMessage());
        exit("Erro ao conectar.");
        return null;
    }
    
}

function getConfig($nome){
    $con = conectar();
    $res = $con->query("SELECT * FROM config WHERE nome = '" . $nome . "'");
    $config = $res->fetch_all(MYSQLI_ASSOC);
    return $config[0]['preset'];
}

function getMangas(){
    $con = conectar();
    $res = $con->query("SELECT * FROM mangas");
    $mangas = $res->fetch_all(MYSQLI_ASSOC);
    return $mangas;
}

function getCapitulos($id){
    $con = conectar();
    $res = $con->query("SELECT * FROM capitulos WHERE manga_id = ". $id);
    $capitulos = $res->fetch_all(MYSQLI_ASSOC);
    return $capitulos;
}

function addManga($nome, $sinopse, $capa){
    $con = conectar();
    try{
        $stmt = $con->prepare("INSERT INTO mangas (nome, sinopse, capa) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nome, $sinopse, $capa);
        $stmt->execute();
        $stmt->close();
        return True;
    }catch (Exception $e){
        error_log($e->getMessage());
        exit("Erro ao adicionar.");
        return False;
    }
}

function getManga($id){
    $con = conectar();
    try{
        $stmt = $con->prepare("SELECT * FROM mangas WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $mangas = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if(count($mangas) == 1){
            return $mangas[0];
        }
        else{
            return null;
        }
    }catch (Exception $e){
        error_log($e->getMessage());
        exit("Erro ao carregar.");
        return False;
    }
}

function removeManga($id){
    $con = conectar();
    try{
        $stmt = $con->prepare("DELETE FROM mangas WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt = $con->prepare("DELETE FROM capitulos WHERE manga_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        return True;
    }catch (Exception $e){
        error_log($e->getMessage());
        exit("Erro ao remover.");
        return False;
    }  
}

function addCapitulo($mangaid, $numero, $titulo, $paginas){
    $con = conectar();
    try{
        $stmt = $con->prepare("INSERT INTO capitulos (manga_id, numero, titulo, paginas) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("issi", $mangaid, $numero, $titulo, $paginas);
        $stmt->execute();
        $stmt->close();
        return True;
    }catch (Exception $e){
        error_log($e->getMessage());
        exit("Erro ao adicionar.");
        return False;
    }
}

function getCapitulo($id){
    $con = conectar();
    try{
        $stmt = $con->prepare("SELECT * FROM capitulos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $capitulos = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if(count($capitulos) == 1){
            return $capitulos[0];
        }
        else{
            return null;
        }
    }catch (Exception $e){
        error_log($e->getMessage());
        exit("Erro ao carregar.");
        return False;
    }
}

function removeCapitulo($id){
    $con = conectar();
    try{
        $stmt = $con->prepare("DELETE FROM capitulos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        return True;
    }catch (Exception $e){
        error_log($e->getMessage());
        exit("Erro ao remover.");
        return False;
    }  
}

//trocar id por slug.
?>