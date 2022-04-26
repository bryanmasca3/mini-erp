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
  
  <h1><i class="fa fa-tasks"></i> Operaciones</h1>
  <ol class="breadcrumb">
    <li><a href="javascript:appChangePage('lineaneg');"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Operaciones</li>
  </ol>
</section>
<section class="content">
  <div class="row" id="edit">
    <form class="form-horizontal" id="frmWorker" autocomplete="off">
      
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active" title="Almacenes"><a href="#datos01" data-toggle="tab"><i class="fa fa-truck"></i> Resumen</a></li>
            <li role="presentation" class="dropdown">
              <a href="#" id="myTabDropInventario" class="dropdown-toggle" data-toggle="dropdown" aria-controls="myTabDropInventario-contents"><i class="fa fa-dropbox"></i> Reportes <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="myTabDropInventario" id="myTabDropInventario-contents">
                <li class="" title="Tareas"><a href="#datos02" data-toggle="tab"><i class="fa fa-dropbox"></i> Infracciones</a></li>
                <li class="" title="Combustible"><a href="#" data-toggle="tab" ><i class="fa fa-dropbox"></i> Combustible</a></li>
                <li class="" title="Mantenimiento"><a href="#" data-toggle="tab" ><i class="fa fa-dropbox"></i> Mantenimiento</a></li>
                <li class="" title="Gastos"><a href="#" data-toggle="tab" ><i class="fa fa-dropbox"></i> Gastos</a></li>
                <li class="" title="Operativos totales"><a href="#" data-toggle="tab" ><i class="fa fa-dropbox"></i> Operativos totales</a></li>
                <li class="" title="Histórico de estados"><a href="#" data-toggle="tab" ><i class="fa fa-dropbox"></i> Histórico de estados</a></li>
              </ul>
            </li>
            <li role="presentation" class="dropdown">
              <a href="#" id="myTabDropInventario" class="dropdown-toggle" data-toggle="dropdown" aria-controls="myTabDropInventario-contents"><i class="fa fa-dropbox"></i> Operación <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="myTabDropInventario" id="myTabDropInventario-contents">
                <li class="" title="Tareas"><a href=".datos04" data-toggle="tab" onclick="javascript:app04GridAll();"><i class="fa fa-dropbox"></i> Tareas</a></li>
                <li class="" title="Combustible"><a href="#" data-toggle="tab" ><i class="fa fa-dropbox"></i> Combustible</a></li>
                <li class="" title="Mantenimiento"><a href="#" data-toggle="tab" ><i class="fa fa-dropbox"></i> Mantenimiento</a></li>
              </ul>
            </li>
            
            <li role="test2" class="dropdown">
              <a href="#" id="myTabDropInventario3" class="dropdown-toggle" data-toggle="dropdown" aria-controls="myTabDropInventario3-contents"><i class="fa fa-dropbox"></i> Flota <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="myTabDropInventario3" id="myTabDropInventario3-contents">
                <li class="" title="Vehiculos"><a href=".datos02" data-toggle="tab"  onclick="javascript:app01GridAll();"><i class="fa fa-dropbox"></i> Vehiculos</a></li>
                <li class="" title="Conductores"><a href=".datos03" data-toggle="tab"  onclick="javascript:app03GridAll();"><i class="fa fa-dropbox"></i> Conductores</a></li>
              </ul>
            </li>
            
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade in active" id="datos01" >
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Estado de la flota</h3>
                      </div>
                      <div class="panel-body">
                        <div class="row">
                          <div class="col-md-12">
                            <p><i class="fa fa-taxi"></i>  &nbsp; &nbsp;Asignados:  &nbsp;1  &nbsp; &nbsp; Sin asignar:  &nbsp;2</p>
                          </div>
                          <hr>
                          <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-12">
                               
                                <table class="table">
                                  <tr>
                                    <th>Vehiculos de la flota</th>
                                    <th></th>
                                    <th>Porcentaje de Flota</th>
                                  </tr>
                                  <tr>
                                    <th>Totales:</th>
                                    <td>30</td>
                                    <td width="40%">
                                      <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                          <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <th>Activo:</th>
                                    <td>20</td>
                                    <td width="40%">
                                      <div class="progress">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
                                          <span class="sr-only">10% Complete (success)</span>
                                        </div>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <th>Inactivo:</th>
                                    <td>0</td>
                                    <td width="40%">
                                      <div class="progress">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                          <span class="sr-only">20% Complete (success)</span>
                                        </div>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <th>En el taller:</th>
                                    <td>3</td>
                                    <td width="40%">
                                      <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                          <span class="sr-only">60% Complete (success)</span>
                                        </div>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <th>Baja:</th>
                                    <td>2</td>
                                    <td width="40%">
                                      <div class="progress">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                          <span class="sr-only">90% Complete (success)</span>
                                        </div>
                                      </div>
                                    </td>
                                  </tr>
                                </table>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Alertas</h3>
                      </div>
                      <div class="panel-body">
                        <div class="row">
                          <div class="col-md-12">
                            <p>1 &nbsp; &nbsp;Alertas Vencidas&nbsp; &nbsp; &nbsp; 0&nbsp; &nbsp;Por vencer en los proximos 0 días</p>
                          </div>
                          <br><br><br>
                          <div class="col-md-12">
                            <p><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;&nbsp; La tarea <a href="">Entregar reporte TCO para gerencia</a> esta próxima a vencer.</p> 
                            <p style="font-size:10px;"><span style="color:gray;">Fecha limite: 20/04/2022</span></p>
                          </div>
                          <br><br><br><br><br><br>
                          <div class="col-md-12">
                            <p><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;&nbsp; La tarea <a href="">Entregar reporte TCO para gerencia</a> esta próxima a vencer.</p> 
                            <p style="font-size:10px;"><span style="color:gray;">Fecha limite: 20/04/2022</span></p>
                          </div>
                          <br><br><br><br><br>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Tareas</h3>
                      </div>
                      <div class="panel-body">
                        <div class="row">
                          <div class="col-md-12">
                            <p>2 &nbsp; &nbsp;Vencidas&nbsp; &nbsp; &nbsp; 0&nbsp; &nbsp;Vencen en 12 días</p>
                          </div>
                        </div>
                        <br><br>
                        <div class="row">
                          <div class="col-md-12">
                            <p><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;&nbsp; Renovación de licencia para el conductor <a href="">Juan Conductor</a></p> 
                            <p style="font-size:10px;"><span style="color:gray;">Fecha limite: 20/04/2022</span></p>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-md-12">
                            <p><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;&nbsp; Renovación de licencia para el conductor <a href="">Juan Conductor</a></p> 
                            <p style="font-size:10px;"><span style="color:gray;">Fecha limite: 20/04/2022</span></p>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-md-12">
                            <p><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;&nbsp; Renovación de licencia para el conductor <a href="">Juan Conductor</a></p> 
                            <p style="font-size:10px;"><span style="color:gray;">Fecha limite: 20/04/2022</span></p>
                          </div>
                        </div>
                        <br><br>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Costos de combustible</h3>
                      </div>
                      <div class="panel-body">
                        <div class="row">
                          <div class="col-md-12">
                              <div id="dashboardChart01"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Costos operativos totales</h3>
                      </div>
                      <div class="panel-body">
                        <div class="row">
                          <div class="col-md-12">
                              <div id="dashboardChart02"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Costos de mantenimientos</h3>
                      </div>
                      <div class="panel-body">
                        <div class="row">
                          <div class="col-md-12">
                              <div id="dashboardChart03"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Conductores</h3>
                      </div>
                      <div class="panel-body">
                        <div class="row">
                          <div class="col-md-6">
                            <p>3</p>
                            <a href="#datos02">
                              <div class="progress">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                  <span class="sr-only">40% Complete (success)</span>
                                </div>
                              </div>
                            </a>
                            <p style="font-size:10px;">asignados</p>
                          </div>
                          <div class="col-md-6">
                            <p>1</p>
                            <a href="#datos02">
                              <div class="progress">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                  <span class="sr-only">40% Complete (success)</span>
                                </div>
                              </div>
                            </a>
                            
                            <p style="font-size:10px;">sin asignar</p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <p>4</p>
                            <div class="progress">
                              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                <span class="sr-only">40% Complete (success)</span>
                              </div>
                            </div>
                            <p style="font-size:10px;">activos</p>
                          </div>
                          <div class="col-md-6">
                            <p>0</p>
                            <div class="progress">
                              <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                <span class="sr-only">40% Complete (success)</span>
                              </div>
                            </div>
                            <p style="font-size:10px;">inactivos</p>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-md-12">
                            <p><b>Destacados</b></p>
                            <p><b>0</b>&nbsp;&nbsp; con licencia vencida</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Mantenimientos</h3>
                      </div>
                      <div class="panel-body">
                        <div class="row">
                          <div class="col-md-6" >
                            <div class="panel panel-default">
                              <div class="panel-body">
                                <center>
                                  <h3>4</h3>
                                  <p style="font-size:10px;">Programados para los proximos 10 días</p>
                                </center>
                              </div>
                            </div>
                              
                          </div>

                          <div class="col-md-6" >
                            <div class="panel panel-default">
                              <div class="panel-body">
                                <center>
                                  <h3>3</h3>
                                  <p style="font-size:10px;">En proceso</p>
                                </center>
                              </div>
                            </div>
                              
                          </div>

                          <div class="col-md-6" >
                            <div class="panel panel-default">
                              <div class="panel-body">
                                <center>
                                  <h3>1</h3>
                                  <p style="font-size:10px;">Realizados en los últimos 10 días</p>
                                </center>
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
					  <!--fin-->
            <div class="tab-pane fade datos02" id="">
              <div class="box-body">
                <div class="pull-right">
                  <button id="btn01_New" type="button" class="btn btn-primary btn-xs" style="margin-top:5px;;" onclick="javascript:app01Boton_new();"><i class="fa fa-plus"></i> Nuevo</button>
                  <button id="btn01_Cancel" type="button" class="btn btn-default btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app01Boton_cancel();"><i class="fa fa-angle-double-left"></i> Regresar</button>
                  <button id="btn01_Update" type="button" class="btn btn-warning btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app01Boton_update();"><i class="fa fa-flash"></i> Actualizar</button>
                  <button id="btn01_Save" type="button" class="btn btn-success btn-xs" style="margin-top:5px; display:none;" onclick="javascript:app01Boton_save();"><i class="fa fa-flash"></i> Guardar</button>
                  
                </div>
              </div>
              <br>
              <div class="container">
                <div class="row" id="grid01">
                  <div class="col-md-12">

                    <div class=" box-primary">
                      <div class="box-header no-padding">
                        <div class="box-body table-responsive no-padding">
                          <table class="datatable table table-striped table-bordered" id="grd03Datos">
                            <thead>
                              <tr>
                              <th>Ope.</th>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Placa</th>
                                <th>Serie</th>
                                <th>Estado</th>
                                <th>Tipo</th>
                                <th>Grupo</th>
                                <th>Conductor</th>
                                <th>Odometro</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Año</th>
                                <th>Propiedad</th>
                                <th>Arren. Ini</th>
                                <th>Arren. Fin</th>
                                <th>Arren. Total</th>

                              </tr>
                            </thead>
                          </table>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="box-body" id="edit01" style="display:none;">
        
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
              <div class="container">
                <div class=row style="display:none" id ="detalle01">
                  <div class="col-md-12">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img   width="150px" class="media-object img-circle" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPgAAADLCAMAAAB04a46AAABs1BMVEX19fX9zA44GBv2qQOz8f78zQ7Z9//19fT19ff////+yw77ejg3GBuXl5f29fP09fgjAAA4GBklAAD/2WLyqQD3pwMgAAAqAAD+xxAcAADX+f+18P6y8vw6Fxr2tgnwpQDw0YIxDRH0rgAsAAYyDBb/0iP2twowEhPk/f9GQEP8zCb8wg7spwD79u/A9P/S+f/89txUTE01DQ2CXB93Uh5uSRr//cX//++YjIzy2pr0zjX899DyyyH89emgeCFMKQwvAABePxTwz0b/8ar//MVNOzt0Z2dhUVM1HSBUQUKIfX4+KCr77MX14KjCubv66az45JT13oL022302Fj33Xf87rv544vzwiXdsizOpC68kyethSSSbB9sSA5VMAlDHgcoABFIR0xWWmBnb3RxgoelqK23w8mdw8eVrreGm6LA0tXV5+26xci32eA3DQAuHSRDJAhjaXTGpFzxzW+Oj2Q5NjTj6LSJaiqnklj9zkjJpVflpHX94c6+hROMWBjbtVH3jCXqfULoiFbxo3z96NPvupT1mR/yfCf5z7TfkUz3kSX/dkDf29Pkfyrd3N7PyLqnn5hKzkD6AAAaSklEQVR4nO1diX/TVp73ESFZKLJlnNhOIgfZjgV27BgzJcYHR0J8hiTkBgoN10DaCUyH7e52Z3bSg9IuzQT+5P393nuSLwXICZ2PvkASKbLe+/7ud0g4HDZs2LBhw4YNGzZs2LBhw4YNGzZs2LBhw4YNGzZs2LBhw4YNGzZs2LBhw4YNGzZs2Pi3AQ9/ZcEL3xwC/PM6eF7wCl6vVyCHgiDLDgHAyzIvfOK+Him8sozkeAfQTafLgEnyt1yGo7QMF3iBs4yCcfxbEQdOXl6QJ7PZ2fmFW4tLU1MFiqmlxeXVhZXZYjYNQvH+W5EGgJ7L2ZX5W4tTJSdAFEWO4+gPCKczWZhaXlgpToLFe3n+U3f3cOAF9F8wYYcgl1cWFqeSHIccDbaUcQuimCycWZ0H8hgSBP4Pyx9cVvDKaTmdnV+eKnEmzQ62HeBEJ5csLE4Xy2gjf1jNC6g3YL1YKAFZoM0Z/Az0EoeL4EtpaaGYhmD3B3V4wSGUV24VKD/O2UPTQuMoDBH5c4XF+az8qRnsE2Ch4J9eR7q4sFQiXk2U3XJoUXT2ODhzAo7IiISB5NRCNk2y/R/F4r1QiXj5SVS2BbmPBkihsDwLIcLxR9E81CqO8spyyWml1H1RF7nS8krZ6/2DMBeE8vxiycjUHfgIP28pnNp9aXGl/JkHOXBFUmeX588kRRKpWObq8G4rtMJ9F3Xyb225KGO1+9m6OqnDZXllsURCeDdHagIkYXHc2FgSQGpW/GGMY79z9lqJE0L8atb7GVezXhhipGeXS2J7yjY7j2THkmtr67fv3L3y5cWL9+7dv38Vcf/6vXsXv7xy5876WnJsjGuzFHYHzhkSp6bLMgxiPjVFa0CtlV0oIMe2jovIJJlcW78DbK/f/+p5bGMjFo9vxONxSXJJiHhc1+CMP/b86r0v76wnGfkWdTxKLhZlr/w5WjvU5eX5KY6WH6alA4fk+t2L92PAF9jpei4Xj127di3oDyqK4vP5/H5/MHjtWk5XVcWlavGN2NWLQJ4juZ4FBVrPFRbA3oXPzdO9ENiKy6WumMU5x9av3I9tgEpjwSBQ1GrfPXj46PHmkydP+mNq7c9Pnz599uzZ5uNHD8+/8PuC13JAX43Hcl/cXQO9d+WF0mIxTcYvnxNkPk3V3cF8bP3i83g8FvTVqo/6n/zl66+/OZXJZEZGJs6dO/cXn6pvjRiA01tPNx89AIPXVEnSN55fvF0i5WvrjhDkFsqfW04XssvQzy7ea1eex7Xgi0fPvj516ty5IcBEZqSvbzgzdGpo6M8+xfe0b3gYTgCAex/S33r6+IEvmAPu8Y37d9baowXePrlcROP6TACDEXlliiYsI/8SdV/f0P3nN7cymQkkferUqYkMMsTDU0NfhxX/0xFKG/gP9+EflEpma/NhOAgej9ST7UEOS8GplfTnUbsLggyV2kKhbfRFDX7szlea9mITVDw8gaSRbAap9dHDr8Mu/zODeBuGCffHTV9OUaTYF7fH2gt+uDGYO5QzDoH/xDYv85DEFnFupd3IRXHsbizue7gFDs14w98JIDXSlyHKH/omrAQ3+6yI96Gsvnky49cVKX7ty7WOUgisajnr4OVPndlkKFuKS5jBWt1DFSWv+BXfY1Q3ejQhPjSBlPoyE/T4m7Aa3MwQ8+4GRD+44NyTpk+RXLGrt8fMW4eIp5+ZFbyOTztL4RW86ZUprDDaAjpIIXklGA8DrT7i0ZQ4dfDhCaLwUxNbYTX22JL4MDGKIYiH/T4Mc9euJFteRO4/NZ/28p8syPE8ziWmpws9Aw9u7K5f9T0jHp1h/g0OTlhhRMc/ma0XSuyRBfEROENEAzj3TXUQEnvs4hontqIcZLjSPCb0TzUdKUAZVV4oddPGuBZTBp8R90UHH6KBDfQNcQuNGA4nhjMvFO3bjIWhg8IZb9R6vw/yevz6Wmf5LpYgo38q4hBaHZMLpd5JU+72cx303cdSNsHExLDhvMTsIcZ9p+YeWhAfHjF5o5lktr4LQoy7us61aCOSq1nhExUzAi9kV7t549H6XzUfpDFIzX0Z5tFQuRAjZoEO1D+MxB9YEe+bOGWY+tDQ8MjI1kOfqupfrbcN+MgKxK3sp0jo6OD8ZK+dQzpf+0LzQ9SCeN6XmThlBLbhYXY8RON7X+Z8Lnc+M9yZz4iwWrRpXMg88iuKDjrvlDGkNZz2ONmxqoDtgX9bzIyPfRnzf5sxHZxZLNLuo4ZOCjhCXH2x1a3tNiMZovEQRDPUP6hI2tX1rrZKy1n5pMsYAcqWtKV/Q2DbeIDBGgybBLZTtHIxIjqJ71iZA3GlttVTwIyYwsIISKSRmTjXH1aU+P31LjmDzk/azwXZW562mj3m1r/SvtvqI8QzBgeDANEiHo4wjft7iA8z4bSJaxh8HpmrGNs740npVtZ7sn4uyPxKoZs2Vm/Je/HBpxm0azOgD5HKhRBoGToS11QYnnXxpheRMQ0a+jBWfkB84lzDr7ri95IYROjkHJml4FbLXlxOP7EqTvAWp6ymipNXNgY3M30dDg6BrT2zsUKmL/NAU2F41qtwRpyNaEiJC2I4BxFO2vgy2SltDvI5JvOTs/fsYu9EMSjjdi74rcHbyMWsOjNKV2bASFzyP6OjFBLyKW8zpFOH6DNMYCLzMKhK/rtJOjHL5mZEsbSahVLGe0KxXSjfspgGdnKF6+DgOLQebjN0w1NZjZ4xOALxmGEdjHifKS0gisTNIQ7cZes7kNTfls4glr5n40FcXlxewTW2E2ANQ/D5ktXKAHc35sNKlZSmJH4DUeLeLMKTzMysO/Mw5wLiZq3elcJpAjQCJLH7rZrr+cszBgpJ0RgTlqZWV7Kyg4fIAwI4Nn+XvTzOt3C9EX3tq42HJJNRx2Q12kibp0LpwuYehpF4cHOkRbyP1jftdjLSxwIFVjwjmWfhq8sm8TOgdDaTC8ZXWlqdLZOlVcexKV/wZhfJ5HkPrmy8IJmMOiZN2cM4JCeDUTL7lMGRCuE58q0GA/JWcIPidKLbwUcyTFzDWACPjDy+vtgifqbQNhBGk1+azqZBK8fm7axS7bX1tau+x5m22HzKmGsabkV0IgfK83Gsg3iboRsZb5iZAE5RDpOx/X+0E19iw3SRrDjgZAiYfFk4FlvnYVwgFAudiyWscedt/3cZnCkls8cEExk2d2weZ0ZI1Q5fMpt+nIIZNpDJDJ1D0uw6AJZs58zDkcxEZuI/24mfWWODdNYZrKdKiyuTZJ7gyCflZHly2apig1H4fw0+fvZsc3Pz8eMG4NGjSuUhw4UL1QuA+vkHD86baEqq1DzfhpkZ8q1eN89cIJ+6YBzUZ/67nfj30VCP1YlcCfeQyGSf5JHy9vLzJYvABoZ+77mi42pJMHbtWoxA03IaIpfDf7mcnsvRE+SkAsCTunGG/WRck6Of03TyWfhZ131/a+M9FQmErLYPicmllbTXe7RBjnd4s0tWtEVu3RePa3FVVV2S5IJhJIUWt4Rmcb5Fn4kijmttLbnACf//tOk7Mh6xKKLIaH307/9I88JRmrrApxes4jmuiP7vP//0xf2rf/0KcfX+/fvXv/jiT4iLe+JP/8QvPfiiG9cN3N82WH+fGHcHUhY9wSV28YfTP/7ySoAq/sgmJGW5OGVBG5mHooFEMplco0gmS6VScuz9SET3uoJsFkiSby3ADaPj0ej4+HhgPOB2u6O9lk53jyR+PX369E+/pcHcj0rrAih8jw09KfdAgm136Nim2g2ql1BIdIoRd4rtBCMXk81CoqG3jg1h9JYiCNfNMOCOpvbYJCm+Po348edX8pENWgXrQRl2LUVMz6TH2HdsYqQ/AOlUJBqBVJSA6IRT8uREStzrzhy9LVKKBAYI3O5AJOXszqkG8TenKUDpR8TbkV5N7rWDK0F9bq/dmmavUtFAAPQ2mgAjGQfioQQ5MWBluPQTTPP4PRRBnQcC0UiKbLWw/sAPjDh4evloYruQJWvglg0mBjC7GAa6J/nQ+Ci1VSQeAGtNBAaI6Y7vRbwd0EAi4I6kQpa7hAziA78azE//XOYPv8oGgeLmaIpU6RaNgsZDTNmMuXW3QglANAAK5ghxMRFJoB4TH7fZFaSFMnsvUj/8bjL/CRz98MTLP5/+9XVCtAwqiQFwUzN+7bmnkYpNDOFlhDgVVSr1sZsgCXE2/bRXG9GWypH5IXkLPP+PH0//DtR7K0UniergquCugWg0GkmkUqG2rU+ty0SxdZyKpoxd7BxdePwQwK+BOBXS3leLTnc783/wh9s3I8jpX8idrJmHouiqAUw0BMA/geTZTmyr/oWQ+AeI9hxDLEl9SDxcaLRD5/yh6nbe8eoncqPff41YdTEVjRCAwkncdg+ACUQToT3DEBBPvJ94T6AAjWP2+ABxbLFd5z+XD5XPeeE3405uy6rVdG9MzCmMWBCwkXrIIkWTggSIf5CBIQFju3/CulTtkA5+LvGmxfyXQ+VzPv13dp9fo5YNik5mmyy2i6lEFNTuDiQs1HqMxNlHUq9Npf/42yECHC+Xf2T3eWMZ3XqkgE+XhJB7IBKyzOtiJPKeEGXJxslFBixGo5bXipE3BvX/y/IHf35RNi19dB895UIR0DpEsSMjjvXCR30K2o6+fvPm9evRaOrW5MG3AMs/M97/+ihTM9lBvB8gAakn83KJ6H627tO7RQcC4scRJxmFbBYXnaWVg2+aKf/EiL/+yIZZ6/DHYN79y4MRj+41nLG42hwqLZflA2Rz8ojvK+bikMx6W6bVB6lWRfNUqwMROors/lCqjcP7RjZtHwl1EifqFNuGBns9B1MoHtDSedPFf0hZEiePCbZKqvaxE3F0YN5TjhwFcZbtaeG31wgKfr9woMEKLxjJ7PfTr62CqvF4WQnBmTvNTU7OSMAd7a5lgHio/aKPIg6lehtxOn/h5MaS0CzXvpW2C+JS+UAKF2TDxd9YBmhcsV1anb50o1gsXppfWCyUup4xECEaR7rSIKgvtG+Nd47jOGz3FrQLuDR9a4lJ3YJ4YeVA+UzGAQr49w8DVvUi58SnQSfLc0/yjUajf25nMju9WKKPDBpXIPOuSgaIv7f6tBJvyu1OGb8ka2bTxZ25fKVar1cr+bmd4vRSkjwS073kwSUX0gexdUH47V9vXgdSod7e0OYnd/N1n88fjMVift9grTI3eWO51BH9U4Ge4YUY+WDZvRdxYuKl5Rs7+RmfL0jnpoM+30x+5xI+DtT7QW75INFNdsiXUyGLB2OJcAvTkztVX1CXXABJUvDhksHmk8kbS2YVi1Eg4XZ3zYTvn7iT1C8klnLc0qWdii8IrbKneuAnPeiv7NxYslrrOXMQJ+cFXDjixJ4qBOdjloqOSjiuqhIh7nIpwFxC6nOTqyUjrUFAgoFroMvLD0wcHzxdyDZ8MUlRUdhU5C4X9EILN7ILpZ5Sg5vKHkTj3uyS08rpoA+3snMb11RJQcFTSLQX0IPJji2+oPJEp+ASdBapYxp2LxDrCUUDkM1wR0DhxttaEM3LaNWQuksKxt9eKtCioq3HU8UDRDdZyFouJHBccnUyH9YVVzck7IOvXr5RaDWOKk91pLQEHdm3T6S25t6tJuTRXZxoe1M33oW1LtImdzX8Dhc+uokfQOOCt1iwIu503ppsDCq9vCl3JdbcudTaNcJBfMMypjXZnoq8X8udVkAm3GBQCsqfupEfBIqW7WLT4fyNqa5AfCDifHqla9sqY7M4mfe1bLybuKrmZtLTrU/i3HA0FWohEQ29FyL8ga8iPUpBFRQgWbxw6Z1vL9JUHL53lwqd03j793Go7rNnX6awA6wop0UimNxUcS6MrBWMqWBidFVTVRUK+EWsCmHRNDlI5lC7Bky43YG9EO1BwA1jHZIXktNvw5SfSn2KQVIMY1eU8BxK/BDEMSKUz46O4gRaNBJJJKgEkDZXmt7ZUM2mNK1ZrVQalcqMpKmUtwvcrR/cTTS26ZDR+YD7vRjYA2TdiFTji6/8LtU0K5cp8Jbtgwj0V4sdu/v3nc6g3slug6yhZdJjNn+MAlicrMaonaO2Zxr5RqW/P1/J5yuSrtKeqergznTS2KwB9oLrZgQJCuMgYoUOjZMFFFRioViNmxxVVdNR4JVKtannFCYQiC/xantcEp2L6X1GdZnns7eRNFMV+wbuNr4yF6aKBaFLlXy15q/l+xs+FEFdIxKB3wYrk0s0SncU5HTauasqEEWxN5yLrbBPsTA36DIDqq7XqcAb8K3ul0xLkMJz7Wv53K39V25Cdt0daDdGchAY2J406anNRt4Pzt2EDvgVl/9Cf1VTWBUX3p0mFoIgEcvMTt0h3DquO9u/wvfvizM5Im8wc0WHhut6cKa/v+qX6vlGU0Pm5AltvVn8nokTx1AL8v6mIvDdVNl1K7ccnX87aAQT0HR/NUiJx1RVb/Qjc1pRxRrFdeYkox1xC62dWHyKoTOi97wRiUls9W0YqkQJijSXqs/kKz7dpdexPUnXK/kZ3cgyku/tqjktwCXnBX5fz3LwXhk1bhGD1rONmII2BXENxmSEKiUu4VG+qRluWH7ZKbgBiwDXE+ajXYGdhAL8dwM8nJmzC9vD+EaIq4oGJt+UDOK5C0UaR1CoiZez6X1tCALijuxtK+IvJ2sq1bdez/uqyNxPiCPv/Ew1r1NHlHxz8+NWXPcWhFVIZxeNbmeDhoNLeh4srVGjGtcVvYICr0nE0UEfvlfbLcGO3s7y+9oaIsiO8rYR16h/Ex8fXdjxUwdXdHAzjTCvQT+ChLeGJ2loDzaK40bXTY6drD4WA4HRs+/8xIWgWtArjRphniPEkXd+plHRWD6X/O8WRs0PDmyX9/2gGn9znInNbUT3ATfEdB9LZTN5XZIIcxJdsXld0qsNjVqEVrUOEvtHAJutxBUm8Bq4UxOZE4370cFm4ERNUYjKVa2yMm5+dPzy/icihPLl7fXxUaqbgJuuCI4X0cVR9FqlEgQ/CyJzAnRv1QU9UEkP1ebk9tEQx50TxbrG5E1EqxLmF4A45a1qjSqzNFVpgqnRHReg8AMMS2Xem87O3jz78vY40B8Fu0GNFysaNSloqomoVRjvmVoNHE3Pz7CybqP8cvRDjD4W61nwYKJQbBeIE51jq8TQVPD3hq7S8KZugKmxRDx+8yAzMLgl2Ot1pMvZ2ZXLL0H746MQK6o5GmOIjXUgT9CPqQWjjA9qXjcJEftUfKDnGHKJD4jjtAtI9gVWqrFa3jC0IO5/rOUpcUlRB7M0ug24R89OHoC3CXyVJp/GN07O3pxNU+IY27qJM9SJSSiSb+esqfH3kbcIdN0nBrZ3wipNFlINpzYJaHPGEXMx8DHf2203CciQCw61xZM88SOTt6rKDk8lpxDBQhavELAOGP0BjVNf8KWZqXfQOIjbD7hN4i61toe8+5tGHQ3ER9FMxl9mvYd+VInnyaZoBxCPUcFqjQtBYnKGydf9uAXXn2+yEYyevry9vY4Yb8NoYBSAP3SApbjRXuD149uvwqwcV2t5hm7iNZURH3wFiRg+cxPfK3H47Z0Cbtd3yJ58kN4foyuWxq0OVKFog3Cr0y7mZuR0eTJbzrZhFrGycpPgMsPZblw2cZNhZVb2swEY+HgT0qikGwJv1AgguboMUy+f3X55ebbMO47w9b68Z25QpT3A1EkTKgwWKhXi3ZjkNJpWtIqHJ+8XJvCSrzjok1tIp+lXC5BftF0qN40pAB2iOtQxpqFBPtchuYIa6FyAouoC3uCIX6rAe3aDlLekNSpBwrsGJWslTJlDdcHSiv+dx7p2IHJog3GOgrw2qwtwvadKxwAKUvRT3nloskoqGRXzOCUOwafq8TqO/I05vMNTZ10AK58hvDXUuKYR5pUKq9Vdvl3PHrdgYKrEN9gKcvuBcYK8jppcyPOefIxp3CVBZYy5LF+D2qnepDqfAfNjUSDW8BzHq6EEzzs/zdMg+3c4TIJRIhKX4nSwwCYptLqn18HICx6oXq2FwRs/G1eQF3UDwMNY5QZVcqNJeGO5XNeI8P1Y1bB55/Cc5xgeSsK3Z4MtS8yNQdiSixIH48bhoUaqRhgjvTtSuQtCjRUwENfI+LemEuIuEl7zDc1YWXHpx/KyGB7crRE0ikOtkp+BnEaJa3oFHZzqRZX2OfXxAQjQKhuVwt88OhglrpMAm6+5DKClHwMgRXgcOrMqsPZ6vlGXkHiwWck3WCrFuf0nHsdRvsYCguqganCD0AbEpTgSVxUNj0zervDuHkH1kB0QoA/vBhlxSC5KtYG1BBQUlRkyv+xiHu44UuLQaiVmcJNgTJ6vNGNAfEYHgVdAE8Y0ZKxyLApnfajGVBJgcbpX15v1arU+o9P8TZYYJP9eIf0Qje76Xa1lMw34kokYELg52wXpXfUfj8IpPDK2RdMmLhTjaMlYLsbZOBUC6zG02h9WWutWqiYRgTeluOkCWLXlPYfYzvjhPuzW0KytVs9wcj+cP3qpww3R0NqbJEsp7W1Laqx6fIZOXs2JzFvLpZIBQtwVfuexSNWHb9QhN/UeQbNmDQeQj5M4wrNT99O9CK0O0C9a7DjsHAFuXouzdN2zVosBRpOO08EZPJ48rtFLLd9WEdpgfdeiZDsaIPMgHQL1ehm0XYOQeuzvSBE8nt1qOKaqxjgZfgDatTnPMTbOe+SqX1V6SJPgEqwfu52TPhDqFS0cxDSmwpgl6AvX546zbfzvGcDQBjUr3hpE1JPgTQFNzTWqTd3v12r1yrtdj+f431AChjbIht6mshVtsHrklcMHugGQHbu7MvnphJrcrcR8cTbfgXHFF6ugh53o/yrEY6JBzvwhn/P6WAjo6Z7dJ5Wmb9APGPQ3K0+oqZ3sGzxl3mE5wj4ukLKMR+va3ZkDgLExBxNO9s3UJ/+yf4FEVoG6GZLmjdM2bNiwYcOGDRs2bNiwYcOGDRs2bNiwYcOGDRs2bNiwYcOGDRs2bNiwYcOGDRs2bNiw8Tni/wGZZqtsZe+7/AAAAABJRU5ErkJggg==" alt="...">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><span id="vehi_titulo">Demo 001</span></h4>
                            <hr>
                            <div class="row">
                              <div class="col-md-2">
                                  <p style="color:gray; font-size:13px;"><i class="fa fa-film"></i> <span id="vehi_placa">Demo 001</span></p>
                              </div>
                              <div class="col-md-2">
                                  <p style="color:gray; font-size:13px;"><i class="fa fa-tachometer" style="color:gray;" ></i><span id="vehi_odometro">77940 km</span></p>
                              </div>
                              <div class="col-md-2">
                                  <p style="color:gray; font-size:13px;"><i class="fa fa-toggle-on" style="color:gray;"></i><span id="vehi_estado">Activo</span></p>
                              </div>
                              <div class="col-md-2">
                                  <p style="color:gray; font-size:13px;"><i class="fa fa-taxi" style="color:gray;"></i><span id="vehi_tipo">Transporte de carga</span></p>
                              </div>
                              <div class="col-md-2">
                                  <p style="color:gray; font-size:13px;"><i class="fa fa-share-alt" style="color:gray;"></i><span id="vehi_ciudad"></span></p>
                              </div>
                              <div class="col-md-2">
                                  <p  style="color:gray; font-size:13px;"><i class="fa fa-user-circle-o" style="color:gray;"></i> Juan Conductor</p>
                              </div>
                            </div>
                          </div>
                        </div>
                        </h3>
                      </div>
                      <div class="panel-body">
                        <ul class="nav nav-pills">
                          <li role="presentation" class="active"><a data-toggle="tab" href="#resumen">Resumen</a></li>
                          <li role="presentation"><a  data-toggle="tab" href="#detalle" >Detalle del vehiculo</a></li>
                          <li role="presentation"><a data-toggle="tab" href="#documentos" >Documentos</a></li>
                          <li role="presentation" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                              Operación <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                              <li role="presentation"><a  data-toggle="tab" href="#tarea" >Tarea</a></li>
                              <li role="presentation"><a  data-toggle="tab" href="#combustible" >Combustible</a></li>
                              <li role="presentation"><a  data-toggle="tab" href="#mantenimiento" >Mantenimiento</a></li>
                            </ul>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 tab-content">
                    <div  id="resumen" class="tab-pane fade in active">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <div class="row">
                                <div class="col-md-11">
                                  <h3 class="panel-title">Histórico de odómetro</h3>
                                </div>
                                <div class="col-md-1" style="padding:0px 10px">
                                  <!-- Button trigger modal -->
                                  <button type="button" class="btn btn-primary btn-circle " data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i>
                                </div>
                              </div>
                              
                            </div>
                            <div class="panel-body">
                              <table class="datatable table table-striped table-bordered" id="odometroTable">
                                
                              </table>
                            </div>
                          </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Agregar Odometro</h4>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-5 col-md-offset-1">
                                    <div class="form-group">
                                      <div class="input-group">
                                        <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Fecha</span>
                                        <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-4 col-md-offset-1">
                                    <div class="form-group">
                                      <div class="input-group">
                                        <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Hora</span>
                                        <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-10 col-md-offset-1">
                                    <div class="form-group">
                                      <div class="input-group">
                                        <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Odometro</span>
                                        <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-primary">Guardar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <div class="row">
                                <div class="col-md-11">
                                  <h3 class="panel-title">Asignaciones</h3>
                                </div>
                                <div class="col-md-1" style="padding:0px 10px">
                                  <!-- Button trigger modal -->
                                  <button type="button" class="btn btn-primary btn-circle " data-toggle="modal" data-target="#asignacionesNew"><i class="fa fa-plus"></i>
                                </div>
                              </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="asignacionesNew" tabindex="-1" role="dialog" aria-labelledby="asignacionesLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="asignacionesLabel" style="color:black">Agregar asignación</h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col-md-5 col-md-offset-1">
                                        <div class="form-group">
                                          <div class="input-group">
                                            <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Fecha Ini.</span>
                                            <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-4 col-md-offset-1">
                                        <div class="form-group">
                                          <div class="input-group">
                                            <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Fecha Fin</span>
                                            <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-5 col-md-offset-1">
                                        <div class="form-group">
                                          <div class="input-group">
                                            <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Hora Ini.</span>
                                            <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-4 col-md-offset-1">
                                        <div class="form-group">
                                          <div class="input-group">
                                            <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Hora Fin</span>
                                            <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-5 col-md-offset-1">
                                        <div class="form-group">
                                          <div class="input-group">
                                            <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Conductor.</span>
                                            <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-4 col-md-offset-1">
                                        <div class="form-group">
                                          <div class="input-group">
                                            <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Odómetro Ini.</span>
                                            <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-10 col-md-offset-1">
                                        <div class="form-group">
                                          <div class="input-group">
                                            <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Comentarios</span>
                                            <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-primary">Guardar</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="panel-body">
                              <div class="row">
                                <div class="col-md-12">
                                  <p>Actuales/futuras</p>
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                
                                <div class="col-md-12">
                                  <p><i class="fa fa-tachometer" style="color:gray;" ></i>&nbsp;&nbsp;<b>Juan Conductor</b></p>
                                  <p style="font-size:11px; color:gray"><b>Inicio:</b> 20/02/22 - 11:22:38 hrs</p>
                                  <p style="font-size:11px; color:gray"> Sin odormetro inicial</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                
                                <div class="col-md-12">
                                  <p><i class="fa fa-tachometer" style="color:gray;" ></i>&nbsp;&nbsp;<b>Carlos Conductor</b></p>
                                  <p style="font-size:11px; color:gray"><b>Inicio:</b> 20/02/22 - 11:22:38 hrs</p>
                                  <p style="font-size:11px; color:gray"> Sin odormetro inicial</p>
                                </div>
                              </div>
                              <hr>
                    
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <div class="row">
                                <div class="col-md-11">
                                  <h3 class="panel-title">Cambios de estados</h3>
                                </div>
                                <div class="col-md-1">
                                  <button type="button" class="btn btn-primary btn-circle " data-toggle="modal" data-target="#estadosNew"><i class="fa fa-plus"></i>
                                </div>
                              </div>
                              
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="estadosNew" tabindex="-1" role="dialog" aria-labelledby="estadosLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="estadosLabel" style="color:black">Cambiar estado del vehiculo</h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row">
                                      
                                      <div class="col-md-10 col-md-offset-1">
                                        <div class="form-group">
                                          <div class="input-group">
                                            <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Estado Vehiculo</span>
                                            <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-10 col-md-offset-1">
                                        <div class="form-group">
                                          <div class="input-group">
                                            <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Motivo</span>
                                            <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-primary">Guardar</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="panel-body">
                              <div class="row">
                                <div class="col-md-10">
                                  <p><i class="fa fa-bullseye" style="color:gray;" ></i>&nbsp;&nbsp;<b>Felipe Fernandez</b>cambio de estado a</p>
                                  <p style="font-size:11px; color:gray">hace 15 dias - 28/02/22 03:29hrs</p>
                                  <p style="font-size:11px; color:gray"><b>Motivo: </b>SE ESTA HACIENDO UN TRABAJO</p>
                                </div>
                                <div class="col-md-2">
                                  <p><i class="fa fa-bullseye" style="color:gray;" ></i>&nbsp;&nbsp;Activo</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-md-10">
                                  <p><i class="fa fa-bullseye" style="color:gray;" ></i>&nbsp;&nbsp;<b>Pedro Torres</b>cambio de estado a</p>
                                  <p style="font-size:11px; color:gray">hace 25 dias - 28/02/22 03:29hrs</p>
                                  <p style="font-size:11px; color:gray"><b>Motivo: </b>SE ESTA HACIENDO OTRO TRABAJO</p>
                                </div>
                                <div class="col-md-2">
                                  <p><i class="fa fa-bullseye" style="color:gray;" ></i>&nbsp;&nbsp;Activo</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-md-10">
                                  <p><i class="fa fa-bullseye" style="color:gray;" ></i>&nbsp;&nbsp;<b>Pedro Torres</b>cambio de estado a</p>
                                  <p style="font-size:11px; color:gray">hace 25 dias - 28/02/22 03:29hrs</p>
                                  <p style="font-size:11px; color:gray"><b>Motivo: </b>SE ESTA HACIENDO OTRO TRABAJO</p>
                                </div>
                                <div class="col-md-2">
                                  <p><i class="fa fa-bullseye" style="color:gray;" ></i>&nbsp;&nbsp;Activo</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Costos operativos totales</h3>
                            </div>
                            <div class="panel-body">
                              <div id ="dashboardChart04">

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Comentarios</h3>
                            </div>
                            <div class="panel-body">
                              Panel content
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Historico de cambios</h3>
                            </div>
                            <div class="panel-body">
                              Panel content
                            </div>
                          </div>
                        </div>
                      </div>
                      

                
                    </div>

                    <div id="detalle" class="row tab-pane fade"> 
                      <div class="col-md-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                          <div class="panel panel-primary">
                            <div class="panel-heading" role="tab" id="headingOne">
                              <div class="row">
                                <div class="col-md-11">
                                  <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      <i class="fa fa-taxi"></i> Detalles
                                    </a>
                                  </h4>
                                </div>
                                <div class="col-md-1">
                                  <!-- Modal Button -->
                                  <a style="color:white" href="" data-toggle="modal" data-target=".detalleEdit"> <i class="fa fa-pencil"></i> </a>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade detalleEdit" tabindex="-1" role="dialog" aria-labelledby="#detalleEditLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="detalleEditLabel" style="color:black">Editar Vehiculo</h4>
                                      </div>
                                      <div class="modal-body">
                                        <div class="row">
                                          <div class="col-md-5 col-md-offset-1">
                                            <div class="form-group">
                                              <div class="input-group">
                                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Año</span>
                                                <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-4 col-md-offset-1">
                                            <div class="form-group">
                                              <div class="input-group">
                                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Marca</span>
                                                <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-10 col-md-offset-1">
                                            <div class="form-group">
                                              <div class="input-group">
                                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Nombre</span>
                                                <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-primary">Guardar</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="panel-body">
                                    <div class="table-responsive">
                                      <table class="table">
                                        <tr>
                                          <th>Nombre</th>
                                          <td><span id="det_nombre"></span></td>
                                        </tr>
                                        <tr>
                                          <th>Estado del vehículo</th>
                                          <td><span id="det_estado"></span></td>
                                        </tr>
                                        <tr>
                                          <th>Tipo del Vehículo</th>
                                          <td><span id="det_tipo"></span></td>
                                        </tr>
                                        <tr>
                                          <th>Grupo</th>
                                          <td><span id="det_grupo"></span></td>
                                        </tr>
                                        <tr>
                                          <th>Tipo de propiedad</th>
                                          <td><span id="det_propiedad"></span></td>
                                        </tr>
                                        <tr>
                                          <th>NIV(número de serie)</th>
                                          <td><span id="det_serie"></span></td>
                                        </tr>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="panel-body">
                                    <div class="table-responsive">
                                      <table class="table">
                                        <tr>
                                            <th>Año</th>
                                            <td><span id="det_anio"></span></td>
                                          </tr>
                                          <tr>
                                            <th>Marca</th>
                                            <td><span id="det_marca"></span></td>
                                          </tr>
                                          <tr>
                                            <th>Modelo</th>
                                            <td><span id="det_modelo"></span></td>
                                          </tr>
                                          <tr>
                                            <th>Version</th>
                                            <td><span id="det_version"></span></td>
                                          </tr>
                                          <tr>
                                            <th>Color</th>
                                            <td><span id="det_color"></span></td>
                                          </tr>
                                          <tr>
                                            <th>Cuerpo</th>
                                            <td><span id="det_cuerpo"></span></td>
                                        </tr>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="panel panel-primary">
                            <div class="panel-heading" role="tab" id="headingTwo">
                              <div class="row">
                                <div class="col-md-11">
                                  <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                      <i class="fa fa-taxi"></i>  Seguro
                                    </a>
                                  </h4>
                                </div>
                                <div class="col-md-1">
                                    <!-- Button trigger modal -->
                                    <a style="color:white" href="" data-toggle="modal" data-target=".seguroNew"> <i class="fa fa-plus"></i> </a>
                                  <!-- <button type="button" class="btn btn-primary btn-circle " data-toggle="modal" data-target=".seguroNew"><i class="fa fa-plus"></i> -->
                                </div>
                                <!-- Modal -->
                                <div class="modal fade seguroNew" tabindex="-1" role="dialog" aria-labelledby="#seguroNewLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="seguroNewLabel" style="color:black">Agregar seguro</h4>
                                      </div>
                                      <div class="modal-body">
                                        <div class="row">
                                          <div class="col-md-5 col-md-offset-1">
                                            <div class="form-group">
                                              <div class="input-group">
                                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Fecha ini</span>
                                                <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-4 col-md-offset-1">
                                            <div class="form-group">
                                              <div class="input-group">
                                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Fecha Ven.</span>
                                                <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                              </div>
                                            </div>
                                          </div>
                                          
                                          <div class="col-md-5 col-md-offset-1">
                                            <div class="form-group">
                                              <div class="input-group">
                                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Referencia</span>
                                                <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-4 col-md-offset-1">
                                            <div class="form-group">
                                              <div class="input-group">
                                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Total</span>
                                                <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-10 col-md-offset-1">
                                            <div class="form-group">
                                              <div class="input-group">
                                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Proveedor</span>
                                                <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-primary">Guardar</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="row">
                                <div class="col-md-11">
                                  <div class="panel-body">
                                    <p><b>Seguro</b></p>
                                  </div>
                                </div>
                                <div class="col-md-1">
                                  <!--Modal Button-->
                                  <div class="panel-body">
                                    <a style="color:gray" href="" data-toggle="modal" data-target=".seguroEdit"> <i class="fa fa-pencil"></i> </a>
                                  </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade seguroEdit" tabindex="-1" role="dialog" aria-labelledby="#seguroEditLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="seguroEditLabel" style="color:black">Editar seguro</h4>
                                      </div>
                                      <div class="modal-body">
                                        <div class="row">
                                          <div class="col-md-5 col-md-offset-1">
                                            <div class="form-group">
                                              <div class="input-group">
                                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Fecha ini</span>
                                                <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-4 col-md-offset-1">
                                            <div class="form-group">
                                              <div class="input-group">
                                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Fecha Ven.</span>
                                                <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                              </div>
                                            </div>
                                          </div>
                                          
                                          <div class="col-md-5 col-md-offset-1">
                                            <div class="form-group">
                                              <div class="input-group">
                                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Referencia</span>
                                                <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-4 col-md-offset-1">
                                            <div class="form-group">
                                              <div class="input-group">
                                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Total</span>
                                                <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-10 col-md-offset-1">
                                            <div class="form-group">
                                              <div class="input-group">
                                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Proveedor</span>
                                                <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-primary">Guardar</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="panel-body">
                                    <div class="table-responsive">
                                      <table class="table">
                                        <tr>
                                          <th>Proveedor</th>
                                          <td><span id="seg_proveedor"></span></td>
                                        </tr>
                                        <tr>
                                          <th>Fecha de inicio</th>
                                          <td><span id="seg_fechaIni"></span></td>
                                        </tr>
                                        <tr>
                                          <th>Total</th>
                                          <td><span id="seg_total"></span></td>
                                        </tr>
                                      
                                      </table>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="panel-body">
                                    <div class="table-responsive">
                                      <table class="table">
                                          <tr>
                                            <th>Referencia</th>
                                            <td><span id="seg_refe"></span></td>
                                          </tr>
                                          <tr>
                                            <th>Fecha de vencimiento</th>
                                            <td><span id="seg_fechaVen"></span></td>
                                          </tr>
                                          <tr>
                                            <th>Documentos</th>
                                            <td><span id="seg_docs"></span></td>
                                          </tr>
                                        
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="panel panel-primary">
                            <div class="panel-heading" role="tab" id="headingThree">
                              <div class="row">
                                <div class="col-md-11">
                                  <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="fa fa-taxi"></i>  Combustible
                                    </a>
                                  </h4>
                                </div>
                                <div class="col-md-1">
                                  <a style="color:white" href="#" > <i class="fa fa-pencil"></i> </a>
                                </div>
                              </div>
                              
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="panel-body">
                                    <div class="table-responsive">
                                      <table class="table">
                                        <tr>
                                          <th style="color:gray;">Capacidad de tanque 1 de combustible</th>
                                          <td><span id="com_tanque01"></span></td>
                                        </tr>
                                        <tr>
                                          <th>Tipo de combustible: Gasolina</th>
                                          <td><span></span></td>
                                        </tr>
                                        <tr>
                                          <th style="color:gray;">Redimiento semanal esperado</th>
                                          <td><span id="com_rendimiento"></span></td>
                                        </tr>
                                        <tr>
                                          <th>Tanque 2 de combustible</th>
                                          <td><span></span></td>
                                        </tr>
                                        <tr style="color:gray;">
                                          <th>Capacidad de tanque 2 de combustible</th>
                                          <td><span id="com_tanque02"></span></td>
                                        </tr>
                                      
                                      </table>
                                    </div>
                                  </div>
                                </div>
                                
                              </div>
                            </div>
                          </div>
                          <div class="panel panel-primary">
                            <div class="panel-heading" role="tab" id="headingFour">
                              <div class="row">
                                <div class="col-md-11">
                                  <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <i class="fa fa-taxi"></i>  Propiedad del vehiculo
                                    </a>
                                  </h4>
                                </div>
                                <div class="col-md-1">
                                  <!-- Button trigger modal -->
                                  <a style="color:white" href="" data-toggle="modal" data-target=".propiedadEdit"> <i class="fa fa-pencil"></i> </a>
                                  &nbsp;&nbsp;
                                  <a style="color:white" href="#"> <i class="fa fa-trash"></i> </a>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade propiedadEdit" tabindex="-1" role="dialog" aria-labelledby="#propiedadEditLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="propiedadEditLabel" style="color:black">Ingresar datos adquisición del vehículo</h4>
                                      </div>
                                      <div class="modal-body">
                                        <div class="row">
                                          <div class="col-md-5 col-md-offset-1">
                                            <div class="form-group">
                                              <div class="input-group">
                                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Fecha ini</span>
                                                <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-4 col-md-offset-1">
                                            <div class="form-group">
                                              <div class="input-group">
                                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Fecha Ven.</span>
                                                <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                              </div>
                                            </div>
                                          </div>
                                          
                                          <div class="col-md-5 col-md-offset-1">
                                            <div class="form-group">
                                              <div class="input-group">
                                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Referencia</span>
                                                <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-4 col-md-offset-1">
                                            <div class="form-group">
                                              <div class="input-group">
                                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Total</span>
                                                <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-md-10 col-md-offset-1">
                                            <div class="form-group">
                                              <div class="input-group">
                                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Proveedor</span>
                                                <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-primary">Guardar</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="panel-body">
                                    <div class="table-responsive">
                                      <table class="table">
                                        <tr>
                                          <th>Proveedor</th>
                                          <td><span id="pro_proveedor"></span></td>
                                        </tr>
                                        <tr>
                                          <th>Fecha de compra</th>
                                          <td><span id="pro_fecha_compra"></span></td>
                                        </tr>
                                        <tr>
                                          <th>Precio de compra</th>
                                          <td><span id="pro_precio"></span></td>
                                        </tr>
                                        
                                      </table>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="panel-body">
                                    <div class="table-responsive">
                                      <table class="table">
                                          <tr>
                                            <th>Fecha de expiración de la garantía</th>
                                            <td><span id="pro_fecha_garan"></span></td>
                                          </tr>
                                          <tr>
                                            <th>Notas</th>
                                            <td><span id="pro_notas"></span></td>
                                          </tr>
                                          <tr>
                                            <th>Documentos</th>
                                            <td><span id="pro_documentos"></span></td>
                                          </tr>
                                          
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="panel panel-primary">
                            <div class="panel-heading" role="tab" id="headingFive">
                              <div class="row">
                                <div class="col-md-11">
                                  <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    <i class="fa fa-taxi"></i>  Neumaticos y Ruedas
                                    </a>
                                  </h4>
                                </div>
                                <div class="col-md-1">
                                  <a style="color:white" href="#"> <i class="fa fa-pencil"></i> </a>
                                </div>
                              </div>
                              
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="panel-body">
                                    <div class="table-responsive">
                                      <table class="table">
                                        <tr>
                                          <th>Distancia entre ejes</th>
                                          <td><span id="">-</span></td>
                                        </tr>
                                        <tr>
                                          <th>Ancho de eje frontral</th>
                                          <td><span id="">-</span></td>
                                        </tr>
                                        <tr>
                                          <th>Sistema de frenado</th>
                                          <td><span id="">-</span></td>
                                        </tr>
                                        <tr>
                                          <th>Diámetro de neumapticos traseros</th>
                                          <td><span id="">-</span></td>
                                        </tr>
                                        <tr>
                                          <th>Tipo de neumáticos delanteros</th>
                                          <td><span id="">-</span></td>
                                        </tr>
                                        <tr>
                                          <th>Tipo de neumáticos traseros</th>
                                          <td><span id="">-</span></td>
                                        </tr>
                                        
                                      </table>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="panel-body">
                                    <div class="table-responsive">
                                      <table class="table">
                                          <tr>
                                            <th>Sistemas de frenado</th>
                                            <td><span id="">-</span></td>
                                          </tr>
                                          <tr>
                                            <th>Ancho del eje trasero</th>
                                            <td><span id="">-</span></td>
                                          </tr>
                                          <tr>
                                            <th>Diámetro de neumapticos delanteros</th>
                                            <td><span id="">-</span></td>
                                          </tr>
                                          <tr>
                                            <th>Eje posterior</th>
                                            <td><span id="">-</span></td>
                                          </tr>
                                          <tr>
                                            <th>PSI neumáticos delanteros</th>
                                            <td><span id="">-</span></td>
                                          </tr>
                                          <tr>
                                            <th>PSI neumáticos traseros</th>
                                            <td><span id="">-</span></td>
                                          </tr>
                                          
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div id="documentos" class="row tab-pane fade">
                      <div class="col-md-1 col-md-offset-11">
                        <div class="panel-body">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-circle " data-toggle="modal" data-target=".documentosNew"><i class="fa fa-plus"></i>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="panel-body">
                          <div class="table-responsive">
                            <table class="table">
                                <tr>
                                  <td><span id=""><input type="checkbox" value="">&nbsp; &nbsp;&nbsp; &nbsp;<i class="fa fa-file-text"></i>&nbsp; &nbsp;<a href="">DocumentoSeguroObligatorio DEM 001.docx</a></span></td>
                                  <td>18/03/2022</td>
                                  <td>
                                    <button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app01VerVehiculo('+(parseInt(oData.id))+');" ><i class="fa fa-pencil"></i></button>
                                    &nbsp;
                                    <button id="#" type="button" class="btn btn-danger btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app01VerVehiculo('+(parseInt(oData.id))+');" ><i class="fa fa-trash"></i></button>
                                  </td>
                                </tr>
                                <tr>
                                  <td><span id=""><input type="checkbox" value="">&nbsp; &nbsp;&nbsp; &nbsp;<i class="fa fa-file-text"></i>&nbsp; &nbsp;<a href="">DocumentoSeguroObligatorio DEM 001.docx</a></span></td>
                                  <td>18/03/2022</td>
                                  <td>
                                    <button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app01VerVehiculo('+(parseInt(oData.id))+');" ><i class="fa fa-pencil"></i></button>
                                    &nbsp;
                                    <button id="#" type="button" class="btn btn-danger btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app01VerVehiculo('+(parseInt(oData.id))+');" ><i class="fa fa-trash"></i></button>
                                  </td>
                                </tr>
                                <tr>
                                  <td><span id=""><input type="checkbox" value="">&nbsp; &nbsp;&nbsp; &nbsp;<i class="fa fa-file-text"></i>&nbsp; &nbsp;<a href="">DocumentoSeguroObligatorio DEM 001.docx</a></span></td>
                                  <td>18/03/2022</td>
                                  <td>
                                    <button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app01VerVehiculo('+(parseInt(oData.id))+');" ><i class="fa fa-pencil"></i></button>
                                    &nbsp;
                                    <button id="#" type="button" class="btn btn-danger btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app01VerVehiculo('+(parseInt(oData.id))+');" ><i class="fa fa-trash"></i></button>
                                  </td>
                                </tr>
                                <tr>
                                  <td><span id=""><input type="checkbox" value="">&nbsp; &nbsp;&nbsp; &nbsp;<i class="fa fa-file-text"></i>&nbsp; &nbsp;<a href="">DocumentoSeguroObligatorio DEM 001.docx</a></span></td>
                                  <td>18/03/2022</td>
                                  <td>
                                    <button id="#" type="button" class="btn btn-primary btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app01VerVehiculo('+(parseInt(oData.id))+');" ><i class="fa fa-pencil"></i></button>
                                    &nbsp;
                                    <button id="#" type="button" class="btn btn-danger btn-xs" style="margin-left:2px;margin-right:2px;" title="S" onclick="javascript:app01VerVehiculo('+(parseInt(oData.id))+');" ><i class="fa fa-trash"></i></button>
                                  </td>
                                </tr>
                                
                              
                                
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div id="tarea" class="row tab-pane fade">
                      <div class="col-md-12">
                        
                        <h3>Tareas</h3>
                        <ul class="nav nav-pills">
                          <li role="presentation2" class="active"><a data-toggle="tab" href="#vencidas">Vencidas</a></li>
                          <li role="presentation2"><a  data-toggle="tab" href="#porVencer" >Por vencer</a></li>
                          <li role="presentation2"><a data-toggle="tab" href="#realizadas" >Realizadas</a></li>
                        </ul>
                        
                      </div>
                      <div class="col-md-1 col-md-offset-11">
                        <div class="panel-body">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-circle " data-toggle="modal" data-target=".tareaNew"><i class="fa fa-plus"></i>
                        </div>
                      </div>
                      <div class="col-md-12 tab-content">
                        <div id="vencidas" class="row tab-pane fade in active">
                          <div class="col-md-12">
                            <div class="panel-body">
                              <table class="datatable table table-striped table-bordered" id="tareasVencidas">
                                
                              </table>
                            </div>
                          </div>
                      
                        </div>
                        <div id="porVencer" class="row tab-pane fade">
                          <div class="col-md-12">
                            <div class="panel-body">
                              <table class="datatable table table-striped table-bordered" id="tareasporVencer">
                                
                              </table>
                            </div>
                          </div>
                        </div>
                        <div id="realizadas" class="row tab-pane fade">
                          <div class="col-md-12">
                            <div class="panel-body">
                              <table class="datatable table table-striped table-bordered" id="tareasRealizadas">
                                
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="combustible" class="roww tab-pane fade">

                    </div>
                    <div id="mantenimiento" class="roww tab-pane fade">

                    </div>
                  </div>
                  
                </div>
                
              </div>
            </div>

            <div class="tab-pane fade datos03" id="">
              <div class="box-body">
                <div class="pull-right">
                  <button id="btn01_New" type="button" class="btn btn-primary btn-xs" style="margin-top:5px;;" onclick="javascript:app01Boton_new();"><i class="fa fa-plus"></i> Nuevo</button>
                  <button id="btn01_Cancel" type="button" class="btn btn-default btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app01Boton_cancel();"><i class="fa fa-angle-double-left"></i> Regresar</button>
                  <button id="btn01_Update" type="button" class="btn btn-warning btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app01Boton_update();"><i class="fa fa-flash"></i> Actualizar</button>
                  <button id="btn01_Save" type="button" class="btn btn-success btn-xs" style="margin-top:5px; display:none;" onclick="javascript:app01Boton_save();"><i class="fa fa-flash"></i> Guardar</button>
                  
                </div>
              </div>
              <br>
              <div class="container">
                <div class="row" id="grid01">
                  <div class="col-md-12">

                    <div class=" box-primary">
                      <div class="box-header no-padding">
                        <div class="box-body table-responsive no-padding">
                          <table class="datatable table table-striped table-bordered" id="gridConductores">
                            
                            </thead>
                          </table>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

            </div>


            <div class="tab-pane fade datos04" id="">
              <div class="box-body">
                <div class="pull-right">
                  <button id="btn01_New" type="button" class="btn btn-primary btn-xs" style="margin-top:5px;;" data-toggle="modal" data-target=".opetareaNew"><i class="fa fa-plus"></i> Nuevo</button>
                  <button id="btn01_Cancel" type="button" class="btn btn-default btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app01Boton_cancel();"><i class="fa fa-angle-double-left"></i> Regresar</button>
                  <button id="btn01_Update" type="button" class="btn btn-warning btn-xs" style="margin-top:5px;display:none;" onclick="javascript:app01Boton_update();"><i class="fa fa-flash"></i> Actualizar</button>
                  <button id="btn01_Save" type="button" class="btn btn-success btn-xs" style="margin-top:5px; display:none;" onclick="javascript:app01Boton_save();"><i class="fa fa-flash"></i> Guardar</button>
                  
                </div>
                <!-- Modal -->
                <div class="modal fade opetareaNew" tabindex="-1" role="dialog" aria-labelledby="#opetareaNewLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="opetareaNewLabel" style="color:black">Agregar tarea</h4>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-5 col-md-offset-1">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Nombre</span>
                                <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-md-offset-1">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Tipo</span>
                                <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-md-5 col-md-offset-1">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Fecha lim.</span>
                                <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-md-offset-1">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Prioridad</span>
                                <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-5 col-md-offset-1">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Vehiculo</span>
                                <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-md-offset-1">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Responsable</span>
                                <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-5 col-md-offset-1">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Conductor</span>
                                <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-md-offset-1">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Proveedor</span>
                                <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                              <div class="input-group">
                                <span class="input-group-addon" title="Grupo de Activos" style="background:#EEEEEE;font-weight:bold">Comentarios</span>
                                <input id="odome_fecha" type="text" class="form-control" placeholder="..." />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <div class="container">
                <div class="row" id="grid01">
                  <div class="col-md-12">

                    <div class=" box-primary">
                      <div class="box-header no-padding">
                        <div class="box-body table-responsive no-padding">
                          <div class="col-md-12">
                            
                            <h3>Tareas</h3>
                            <ul class="nav nav-pills">
                              <li role="presentation2" class="active"><a data-toggle="tab" href="#opevencidas">Vencidas</a></li>
                              <li role="presentation2"><a  data-toggle="tab" href="#opeporVencer" >Por vencer</a></li>
                              <li role="presentation2"><a data-toggle="tab" href="#operealizadas" >Realizadas</a></li>
                            </ul>
                            
                          </div>
                          
                          <div class="col-md-12 tab-content">
                            <div id="opevencidas" class="row tab-pane fade in active">
                              <div class="container">
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="panel-body">
                                      <table class="datatable table table-striped table-bordered" id="opetareasVencidas">
                                        
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          
                            </div>
                            <div id="opeporVencer" class="row tab-pane fade">
                              <div class="col-md-12">
                                <div class="panel-body">
                                  <table class="datatable table table-striped table-bordered" id="tareasporVencer">
                                    
                                  </table>
                                </div>
                              </div>
                            </div>
                            <div id="operealizadas" class="row tab-pane fade">
                              <div class="col-md-12">
                                <div class="panel-body">
                                  <table class="datatable table table-striped table-bordered" id="tareasRealizadas">
                                    
                                  </table>
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
        </div>
    </div>
    </form>
  </div>
</section>

<script src="pages/catalogos/operaciones/operaciones.js"></script>
<script>
  $(document).ready(function(){
    appBotonReset();
  });

 
  
</script>
