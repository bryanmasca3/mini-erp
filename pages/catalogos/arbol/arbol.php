<!-- ztree treeview -->
<link rel="stylesheet" href="libs/ztree/css/ztreestyle.css" />
<script src="libs/ztree/js/jquery.ztree.core.js"></script>

<!-- bootstrap datepicker -->
<link rel="stylesheet" href="libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="libs/moment/min/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/locale/es.js"></script>

<!--datetimepicker-->
<link href="https://cdn.bootcss.com/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
      rel="stylesheet">
<script src="https://cdn.bootcss.com/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

<section class="content-header">
  <input type="hidden" id="id_uniopera" value="<?php echo $_SESSION["padreID"];?>"/>
  <h1><i class="fa fa-tasks"></i> UO@<span id="lbl_uniopera"></span></h1>
  <ol class="breadcrumb">
    <li><a href="javascript:appChangePage('lineaneg');"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Activos</li>
  </ol>
</section>
<section class="content">
  <div class="row" id="edit">
    <form class="form-horizontal" id="frmWorker" autocomplete="off">
      <div class="col-md-4">
        <div class="box box-primary">
          <ul id="appTreeView" class="ztree"></ul>
        </div>
      </div>
      <div class="col-md-8">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active" title="Activos"><a href="#datos01" data-toggle="tab"><i class="fa fa-home"></i> Activos</a></li>
            <li class="" title="Solicitudes de Trabajo"><a href="#datos02" data-toggle="tab"><i class="fa fa-briefcase"></i> Solicitudes</a></li>
            <li class="" title="Ordenes de Trabajo"><a href="#datos03" data-toggle="tab"><i class="fa fa-tags"></i> OT</a></li>
            <li class="" title="Pronosticos de Presupuesto"><a href="#datos04" data-toggle="tab"><i class="fa fa-trophy"></i> Garantias</a></li>
            <li class="" title="Mantenimiento Preventivo"><a href="#datos05" data-toggle="tab"><i class="fa fa-legal"></i> PM</a></li>
            <li class="" title="Indicadores"><a href="#datos06" data-toggle="tab"><i class="fa fa-legal"></i> Indicadores</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="datos01">
              <div class="box-body">
                <div class="col-md-6">
                  <div class="box-body">
                    <strong><i class="fa fa-user margin-r-5"></i> Basicos</strong>
                    <p class="text-muted">
                      <input type="hidden" id="hid_ActivoID" value="">
                      <table>
                        <tr>
                          <td style="width:220px;text-align:right;">Numero activo</td>
                          <td style="padding-left:5px;"><a id="lbl_ActivoNro"></a></td>
                        </tr>
                        <tr>
                          <td style="text-align:right;">Descripcion</td>
                          <td style="padding-left:5px;"><a id="lbl_ActivoDescripcion"></a></td>
                        </tr>
                        <tr>
                          <td style="text-align:right;">Numero de Serie</td>
                          <td style="padding-left:5px;"><a id="lbl_ActivoNroSerie"></a></td>
                        </tr>
                        <tr>
                          <td style="text-align:right;">Grupo de Activos</td>
                          <td style="padding-left:5px;"><a id="lbl_ActivoGrupo"></a></td>
                        </tr>
                        <tr>
                          <td style="text-align:right;">Descripcion de Grupo de Activos</td>
                          <td style="padding-left:5px;"><a id="lbl_ActivoGrupoDescripcion"></a></td>
                        </tr>
                        <tr>
                          <td style="text-align:right;">Numero de Activo Principal</td>
                          <td style="padding-left:5px;"><a id="lbl_ActivoNroPrincipal"></a></td>
                        </tr>
                        <tr>
                          <td style="text-align:right;">Grupo de Activos Principal</td>
                          <td style="padding-left:5px;"><a id="lbl_ActivoGrpPrincipal"></a></td>
                        </tr>
                        <tr>
                          <td style="text-align:right;">Numero de Activo Fijo</td>
                          <td style="padding-left:5px;"><a id="lbl_ActivoNroActivoFijo"></a></td>
                        </tr>
                        <tr>
                          <td style="text-align:right;">Categoria</td>
                          <td style="padding-left:5px;"><a id="lbl_ActivoCategoria"></a></td>
                        </tr>
                        <tr>
                          <td style="text-align:right;">Clase Contable</td>
                          <td style="padding-left:5px;"><a id="lbl_ActivoClaseConta"></a></td>
                        </tr>
                        <tr>
                          <td style="text-align:right;">Mantenible</td>
                          <td style="padding-left:5px;"><a id="lbl_ActivoMantenible"></a></td>
                        </tr>
                        <tr>
                          <td style="text-align:right;">Numero de Serie de Equipo</td>
                          <td style="padding-left:5px;"><a id="lbl_ActivoNroSerieEquipo"></a></td>
                        </tr>
                        <tr>
                          <td style="text-align:right;">Fecha de Vencimiento de Garantia</td>
                          <td style="padding-left:5px;"><a id="lbl_ActivoFechaVcto"></a></td>
                        </tr>
                        <tr>
                          <td style="text-align:right;">Anexos</td>
                          <td style="padding-left:5px;"><a id="lbl_ActivoAnexos"></a></td>
                        </tr>
                      </table>
                    </p>
                    <hr>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group" style="margin-bottom:5px;">
                    <div class="input-group">
                        <span class="input-group-addon" style="background:#EEEEEE;font-weight:bold;">Visualizar</span>
                        <select id="cbo01_Visualizar" class="form-control selectpicker">
                            <option value="1">Crear Solicitudes de Trabajo</option>
                            <option value="2">Ver Solicitudes de Trabajo</option>
                            <option value="3">Costos</option>
                            <option value="4">Historial de Fallas</option>
                        </select>
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-info btn-flat" onclick="javascript:app01Boton_GO();">IR</button>
                        </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane" id="datos02">
              <div class="box-body">
                <div class="pull-right">
                  
                  <button id="btn02_Cancel" type="button" class="btn btn-default btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app02Boton_cancel();"><i class="fa fa-angle-double-left"></i> Cancelar</button>
                  <button id="btn02_Save" type="button" class="btn btn-success btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app02Boton_ins();"><i class="fa fa-flash"></i> Guardar</button>
                  <button id="btn02_Update" type="button" class="btn btn-warning btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app02Boton_update();"><i class="fa fa-flash"></i> Actualizar</button>
                  <!-- <button id="div02_Search" type="button" class="btn btn-primary btn-xs" style="margin-top:5px" onclick="javascript:app02Boton_new();"><i class="fa fa-plus"></i> Buscar</button> -->
                  <button id="btn02_New" type="button" class="btn btn-primary btn-xs" style="margin-top:5px" onclick="javascript:app02Boton_new();"><i class="fa fa-plus"></i> Nuevo</button>
                </div>
              </div>

              <div class="row" id="grid02">
                <div class="col-md-12">
                  <div class="row" id="div02_Search">
                    <div class="col-md-4">
                      <div class="input-group" style="margin-bottom:20px;">
                        <span class="input-group-addon" title="Buscar" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i></span>
                        <input id="txt02_Buscar_solicitud" type="text" class="form-control" oninput="javascript:app02Boton_Search();" placeholder="Ingrese numero de solicitud"/>
                        <!-- <span class="input-group-btn">
                          <button type="button" class="btn btn-info btn-flat" onclick="javascript:app02Boton_Search();">IR</button>
                        </span> -->
                      </div>
                    </div>
                  </div>
                  <div class="box box-primary">
                    <div class="box-header no-padding">

                      <div class="box-body table-responsive no-padding">
                        <table class="table table-hover" id="grd02Datos">
                          <thead>
                            <tr>
                              <th style="width:120px;">Operaciones </th>
                              <th style="width:110px;">N° ST</th>
                              <th>Descripción </th>
                              <th style="width:250px;">Estado</th>
                            </tr>
                          </thead>
                          <tbody id="grd02DatosBody">
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="box-body" id="edit02" style="display:none;">
                <strong><i class="fa fa-user margin-r-5"></i> Detalles de Solicitud</strong>
                <div class="row">
                  <div class="col-md-6">
                    <div class="box-body">
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          
                          <input id="txt02_id" type="hidden" class="form-control" placeholder="..." readonly="readonly" />
                        </div>
                      </div>
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Numero de Activo" style="background:#EEEEEE;font-weight:bold;">Nro Activo</span>
                          <input id="txt02_NroActivo" type="text" class="form-control" placeholder="..." readonly="readonly"/>
                        </div>
                      </div>
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;padding-right: 22px;">Prioridad</span>
                          <select id="cbo02_Prioridad" class="form-control selectpicker"></select>
                        </div>
                      </div>
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Solicitar por Fecha" style="background:#EEEEEE;font-weight:bold; padding-right:41px;">Fecha</span>
                          <input id="txt02_Fecha" type="text" class="form-control" style="width:115px;"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <!-- <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Departamento asignado" style="background:#EEEEEE;font-weight:bold;">Dpto. Asignado</span>
                          <input id="txt02_DptoAsignado" type="text" class="form-control" placeholder="..." disabled="disabled" value="Administración Operaciones SSOMA Proveedor Terceros" />
                        </div>
                      </div> -->
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Departamento" style="background:#EEEEEE;font-weight:bold;padding-right: 18px;">Dpto. Asignado</span>
                          <select id="cbo02_DepAsignado" class="form-control selectpicker"></select>
                        </div>
                      </div>
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Tipo de solicitud de Trabajo" style="background:#EEEEEE;font-weight:bold;">Tipo Sol. Trabajo</span>
                          <select id="cbo02_TipoSolTrabajo" class="form-control selectpicker"></select>
                        </div>
                      </div>
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Solicitado por" style="background:#EEEEEE;font-weight:bold;padding-right: 30px;">Solicitado por</span>
                          <input id="txt02_UsuarioSolicita" type="text" class="form-control" placeholder="..." value="" readonly="readonly" />
                          <input id="hid02_userSolicitaID" type="hidden" value="<?php echo($_SESSION["usr_ID"]);?>">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <strong><i class="fa fa-user margin-r-5"></i> Descripcion de Solicitud</strong>
                <div class="form-group" style="margin-bottom:15px;">
                  <div class="input-group" >
                    <textarea id="txt02_Descripcion" type="text" placeholder="descripcion adicional..." cols="150" rows="5" style="width:100%;resize:none;"></textarea>
                  </div>
                </div>

                <strong><i class="fa fa-user margin-r-5"></i> Informacion de Creacion</strong>
                <div class="row">
                  <div class="col-md-6">
                    <div class="box-body">
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Numero de Activo" style="background:#EEEEEE;font-weight:bold;padding-right: 24px;">Creado por</span>
                          <input id="txt02_Creador" type="text" class="form-control" placeholder="..." value="<?php echo($_SESSION["usr_login"]);?>" readonly="readonly" />
                          <input id="hid02_userCreadorID" type="hidden" value="<?php echo($_SESSION["usr_ID"]);?>">
                        </div>
                      </div>
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;">Nro Telefono</span>
                          <input id="txt02_Telefono" type="text" class="form-control" placeholder="..." value="<?php echo($_SESSION["usr_telefono"]);?>1" readonly="readonly" />
                            <!-- <input id="txt02_Telefono" type="text" class="form-control" placeholder="..."/> -->
                            
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Se debe notificar al usuario" style="background:#EEEEEE;font-weight:bold;">Notifica Usuario</span>
                          <select id="cbo02_NotificaUser" class="form-control selectpicker">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Direccion de Correo electronico" style="background:#EEEEEE;font-weight:bold;padding-right: 79px;">Email</span>
                          <!-- <input id="txt02_Creador_correo" type="text" class="form-control" placeholder="..." value="<?php echo($_SESSION["usr_login"]);?>" readonly="readonly" /> -->
                          <input id="txt02_Creador_correo" type="text" class="form-control" placeholder="..." />
                          <!-- <input id="hid02_userCreadorID" type="hidden" value="<?php echo($_SESSION["usr_correo"]);?>"> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane" id="datos03">
              <div class="box-body">
                <div class="pull-right">
                  
                  <button id="btn03_Cancel" type="button" class="btn btn-default btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app03Boton_cancel();"><i class="fa fa-angle-double-left"></i> Cancelar</button>
                  <button id="btn03_Update" type="button" class="btn btn-warning btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app03Boton_update();"><i class="fa fa-flash"></i> Actualizar</button>
                  
                </div>
              </div>

              <div class="row" id="grid03">
                <div class="col-md-12">
                <br>
                <div class="row" id="div03_Search">
                  <div class="col-md-4">
                    <div class="input-group" style="margin-bottom:20px;">
                      <span class="input-group-addon" title="Buscar" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i></span>
                      <input id="txt03_Buscar_solicitud" type="text" class="form-control" oninput="javascript:app03Boton_Search();" placeholder="Ingrese numero de orden"/>
                      <!-- <span class="input-group-btn">
                        <button type="button" class="btn btn-info btn-flat" onclick="javascript:app02Boton_Search();">IR</button>
                      </span> -->
                    </div>
                  </div>
                </div>  

                  <div class="box box-primary">
                    <div class="box-header no-padding">
                      <div class="box-body table-responsive no-padding">
                        <table class="table table-hover" id="grd03Datos">
                          <thead>
                            <tr>
                              <th style="width:50px;">Editar</th>
                              <th style="width:110px;">N° OT</th>
                              <th>Descripcion</th>
                              <th style="width:250px;">Estado</th>
                            </tr>
                          </thead>
                          <tbody id="grd03DatosBody">
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-body" id="edit03" style="display:none;">
              <strong><i class="fa fa-user margin-r-5"></i> Detalles de Orden</strong>
                <div class="row">
                  <div class="col-md-6">
                    <div class="box-body">
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          
                          <input id="txt03_id" type="hidden" class="form-control" placeholder="..." readonly="readonly" />
                        </div>
                      </div>
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Orden de Trabajo" style="background:#EEEEEE;font-weight:bold;padding-right: 86px;">OT</span>
                          <input id="txt03_OT" type="text" class="form-control" readonly placeholder="..."/>
                        </div>
                      </div>
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Numero de Activo" style="background:#EEEEEE;font-weight:bold;padding-right: 35px;">Nro Activo</span>
                          <input id="txt03_NroActivo" type="text" class="form-control" readonly placeholder="..."/>
                        </div>
                      </div>
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;">Grupo Activos</span>
                          <input id="txt03_GrupActivo" type="text" class="form-control" readonly placeholder="..."/>
                        </div>
                      </div>
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Solicitar por Fecha" style="background:#EEEEEE;font-weight:bold; padding-right:64px;">Fecha</span>
                          <input id="txt03_Fecha" type="text" class="form-control" style="width:125px;"/>
                        </div>
                      </div>
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group verPDF">
                          <span class="input-group-addon" title="Departamento" style="background:#EEEEEE;font-weight:bold;border-right:1px solid #D2D6DE;">Archivo adjunto</span>&nbsp;
                          <!-- <button type="button" class="btn btn-success">Ver</button>&nbsp; -->
                          <!-- <button type="button" class="btn btn-primary" style="margin-right:10px;">Add</button> -->
                          <span class="btn btn-file" style="color:white; background-color: #3c8dbc; border-color: #367fa9; margin-right:4px;">Add<input type="file"id="image" accept="application/pdf" /></span>
                          <!-- <button type="button" class="btn btn-success">Ver</button> -->
                        </div>
                      </div>

                      <!-- <div class="form-group">
                        <input type="text" id="af_rpta_propertyland_filename" placeholder="Please input file name"/><br />
                        <input type="file" id="image" accepts=".pdf" />
                      </div> -->
                      
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Descripcion" style="background:#EEEEEE;font-weight:bold;padding-right: 46px;">Descripcion</span>
                          <input id="txt03_Descripcion" type="text" class="form-control" placeholder="..."/>
                        </div>
                      </div>
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Departamento" style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Dpto. Asignado</span>
                          <select id="cbo03_DepAsignado" class="form-control selectpicker"></select>
                        </div>
                      </div>
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Departamento" style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Tipo de OT</span>
                          <select id="cbo03_TipOT" class="form-control selectpicker">
                            <option value="Preventivo">MP- preventivo</option>
                            <option value="Correctivo">MC-correctivo</option>
                            <option value="Predictivo">MP-predictivo</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Status" style="background:#EEEEEE;font-weight:bold;padding-right: 75px;">Estado</span>
                          <select id="cbo03_Status" class="form-control selectpicker" onchange="app03ShowTime(this);">
                            <option value="En espera de planificación">En espera de planificación</option>
                            <option value="Planificada">Planificada</option>
                            <option value="En espera de programación">En espera de programación</option>
                            <option value="Programada">Programada</option>
                            <option value="Reprogramada">Reprogramada</option>
                            <option value="En ejecucion">En ejecución</option>
                            <option value="Cerrada">Cerrada</option>
                          </select>
                        </div>
                      </div>
                      <!-- <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Status" style="background:#EEEEEE;font-weight:bold;padding-right:52px;">Prioridad</span>
                          <select id="cbo03_Prioridad" class="form-control selectpicker">
                            <option>1 - Due les tan 7 days</option>
                          </select>
                        </div>
                      </div> -->
                      
                      <div id="divhorini" class="form-group" style="margin-bottom:5px; display:none" >
                        <div class="input-group">
                          <span class="input-group-addon" title="Duracion" style="background:#EEEEEE;font-weight:bold;padding-right: 45px;">Hora Inicio</span>
                          <input id="txt03_HoraIni" type="text" class="form-control" placeholder="..." style="width:125px;"/>
                        </div>
                      </div>

                      <div id="divhorfin" class="form-group" style="margin-bottom:5px; display:none">
                        <div class="input-group">
                          <span class="input-group-addon" title="Duracion" style="background:#EEEEEE;font-weight:bold;padding-right: 45px;">Hora Fin</span>
                          <input id="txt03_HoraFin" type="text" class="form-control" placeholder="..." style="width:125px;"/>
                        </div>
                      </div>

                      <!-- <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Duracion" style="background:#EEEEEE;font-weight:bold;padding-right: 45px;">Duracion</span>
                          <input id="txt03_Duracion" type="text" class="form-control" placeholder="..." style="width:125px;"/>
                        </div>
                      </div> -->

                    </div>
                  </div>
                </div>
                <strong><i class="fa fa-user margin-r-5" style="margin-bottom:17px;"></i> Detalles de Item</strong>
                <div class="row">
                  <div class="col-md-12"> 
                    <div class="box box-primary">
                      <div class="box-header no-padding">

                        <div class="box-body table-responsive no-padding">
                          <table class="table table-hover" id="grd02Datos">
                            <thead>
                              <tr>
                                <th style="width:120px;">Select. </th>
                                <th style="width:110px;">Detalle</th>
                                <th>Operación</th>
                                <th>Tp. Items</th>
                                <th>Tp. Linea</th>
                                <th>Item</th>
                                <th>Descripción</th>
                                <th>Cantidad</th>
                                <th>UOM</th>
                                <th>Fecha</th>
                              </tr>
                              <tr>
                                <td><input type="checkbox" id="cbox2" value="second_checkbox"></td>
                                <td><a href="">- ocultar</a></td>
                                <td>10</td>
                                <td>Stocked Inventory</td>
                                <td></td>
                                <td>1023642</td>
                                <td><input type="text" style="width:80px"></td>
                                <td><input type="text" style="width:50px" value="1"></td>
                                <td>EA</td>
                                <td><input type="text" style="width:100px;" value="12/12/21"/></td>
                              </tr>
                            </thead>
                            <tbody id="grd02DatosBody">
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane" id="datos04">
              <div class="box-body">

              </div>
            </div>
            <div class="tab-pane" id="datos05">
              <div class="box-body">

              </div>
            </div>
            <div class="tab-pane" id="datos06">
              <div class="box-body control06" id="control06" style="display:true;">
                <!-- <strong><i class="fa fa-user margin-r-5"></i> Detalles de Orden</strong> -->
                  <div class="row">
                    <br>
                    <div class="col-md-2">
                      <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action active" aria-current="true" onclick="app06Link_visual();">
                        <i class="fa fa-eye margin-r-5"></i>Control visual
                        </a>
                        <a href="#" class="list-group-item list-group-item-action" onclick="app06Link_indicador();"><i class="fa fa-search margin-r-5" ></i>Indicadores</a>
                        <!-- <a href="#" class="list-group-item list-group-item-action">A third link item</a>
                        <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                        <a class="list-group-item list-group-item-action disabled">A disabled link item</a> -->
                      </div>
                    </div>
                    <div class="col-md-10">
                      <div class="row">
                        <div class="col-md-3" style="margin-right:20px">
                          <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                              <span class="input-group-addon" title="Departamento" style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Flota</span>
                              <select id="cbo06_Contenidos" class="form-control selectpicker"  onchange="app06LoadEquipo(this);"></select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                            <span class="input-group-addon" title="Departamento" style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Fecha</span>
                              <select id="cbo06_fecha" class="form-control selectpicker">
                                <option value="Mensual">Mensual</option>
                                <option value="Semanal">Semanal</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group" style="margin-bottom:5px; margin-left:8px; margin-right:8px">
                            <div class="input-group">
                              <input id="txt06_anio" type="number" class="form-control" placeholder="Año" value="2022"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                              <select id="cbo06_meses" class="form-control selectpicker">
                              <option value="Todos">Todos los meses</option>
                                <option value="Enero">Enero</option>
                                <option value="Febrero">Febrero</option>
                                <option value="Marzo">Marzo</option>
                                <option value="Abril">Abril</option>
                                <option value="Mayo">Mayo</option>
                                <option value="Junio">Junio</option>
                                <option value="Julio">Julio</option>
                                <option value="Agosto">Agosto</option>
                                <option value="Setiembre">Setiembre</option>
                                <option value="Octubre">Octubre</option>
                                <option value="Noviembre">Noviembre</option>
                                <option value="Diciembre">Diciembre</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2" style="display:none;">
                          <div class="form-group" style="margin-bottom:5px;" >
                            <div class="input-group">
                              <select id="cbo06_semanas" class="form-control selectpicker">
                                <option value="Primera">semana 1</option>
                                <option value="Segunda">semana 2</option>
                                <option value="Tercera">semana 3</option>
                                <option value="Cuarta">semana 4</option>
                                <option value="Quinta">semana 5</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                              <span class="input-group-addon" title="Departamento" style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Equipo</span>
                              <select id="cbo06_Equipos" class="form-control selectpicker"></select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <button id="btn06_Visual" type="button" class="btn btn-primary" style="margin-left:5px"  onclick="javascript:app06Boton_visual();"><i class="fa fa-flash"></i> Generar grafica</button>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-md-12">
                          <!-- <canvas id="grafica"></canvas> -->
                          <div id="chart">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

              </div>

              <div class="box-body indicador06" id="indicador06" style="display:none;">
                <!-- <strong><i class="fa fa-user margin-r-5"></i> Detalles de Orden</strong> -->
                  <div class="row">
                    <br>
                    <div class="col-md-2">
                      <div class="list-group">
                      <a href="#" class="list-group-item list-group-item-action" aria-current="true" onclick="app06Link_visual();">
                        <i class="fa fa-eye margin-r-5"></i>Control visual
                        </a>
                        <a href="#" class="list-group-item list-group-item-action active" onclick="app06Link_indicador();"><i class="fa fa-search margin-r-5" ></i>Indicadores</a>
                        <!-- <a href="#" class="list-group-item list-group-item-action">A third link item</a>
                        <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                        <a class="list-group-item list-group-item-action disabled">A disabled link item</a> -->
                      </div>
                    </div>
                    <div class="col-md-10">
                      
                      <div class="row">
                        <div class="col-md-3" style="margin-right:20px">
                          <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                              <span class="input-group-addon" title="Departamento" style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Flota</span>
                              <select id="cbo07_Contenidos" class="form-control selectpicker" onchange="app07LoadEquipo(this);"></select>
                            </div>
                          </div>
                        </div>
                       
                        <div class="col-md-2">
                          <div class="form-group" style="margin-bottom:5px; margin-right:8px">
                            <div class="input-group">
                              <input id="txt07_Anio" type="number" class="form-control" placeholder="Año" value="2022"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                              <select id="cbo07_Meses" class="form-control selectpicker">
                              <option value="Todos">Todos los meses</option>
                                <option value="Enero">Enero</option>
                                <option value="Febrero">Febrero</option>
                                <option value="Marzo">Marzo</option>
                                <option value="Abril">Abril</option>
                                <option value="Mayo">Mayo</option>
                                <option value="Junio">Junio</option>
                                <option value="Julio">Julio</option>
                                <option value="Agosto">Agosto</option>
                                <option value="Setiembre">Setiembre</option>
                                <option value="Octubre">Octubre</option>
                                <option value="Noviembre">Noviembre</option>
                                <option value="Diciembre">Diciembre</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      
                      </div>
                      
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                              <span class="input-group-addon" title="Departamento" style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Equipo</span>
                              <select id="cbo07_Equipos" class="form-control selectpicker"></select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <button id="btn06_Visual" type="button" class="btn btn-primary" style="margin-left:5px"  onclick="javascript:app06Boton_indicador();"><i class="fa fa-flash"></i> Generar grafica</button>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-md-9">
                          <!-- <canvas id="grafica"></canvas> -->
                          <div id="chart_indicador">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <!-- <canvas id="grafica"></canvas> -->
                          <div id="chart_indicador_2">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        
                        <div class="col-md-3">
                          <!-- <canvas id="grafica"></canvas> -->
                          <div id="chart_tiempo_2">
                          </div>
                        </div>

                        <div class="col-md-9">
                          <!-- <canvas id="grafica"></canvas> -->
                          <div id="chart_tiempo">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

              </div>
              
            </div>
            
          </div>
        </div>
    </div>
    </form>
  </div>
</section>

<script src="pages/catalogos/arbol/arbol.js"></script>
<script>
  $(document).ready(function(){
    appBotonReset();
  });
</script>
