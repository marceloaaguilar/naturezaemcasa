<?php    
        class dbinfo {
            private $mysqli;
            public function __construct(){
                
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
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
            

            



        //     private $conn;
        //      public function __construct() {
        //         define("PORT", "3306");
        //         define("DB", "natu0636_naturezaEmCasaBlog");
        //         define("END", "br750.hostgator.com.br");
        //         define("USER", "natu0636_marcelo");
        //         define("PASS", "Marcelo@Natureza"); 

        //         // define("PORT", "3306");
        //         // define("DB", "natu0636_naturezaEmCasaBlog");
        //         // define("END", "127.0.0.1");
        //         // define("USER", "root");
        //         // define("PASS", "12042002"); 


                
        //         try {
                    
        //             $this->conn = new PDO('mysql:host=' . END . ';port=' . PORT . ';dbname=' . DB . ';charset=utf8', USER, PASS);
        //             $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                   
                    
                    
        //         } catch (PDOException $e){
        //             var_dump($e);
        //         }
                

            
        // }

        // public function get_conn(){
        //     return $this -> conn;
        // }

           
        }
            
        


