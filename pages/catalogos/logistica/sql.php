<?php
  include_once('../../../includes/sess_verifica.php');

  if(isset($_SESSION["usr_ID"])){
    if (isset($_REQUEST["appSQL"])){
      include_once('../../../includes/db_database.php');
      include_once('../../../includes/funciones.php');

      $data = json_decode($_REQUEST['appSQL']);
      switch ($data->TipoQuery) {

          case "sqlAlmacenGrid":
            $tabla = array();
            $column= array();
            $qry = $db->query("SELECT  * FROM almacen");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "id" => $rs["id"],
                  "descripcion" =>$rs["descripcion"],
                  "sede" => $rs["sede"],
                  "direccion" => $rs["direccion"],
                  "referencia"=> $rs["referencia"],
                 // "responsable"=> $rs["responsable"],
                  "telefono"=> $rs["telefono"]                                 
                );
              }
                $column=array( 
                  (object) array('key' => 'id','title' => 'N° de Almacen'),
                  (object) array('key' => 'descripcion','title' => 'Descripción'),
                  (object) array('key' => 'sede','title' => 'Sede'),
                  (object) array('key' => 'direccion','title' => 'Direccion'),
                  (object) array('key' => 'referencia','title' => 'Referencia'),
                 // (object) array('key' => 'responsable','title' => 'Responsable'),
                  (object) array('key' => 'telefono','title' => 'Telefono')
                );
            }
        
          //respuesta OT
          $rpta = array("data"=>$tabla,"column"=>$column);
          //var_dump($rpta);
          echo json_encode($rpta);
          break;
          case "sqlRequerimientosGrid":
            $tabla = array();
            $column= array();
            $qry = $db->query("SELECT RQ.*,E.descripcion AS 'descripcion_estado',P.descripcion AS 'descripcion_prioridad', A.descripcion AS 'descripcion_area',A.id AS 'id_area'FROM `requerimiento` as RQ INNER JOIN `per_estado` as E ON RQ.estado=E.id INNER JOIN `log_prioridad` as P ON RQ.prioridad=P.id INNER JOIN `per_area`as A ON RQ.area=A.id order by RQ.id desc;");
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
          case "02_search_solicitante":
            $tabla = array();
            $error= 0;
            $qry = $db->query("SELECT A.* FROM `per_aspirante` as A INNER JOIN `per_personal` as P on A.id=P.id_aspirante WHERE dni='".$data->value."'");
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
          
          case "01_getMainComponentData":
            $tabla1 = array();
            $qry1 = $db->query("SELECT I.*,C.description as 'clase_descripcion',G.description as 'grupo_descripcion' FROM `item` AS I INNER JOIN `clase` as C on I.id_clase=C.code INNER JOIN `tb_grupo` as G on G.code=I.id_grupo WHERE I.id_grupo=C.grupo AND I.id='".$data->value."'");

            $totreg1 = $db->num_rows($qry1);
            if ($totreg1>0) {          
              $rs = $db->fetch_array($qry1);
              $tabla1 = array(
                  "id" => $rs["id"],
                  "codigo" => $rs["active"],
                  "descripcion" => $rs["descripcion"],
                  "coloquial" => $rs["coloquial"],
                  "cantidad" => $rs["cantidad"], 

                  "unidad_medida" => $rs["unidad_medida"],  
                  "marca" => $rs["marca"],  
                  "precio_unitario" => $rs["precio_unitario"],

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

          $rpta = array("tabla1"=>$tabla1);
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

                    "unidad_medida" => $rs["unidad_medida"],  
                    "marca" => $rs["marca"],  
                    "precio_unitario" => $rs["precio_unitario"],

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
          case "sql_proveedor_orden_compra":
            $tabla = array();
            $error= 0;
            $qry = $db->query("SELECT * FROM `proveedor` WHERE ruc='".$data->value."'");
            $totreg = $db->num_rows($qry);
            if ($totreg>=1) {
              $rs = $db->fetch_array($qry);
              $tabla = array(
                "id" => $rs["id"],
                "nombres" =>$rs["razon_social"],                      
                "apellidos" =>$rs["ruc"]                                      
              );  
            }else{
              $error= 1;
            }
          $rpta = array("tabla"=>$tabla,"error"=>$error);
          echo json_encode($rpta);
          break;  
          case "sql_items_get_by_id":
            $tabla = array();
            $error= 0;
            $qry = $db->query("SELECT * FROM `item` WHERE id='".$data->value."'");
            $totreg = $db->num_rows($qry);
            if ($totreg>=1) {
              $rs = $db->fetch_array($qry);
              $tabla = array(
                "id" => $rs["id"],
                "grupo" =>$rs["id_grupo"]                                           
              );  
            }else{
              $error= 1;
            }
          $rpta = array("tabla"=>$tabla,"error"=>$error);
          echo json_encode($rpta);
          break;
          case "sql_ordencompra_vehicle_sql":
            $tabla = array();
            $error= 0;
            $qry = $db->query("SELECT RI.*,O.*,RI.id AS 'id_item_od' FROM `orden_compra` as O INNER JOIN `requerimiento` as R ON O.n_requerimiento=R.n_requerimiento INNER JOIN `requerimiento_item` as RI ON R.n_requerimiento=RI.id_requerimiento WHERE O.n_orden_compra='".$data->value."' AND O.estado=10");
            $totreg = $db->num_rows($qry);
            if ($totreg>=1) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "id" => $rs["n_orden_compra"],
                  "id_item" => $rs["id_item_od"],
                  "codigo_parte" =>$rs["codigo_parte"], 
                  "descripcion" =>$rs["descripcion"],                      
                  "cumplidos" =>$rs["cumplidos"],
                  "prioridad" =>$rs["prioridad"],  
                  "cantidad" =>$rs["cantidad"]                                      
                );  
            }
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
            INNER JOIN `per_estado` as E ON RQ.estado=E.id where RQ.area=5");
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
          case "sqlSeleccionProveedorGrid":
            $tabla1 = array();
            $tabla2 = array();
            $tabla3 = array();
            $tabla4 = array();

            $column= array();
            $qry1 = $db->query("SELECT S.timestamp,S.id,E.descripcion as 'estado',P.razon_social as 'proveedor1',S.tipo_servicio,S.proveedor1_puntaje FROM `proveedor` as P INNER JOIN `proveedor_seleccion` as S on P.id=S.proveedor1 INNER JOIN `per_estado` as E on S.estado=E.id;");
            $totreg1 = $db->num_rows($qry1);
            if ($totreg1>0) {
              for($xx=0; $xx<$totreg1; $xx++){
                $rs = $db->fetch_array($qry1);
                $tabla1[] = array(
                  "id" => $rs["id"],
                  "proveedor1" => $rs["proveedor1"],
                  "tipo_servicio" =>$rs["tipo_servicio"],                                            
                  "proveedor1_puntaje" =>$rs["proveedor1_puntaje"],
                  "fecha" =>$rs["timestamp"]        
                );
              }
               
            }
            $qry2 = $db->query("SELECT S.timestamp,S.id,E.descripcion as 'estado',P.razon_social as 'proveedor2',S.tipo_servicio,S.proveedor2_puntaje FROM `proveedor` as P INNER JOIN `proveedor_seleccion` as S on P.id=S.proveedor2 INNER JOIN `per_estado` as E on S.estado=E.id;");
            $totreg2 = $db->num_rows($qry2);
            if ($totreg2>0) {
              for($xx=0; $xx<$totreg2; $xx++){
                $rs = $db->fetch_array($qry2);
                $tabla2[] = array(
                  "id" => $rs["id"],
                  "proveedor2" => $rs["proveedor2"],
                  "tipo_servicio" =>$rs["tipo_servicio"],                                            
                  "proveedor2_puntaje" =>$rs["proveedor2_puntaje"],      
                  "fecha" =>$rs["timestamp"]          
                );
              }
               
            }
            $qry3 = $db->query("SELECT S.timestamp,S.id,E.descripcion as 'estado',P.razon_social as 'proveedor3',S.tipo_servicio,S.proveedor3_puntaje FROM `proveedor` as P INNER JOIN `proveedor_seleccion` as S on P.id=S.proveedor3 INNER JOIN `per_estado` as E on S.estado=E.id;");
            $totreg3 = $db->num_rows($qry3);
            if ($totreg3>0) {
              for($xx=0; $xx<$totreg3; $xx++){
                $rs = $db->fetch_array($qry3);
                $tabla3[] = array(
                  "id" => $rs["id"],
                  "proveedor3" => $rs["proveedor3"],
                  "tipo_servicio" =>$rs["tipo_servicio"],                                            
                  "proveedor3_puntaje" =>$rs["proveedor3_puntaje"], 
                  "fecha" =>$rs["timestamp"]                      
                );
              }
               
            }
            
            for ($i=0; $i <$totreg3 ; $i++) { 
              $row = array_merge($tabla1[$i],$tabla2[$i],$tabla3[$i]);
              array_push($tabla4,$row);         
            }

            $column=array(            
              (object) array('key' => 'id','title' => 'ID'),      
              (object) array('key' => 'tipo_servicio','title' => 'Tipo de Servicio'),
              (object) array('key' => 'proveedor1','title' => 'Proveedor 1'),          
              (object) array('key' => 'proveedor1_puntaje','title' => 'Ptje Proveedor 1'),
              (object) array('key' => 'proveedor2','title' => 'Proveedor 2'),          
              (object) array('key' => 'proveedor2_puntaje','title' => 'Ptje Proveedor 2'),
              (object) array('key' => 'proveedor3','title' => 'Proveedor 3'),          
              (object) array('key' => 'proveedor3_puntaje','title' => 'Ptje Proveedor 3'),
              (object) array('key' => 'fecha','title' => 'Fecha de Evaluacion')                                   
            );
          //respuesta OT
          $rpta = array("data"=>$tabla4,"column"=>$column);
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
        $rpta = array($tabla);
        echo json_encode($rpta);
        break;
          case "sqlEvaluacionProveedorGrid":
            $tabla1 = array();
            $tabla2 = array();
            $tabla3 = array();
            $tabla4 = array();

            $column= array();
            $qry1 = $db->query("SELECT S.timestamp,S.id,E.descripcion as 'estado',P.razon_social as 'proveedor1',S.proveedor1_puntaje FROM `proveedor` as P INNER JOIN `proveedor_evaluacion` as S on P.id=S.proveedor1 INNER JOIN `per_estado` as E on S.estado=E.id;");
            $totreg1 = $db->num_rows($qry1);
            if ($totreg1>0) {
              for($xx=0; $xx<$totreg1; $xx++){
                $rs = $db->fetch_array($qry1);
                $tabla1[] = array(
                  "id" => $rs["id"],
                  "proveedor1" => $rs["proveedor1"],                                                       
                  "proveedor1_puntaje" =>$rs["proveedor1_puntaje"],
                  "estado" =>$rs["estado"], 
                  "fecha"       =>$rs["timestamp"]

                );
              }
               
            }
            $qry2 = $db->query("SELECT S.timestamp,S.id,E.descripcion as 'estado',P.razon_social as 'proveedor2',S.proveedor2_puntaje FROM `proveedor` as P INNER JOIN `proveedor_evaluacion` as S on P.id=S.proveedor2 INNER JOIN `per_estado` as E on S.estado=E.id;");
            $totreg2 = $db->num_rows($qry2);
            if ($totreg2>0) {
              for($xx=0; $xx<$totreg2; $xx++){
                $rs = $db->fetch_array($qry2);
                $tabla2[] = array(
                  "id" => $rs["id"],
                  "proveedor2" => $rs["proveedor2"],                                                       
                  "proveedor2_puntaje" =>$rs["proveedor2_puntaje"],      
                  "estado" =>$rs["estado"], 
                  "fecha"  =>$rs["timestamp"]

                );
              }
               
            }
            $qry3 = $db->query("SELECT S.timestamp,S.id,E.descripcion as 'estado',P.razon_social as 'proveedor3',S.proveedor3_puntaje FROM `proveedor` as P INNER JOIN `proveedor_evaluacion` as S on P.id=S.proveedor3 INNER JOIN `per_estado` as E on S.estado=E.id;");
            $totreg3 = $db->num_rows($qry3);
            if ($totreg3>0) {
              for($xx=0; $xx<$totreg3; $xx++){
                $rs = $db->fetch_array($qry3);
                $tabla3[] = array(
                  "id" => $rs["id"],
                  "proveedor3" => $rs["proveedor3"],                                                      
                  "proveedor3_puntaje" =>$rs["proveedor3_puntaje"], 
                  "estado" =>$rs["estado"],
                  "fecha"=>$rs["timestamp"]

                );
              }
               
            }
            
            for ($i=0; $i <$totreg3 ; $i++) { 
              $row = array_merge($tabla1[$i],$tabla2[$i],$tabla3[$i]);
              array_push($tabla4,$row);         
            }

            $column=array(            
              (object) array('key' => 'id','title' => 'ID'),                
              (object) array('key' => 'proveedor1','title' => 'Proveedor 1'),          
              (object) array('key' => 'proveedor1_puntaje','title' => 'Ptje Proveedor 1'),
              (object) array('key' => 'proveedor2','title' => 'Proveedor 2'),          
              (object) array('key' => 'proveedor2_puntaje','title' => 'Ptje Proveedor 2'),
              (object) array('key' => 'proveedor3','title' => 'Proveedor 3'),          
              (object) array('key' => 'proveedor3_puntaje','title' => 'Ptje Proveedor 3'),
              (object) array('key' => 'fecha','title' => 'Fecha de Evaluacion')                                   
            );
          //respuesta OT
          $rpta = array("data"=>$tabla4,"column"=>$column);
          //var_dump($tabla4);
          echo json_encode($rpta);
          break;
          case "sqlOrdenDeCompraGrid":
            $tabla = array();
            $column= array();
            $qry = $db->query("SELECT O.*,E.descripcion as 'estado_descripcion' FROM `orden_compra` O INNER JOIN `per_estado` E ON O.estado=E.id ORDER BY O.id DESC;");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "id" => $rs["id"],
                  "orden_compra" =>$rs["n_orden_compra"],                                            
                  "requerimiento" =>$rs["n_requerimiento"],
                  "fecha" =>$rs["fecha"],
                  "estado" =>$rs["estado_descripcion"]                      
                );
              }
                $column=array(            
                  (object) array('key' => 'orden_compra','title' => 'Nº Orden de Compra'),      
                  (object) array('key' => 'requerimiento','title' => 'Nº de Requerimiento'),
                  (object) array('key' => 'fecha','title' => 'Fecha'),          
                  (object) array('key' => 'estado','title' => 'Estado')                           
                );
            }
        
          //respuesta OT
          $rpta = array("data"=>$tabla,"column"=>$column);
          //var_dump($rpta);
          echo json_encode($rpta);
          break;
          case "sqlCategoryProveedorGrid":
            $tabla = array();
            $column= array();
            $qry = $db->query("SELECT  * FROM proveedor_categoria");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "id" => $rs["id"],
                  "description" =>$rs["description"]                                            
                );
              }
                $column=array( 
                  (object) array('key' => 'id','title' => 'N'),
                  (object) array('key' => 'description','title' => 'Descripción'),             
                );
            }
        
          //respuesta OT
          $rpta = array("data"=>$tabla,"column"=>$column);
          //var_dump($rpta);
          echo json_encode($rpta);
          break;
          case "sqlProveedorInactives":
            $tabla = array();
            $column= array();
            $qry = $db->query("SELECT  * FROM proveedor WHERE estado='2'");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "id" => $rs["id"],
                  "nombre" =>$rs["razon_social"]                                            
                );
              }
                $column=array( 
                  (object) array('key' => 'id','title' => 'N'),
                  (object) array('key' => 'nombre','title' => 'Nombre'),             
                );
            }
        
          //respuesta OT
          $rpta = array("data"=>$tabla,"column"=>$column);
          //var_dump($rpta);
          echo json_encode($rpta);
          break;
          case "sqlProveedorActives":
            $tabla = array();
            $column= array();
            $qry = $db->query("SELECT  * FROM proveedor WHERE estado='2'");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "id" => $rs["id"],
                  "nombre" =>$rs["razon_social"]                                            
                );
              }
                $column=array( 
                  (object) array('key' => 'id','title' => 'N'),
                  (object) array('key' => 'nombre','title' => 'Nombre'),             
                );
            }
        
          //respuesta OT
          $rpta = array("data"=>$tabla,"column"=>$column);
          //var_dump($rpta);
          echo json_encode($rpta);
          break;
          case "sqlItemsGrid": ////VERIFICAR CON LA ELIMINACION DE VEHICULO
            $tabla = array();
            $column= array();
            $qry = $db->query("select I.cantidad,I.id,C.description AS 'descripcion_clase',G.description AS 'descripcion_grupo',I.serie,I.parte,I.date_acquisition,I.active,I.condicion,I.descripcion from item as I INNER JOIN tb_grupo as G ON I.id_grupo=G.code INNER JOIN clase as C ON I.id_clase=C.code where C.code=I.id_clase AND C.grupo=I.id_grupo;");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "id" => $rs["id"],
                  "description" => $rs["active"],
                  "grupo" => $rs["descripcion_grupo"],
                  "clase" => $rs["descripcion_clase"],
                  "cantidad" => $rs["cantidad"],
                  "fecha" => $rs["date_acquisition"],    
                  "descripcion" => $rs["descripcion"]                                              
                );
              }
                $column=array( 
                  //(object) array('key' => 'id','title' => 'N° de Cod'),
                  (object) array('key' => 'description','title' => 'Activo'),
                  (object) array('key' => 'grupo','title' => 'Grupo'),
                  (object) array('key' => 'clase','title' => 'Clase'),
                  (object) array('key' => 'descripcion','title' => 'Descripcion'),
                  (object) array('key' => 'cantidad','title' => 'Cantidad'),
                  (object) array('key' => 'fecha','title' => 'Fecha de Adquisicion')                         
                );
            }
        
          //respuesta OT
          $rpta = array("data"=>$tabla,"column"=>$column);
          //var_dump($rpta);
          echo json_encode($rpta);
          break;
          case "sql_checkDuplicity_group":
            $code;
            $qry = $db->query("SELECT *  FROM `tb_grupo` WHERE description='".$data->data."'");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {        
              $code=true;
             }else{
              $code=false;
             }            
             $rpta = array("error"=>$code);             
             echo json_encode($rpta);

          break;
          case "sqlGroupGrid":
            $tabla = array();
            $column= array();
            $qry = $db->query("SELECT  * FROM tb_grupo");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "id" => $rs["id"],
                  "code" => $rs["code"],
                  "description" => $rs["description"]                           
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
          case "sqlProveedorGroup":
            $tabla = array();
            $column= array();
            $qry = $db->query("SELECT  * FROM proveedor_categoria");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "id" => $rs["id"],              
                  "description" => $rs["description"]                           
                );
              }
                $column=array( 
                 // (object) array('key' => 'id','title' => 'N°'),
                  (object) array('key' => 'code','title' => 'Categoria'),
                  (object) array('key' => 'description','title' => 'Descripcion')             
                );
            }
        
          //respuesta OT
          $rpta = array("data"=>$tabla,"column"=>$column);
          //var_dump($rpta);
          echo json_encode($rpta);
          break;  
          case "sqlGroupClassByGroup":
            $tabla = array();
            $column= array();
            $qry = $db->query("SELECT  * FROM clase where grupo='".$data->data."'");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "id" => $rs["id"],
                  "code" => $rs["code"],
                  "description" => $rs["description"]                           
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
          case "sqlGroupClassByGroupAndItems":
            $tabla = array();
            $column= array();
            $qry = $db->query("SELECT * FROM item where id_grupo='".$data->group."' AND id_clase='".$data->class."'");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "id" => $rs["id"],          
                  "description" => $rs["active"]                           
                );
              }
                $column=array( 
                 // (object) array('key' => 'id','title' => 'N°'),
                  (object) array('key' => 'id','title' => 'ID'),
                  (object) array('key' => 'description','title' => 'Descripcion')             
                );
            }
        
          //respuesta OT
          $rpta = array("data"=>$tabla,"column"=>$column);
          //var_dump($rpta);
          echo json_encode($rpta);
          break;     
          case "sqlGroupClassByGroupAndItemsDescripcion":
            $tabla = array();
            $column= array();
            $qry = $db->query("SELECT * FROM item where id='".$data->data."'");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
             // for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla = array(
                  "id" => $rs["id"],          
                  "description" => $rs["descripcion"],                           
                  "unidad_medida" => $rs["unidad_medida"],
                );
            //  }
                $column=array( 
                 // (object) array('key' => 'id','title' => 'N°'),
                  (object) array('key' => 'id','title' => 'ID'),
                  (object) array('key' => 'description','title' => 'Descripcion'),
                  (object) array('key' => 'unidad_medida','title' => 'Unidad de Medida')                
                );
            }
        
          //respuesta OT
          $rpta = array("data"=>$tabla,"column"=>$column);
          //var_dump($rpta);
          echo json_encode($rpta);
          break;     

          case "sql_get_orden_compra_by_id":
            $tabla = array();
            $column= array();
            $qry = $db->query("SELECT R.*,RI.precio AS precio,RI.item AS item,RI.codigo_parte AS codigo_parte,RI.n_parte as n_parte,RI.descripcion as descripcion,RI.cantidad as cantidad, RI.unidad_medida AS unidad_medida,O.total AS total,O.subtotal as subtotal,RI.prioridad AS prioridad,RI.observacion AS observacion,O.fecha as fecha_orden_compra,O.estado as estado_orden_compra ,O.n_orden_compra as n_orden_compra FROM `requerimiento_item` as RI INNER JOIN `requerimiento` as R ON RI.id_requerimiento=R.n_requerimiento INNER JOIN `orden_compra` as O ON R.n_requerimiento=O.n_requerimiento WHERE O.id='".$data->data."'");

            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "id" => $rs["id"],
                  "n_orden_compra" => $rs["n_orden_compra"],
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
                  "precio" => $rs["precio"],
                  "subtotal" => $rs["subtotal"],
                  "total" => $rs["total"],
                  "observacion" => $rs["observacion"],
                  "estado_orden_compra" => $rs["estado_orden_compra"],
                  "fecha_orden_compra" => $rs["fecha_orden_compra"]
                );
              }
              
            }

          $rpta = array("data"=>$tabla);      
          echo json_encode($rpta);
          break;    
          case "sql_delete_almacen":          
            $qry1 = $db->query("DELETE from  almacen WHERE id='".$data->value."'");     
            $rpta = array("error"=>0);
            echo json_encode($rpta);
    
          break;
          case "sql_delete_item":          
            $qry1 = $db->query("DELETE from  item WHERE id='".$data->value."'");            
            $rpta = array("error"=>0);
            echo json_encode($rpta);
    
          break;
          case "sql_delete_proveedor":          
            $qry1 = $db->query("DELETE from  proveedor WHERE id='".$data->value."'");              
            $rpta = array("error"=>0);
            echo json_encode($rpta);
    
          break;
          case "sql_delete_categoryProveedor":          
            $qry1 = $db->query("DELETE from  proveedor_categoria WHERE id='".$data->value."'");    
           
            $rpta = array("error"=>0);
            echo json_encode($rpta);
    
          break;
          case "sql_get_requerimiento_by_id":
            $tabla = array();
            $column= array();
            $qry = $db->query("SELECT R.*,RI.item AS item,RI.codigo_parte AS codigo_parte,RI.n_parte as n_parte,RI.descripcion as descripcion,RI.cantidad as cantidad, RI.unidad_medida AS unidad_medida,RI.prioridad AS prioridad,RI.observacion AS observacion, AR.descripcion as 'descripcion_area',S.nombre as 'nombre_solicitante', S.apellido as 'apellido_solicitante', PRIO.descripcion as 'descripcion_prioridad' FROM `requerimiento_item` as RI INNER JOIN `requerimiento` as R ON RI.id_requerimiento=R.n_requerimiento INNER JOIN `per_area` as AR ON AR.id=R.area INNER JOIN `per_aspirante` as S ON S.id=R.solicitante INNER JOIN `log_prioridad` as PRIO ON PRIO.id=R.prioridad WHERE R.id='".$data->data."'");

            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "id" => $rs["id"],
                  "n_requerimiento" => $rs["n_requerimiento"],
                  "area" => $rs["descripcion_area"],                           
                  "solicitante" => $rs["nombre_solicitante"]." ".$rs["apellido_solicitante"],
                  "centro_costo" => $rs["centro_costo"],
                  "fecha_requerimiento" => $rs["fecha_requerimiento"],
                  "prioridad_g" => $rs["descripcion_prioridad"],
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

          case "sql_get_last_orden_compra":
            $tabla = array();
            $qry = $db->query("SELECT id FROM `orden_compra` order by id desc limit 1;");
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
          case "sql_RequerimientosOrdenCompra_Add":
            $qry1="";   
            $sql1="";
            if((int)$data->data->estado==12){
               
              $sql1 = "INSERT INTO orden_compra 
              (n_orden_compra,
              n_requerimiento                  
              ) VALUES (
                '".$data->data->n_orden_compra."',  
                '".$data->data->n_requerimiento."'                    
                )";
                $qry1 = $db->query($sql1);
            }
           
         
              $qry2;      
              $sql2 = "UPDATE requerimiento
              SET estado = '".$data->data->estado."' 
              WHERE n_requerimiento='".$data->data->n_requerimiento."';";

            $qry2 = $db->query($sql2);
            $rpta = array("table1"=>$qry1,"table2"=>$qry2);
            echo json_encode($rpta);
          break;
          case "addCountItemForInventary":
            $qry1;  
            $lastCantidad;   
            $qry2;   
            $sql2;    
            $qry1 = $db->query("SELECT cantidad FROM `item` WHERE id='".$data->data->item."'");
            $totreg = $db->num_rows($qry1);
            if ($totreg>0) {              
                $rs = $db->fetch_array($qry1);
                $lastCantidad = $rs["cantidad"];    
                
                $sql2 = "UPDATE item
                SET cantidad = '".((int)$data->data->cantidad+(int)$lastCantidad)."' 
                WHERE id='".$data->data->item."';";
                $qry2 = $db->query($sql2);
            }
                    
          $rpta = array("table2"=>$qry2);
          echo json_encode($rpta);
          break;
          case "sql_saveItems":
            $qry1;      
            $sql1 = "INSERT INTO item 
            (id,
            serie,
            parte,
            date_acquisition,
            id_grupo,
            descripcion,
            coloquial,
            id_clase,
            correlative,
            active,            
            condicion,
            unidad_medida,
            marca,
            precio_unitario,
            garantia,
            id_orden_compra,
            inicio_garantia,
            fin_garantia           
            ) VALUES (
              '".$data->data->id."',  
              '".$data->data->serie."',              
              '".$data->data->parte."',
              '".$data->data->date_acquisition."',
              '".$data->data->id_grupo."',
              '".$data->data->descripcion."',
              '".$data->data->coloquial."',
              '".$data->data->id_clase."',
              '".$data->data->correlative."',              
              '".$data->data->active."',             
              '".$data->data->condicion."',
              '".$data->data->unidad_medida."',
              '".$data->data->marca."',
              '".$data->data->precio_unitario."',
              '".$data->data->garantia."',
              '".$data->data->id_orden_compra."',                        
              '".$data->data->inicio_garantia."',
              '".$data->data->fin_garantia."'
              )";    
              $qry1 = $db->query($sql1); 
                if($data->data->id_grupo==10){
                  $sql2 = "INSERT INTO log_vehiculo 
                  (id,
                  id_item                     
                  ) VALUES (             
                    '".$data->data->id_component."',                     
                    '".$data->data->id."'                        
                    )";    
                    $qry2 = $db->query($sql2);
                }else{
                  $sql2 = "INSERT INTO log_componente 
                  (id,
                  id_item                     
                  ) VALUES (                 
                    '".$data->data->id_component."',                 
                    '".$data->data->id."'                        
                    )";    
                    $qry2 = $db->query($sql2);
                }
              

              if(!is_null($data->data->id_orden_compra)){
                $qry3;  
                $sql3 = "UPDATE requerimiento_item
                SET cumplidos = '".$data->config->stateChangeNumber."'                
                WHERE id='".$data->data->id_item."'";
                  $qry3 = $db->query($sql3);                                         


                  if(($data->config->stateChangeOC)) {
                    $qry4;  
                    $sql4 = "UPDATE orden_compra
                    SET estado = 5                
                    WHERE n_orden_compra='".$data->data->id_orden_compra."'";
                      $qry4 = $db->query($sql4);   
                    
                  }
              }

          $rpta = array("table1"=>$qry1,"table2"=>$qry2,"table3"=>$qry3);
          echo json_encode($rpta);
          break;
          case "sql_saveItems2":
            $qry1;      
            $sql1 = "INSERT INTO item 
            (id,
            serie,
            parte,
            date_acquisition,
            id_grupo,
            descripcion,
            coloquial,
            id_clase,
            correlative,
            active,            
            condicion,
            unidad_medida,
            marca,
            precio_unitario,
            garantia,
            id_orden_compra,
            inicio_garantia,
            fin_garantia           
            ) VALUES (
              '".$data->data->id."',  
              '".$data->data->serie."',              
              '".$data->data->parte."',
              '".$data->data->date_acquisition."',
              '".$data->data->id_grupo."',
              '".$data->data->descripcion."',
              '".$data->data->coloquial."',
              '".$data->data->id_clase."',
              '".$data->data->correlative."',              
              '".$data->data->active."',             
              '".$data->data->condicion."',
              '".$data->data->unidad_medida."',
              '".$data->data->marca."',
              '".$data->data->precio_unitario."',
              '".$data->data->garantia."',
              '".$data->data->id_orden_compra."',                        
              '".$data->data->garantia_inicio."',
              '".$data->data->garantia_fin."'
              )";    
              $qry1 = $db->query($sql1); 

              $sql2 = "INSERT INTO log_componente 
              (id,
              id_item                     
              ) VALUES (      
                '".$data->data->id_component."',                       
                '".$data->data->id."'                        
                )";    
                $qry2 = $db->query($sql2);

                $qry5;      
                $sql5 = "INSERT INTO log_vehiculo_sistema 
                (id_tipo,
                id_vehiculo,
                id_componnente                          
                ) VALUES (
                  '".$data->data->sistema."',  
                  '".$data->data->id_vehiculo."',                                  
                  '".$data->data->id_component."'                        
                  )";    
                  $qry5 = $db->query($sql5); 


              if(!is_null($data->data->id_orden_compra)){
                $qry3;  
                $sql3 = "UPDATE requerimiento_item
                SET cumplidos = '".$data->config->stateChangeNumber."'                
                WHERE id='".$data->data->id_item."'";
                  $qry3 = $db->query($sql3);                                         

                 
               

                  if(($data->config->stateChangeOC)) {
                    $qry4;  
                    $sql4 = "UPDATE orden_compra
                    SET estado = 5                
                    WHERE n_orden_compra='".$data->data->id_orden_compra."'";
                      $qry4 = $db->query($sql4);   
                    
                  }
              }

            $rpta = array("table1"=>$qry1,"table2"=>$qry2,"table3"=>$qry3);
            echo json_encode($rpta);
          break;
          case "sql_saveProveedor":
            $qry1;      
            $sql1 = "INSERT INTO proveedor 
            (tipo,
            categoria,
            departamento,  
            provincia,
            distrito,
            grupo,
            clase_grupo,    
            ruc,
            razon_social,
            direccion, 
            telefono,
            celular,
            correo,
            n_soles,
            cci_soles,
            n_dolares,
            cci_dolares,
            banco_soles,
            banco_dolares,
            n_detracciones
            ) VALUES (
              '".$data->data->tipo."',  
              '".$data->data->categoria."',              
              '".$data->data->departamento."',
              '".$data->data->provincia."',
              '".$data->data->distrito."', 
              '".$data->data->grupo."',         
              '".$data->data->clase_grupo."',
              '".$data->data->ruc."',
              '".$data->data->razon_social."',
              '".$data->data->direccion."',
              '".$data->data->telefono."',
              '".$data->data->celular."',
              '".$data->data->correo."',
              '".$data->data->n_soles."',
              '".$data->data->cci_soles."',
              '".$data->data->n_dolares."',
              '".$data->data->cci_dolares."',
              '".$data->data->banco_soles."',
              '".$data->data->banco_dolares."',
              '".$data->data->n_detracciones."'
              )";
              $qry1 = $db->query($sql1);
         
          
            $rpta = array("table1"=>$qry1);
            echo json_encode($rpta);
          break;

          case "sql_get_details_seleccion_proveedor":
            $tabla1 = array();
            $tabla2 = array();
            $tabla3 = array();
            $tabla4 = array();
            $tabla5 = array();

        
            $qry1 = $db->query("SELECT S.timestamp,S.id,E.descripcion as 'estado',P.razon_social as 'proveedor1',S.tipo_servicio,S.proveedor1_puntaje FROM `proveedor` as P INNER JOIN `proveedor_seleccion` as S on P.id=S.proveedor1 INNER JOIN `per_estado` as E on S.estado=E.id WHERE S.id='".$data->value."';");
            $totreg1 = $db->num_rows($qry1);
            if ($totreg1>0) {
              for($xx=0; $xx<$totreg1; $xx++){
                $rs = $db->fetch_array($qry1);
                $tabla1[] = array(
                  "id" => $rs["id"],
                  "proveedor1" => $rs["proveedor1"],
                  "tipo_servicio" =>$rs["tipo_servicio"],                                            
                  "proveedor1_puntaje" =>$rs["proveedor1_puntaje"],
                  "fecha" =>$rs["timestamp"]        
                );
              }
               
            }
            $qry2 = $db->query("SELECT S.timestamp,S.id,E.descripcion as 'estado',P.razon_social as 'proveedor2',S.tipo_servicio,S.proveedor2_puntaje FROM `proveedor` as P INNER JOIN `proveedor_seleccion` as S on P.id=S.proveedor2 INNER JOIN `per_estado` as E on S.estado=E.id WHERE S.id='".$data->value."';");
            $totreg2 = $db->num_rows($qry2);
            if ($totreg2>0) {
              for($xx=0; $xx<$totreg2; $xx++){
                $rs = $db->fetch_array($qry2);
                $tabla2[] = array(
                  "id" => $rs["id"],
                  "proveedor2" => $rs["proveedor2"],
                  "tipo_servicio" =>$rs["tipo_servicio"],                                            
                  "proveedor2_puntaje" =>$rs["proveedor2_puntaje"],      
                  "fecha" =>$rs["timestamp"]          
                );
              }
               
            }
            $qry3 = $db->query("SELECT S.timestamp,S.id,E.descripcion as 'estado',P.razon_social as 'proveedor3',S.tipo_servicio,S.proveedor3_puntaje FROM `proveedor` as P INNER JOIN `proveedor_seleccion` as S on P.id=S.proveedor3 INNER JOIN `per_estado` as E on S.estado=E.id WHERE S.id='".$data->value."';");
            $totreg3 = $db->num_rows($qry3);
            if ($totreg3>0) {
              for($xx=0; $xx<$totreg3; $xx++){
                $rs = $db->fetch_array($qry3);
                $tabla3[] = array(
                  "id" => $rs["id"],
                  "proveedor3" => $rs["proveedor3"],
                  "tipo_servicio" =>$rs["tipo_servicio"],                                            
                  "proveedor3_puntaje" =>$rs["proveedor3_puntaje"], 
                  "fecha" =>$rs["timestamp"]                      
                );
              }
               
            }
            
            for ($i=0; $i <$totreg3 ; $i++) { 
              $row = array_merge($tabla1[$i],$tabla2[$i],$tabla3[$i]);
              $tabla4=$row;
             // array_push($tabla4,$row);         
            }


            $qry4 = $db->query("SELECT * FROM `proveedor_seleccion_criterios` WHERE id_proveedor_seleccion='".$data->value."'");
            $totreg4 = $db->num_rows($qry4);
            if ($totreg4>0) {
              for($xx=0; $xx<$totreg4; $xx++){
                $rs = $db->fetch_array($qry4);
                $tabla5[] = array(
                  "id" => $rs["id"],             
                  "PR_1" => $rs["PR_1"],                 
                  "PT_1" => $rs["PT_1"], 
                  "PR_2" => $rs["PR_2"],                 
                  "PT_2" => $rs["PT_2"], 
                  "PR_3" => $rs["PR_3"],                 
                  "PT_3" => $rs["PT_3"], 
                  "PR_4" => $rs["PR_4"],                 
                  "PT_4" => $rs["PT_4"], 
                  "PR_5" => $rs["PR_5"],                 
                  "PT_5" => $rs["PT_5"], 
                  "PR_6" => $rs["PR_6"],                 
                  "PT_6" => $rs["PT_6"], 
                  "PR_7" => $rs["PR_7"],                 
                  "PT_7" => $rs["PT_7"], 
                  "PR_8" => $rs["PR_8"],                 
                  "PT_8" => $rs["PT_8"], 
                );
              }
               }
        //respuesta OT
        $rpta = array("data"=>$tabla4,"criterios"=>$tabla5);
       // var_dump($rpta);
        echo json_encode($rpta);
          break;
          case "sql_get_details_evaluacion_proveedor":
            $tabla1 = array();
            $tabla2 = array();
            $tabla3 = array();
            $tabla4 = array();
            $tabla5 = array();

           
            $qry1 = $db->query("SELECT S.timestamp,S.id,E.descripcion as 'estado',P.razon_social as 'proveedor1',S.proveedor1_puntaje FROM `proveedor` as P INNER JOIN `proveedor_evaluacion` as S on P.id=S.proveedor1 INNER JOIN `per_estado` as E on S.estado=E.id WHERE S.id='".$data->value."';");
            $totreg1 = $db->num_rows($qry1);
            if ($totreg1>0) {
              for($xx=0; $xx<$totreg1; $xx++){
                $rs = $db->fetch_array($qry1);
                $tabla1[] = array(
                  "id" => $rs["id"],
                  "proveedor1" => $rs["proveedor1"],                                                       
                  "proveedor1_puntaje" =>$rs["proveedor1_puntaje"],
                  "estado" =>$rs["estado"], 
                  "fecha"       =>$rs["timestamp"]

                );
              }
               
            }
            $qry2 = $db->query("SELECT S.timestamp,S.id,E.descripcion as 'estado',P.razon_social as 'proveedor2',S.proveedor2_puntaje FROM `proveedor` as P INNER JOIN `proveedor_evaluacion` as S on P.id=S.proveedor2 INNER JOIN `per_estado` as E on S.estado=E.id WHERE S.id='".$data->value."';");
            $totreg2 = $db->num_rows($qry2);
            if ($totreg2>0) {
              for($xx=0; $xx<$totreg2; $xx++){
                $rs = $db->fetch_array($qry2);
                $tabla2[] = array(
                  "id" => $rs["id"],
                  "proveedor2" => $rs["proveedor2"],                                                       
                  "proveedor2_puntaje" =>$rs["proveedor2_puntaje"],      
                  "estado" =>$rs["estado"], 
                  "fecha"  =>$rs["timestamp"]

                );
              }
               
            }
            $qry3 = $db->query("SELECT S.timestamp,S.id,E.descripcion as 'estado',P.razon_social as 'proveedor3',S.proveedor3_puntaje FROM `proveedor` as P INNER JOIN `proveedor_evaluacion` as S on P.id=S.proveedor3 INNER JOIN `per_estado` as E on S.estado=E.id WHERE S.id='".$data->value."';");
            $totreg3 = $db->num_rows($qry3);
            if ($totreg3>0) {
              for($xx=0; $xx<$totreg3; $xx++){
                $rs = $db->fetch_array($qry3);
                $tabla3[] = array(
                  "id" => $rs["id"],
                  "proveedor3" => $rs["proveedor3"],                                                      
                  "proveedor3_puntaje" =>$rs["proveedor3_puntaje"], 
                  "estado" =>$rs["estado"],
                  "fecha"=>$rs["timestamp"]

                );
              }               
            }

            for ($i=0; $i <$totreg3 ; $i++) { 
              $row = array_merge($tabla1[$i],$tabla2[$i],$tabla3[$i]);
              $tabla4=$row;
             // array_push($tabla4,$row);         
            }


            $qry4 = $db->query("SELECT * FROM `proveedor_evaluacion_criterios` WHERE id_proveedor_evaluacion='".$data->value."'");
            $totreg4 = $db->num_rows($qry4);
            if ($totreg4>0) {
              for($xx=0; $xx<$totreg4; $xx++){
                $rs = $db->fetch_array($qry4);
                $tabla5[] = array(
                  "id" => $rs["id"],             
                  "PR_1" => $rs["PR_1"],                 
                  "PT_1" => $rs["PT_1"], 
                  "PR_2" => $rs["PR_2"],                 
                  "PT_2" => $rs["PT_2"]             
                );
              }
               }
        //respuesta OT
        //var_dump($tabla5);
        $rpta = array("data"=>$tabla4,"criterios"=>$tabla5);
        echo json_encode($rpta);
          break;
          case "sql_saveSeleccionProveedor":
            $qry1;      
            $sql1 = "INSERT INTO proveedor_seleccion 
            (id,
            tipo_servicio,
            evaluador,
            proveedor1,  
            proveedor2,
            proveedor3,
            proveedor1_puntaje,
            proveedor2_puntaje,    
            proveedor3_puntaje        
            ) VALUES (
              '".$data->data->id."', 
              '".$data->data->tipo_servicio."',  
              '".$data->data->evaluador."',              
              '".$data->data->proveedor1."',
              '".$data->data->proveedor2."',
              '".$data->data->proveedor3."', 
              '".$data->data->proveedor1_puntaje."',         
              '".$data->data->proveedor2_puntaje."',
              '".$data->data->proveedor3_puntaje."'          
              )";
              $qry1 = $db->query($sql1);
         
              $sql2 = "INSERT INTO proveedor_seleccion_criterios 
              (id_proveedor_seleccion,PT_1,PT_2,PT_3,PT_4,PT_5,PT_6,PT_7,PT_8) VALUES ";
              $sqldata2="";
                foreach ($data->criterio as $value) {
                  $sqldata2.= "('".$data->data->id."','".$value[0]."','".$value[1]."','".$value[2]."','".$value[3]."','".$value[4]."','".$value[5]."','".$value[6]."','".$value[7]."'),";
                 };
              $sqldata2=substr($sqldata2, 0, -1);       
              $sql2=$sql2.$sqldata2.";";
              $qry2 = $db->query($sql2);

            $rpta = array("table1"=>$qry1);
            echo json_encode($rpta);
          break;
          case "sql_saveEvaluacionProveedor":
            $qry1;      
            $sql1 = "INSERT INTO proveedor_evaluacion 
            (id,
            evaluador,
            proveedor1,  
            proveedor2,
            proveedor3,
            proveedor1_puntaje,
            proveedor2_puntaje,    
            proveedor3_puntaje        
            ) VALUES (     
              '".$data->data->id."', 
              '".$data->data->evaluador."',              
              '".$data->data->proveedor1."',
              '".$data->data->proveedor2."',
              '".$data->data->proveedor3."', 
              '".$data->data->proveedor1_puntaje."',         
              '".$data->data->proveedor2_puntaje."',
              '".$data->data->proveedor3_puntaje."'          
              )";
              $qry1 = $db->query($sql1);
         
              $sql2 = "INSERT INTO proveedor_evaluacion_criterios 
              (id_proveedor_evaluacion,PT_1,PT_2) VALUES ";
              $sqldata2="";
                foreach ($data->criterio as $value) {
                  $sqldata2.= "('".$data->data->id."','".$value[0]."','".$value[1]."'),";
                 };
              $sqldata2=substr($sqldata2, 0, -1);       
              $sql2=$sql2.$sqldata2.";";
              $qry2 = $db->query($sql2);


            $rpta = array("table1"=>$qry1);
            echo json_encode($rpta);
          break;
          case "sql_saveProveedorCategory":
            $qry1;      
            $sql1 = "INSERT INTO proveedor_categoria 
            (description         
            ) VALUES (
              '".$data->data->description."'    
              )";
              $qry1 = $db->query($sql1);
         
          
            $rpta = array("table1"=>$qry1);
            echo json_encode($rpta);
          break;
          case "sql_saveAlmacen":
            $qry1;      
            $sql1 = "INSERT INTO almacen 
            (estado,
            descripcion,  
            sede,
            direccion,
            referencia,         
            telefono,
            distrito,
            provincia,
            departamento                       
            ) VALUES (      
              '".$data->data->estado."',              
              '".$data->data->descripcion."',
              '".$data->data->sede."',
              '".$data->data->direccion."', 
              '".$data->data->referencia."',                   
              '".$data->data->telefono."',
              '".$data->data->distrito."',
              '".$data->data->provincia."',
              '".$data->data->departamento."'
              )";
              $qry1 = $db->query($sql1);
         
          
            $rpta = array("table1"=>$qry1);
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
                "nombres" =>$rs["active"],                      
                "apellidos" =>$rs["description"],                             
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
          case "sql_Update_OrdenCompra":
               

            if((int)$data->data->estado==9){
              $qry1;  
              $sql1 = "UPDATE orden_compra
              SET subtotal_cotizacion = '".$data->data->subtotal."',
                  total_cotizacion = '".$data->data->total."',
                  estado = '".$data->data->estado."'
              WHERE n_orden_compra='".$data->data->n_orden_compra."';";
                $qry1 = $db->query($sql1);
                               
                /*foreach ($data->data->itemOrdenCompra as $value) {
                  $sql2 = "UPDATE requerimiento_item
                  SET precio = '".$value[1]."'                
                  WHERE item='".$value[0]."' AND id_requerimiento='".$data->data->n_orden_requerimiento."';";
                    $qry2 = $db->query($sql2);
                  };*/
             
              $rpta = array("table1"=>$qry1);
              echo json_encode($rpta);
            }else{
              $qry1;  
              $sql1 = "UPDATE orden_compra
              SET subtotal = '".$data->data->subtotal."',
                  total = '".$data->data->total."',                  
                  id_proveedor = '".$data->data->proveedor."',            
                  condicion = '".$data->data->condicion."',
                  moneda = '".$data->data->moneda."',
                  fecha_emision = '".$data->data->fecha_emision."',
                  fecha_atencion = '".$data->data->fecha_atencion."',
                  tiempo_orden_compra = '".$data->data->tiempo_atencion."',
                  tiempo_proveedor = '".$data->data->tiempo_proveedor."',
                  estado = '".$data->data->estado."'
              WHERE n_orden_compra='".$data->data->n_orden_compra."';";
                $qry1 = $db->query($sql1);
                                 
                foreach ($data->data->itemOrdenCompra as $value) {
                  $sql2 = "UPDATE requerimiento_item
                  SET precio = '".$value[1]."'                
                  WHERE item='".$value[0]."' AND id_requerimiento='".$data->data->n_orden_requerimiento."';";
                    $qry2 = $db->query($sql2);
                  };
             
              $rpta = array("table1"=>$qry1);
              echo json_encode($rpta);
            }
           
          break;
          case "sql_saveGroups":
            $qry1;      
            $sql1 = "INSERT INTO tb_grupo 
            (code,
            description            
            ) VALUES (
              '".$data->data->codigo."',  
              '".$data->data->descripcion."'      
              )";
              $qry1 = $db->query($sql1);
         
          
            $rpta = array("table1"=>$qry1);
            echo json_encode($rpta);
          break;
          case "sql_saveGroupClass":
            $qry1;      
            $sql1 = "INSERT INTO clase 
            (grupo,
            code,  
            description,
            acro            
            ) VALUES (
              '".$data->data->grupo."',
              '".$data->data->codigo."',  
              '".$data->data->descripcion."',
              '".$data->data->acro."'
              )";
              $qry1 = $db->query($sql1);
         
          
            $rpta = array("table1"=>$qry1);
            echo json_encode($rpta);
          break;
          case "sqlGroupClassGrid":
            $tabla = array();
            $column= array();
            $qry = $db->query("SELECT  * FROM clase");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "id" => $rs["id"],
                  "code" => $rs["code"],
                  "grupo" => $rs["grupo"],                 
                  "description" => $rs["description"]                         
                );
              }
                $column=array( 
                 // (object) array('key' => 'id','title' => 'N'),
                  (object) array('key' => 'grupo','title' => 'Grupo'),
                  (object) array('key' => 'code','title' => 'Codigo'),                 
                  (object) array('key' => 'description','title' => 'Descripcion')      
                );
            }
        
          //respuesta OT
         // var_dump($tabla);
          $rpta = array("data"=>$tabla,"column"=>$column);
          //var_dump($rpta);
          echo json_encode($rpta);
          break;
          case "sql_getCorrelativeGroup":      
            $code;
            $qry = $db->query("SELECT code  FROM `tb_grupo` ORDER BY id DESC LIMIT 1;");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              $rs = $db->fetch_array($qry);
              $code=$rs["code"];
             }else{
              $code="9";
             }            
             $rpta = array("code"=>$code);             
             echo json_encode($rpta);
          break;
          
          case "sql_getCorrelativeGroupClass":      
            $code;
            $qry = $db->query("SELECT code  FROM `clase` WHERE grupo='".$data->data."' ORDER BY id DESC LIMIT 1;");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              $rs = $db->fetch_array($qry);
              $code=$rs["code"];
             }else{
              $code="0";
             }            
             $rpta = array("code"=>$code);             
             echo json_encode($rpta);
          break;
          case "sql_getCorrelativeItems":      ////VERIFICAR CON LA ELIMINACION DE VEHICULO   
            $qry = $db->query("select I.correlative as correlative,C.description as acro,C.grupo as grupo,C.code as code from item as I 
                INNER JOIN clase as C ON I.id_clase=C.code
                where I.id_clase='".$data->data->first."' AND I.id_grupo='".$data->data->second."' AND C.code='".$data->data->first."' AND C.grupo='".$data->data->second."' ORDER BY I.correlative DESC limit 1;");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              $rs = $db->fetch_array($qry);
              $tabla = array(
                "grupo" => $rs["grupo"],
                "correlative" => $rs["correlative"],
                "acro" => $rs["acro"],
                "code" => $rs["code"]                            
              );
             }else{
              $qry = $db->query("SELECT * FROM `clase` WHERE code='".$data->data->first."' AND grupo='".$data->data->second."'");
              $rs = $db->fetch_array($qry);
              $tabla = array(
                "grupo" => $rs["grupo"],
                "correlative" => "0",
                "acro" => $rs["description"],
                "code" => $rs["code"]                            
              );
             }         
             //var_dump($tabla);               
             $rpta = array("data"=>$tabla);             
             echo json_encode($rpta);
           
          break;
          case "sqlProveedorGrid":
            $tabla = array();
            $column= array();
            $qry = $db->query("SELECT P.*,C.description as categoriaDescripcion,CL.description AS 'descripcion_clase',G.description AS 'descripcion_grupo',E.descripcion AS 'descripcion_estado' FROM `proveedor` as P INNER JOIN `proveedor_categoria` AS C on P.categoria=C.id INNER JOIN `clase` AS CL on P.clase_grupo=CL.id INNER JOIN `tb_grupo` AS G on P.grupo=G.code INNER JOIN `per_estado` AS E on P.estado=E.id;");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "id" => $rs["id"],
                  "tipo" => $rs["tipo"],
                  "categoria" => $rs["categoriaDescripcion"],
                  "grupo" => $rs["descripcion_grupo"],                            
                  "clase_grupo" => $rs["descripcion_clase"],
                  "razon_social" => $rs["razon_social"],
                  "estado" => $rs["descripcion_estado"]
                );
              }
                $column=array( 
                  (object) array('key' => 'id','title' => 'N'),
                  (object) array('key' => 'razon_social','title' => 'Nombre'),
                  (object) array('key' => 'categoria','title' => 'Categoria'),
                  (object) array('key' => 'tipo','title' => 'Tipo'),            
                  (object) array('key' => 'grupo','title' => 'Grupo'),
                  (object) array('key' => 'clase_grupo','title' => 'Clase de Grupo'),
                  (object) array('key' => 'estado','title' => 'Estado')
                );
            }
        
          //respuesta OT
          //var_dump($tabla);
          $rpta = array("data"=>$tabla,"column"=>$column);
          //var_dump($rpta);
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