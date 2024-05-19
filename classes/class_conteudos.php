<?php

require_once 'dbinfo.php';
$dbinfo = new dbinfo();
$result = $dbinfo -> select("SELECT sequencial_Conteudo,titulo_Conteudo,texto_Conteudo,diretorio_Conteudo,data_Criacao,imagem_Conteudo FROM nec_conteudos");
?>