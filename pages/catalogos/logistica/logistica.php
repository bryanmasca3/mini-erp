<!-- ztree treeview -->
<link rel="stylesheet" href="libs/ztree/css/ztreestyle.css" />
<script src="libs/ztree/js/jquery.ztree.core.js"></script>

<!-- bootstrap datepicker -->
<link rel="stylesheet" href="libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="libs/moment/min/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/locale/es.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script> -->

<!--datetimepicker-->
<!-- <link href="https://cdn.bootcss.com/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
      rel="stylesheet">
<script src="https://cdn.bootcss.com/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script> -->

<section class="content-header">
  
  <h1><i class="fa fa-tasks"></i> Logística - <span>ALMACEN GENERAL</span></h1>
  <ol class="breadcrumb">
    <li><a href="javascript:appChangePage('lineaneg');"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Logística</li>
  </ol>
</section>
<section class="content">
  <div class="row" id="edit">
    <form class="form-horizontal" id="frmWorker" autocomplete="off">
      
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active" title="Almacenes"><a href="#datos01" data-toggle="tab"><i class="fa fa-truck"></i> Almacen</a></li>
            <li class="" title="Group Class"><a href="#datos02" data-toggle="tab"><i class="fa fa-folder-open"></i> Group Class</a></li>
            <li role="presentation" class="dropdown">
              <a href="#" id="myTabDropInventario" class="dropdown-toggle" data-toggle="dropdown" aria-controls="myTabDropInventario-contents"><i class="fa fa-dropbox"></i> Inventario <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="myTabDropInventario" id="myTabDropInventario-contents">
                <li class="" title="Inventario"><a href="#datos03" data-toggle="tab"  onclick="javascript:app00_Inventario();"><i class="fa fa-dropbox"></i> Items</a></li>
                <li class="" title="Retiros"><a href="#datos04" data-toggle="tab" onclick="javascript:app00_Tarea();"><i class="fa fa-tags"></i> Retiros</a></li>
                <li class="" title="Devoluciones"><a href="#datos05" data-toggle="tab"><i class="fa fa-trophy"></i> Devoluciones</a></li>
              </ul>
            </li>
            <!-- <li class="" title="Mantenimiento Preventivo"><a href="#datos06" data-toggle="tab"><i class="fa fa-legal"></i> Herramientas</a></li> -->
            <li class="" title="Tareas"><a href="#datos07" data-toggle="tab" onclick="javascript:app00_Tarea();"><i class="fa fa-legal" ></i> Tareas</a></li>
            <li role="presentation" class="dropdown">
              <a href="#" id="myTabDropPersonal" class="dropdown-toggle" data-toggle="dropdown" aria-controls="myTabDropPersonal-contents"><i class="fa fa-legal"></i> Personal <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="myTabDropPersonal" id="myTabDropPersonal-contents">
                <!-- <li><a href="#dropdown1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">@fat</a></li> -->
                <li class="" title="Usuarios"><a href="#datos08" data-toggle="tab"><i class="fa fa-legal"></i> Usuarios</a></li>
                <li class="" title="Proveedores"><a href="#datos14" data-toggle="tab"><i class="fa fa-legal" ></i> Proveedores</a></li>
              </ul>
            </li>
            <!-- <li class="" title="Usuarios"><a href="#datos08" data-toggle="tab"><i class="fa fa-legal"></i> Usuarios</a></li> -->
            <li class="" title="Nueva Cotizacion"><a href="#datos09" data-toggle="tab" onclick="javascript:app00_Req();"><i class="fa fa-legal"></i> Req.Compra</a></li>
            <li class="" title="Cotizaciones"><a href="#datos10" data-toggle="tab" onclick="javascript:app00_Cotizacion();"><i class="fa fa-legal"></i> RFQ</a></li>
            <li class="" title="Cotizar proveedor"><a href="#datos11" data-toggle="tab" onclick="javascript:app00_CotiProveedor();"><i class="fa fa-legal"></i> Coti. Proveedor</a></li>
            <li class="" title="Generar Orden"><a href="#datos12" data-toggle="tab" onclick="javascript:app00_Orden();"><i class="fa fa-legal" ></i> Gen.Orden</a></li>
            <li class="" title="Ordenes de Compra"><a href="#datos13" data-toggle="tab" onclick="javascript:app00_OrdenCompra();"><i class="fa fa-legal" ></i> Ord.Compra</a></li>

          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="datos01">
              <div class="box-body">
                <div class="col-md-5">
                <br>
                  <strong><i class="fa fa-truck margin-r-5"></i> Almancenes</strong>
                  <br><br>
                  <div class="box box-primary no-padding">
                    <div class="box-body">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col" style="width:70px;">Codigo</th>
                            <!-- <th scope="col" style="width:70px;">Sec.</th> -->
                            <th scope="col">Descripción</th>
                            
                          </tr>
                        </thead>
                        <tbody id="alm01DatosBody">
                          
                        </tbody>
                      </table>
                      
                    </div>
                  </div>
                  
                </div>
                <div class="col-md-4">
                  <br>
                  <strong><i class="fa fa-server margin-r-5"></i> Detalles del Almancen</strong>
                  <div class="box-body">
                    <div class="form-group" style="margin-bottom:5px;">
                      <div class="input-group">
                        
                        
                      </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;padding-right: 81px;">Estado</span>
                        <select id="cbo01_Estado" class="form-control selectpicker">
                          <option value="Activo">Activo</option>
                          <option value="Inactivo">Inactivo</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Numero de Activo" style="background:#EEEEEE;font-weight:bold;">Almacen principal</span>
                        <input id="txt01_NroAlmacen" type="text" class="form-control" placeholder="..." readonly="readonly" value="001"/>
                      </div>
                    </div>
                    
                    <div class="form-group" style="margin-bottom:5px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Numero de Activo" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Descripción</span>
                        <input id="txt01_Descripción" type="text" class="form-control" placeholder="..." value="ALMACEN PRINCIPAL"/>
                      </div>
                    </div>

                    <div class="form-group" style="margin-bottom:5px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;padding-right: 93px;">Sede</span>
                        <select id="cbo01_Sede" class="form-control selectpicker">
                          
                        </select>
                      </div>
                    </div>

                    <div class="form-group" style="margin-bottom:5px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Numero de Activo" style="background:#EEEEEE;font-weight:bold;padding-right: 67px;">Dirección</span>
                        <input id="txt01_Direccion" type="text" class="form-control" placeholder="..." value="AV. CANTO GRANDE S/N"/>
                      </div>
                    </div>

                    <div class="form-group" style="margin-bottom:5px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Numero de Activo" style="background:#EEEEEE;font-weight:bold;padding-right: 57px;">Referencia</span>
                        <input id="txt01_Referencia" type="text" class="form-control" placeholder="..." value="PARADERO 11"/>
                      </div>
                    </div>

                    <div class="form-group" style="margin-bottom:5px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;padding-right: 43px;">Responsable</span>
                        <select id="cbo01_Responsable" class="form-control selectpicker">
                          
                        </select>
                      </div>
                    </div>

                    <div class="form-group" style="margin-bottom:5px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Numero de Activo" style="background:#EEEEEE;font-weight:bold;padding-right: 23px">Telefono-Anexo</span>
                        <input id="txt01_Telefono" type="text" class="form-control" placeholder="..." value="PARADERO 11"/>
                      </div>
                    </div>

                    <div class="form-group" style="margin-bottom:5px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;padding-right: 99px;">Pais</span>
                        <select id="cbo01_Pais" class="form-control selectpicker">
                          
                        </select>
                      </div>
                    </div>

              
                    <div class="form-group" style="margin-bottom:5px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;padding-right: 31px;">Departamento</span>
                        <select id="cbo01_Departamento" class="form-control selectpicker">
                          
                        </select>
                      </div>
                    </div>

                    <div class="form-group" style="margin-bottom:5px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;padding-right: 67px;">Provincia</span>
                        <select id="cbo01_Provincia" class="form-control selectpicker">
                          
                        </select>
                      </div>
                    </div>

                    <div class="form-group" style="margin-bottom:5px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;padding-right: 79px;">Distrito</span>
                        <select id="cbo01_Distrito" class="form-control selectpicker">
                          
                        </select>
                      </div>
                    </div>



                    <div class="form-group" style="margin-bottom:5px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Solicitar por Fecha" style="background:#EEEEEE;font-weight:bold; padding-right:87px;">Fecha</span>
                        <input id="txt01_Fecha" type="text" class="form-control" style="width:115px;" value="12-12-21"/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <button id="btn01_New" type="button" class="btn btn-primary btn-xs" style="margin-top:5px" onclick="javascript:app01Boton_new();"><i class="fa fa-plus"></i> Nuevo</button>
                  <button id="btn01_Save" type="button" class="btn btn-success btn-xs" style="margin-top:5px; display:none;" onclick="javascript:app01Boton_save();"><i class="fa fa-flash"></i> Guardar</button>
                  
                  <button id="btn01_Cancel" type="button" class="btn btn-default btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app01Boton_cancel();"><i class="fa fa-angle-double-left"></i> Cancelar</button>
                  <button id="btn01_Update" type="button" class="btn btn-warning btn-xs" style="margin-top:5px;" onclick="javascript:app01Boton_update();"><i class="fa fa-flash"></i> Actualizar</button>
                  <button id="btn01_Delete" type="button" class="btn btn-danger btn-xs" style="margin-top:5px" onclick="javascript:app01Boton_delete();"><i class="fa fa-trash"></i> Eliminar</button>
                </div>
              </div>
            </div>

            <div class="tab-pane" id="datos02">
              <div class="box-body">
                <div class="pull-right">
                  
                  <button id="btn02_Cancel" type="button" class="btn btn-default btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app02Boton_cancel();"><i class="fa fa-angle-double-left"></i> Cancelar gc</button>
                  <button id="btn02_Save" type="button" class="btn btn-success btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app02Boton_ins();"><i class="fa fa-flash"></i> Guardar gc</button>
                  <button id="btn02_Update" type="button" class="btn btn-warning btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app02Boton_update();"><i class="fa fa-flash"></i> Actualizar gc </button>
                  <!-- <button id="div02_Search" type="button" class="btn btn-primary btn-xs" style="margin-top:5px" onclick="javascript:app02Boton_new();"><i class="fa fa-plus"></i> Buscar</button> -->
                  <button id="btn02_New" type="button" class="btn btn-primary btn-xs" style="margin-top:5px" onclick="javascript:app02Boton_new();"><i class="fa fa-plus"></i> Nuevo gc</button>

                  <button id="btn021_Cancel" type="button" class="btn btn-default btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app021Boton_cancel();"><i class="fa fa-angle-double-left"></i> Cancelar p</button>
                  <button id="btn021_Save" type="button" class="btn btn-success btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app021Boton_ins();"><i class="fa fa-flash"></i> Guardar p</button>
                  <button id="btn021_Update" type="button" class="btn btn-warning btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app021Boton_update();"><i class="fa fa-flash"></i> Actualizar p</button>
                  <!-- <button id="div02_Search" type="button" class="btn btn-primary btn-xs" style="margin-top:5px" onclick="javascript:app02Boton_new();"><i class="fa fa-plus"></i> Buscar</button> -->
                  <button id="btn021_New" type="button" class="btn btn-primary btn-xs" style="margin-top:5px; display:none;" onclick="javascript:app021Boton_new();"><i class="fa fa-plus"></i> Nuevo p</button>
                </div>
              </div>

              <div class="row" id="grid02">
                <div class="col-md-3">
                  <div class="list-group">
                    <a href="#" id="link02_groupClass" class="list-group-item list-group-item-action active" aria-current="true" onclick="app02Group_class();">
                    <i class="fa fa-folder-open margin-r-5"></i>Group class
                    </a>
                    <a href="#" id="link02_group" class="list-group-item list-group-item-action" onclick="app02Group();"><i class="fa fa-folder margin-r-5" ></i>Group</a>
                  </div>
                </div>

                <div class="col-md-9" id="grid02_groupClass">
                  <div class="row" id="div02_Search">
                    <div class="col-md-4">
                      <div class="input-group" style="margin-bottom:20px;">
                        <span class="input-group-addon" title="Buscar" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i></span>
                        <input id="txt022_Buscar_clase" type="text" class="form-control" oninput="javascript:app02Boton_Search();" placeholder="Ingrese numero de group class"/>
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
                              <th style="width:110px;">Operaciones</th>
                              <th style="width:150px;">Group class</th>
                              <th>Descripción </th>
                            </tr>
                          </thead>
                          <tbody id="grd022DatosBody">
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="box-body col-md-9" id="edit02" style="display:none;padding-left:50px;padding-right:50px;">
                  
                  
                  <div class="row">
                    <strong><i class="fa fa-user margin-r-5"></i> Detalles de Group Class</strong>
                    <br><br>
                    <div class="col-md-3" style="margin-right:25px;">
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Numero de Activo" style="background:#EEEEEE;font-weight:bold;">Nro Group</span>
                          <!-- <input id="txt02_NroActivo" type="text" class="form-control" placeholder="..." /> -->
                          <input id="txt022_id" type="hidden" class="form-control" placeholder="..." readonly="readonly" />
                          <input class="form-control" list="grupoOptions" id="txt022_NroGrupo" placeholder="Buscar group...">
                          <datalist id="grupoOptions">
                            <option value="11">
                            <option value="01">
                            <option value="21">
                            <option value="24">
                            <option value="32">
                          </datalist>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-3" style="margin-right:25px;">
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Numero de Activo" style="background:#EEEEEE;font-weight:bold;">Nro Group Class</span>
                          <input id="txt022_NroClase" type="text" class="form-control" placeholder="..." />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Numero de Activo" style="background:#EEEEEE;font-weight:bold;">Descripción</span>
                          <input id="txt022_Descripcion" type="text" class="form-control" placeholder="..." />
                        </div>
                      </div>
                    </div>
                  </div>

                  
 
                </div>

                <div class="col-md-9" id="grid02_group" style="display:none;">
                  <div class="row" id="div02_Search">
                    <div class="col-md-4">
                      <div class="input-group" style="margin-bottom:20px;">
                        <span class="input-group-addon" title="Buscar" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i></span>
                        <input id="txt021_Buscar_grupo" type="text" class="form-control" oninput="javascript:app021Boton_Search();" placeholder="Ingrese numero de group"/>
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
                              <th style="width:110px;">Operaciones</th>
                              <th style="width:150px;">Group class</th>
                              <th>Descripción </th>
                            </tr>
                          </thead>
                          <tbody id="grd021DatosBody">
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="box-body col-md-9" id="edit021" style="display:none; padding-left:50px;padding-right:50px;">
                  <div class="row">
                    <strong><i class="fa fa-user margin-r-5"></i> Detalles de Group</strong>
                    <br><br>
                    <div class="col-md-3" style="margin-right:25px;">
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Numero de Activo" style="background:#EEEEEE;font-weight:bold;">Nro Group</span>
                          <input id="txt02_id" type="hidden" class="form-control" placeholder="..." readonly="readonly" />
                          <input id="txt02_NroGrupo" type="text" class="form-control" placeholder="..." />
                        </div>
                      </div>
                    </div>
                  
          
                    <div class="col-md-8">
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Numero de Activo" style="background:#EEEEEE;font-weight:bold;">Descripción</span>
                          <input id="txt02_Descripcion" type="text" class="form-control" placeholder="..." />
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
                  <button id="btn03_New" type="button" class="btn btn-primary btn-xs" style="margin-top:5px;;" onclick="javascript:app03Boton_new();"><i class="fa fa-plus"></i> Nuevo</button>
                  <button id="btn03_Cancel" type="button" class="btn btn-default btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app03Boton_cancel();"><i class="fa fa-angle-double-left"></i> Cancelar</button>
                  <button id="btn03_Update" type="button" class="btn btn-warning btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app03Boton_update();"><i class="fa fa-flash"></i> Actualizar</button>
                  <button id="btn03_Save" type="button" class="btn btn-success btn-xs" style="margin-top:5px; display:none;" onclick="javascript:app03Boton_save();"><i class="fa fa-flash"></i> Guardar</button>
                  
                </div>
              </div>

              <div class="row" id="grid03">
                <div class="col-md-12">
                
                  <div class="row" id="div03_Search">
                    <div class="col-md-4">
                      <div class="input-group" style="margin-bottom:20px;">
                        <span class="input-group-addon" title="Buscar" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i></span>
                        <input id="txt03_Buscar" type="text" class="form-control" oninput="javascript:app03Boton_Search();" placeholder="Ingrese group class del item"/>
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
                              <th style="width:110px;">Operaciones</th>
                              <th style="width:50;">Cod.</th>
                              <th style="width:50;">Group Class</th>
                              <th>Prov.</th>
                              <th>N° Parte</th>
                              <th>Nombre</th>
                              <th>Descripcion</th>
                              <th style="width:50;">Unidad</th>
                              <th style="width:50;">stock</th>
                              <th style="width:50;">precio</th>
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
        
                <div class="row">
                  <div class="col-md-6">
                  <strong><i class="fa fa-user margin-r-5"></i> Detalles del item</strong>
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                              <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 83px;">Código</span>
                              <input id="txt03_id"  class="form-control" placeholder="..." readonly="readonly"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Group Class</span>
                          <input class="form-control" list="grupoOptionsClase" id="cbo03_group_class" placeholder="Buscar group class...">
                              <datalist id="grupoOptionsClase">
                                <option value="11">
                                <option value="01">
                                <option value="21">
                                <option value="24">
                                <option value="32">
                              </datalist>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                              <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 99px;">ROP</span>
                              <input id="txt03_ROP" type="text" class="form-control" placeholder="..."/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div style="padding-left:5px;"> 
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 98px;">ROQ</span>
                                <input id="txt03_ROQ" type="text" class="form-control" placeholder="..."/>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                              <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;padding-right: 70px;">UOI/UOP</span>
                              <select id="cbo03_UOI" class="form-control selectpicker">
                                <option value="EA">EA</option>
                                <option value="EA">EA</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div style="padding-left:5px;">
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 53px;">Num. Parte</span>
                                <input id="txt03_num_parte" type="text" class="form-control" placeholder="..."/>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                              <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;padding-right: 73px;">Moneda</span>
                              <select id="cbo03_moneda" class="form-control selectpicker">
          
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div style="padding-left:5px;">
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 86px;">Precio</span>
                                <input id="txt03_precio" type="text" class="form-control" placeholder="..."/>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                     
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;padding-right: 59px;">Proveedor</span>
                          <input class="form-control" list="grupoOptionsProveedor" id="cbo03_proveedor" placeholder="Buscar proveedor...">
                              <datalist id="grupoOptionsProveedor">
                                <option value="11">
                                <option value="01">
                                <option value="21">
                                <option value="24">
                                <option value="32">
                              </datalist>
                        </div>
                      </div>

                      
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 74px;">Nombre</span>
                          <input id="txt03_nombre" type="text" class="form-control" placeholder="..."/>
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;">Nombre Coloquial</span>
                          <input id="txt03_nombre_col" type="text" class="form-control" placeholder="..."/>
                        </div>
                      </div>

                    </div>
                  </div>
                
                  <div class="col-md-6" >
                    <strong><i class="fa fa-user  margin-r-5"></i> Stock del item</strong>
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                              <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 60px;">Stock Cod.</span>
                              <input id="txt03_stock_cod" type="text" class="form-control" placeholder="..."/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div style="padding-left:5px;">
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 48px;">Stock Num.</span>
                                <input id="txt03_stock_num" type="text" class="form-control" placeholder="..."/>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                              <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;padding-right: 54px;">Stock Clase</span>
                              <select id="cbo03_stock_clase" class="form-control selectpicker">
                                
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div style="padding-left:5px;">
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;padding-right: 55px;">Stock Tipo</span>
                                <select id="cbo03_stock_tipo" class="form-control selectpicker">
                                  
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                              <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 60px;">Stock min.</span>
                              <input id="txt03_stock_min" type="text" class="form-control" placeholder="..."/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div style="padding-left:5px;">
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 86px;">Stock</span>
                                <input id="txt03_stock" type="text" class="form-control" placeholder="..."/>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                    <strong><i class="fa fa-user"></i> APL del item</strong>
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                              <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;padding-right: 70px;">APL Tipo</span>
                              <select id="cbo03_apl_tipo" class="form-control selectpicker">
                                  <option value="G">G - Equipo identificador de Grupo</option>
                                  <option value="E">E - Referencia de Equipo</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div style="padding-left:5px;">
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 29px;">APL Referencia</span>
                                <input id="txt03_apl_ref" type="text" class="form-control" placeholder="..."/>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                              <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 41px;">APL Cantidad</span>
                              <input id="txt03_apl_cant" type="text" class="form-control" placeholder="..."/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div style="padding-left:5px;">
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;">Cod. Componente</span>
                                <input id="txt03_cod_comp" type="text" class="form-control" placeholder="..."/>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>

                    <strong><i class="fa fa-user"></i> Descripción del item</strong>
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                              <textarea class="form-control" id="area03_descripcion" rows="4" cols="200"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>

            <div class="tab-pane" id="datos04">
              <div class="box-body">
                <div class="pull-right">
                  <button id="btn04_New" type="button" class="btn btn-primary btn-xs" style="margin-top:5px;;" onclick="javascript:app04Boton_new();"><i class="fa fa-plus"></i> Nuevo</button>
                  <button id="btn04_Cancel" type="button" class="btn btn-default btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app04Boton_cancel();"><i class="fa fa-angle-double-left"></i> Regresar</button>
                 <!--  <button id="btn04_Update" type="button" class="btn btn-warning btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app04Boton_update();"><i class="fa fa-flash"></i> Actualizar</button> -->
                  <button id="btn04_Save" type="button" class="btn btn-success btn-xs" style="margin-top:5px; display:none;" onclick="javascript:app04Boton_save();"><i class="fa fa-flash"></i> Guardar</button>
                </div>
              </div>
              <div class="row" id="grid04">
                <div class="col-md-12">
                  <div class="row" id="div04_Search">
                    <div class="col-md-4">
                      <div class="input-group" style="margin-bottom:20px;">
                        <span class="input-group-addon" title="Buscar" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i></span>
                        <input id="txt04_Buscar" type="text" class="form-control" oninput="javascript:app04Boton_Search();" placeholder="Ingrese codigo de retiro"/>
                        <!-- <span class="input-group-btn">
                          <button type="button" class="btn btn-info btn-flat" onclick="javascript:app02Boton_Search();">IR</button>
                        </span> -->
                      </div>
                    </div>
                  </div>  

                  <div class="box box-primary">
                    <div class="box-header no-padding">
                      <div class="box-body table-responsive no-padding">
                        <table class="table table-hover" id="grd05Datos">
                          <thead>
                            <tr>
                              <th style="width:110px;">Operaciones</th>
                              <th>Codigo</th>
                              <th>Fecha</th>
                              <th>Usuario</th>
                              <th>Tarea</th>
                              <th>Estado</th>
                            </tr>
                          </thead>
                          <tbody id="grd04DatosBody">
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <!-- fin -->
              <div class="box-body" id="edit04" style="display:none;">
               
                <div class="row">
                  <div class="col-md-12">
                  <strong><i class="fa fa-user margin-r-5"></i> Detalles del retiro</strong>
                    <div class="box-body">
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          
                          <input id="txt07_id" type="hidden" class="form-control" placeholder="..." readonly="readonly" />
                        </div>
                      </div>
                      
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 44px;">Usuario</span>
                          <input class="form-control" list="grupoOptionsUsu" id="txt04_Usuario" placeholder="Buscar usuario...">
                          <datalist id="grupoOptionsUsu">
                            <option value="11">
                            <option value="01">
                            <option value="21">
                            <option value="24">
                            <option value="32">
                          </datalist>
                          
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-11">
                          <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                              <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 58px;">Tarea</span>
                              <input class="form-control" list="grupoOptionsTarea" id="txt04_Tarea" placeholder="Buscar tarea...">
                              <datalist id="grupoOptionsTarea">
                                <option value="11">
                                <option value="01">
                                <option value="21">
                                <option value="24">
                                <option value="32">
                              </datalist>
                              
                            </div>
                          </div>
                        </div>
                        <div class="col-md-1">
                          <div style="padding-left:5px;">
                          <div class="form-group" style="margin-bottom:5px;">
                            <button type="button" class="btn btn-success btn-block" id="button04_addTarea" onclick="javascript:app04Boton_addTarea();">Agregar</button>
                            <!-- <button type="button" class="btn btn-primary" onclick="javascript:app07Boton_newHerra();">Nuevo</button> -->
                          </div>
                          </div>
                        </div>
                      </div>

                      <!-- <div class="row">
                        <div class="col-md-10">
                          <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                              <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;">Herramienta</span>
                              <input class="form-control" list="grupoOptionsHerraRet" id="txt04_Herramienta" placeholder="Buscar herramienta...">
                              <datalist id="grupoOptionsHerraRet">
                                <option value="11">
                                <option value="01">
                                <option value="21">
                                <option value="24">
                                <option value="32">
                              </datalist>
                              
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2" >
                          <div style="padding-left:3px;">
                            <div class="form-group" style="margin-bottom:5px;">
                              <button type="button" class="btn btn-success" id="button04_addHerra" onclick="javascript:app04Boton_addHerra();">Agregar</button>
                              <button type="button" class="btn btn-primary" id="button04_newHerra" onclick="javascript:app04Boton_newHerra();">Nuevo</button>
                            </div>
                          </div>
                        </div>
                      </div> -->

 
                    </div>
                  </div>
                  <div class="col-md-12">
                    <strong><i class="fa fa-user margin-r-5"></i> Herramientas de la tarea</strong>
                    <br><br>
                    <div class="box box-primary">
                      <div class="box-header no-padding ">
                        <div class="box-body table-responsive no-padding">
                          <table class="table table-hover" id="grd03Datos">
                            <thead>
                              <tr>
                                <th>Nombre</th>
                                <th style="width:140px;">Cantidad disponible</th>
                                <th style="width:140px;">Cantidad a retirar</th>
                                <th style="width:340px;">Observaciones</th>
                              </tr>
                            </thead>
                            <tbody id="grd04TareaDatosBody">
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- <div class="col-md-12" style="margin-top:15px;">
                    <strong><i class="fa fa-user margin-r-5"></i> Nuevas herramientas</strong>
                    <br><br>
                    <div class="box box-primary">
                      <div class="box-header no-padding ">
                        <div class="box-body table-responsive no-padding">
                          <table class="table table-hover" id="grd03Datos">
                            <thead>
                              <tr>
                                <th>Nombre</th>
                                <th style="width:150px;">Cantidad a asignar</th>
                                <th style="width:50px;">Eliminar</th>
                              </tr>
                            </thead>
                            <tbody id="grd04HerraDatosBody">
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div> -->
                </div>
                
              </div>
            </div>
            <div class="tab-pane" id="datos05">
              <div class="box-body">
                <div class="pull-right">
                <button id="btn04_Cancel" type="button" class="btn btn-default btn-xs" style="margin-top:5px;" onclick="javascript:app05Boton_cancel();"><i class="fa fa-angle-double-left"></i> Cancelar</button>
                  <button id="btn04_Save" type="button" class="btn btn-success btn-xs" style="margin-top:5px;" onclick="javascript:app05Boton_save();"><i class="fa fa-flash"></i> Guardar</button>
                </div>
              </div>
              <div class="box-body">
                <div class="row">
                  
                  <div class="col-md-12" id="edit021" style="padding-left:50px;padding-right:50px;">
                    <div class="row">
                      <strong><i class="fa fa-user margin-r-5"></i> Devolución</strong>
                      <br><br>
                      <div class="row" id="div04_Search">
                        <div class="col-md-4">
                          <div class="input-group" style="margin-bottom:20px;">
                            <span class="input-group-addon" title="Buscar" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i></span>
                            <input id="txt05_Buscar" type="text" class="form-control" oninput="javascript:app05Boton_Search();" placeholder="Ingrese codigo de retiro"/>
                            <!-- <span class="input-group-btn">
                              <button type="button" class="btn btn-info btn-flat" onclick="javascript:app02Boton_Search();">IR</button>
                            </span> -->
                          </div>
                        </div>
                      </div>
                      <br> 
                      <div class="box box-primary">
                        <div class="box-header no-padding">
                          <div class="box-body table-responsive no-padding">
                            <table class="table table-hover" id="grd05Datos">
                              <thead>
                                <tr>
                                  <th style="width:110px;">Operaciones</th>
                                  <th>Codigo</th>
                                  <th>Fecha</th>
                                  <th>Usuario</th>
                                  <th>Tarea</th>
                                  <th>Estado</th>
                                </tr>
                              </thead>
                              <tbody id="grd05DatosBody">
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <br>
                      <strong><i class="fa fa-user margin-r-5"></i> Detalles de la Devolución</strong>
                      <br><br>
                     
                        
                        
                      <div class="row">
                        <div class="col-md-6">
                          <p><label for="">Codigo Entrega: </label><span id="label05_codigo"></span></p>
                          <p><label for="">Almacenero: </label><span id="label05_almacenero"></span></p>
                          <p><label for="">Usuario: </label><span id="label05_usuario"></span></p>
                        </div>
                        <div class="col-md-6">
                          <p><label for="">Tarea: </label><span id="label05_tarea"></span></p>
                          <p><label for="">Fecha de Retiro: </label><span id="label05_fecha"></span></p>
                          <p><label for="">estado: </label><span id="label05_estado"></span></p>
                        </div>
                      </div> 
                    
                      <br><br>
                      <div class="box box-primary">
                        <div class="box-header no-padding">
                          <div class="box-body table-responsive no-padding">
                            <table class="table table-hover" id="grd05Datos">
                              <thead>
                                <tr>
                                  <th style= "width:600px;">Herramienta</th>
                                  <th style= "width:170px;">Cant. Retirada</th>
                                  <th>Obser. Retiro</th>
                                  <th style= "width:170px;">Cant. Devuelta</th>
                                  <th>Obser. Devolucion</th>
                                </tr>
                              </thead>
                              <tbody id="grd05DatosDetalleBody">
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="tab-pane" id="datos06">
              <div class="box-body">
                <div class="pull-right">
                  <button id="btn06_New" type="button" class="btn btn-primary btn-xs" style="margin-top:5px;;" onclick="javascript:app06Boton_new();"><i class="fa fa-plus"></i> Nuevo</button>
                  <button id="btn06_Cancel" type="button" class="btn btn-default btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app06Boton_cancel();"><i class="fa fa-angle-double-left"></i> Cancelar</button>
                  <button id="btn06_Update" type="button" class="btn btn-warning btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app06Boton_update();"><i class="fa fa-flash"></i> Actualizar</button>
                  
                </div>
              </div>

              <div class="row" id="grid06">
                <div class="col-md-12">
                  <div class="row" id="div06_Search">
                    <div class="col-md-4">
                      <div class="input-group" style="margin-bottom:20px;">
                        <span class="input-group-addon" title="Buscar" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i></span>
                        <input id="txt06_Buscar" type="text" class="form-control" oninput="javascript:app06Boton_Search();" placeholder="Ingrese nombre de herramienta"/>
                        <!-- <span class="input-group-btn">
                          <button type="button" class="btn btn-info btn-flat" onclick="javascript:app02Boton_Search();">IR</button>
                        </span> -->
                      </div>
                    </div>
                  </div>  

                  <div class="box box-primary">
                    <div class="box-header no-padding">
                      <div class="box-body table-responsive no-padding">
                        <table class="table table-hover" id="grd06Datos">
                          <thead>
                            <tr>
                              <th style="width:110px;">Operaciones</th>
                              <th>Nombre</th>
                              <th style="width:50;">Consumible</th>
                              <th style="width:50;">cant. total</th>
                              <th style="width:50;">cant. disponible</th>
                            
                            </tr>
                          </thead>
                          <tbody id="grd06DatosBody">
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <!-- fin -->
            </div>
            <div class="tab-pane" id="datos07">
              <div class="box-body">
                <div class="pull-right">
                  <button id="btn07_New" type="button" class="btn btn-primary btn-xs" style="margin-top:5px;;" onclick="javascript:app07Boton_new();"><i class="fa fa-plus"></i> Nuevo</button>
                  <button id="btn07_Cancel" type="button" class="btn btn-default btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app07Boton_cancel();"><i class="fa fa-angle-double-left"></i> Cancelar</button>
                  <button id="btn07_Update" type="button" class="btn btn-warning btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app07Boton_update();"><i class="fa fa-flash"></i> Actualizar</button>
                  <button id="btn07_Save" type="button" class="btn btn-success btn-xs" style="margin-top:5px; display:none;" onclick="javascript:app07Boton_save();"><i class="fa fa-flash"></i> Guardar</button>
                </div>
              </div>

              <div class="row" id="grid07">
                <div class="col-md-12">
                  <div class="row" id="div07_Search">
                    <div class="col-md-4">
                      <div class="input-group" style="margin-bottom:20px;">
                        <span class="input-group-addon" title="Buscar" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i></span>
                        <input id="txt07_Buscar" type="text" class="form-control" oninput="javascript:app07Boton_Search();" placeholder="Ingrese codigo de tarea"/>
                        <!-- <span class="input-group-btn">
                          <button type="button" class="btn btn-info btn-flat" onclick="javascript:app02Boton_Search();">IR</button>
                        </span> -->
                      </div>
                    </div>
                  </div>  

                  <div class="box box-primary">
                    <div class="box-header no-padding">
                      <div class="box-body table-responsive no-padding">
                        <table class="table table-hover" id="grd06Datos">
                          <thead>
                            <tr>
                              <th style="width:110px;">Operaciones</th>
                              <th style="width:110px;">Código</th>
                              <th>Nombre</th>
                              <th>Descripcion</th>
         
                            </tr>
                          </thead>
                          <tbody id="grd07DatosBody">
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <!-- fin -->
              <div class="box-body" id="edit07" style="display:none;">
                <strong><i class="fa fa-user margin-r-5"></i> Detalles de Tarea</strong>
                <div class="row">
                  <div class="col-md-12">
                    <div class="box-body">
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          
                          <input id="txt07_id" type="hidden" class="form-control" placeholder="..." readonly="readonly" />
                        </div>
                      </div>
                      
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 41px;">Nombre</span>
                          <input id="txt07_Nombre" type="text" class="form-control" placeholder="..."/>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-10">
                          <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                              <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;">Herramienta</span>
                              <input class="form-control" list="grupoOptionsHerra" id="txt07_Herramienta" placeholder="Buscar herramienta(11), respuesto(12), material(13)...">
                              <datalist id="grupoOptionsHerra">
                                <option value="11">
                                <option value="01">
                                <option value="21">
                                <option value="24">
                                <option value="32">
                              </datalist>
                              
                            </div>
                          </div>
                        </div>
                        <div class="col-md-1 text-right">
                          <div style="padding-left:5px;">
                            <div class="form-group" style="margin-bottom:5px;">
                              <button type="button" class="btn btn-success btn-block" onclick="javascript:app07Boton_addHerra();">Agregar</button>
                              <!-- <button type="button" class="btn btn-primary btn-block" onclick="javascript:app07Boton_newHerra();">Nuevo</button> -->
                            </div>
                          </div>
                        </div>
                        <div class="col-md-1 text-right" >
                          <div style="padding-left:5px;">
                            <div class="form-group" style="margin-bottom:5px;">
                            <!--  <button type="button" class="btn btn-success btn-block" onclick="javascript:app07Boton_addHerra();">Agregar</button> -->
                              <button type="button" class="btn btn-primary btn-block" onclick="javascript:app07Boton_newHerra();">Nuevo</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      
                      <br>
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <strong><i class="fa fa-user margin-r-5"></i> Descripción de Tarea</strong>
                          <textarea class="form-control" id="area07_descripcion" rows="5" cols="400"></textarea>
                        </div>
                      </div>
 
                    </div>
                  </div>
                  <div class="col-md-12" style="margin-top:15px;">
                    <div class="box box-primary">
                      <div class="box-header no-padding ">
                        <div class="box-body table-responsive no-padding">
                          <table class="table table-hover" id="grd03Datos">
                            <thead>
                              <tr>
                                <th>Nombre</th>
                                <th style="width:150px;">Cantidad a asignar</th>
                                <th style="width:50px;">Eliminar</th>
                              </tr>
                            </thead>
                            <tbody id="grd07HerraDatosBody">
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
            <div class="tab-pane" id="datos08">
              <div class="box-body">
                <div class="pull-right">
                  <button id="btn08_New" type="button" class="btn btn-primary btn-xs" style="margin-top:5px;;" onclick="javascript:app08Boton_new();"><i class="fa fa-plus"></i> Nuevo</button>
                  <button id="btn08_Cancel" type="button" class="btn btn-default btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app08Boton_cancel();"><i class="fa fa-angle-double-left"></i> Cancelar</button>
                  <button id="btn08_Update" type="button" class="btn btn-warning btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app08Boton_update();"><i class="fa fa-flash"></i> Actualizar</button>
                  <button id="btn08_Save" type="button" class="btn btn-success btn-xs" style="margin-top:5px; display:none;" onclick="javascript:app08Boton_save();"><i class="fa fa-flash"></i> Guardar</button>
                </div>
              </div>

              <div class="row" id="grid08">
                <div class="col-md-12">
                  <div class="row" id="div08_Search">
                    <div class="col-md-4">
                      <div class="input-group" style="margin-bottom:20px;">
                        <span class="input-group-addon" title="Buscar" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i></span>
                        <input id="txt08_Buscar" type="text" class="form-control" oninput="javascript:app08Boton_Search();" placeholder="Ingrese numero de usuario"/>
                        <!-- <span class="input-group-btn">
                          <button type="button" class="btn btn-info btn-flat" onclick="javascript:app02Boton_Search();">IR</button>
                        </span> -->
                      </div>
                    </div>
                  </div>  

                  <div class="box box-primary">
                    <div class="box-header no-padding">
                      <div class="box-body table-responsive no-padding">
                        <table class="table table-hover" id="grd08Datos">
                          <thead>
                            <tr>
                              <th style="width:110px;">Operaciones</th>
                              <th style="width:110px;">Código</th>
                              <th>Nombre</th>
                              <th style="width:250px;">DNI</th>
                              <th style="width:250px;">Telefono</th>
                              <th style="width:250px;">Correo</th>
                              <th style="width:250px;">Usuario</th>
                              
         
                            </tr>
                          </thead>
                          <tbody id="grd08DatosBody">
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <!-- fin -->
              <div class="box-body" id="edit08" style="display:none;">
                <strong><i class="fa fa-user margin-r-5"></i> Detalles del Usuario</strong>
                <div class="row">
                  <div class="col-md-6">
                    <div class="box-body">
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          
                          <input id="txt08_id" type="hidden" class="form-control" placeholder="..." readonly="readonly" />
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 48px;">DNI</span>
                          <input id="txt08_DNI" type="text" class="form-control" placeholder="..."/>
                        </div>
                      </div>
                      
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;">Nombres</span>
                          <input id="txt08_Nombre" type="text" class="form-control" placeholder="..."/>
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 13px;">Apellidos</span>
                          <input id="txt08_Apellidos" type="text" class="form-control" placeholder="..."/>
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 16px;">Telefono</span>
                          <input id="txt08_Telefono" type="text" class="form-control" placeholder="..."/>
                        </div>
                      </div>
                      
            
                    </div>
                  </div>
                  <div class="col-md-6" style="margin-top:5px;">
                    <div class="box-body">
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 43px;">Correo</span>
                          <input id="txt08_Correo" type="text" class="form-control" placeholder="..."/>
                        </div>
                      </div>
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;padding-right: 65px;">Rol</span>
                          <select id="cbo08_Rol" class="form-control selectpicker">
                            
                          </select>
                        </div>
                      </div>
                      
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 36px;">Usuario</span>
                          <input id="txt08_Usuario" type="text" class="form-control" placeholder="..."/>
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;">Contraseña</span>
                          <input id="txt08_Contrasena" type="text" class="form-control" placeholder="..."/>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
            <div class="tab-pane" id="datos09">
              <div class="box-body">
                <div class="pull-right">
                  <button id="btn09_New" type="button" class="btn btn-primary btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app08Boton_new();"><i class="fa fa-plus"></i> Nuevo</button>
                  <button id="btn09S_Cancel" type="button" class="btn btn-default btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app09SBoton_cancel();"><i class="fa fa-angle-double-left"></i> Cancelar</button>
                  <button id="btn09_Update" type="button" class="btn btn-warning btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app08Boton_update();"><i class="fa fa-flash"></i> Actualizar</button>
                  <button id="btn09S_Save" type="button" class="btn btn-success btn-xs" style="margin-top:5px; display:none;" onclick="javascript:app09SBoton_save();"><i class="fa fa-flash"></i> Guardar</button>
                  <button id="btn09Q_Cancel" type="button" class="btn btn-default btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app09QBoton_cancel();"><i class="fa fa-angle-double-left"></i> Cancelar</button>
                  
                  <button id="btn09Q_Save" type="button" class="btn btn-success btn-xs" style="margin-top:5px; display:none;" onclick="javascript:app09QBoton_save();"><i class="fa fa-flash"></i> Guardar</button>
                </div>
              </div>

              <div class="row" id="grid09">
                <div class="col-md-12">
                  <div class="row" id="div08_Search">
                    <div class="col-md-4">
                      <div class="input-group" style="margin-bottom:20px;">
                        <span class="input-group-addon" title="Buscar" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i></span>
                        <input id="txt09_Buscar" type="text" class="form-control" oninput="javascript:app09Boton_Search();" placeholder="Ingrese codigo de item"/>
                        <!-- <span class="input-group-btn">
                          <button type="button" class="btn btn-info btn-flat" onclick="javascript:app02Boton_Search();">IR</button>
                        </span> -->
                      </div>
                    </div>
                  </div>  

                  <div class="box box-primary">
                    <div class="box-header no-padding">
                      <div class="box-body table-responsive no-padding">
                        <table class="table table-hover" id="grd08Datos">
                          <thead>
                            <tr>
                            
                              <th style="width:110px;">Operaciones</th>
                              <th style="width:50;">Cod.</th>
                              <th style="width:50;">Group Class</th>
                              <th>Cod.Prov.</th>
                              <th>N° Parte</th>
                              <th>Item</th>
                              <th>Descripcion</th>
                              <th style="width:50;">Unidad</th>
                              <th style="width:50;">Stock</th>
                              <th style="width:50;">Precio</th>
         
                            </tr>
                          </thead>
                          <tbody id="grd09DatosBody">
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <!-- fin -->
              <div class="box-body" id="edit09_Q" style="display:none;">
                
                <div class="row">
                
                  <div class="col-md-12">
                  <strong><i class="fa fa-user margin-r-5"></i> Datos RFQ</strong>
                    <div class="box-body">
                    
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          
                          <input id="txt09_id" type="hidden" class="form-control" placeholder="..." readonly="readonly"/>
                        </div>
                      </div>


                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 48px;">Req. Cod</span>
                          <input id="txt09_Numero" type="text" class="form-control" placeholder="..." readonly="readonly"/>
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 25px;">Fecha Cierre</span>
                          <input id="txt09_Fecha" type="text" class="form-control" placeholder="..."/>
                        </div>
                      </div>

                    </div>
                    <strong><i class="fa fa-user margin-r-5"></i> Descripción</strong>
                      <div class="box-body">
                        <div class="form-group" style="margin-bottom:5px;">
                          <div class="input-group">
                            <textarea class="form-control" id="area09_descripcion" rows="4" cols="400" placeholder="Sin descripción"></textarea>
                          </div>
                        </div>
                      </div>
                  </div>
                  
                </div>
  
              </div>

              <div class="box-body" id="edit09_S" style="display:none;">
                <strong><i class="fa fa-user margin-r-5"></i> Datos Proveedores</strong>
                <div class="row">
                  <div class="col-md-12">
                    <div class="box-body">
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          
                          <input id="txt0Q_id" type="hidden" class="form-control" placeholder="..." readonly="readonly" />
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 48px;">Req. Cod</span>
                          <input id="txt09Q_Numero" type="text" class="form-control" placeholder="..." readonly="readonly"/>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-11">
                          <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                              <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;padding-right: 37px;">Proveedor</span>
                              <input class="form-control" list="grupoOptionsProveedor9S" id="cbo09S_proveedor" placeholder="Buscar proveedor...">
                                  <datalist id="grupoOptionsProveedor9S">
                                    <option value="11">
                                    <option value="01">
                                    <option value="21">
                                    <option value="24">
                                    <option value="32">
                                  </datalist>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-1">
                          <div style="padding-left:5px;">
                            <div class="form-group" style="margin-bottom:5px;">
                              <button type="button" class="btn btn-success btn-block" onclick="javascript:app09SBoton_addProv();">Agregar</button>
                              <!-- <button type="button" class="btn btn-primary btn-block" onclick="javascript:app07Boton_newHerra();">Nuevo</button> -->
                            </div>
                          </div>
                        </div>
                      </div>


                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="box box-primary">
                      <div class="box-header no-padding">
                        <div class="box-body table-responsive no-padding">
                          <table class="table table-hover" id="grd08Datos">
                            <thead>
                              <tr>     
                                <th style="width:110px;">Codigo</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
          
                              </tr>
                            </thead>
                            <tbody id="grd09SDatosProvBody">
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
  
              </div>


            </div>
            
            <div class="tab-pane" id="datos10">
              <div class="box-body">
                <div class="pull-right">
                  <button id="btn09_New" type="button" class="btn btn-primary btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app08Boton_new();"><i class="fa fa-plus"></i> Nuevo</button>
                  <button id="btn10S_Cancel" type="button" class="btn btn-default btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app10SBoton_cancel();"><i class="fa fa-angle-double-left"></i> Cancelar</button>
                  <button id="btn10_Update" type="button" class="btn btn-warning btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app08Boton_update();"><i class="fa fa-flash"></i> Actualizar</button>
                  <button id="btn10S_Save" type="button" class="btn btn-success btn-xs" style="margin-top:5px; display:none;" onclick="javascript:app10SBoton_save();"><i class="fa fa-flash"></i> Guardar</button>
                  <button id="btn10Q_Cancel" type="button" class="btn btn-default btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app10QBoton_cancel();"><i class="fa fa-angle-double-left"></i> Cancelar</button>
                  
                  <button id="btn10Q_Save" type="button" class="btn btn-success btn-xs" style="margin-top:5px; display:none;" onclick="javascript:app10QBoton_save();"><i class="fa fa-flash"></i> Guardar</button>
                </div>
              </div>

              <div class="row" id="grid10">
                <div class="col-md-12">
                  <div class="row" id="div08_Search">
                    <div class="col-md-4">
                      <div class="input-group" style="margin-bottom:20px;">
                        <span class="input-group-addon" title="Buscar" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i></span>
                        <input id="txt10_Buscar" type="text" class="form-control" oninput="javascript:app10Boton_Search();" placeholder="Ingrese codigo de cotizacion"/>
                        <!-- <span class="input-group-btn">
                          <button type="button" class="btn btn-info btn-flat" onclick="javascript:app02Boton_Search();">IR</button>
                        </span> -->
                      </div>
                    </div>
                  </div>  

                  <div class="box box-primary">
                    <div class="box-header no-padding">
                      <div class="box-body table-responsive no-padding">
                        <table class="table table-hover" id="grd08Datos">
                          <thead>
                            <tr>
                              <th style="width:110px;">Operaciones</th>
                              <th style="width:100;">Cod.RFQ</th>
                              <th>Descipción</th>
                              <th >Fecha Cierre</th>
                              <th style="width:100;">Cod. Item</th>
                              <th>Item</th>
                              <th style="width:80;">Stock</th>
                              <th style="width:80;">Unidad</th>
                              <th style="width:80;">Precio</th>
                              <th>Item Descipción</th>
                              
         
                            </tr>
                          </thead>
                          <tbody id="grd10DatosBody">
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <!-- fin -->
              

              <div class="box-body" id="edit10_S" style="display:none;">
                <strong><i class="fa fa-user margin-r-5"></i> Datos Proveedores</strong>
                <div class="row">
                  <div class="col-md-12">
                    <div class="box-body">
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          
                          <input id="txt10Q_id" type="hidden" class="form-control" placeholder="..." readonly="readonly" />
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 48px;">Req. Cod</span>
                          <input id="txt10Q_Numero" type="text" class="form-control" placeholder="..." readonly="readonly"/>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-11">
                          <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                              <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;padding-right: 37px;">Proveedor</span>
                              <input class="form-control" list="grupoOptionsProveedor10S" id="cbo10S_proveedor" placeholder="Buscar proveedor...">
                                  <datalist id="grupoOptionsProveedor10S">
                                    <option value="11">
                                    <option value="01">
                                    <option value="21">
                                    <option value="24">
                                    <option value="32">
                                  </datalist>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-1">
                          <div style="padding-left:5px;">
                            <div class="form-group" style="margin-bottom:5px;">
                              <button type="button" class="btn btn-success btn-block" onclick="javascript:app10SBoton_addProv();">Agregar</button>
                              <!-- <button type="button" class="btn btn-primary btn-block" onclick="javascript:app07Boton_newHerra();">Nuevo</button> -->
                            </div>
                          </div>
                        </div>
                      </div>


                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="box box-primary">
                      <div class="box-header no-padding">
                        <div class="box-body table-responsive no-padding">
                          <table class="table table-hover" id="grd08Datos">
                            <thead>
                              <tr>     
                                <th style="width:110px;">Codigo</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
          
                              </tr>
                            </thead>
                            <tbody id="grd10SDatosProvBody">
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
  
              </div>

            </div>

            <div class="tab-pane" id="datos11">
              <div class="box-body">
                <div class="pull-right">
                  <button id="btn09_New" type="button" class="btn btn-primary btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app08Boton_new();"><i class="fa fa-plus"></i> Nuevo</button>
                  <button id="btn09S_Cancel" type="button" class="btn btn-default btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app09SBoton_cancel();"><i class="fa fa-angle-double-left"></i> Cancelar</button>
                  <button id="btn09_Update" type="button" class="btn btn-warning btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app08Boton_update();"><i class="fa fa-flash"></i> Actualizar</button>
                  <!-- <button id="btn09S_Save" type="button" class="btn btn-success btn-xs" style="margin-top:5px;" onclick="javascript:app11Boton_save();"><i class="fa fa-flash"></i> Guardar</button> -->
                  <button id="btn09Q_Cancel" type="button" class="btn btn-default btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app09QBoton_cancel();"><i class="fa fa-angle-double-left"></i> Cancelar</button>
                  
                  <button id="btn09Q_Save" type="button" class="btn btn-success btn-xs" style="margin-top:5px; display:none;" onclick="javascript:app09QBoton_save();"><i class="fa fa-flash"></i> Guardar</button>
                </div>
              </div>

              
              <div class="box-body" id="edit11" >
                <strong><i class="fa fa-user margin-r-5"></i>Cotización del proveedor</strong>
                <div class="row">
                  <div class="col-md-12">
                    <div class="box-body">

                    <div class="form-group" style="margin-bottom:5px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;padding-right: 37px;">Contización</span>
                        <input class="form-control" list="grupoOptionsCotizacion" id="cbo11_cotizacion" placeholder="Buscar Cotización...">
                            <datalist id="grupoOptionsCotizacion">
                              <option value="11">
                              <option value="01">
                              <option value="21">
                              <option value="24">
                              <option value="32">
                            </datalist>
                      </div>
                    </div>

                    <div class="form-group" style="margin-bottom:5px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;padding-right: 44px;">Proveedor</span>
                        <input class="form-control" list="grupoOptionsProveedor11" id="cbo11_proveedor" placeholder="Buscar proveedor...">
                            <datalist id="grupoOptionsProveedor11">
                              <option value="11">
                              <option value="01">
                              <option value="21">
                              <option value="24">
                              <option value="32">
                            </datalist>
                      </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                              <button type="button" class="btn btn-success" onclick="javascript:app11Boton_searchCot();">Buscar</button>
                              <!-- <button type="button" class="btn btn-primary btn-block" onclick="javascript:app07Boton_newHerra();">Nuevo</button> -->
                            </div>

                    


                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="box box-primary">
                      <div class="box-header no-padding">
                        <div class="box-body table-responsive no-padding">
                          <table class="table table-hover" id="grd08Datos">
                            <thead>
                              <tr>     
                                <th style="width:100px;">Cod.</th>
                                <th style="width:100px;">Cod. RFQ</th>
                                <th style="width:100px;">Cod. Proveedor</th>
                                <th style="width:100px;">Cod. Item</th>
                                <th>Item</th>
                                <th style="width:100px;">Unidad</th>
                                <th style="width:100px;">Stock</th>
                                <th style="width:100px;">Precio</th>
                                <th style="width:100px;">Precio Ofer.</th>
                                <th style="width:100px;">Guardar</th>
          
                              </tr>
                            </thead>
                            <tbody id="grd11DatosCotBody">
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
  
              </div>


            </div>

            <div class="tab-pane" id="datos12">
              <div class="box-body">
                <div class="pull-right">
                  <button id="btn09_New" type="button" class="btn btn-primary btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app08Boton_new();"><i class="fa fa-plus"></i> Nuevo</button>
                  <button id="btn10S_Cancel" type="button" class="btn btn-default btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app10SBoton_cancel();"><i class="fa fa-angle-double-left"></i> Cancelar</button>
                  <button id="btn10_Update" type="button" class="btn btn-warning btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app08Boton_update();"><i class="fa fa-flash"></i> Actualizar</button>
                  <button id="btn10S_Save" type="button" class="btn btn-success btn-xs" style="margin-top:5px; display:none;" onclick="javascript:app10SBoton_save();"><i class="fa fa-flash"></i> Guardar</button>
                  <button id="btn12_Cancel" type="button" class="btn btn-default btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app12Boton_cancel();"><i class="fa fa-angle-double-left"></i> Cancelar</button>
                  
                  <button id="btn12_Save" type="button" class="btn btn-success btn-xs" style="margin-top:5px; display:none;" onclick="javascript:app12Boton_save();"><i class="fa fa-flash"></i> Guardar</button>
                </div>
              </div>

              <div class="row" id="grid12">
                <div class="col-md-12">
                  <div class="row" id="div08_Search">
                    <div class="col-md-4">
                      <div class="input-group" style="margin-bottom:20px;">
                        <span class="input-group-addon" title="Buscar" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i></span>
                        <input id="txt12_Buscar" type="text" class="form-control" oninput="javascript:app12Boton_Search();" placeholder="Ingrese codigo de cot. proveedor"/>
                        <!-- <span class="input-group-btn">
                          <button type="button" class="btn btn-info btn-flat" onclick="javascript:app02Boton_Search();">IR</button>
                        </span> -->
                      </div>
                    </div>
                  </div>  

                  <div class="box box-primary">
                    <div class="box-header no-padding">
                      <div class="box-body table-responsive no-padding">
                        <table class="table table-hover" id="grd08Datos">
                          <thead>
                            <tr>
                              <th style="width:110px;">Operaciones</th>
                              <th style="width:100;">Cod.</th>
                              <th style="width:100;">Cod.RFQ</th>
                              <th style="width:100;">Cod.Prov</th>
                              <th>Descipción</th>
                              <th >Fecha Cierre</th>
                              <th style="width:100;">Cod. Item</th>
                              <th>Item</th>
                              <th style="width:80;">Stock</th>
                              <th style="width:80;">Unidad</th>
                              <th style="width:80;">Precio</th>
                              <th>Item Descipción</th>
                              <th style="width:80;">Precio Ofer.</th>
                              
         
                            </tr>
                          </thead>
                          <tbody id="grd12DatosBody">
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <!-- fin -->
              

              <div class="box-body" id="edit12" style="display:none;">
                <strong><i class="fa fa-user margin-r-5"></i> Detalle de la Orden</strong>
                <div class="row">
                  <div class="col-md-12">
                    <div class="box-body" style="padding-bottom: 0px;">
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Solicitar por Fecha" style="background:#EEEEEE;font-weight:bold; padding-right:86px;">Fecha</span>
                          <input id="txt12_Fecha" type="text" class="form-control" style="width:115px;" value="12-12-21"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body" style="padding-top: 0px;">
                      
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          
                          <input id="txt10Q_id" type="hidden" class="form-control" placeholder="..." readonly="readonly" />
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 97px;">Cod.</span>
                          <input id="txt12_Numero" type="text" class="form-control" placeholder="..." readonly="readonly"/>
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 68px;">Cod. RFQ</span>
                          <input id="txt12_rfq" type="text" class="form-control" placeholder="..." readonly="readonly"/>
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;padding-right: 14px;">Proveedor Actual</span>
                          <input class="form-control" list="grupoOptionsProveedorAct" id="cbo12_proveedorAct" placeholder="Buscar proveedor..." readonly="readonly">
                              <datalist id="grupoOptionsProveedorAct">
                                <option value="11">
                                <option value="01">
                                <option value="21">
                                <option value="24">
                                <option value="32">
                              </datalist>
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 65px;">Cod. Item</span>
                          <input id="txt12_codigoItem" type="text" class="form-control" placeholder="..." readonly="readonly"/>
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 96px;">Item</span>
                          <input id="txt12_item" type="text" class="form-control" placeholder="..." readonly="readonly"/>
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 94px;">UOM</span>
                          <input id="txt12_unidad" type="text" class="form-control" placeholder="..." readonly="readonly"/>
                        </div>
                      </div>

                    </div>
                  </div>
                  
                  <div class="col-md-6" style="margin-top:5px;">
                    <div class="box-body" style="padding-top: 0px;">
                    
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 63px;">Num. Parte</span>
                          <input id="txt12_parte" type="text" class="form-control" placeholder="..." />
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 62px;">Descripcion</span>
                          <input id="txt12_descripcion" type="text" class="form-control" placeholder="..." />
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;">Proveedor Anterior</span>
                          <input class="form-control" list="grupoOptionsProveedorAnt" id="cbo12_proveedorAnt" placeholder="Buscar proveedor...">
                              <datalist id="grupoOptionsProveedorAnt">
                                <option value="11">
                                <option value="01">
                                <option value="21">
                                <option value="24">
                                <option value="32">
                              </datalist>
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 35px;">Precio Ofertado</span>
                          <input id="txt12_precioOfer" type="text" class="form-control" placeholder="..." readonly="readonly" />
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 80px;">Cantidad</span>
                          <input id="txt12_cantidad" type="number" value="1" class="form-control" placeholder="..." oninput="javascript:app12Boton_Cantidad();"/>
                        </div>
                      </div>
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 106px;">Total</span>
                          <input id="txt12_total" type="number" value="1" class="form-control" placeholder="..." readonly="readonly" />
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
  
              </div>

            </div>

            <div class="tab-pane" id="datos13">
              <div class="box-body">
                <div class="pull-right">
                  <button id="btn09_New" type="button" class="btn btn-primary btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app08Boton_new();"><i class="fa fa-plus"></i> Nuevo</button>
                  <button id="btn10S_Cancel" type="button" class="btn btn-default btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app10SBoton_cancel();"><i class="fa fa-angle-double-left"></i> Cancelar</button>
                  <button id="btn10_Update" type="button" class="btn btn-warning btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app08Boton_update();"><i class="fa fa-flash"></i> Actualizar</button>
                  <button id="btn10S_Save" type="button" class="btn btn-success btn-xs" style="margin-top:5px; display:none;" onclick="javascript:app10SBoton_save();"><i class="fa fa-flash"></i> Guardar</button>
                  <button id="btn12_Cancel" type="button" class="btn btn-default btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app12Boton_cancel();"><i class="fa fa-angle-double-left"></i> Cancelar</button>
                  
                  <button id="btn12_Save" type="button" class="btn btn-success btn-xs" style="margin-top:5px; display:none;" onclick="javascript:app10QBoton_save();"><i class="fa fa-flash"></i> Guardar</button>
                </div>
              </div>

              <div class="row" id="grid13">
                <div class="col-md-12">
                  <div class="row" id="div08_Search">
                    <div class="col-md-4">
                      <div class="input-group" style="margin-bottom:20px;">
                        <span class="input-group-addon" title="Buscar" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i></span>
                        <input id="txt08_Buscar" type="text" class="form-control" oninput="javascript:app13Boton_Search();" placeholder="Ingrese codigo orden de compra"/>
                        <!-- <span class="input-group-btn">
                          <button type="button" class="btn btn-info btn-flat" onclick="javascript:app02Boton_Search();">IR</button>
                        </span> -->
                      </div>
                    </div>
                  </div>  

                  <div class="box box-primary">
                    <div class="box-header no-padding">
                      <div class="box-body table-responsive no-padding">
                        <table class="table table-hover" id="grd08Datos">
                          <thead>
                            <tr>
                              <th style="width:110px;">Operaciones</th>
                              <th style="width:100;">Cod.Ord</th>
                              <th style="width:100;">Cod.CotProv</th>
                              <th style="width:100;">Cod.RFQ</th>
                              <th style="width:100;">Cod.Prov</th>
                              <th style="width:100;">Cod. Item</th>
                              <th>Item</th>
                              <th style="width:80;">Stock</th>
                              <th style="width:80;">Unidad</th>
                              <th style="width:80;">Precio</th>
                              <th style="width:80;">Cantidad</th>
                              <th style="width:80;">Total</th>
                             <!--  <th style="width:110px;">Operaciones</th>
                              <th style="width:100;">Cod.</th>
                              <th style="width:100;">Cod.RFQ</th>
                              <th style="width:100;">Cod.Prov</th>
                              <th>Descipción</th>
                              <th >Fecha Cierre</th>
                              <th style="width:100;">Cod. Item</th>
                              <th>Item</th>
                              <th style="width:80;">Stock</th>
                              <th style="width:80;">Unidad</th>
                              <th style="width:80;">Precio</th>
                              <th>Item Descipción</th>
                              <th style="width:80;">Precio Ofer.</th>    -->                   
         
                            </tr>
                          </thead>
                          <tbody id="grd13DatosBody">
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <!-- fin -->
              

              <!-- <div class="box-body" id="edit12" style="display:none;">
                <strong><i class="fa fa-user margin-r-5"></i> Detalle de la Orden</strong>
                <div class="row">
                  <div class="col-md-6">
                    <div class="box-body">
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          
                          <input id="txt10Q_id" type="hidden" class="form-control" placeholder="..." readonly="readonly" />
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 97px;">Cod.</span>
                          <input id="txt12_Numero" type="text" class="form-control" placeholder="..." readonly="readonly"/>
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 68px;">Cod. RFQ</span>
                          <input id="txt12_rfq" type="text" class="form-control" placeholder="..." readonly="readonly"/>
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;">Proveedor Actual</span>
                          <input class="form-control" list="grupoOptionsProveedorAct" id="cbo12_proveedorAct" placeholder="Buscar proveedor..." readonly="readonly">
                              <datalist id="grupoOptionsProveedorAct">
                                <option value="11">
                                <option value="01">
                                <option value="21">
                                <option value="24">
                                <option value="32">
                              </datalist>
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 65px;">Cod. Item</span>
                          <input id="txt12_codigoItem" type="text" class="form-control" placeholder="..." readonly="readonly"/>
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 96px;">Item</span>
                          <input id="txt12_item" type="text" class="form-control" placeholder="..." readonly="readonly"/>
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 94px;">UOM</span>
                          <input id="txt12_unidad" type="text" class="form-control" placeholder="..." readonly="readonly"/>
                        </div>
                      </div>

                    </div>
                  </div>
                  
                  <div class="col-md-6" style="margin-top:5px;">
                    <div class="box-body">
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 63px;">Num. Parte</span>
                          <input id="txt12_parte" type="text" class="form-control" placeholder="..." />
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 62px;">Descripcion</span>
                          <input id="txt12_descripcion" type="text" class="form-control" placeholder="..." />
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;">Proveedor Anterior</span>
                          <input class="form-control" list="grupoOptionsProveedorAnt" id="cbo12_proveedorAnt" placeholder="Buscar proveedor...">
                              <datalist id="grupoOptionsProveedorAnt">
                                <option value="11">
                                <option value="01">
                                <option value="21">
                                <option value="24">
                                <option value="32">
                              </datalist>
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 35px;">Precio Ofertado</span>
                          <input id="txt12_precioOfer" type="text" class="form-control" placeholder="..." readonly="readonly" />
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 80px;">Cantidad</span>
                          <input id="txt12_cantidad" type="number" value="1" class="form-control" placeholder="..." oninput="javascript:app12Boton_Cantidad();"/>
                        </div>
                      </div>
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 106px;">Total</span>
                          <input id="txt12_total" type="number" value="1" class="form-control" placeholder="..." readonly="readonly" />
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
  
              </div> -->

            </div>

            <div class="tab-pane" id="datos14">
              <div class="box-body">
                <div class="pull-right">
                  <button id="btn14_New" type="button" class="btn btn-primary btn-xs" style="margin-top:5px;;" onclick="javascript:app14Boton_new();"><i class="fa fa-plus"></i> Nuevo</button>
                  <button id="btn14_Cancel" type="button" class="btn btn-default btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app14Boton_cancel();"><i class="fa fa-angle-double-left"></i> Cancelar</button>
                  <button id="btn14_Update" type="button" class="btn btn-warning btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app14Boton_update();"><i class="fa fa-flash"></i> Actualizar</button>
                  <button id="btn14_Save" type="button" class="btn btn-success btn-xs" style="margin-top:5px; display:none;" onclick="javascript:app14Boton_save();"><i class="fa fa-flash"></i> Guardar</button>
                </div>
              </div>

              <div class="row" id="grid14">
                <div class="col-md-12">
                  <div class="row" id="div14_Search">
                    <div class="col-md-4">
                      <div class="input-group" style="margin-bottom:20px;">
                        <span class="input-group-addon" title="Buscar" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i></span>
                        <input id="txt14_Buscar" type="text" class="form-control" oninput="javascript:app14Boton_Search();" placeholder="Ingrese numero de proveedor"/>
                        <!-- <span class="input-group-btn">
                          <button type="button" class="btn btn-info btn-flat" onclick="javascript:app02Boton_Search();">IR</button>
                        </span> -->
                      </div>
                    </div>
                  </div>  

                  <div class="box box-primary">
                    <div class="box-header no-padding">
                      <div class="box-body table-responsive no-padding">
                        <table class="table table-hover" id="grd14Datos">
                          <thead>
                            <tr>
                              <th style="width:110px;">Operaciones</th>
                              <th style="width:110px;">Numero</th>
                              <th style="width:110px;">Codigo</th>
                              <th>RUC</th>
                              <th>Nombre</th>
                              <th>Descripción</th>
                              
                              
         
                            </tr>
                          </thead>
                          <tbody id="grd14DatosBody">
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <!-- fin -->
              <div class="box-body" id="edit14" style="display:none;">
                <strong><i class="fa fa-user margin-r-5"></i> Detalles del Proveedor</strong>
                <div class="row">
                  <div class="col-md-6">
                    <div class="box-body">
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                        <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 39px;">Numero</span>
                          <input id="txt14_id" type="text" class="form-control" placeholder="..." readonly="readonly" />
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 48px;">Codigo</span>
                          <input id="txt14_codigo" type="text" class="form-control" placeholder="..."/>
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 36px;">Telofono</span>
                          <input id="txt14_telefono" type="text" class="form-control" placeholder="..."/>
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 57px;">Email</span>
                          <input id="txt14_email" type="text" class="form-control" placeholder="..."/>
                        </div>
                      </div>

                     

                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 66px;">RUC</span>
                          <input id="txt14_ruc" type="text" class="form-control" placeholder="..."/>
                        </div>
                      </div>
                      
                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 40px;">Nombre</span>
                          <input id="txt14_Nombre" type="text" class="form-control" placeholder="..."/>
                        </div>
                      </div>

                      <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold;padding-right: 34px;">Dirección</span>
                          <input id="txt14_Direccion" type="text" class="form-control" placeholder="..."/>
                        </div>
                      </div>

                      
                    </div>
                  </div>
                  <div class="col-md-12">
                  <strong><i class="fa fa-user"></i> Descripción del Proveedor</strong>
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                              <textarea class="form-control" id="area14_descripcion" rows="4" cols="500"></textarea>
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
        </div>
    </div>
    </form>
  </div>
</section>

<script src="pages/catalogos/logistica/logistica.js"></script>
<script>
  $(document).ready(function(){
    appBotonReset();
    
  });

  
</script>
