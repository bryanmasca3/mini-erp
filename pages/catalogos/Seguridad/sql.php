<?php
  include_once('../../../includes/sess_verifica.php');

  if(isset($_SESSION["usr_ID"])){
    if (isset($_REQUEST["appSQL"])){
      include_once('../../../includes/db_database.php');
      include_once('../../../includes/funciones.php');

      $data = json_decode($_REQUEST['appSQL']);
      switch ($data->TipoQuery) {
        case "01_grid": 
          $tabla = array();
          $qry = $db->query("SELECT C.*,A.descripcion as area_descrip,T.descripcion as tip_descrip FROM `tb_capacitaciones` as C INNER JOIN `tb_area_capacitacion` as A ON C.id_area=A.id INNER JOIN `tb_tipo_registro` AS T ON C.id_tipo_registro=T.id;");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla[] = array(
                "id" => $rs["id"],
                "tipo" =>$rs["tip_descrip"],
                "area" => $rs["area_descrip"],
                "tema" => $rs["tema"],
                "fecha"=> $rs["fecha"]               
              );
            }
          }
      
      //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;
      case "01_grid_somnolencia_fatiga": 
        $tabla = array();
        $qry = $db->query("SELECT FS.id as id,FS.fecha,O.dni as ope_dni,O.nombres as ope_nombre,O.apellidos as ope_apellidos,E.dni as eva_dni,E.nombres as eva_nombre,E.apellidos as eva_apellidos FROM `tb_fatiga_somnolencia` as FS INNER JOIN `tb_evaluador` as E ON FS.id_evaluador=E.id INNER JOIN `tb_operador` AS O ON FS.id_operador=O.id;");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla[] = array(
              "id" => $rs["id"],
              "ope_nombre" =>$rs["ope_nombre"]." ".$rs["ope_apellidos"],            
              "eva_nombre" => $rs["eva_nombre"]." ".$rs["eva_apellidos"],
              "fecha"=> $rs["fecha"]               
            );
          }
        }
    
    //respuesta OT
    $rpta = array("tabla"=>$tabla);
    echo json_encode($rpta);
    break;
      case "01_grid_pernocte": 
        $tabla = array();
        $qry = $db->query("SELECT * FROM tb_pernocte");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla[] = array(
              "id" => $rs["id"],
              "proyecto" =>$rs["proyecto"],
              "fecha_inicio_ruta" => $rs["fecha_inicio_ruta"],
              "fecha_inicio_pernocte" => $rs["fecha_inicio_pernocte"],
              "fecha_fin_pernocte"=> $rs["fecha_fin_pernocte"]              
            );
          }
        }
    
    //respuesta OT
    $rpta = array("tabla"=>$tabla);
    echo json_encode($rpta);
    break;
    case "01_insert_checklick_camioneta":
    
      $declaracionJurada_="";
      $luces_="";
      $documentos_="";
      $general_="";
      $neumatico_="";
      $motor_="";
      $seguridad_="";

      foreach ($data->data->declaracionJurada as $value) {
        $declaracionJurada_.= "'".$value."',";
      };
      foreach ($data->data->luces as $value) {
        $luces_.= "'".$value."',";
      };
      foreach ($data->data->documentos as $value) {
        $documentos_.= "'".$value."',";
      };
      foreach ($data->data->general as $value) {
        $general_.= "'".$value."',";
      };
      foreach ($data->data->neumatico as $value) {
        $neumatico_.= "'".$value."',";
      };
      foreach ($data->data->motor as $value) {
        $motor_.= "'".$value."',";
      };
      foreach ($data->data->seguridad as $value) {
        $seguridad_.= "'".$value."',";
      };

      $seguridad_=substr($seguridad_, 0, -1); 

      $sql1 = "INSERT INTO tb_checklist_camioneta 
      (id,
      id_conductor,
      fecha,
      hora, 
      placa,
      km_ini,
      km_fin,
      actividad,
      observaciones,
      J_1,            
      J_2,
      J_3,
      J_4,
      J_5,
      L_1,
      L_2,
      L_3,
      L_4,
      L_5,
      L_6,
      L_7,
      L_8,
      L_9,
      D_1,
      D_2,
      D_3,
      D_4,
      D_5,
      D_6,
      D_7,
      D_8,
      G_1,
      G_2,
      G_3,
      G_4,
      G_5,
      G_6,
      G_7,
      G_8,
      G_9,
      G_10,
      G_11,
      G_12,
      N_1,
      N_2,
      N_3,
      N_4,
      M_1,
      M_2,
      M_3,
      M_4,
      M_5,
      M_6,
      M_7,
      M_8,
      M_9,
      S_1,
      S_2,
      S_3,
      S_4,
      S_5,
      S_6,
      S_7,
      S_8,
      S_9,
      S_10,
      S_11,
      S_12,
      S_13,
      S_14,
      S_15,
      S_16,
      S_17) VALUES (
        '".$data->data->id."',  
        '".$data->data->id_conductor."',  
        '".$data->data->fecha."',              
        '".$data->data->hora."',          
        '".$data->data->placa."',  
        '".$data->data->km_inicial."',  
        '".$data->data->km_final."',
        '".$data->data->actividad."',
        '".$data->data->observacion."',
        ".$declaracionJurada_."              
        ".$luces_." 
        ".$documentos_." 
        ".$general_." 
        ".$neumatico_." 
        ".$motor_." 
        ".$seguridad_." 
        )";
      $qry1 = $db->query($sql1);

      $pasajeros_="";
      foreach ($data->data->pasajeros as $value) {
        $pasajeros_.= "'".$value."',";
      };

      $pasajeros_=substr($pasajeros_, 0, -1); 

      $sql2 = "INSERT INTO tb_pasajeros 
      (id_checklist_camioneta,
      descripcion) VALUES (
        '".$data->data->id."',                        
        ".$pasajeros_." 
        )";
      $qry2 = $db->query($sql2);
      $resp = array("first"=>$qry1,"second"=>$qry2);
      echo json_encode($resp);
    break;
    case "01_insert_checklick_cisterna":
    
      $declaracionJurada_="";
      $luces_="";
      $documentos_="";
      $general_="";
      $neumatico_="";
      $motor_="";
      $seguridad_="";
      $recarga_="";

      foreach ($data->data->declaracionJurada as $value) {
        $declaracionJurada_.= "'".$value."',";
      };
      foreach ($data->data->luces as $value) {
        $luces_.= "'".$value."',";
      };
      foreach ($data->data->documentos as $value) {
        $documentos_.= "'".$value."',";
      };
      foreach ($data->data->general as $value) {
        $general_.= "'".$value."',";
      };
      foreach ($data->data->neumatico as $value) {
        $neumatico_.= "'".$value."',";
      };
      foreach ($data->data->motor as $value) {
        $motor_.= "'".$value."',";
      };
      foreach ($data->data->seguridad as $value) {
        $seguridad_.= "'".$value."',";
      };
      foreach ($data->data->recarga as $value) {
        $recarga_.= "'".$value."',";
      };

      $recarga_=substr($recarga_, 0, -1); 

      $sql1 = "INSERT INTO tb_checklist_cisterna 
      (id,
      id_conductor,
      lc,
      capacidad,
      fecha,
      hora_cisterna, 
      placa,
      km_tracto,
      km_cisterna,
      actividad,
      km_inicial,
      hora_ini,
      km_inicial_2,
      hora_ini_2,
      observacion,
      J_1,            
      J_2,
      J_3,
      J_4,
      J_5,
      L_1,
      L_2,
      L_3,
      L_4,
      L_5,
      L_6,
      L_7,
      L_8,
      L_9,
      L_10,
      L_11,
      L_12,
      L_13,
      L_14,  
      D_1,
      D_2,
      D_3,
      D_4,
      D_5,
      D_6,
      D_7,
      D_8,
      D_9,
      D_10,
      D_11,
      D_12,
      D_13,
      D_14,
      D_15,
      D_16,
      D_17,
      D_18,
      G_1,
      G_2,
      G_3,
      G_4,
      G_5,
      G_6,
      G_7,
      G_8,
      G_9,
      G_10,
      G_11,
      G_12,
      G_13,
      G_14,
      G_15,
      G_16,
      G_17,      
      N_1,
      N_2,
      N_3,
      N_4,
      N_5,
      M_1,
      M_2,
      M_3,
      M_4,
      M_5,
      M_6,
      M_7,
      M_8,
      M_9,
      S_1,
      S_2,
      S_3,
      S_4,
      S_5,
      S_6,
      S_7,
      S_8,
      S_9,
      S_10,
      S_11,
      S_12,
      S_13,
      S_14,
      S_15,
      S_16,
      S_17,
      S_18,
      S_19,
      S_20,
      S_21,
      S_22,
      S_23,
      S_24,
      S_25,
      S_26,
      S_27,
      R_1,
      R_2,
      R_3,
      R_4,
      R_5,
      R_6,
      R_7,
      R_8,
      R_9) VALUES (
        '".$data->data->id."',  
        '".$data->data->id_conductor."',  
        '".$data->data->lc."',              
        '".$data->data->capacidad."',          
        '".$data->data->fecha."',  
        '".$data->data->hora_cisterna."',  
        '".$data->data->placa."',
        '".$data->data->km_tracto."',
        '".$data->data->km_cisterna."',
        '".$data->data->actividad."',
        '".$data->data->km_inicial."',
        '".$data->data->hora_ini."',
        '".$data->data->km_inicial_2."',
        '".$data->data->hora_ini_2."',
        '".$data->data->observacion."',
        ".$declaracionJurada_."              
        ".$luces_." 
        ".$documentos_." 
        ".$general_." 
        ".$neumatico_." 
        ".$motor_." 
        ".$seguridad_." 
        ".$recarga_." 
        )";
      $qry1 = $db->query($sql1);            
      $resp = array("first"=>$qry1);
      echo json_encode($resp);
    break;
      case "01_delete_capacitacion":
          
        $qry1 = $db->query("DELETE from  tb_capacitaciones WHERE id='".$data->value."'");
        $qry2 = $db->query("DELETE from  tb_observacion WHERE id_capacitacion='".$data->value."'");
        $qry3 = $db->query("DELETE from  tb_acuerdos_compromisos WHERE id_capacitacion='".$data->value."'");
        $qry4 = $db->query("DELETE from  tb_asistentes_capacitaciones WHERE id_capacitacion='".$data->value."'");
        $rpta = array("error"=>0,"qry1"=>$qry1,"qry2"=>$qry2,"qry3"=>$qry3,"qry4"=>$qry4);
        echo json_encode($rpta);

      break;
      case "01_delete_fatiga_somnolencia":
          
        $qry1 = $db->query("DELETE from  tb_fatiga_somnolencia WHERE id='".$data->value."'");     
        $rpta = array("error"=>0,"qry1");
        echo json_encode($rpta);

      break;
      case "03_save_validate_firma_expositor":
        $tabla = array();
        $error= 0;
        $qry1 = $db->query("SELECT id from tb_expositor WHERE firma='".$data->codFimr."' AND id='".$data->id."'");     

        $totreg1 = $db->num_rows($qry1);        
        if ($totreg1==1) {         
          $error= 0;
        }
        else{
          $error= 1;
        }
      $rpta = array("tabla"=>$tabla,"error"=>$error);
      echo json_encode($rpta);
      break;
      case "03_save_validate_asistacance_capacitacion":
        $tabla = array();
        $error= 0;
        $qry1 = $db->query("SELECT id from tb_asistentes WHERE firma='".$data->codFimr."' AND id='".$data->id."'");     

        $totreg1 = $db->num_rows($qry1);        
        if ($totreg1==1) {         
          $error= 0;
        }
        else{
          $error= 1;
        }
      $rpta = array("tabla"=>$tabla,"error"=>$error);
      echo json_encode($rpta);
      break;
      case "03_save_validate_firma_conductor":
        $tabla = array();
        $error= 0;
        $qry1 = $db->query("SELECT id from tb_conductor WHERE firma='".$data->codFimr."' AND id='".$data->id."'");     

        $totreg1 = $db->num_rows($qry1);        
        if ($totreg1==1) {         
          $error= 0;
        }
        else{
          $error= 1;
        }
      $rpta = array("tabla"=>$tabla,"error"=>$error);
      echo json_encode($rpta);
      break;
      case "01_validate_firma":
        $tabla = array();
        $error= 0;
        $qry1 = $db->query("SELECT id from tb_evaluador WHERE firma='".$data->evaluadorFirma."' AND id='".$data->evaluador."'");
        $qry2 = $db->query("SELECT id from tb_operador WHERE firma='".$data->operadorFirma."' AND id='".$data->operador."'");

        $totreg1 = $db->num_rows($qry1);
        $totreg2 = $db->num_rows($qry2);
        if ($totreg1==1 and $totreg2==1) {         
          $error= 0;
        }else{
          $error= 1;
        }
      $rpta = array("tabla"=>$tabla,"error"=>$error,"one"=>$totreg1,"two"=>$totreg2);
      echo json_encode($rpta);
      break;
      case "01_validate_firma_checkList":
      
        $error= 0;
        
        /*$qry1 = $db->query("SELECT id from tb_supervisor WHERE firma='".$data->evaluadorFirma."' AND id='".$data->evaluador."'");*/
        $qry2 = $db->query("SELECT id from tb_conductor WHERE firma='".$data->operadorFirma."' AND id='".$data->operador."'");

       // $totreg1 = $db->num_rows($qry1);
        $totreg2 = $db->num_rows($qry2);
        if (/*$totreg1==1 and */$totreg2==1) {         
          $error= 0;
        }else{
          $error= 1;
        }
      $rpta = array("error"=>$error/*,"one"=>$totreg1*/,"two"=>$totreg2);
      echo json_encode($rpta);
      break;
      case "02_search_conductor_camioneta":
        $tabla = array();
        $error= 0;
        $qry = $db->query("SELECT * from tb_conductor WHERE dni='".$data->value."'");
        $totreg = $db->num_rows($qry);
        if ($totreg==1) {
          $rs = $db->fetch_array($qry);
          $tabla = array(
            "id" => $rs["id"],
            "nombres" =>$rs["nombres"],                      
            "apellidos" =>$rs["apellidos"],             
            "dni" =>$rs["dni"]                         
          );  
        }else{
          $error= 1;
        }
      $rpta = array("tabla"=>$tabla,"error"=>$error);
      echo json_encode($rpta);
      break;
      case "02_search_Expositor":
        $tabla = array();
        $error= 0;
        $qry = $db->query("SELECT * from tb_expositor WHERE dni='".$data->value."'");
        $totreg = $db->num_rows($qry);
        if ($totreg==1) {
          $rs = $db->fetch_array($qry);
          $tabla = array(
            "id" => $rs["id"],
            "nombres" =>$rs["nombre"],                      
            "apellidos" =>$rs["apellido"], 
            "empresa" =>$rs["empresa"], 
            "dni" =>$rs["dni"]                         
          );  
        }else{
          $error= 1;
        }
      $rpta = array("tabla"=>$tabla,"error"=>$error);
      echo json_encode($rpta);
      break;
      case "02_search_asistance":
        $tabla = array();
        $error= 0;
        $qry = $db->query("SELECT * from tb_asistentes WHERE dni='".$data->value."'");
        $totreg = $db->num_rows($qry);
        if ($totreg==1) {
          $rs = $db->fetch_array($qry);
          $tabla = array(
            "id" => $rs["id"],
            "nombres" =>$rs["nombres"],                      
            "apellidos" =>$rs["apellidos"],    
            "dni" =>$rs["dni"]                         
          );  
        }else{
          $error= 1;
        }
      $rpta = array("tabla"=>$tabla,"error"=>$error);
      echo json_encode($rpta);
      break;
      case "02_search_Evaluador":
        $tabla = array();
        $error= 0;
        $qry = $db->query("SELECT * from tb_evaluador WHERE dni='".$data->value."'");
        $totreg = $db->num_rows($qry);
        if ($totreg==1) {
          $rs = $db->fetch_array($qry);
          $tabla = array(
            "id" => $rs["id"],
            "nombres" =>$rs["nombres"],                      
            "apellidos" =>$rs["apellidos"], 
            "direccion" =>$rs["direccion"], 
            "DNI" =>$rs["DNI"], 
            "celular" =>$rs["celular"]                          
          );  
        }else{
          $error= 1;
        }
      $rpta = array("tabla"=>$tabla,"error"=>$error);
      echo json_encode($rpta);
      break;
      case "02_search_Supervisor":
        $tabla = array();
        $error= 0;
        $qry = $db->query("SELECT * from tb_supervisor WHERE dni='".$data->value."'");
        $totreg = $db->num_rows($qry);
        if ($totreg==1) {
          $rs = $db->fetch_array($qry);
          $tabla = array(
            "id" => $rs["id"],
            "nombres" =>$rs["nombres"],                      
            "apellidos" =>$rs["apellidos"]                              
          );  
        }else{
          $error= 1;
        }
      $rpta = array("tabla"=>$tabla,"error"=>$error);
      echo json_encode($rpta);
      break;
      case "02_search_Operador":
        $tabla = array();
        $error= 0;
        $qry = $db->query("SELECT * from tb_operador WHERE dni='".$data->value."'");
        $totreg = $db->num_rows($qry);
        if ($totreg==1) {
          $rs = $db->fetch_array($qry);
          $tabla = array(
            "id" => $rs["id"],
            "nombres" =>$rs["nombres"],
            "area" =>$rs["area"],                       
            "apellidos" =>$rs["apellidos"], 
            "direccion" =>$rs["direccion"], 
            "dni" =>$rs["DNI"], 
            "celular" =>$rs["celular"]                          
          );  
        }else{
          $error= 1;
        }
       $rpta = array("tabla"=>$tabla,"error"=>$error);
      echo json_encode($rpta);    

      break;  
      case "02_search_Trabajador":
        $tabla = array();
        $error= 0;
        $qry = $db->query("SELECT * from tb_trabajador WHERE dni='".$data->value."'");
        $totreg = $db->num_rows($qry);
        if ($totreg==1) {
          $rs = $db->fetch_array($qry);
          $tabla = array(
            "id" => $rs["id"],
            "nombres" =>$rs["nombres"],                                
            "apellidos" =>$rs["apellidos"]                                 
          );  
        }else{
          $error= 1;
        }
       $rpta = array("tabla"=>$tabla,"error"=>$error);
      echo json_encode($rpta);    

      break;  
      case "01_delete_sintomatologia":
        $qry = $db->query("DELETE from  tb_sintomatologia WHERE id='".$data->value."'");
        $rpta = array("qry"=>$qry);
        echo json_encode($rpta);
      break;   
      case "01_delete_checklist_camioneta":
        $qry = $db->query("DELETE from  tb_checklist_camioneta WHERE id='".$data->value."'");
        $rpta = array("qry"=>$qry);
        echo json_encode($rpta);
      break; 
      case "01_delete_checklist_cisterna":
        $qry = $db->query("DELETE from  tb_checklist_cisterna WHERE id='".$data->value."'");
        $rpta = array("qry"=>$qry);
        echo json_encode($rpta);
      break; 
      case "01_delete_observacion":
        $qry = $db->query("DELETE from  tb_observacion WHERE id='".$data->value."'");
        $rpta = array("qry"=>$qry);
        echo json_encode($rpta);
      break;
      case "01_delete_acuerdo":
        $qry = $db->query("DELETE from  tb_acuerdos_compromisos WHERE id='".$data->value."'");
        $rpta = array("qry"=>$qry);
        echo json_encode($rpta);
      break;
      case "02_grid":        
        $tabla = array();

        $qry = $db->query("select * from tb_asistentes where area='".$data->value."'");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla[] = array(
              "id" => $rs["id"],
              "dni" =>$rs["dni"],
              "nombres" => $rs["nombres"]." ".$rs["apellidos"],
              "area" => $rs["area"],
              "cargo"=> $rs["cargo"],
              "firma"=> $rs["firma"]             
            );
          }
        }
    
    //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);      
      break;     
      case "01_get_pernocte":        
        $tabla1 = array();
     
        $qry1 = $db->query("select * from tb_pernocte where id='".$data->value."'");
      
        $totreg1 = $db->num_rows($qry1);
  
        if ($totreg1>0) {          
            $rs = $db->fetch_array($qry1);
            $tabla1 = array(
              "id" => $rs["id"],
              "proyecto" =>$rs["proyecto"],
              "fecha_inicio_ruta" => $rs["fecha_inicio_ruta"],
              "fecha_inicio_pernocte" => $rs["fecha_inicio_pernocte"],
              "fecha_fin_pernocte"=> $rs["fecha_fin_pernocte"],
              "lugar"=> $rs["lugar"]
            );
          
        }   
      $rpta = array("tabla1"=>$tabla1);
      echo json_encode($rpta);
 
      break; 
      case "01_get_pernocte_grid":        
 
        $tabla2 = array();
     
        $qry2 = $db->query("SELECT H.id_pernocte as id_pernoctes, T.* FROM `tb_trabajador` as T INNER JOIN `tb_horario_pernoecte` as H ON T.id = H.id_trabajador INNER JOIN `tb_pernocte` as P ON P.id = H.id_pernocte where P.id='".+$data->value."' GROUP by id_trabajador");
        $totreg2 = $db->num_rows($qry2);
        
   

        if ($totreg2>0) {          
          for($xx=0; $xx<$totreg2; $xx++){
            $rs = $db->fetch_array($qry2);
            $tabla2[] = array(
              "id" => $rs["id"],
              "nombres" =>$rs["nombres"]." ".$rs["apellidos"],               
              "dni" =>$rs["dni"],                        
              "cargo" =>$rs["cargo"]                      
            );
          }
        }    
      $rpta = array("tabla2"=>$tabla2);
      echo json_encode($rpta);
 
      break;    
      case "03_pdf_pernocte":        
 
        $tabla1 = array();
        $tabla2 = array();
     
        $qry1 = $db->query("SELECT * FROM `tb_pernocte` WHERE id='".+$data->id."'");
        $totreg1 = $db->num_rows($qry1);

        $qry2 = $db->query("SELECT T.id as id_trabajadores,T.nombres as nombres,T.apellidos as apellidos, T.cargo as cargo,T.dni as dni,H.hora_inicio as hora_inicio,H.hora_fin as hora_fin FROM `tb_trabajador` as T INNER JOIN `tb_horario_pernoecte` as H ON T.id = H.id_trabajador where H.id_pernocte='".+$data->id."'");
        $totreg2 = $db->num_rows($qry2); 

        if ($totreg1>0) {                  
            $rs = $db->fetch_array($qry1);
            $tabla1 = array(
              "id" => $rs["id"],                      
              "dni_supervisor" =>$rs["dni_supervisor"],                                                    
              "fecha_inicio_ruta" =>$rs["fecha_inicio_ruta"],
              "proyecto" =>$rs["proyecto"],
              "fecha_inicio_pernocte" =>$rs["fecha_inicio_pernocte"],
              "fecha_fin_pernocte" =>$rs["fecha_fin_pernocte"],
              "lugar" =>$rs["lugar"]
            );
          
        }    
        if ($totreg2>0) { 
          for($xx=0; $xx<$totreg2; $xx++){ 
            $rs = $db->fetch_array($qry2);
            $tabla2[] = array(             
              "id_trabajadores" => $rs["id_trabajadores"],
              "nombres" =>$rs["nombres"]." ".$rs["apellidos"],               
              "dni" =>$rs["dni"],                        
              "cargo" =>$rs["cargo"],
              "hora_ini" =>$rs["hora_inicio"],
              "hora_fin" =>$rs["hora_fin"]             
            );
          }                 
         
        
      }    
      $rpta = array("tabla1"=>$tabla1,"tabla2"=>$tabla2);
      echo json_encode($rpta);
 
      break;    
      case "01_get_operador_field":        
        $tabla = array();

        $qry = $db->query("select * from tb_operador where DNI='".$data->value."'");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla[] = array(
              "id" => $rs["id"],
              "nombres" =>$rs["nombres"],
              "apellidos" => $rs["apellidos"],
              "direccion" => $rs["direccion"],
              "area"=> $rs["area"],
              "dni"=> $rs["DNI"],             
              "celular"=> $rs["celular"],
            );
          }
        }
    
    //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
 
      break;      
      case "01_select_tipo_registro":
        $tabla = array();
        $qry = $db->query("select * from tb_tipo_registro");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla[] = array(
              "value" => $rs["id"],
              "text" =>$rs["descripcion"],                      
            );
          }
        }
    
    //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;
      case "01_select_asistencia_form":
        $tabla = array();
        $qry = $db->query("select * from tb_capacitaciones");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla[] = array(
              "value" => $rs["id"],
              "text" =>$rs["tema"],                      
              "hora_ini" =>$rs["hora_ini"],       
              "hora_fin" =>$rs["hora_fin"],       
              "total_horas" =>$rs["total_horas"]
            );
          }
        }
    
    //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;
      case "01_select_load_placa_camioneta":
        $tabla = array();
        $qry = $db->query("select * from tb_vehiculo");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla[] = array(
              "value" => $rs["id"],
              "text" =>$rs["placa"],                      
            );
          }
        }
    
    //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;
      case "01_get_capacitacion":
        $tabla1 = array();
        $tabla2 = array();
        $tabla3 = array();
        $tabla4 = array();
        $qry1 = $db->query("select * from tb_capacitaciones where id='".$data->value."'");
        $qry2 = $db->query("select * from tb_acuerdos_compromisos where id_capacitacion='".$data->value."'");
        $qry3 = $db->query("select * from tb_observacion where id_capacitacion='".$data->value."'");
        $qry4 = $db->query("SELECT * FROM `tb_asistentes_capacitaciones` as AC inner JOIN `tb_asistentes` as A on AC.id_asistente=A.id where AC.id_capacitacion='".$data->value."'");

        $totreg1 = $db->num_rows($qry1);
        $totreg2 = $db->num_rows($qry2);
        $totreg3 = $db->num_rows($qry3);
        $totreg4 = $db->num_rows($qry4);

        if ($totreg1>0) {          
            $rs = $db->fetch_array($qry1);
            $tabla1 = array(
              "id" => $rs["id"],
              "id_tipo_registro" =>$rs["id_tipo_registro"],                      
              "id_area" =>$rs["id_area"], 
              "tema" =>$rs["tema"], 
              "fecha" =>$rs["fecha"], 
              "hora_ini" =>$rs["hora_ini"], 
              "hora_fin" =>$rs["hora_fin"], 
              "total_horas" =>$rs["total_horas"], 
              "objetivos" =>$rs["objetivos"], 
              "materiales_usados" =>$rs["materiales_usados"], 
              "lugar_capacitacion" =>$rs["lugar_capacitacion"], 
              "expositor" =>$rs["expositor"],
              "expositor_empresa" =>$rs["expositor_empresa"]                      
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
        if ($totreg3>0) {          
          for($xx=0; $xx<$totreg3; $xx++){
            $rs = $db->fetch_array($qry3);
            $tabla3[] = array(
              "id" => $rs["id"],
              "descripcion" =>$rs["descripcion"]  
            );
          }
        }
        if ($totreg4>0) {          
          for($xx=0; $xx<$totreg4; $xx++){
            $rs = $db->fetch_array($qry4);
            $tabla4[] = array(
              "id" => $rs["id"],              
              "dni" =>$rs["id_asistente"],
              "nombres" =>$rs["nombres"]." ".$rs["apellidos"],
              "area" =>$rs["area"],
              "cargo" =>$rs["cargo"],
              "firma" =>$rs["firma"],
            );
          }
        }
    //respuesta OT
      $rpta = array("main"=>$tabla1,"acuerdos"=>$tabla2,"observaciones"=>$tabla3,"asistentes"=>$tabla4);
      echo json_encode($rpta);
      break;
      case "01_select_operadores":
        $tabla = array();
        $qry = $db->query("select * from tb_operador");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla[] = array(
              "id" => $rs["id"],
              "text" =>$rs["DNI"],                      
            );
          }
        }
    
    //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;
      case "01_get_asistancesPDF":
        $tabla = array();
        $asistance_="";
        foreach ($data->asistance as $value) {
          $asistance_.= "'".$value."',";
        };
  
        $asistance_=substr($asistance_, 0, -1); 

        $qry = $db->query("SELECT * FROM tb_asistentes WHERE id IN (".$asistance_.")");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla[] = array(
              "id" => $rs["id"],
              "dni" =>$rs["dni"],                      
              "nombres" =>$rs["nombres"]." ".$rs["apellidos"],
              "area" =>$rs["area"],
              "cargo" =>$rs["cargo"],
              "firma" =>$rs["firma"]
            );
          }
        }
    
    //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;
      case "01_get_capacitacion_all":
        $tabla1 = array();    
        $tabla2 = array();  
        $tabla3 = array();  
        $tabla4 = array();  

        $qry1 = $db->query("SELECT * FROM tb_capacitaciones AS C INNER JOIN tb_expositor as E ON C.id_expositor=E.id WHERE C.id='".$data->id."'");
        $qry2 = $db->query("SELECT * FROM `tb_capacitaciones` as C INNER JOIN `tb_observacion` as O ON C.id=O.id_capacitacion WHERE C.id='".$data->id."'");
        $qry3 = $db->query("SELECT * FROM `tb_capacitaciones` as C INNER JOIN `tb_acuerdos_compromisos` as O ON C.id=O.id_capacitacion WHERE C.id='".$data->id."'");
        $qry4 = $db->query("SELECT * FROM `tb_asistentes_capacitaciones` as AC INNER JOIN `tb_asistentes` as A ON AC.id_asistente=A.id WHERE AC.id_capacitacion='".$data->id."'");

        $totreg1 = $db->num_rows($qry1);
        $totreg2 = $db->num_rows($qry2);
        $totreg3 = $db->num_rows($qry3);
        $totreg4 = $db->num_rows($qry4);

        if ($totreg1>0) {          
            $rs = $db->fetch_array($qry1);
            $tabla1 = array(
              "id" => $rs["id"],
              "tipo_registro" =>$rs["id_tipo_registro"],                      
              "area" =>$rs["id_area"],
              "tema" =>$rs["tema"],
              "expositor" =>$rs["nombre"]." ".$rs["apellido"],
              "empresa" =>$rs["empresa"],
              "fecha" =>$rs["fecha"],
              "hora_ini" =>$rs["hora_ini"],
              "hora_fin" =>$rs["hora_fin"],
              "total_horas" =>$rs["total_horas"],
              "dni" =>$rs["dni"],
              "objetivos" =>$rs["objetivos"],
              "materiales" =>$rs["materiales_usados"],
              "id_expositor" =>$rs["id_expositor"],
              "lugar" =>$rs["lugar_capacitacion"]              
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
        if ($totreg3>0) {
          for($xx=0; $xx<$totreg3; $xx++){
            $rs = $db->fetch_array($qry3);
            $tabla3[] = array(
              "id" => $rs["id"],
              "descripcion" =>$rs["descripcion"]      
            );
          }
        }
        if ($totreg4>0) {
          for($xx=0; $xx<$totreg4; $xx++){
            $rs = $db->fetch_array($qry4);
            $tabla4[] = array(
              "id" => $rs["id"],
              "dni" =>$rs["dni"],                      
              "nombres" =>$rs["nombres"]." ".$rs["apellidos"],
              "area" =>$rs["area"],
              "cargo" =>$rs["cargo"],
              "firma" =>$rs["firma"]
            );
          }
        }
    //respuesta OT
      $rpta = array("tabla1"=>$tabla1,"tabla2"=>$tabla2,"tabla3"=>$tabla3,"tabla4"=>$tabla4);
      echo json_encode($rpta);
      break;
      case "01_grid_sintomatologia":
        $tabla = array();    
        $qry = $db->query("SELECT S.id as id,O.nombres as nombres,O.apellidos as apellidos,O.DNI AS DNI,O.area as area FROM `tb_operador` as O INNER JOIN `tb_sintomatologia` as S ON O.id=S.id_operador;");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla[] = array(
              "id" => $rs["id"],
              "nombres" =>$rs["nombres"]." ".$rs["apellidos"],                   
              "dni" =>$rs["DNI"],
              "area" =>$rs["area"]
            );
          }
        }
    
    //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;
      case "01_grid_checkList":
        $tabla1 = array();    
        $tabla2 = array();    
        $qry1 = $db->query("SELECT CK.*,C.nombres as nombres,C.apellidos as apellidos,C.dni as dni,'camioneta' AS tipo FROM `tb_checklist_camioneta` as CK INNER JOIN `tb_conductor` as C ON CK.id_conductor=C.id;");
        $totreg1 = $db->num_rows($qry1);
        if ($totreg1>0) {
          for($xx=0; $xx<$totreg1; $xx++){
            $rs = $db->fetch_array($qry1);
            $tabla1[] = array(
              "id" => $rs["id"],
              "nombres" =>$rs["nombres"]." ".$rs["apellidos"],                   
              "fecha" =>$rs["fecha"],
              "actividad" =>$rs["actividad"],
              "tipo" =>$rs["tipo"],
            );
          }
        }
        $qry2 = $db->query("SELECT CK.*,C.nombres as nombres,C.apellidos as apellidos,C.dni as dni,'cisterna' AS tipo FROM `tb_checklist_cisterna` as CK INNER JOIN `tb_conductor` as C ON CK.id_conductor=C.id;");
        $totreg2 = $db->num_rows($qry2);
        if ($totreg2>0) {
          for($xx=0; $xx<$totreg2; $xx++){
            $rs = $db->fetch_array($qry2);
            $tabla2[] = array(
              "id" => $rs["id"],
              "nombres" =>$rs["nombres"]." ".$rs["apellidos"],                   
              "fecha" =>$rs["fecha"],
              "actividad" =>$rs["actividad"],
              "tipo" =>$rs["tipo"],
            );
          }
        }
    //respuesta OT
      $rpta = array("tabla1"=>$tabla1,"tabla2"=>$tabla2);
      echo json_encode($rpta);
      break;
      case "03_pdf_checkList_camioneta":
        $tabla = array(); 
        $tabla1 = array(); 
        $qry = $db->query("SELECT CK.*,C.nombres as nombres,C.apellidos as apellidos,C.dni as dni,'camioneta' AS tipo FROM `tb_checklist_camioneta` as CK INNER JOIN `tb_conductor` as C ON CK.id_conductor=C.id where CK.id='".$data->id."'");

        $qry1 = $db->query("SELECT * FROM tb_pasajeros WHERE id_checklist_camioneta='".$data->id."'");

        $totreg = $db->num_rows($qry);
        $totreg1 = $db->num_rows($qry1);

        if ($totreg1>0) {
          for($xx=0; $xx<$totreg1; $xx++){
            $rs = $db->fetch_array($qry1);
            $tabla1[]=array(
              "id" => $rs["id"],
              "descripcion" =>$rs["descripcion"]
            );
          }
        }
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla= array(
              "id" => $rs["id"],
              "nombres" =>$rs["nombres"]." ".$rs["apellidos"],                   
              "fecha" =>$rs["fecha"],
              "actividad" =>$rs["actividad"],
              "placa" =>$rs["placa"],
              "hora" =>$rs["hora"],
              "dni" =>$rs["dni"],
              "km_ini" =>$rs["km_ini"],
              "km_fin" =>$rs["km_fin"],
              "observaciones" =>$rs["observaciones"],         
              "J_1" =>$rs["J_1"],
              "J_2" =>$rs["J_2"],
              "J_3" =>$rs["J_3"],
              "J_4" =>$rs["J_4"],
              "J_5" =>$rs["J_5"],

              "L_1" =>$rs["L_1"],
              "L_2" =>$rs["L_2"],
              "L_3" =>$rs["L_3"],
              "L_4" =>$rs["L_4"],
              "L_5" =>$rs["L_5"],
              "L_6" =>$rs["L_6"],
              "L_7" =>$rs["L_7"],
              "L_8" =>$rs["L_8"],
              "L_9" =>$rs["L_9"],

              "D_1" =>$rs["D_1"],
              "D_2" =>$rs["D_2"],
              "D_3" =>$rs["D_3"],
              "D_4" =>$rs["D_4"],
              "D_5" =>$rs["D_5"],
              "D_6" =>$rs["D_6"],
              "D_7" =>$rs["D_7"],
              "D_8" =>$rs["D_8"],

              "G_1" =>$rs["G_1"],
              "G_2" =>$rs["G_2"],
              "G_3" =>$rs["G_3"],
              "G_4" =>$rs["G_4"],
              "G_5" =>$rs["G_5"],
              "G_6" =>$rs["G_6"],
              "G_7" =>$rs["G_7"],
              "G_8" =>$rs["G_8"],
              "G_9" =>$rs["G_9"],
              "G_10" =>$rs["G_10"],
              "G_11" =>$rs["G_11"],
              "G_12" =>$rs["G_12"],

              "N_1" =>$rs["N_1"],
              "N_2" =>$rs["N_2"],
              "N_3" =>$rs["N_3"],
              "N_4" =>$rs["N_4"],

              "M_1" =>$rs["M_1"],
              "M_2" =>$rs["M_2"],
              "M_3" =>$rs["M_3"],
              "M_4" =>$rs["M_4"],
              "M_5" =>$rs["M_5"],
              "M_6" =>$rs["M_6"],
              "M_7" =>$rs["M_7"],
              "M_8" =>$rs["M_8"],
              "M_9" =>$rs["M_9"],

              "S_1" =>$rs["S_1"],
              "S_2" =>$rs["S_2"],
              "S_3" =>$rs["S_3"],
              "S_4" =>$rs["S_4"],
              "S_5" =>$rs["S_5"],
              "S_6" =>$rs["S_6"],
              "S_7" =>$rs["S_7"],
              "S_8" =>$rs["S_8"],
              "S_9" =>$rs["S_9"],
              "S_10" =>$rs["S_10"],
              "S_11" =>$rs["S_11"],
              "S_12" =>$rs["S_12"],
              "S_13" =>$rs["S_13"],
              "S_14" =>$rs["S_14"],
              "S_15" =>$rs["S_15"],
              "S_16" =>$rs["S_16"],
              "S_17" =>$rs["S_17"]              
            );
          }
        }
    
    //respuesta OT
      $rpta = array("tabla"=>$tabla,"pasajeros"=>$tabla1);
      echo json_encode($rpta);
      break;
      case "03_pdf_checkList_cisterna":
        $tabla = array();       
        $qry = $db->query("SELECT CK.*,C.nombres as nombres,C.apellidos as apellidos,C.dni as dni,'camioneta' AS tipo FROM `tb_checklist_cisterna` as CK INNER JOIN `tb_conductor` as C ON CK.id_conductor=C.id where CK.id='".$data->id."'");

  
        $totreg = $db->num_rows($qry);       
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla= array(
              "id" => $rs["id"],
              "nombres" =>$rs["nombres"]." ".$rs["apellidos"],  
              "dni" =>$rs["dni"],

              "lc" =>$rs["lc"],  
              "capacidad" =>$rs["capacidad"],          
              "fecha" =>$rs["fecha"],
             
              "actividad" =>$rs["actividad"],
              "placa" =>$rs["placa"],
              "hora_cisterna" =>$rs["hora_cisterna"],

              "km_tracto" =>$rs["km_tracto"],
              "km_cisterna" =>$rs["km_cisterna"],
              "km_inicial" =>$rs["km_inicial"],
              "hora_ini" =>$rs["hora_ini"],
              "km_inicial_2" =>$rs["km_inicial_2"],
              "hora_ini_2" =>$rs["hora_ini_2"],

              "observacion" =>$rs["observacion"],  

              "J_1" =>$rs["J_1"],
              "J_2" =>$rs["J_2"],
              "J_3" =>$rs["J_3"],
              "J_4" =>$rs["J_4"],
              "J_5" =>$rs["J_5"],

              "L_1" =>$rs["L_1"],
              "L_2" =>$rs["L_2"],
              "L_3" =>$rs["L_3"],
              "L_4" =>$rs["L_4"],
              "L_5" =>$rs["L_5"],
              "L_6" =>$rs["L_6"],
              "L_7" =>$rs["L_7"],
              "L_8" =>$rs["L_8"],
              "L_9" =>$rs["L_9"],
              "L_10" =>$rs["L_10"],
              "L_11" =>$rs["L_11"],
              "L_12" =>$rs["L_12"],
              "L_13" =>$rs["L_13"],
              "L_14" =>$rs["L_14"],

              "D_1" =>$rs["D_1"],
              "D_2" =>$rs["D_2"],
              "D_3" =>$rs["D_3"],
              "D_4" =>$rs["D_4"],
              "D_5" =>$rs["D_5"],
              "D_6" =>$rs["D_6"],
              "D_7" =>$rs["D_7"],
              "D_8" =>$rs["D_8"],
              "D_9" =>$rs["D_9"],
              "D_10" =>$rs["D_10"],
              "D_11" =>$rs["D_11"],
              "D_12" =>$rs["D_12"],
              "D_13" =>$rs["D_13"],
              "D_14" =>$rs["D_14"],
              "D_15" =>$rs["D_15"],
              "D_16" =>$rs["D_16"],
              "D_17" =>$rs["D_17"],
              "D_18" =>$rs["D_18"],

              "G_1" =>$rs["G_1"],
              "G_2" =>$rs["G_2"],
              "G_3" =>$rs["G_3"],
              "G_4" =>$rs["G_4"],
              "G_5" =>$rs["G_5"],
              "G_6" =>$rs["G_6"],
              "G_7" =>$rs["G_7"],
              "G_8" =>$rs["G_8"],
              "G_9" =>$rs["G_9"],
              "G_10" =>$rs["G_10"],
              "G_11" =>$rs["G_11"],
              "G_12" =>$rs["G_12"],
              "G_13" =>$rs["G_13"],
              "G_14" =>$rs["G_14"],
              "G_15" =>$rs["G_15"],
              "G_16" =>$rs["G_16"],
              "G_17" =>$rs["G_17"],

              "N_1" =>$rs["N_1"],
              "N_2" =>$rs["N_2"],
              "N_3" =>$rs["N_3"],
              "N_4" =>$rs["N_4"],
              "N_5" =>$rs["N_5"],

              "M_1" =>$rs["M_1"],
              "M_2" =>$rs["M_2"],
              "M_3" =>$rs["M_3"],
              "M_4" =>$rs["M_4"],
              "M_5" =>$rs["M_5"],
              "M_6" =>$rs["M_6"],
              "M_7" =>$rs["M_7"],
              "M_8" =>$rs["M_8"],
              "M_9" =>$rs["M_9"],

              "S_1" =>$rs["S_1"],
              "S_2" =>$rs["S_2"],
              "S_3" =>$rs["S_3"],
              "S_4" =>$rs["S_4"],
              "S_5" =>$rs["S_5"],
              "S_6" =>$rs["S_6"],
              "S_7" =>$rs["S_7"],
              "S_8" =>$rs["S_8"],
              "S_9" =>$rs["S_9"],          
              "S_10" =>$rs["S_10"],
              "S_11" =>$rs["S_11"],
              "S_12" =>$rs["S_12"],
              "S_13" =>$rs["S_13"],
              "S_14" =>$rs["S_14"],
              "S_15" =>$rs["S_15"],
              "S_16" =>$rs["S_16"],
              "S_17" =>$rs["S_17"],
              "S_18" =>$rs["S_18"],
              "S_19" =>$rs["S_19"],
              "S_20" =>$rs["S_20"],
              "S_21" =>$rs["S_21"],
              "S_22" =>$rs["S_22"],
              "S_23" =>$rs["S_23"],
              "S_24" =>$rs["S_24"],
              "S_25" =>$rs["S_25"],
              "S_26" =>$rs["S_26"],
              "S_27" =>$rs["S_27"],                 
              
              "R_1" =>$rs["R_1"],
              "R_2" =>$rs["R_2"],
              "R_3" =>$rs["R_3"],
              "R_4" =>$rs["R_4"],
              "R_5" =>$rs["R_5"],
              "R_6" =>$rs["R_6"],
              "R_7" =>$rs["R_7"],
              "R_8" =>$rs["R_8"],
              "R_9" =>$rs["R_9"]
            );
          }
        }
    
    //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;
      case "03_pdf_sintomatologia":
        $tabla = array();    
        $qry = $db->query("SELECT S.*,O.id as id_ope,O.nombres as nombres,O.direccion as direccion,O.apellidos as apellidos,O.DNI AS DNI,O.area as area,O.celular as celular FROM `tb_operador` as O INNER JOIN `tb_sintomatologia` as S ON O.id=S.id_operador WHERE S.id='".$data->id."'");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {     
            $rs = $db->fetch_array($qry);
            $tabla = array(
              "id" => $rs["id"],
              "nombres" =>$rs["nombres"]." ".$rs["apellidos"],                   
              "dni" =>$rs["DNI"],
              "area" =>$rs["area"],
              "celular" =>$rs["celular"],
              "direccion" =>$rs["direccion"],
              "P_1" =>$rs["P_1"],
              "P_2" =>$rs["P_2"],
              "P_3" =>$rs["P_3"],
              "P_4" =>$rs["P_4"],
              "P_5" =>$rs["P_5"],
              "P_6" =>$rs["P_6"],
              "P_7" =>$rs["P_7"]
            );
       
        }
    
    //respuesta OT
      $rpta = array("table"=>$tabla);
      echo json_encode($rpta);
      break;
      
      case "01_select_area":
        $tabla = array();
        $qry = $db->query("select * from tb_area_capacitacion");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla[] = array(
              "value" => $rs["id"],
              "text" =>$rs["descripcion"],                      
            );
          }
        }
    
    //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;
      case "01_insert_sintomatologia":
        $error= 0;
        $sql = "INSERT INTO tb_sintomatologia 
        (id_operador, P_1, P_2,P_3,P_4,P_5,P_6,P_7) VALUES (
          '".$data->id."',  
          '".boolval($data->data[0])."',              
          '".boolval($data->data[1])."',  
          '".boolval($data->data[2])."',  
          '".boolval($data->data[3])."',  
          '".boolval($data->data[4])."',  
          '".boolval($data->data[5])."',  
          '".boolval($data->data[6])."'
          )";
        $qry = $db->query($sql);

        $rpta = array("error"=>$error);
        echo json_encode($rpta);        
        break;    
        case "02_insert_pernocte_workers":
          $error= 0;
          $sql = "INSERT INTO tb_pernocte_trabajador 
          (id_pernocte, id_trabajador) VALUES (
            '".$data->second."',        
            '".$data->value."'
            )";
          $qry = $db->query($sql);
  
          $rpta = array("error"=>$error);
          echo json_encode($rpta);        
          break;
          case "01_insert_horario_pernoecte":
            $error= 0;
            $sql = "INSERT INTO tb_horario_pernoecte 
            (id_trabajador, hora_inicio,hora_fin,id_pernocte) VALUES (
              '".$data->trabajador."',        
              '".$data->inicio."',
              '".$data->final."',
              '".$data->pernocte."'
              )";
            $qry = $db->query($sql);
    
            $rpta = array("error"=>$error);
            echo json_encode($rpta);        
            break;
        case "01_insert_pernocte":
          $error= 0;
          $sql = "INSERT INTO tb_pernocte 
          (dni_supervisor, fecha_inicio_ruta, proyecto,fecha_inicio_pernocte,fecha_fin_pernocte,lugar) VALUES (             
            '".$data->data->dni_supervisor."',              
            '".$data->data->fecha_inicio_ruta."',  
            '".$data->data->proyecto."',  
            '".$data->data->fecha_inicio_pernocte."',  
            '".$data->data->fecha_fin_pernocte."',  
            '".$data->data->lugar."'            
            )";
          $qry = $db->query($sql);  
          $rpta = array("error"=>$error);
          echo json_encode($rpta);
          break;    
          case "01_insert_control_somnolencia":
            $check_1="";
            $check_2="";
            $obs_1="";
            $obs_2="";
            foreach ($data->data->S_check_1 as $value) {
              $check_1.= "'".$value."',";
            };
            foreach ($data->data->S_check_2 as $value) {
              $check_2.= "'".$value."',";
            };
            foreach ($data->data->S_obs_1 as $value) {
              $obs_1.= "'".$value."',";
            };
            foreach ($data->data->S_obs_2 as $value) {
              $obs_2.= "'".$value."',";
            };
            $obs_2=substr($obs_2, 0, -1); 

            $sql1 = "INSERT INTO tb_fatiga_somnolencia 
            (id_evaluador,
            id_operador,
            operacion, 
            fecha,
            horas_duerme,
            horas_transcurridas,
            conclusion,
            S_1,            
            S_2,            
            S_3,            
            S_4,            
            S_5,            
            S_6,            
            S_7,            
            S_8,            
            S_9,            
            S_10,
            R_1,
            R_2,
            R_3,
            R_4,
            R_5,
            R_6,
            R_7,
            R_8,
            R_9,
            R_10,
            S_1_Obs,
            S_2_Obs,
            S_3_Obs,
            S_4_Obs,
            S_5_Obs,
            S_6_Obs,
            S_7_Obs,
            S_8_Obs,
            S_9_Obs,
            S_10_Obs,                        
            R_1_Obs,            
            R_2_Obs,            
            R_3_Obs,            
            R_4_Obs,            
            R_5_Obs,            
            R_6_Obs,            
            R_7_Obs,            
            R_8_Obs,            
            R_9_Obs,            
            R_10_Obs) VALUES (
              '".$data->data->id_evaluador."',  
              '".$data->data->id_operador."',              
              '".$data->data->operacion."',  
              '".$data->data->fecha."',  
              '".$data->data->horas_duerme."',  
              '".$data->data->horas_transcurridas."',  
              '".$data->data->conclusion."',
              ".$check_1."              
              ".$check_2." 
              ".$obs_1." 
              ".$obs_2." 
              )";
            $qry1 = $db->query($sql1);
            echo json_encode($qry1);
          break;
          case "03_save_capacitacion":
           // try {
            $qry1;
            $qry2;
            $qry3;
            $sql1 = "INSERT INTO tb_capacitaciones 
            (id,id_tipo_registro, id_area, tema,fecha,hora_ini,hora_fin,total_horas,objetivos,materiales_usados,lugar_capacitacion,id_expositor) VALUES (
              '".$data->data->id."',  
              '".$data->data->tipo_registro."',              
              '".$data->data->area."',  
              '".$data->data->tema."',  
              '".$data->data->fecha."',  
              '".$data->data->hora_ini."',  
              '".$data->data->hora_fin."',  
              '".$data->data->hora_total."',  
              '".$data->data->objetivos."',  
              '".$data->data->materiales."',  
              '".$data->data->lugar."',  
              '".$data->data->id_expositor."'              
              )";
              $qry1 = $db->query($sql1);
          //  } catch (Exception $e) {
            //  echo json_encode($e);
           // }
          

            if($data->data->observaciones){
              $sql2 = "INSERT INTO tb_acuerdos_compromisos 
              (id_capacitacion, descripcion) VALUES ";
              $sqldata2="";
                foreach ($data->data->acuerdos as $value) {
                  $sqldata2.= "('".$data->data->id."','".$value."'),";
                 };
              $sqldata2=substr($sqldata2, 0, -1);       
              $sql2=$sql2.$sqldata2.";";
              $qry2 = $db->query($sql2);
            }
           if($data->data->acuerdos){
              $sql3 = "INSERT INTO tb_observacion
              (id_capacitacion, descripcion) VALUES";
              $sqldata3="";
              foreach ($data->data->observaciones as $value) {
                  $sqldata3.= "('".$data->data->id."','".$value."'),";
                };
              $sqldata3=substr($sqldata3, 0, -1);       
              $sql3=$sql3.$sqldata3.";";         
              $qry3 = $db->query($sql3);
           }
          

           /* $sql4 = "INSERT INTO tb_asistentes_capacitaciones
            (id_capacitacion, id_asistente) VALUES";
           $sqldata4="";
           foreach ($data->data->asistances as $value) {
               $sqldata4.= "('".$data->data->id."','".$value."'),";
             };
           $sqldata4=substr($sqldata4, 0, -1);       
           $sql4=$sql4.$sqldata4.";";                
            $qry4 = $db->query($sql4);*/
            $rpta = array("table1"=>$qry1);
            echo json_encode($rpta);
            break;     
            case "01_insert_capacitacion_asistance_":

              $sql4 = "INSERT INTO tb_asistentes_capacitaciones
              (id_capacitacion, id_asistente) VALUES (
              '".$data->data->id_capacitacion."',  
              '".$data->data->id_asistance."'                    
              )";
                               
              $qry4 = $db->query($sql4);
              echo json_encode($qry4);
              break;    
              case "03_pdf_fatiga_somnolencia":
                $tabla = array();    
                $qry = $db->query("SELECT F.*,O.nombres as nombre_ope,O.apellidos as apellido_ope,E.nombres as nombre_eva, E.apellidos as apellido_eva FROM `tb_operador` as O INNER JOIN `tb_fatiga_somnolencia`as F ON O.id=F.id_operador INNER JOIN `tb_evaluador`AS E ON E.id=F.id_evaluador WHERE F.id='".$data->id."'");
                $totreg = $db->num_rows($qry);
                if ($totreg>0) {     
                    $rs = $db->fetch_array($qry);
                    $tabla = array(
                      "id" => $rs["id"],
                      "operacion" =>$rs["operacion"],                   
                      "fecha" =>$rs["fecha"],
                      "horas_duerme" =>$rs["horas_duerme"],
                      "horas_transcurridas" =>$rs["horas_transcurridas"],
                      "evaluador" =>$rs["nombre_eva"]." ".$rs["apellido_eva"],
                      "operador" =>$rs["nombre_ope"]." ".$rs["apellido_ope"],
                      "conclusion" =>$rs["conclusion"],
                      "S_1" =>$rs["S_1"],
                      "S_2" =>$rs["S_2"],
                      "S_3" =>$rs["S_3"],
                      "S_4" =>$rs["S_4"],
                      "S_5" =>$rs["S_5"],
                      "S_6" =>$rs["S_6"],
                      "S_7" =>$rs["S_7"],
                      "S_8" =>$rs["S_8"],
                      "S_9" =>$rs["S_9"],
                      "S_10" =>$rs["S_10"],
                      "S_1_Obs" =>$rs["S_1_Obs"],
                      "S_2_Obs" =>$rs["S_2_Obs"],
                      "S_3_Obs" =>$rs["S_3_Obs"],
                      "S_4_Obs" =>$rs["S_4_Obs"],
                      "S_5_Obs" =>$rs["S_5_Obs"],
                      "S_6_Obs" =>$rs["S_6_Obs"],
                      "S_7_Obs" =>$rs["S_7_Obs"],
                      "S_8_Obs" =>$rs["S_8_Obs"],
                      "S_9_Obs" =>$rs["S_9_Obs"],
                      "S_10_Obs" =>$rs["S_10_Obs"],
                      "R_1" =>$rs["R_1"],
                      "R_2" =>$rs["R_2"],
                      "R_3" =>$rs["R_3"],
                      "R_4" =>$rs["R_4"],
                      "R_5" =>$rs["R_5"],
                      "R_6" =>$rs["R_6"],
                      "R_7" =>$rs["R_7"],
                      "R_8" =>$rs["R_8"],
                      "R_9" =>$rs["R_9"],
                      "R_10" =>$rs["R_10"],
                      "R_1_Obs" =>$rs["R_1_Obs"],
                      "R_2_Obs" =>$rs["R_2_Obs"],
                      "R_3_Obs" =>$rs["R_3_Obs"],
                      "R_4_Obs" =>$rs["R_4_Obs"],
                      "R_5_Obs" =>$rs["R_5_Obs"],
                      "R_6_Obs" =>$rs["R_6_Obs"],
                      "R_7_Obs" =>$rs["R_7_Obs"],
                      "R_8_Obs" =>$rs["R_8_Obs"],
                      "R_9_Obs" =>$rs["R_9_Obs"],
                      "R_10_Obs" =>$rs["R_10_Obs"]
                    );
               
                }
            
            //respuesta OT
              $rpta = array("table"=>$tabla);
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