<?php
  include_once('sess_verifica.php');

  if(isset($_SESSION["usr_ID"])){
    if (isset($_REQUEST["appPage"])){
      

      $data = json_decode($_REQUEST['appPage']);
      
        
			$_SESSION["page"] = $data->page;
			//respuesta
			$rpta = "session OK";
			echo json_encode($rpta);
		
    } else{
      $resp = array("error"=>true,"mensaje"=>"ninguna variable en POST");
      echo json_encode($resp);
    }
  } else {
    $resp = array("error"=>true,"mensaje"=>"Caducó la sesion.");
    echo json_encode($resp);
  }
?>
