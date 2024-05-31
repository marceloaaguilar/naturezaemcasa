<?php
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    $data = [];

    if(isset($_FILES['upload']['name'])){
        $filename          = $_FILES['upload']['name'];
        $file_path         = '../images/content/'. $filename;
        $file_extension    = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
        $file              = file_get_contents($_FILES['upload']['tmp_name']);
        if($file_extension == 'jpg' || $file_extension == 'jpeg' || $file_extension == 'png'){
            if(file_put_contents($file_path, $file)){
                $data['file'] = $filename;
                $data['url'] = 'blog/'.$file_path;
                $data['uploaded'] = 1;
            }
            else {
                $data['uploaded'] = 0;
                $data['error']['message'] = 'Error! File not uploaded';
            }
        }
        else {
            $data['uploaded'] = 0;
            $data['error']['message'] = 'Error! Invalid extension';
        }
    }
    echo json_encode($data);


?>