<?php

    session_start();
    $dbinfo = new mysqli('br750.hostgator.com.br', 'natu0636_marcelo', 'Marcelo@Natureza', 'natu0636_naturezaEmCasaBlog');
    // $dbinfo = new mysqli('localhost', 'root', '12345', 'naturezaemcasa');

    if (isset($_POST['usuario']) && isset($_POST['senha'])){
        $name = $_POST["usuario"];
        $pass = $_POST["senha"];
        $sql = "SELECT * from nec_usuarios where usuario = '$name' and password = '$pass'";
        $result = $dbinfo -> query($sql);
            if ($result && mysqli_num_rows($result) > 0){
            $_SESSION["usuario"] = $name;
            $_SESSION["senha"]   = $pass;
            header('Location: ../conteudos');
            return true;
            }

            else {
                $data["result"] = false;
                echo json_encode($data, JSON_PRETTY_PRINT);
            }
}

else {
    $data["result"]= "Sem conteudo post!";
    echo json_encode($data, JSON_PRETTY_PRINT);
}
 
