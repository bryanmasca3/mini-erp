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
            $column= array();
            $qry = $db->query("SELECT I.*,G.description as 'grupo_descripcion',C.description as 'clase_descripcion' FROM `item` as I INNER JOIN `tb_grupo` as G ON I.id_grupo=G.code INNER JOIN `clase` as C ON I.id_clase=C.code WHERE C.grupo=G.code AND G.code='10';");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "id" => $rs["id"],
                  "codigo" =>$rs["active"],               
                  "clase" => $rs["clase_descripcion"],            
                  "condicion"=> $rs["condicion"],
                                  
                );
              }
                $column=array( 
                  (object) array('key' => 'id','title' => 'N°'),
                  (object) array('key' => 'codigo','title' => 'Codigo'),             
                  (object) array('key' => 'clase','title' => 'Clase'),              
                  (object) array('key' => 'condicion','title' => 'Condicion'),
                                
                );
            }
        
        //respuesta OT
        $rpta = array("data"=>$tabla,"column"=>$column);
        //var_dump($rpta);
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
                $sqldata3.= "('".$value[0]."','".$value[1]."','".$value[2]."','".$value[3]."','".$value[4]."','".$value[5]."','".$value[6]."','".$data->data->n_requerimiento."'),";
              };
            $sqldata3=substr($sqldata3, 0, -1);       
            $sql3=$sql3.$sqldata3.";";         
            $qry3 = $db->query($sql3);
          $rpta = array("table1"=>$qry1,"table3"=>$qry3);
          echo json_encode($rpta);
        break;
      /*  case "sqlRequerimientosGrid":
  $tabla = array();
  $column= array();
  $qry = $db->query("SELECT RQ.*,E.descripcion AS 'descripcion_estado',P.descripcion AS 'descripcion_prioridad', A.descripcion AS 'descripcion_area',A.id AS 'id_area'FROM `requerimiento` as RQ INNER JOIN `per_estado` as E ON RQ.estado=E.id INNER JOIN `log_prioridad` as P ON RQ.prioridad=P.id INNER JOIN `per_area`as A ON RQ.area=A.id WHERE A.id=3;");
  $totreg = $db->num_rows($qry);
  if ($totreg>0) {
    for($xx=0; $xx<$totreg; $xx++){
      $rs = $db->fetch_array($qry);
      $tabla[] = array(
        "id" => $rs["id"],
        "area" =>$rs["descripcion_area"],                                            
        "fecha" =>$rs["fecha_requerimiento"],
        "prioridad" =>$rs["descripcion_prioridad"],
        "estado" =>$rs["descripcion_estado"],
        "motivo" =>$rs["motivo"]                  
      );
    }
      $column=array( 
        (object) array('key' => 'id','title' => 'N'),
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
*/
case "sql_get_asignacion_vehiculo_by_id":
  $tabla = array();
  $column= array();
  $qry = $db->query("SELECT ASI.*,IFNULL(C.descripcion,'sin comentario') as 'asignacion_comentario',V.active AS 'activo_vehiculo',V.descripcion AS 'descripcion_vehiculo',CON.nombre AS 'nombre_conductor',CON.apellido AS 'apellido_conductor',RES.nombre AS 'nombre_responsable',RES.apellido AS 'apellido_responsable' FROM `ope_asignaciones` as ASI LEFT JOIN `ope_asignaciones_comentario` as C ON ASI.id=C.id_asignacion INNER JOIN `item` as V ON V.id=ASI.id_vehiculo INNER JOIN `per_aspirante` as CON ON CON.id=ASI.id_conductor INNER JOIN `per_aspirante` as RES ON RES.id=ASI.id_responsable WHERE ASI.id='".$data->data."'");

  $totreg = $db->num_rows($qry);
  if ($totreg>0) {
    for($xx=0; $xx<$totreg; $xx++){
      $rs = $db->fetch_array($qry);
      $tabla[] = array(
        "id" => $rs["id"],
        "fecha_ini" => $rs["fecha_ini"],
        "fecha_final" => $rs["fecha_final"],                           
        "hora_ini" => $rs["hora_ini"],
        "hora_final" => $rs["hora_final"],
        "odometro" => $rs["odometro"],

        "punto_partida" => $rs["punto_partida"],
        "punto_carga" => $rs["punto_carga"],
        "punto_decarga" => $rs["punto_decarga"],
        "punto_retorno" => $rs["punto_retorno"],

        "nombre" => $rs["nombre"],
        "tipo" => $rs["tipo"],

        "descripcion_tarea" => $rs["descripcion_tarea"],

        "asignacion_comentario" => $rs["asignacion_comentario"],
        "activo_vehiculo" => $rs["activo_vehiculo"],
        "descripcion_vehiculo" => $rs["descripcion_vehiculo"],

        "nombres_conductor" => $rs["nombre_conductor"]." ".$rs["apellido_conductor"],
        "nombres_responsable" => $rs["nombre_responsable"]." ".$rs["apellido_responsable"]
      );
    }
    
  }

$rpta = array("data"=>$tabla);      
echo json_encode($rpta);
break;
case "sql_select_get_clase_flota": 
  $tabla = array();
  $qry = $db->query("SELECT * FROM `clase` WHERE GRUPO='10';");
  $totreg = $db->num_rows($qry);
  if ($totreg>0) {
    for($xx=0; $xx<$totreg; $xx++){
      $rs = $db->fetch_array($qry);
      $tabla[] = array(
        "id" => $rs["code"],
        "descripcion" =>$rs["description"]    
      );
    }
  }
$rpta = $tabla;
echo json_encode($rpta);
break;  
case "07_getEquipos_by_clase":
  $tabla = array();  
  $qry = $db->query("SELECT  * FROM item where id_grupo=10 AND id_clase='".$data->contenido."'");
  $totreg = $db->num_rows($qry);
  if ($totreg>0) {  
    for($xx=0; $xx<$totreg; $xx++){
      $rs = $db->fetch_array($qry);    
      $tabla[] = array(
        "id" => $rs["id"],
        "codigo" => $rs["active"]       
      );
    }
  }
 
  $rpta = array("tabla"=>$tabla);
  echo json_encode($rpta);
  break;
  case "sqlGroupClassByGroup":
  $tabla = array();
  $column= array();
  $qry;
  if($data->data=="-1"){
    $qry = $db->query("SELECT  * FROM item WHERE id_grupo=10");
  }else{ 
    $qry = $db->query("SELECT  * FROM item where id_grupo=10 AND id_clase='".$data->data."'");
  }
  
  $totreg = $db->num_rows($qry);
  if ($totreg>0) {
    for($xx=0; $xx<$totreg; $xx++){
      $rs = $db->fetch_array($qry);
      $tabla[] = array(
        "id" => $rs["id"],
      //  "code" => $rs["code"],
        "description" => $rs["active"]                           
      );
    }
      $column=array( 
       // (object) array('key' => 'id','title' => 'N°'),
        (object) array('key' => 'code','title' => 'Grupo'),
        (object) array('key' => 'description','title' => 'Descripcion')             
      );
  }
//respuesta OT
$rpta = array("data"=>$tabla,"column"=>$column);
//var_dump($rpta);
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
        case "sql_operacion_combustible": 
          $tabla = array();
          $column= array();
          $qry = $db->query("SELECT C.*,E.active,T.nombre,T.apellido FROM `ope_combustible`as C INNER JOIN `item` as E on C.id_vehiculo= E.id INNER JOIN `per_aspirante` AS T on C.id_conductor=T.id ORDER BY fecha DESC;");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla[] = array(
                "id" => $rs["id"],             
                "tipo" => $rs["tipo_combustible"],
                "vehiculo" => $rs["active"],
                "conductor" => $rs["nombre"]." ".$rs["apellido"],
                "fecha"=> $rs["fecha"],
                "cantidad"=> $rs["cantidad"],
                "total"=> "S/. ".$rs["total"]                       
              );
            }
            $column=array(
              (object) array('key' => 'id','title' => 'ID'),         
              (object) array('key' => 'vehiculo','title' => 'Codigo'),
              (object) array('key' => 'conductor','title' => 'Conductor'),
              (object) array('key' => 'tipo','title' => 'Tipo'),
              (object) array('key' => 'fecha','title' => 'Fecha'),
              (object) array('key' => 'cantidad','title' => 'Cantidad'),
              (object) array('key' => 'total','title' => 'Total')               
            );
          }          
      $rpta = array("data"=>$tabla,"column"=>$column);
      echo json_encode($rpta);
      break;
      case "sql_operacion_documentos": 
        $tabla = array();
        $column= array();
        $qry = $db->query("SELECT D.*,V.active FROM `ope_archivos`AS D inner JOIN `item` AS V ON D.id_vehiculo=V.id ORDER BY V.id;");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla[] = array(
              "id" => $rs["id_vehiculo"],             
              "codigo" => $rs["active"],
              "file1" => $rs["file1_vigencia"],            
              "file2" => $rs["file2_vigencia"],
              "file3" => $rs["file3_vigencia"],
              "file4" => $rs["file4_vigencia"],
              "file5" => $rs["file5_vigencia"],
              "file6" => $rs["file6_vigencia"],
              "file7" => $rs["file7_vigencia"],
              "file8" => $rs["file8_vigencia"],
              "file9" => $rs["file9_vigencia"],
              "file10" => $rs["file10_vigencia"],
              "file11" => $rs["file11_vigencia"],
              "file12" => $rs["file12_vigencia"],
              "file13" => $rs["file13_vigencia"],
              "file14" => $rs["file14_vigencia"],
              "file15" => $rs["file15_vigencia"],
              "file16" => $rs["file16_vigencia"],
              "file17" => $rs["file17_vigencia"],
              "file18" => $rs["file18_vigencia"]
            );
          }
          $column=array(
            (object) array('key' => 'id','title' => 'ID'),
            (object) array('key' => 'codigo','title' => 'Codigo'),
            (object) array('key' => 'file1','title' => 'Resolucion de bonificacion','icon'=>1,'popup'=>0),
            (object) array('key' => 'file2','title' => 'Certificación de instalación de GPS','icon'=>1,'popup'=>0),             
            (object) array('key' => 'file3','title' => 'Peso','icon'=>1,'popup'=>0),
            (object) array('key' => 'file4','title' => 'Revisión técnica','icon'=>1,'popup'=>0),
            (object) array('key' => 'file5','title' => 'Cubicación','icon'=>1,'popup'=>0),
            (object) array('key' => 'file6','title' => 'DGN','icon'=>1,'popup'=>0),
            (object) array('key' => 'file7','title' => 'Tarjeta de mercancías','icon'=>1,'popup'=>0),
            (object) array('key' => 'file8','title' => 'Certificado de operativo','icon'=>1,'popup'=>0),
            (object) array('key' => 'file9','title' => 'Certificado de Hermeticidad','icon'=>1,'popup'=>0),
            (object) array('key' => 'file10','title' => 'Certificado de epoxicado','icon'=>1,'popup'=>0),
            (object) array('key' => 'file11','title' => 'Lavado interno','icon'=>1,'popup'=>0),
            (object) array('key' => 'file12','title' => 'Línea de vida','icon'=>1,'popup'=>0),
            (object) array('key' => 'file13','title' => 'Materiales peligrosos MATPEL','icon'=>1,'popup'=>0),
            (object) array('key' => 'file14','title' => 'Check List','icon'=>1,'popup'=>0),
            (object) array('key' => 'file15','title' => 'Contrato','icon'=>1,'popup'=>0),
            (object) array('key' => 'file16','title' => 'SOAT','icon'=>1,'popup'=>0),
            (object) array('key' => 'file17','title' => 'Responsabilidad Civil','icon'=>1,'popup'=>0),
            (object) array('key' => 'file18','title' => 'Póliza vehicular','icon'=>1,'popup'=>0)
          );
        }
    
    //respuesta OT
    $rpta = array("data"=>$tabla,"column"=>$column);
    echo json_encode($rpta);
    break;
      case "sql_operacion_costos_operativos": 
        $tabla = array();
        $column= array();
        $qry = $db->query("SELECT G.*,I.active FROM `ope_otros_gastos` AS G INNER JOIN `item` as I ON G.id_vehiculo=I.id ORDER BY fecha DESC;");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla[] = array(
              "id" => $rs["id"],             
              "nombre" => $rs["nombre"],
              "tipo" => $rs["tipo"],
              "fecha"=> $rs["fecha"],          
              "vehiculo"=> $rs["active"],
              "precio"=> "S/. ".$rs["precio"],
              "cantidad"=> $rs["cantidad"],
              "total"=> "S/. ".$rs["total"]                       
            );
          }
          $column=array(
            (object) array('key' => 'id','title' => 'ID'),
            (object) array('key' => 'vehiculo','title' => 'Codigo'),
            (object) array('key' => 'nombre','title' => 'Descripcion de Gasto'),
         
            (object) array('key' => 'fecha','title' => 'Fecha'),
            (object) array('key' => 'precio','title' => 'Precio Unitario'),
            (object) array('key' => 'cantidad','title' => 'Cantidad'),
            (object) array('key' => 'total','title' => 'Total'),
          );
        }
    
    //respuesta OT
    $rpta = array("data"=>$tabla,"column"=>$column);
    echo json_encode($rpta);
    break;
    case "get_id_document_item":
    
      $sql1 = "UPDATE `ope_archivos` 
      SET file".$data->params.'_emi'."='".$data->data->fecha_emi."',
      file".$data->params.'_cadu'."='".$data->data->fecha_cadu."',
      file".$data->params.'_vigencia'."='".getStatus($data->data->fecha_emi,$data->data->fecha_cadu)."'
      WHERE id_vehiculo='".$data->value."'";
      $qry1 = $db->query($sql1);
      $rpta = array("tabla1"=>$qry1);
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
    case "get_id_update_document_file":
      
      $sql1 = "UPDATE `ope_archivos` 
      SET file".$data->params.'_emi'."='',
      file".$data->params.'_cadu'."='',
      file".$data->params."='".$data->data->file."',
      file".$data->params.'_vigencia'."='0'
      WHERE id_vehiculo='".$data->value."'";
      $qry1 = $db->query($sql1);
      $rpta = array("tabla1"=>$qry1);
      echo json_encode($rpta);
    break;
      case "sql_vehiculo_documento": 
        $tabla = array();
        $column= array();
        $qry = $db->query("SELECT * FROM `ope_archivos` WHERE id_vehiculo='".$data->value."'");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla[] = array(
              "id" => $rs["id"],             
              "file1" => $rs["file1_vigencia"],
              "file2" => $rs["file2_vigencia"],
              "file3" => $rs["file3_vigencia"],
              "file4" => $rs["file4_vigencia"],
              "file5" => $rs["file5_vigencia"],
              "file6" => $rs["file6_vigencia"],
              "file7" => $rs["file7_vigencia"],
              "file8" => $rs["file8_vigencia"],
              "file9" => $rs["file9_vigencia"],
              "file10" => $rs["file10_vigencia"],
              "file11" => $rs["file11_vigencia"],
              "file12" => $rs["file12_vigencia"],
              "file13" => $rs["file13_vigencia"],
              "file14" => $rs["file14_vigencia"],
              "file15" => $rs["file15_vigencia"],
              "file16" => $rs["file16_vigencia"],
              "file17" => $rs["file17_vigencia"],
              "file18" => $rs["file18_vigencia"]
                                           
            );
          }
          $column=array(
            (object) array('key' => 'id','title' => 'ID'),
            (object) array('key' => 'file1','title' => 'Resolucion de bonificacion','icon'=>1,'popup'=>1),
            (object) array('key' => 'file2','title' => 'Certificacion de instalacion de GPS','icon'=>1,'popup'=>1),             
            (object) array('key' => 'file3','title' => 'Peso','icon'=>1,'popup'=>1),
            (object) array('key' => 'file4','title' => 'Revision tecnica','icon'=>1,'popup'=>1),
            (object) array('key' => 'file5','title' => 'Cubicacion','icon'=>1,'popup'=>1),
            (object) array('key' => 'file6','title' => 'DGN','icon'=>1,'popup'=>1),
            (object) array('key' => 'file7','title' => 'Tarjeta de mercancías','icon'=>1,'popup'=>1),
            (object) array('key' => 'file8','title' => 'Certificado de operativo','icon'=>1,'popup'=>1),
            (object) array('key' => 'file9','title' => 'Certificado de Hermeticidad','icon'=>1,'popup'=>1),
            (object) array('key' => 'file10','title' => 'Certificado de epoxicado','icon'=>1,'popup'=>1),
            (object) array('key' => 'file11','title' => 'Lavado interno','icon'=>1,'popup'=>1),
            (object) array('key' => 'file12','title' => 'Linea de vida','icon'=>1,'popup'=>1),
            (object) array('key' => 'file13','title' => 'Materiales peligrosos MATPEL','icon'=>1,'popup'=>1),
            (object) array('key' => 'file14','title' => 'Check List','icon'=>1,'popup'=>1),
            (object) array('key' => 'file15','title' => 'Contrato','icon'=>1,'popup'=>1),
            (object) array('key' => 'file16','title' => 'SOAT','icon'=>1,'popup'=>1),
            (object) array('key' => 'file17','title' => 'Responsabilidad Civil','icon'=>1,'popup'=>1),
            (object) array('key' => 'file18','title' => 'Poliza vehicular','icon'=>1,'popup'=>1)
          );
        }
    
    //respuesta OT
    $rpta = array("data"=>$tabla,"column"=>$column);
    echo json_encode($rpta);
    break;
        case "sql_operacion_tarea": 
          $tabla = array();
          $column= array();
          $qry = $db->query("SELECT T.*,I.descripcion,I.active,I.condicion,C.nombre AS 'nombre_conductor',C.apellido AS 'apellido_conductor',R.nombre AS 'nombre_responsable',R.apellido AS 'apellido_responsable' FROM `ope_tarea` AS T INNER JOIN `item` AS I ON T.id_vehiculo=I.id INNER JOIN `per_aspirante` AS R ON R.id=T.id_responsable INNER JOIN `per_aspirante` AS C ON C.id=T.id_conductor");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla[] = array(
                "id" => $rs["id"],             
                "nombre" => $rs["nombre"],
                "tipo" => $rs["tipo"],
                "fecha_limite"=> $rs["fecha"],
                "prioridad"=> $rs["prioridad"],

                "nombre_vehiculo"=> $rs["descripcion"],
                "active"=> $rs["active"],
                "condicion"=> $rs["condicion"],

                "nombres_conductor"=> $rs["nombre_conductor"]." ".$rs["apellido_conductor"],      

                "nombres_responsable"=> $rs["nombre_responsable"]." ".$rs["apellido_responsable"],                      
              );
            }
            $column=array(
              (object) array('key' => 'id','title' => 'ID'),
              (object) array('key' => 'active','title' => 'Codigo'),
              (object) array('key' => 'nombre','title' => 'Nombre'),
              (object) array('key' => 'tipo','title' => 'Tipo'),
              (object) array('key' => 'fecha_limite','title' => 'Fecha'),
              (object) array('key' => 'prioridad','title' => 'Prioridad'),

              (object) array('key' => 'nombres_responsable','title' => 'Responsable'),               
              (object) array('key' => 'nombres_conductor','title' => 'Conductor'),
              (object) array('key' => 'nombre_vehiculo','title' => 'Vehiculo'),
             
              (object) array('key' => 'condicion','title' => 'Condicion'),
            );
          }
      
      //respuesta OT
      $rpta = array("data"=>$tabla,"column"=>$column);
      echo json_encode($rpta);
      break;
      case "sql_operacion_tarea_by_id": 
        $tabla = array();
        $tabla1 = array();
        $column= array();
        $qry = $db->query("SELECT T.*,I.descripcion,I.active,I.condicion,C.nombre AS 'nombre_conductor',C.apellido AS 'apellido_conductor',R.nombre AS 'nombre_responsable',R.apellido AS 'apellido_responsable' FROM `ope_tarea` AS T INNER JOIN `item` AS I ON T.id_vehiculo=I.id INNER JOIN `per_aspirante` AS R ON R.id=T.id_responsable INNER JOIN `per_aspirante` AS C ON C.id=T.id_conductor WHERE T.id='".$data->data."'");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
         
            $rs = $db->fetch_array($qry);
            $tabla = array(
              "id" => $rs["id"],             
              "nombre" => $rs["nombre"],
              "tipo" => $rs["tipo"],
              "fecha_limite"=> $rs["fecha"],
              "prioridad"=> $rs["prioridad"],

              "nombre_vehiculo"=> $rs["descripcion"],
              "active"=> $rs["active"],
              "condicion"=> $rs["condicion"],

              "nombres_conductor"=> $rs["nombre_conductor"]." ".$rs["apellido_conductor"],      

              "nombres_responsable"=> $rs["nombre_responsable"]." ".$rs["apellido_responsable"],                      
            );    

            $qry1 = $db->query("SELECT * FROM `ope_comentario_tarea` WHERE id_tarea='".$data->data."'");
            $totreg1 = $db->num_rows($qry1);
            if ($totreg1>0) {
              for($xx=0; $xx<$totreg1; $xx++){
                $rs = $db->fetch_array($qry1);
                $tabla1[] = array(
                  "id" => $rs["id"],             
                  "descripcion" => $rs["descripcion"],                 
                );
              }
               }
       
        }
    
    //respuesta OT
    $rpta = array("data"=>$tabla,"dataComent"=>$tabla1);
    echo json_encode($rpta);
    break;
    case "sql_operacion_otros_gastos_by_id": 
      $tabla = array();
      $tabla1 = array();
      $column= array();
      $qry = $db->query("SELECT G.*,I.active,I.descripcion,A.nombre AS 'nombre_conductor',A.apellido AS 'apellido_conductor' FROM `ope_otros_gastos` AS G INNER JOIN `item` as I ON G.id_vehiculo=I.id INNER JOIN `per_aspirante` as A ON A.id=G.id_conductor WHERE G.id='".$data->data."'");

      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
       
          $rs = $db->fetch_array($qry);
          $tabla = array(
            "id" => $rs["id"],             
              "nombre" => $rs["nombre"],
              "tipo" => $rs["tipo"],
              "fecha"=> $rs["fecha"],          
              "hora"=> $rs["hora"],
              "referencia"=> $rs["referencia"],

              "vehiculo"=> $rs["active"],
              "descripcion"=> $rs["descripcion"],

              "precio"=> $rs["precio"],
              "cantidad"=> $rs["cantidad"],
              "total"=> $rs["total"],    

              "nombres_conductor"=> $rs["nombre_conductor"]." ".$rs["apellido_conductor"],
                     
          );    
         
     
      }
  
  //respuesta OT
  $rpta = array("data"=>$tabla);
  echo json_encode($rpta);
  break;
    case "sql_operacion_combustible_by_id": 
      $tabla = array();
      $tabla1 = array();
      $column= array();
      $qry = $db->query("SELECT T.*,I.descripcion,I.active,I.condicion,C.nombre AS 'nombre_conductor',C.apellido AS 'apellido_conductor',PR.razon_social AS 'nombre_proveedor',PR.ruc AS 'ruc_proveedor' FROM `ope_combustible` AS T INNER JOIN `item` AS I ON T.id_vehiculo=I.id INNER JOIN `proveedor` AS PR ON PR.id=T.id_proveedor INNER JOIN `per_aspirante` AS C ON C.id=T.id_conductor WHERE T.id='".$data->data."'");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
       
          $rs = $db->fetch_array($qry);
          $tabla = array(
            "id" => $rs["id"],             
            "tipo_combustible" => $rs["tipo_combustible"],
            "fecha" => $rs["fecha"],
            "hora"=> $rs["hora"],
            "cantidad"=> $rs["cantidad"],
            "precio"=> $rs["precio"],
            "total"=> $rs["total"],

            "vehiculo"=> $rs["descripcion"],
            "active"=> $rs["active"],
            "condicion"=> $rs["condicion"],

            "nombres_conductor"=> $rs["nombre_conductor"]." ".$rs["apellido_conductor"],
            "proveedor"=> $rs["nombre_proveedor"],
            "ruc"=> $rs["ruc_proveedor"]
                     
          );    
         
     
      }
  
  //respuesta OT
  $rpta = array("data"=>$tabla);
  echo json_encode($rpta);
  break;
        case "sql_operacion_mantenimiento": 
          $tabla = array();
          $column= array();
          $qry = $db->query("SELECT * FROM `tb_mantenimiento`");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla[] = array(
                "id" => $rs["id"],             
                "servicio" => $rs["servicio"],
                "tipo" => $rs["tipo"],
                "referencia"=> $rs["referencia"],
                "fecha_ini"=> $rs["fecha_ini"],
                "fecha_fin"=> $rs["fecha_fin"],
                "orden"=> $rs["orden"],
                "causa"=> $rs["causa"]
              );
            }
            $column=array(
              (object) array('key' => 'id','title' => 'ID'),
              (object) array('key' => 'servicio','title' => 'Servicio'),
              (object) array('key' => 'tipo','title' => 'Tipo'),
              (object) array('key' => 'referencia','title' => 'Referencia'),
              (object) array('key' => 'fecha_ini','title' => 'Fecha Inicial'),
              (object) array('key' => 'fecha_fin','title' => 'Fecha Final'),               
              (object) array('key' => 'orden','title' => 'Orden'),
              (object) array('key' => 'causa','title' => 'Causa'),
            );
          }
      
      $rpta = array("data"=>$tabla,"column"=>$column);
      echo json_encode($rpta);
      break;
      case "03_save_add_vehiculo_odometro":
        $qry1;      
        $sql1 = "INSERT INTO ope_odometro 
        (odometro,
        id_vehiculo,      
        status,
        type) VALUES (
          '".$data->data->odometro."',  
          '".$data->data->vehiculo."',                     
          '".$data->data->status."',  
          '".$data->data->type."'           
          )";
          $qry1 = $db->query($sql1);
     
      
        $rpta = array("table1"=>$qry1);
        echo json_encode($rpta);
      break; 
      case "03_save_add_vehiculo_seguro":
        $qry1;      
        $sql1 = "INSERT INTO tb_seguro 
        (vehiculo,
        status,
        proveedor,
        fecha_inicio,
        fecha_vencimiento,
        total,
        comentarios) VALUES (
          '".$data->data->vehiculo."',  
          '".$data->data->status."',              
          '".$data->data->proveedor."',  
          '".$data->data->fecha_inicio."',  
          '".$data->data->fecha_vencimiento."',  
          '".$data->data->total."',
          '".$data->data->comentarios."'
          )";
          $qry1 = $db->query($sql1);
     
      
        $rpta = array("table1"=>$qry1);
        echo json_encode($rpta);
      break; 
      case "03_save_add_combustible":
        $qry1;      
        $sql1 = "INSERT INTO ope_combustible 
        (id_vehiculo,
        id_conductor,
        id_proveedor,
        tipo_combustible,
        fecha,
        hora,
        cantidad,
        precio,
        total        
        ) VALUES (
          '".$data->data->vehiculo."',  
          '".$data->data->conductor."',              
          '".$data->data->proveedor."',
          '".$data->data->tipo."',
          '".$data->data->fecha."', 
          '".$data->data->hora."',
          '".$data->data->cantidad."',
          '".$data->data->precio."',
          '".$data->data->total."'
          )";
          $qry1 = $db->query($sql1);
     
      
        $rpta = array("table1"=>$qry1);
        echo json_encode($rpta);
      break;
      case "03_save_add_vehiculo_documento":
        $qry1;      
        $sql1 = "INSERT INTO ope_archivos 
        (id_vehiculo,
        file1,
        file2,
        file3,
        file4,
        file5,
        file6,
        file7,
        file8,
        file9,
        file10,
        file11,
        file12,
        file13,
        file14,
        file15,
        file16,
        file17,
        file18
        ) VALUES (
          '".$data->data->vehiculo."',  
          '".$data->data->file1."',
          '".$data->data->file2."',
          '".$data->data->file3."',
          '".$data->data->file4."',
          '".$data->data->file5."',
          '".$data->data->file6."',
          '".$data->data->file7."',
          '".$data->data->file8."',
          '".$data->data->file9."',
          '".$data->data->file10."',
          '".$data->data->file11."',
          '".$data->data->file12."',
          '".$data->data->file13."',
          '".$data->data->file14."',
          '".$data->data->file15."',
          '".$data->data->file16."',
          '".$data->data->file17."',
          '".$data->data->file18."'             
          )";
          $qry1 = $db->query($sql1);
     
      
        $rpta = array("table1"=>$qry1);
        echo json_encode($rpta);
      break;
      case "03_save_add_mantenimiento":
        $qry1;      
        $sql1 = "INSERT INTO tb_mantenimiento 
        (servicio,
        tipo,
        referencia,
        fecha_ini,
        hora_ini,
        fecha_fin,
        hora_fin,      
        causa,      
        ubicacion,
        conductor,
        responsable,
        proveedor,
        orden,
        vehiculo
        ) VALUES (
          '".$data->data->servicio."',  
          '".$data->data->tipo."',              
          '".$data->data->referencia."',
          '".$data->data->fecha_ini."',
          '".$data->data->hora_ini."',
          '".$data->data->fecha_fin."',
          '".$data->data->hora_fin."',      
          '".$data->data->causa."', 
          '".$data->data->ubicacion."', 
          '".$data->data->conductor."', 
          '".$data->data->responsable."', 
          '".$data->data->proveedor."',   
          '".$data->data->orden."',
          '".$data->data->vehiculo."'
          )";
          $qry1 = $db->query($sql1);
     
          if($data->data->comentario){
            $sql2 = "INSERT INTO tb_mantenimiento_comentario 
            (vehiculo, descripcion) VALUES ";
            $sqldata2="";
              foreach ($data->data->comentario as $value) {
                $sqldata2.= "('".$data->data->vehiculo."','".$value."'),";
               };
            $sqldata2=substr($sqldata2, 0, -1);       
            $sql2=$sql2.$sqldata2.";";
            $qry2 = $db->query($sql2);
          }
        $rpta = array("table1"=>$qry1);
        echo json_encode($rpta);
      break;
      case "03_save_add_solicitud_mantenimiento":
        $qry1;      
        $sql1 = "INSERT INTO ope_solicitud_mantenimiento 
        (id,
        id_vehiculo,
        asignado,
        prioridad,
        tipo,
        fecha,
        descripcion       
        ) VALUES (
          '".$data->data->id."',  
          '".$data->data->vehiculo."',  
          '".$data->data->asignado."',              
          '".$data->data->prioridad."',
          '".$data->data->tipo."',
          '".$data->data->fecha."',
          '".$data->data->descripcion."'
          )";
          $qry1 = $db->query($sql1);
     
          if($data->data->comentario){
            $sql2 = "INSERT INTO ope_solicitud_mantenimiento_comentario 
            (id_solicitud_mantenimiento, descripcion) VALUES ";
            $sqldata2="";
              foreach ($data->data->comentario as $value) {
                $sqldata2.= "('".$data->data->id."','".$value."'),";
               };
            $sqldata2=substr($sqldata2, 0, -1);       
            $sql2=$sql2.$sqldata2.";";
            $qry2 = $db->query($sql2);
          }
        $rpta = array("table1"=>$qry1);
        echo json_encode($rpta);
      break;
      case "03_save_add_tarea":
        $qry1;      
        $sql1 = "INSERT INTO ope_tarea 
        (id,
        nombre,
        tipo,
        fecha,
        prioridad,
        id_vehiculo,
        id_responsable,
        id_conductor
        ) VALUES (
          '".$data->data->id."',  
          '".$data->data->nombre."',  
          '".$data->data->tipo."',              
          '".$data->data->fecha_limite."',
          '".$data->data->prioridad."',
          '".$data->data->vehiculo."',
          '".$data->data->Responsable."',
          '".$data->data->Conductor."'
          )";
          $qry1 = $db->query($sql1);
     
          if($data->data->comentario){
            $sql2 = "INSERT INTO ope_comentario_tarea 
            (id_tarea, descripcion) VALUES ";
            $sqldata2="";
              foreach ($data->data->comentario as $value) {
                $sqldata2.= "('".$data->data->id."','".$value."'),";
               };
            $sqldata2=substr($sqldata2, 0, -1);       
            $sql2=$sql2.$sqldata2.";";
            $qry2 = $db->query($sql2);
          }
        $rpta = array("table1"=>$qry1);
        echo json_encode($rpta);
      break;
      case "03_save_add_gasto_operativo":
        $qry1;      
        $sql1 = "INSERT INTO ope_otros_gastos 
        (nombre,
        tipo,
        fecha,
        hora,
        referencia,
        id_vehiculo,
        id_conductor,
        cantidad,
        precio,
        total
        ) VALUES (
          '".$data->data->nombre."',  
          '".$data->data->tipo."',              
          '".$data->data->fecha."',
          '".$data->data->hora."',
          '".$data->data->referencia."',         
          '".$data->data->vehiculo."',
          '".$data->data->conductor."',
          '".$data->data->cantidad."',
          '".$data->data->precio."',
          '".$data->data->total."'         
          )";
          $qry1 = $db->query($sql1);
     
      
        $rpta = array("table1"=>$qry1);
        echo json_encode($rpta);
      break;
      case "03_save_add_conductor":
        $qry1;      
        $sql1 = "INSERT INTO tb_conductores 
        (nombre,
        apellidos,
        fecha_ingreso,
        estado_conductor,
        empleado,
        email,
        telefono,
        telefono_emer,
        ciudad,
        direccion,
        fecha_nacimiento,
        telepeaje,
        tipo_licencia,
        num_licencia,
        fecha_vencimiento,
        grupo,
        comentario
        ) VALUES (
          '".$data->data->nombre."',  
          '".$data->data->apellidos."',              
          '".$data->data->fecha_ingreso."',
          '".$data->data->estado_conductor."',
          '".$data->data->empleado."',
          '".$data->data->email."',
          '".$data->data->telefono."',
          '".$data->data->telefono_emer."',
          '".$data->data->ciudad."',
          '".$data->data->direccion."',
          '".$data->data->fecha_nacimiento."',
          '".$data->data->telepeaje."',
          '".$data->data->tipo_licencia."',
          '".$data->data->num_licencia."',
          '".$data->data->fecha_vencimiento."',
          '".$data->data->grupo."',
          '".$data->data->comentario."'
          )";
          $qry1 = $db->query($sql1);
     
      
        $rpta = array("table1"=>$qry1);
        echo json_encode($rpta);
      break;
      case "03_save_add_vehiculo_comentario":
        $qry1;      
        $sql1 = "INSERT INTO ope_comentario_vehiculo 
        (id_vehiculo,
        id_encargado,
        descripcion) VALUES (
          '".$data->data->vehiculo."',  
          '".$data->data->encargado."',              
          '".$data->data->descripcion."'
          )";
          $qry1 = $db->query($sql1);
     
      
        $rpta = array("table1"=>$qry1);
        echo json_encode($rpta);
      break;
      case "03_save_add_vehiculo_estado":
        $qry1;      
        $sql1 = "INSERT INTO ope_estados 
        (id_vehiculo,
        motivo,
        estado,
        id_encargado) VALUES (
          '".$data->data->vehiculo."',  
          '".$data->data->motivo."',              
          '".$data->data->estado."',  
          '".$data->data->encargado."'
          )";
          $qry1 = $db->query($sql1);
     
      
        $rpta = array("table1"=>$qry1);
        echo json_encode($rpta);
      break;
      case "03_get_last_odometro":
        $qry1;      
        $sql1 = "SELECT * FROM ope_odometro WHERE id_vehiculo=".$data->id." ORDER BY odometro DESC LIMIT 1;";
        $qry1 = $db->query($sql1);
        $totreg = $db->num_rows($qry1);
        if ($totreg==1) {
          $rs = $db->fetch_array($qry1);
          $tabla =$rs["odometro"];   
        }
        $rpta = array("table"=>$tabla);
        echo json_encode($rpta);
      break;
      case "01_get_pdf_file":        
        $tabla1 = array();
      
        $qry1 = $db->query("select * from tb_document where vehiculo='".$data->value."'");
      
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
      case "03_save_add_vehiculo_asignacion":
        $qry1;      
        $sql1 = "INSERT INTO ope_asignaciones 
        (id,
        id_vehiculo,
        nombre,
        descripcion_tarea,
        id_responsable,
        fecha_ini,
        fecha_final,
        hora_ini,
        hora_final,
        odometro,
        punto_partida,
        punto_carga,
        punto_decarga,
        punto_retorno,
        guia1,
        guia2,
        tipo,
        id_conductor) VALUES (
          '".$data->data->id."',  
          '".$data->data->vehiculo."',  
          '".$data->data->nombre."', 
          '".$data->data->descripcion."', 
          '".$data->data->Responsable."', 
          '".$data->data->fecha_ini."',              
          '".$data->data->fecha_final."',  
          '".$data->data->hora_ini."',  
          '".$data->data->hora_final."',  
          '".$data->data->odometro."',    
          '".$data->data->punto_partida."',  
          '".$data->data->punto_carga."',  
          '".$data->data->punto_decarga."',  
          '".$data->data->punto_retorno."',  
          '".$data->data->guia1."',  
          '".$data->data->guia2."',  
          '".$data->data->tipo."',  
          '".$data->data->conductor."'
          )";
          $qry1 = $db->query($sql1);
     
          if($data->data->comentario){
            $sql2 = "INSERT INTO ope_asignaciones_comentario 
            (id_asignacion, descripcion) VALUES ";
            $sqldata2="";
              foreach ($data->data->comentario as $value) {
                $sqldata2.= "('".$data->data->id."','".$value."'),";
               };
            $sqldata2=substr($sqldata2, 0, -1);       
            $sql2=$sql2.$sqldata2.";";
            $qry2 = $db->query($sql2);
          }
      
        $rpta = array("table1"=>$qry1);
        echo json_encode($rpta);
      break;
      case "sql_resumen_flota_asginacion":
        $tabla = array();
        $tabla2 = array();
        $qry = $db->query("SELECT A.*,I.active FROM (SELECT * FROM ope_asignaciones WHERE id IN (SELECT max(id) AS maximo FROM ope_asignaciones GROUP BY id_vehiculo)) AS A INNER JOIN item as I ON A.id_vehiculo=I.id;");//VERIFICAR PORQUE NO FUNCIONA BIEN EL QUERY
        $totreg = $db->num_rows($qry);     
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla[] = array(
              "nombre" => $rs["nombre"],             
              "fecha" => $rs["fecha_final"],                          
              "vehiculo" => $rs["active"],  
            );   
          }
           //PARA MAS SERIES FALTA REVISAR
        }
        $qry2 = $db->query("select (SELECT count(id) as noAsignados FROM item WHERE id_grupo='10') as NoAsignados, (SELECT count(*) as asignados FROM (SELECT id_vehiculo FROM `ope_asignaciones` GROUP BY id_vehiculo) as T) as Asignados;");
        $totreg2 = $db->num_rows($qry2);
        if ($totreg>0) {
          $rs = $db->fetch_array($qry2);
          $tabla2 = array(
            "NoAsignados" => $rs["NoAsignados"],
            "Asignados" =>$rs["Asignados"]                        
          );  
        }
              
    //respuesta OT
    $rpta = array("tabla"=>$tabla,"general"=>$tabla2);
    echo json_encode($rpta);
      break;
      case "sql_resumen_flota_estado":
        $tabla = array();
        $tabla2 = array();
        $qry = $db->query("select count(estado)as cantidad, estado from (select * from ope_estados where (id_vehiculo,timestamp) in (SELECT id_vehiculo, MAX(timestamp) FROM ope_estados GROUP BY id_vehiculo))as T GROUP BY estado;");
        $qry2 = $db->query("SELECT count(*) as total FROM `item` WHERE id_grupo='10';");//VERIFICAR PORQUE NO FUNCIONA BIEN EL QUERY
        $totreg = $db->num_rows($qry);
        $totreg2 = $db->num_rows($qry2);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla[] = array(
              "cantidad" => $rs["cantidad"],             
              "estado" => $rs["estado"]             
            );   
          }
           //PARA MAS SERIES FALTA REVISAR
        }
        if ($totreg>0) {          
            $rs = $db->fetch_array($qry2);
            $tabla2 =$rs["total"];   
        }
    //respuesta OT
    $rpta = array("tabla"=>$tabla,"total"=>$tabla2);
    echo json_encode($rpta);
      break;
      case "sql_combustible_by_id":
        $tabla = array();
        $qry = $db->query("SELECT fecha as result, SUM(total) as total from tb_combustible WHERE vehiculo='".$data->value."' GROUP by result;");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $axisX[] = $rs["result"];                                   
            $axisY[] = $rs["total"];       
          }
           //PARA MAS SERIES FALTA REVISAR
        }
    
    //respuesta OT
    $rpta = array("axisX"=>$axisX,"axisY"=>array($axisY));
    echo json_encode($rpta);
    break;
    case "sql_gastoOperativo_by_id":
      $tabla = array();
      $qry = $db->query("SELECT fecha as result, SUM(total) as total from tb_gasto_operativo WHERE vehiculo='".$data->value."' GROUP by result;");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);
          $axisX[] = $rs["result"];                                   
          $axisY[] = $rs["total"];       
        }
         //PARA MAS SERIES FALTA REVISAR
      }
  
  //respuesta OT
  $rpta = array("axisX"=>$axisX,"axisY"=>array($axisY));
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
    //var_dump($tabla);
    $rpta = $tabla;
    echo json_encode($rpta);
    break;
    case "06_getAll_gasto_operativo_total_all":
      $tabla1 = array();
      $tabla2 = array();
      $qry = $db->query("SELECT SUBSTRING_INDEX(C.fecha,' ',1) as result, SUM(C.total) as costo from (select * from ope_combustible WHERE YEAR(fecha)=".$data->anio.") as C INNER JOIN item as I ON I.id=C.id_vehiculo WHERE I.id_grupo=10 AND id_clase='".$data->clase."' GROUP by result;");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);
          $tabla1[] = array(
            "date" =>  $rs["result"],                             
            "costo" =>  $rs["costo"]
        );    
        }
         //PARA MAS SERIES FALTA REVISAR
      }
      $qry2 = $db->query("SELECT SUBSTRING_INDEX(C.fecha,' ',1) as result, SUM(C.total) as costo from (select * from ope_otros_gastos WHERE YEAR(fecha)=".$data->anio.") as C INNER JOIN item as I ON I.id=C.id_vehiculo WHERE I.id_grupo=10 AND id_clase='".$data->clase."' GROUP by result;");

      $totreg2 = $db->num_rows($qry2);
      if ($totreg2>0) {
        for($xx=0; $xx<$totreg2; $xx++){
          $rs = $db->fetch_array($qry2);
          $tabla2[] = array(
            "date" => $rs["result"],
            "costo" => $rs["costo"]       
          );
        }
         //PARA MAS SERIES FALTA REVISAR
      }
  //respuesta OT
 // $rpta = array("axisX"=>array_merge($axisX,$axisX2),"axisY"=>array($axisY,$axisY2));
 $rpta = array($tabla1,$tabla2);
  echo json_encode($rpta);
      break;
      case "06_getAll_gasto_operativo_total_all_2":
        $tabla1 = array();
        $tabla2 = array();
        $qry = $db->query("SELECT SUBSTRING_INDEX(C.fecha,' ',1) as result, SUM(C.total) as costo from (select * from ope_combustible WHERE YEAR(fecha)=".$data->anio.") as C INNER JOIN item as I ON I.id=C.id_vehiculo WHERE I.id_grupo=10 GROUP by result;");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla1[] = array(
              "date" =>  $rs["result"],                             
              "costo" =>  $rs["costo"]
          );    
          }
           //PARA MAS SERIES FALTA REVISAR
        }
        $qry2 = $db->query("SELECT SUBSTRING_INDEX(C.fecha,' ',1) as result, SUM(C.total) as costo from (select * from ope_otros_gastos WHERE YEAR(fecha)=".$data->anio.") as C INNER JOIN item as I ON I.id=C.id_vehiculo WHERE I.id_grupo=10 GROUP by result;");
  
        $totreg2 = $db->num_rows($qry2);
        if ($totreg2>0) {
          for($xx=0; $xx<$totreg2; $xx++){
            $rs = $db->fetch_array($qry2);
            $tabla2[] = array(
              "date" => $rs["result"],
              "costo" => $rs["costo"]       
            );
          }
           //PARA MAS SERIES FALTA REVISAR
        }
    //respuesta OT
   // $rpta = array("axisX"=>array_merge($axisX,$axisX2),"axisY"=>array($axisY,$axisY2));
   $rpta = array($tabla1,$tabla2);
    echo json_encode($rpta);
        break;
      case "06_getAll_gasto_operativo_total_all_by_mes":
        $tabla1 = array();
        $tabla2 = array();
        $qry = $db->query("SELECT SUBSTRING_INDEX(C.fecha,' ',1) as result, SUM(C.total) as costo from (select * from ope_combustible WHERE YEAR(fecha)=".$data->anio." AND MONTH(fecha)=".$data->mes.") as C INNER JOIN item as I ON I.id=C.id_vehiculo WHERE I.id_grupo=10 AND id_clase='".$data->clase."' GROUP by result;");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla1[] = array(
              "date" =>  $rs["result"],                             
              "costo" =>  $rs["costo"]
          );    
          }
           //PARA MAS SERIES FALTA REVISAR
        }
        $qry2 = $db->query("SELECT SUBSTRING_INDEX(C.fecha,' ',1) as result, SUM(C.total) as costo from (select * from ope_otros_gastos WHERE YEAR(fecha)=".$data->anio." AND MONTH(fecha)=".$data->mes.") as C INNER JOIN item as I ON I.id=C.id_vehiculo WHERE I.id_grupo=10 AND id_clase='".$data->clase."' GROUP by result;");
  
        $totreg2 = $db->num_rows($qry2);
        if ($totreg2>0) {
          for($xx=0; $xx<$totreg2; $xx++){
            $rs = $db->fetch_array($qry2);
            $tabla2[] = array(
              "date" => $rs["result"],
              "costo" => $rs["costo"]       
            );
          }
           //PARA MAS SERIES FALTA REVISAR
        }
    //respuesta OT
   // $rpta = array("axisX"=>array_merge($axisX,$axisX2),"axisY"=>array($axisY,$axisY2));
   $rpta = array($tabla1,$tabla2);
    echo json_encode($rpta);
        break;
        case "06_getAll_gasto_operativo_total_all_by_mes_2":
          $tabla1 = array();
          $tabla2 = array();
          $qry = $db->query("SELECT SUBSTRING_INDEX(C.fecha,' ',1) as result, SUM(C.total) as costo from (select * from ope_combustible WHERE YEAR(fecha)=".$data->anio." AND MONTH(fecha)=".$data->mes.") as C INNER JOIN item as I ON I.id=C.id_vehiculo WHERE I.id_grupo=10 GROUP by result;");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla1[] = array(
                "date" =>  $rs["result"],                             
                "costo" =>  $rs["costo"]
            );    
            }
             //PARA MAS SERIES FALTA REVISAR
          }
          $qry2 = $db->query("SELECT SUBSTRING_INDEX(C.fecha,' ',1) as result, SUM(C.total) as costo from (select * from ope_otros_gastos WHERE YEAR(fecha)=".$data->anio." AND MONTH(fecha)=".$data->mes.") as C INNER JOIN item as I ON I.id=C.id_vehiculo WHERE I.id_grupo=10 GROUP by result;");
    
          $totreg2 = $db->num_rows($qry2);
          if ($totreg2>0) {
            for($xx=0; $xx<$totreg2; $xx++){
              $rs = $db->fetch_array($qry2);
              $tabla2[] = array(
                "date" => $rs["result"],
                "costo" => $rs["costo"]       
              );
            }
             //PARA MAS SERIES FALTA REVISAR
          }
      //respuesta OT
     // $rpta = array("axisX"=>array_merge($axisX,$axisX2),"axisY"=>array($axisY,$axisY2));
     $rpta = array($tabla1,$tabla2);
      echo json_encode($rpta);
          break;
        case "06_getAll_gasto_operativo_total_all_by_mes_and_vehicle":
          $tabla1 = array();
          $tabla2 = array();
          $qry = $db->query("SELECT SUBSTRING_INDEX(C.fecha,' ',1) as result, SUM(C.total) as costo from (select * from ope_combustible WHERE YEAR(fecha)=".$data->anio." AND MONTH(fecha)=".$data->mes.") as C INNER JOIN item as I ON I.id=C.id_vehiculo WHERE I.id_grupo=10 AND id_clase='".$data->clase."' AND I.id='".$data->vehicle."' GROUP by result;");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla1[] = array(
                "date" =>  $rs["result"],                             
                "costo" =>  $rs["costo"]
            );    
            }
             //PARA MAS SERIES FALTA REVISAR
          }
          $qry2 = $db->query("SELECT SUBSTRING_INDEX(C.fecha,' ',1) as result, SUM(C.total) as costo from (select * from ope_otros_gastos WHERE YEAR(fecha)=".$data->anio." AND MONTH(fecha)=".$data->mes.") as C INNER JOIN item as I ON I.id=C.id_vehiculo WHERE I.id_grupo=10 AND id_clase='".$data->clase."' AND I.id='".$data->vehicle."' GROUP by result;");
    
          $totreg2 = $db->num_rows($qry2);
          if ($totreg2>0) {
            for($xx=0; $xx<$totreg2; $xx++){
              $rs = $db->fetch_array($qry2);
              $tabla2[] = array(
                "date" => $rs["result"],
                "costo" => $rs["costo"]       
              );
            }
             //PARA MAS SERIES FALTA REVISAR
          }
      //respuesta OT
     // $rpta = array("axisX"=>array_merge($axisX,$axisX2),"axisY"=>array($axisY,$axisY2));
     $rpta = array($tabla1,$tabla2);
      echo json_encode($rpta);
          break;
          case "06_getAll_gasto_operativo_total_all_by_mes_and_vehicle_2":
            $tabla1 = array();
            $tabla2 = array();
            $qry = $db->query("SELECT SUBSTRING_INDEX(C.fecha,' ',1) as result, SUM(C.total) as costo from (select * from ope_combustible WHERE YEAR(fecha)=".$data->anio." AND MONTH(fecha)=".$data->mes.") as C INNER JOIN item as I ON I.id=C.id_vehiculo WHERE I.id_grupo=10 AND I.id='".$data->vehicle."' GROUP by result;");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla1[] = array(
                  "date" =>  $rs["result"],                             
                  "costo" =>  $rs["costo"]
              );    
              }
               //PARA MAS SERIES FALTA REVISAR
            }
            $qry2 = $db->query("SELECT SUBSTRING_INDEX(C.fecha,' ',1) as result, SUM(C.total) as costo from (select * from ope_otros_gastos WHERE YEAR(fecha)=".$data->anio." AND MONTH(fecha)=".$data->mes.") as C INNER JOIN item as I ON I.id=C.id_vehiculo WHERE I.id_grupo=10 AND I.id='".$data->vehicle."' GROUP by result;");
      
            $totreg2 = $db->num_rows($qry2);
            if ($totreg2>0) {
              for($xx=0; $xx<$totreg2; $xx++){
                $rs = $db->fetch_array($qry2);
                $tabla2[] = array(
                  "date" => $rs["result"],
                  "costo" => $rs["costo"]       
                );
              }
               //PARA MAS SERIES FALTA REVISAR
            }
        //respuesta OT
       // $rpta = array("axisX"=>array_merge($axisX,$axisX2),"axisY"=>array($axisY,$axisY2));
       $rpta = array($tabla1,$tabla2);
        echo json_encode($rpta);
            break;
      case "06_getAll_gasto_operativo_total_all_by_vehicle":
        $tabla1 = array();
        $tabla2 = array();
        $qry = $db->query("SELECT SUBSTRING_INDEX(C.fecha,' ',1) as result, SUM(C.total) as costo from (select * from ope_combustible WHERE YEAR(fecha)=".$data->anio.") as C INNER JOIN item as I ON I.id=C.id_vehiculo WHERE I.id_grupo=10 AND id_clase='".$data->clase."' AND I.id='".$data->vehicle."' GROUP by result;");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla1[] = array(
              "date" =>  $rs["result"],                             
              "costo" =>  $rs["costo"]
          );    
          }
           //PARA MAS SERIES FALTA REVISAR
        }
        $qry2 = $db->query("SELECT SUBSTRING_INDEX(C.fecha,' ',1) as result, SUM(C.total) as costo from (select * from ope_otros_gastos WHERE YEAR(fecha)=".$data->anio.") as C INNER JOIN item as I ON I.id=C.id_vehiculo WHERE I.id_grupo=10 AND id_clase='".$data->clase."' AND I.id='".$data->vehicle."' GROUP by result;");
  
        $totreg2 = $db->num_rows($qry2);
        if ($totreg2>0) {
          for($xx=0; $xx<$totreg2; $xx++){
            $rs = $db->fetch_array($qry2);
            $tabla2[] = array(
              "date" => $rs["result"],
              "costo" => $rs["costo"]       
            );
          }
           //PARA MAS SERIES FALTA REVISAR
        }
    //respuesta OT
   // $rpta = array("axisX"=>array_merge($axisX,$axisX2),"axisY"=>array($axisY,$axisY2));
   $rpta = array($tabla1,$tabla2);
    echo json_encode($rpta);
        break;
        case "06_getAll_gasto_operativo_total_all_by_vehicle_2":
          $tabla1 = array();
          $tabla2 = array();
          $qry = $db->query("SELECT SUBSTRING_INDEX(C.fecha,' ',1) as result, SUM(C.total) as costo from (select * from ope_combustible WHERE YEAR(fecha)=".$data->anio.") as C INNER JOIN item as I ON I.id=C.id_vehiculo WHERE I.id_grupo=10 AND I.id='".$data->vehicle."' GROUP by result;");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla1[] = array(
                "date" =>  $rs["result"],                             
                "costo" =>  $rs["costo"]
            );    
            }
             //PARA MAS SERIES FALTA REVISAR
          }
          $qry2 = $db->query("SELECT SUBSTRING_INDEX(C.fecha,' ',1) as result, SUM(C.total) as costo from (select * from ope_otros_gastos WHERE YEAR(fecha)=".$data->anio.") as C INNER JOIN item as I ON I.id=C.id_vehiculo WHERE I.id_grupo=10 AND I.id='".$data->vehicle."' GROUP by result;");
    
          $totreg2 = $db->num_rows($qry2);
          if ($totreg2>0) {
            for($xx=0; $xx<$totreg2; $xx++){
              $rs = $db->fetch_array($qry2);
              $tabla2[] = array(
                "date" => $rs["result"],
                "costo" => $rs["costo"]       
              );
            }
             //PARA MAS SERIES FALTA REVISAR
          }
      //respuesta OT
     // $rpta = array("axisX"=>array_merge($axisX,$axisX2),"axisY"=>array($axisY,$axisY2));
     $rpta = array($tabla1,$tabla2);
      echo json_encode($rpta);
          break;
        case "sql_combustible_by_all":
          $tabla1 = array();
          $tabla2 = array();
          $qry = $db->query("SELECT SUBSTRING_INDEX(fecha,' ',1) as result, SUM(total) as costo from (select * from ope_combustible where fecha > current_date - INTERVAL ".$data->period." day)as tabl GROUP by Result;");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla1[] = array(
                "date" =>  $rs["result"],                             
                "costo" =>  $rs["costo"]
            );    
            }
             //PARA MAS SERIES FALTA REVISAR
          }
          $qry2 = $db->query("SELECT SUBSTRING_INDEX(fecha,' ',1) as result, SUM(total) as costo from ope_otros_gastos  GROUP by Result;");

          $totreg2 = $db->num_rows($qry2);
          if ($totreg2>0) {
            for($xx=0; $xx<$totreg2; $xx++){
              $rs = $db->fetch_array($qry2);
              $tabla2[] = array(
                "date" => $rs["result"],
                "costo" => $rs["costo"]       
              );
            }
             //PARA MAS SERIES FALTA REVISAR
          }
      //respuesta OT
     // $rpta = array("axisX"=>array_merge($axisX,$axisX2),"axisY"=>array($axisY,$axisY2));
     $rpta = array($tabla1,$tabla2);
      echo json_encode($rpta);
          break;
          case "06_getAll_combustible_all":
            $tabla1 = array();
            $tabla2 = array();
            $qry = $db->query("SELECT I.active,SUBSTRING_INDEX(C.fecha,' ',1) as result, C.total from (select * from ope_combustible WHERE YEAR(fecha)=".$data->anio.") as C INNER JOIN item as I ON I.id=C.id_vehiculo WHERE I.id_grupo=10 AND id_clase='".$data->clase."'");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla1[] = array(
                  "codigo" => $rs["active"],                             
                  "date" =>  $rs["result"],                             
                  "costo" =>  $rs["total"]
              );    
              }
               //PARA MAS SERIES FALTA REVISAR
            }
            $rpta = array("table"=>$tabla1);
            echo json_encode($rpta);
     // $rpta = $tabla1;
      //  echo json_encode("ss"=>$rpta);
            break;
            case "06_getAll_combustible_all_by_mes":
              $tabla1 = array();
              $tabla2 = array();
              $qry = $db->query("SELECT I.active,SUBSTRING_INDEX(C.fecha,' ',1) as result, C.total from (select * from ope_combustible WHERE YEAR(fecha)=".$data->anio." AND MONTH(fecha)=".$data->mes.") as C INNER JOIN item as I ON I.id=C.id_vehiculo WHERE I.id_grupo=10 AND id_clase='".$data->clase."'");
              $totreg = $db->num_rows($qry);
              if ($totreg>0) {
                for($xx=0; $xx<$totreg; $xx++){
                  $rs = $db->fetch_array($qry);
                  $tabla1[] = array(
                    "codigo" => $rs["active"],                             
                    "date" =>  $rs["result"],                             
                    "costo" =>  $rs["total"]
                );    
                }             
              }
              $rpta = array("table"=>$tabla1);
              echo json_encode($rpta);    
              break;
              case "06_getAll_gasto_operativo_all_by_mes":
                $tabla1 = array();
                $tabla2 = array();
                $qry = $db->query("SELECT I.active,SUBSTRING_INDEX(C.fecha,' ',1) as result, C.total from (select * from ope_otros_gastos WHERE YEAR(fecha)=".$data->anio." AND MONTH(fecha)=".$data->mes.") as C INNER JOIN item as I ON I.id=C.id_vehiculo WHERE I.id_grupo=10 AND id_clase='".$data->clase."'");
                $totreg = $db->num_rows($qry);
                if ($totreg>0) {
                  for($xx=0; $xx<$totreg; $xx++){
                    $rs = $db->fetch_array($qry);
                    $tabla1[] = array(
                      "codigo" => $rs["active"],                             
                      "date" =>  $rs["result"],                             
                      "costo" =>  $rs["total"]
                  );    
                  }             
                }
                $rpta = array("table"=>$tabla1);
                echo json_encode($rpta);    
                break;
            case "06_getAll_combustible_all_by_vehicle":
              $tabla1 = array();
              $tabla2 = array();
              $qry = $db->query("SELECT I.active,SUBSTRING_INDEX(C.fecha,' ',1) as result, C.total from (select * from ope_combustible WHERE YEAR(fecha)=".$data->anio.") as C INNER JOIN item as I ON I.id=C.id_vehiculo WHERE I.id_grupo=10 AND I.id_clase='".$data->clase."'AND I.id='".$data->vehicle."'");
              $totreg = $db->num_rows($qry);
              if ($totreg>0) {
                for($xx=0; $xx<$totreg; $xx++){
                  $rs = $db->fetch_array($qry);
                  $tabla1[] = array(
                    "codigo" => $rs["active"],                             
                    "date" =>  $rs["result"],                             
                    "costo" =>  $rs["total"]
                );    
                }              
              }
              $rpta = array("table"=>$tabla1);
              echo json_encode($rpta);      
              break;
              case "06_getAll_gasto_operativo_all_by_vehicle":
                $tabla1 = array();
                $tabla2 = array();
                $qry = $db->query("SELECT I.active,SUBSTRING_INDEX(C.fecha,' ',1) as result, C.total from (select * from ope_otros_gastos WHERE YEAR(fecha)=".$data->anio.") as C INNER JOIN item as I ON I.id=C.id_vehiculo WHERE I.id_grupo=10 AND I.id_clase='".$data->clase."'AND I.id='".$data->vehicle."'");
                $totreg = $db->num_rows($qry);
                if ($totreg>0) {
                  for($xx=0; $xx<$totreg; $xx++){
                    $rs = $db->fetch_array($qry);
                    $tabla1[] = array(
                      "codigo" => $rs["active"],                             
                      "date" =>  $rs["result"],                             
                      "costo" =>  $rs["total"]
                  );    
                  }              
                }
                $rpta = array("table"=>$tabla1);
                echo json_encode($rpta);      
                break;
              case "06_getAll_combustible_all_by_mes_and_vehicle":
                $tabla1 = array();
                $tabla2 = array();
                $qry = $db->query("SELECT I.active,SUBSTRING_INDEX(C.fecha,' ',1) as result, C.total from (select * from ope_combustible WHERE YEAR(fecha)=".$data->anio." AND MONTH(fecha)=".$data->mes.") as C INNER JOIN item as I ON I.id=C.id_vehiculo WHERE I.id_grupo=10 AND I.id_clase='".$data->clase."'AND I.id='".$data->vehicle."'");
                $totreg = $db->num_rows($qry);
                if ($totreg>0) {
                  for($xx=0; $xx<$totreg; $xx++){
                    $rs = $db->fetch_array($qry);
                    $tabla1[] = array(
                      "codigo" => $rs["active"],                             
                      "date" =>  $rs["result"],                             
                      "costo" =>  $rs["total"]
                  );    
                  }              
                }
                $rpta = array("table"=>$tabla1);
                echo json_encode($rpta);  
                break;
                case "06_getAll_gasto_operativo_all_by_mes_and_vehicle":
                  $tabla1 = array();
                  $tabla2 = array();
                  $qry = $db->query("SELECT I.active,SUBSTRING_INDEX(C.fecha,' ',1) as result, C.total from (select * from ope_otros_gastos WHERE YEAR(fecha)=".$data->anio." AND MONTH(fecha)=".$data->mes.") as C INNER JOIN item as I ON I.id=C.id_vehiculo WHERE I.id_grupo=10 AND I.id_clase='".$data->clase."'AND I.id='".$data->vehicle."'");
                  $totreg = $db->num_rows($qry);
                  if ($totreg>0) {
                    for($xx=0; $xx<$totreg; $xx++){
                      $rs = $db->fetch_array($qry);
                      $tabla1[] = array(
                        "codigo" => $rs["active"],                             
                        "date" =>  $rs["result"],                             
                        "costo" =>  $rs["total"]
                    );    
                    }              
                  }
                  $rpta = array("table"=>$tabla1);
                  echo json_encode($rpta);  
                  break;
          case "sql_combustible_report_by_id":
            $tabla1 = array();
            $qry = $db->query("SELECT SUBSTRING_INDEX(fecha,' ',1) as result, SUM(total) as costo from (select * from ope_combustible where id_vehiculo=".$data->value." AND  fecha > current_date - INTERVAL ".$data->period." day)as tabl GROUP by Result;");
            $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla1[] = array(
                "date" =>  $rs["result"],                             
                "costo" =>  $rs["costo"]
            );    
            }
             //PARA MAS SERIES FALTA REVISAR
          }
          $rpta = array($tabla1);
          echo json_encode($rpta);
          break;
          case "sql_mantenimiento_report_by_id":
            $tabla1 = array();
            $qry = $db->query("SELECT SUBSTRING_INDEX(fecha_ini,' ',1) as result, SUM(precio) as costo from (select * from tb_mantenimiento where id_vehiculo=".$data->value." AND  fecha_ini > current_date - INTERVAL ".$data->period." day)as tabl GROUP by Result;");
            $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla1[] = array(
                "date" =>  $rs["result"],                             
                "costo" =>  $rs["costo"]
            );    
            }
             //PARA MAS SERIES FALTA REVISAR
          }
          $rpta = array($tabla1);
          echo json_encode($rpta);
          break;
          case "sql_costoOperacional_report_by_id":
            $tabla1 = array();
            $qry = $db->query("SELECT SUBSTRING_INDEX(fecha,' ',1) as result, SUM(total) as costo from (select * from ope_otros_gastos where id_vehiculo=".$data->value." AND  fecha > current_date - INTERVAL ".$data->period." day) as tabl GROUP by Result;");
            $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla1[] = array(
                "date" =>  $rs["result"],                             
                "costo" =>  $rs["costo"]
            );    
            }
             //PARA MAS SERIES FALTA REVISAR
          }
          $rpta = array($tabla1);
          echo json_encode($rpta);
          break;
          case "sql_costoOperacional_report_by_idTotal":
            $tabla1 = array();
            $tabla2 = array();
            $qry = $db->query("SELECT SUBSTRING_INDEX(fecha,' ',1) as result, SUM(total) as costo from (select * from ope_combustible where id_vehiculo=".$data->value." AND fecha > current_date - INTERVAL ".$data->period." day) as tabl GROUP by Result;");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla1[] = array(
                  "date" =>  $rs["result"],                             
                  "costo" =>  $rs["costo"]
              );    
              }
               //PARA MAS SERIES FALTA REVISAR
            }
            $qry2 = $db->query("SELECT SUBSTRING_INDEX(fecha,' ',1) as result, SUM(total) as costo from (select * from ope_otros_gastos where id_vehiculo=".$data->value." AND fecha > current_date - INTERVAL ".$data->period." day) as tabl GROUP by Result;");
  
            $totreg2 = $db->num_rows($qry2);
            if ($totreg2>0) {
              for($xx=0; $xx<$totreg2; $xx++){
                $rs = $db->fetch_array($qry2);
                $tabla2[] = array(
                  "date" => $rs["result"],
                  "costo" => $rs["costo"]       
                );
              }
               //PARA MAS SERIES FALTA REVISAR
            }
        //respuesta OT
       // $rpta = array("axisX"=>array_merge($axisX,$axisX2),"axisY"=>array($axisY,$axisY2));
       $rpta = array($tabla1,$tabla2);
        echo json_encode($rpta);
          break;
          case "sql_costoOperacional_report_by_id_vehiculo":
            $tabla1 = array();
            $tabla2 = array();
            $qry = $db->query("SELECT SUBSTRING_INDEX(fecha,' ',1) as result, SUM(total) as costo from (select * from ope_combustible where id_vehiculo='".$data->value."' AND fecha > current_date - INTERVAL ".$data->period." day) as tabl GROUP by Result;");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla1[] = array(
                  "date" =>  $rs["result"],                             
                  "costo" =>  $rs["costo"]
              );    
              }
               //PARA MAS SERIES FALTA REVISAR
            }
            $qry2 = $db->query("SELECT SUBSTRING_INDEX(fecha,' ',1) as result, SUM(total) as costo from (select * from ope_otros_gastos where id_vehiculo='".$data->value."' AND fecha > current_date - INTERVAL ".$data->period." day) as tabl GROUP by Result;");
  
            $totreg2 = $db->num_rows($qry2);
            if ($totreg2>0) {
              for($xx=0; $xx<$totreg2; $xx++){
                $rs = $db->fetch_array($qry2);
                $tabla2[] = array(
                  "date" => $rs["result"],
                  "costo" => $rs["costo"]       
                );
              }
               //PARA MAS SERIES FALTA REVISAR
            }
        //respuesta OT
       // $rpta = array("axisX"=>array_merge($axisX,$axisX2),"axisY"=>array($axisY,$axisY2));
       $rpta = array($tabla1,$tabla2);
        echo json_encode($rpta);
          break;
          case "sql_mantenimiento_by_all":
            $tabla = array();
            $column= array();
            $qry = $db->query("SELECT fecha_ini as result, SUM(precio) as costo from tb_mantenimiento GROUP by Result;");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "date" => $rs["result"],
                  "costo" => $rs["costo"]       
                );    
              }
               //PARA MAS SERIES FALTA REVISAR
            }
        
        //respuesta OT
        $rpta = array($tabla);
        echo json_encode($rpta);
        break;
        case "sql_mantenimiento_by_id":
          $tabla = array();
          $column= array();
          $qry = $db->query("SELECT fecha_ini as result, SUM(precio) as costo from tb_mantenimiento WHERE vehiculo='".$data->value."' GROUP by Result;");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $axisX[] = $rs["result"];                                   
              $axisY[] = $rs["costo"];       
            }
             //PARA MAS SERIES FALTA REVISAR
          }
      
      //respuesta OT
      $rpta = array("axisX"=>$axisX,"axisY"=>array($axisY));
      echo json_encode($rpta);
        break;
        case "sql_Tarea_vehiculo": 
          $tabla = array();
          $column= array();
          $qry = $db->query("SELECT T.*,A.nombre as 'nombre_responsable',A.apellido as 'apellido_responsable',ASP.nombre as 'nombre_conductor',ASP.apellido as 'apellido_conductor' FROM `ope_tarea` AS T INNER JOIN `per_aspirante` as A ON T.id_responsable=A.id INNER JOIN `per_aspirante` as ASP ON T.id_conductor=ASP.id WHERE T.id_vehiculo='".$data->value."'");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla[] = array(
                "id" => $rs["id"],             
                "nombre" => $rs["nombre"],
                "tipo" => $rs["tipo"],
                "fecha_limite"=> $rs["fecha"],
                "prioridad"=> $rs["prioridad"],
                "Responsable"=> $rs["nombre_responsable"]." ".$rs["apellido_responsable"],
                "Conductor"=> $rs["nombre_conductor"]." ".$rs["apellido_conductor"],
               // "Proveedor"=> $rs["Proveedor"],
              );
            }
              $column=array(
                (object) array('key' => 'id','title' => 'ID'),
                (object) array('key' => 'nombre','title' => 'Nombre'),
                (object) array('key' => 'tipo','title' => 'Tipo'),
                (object) array('key' => 'fecha_limite','title' => 'Fecha'),
                (object) array('key' => 'prioridad','title' => 'Prioridad'),
                (object) array('key' => 'Responsable','title' => 'Responsable'),               
                (object) array('key' => 'Conductor','title' => 'Conductor'),
               // (object) array('key' => 'Proveedor','title' => 'Proveedor'),
              );
          }
      
      //respuesta OT
      $rpta = array("data"=>$tabla,"column"=>$column);
    //  var_dump($rpta);
      echo json_encode($rpta);
      break;
        case "sql_combustible_vehiculo": 
          $tabla = array();
          $column= array();
          $qry = $db->query("SELECT C.*,E.active,T.nombre,T.apellido FROM `ope_combustible`as C INNER JOIN `item` as E on C.id_vehiculo= E.id INNER JOIN `per_aspirante` AS T on C.id_conductor=T.id WHERE id_vehiculo='".$data->value."'");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla[] = array(
                "id" => $rs["id"],             
                "tipo" => $rs["tipo_combustible"],
                "vehiculo" => $rs["active"],
                "conductor" => $rs["nombre"]." ".$rs["apellido"],
                "fecha"=> $rs["fecha"],
                "cantidad"=> $rs["cantidad"],
                "total"=> "S/. ".$rs["total"]                       
              );
            }
            $column=array(
              (object) array('key' => 'id','title' => 'ID'),         
              (object) array('key' => 'vehiculo','title' => 'Codigo'),
              (object) array('key' => 'conductor','title' => 'Conductor'),
              (object) array('key' => 'tipo','title' => 'Tipo'),
              (object) array('key' => 'fecha','title' => 'Fecha'),
              (object) array('key' => 'cantidad','title' => 'Cantidad'),
              (object) array('key' => 'total','title' => 'Total')               
            );
          }          
      $rpta = array("data"=>$tabla,"column"=>$column);
      echo json_encode($rpta);



     /*     $tabla = array();
          $column= array();
          $qry = $db->query("SELECT * FROM `ope_combustible` as C INNER JOIN `proveedor` as P ON C.id_proveedor=P.id WHERE id_vehiculo='".$data->value."'");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla[] = array(
                "id" => $rs["id"],             
                "tipo" => $rs["tipo_combustible"],
                "proveedor" => $rs["razon_social"],
                "cantidad"=> $rs["cantidad"],
               // "vehiculo"=> $rs["vehiculo"],
                "total"=> $rs["total"]                       
              );
            }
              $column=array(
                (object) array('key' => 'id','title' => 'ID'),
                (object) array('key' => 'tipo','title' => 'Tipo'),
                (object) array('key' => 'proveedor','title' => 'Proveedor'),
                (object) array('key' => 'cantidad','title' => 'Cantidad'),
             //   (object) array('key' => 'vehiculo','title' => 'Vehiculo'),
                (object) array('key' => 'total','title' => 'Total')               
              );
          }
      
      //respuesta OT
      $rpta = array("data"=>$tabla,"column"=>$column);
      echo json_encode($rpta);*/
      break;
      case "sql_mantenimiento_vehiculo": 
        $tabla = array();
        $column= array();
        $qry = $db->query("SELECT * FROM `tb_mantenimiento` WHERE vehiculo='".$data->value."'");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla[] = array(
              "id" => $rs["id"],             
              "servicio" => $rs["servicio"],
              "tipo" => $rs["tipo"],
              "fecha_ini"=> $rs["fecha_ini"],
              "fecha_fin"=> $rs["fecha_fin"],
              "total"=> $rs["causa"],
              "responsable"=> $rs["responsable"]              
                              
            );
          }
            $column=array(
              (object) array('key' => 'id','title' => 'ID'),
              (object) array('key' => 'servicio','title' => 'Servicio'),
              (object) array('key' => 'tipo','title' => 'Tipo'),
              (object) array('key' => 'fecha_ini','title' => 'Fecha Inicial'),
              (object) array('key' => 'fecha_fin','title' => 'Fecha Final'),
              (object) array('key' => 'total','title' => 'Total'),               
              (object) array('key' => 'responsable','title' => 'Responsable')
            );
        }
    
    //respuesta OT
    $rpta = array("data"=>$tabla,"column"=>$column);
    echo json_encode($rpta);
    break;
    case "sql_gastosOperativos_vehiculo": 
      $tabla = array();
      $column= array();
      $qry = $db->query("SELECT G.*,I.active FROM `ope_otros_gastos` AS G INNER JOIN `item` as I ON G.id_vehiculo=I.id WHERE id_vehiculo='".$data->value."'");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);
          $tabla[] = array(
            "id" => $rs["id"],             
            "nombre" => $rs["nombre"],
            "tipo" => $rs["tipo"],
            "fecha"=> $rs["fecha"],          
            "vehiculo"=> $rs["active"],
            "precio"=> "S/. ".$rs["precio"],
            "cantidad"=> $rs["cantidad"],
            "total"=> "S/. ".$rs["total"]                       
          );
        }
        $column=array(
          (object) array('key' => 'id','title' => 'ID'),
          (object) array('key' => 'vehiculo','title' => 'Codigo'),
          (object) array('key' => 'nombre','title' => 'Descripcion de Gasto'),
       
          (object) array('key' => 'fecha','title' => 'Fecha'),
          (object) array('key' => 'precio','title' => 'Precio Unitario'),
          (object) array('key' => 'cantidad','title' => 'Cantidad'),
          (object) array('key' => 'total','title' => 'Total'),
        );
      }
  
  //respuesta OT
  $rpta = array("data"=>$tabla,"column"=>$column);
  echo json_encode($rpta);

/*
      $tabla = array();
      $column= array();
      $qry = $db->query("SELECT * FROM `ope_otros_gastos` WHERE id_vehiculo='".$data->value."'");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);
          $tabla[] = array(
            "id" => $rs["id"],             
            "nombre" => $rs["nombre"],
            "tipo" => $rs["tipo"],
            "fecha"=> $rs["fecha"],  
            "hora"=> $rs["hora"],
            "total"=> $rs["total"]
                       
                            
          );
        }
          $column=array(
            (object) array('key' => 'id','title' => 'ID'),
            (object) array('key' => 'nombre','title' => 'Nombre'),
            (object) array('key' => 'tipo','title' => 'Tipo'),
            (object) array('key' => 'fecha','title' => 'Fecha'),
            (object) array('key' => 'hora','title' => 'Hora'),
            (object) array('key' => 'total','title' => 'Total')
          );
      }
  
  //respuesta OT
  $rpta = array("data"=>$tabla,"column"=>$column);
  echo json_encode($rpta);*/
  break;
  case "sql_get_last_requerimiento_mantenimiento":
    $tabla = array();
    $qry = $db->query("SELECT n FROM `ope_solicitud_mantenimiento` order by n desc limit 1;");
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
case "01_gridSolicitudMantenimiento": 
  $tabla = array();
  $qry = $db->query("SELECT I.*,R.*,E.descripcion as 'estado_descripcion',A.descripcion as 'area_descripcion',TP.descripcion AS 'tipo_mantenimiento' FROM `ope_solicitud_mantenimiento` as R INNER JOIN `item` as I ON R.id_vehiculo=I.id INNER JOIN `per_estado` as E ON E.id=R.estado INNER JOIN `per_area` as A ON A.id=R.asignado INNER JOIN `man_tipo_mantenimiento` as TP ON TP.id=R.tipo  WHERE R.asignado='3' ORDER BY n ASC;");
  $totreg = $db->num_rows($qry);
  if ($totreg>0) {
    for($xx=0; $xx<$totreg; $xx++){
      $rs = $db->fetch_array($qry);
      $tabla[] = array(
        "id" => $rs["id"],
        "vehiculo" =>$rs["active"],
        "asignado" => $rs["area_descripcion"],
        "prioridad" => $rs["prioridad"],
        "tipo"=> $rs["tipo_mantenimiento"],               
        "fecha"=> $rs["fecha"],
        "estado"=> $rs["estado_descripcion"]
      );
    }
    $column=array(
      (object) array('key' => 'id','title' => 'RQ Mantenimiento'),
      (object) array('key' => 'vehiculo','title' => 'Codigo'),
      (object) array('key' => 'asignado','title' => 'Area'),
      (object) array('key' => 'prioridad','title' => 'Prioridad'),
      (object) array('key' => 'tipo','title' => 'Tipo'),
      (object) array('key' => 'fecha','title' => 'Fecha'),
      (object) array('key' => 'estado','title' => 'Estado')
    );
  }

//respuesta OT
$rpta = array("data"=>$tabla,"column"=>$column);
echo json_encode($rpta);
break;
        case "01_getbyId": 
            $tabla = array();
            $qry = $db->query("select * from tb_equipos where id_eq='".$data->id."' and status=1");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
                for($xx=0; $xx<$totreg; $xx++){
                    $rs = $db->fetch_array($qry);
                    $tabla[] = array(
                        "id" => $rs["id_eq"],
                        "nombre" => $rs["codigo"]." ".$rs["descripcion"],
                        "placa" => $rs["placa"],
                        "serie" => $rs["serie"],
                        "estado"=> $rs["estado"],
                        "tipo"=> $rs["tipo"],
                        "grupo"=> $rs["grupo"],
                        "conductor_asignado"=> $rs["conductor_asignado"],
                        "odometro"=> $rs["odometro"],
                        "marca"=> $rs["marca"],
                        "modelo"=> $rs["modelo"],
                        "anio"=> $rs["anio"],
                        "propiedad"=> $rs["propiedad"],
                        "arrendamiento_fin"=> $rs["arrendamiento_fin"],
                        "arrendamiento_inicio"=> $rs["arrendamiento_inicio"],
                        "arrendamiento_total"=> $rs["arrendamiento_total"],
                        "status"=> $rs["status"],
                        "ciudad"=> $rs["ciudad"],
                        "combustible"=> $rs["combustible"],
                        "propio"=> $rs["propio"]

                    );
                }
            }

        //respuesta OT
        $rpta = array("tabla"=>$tabla);
        echo json_encode($rpta);
        break;

        case "01_getSegurobyId":
            $tabla = array();
            $qry = $db->query("select * from tb_seguro where vehiculo='".$data->id."' and status=1");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
                for($xx=0; $xx<$totreg; $xx++){
                    $rs = $db->fetch_array($qry);
                    $tabla[] = array(
                        "id" => $rs["id"],
                        "proveedor" => $rs["proveedor"],
                        "Referencia" => $rs["Referencia"],
                        "fecha_inicio" => $rs["fecha_inicio"],
                        "fecha_vencimiento"=> $rs["fecha_vencimiento"],
                        "vehiculo"=> $rs["vehiculo"],
                        "subtotal"=> $rs["subtotal"],
                        "status"=> $rs["status"],
                        "comentarios"=> $rs["comentarios"]
                      
                    );
                }
            }

        //respuesta OT
        $rpta = array("tabla"=>$tabla);
        echo json_encode($rpta);
        break;


        case "01_getPropiedadbyId":
            $tabla = array();
            $qry = $db->query("select * from tb_propiedad where id='".$data->id."' and status=1");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
                for($xx=0; $xx<$totreg; $xx++){
                    $rs = $db->fetch_array($qry);
                    $tabla[] = array(
                        "id" => $rs["id"],
                        "proveedor" => $rs["proveedor"],
                        "fecha_compra" => $rs["fecha_compra"],
                        "precio" => $rs["precio"],
                        "fecha_garantia"=> $rs["fecha_garantia"],
                        "notas"=> $rs["notas"],
                        "documentos"=> $rs["documentos"],
                        "status"=> $rs["status"]
                        
                      
                    );
                }
            }

        //respuesta OT
        $rpta = array("tabla"=>$tabla);
        echo json_encode($rpta);
        break;

        case "01_getCombustiblebyId":
            $tabla = array();
            $qry = $db->query("select * from tb_combustible where id='".$data->id."' and status=1");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
                for($xx=0; $xx<$totreg; $xx++){
                    $rs = $db->fetch_array($qry);
                    $tabla[] = array(
                        "id" => $rs["id"],
                        "capacidad" => $rs["capacidad"],
                        "rendimiento_a" => $rs["rendimiento_a"],
                        "rendimiento_b" => $rs["rendimiento_b"],
                        "status"=> $rs["status"]
                    );
                }
            }

        //respuesta OT
        $rpta = array("tabla"=>$tabla);
        echo json_encode($rpta);
        break;
        case "delete_Odometro":
          
          $qry1 = $db->query("DELETE from  ope_odometro WHERE id='".$data->value."'");
        
             
          $rpta = array("error"=>0,"qry1"=>$qry1);
          echo json_encode($rpta);
  
        break;

        case "01_getMainData":
          $tabla1 = array();
          $tabla2 = array();
          $tabla3 = array();
          $tabla4 = array();
          $tabla5 = array();
          $tabla6 = array();
          $tabla7 = array();
          $tabla8 = array();


          $tabla11 = array();
          $tabla12 = array();
          $tabla13 = array();
          $tabla14 = array();
          $tabla15 = array();
          $tabla16 = array();
          $tabla17 = array();


          $qry1 = $db->query("SELECT I.*,C.description as 'clase_descripcion',G.description as 'grupo_descripcion' FROM `item` AS I INNER JOIN `clase` as C on I.id_clase=C.code INNER JOIN `tb_grupo` as G on G.code=I.id_grupo WHERE I.id_grupo=10 AND C.grupo=10 AND I.id='".$data->value."'");
          $qry2 = $db->query("SELECT * FROM `ope_asignaciones` as A INNER JOIN `per_personal` as C on A.id_conductor=C.id WHERE id_vehiculo='".$data->value."' order by A.timestamp DESC limit 1");
          $qry3 = $db->query("SELECT * FROM `ope_estados` WHERE id_vehiculo='".$data->value."' order by timestamp DESC limit 1");
          $qry4 = $db->query("SELECT * FROM `ope_odometro` WHERE id_vehiculo='".$data->value."' order by timestamp DESC limit 1");

         // $qry5 = $db->query("SELECT * FROM `tb_seguro` WHERE vehiculo='".$data->value."'");

          $qry6 = $db->query("SELECT * FROM `ope_combustible` WHERE id_vehiculo='".$data->value."' order by timestamp DESC limit 1");

         // $qry7 = $db->query("SELECT * FROM `tb_propiedad` WHERE vehiculo='".$data->value."'");

         // $qry8 = $db->query("SELECT * FROM `tb_accesorios` WHERE vehiculo='".$data->value."'");


          $totreg1 = $db->num_rows($qry1);
          $totreg2 = $db->num_rows($qry2);
          $totreg3 = $db->num_rows($qry3);
          $totreg4 = $db->num_rows($qry4);
         // $totreg5 = $db->num_rows($qry5);
          $totreg6 = $db->num_rows($qry6);
         // $totreg7 = $db->num_rows($qry7);
         // $totreg8 = $db->num_rows($qry8);


         $qry11 = $db->query("SELECT TP.id AS 'id_tipo',IC.*,G.description as 'grupo_descripcion',C.description as 'clase_descripcion' FROM `log_vehiculo_sistema` AS VS INNER JOIN `item` AS I ON VS.id_vehiculo=I.id INNER JOIN `log_tipo_sistema` AS TP ON TP.id=VS.id_tipo INNER JOIN `log_componente` AS LG ON LG.id=VS.id_componnente INNER JOIN `item` AS IC ON IC.id=LG.id_item INNER JOIN `tb_grupo` AS G ON G.code=IC.id_grupo INNER JOIN `clase` AS C ON C.code=IC.id_clase where C.grupo=G.code AND TP.id='1' AND I.id='".$data->value."'");

         $qry12 = $db->query("SELECT TP.id AS 'id_tipo',IC.*,G.description as 'grupo_descripcion',C.description as 'clase_descripcion' FROM `log_vehiculo_sistema` AS VS INNER JOIN `item` AS I ON VS.id_vehiculo=I.id INNER JOIN `log_tipo_sistema` AS TP ON TP.id=VS.id_tipo INNER JOIN `log_componente` AS LG ON LG.id=VS.id_componnente INNER JOIN `item` AS IC ON IC.id=LG.id_item INNER JOIN `tb_grupo` AS G ON G.code=IC.id_grupo INNER JOIN `clase` AS C ON C.code=IC.id_clase where C.grupo=G.code AND TP.id='2' AND I.id='".$data->value."'");

         $qry13 = $db->query("SELECT TP.id AS 'id_tipo',IC.*,G.description as 'grupo_descripcion',C.description as 'clase_descripcion' FROM `log_vehiculo_sistema` AS VS INNER JOIN `item` AS I ON VS.id_vehiculo=I.id INNER JOIN `log_tipo_sistema` AS TP ON TP.id=VS.id_tipo INNER JOIN `log_componente` AS LG ON LG.id=VS.id_componnente INNER JOIN `item` AS IC ON IC.id=LG.id_item INNER JOIN `tb_grupo` AS G ON G.code=IC.id_grupo INNER JOIN `clase` AS C ON C.code=IC.id_clase where C.grupo=G.code AND TP.id='3' AND I.id='".$data->value."'");

         $qry14 = $db->query("SELECT TP.id AS 'id_tipo',IC.*,G.description as 'grupo_descripcion',C.description as 'clase_descripcion' FROM `log_vehiculo_sistema` AS VS INNER JOIN `item` AS I ON VS.id_vehiculo=I.id INNER JOIN `log_tipo_sistema` AS TP ON TP.id=VS.id_tipo INNER JOIN `log_componente` AS LG ON LG.id=VS.id_componnente INNER JOIN `item` AS IC ON IC.id=LG.id_item INNER JOIN `tb_grupo` AS G ON G.code=IC.id_grupo INNER JOIN `clase` AS C ON C.code=IC.id_clase where C.grupo=G.code AND TP.id='4' AND I.id='".$data->value."'");

         $qry15 = $db->query("SELECT TP.id AS 'id_tipo',IC.*,G.description as 'grupo_descripcion',C.description as 'clase_descripcion' FROM `log_vehiculo_sistema` AS VS INNER JOIN `item` AS I ON VS.id_vehiculo=I.id INNER JOIN `log_tipo_sistema` AS TP ON TP.id=VS.id_tipo INNER JOIN `log_componente` AS LG ON LG.id=VS.id_componnente INNER JOIN `item` AS IC ON IC.id=LG.id_item INNER JOIN `tb_grupo` AS G ON G.code=IC.id_grupo INNER JOIN `clase` AS C ON C.code=IC.id_clase where C.grupo=G.code AND TP.id='5' AND I.id='".$data->value."'");

         $qry16 = $db->query("SELECT TP.id AS 'id_tipo',IC.*,G.description as 'grupo_descripcion',C.description as 'clase_descripcion' FROM `log_vehiculo_sistema` AS VS INNER JOIN `item` AS I ON VS.id_vehiculo=I.id INNER JOIN `log_tipo_sistema` AS TP ON TP.id=VS.id_tipo INNER JOIN `log_componente` AS LG ON LG.id=VS.id_componnente INNER JOIN `item` AS IC ON IC.id=LG.id_item INNER JOIN `tb_grupo` AS G ON G.code=IC.id_grupo INNER JOIN `clase` AS C ON C.code=IC.id_clase where C.grupo=G.code AND TP.id='6' AND I.id='".$data->value."'");

         $qry17 = $db->query("SELECT TP.id AS 'id_tipo',IC.*,G.description as 'grupo_descripcion',C.description as 'clase_descripcion' FROM `log_vehiculo_sistema` AS VS INNER JOIN `item` AS I ON VS.id_vehiculo=I.id INNER JOIN `log_tipo_sistema` AS TP ON TP.id=VS.id_tipo INNER JOIN `log_componente` AS LG ON LG.id=VS.id_componnente INNER JOIN `item` AS IC ON IC.id=LG.id_item INNER JOIN `tb_grupo` AS G ON G.code=IC.id_grupo INNER JOIN `clase` AS C ON C.code=IC.id_clase where C.grupo=G.code AND TP.id='7' AND I.id='".$data->value."'");



         $totreg11 = $db->num_rows($qry11);
         $totreg12 = $db->num_rows($qry12);
         $totreg13 = $db->num_rows($qry13);
         $totreg14 = $db->num_rows($qry14);
         $totreg15 = $db->num_rows($qry15);
         $totreg16 = $db->num_rows($qry16);
         $totreg17 = $db->num_rows($qry17);



          if ($totreg1>0) {          
              $rs = $db->fetch_array($qry1);
              $tabla1 = array(
                  "id" => $rs["id"],
                  "codigo" => $rs["active"],
                  //"descripcion" => $rs["descripcion"],
                //  "marca" => $rs["marca"],
                //  "modelo" => $rs["modelo"], 
                //  "placa" => $rs["placa"],  
                  //"anio" => $rs["anio"],  
                  //"propiedad" => $rs["propiedad"],
                  "serie" => $rs["serie"],
                  "parte" => $rs["parte"],
                  "clase" => $rs["clase_descripcion"],
                  "fecha_adquisicion" => $rs["date_acquisition"],
                  "fin_garantia" => $rs["fin_garantia"],
                  "inicio_garantia" => $rs["inicio_garantia"],
                  "condicion" => $rs["condicion"],
                  "grupo" => $rs["grupo_descripcion"]              
              );          
          }
          if ($totreg2>0) {          
            $rs = $db->fetch_array($qry2);
            $tabla2 = array(
                "id" => $rs["id"],
                "nombres" => $rs["nombre"]." ".$rs["apellido"],         
            );          
        }
        if ($totreg3>0) {          
          $rs = $db->fetch_array($qry3);
          $tabla3 = array(
              "id" => $rs["id"],              
              "estado" => $rs["estado"],      
          );          
      }
      if ($totreg4>0) {          
        $rs = $db->fetch_array($qry4);
        $tabla4 = array(
            "id" => $rs["id"],
            "odometro" => $rs["odometro"],      
        );          
    }
   /* if ($totreg5>0) {          
      for($xx=0; $xx<$totreg5; $xx++){
      $rs = $db->fetch_array($qry5);
      $tabla5[] = array(
          "id" => $rs["id"],
          "proveedor" => $rs["proveedor"],      
          "Referencia" => $rs["Referencia"],    
          "fecha_inicio" => $rs["fecha_inicio"],    
          "fecha_vencimiento" => $rs["fecha_vencimiento"],    
          "documentos" => $rs["documentos"],   
          "total" => $rs["total"]  
      );          
    }
   }*/
   if ($totreg6>0) {          
    $rs = $db->fetch_array($qry6);
    $tabla6 = array(
        "id" => $rs["id"],
        "total" => $rs["total"],      
        "precio" => $rs["precio"],    
        "fecha" => $rs["fecha"],  
        "cantidad" => $rs["cantidad"],    
        "tipo" => $rs["tipo_combustible"],
       // "proveedor" => $rs["proveedor"],
    );          
  
 }
   /* if ($totreg7>0) {          
      $rs = $db->fetch_array($qry7);
      $tabla7 = array(
          "id" => $rs["id"],
          "proveedor" => $rs["proveedor"],      
          "fecha_compra" => $rs["fecha_compra"],    
          "precio" => $rs["precio"],    
          "fecha_garantia" => $rs["fecha_garantia"],
          "notas" => $rs["notas"],
          "documentos" => $rs["documentos"]
      );          

    }*/
  /*  if ($totreg8>0) {          
      $rs = $db->fetch_array($qry8);
      $tabla8 = array(
          "id" => $rs["id"],
          "dist_ejes" => $rs["dist_ejes"],      
          "anc_eje_frontal" => $rs["anc_eje_frontal"],    
          "sis_frenado1" => $rs["sis_frenado1"],    
          "dia_neumaticos_tras" => $rs["dia_neumaticos_tras"],
          "tipo_neumaticos_tras" => $rs["tipo_neumaticos_tras"],
          "tipo_neumaticos_delant" => $rs["tipo_neumaticos_delant"],
          "sis_frenado" => $rs["sis_frenado"],
          "anc_eje_trasero" => $rs["anc_eje_trasero"],
          "dia_neumaticos_delant" => $rs["dia_neumaticos_delant"],
          "eje_posterior" => $rs["eje_posterior"],
          "psi_neumaticos_delanteros" => $rs["psi_neumaticos_delanteros"],
          "psi_neumaticos_traseros" => $rs["psi_neumaticos_traseros"],
          "sis_frenado2" => $rs["sis_frenado2"]
      );          

    }*/

    if ($totreg11>0) {
      for($xx=0; $xx<$totreg11; $xx++){
        $rs = $db->fetch_array($qry11);
        $tabla11[] = array(
          "id" => $rs["id"],             
          "serie" => $rs["serie"],
          "parte" => $rs["parte"],            
          "fecha_adquisicion" => $rs["date_acquisition"],
          "active" => $rs["active"],
          "condicion" => $rs["condicion"],
          "inicio_garantia" => $rs["inicio_garantia"],
          "fin_garantia" => $rs["fin_garantia"],
          "grupo" => $rs["grupo_descripcion"],
          "clase" => $rs["clase_descripcion"],
    
        );
      }
    }
      if ($totreg12>0) {
        for($xx=0; $xx<$totreg12; $xx++){
          $rs = $db->fetch_array($qry12);
          $tabla12[] = array(
            "id" => $rs["id"],             
            "serie" => $rs["serie"],
            "parte" => $rs["parte"],            
            "fecha_adquisicion" => $rs["date_acquisition"],
            "active" => $rs["active"],
            "condicion" => $rs["condicion"],
            "inicio_garantia" => $rs["inicio_garantia"],
            "fin_garantia" => $rs["fin_garantia"],
            "grupo" => $rs["grupo_descripcion"],
            "clase" => $rs["clase_descripcion"],
      
          );
        }
      }
        if ($totreg13>0) {
          for($xx=0; $xx<$totreg13; $xx++){
            $rs = $db->fetch_array($qry13);
            $tabla13[] = array(
              "id" => $rs["id"],             
              "serie" => $rs["serie"],
              "parte" => $rs["parte"],            
              "fecha_adquisicion" => $rs["date_acquisition"],
              "active" => $rs["active"],
              "condicion" => $rs["condicion"],
              "inicio_garantia" => $rs["inicio_garantia"],
              "fin_garantia" => $rs["fin_garantia"],
              "grupo" => $rs["grupo_descripcion"],
              "clase" => $rs["clase_descripcion"],
        
            );
          }
        }
          if ($totreg14>0) {
            for($xx=0; $xx<$totreg14; $xx++){
              $rs = $db->fetch_array($qry14);
              $tabla14[] = array(
                "id" => $rs["id"],             
                "serie" => $rs["serie"],
                "parte" => $rs["parte"],            
                "fecha_adquisicion" => $rs["date_acquisition"],
                "active" => $rs["active"],
                "condicion" => $rs["condicion"],
                "inicio_garantia" => $rs["inicio_garantia"],
                "fin_garantia" => $rs["fin_garantia"],
                "grupo" => $rs["grupo_descripcion"],
                "clase" => $rs["clase_descripcion"],
          
              );
            }
          }
            if ($totreg15>0) {
              for($xx=0; $xx<$totreg15; $xx++){
                $rs = $db->fetch_array($qry15);
                $tabla15[] = array(
                  "id" => $rs["id"],             
                  "serie" => $rs["serie"],
                  "parte" => $rs["parte"],            
                  "fecha_adquisicion" => $rs["date_acquisition"],
                  "active" => $rs["active"],
                  "condicion" => $rs["condicion"],
                  "inicio_garantia" => $rs["inicio_garantia"],
                  "fin_garantia" => $rs["fin_garantia"],
                  "grupo" => $rs["grupo_descripcion"],
                  "clase" => $rs["clase_descripcion"],
            
                );
              }
            }
              if ($totreg16>0) {
                for($xx=0; $xx<$totreg16; $xx++){
                  $rs = $db->fetch_array($qry16);
                  $tabla16[] = array(
                    "id" => $rs["id"],             
                    "serie" => $rs["serie"],
                    "parte" => $rs["parte"],            
                    "fecha_adquisicion" => $rs["date_acquisition"],
                    "active" => $rs["active"],
                    "condicion" => $rs["condicion"],
                    "inicio_garantia" => $rs["inicio_garantia"],
                    "fin_garantia" => $rs["fin_garantia"],
                    "grupo" => $rs["grupo_descripcion"],
                    "clase" => $rs["clase_descripcion"],
              
                  );
                }
              }
                if ($totreg17>0) {
                  for($xx=0; $xx<$totreg17; $xx++){
                    $rs = $db->fetch_array($qry17);
                    $tabla17[] = array(
                      "id" => $rs["id"],             
                      "serie" => $rs["serie"],
                      "parte" => $rs["parte"],            
                      "fecha_adquisicion" => $rs["date_acquisition"],
                      "active" => $rs["active"],
                      "condicion" => $rs["condicion"],
                      "inicio_garantia" => $rs["inicio_garantia"],
                      "fin_garantia" => $rs["fin_garantia"],
                      "grupo" => $rs["grupo_descripcion"],
                      "clase" => $rs["clase_descripcion"],
                
                    );
                  }
                }

    
      //respuesta OT
      $rpta = array("tabla1"=>$tabla1,"tabla2"=>$tabla2,"tabla3"=>$tabla3,"tabla4"=>$tabla4,"tabla5"=>$tabla5,"tabla6"=>$tabla6,"tabla7"=>$tabla7,"tabla8"=>$tabla8,"tabla11"=>$tabla11,"tabla12"=>$tabla12,"tabla13"=>$tabla13, "tabla14"=>$tabla14,"tabla15"=>$tabla15, "tabla16"=>$tabla16, "tabla17"=>$tabla17);
      echo json_encode($rpta);

  
        break;
        case "02_search_conductor":
          $tabla = array();
          $error= 0;
          $qry = $db->query("SELECT * from tb_conductores WHERE dni='".$data->value."'");
          $totreg = $db->num_rows($qry);
          if ($totreg==1) {
            $rs = $db->fetch_array($qry);
            $tabla = array(
              "id" => $rs["id"],
              "nombres" =>$rs["nombre"],                      
              "apellidos" =>$rs["apellidos"],             
              "dni" =>$rs["dni"]                         
            );  
          }else{
            $error= 1;
          }
        $rpta = array("tabla"=>$tabla,"error"=>$error);
        echo json_encode($rpta);
        break;
        case "sql_select_get_tipo_mantenimiento": 
          $tabla = array();
          $qry = $db->query("SELECT * FROM `man_tipo_mantenimiento`;");
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
      case "sql_select_get_tipo_area": 
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
        case "sql_search_vechiculo":
          $tabla = array();
          $error= 0;
          $qry = $db->query("SELECT C.description,I.active,I.id FROM `item` AS I INNER JOIN `clase` as C on I.id_clase=C.code WHERE I.id_grupo=10 AND C.grupo=10 AND I.active='".$data->value."'");
          $totreg = $db->num_rows($qry);
          if ($totreg==1) {
            $rs = $db->fetch_array($qry);
            $tabla = array(
              "id" => $rs["id"],
              "first" =>$rs["active"],                      
              "second" =>$rs["description"],                             
          );  
          }else{
            $error= 1;
          }
        $rpta = array("tabla"=>$tabla,"error"=>$error);
        echo json_encode($rpta);
        break;
        case "sql_search_vechiculo_mantenimiento":
          $tabla = array();
          $error= 0;
          $qry = $db->query("SELECT * from tb_equipos WHERE codigo='".$data->value."'");
          $totreg = $db->num_rows($qry);
          if ($totreg==1) {
            $rs = $db->fetch_array($qry);
            $tabla = array(
              "id" => $rs["id_eq"],
              "first" =>$rs["codigo"],                      
              "second" =>$rs["descripcion"]                             
            );  
          }else{
            $error= 1;
          }
        $rpta = array("tabla"=>$tabla,"error"=>$error);
        echo json_encode($rpta);
        break;
                   
        case "sql_search_responsable":
          $tabla = array();
          $error= 0;
          $qry = $db->query("SELECT A.* FROM `per_aspirante` AS A INNER JOIN `per_cargo` AS C ON A.id=C.id_personal WHERE A.dni='".$data->value."'");
          $totreg = $db->num_rows($qry);
          if ($totreg>=1) {
            $rs = $db->fetch_array($qry);
            $tabla = array(
              "id" => $rs["id"],
              "first" =>$rs["nombre"],                      
              "second" =>$rs["apellido"]                             
            );  
          }else{
            $error= 1;
          }
        $rpta = array("tabla"=>$tabla,"error"=>$error);
        echo json_encode($rpta);
        break;
        case "sql_search_conductor":
          $tabla = array();
          $error= 0;
          $qry = $db->query("SELECT A.* FROM `per_aspirante` AS A INNER JOIN `per_cargo` AS C ON A.id=C.id_personal WHERE C.id_cargo='1' AND A.dni='".$data->value."'");
          $totreg = $db->num_rows($qry);
          if ($totreg>=1) {
            $rs = $db->fetch_array($qry);
            $tabla = array(
              "id" => $rs["id"],
              "first" =>$rs["nombre"],                      
              "second" =>$rs["apellido"]                             
            );  
          }else{
            $error= 1;
          }
        $rpta = array("tabla"=>$tabla,"error"=>$error);
        echo json_encode($rpta);
        break;
        case "sql_search_proveedor":
          $tabla = array();
          $error= 0;
          $qry = $db->query("SELECT * from proveedor WHERE estado='2' AND ruc='".$data->value."'");
          $totreg = $db->num_rows($qry);
          if ($totreg==1) {
            $rs = $db->fetch_array($qry);
            $tabla = array(
              "id" => $rs["id"],
              "first" =>$rs["razon_social"],                      
              "second" =>$rs["direccion"]                             
            );  
          }else{
            $error= 1;
          }
        $rpta = array("tabla"=>$tabla,"error"=>$error);
        echo json_encode($rpta);
        break;
        case "01_getAsignacionesById":
          $tabla = array();
          $qry = $db->query("SELECT A.id as id_asignacion,A.*, A.comentario as comentario_asig,ASP.* FROM `ope_asignaciones` as A INNER JOIN `per_aspirante` as ASP ON A.id_conductor=ASP.id where A.id_vehiculo='".$data->id."' order by A.fecha_ini DESC;");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                  $rs = $db->fetch_array($qry);
                  $tabla[] = array(
                      "id" => $rs["id_asignacion"],
                      "nombres" => $rs["nombre"]." ".$rs["apellido"],
                      "fecha_ini" => $rs["fecha_ini"],
                      "fecha_final" => $rs["fecha_final"],
                      "hora_ini" => $rs["hora_ini"],
                      "hora_final"=> $rs["hora_final"],
                      "odometro"=> $rs["odometro"],
                      "comentario"=> $rs["comentario_asig"],
                  );
              }
          }

      //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;
      case "01_getEstadosById":
        $tabla = array();
        $qry = $db->query("SELECT * FROM `ope_estados` as E INNER JOIN `tb_usuarios` as U on E.id_encargado=U.id_user where E.id_vehiculo='".$data->id."' order by E.timestamp DESC;");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                    "id" => $rs["id"],
                    "nombres" => $rs["nombre"]." ".$rs["apellidos"],
                    "fecha" => $rs["timestamp"],
                    "hora" => $rs["time"],
                    "motivo" => $rs["motivo"],
                    "estado"=> $rs["estado"]              
                );
            }
        }

    //respuesta OT
    $rpta = array("tabla"=>$tabla);
    echo json_encode($rpta);
    break;
    case "01_getComentarioVehiculoById":
      $tabla = array();
      $qry = $db->query("SELECT * FROM `ope_comentario_vehiculo` as C INNER JOIN `tb_usuarios` as U ON C.id_encargado=U.id_user where id_vehiculo='".$data->id."' order by C.timestamp DESC;");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla[] = array(
                  "id" => $rs["id"],
                  "nombres" => $rs["nombre"]." ".$rs["apellidos"],
                  "fecha" => $rs["timestamp"],
                  "descripcion" => $rs["descripcion"]                     
              );
          }
      }

  //respuesta OT
  $rpta = array("tabla"=>$tabla);
  echo json_encode($rpta);
  break;
  case "03_check_odometro":
    $tabla=array();
    $rpta;
    $qry = $db->query("select * from ope_odometro where id_vehiculo='".$data->id."' order by timestamp desc LIMIT 1;");
    $totreg = $db->num_rows($qry);
    if ($totreg>0) {  
            $rs = $db->fetch_array($qry);
            $tabla[] = $rs["odometro"];
            
    }

//respuesta OT
$rpta = array("tabla"=>$tabla);
echo json_encode($rpta);
    break;
        case "01_getOdometrobyId":
            $tabla = array();
            $qry = $db->query("select * from ope_odometro where id_vehiculo='".$data->id."' order by timestamp desc;");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
                for($xx=0; $xx<$totreg; $xx++){
                    $rs = $db->fetch_array($qry);
                    $tabla[] = array(
                        "id" => $rs["id"],
                        "odometro" => $rs["odometro"],
                        "vehiculo" => $rs["id_vehiculo"],
                        "fecha" => $rs["timestamp"],
                        "hora" => $rs["hora"],
                        "status"=> $rs["status"],
                        "type"=> $rs["type"],
                    );
                }
            }

        //respuesta OT
        $rpta = array("tabla"=>$tabla);
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
        case "sqlProveedorFlota": 
          $tabla = array();
          $column= array();
          $qry = $db->query("SELECT P.*,G.description as 'grupo_descripcion',C.description as 'clase_descrpcion' FROM `proveedor` AS P INNER JOIN `tb_grupo` AS G ON P.grupo=G.code INNER JOIN `clase` AS C ON C.id=P.clase_grupo WHERE P.estado='2';");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla[] = array(
                "id" => $rs["id"],
                "nombre" => $rs["razon_social"],
                //"codigo" => $rs["codigo"],
                "ruc" => $rs["ruc"],              
                //"direccion"=> $rs["direccion"],
                "telefono"=> $rs["telefono"],
                "email"=> $rs["correo"],
                "grupo"=> $rs["grupo_descripcion"],
                "clase"=> $rs["clase_descrpcion"],
              );
            }
            $column=array(
              (object) array('key' => 'id','title' => 'ID'),
              (object) array('key' => 'nombre','title' => 'Nombre'),              
              (object) array('key' => 'ruc','title' => 'RUC'),        
              (object) array('key' => 'telefono','title' => 'Telefono'),    
              (object) array('key' => 'email','title' => 'Email'), 
              (object) array('key' => 'grupo','title' => 'Grupo'),
              (object) array('key' => 'clase','title' => 'Clase'),
                                
            );
          }
      
      //respuesta OT
        $rpta = array("data"=>$tabla,"column"=>$column);
       // var_dump($rpta);
        echo json_encode($rpta);
        break;
        case "sqlRequerimientosGrid":
          $tabla = array();
            $column= array();
            $qry = $db->query("SELECT RQ.*,E.descripcion AS 'descripcion_estado',P.descripcion AS 'descripcion_prioridad', A.descripcion AS 'descripcion_area',A.id AS 'id_area'FROM `requerimiento` as RQ INNER JOIN `per_estado` as E ON RQ.estado=E.id INNER JOIN `log_prioridad` as P ON RQ.prioridad=P.id INNER JOIN `per_area`as A ON RQ.area=A.id WHERE A.id=3 order by RQ.id desc;");
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
        case "01_gridRequerimientosPersonas": 
          $tabla = array();
          $column= array();
          $qry = $db->query("SELECT RQ.*,M.descripcion as 'descripcion_motivo',A.descripcion as 'descripcion_area',C.descripcion as 'descripcion_cargo',E.descripcion as 'descripcion_estado' FROM `per_requerimiento_personal` as RQ INNER JOIN `per_motivo` as M ON RQ.id_motivo=M.id INNER JOIN `per_area` as A ON RQ.area=A.id INNER JOIN `per_tipo_cargo` as C ON RQ.cargo=C.id
          INNER JOIN `per_estado` as E ON RQ.estado=E.id where RQ.area=3");
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
                "n"=> $rs["n"],   
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
        case "02_grid": 
            $tabla = array();
            $column= array();
            $qry = $db->query("SELECT A.* FROM `per_aspirante` AS A INNER JOIN `per_cargo` AS C ON A.id=C.id_personal WHERE C.id_cargo='1';");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "id" => $rs["id"],
                  "n"=>++$xx,
                  "nombre" => $rs["nombre"],
                  "apellidos" => $rs["apellido"],
                  "dni" => $rs["dni"],

                  //"movilidad" => $rs["movilidad"],
                  "edad" => $rs["edad"],
                  "telefono" => $rs["telefono"],
                 // "marca" => $rs["marca"],
                 // "anio" => $rs["anio"],
            
                  //"placa" => $rs["placa"],
                  //"fecha_ingreso" => $rs["fecha_ingreso"],
                 // "estado_conductor"=> $rs["estado_conductor"],
                 // "empleado"=> $rs["empleado"],
                 // "ciudad"=> $rs["ciudad"],
                 // "direccion"=> $rs["direccion"],
                 // "fecha_nacimiento"=> $rs["fecha_nacimiento"],
                //  "telepeaje"=> $rs["telepeaje"],
                //  "Etiqueta"=> $rs["Etiqueta"],
                //  "tipo_licencia"=> $rs["tipo_licencia"],
                //  "num_licencia"=> $rs["num_licencia"],
                 // "fecha_vencimiento"=> $rs["fecha_vencimiento"],
                //  "grupo"=> $rs["grupo"],
                //  "comentario"=> $rs["comentario"],
                //  "archivo"=> $rs["archivo"]
                );
              }
              $column=array(
                (object) array('key' => 'id','title' => 'ID'),
                (object) array('key' => 'n','title' => 'N'),
                (object) array('key' => 'nombre','title' => 'Nombre'),
                (object) array('key' => 'apellidos','title' => 'Apellidos'),
               // (object) array('key' => 'movilidad','title' => 'Movilidad'),
                (object) array('key' => 'dni','title' => 'Dni'),
                (object) array('key' => 'edad','title' => 'Edad'),
                (object) array('key' => 'telefono','title' => 'Telefono'),
               // (object) array('key' => 'marca','title' => 'Marca'),
              //  (object) array('key' => 'anio','title' => 'Año'),
              //  (object) array('key' => 'placa','title' => 'Placa')
               /* (object) array('key' => 'telepeaje','title' => 'Telepeaje'),
                (object) array('key' => 'Etiqueta','title' => 'Etiqueta'),
                (object) array('key' => 'tipo_licencia','title' => 'Tipo Licencia'),
                (object) array('key' => 'num_licencia','title' => 'Nº Licencia'),
                (object) array('key' => 'fecha_vencimiento','title' => 'Fecha Vencimiento'),
                (object) array('key' => 'comentario','title' => 'Comentario'),
                (object) array('key' => 'archivo','title' => 'Archivo'),   */               
              );
            }
        
        //respuesta OT
        $rpta = array("data"=>$tabla,"column"=>$column);
        echo json_encode($rpta);
        break;

        case "04_grid": 
            $tabla = array();
            $qry = $db->query("select * from ope_tarea");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "id" => $rs["id"],
                  "nombre" =>$rs["nombre"],
                  "tipo" => $rs["tipo"],
                  "fecha_limite" => $rs["fecha"],
                  "prioridad"=> $rs["prioridad"],
                  "vehiculo"=> $rs["id_vehiculo"],
                  "Responsable"=> $rs["id_responsable"],
                  "Conductor"=> $rs["id_conductor"],
                  //"Proveedor"=> $rs["proveedor"]              
                );
              }
            }
        
        //respuesta OT
        $rpta = array("tabla"=>$tabla);
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
  function get_value($data){
    $val="";
    $type="";
    $acro="";
    switch($data){
        case "1": 
        $type="1";
        $val="file1";
        $acro="file1";
        break;
        case "2": 
        $type="2";
        $val="file2";
        $acro="file2";
        break;
        case "3":
        $type="3";
        $val="file3";
        $acro="file3";          
        break;
        case "4": 
        $type="4";
        $val="file4";
        $acro="file4";
        break;
        case "5": 
        $type="5";
        $val="file5";
        $acro="file5";
        break;
        case "6": 
        $type="6";
        $val="file6";
        $acro="file6";
        break;
        case "6": 
        $type="6";
        $val="file1";
        $acro="file1";
        break;
        case "7": 
        $type="7";
        $val="file7";
        $acro="file7";
        break;
        case "8": 
        $type="8";
        $val="file8";
        $acro="file8";
        break;
        case "9": 
        $type="9";
        $val="file9";
        $acro="file9";
        break;
        case "10":
        $type="10";
        $val="file10";
        $acro="file10";
        break;
        case "11":
          $type="11";
          $val="file11";
          $acro="file11";
          break;
          case "12":
            $type="12";
            $val="file12";
            $acro="file12";
            break;
            case "13":
              $type="13";
              $val="file13";
              $acro="file13";
              break;
              case "14":
                $type="14";
                $val="file14";
                $acro="file14";
                break;
                case "15":
                  $type="15";
                  $val="file15";
                  $acro="file15";
                  break;
                  case "16":
                    $type="16";
                    $val="file16";
                    $acro="file16";
                    break;
                    case "17":
                      $type="17";
                      $val="file17";
                      $acro="file17";
                      break;
                      case "18":
                        $type="18";
                        $val="file18";
                        $acro="file18";
                        break;
  }
  return  array('val'=>$val,'type'=>$type,'acro'=>$acro);
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
?>