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
  case "01_gridFichaPersonal": 
    $tabla = array();
    $qry = $db->query("SELECT * FROM `tb_files`as F INNER JOIN `tb_personal`as P ON F.id_personal=P.id;");
    $totreg = $db->num_rows($qry);
    if ($totreg>0) {
      for($xx=0; $xx<$totreg; $xx++){
        $rs = $db->fetch_array($qry);
        $tabla[] = array(
          "id" => $rs["id_personal"],
          "nombrescandidato" =>$rs["nombres"]." ".$rs["apellidos"] ,
          "dni" => $rs["dni"],    
          "dni_fecha_vigencia" => $rs["dni_fecha_vigencia"],    
          "licencia_fecha_vigencia" =>$rs["licencia_fecha_vigencia"],
          "sctr_fecha_vigencia" =>$rs["sctr_fecha_vigencia"],
          "seguro_fecha_vigencia" =>$rs["seguro_fecha_vigencia"],
          "policial_fecha_vigencia" =>$rs["policial_fecha_vigencia"],
          "judicial_fecha_vigencia" =>$rs["judicial_fecha_vigencia"],
          "penal_fecha_vigencia" =>$rs["penal_fecha_vigencia"],
          "trabajo_fecha_vigencia" =>$rs["trabajo_fecha_vigencia"],          
          "medico_fecha_vigencia" =>$rs["medico_fecha_vigencia"],
          "lice_fecha_vigencia" =>$rs["lice_fecha_vigencia"]
                     
        );
      }
    }

//respuesta OT
$rpta = array("tabla"=>$tabla);
echo json_encode($rpta);
break;
case "01_gridProgramacionCapacitacion": 
  $tabla = array();
  $qry = $db->query("SELECT * FROM tb_programa_capacitacion;");
  $totreg = $db->num_rows($qry);
  if ($totreg>0) {
    for($xx=0; $xx<$totreg; $xx++){
      $rs = $db->fetch_array($qry);
      $tabla[] = array(
        "id" => $rs["id"],                
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
        "induccion_fecha_vigencia" =>$rs["induccion_fecha_vigencia"]
                   
      );
    }
  }

//respuesta OT
$rpta = array("tabla"=>$tabla);
echo json_encode($rpta);
break;
case "01_get_pdf_file":        
  $tabla1 = array();

  $qry1 = $db->query("select * from tb_files where id_personal='".$data->value."'");

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

  $qry1 = $db->query("select * from tb_programa_capacitacion where id='".$data->value."'");

  $totreg1 = $db->num_rows($qry1);
  $dataValue=get_value_2($data->type);
  if ($totreg1>0) {          
      $rs = $db->fetch_array($qry1);
      $tabla1 = array(
        "id" => $rs["id"],  
        "nombre"=> $rs[$dataValue["val"]],
        "type"=> $dataValue["type"]
               
      );
    
  }   
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
        $qry1 = $db->query("SELECT * FROM tb_personal WHERE id='".$data->value."'");
        $totreg1 = $db->num_rows($qry1);
        if ($totreg1>0) {          
          $rs = $db->fetch_array($qry1);
          $tabla1 = array(
            "nombres" => $rs["nombres"]." ".$rs["apellidos"],  
            "fecha_nacimiento" => $rs["fecha_nacimiento"],  
            "lugar_nacimiento" => $rs["lugar_nacimiento"],  
            "distrito" => $rs["distrito"],  
            "provincia" => $rs["provincia"],  
            "departamento" => $rs["departamento"],  
            "dni" => $rs["dni"],  
            "telefono" => $rs["telefono"],  
            "celular" => $rs["celular"],  
            "domicilio" => $rs["domicilio"],  
            "urbanizacion" => $rs["urbanizacion"],  
            "distrito_domicilio" => $rs["distrito_domicilio"],  
            "estado_civil" => $rs["estado_civil"],  
            "edad" => $rs["edad"],  
            "n_hijos" => $rs["n_hijos"],  
            "sexo" => $rs["sexo"],  
            "talla" => $rs["talla"],
            "contextura" => $rs["contextura"],
            "ruc" => $rs["ruc"],
            "essalud" => $rs["essalud"],
            "onp" => $rs["onp"],
            "cusp" => $rs["cusp"],
            "fecha_afiliacion" => $rs["fecha_afiliacion"]                                   
          );
        
      }  
      $qry2 = $db->query("SELECT * FROM tb_conyuge where id_personal='".$data->value."'");
      $totreg2 = $db->num_rows($qry2);
        if ($totreg2>0) {          
          $rs = $db->fetch_array($qry2);
          $tabla2 = array(
            "nombres" => $rs["nombres"]." ".$rs["apellidos"],  
            "fecha" => $rs["fecha"],  
            "lugar_nacimiento" => $rs["lugar_nacimiento"],  
            "distrito" => $rs["distrito"],  
            "provincia" => $rs["provincia"],  
            "departamento" => $rs["departamento"],  
            "dni" => $rs["dni"],  
            "telefono" => $rs["telefono"],  
            "celular" => $rs["celular"],  
            "ruc" => $rs["ruc"],  
            "profesion" => $rs["profesion"],  
            "ocupacion" => $rs["ocupacion"],  
            "direccion" => $rs["direccion"],
            "centro_lsboral" => $rs["centro_lsboral"]                                
          );
        
      } 
      $qry3 = $db->query("SELECT * FROM tb_padres where id_personal='".$data->value."'");
      $totreg3 = $db->num_rows($qry3);
      if ($totreg3>0) {          
        $rs = $db->fetch_array($qry3);
        $tabla3 = array(
          "nombres_padre" => $rs["nombres_padre"]." ".$rs["apellidos_padre"],  
          "trabajo_padre" => $rs["trabajo_padre"],  
          "ocupacion_padre" => $rs["ocupacion_padre"],  
          "direccion_padre" => $rs["direccion_padre"],  
          "telefono_padre" => $rs["telefono_padre"],  
          "celular_padre" => $rs["celular_padre"],  
          "nombres_madre" => $rs["nombres_madre"]." ".$rs["apellido_madre"],  
          "trabajo_madre" => $rs["trabajo_madre"],  
          "ocupacion_madre" => $rs["ocupacion_madre"],  
          "direccion_madre" => $rs["direccion_madre"],  
          "telefono_madre" => $rs["telefono_madre"],  
          "celular_madre" => $rs["celular_madre"]
                 
        );
      
     } 
     $qry4 = $db->query("SELECT * FROM tb_emergencia where id_personal='".$data->value."'");
     $totreg4 = $db->num_rows($qry4);
     if ($totreg4>0) {          
       $rs = $db->fetch_array($qry4);
       $tabla4 = array(
        "nombres" => $rs["nombres"]." ".$rs["apellidos"],  
        "parentesco" => $rs["parentesco"],  
        "telefono" => $rs["telefono"]
        
                
       );
     
    }  
    $qry5 = $db->query("SELECT * FROM tb_movilidad where id_personal='".$data->value."'");
    $totreg5 = $db->num_rows($qry5);
    if ($totreg5>0) {          
      $rs = $db->fetch_array($qry5);
      $tabla5 = array(
        "movilidad" => $rs["movilidad"],  
        "licencia_conducir" => $rs["licencia_conducir"],  
        "tipo_vehiculo" => $rs["tipo_vehiculo"],  
        "marca" => $rs["marca"],  
        "anio" => $rs["anio"],  
        "placa" => $rs["placa"]
               
      );    
   }    
   $qry6 = $db->query("SELECT * FROM tb_antecedentes where id_personal='".$data->value."'");
   $totreg6 = $db->num_rows($qry6);
   if ($totreg6>0) {          
     $rs = $db->fetch_array($qry6);
     $tabla6 = array(
       "O_1" => $rs["O_1"],  
       "O_2" => $rs["O_2"],  
       "O_3" => $rs["O_3"],
       "O_4" => $rs["O_4"]
              
     );    
  }    
  $qry7 = $db->query("SELECT * FROM tb_profesion where id_personal='".$data->value."'");
  $totreg7 = $db->num_rows($qry7);
  if ($totreg7>0) {          
    $rs = $db->fetch_array($qry7);
    $tabla7[] = array(
      "descripcion" => $rs["descripcion"],  
      "tipo" => $rs["tipo"],  
      "estado" => $rs["estado"],
      "lugar" => $rs["lugar"]
             
    );    
 }    
 
 $qry8 = $db->query("SELECT * FROM tb_profesion_2 where id_personal='".$data->value."'");
 $totreg8 = $db->num_rows($qry8);
 if ($totreg8>0) {          
   $rs = $db->fetch_array($qry8);
   $tabla8[] = array(
    "descripcion" => $rs["descripcion"]            
   );    
}    
$qry9 = $db->query("SELECT * FROM tb_idiomas where id_personal='".$data->value."'");
$totreg9 = $db->num_rows($qry9);
if ($totreg9>0) {          
  $rs = $db->fetch_array($qry9);
  $tabla9[] = array(
    "idioma" => $rs["idioma"],
    "nivel" => $rs["nivel"]
           
  );    
}        
$qry10 = $db->query("SELECT * FROM tb_referencia where id_personal='".$data->value."'");
$totreg10 = $db->num_rows($qry10);
if ($totreg10>0) {          
  $rs = $db->fetch_array($qry10);
  $tabla10[] = array(
    "nombre" => $rs["nombre"],
    "cargo" => $rs["cargo"],
    "telefono" => $rs["telefono"],
    "empresa" => $rs["empresa"]
           
  );    
} 
$qry11 = $db->query("SELECT * FROM tb_hijos where id_personal='".$data->value."'");
$totreg11 = $db->num_rows($qry11);
if ($totreg11>0) {          
  $rs = $db->fetch_array($qry11);
  $tabla11[] = array(
    "nombres" => $rs["nombres"]." ".$rs["apellidos"],
    "fecha_nacimiento" => $rs["fecha_nacimiento"],
    "edad" => $rs["edad"],
    "sexo" => $rs["sexo"],
    "dni" => $rs["dni"]
           
  );    
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
        $sql1 = "UPDATE `tb_files` 
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
        $sql1 = "UPDATE `tb_programa_capacitacion` 
        SET ".$val['acro'].'fecha_emi'."='".$data->data->fecha_emi."',
        ".$val['acro'].'fecha_cadu'."='".$data->data->fecha_cadu."',
        ".$val['acro'].'fecha_vigencia'."='".getStatus($data->data->fecha_emi,$data->data->fecha_cadu)."'
        WHERE id='".$data->data->id."'";
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
        $qry1 = $db->query("DELETE from  tb_programa_capacitacion WHERE id='".$data->value."'");                                                              
        
        $rpta = array("error"=>0,"qry1"=>$qry1);
        echo json_encode($rpta);
      break;
      case "03_save_register_Ficha_Personal":
        $qry1;
        $qry2;
        $qry3;

        $sql1 = "INSERT INTO `tb_personal` 
        (id,
        nombres,
        apellidos,
        fecha_nacimiento,
        lugar_nacimiento,
        distrito,
        provincia,
        departamento,
        dni,
        telefono,
        celular,
        domicilio,
        urbanizacion,
        distrito_domicilio,
        estado_civil,
        edad,
        n_hijos,
        sexo,
        talla,
        contextura,
        ruc,
        essalud,
        onp,
        cusp,
        fecha_afiliacion
        ) VALUES (
          '".$data->data->id."',  
          '".$data->data->nombres."',              
          '".$data->data->apellidos."',  
          '".$data->data->fecha_nacimiento."',  
          '".$data->data->lugar_nacimiento."',  
          '".$data->data->distrito."',  
          '".$data->data->provincia."',  
          '".$data->data->departamento."',  
          '".$data->data->dni."',  
          '".$data->data->telefono."',  
          '".$data->data->celular."',                 
          '".$data->data->domicilio."',
          '".$data->data->urbanizacion."',
          '".$data->data->distrito."',
          '".$data->data->civil."',
          '".$data->data->edad."',
          '".$data->data->n_hijos."',
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
     
          $sql2 = "INSERT INTO `tb_conyuge` 
          (id_personal,
          nombres,
          apellidos,
          fecha,
          lugar_nacimiento,
          distrito,
          provincia,
          departamento,
          dni,
          ruc,
          profesion,
          ocupacion,
          centro_lsboral,
          direccion,
          telefono,
          celular
          ) VALUES (
            '".$data->data->id."',  
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
            '".$data->data->celular_conyuge."'           
            )";
            $qry2 = $db->query($sql2);

            $sql3 = "INSERT INTO `tb_padres` 
            (id_personal,
            nombres_padre,
            apellidos_padre,
            trabajo_padre,
            ocupacion_padre,
            direccion_padre,
            telefono_padre,
            celular_padre,
            nombres_madre,
            apellido_madre,
            trabajo_madre,
            ocupacion_madre,
            direccion_madre,
            telefono_madre,
            celular_madre            
            ) VALUES (
              '".$data->data->id."',  
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



              $sql3 = "INSERT INTO `tb_emergencia` 
              (id_personal,
              nombres,
              apellidos,
              parentesco,
              telefono         
              ) VALUES (
                '".$data->data->id."',  
                '".$data->data->nombre_referencia."',              
                '".$data->data->apellido_referencia."',  
                '".$data->data->parentesco_referencia."',  
                '".$data->data->telefono_referencia."'                           
                )";
                $qry3 = $db->query($sql3);

            $sql4 = "INSERT INTO `tb_movilidad` 
            (id_personal,
            movilidad,
            licencia_conducir,
            tipo_vehiculo,
            marca,
            anio,
            placa         
            ) VALUES (
              '".$data->data->id."',  
              '".$data->data->movilidad[0]."',              
              '".$data->data->licencia."',  
              '".$data->data->vehiculo."',  
              '".$data->data->marca."',
              '".$data->data->anio."',
              '".$data->data->placa."'
              )";
              $qry4 = $db->query($sql4);


              $sql5 = "INSERT INTO `tb_antecedentes` 
              (id_personal,
              O_1,
              O_2,
              O_3,
              O_4                      
              ) VALUES (
                '".$data->data->id."',  
                '".$data->data->policia_1."',              
                '".$data->data->policia_2."',  
                '".$data->data->policia_3."',  
                '".$data->data->policia_4."'                                
                )";
                $qry5 = $db->query($sql5);



     
        if($data->data->profesion){
          $sql6 = "INSERT INTO tb_profesion 
          (id_personal,
          descripcion,
          tipo,
          estado,
          lugar) VALUES ";
          $sqldata="";
          foreach ($data->data->profesion as $value) {
              $sqldata.= "('".$data->data->id."','".$value[0]."','0','".$value[1]."','".$value[2]."'),";
             };

          foreach ($data->data->tecnica as $value) {
              $sqldata.= "('".$data->data->id."','".$value[0]."','1','".$value[1]."','".$value[2]."'),";
          };
          $sqldata=substr($sqldata, 0, -1);       
          $sql6=$sql6.$sqldata.";";
          $qry6 = $db->query($sql6);
        }

        if($data->data->otrosEstudios){
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
        }
     
        if($data->data->idioma){
          $sql8 = "INSERT INTO tb_idiomas 
          (id_personal,
          idioma,
          nivel) VALUES ";
          $sqldata="";
          foreach ($data->data->idioma as $value) {
              $sqldata.= "('".$data->data->id."','".$value[0]."','".$value[1]."'),";
             };
     
          $sqldata=substr($sqldata, 0, -1);       
          $sql8=$sql8.$sqldata.";";
          $qry8 = $db->query($sql8);
        }
        if($data->data->referencia){
          $sql9 = "INSERT INTO tb_referencia 
          (id_personal,
          nombre,
          cargo,
          telefono,
          empresa) VALUES ";
          $sqldata="";
          foreach ($data->data->referencia as $value) {
              $sqldata.= "('".$data->data->id."','".$value[0]."','".$value[1]."','".$value[2]."','".$value[3]."'),";
             };
     
          $sqldata=substr($sqldata, 0, -1);       
          $sql9=$sql9.$sqldata.";";
          $qry9 = $db->query($sql9);
        }
        if($data->data->hijos){
          $sql10 = "INSERT INTO tb_hijos 
          (id_personal,
          nombres,
          apellidos,
          fecha_nacimiento,
          edad,
          sexo,
          dni) VALUES ";
          $sqldata="";
          foreach ($data->data->hijos as $value) {
            
            $sqldata.= "('".$data->data->id."','".$value[0]."','".$value[1]."','".$value[2]."','".$value[3]."','".$value[4]."','".$value[5]."'),";
            };
     
          $sqldata=substr($sqldata, 0, -1);       
          $sql10=$sql10.$sqldata.";";
          $qry10 = $db->query($sql10);
        }

        if($data->data->files){
         

          $sql11 = "INSERT INTO `tb_files` 
          (id_personal,
          dni_file_name,
          licencia_file_name,
          sctr_file_name,
          seguro_file_name,
          policial_file_name,
          judicial_file_name,
          penal_file_name,
          trabajo_file_name,
          medico_file_name,
          lice_file_name           
          ) VALUES (
            '".$data->data->id."',  
            '".$data->data->files[0]."',              
            '".$data->data->files[1]."',  
            '".$data->data->files[2]."',  
            '".$data->data->files[3]."',  
            '".$data->data->files[4]."',  
            '".$data->data->files[5]."',  
            '".$data->data->files[6]."',  
            '".$data->data->files[7]."',  
            '".$data->data->files[8]."',  
            '".$data->data->files[9]."'                                        
            )";
            $qry11 = $db->query($sql11);


        }
        $rpta = array("table1"=>$qry1,"table2"=>$qry2,"table3"=>$qry3,"table4"=>$qry4,"table5"=>$qry5,"table6"=>$qry6,"table7"=>$qry7,"table8"=>$qry8,"table9"=>$qry9,"table10"=>$qry10,"table11"=>$qry11);
        echo json_encode($rpta);



      break;
      case "03_save_register_programacion_capacitacion":
        if($data->data->files){
         

          $sql11 = "INSERT INTO `tb_programa_capacitacion` 
          (
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


  function getStatus($val_emi,$val_cadu){
    $state=0;
    $newEmi= new DateTime($val_emi);
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
        $val="sctr_file_name";
        $acro="sctr_";
        break;
        case "3": 
        $type="3";
        $val="seguro_file_name";
        $acro="seguro_";
        break;
        case "4": 
        $type="4";
        $val="policial_file_name";
        $acro="policial_";
        break;
        case "5": 
        $type="5";
        $val="judicial_file_name";
        $acro="judicial_";
        break;
        case "6": 
        $type="6";
        $val="penal_file_name";
        $acro="penal_";
        break;
        case "7": 
        $type="7";
        $val="trabajo_file_name";
        $acro="trabajo_";
        break;
        case "8": 
        $type="8";
        $val="medico_file_name";
        $acro="medico_";
        break;
        case "9":
        $type="9";
        $val="lice_file_name";
        $acro="lice_";
  }
  return  array('val'=>$val,'type'=>$type,'acro'=>$acro);
  }
?>