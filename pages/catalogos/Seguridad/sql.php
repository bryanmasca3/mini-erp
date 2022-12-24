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
          $qry = $db->query("SELECT C.*,T.descripcion as 'Tipo',A.descripcion as 'Area' FROM `seg_capacitacion` AS C INNER JOIN `seg_tipo_reunion` as T ON C.id_tipo_registro=T.id INNER JOIN `per_area` as A ON A.id=C.id_area;");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla[] = array(
                "id" => $rs["id"],
                "tipo" =>$rs["Tipo"],
                "area" => $rs["Area"],
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
        $qry = $db->query("SELECT F.*,A.nombre AS 'evaluador_name',A.apellido AS 'evaluador_surname',ASP.nombre AS 'operador_name',ASP.apellido AS 'operador_surname' FROM `seg_fatiga_somnolencia` as F INNER JOIN `per_aspirante` as A ON F.id_evaluador=A.id INNER JOIN `per_aspirante` as ASP ON F.id_operador=ASP.id;");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla[] = array(
              "id" => $rs["id"],
              "ope_nombre" =>$rs["operador_name"]." ".$rs["operador_surname"],            
              "eva_nombre" => $rs["evaluador_name"]." ".$rs["evaluador_surname"],
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
        $qry = $db->query("SELECT * FROM seg_pernocte");
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

      $obs_1="";
      $obs_2="";
      $obs_3="";
      $obs_4="";
      $obs_5="";
      $obs_6="";

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
      /**/
      foreach ($data->data->obs_1 as $value) {
        $obs_1.= "'".$value."',";
      };
      foreach ($data->data->obs_2 as $value) {
        $obs_2.= "'".$value."',";
      };
      foreach ($data->data->obs_3 as $value) {
        $obs_3.= "'".$value."',";
      };
      foreach ($data->data->obs_4 as $value) {
        $obs_4.= "'".$value."',";
      };
      foreach ($data->data->obs_5 as $value) {
        $obs_5.= "'".$value."',";
      };
      foreach ($data->data->obs_6 as $value) {
        $obs_6.= "'".$value."',";
      };      
      /**/
      $seguridad_=substr($seguridad_, 0, -1); 

      $sql1 = "INSERT INTO seg_checklist_camioneta 
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
      L_4,
      L_5,
      L_6,      
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
      G_13,
      G_14,
      G_15,
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
      L_1_Obs,
      L_2_Obs,
      L_3_Obs,
      L_4_Obs,
      L_5_Obs,
      L_6_Obs,
      D_1_Obs,
      D_2_Obs,
      D_3_Obs,
      D_4_Obs,
      D_5_Obs,
      D_6_Obs,
      D_7_Obs,
      D_8_Obs,
      G_1_Obs,
      G_2_Obs,
      G_3_Obs,
      G_4_Obs,
      G_5_Obs,
      G_6_Obs,
      G_7_Obs,
      G_8_Obs,
      G_9_Obs,
      G_10_Obs,
      G_11_Obs,
      G_12_Obs,
      G_13_Obs,
      G_14_Obs,      
      G_15_Obs,
      N_1_Obs,
      N_2_Obs,
      N_3_Obs,
      N_4_Obs,
      M_1_Obs,
      M_2_Obs,
      M_3_Obs,
      M_4_Obs,
      M_5_Obs,
      M_6_Obs,
      M_7_Obs,
      M_8_Obs,
      M_9_Obs,
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
      S_11_Obs,
      S_12_Obs,
      S_13_Obs,
      S_14_Obs,
      S_15_Obs,
      S_16_Obs,      
      S_17_Obs,
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
        ".$obs_1." 
        ".$obs_2." 
        ".$obs_3." 
        ".$obs_4." 
        ".$obs_5." 
        ".$obs_6." 
        ".$seguridad_." 
        )";

      $qry1 = $db->query($sql1);

      $qry2="";
        if(count($data->data->pasajeros)){
          $sql2 = "INSERT INTO seg_checklist_pasajeros 
          (id_checklist_camioneta,
          descripcion) VALUES";

          $pasajeros_="";
          foreach ($data->data->pasajeros as $value) {
            $pasajeros_.=  "('".$data->data->id."','".$value."'),";
          };
    
          $pasajeros_=substr($pasajeros_, 0, -1); 
             
          $sql2=$sql2.$pasajeros_.";";
          $qry2 = $db->query($sql2);
        }
     

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

      $obs_1="";
      $obs_2="";
      $obs_3="";
      $obs_4="";
      $obs_5="";
      $obs_6="";
      $obs_7="";

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
/**/

    foreach ($data->data->obs_1 as $value) {
      $obs_1.= "'".$value."',";
    };
    foreach ($data->data->obs_2 as $value) {
      $obs_2.= "'".$value."',";
    };
    foreach ($data->data->obs_3 as $value) {
      $obs_3.= "'".$value."',";
    };
    foreach ($data->data->obs_4 as $value) {
      $obs_4.= "'".$value."',";
    };
    foreach ($data->data->obs_5 as $value) {
      $obs_5.= "'".$value."',";
    };
    foreach ($data->data->obs_6 as $value) {
      $obs_6.= "'".$value."',";
    };   
    foreach ($data->data->obs_7 as $value) {
      $obs_7.= "'".$value."',";
    };      
/**/
      $recarga_=substr($recarga_, 0, -1); 

      $sql1 = "INSERT INTO seg_checklist_cisterna 
      (id,
      id_conductor,
      capacidad,
      fecha,
      hora_cisterna, 
      placa_tracto,
      placa_cisterna,     
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
      S_28,
      S_29,
      S_30,
      S_31,
      L_1_Obs,
      L_2_Obs,
      L_3_Obs,
      L_4_Obs,
      L_5_Obs,
      L_6_Obs,
      L_7_Obs,
      L_8_Obs,
      L_9_Obs,
      L_10_Obs,
      L_11_Obs,
      L_12_Obs,
      L_13_Obs,
      L_14_Obs,
      D_1_Obs,
      D_2_Obs,
      D_3_Obs,
      D_4_Obs,
      D_5_Obs,
      D_6_Obs,
      D_7_Obs,
      D_8_Obs,
      D_9_Obs,
      D_10_Obs,
      D_11_Obs,
      D_12_Obs,
      D_13_Obs,
      D_14_Obs,
      D_15_Obs,
      D_16_Obs,
      D_17_Obs,
      D_18_Obs,
      G_1_Obs,
      G_2_Obs,
      G_3_Obs,
      G_4_Obs,
      G_5_Obs,
      G_6_Obs,
      G_7_Obs,
      G_8_Obs,
      G_9_Obs,
      G_10_Obs,
      G_11_Obs,
      G_12_Obs,
      G_13_Obs,     
      N_1_Obs,
      N_2_Obs,
      N_3_Obs,
      N_4_Obs,
      M_1_Obs,
      M_2_Obs,
      M_3_Obs,
      M_4_Obs,
      M_5_Obs,
      M_6_Obs,
      M_7_Obs,
      M_8_Obs,
      M_9_Obs,
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
      S_11_Obs,
      S_12_Obs,
      S_13_Obs,
      S_14_Obs,
      S_15_Obs,
      S_16_Obs,      
      S_17_Obs,
      S_18_Obs,
      S_19_Obs,
      S_20_Obs,
      S_21_Obs,
      S_22_Obs,
      S_23_Obs,
      S_24_Obs,
      S_25_Obs,
      S_26_Obs,
      S_27_Obs,
      S_28_Obs,
      S_29_Obs,
      S_30_Obs,
      S_31_Obs,
      R_1_Obs,
      R_2_Obs,
      R_3_Obs,
      R_4_Obs,
      R_5_Obs,
      R_6_Obs,
      R_1,
      R_2,
      R_3,
      R_4,
      R_5,
      R_6) VALUES (
        '".$data->data->id."',  
        '".$data->data->id_conductor."',                 
        '".$data->data->capacidad."',          
        '".$data->data->fecha."',  
        '".$data->data->hora_cisterna."',  
        '".$data->data->placa."',
        '".$data->data->km_tracto."',      
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
        ".$obs_1." 
        ".$obs_2." 
        ".$obs_3." 
        ".$obs_4." 
        ".$obs_5." 
        ".$obs_6." 
        ".$obs_7." 
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
        $qry = $db->query("SELECT C.id_cargo,A.* FROM `per_cargo` as C INNER JOIN `per_aspirante` as A ON C.id_personal=A.id WHERE A.dni='".$data->value."' AND C.id_cargo='1'");
        $totreg = $db->num_rows($qry);
        if ($totreg==1) {
          $rs = $db->fetch_array($qry);
          $tabla = array(
            "id" => $rs["id"],
            "nombres" =>$rs["nombre"],                      
            "apellidos" =>$rs["apellido"],             
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
        $qry = $db->query("SELECT A.* FROM `per_aspirante` AS A INNER JOIN `per_personal` AS P ON A.id=P.id_aspirante WHERE A.dni='".$data->value."'");
        $totreg = $db->num_rows($qry);
        if ($totreg==1) {
          $rs = $db->fetch_array($qry);
          $tabla = array(
            "id" => $rs["id"],
            "nombres" =>$rs["nombre"],                      
            "apellidos" =>$rs["apellido"],                        
          );  
        }else{
          $error= 1;
        }
      $rpta = array("tabla"=>$tabla,"error"=>$error);
      echo json_encode($rpta);
      break;
      case "02_search_participante_capacitacion":
        $tabla = array();
        $error= 0;
        $qry = $db->query("SELECT A.*,TC.descripcion FROM `per_aspirante` AS A INNER JOIN `per_personal` AS P ON A.id=P.id_aspirante INNER JOIN `per_tipo_cargo` AS TC ON TC.id=A.puesto WHERE A.dni='".$data->value."'");
        $totreg = $db->num_rows($qry);
        if ($totreg==1) {
          $rs = $db->fetch_array($qry);
          $tabla = array(
            "id" => $rs["id"],
            "nombres" =>$rs["nombre"],                      
            "apellidos" =>$rs["apellido"],  
            "cargo" =>$rs["descripcion"],
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
        $qry = $db->query("SELECT A.* FROM `per_aspirante` AS A INNER JOIN `per_personal` AS P ON A.id=P.id_aspirante WHERE A.dni='".$data->value."'");
        $totreg = $db->num_rows($qry);
        if ($totreg==1) {
          $rs = $db->fetch_array($qry);
          $tabla = array(
            "id" => $rs["id"],
            "nombres" =>$rs["nombre"],                      
            "apellidos" =>$rs["apellido"]                         
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
        $qry = $db->query("SELECT C.id_cargo,A.* FROM `per_cargo` as C INNER JOIN `per_aspirante` as A ON C.id_personal=A.id WHERE A.dni='".$data->value."' AND C.id_cargo='5'");
        $totreg = $db->num_rows($qry);
        if ($totreg==1) {
          $rs = $db->fetch_array($qry);
          $tabla = array(
            "id" => $rs["id"],
            "nombres" =>$rs["nombre"],                      
            "apellidos" =>$rs["apellido"]                              
          );  
        }else{
          $error= 1;
        }
      $rpta = array("tabla"=>$tabla,"error"=>$error);
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
    $rpta = $tabla;
    echo json_encode($rpta);
    break;
      case "01_gridRequerimientosPersonas":       
        $tabla = array();
        $column= array();
        $qry = $db->query("SELECT RQ.*,M.descripcion as 'descripcion_motivo',A.descripcion as 'descripcion_area',C.descripcion as 'descripcion_cargo',E.descripcion as 'descripcion_estado' FROM `per_requerimiento_personal` as RQ INNER JOIN `per_motivo` as M ON RQ.id_motivo=M.id INNER JOIN `per_area` as A ON RQ.area=A.id INNER JOIN `per_tipo_cargo` as C ON RQ.cargo=C.id
        INNER JOIN `per_estado` as E ON RQ.estado=E.id where RQ.area=4");
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
          $column=array(            
            (object) array('key' => 'id','title' => 'Nº Requerimiento'),      
            (object) array('key' => 'area','title' => 'Area'),
            (object) array('key' => 'cargo','title' => 'Cargo'),          
            (object) array('key' => 'vacantes','title' => 'Vacantes'),     
            (object) array('key' => 'cumplidos','title' => 'Asignados'),                       
            (object) array('key' => 'motivo','title' => 'Motivo'),
            (object) array('key' => 'estado','title' => 'Estado'),
          );
        }
    //respuesta OT
    $rpta = array("data"=>$tabla,"column"=>$column);
    //var_dump($tabla4);
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
  case "sql_select_get_area": 
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
$rpta = $tabla;
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
        (item,codigo_parte,n_parte,descripcion,cantidad,unidad_medida,prioridad,observacion,id_requerimiento) VALUES";
        $sqldata3="";
        foreach ($data->data->itemsRequerimiento as $value) {
            $sqldata3.= "('".$value[0]."','".$value[1]."','".$value[2]."','".$value[3]."','".$value[4]."','".$value[5]."','".$value[6]."','".$value[7]."','".$data->data->n_requerimiento."'),";
          };
        $sqldata3=substr($sqldata3, 0, -1);       
        $sql3=$sql3.$sqldata3.";";         
        $qry3 = $db->query($sql3);
      $rpta = array("table1"=>$qry1,"table3"=>$qry3);
      echo json_encode($rpta);
    break;
    
    case "sqlRequerimientosGrid":
      $tabla = array();
      $column= array();
      $qry = $db->query("SELECT RQ.*,E.descripcion AS 'descripcion_estado',P.descripcion AS 'descripcion_prioridad', A.descripcion AS 'descripcion_area',A.id AS 'id_area'FROM `requerimiento` as RQ INNER JOIN `per_estado` as E ON RQ.estado=E.id INNER JOIN `log_prioridad` as P ON RQ.prioridad=P.id INNER JOIN `per_area`as A ON RQ.area=A.id WHERE A.id=4 order by RQ.id desc;");
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
      case "02_search_Operador":
        $tabla = array();
        $error= 0;
        $qry = $db->query("SELECT C.id_cargo,A.* FROM `per_cargo` as C INNER JOIN `per_aspirante` as A ON C.id_personal=A.id WHERE A.dni='".$data->value."' AND C.id_cargo='3'");
        $totreg = $db->num_rows($qry);
        if ($totreg==1) {
          $rs = $db->fetch_array($qry);
          $tabla = array(
            "id" => $rs["id"],
            "nombres" =>$rs["nombre"],                  
            "apellidos" =>$rs["apellido"],                             
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
        $qry = $db->query("SELECT * FROM `per_aspirante` as A INNER JOIN `per_personal` as P ON A.id=P.id_aspirante WHERE A.dni='".$data->value."'");
        $totreg = $db->num_rows($qry);
        if ($totreg==1) {
          $rs = $db->fetch_array($qry);
          $tabla = array(
            "id" => $rs["id"],
            "nombres" =>$rs["nombre"],                                
            "apellidos" =>$rs["apellido"]                                 
          );  
        }else{
          $error= 1;
        }
       $rpta = array("tabla"=>$tabla,"error"=>$error);
      echo json_encode($rpta);    

      break;  
      case "01_delete_sintomatologia":
        $qry = $db->query("DELETE from  seg_sintomatologia WHERE id='".$data->value."'");
        $rpta = array("qry"=>$qry);
        echo json_encode($rpta);
      break;   
      case "01_delete_checklist_camioneta":
        $qry = $db->query("DELETE from  seg_checklist_camioneta WHERE id='".$data->value."'");
        $rpta = array("qry"=>$qry);
        echo json_encode($rpta);
      break; 
      case "01_delete_checklist_cisterna":
        $qry = $db->query("DELETE from  seg_checklist_cisterna WHERE id='".$data->value."'");
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
     
        $qry1 = $db->query("select * from seg_pernocte where id='".$data->value."'");
      
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
     
        $qry2 = $db->query("SELECT * FROM `per_aspirante` as A INNER JOIN `per_personal` as P ON A.id=P.id_aspirante 
        INNER JOIN `seg_horario_pernocte` as HP ON HP.id_trabajador=P.id
        INNER JOIN `seg_pernocte` as PN ON PN.id=HP.id_pernocte where PN.id='".+$data->value."' GROUP BY P.id");
        $totreg2 = $db->num_rows($qry2);
           
        if ($totreg2>0) {          
          for($xx=0; $xx<$totreg2; $xx++){
            $rs = $db->fetch_array($qry2);
            $tabla2[] = array(
              "id" => $rs["id"],
              "nombres" =>$rs["nombre"]." ".$rs["apellido"],               
              "dni" =>$rs["dni"],                        
              "correo" =>$rs["correo"]                      
            );
          }
        }    
      $rpta = array("tabla2"=>$tabla2);
      echo json_encode($rpta);
 
      break;    
      case "03_pdf_pernocte":        
 
        $tabla1 = array();
        $tabla2 = array();
     
        $qry1 = $db->query("SELECT * FROM `seg_pernocte` as P INNER JOIN `per_aspirante` as A ON P.id_supervisor=A.id WHERE P.id='".+$data->id."'");
        $totreg1 = $db->num_rows($qry1);

        $qry2 = $db->query("SELECT T.id as id_trabajadores,T.nombre as 'nombres',T.apellido as 'apellidos', T.telefono as 'cargo',T.dni as 'dni',H.hora_inicio as 'hora_inicio',H.hora_fin as 'hora_fin' FROM `per_personal` as TR INNER JOIN `seg_horario_pernocte` as H ON TR.id = H.id_trabajador INNER JOIN `per_aspirante` as T ON T.id = TR.id_aspirante where H.id_pernocte='".+$data->id."'");
        $totreg2 = $db->num_rows($qry2); 

        if ($totreg1>0) {                  
            $rs = $db->fetch_array($qry1);
            $tabla1 = array(
              "id" => $rs["id"],                      
              "dni_supervisor" =>$rs["nombre"]." ".$rs["apellido"],                                                    
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
        $qry = $db->query("SELECT * FROM seg_tipo_reunion");
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

        $qry1 = $db->query("SELECT * FROM seg_capacitacion AS C INNER JOIN per_aspirante as E ON C.id_expositor=E.id WHERE C.id='".$data->id."'");
        $qry2 = $db->query("SELECT * FROM `seg_capacitacion` as C INNER JOIN `seg_capacitacion_observacion` as O ON C.id=O.id_capacitacion WHERE C.id='".$data->id."'");
        $qry3 = $db->query("SELECT * FROM `seg_capacitacion` as C INNER JOIN `seg_capacitacion_acuerdos` as O ON C.id=O.id_capacitacion WHERE C.id='".$data->id."'");
        $qry4 = $db->query("SELECT A.*,TC.descripcion as 'cargo' FROM `seg_asistentes_capacitaciones` as AC INNER JOIN `per_aspirante` as A ON AC.id_asistente=A.id INNER JOIN `per_tipo_cargo` as TC ON TC.id=A.puesto WHERE AC.id_capacitacion='".$data->id."'");

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
              "nombres" =>$rs["nombre"]." ".$rs["apellido"],
              "telefono" =>$rs["telefono"],
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
        $qry = $db->query("SELECT S.id as id,O.nombre as nombres,O.apellido as apellidos,O.DNI AS DNI FROM `per_aspirante` as O INNER JOIN `seg_sintomatologia` as S ON O.id=S.id_operador;");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla[] = array(
              "id" => $rs["id"],
              "nombres" =>$rs["nombres"]." ".$rs["apellidos"],                   
              "dni" =>$rs["DNI"],            
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
        $qry1 = $db->query("SELECT CK.*,C.nombre as nombres,C.apellido as apellidos,C.dni as dni,'camioneta' AS tipo FROM `seg_checklist_camioneta` as CK INNER JOIN `per_aspirante` as C ON CK.id_conductor=C.id;");
        $totreg1 = $db->num_rows($qry1);
        if ($totreg1>0) {
          for($xx=0; $xx<$totreg1; $xx++){
            $rs = $db->fetch_array($qry1);
            $tabla1[] = array(
              "id" => $rs["id"],
              "nombres" =>$rs["nombres"]." ".$rs["apellidos"],                   
              "fecha" =>$rs["fecha"],
              "actividad" =>$rs["actividad"],
              "tipo" =>1,
            );
          }
        }
        $qry2 = $db->query("SELECT CK.*,C.nombre as nombres,C.apellido as apellidos,C.dni as dni,'camioneta' AS tipo FROM `seg_checklist_cisterna` as CK INNER JOIN `per_aspirante` as C ON CK.id_conductor=C.id;");
        $totreg2 = $db->num_rows($qry2);
        if ($totreg2>0) {
          for($xx=0; $xx<$totreg2; $xx++){
            $rs = $db->fetch_array($qry2);
            $tabla2[] = array(
              "id" => $rs["id"],
              "nombres" =>$rs["nombres"]." ".$rs["apellidos"],                   
              "fecha" =>$rs["fecha"],
              "actividad" =>$rs["actividad"],
              "tipo" =>2,
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
        $qry = $db->query("SELECT CK.*,C.nombre as nombres,C.apellido as apellidos,C.dni as dni,'camioneta' AS tipo FROM `seg_checklist_camioneta` as CK INNER JOIN `per_aspirante` as C ON CK.id_conductor=C.id where CK.id='".$data->id."'");

        $qry1 = $db->query("SELECT * FROM seg_checklist_pasajeros WHERE id_checklist_camioneta='".$data->id."'");

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
              //"L_3" =>$rs["L_3"],
              "L_4" =>$rs["L_4"],
              "L_5" =>$rs["L_5"],
              "L_6" =>$rs["L_6"],
             // "L_7" =>$rs["L_7"],
              //"L_8" =>$rs["L_8"],
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
              "G_13" =>$rs["G_13"],
              "G_14" =>$rs["G_14"],
              "G_15" =>$rs["G_15"],

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
              "S_17" =>$rs["S_17"],    

              "L_1_Obs"=>$rs["L_1_Obs"],
              "L_2_Obs"=>$rs["L_2_Obs"],
              "L_3_Obs"=>$rs["L_3_Obs"],
              "L_4_Obs"=>$rs["L_4_Obs"],
              "L_5_Obs"=>$rs["L_5_Obs"],
              "L_6_Obs"=>$rs["L_6_Obs"],
              "D_1_Obs"=>$rs["D_1_Obs"],
              "D_2_Obs"=>$rs["D_2_Obs"],
              "D_3_Obs"=>$rs["D_3_Obs"],
              "D_4_Obs"=>$rs["D_4_Obs"],
              "D_5_Obs"=>$rs["D_5_Obs"],
              "D_6_Obs"=>$rs["D_6_Obs"],
              "D_7_Obs"=>$rs["D_7_Obs"],
              "D_8_Obs"=>$rs["D_8_Obs"],
              "G_1_Obs"=>$rs["G_1_Obs"],
              "G_2_Obs"=>$rs["G_2_Obs"],
              "G_3_Obs"=>$rs["G_3_Obs"],
              "G_4_Obs"=>$rs["G_4_Obs"],
              "G_5_Obs"=>$rs["G_5_Obs"],
              "G_6_Obs"=>$rs["G_6_Obs"],
              "G_7_Obs"=>$rs["G_7_Obs"],
              "G_8_Obs"=>$rs["G_8_Obs"],
              "G_9_Obs"=>$rs["G_9_Obs"],
              "G_10_Obs"=>$rs["G_10_Obs"],
              "G_11_Obs"=>$rs["G_11_Obs"],
              "G_12_Obs"=>$rs["G_12_Obs"],
              "G_13_Obs"=>$rs["G_13_Obs"],
              "G_14_Obs"=>$rs["G_14_Obs"],
              "G_15_Obs"=>$rs["G_15_Obs"],
              "N_1_Obs"=>$rs["N_1_Obs"],
              "N_2_Obs"=>$rs["N_2_Obs"],
              "N_3_Obs"=>$rs["N_3_Obs"],
              "N_4_Obs"=>$rs["N_4_Obs"],
              "M_1_Obs"=>$rs["M_1_Obs"],
              "M_2_Obs"=>$rs["M_2_Obs"],
              "M_3_Obs"=>$rs["M_3_Obs"],
              "M_4_Obs"=>$rs["M_4_Obs"],
              "M_5_Obs"=>$rs["M_5_Obs"],
              "M_6_Obs"=>$rs["M_6_Obs"],
              "M_7_Obs"=>$rs["M_7_Obs"],
              "M_8_Obs"=>$rs["M_8_Obs"],
              "M_9_Obs"=>$rs["M_9_Obs"],
              "S_1_Obs"=>$rs["S_1_Obs"],
              "S_2_Obs"=>$rs["S_2_Obs"],
              "S_3_Obs"=>$rs["S_3_Obs"],
              "S_4_Obs"=>$rs["S_4_Obs"],
              "S_5_Obs"=>$rs["S_5_Obs"],
              "S_6_Obs"=>$rs["S_6_Obs"],
              "S_7_Obs"=>$rs["S_7_Obs"],
              "S_8_Obs"=>$rs["S_8_Obs"],
              "S_9_Obs"=>$rs["S_9_Obs"],
              "S_10_Obs"=>$rs["S_10_Obs"],
              "S_11_Obs"=>$rs["S_11_Obs"],
              "S_12_Obs"=>$rs["S_12_Obs"],
              "S_13_Obs"=>$rs["S_13_Obs"],
              "S_14_Obs"=>$rs["S_14_Obs"],
              "S_15_Obs"=>$rs["S_15_Obs"],
              "S_16_Obs"=>$rs["S_16_Obs"],
              "S_17_Obs"=>$rs["S_17_Obs"]
            );
          }
        }
    
    //respuesta OT
      $rpta = array("tabla"=>$tabla,"pasajeros"=>$tabla1);
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
      case "sql_get_last_requerimiento_personal":
        $tabla = array();
        $qry = $db->query("SELECT n FROM `per_requerimiento_personal` order by n desc limit 1;");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {              
            $rs = $db->fetch_array($qry);
            $tabla = array(
              "id" => $rs["n"]                 
            );
          
        }else{
          $tabla = array(
            "id" => 0               
          );
        }
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;
      case "03_pdf_checkList_cisterna":
        $tabla = array();       
        $qry = $db->query("SELECT CK.*,C.nombre as nombres,C.apellido as apellidos,C.dni as dni,'camioneta' AS tipo FROM `seg_checklist_cisterna` as CK INNER JOIN `per_aspirante` as C ON CK.id_conductor=C.id where CK.id='".$data->id."'");

  
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
              "placa" =>$rs["placa_tracto"],
              "hora_cisterna" =>$rs["hora_cisterna"],

              "km_tracto" =>$rs["placa_cisterna"],

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

              "L_1_Obs"=>$rs["L_1_Obs"],
              "L_2_Obs"=>$rs["L_2_Obs"],
              "L_3_Obs"=>$rs["L_3_Obs"],
              "L_4_Obs"=>$rs["L_4_Obs"],
              "L_5_Obs"=>$rs["L_5_Obs"],
              "L_6_Obs"=>$rs["L_6_Obs"],
              "L_7_Obs"=>$rs["L_7_Obs"],
              "L_8_Obs"=>$rs["L_8_Obs"],
              "L_9_Obs"=>$rs["L_9_Obs"],
              "L_10_Obs"=>$rs["L_10_Obs"],
              "L_11_Obs"=>$rs["L_11_Obs"],
              "L_12_Obs"=>$rs["L_12_Obs"],
              "L_13_Obs"=>$rs["L_13_Obs"],
              "L_14_Obs"=>$rs["L_14_Obs"],

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


              "D_1_Obs"=>$rs["D_1_Obs"],
              "D_2_Obs"=>$rs["D_2_Obs"],
              "D_3_Obs"=>$rs["D_3_Obs"],
              "D_4_Obs"=>$rs["D_4_Obs"],
              "D_5_Obs"=>$rs["D_5_Obs"],
              "D_6_Obs"=>$rs["D_6_Obs"],
              "D_7_Obs"=>$rs["D_7_Obs"],
              "D_8_Obs"=>$rs["D_8_Obs"],
              "D_9_Obs"=>$rs["D_9_Obs"],
              "D_10_Obs"=>$rs["D_10_Obs"],
              "D_11_Obs"=>$rs["D_11_Obs"],
              "D_12_Obs"=>$rs["D_12_Obs"],
              "D_13_Obs"=>$rs["D_13_Obs"],
              "D_14_Obs"=>$rs["D_14_Obs"],
              "D_15_Obs"=>$rs["D_15_Obs"],
              "D_16_Obs"=>$rs["D_16_Obs"],
              "D_17_Obs"=>$rs["D_17_Obs"],
              "D_18_Obs"=>$rs["D_18_Obs"],
          

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
             
              "G_1_Obs"=>$rs["G_1_Obs"],
              "G_2_Obs"=>$rs["G_2_Obs"],
              "G_3_Obs"=>$rs["G_3_Obs"],
              "G_4_Obs"=>$rs["G_4_Obs"],
              "G_5_Obs"=>$rs["G_5_Obs"],
              "G_6_Obs"=>$rs["G_6_Obs"],
              "G_7_Obs"=>$rs["G_7_Obs"],
              "G_8_Obs"=>$rs["G_8_Obs"],
              "G_9_Obs"=>$rs["G_9_Obs"],
              "G_10_Obs"=>$rs["G_10_Obs"],
              "G_11_Obs"=>$rs["G_11_Obs"],
              "G_12_Obs"=>$rs["G_12_Obs"],
              "G_13_Obs"=>$rs["G_13_Obs"],

              "N_1" =>$rs["N_1"],
              "N_2" =>$rs["N_2"],
              "N_3" =>$rs["N_3"],
              "N_4" =>$rs["N_4"],

              "N_1_Obs"=>$rs["N_1_Obs"],
              "N_2_Obs"=>$rs["N_2_Obs"],
              "N_3_Obs"=>$rs["N_3_Obs"],
              "N_4_Obs"=>$rs["N_4_Obs"],

              "M_1" =>$rs["M_1"],
              "M_2" =>$rs["M_2"],
              "M_3" =>$rs["M_3"],
              "M_4" =>$rs["M_4"],
              "M_5" =>$rs["M_5"],
              "M_6" =>$rs["M_6"],
              "M_7" =>$rs["M_7"],
              "M_8" =>$rs["M_8"],
              "M_9" =>$rs["M_9"],

              "M_1_Obs"=>$rs["M_1_Obs"],
              "M_2_Obs"=>$rs["M_2_Obs"],
              "M_3_Obs"=>$rs["M_3_Obs"],
              "M_4_Obs"=>$rs["M_4_Obs"],
              "M_5_Obs"=>$rs["M_5_Obs"],
              "M_6_Obs"=>$rs["M_6_Obs"],
              "M_7_Obs"=>$rs["M_7_Obs"],
              "M_8_Obs"=>$rs["M_8_Obs"],
              "M_9_Obs"=>$rs["M_9_Obs"],

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
              "S_28" =>$rs["S_28"],    
              "S_29" =>$rs["S_29"],    
              "S_30" =>$rs["S_30"],    
              "S_31" =>$rs["S_31"],                   
              
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
              "S_11_Obs" =>$rs["S_11_Obs"],
              "S_12_Obs" =>$rs["S_12_Obs"],
              "S_13_Obs" =>$rs["S_13_Obs"],
              "S_14_Obs" =>$rs["S_14_Obs"],
              "S_15_Obs" =>$rs["S_15_Obs"],
              "S_16_Obs" =>$rs["S_16_Obs"],
              "S_17_Obs" =>$rs["S_17_Obs"],
              "S_18_Obs" =>$rs["S_18_Obs"],
              "S_19_Obs" =>$rs["S_19_Obs"],
              "S_20_Obs" =>$rs["S_20_Obs"],
              "S_21_Obs" =>$rs["S_21_Obs"],
              "S_22_Obs" =>$rs["S_22_Obs"],
              "S_23_Obs" =>$rs["S_23_Obs"],
              "S_24_Obs" =>$rs["S_24_Obs"],
              "S_25_Obs" =>$rs["S_25_Obs"],
              "S_26_Obs" =>$rs["S_26_Obs"],
              "S_27_Obs" =>$rs["S_27_Obs"],  
              "S_28_Obs" =>$rs["S_28_Obs"],    
              "S_29_Obs" =>$rs["S_29_Obs"],    
              "S_30_Obs" =>$rs["S_30_Obs"],    
              "S_31_Obs" =>$rs["S_31_Obs"], 

              "R_1" =>$rs["R_1"],
              "R_2" =>$rs["R_2"],
              "R_3" =>$rs["R_3"],
              "R_4" =>$rs["R_4"],
              "R_5" =>$rs["R_5"],
              "R_6" =>$rs["R_6"],
              
              "R_1_Obs" =>$rs["R_1_Obs"],
              "R_2_Obs" =>$rs["R_2_Obs"],
              "R_3_Obs" =>$rs["R_3_Obs"],
              "R_4_Obs" =>$rs["R_4_Obs"],
              "R_5_Obs" =>$rs["R_5_Obs"],
              "R_6_Obs" =>$rs["R_6_Obs"]   
            );
          }
        }
    
    //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;
      case "03_pdf_sintomatologia":
        $tabla = array();    
        $qry = $db->query("SELECT S.*,O.id as id_ope,O.nombre as nombre,P.domicilio as direccion,O.apellido as apellidos,O.DNI AS DNI,TC.descripcion as area,O.telefono as celular FROM `per_aspirante` as O INNER JOIN `seg_sintomatologia` as S ON O.id=S.id_operador INNER JOIN `per_personal` as P ON O.id=P.id_aspirante INNER JOIN `per_cargo` as C ON O.id=C.id_personal INNER JOIN `per_tipo_cargo` as TC ON C.id_cargo=TC.id WHERE S.id='".$data->id."' GROUP by S.id");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {     
            $rs = $db->fetch_array($qry);
            $tabla = array(
              "id" => $rs["id"],
              "nombres" =>$rs["nombre"]." ".$rs["apellidos"],                   
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
        $qry = $db->query("select * from per_area");
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
        $sql = "INSERT INTO seg_sintomatologia 
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
            $sql = "INSERT INTO seg_horario_pernocte 
            (id_trabajador,hora_inicio,hora_fin,id_pernocte) VALUES (
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
          $sql = "INSERT INTO seg_pernocte 
          (id_supervisor, fecha_inicio_ruta,proyecto,fecha_inicio_pernocte,fecha_fin_pernocte,lugar) VALUES (             
            '".$data->data->id_supervisor."',              
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

            $sql1 = "INSERT INTO seg_fatiga_somnolencia 
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
            $qry4;
            $sql1 = "INSERT INTO seg_capacitacion 
            (id,id_tipo_registro, id_area, tema,empresa,fecha,hora_ini,hora_fin,total_horas,objetivos,materiales_usados,lugar_capacitacion,id_expositor) VALUES (
              '".$data->data->id."',  
              '".$data->data->tipo_registro."',              
              '".$data->data->area."',  
              '".$data->data->tema."',  
              '".$data->data->empresa."',  
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
          

            if(count($data->data->acuerdos)){
              $sql2 = "INSERT INTO seg_capacitacion_acuerdos 
              (id_capacitacion, descripcion) VALUES ";
              $sqldata2="";
                foreach ($data->data->acuerdos as $value) {
                  $sqldata2.= "('".$data->data->id."','".$value."'),";
                 };
              $sqldata2=substr($sqldata2, 0, -1);       
              $sql2=$sql2.$sqldata2.";";
              $qry2 = $db->query($sql2);
            }
           if(count($data->data->observaciones)){
              $sql3 = "INSERT INTO seg_capacitacion_observacion
              (id_capacitacion, descripcion) VALUES";
              $sqldata3="";
              foreach ($data->data->observaciones as $value) {
                  $sqldata3.= "('".$data->data->id."','".$value."'),";
                };
              $sqldata3=substr($sqldata3, 0, -1);       
              $sql3=$sql3.$sqldata3.";";         
              $qry3 = $db->query($sql3);
           }
          
           if(count($data->data->asistances)){
            $sql4 = "INSERT INTO seg_asistentes_capacitaciones
            (id_capacitacion, id_asistente) VALUES";
           $sqldata4="";
           foreach ($data->data->asistances as $value) {
               $sqldata4.= "('".$data->data->id."','".$value."'),";
             };
           $sqldata4=substr($sqldata4, 0, -1);       
           $sql4=$sql4.$sqldata4.";";                
            $qry4 = $db->query($sql4);
           }
           


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
                $qry = $db->query("SELECT F.*,O.nombre as nombre_ope,O.apellido as apellido_ope,E.nombre as nombre_eva, E.apellido as apellido_eva FROM `per_aspirante` as O INNER JOIN `seg_fatiga_somnolencia` as F ON O.id=F.id_operador INNER JOIN `per_aspirante` AS E ON E.id=F.id_evaluador WHERE F.id='".$data->id."'");
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