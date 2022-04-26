<?php
  include_once('../../../includes/sess_verifica.php');

  function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
  }

  if(isset($_SESSION["usr_ID"])){
    if (isset($_REQUEST["appSQL"])){
      include_once('../../../includes/db_database.php');
      include_once('../../../includes/funciones.php');
      $data = json_decode($_REQUEST['appSQL']);
      $rpta = 0;

      function getEquipos($tabla,$padreID){
        $db = $GLOBALS["db"];
        $qry = $db->query("select * from tb_equipos where id_conte=".$padreID);
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $ss = $db->fetch_array($db->query("select count(*) as cuenta from tb_sistemas where id_eq=".$rs["id_eq"]));
            $tabla[] = array(
              "id" => "E".$rs["id_eq"],
              "pId" => "C".$padreID,
              "name" => $rs["codigo"]." - ".$rs["descripcion"],
              /* "isParent" => ($ss["cuenta"]>0)?true:false */
              "isParent" => "true"
            );
            if($ss["cuenta"]>0) { $tabla = getSistemas($tabla,$rs["id_eq"]); }
          }
        }
        return $tabla;
      }
      function getSistemas($tabla,$padreID){
        $db = $GLOBALS["db"];
        $qry = $db->query("select * from tb_sistemas where id_eq=".$padreID);
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $ss = $db->fetch_array($db->query("select count(*) as cuenta from tb_componenetes where id_sis=".$rs["id_sis"]));
            $tabla[] = array(
              "id" => "S".$rs["id_sis"],
              "pId" => "E".$padreID,
              "name" => $rs["codigo"]." - ".$rs["descripcion"],
              /* "isParent" => ($ss["cuenta"]>0)?true:false */
              "isParent" => "true"
            );
            if($ss["cuenta"]>0) { $tabla = getComponentes($tabla,$rs["id_sis"]); }
          }
        }
        return $tabla;
      }
      function getComponentes($tabla,$padreID){
        $db = $GLOBALS["db"];
        $qry = $db->query("select * from tb_componenetes where id_sis=".$padreID);
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $ss = $db->fetch_array($db->query("select count(*) as cuenta from tb_partes where id_compo=".$rs["id_compo"]));
            $tabla[] = array(
              "id" => "O".$rs["id_compo"],
              "pId" => "S".$padreID,
              "name" => $rs["codigo"]." - ".$rs["descripcion"],
              //"isParent" => ($ss["cuenta"]>0)?true:false
              "isParent" => "true"
            );
            if($ss["cuenta"]>0) { $tabla = getPartes($tabla,$rs["id_compo"]); }
          }
        }
        return $tabla;
      }
      function getPartes($tabla,$padreID){
        $db = $GLOBALS["db"];
        $qry = $db->query("select * from tb_partes where id_compo=".$padreID);
        $totreg = $db->num_rows($qry);
        if ($totreg>0) {
          for($xx=0; $xx<$totreg; $xx++){
            $rs = $db->fetch_array($qry);
            $tabla[] = array(
              "id" => "P".$rs["id_partes"],
              "pId" => "O".$padreID,
              "name" => $rs["codigo"]." - ".$rs["descripcion"],
              //"isParent" => false
              "isParent" => "true"
            );
          }
        }
        return $tabla;
      }

      switch ($data->TipoQuery) {
        case "selUniOpera":
          //tb_uniperativa
          $uniopera = 0;
          $qry = $db->query("select * from tb_unioperativa where id_uniope=".$data->uniopeID);
          if ($db->num_rows($qry)>0) {
            $rs = $db->fetch_array($qry);
            $uniopera = array(
              "ID" => $rs["id_uniope"],
              "codigo" => $rs["codigo"],
              "descripcion" => $rs["descripcion"]
            );
          }

          //tb_arbol
          $arbol = array();
          $qry = $db->query("select * from tb_contenidos where id_uniope=".$data->uniopeID);
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $ss = $db->fetch_array($db->query("select count(*) as cuenta from tb_equipos where id_conte=".$rs["id_conte"]));
              $arbol[] = array(
                "id" => "C".$rs["id_conte"],
                "pId" => 0,
                "name" => $rs["codigo"]." - ".$rs["descripcion"],
                //"isParent" => ($ss["cuenta"]>0)?true:false
                "isParent" => "true"
              );
              if($ss["cuenta"]>0) { $arbol = getEquipos($arbol,$rs["id_conte"]); }
            }
          }

          //respuesta
          $rpta = array("uniopera"=>$uniopera,"arbol"=>$arbol);
          echo json_encode($rpta);
          break;
        case "datosArbol":
          $tabla = $data->arbolID[0];
          $ID = substr($data->arbolID,1,100);
          switch($tabla){
            case "E":
              $sql1 = "select * from tb_equipos where id_eq=".$ID;
              $sql2 = "select codigo as codigo1,descripcion as descri1,'' as codigo0,'' as descri0,categoria as categoria0 from tb_contenidos where id_conte=".substr($data->padreID,1,100);
              break;
            case "S":
              $sql1 = "select * from tb_sistemas where id_sis=".$ID;
              $sql2 = "select e.codigo as codigo1,e.descripcion as descri1,c.codigo as codigo0,c.descripcion as descri0,c.categoria as categoria0 from tb_equipos e,tb_contenidos c where c.id_conte=e.id_conte and e.id_eq=".substr($data->padreID,1,100);
              break;
            case "O":
              $sql1 = "select * from tb_componenetes where id_compo=".$ID;
              $sql2 = "select s.codigo as codigo1,s.descripcion as descri1,c.codigo as codigo0,c.descripcion as descri0,c.categoria as categoria0 from tb_sistemas s,tb_equipos e,tb_contenidos c where c.id_conte=e.id_conte and e.id_eq=s.id_eq and s.id_sis=".substr($data->padreID,1,100);
              break;
            case "P":
              $sql1 = "select * from tb_partes where id_partes=".$ID;
              $sql2 = "select o.codigo as codigo1,o.descripcion as descri1,c.codigo as codigo0,c.descripcion as descri0,c.categoria as categoria0 from tb_componenetes o, tb_sistemas s,tb_equipos e,tb_contenidos c where c.id_conte=e.id_conte and e.id_eq=s.id_eq and o.id_sis=s.id_sis and o.id_compo=1".substr($data->padreID,1,100);
              break;
          }
          $activos = "";
          $qry1 = $db->query($sql1);
          $qry2 = $db->query($sql2);
          if ($db->num_rows($qry1)>0) {
            $rs1 = $db->fetch_array($qry1);
            $rs2 = $db->fetch_array($qry2);
            $activos = array(
              "codigo" => $rs1["codigo"],
              "descripcion" => $rs1["descripcion"],
              "padreCodigo" => $rs2["codigo1"],
              "padreDescri" => $rs2["descri1"],
              "prnCodigo" => $rs2["codigo0"],
              "prnDescri" => $rs2["descri0"],
              "prnCategoria" => $rs2["categoria0"]
            );
          }

          //prioridad
          $prioridad = array();
          $qry = $db->query("select * from tb_prioridad;");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $prioridad[] = array(
                "ID" => $rs["id_priori"],
                "nombre" => $rs["descripcion"]
              );
            }
          }

          //depAsignado
          $departamento = array();
          $qry = $db->query("select * from tb_departamentos;");
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

          //tipotrabajo
          $tipotrabajo = array();
          $qry = $db->query("select * from tb_tipotrabajo;");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tipotrabajo[] = array(
                "ID" => $rs["id_tipotra"],
                "nombre" => $rs["descripcion"]
              );
            }
          }

          //contenidos
          /* $contenidos = array();
          $contenidos[] = array(
            "ID" => 0,
            "codigo" => "",
            "nombre" => "Seleccione flota"
          );
          $qry = $db->query("select * from tb_contenidos;");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $contenidos[] = array(
                "ID" => $rs["id_conte"],
                "codigo" => $rs["codigo"],
                "nombre" => $rs["descripcion"]
              );
            }
          } */

          //equipos
          /* $equipos = array();
          $equipos[] = array(
            "ID" => 0,
            "codigo" => "Todos",
            "nombre" => "Todos"
          );
          $qry = $db->query("select * from tb_equipos;");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $equipos[] = array(
                "ID" => $rs["id_eq"],
                "codigo" => $rs["codigo"],
                "nombre" => $rs["descripcion"]
              );
            }
          } */

          


          //respuesta
          $rpta = array("activos"=>$activos,"prioridad"=>$prioridad,"tipotrabajo"=>$tipotrabajo, "departamento"=>$departamento/*, "contenidos"=>$contenidos ,  "equipos"=>$equipos */);
          echo json_encode($rpta);
          break;
        
        case "datosgrafica":
          //contenidos
          $contenidos = array();
          $contenidos[] = array(
            "ID" => 0,
            "codigo" => "",
            "nombre" => "Seleccione flota"
          );
          $qry = $db->query("select * from tb_contenidos;");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $contenidos[] = array(
                "ID" => $rs["id_conte"],
                "codigo" => $rs["codigo"],
                "nombre" => $rs["descripcion"]
              );
            }
          }

          $rpta = array("contenidos"=>$contenidos);
          echo json_encode($rpta);
          break;
        case "02_nuevo":
          //respuesta
          $rpta = array("usuario"=>$_SESSION["usr_login"], "correo"=>$_SESSION["usr_correo"],"telefono"=>$_SESSION["usr_telefono"]);
          echo json_encode($rpta);
          break;
        case "02_exec":
          switch($data->commandSQL){
            case "INS":
              $rs = $db->fetch_array($db->query("select coalesce(max(id_solitra)+1,1) as maxi from tb_solitrabajo;"));
              $soliciID = $rs["maxi"];
              $sql = "insert into tb_solitrabajo values(
                ".$soliciID.",
                '".$data->unidad."',
                '".$data->codarbol."',
                '".$data->estado_st."',
                '".$data->razon_st."',
                '".$data->estado."',
                ".$data->prioriID.",
                ".$data->tipotraID.",
                ".$data->depasigID.",
                ".$data->depasigOTID.",
                '".$data->fecha."',
                '".$data->horaini."',
                '".$data->horafin."',
                '".$data->solicitado."',
                '".$data->descripcion."',
                '".$data->creado."',
                '".$data->notifica."',
                '".$data->telefono."',
                '".$data->creado_correo."',
                '".$data->tipOT."',
                '".$data->status."',
                '".$data->semana."',
                '".$data->mes."',
                ".$data->anio.",
                '".$data->file_base64."',
                '".$data->file_nombre."',
                '".$data->file_tamanio."',
                '".$data->file_tipo."'
                )";
              $qry = $db->query($sql);
              break;
            case "UPD":
              $soliciID = "";
              $sql = "update tb_solitrabajo set 
              cod_arbol='".$data->codarbol."'
              ,estado_st='".$data->estado_st."'
              ,estado='".$data->estado."'
              ,id_priori=".$data->prioriID."
              ,id_tipotra=".$data->tipotraID."
              ,departamento='".$data->depasigID."'
              ,fecha='".$data->fecha."'
              ,horaini_ot='".$data->horaini."'
              ,horafin_ot='".$data->horafin."'
              ,solicitado='".$data->solicitado."'
              ,descripcion='".$data->descripcion."'
              ,creado='".$data->creado."'
              ,notifica='".$data->notifica."'
              ,telefono=".$data->telefono."
              ,semana='".$data->semana."'
              ,mes='".$data->mes."'
              ,anio=".$data->anio."
              ,correo='".$data->creado_correo."' where id_solitra=".$data->solitraID;
              //$params = array($data->solitraID,$data->codarbol,$data->estado,$data->prioriID,$data->tipotraID, $data->depasigID, $data->fecha, $data->solicitado, $data->descripcion, $data->creado, $data->notifica, $data->telefono, $data->creado_correo);
              //$qry = $db->query_params($sql, $params);
              $qry = $db->query($sql);
              break;
            case "DEL":
              $soliciID = "";
              $sql = "update tb_solitrabajo set status='".$data->status."' where id_solitra=".$data->solitraID;
              $qry = $db->query($sql);
              break;
            case "APV":
              $soliciID = "";
              $sql = "update tb_solitrabajo set estado_st='".$data->estado."' where id_solitra=".$data->solitraID;
              $qry = $db->query($sql);
              break;
            case "RFS":
              $soliciID = "";
              $sql = "update tb_solitrabajo set estado_st='".$data->estado."',razon_st='".$data->razon."' where id_solitra=".$data->solitraID;
              $qry = $db->query($sql);
              break;
          }

          //respuesta ST
          $rpta = array("error"=>0,"soliciID"=>$soliciID,"sql"=>$sql);
          echo json_encode($rpta);
          break;
        case "02_grid": //tipoQuery from arbol.js - function app02GridAll
          $tabla = array();
          $qry = $db->query("select * from tb_solitrabajo where cod_arbol='".$data->codarbol."' and status=1 and estado_st!='Aprobado'");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla[] = array(
                "ID" => $rs["id_solitra"],
                "unidad" => $rs["unidad"],
                //"codarbol" => $rs["cod_arbol"]
                "descripcion" => $rs["descripcion"],
                "estado_st" => $rs["estado_st"]
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
            $qry = $db->query("select * from tb_solitrabajo where cod_arbol='".$data->codarbol."' and status=1 and estado_st!='Aprobado'");
          }else{
            $qry = $db->query("select * from tb_solitrabajo where cod_arbol='".$data->codarbol."' and status=1 and estado_st!='Aprobado' and id_solitra='".$data->search_text."'");
          }
          
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla[] = array(
                "ID" => $rs["id_solitra"],
                //"codarbol" => $rs["cod_arbol"]
                "unidad" => $rs["unidad"],
                "descripcion" => $rs["descripcion"],
                "estado_st" => $rs["estado_st"]
              );
            }
          }

          //respuesta OT
          $rpta = array("tabla"=>$tabla);
          echo json_encode($rpta);
          break;
        
        case "02_getbyid":
          $tabla = array();
          $qry = $db->query("select * from tb_solitrabajo where id_solitra='".$data->id_solitra."' and status=1");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla[] = array(
                "ID" => $rs["id_solitra"],
                "cod_arbol" => $rs["cod_arbol"],
                "id_priori" => $rs["id_priori"],
                "id_tipotra" => $rs["id_tipotra"],
                "departamento" => $rs["departamento"],
                "fecha" => $rs["fecha"],
                "solicitado" => $rs["solicitado"],
                "descripcion" => $rs["descripcion"],
                "creado" => $rs["creado"],
                "notifica" => $rs["notifica"],
                "telefono" => $rs["telefono"],
                "correo" => $rs["correo"]
                
              );
            }
          }

          //respuesta OT
          $rpta = array("tabla"=>$tabla);
          echo json_encode($rpta);
          break;

        case "03_exec":
          switch($data->commandSQL){
            case "UPD":
              $soliciID = "";
              $sql = "update tb_solitrabajo set 
              estado='".$data->estado."', 
              departamento_ot=".$data->depasigID.", 
              fecha='".$data->fecha."',
              horaini_ot='".$data->horaini."',
              horafin_ot='".$data->horafin."',
              descripcion='".$data->descripcion."',
              semana='".$data->semana."',
              mes='".$data->mes."',
              anio=".$data->anio.",
              file_base64='".$data->file_base64."',
              file_nombre='".$data->file_name."',
              file_tamanio='".$data->file_size."',
              file_tipo='".$data->file_type."',
              tipo_ot='".$data->tipOT."'  
              where id_solitra=".$data->solitraID;
              //$params = array($data->solitraID,$data->codarbol,$data->estado,$data->prioriID,$data->tipotraID, $data->depasigID, $data->fecha, $data->solicitado, $data->descripcion, $data->creado, $data->notifica, $data->telefono, $data->creado_correo);
              //$qry = $db->query_params($sql, $params);
              $qry = $db->query($sql);
              break;
            }
            //respuesta ST
            $rpta = array("error"=>0,"soliciID"=>$soliciID,"sql"=>$sql);
            echo json_encode($rpta);
            break;  
        case "03_grid":
          $tabla = array();
          $qry = $db->query("select * from tb_solitrabajo where cod_arbol='".$data->codarbol."' and status=1 and estado_st='Aprobado'");
          $totreg = $db->num_rows($qry);
          if ($totreg>0) {
            for($xx=0; $xx<$totreg; $xx++){
              $rs = $db->fetch_array($qry);
              $tabla[] = array(
                "ID" => $rs["id_solitra"],
                "codarbol" => $rs["cod_arbol"],
                "unidad" => $rs["unidad"],
                "descripcion" => $rs["descripcion"],
                "estado" => $rs["estado"]
              );
            }
          }

          //respuesta
          $rpta = array("tabla"=>$tabla);
          echo json_encode($rpta);
          break;

          case "03_getbyid":
            $tabla = array();
            $qry = $db->query("select * from tb_solitrabajo where id_solitra='".$data->id_solitra."' and status=1");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "ID" => $rs["id_solitra"],
                  "cod_arbol" => $rs["cod_arbol"],
                  "unidad" => $rs["unidad"],
                  "horaini" => $rs["horaini_ot"],
                  "horafin" => $rs["horafin_ot"],
                  //"id_priori" => $rs["id_priori"],
                  //"id_tipotra" => $rs["id_tipotra"],
                  "estado" => $rs["estado"],
                  "departamento" => $rs["departamento"],
                  "fecha" => $rs["fecha"],
                  /* "duracion" => $rs["duracion_ot"], */
                  //"solicitado" => $rs["solicitado"],
                  "descripcion" => $rs["descripcion"],
                  "file_base64" => $rs["file_base64"],
                  "file_name" => $rs["file_nombre"],
                  "file_size" => $rs["file_tamanio"],
                  "file_type" => $rs["file_tipo"],
                  "tipOT" => $rs["tipo_ot"]
                  //"creado" => $rs["creado"],
                  //"notifica" => $rs["notifica"],
                  //"telefono" => $rs["telefono"],
                  //"correo" => $rs["correo"]
                  
                );
              }
            }
  
            //respuesta OT
            $rpta = array("tabla"=>$tabla);
            echo json_encode($rpta);
            break;

          case "03_grid_search":
            $tabla = array();
            if($data->search_text===""){
              $qry = $db->query("select * from tb_solitrabajo where cod_arbol='".$data->codarbol."' and status=1 and estado_st='Aprobado'");
            }else{
              $qry = $db->query("select * from tb_solitrabajo where cod_arbol='".$data->codarbol."' and status=1 and id_solitra='".$data->search_text."' and estado_st='Aprobado'");
            }
            
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
                $tabla[] = array(
                  "ID" => $rs["id_solitra"],
                  //"codarbol" => $rs["cod_arbol"]
                  "unidad" => $rs["unidad"],
                  "descripcion" => $rs["descripcion"],
                  "estado" => $rs["estado"]
                );
              }
            }
  
            //respuesta OT
            $rpta = array("tabla"=>$tabla);
            echo json_encode($rpta);
            break;
          case "06_grid":
            //respuesta
            //$tabla = array();
            /* $tabla[0] = array("etiquetas"=>"enero", "datos"=>"500");
            $tabla[1] = array("etiquetas"=>"febrero", "datos"=>"100");
            $tabla[2] = array("etiquetas"=>"marzo", "datos"=>"200");
            $tabla[3] = array("etiquetas"=>"abril", "datos"=>"700"); */

            $etiquetas = ["Enero", "Febrero", "Marzo", "Abril","Mayo","Junio","Julio","Agosto"];
            $datosVentas = [5000, 1500, 8000, 5102,"null","null",4000,7000];
            // Ahora las imprimimos como JSON para pasarlas a AJAX, pero las agrupamos
            $tabla = [
                "etiquetas" => $etiquetas,
                "datos" => $datosVentas,
            ];
            echo json_encode($tabla);
            //$rpta = array("etiquetas"=>"enero", "datos"=>"500");
           //$rpta = array("tabla"=>$tabla);
           //echo json_encode($rpta);
            break;
          case "06_getAll":
            $tabla = array();
            $qry = $db->query("select * from tb_solitrabajo where estado='".$data->estado."' and anio='".$data->anio."' and status=1");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
             
                //$milini= strtotime( $rs["fecha"]." ".$rs["horaini_ot"]) * 1000;
                //$milfin= strtotime( $rs["fecha"]." ".$rs["horafin_ot"]) * 1000;

                /* $nowini = new \DateTime( $rs["fecha"]." ".$rs["horaini_ot"]);
                $nowfin = new \DateTime( $rs["fecha"]." ".$rs["horafin_ot"]);

                $milini=(int)$nowini->format('Uv');
                $milfin=(int)$nowfin->format('Uv'); */
          
                $tabla[] = array(
                  "x" => $rs["cod_arbol"],
                  //"y" => array($milini,$milfin),
                  "y" => array($rs["fecha"].":".$rs["horaini_ot"],$rs["fecha"].":".$rs["horafin_ot"]),
                  "fecha" => $rs["fecha"],
                  "anio" => $rs["anio"],
                  "hora_ini" => $rs["horaini_ot"],
                  "hora_fin" => $rs["horafin_ot"],
                  "estado" => $rs["estado"],
                  "supervisor" => $rs["solicitado"],
                  "descripcion" => $rs["descripcion"],
                  "tipOT"=> $rs["tipo_ot"] 
                );
              }
            }
            $fec= strtotime("2022-01-21 10:14:01") * 1000;
            //debug_to_console($fec);
            //respuesta OT
            $rpta = array($tabla);
            echo json_encode($tabla);
            break;
          case "06_getAll_mes":
            $tabla = array();
            $qry = $db->query("select * from tb_solitrabajo where estado='".$data->estado."' and anio='".$data->anio."' and mes='".$data->mes."' and status=1");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
              
                //$milini= strtotime( $rs["fecha"]." ".$rs["horaini_ot"]) * 1000;
                //$milfin= strtotime( $rs["fecha"]." ".$rs["horafin_ot"]) * 1000;

                /* $nowini = new \DateTime( $rs["fecha"]." ".$rs["horaini_ot"]);
                $nowfin = new \DateTime( $rs["fecha"]." ".$rs["horafin_ot"]);

                $milini=(int)$nowini->format('Uv');
                $milfin=(int)$nowfin->format('Uv'); */
          
                $tabla[] = array(
                  "x" => $rs["cod_arbol"],
                  //"y" => array($milini,$milfin),
                  "y" => array($rs["fecha"].":".$rs["horaini_ot"],$rs["fecha"].":".$rs["horafin_ot"]),
                  "fecha" => $rs["fecha"],
                  "anio" => $rs["anio"],
                  "hora_ini" => $rs["horaini_ot"],
                  "hora_fin" => $rs["horafin_ot"],
                  "estado" => $rs["estado"],
                  "supervisor" => $rs["solicitado"],
                  "descripcion" => $rs["descripcion"],
                  "tipOT"=> $rs["tipo_ot"] 
                );
              }
            }
            $fec= strtotime("2022-01-21 10:14:01") * 1000;
            //debug_to_console($fec);
            //respuesta OT
            $rpta = array($tabla);
            echo json_encode($tabla);
            break;
          case "06_getEquiSolicitud":
            $tabla = array();
            $qry = $db->query("select * from tb_solitrabajo where estado='".$data->estado."' and anio='".$data->anio."' and cod_arbol='".$data->equipo."' and status=1");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
              
                $tabla[] = array(
                  "x" => $rs["cod_arbol"],
                  "y" => array($rs["fecha"].":".$rs["horaini_ot"],$rs["fecha"].":".$rs["horafin_ot"]),
                  "fecha" => $rs["fecha"],
                  "anio" => $rs["anio"],
                  "hora_ini" => $rs["horaini_ot"],
                  "hora_fin" => $rs["horafin_ot"],
                  "estado" => $rs["estado"],
                  "supervisor" => $rs["solicitado"],
                  "descripcion" => $rs["descripcion"],
                  "tipOT"=> $rs["tipo_ot"] 
                );
              }
            }
            
            $rpta = array($tabla);
            echo json_encode($tabla);
            break;
          case "06_getEquiSolicitudMes":
            $tabla = array();
            $qry = $db->query("select * from tb_solitrabajo where estado='".$data->estado."' and anio='".$data->anio."' and cod_arbol='".$data->equipo."' and mes='".$data->mes."' and status=1");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);
              
                $tabla[] = array(
                  "x" => $rs["cod_arbol"],
                  "y" => array($rs["fecha"].":".$rs["horaini_ot"],$rs["fecha"].":".$rs["horafin_ot"]),
                  "fecha" => $rs["fecha"],
                  "anio" => $rs["anio"],
                  "hora_ini" => $rs["horaini_ot"],
                  "hora_fin" => $rs["horafin_ot"],
                  "estado" => $rs["estado"],
                  "supervisor" => $rs["solicitado"],
                  "descripcion" => $rs["descripcion"],
                  "tipOT"=> $rs["tipo_ot"] 
                );
              }
            }
            
            $rpta = array($tabla);
            echo json_encode($tabla);
            break;
          case "07_getEquipos":
            $tabla = array();
            
            $qry = $db->query("select * from tb_equipos where id_conte='".$data->contenido."' and status=1");
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
                  "ID" => $rs["id_eq"],
                  "codigo" => $rs["codigo"],
                  "nombre" => $rs["descripcion"],
                  "contenido" => $rs["id_conte"]
                );
              }
            }
           
            $rpta = array("tabla"=>$tabla);
            echo json_encode($rpta);
            break;

          case "07_getAllSolicitud":
            $tabla = array();
            
            $qry = $db->query("select * from tb_solitrabajo where estado='".$data->estado."' and anio='".$data->anio."' and status=1");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);

                $time1 = strtotime($rs["horaini_ot"]);
                $time2 = strtotime($rs["horafin_ot"]);
                //$diferencia = round(abs($time2 - $time1) / 3600,2);
                $diferencia = round(abs($time2 - $time1) / 60,2);
              
                $tabla[] = array(
                  
                  "flota" => $rs["cod_arbol"],
                  "fecha" => $rs["fecha"],
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
          
          case "07_getEquiSolicitud":
            $tabla = array();
            
            $qry = $db->query("select * from tb_solitrabajo where estado='".$data->estado."' and anio='".$data->anio."' and cod_arbol='".$data->equipo."' and status=1");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);

                $time1 = strtotime($rs["horaini_ot"]);
                $time2 = strtotime($rs["horafin_ot"]);
                //$diferencia = round(abs($time2 - $time1) / 3600,2);
                $diferencia = round(abs($time2 - $time1) / 60,2);
              
                $tabla[] = array(
                  
                  "flota" => $rs["cod_arbol"],
                  "fecha" => $rs["fecha"],
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

          case "07_getEquiSolicitudMes":
            $tabla = array();
            
            $qry = $db->query("select * from tb_solitrabajo where estado='".$data->estado."' and anio='".$data->anio."' and mes='".$data->mes."' and cod_arbol='".$data->equipo."' and status=1");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);

                $time1 = strtotime($rs["horaini_ot"]);
                $time2 = strtotime($rs["horafin_ot"]);
                //$diferencia = round(abs($time2 - $time1) / 3600,2);
                $diferencia = round(abs($time2 - $time1) / 60,2);
              
                $tabla[] = array(
                  
                  "flota" => $rs["cod_arbol"],
                  "fecha" => $rs["fecha"],
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
            
            $qry = $db->query("select * from tb_solitrabajo where estado='".$data->estado."' and anio='".$data->anio."' and mes='".$data->mes."' and status=1");
            $totreg = $db->num_rows($qry);
            if ($totreg>0) {
              
              for($xx=0; $xx<$totreg; $xx++){
                $rs = $db->fetch_array($qry);

                $time1 = strtotime($rs["horaini_ot"]);
                $time2 = strtotime($rs["horafin_ot"]);
                //$diferencia = round(abs($time2 - $time1) / 3600,2);
                $diferencia = round(abs($time2 - $time1) / 60,2);
              
                $tabla[] = array(
                  
                  "flota" => $rs["cod_arbol"],
                  "fecha" => $rs["fecha"],
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
      }
      $db->close();
    } else{
      $resp = array("error" => true,"mensaje" => "ninguna variable en POST");
      echo json_encode($resp);
    }
  } else {
    $resp = array("error" => true,"mensaje" => "Caducó la sesion.");
    echo json_encode($resp);
  }
?>
