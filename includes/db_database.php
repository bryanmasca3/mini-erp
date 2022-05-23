<?php
  class MySQL {
    private $conexion;
    public function __construct() {
        $host   = "127.0.0.1:3307";
        $dbname = "isg0f26bvkz76vjd";
        $user   = "root";
        $pass   = "";
 
        /* $host   = "localhost";
        $dbname = "kevivphl_sb_erp";
        $user   = "kevivphl_ksanchezgo";
        $pass   = "Kanchez123";

        //heroku_2
        $host   = "kutnpvrhom7lki7u.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $dbname = "isg0f26bvkz76vjd";
        $user   = "x0obcpfmbmeoh6g2";
        $pass   = "jjvuwi069kl9bqid";*/

        if (!isset($this->conexion)) {
            $this->conexion = (mysqli_connect($host,$user,$pass,$dbname)) or die(mysqli_error());
		
        }
        //mysqli_set_charset($conexion, "utf8");
    }
    public function query($consulta) {
        $res = mysqli_query($this->conexion, $consulta);

        if (!$res) {
          echo 'error en mi MySQL:... ' . mysqli_error(); exit;
        }
        return $res;

    }
    public function fetch_array($consulta) { return mysqli_fetch_array($consulta); }
    public function num_rows($consulta) { return mysqli_num_rows($consulta); }
    public function identidad() { return mysqli_insert_id($this->conexion); }

    public function close() { mysqli_close($this->conexion);}
  }
  $db = new MySQL();
?>
