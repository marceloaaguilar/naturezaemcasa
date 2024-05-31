<?php    
        class dbinfo {
            private $mysqli;
            public function __construct(){
                
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                // $this -> mysqli = new mysqli('br750.hostgator.com.br', 'natu0636_marcelo', 'Marcelo@Natureza', 'natu0636_naturezaEmCasaBlog');
                $this -> mysqli = new mysqli('localhost', 'root', '12345', 'naturezaemcasa');
                $this -> mysqli->set_charset('utf8mb4');
                

                
                if ($this -> mysqli->connect_error) {
                    /* Use your preferred error logging method here */
                    error_log('Connection error: ' . $this -> mysqli->connect_error);
                }
                return $this -> mysqli;
            }

            public function select($query){
                
                $obj = [];
                $result = $this -> mysqli -> query($query);

                for ($i = 0 ; $i < $result-> num_rows; $i++){
                    array_push($obj,mysqli_fetch_object($result));
                }
                echo json_encode($obj);
                return $obj;
            }
            

            public function update($query){
                $result = mysqli_real_query($this -> mysqli,  $query);
                // $result = $this -> mysqli -> query($query, MYSQLI_USE_RESULT);
                $return[] = $result;
                $this -> mysqli->close();
                echo json_encode($return);
                return $return;
            }


            public function insert($table, $columns, $arrayValues){
                $type = rtrim(str_repeat("?, ", count($arrayValues)), ", ");
                $typeData = rtrim(str_repeat("s", count($arrayValues)), ", ");
                $stmt = $this -> mysqli->prepare("INSERT INTO $table (" . implode(",", $columns). " ) VALUES ({$type})");
                $stmt -> bind_param($typeData, ...$arrayValues);
                $return = $stmt->execute();
                
                echo json_encode($return);
                return $return;
            }
            
           
        }
            
        


