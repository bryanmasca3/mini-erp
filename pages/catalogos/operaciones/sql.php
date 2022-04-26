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
            $qry = $db->query("select * from tb_equipos where status=1 ");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "id" => $rs["id_eq"],
                  "nombre" =>$rs["codigo"]." ".$rs["descripcion"],
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
                  "status"=> $rs["status"]
                );
              }
            }
        
        //respuesta OT
        $rpta = array("tabla"=>$tabla);
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

        case "01_getOdometrobyId":
            $tabla = array();
            $qry = $db->query("select * from tb_odometro where vehiculo='".$data->id."' and status=1");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
                for($xx=0; $xx<$totreg; $xx++){
                    $rs = $db->fetch_array($qry);
                    $tabla[] = array(
                        "id" => $rs["id"],
                        "odometro" => $rs["odometro"],
                        "vehiculo" => $rs["vehiculo"],
                        "fecha" => $rs["fecha"],
                        "hora" => $rs["hora"],
                        "status"=> $rs["status"]
                    );
                }
            }

        //respuesta OT
        $rpta = array("tabla"=>$tabla);
        echo json_encode($rpta);
        break;

        case "02_grid": 
            $tabla = array();
            $qry = $db->query("select * from tb_conductores where status=1 ");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "id" => $rs["id"],
                  "nombre" => $rs["nombre"],
                  "apellidos" => $rs["apellidos"],
                  "fecha_ingreso" => $rs["fecha_ingreso"],
                  "estado_conductor"=> $rs["estado_conductor"],
                  "empleado"=> $rs["empleado"],
                  "ciudad"=> $rs["ciudad"],
                  "direccion"=> $rs["direccion"],
                  "fecha_nacimiento"=> $rs["fecha_nacimiento"],
                  "telepeaje"=> $rs["telepeaje"],
                  "Etiqueta"=> $rs["Etiqueta"],
                  "tipo_licencia"=> $rs["tipo_licencia"],
                  "num_licencia"=> $rs["num_licencia"],
                  "fecha_vencimiento"=> $rs["fecha_vencimiento"],
                  "grupo"=> $rs["grupo"],
                  "comentario"=> $rs["comentario"],
                  "archivo"=> $rs["archivo"]
                );
              }
            }
        
        //respuesta OT
        $rpta = array("tabla"=>$tabla);
        echo json_encode($rpta);
        break;

        case "04_grid": 
            $tabla = array();
            $qry = $db->query("select * from tb_ope_tarea where status=1 ");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "id" => $rs["id"],
                  "nombre" =>$rs["nombre"],
                  "tipo" => $rs["tipo"],
                  "fecha_limite" => $rs["fecha_limite"],
                  "prioridad"=> $rs["prioridad"],
                  "vehiculo"=> $rs["vehiculo"],
                  "Responsable"=> $rs["Responsable"],
                  "Conductor"=> $rs["Conductor"],
                  "Proveedor"=> $rs["Proveedor"],
                  "status"=> $rs["status"]
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
?>