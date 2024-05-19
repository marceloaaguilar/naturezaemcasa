<?php
    require_once('dbinfo.php');
    $realizaQuery = new realizaQuery();
    
    if (COUNT($_POST) > 0 ){
        if($_POST["metodo"] == "update"){
            $realizaQuery-> realizarUpdate();
            return true;
        }    
        if ($_POST["metodo"] == "insert"){
           $realizaQuery ->realizarInsert();
           return true;
        }

        if ($_POST["metodo"] == "processaCadastroConteudo"){
            $return = $realizaQuery ->processaCadastroConteudo();
            return $return;
         }
    }

    else if (COUNT($_GET) > 0 ){
      return $realizaQuery -> realizarSelect();

    }

    
    

    class realizaQuery {
        
        public function __construct() {
        }


        public function realizarUpdate(){
            $dbinfo = new dbinfo();
            $query = "UPDATE nec_conteudos SET " . $_POST['campo'] . " = " . "\"{$_POST["conteudo"]}\"". " WHERE" . $_POST["where"];
            $result = $dbinfo -> update($query);
        }


        // public function realizarInsert(){
        //     $dbinfo = new dbinfo();
        //     $query = "INSERT INTO nec_conteudos (" . $_POST['campos']. ") VALUES (" . $_POST['valores'] . ")";

        //     if (isset($_FILES)){
        //             $image = $this -> inserirImagens();
        //             $campos = explode(",", $_POST['campos']);
        //             $valores = explode(",", $_POST['valores']);
        //             $valores[array_search("imagem_Conteudo", $campos)] = "\"$image\"";
        //             $query = "INSERT INTO nec_conteudos (" . implode(",",$campos). ") VALUES (" . implode(",", $valores) . ")";

        //     }

        //     $result = $dbinfo -> insert($query);
        // }


        public function realizarSelect(){
            $dbinfo     = new dbinfo();
            $where      = "";
            $orderby    = "";
            $limit      = "";
            $innerjoin  = ""; 
            $campos     = $_GET['campos'];
            isset($_GET['where'])? $where = " WHERE " . $_GET['where'] : "";
            isset($_GET['orderby'])? $orderby = " ORDER BY " . $_GET['orderby'] : $orderby = "";  
            isset($_GET['limit'])? $limit = " LIMIT " . $_GET['limit'] : $limit = "";  
            isset($_GET['innerjoin'])? $innerjoin =  $_GET['innerjoin'] : $innerjoin = "";  
            $query = "SELECT $campos from nec_conteudos" . $innerjoin . $where . $orderby . $limit;
            $result = $dbinfo -> select($query); 
            return json_encode($result);
            
        }

       public function processaCadastroConteudo(){

        $dbinfo = new dbinfo();
        $colunmsQuery = [];
        $valuesQuery  = [];

         COUNT($_FILES['imgPrincipal']) > 0 ? array_push($colunmsQuery, 'imagem_principal') && array_push($valuesQuery,  base64_encode(file_get_contents($_FILES['imgPrincipal']['tmp_name']))  ): "";
         COUNT($_FILES['imgCabecalho']) > 0 ? array_push($colunmsQuery, 'imagem_cabecalho') && array_push($valuesQuery, base64_encode(file_get_contents($_FILES['imgCabecalho']['tmp_name'])) ): '';
         COUNT($_FILES['imgCorpo']) > 0 ? array_push($colunmsQuery, 'imagem_corpo') && array_push($valuesQuery,  base64_encode(file_get_contents($_FILES['imgCorpo']['tmp_name'])) ): '';
         COUNT($_FILES['imgRodape']) > 0 ? array_push($colunmsQuery, 'imagem_rodape') && array_push($valuesQuery,  base64_encode(file_get_contents($_FILES['imgRodape']['tmp_name'])) ): '';

 
        if ($_POST['titulo'] !== ''){
            array_push($colunmsQuery, 'titulo_Conteudo');
            array_push($valuesQuery,  $_POST['titulo'] );
        }

        if ($_POST['texto'] !== ''){
            array_push($colunmsQuery, 'texto_Conteudo');
            array_push($valuesQuery, $_POST['texto']);
        }

        if ($_POST['tipoConteudo'] !== ''){
            array_push($colunmsQuery, 'tipo_conteudo');
            array_push($valuesQuery,  $_POST['tipoConteudo'] );
        }

        array_push($colunmsQuery, 'diretorio_conteudo');
        array_push($valuesQuery, str_replace(' ', '-', $_POST['titulo']));

        try {
            $result = $dbinfo -> insert("nec_conteudos",$colunmsQuery,$valuesQuery);
            return true;
        }
        catch(Exception $error){
            var_dump($error);
            return false;
        }

       }





    }
?>