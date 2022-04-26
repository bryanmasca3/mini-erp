<?php
  include_once('../../../includes/sess_verifica.php');

  if(isset($_SESSION["usr_ID"])){
    if (isset($_REQUEST["appSQL"])){
      include_once('../../../includes/db_database.php');
      include_once('../../../includes/funciones.php');

      $data = json_decode($_REQUEST['appSQL']);
      switch ($data->TipoQuery) {
        case "selUniOperativas":
          $unioperativas = array();
          $qry = $db->query("select * from tb_unioperativa where id_linea=".$data->uniopeID);
          if ($db->num_rows($qry)>0) {
            for($xx=0; $xx<$db->num_rows($qry); $xx++){
              $rs = $db->fetch_array($qry);

              $unioperativas[] = array(
                "ID" => $rs["id_uniope"],
                "codigo" => $rs["codigo"],
                "descripcion" => $rs["descripcion"],
                "status" => $rs["status"],
                "datenew" => $rs["datenew"],
                "datedit" => $rs["datedit"],
                "id_linea" => $rs["id_linea"]
              );
            }
          }

          //respuesta
          $rpta = $unioperativas;
          echo json_encode($rpta);
          break;
      }
      $db->close();
    } else{
      $resp = array("error"=>true,"mensaje"=>"ninguna variable en POST");
      echo json_encode($resp);
    }
  } else {
    $resp = array("error"=>true,"mensaje"=>"Caducó la sesion.");
    echo json_encode($resp);
  }
?>
