<?php
  include_once('../../../includes/sess_verifica.php');

  if(isset($_SESSION["usr_ID"])){
    if (isset($_REQUEST["appSQL"])){
      include_once('../../../includes/db_database.php');
      include_once('../../../includes/funciones.php');

      $data = json_decode($_REQUEST['appSQL']);
      switch ($data->TipoQuery) {
      case "02_search_solicitante":
        $tabla = array();
        $error= 0;
        $qry = $db->query("SELECT * from tb_solicitante WHERE dni='".$data->value."'");
        $totreg = $db->num_rows($qry);
        if ($totreg==1) {
          $rs = $db->fetch_array($qry);
          $tabla = array(
            "id" => $rs["id"],
            "nombres" =>$rs["nombres"],                      
            "apellidos" =>$rs["apellidos"], 
            "cargo" =>$rs["cargo"], 
            "area" =>$rs["area"], 
            "dni" =>$rs["dni"]                         
          );  
        }else{
          $error= 1;
        }
      $rpta = array("tabla"=>$tabla,"error"=>$error);
      echo json_encode($rpta);
      break;   
      case "03_save_register_referencia_laboral":
        $qry1;      
        $sql1 = "INSERT INTO tb_referencia_laboral 
        (nombresCandidato,apellidosCandidato, nombresReferente, apellidosReferente,telefonoReferente,cargoReferente,empresaReferente,criterio1,criterio2,criterio3,criterio4,
        criterio5,criterio6,criterio7,criterio8,criterio9,criterio10,recomendacion) VALUES (
          '".$data->data->nombresCandidato."',  
          '".$data->data->apellidosCandidato."',              
          '".$data->data->nombresReferente."',  
          '".$data->data->apellidosReferente."',  
          '".$data->data->telefonoReferente."',  
          '".$data->data->cargoReferente."',  
          '".$data->data->empresaReferente."',  
          '".$data->data->criterio1."',  
          '".$data->data->criterio2."',  
          '".$data->data->criterio3."',                      
          '".$data->data->criterio4."',    
          '".$data->data->criterio5."',    
          '".$data->data->criterio6."',    
          '".$data->data->criterio7."',    
          '".$data->data->criterio8."',    
          '".$data->data->criterio9."',    
          '".$data->data->criterio10."',    
          '".$data->data->checkbox1[0]."'    
          )";
          $qry1 = $db->query($sql1);
     
      
        $rpta = array("table1"=>$qry1);
        echo json_encode($rpta);
      break; 
      case "03_save_register_entrevista":
        $qry1;      
        $sql1 = "INSERT INTO tb_entrevista 
        (nombres,apellidos, dni, edad,fecha,civil,correo,telefono,puesto,presenciones,S_1,
        S_2,S_3,O_1,O_2,O_3) VALUES (
          '".$data->data->nombres."',  
          '".$data->data->apellidos."',              
          '".$data->data->dni."',  
          '".$data->data->puesto."',  
          '".$data->data->edad."',  
          '".$data->data->fecha."',  
          '".$data->data->civil."',  
          '".$data->data->correo."',  
          '".$data->data->telefono."',  
          '".$data->data->pretenciones."',                      
          '".$data->data->checkbox1[0]."',
          '".$data->data->checkbox1[1]."',
          '".$data->data->checkbox1[2]."',
          '".$data->data->checkbox2[0]."',
          '".$data->data->checkbox2[1]."',
          '".$data->data->checkbox2[2]."'
          )";
          $qry1 = $db->query($sql1);
     
      
        $rpta = array("table1"=>$qry1);
        echo json_encode($rpta);
      break;
      case "03_save_register_people":
        $qry1;
        $qry2;
        $qry3;
        $sql1 = "INSERT INTO tb_requerimientos 
        (id,id_solicitante, cargo, vacante,area,contrato,motivo,lugar,duracion,fecha,remuneracion) VALUES (
          '".$data->data->id."',  
          '".$data->data->id_solicitante."',              
          '".$data->data->cargo."',  
          '".$data->data->vacante."',  
          '".$data->data->area."',  
          '".$data->data->contrato."',  
          '".$data->data->motivo."',  
          '".$data->data->lugar."',  
          '".$data->data->duracion."',  
          '".$data->data->fecha."',  
          '".$data->data->remuneracion."'                 
          )";
          $qry1 = $db->query($sql1);
     
        if($data->data->observaciones){
          $sql2 = "INSERT INTO tb_requerimientos_observacion 
          (id_requerimientos, descripcion) VALUES ";
          $sqldata2="";
            foreach ($data->data->observaciones as $value) {
              $sqldata2.= "('".$data->data->id."','".$value."'),";
             };
          $sqldata2=substr($sqldata2, 0, -1);       
          $sql2=$sql2.$sqldata2.";";
          $qry2 = $db->query($sql2);
        }
     
        $rpta = array("table1"=>$qry1);
        echo json_encode($rpta);
      break;
      case "01_gridRequerimientosPersonas": 
        $tabla = array();
        $qry = $db->query("SELECT R.*,S.nombres as nombres,S.apellidos as apellidos,S.cargo AS cargo,S.area AS area FROM `tb_requerimientos` as R INNER JOIN `tb_solicitante` as S ON R.id_solicitante=S.id;");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla[] = array(
              "id" => $rs["id"],
              "nombres" =>$rs["nombres"]." ".$rs["apellidos"] ,
              "vacantes" => $rs["vacante"],
              "cargo" => $rs["cargo"],
              "fecha"=> $rs["fecha"],               
              "area"=> $rs["area"]
            );
          }
        }
    
    //respuesta OT
    $rpta = array("tabla"=>$tabla);
    echo json_encode($rpta);
    break;
    case "01_gridEntrevistasPersonas": 
        $tabla = array();
        $qry = $db->query("SELECT * FROM tb_entrevista;");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla[] = array(
              "id" => $rs["id"],
              "nombres" =>$rs["nombres"]." ".$rs["apellidos"] ,
              "dni" => $rs["dni"],           
              "fecha"=> $rs["fecha"]              
            );
          }
        }
    
    //respuesta OT
    $rpta = array("tabla"=>$tabla);
    echo json_encode($rpta);
    break;
    case "01_gridReferenciaLaboral": 
      $tabla = array();
      $qry = $db->query("SELECT * FROM tb_referencia_laboral;");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);
          $tabla[] = array(
            "id" => $rs["id"],
            "nombrescandidato" =>$rs["nombresCandidato"]." ".$rs["apellidosCandidato"] ,
            "nombresreferente" => $rs["nombresReferente"]." ".$rs["apellidosReferente"],           
                       
          );
        }
      }
  
  //respuesta OT
  $rpta = array("tabla"=>$tabla);
  echo json_encode($rpta);
  break;
    case "01_delete_requerimiento_persona":
          
        $qry1 = $db->query("DELETE from  tb_requerimientos WHERE id='".$data->value."'");
        $qry2 = $db->query("DELETE from  tb_requerimientos_observacion WHERE 	id_requerimientos='".$data->value."'");
           
        $rpta = array("error"=>0,"qry1"=>$qry1,"qry2"=>$qry2);
        echo json_encode($rpta);

      break;
      case "01_delete_entrevista_persona":
          
        $qry1 = $db->query("DELETE from  tb_entrevista WHERE id='".$data->value."'");
      
           
        $rpta = array("error"=>0,"qry1"=>$qry1);
        echo json_encode($rpta);

      break;
      case "03_pdf_entrevista_persona":
          
       
        $tabla1 = array();
        $tabla2 = array();
     
        $qry1 = $db->query("SELECT * FROM `tb_entrevista` WHERE id='".+$data->id."'");
        $totreg1 = $db->num_rows($qry1);

      

        if ($totreg1>0) {                  
            $rs = $db->fetch_array($qry1);
            $tabla1 = array(
              "id" => $rs["id"],                      
              "nombres" =>$rs["nombres"]." ".$rs["apellidos"],                                                    
              "dni" =>$rs["dni"],
              "edad" =>$rs["edad"],
              "fecha" =>$rs["fecha"],
              "civil" =>$rs["civil"],
              "correo" =>$rs["correo"],

              "telefono" =>$rs["telefono"],
              "puesto" =>$rs["puesto"],
              "presenciones" =>$rs["presenciones"],
              
              "S_1" =>$rs["S_1"],
              "S_2" =>$rs["S_2"],
              "S_3" =>$rs["S_3"],
              "O_1" =>$rs["O_1"],
              "O_2" =>$rs["O_2"],
              "O_3" =>$rs["O_3"]
            
            );
          
        }    
       
      $rpta = array("tabla1"=>$tabla1);
      echo json_encode($rpta);

      break;
      case "03_pdf_referencia_laboral_persona":
          
       
        $tabla1 = array();
        $tabla2 = array();
     
        $qry1 = $db->query("SELECT * FROM `tb_referencia_laboral` WHERE id='".+$data->id."'");
        $totreg1 = $db->num_rows($qry1);

      

        if ($totreg1>0) {                  
            $rs = $db->fetch_array($qry1);
            $tabla1 = array(
              "id" => $rs["id"],                      
              "nombresCandidato" =>$rs["nombresCandidato"]." ".$rs["apellidosCandidato"],                                                    
              "nombresReferente" =>$rs["nombresReferente"]." ".$rs["apellidosReferente"],         
              "telefono" =>$rs["telefonoReferente"],
              "cargo" =>$rs["cargoReferente"],
              "empresa" =>$rs["empresaReferente"],
              "criterio1" =>$rs["criterio1"],
              "criterio2" =>$rs["criterio2"],
              "criterio3" =>$rs["criterio3"],
              "criterio4" =>$rs["criterio4"],
              "criterio5" =>$rs["criterio5"],
              "criterio6" =>$rs["criterio6"],
              "criterio7" =>$rs["criterio7"],
              "criterio8" =>$rs["criterio8"],
              "criterio9" =>$rs["criterio9"],
              "criterio10" =>$rs["criterio10"],
              "recomendacion" =>$rs["recomendacion"]            
            );
          
        }    
       
      $rpta = array("tabla1"=>$tabla1);
      echo json_encode($rpta);

      break;
      case "03_pdf_requerimiento_persona":
          
       
        $tabla1 = array();
        $tabla2 = array();
     
        $qry1 = $db->query("SELECT R.*, S.nombres as nombres, S.apellidos as apellidos, S.cargo as cargo_s,S.area as area_s, S.dni as dni FROM `tb_requerimientos`as R INNER JOIN `tb_solicitante`as S on R.id_solicitante=S.id where R.id='".+$data->id."'");
        $totreg1 = $db->num_rows($qry1);

        $qry2 = $db->query("SELECT * FROM `tb_requerimientos_observacion` WHERE id_requerimientos='".+$data->id."'");
        $totreg2 = $db->num_rows($qry2); 

        if ($totreg1>0) {                  
            $rs = $db->fetch_array($qry1);
            $tabla1 = array(
              "id" => $rs["id"],                      
              "id_solicitante" =>$rs["id_solicitante"],                                                    
              "cargo" =>$rs["cargo"],
              "vacante" =>$rs["vacante"],
              "area" =>$rs["area"],
              "contrato" =>$rs["contrato"],
              "motivo" =>$rs["motivo"],
              "lugar" =>$rs["lugar"],
              "fecha" =>$rs["fecha"],
              "duracion" =>$rs["duracion"],
              "motivo" =>$rs["motivo"],
              "nombres" =>$rs["nombres"]." ".$rs["apellidos"],
              "cargo_s" =>$rs["cargo_s"],
              "area_s" =>$rs["area_s"],
              "dni" =>$rs["dni"],
              "remuneracion" =>$rs["remuneracion"],            
            );
          
        }    
        if ($totreg2>0) { 
          for($xx=0; $xx<$totreg2; $xx++){ 
            $rs = $db->fetch_array($qry2);
            $tabla2[] = array(             
              "id" => $rs["id"],                             
              "descripcion" =>$rs["descripcion"]                                        
            );
          }                 
         
        
      }    
      $rpta = array("tabla1"=>$tabla1,"tabla2"=>$tabla2);
      echo json_encode($rpta);

      break;
      case "01_delete_referencia_laboral_persona":
          
        $qry1 = $db->query("DELETE from  tb_referencia_laboral WHERE id='".$data->value."'");
      
           
        $rpta = array("error"=>0,"qry1"=>$qry1);
        echo json_encode($rpta);

      break;
      default:
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