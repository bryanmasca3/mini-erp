<?php
  include_once('../../../includes/sess_verifica.php');

  if(isset($_SESSION["usr_ID"])){
    if (isset($_REQUEST["appSQL"])){
      include_once('../../../includes/db_database.php');
      include_once('../../../includes/funciones.php');

      $data = json_decode($_REQUEST['appSQL']);
      switch ($data->TipoQuery) {
     
        case "sql_search_vechiculo":
          $tabla = array();
          $error= 0;
          $qry = $db->query("SELECT C.description,I.active,I.id FROM `item` AS I INNER JOIN `clase` as C on I.id_clase=C.code WHERE I.id_grupo=C.grupo AND I.active='".$data->value."'");
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
          $qry = $db->query("SELECT RQ.*,E.descripcion AS 'descripcion_estado',P.descripcion AS 'descripcion_prioridad', A.descripcion AS 'descripcion_area',A.id AS 'id_area'FROM `requerimiento` as RQ INNER JOIN `per_estado` as E ON RQ.estado=E.id INNER JOIN `log_prioridad` as P ON RQ.prioridad=P.id INNER JOIN `per_area`as A ON RQ.area=A.id WHERE A.id=2 order by RQ.id desc;");
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
        case "sql_get_solicitudMantenimiento_by_id":
          $tabla = array();
          $tabla1 = array();
          $column= array();
          $qry = $db->query("SELECT SM.id,SM.prioridad,SM.motivo,SM.fecha,SM.descripcion,I.active,A.descripcion as 'area_descripcion',TM.descripcion AS 'tipo_mantenimiento_descripcion', E.id as 'estado_descripcion' FROM `ope_solicitud_mantenimiento` as SM INNER JOIN `item` as I ON SM.id_vehiculo=I.id INNER JOIN `per_area` as A ON SM.asignado=A.id INNER JOIN `man_tipo_mantenimiento` as TM ON SM.tipo=TM.id INNER JOIN `per_estado` as E ON SM.estado=E.id WHERE SM.id='".$data->data."'");

          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla = array(
                "id" => $rs["id"],
                "prioridad" => $rs["prioridad"],
                "fecha" => $rs["fecha"],                           
                "descripcion" => $rs["descripcion"],
                "active" => $rs["active"],
                "area" => $rs["area_descripcion"],
                "tipo" => $rs["tipo_mantenimiento_descripcion"],
                "estado" => $rs["estado_descripcion"],              
                "motivo" => $rs["motivo"]
              );
            }
            
            $qry1 = $db->query("SELECT * FROM `ope_solicitud_mantenimiento_comentario` WHERE id_solicitud_mantenimiento='".$data->data."'");
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

        $rpta = array("data"=>$tabla,"dataComent"=>$tabla1);      
        echo json_encode($rpta);
        break;
        case "sql_RequerimientosAndItemsOrdenTrabajo":

          if($data->data->estado!=11){
            $qry1;      

            $sql1 = "UPDATE man_orden_trabajo
            SET estado = '".$data->data->estado."', 
             fecha_asignacion= '".$data->data->fecha_cambio."',
             horaini_ot= '".$data->data->hora_ini."',
             horafin_ot= '".$data->data->hora_fin."',
             fecha_actualizacion= '".$data->data->fecha_actualizacion."'
            WHERE id='".$data->data->id."';";
  
            $qry1 = $db->query($sql1);
               
              $qry3="";    
              if(count($data->items)){
                $sql3 = "INSERT INTO man_orden_trabajo_items
                (id_orden_trabajo,it_item) VALUES";
                $sqldata3="";
                foreach ($data->items as $value) {
                    $sqldata3.= "('".$data->data->id."','".$value."'),";
                  };
                $sqldata3=substr($sqldata3, 0, -1);       
                $sql3=$sql3.$sqldata3.";";    
                    
                $qry3 = $db->query($sql3);
              }
             
  
            $rpta = array("table1"=>$qry1,"table3"=>$qry3);
            echo json_encode($rpta);
          }else{
            $rpta = array("error"=>"Error");
            echo json_encode($rpta);
          }
       
        break;
        case "sql_get_orden_trabajo_by_id":
          $tabla = array();
          $tabla1 = array();
          $column= array();
          $qry = $db->query("SELECT I.active,OT.*,E.id as 'estado_descripcion',SM.asignado,SM.tipo,SM.descripcion,A.descripcion as 'area_descripcion',TM.descripcion as 'tipo_descripcion' FROM `man_orden_trabajo` as OT INNER JOIN `per_estado` as E ON OT.estado=E.id INNER JOIN `ope_solicitud_mantenimiento` as SM ON OT.id_solicitud_mantenimiento=SM.id INNER JOIN `per_area` as A ON SM.asignado=A.id INNER JOIN `man_tipo_mantenimiento` as TM ON SM.tipo=TM.id INNER JOIN `item` as I ON SM.id_vehiculo=I.id WHERE OT.id='".$data->data."'");

          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla = array(
                "id" => $rs["id"],
                "fecha_creacion" => $rs["fecha"],                                         
                "descripcion" => $rs["descripcion"],
                "active" => $rs["active"],
                "fecha_asignacion" => $rs["fecha_asignacion"],
                "area" => $rs["area_descripcion"],
                "hora_ini" => $rs["horaini_ot"],
                "hora_fin" => $rs["horafin_ot"],
                "tipo" => $rs["tipo_descripcion"],
                "estado" => $rs["estado_descripcion"]             
              );
            }
            
            $qry1 = $db->query("SELECT SC.id,SC.descripcion FROM `man_orden_trabajo` as OT INNER JOIN `ope_solicitud_mantenimiento` as SM ON OT.id_solicitud_mantenimiento=SM.id INNER JOIN `ope_solicitud_mantenimiento_comentario` as SC ON OT.id_solicitud_mantenimiento=SC.id_solicitud_mantenimiento WHERE OT.id='".$data->data."'");
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

        $rpta = array("data"=>$tabla,"dataComent"=>$tabla1);      
        echo json_encode($rpta);
        break;
        case "01_gridGarantias": ////VERIFICAR CON LA ELIMINACION DE VEHICULO
          $tabla = array();
          $column= array();
          $qry = $db->query("SELECT I.id,C.description AS 'descripcion_clase',G.description AS 'descripcion_grupo',I.* from item as I INNER JOIN tb_grupo as G ON I.id_grupo=G.code INNER JOIN clase as C ON I.id_clase=C.code where C.code=I.id_clase AND C.grupo=I.id_grupo;");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla[] = array(
                "id" => $rs["id"],
                "description" => $rs["active"],
                "grupo" => $rs["descripcion_grupo"],
                "clase" => $rs["descripcion_clase"],
                "garantia" => $rs["garantia"],
                "inicio" => $rs["inicio_garantia"],
                "fin" => $rs["fin_garantia"],  
                "state" =>get_value($rs["inicio_garantia"],$rs["fin_garantia"]).'%'                                            
              );
            }
              $column=array( 
                //(object) array('key' => 'id','title' => 'N° de Cod'),
                (object) array('key' => 'description','title' => 'Activo'),
                (object) array('key' => 'grupo','title' => 'Grupo'),
                (object) array('key' => 'clase','title' => 'Clase'),              
                (object) array('key' => 'inicio','title' => 'Inicio Garantia'),
                (object) array('key' => 'garantia','title' => 'Meses de Garantia'),
                (object) array('key' => 'fin','title' => 'Fin Garantia'),
                (object) array('key' => 'state','title' => 'Estado')                                        
              );
          }
      
        //respuesta OT
        $rpta = array("data"=>$tabla,"column"=>$column);
        //var_dump($rpta);
        echo json_encode($rpta);
        break;
        case "sql_ordentrabajo_vehicle_sql":
          $tabla = array();
          $error= 0;
          $qry = $db->query("SELECT I.*,C.description as 'clase_descripcion',G.description as 'grupo_descripcion' FROM `item` as I INNER JOIN `clase` as C ON I.id_clase=C.code INNER JOIN `tb_grupo` as G ON I.id_grupo=G.code WHERE G.code=C.grupo AND I.id_grupo not in (10) AND I.active='".$data->value."'");
          $totreg = $db->num_rows($qry);
          if ($totreg>=1) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla = array(
                "id" => $rs["id"],
                "fecha_adquisicion" => $rs["date_acquisition"],
                "condicion" =>$rs["condicion"], 
                "active" =>$rs["active"],                      
                "garantia" =>$rs["fin_garantia"],
                "clase" =>$rs["clase_descripcion"],  
                "grupo" =>$rs["grupo_descripcion"]                                      
              );  
          }
          }else{
            $error= 1;
          }
        $rpta = array("tabla"=>$tabla,"error"=>$error);
        echo json_encode($rpta);
        break; 
        case "01_gridOrdenTrabajo": ////VERIFICAR CON LA ELIMINACION DE VEHICULO
          $tabla = array();
          $column= array();
          $qry = $db->query("SELECT TI.descripcion AS 'tipo_mantenimiento',I.active,OT.*,E.descripcion as 'estado_descripcion' FROM `man_orden_trabajo` as OT INNER JOIN `per_estado` as E ON OT.estado=E.id INNER JOIN `ope_solicitud_mantenimiento` as SM ON SM.id=OT.id_solicitud_mantenimiento INNER JOIN `item` as I ON I.id=SM.id_vehiculo INNER JOIN `man_tipo_mantenimiento` as TI ON TI.id=SM.tipo;");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla[] = array(
                "id" => $rs["id"],
                "fecha" => $rs["fecha"],
                "vehiculo" => $rs["active"],
                "tipo_mantenimiento" => $rs["tipo_mantenimiento"],
                "estado" => $rs["estado_descripcion"]               
              );
            }
              $column=array( 
                //(object) array('key' => 'id','title' => 'N° de Cod'),
                (object) array('key' => 'id','title' => 'OT'),               
                (object) array('key' => 'vehiculo','title' => 'Codigo'),
                (object) array('key' => 'tipo_mantenimiento','title' => 'Tipo de Mantenimiento'),
                (object) array('key' => 'estado','title' => 'Estado'),
                (object) array('key' => 'fecha','title' => 'Fecha')                                      
              );
          }
      
        //respuesta OT
        $rpta = array("data"=>$tabla,"column"=>$column);
        //var_dump($rpta);
        echo json_encode($rpta);
        break;
        case "sql_RequerimientosOrdenCompra_Add":
          $qry1="";   
          $sql1="";
          if((int)$data->data->estado==12){
             
            $sql1 = "INSERT INTO man_orden_trabajo 
            (id,
            id_solicitud_mantenimiento                  
            ) VALUES (
              '".$data->data->n_orden_trabajo."',  
              '".$data->data->id_solicitud_mantenimiento."'                    
              )";
              $qry1 = $db->query($sql1);
          }
         
       
            $qry2;      
            $sql2 = "UPDATE ope_solicitud_mantenimiento
            SET estado = '".$data->data->estado."',
             motivo = '".$data->data->motivo."'
            WHERE id='".$data->data->id_solicitud_mantenimiento."';";

          $qry2 = $db->query($sql2);
          $rpta = array("table1"=>$qry1,"table2"=>$qry2);
          echo json_encode($rpta);
        break;
        case "sql_get_last_orden_trabajo_mantenimiento":
          $tabla = array();
          $qry = $db->query("SELECT n FROM `man_orden_trabajo` order by n desc limit 1;");
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
          case "01_gridSolicitudMantenimientoPreventivo": 
            $tabla = array();
            $qry = $db->query("SELECT OT.*,R.prioridad,I.active,TM.descripcion AS 'tipo_descripcion',E.descripcion as 'estado_descripcion',A.descripcion as 'area_descripcion' FROM `ope_solicitud_mantenimiento` as R INNER JOIN `item` as I ON R.id_vehiculo=I.id  INNER JOIN `per_area` as A ON A.id=R.asignado INNER JOIN `man_tipo_mantenimiento` as TM ON TM.id=R.tipo INNER JOIN `man_orden_trabajo` as OT ON OT.id_solicitud_mantenimiento=R.id INNER JOIN `per_estado` as E ON E.id=OT.estado WHERE R.tipo='1' AND OT.estado='18';");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "id" => $rs["id"],
                  "vehiculo" =>$rs["active"],
                 // "asignado" => $rs["area_descripcion"],
                  "prioridad" => $rs["prioridad"],
                  "tipo"=> $rs["tipo_descripcion"],               
                  "fecha"=> $rs["fecha"],
                  "estado"=> $rs["estado_descripcion"]
                );
              }
              $column=array(
                (object) array('key' => 'id','title' => 'ID'),
                (object) array('key' => 'vehiculo','title' => 'Vehiculo'),
               // (object) array('key' => 'asignado','title' => 'Area'),
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
        case "01_gridSolicitudMantenimiento": 
          $tabla = array();
          $qry = $db->query("SELECT I.*,R.*,E.descripcion as 'estado_descripcion',A.descripcion as 'area_descripcion',TP.descripcion AS 'tipo_mantenimiento' FROM `ope_solicitud_mantenimiento` as R INNER JOIN `item` as I ON R.id_vehiculo=I.id INNER JOIN `per_estado` as E ON E.id=R.estado INNER JOIN `per_area` as A ON A.id=R.asignado INNER JOIN `man_tipo_mantenimiento` as TP ON TP.id=R.tipo ORDER BY R.timestamp DESC;");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla[] = array(
                "id" => $rs["id"],
                "vehiculo" =>$rs["active"],
               // "asignado" => $rs["area_descripcion"],
                "prioridad" => $rs["prioridad"],
                "tipo"=> $rs["tipo_mantenimiento"],               
                "fecha"=> $rs["fecha"],
                "estado"=> $rs["estado_descripcion"]
              );
            }
            $column=array(
              (object) array('key' => 'id','title' => 'RQ Mantenimiento'),
              (object) array('key' => 'vehiculo','title' => 'Codigo'),
             // (object) array('key' => 'asignado','title' => 'Area'),
              (object) array('key' => 'prioridad','title' => 'Prioridad'),
              (object) array('key' => 'tipo','title' => 'Tipo de Mantenimiento'),
              (object) array('key' => 'fecha','title' => 'Fecha'),
              (object) array('key' => 'estado','title' => 'Estado')
            );
          }

        //respuesta OT
        $rpta = array("data"=>$tabla,"column"=>$column);
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
        case "01_gridRequerimientosPersonas":       
          $tabla = array();
          $column= array();
          $qry = $db->query("SELECT RQ.*,M.descripcion as 'descripcion_motivo',A.descripcion as 'descripcion_area',C.descripcion as 'descripcion_cargo',E.descripcion as 'descripcion_estado' FROM `per_requerimiento_personal` as RQ INNER JOIN `per_motivo` as M ON RQ.id_motivo=M.id INNER JOIN `per_area` as A ON RQ.area=A.id INNER JOIN `per_tipo_cargo` as C ON RQ.cargo=C.id
          INNER JOIN `per_estado` as E ON RQ.estado=E.id where RQ.area=2");
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
              (object) array('key' => 'id','title' => 'ID'),      
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
case "07_getEquipos":
  $tabla = array();
  
  $qry = $db->query("SELECT  * FROM item where id_grupo=10 AND id_clase='".$data->contenido."'");
  $totreg = $db->num_rows($qry);
  if ($totreg>0) {
    $tabla[] = array(
      "ID" => 0,
      "codigo" => "Todos los equipos",
      "nombre" => "-",
      "contenido" => 0
    );
    for($xx=0; $xx<$totreg; $xx++){
      $rs = $db->fetch_array($qry);
    
      $tabla[] = array(
        "ID" => $rs["id"],
        "codigo" => $rs["active"],
        "nombre" => $rs["id_clase"],
        "contenido" => "1"
      );
    }
  }
 
  $rpta = array("tabla"=>$tabla);
  echo json_encode($rpta);
  break;
  case "07_getAllSolicitud":
    $tabla = array();
    
    $qry = $db->query("SELECT MONTH(OT.fecha_asignacion)AS 'mes',E.descripcion AS 'estado_ot',I.active,TM.descripcion,OT.*,SM.descripcion as 'descripcion_ot' FROM `man_orden_trabajo` as OT INNER JOIN `ope_solicitud_mantenimiento` AS SM ON OT.id_solicitud_mantenimiento=SM.id INNER JOIN `man_tipo_mantenimiento` AS TM ON TM.id=SM.tipo INNER JOIN `item` AS I ON I.id=SM.id_vehiculo  INNER JOIN `per_estado` AS E ON E.id=OT.estado WHERE OT.estado=".$data->estado." AND OT.anio=".$data->anio.";");
    $totreg = $db->num_rows($qry);
    if ($totreg>0) {
      
      for($xx=0; $xx<$totreg; $xx++){
        $rs = $db->fetch_array($qry);

        $time1 = strtotime($rs["horaini_ot"]);
        $time2 = strtotime($rs["horafin_ot"]);
        //$diferencia = round(abs($time2 - $time1) / 3600,2);
        $diferencia = round(abs($time2 - $time1) / 60,2);
      
        $tabla[] = array(
          
          "flota" => $rs["active"],
          "fecha" => $rs["fecha_asignacion"],
          "horaini" => $rs["horaini_ot"],
          "horafin" => $rs["horafin_ot"],
          "duracion"=> $diferencia,
          "mes" => $rs["mes"],
          "anio" => $rs["anio"]
        );
      }
    }
    
    $rpta = array("tabla"=>$tabla);
    echo json_encode($rpta);
    break;
  
  case "06_getAll_mes":
    $tabla = array();
    $qry = $db->query("SELECT E.descripcion AS 'estado_ot',I.active,TM.descripcion,OT.*,SM.descripcion as 'descripcion_ot' FROM `man_orden_trabajo` as OT INNER JOIN `ope_solicitud_mantenimiento` AS SM ON OT.id_solicitud_mantenimiento=SM.id INNER JOIN `man_tipo_mantenimiento` AS TM ON TM.id=SM.tipo INNER JOIN `item` AS I ON I.id=SM.id_vehiculo  INNER JOIN `per_estado` AS E ON E.id=OT.estado WHERE OT.estado=".$data->estado." AND OT.anio=".$data->anio." AND MONTH(OT.fecha_actualizacion)=".$data->mes."");
    $totreg = $db->num_rows($qry);
    if ($totreg>0) {
      for($xx=0; $xx<$totreg; $xx++){
        $rs = $db->fetch_array($qry);
      
        $tabla[] = array(
          "x" => $rs["active"],
          "y" => array($rs["fecha_actualizacion"].":".$rs["horaini_ot"],$rs["fecha_actualizacion"].":".$rs["horafin_ot"]),
          "fecha" => $rs["fecha_actualizacion"],
          "anio" => $rs["anio"],
          "hora_ini" => $rs["horaini_ot"],
          "hora_fin" => $rs["horafin_ot"],
          "estado" => $rs["estado"],
          "supervisor" => "Ninguno",
          "descripcion" => $rs["descripcion_ot"],
          "tipOT"=> $rs["descripcion"] 
        );
      }
    }
    
    $rpta = array($tabla);
    echo json_encode($tabla);
    break;
    case "07_getEquiSolicitud":
      $tabla = array();
      
      $qry = $db->query("SELECT ROUND(DAY(OT.fecha_asignacion)/7,0) AS 'semana', MONTH(OT.fecha_asignacion) AS 'mes',E.descripcion AS 'estado_ot',I.active,TM.descripcion,OT.*,SM.descripcion as 'descripcion_ot' FROM `man_orden_trabajo` as OT INNER JOIN `ope_solicitud_mantenimiento` AS SM ON OT.id_solicitud_mantenimiento=SM.id INNER JOIN `man_tipo_mantenimiento` AS TM ON TM.id=SM.tipo INNER JOIN `item` AS I ON I.id=SM.id_vehiculo  INNER JOIN `per_estado` AS E ON E.id=OT.estado WHERE OT.estado=".$data->estado." AND OT.anio=".$data->anio." AND I.id=".$data->equipo.";");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);

          $time1 = strtotime($rs["horaini_ot"]);
          $time2 = strtotime($rs["horafin_ot"]);
          //$diferencia = round(abs($time2 - $time1) / 3600,2);
          $diferencia = round(abs($time2 - $time1) / 60,2);
        
          $tabla[] = array(
            
            "flota" => $rs["active"],
            "fecha" => $rs["fecha_asignacion"],
            "horaini" => $rs["horaini_ot"],
            "horafin" => $rs["horafin_ot"],
            "duracion"=> $diferencia,
            "mes" => $rs["mes"],
            "anio" => $rs["anio"],
            "semana"=> $rs["semana"]
          );
        }
      }
      
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;
    case "07_getEquiSolicitudMes":
      $tabla = array();
      
      $qry = $db->query("SELECT ROUND(DAY(OT.fecha_asignacion)/7,0) AS 'semana', MONTH(OT.fecha_asignacion) AS 'mes',E.descripcion AS 'estado_ot',I.active,TM.descripcion,OT.*,SM.descripcion as 'descripcion_ot' FROM `man_orden_trabajo` as OT INNER JOIN `ope_solicitud_mantenimiento` AS SM ON OT.id_solicitud_mantenimiento=SM.id INNER JOIN `man_tipo_mantenimiento` AS TM ON TM.id=SM.tipo INNER JOIN `item` AS I ON I.id=SM.id_vehiculo  INNER JOIN `per_estado` AS E ON E.id=OT.estado WHERE OT.estado=".$data->estado." AND OT.anio=".$data->anio." AND MONTH(fecha_asignacion)=".$data->mes." AND I.id=".$data->equipo.";");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);

          $time1 = strtotime($rs["horaini_ot"]);
          $time2 = strtotime($rs["horafin_ot"]);
          //$diferencia = round(abs($time2 - $time1) / 3600,2);
          $diferencia = round(abs($time2 - $time1) / 60,2);
        
          $tabla[] = array(
            
            "flota" => $rs["active"],
            "fecha" => $rs["fecha_asignacion"],
            "horaini" => $rs["horaini_ot"],
            "horafin" => $rs["horafin_ot"],
            "duracion"=> $diferencia,
            "mes" => $rs["mes"],
            "anio" => $rs["anio"],
            "semana"=> $rs["semana"]
          );
        }
      }
      
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;
    case "07_getAllSolicitudMes":
      $tabla = array();
      
      $qry = $db->query("SELECT ROUND(DAY(OT.fecha_asignacion)/7,0) AS 'semana', MONTH(OT.fecha_asignacion) AS 'mes',E.descripcion AS 'estado_ot',I.active,TM.descripcion,OT.*,SM.descripcion as 'descripcion_ot' FROM `man_orden_trabajo` as OT INNER JOIN `ope_solicitud_mantenimiento` AS SM ON OT.id_solicitud_mantenimiento=SM.id INNER JOIN `man_tipo_mantenimiento` AS TM ON TM.id=SM.tipo INNER JOIN `item` AS I ON I.id=SM.id_vehiculo  INNER JOIN `per_estado` AS E ON E.id=OT.estado WHERE OT.estado=".$data->estado." AND OT.anio=".$data->anio." AND MONTH(fecha_asignacion)=".$data->mes."");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);

          $time1 = strtotime($rs["horaini_ot"]);
          $time2 = strtotime($rs["horafin_ot"]);
          //$diferencia = round(abs($time2 - $time1) / 3600,2);
          $diferencia = round(abs($time2 - $time1) / 60,2);
        
          $tabla[] = array(
            
            "flota" => $rs["active"],
            "fecha" => $rs["fecha_asignacion"],
            "horaini" => $rs["horaini_ot"],
            "horafin" => $rs["horafin_ot"],
            "duracion"=> $diferencia,
            "mes" => $rs["mes"],
            "anio" => $rs["anio"],
            "semana"=> $rs["semana"]
          );
        }
      }
      
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;
    case "06_getEquiSolicitudMes":
      $tabla = array();
      $qry = $db->query("SELECT E.descripcion AS 'estado_ot',I.active,TM.descripcion,OT.*,SM.descripcion as 'descripcion_ot' FROM `man_orden_trabajo` as OT INNER JOIN `ope_solicitud_mantenimiento` AS SM ON OT.id_solicitud_mantenimiento=SM.id INNER JOIN `man_tipo_mantenimiento` AS TM ON TM.id=SM.tipo INNER JOIN `item` AS I ON I.id=SM.id_vehiculo  INNER JOIN `per_estado` AS E ON E.id=OT.estado WHERE OT.estado=".$data->estado." AND OT.anio=".$data->anio." AND MONTH(OT.fecha_asignacion)=".$data->mes." AND I.id=".$data->equipo.";");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);
        
          $tabla[] = array(
            "x" => $rs["active"],
            "y" => array($rs["fecha_asignacion"].":".$rs["horaini_ot"],$rs["fecha"].":".$rs["horafin_ot"]),
            "fecha" => $rs["fecha_asignacion"],
            "anio" => $rs["anio"],
            "hora_ini" => $rs["horaini_ot"],
            "hora_fin" => $rs["horafin_ot"],
            "estado" => $rs["estado"],
            "supervisor" =>"Ninguno",
            "descripcion" => $rs["descripcion_ot"],
            "tipOT"=> $rs["descripcion"] 
          );
        }
      }
      
      $rpta = array($tabla);
      echo json_encode($tabla);
      break;
  case "06_getEquiSolicitud":
    $tabla = array();
    $qry = $db->query("SELECT E.descripcion AS 'estado_ot',I.active,TM.descripcion,OT.*,SM.descripcion as 'descripcion_ot' FROM `man_orden_trabajo` as OT INNER JOIN `ope_solicitud_mantenimiento` AS SM ON OT.id_solicitud_mantenimiento=SM.id INNER JOIN `man_tipo_mantenimiento` AS TM ON TM.id=SM.tipo INNER JOIN `item` AS I ON I.id=SM.id_vehiculo  INNER JOIN `per_estado` AS E ON E.id=OT.estado WHERE OT.estado=".$data->estado." AND OT.anio=".$data->anio." AND I.id=".$data->equipo.";");
    $totreg = $db->num_rows($qry);
    if ($totreg>0) {
      for($xx=0; $xx<$totreg; $xx++){
        $rs = $db->fetch_array($qry);
      
        $tabla[] = array(
          "x" => $rs["active"],
          "y" => array($rs["fecha_asignacion"].":".$rs["horaini_ot"],$rs["fecha"].":".$rs["horafin_ot"]),
          "fecha" => $rs["fecha_asignacion"],
          "anio" => $rs["anio"],
          "hora_ini" => $rs["horaini_ot"],
          "hora_fin" => $rs["horafin_ot"],
          "estado" => $rs["estado_ot"],
          "supervisor" =>  "Ninguno",
          "descripcion" => $rs["descripcion_ot"],
          "tipOT"=> $rs["descripcion"] 
        );
      }
    }
    
    $rpta = array($tabla);
    echo json_encode($tabla);
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
  case "06_getAll":
    $tabla = array();
    $qry = $db->query("SELECT E.descripcion AS 'estado_ot',I.active,TM.descripcion,OT.*,SM.descripcion as 'descripcion_ot' FROM `man_orden_trabajo` as OT INNER JOIN `ope_solicitud_mantenimiento` AS SM ON OT.id_solicitud_mantenimiento=SM.id INNER JOIN `man_tipo_mantenimiento` AS TM ON TM.id=SM.tipo INNER JOIN `item` AS I ON I.id=SM.id_vehiculo  INNER JOIN `per_estado` AS E ON E.id=OT.estado WHERE OT.estado=".$data->estado." AND OT.anio=".$data->anio.";");
    $totreg = $db->num_rows($qry);
    if ($totreg>0) {
      for($xx=0; $xx<$totreg; $xx++){
        $rs = $db->fetch_array($qry);    
  
        $tabla[] = array(
          "x" => $rs["active"],
          //"y" => array($milini,$milfin),
          "y" => array($rs["fecha_asignacion"].":".$rs["horaini_ot"],$rs["fecha"].":".$rs["horafin_ot"]),
          "fecha" => $rs["fecha_asignacion"],
          "anio" => $rs["anio"],
          "hora_ini" => $rs["horaini_ot"],
          "hora_fin" => $rs["horafin_ot"],
          "estado" => $rs["estado_ot"],
          "supervisor" => "Ninguno",
          "descripcion" => $rs["descripcion_ot"],
          "tipOT"=> $rs["descripcion"] 
        );
      }
    }
    $fec= strtotime("2022-01-21 10:14:01") * 1000;    
    $rpta = array($tabla);
    echo json_encode($tabla);
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
 

  function get_value($ini,$fin){
  	$inicio = new DateTime($ini);
    $final = new DateTime($fin);
    $now = new DateTime();
    $actualFormat= $now->format('Y-m-d');  
    $actual = new DateTime($actualFormat);

    $total  = $final->diff($inicio)->format('%a');
    $recorrido  = $actual->diff($inicio)->format('%a');
    
    $porcent=($recorrido*100)/$total;
    $state=2;

    if($porcent<90){
      $state=0;  
    }else if($porcent>=90 && $porcent<=100){
      $state=1;
    }
    return round($porcent, 2); ;
  }
?>