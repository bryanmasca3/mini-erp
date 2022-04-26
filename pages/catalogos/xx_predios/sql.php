<?php
  include_once('../../../includes/sess_verifica.php');

  if(isset($_SESSION["usr_ID"])){
    if (isset($_REQUEST["appSQL"])){
      include_once('../../../includes/db_database.php');
      include_once('../../../includes/funciones.php');
      if ($db->conn){
        $data = json_decode($_REQUEST['appSQL']);
        $rpta = 0;

        switch ($data->TipoQuery) {
          case "selPredios":
            $tabla = array();
            $whr = (($data->distritoID)=="0")?(""):(" and id_iglesia=".$data->distritoID);
            $whr .= (($data->buscar=="")?(""):(" and (predio ilike'%".$data->buscar."%')"));
            //conteo de predios
            $rsCount = $db->fetch_array($db->query("select count(*) as cuenta from vw_predios where estado=1 ".$whr.";"));

            //carga de predios
            $qry = $db->query("select * from vw_predios where estado=1 ".$whr." order by predio;");
            if ($db->num_rows($qry)>0) {
              for($xx=0; $xx<$db->num_rows($qry); $xx++){
                $rs = $db->fetch_array($qry);
                $direccion = ($rs["sector"]." ".$rs["avenida"].(($rs["nro"]!="")?(" Nro: ".$rs["nro"]):("")).(($rs["mza"]!="")?(" Mza: ".$rs["mza"]):("")).(($rs["lote"]!="")?(" Lte: ".$rs["lote"]):("")));

                $tabla[] = array(
                  "ID" => $rs["id"],
                  "clase" => $rs["clase"],
                  "dmisionero" => $rs["dmisionero"],
                  "distrito" => $rs["distrito"],
                  "predio" => $rs["predio"],
                  "mision" => $rs["mision"],
                  "arbifecha" => $rs["arbifecha"],
                  "direccion" => $direccion
                );
              }
            }

            //fecha actual - año actual
            $rx = $db->fetch_array($db->query("select extract(year from current_date) as curr;"));
            $currdate = $rx["curr"];

            //respuesta
            $rpta = array("cuenta"=>$rsCount["cuenta"],"tabla"=>$tabla,"currdate"=>$currdate);
            echo json_encode($rpta);
            break;
          case "editPredioFull":
            //documentaria
            $qry = $db->query("select * from predios_docum where id_predio=".($data->ID));
            if ($db->num_rows($qry)>0) {
              $rs = $db->fetch_array($qry);
              $docum = array(
                "conditerreno" => $rs["conditerreno"],
                "valor" => $rs["valordocum"]*1,
                "id_modo" => $rs["id_modo"],
                "id_moneda" => $rs["id_moneda"],
                "transfirientes" => $rs["transdocum"],
                "adquirientes" => $rs["adquidocum"],
                "id_titulo" => $rs["id_titulo"],
                "nro_titulo" => $rs["nro_titulo"],
                "id_fedatario" => $rs["id_fedatario"],
                "nombrefedatario" => $rs["nombrefedatario"],
                "fecha" => ($rs["fechadocum"]==null)?(null):(date("d/m/Y",strtotime($rs["fechadocum"]))),
                "folio" => $rs["foliodocum"]
              );
            } else { $docum = null; }

            //registral
            $qry = $db->query("select * from predios_registral where id_predio=".($data->ID));
            if ($db->num_rows($qry)>0) {
              $rs = $db->fetch_array($qry);
              $registral = array(
                "fecha1" => ($rs["fecha1"]==null)?(null):(date("d/m/Y",strtotime($rs["fecha1"]))),
                "fecha2" => ($rs["fecha2"]==null)?(null):(date("d/m/Y",strtotime($rs["fecha2"]))),
                "ficha" => $rs["ficha"],
                "libro" => $rs["libro"],
                "folio" => $rs["folio"],
                "asiento" => $rs["asiento"],
                "titular" => $rs["titular"],
                "municipio" => $rs["municipio"],
                "zonareg" => $rs["zonareg"]
              );
            } else { $registral = null; }

            //usos
            $qry = $db->query("select * from predios_usos where id_predio=".($data->ID));
            if ($db->num_rows($qry)>0) {
              $rs = $db->fetch_array($qry);
              $preusos = array(
                "principalID" => $rs["id_principal"],
                "terceroID" => $rs["id_tercero"],
                "fecha" => ($rs["fecha"]==null)?(null):(date("d/m/Y",strtotime($rs["fecha"]))),
                "modo" => $rs["modo"],
                "periodo" => $rs["periodo"],
                "pertenece" => $rs["pertenece"],
                "otros" => $rs["otros"]
              );
            } else { $preusos = null; }

            //fiscal
            $qry = $db->query("select * from predios_fiscal where id_predio=".($data->ID));
            if ($db->num_rows($qry)>0) {
              $rs = $db->fetch_array($qry);
              $fiscal = array(
                "arbifecha" => ($rs["arbifecha"]==null)?(null):(date("d/m/Y",strtotime($rs["arbifecha"]))),
                "arbicodigo" => $rs["arbicodigo"],
                "arbiresol" => $rs["arbiresol"],
                "impufecha" => ($rs["impufecha"]==null)?(null):(date("d/m/Y",strtotime($rs["impufecha"]))),
                "impucodigo" => $rs["impucodigo"],
                "impuresol" => $rs["impuresol"],
                "luzfecha" => ($rs["luzfecha"]==null)?(null):(date("d/m/Y",strtotime($rs["luzfecha"]))),
                "luzcodigo" => $rs["luzcodigo"],
                "aguafecha" => ($rs["aguafecha"]==null)?(null):(date("d/m/Y",strtotime($rs["aguafecha"]))),
                "aguacodigo" => $rs["aguacodigo"],
                "construfecha" => ($rs["construfecha"]==null)?(null):(date("d/m/Y",strtotime($rs["construfecha"]))),
                "construtexto" => $rs["construtexto"],
                "declarafecha" => ($rs["declarafecha"]==null)?(null):(date("d/m/Y",strtotime($rs["declarafecha"]))),
                "declaratexto" => $rs["declaratexto"]
              );
            } else { $fiscal = null; }

            //especificaciones
            $qry = $db->query("select * from predios_medidas where id_predio=".($data->ID));
            if ($db->num_rows($qry)>0) {
              $rs = $db->fetch_array($qry);
              $espec = array(
                "ubizona" => $rs["ubizona"],
                "arancel" => $rs["arancel"],
                "area_total" => $rs["area_total"],
                "area_const" => $rs["area_const"],
                "frent_medi" => $rs["frent_medi"],
                "frent_colin" => $rs["frent_colin"],
                "right_medi" => $rs["right_medi"],
                "right_colin" => $rs["right_colin"],
                "left_medi" => $rs["left_medi"],
                "left_colin" => $rs["left_colin"],
                "back_medi" => $rs["back_medi"],
                "back_colin" => $rs["back_colin"]
              );
            } else { $espec = null; }

            //archivos
            $arch = array();
            $qry = $db->query("select * from predios_archivos where estado=1 and id_predio=".($data->ID));
            if ($db->num_rows($qry)>0) {
              for($xx=0; $xx<$db->num_rows($qry); $xx++){
                $rs = $db->fetch_array($qry);
                $arch[] = array(
                  "ID" => $rs["id"],
                  "predioID" => $rs["id_predio"],
                  "nombre" => $rs["nombre"],
                  "url" => $rs["url"]
                );
              }
            } else { $arch = null; }

            //respuesta
            $rpta = array(
              "predio"=>getPredio($data->ID),
              "docum"=>$docum,
              "registral"=>$registral,
              "preusos"=>$preusos,
              "fiscal"=>$fiscal,
              "espec"=>$espec,
              "arch"=>$arch,
              "fedatarios"=>getComboBox("select id,nombre from maestro where id_padre=2 and estado=1 order by nombre;"),
              "modos"=>getComboBox("select id,nombre from maestro where id_padre=3 and estado=1 order by nombre;"),
              "monedas"=>getComboBox("select id,nombre from maestro where id_padre=4 and estado=1 order by nombre;"),
              "titulos"=>getComboBox("select id,nombre from maestro where id_padre=5 and estado=1 order by nombre;"),
              "usos"=>getComboBox("select id,nombre from maestro where id_padre=6 and estado=1 order by nombre;"),
              "conditerreno"=>getComboBox("select id,nombre from maestro where id_padre=7 and estado=1 order by nombre;")
            );
            echo json_encode($rpta);
            break;
          case "execPredioFull":
            switch($data->commandSQL){
              case "INS":
                //documentaria
                $doc = $data->docum;
                $sql = "insert into predios_docum values($1,$2,$3,$4,$5,$6,$7,$8,$9,$10,$11,$12,$13);";
                $params = array($data->predioID,$doc->condiTerreno,$doc->valor,$doc->modoID,$doc->monedaID,$doc->trans,$doc->adqui,$doc->tituloID,$doc->tituloNRO,$doc->fedatarioID,$doc->fedatarioNombres,$doc->fecha,$doc->folio);
                $qry = $db->query_params($sql, $params);
                //registral
                $reg = $data->registral;
                $sql = "insert into predios_registral values($1,$2,$3,$4,$5,$6,$7,$8,$9,$10);";
                $params = array($data->predioID,$reg->fecha1,$reg->fecha2,$reg->ficha,$reg->libro,$reg->folio,$reg->asiento,$reg->titular,$reg->municipio,$reg->zonareg);
                $qry = $db->query_params($sql, $params);
                //usos
                $uso = $data->usos;
                $sql = "insert into predios_usos values($1,$2,$3,$4,$5,$6,$7,$8);";
                $params = array($data->predioID,$uso->principalID,$uso->terceroID,$uso->fecha,$uso->modo,$uso->periodo,$uso->pertenece,$uso->otros);
                $qry = $db->query_params($sql, $params);
                //fiscal
                $fis = $data->fiscal;
                $sql = "insert into predios_fiscal values($1,$2,$3,$4,$5,$6,$7,$8,$9,$10,$11,$12,$13,$14,$15);";
                $params = array($data->predioID,$fis->arbifecha,$fis->arbicodigo,$fis->arbiresol,$fis->impufecha,$fis->impucodigo,$fis->impuresol,$fis->luzfecha,$fis->luzcodigo,$fis->aguafecha,$fis->aguacodigo,$fis->construfecha,$fis->construtexto,$fis->declarafecha,$fis->declaratexto);
                $qry = $db->query_params($sql, $params);
                //espec
                $esp = $data->espec;
                $sql = "insert into predios_medidas values($1,$2,$3,$4,$5,$6,$7,$8,$9,$10,$11,$12,$13);";
                $params = array($data->predioID,$esp->ubizona,$esp->arancel,$esp->area_total,$esp->area_const,$esp->frent_medi,$esp->frent_colin,$esp->right_medi,$esp->right_colin,$esp->left_medi,$esp->left_colin,$esp->back_medi,$esp->back_colin);
                $qry = $db->query_params($sql, $params);
                break;
              case "UPD":
                //documentaria
                $rsCount = $db->fetch_array($db->query("select count(*) as cuenta from predios_docum where id_predio=".$data->predioID));
                if($rsCount["cuenta"]>0) { $sql = "update predios_docum set conditerreno=$2,valordocum=$3,id_modo=$4,id_moneda=$5,transdocum=$6,adquidocum=$7,id_titulo=$8,nro_titulo=$9,id_fedatario=$10,nombrefedatario=$11,fechadocum=$12,foliodocum=$13 where id_predio=$1;"; }
                else { $sql = "insert into predios_docum values($1,$2,$3,$4,$5,$6,$7,$8,$9,$10,$11,$12,$13);"; }
                $doc = $data->docum;
                $params = array($data->predioID,$doc->condiTerreno,$doc->valor,$doc->modoID,$doc->monedaID,$doc->trans,$doc->adqui,$doc->tituloID,$doc->tituloNRO,$doc->fedatarioID,$doc->fedatarioNombres,$doc->fecha,$doc->folio);
                $qry = $db->query_params($sql, $params);

                //registral
                $rsCount = $db->fetch_array($db->query("select count(*) as cuenta from predios_registral where id_predio=".$data->predioID));
                if($rsCount["cuenta"]>0) { $sql = "update predios_registral set fecha1=$2,fecha2=$3,ficha=$4,libro=$5,folio=$6,asiento=$7,titular=$8,municipio=$9,zonareg=$10 where id_predio=$1;"; }
                else { $sql = "insert into predios_registral values($1,$2,$3,$4,$5,$6,$7,$8,$9,$10);"; }
                $reg = $data->registral;
                $params = array($data->predioID,$reg->fecha1,$reg->fecha2,$reg->ficha,$reg->libro,$reg->folio,$reg->asiento,$reg->titular,$reg->municipio,$reg->zonareg);
                $qry = $db->query_params($sql, $params);

                //usos
                $rsCount = $db->fetch_array($db->query("select count(*) as cuenta from predios_usos where id_predio=".$data->predioID));
                if($rsCount["cuenta"]>0) { $sql = "update predios_usos set id_principal=$2,id_tercero=$3,fecha=$4,modo=$5,periodo=$6,pertenece=$7,otros=$8 where id_predio=$1;"; }
                else { $sql = "insert into predios_usos values($1,$2,$3,$4,$5,$6,$7,$8);"; }
                $uso = $data->usos;
                $params = array($data->predioID,$uso->principalID,$uso->terceroID,$uso->fecha,$uso->modo,$uso->periodo,$uso->pertenece,$uso->otros);
                $qry = $db->query_params($sql, $params);

                //fiscal
                $rsCount = $db->fetch_array($db->query("select count(*) as cuenta from predios_fiscal where id_predio=".$data->predioID));
                if($rsCount["cuenta"]>0) { $sql = "update predios_fiscal set arbifecha=$2,arbicodigo=$3,arbiresol=$4,impufecha=$5,impucodigo=$6,impuresol=$7,luzfecha=$8,luzcodigo=$9,aguafecha=$10,aguacodigo=$11,construfecha=$12,construtexto=$13,declarafecha=$14,declaratexto=$15 where id_predio=$1;"; }
                else { $sql = "insert into predios_fiscal values($1,$2,$3,$4,$5,$6,$7,$8,$9,$10,$11,$12,$13,$14,$15);"; }
                $fis = $data->fiscal;
                $params = array($data->predioID,$fis->arbifecha,$fis->arbicodigo,$fis->arbiresol,$fis->impufecha,$fis->impucodigo,$fis->impuresol,$fis->luzfecha,$fis->luzcodigo,$fis->aguafecha,$fis->aguacodigo,$fis->construfecha,$fis->construtexto,$fis->declarafecha,$fis->declaratexto);
                $qry = $db->query_params($sql, $params);

                //espec
                $rsCount = $db->fetch_array($db->query("select count(*) as cuenta from predios_medidas where id_predio=".$data->predioID));
                if($rsCount["cuenta"]>0) { $sql = "update predios_medidas set ubizona=$2,arancel=$3,area_total=$4,area_const=$5,frent_medi=$6,frent_colin=$7,right_medi=$8,right_colin=$9,left_medi=$10,left_colin=$11,back_medi=$12,back_colin=$13 where id_predio=$1;"; }
                else { $sql = "insert into predios_medidas values($1,$2,$3,$4,$5,$6,$7,$8,$9,$10,$11,$12,$13);"; }
                $esp = $data->espec;
                $params = array($data->predioID,$esp->ubizona,$esp->arancel,$esp->area_total,$esp->area_const,$esp->frent_medi,$esp->frent_colin,$esp->right_medi,$esp->right_colin,$esp->left_medi,$esp->left_colin,$esp->back_medi,$esp->back_colin);
                $qry = $db->query_params($sql, $params);
                break;
              case "DEL":
                for($xx=0; $xx<count($data->IDs); $xx++){
                  $sql = "update predios set estado=0 where id=$1";
                  $params = array($data->IDs[$xx]);
                  $qry = $db->query_params($sql, $params);
                }
                break;
            }

            $rpta = array("error" => false,"exec" => 1);
            echo json_encode($rpta);
            break;
          case "comboDMisioneros":
            $misionID = ($_SESSION['usr_iglmision']==0)?(1):($_SESSION['usr_iglmision']);
            $qry = $db->query("select id,tipo,id_padre from igl_iglesias where id=".$misionID.";");
            $rs = $db->fetch_array($qry);

            $dismis = getComboBox("select * from igl_iglesias where id_padre=".(($rs["tipo"]==5)?($rs["id_padre"]):($misionID))." and estado=1 order by nombre");
            $dismis[] = array("ID"=>0,"nombre"=>"Todos los Distritos Misioneros");

            $rpta = array("tipo"=>$rs["tipo"],"misionID"=>$misionID,"tabla"=>$dismis);

            echo json_encode($rpta);
            break;
          case "downloadPredios":
            $whr = "";
            $dmisionero = array("codigo"=>"ALL");
            $tabla[] = array(
              array("text" => "Pers. Juridica"),
              array("text" => "Mision"),
              array("text" => "Nombre Predio"),
              array("text" => "Clase"),
              array("text" => "Dist. Misio."),
              array("text" => "Dist. Polit."),
              array("text" => "Direccion"),
              array("text" => "Telefonos"),
              array("text" => "Correo"),
              array("text" => "Cond. Terreno"),
              array("text" => "Modo"),
              array("text" => "Valor"),
              array("text" => "Moneda"),
              array("text" => "Nombre Transf."),
              array("text" => "Nombre Adquir."),
              array("text" => "Titulo"),
              array("text" => "Nro Titulo"),
              array("text" => "Fedatario"),
              array("text" => "Nombre Fedatario"),
              array("text" => "Fecha Docum."),
              array("text" => "Folio Docum."),
              array("text" => "Ficha Reg"),
              array("text" => "Fecha Reg"),
              array("text" => "Libro Reg"),
              array("text" => "Folio Reg"),
              array("text" => "Asiento Reg"),
              array("text" => "Titular de Registro"),
              array("text" => "Municipio de Registro"),
              array("text" => "Fecha Municipal"),
              array("text" => "Zona Registral"),
              array("text" => "Fecha Arbitrios"),
              array("text" => "Codigo Arbitrios"),
              array("text" => "Codigo del Predio"),
              array("text" => "Fecha Impuesto"),
              array("text" => "Codigo Impuesto"),
              array("text" => "Resol. Impuesto"),
              array("text" => "Arancel"),
              array("text" => "Area Total Terreno"),
              array("text" => "Area Construida"),
              array("text" => "Frente Colinda"),
              array("text" => "Frente Medidas"),
              array("text" => "Derecha Colinda"),
              array("text" => "Derecha Medidas"),
              array("text" => "Izquierda Colinda"),
              array("text" => "Izquierda Medidas"),
              array("text" => "Atras Colinda"),
              array("text" => "Atras Medidas")
            );

            if(($data->dmisioneroID) > 0) {
              $whr = "and p.id_igldistrito=".($data->dmisioneroID);
              //distrito misionero
              $rs = $db->fetch_array($db->query("select codigo from igl_distritos where id=".$data->dmisioneroID));
              $dmisionero["codigo"] = ($rs["codigo"]);
            }
            $sql = "select p.id,p.per_juridica,	p.mision,p.nombre,c.nombre AS clase,d.nombre AS dmisionero,ur.nombre AS region,up.nombre AS provincia,ud.nombre AS distrito,p.sector,p.avenida,p.nro,p.dpto,p.mza,p.lote,p.telefono,p.correo,t.nombre AS terreno,m.nombre AS modo,pd.valordocum,mn.nombre as moneda,pd.transdocum,pd.adquidocum,ti.nombre as titulo,pd.nro_titulo,fe.nombre as fedatario,pd.nombrefedatario,to_char(pd.fechadocum, 'DD/MM/YYYY'::text) AS fechadocum,pd.foliodocum,pr.ficha,to_char(pr.fecha1, 'DD/MM/YYYY'::text) AS fechareg,pr.libro,pr.folio as folioreg,pr.asiento as asiento,pr.titular,pr.municipio,to_char(pr.fecha2, 'DD/MM/YYYY'::text) AS fechamuni,pr.zonareg,to_char(pf.arbifecha, 'DD/MM/YYYY'::text) AS arbifecha,pf.arbicodigo,pf.arbiresol,to_char(pf.impufecha, 'DD/MM/YYYY'::text) AS impufecha,pf.impucodigo,pf.impuresol,pm.arancel,pm.area_total,pm.area_const,pm.frent_colin,pm.frent_medi,pm.right_colin,pm.right_medi,pm.left_colin,pm.left_medi,pm.back_colin,pm.back_medi from predios p,predios_docum pd,predios_registral pr,predios_fiscal pf,predios_medidas pm,maestro c,maestro t,maestro m,maestro mn,maestro ti,maestro fe,igl_iglesias d,sis_ubigeo ud,sis_ubigeo up,sis_ubigeo ur where p.id_clase=c.id and p.id_iglesia=d.id and p.id_distrito=ud.id and ud.id_padre=up.id AND up.id_padre=ur.id AND pd.conditerreno=t.id and p.id=pd.id_predio and p.id=pr.id_predio and p.id=pm.id_predio and p.id=pf.id_predio and pd.id_modo=m.id and pd.id_moneda=mn.id and pd.id_titulo=ti.id and pd.id_fedatario=fe.id ".$whr." order by dmisionero,p.nombre";
            $qry = $db->query($sql);
            if ($db->num_rows($qry)>0) {
              for($xx = 0; $xx<$db->num_rows($qry); $xx++){
                $rs = $db->fetch_array($qry);
                $direccion  = ($rs["sector"]).((trim($rs["avenida"])=="")?(""):(" - ".trim($rs["avenida"])));


                $tabla[] = array(
                  array("text" => $rs["per_juridica"]),
                  array("text" => $rs["mision"]),
                  array("text" => $rs["nombre"]),
                  array("text" => $rs["clase"]),
                  array("text" => $rs["dmisionero"]),
                  array("text" => $rs["region"]." - ".$rs["provincia"]." - ".$rs["distrito"]),
                  array("text" => $direccion),
                  array("text" => $rs["telefono"]),
                  array("text" => $rs["correo"]),
                  array("text" => $rs["terreno"]),
                  array("text" => $rs["modo"]),
                  array("text" => $rs["valordocum"]*1),
                  array("text" => $rs["moneda"]),
                  array("text" => $rs["transdocum"]),
                  array("text" => $rs["adquidocum"]),
                  array("text" => $rs["titulo"]),
                  array("text" => $rs["nro_titulo"]),
                  array("text" => $rs["fedatario"]),
                  array("text" => $rs["nombrefedatario"]),
                  array("text" => $rs["fechadocum"]),
                  array("text" => $rs["foliodocum"]),
                  array("text" => $rs["ficha"]),
                  array("text" => $rs["fechareg"]),
                  array("text" => $rs["libro"]),
                  array("text" => $rs["folioreg"]),
                  array("text" => $rs["asiento"]),
                  array("text" => $rs["titular"]),
                  array("text" => $rs["municipio"]),
                  array("text" => $rs["fechamuni"]),
                  array("text" => $rs["zonareg"]),
                  array("text" => $rs["arbifecha"]),
                  array("text" => $rs["arbicodigo"]),
                  array("text" => $rs["arbiresol"]),
                  array("text" => $rs["impufecha"]),
                  array("text" => $rs["impucodigo"]),
                  array("text" => $rs["impuresol"]),
                  array("text" => $rs["arancel"]),
                  array("text" => $rs["area_total"]),
                  array("text" => $rs["area_const"]),
                  array("text" => $rs["frent_colin"]),
                  array("text" => $rs["frent_medi"]),
                  array("text" => $rs["right_colin"]),
                  array("text" => $rs["right_medi"]),
                  array("text" => $rs["left_colin"]),
                  array("text" => $rs["left_medi"]),
                  array("text" => $rs["back_colin"]),
                  array("text" => $rs["back_medi"])
                );
              }
            }

            //respuesta
            $options = array("fileName"=>"predios_".$dmisionero["codigo"]);
            $tableData[] = array("sheetName"=>"predios","data"=>$tabla);
            $rpta = array("options"=>$options,"tableData"=>$tableData);
            echo json_encode($rpta);
            break;
          case "subirArchivos":
            //manejo del archivo
            if(isset($_FILES["filePDF"])){
              $archivo = $_FILES["filePDF"];
              if(is_uploaded_file($archivo['tmp_name'])){
                if(mime_content_type($archivo["tmp_name"])=="application/pdf"){
                  //acceso a la base de datos para registro del nombre
                  $rs = $db->fetch_array($db->query("select coalesce(max(id)+1,1) as maxi from predios_archivos"));
                  $ID = $rs["maxi"];
                  $url = "data/archivos/".$data->predioID."_".$ID.".pdf";
                  $params = array($ID,$data->predioID,$data->nombre,$url,$_SESSION["usr_ID"]);
                  $qry = $db->query_params("insert into predios_archivos values($1,$2,$3,$4,1,1,$5,now())", $params);

                  //guardar archivo en S.O.
                  $ruta = "../../../".$url;
                  move_uploaded_file($archivo["tmp_name"],$ruta);

                  //recorger data de archivos
                  $rpta = getArchivos($data->predioID);
                } else { $rpta = null; }
              } else { $rpta = null; }
            } else { $rpta = null; }

            echo json_encode($rpta);
            break;
          case "borrarArchivos":
            $qry = $db->query("delete from predios_archivos where id=".$data->ID);
            unlink("../../../data/archivos/".$data->predioID."_".$data->ID.".pdf");
            $rpta = getArchivos($data->predioID);
            echo json_encode($rpta);
            break;
        }
        $db->close();
      } else {
        $resp = array("error" => true,"mensaje" => "coneccion cerrada");
        echo json_encode($resp);
      }
    } else{
      $resp = array("error" => true,"mensaje" => "ninguna variable en POST");
      echo json_encode($resp);
    }
  } else {
    $resp = array("error" => true,"mensaje" => "Caducó la sesion.");
    echo json_encode($resp);
  }
?>
