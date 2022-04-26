<?php
  include_once('../../../includes/sess_verifica.php');

  if(isset($_SESSION["usr_ID"])){
    if (isset($_REQUEST["appSQL"])){
      include_once('../../../includes/db_database.php');
      include_once('../../../includes/funciones.php');

      $data = json_decode($_REQUEST['appSQL']);
      switch ($data->TipoQuery) {
        case "selLineaNegocios":
          $lineanegocios = array();
          $qry = $db->query("select * from tb_lineanegocio;");
          if ($db->num_rows($qry)>0) {
            for($xx=0; $xx<$db->num_rows($qry); $xx++){
              $rs = $db->fetch_array($qry);

              $lineanegocios[] = array(
                "ID" => $rs["id_linea"],
                "codigo" => $rs["codigo"],
                "descripcion" => $rs["descripcion"],
                "status" => $rs["status"],
                "datenew" => $rs["datenew"],
                "datedit" => $rs["datedit"]
              );
            }
          }

          //respuesta
          $rpta = $lineanegocios;
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
