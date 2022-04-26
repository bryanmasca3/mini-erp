<?php
  include_once('../../../includes/sess_verifica.php');

  if(isset($_SESSION["usr_ID"])){
    if (isset($_REQUEST["appSQL"])){
      include_once('../../../includes/db_database.php');
      include_once('../../../includes/funciones.php');

      $data = json_decode($_REQUEST['appSQL']);
      switch ($data->TipoQuery) {

        case "01_datosAlmacen":
          //sede
          $sede = array();
          $qry = $db->query("select * from tb_sede where status=1");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $sede[] = array(
                "ID" => $rs["id_sede"],
                "nombre" => $rs["descripcion"]
              );
            }
          }

          //responsable
          $responsable = array();
          $qry = $db->query("select * from tb_usuarios where status=1");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $responsable[] = array(
                "ID" => $rs["id_user"],
                "nombre" => $rs["apellidos"]." ".$rs["nombre"]
              );
            }
          }

          //pais
          $pais = array();
          $qry = $db->query("select * from tb_pais where status=1");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $pais[] = array(
                "ID" => $rs["id_pais"],
                "nombre" => $rs["descripcion"]
              );
            }
          }

          //departamento
          $departamento = array();
          $qry = $db->query("select * from tb_departamento where status=1");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $departamento[] = array(
                "ID" => $rs["id_dep"],
                "nombre" => $rs["descripcion"]
              );
            }
          }

          //grupo
          $grupo = array();
          $qry = $db->query("select * from tb_grupo where status=1");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $grupo[] = array(
                "ID" => $rs["id_grupo"],
                "codigo" => $rs["codigo"]
              );
            }
          }

          //herramienta
          $herramienta = array();
          $qry = $db->query("select * from tb_item where (clase=11 OR clase=12 OR clase=13)and status=1");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $herramienta[] = array(
                "ID" => $rs["id_item"],
                "codigo" => $rs["clase"]." - ".$rs["nombre"]
              );
            }
          }

          //tipo usuario
          $tipoUsu = array();
          $qry = $db->query("select * from tb_tipousuario where status=1");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tipoUsu[] = array(
                "ID" => $rs["id_tipousu"],
                "nombre" => $rs["tipo"]
              );
            }
          }

          //moneda
          $moneda = array();
          $qry = $db->query("select * from tb_moneda where status=1");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $moneda[] = array(
                "ID" => $rs["id_moneda"],
                "nombre" => $rs["nombre"]." (".$rs["codigo"].")"
              );
            }
          }

          //proveedor
          $proveedor = array();
          $qry = $db->query("select * from tb_proveedor where status=1");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $proveedor[] = array(
                "ID" => $rs["id_proveedor"],
                "codigo" => $rs["codigo"]."-".$rs["nombre"]
              );
            }
          }

          //stock clase
          $stockClase = array();
          $qry = $db->query("select * from tb_stock_clase where status=1");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $stockClase[] = array(
                "ID" => $rs["id_stock_clase"],
                "nombre" => $rs["nombre"]
              );
            }
          }

          //Stock tipo
          $stockTipo = array();
          $qry = $db->query("select * from tb_stock_tipo where status=1");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $stockTipo[] = array(
                "ID" => $rs["id_stock_tipo"],
                "nombre" => $rs["nombre"]
              );
            }
          }

          //group class
          $groupClase = array();
          $qry = $db->query("select * from tb_grupo where status=1");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $groupClase[] = array(
                "ID" => $rs["codigo"],
                "codigo" => $rs["codigo"]." - ".$rs["descripcion"]
              );
            }
          }

          //group class
          //$groupClase = array();
          $qry = $db->query("select * from tb_clase where status=1");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $groupClase[] = array(
                "ID" => $rs["codigo"],
                "codigo" => $rs["codigo"]." - ".$rs["descripcion"]
              );
            }
          }

          //usuario
          $usuario = array();
          $qry = $db->query("select * from tb_usuarios where status=1");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $usuario[] = array(
                "ID" => $rs["id_user"],
                "codigo" => $rs["nombre"]." ".$rs["apellidos"]
              );
            }
          }

          //tarea
          $tarea = array();
          $qry = $db->query("select * from tb_tarea where status=1");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tarea[] = array(
                "ID" => $rs["id_tarea"],
                "codigo" =>$rs["nombre"]
              );
            }
          }

          //proveedor
          $cotizacion = array();
          $qry = $db->query("select * from tb_requisiciones where status=1");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $cotizacion[] = array(
                "ID" => $rs["id_req"],
                "codigo" => $rs["id_req"]." - ".$rs["descripcion"]
              );
            }
          }


          /* //provincia
          $provincia = array();
          $qry = $db->query("select * from tb_provincia where status=1");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $provincia[] = array(
                "ID" => $rs["id_prov"],
                "descripcion" => $rs["descripcion"]
              );
            }
          }

          //distrito
          $distrito = array();
          $qry = $db->query("select * from tb_distrito where status=1");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $distrito[] = array(
                "ID" => $rs["id_dist"],
                "descripcion" => $rs["descripcion"]
              );
            }
          } */

          $rpta = array("sede"=>$sede ,"responsable"=>$responsable,"pais"=>$pais,"departamento"=>$departamento,"grupo"=>$grupo, "herramienta"=>$herramienta,"tipoUsuario"=>$tipoUsu, "moneda"=>$moneda, "proveedor"=>$proveedor, "stockClase"=>$stockClase, "stockTipo"=>$stockTipo, "groupClase"=>$groupClase, "usuario"=>$usuario, "tarea"=>$tarea, "cotizacion"=>$cotizacion);
          echo json_encode($rpta);
          break;
        case "01_datosGrupo":
          //grupo
          $grupo = array();
          $qry = $db->query("select * from tb_grupo where status=1");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $grupo[] = array(
                "ID" => $rs["id_grupo"],
                "codigo" => $rs["codigo"]
              );
            }
          }
          $rpta = array("grupo"=>$grupo);
          echo json_encode($rpta);
          break;
        case "01_datosAlmaProv":
          //respuesta
          $tabla = array();
          $qry = $db->query("select * from tb_provincia where departamento='".$data->departamento."'AND status=1");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla[] = array(
                "ID" => $rs["id_prov"],
                "nombre" => $rs["descripcion"]
              );
            }
          }

          
          $rpta = array("tabla"=>$tabla);
          echo json_encode($rpta);
          break;
        
        case "01_datosAlmaDist":
          //respuesta
          $tabla = array();
          $qry = $db->query("select * from tb_distrito where provincia='".$data->provincia."'AND status=1");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla[] = array(
                "ID" => $rs["id_dist"],
                "nombre" => $rs["descripcion"]
              );
            }
          }

          
          $rpta = array("tabla"=>$tabla);
          echo json_encode($rpta);
          break;

          case "01_distgetbyid":
            //respuesta
            $tabla = array();
            $qry = $db->query("select * from tb_distrito where id_dist='".$data->distrito."'AND status=1");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "ID" => $rs["id_dist"],
                  "nombre" => $rs["descripcion"],
                  "provincia" => $rs["provincia"]
                );
              }
            }
  
            
            $rpta = array("tabla"=>$tabla);
            echo json_encode($rpta);
            break;

          case "01_provgetbyid":
            //respuesta
            $tabla = array();
            $qry = $db->query("select * from tb_provincia where id_prov='".$data->provincia."'AND status=1");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "ID" => $rs["id_prov"],
                  "nombre" => $rs["descripcion"],
                  "departamento" => $rs["departamento"]
                );
              }
            }
  
            
            $rpta = array("tabla"=>$tabla);
            echo json_encode($rpta);
            break;

          case "01_depgetbyid":
            //respuesta
            $tabla = array();
            $qry = $db->query("select * from tb_departamento where id_dep='".$data->departamento."'AND status=1");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "ID" => $rs["id_dep"],
                  "nombre" => $rs["descripcion"],
                  "pais" => $rs["pais"]
                );
              }
            }
  
            
            $rpta = array("tabla"=>$tabla);
            echo json_encode($rpta);
            break;

          case "01_paisgetbyid":
            //respuesta
            $tabla = array();
            $qry = $db->query("select * from tb_pais where id_pais='".$data->pais."'AND status=1");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "ID" => $rs["id_pais"],
                  "nombre" => $rs["descripcion"]
                );
              }
            }
  
            
            $rpta = array("tabla"=>$tabla);
            echo json_encode($rpta);
            break;


        case "01_nuevo":
          //respuesta

          //departamento
          $departamento = array();
          $qry = $db->query("select * from tb_departamento where status=1");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $departamento[] = array(
                "ID" => $rs["id_dep"],
                "nombre" => $rs["descripcion"]
              );
            }
          }

          //provincia
          $provincia = array();
          $qry = $db->query("select * from tb_provincia where departamento='".$departamento[0]["ID"]."' and status=1");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $provincia[] = array(
                "ID" => $rs["id_prov"],
                "nombre" => $rs["descripcion"]
              );
            }
          }

          //distrito
          $distrito = array();
          $qry = $db->query("select * from tb_distrito where provincia= '".$provincia[0]["ID"]."' AND status=1");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $distrito[] = array(
                "ID" => $rs["id_dist"],
                "nombre" => $rs["descripcion"]
              );
            }
          } 

          

          $rpta = array("departamento"=>$departamento,"provincia"=>$provincia,"distrito"=>$distrito);
          echo json_encode($rpta);
          break;

        case "01_almacen":
          //respuesta
          $tabla = array();
          $qry = $db->query("select * from tb_almacen where status=1");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla[] = array(
                "ID" => $rs["id_almacen"],
                "descripcion" => $rs["descripcion"]
              );
            }
          }

          //respuesta OT
          $rpta = array("tabla"=>$tabla);
          echo json_encode($rpta);
          break;

          case "01_getbyid":
            $tabla = array();
            $qry = $db->query("select * from tb_almacen where id_almacen='".$data->almacen."' and status=1");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "ID" => $rs["id_almacen"],
                  "estado" => $rs["estado"],
                  "descripcion" => $rs["descripcion"],
                  "sede" => $rs["sede"],
                  "direccion" => $rs["direccion"],
                  "referencia" => $rs["referencia"],
                  "responsable" => $rs["responsable"],
                  "telefono" => $rs["telefono"],
                  "distrito" => $rs["distrito"],
                  "provincia" => $rs["provincia"],
                  "departamento" => $rs["departamento"],
                  "fecha" => $rs["fecha"]
                  
                );
              }
            }
  
            //respuesta OT
            $rpta = array("tabla"=>$tabla);
            echo json_encode($rpta);
            break;
          
          case "01_save":
            switch($data->commandSQL){
              case "INS":
                
                $sql = "INSERT INTO tb_almacen 
                (estado, descripcion, sede, direccion,referencia,responsable,
                telefono,distrito,provincia,departamento,fecha,status) VALUES (
                  '".$data->estado."',
                  '".$data->descripcion."',
                  '".$data->sede."',
                  '".$data->direccion."',
                  '".$data->referencia."',
                  '".$data->responsable."',
                  '".$data->telefono."',
                  '".$data->distrito."',
                  '".$data->provincia."',
                  '".$data->departamento."',
                  '".$data->fecha."',
                  '".$data->status."'
                  )";
                $qry = $db->query($sql);
                break;
              case "UPD":
                $soliciID = "";
                $sql = "update tb_almacen set 
                estado='".$data->estado."'
                ,descripcion='".$data->descripcion."'
                ,sede='".$data->sede."'
                ,direccion='".$data->direccion."'
                ,referencia='".$data->referencia."'
                ,responsable='".$data->responsable."'
                ,telefono='".$data->telefono."'
                ,distrito='".$data->distrito."'
                ,provincia='".$data->provincia."'
                ,departamento='".$data->departamento."'
                ,fecha='".$data->fecha."' where id_almacen=".$data->almID;
                //$params = array($data->solitraID,$data->codarbol,$data->estado,$data->prioriID,$data->tipotraID, $data->depasigID, $data->fecha, $data->solicitado, $data->descripcion, $data->creado, $data->notifica, $data->telefono, $data->creado_correo);
                //$qry = $db->query_params($sql, $params);
                $qry = $db->query($sql);
                break;
              case "DEL":
                $soliciID = "";
                $sql = "update tb_almacen set status='".$data->status."' where id_almacen=".$data->almID;
                $qry = $db->query($sql);
                break;
            }
          //respuesta ST
          $rpta = array("error"=>0,"sql"=>$sql);
          echo json_encode($rpta);
          break;
        
        case "02_getbyid":
          $tabla = array();
          $qry = $db->query("select * from tb_grupo where id_grupo='".$data->grupo."' and status=1");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla[] = array(
                "ID" => $rs["id_grupo"],
                "codigo" => $rs["codigo"],
                "descripcion" => $rs["descripcion"]
              );
            }
          }

          //respuesta OT
          $rpta = array("tabla"=>$tabla);
          echo json_encode($rpta);
          break;

        case "02_getgrupo":
          $tabla = array();
          $qry = $db->query("select * from tb_grupo where status=1 and codigo=".$data->codigo);
          
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla[] = array(
                "ID" => $rs["id_grupo"],
                "codigo" => $rs["codigo"],
                "descripcion" => $rs["descripcion"]
              );
            }
          }
    
          //respuesta OT
          $rpta = array("tabla"=>$tabla);
          echo json_encode($rpta);
          break;

        case "02_grid_search":
          $tabla = array();
          if($data->search_text===""){
            $qry = $db->query("select * from tb_grupo where status=1");
          }else{
            $qry = $db->query("select * from tb_grupo where status=1 and codigo='".$data->search_text."'");
          }
          
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla[] = array(
                "ID" => $rs["id_grupo"],
                "codigo" => $rs["codigo"],
                "descripcion" => $rs["descripcion"]
              );
            }
          }

          //respuesta OT
          $rpta = array("tabla"=>$tabla);
          echo json_encode($rpta);
          break;

        case "02_save":
          switch($data->commandSQL){
            case "INS":
              
              $sql = "INSERT INTO tb_grupo 
              (codigo, descripcion) VALUES (
                '".$data->codigo."',
                '".$data->descripcion."'
                )";
              $qry = $db->query($sql);
              break;
            case "UPD":
              $ID = "";
              $sql = "update tb_grupo set 
              codigo='".$data->codigo."'
              ,descripcion='".$data->descripcion."' where id_grupo=".$data->ID;
              //$params = array($data->solitraID,$data->codarbol,$data->estado,$data->prioriID,$data->tipotraID, $data->depasigID, $data->fecha, $data->solicitado, $data->descripcion, $data->creado, $data->notifica, $data->telefono, $data->creado_correo);
              //$qry = $db->query_params($sql, $params);
              $qry = $db->query($sql);
              break;
            case "DEL":
              $soliciID = "";
              $sql = "update tb_grupo set status='".$data->status."' where id_grupo=".$data->ID;
              $qry = $db->query($sql);
              break;
          }
        //respuesta ST
        $rpta = array("error"=>0,"sql"=>$sql);
        echo json_encode($rpta);
        break;
      case "022_save":
        switch($data->commandSQL){
          case "INS":
            
            $sql = "INSERT INTO tb_clase 
            (grupo,codigo, descripcion) VALUES (
              '".$data->grupo."',
              '".$data->codigo."',
              '".$data->descripcion."'
              )";
            $qry = $db->query($sql);
            break;
          case "UPD":
            $soliciID = "";
            $sql = "update tb_clase set 
            codigo='".$data->codigo."',
            grupo='".$data->grupo."',
            descripcion='".$data->descripcion."' where id_clase=".$data->ID;
            //$params = array($data->solitraID,$data->codarbol,$data->estado,$data->prioriID,$data->tipotraID, $data->depasigID, $data->fecha, $data->solicitado, $data->descripcion, $data->creado, $data->notifica, $data->telefono, $data->creado_correo);
            //$qry = $db->query_params($sql, $params);
            $qry = $db->query($sql);
            break;
          case "DEL":
            $soliciID = "";
            $sql = "update tb_clase set status='".$data->status."' where id_clase=".$data->ID;
            $qry = $db->query($sql);
            break;
        }
      //respuesta ST
      $rpta = array("error"=>0,"sql"=>$sql);
      echo json_encode($rpta);
      break;

    case "02_grid": //tipoQuery from arbol.js - function app02GridAll
      $tabla = array();
      $qry = $db->query("select * from tb_grupo where status=1 ");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);
          $tabla[] = array(
            "ID" => $rs["id_grupo"],
            "codigo" => $rs["codigo"],
            "descripcion" => $rs["descripcion"]
          );
        }
      }

      //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;
      
    case "022_grid": //tipoQuery from arbol.js - function app02GridAll
      $tabla = array();
      $qry = $db->query("select * from tb_clase where status=1 ");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);
          $tabla[] = array(
            "ID" => $rs["id_clase"],
            "codigo" => $rs["codigo"],
            "descripcion" => $rs["descripcion"]
          );
        }
      }

      //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;
    case "022_grid_search":
      $tabla = array();
      if($data->search_text===""){
        $qry = $db->query("select * from tb_clase where status=1");
      }else{
        $qry = $db->query("select * from tb_clase where status=1 and codigo='".$data->search_text."'");
      }
      
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);
          $tabla[] = array(
            "ID" => $rs["id_clase"],
            "codigo" => $rs["codigo"],
            "descripcion" => $rs["descripcion"]
          );
        }
      }

      //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;

    case "022_getbygrupo":
      $tabla = array();
      $qry = $db->query("select * from tb_clase where status=1 and grupo=".$data->grupo);
     
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);
          $tabla[] = array(
            "ID" => $rs["id_clase"],
            "codigo" => $rs["codigo"],
            "descripcion" => $rs["descripcion"]
          );
        }
      }

      //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;

    case "022_getclase":
      $tabla = array();
      $qry = $db->query("select * from tb_clase where status=1 and codigo=".$data->codigo);
      
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);
          $tabla[] = array(
            "ID" => $rs["id_clase"],
            "codigo" => $rs["codigo"],
            "descripcion" => $rs["descripcion"]
          );
        }
      }

      //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;
    case "022_getbyid":
      $tabla = array();
      $qry = $db->query("select * from tb_clase where id_clase='".$data->clase."' and status=1");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);
          $tabla[] = array(
            "ID" => $rs["id_clase"],
            "grupo" => $rs["grupo"],
            "codigo" => $rs["codigo"],
            "descripcion" => $rs["descripcion"]
          );
        }
      }

      //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;

    case "03_grid": //tipoQuery from arbol.js - function app02GridAll
      $tabla = array();
      $qry = $db->query("select * from tb_item where status=1 ");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);
          $tabla[] = array(
            "ID" => $rs["id_item"],
            "clase" => $rs["clase"],
            "proveedor" => $rs["proveedor"],
            "fabricante" => $rs["num_parte"],
            "nombre" => $rs["nombre"],
            "descripcion" => $rs["descripcion"],
            "unidad" => $rs["unidad"],
            "stock" => $rs["stock"],
            "precio" => $rs["precio"]
          );
        }
      }

      //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;

    case "03_save":
      switch($data->commandSQL){
        case "INS":
          
          $sql = "INSERT INTO tb_item 
          (cod_stock, num_stock, clase, clas_stock, tipo_stock, unidad, moneda, rop, roq, stock_min, stock, precio, proveedor, 
          num_parte, nombre, descripcion, nom_coloquial, apl_tipo, apl_referencia, apl_cantidad, componente) VALUES (
            '".$data->stockCod."',
            '".$data->stockNum."',
            '".$data->clase."',
            '".$data->stockClase."',
            '".$data->stockTipo."',
            '".$data->uoi."',
            '".$data->moneda."',
            '".$data->rop."',
            '".$data->roq."',
            '".$data->stockMin."',
            '".$data->stock."',
            '".$data->precio."',
            '".$data->proveedor."',
            '".$data->numParte."',
            '".$data->nombre."',
            '".$data->descripcion."',
            '".$data->nombreCol."',
            '".$data->apltipo."',
            '".$data->aplReferencia."',
            '".$data->aplCantidad."',
            '".$data->componente."'
            )";
          $qry = $db->query($sql);
          break;
        case "UPD":
          $ID = "";
          $sql = "update tb_item set 
          cod_stock='".$data->stockCod."',
          num_stock='".$data->stockNum."',
          clase='".$data->clase."',
          clas_stock='".$data->stockClase."',
          tipo_stock='".$data->stockTipo."',
          unidad='".$data->uoi."',
          moneda='".$data->moneda."',
          rop='".$data->rop."',
          roq='".$data->roq."',
          stock_min='".$data->stockMin."',
          stock='".$data->stock."',
          precio='".$data->precio."',
          proveedor='".$data->proveedor."',
          num_parte='".$data->numParte."',
          nombre='".$data->nombre."',
          descripcion='".$data->descripcion."',
          nom_coloquial='".$data->nombreCol."',
          apl_tipo='".$data->apltipo."',
          apl_referencia='".$data->aplReferencia."',
          apl_cantidad='".$data->aplCantidad."',
          componente='".$data->componente."' where id_item=".$data->ID;
          //$params = array($data->solitraID,$data->codarbol,$data->estado,$data->prioriID,$data->tipotraID, $data->depasigID, $data->fecha, $data->solicitado, $data->descripcion, $data->creado, $data->notifica, $data->telefono, $data->creado_correo);
          //$qry = $db->query_params($sql, $params);
          $qry = $db->query($sql);
          break;
        case "UPD_STOCK":
          $ID = "";
          $sql = "update tb_item set 
          stock='".$data->stock."'
           where id_item=".$data->ID;
          $qry = $db->query($sql);
          break;
        case "DEL":
          $soliciID = "";
          $sql = "update tb_item set status='".$data->status."' where id_item=".$data->ID;
          $qry = $db->query($sql);
          break;
      }
    //respuesta ST
    $rpta = array("error"=>0,"sql"=>$sql);
    echo json_encode($rpta);
    break;

  case "03_getbyid":
    $tabla = array();
    $qry = $db->query("select * from tb_item where id_item='".$data->ID."' and status=1");
    $totreg = $db->num_rows($qry);
    if ($totreg>0) {
      for($xx=0; $xx<$totreg; $xx++){
        $rs = $db->fetch_array($qry);
        $tabla[] = array(
          "ID" => $rs["id_item"],
          "stockCod" => $rs["cod_stock"],
          "stockNum" => $rs["num_stock"],
          "clase" => $rs["clase"],
          "stockClase" => $rs["clas_stock"],
          "stockTipo" => $rs["tipo_stock"],
          "unidad" => $rs["unidad"],
          "moneda" => $rs["moneda"],
          "rop" => $rs["rop"],
          "roq" => $rs["roq"],
          "stockMin" => $rs["stock_min"],
          "stock" => $rs["stock"],
          "precio" => $rs["precio"],
          "proveedor" => $rs["proveedor"],
          "numParte" => $rs["num_parte"],
          "nombre" => $rs["nombre"],
          "descripcion" => $rs["descripcion"],
          "nombreCol" => $rs["nom_coloquial"],
          "aplTipo" => $rs["apl_tipo"],
          "aplReferencia" => $rs["apl_referencia"],
          "aplCantidad" => $rs["apl_cantidad"],
          "componente" => $rs["componente"]

        );
      }
    }

    //respuesta OT
    $rpta = array("tabla"=>$tabla);
    echo json_encode($rpta);
    break;

  case "03_getbyclase":
    $tabla = array();
    $qry = $db->query("select * from tb_item where clase='".$data->ID."' and status=1");
    $totreg = $db->num_rows($qry);
    if ($totreg>0) {
      for($xx=0; $xx<$totreg; $xx++){
        $rs = $db->fetch_array($qry);
        $tabla[] = array(
          "ID" => $rs["id_item"],
          "stockCod" => $rs["cod_stock"],
          "stockNum" => $rs["num_stock"],
          "clase" => $rs["clase"],
          "stockClase" => $rs["clas_stock"],
          "stockTipo" => $rs["tipo_stock"],
          "unidad" => $rs["unidad"],
          "moneda" => $rs["moneda"],
          "rop" => $rs["rop"],
          "roq" => $rs["roq"],
          "stockMin" => $rs["stock_min"],
          "stock" => $rs["stock"],
          "precio" => $rs["precio"],
          "proveedor" => $rs["proveedor"],
          "numParte" => $rs["num_parte"],
          "nombre" => $rs["nombre"],
          "descripcion" => $rs["descripcion"],
          "nombreCol" => $rs["nom_coloquial"],
          "aplTipo" => $rs["apl_tipo"],
          "aplReferencia" => $rs["apl_referencia"],
          "aplCantidad" => $rs["apl_cantidad"],
          "componente" => $rs["componente"]

        );
      }
    }

    //respuesta OT
    $rpta = array("tabla"=>$tabla);
    echo json_encode($rpta);
    break;

  case "04_grid": 
    $tabla = array();
    $qry = $db->query("select * from tb_retiro where status=1 ");
    $totreg = $db->num_rows($qry);
    if ($totreg>0) {
      for($xx=0; $xx<$totreg; $xx++){
        $rs = $db->fetch_array($qry);
        $tabla[] = array(
          "ID" => $rs["id_retiro"],
          "usuario" => $rs["usuario"],
          "tarea" => $rs["tarea"],
          "fecha" => $rs["fecha"],
          "estado" => $rs["estado"]
        );
      }
    }

    //respuesta OT
    $rpta = array("tabla"=>$tabla);
    echo json_encode($rpta);
    break;
  
  case "04_save":
    $sql="";
    $tabla = array();
    switch($data->commandSQL){
      case "INS":
        $tabla = array();
      
        $sql = "INSERT INTO tb_retiro 
        (usuario, tarea, estado) VALUES (
          '".$data->usuarioID."',
          '".$data->tareaID."',
          '".$data->estado."'
          )";
        $qry = $db->query($sql);
        
        $sql="SELECT MAX( id_retiro ) FROM tb_retiro";
        $qry = $db->query($sql);
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla[] = array(
              "ID" => $rs["MAX( id_retiro )"]
              
            );
          }
        }
        break;
      case "INS_DET":
        $tabla = array();
        $sql = "INSERT INTO tb_retiro_detalle
        (retiro, herramienta,herra_nombre, cantidad) VALUES (
          '".$data->retiro."',
          '".$data->herramienta."',
          '".$data->herraNombre."',
          '".$data->cantidad."'
          )";
        $qry = $db->query($sql);
        break;
      case "INS_DET_TAR":
        $tabla = array();
        $sql = "INSERT INTO tb_retiro_tarea
        (retiro, tdetalle,retiro_des, retiro_cant) VALUES (
          '".$data->retiro."',
          '".$data->tareaDetalle."',
          '".$data->retiroDes."',
          '".$data->retiroCant."'
          )";
        $qry = $db->query($sql);
        break;
      case "UPD":
        $tabla = array();
        $soliciID = "";
        $sql = "update tb_retiro set 
        estado='".$data->estado."' where id_retiro=".$data->ID;
        $qry = $db->query($sql);
        break;

      case "UPD_DET_TAR":
        $tabla = array();
        $soliciID = "";
        $sql = "update tb_retiro_tarea set 
        devol_des='".$data->devolDes."',
        devol_cant='".$data->devolCant."' where id_rtarea=".$data->ID;
        $qry = $db->query($sql);
        break;
      case "DEL":
        $tabla = array();
        $soliciID = "";
        $sql = "update tb_clase set status='".$data->status."' where id_clase=".$data->ID;
        $qry = $db->query($sql);
        break;
    }
  //respuesta ST
  $rpta = array("error"=>0,"sql"=>$sql,"tabla"=>$tabla);
  echo json_encode($rpta);
  break;

  /* case "04_getTarDetByTar":
    $tabla = array();
    $qry = $db->query("select * from tb_tarea_detalle where tarea='".$data->ID."' and status=1");
    $totreg = $db->num_rows($qry);
    if ($totreg>0) {
      for($xx=0; $xx<$totreg; $xx++){
        $rs = $db->fetch_array($qry);
        $tabla[] = array(
          "ID" => $rs["id_herramienta"],
          "nombre" => $rs["nombre"],
          "cant_total" => $rs["can_total"],
          "cant_disp" => $rs["can_disp"]
        );
      }
    }

    //respuesta OT
    $rpta = array("tabla"=>$tabla);
    echo json_encode($rpta);
    break; */
  case "04_getbyid":
    $tabla = array();
    $qry = $db->query("select * from tb_retiro where id_retiro='".$data->ID."' and status=1");
    $totreg = $db->num_rows($qry);
    if ($totreg>0) {
      for($xx=0; $xx<$totreg; $xx++){
        $rs = $db->fetch_array($qry);
        $tabla[] = array(
          "ID" => $rs["id_retiro"],
          "usuario" => $rs["usuario"],
          "tarea" => $rs["tarea"],
          "fecha" => $rs["fecha"],
          "estado" => $rs["estado"]
          
        );
      }
    }

    //respuesta OT
    $rpta = array("tabla"=>$tabla);
    echo json_encode($rpta);
    break;

    case "04_getbyidEstado":
      $tabla = array();
      $qry = $db->query("select * from tb_retiro where id_retiro='".$data->ID."' and estado='".$data->estado."' and status=1");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);
          $tabla[] = array(
            "ID" => $rs["id_retiro"],
            "usuario" => $rs["usuario"],
            "tarea" => $rs["tarea"],
            "fecha" => $rs["fecha"],
            "estado" => $rs["estado"]
            
          );
        }
      }
  
      //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;

  case "04_getDetalles":
    $tabla = array();
    $qry = $db->query("select * from tb_retiro_detalle where retiro='".$data->ID."' and status=1");
    $totreg = $db->num_rows($qry);
    if ($totreg>0) {
      for($xx=0; $xx<$totreg; $xx++){
        $rs = $db->fetch_array($qry);
        $tabla[] = array(
          "ID" => $rs["id_rdetalle"],
          "retiroID" => $rs["retiro"],
          "herramientaID" => $rs["herramienta"],
          "herramientaNombre" => $rs["herra_nombre"],
          "cantidad" => $rs["cantidad"]
        );
      }
    }

    //respuesta OT
    $rpta = array("tabla"=>$tabla);
    echo json_encode($rpta);
    break;
    case "06_grid": //tipoQuery from arbol.js - function app02GridAll
      $tabla = array();
      $qry = $db->query("select * from tb_herramienta where status=1 ");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);
          $tabla[] = array(
            "ID" => $rs["id_herramienta"],
            "nombre" => $rs["nombre"],
            "consumible" => $rs["consumible"],
            "cant_tot" => $rs["can_total"],
            "cant_disp" => $rs["can_disp"]
          );
        }
      }

      //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;

    case "07_grid": //tipoQuery from arbol.js - function app02GridAll
      $tabla = array();
      $qry = $db->query("select * from tb_tarea where status=1 ");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);
          $tabla[] = array(
            "ID" => $rs["id_tarea"],
            "nombre" => $rs["nombre"],
            "descripcion" => $rs["descripcion"]
          );
        }
      }

      //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;

    case "07_getHerrabyid":
      $tabla = array();
      $qry = $db->query("select * from tb_herramienta where id_herramienta='".$data->ID."' and status=1");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);
          $tabla[] = array(
            "ID" => $rs["id_herramienta"],
            "nombre" => $rs["nombre"],
            "cant_total" => $rs["can_total"],
            "cant_disp" => $rs["can_disp"]
          );
        }
      }

      //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;
    
    case "07_save":
      switch($data->commandSQL){
        case "INS":
          $tabla = array();
        
          $sql = "INSERT INTO tb_tarea 
          (nombre, descripcion) VALUES (
            '".$data->nombre."',
            '".$data->descripcion."'
            )";
          $qry = $db->query($sql);
          
          $sql="SELECT MAX( id_tarea ) FROM tb_tarea";
          $qry = $db->query($sql);
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla[] = array(
                "ID" => $rs["MAX( id_tarea )"]
                
              );
            }
          }
          break;
        case "INS_DET":
          $tabla = array();
          $sql = "INSERT INTO tb_tarea_detalle
          (tarea, herramienta,herra_nombre, cantidad) VALUES (
            '".$data->tarea."',
            '".$data->herramienta."',
            '".$data->herraNombre."',
            '".$data->cantidad."'
            )";
          $qry = $db->query($sql);
          break;
        case "UPD":
          $tabla = array();
          $soliciID = "";
          $sql = "update tb_clase set 
          codigo='".$data->codigo."'
          ,descripcion='".$data->descripcion." where id_almacen=".$data->ID;
          //$params = array($data->solitraID,$data->codarbol,$data->estado,$data->prioriID,$data->tipotraID, $data->depasigID, $data->fecha, $data->solicitado, $data->descripcion, $data->creado, $data->notifica, $data->telefono, $data->creado_correo);
          //$qry = $db->query_params($sql, $params);
          $qry = $db->query($sql);
          break;
        case "DEL":
          $tabla = array();
          $soliciID = "";
          $sql = "update tb_clase set status='".$data->status."' where id_clase=".$data->ID;
          $qry = $db->query($sql);
          break;
      }
    //respuesta ST
    $rpta = array("error"=>0,"sql"=>$sql,"tabla"=>$tabla);
    echo json_encode($rpta);
    break;

  case "07_getbyid":
    $tabla = array();
    $qry = $db->query("select * from tb_tarea where id_tarea='".$data->ID."' and status=1");
    $totreg = $db->num_rows($qry);
    if ($totreg>0) {
      for($xx=0; $xx<$totreg; $xx++){
        $rs = $db->fetch_array($qry);
        $tabla[] = array(
          "ID" => $rs["id_tarea"],
          "nombre" => $rs["nombre"],
          "descripcion" => $rs["descripcion"]
        );
      }
    }

    //respuesta OT
    $rpta = array("tabla"=>$tabla);
    echo json_encode($rpta);
    break;

  case "07_getDetalles":
    $tabla = array();
    $qry = $db->query("select * from tb_tarea_detalle where tarea='".$data->ID."' and status=1");
    $totreg = $db->num_rows($qry);
    if ($totreg>0) {
      for($xx=0; $xx<$totreg; $xx++){
        $rs = $db->fetch_array($qry);
        $tabla[] = array(
          "ID" => $rs["id_tdetalle"],
          "tareaID" => $rs["tarea"],
          "herramientaID" => $rs["herramienta"],
          "herramientaNombre" => $rs["herra_nombre"],
          "cantidad" => $rs["cantidad"]
        );
      }
    }

    //respuesta OT
    $rpta = array("tabla"=>$tabla);
    echo json_encode($rpta);
    break;

    case "07_getDetallesTarea":
      $tabla = array();
      $qry = $db->query("select * from tb_retiro_tarea where tdetalle='".$data->ID."' AND retiro='".$data->retiroID."'and status=1");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);
          $tabla[] = array(
            "ID" => $rs["id_rtarea"],
            "retiro" => $rs["retiro"],
            "retiroDes" => $rs["retiro_des"],
            "retiroCant" => $rs["retiro_cant"],
            "devolDes" => $rs["devol_des"]
          );
        }
      }
  
      //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;

  case "08_grid": 
    $tabla = array();
    $qry = $db->query("select * from tb_usuarios where status=1 ");
    $totreg = $db->num_rows($qry);
    if ($totreg>0) {
      for($xx=0; $xx<$totreg; $xx++){
        $rs = $db->fetch_array($qry);
        $tabla[] = array(
          "ID" => $rs["id_user"],
          "dni" => $rs["dni"],
          "nombre" => $rs["nombre"],
          "apellidos" => $rs["apellidos"],
          "correo" => $rs["correo"],
          "tipo" => $rs["tipouser"],
          "telefono" => $rs["telefono"],
          "usuario" => $rs["login"]
        );
      }
    }

    //respuesta OT
    $rpta = array("tabla"=>$tabla);
    echo json_encode($rpta);
    break;

  case "08_save":
    switch($data->commandSQL){
      
      case "INS":
        $tabla = array();
        $sql = "INSERT INTO tb_usuarios
        (dni, nombre, apellidos, correo, tipouser, pasword, telefono, login) VALUES (
          '".$data->dni."',
          '".$data->nombre."',
          '".$data->apellidos."',
          '".$data->correo."',
          '".$data->rol."',
          '".$data->contrasena."',
          '".$data->telefono."',
          '".$data->usuario."'
          )";
        $qry = $db->query($sql);
        break;
      case "UPD":
        $tabla = array();
        $soliciID = "";
        if($data->contrasena==0){
          $sql = "update tb_usuarios set 
          dni='".$data->dni."',
          nombre='".$data->nombre."',
          apellidos='".$data->apellidos."',
          correo='".$data->correo."',
          tipouser='".$data->rol."',
          telefono='".$data->telefono."',
          login='".$data->usuario."' where id_user=".$data->ID;
          $qry = $db->query($sql);
        }else{
          $sql = "update tb_usuarios set 
          dni='".$data->dni."',
          nombre='".$data->nombre."',
          apellidos='".$data->apellidos."',
          correo='".$data->correo."',
          tipouser='".$data->rol."',
          pasword='".$data->contrasena."',
          telefono='".$data->telefono."',
          login='".$data->usuario."' where id_user=".$data->ID;
          $qry = $db->query($sql); 
        }
        
        break;
      case "DEL":
        $tabla = array();
        $soliciID = "";
        $sql = "update tb_usuarios set status='".$data->status."' where id_user=".$data->ID;
        $qry = $db->query($sql);
        break;
    }
  
  $rpta = array("error"=>0,"sql"=>$sql,"tabla"=>$tabla);
  echo json_encode($rpta);
  break;

case "08_getbyid":
  $tabla = array();
  $qry = $db->query("select * from tb_usuarios where id_user='".$data->ID."' and status=1");
  $totreg = $db->num_rows($qry);
  if ($totreg>0) {
    for($xx=0; $xx<$totreg; $xx++){
      $rs = $db->fetch_array($qry);
      $tabla[] = array(
        "ID" => $rs["id_user"],
        "dni" => $rs["dni"],
        "nombre" => $rs["nombre"],
        "apellidos" => $rs["apellidos"],
        "correo" => $rs["correo"],
        "rol" => $rs["tipouser"],
        "telefono" => $rs["telefono"],
        "usuario" => $rs["login"]
      );
    }
  }

  //respuesta OT
  $rpta = array("tabla"=>$tabla);
  echo json_encode($rpta);
  break;

case "09_grid": 
  $tabla = array();
  $qry = $db->query("select * from tb_requisiciones where status=1 ");
  $totreg = $db->num_rows($qry);
  if ($totreg>0) {
    for($xx=0; $xx<$totreg; $xx++){
      $rs = $db->fetch_array($qry);
      $tabla[] = array(
        "ID" => $rs["id_req"],
        "fecha" => $rs["fecha"],
        "usuario" => $rs["adquisitivo"],
        "precio" => $rs["precio"],
        "prof" => $rs["prof"],
        "tipo" => $rs["tipo"],
        "prioridad" => $rs["prioridad"],
        "ordenNum" => $rs["orden_num"],
        "ordenItem" => $rs["orden_item"],
        "descripcion" => $rs["descripcion"],
        "tag" => $rs["tag"],
        "estado"=>$rs["estado"],
        "estadoP"=>$rs["estado_p"]
      );
    }
  }

  //respuesta OT
  $rpta = array("tabla"=>$tabla);
  echo json_encode($rpta);
  break;

case "09_getbyid":
  $tabla = array();
  $qry = $db->query("select * from tb_requisiciones where id_req='".$data->ID."' and status=1");
  $totreg = $db->num_rows($qry);
  if ($totreg>0) {
    for($xx=0; $xx<$totreg; $xx++){
      $rs = $db->fetch_array($qry);
      $tabla[] = array(
        "ID" => $rs["id_req"],
        "fecha" => $rs["fecha"],
        "usuario" => $rs["adquisitivo"],
        "precio" => $rs["precio"],
        "prof" => $rs["prof"],
        "tipo" => $rs["tipo"],
        "prioridad" => $rs["prioridad"],
        "ordenNum" => $rs["orden_num"],
        "ordenItem" => $rs["orden_item"],
        "tag" => $rs["tag"],
        "descripcion"=> $rs["descripcion"],
        "estado"=>$rs["estado"]
      );
    }
  }

  //respuesta OT
  $rpta = array("tabla"=>$tabla);
  echo json_encode($rpta);
  break;

case "09_getProv":
  $tabla = array();
  $qry = $db->query("select * from tb_proveedor where id_proveedor='".$data->ID."' and status=1");
  $totreg = $db->num_rows($qry);
  if ($totreg>0) {
    for($xx=0; $xx<$totreg; $xx++){
      $rs = $db->fetch_array($qry);
      $tabla[] = array(
        "ID" => $rs["id_proveedor"],
        "codigo" => $rs["codigo"],
        "nombre" => $rs["nombre"],
        "descripcion" => $rs["descripcion"]
        
      );
    }
  }

  //respuesta OT
  $rpta = array("tabla"=>$tabla);
  echo json_encode($rpta);
  break;

case "09_save":
  switch($data->commandSQL){
    case "INS":
      
      $sql = "INSERT INTO tb_requisiciones 
      (item, fecha_cierre, descripcion) VALUES (
        '".$data->item."',
        '".$data->fecha."',
        '".$data->descripcion."'
        )";
      $qry = $db->query($sql);
      break;

    case "INS_PROV":
    
      $sql = "INSERT INTO tb_req_prov 
      (requisicion, proveedor) VALUES (
        '".$data->requisicion."',
        '".$data->proveedor."'
        )";
      $qry = $db->query($sql);
      break;
    case "UPD":
      $soliciID = "";
      $sql = "update tb_requisiciones set 
      descripcion='".$data->descripcion."',
      estado='".$data->estado."'
      ,fecha='".$data->fecha."' where id_req=".$data->ID;
      $qry = $db->query($sql);
      break;

    case "UPD_EST":
      $soliciID = "";
      $sql = "update tb_requisiciones set 
      estado='".$data->estado."' where id_req=".$data->ID;
      $qry = $db->query($sql);
      break;
    case "DEL":
      /* $soliciID = "";
      $sql = "update tb_almacen set status='".$data->status."' where id_almacen=".$data->almID;
      $qry = $db->query($sql); */
      break;
  }
  //respuesta ST
  $rpta = array("error"=>0,"sql"=>$sql);
  echo json_encode($rpta);
  break;
  case "10_grid": 
    $tabla = array();
    $qry = $db->query("select * from tb_requisiciones where status=1 ");
    $totreg = $db->num_rows($qry);
    if ($totreg>0) {
      for($xx=0; $xx<$totreg; $xx++){
        $rs = $db->fetch_array($qry);
        $tabla[] = array(
          "ID" => $rs["id_req"],
          "item" => $rs["item"],
          "descripcion" => $rs["descripcion"],
          "fecha" => $rs["fecha_cierre"],
          "estado"=> $rs["estado"]
        );
      }
    }

    //respuesta OT
    $rpta = array("tabla"=>$tabla);
    echo json_encode($rpta);
    break;

  case "10_getbyid":
    $tabla = array();
    $qry = $db->query("select * from tb_requisiciones where id_req='".$data->ID."' and status=1");
    $totreg = $db->num_rows($qry);
    if ($totreg>0) {
      for($xx=0; $xx<$totreg; $xx++){
        $rs = $db->fetch_array($qry);
        $tabla[] = array(
          "ID" => $rs["id_req"],
          "item" => $rs["item"],
          "descripcion" => $rs["descripcion"],
          "fecha" => $rs["fecha_cierre"],
          "estado"=> $rs["estado"],

        );
      }
    }
    //respuesta OT
    $rpta = array("tabla"=>$tabla);
    echo json_encode($rpta);
    break;

  case "11_getCot":
    $tabla = array();
    $qry = $db->query("select * from tb_req_prov where requisicion='".$data->cotizacion."' and proveedor='".$data->proveedor."' and status=1");
    $totreg = $db->num_rows($qry);
    if ($totreg>0) {
      for($xx=0; $xx<$totreg; $xx++){
        $rs = $db->fetch_array($qry);
        $tabla[] = array(
          "ID" => $rs["id_reqprov"],
          "cotizacion" => $rs["requisicion"],
          "proveedor" => $rs["proveedor"]
        );
      }
    }

    //respuesta OT
    $rpta = array("tabla"=>$tabla);
    echo json_encode($rpta);
    break;

  case "11_save":
    switch($data->commandSQL){

      case "UPD":
        $soliciID = "";
        $sql = "update tb_req_prov set 
        precio='".$data->precio."'
         where id_reqprov =".$data->ID;
        $qry = $db->query($sql);
        break;
  
    }
    //respuesta ST
    $rpta = array("error"=>0,"sql"=>$sql);
    echo json_encode($rpta);
    break;

    case "12_getbyPre":
      $tabla = array();
      $qry = $db->query("select * from tb_req_prov where precio!=0 and status=1");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);
          $tabla[] = array(
            "ID" => $rs["id_reqprov"],
            "cotizacion" => $rs["requisicion"],
            "proveedor" => $rs["proveedor"],
            "precio" => $rs["precio"],
            "estado" => $rs["estado"]
  
          );
        }
      }
      //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;

      case "12_getbyPreId":
        $tabla = array();
        $qry = $db->query("select * from tb_req_prov where id_reqprov='".$data->ID."' AND precio!=0 and status=1");
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla[] = array(
              "ID" => $rs["id_reqprov"],
              "cotizacion" => $rs["requisicion"],
              "proveedor" => $rs["proveedor"],
              "precio" => $rs["precio"]
    
            );
          }
        }
        //respuesta OT
        $rpta = array("tabla"=>$tabla);
        echo json_encode($rpta);
        break;
  

    case "12_getbyid":
      $tabla = array();
      $qry = $db->query("select * from tb_req_prov where id_reqprov='".$data->ID."' and status=1");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);
          $tabla[] = array(
            "ID" => $rs["id_reqprov"],
            "cotizacion" => $rs["requisicion"],
            "proveedor" => $rs["proveedor"],
            "precio" => $rs["precio"]
  
          );
        }
      }
      //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;

    case "12_save":
      $sql="";
      switch($data->commandSQL){
        case "INS":
          
          $sql = "INSERT INTO tb_orden_compra 
          (req_prov, cantidad, total, fecha) VALUES (
            '".$data->cotizacion."',
            '".$data->cantidad."',
            '".$data->total."',
            '".$data->fecha."'
            )";
          $qry = $db->query($sql);
          break;

        case "UPD_EST":
          $soliciID = "";
          $sql = "update tb_req_prov set 
          estado='".$data->estado."' where id_reqprov=".$data->ID;
          $qry = $db->query($sql);
          break;
      
      }
      //respuesta ST
      $rpta = array("error"=>0,"sql"=>$sql);
      echo json_encode($rpta);
      break;
      

    case "13_grid": 
      $tabla = array();
      $qry = $db->query("select * from tb_orden_compra where status=1 ");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);
          $tabla[] = array(
            "ID" => $rs["id_orden"],
            "cotizacion" => $rs["req_prov"],
            "cantidad" => $rs["cantidad"],
            "total" => $rs["total"],
            "estado"=> $rs["estado"]
          );
        }
      }
  
      //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;


    case "13_aprov": 
      $sql = "update tb_orden_compra set 
      estado='".$data->estado."' where id_orden=".$data->ID;
      $qry = $db->query($sql);
    
      $rpta = array("sql"=>$qry);
      echo json_encode($rpta);
      break;
    
    case "13_getbyid":
      $tabla = array();
      $qry = $db->query("select * from tb_orden_compra where id_orden='".$data->ID."' and status=1");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);
          $tabla[] = array(
            "ID" => $rs["id_orden"],
            "cotizacion" => $rs["req_prov"],
            "cantidad" => $rs["cantidad"],
            "total" => $rs["total"],
            "fecha" => $rs["fecha"]
          );
        }
      }
    
      //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;
      
    case "14_grid": 
      $tabla = array();
      $qry = $db->query("select * from tb_proveedor where status=1 ");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);
          $tabla[] = array(
            "ID" => $rs["id_proveedor"],
            "codigo" => $rs["codigo"],
            "ruc" => $rs["ruc"],
            "nombre" => $rs["nombre"],
            "descripcion" => $rs["descripcion"]
            
          );
        }
      }
  
      //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;

    case "14_getbyid":
      $tabla = array();
      $qry = $db->query("select * from tb_proveedor where id_proveedor='".$data->ID."' and status=1");
      $totreg = $db->num_rows($qry);
      if ($totreg>0) {
        for($xx=0; $xx<$totreg; $xx++){
          $rs = $db->fetch_array($qry);
          $tabla[] = array(
            "ID" => $rs["id_proveedor"],
            "codigo" => $rs["codigo"],
            "ruc" => $rs["ruc"],
            "nombre" => $rs["nombre"],
            "descripcion" => $rs["descripcion"],
            "telefono" => $rs["telefono"],
            "email" => $rs["email"],
            "direccion" => $rs["direccion"]
          );
        }
      }
    
      //respuesta OT
      $rpta = array("tabla"=>$tabla);
      echo json_encode($rpta);
      break;
    case "14_save":
      $tabla = array();
      switch($data->commandSQL){
        
        case "INS":
          $tabla = array();
          $sql = "INSERT INTO tb_proveedor
          (codigo, ruc, nombre, descripcion, telefono, email, direccion) VALUES (
            '".$data->codigo."',
            '".$data->ruc."',
            '".$data->nombre."',
            '".$data->descripcion."',
            '".$data->telefono."',
            '".$data->email."',
            '".$data->direccion."'
            )";
          $qry = $db->query($sql);
          break;
        case "UPD":
          $tabla = array();
          $soliciID = "";
         
            $sql = "update tb_proveedor set 
            codigo='".$data->codigo."',
            ruc='".$data->ruc."',
            nombre='".$data->nombre."',
            telefono='".$data->telefono."',
            email='".$data->email."',
            direccion='".$data->direccion."',
            descripcion='".$data->descripcion."' where id_proveedor =".$data->ID;
            $qry = $db->query($sql);

          break;
        case "DEL":
          $tabla = array();
          $soliciID = "";
          $sql = "update tb_proveedor set status='".$data->status."' where id_proveedor=".$data->ID;
          $qry = $db->query($sql);
          break;
      }


    $rpta = array("error"=>0,"sql"=>$sql,"tabla"=>$tabla);
    echo json_encode($rpta);
    break;

  case "14_getbyid":
    $tabla = array();
    $qry = $db->query("select * from tb_proveedor where id_proveedor='".$data->ID."' and status=1");
    $totreg = $db->num_rows($qry);
    if ($totreg>0) {
      for($xx=0; $xx<$totreg; $xx++){
        $rs = $db->fetch_array($qry);
        $tabla[] = array(
          "ID" => $rs["id_proveedor"],
          "codigo" => $rs["codigo"],
          "ruc" => $rs["ruc"],
          "nombre" => $rs["nombre"],
          "descripcion" => $rs["descripcion"]
        );
      }
    }
  
    //respuesta OT
    $rpta = array("tabla"=>$tabla);
    echo json_encode($rpta);
    break;

  case "15_getbyid":
    $tabla = array();
    $qry = $db->query("select * from tb_empresa where id_empresa ='".$data->ID."' and status=1");
    $totreg = $db->num_rows($qry);
    if ($totreg>0) {
      for($xx=0; $xx<$totreg; $xx++){
        $rs = $db->fetch_array($qry);
        $tabla[] = array(
          "ID" => $rs["id_empresa"],
          "nombre" => $rs["nombre"],
          "contacto" => $rs["contacto"],
          "telefono" => $rs["telefono"],
          "email" => $rs["email"]

        );
      }
    }
    //respuesta OT
    $rpta = array("tabla"=>$tabla);
    echo json_encode($rpta);
    break;

  case "16_getbyid":
    $tabla = array();
    $qry = $db->query("select * from tb_moneda where id_moneda ='".$data->ID."' and status=1");
    $totreg = $db->num_rows($qry);
    if ($totreg>0) {
      for($xx=0; $xx<$totreg; $xx++){
        $rs = $db->fetch_array($qry);
        $tabla[] = array(
          "ID" => $rs["id_moneda"],
          "nombre" => $rs["nombre"],
          "codigo" => $rs["codigo"]

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