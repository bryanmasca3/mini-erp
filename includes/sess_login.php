<?php
  if (isset($_REQUEST["frmLogin"])){
    include_once('db_database.php');
    $data = json_decode($_REQUEST['frmLogin']);
    $qry = $db->query("select * from tb_usuarios where login='".$data->login."' and pasword='".$data->passw."'");

    if ($db->num_rows($qry)>0){
      $rs = $db->fetch_array($qry);
      session_cache_limiter('nocache,private');
      session_name("erp");
      session_start();

      $_SESSION['usr_ID']    = $rs['id_user']; // definimos el ID del usuario en nuestra BD de usuarios
      $_SESSION['usr_correo']    = $rs['correo']; // definimos el ID del usuario en nuestra BD de usuarios
      $_SESSION['usr_telefono']    = $rs['telefono']; // definimos el ID del usuario en nuestra BD de usuarios
      $_SESSION['usr_login']  = $rs['login']; // definimos el login del usuario

      echo json_encode(array("error"=>0));
    } else{
      echo json_encode(array("error"=>1));
    }
    $db->close();

  } else{
    $resp = array("error"=>true,"resp"=>"ninguna variable en POST");
    echo json_encode($resp);
  }
?>
