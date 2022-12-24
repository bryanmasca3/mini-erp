<?php
  include_once('../../../includes/sess_verifica.php');

  if(isset($_SESSION["usr_ID"])){
    if (isset($_REQUEST["appSQL"])){
      include_once('../../../includes/db_database.php');
      include_once('../../../includes/funciones.php');

      $data = json_decode($_REQUEST['appSQL']);
      switch ($data->TipoQuery) {
        case "02_search_personal":
          $tabla = array();
          $error= 0;
          $qry = $db->query("SELECT * FROM `per_personal` as P INNER JOIN `per_aspirante` as A on P.id_aspirante=A.id WHERE dni='".$data->value."'");
          $totreg = $db->num_rows($qry);
          if ($totreg==1) {
            $rs = $db->fetch_array($qry);
            $tabla = array(
              "id" => $rs["id_aspirante"],
              "nombres" =>$rs["nombre"],                      
              "apellidos" =>$rs["apellido"]                           
            );  
          }else{
            $error= 1;
          }
        $rpta = array("tabla"=>$tabla,"error"=>$error);
        echo json_encode($rpta);
        break;   
        case "02_search_personal_ordencompra":
          $tabla = array();
          $error= 0;
          $qry = $db->query("SELECT * from per_aspirante WHERE estado=7 AND dni='".$data->value."'");
          $totreg = $db->num_rows($qry);
          if ($totreg==1) {
            $rs = $db->fetch_array($qry);
            $tabla = array(
              "id" => $rs["id"],
              "nombres" =>$rs["nombre"],                      
              "apellidos" =>$rs["apellido"],                           
              "telefono" =>$rs["telefono"],
              "dni" =>$rs["dni"],
            );  
          }else{
            $error= 1;
          }
        $rpta = array("tabla"=>$tabla,"error"=>$error);
        echo json_encode($rpta);
        break;  
        case "02_search_aspirante":
          $tabla = array();
          $error= 0;
          $qry = $db->query("SELECT * from per_aspirante WHERE dni='".$data->value."'");
          $totreg = $db->num_rows($qry);
          if ($totreg==1) {
            $rs = $db->fetch_array($qry);
            $tabla = array(
              "id" => $rs["id"],
              "nombres" =>$rs["nombre"],                      
              "apellidos" =>$rs["apellido"],                           
              "telefono" =>$rs["telefono"],
              "dni" =>$rs["dni"],
            );  
          }else{
            $error= 1;
          }
        $rpta = array("tabla"=>$tabla,"error"=>$error);
        echo json_encode($rpta);
        break;  
        case "02_search_aspirante_without_personal":
          $tabla = array();
          $error= 0;
          $qry = $db->query("SELECT * from per_aspirante WHERE estado=6 AND dni='".$data->value."'");
          $totreg = $db->num_rows($qry);
          if ($totreg==1) {
            $rs = $db->fetch_array($qry);
            $tabla = array(
              "id" => $rs["id"],
              "nombres" =>$rs["nombre"],                      
              "apellidos" =>$rs["apellido"],                           
              "telefono" =>$rs["telefono"],
              "dni" =>$rs["dni"],
            );  
          }else{
            $error= 1;
          }
        $rpta = array("tabla"=>$tabla,"error"=>$error);
        echo json_encode($rpta);
        break;          
        case "sql_RequerimientosAndItems":
          $qry1;      
          $sql1 = "INSERT INTO requerimiento 
          (n_requerimiento,
          area,  
          solicitante,
          fecha_requerimiento,
          centro_costo,
          prioridad,
          motivo                        
          ) VALUES (      
            '".$data->data->n_requerimiento."',              
            '".$data->data->area."',
            '".$data->data->solicitante."',
            '".$data->data->fecha_requerimiento."', 
            '".$data->data->centro_costo."',         
            '".$data->data->prioridad."',
            '".$data->data->motivo."'      
            )";
            $qry1 = $db->query($sql1);
             
            $qry3;      
            $sql3 = "INSERT INTO requerimiento_item
            (item,codigo_parte,n_parte,descripcion,cantidad,unidad_medida,observacion,id_requerimiento) VALUES";
            $sqldata3="";
            foreach ($data->data->itemsRequerimiento as $value) {
                $sqldata3.= "('".$value[0]."','".$value[1]."','".$value[2]."','".$value[3]."','".$value[4]."','".$value[5]."','".$value[6]."','".$data->data->n_requerimiento."'),";
              };
            $sqldata3=substr($sqldata3, 0, -1);       
            $sql3=$sql3.$sqldata3.";";         
            $qry3 = $db->query($sql3);
          $rpta = array("table1"=>$qry1,"table3"=>$qry3);
          echo json_encode($rpta);
        break;
      case "02_search_solicitante":
        $tabla = array();
        $error= 0;
        $qry = $db->query("SELECT * FROM `per_aspirante` as A INNER JOIN `per_personal` as P on A.id=P.id_aspirante WHERE dni='".$data->value."'");
        $totreg = $db->num_rows($qry);
        if ($totreg==1) {
          $rs = $db->fetch_array($qry);
          $tabla = array(
            "id" => $rs["id"],
            "nombres" =>$rs["nombre"],                      
            "apellidos" =>$rs["apellido"], 
            "pretencion_salarial" =>$rs["pretencion_salarial"],   
            "dni" =>$rs["dni"]                         
          );  
        }else{
          $error= 1;
        }
      $rpta = array("tabla"=>$tabla,"error"=>$error);
      echo json_encode($rpta);
      break;   

      case "02_search_vacante_gestion_personas":
        $tabla = array();
        $tabla0 = array();
        $tabla1 = array();
        $error= 0;
        $qry1;
        $qry0 = $db->query("SELECT cargo FROM `per_requerimiento_personal` where id='".$data->req."'");
        $totreg0 = $db->num_rows($qry0);
        if ($totreg0>=1) {         
          $rs = $db->fetch_array($qry0);
          $tabla0 = array(
            "id_cargo" => $rs["cargo"],                            
          );  
        }

        $qry1 = $db->query("SELECT A.nombre,A.apellido,A.id,A.dni FROM `per_aspirante` as A INNER JOIN `per_personal` as P on A.id=P.id_aspirante where A.dni='".$data->value."'");
        $totreg1 = $db->num_rows($qry1);
        if($totreg1>=1){
          for($xx=0; $xx<$totreg1; $xx++){    
            $rs = $db->fetch_array($qry1);
            $tabla1 = array(
              "id" => $rs["id"],
              "nombre" =>$rs["nombre"],                             
              "apellidos" =>$rs["apellido"], 
              "dni" =>$rs["dni"]                         
            );  
          }
        }else{
          $error= 1;
        }


        $qry = $db->query("SELECT A.id,A.nombre,A.apellido,A.dni,A.puesto as 'puesto_al_postular',T.descripcion as 'puesto_actual',T.id as 'id_cargo' FROM `per_aspirante` as A INNER JOIN `per_personal` as P on A.id=P.id_aspirante INNER JOIN `per_cargo` as C on A.id=C.id_personal INNER JOIN `per_tipo_cargo` as T on C.id_cargo=T.id where A.dni='".$data->value."'");

        $totreg = $db->num_rows($qry);
        if ($totreg>=1) {
          for($xx=0; $xx<$totreg; $xx++){    
          $rs = $db->fetch_array($qry);
          $tabla[] = array(
            "id" => $rs["id"],
            "nombres" =>$rs["nombre"],                      
            "id_cargo" =>$rs["id_cargo"],  
            "apellidos" =>$rs["apellido"], 
            "dni" =>$rs["dni"],  
            "puesto_al_postular" =>$rs["puesto_al_postular"],   
            "puesto_actual" =>$rs["puesto_actual"]                         
          );  
        }
        }
      $rpta = array("tabla0"=>$tabla0,"tabla"=>$tabla,"tabla1"=>$tabla1,"error"=>$error);
      echo json_encode($rpta);
      break; 
      case "sql_add_vacante_gestion_personal":
        $qry1;      
        $tabla = array();
        $sql2;
        $sql1 = "INSERT INTO per_cargo 
        (id_personal,id_cargo,id_requerimiento) VALUES ( 
          '".$data->data->id_personal."',  
          '".$data->data->id_cargo."',
          '".$data->data->id_requerimiento."'         
          )";
          $qry1 = $db->query($sql1);     
                    
          $qry2 = $db->query("SELECT n_vacantes,n_cumplidos FROM `per_requerimiento_personal`where id='".$data->data->id_requerimiento."'");
          $totreg2 = $db->num_rows($qry2);
          if ($totreg2>0) {   
              $rs = $db->fetch_array($qry2);
              $tabla = array(
                "n_vacantes" => $rs["n_vacantes"],    
                "n_cumplidos" => $rs["n_cumplidos"]               
              );
          
          }
               

        $rpta = array("table"=>$qry1,"table1"=>$tabla);
        echo json_encode($rpta);
      break; 

      case "sql_add_vacante_gestion_personal_update":
        $qry1;     
        $qry1;
        if($data->data->type){
          $sql2 = "UPDATE `per_requerimiento_personal` SET n_cumplidos=".$data->data->c.", estado=5 WHERE id='".$data->data->req."'";         
        }else{
          $sql2 = "UPDATE `per_requerimiento_personal` SET n_cumplidos=".$data->data->c.", estado=4 WHERE id='".$data->data->req."'";                   
        }
        $qry1 = $db->query($sql2);
        $rpta = array("table"=>$qry1);
        echo json_encode($rpta);
      break;
      case "03_save_register_referencia_laboral":
        $qry1;      
        $sql1 = "INSERT INTO per_referencia_laboral 
        (id,id_aspirante,nombre_referente,apellido_referente,telefono,cargo,empresa) VALUES (
          '".$data->data->id."',  
          '".$data->data->id_aspirante."',                     
          '".$data->data->nombresReferente."',  
          '".$data->data->apellidosReferente."',  
          '".$data->data->telefonoReferente."',  
          '".$data->data->cargoReferente."',  
          '".$data->data->empresaReferente."'      
          )";
          $qry1 = $db->query($sql1);

          $sql2 = "INSERT INTO per_referencia 
          (id_aspirante,id_pregunta,respuesta) VALUES ";
          $sqldata2="";
          $i=0;
            foreach ($data->data->respuestas as $value) {
              $sqldata2.= "('".$data->data->id_aspirante."','".$i."','".$value."'),";
              $i=$i+1;
             };
          $sqldata2=substr($sqldata2, 0, -1);       
          $sql2=$sql2.$sqldata2.";";
          $qry2 = $db->query($sql2);      
      
        $rpta = array("table1"=>$qry1);
        echo json_encode($rpta);
      break; 
      case "03_save_register_entrevista":
        $qry1;      
        $sql1 = "INSERT INTO per_aspirante 
        (id,nombre,apellido,dni,puesto,edad,fecha_nacimiento,correo,telefono,pretencion_salarial) VALUES (
          '".$data->data->id."',  
          '".$data->data->nombre."',              
          '".$data->data->apellido."',  
          '".$data->data->dni."',  
          '".$data->data->puesto."',  
          '".$data->data->edad."',  
          '".$data->data->fecha_nacimiento."',            
          '".$data->data->correo."',  
          '".$data->data->telefono."',                      
          '".$data->data->pretencion_salarial."'
          )";
          $qry1 = $db->query($sql1);
     

          
            $sql2 = "INSERT INTO per_entrevista 
            (id_aspirante,id_pregunta,respuesta) VALUES ";
            $sqldata2="";
            $i=0;
              foreach ($data->data->gestion->ids as $value) {
                $sqldata2.= "('".$data->data->id."','".$value."','".$data->data->gestion->data[$i]."'),";
                $i=$i+1;
               };
            $sqldata2=substr($sqldata2, 0, -1);       
            $sql2=$sql2.$sqldata2.";";
            $qry2 = $db->query($sql2);
          
       
            $sql3 = "INSERT INTO per_entrevista 
            (id_aspirante,id_pregunta,respuesta) VALUES ";
            $sqldata3="";
            $j=0;
              foreach ($data->data->otros->ids as $value) {
                $sqldata3.= "('".$data->data->id."','".$value."','".$data->data->otros->data[$j]."'),";
                $j=$j+1;
               };
            $sqldata3=substr($sqldata3, 0, -1);       
            $sql3=$sql3.$sqldata3.";";
            $qry3 = $db->query($sql3);
          

        $rpta = array("table1"=>$qry1,"table2"=>$qry2,"table3"=>$qry3);
        echo json_encode($rpta);
      break;
      case "03_save_register_people":
        $qry1;
        $qry2;
        $qry3;
        $sql1 = "INSERT INTO per_requerimiento_personal 
        (id,id_personal,cargo,n_vacantes,area,contrato,id_motivo,lugar_trabajo,duracion_trabajo,fecha_incorporacion,remuneracion) VALUES (
          '".$data->data->id."',  
          '".$data->data->id_personal."',              
          '".$data->data->cargo."',  
          '".$data->data->n_vacantes."',  
          '".$data->data->area."',  
          '".$data->data->contrato."',  
          '".$data->data->id_motivo."',  
          '".$data->data->lugar_trabajo."',  
          '".$data->data->duracion_trabajo."',  
          '".$data->data->fecha_incorporacion."',  
          '".$data->data->remuneracion."'                 
          )";
          $qry1 = $db->query($sql1);
     
        if($data->data->observaciones){
          $sql2 = "INSERT INTO per_observaciones_requerimiento_personal 
          (id_requerimiento, descripcion) VALUES ";
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
        $qry = $db->query("SELECT RQ.*,M.descripcion as 'descripcion_motivo',A.descripcion as 'descripcion_area',C.descripcion as 'descripcion_cargo',E.descripcion as 'descripcion_estado' FROM `per_requerimiento_personal` as RQ INNER JOIN `per_motivo` as M ON RQ.id_motivo=M.id INNER JOIN `per_area` as A ON RQ.area=A.id INNER JOIN `per_tipo_cargo` as C ON RQ.cargo=C.id
        INNER JOIN `per_estado` as E ON RQ.estado=E.id;");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla[] = array(
              "id" => $rs["id"],    
              "area" => $rs["descripcion_area"],            
              "cargo" => $rs["descripcion_cargo"],
              "vacantes"=> $rs["n_vacantes"],      
              "cumplidos"=> $rs["n_cumplidos"],            
              "motivo"=> $rs["descripcion_motivo"],
              "estado"=> $rs["descripcion_estado"],
              "estado_id"=> $rs["estado"]
            );
          }
        }
    
    //respuesta OT
    $rpta = array("tabla"=>$tabla);
    echo json_encode($rpta);
    break;
    case "sql_get_requerimiento_by_id":
      $tabla = array();
      $column= array();
      $qry = $db->query("SELECT R.*,RI.item AS item,RI.codigo_parte AS codigo_parte,RI.n_parte as n_parte,RI.descripcion as descripcion,RI.cantidad as cantidad, RI.unidad_medida AS unidad_medida,RI.prioridad AS prioridad,RI.observacion AS observacion  FROM `requerimiento_item` as RI INNER JOIN `requerimiento` as R ON RI.id_requerimiento=R.n_requerimiento WHERE R.id='".$data->data."'");

      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);
          $tabla[] = array(
            "id" => $rs["id"],
            "n_requerimiento" => $rs["n_requerimiento"],
            "area" => $rs["area"],                           
            "solicitante" => $rs["solicitante"],
            "centro_costo" => $rs["centro_costo"],
            "fecha_requerimiento" => $rs["fecha_requerimiento"],
            "prioridad" => $rs["prioridad"],
            "motivo" => $rs["motivo"],
            "estado" => $rs["estado"],
            "tiempo_atencion" => $rs["tiempo_atencion"],
            "item" => $rs["item"],
            "codigo_parte" => $rs["codigo_parte"],
            "n_parte" => $rs["n_parte"],
            "descripcion" => $rs["descripcion"],
            "cantidad" => $rs["cantidad"],
            "unidad_medida" => $rs["unidad_medida"],
            "prioridad" => $rs["prioridad"],
            "observacion" => $rs["observacion"]
          );
        }
        
      }

    $rpta = array("data"=>$tabla);      
    echo json_encode($rpta);
    break;
    case "01_gridRequerimientoGestionPersonal": 
      $tabla = array();
      $tabla1 = array();
      $tabla2 = array();

      $qry = $db->query("SELECT ASP.nombre as 'nombre',ASP.apellido as 'apellido',RQ.*,M.descripcion as 'descripcion_motivo',A.descripcion as 'descripcion_area',C.descripcion as 'descripcion_cargo',E.descripcion as 'descripcion_estado' FROM `per_requerimiento_personal` as RQ INNER JOIN `per_motivo` as M ON RQ.id_motivo=M.id INNER JOIN `per_area` as A ON RQ.area=A.id INNER JOIN `per_tipo_cargo` as C ON RQ.cargo=C.id INNER JOIN `per_estado` as E ON RQ.estado=E.id INNER JOIN `tb_lugar_trabajo` as TR ON RQ.lugar_trabajo=TR.id INNER JOIN `per_personal` as PR ON RQ.id_personal=PR.id INNER JOIN `per_aspirante` as ASP ON PR.id_aspirante=ASP.id WHERE RQ.id='".$data->value."'");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);
          $tabla = array(
            "id" => $rs["id"],    
            "nombre_solicitante" => $rs["nombre"],   
            "apellido_solicitante" => $rs["apellido"],   
            "area" => $rs["descripcion_area"],            
            "cargo" => $rs["descripcion_cargo"],
            "vacantes"=> $rs["n_vacantes"],               
            "motivo"=> $rs["descripcion_motivo"],
            "estado"=> $rs["descripcion_estado"],
          );
        }
      }
      $qry1 = $db->query("SELECT ASP.nombre,ASP.apellido,ASP.dni,T.descripcion as 'cargo' FROM `per_cargo` as C INNER JOIN `per_tipo_cargo` as T on C.id_cargo=T.id INNER JOIN `per_aspirante` as ASP ON C.id_personal=ASP.id WHERE C.id_requerimiento='".$data->value."'");
      $totreg1 = $db->num_rows($qry1);
      if ($totreg1>0) {
        for($xx=0; $xx<$totreg1; $xx++){
          $rs = $db->fetch_array($qry1);
          $tabla1[] = array(      
            "nombre" => $rs["nombre"],   
            "apellido" => $rs["apellido"],   
            "dni" => $rs["dni"],            
            "cargo" => $rs["cargo"],       
          );
        }
      }

      $qry2 = $db->query("SELECT * FROM `per_observaciones_requerimiento_personal` WHERE id_requerimiento='".$data->value."'");
      $totreg2 = $db->num_rows($qry2);
      if ($totreg2>0) {
        for($xx=0; $xx<$totreg2; $xx++){
          $rs = $db->fetch_array($qry2);
          $tabla2[] = array(       
            "descripcion" => $rs["descripcion"]        
          );
        }
      }
  
  //respuesta OT
  $rpta = array("tabla"=>$tabla,"tabla1"=>$tabla1,"tabla2"=>$tabla2);
  echo json_encode($rpta);
  break;
    case "03_selected_gestionPersona_area": 
      $tabla = array();
      $qry = $db->query("SELECT * FROM `per_area`;");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);
          $tabla[] = array(
            "id" => $rs["id"],
            "descripcion" =>$rs["descripcion"]    
          );
        }
      }
  
  //respuesta OT
  $rpta = array($tabla);
  echo json_encode($rpta);
  break;
  case "sql_select_get_cargo": 
    $tabla = array();
    $qry = $db->query("SELECT * FROM `per_tipo_cargo`;");
    $totreg = $db->num_rows($qry);
    if ($totreg>0) {
      for($xx=0; $xx<$totreg; $xx++){
        $rs = $db->fetch_array($qry);
        $tabla[] = array(
          "id" => $rs["id"],
          "descripcion" =>$rs["descripcion"]    
        );
      }
    }
$rpta = $tabla;
echo json_encode($rpta);
break;
case "sql_select_get_lugar_trabajo": 
  $tabla = array();
  $qry = $db->query("SELECT * FROM `tb_lugar_trabajo`;");
  $totreg = $db->num_rows($qry);
  if ($totreg>0) {
    for($xx=0; $xx<$totreg; $xx++){
      $rs = $db->fetch_array($qry);
      $tabla[] = array(
        "id" => $rs["id"],
        "descripcion" =>$rs["descripcion"]    
      );
    }
  }
$rpta = $tabla;
echo json_encode($rpta);
break;
case "sql_select_get_prioridad": 
  $tabla = array();
  $qry = $db->query("SELECT * FROM `log_prioridad`;");
  $totreg = $db->num_rows($qry);
  if ($totreg>0) {
    for($xx=0; $xx<$totreg; $xx++){
      $rs = $db->fetch_array($qry);
      $tabla[] = array(
        "id" => $rs["id"],
        "descripcion" =>$rs["descripcion"]    
      );
    }
  }
$rpta = $tabla;
echo json_encode($rpta);
break;
  case "03_selected_gestionPersona_motivo": 
    $tabla = array();
    $qry = $db->query("SELECT * FROM `per_motivo`;");
    $totreg = $db->num_rows($qry);
    if ($totreg>0) {
      for($xx=0; $xx<$totreg; $xx++){
        $rs = $db->fetch_array($qry);
        $tabla[] = array(
          "id" => $rs["id"],
          "descripcion" =>$rs["descripcion"]    
        );
      }
    }

//respuesta OT
$rpta = array($tabla);
echo json_encode($rpta);
break;
    case "01_gridEntrevistasPersonas": 
        $tabla = array();
        $qry = $db->query("SELECT *,A.id as 'id_aspirante' FROM `per_aspirante` as A INNER JOIN `per_estado` as E on A.estado=E.id;");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla[] = array(
              "id" => $rs["id_aspirante"],
              "nombres" =>$rs["nombre"]." ".$rs["apellido"] ,
              "dni" => $rs["dni"],           
              "estado"=> $rs["descripcion"]              
            );
          }
        }
    
    //respuesta OT
    $rpta = array("tabla"=>$tabla);
    echo json_encode($rpta);
    break;
    case "01_gridReferenciaLaboral": 
      $tabla = array();
      $qry = $db->query("SELECT A.*,R.telefono as telefono_referente,R.cargo as cargo_referente,R.empresa as empresa_referente,R.* FROM `per_referencia_laboral` as R INNER JOIN `per_aspirante`as A on R.id_aspirante=A.id;");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);
          $tabla[] = array(
            "id" => $rs["id_aspirante"],
            "nombrescandidato" =>$rs["nombre"]." ".$rs["apellido"] ,
            "nombresreferente" => $rs["nombre_referente"]." ".$rs["apellido_referente"],           
            "telefono" => $rs["telefono_referente"],
            "empresa" => $rs["empresa_referente"],
           // "cargo" => $rs["cargo_referente"],       
          );
        }
      }
  
  //respuesta OT
  $rpta = array("tabla"=>$tabla);
  echo json_encode($rpta);
  break;
  case "01_gridFichaPersonal": 
    $tabla = array();
    $qry = $db->query("SELECT * FROM `per_archivos`as F INNER JOIN `per_personal`as P ON F.id_personal=P.id_aspirante
    INNER JOIN `per_aspirante`AS A ON P.id_aspirante=A.id;");
    $totreg = $db->num_rows($qry);
    if ($totreg>0) {
      for($xx=0; $xx<$totreg; $xx++){
        $rs = $db->fetch_array($qry);
        $tabla[] = array(
          "id" => $rs["id_personal"],
          "nombrescandidato" =>$rs["nombre"]." ".$rs["apellido"] ,
          "dni" => $rs["dni"],    
          "dni_fecha_vigencia" => $rs["dni_fecha_vigencia"],    
          "licencia_fecha_vigencia" =>$rs["licencia_fecha_vigencia"],
          "licencia_esp_fecha_vigencia" =>$rs["licencia_esp_fecha_vigencia"],
          "sctr_fecha_vigencia" =>$rs["sctr_fecha_vigencia"],
          "seguro_fecha_vigencia" =>$rs["seguro_fecha_vigencia"],
          "policial_fecha_vigencia" =>$rs["policial_fecha_vigencia"],
          "judicial_fecha_vigencia" =>$rs["judicial_fecha_vigencia"],
          "penal_fecha_vigencia" =>$rs["penal_fecha_vigencia"],
          "trabajo_fecha_vigencia" =>$rs["trabajo_fecha_vigencia"],          
          "medico_fecha_vigencia" =>$rs["medico_fecha_vigencia"],
          "lice_fecha_vigencia" =>$rs["lice_fecha_vigencia"],

          "dni_file_name" =>$rs["dni_file_name"],
          "licencia_file_name" =>$rs["licencia_file_name"],
          "licencia_esp_file_name" =>$rs["licencia_esp_file_name"],
          "sctr_file_name" =>$rs["sctr_file_name"],
          "seguro_file_name" =>$rs["seguro_file_name"],
          "policial_file_name" =>$rs["policial_file_name"],
          "judicial_file_name" =>$rs["judicial_file_name"],
          "penal_file_name" =>$rs["penal_file_name"],
          "trabajo_file_name" =>$rs["trabajo_file_name"],
          "medico_file_name" =>$rs["medico_file_name"],
          "lice_file_name" =>$rs["lice_file_name"]
                     
        );
      }
    }

//respuesta OT
$rpta = array("tabla"=>$tabla);
echo json_encode($rpta);
break;
case "01_gridProgramacionCapacitacion": 
  $tabla = array();
  $qry = $db->query("SELECT *,F.id as 'id_capacitacion' FROM per_capacitacion as F INNER JOIN `per_personal`as P ON F.id_personal=P.id_aspirante INNER JOIN `per_aspirante`AS A ON P.id_aspirante=A.id;");
  $totreg = $db->num_rows($qry);
  if ($totreg>0) {
    for($xx=0; $xx<$totreg; $xx++){
      $rs = $db->fetch_array($qry);
      $tabla[] = array(
        "id" => $rs["id_capacitacion"], 
        "id_personal" => $rs["id_personal"], 
        "nombrescandidato" =>$rs["nombre"]." ".$rs["apellido"] ,
        "dni" => $rs["dni"],                   
        "induc_fecha_vigencia" => $rs["induc_fecha_vigencia"],    
        "defen_fecha_vigencia" =>$rs["defen_fecha_vigencia"],
        "peligroso1_fecha_vigencia" =>$rs["peligroso1_fecha_vigencia"],
        "peligroso2_fecha_vigencia" =>$rs["peligroso2_fecha_vigencia"],
        "peligroso3_fecha_vigencia" =>$rs["peligroso3_fecha_vigencia"],
        "auxilio_fecha_vigencia" =>$rs["auxilio_fecha_vigencia"],
        "extintores_fecha_vigencia" =>$rs["extintores_fecha_vigencia"],
        "trabajo_fecha_vigencia" =>$rs["trabajo_fecha_vigencia"],          
        "fatiga_fecha_vigencia" =>$rs["fatiga_fecha_vigencia"],
        "curso_fecha_vigencia" =>$rs["curso_fecha_vigencia"],
        "induccion_fecha_vigencia" =>$rs["induccion_fecha_vigencia"],

        "induc_file_name" =>$rs["induc_file_name"],
        "defen_file_name" =>$rs["defen_file_name"],
        "peligroso1_file_name" =>$rs["peligroso1_file_name"],
        "peligroso2_file_name" =>$rs["peligroso2_file_name"],
        "peligroso3_file_name" =>$rs["peligroso3_file_name"],
        "auxilio_file_name" =>$rs["auxilio_file_name"],
        "extintores_file_name" =>$rs["extintores_file_name"],
        "trabajo_file_name" =>$rs["trabajo_file_name"],
        "fatiga_file_name" =>$rs["fatiga_file_name"],
        "curso_file_name" =>$rs["curso_file_name"],
        "induccion_file_name" =>$rs["induccion_file_name"]
                   
      );
    }
  }

//respuesta OT
$rpta = array("tabla"=>$tabla);
echo json_encode($rpta);
break;
case "sqlRequerimientosGrid":
  $tabla = array();
  $column= array();
  $qry = $db->query("SELECT RQ.*,E.descripcion AS 'descripcion_estado',P.descripcion AS 'descripcion_prioridad', A.descripcion AS 'descripcion_area',A.id AS 'id_area'FROM `requerimiento` as RQ INNER JOIN `per_estado` as E ON RQ.estado=E.id INNER JOIN `log_prioridad` as P ON RQ.prioridad=P.id INNER JOIN `per_area`as A ON RQ.area=A.id WHERE A.id=7 order by RQ.id desc;");
  $totreg = $db->num_rows($qry);
  if ($totreg>0) {
    for($xx=0; $xx<$totreg; $xx++){
      $rs = $db->fetch_array($qry);
      $tabla[] = array(
        "id" => $rs["id"],
        "requerimiento" => $rs["n_requerimiento"],
        "area" =>$rs["descripcion_area"],                                            
        "fecha" =>$rs["fecha_requerimiento"],
        "prioridad" =>$rs["descripcion_prioridad"],
        "estado" =>$rs["descripcion_estado"],
        "motivo" =>$rs["motivo"]                  
      );
    }
      $column=array( 
        (object) array('key' => 'id','title' => 'ID'),
        (object) array('key' => 'requerimiento','title' => 'Nº Requerimiento'),
        (object) array('key' => 'area','title' => 'Area'),      
        (object) array('key' => 'prioridad','title' => 'Prioridad'),
        (object) array('key' => 'estado','title' => 'Estado'),          
        (object) array('key' => 'motivo','title' => 'Motivo'),
        (object) array('key' => 'fecha','title' => 'Fecha')             
      );
  }

//respuesta OT
$rpta = array("data"=>$tabla,"column"=>$column);
//var_dump($rpta);
echo json_encode($rpta);
break;
case "01_get_pdf_file":        
  $tabla1 = array();

  $qry1 = $db->query("select * from per_archivos where id_personal='".$data->value."'");

  $totreg1 = $db->num_rows($qry1);
  $dataValue=get_value($data->type);
  if ($totreg1>0) {          
      $rs = $db->fetch_array($qry1);
      $tabla1 = array(
        "id_personal" => $rs["id_personal"],  
        "nombre"=> $rs[$dataValue["val"]],
        "type"=> $dataValue["type"]
               
      );
    
  }   
$rpta = array("tabla1"=>$tabla1);
echo json_encode($rpta);

break; 
case "01_get_pdf_file_programa_capacitacion":        
  $tabla1 = array();

  $qry1 = $db->query("select * from per_capacitacion where id_personal='".$data->value."'");

  $totreg1 = $db->num_rows($qry1);
  $dataValue=get_value_2($data->type);
  if ($totreg1>0) {          
      $rs = $db->fetch_array($qry1);
      $tabla1 = array(
        "id" => $rs["id_personal"],  
        "nombre"=> $rs[$dataValue["val"]],
        "type"=> $dataValue["type"]
               
      );
    
  }  
  
//var_dump($tabla1);
$rpta = array("tabla1"=>$tabla1);
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
     
        $qry1 = $db->query("SELECT * FROM `per_aspirante` as A INNER JOIN `per_entrevista` as E on A.id=E.id_aspirante WHERE id_aspirante='".+$data->id."'");
        $totreg1 = $db->num_rows($qry1);

      

        if ($totreg1>0) {                  
           
            for($xx=0; $xx<$totreg1; $xx++){ 
              $rs = $db->fetch_array($qry1);
              $tabla1[] = array(
                "id" => $rs["id_aspirante"],                      
                "nombres" =>$rs["nombre"]." ".$rs["apellido"],                                                    
                "dni" =>$rs["dni"],
                "edad" =>$rs["edad"],
                "fecha" =>$rs["fecha_nacimiento"],                
                "correo" =>$rs["correo"],

                "telefono" =>$rs["telefono"],
                "puesto" =>$rs["puesto"],
                "pretenciones" =>$rs["pretencion_salarial"],
                
                "pregunta" =>$rs["id_pregunta"],
                "respuesta" =>$rs["respuesta"]          
              );
          }    
        }    
       
      $rpta = array("tabla1"=>$tabla1);
      echo json_encode($rpta);

      break;
      case "03_pdf_referencia_laboral_persona":
          
       
        $tabla1 = array();
        $tabla2 = array();
     
        $qry1 = $db->query("SELECT A.nombre AS 'nombre',A.apellido AS 'apellido',R.*,RL.* FROM `per_referencia_laboral` as RL INNER JOIN `per_referencia` as R on R.id_aspirante=RL.id_aspirante INNER JOIN `per_aspirante` as A on A.id=RL.id_aspirante WHERE RL.id_aspirante='".+$data->id."'");
        $totreg1 = $db->num_rows($qry1);

      
        if ($totreg1>0) {             
          for($xx=0; $xx<$totreg1; $xx++){      
            $rs = $db->fetch_array($qry1);
            $tabla1[] = array(
              "id" => $rs["id"],                      
              "nombresCandidato" =>$rs["nombre"]." ".$rs["apellido"],                                                    
              "nombresReferente" =>$rs["nombre_referente"]." ".$rs["apellido_referente"],         
              "telefono" =>$rs["telefono"],
              "cargo" =>$rs["cargo"],
              "empresa" =>$rs["empresa"],
              "respuesta" =>$rs["respuesta"]                  
            );
          } 
        }    
       
      $rpta = array("tabla1"=>$tabla1);
      echo json_encode($rpta);

      break;
      case "test_file_upload":
      //$location = 'upload/'.$filename;     
     // var_dump($data->data->file);
     $tabla1=1;
     // foreach ($data->data->file as $value) {
        if(move_uploaded_file($data->data->file->$_FILES["file"]["tmp_name"],'upload/'.$value->name)){
          $tabla1 = 1;
       }else{
          $tabla1 = 0;
       }
    

      // };

       $rpta = array("tabla1"=>$tabla1);
       echo json_encode($rpta);
 
      break;
      case "03_pdf_requerimiento_persona":
          
       
        $tabla1 = array();
        $tabla2 = array();
     
        $qry1 = $db->query("SELECT * FROM `per_requerimiento_personal` as T INNER JOIN `per_personal` as P ON T.id_personal=P.id
        INNER JOIN `per_aspirante` as A ON P.id_aspirante=A.id where T.id='".+$data->id."'");
        $totreg1 = $db->num_rows($qry1);

        $qry2 = $db->query("SELECT * FROM `per_observaciones_requerimiento_personal` WHERE id_requerimiento='".+$data->id."'");
        $totreg2 = $db->num_rows($qry2); 

        if ($totreg1>0) {                  
            $rs = $db->fetch_array($qry1);
            $tabla1 = array(
              "id" => $rs["id"],                      
             // "id_solicitante" =>$rs["id_solicitante"],                                                    
              "cargo" =>$rs["cargo"],
              "vacante" =>$rs["n_vacantes"],
              "area" =>$rs["area"],
              "contrato" =>$rs["contrato"],
              "motivo" =>$rs["id_motivo"],
              "lugar" =>$rs["lugar_trabajo"],
              "fecha" =>$rs["fecha_incorporacion"],
              "duracion" =>$rs["duracion_trabajo"],           
              "nombres" =>$rs["nombre"]." ".$rs["apellido"],
              "cargo_s" =>$rs["cargo"],
              "area_s" =>$rs["area"],
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
      case "03_pdf_Ficha_Personal":
        $tabla1 = array();
        $tabla2 = array();
        $tabla3 = array();
        $tabla4 = array();
        $tabla5 = array();
        $tabla6 = array();
        $tabla7 = array();
        $tabla8 = array();
        $tabla9 = array();
        $tabla10 = array();
        $tabla11 = array();
        $qry1 = $db->query("SELECT * FROM `per_personal` as P INNER JOIN `per_aspirante` as A ON P.id_aspirante=A.id WHERE P.id_aspirante='".$data->value."'");
        $totreg1 = $db->num_rows($qry1);
        if ($totreg1>0) {          
          $rs = $db->fetch_array($qry1);
          $tabla1[] = array(
            "nombres" => $rs["nombre"]." ".$rs["apellido"],  
            "fecha_nacimiento" => $rs["fecha_nacimiento"],  
            "lugar_nacimiento" => $rs["lugar_nacimiento"],  
            "distrito" => $rs["distrito"],  
            "provincia" => $rs["provincia"],  
            "departamento" => $rs["departamento"],  
            "dni" => $rs["dni"],  
            "telefono" => $rs["telefono"],  
            //"celular" => $rs["celular"],  
            "domicilio" => $rs["domicilio"],  
            "urbanizacion" => $rs["urbanizacion"],  
            "distrito_domicilio" => $rs["distrito_domicilio"],  
            "estado_civil" => $rs["estado_civil"],  
            "edad" => $rs["edad"],  
          //  "n_hijos" => $rs["n_hijos"],  
            "sexo" => $rs["sexo"],  
            "talla" => $rs["talla"],
            "contextura" => $rs["contextura"],
            "ruc" => $rs["ruc"],
            "essalud" => $rs["essalud"],
            "onp" => $rs["fondo_pensiones"],
            "cusp" => $rs["cusp"],
            "fecha_afiliacion" => $rs["fecha_afiliacion"]                                   
          );
        
      }  
      $qry2 = $db->query("SELECT * FROM per_conyuge where id_personal='".$data->value."'");
      $totreg2 = $db->num_rows($qry2);
        if ($totreg2>0) {          
          $rs = $db->fetch_array($qry2);
          $tabla2[] = array(
            "nombres" => $rs["nombres"]." ".$rs["apellidos"],  
            "fecha" => $rs["fecha_nacimiento"],  
            "lugar_nacimiento" => $rs["lugar_nacimiento"],  
            "distrito" => $rs["distrito"],  
            "provincia" => $rs["provincia"],  
            "departamento" => $rs["departamento"],  
            "dni" => $rs["dni"],  
            "telefono" => $rs["telefono"],             
            "ruc" => $rs["ruc"],  
            "profesion" => $rs["profesion"],  
            "ocupacion" => $rs["ocupacion"],  
            "direccion" => $rs["direccion"],
            "centro_laboral" => $rs["centro_laboral"]                                
          );
        
      } 
      $qry3 = $db->query("SELECT * FROM per_padres where id_personal='".$data->value."'");
      $totreg3 = $db->num_rows($qry3);
      if ($totreg3>0) {          
        $rs = $db->fetch_array($qry3);
        $tabla3[] = array(
          "nombres_padre" => $rs["nombre_padre"]." ".$rs["apellido_padre"],  
          "trabajo_padre" => $rs["trabajo_padre"],  
          "ocupacion_padre" => $rs["ocupacion_padre"],  
          "direccion_padre" => $rs["direccion_padre"],  
          "telefono_padre" => $rs["telefono_padre"],  
          "celular_padre" => $rs["celular_padre"],  
          "nombres_madre" => $rs["nombre_madre"]." ".$rs["apellido_madre"],  
          "trabajo_madre" => $rs["trabajo_madre"],  
          "ocupacion_madre" => $rs["ocupacion_madre"],  
          "direccion_madre" => $rs["direccion_madre"],  
          "telefono_madre" => $rs["telefono_madre"],  
          "celular_madre" => $rs["celular_madre"]
                 
        );
      
     } 
     $qry4 = $db->query("SELECT * FROM per_emergencia where id_personal='".$data->value."'");
     $totreg4 = $db->num_rows($qry4);
     if ($totreg4>0) {          
       $rs = $db->fetch_array($qry4);
       $tabla4[] = array(
        "nombres" => $rs["nombre"]." ".$rs["apellido"],  
        "parentesco" => $rs["parentesco"],  
        "telefono" => $rs["telefono"]                        
       );     
    }  
    $qry5 = $db->query("SELECT * FROM per_movilidad where id_personal='".$data->value."'");
    $totreg5 = $db->num_rows($qry5);
    if ($totreg5>0) {          
      $rs = $db->fetch_array($qry5);
      $tabla5[] = array(
        "movilidad" => $rs["movilidad"],  
        "licencia_conducir" => $rs["licencia_conducir"],  
        "tipo_vehiculo" => $rs["tipo_vehiculo"],  
        "marca" => $rs["marca"],  
        "anio" => $rs["anio"],  
        "placa" => $rs["placa"]
               
      );    
   }    
   $qry6 = $db->query("SELECT * FROM per_antecedentes_policiales where id_personal='".$data->value."'");
   $totreg6 = $db->num_rows($qry6);
   if ($totreg6>0) {          
    for($xx=0; $xx<$totreg6; $xx++){
      $rs = $db->fetch_array($qry6);
      $tabla6[] = array(
        "respuesta" => $rs["respuesta"],      
      );    
    }    
  }    
  $qry7 = $db->query("SELECT * FROM per_profesion where id_personal='".$data->value."'");
  $totreg7 = $db->num_rows($qry7);
  if ($totreg7>0) {          
    for($xx=0; $xx<$totreg7; $xx++){ 
      $rs = $db->fetch_array($qry7);
      $tabla7[] = array(
        "descripcion" => $rs["descripcion"],  
        "tipo" => $rs["tipo"],  
        "estado" => $rs["estado"],
        "lugar" => $rs["lugar"]             
      ); 
  }   
 }    
 
 /*$qry8 = $db->query("SELECT * FROM tb_profesion_2 where id_personal='".$data->value."'");
 $totreg8 = $db->num_rows($qry8);
 if ($totreg8>0) {          
   $rs = $db->fetch_array($qry8);
   $tabla8[] = array(
    "descripcion" => $rs["descripcion"]            
   );    
}    */
$qry9 = $db->query("SELECT * FROM per_idiomas where id_personal='".$data->value."'");
$totreg9 = $db->num_rows($qry9);
if ($totreg9>0) {       
  for($xx=0; $xx<$totreg9; $xx++){    
  $rs = $db->fetch_array($qry9);
  $tabla9[] = array(
    "idioma" => $rs["descripcion"],
    "nivel" => $rs["nivel"]
           
  );    
}   
}        
$qry10 = $db->query("SELECT * FROM per_referencia_laboral_personal where id_personal='".$data->value."'");
$totreg10 = $db->num_rows($qry10);
if ($totreg10>0) {          
  for($xx=0; $xx<$totreg10; $xx++){ 
    $rs = $db->fetch_array($qry10);
    $tabla10[] = array(
      "nombre" => $rs["nombre"],
      "cargo" => $rs["cargo"],
      "telefono" => $rs["telefono"],
      "empresa" => $rs["empresa"]
            
    );    
  } 
} 
$qry11 = $db->query("SELECT * FROM per_hijos where id_personal='".$data->value."'");
$totreg11 = $db->num_rows($qry11);
if ($totreg11>0) {          
  for($xx=0; $xx<$totreg11; $xx++){ 
  $rs = $db->fetch_array($qry11);
  $tabla11[] = array(
    "nombres" => $rs["nombre"]." ".$rs["apellido"],
    "fecha_nacimiento" => $rs["fecha_nacimiento"],
    "edad" => $rs["edad"],
    "sexo" => $rs["sexo"],
    "dni" => $rs["dni"]
           
  );   
}   
}       
        
$rpta = array(
"tabla1"=>$tabla1,
"tabla2"=>$tabla2,
"tabla3"=>$tabla3,
"tabla4"=>$tabla4,
"tabla5"=>$tabla5,
"tabla6"=>$tabla6,
"tabla7"=>$tabla7,
"tabla8"=>$tabla8,
"tabla9"=>$tabla9,
"tabla10"=>$tabla10,
"tabla11"=>$tabla11);
echo json_encode($rpta);
      break;
      case "01_get_insert_values_date":
        $val=get_value($data->data->type);
        $sql1 = "UPDATE `per_archivos` 
        SET ".$val['acro'].'fecha_emi'."='".$data->data->fecha_emi."',
        ".$val['acro'].'fecha_cadu'."='".$data->data->fecha_cadu."',
        ".$val['acro'].'fecha_vigencia'."='".getStatus($data->data->fecha_emi,$data->data->fecha_cadu)."'
        WHERE id_personal='".$data->data->id."'";
        $qry1 = $db->query($sql1);
        $rpta = array("tabla1"=>$qry1);
        echo json_encode($rpta);
      break;
      case "01_get_insert_values_date_programa_capacitacion":
        $val=get_value_2($data->data->type);        
        $sql1 = "UPDATE `per_capacitacion` 
        SET ".$val['acro'].'fecha_emi'."='".$data->data->fecha_emi."',
        ".$val['acro'].'fecha_cadu'."='".$data->data->fecha_cadu."',
        ".$val['acro'].'fecha_vigencia'."='".getStatus($data->data->fecha_emi,$data->data->fecha_cadu)."'
        WHERE id_personal='".$data->data->id."'";
        $qry1 = $db->query($sql1);
        $rpta = array("tabla1"=>$qry1);
        echo json_encode($rpta);
      break;
      case "01_delete_ficha_personal":
        $qry1 = $db->query("DELETE from  tb_personal WHERE id='".$data->value."'");
        $qry2 = $db->query("DELETE from  tb_conyuge WHERE id_personal='".$data->value."'");
        $qry3 = $db->query("DELETE from  tb_padres WHERE id_personal='".$data->value."'");
        $qry4 = $db->query("DELETE from  tb_emergencia WHERE id_personal='".$data->value."'");
        $qry5 = $db->query("DELETE from  tb_movilidad WHERE id_personal='".$data->value."'");
        $qry6 = $db->query("DELETE from  tb_antecedentes WHERE id_personal='".$data->value."'");
        $qry7 = $db->query("DELETE from  tb_profesion WHERE id_personal='".$data->value."'");
        $qry8 = $db->query("DELETE from  tb_profesion_2 WHERE id_personal='".$data->value."'");
        $qry9 = $db->query("DELETE from  tb_idiomas WHERE id_personal='".$data->value."'");
        $qry10 = $db->query("DELETE from  tb_referencia WHERE id_personal='".$data->value."'");
        $qry11 = $db->query("DELETE from  tb_hijos WHERE id_personal='".$data->value."'");
        $qry12 = $db->query("DELETE from  tb_files WHERE id_personal='".$data->value."'");                                                                                      
        
        $rpta = array("error"=>0,"qry1"=>$qry1,"qry2"=>$qry2,"qry3"=>$qry3,"qry4"=>$qry4,"qry5"=>$qry5,"qry6"=>$qry6,"qry7"=>$qry7,"qry8"=>$qry8,"qry9"=>$qry9,"qry10"=>$qry10,"qry11"=>$qry11,"qry12"=>$qry12);
        echo json_encode($rpta);
      break;
      case "01_delete_programa_capacitacion":
        $qry1 = $db->query("DELETE from  per_capacitacion WHERE id='".$data->value."'");                                                              
        
        $rpta = array("error"=>0,"qry1"=>$qry1);
        echo json_encode($rpta);
      break;
      case "sql_get_last_requerimiento":
        $tabla = array();
        $qry = $db->query("SELECT id FROM `requerimiento` order by id desc limit 1;");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {              
            $rs = $db->fetch_array($qry);
            $tabla = array(
              "id" => $rs["id"]                 
            );
          
        }else{
          $tabla = array(
            "id" => 0               
          );
        }
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;
      case "03_save_register_Ficha_Personal":
        $qry1;
        $qry2;
        $qry3;

        $sql1 = "INSERT INTO `per_personal` 
        (id,
        id_aspirante,       
        lugar_nacimiento,
        distrito,
        provincia,
        departamento,
        domicilio,
        estado_civil,
        urbanizacion,
        distrito_domicilio,       
        sexo,
        talla,
        contextura,
        ruc,
        essalud,
        fondo_pensiones,
        cusp,
        fecha_afiliacion
        ) VALUES (
          '".$data->data->id."',  
          '".$data->data->id_aspirante."',              
          '".$data->data->lugar_nacimiento."',  
          '".$data->data->distrito."',  
          '".$data->data->provincia."',  
          '".$data->data->departamento."',                  
          '".$data->data->domicilio."',
          '".$data->data->civil."',
          '".$data->data->urbanizacion."',
          '".$data->data->distrito_domicilio."',        
          '".$data->data->sexo."',
          '".$data->data->talla."',
          '".$data->data->contextura."',
          '".$data->data->ruc."',
          '".$data->data->essalud."',
          '".$data->data->onp."',
          '".$data->data->cussp."',
          '".$data->data->fecha_afiliacion."'
          )";
          $qry1 = $db->query($sql1);

          $qry2="";
          if($data->data->stateconyuge=="0" || $data->data->stateconyuge=="4"){
              $matri=count($data->data->files2)==2?$data->data->files2[1]:"";
            $sql2 = "INSERT INTO `per_conyuge` 
            (id_personal,
            nombres,
            apellidos,
            fecha_nacimiento,
            lugar_nacimiento,
            distrito,
            provincia,
            departamento,
            dni,
            ruc,
            profesion,
            ocupacion,
            centro_laboral,
            direccion,
            telefono,     
            file_dni,
            file_matrimonio
            ) VALUES (
              '".$data->data->id_aspirante."',  
              '".$data->data->nombre_conyuge."',              
              '".$data->data->apellido_conyuge."',  
              '".$data->data->fecha_conyuge."',  
              '".$data->data->lugar_conyuge."',  
              '".$data->data->distrito_conyuge."',  
              '".$data->data->provincia_conyuge."',  
              '".$data->data->departamento_conyuge."',  
              '".$data->data->dni_conyuge."',  
              '".$data->data->ruc_conyuge."',  
              '".$data->data->profesion_conyuge."',                 
              '".$data->data->ocupacion_conyuge."',
              '".$data->data->centro_conyuge."',
              '".$data->data->direccion_conyuge."',
              '".$data->data->telefono_conyuge."',
              '".$data->data->files2[0]."',
              '".$matri."'           
              )";
              $qry2 = $db->query($sql2);
          }
          $qry3="";
            if($data->data->state_padre=="2" ||
            $data->data->state_madre=="2"){
              $sql3 = "INSERT INTO `per_padres` 
              (id_personal,
              nombre_padre,
              apellido_padre,
              trabajo_padre,
              ocupacion_padre,
              direccion_padre,
              telefono_padre,
              celular_padre,
              nombre_madre,
              apellido_madre,
              trabajo_madre,
              ocupacion_madre,
              direccion_madre,
              telefono_madre,
              celular_madre            
              ) VALUES (
                '".$data->data->id_aspirante."',  
                '".$data->data->nombre_padre."',              
                '".$data->data->apellido_padre."',  
                '".$data->data->centro_padre."',  
                '".$data->data->ocupacion_padre."',  
                '".$data->data->direccion_padre."',  
                '".$data->data->telefono_padre."',  
                '".$data->data->celular_padre."',  
                '".$data->data->nombre_madre."',  
                '".$data->data->apellido_madre."',  
                '".$data->data->centro_madre."',                 
                '".$data->data->ocupacion_madre."',
                '".$data->data->direccion_madre."',
                '".$data->data->telefono_madre."',
                '".$data->data->celular_madre."'                         
                )";
                $qry3 = $db->query($sql3);
  
            }
           


              $sql3 = "INSERT INTO `per_emergencia` 
              (id_personal,
              nombre,
              apellido,
              parentesco,
              telefono         
              ) VALUES (
                '".$data->data->id_aspirante."',  
                '".$data->data->nombre_referencia."',              
                '".$data->data->apellido_referencia."',  
                '".$data->data->parentesco_referencia."',  
                '".$data->data->telefono_referencia."'                           
                )";
                $qry3 = $db->query($sql3);

                $qry4="";
                if($data->data->checkMovilidad=="1"){
                  $sql4 = "INSERT INTO `per_movilidad` 
                  (id_personal,
                  movilidad,
                  licencia_conducir,
                  tipo_vehiculo,
                  marca,
                  anio,
                  placa         
                  ) VALUES (
                    '".$data->data->id_aspirante."',  
                    '".$data->data->movilidad[0]."',              
                    '".$data->data->licencia."',  
                    '".$data->data->vehiculo."',  
                    '".$data->data->marca."',
                    '".$data->data->anio."',
                    '".$data->data->placa."'
                    )";
                    $qry4 = $db->query($sql4);
                }
                          
                if($data->data->checkPolicialesPenales=="1"){
                  $sql5 = "INSERT INTO per_antecedentes_policiales 
                  (id_personal, id_policial_penal,respuesta) VALUES ";
                  $sqldata5="";
                  $i=1;
                    foreach ($data->data->antecedente_policial as $value) {
                      $sqldata5.= "('".$data->data->id_aspirante."','".$i."','".$value."'),";
                      $i=$i+1;
                     };
                  $sqldata5=substr($sqldata5, 0, -1);       
                  $sql5=$sql5.$sqldata5.";";
                  $qry5 = $db->query($sql5);
                }
                 
        $sql20 = "UPDATE `per_aspirante` SET estado=7 WHERE id='".$data->data->id_aspirante."'";
        $qry20 = $db->query($sql20);
     
        if(count($data->data->profesion)){
          $sql6 = "INSERT INTO per_profesion 
          (id_personal,
          descripcion,
          tipo,
          estado,
          lugar) VALUES ";
          $sqldata="";
          foreach ($data->data->profesion as $value) {
              $sqldata.= "('".$data->data->id_aspirante."','".$value[0]."','".$value[1]."','".$value[2]."','".$value[3]."'),";
             };

          /*foreach ($data->data->tecnica as $value) {
              $sqldata.= "('".$data->data->id."','".$value[0]."','1','".$value[1]."','".$value[2]."'),";
          };*/
          $sqldata=substr($sqldata, 0, -1);       
          $sql6=$sql6.$sqldata.";";
          $qry6 = $db->query($sql6);
        }

       /* if($data->data->otrosEstudios){
          $sql7 = "INSERT INTO tb_profesion_2 
          (id_personal,
          descripcion
         ) VALUES ";
          $sqldata="";
          foreach ($data->data->otrosEstudios as $value) {
              $sqldata.= "('".$data->data->id."','".$value."'),";
             };
       
          $sqldata=substr($sqldata, 0, -1);       
          $sql7=$sql7.$sqldata.";";
          $qry7 = $db->query($sql7);
        }*/
     
        if(count($data->data->idioma)){
          $sql8 = "INSERT INTO per_idiomas 
          (id_personal,
          descripcion,
          nivel) VALUES ";
          $sqldata="";
          foreach ($data->data->idioma as $value) {
              $sqldata.= "('".$data->data->id_aspirante."','".$value[0]."','".$value[1]."'),";
             };
     
          $sqldata=substr($sqldata, 0, -1);       
          $sql8=$sql8.$sqldata.";";
          $qry8 = $db->query($sql8);
        }
        if(count($data->data->referencia)){
          $sql9 = "INSERT INTO per_referencia_laboral_personal 
          (id_personal,
          nombre,
          cargo,
          telefono,
          empresa) VALUES ";
          $sqldata="";
          foreach ($data->data->referencia as $value) {
              $sqldata.= "('".$data->data->id_aspirante."','".$value[0]."','".$value[1]."','".$value[2]."','".$value[3]."'),";
             };
     
          $sqldata=substr($sqldata, 0, -1);       
          $sql9=$sql9.$sqldata.";";
          $qry9 = $db->query($sql9);
        }
        if(count($data->data->hijos)){
          $sql10 = "INSERT INTO per_hijos 
          (id_personal,
          nombre,
          apellido,
          fecha_nacimiento,
          edad,
          sexo,          
          dni,
          file_dni
          ) VALUES ";
          $sqldata="";
          $i=0;
          foreach ($data->data->hijos as $value) {
            
            $sqldata.= "('".$data->data->id_aspirante."','".$value[0]."','".$value[1]."','".$value[2]."','".$value[3]."','".$value[4]."','".$value[5]."','".$data->data->files3[$i]."'),";
              $i=$i+1;
            };
     
          $sqldata=substr($sqldata, 0, -1);       
          $sql10=$sql10.$sqldata.";";
          $qry10 = $db->query($sql10);
        }

        if(count($data->data->files)){
         

          $sql11 = "INSERT INTO `per_archivos` 
          (id_personal,
          dni_file_name,
          licencia_file_name,
          licencia_esp_file_name,
          sctr_file_name,
          seguro_file_name,
          policial_file_name,
          judicial_file_name,
          penal_file_name,
          trabajo_file_name,
          medico_file_name,
          lice_file_name           
          ) VALUES (
            '".$data->data->id_aspirante."',  
            '".$data->data->files[0]."',              
            '".$data->data->files[1]."',  
            '".$data->data->files[2]."',  
            '".$data->data->files[3]."',  
            '".$data->data->files[4]."',  
            '".$data->data->files[5]."',  
            '".$data->data->files[6]."',  
            '".$data->data->files[7]."',  
            '".$data->data->files[8]."',  
            '".$data->data->files[9]."', 
            '".$data->data->files[10]."'                                        
            )";
            $qry11 = $db->query($sql11);


        }
        $rpta = array("error"=>$qry1);
        echo json_encode($rpta);

      break;
      case "03_save_register_programacion_capacitacion":
        if($data->data->files){
         

          $sql11 = "INSERT INTO `per_capacitacion` 
          (id_personal,
          	induc_file_name,
          	defen_file_name,
            peligroso1_file_name,
            peligroso2_file_name,
            peligroso3_file_name,
            auxilio_file_name,
            extintores_file_name,
            trabajo_file_name,
            fatiga_file_name,
            curso_file_name,
            induccion_file_name     
          ) VALUES (             
            '".$data->data->id_personal."',    
            '".$data->data->files[0]."',              
            '".$data->data->files[1]."',  
            '".$data->data->files[2]."',  
            '".$data->data->files[3]."',  
            '".$data->data->files[4]."',  
            '".$data->data->files[5]."',  
            '".$data->data->files[6]."',  
            '".$data->data->files[7]."',  
            '".$data->data->files[8]."',  
            '".$data->data->files[9]."',                                        
            '".$data->data->files[10]."'
            )";
            $qry11 = $db->query($sql11);


        }
        $rpta = array("table11"=>$qry11);
        echo json_encode($rpta);
      break;
      case "01_delete_referencia_laboral_persona":
          
        $qry1 = $db->query("DELETE from  per_referencia_laboral WHERE id_aspirante='".$data->value."'");
        $qry2 = $db->query("DELETE from  per_referencia WHERE id_aspirante='".$data->value."'");
      
           
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


  function getStatus($val_emi,$val_cadu){
    $state=0;
    $newEmi= new DateTime();
    $newCadu= new DateTime($val_cadu);
    $val=$newEmi->diff($newCadu)->format("%r%a");
    if(intval($val)>45){
      $state=1;
    }else if(intval($val)>7){
      $state=2;
    }else{
      $state=3;
    }

    return $state;
  }


  function get_value_2($data){
    $val="";
    $type="";
    $acro="";
    switch($data){
        case "0": 
        $type="0";
        $val="induc_file_name";
        $acro="induc_";
        break;
        case "1": 
        $type="1";
        $val="defen_file_name";
        $acro="defen_";
        break;
        case "2": 
        $type="2";
        $val="peligroso1_file_name";
        $acro="peligroso1_";
        break;
        case "3": 
        $type="3";
        $val="peligroso2_file_name";
        $acro="peligroso2_";
        break;
        case "4": 
        $type="4";
        $val="peligroso3_file_name";
        $acro="peligroso3_";
        break;
        case "5": 
        $type="5";
        $val="auxilio_file_name";
        $acro="auxilio_";
        break;
        case "6": 
        $type="6";
        $val="extintores_file_name";
        $acro="extintores_";
        break;
        case "7": 
        $type="7";
        $val="trabajo_file_name";
        $acro="trabajo_";
        break;
        case "8": 
        $type="8";
        $val="fatiga_file_name";
        $acro="fatiga_";
        break;
        case "9":
        $type="9";
        $val="curso_file_name";
        $acro="curso_";
        break;
        case "10":
        $type="10";
        $val="induccion_file_name";
        $acro="induccion_";
        break;
  }
  
  return  array('val'=>$val,'type'=>$type,'acro'=>$acro);
  }
  function get_value($data){
    $val="";
    $type="";
    $acro="";
    switch($data){
        case "0": 
        $type="0";
        $val="dni_file_name";
        $acro="dni_";
        break;
        case "1": 
        $type="1";
        $val="licencia_file_name";
        $acro="licencia_";
        break;
        case "2":
        $type="2";
        $val="licencia_esp_file_name";
        $acro="licencia_esp_";          
        break;
        case "3": 
        $type="3";
        $val="sctr_file_name";
        $acro="sctr_";
        break;
        case "4": 
        $type="4";
        $val="seguro_file_name";
        $acro="seguro_";
        break;
        case "5": 
        $type="5";
        $val="policial_file_name";
        $acro="policial_";
        break;
        case "6": 
        $type="6";
        $val="judicial_file_name";
        $acro="judicial_";
        break;
        case "7": 
        $type="7";
        $val="penal_file_name";
        $acro="penal_";
        break;
        case "8": 
        $type="8";
        $val="trabajo_file_name";
        $acro="trabajo_";
        break;
        case "9": 
        $type="9";
        $val="medico_file_name";
        $acro="medico_";
        break;
        case "10":
        $type="10";
        $val="lice_file_name";
        $acro="lice_";
  }
  return  array('val'=>$val,'type'=>$type,'acro'=>$acro);
  }
?>