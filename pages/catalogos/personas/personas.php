<!-- ztree treeview -->
<link rel="stylesheet" href="libs/ztree/css/ztreestyle.css" />
<script src="libs/ztree/js/jquery.ztree.core.js"></script>

<!-- bootstrap datepicker -->
<link rel="stylesheet" href="libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="libs/moment/min/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/locale/es.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script> -->

<!--datetimepicker-->
<!-- <link href="https://cdn.bootcss.com/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
      rel="stylesheet">
<script src="https://cdn.bootcss.com/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script> -->
<script src="pages/catalogos/personas/validate.js"></script>
<script src="pages/catalogos/personas/ubigeo.js"></script>

<style>
  #grd01RequerimientosHistorial_filter,
  #grd01ReferenciaLaboral_filter,
  #grd01EntrevistaHistorial_filter{
    display:none;
  }
  .error{
    color:#ff2424;
    font-size:10px;
  }

</style>
<section class="content-header">
  
  <h1><i class="fa fa-tasks"></i> Sistema de Gestión de personas</h1>
  <ol class="breadcrumb">
    <li><a href="javascript:appChangePage('lineaneg');"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Sistema de Gestión de personas</li>
  </ol>
</section>
<section class="content">
  <div class="row" id="edit">
    <form class="form-horizontal" id="frmWorker" autocomplete="off">
      
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active" title="Control de fatiga y somnolencia"><a href="#datos001" data-toggle="tab"><i class="fa fa-home"></i> Gestión de personas</a></li>
            <li class="" title="Registro"><a href="#datos002" data-toggle="tab"><i class="fa fa-truck"></i> Ficha de entrevista de personal</a></li>
            <li class="" title="Registro"><a href="#datos003" data-toggle="tab"><i class="fa fa-truck"></i> Verificación de Referencia Laboral</a></li>
            <li class="" title="Registro"><a href="#datos004" data-toggle="tab"><i class="fa fa-truck"></i> Ficha de Personal</a></li>            
            <li class="" title="Registro"><a href="#datos005" data-toggle="tab"><i class="fa fa-truck"></i> Programación de Capacitaciones</a></li>
          </ul>
          <div class="tab-content">
          <div class="tab-pane active" id="datos001" >
            <div class="row">
                <div class="col-md-3">
                  <div class="list-group">
                    <a href="#" id="link_HistorialRequerimientosPersonas" class="list-group-item list-group-item-action active" aria-current="true" onclick="HistorialRequerimientosPersonas();">
                    <i class="fa fa-folder-open margin-r-5"></i>Historial de requerimientos
                    </a>
                    <a href="#" id="link_NuevoRegistroPersonas" class="list-group-item list-group-item-action" onclick="NuevoRegistroPersonas();"><i class="fa fa-folder margin-r-5" ></i>Nuevo registro </a>                
                  </div>
                </div>
                <div class="col-md-9" id="HistorialRequerimientosPersonas">
                   <div class="box box-body">                                  
                     <div class="form-group" style="margin-bottom:5px;">                    
                        <div class="input-group" id="RegistroRequerimientosPersonasSearch">
                                <span class="input-group-addon" title="Buscar" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i></span>
                                <input id="1" type="text" class="form-control" placeholder="Buscar por solicitante"/>                                
                                <span class="input-group-addon" title="Buscar" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i></span>
                                <input id="3" type="text" class="form-control"  placeholder="Buscar por cargo"/>  
                                
                                <span class="input-group-addon" title="Buscar" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i></span>
                                <input id="4" type="text" class="form-control"  placeholder="Buscar por fecha"/>  

                                <span class="input-group-addon" title="Buscar" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i></span>
                                <input id="5" type="text" class="form-control"  placeholder="Buscar por área"/>                                                                   
                        </div>
                      </div> 
                    </div>                   
                    <div class="box-primary" style="width:100%">
                      <div class="box-header no-padding">
                        <div class="box-body table-responsive no-padding">
                          <table style="width:100%"class="datatable table table-striped table-bordered" id="grd01RequerimientosHistorial" >
                              <thead>
                                <tr>
                                  <th>ITEM</th>
                                  <th>SOLICITANTE (nombres y apellidos)</th>
                                  <th>Nº DE VACANTES</th>
                                  <th>CARGO</th>
                                  <th>FECHA</th>
                                  <th>AREA</th>
                                  <th></th>
                                </tr>
                              </thead>                            
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example" style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">                    
                                                                      
                    </div>  
                  </div>
                  <div class="col-md-9" id="NuevoRegistroPersonas"style="display:none">
                    <div class="box box-body">                                                             
                    
                    <div class="form-group" style="margin-bottom:5px;">
                    <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Solicitante</span>
                    <div style="display:flex">
                                <input id="txt_search_solicitante" type="text" class="form-control" placeholder="Ingrese DNI" value=""/>
                                <input type="hidden" id="idsolicitanteHidden" name="" value="">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;"> <button class="fa fa-search" type="button" aria-hidden="true" onclick="searchSolicitante();"></button></span>
                              </div>
                      <div class="input-group">
                    
                      <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Nombres</span>
                        <input id="txt_solicitante_nombres" type="text" class="form-control" placeholder="..." value="" disabled/>
                        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Apellidos</span>
                        <input id="txt_solicitante_apellidos" type="text" class="form-control" placeholder="..." value="" disabled/>  
                        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Area</span>
                        <input id="txt_solicitante_area" type="text" class="form-control" placeholder="..." value="" disabled/> 
                        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Cargo</span>
                        <input id="txt_solicitante_cargo" type="text" class="form-control" placeholder="..." value="" disabled/>                     
                      </div>
                    </div> 
                    <div class="form-group" style="margin-bottom:5px;margin-top:10px;margin-bottom:10px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Expositor" style="font-weight:bold;text-align:left;">DATOS GENERALES DEL PUESTO</span>
                                          
                      </div>                      
                    </div>   
                    <div class="form-group" style="margin-bottom:5px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CARGO</span>
                        <input id="txt_cargo_personas" type="text" class="form-control"  
                        value=""/>
                        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">N° DE VACANTES</span>
                        <input id="txt_n_vacantes_personas" type="number" class="form-control" placeholder="..." value="" />                        
                      </div>                      
                    </div>   
                    <div class="form-group" style="margin-bottom:5px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">AREA</span>
                          <select id="personas_select_area" class="form-control ">
                         <option value="-1">Selecciona...</option>
                         <option value="0">Administración</option>
                         <option value="1">Mantenimiento</option>
                         <option value="2">Operaciones</option>
                         <option value="3">SSOMA</option>
                         <option value="4">Logística</option>
                         <option value="5">inanzas</option>
                        </select> 
                        <span class="input-group-addon" title="Expositor"  style="background:#EEEEEE;font-weight:bold;padding-right: 52px;"> PLAZO DE CONTRATO</span>
                          <select id="personas_select_contrato" class="form-control ">
                         <option value="-1">Selecciona...</option>
                         <option value="0">Permanente</option>
                         <option value="1">Temporal</option>                     
                         <option value="2">Otro</option>
                        </select> 
                        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;"> MOTIVO DEL PEDIDO</span>
                          <select id="personas_select_motivo" class="form-control">
                         <option value="-1">Selecciona...</option>
                         <option value="0">Renuncia del titular</option>
                         <option value="1">Cancelación de contrato</option>
                         <option value="2">Se crea un nuevo cargo</option>
                         <option value="3">Promicón traslado licencia</option>
                         <option value="4">Licencia de maternidad</option>
                         <option value="5">Incapacidad</option>
                         <option value="6">Vacaciones</option>
                         <option value="7">Incremento de actividades</option>
                        </select>          
                      </div>                      
                    </div>   
                    <div class="form-group" style="margin-bottom:5px;margin-top:10px;margin-bottom:10px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Expositor" style="font-weight:bold;text-align:left;">CONDICIONES DEL PUESTO</span>                                          
                      </div>                      
                    </div>   
                    <div class="form-group" style="margin-bottom:5px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">LUGAR DEL TRABAJO</span>
                        <select id="personas_select_lugar" class="form-control selectpicker">
                          <option value="-1">Selecciona...</option>
                          <option value="0">Moquegua</option>
                          <option value="1">Proyecto</option>                        
                        </select> 
                        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DURACIÓN ESTIMADA</span>
                        <input id="personas_select_duracion" type="text" class="form-control" placeholder="..." value="" />                                               
                      </div>                      
                    </div>   
                    <div class="form-group" style="margin-bottom:5px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA INCORPORACIÓN</span>
                        <input id="txt_fecha_g_personas" type="date" class="form-control"  
                        value=""/>
                        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">REMUNERACIÓN A OFRECER</span>
                        <input id="personas_remuneracion" type="text" class="form-control" placeholder="..." value="" /> 
                      </div>                      
                    </div> 
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                          <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">OBSERVACIONES</span>
                          <button class="btn btn-primary"  type="button" onclick="addObservacionespersonas();"><i class="fa fa-plus-circle "
                          ></i></button>                                                  
                        </div>                                                                    
                    </div>  
                    <div class="box-primary">
                      <div class="box-header no-padding">
                        <div class="box-body table-responsive no-padding">
                          <table class="datatable table table-striped table-bordered" id="table_observaciones_personas">
                            <thead>
                              <tr>
                                
                                <th>Descripcion</th>
                                <th>Ope</th>                                                                                                                                                                             
                              </tr>
                            </thead>
                            <tbody>

                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example" style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">                    
                     
                     <button type="button" class="btn btn-success" onclick="insert_registro_personas();">Guardar</button>                                            
                   <!-- <button type="button" class="btn btn-warning">Editar</button>                                             -->                                                                    
                 </div>
                    
                  </div>  
               </div>    
            </div>  
            </div>  
            <div class="tab-pane" id="datos002" >
            <div class="row">
                <div class="col-md-3">
                  <div class="list-group">
                    <a href="#" id="link_HistorialEntrevistaPersonas" class="list-group-item list-group-item-action active" aria-current="true" onclick="HistorialEntrevistaPersonas();">
                    <i class="fa fa-folder-open margin-r-5"></i>Historial de Entrevista
                    </a>
                    <a href="#" id="link_NuevoRegistroEntrevistaPersonas" class="list-group-item list-group-item-action" onclick="NuevoRegistroEntrevistaPersonas();"><i class="fa fa-folder margin-r-5" ></i>Nuevo registro </a>                
                  </div>
                </div>
                <div class="col-md-9" id="HistorialEntrevistaPersonas" >
                   <div class="box box-body">                                  
                     <div class="form-group" style="margin-bottom:5px;">                    
                        <div class="input-group" id="RegistroEntrevistaPersonasSearch">
                                <span class="input-group-addon" title="Buscar" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i></span>
                                <input id="1" type="text" class="form-control" placeholder="Buscar por nombres"/>                                
                                <span class="input-group-addon" title="Buscar" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i></span>
                                <input id="3" type="text" class="form-control"  placeholder="Buscar por dni"/>  
                                
                                <span class="input-group-addon" title="Buscar" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i></span>
                                <input id="4" type="text" class="form-control"  placeholder="Buscar por fecha"/>  
                                                                                     
                        </div>
                      </div> 
                    </div>                   
                    <div class="box-primary" style="width:100%">
                      <div class="box-header no-padding">
                        <div class="box-body table-responsive no-padding">
                          <table style="width:100%"class="datatable table table-striped table-bordered" id="grd01EntrevistaHistorial" >
                              <thead>
                                <tr>
                                  <th>ITEM</th>
                                  <th>NOMBRES Y APELLIDOS</th>
                                  <th>DNI</th>                               
                                  <th>FECHA</th>                            
                                  <th></th>
                                </tr>
                              </thead>                            
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example" style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">                    
                                                                      
                    </div>  
                  </div>
                  <div class="col-md-9" id="NuevoRegistroEntrevistaPersonas" style="display:none">
                    <div class="box box-body">                                                                              
                    <div class="form-group" style="margin-bottom:5px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES</span>
                        <input id="txt_entrevistas_nombres" type="text" class="form-control"  
                        value=""/>
                        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">APELLIDOS</span>
                        <input id="txt_entrevistas_apellidos" type="text" class="form-control" placeholder="..." value="" />                        
                      </div>   
                                         
                    </div>   
                    <div class="form-group" style="margin-bottom:5px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DNI</span>
                        <input id="txt_entrevistas_dni" type="text" class="form-control"  
                        value=""/>
                        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">EDAD</span>
                        <input id="txt_entrevistas_edad" type="number" class="form-control" placeholder="..." value="" />                        
                      </div>                                            
                    </div>   
                    <div class="form-group" style="margin-bottom:5px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA DE NACIMIENTO</span>
                        <input id="txt_entrevistas_fecha" type="date" class="form-control"  
                        value=""/>
                        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ESTADO CIVIL</span>
                          <select id="txt_entrevistas_civil" class="form-control ">
                         <option value="-1">Selecciona...</option>
                         <option value="0">CASADO</option>
                         <option value="1">SOLTERO</option>                     
                         <option value="2">VIUDO</option>                     
                         <option value="3">DIVORCIADO</option>                     
                         <option value="4">VIUDO</option>
                         <option value="5">CONVIVIENTE</option>
                        </select>                        
                      </div>                                            
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CORREO ELECTRONICO</span>
                        <input id="txt_entrevistas_correo" type="text" class="form-control"  
                        value=""/>
                        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TELEFONO</span>
                        <input id="txt_entrevistas_telefono" type="number" class="form-control" placeholder="..." value="" />                        
                      </div>                                            
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PUESTO AL QUE POSTULA</span>
                        <input id="txt_entrevistas_puesto" type="text" class="form-control"  
                        value=""/>
                        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PRETENCIONES SALARIALES</span>
                        <input id="txt_entrevistas_pretenciones" type="number" class="form-control" placeholder="..." value="" />                        
                      </div>                                            
                    </div>      
                    <div class="form-group" style="margin-bottom:5px;">
                    
                    <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">SISTEMA DE GESTION</span>                                                                                                    
                </div>  
                    <div class="box-primary">
                        <div class="box-header no-padding">
                          <div class="box-body table-responsive no-padding">
                            <table class="datatable table table-striped table-bordered" id="sistemaGestionEnbtrevista">
                              <thead>
                                <tr>
                                  <th>N º</th>
                                  <th>CRITERIO</th>
                                  <th>CUENTA CON MÁS DE LO INDICADO (3)</th>
                                  <th>CUMPLE CON LOS NECESARIO (2)</th>
                                  <th>NO CUMPLE (1)</th>
                                </tr>
                              </thead>
                              <body>
                                <tr>
                                  <td>1</td>
                                  <td>Educación</td>
                                  <td><input class="form-check-input check_gestion_entrevista" type="radio" name="S_1" id="3"></td>
                                  <td><input class="form-check-input check_gestion_entrevista" type="radio" name="S_1" id="2"></td>
                                  <td><input class="form-check-input check_gestion_entrevista" type="radio" name="S_1" id="1"></td>
                                </tr>
                                <tr>
                                  <td>2</td>
                                  <td>Formación</td>
                                  <td><input class="form-check-input check_gestion_entrevista" type="radio" name="S_2" id="3"></td>
                                  <td><input class="form-check-input check_gestion_entrevista" type="radio" name="S_2" id="2"></td>
                                  <td><input class="form-check-input check_gestion_entrevista" type="radio" name="S_2" id="1"></td>
                                </tr>
                                <tr>
                                  <td>3</td>
                                  <td>Experiencia</td>
                                  <td><input class="form-check-input check_gestion_entrevista" type="radio" name="S_3" id="3"></td>
                                  <td><input class="form-check-input check_gestion_entrevista" type="radio" name="S_3" id="2"></td>
                                  <td><input class="form-check-input check_gestion_entrevista" type="radio" name="S_3" id="1"></td>
                                </tr>                                                        
                              </body>
                            </table>
                          </div>
                        </div>
                      </div>   
                      <div class="form-group" style="margin-bottom:5px;">
                    
                    <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">OTROS (ADICIONALES)</span>                                                                                                    
                </div>  
                    <div class="box-primary">
                        <div class="box-header no-padding">
                          <div class="box-body table-responsive no-padding">
                            <table class="datatable table table-striped table-bordered" id="sistemaGestionEnbtrevistaOtros">
                              <thead>
                                <tr>
                                  <th>N º</th>
                                  <th>CRITERIO</th>
                                  <th>EXCELENTE (3)</th>
                                  <th>CUMPLE CON LOS NECESARIO (2)</th>
                                  <th>NO CUMPLE (1)</th>
                                </tr>
                              </thead>
                              <body>
                                <tr>
                                  <td>1</td>
                                  <td>Puntualidad (se presentó a la hora)</td>
                                  <td><input class="form-check-input check_otros_entrevistas" type="radio" name="O_1" id="3"></td>
                                  <td><input class="form-check-input check_otros_entrevistas" type="radio" name="O_1" id="2"></td>
                                  <td><input class="form-check-input check_otros_entrevistas" type="radio" name="O_1" id="1"></td>
                                </tr>
                                <tr>
                                  <td>2</td>
                                  <td>Capacidad de comunicación (Se comunica adecuadamente)</td>
                                  <td><input class="form-check-input check_otros_entrevistas" type="radio" name="O_2" id="3"></td>
                                  <td><input class="form-check-input check_otros_entrevistas" type="radio" name="O_2" id="2"></td>
                                  <td><input class="form-check-input check_otros_entrevistas" type="radio" name="O_2" id="1"></td>
                                </tr>
                                <tr>
                                  <td>3</td>
                                  <td>Expresión verbal y corporal</td>
                                  <td><input class="form-check-input check_otros_entrevistas" type="radio" name="O_3" id="3"></td>
                                  <td><input class="form-check-input check_otros_entrevistas" type="radio" name="O_3" id="2"></td>
                                  <td><input class="form-check-input check_otros_entrevistas" type="radio" name="O_3" id="1"></td>
                                </tr>                                                        
                              </body>
                            </table>
                          </div>
                        </div>
                      </div>               
                    <div class="btn-group" role="group" aria-label="Basic example" style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">                    
                     
                     <button type="button" class="btn btn-success" onclick="insert_registro_entrevistas();">Guardar</button>                                            
                   <!-- <button type="button" class="btn btn-warning">Editar</button>                                             -->                                                                    
                 </div>
                    
                  </div>  
               </div>    
            </div>
            </div>  
            <div class="tab-pane" id="datos003" >
            <div class="row">
                <div class="col-md-3">
                  <div class="list-group">
                    <a href="#" id="link_HistorialReferenciaLaboral" class="list-group-item list-group-item-action active" aria-current="true" onclick="HistorialReferenciaLaboral();">
                    <i class="fa fa-folder-open margin-r-5"></i>Historial de Referencia Laboral
                    </a>
                    <a href="#" id="link_NuevoRegistroReferenciaLaboral" class="list-group-item list-group-item-action" onclick="NuevoRegistroReferenciaLaboral();"><i class="fa fa-folder margin-r-5" ></i>Nueva Referencia Laboral </a>                
                  </div>
                </div>
                <div class="col-md-9" id="HistorialReferenciaLaboral" >
                   <div class="box box-body">                                  
                     <div class="form-group" style="margin-bottom:5px;">                    
                        <div class="input-group" id="RegistroReferenciaLaboralSearch">
                                <span class="input-group-addon" title="Buscar" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i></span>
                                <input id="1" type="text" class="form-control" placeholder="Buscar por nombres del candidato"/>                                
                                <span class="input-group-addon" title="Buscar" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i></span>
                                <input id="2" type="text" class="form-control"  placeholder="Buscar por nombres del referente"/>                                                             
                                                                                     
                        </div>
                      </div> 
                    </div>                   
                    <div class="box-primary" style="width:100%">
                      <div class="box-header no-padding">
                        <div class="box-body table-responsive no-padding">
                          <table style="width:100%"class="datatable table table-striped table-bordered" id="grd01ReferenciaLaboral" >
                              <thead>
                                <tr>
                                  <th>ITEM</th>
                                  <th>NOMBRES REFERENTE</th>
                                  <th>NOMBRES CANDIDATOS</th>                                                                                           
                                  <th></th>
                                </tr>
                              </thead>                            
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example" style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">                    
                                                                      
                    </div>  
                  </div>
                  <div class="col-md-9" id="NuevoRegistroReferenciaLaboral" style="display:none">
                    <div class="box box-body">                                                                              
                    <div class="form-group" style="margin-bottom:5px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES DE CANDIDATO</span>
                        <input id="txt_referencia_laboral_candidato_nombres" type="text" class="form-control"  
                        value=""/>
                        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">APELLIDOS DE CANDIDATO</span>
                        <input id="txt_referencia_laboral_candidato_apellidos" type="text" class="form-control" placeholder="..." value="" />                        
                      </div>   
                                         
                    </div>   
                    <div class="form-group" style="margin-bottom:5px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES DE REFERENTE</span>
                        <input id="txt_referencia_laboral_referente_nombres" type="text" class="form-control"  
                        value=""/>
                        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">APELLIDOS DE REFERENTE</span>
                        <input id="txt_referencia_laboral_referente_apellidos" type="text" class="form-control" placeholder="..." value="" />                        
                      </div>                                            
                    </div>   
                    <div class="form-group" style="margin-bottom:5px;">
                      <div class="input-group">
                        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TELEFONO</span>
                        <input id="txt_referencia_laboral_referente_telefono" type="number" class="form-control"  
                        value=""/>
                        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CARGO</span>
                          <select id="txt_referencia_laboral_referente_cargo" class="form-control ">
                         <option value="-1">Selecciona...</option>
                         <option value="0">CARGO 1</option>
                         <option value="1">CARGO 2</option>                     
                         <option value="2">CARGO 3</option>                     
                         <option value="3">CARGO 4</option>                     
                         <option value="4">CARGO 5</option>
                         <option value="5">CARGO 6</option>
                        </select>   
                        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">EMPRESA</span>
                        <input id="txt_referencia_laboral_referente_empresa" type="text" class="form-control"  
                        value=""/>                     
                      </div>                                            
                    </div>
                                     
                    <div class="form-group" style="margin-bottom:5px;">
                    
                    <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PREGUNTAS</span>                                                                                                    
                </div>  
                    <div class="box-primary">
                        <div class="box-header no-padding">
                          <div class="box-body table-responsive no-padding">
                            <table class="datatable table table-striped table-bordered" id="ReferenciaLaboralPreguntasCriterio">
                              <thead>
                                <tr>
                                  <th>N º</th>
                                  <th>CRITERIO</th>
                                  <th></th>                                                         
                                </tr>
                              </thead>
                              <body>
                                <tr>
                                  <td>1</td>
                                  <td>¿Recuerda en qué fecha laboro con usted, fue su jefe directo, de qué empresa?</td>
                                  <td><input id="ReferenciaLaboralPreguntasCriterio_1" type="text" class="form-control"  
                        value=""/></td>
                                </tr>
                                <tr>
                                <td>2</td>
                                  <td>¿Qué puesto ocupaba? 
</td>
                                  <td><input id="ReferenciaLaboralPreguntasCriterio_2" type="text" class="form-control"  
                        value=""/></td>
                                </tr>
                                <tr>
                                <td>3</td>
                                  <td>Mencione sus principales cualidades o fortalezas </td>
                                  <td><input id="ReferenciaLaboralPreguntasCriterio_3" type="text" class="form-control"  
                        value=""/></td>
                                </tr>                                                          <tr>
                                <td>4</td>
                                  <td>Mencione sus principales logros </td>
                                  <td><input id="ReferenciaLaboralPreguntasCriterio_4" type="text" class="form-control"  
                        value=""/></td>
                                </tr>  
                                <tr>
                                <td>5</td>
                                  <td>¿Cómo se llevaba con sus compañeros y jefes?</td>
                                  <td><input id="ReferenciaLaboralPreguntasCriterio_5" type="text" class="form-control"  
                        value=""/></td>
                                </tr>  
                                <tr>
                                <td>6</td>
                                  <td>¿Cuál considera que es su área de mejora? </td>
                                  <td><input id="ReferenciaLaboralPreguntasCriterio_6" type="text" class="form-control"  
                        value=""/></td>
                                </tr>  
                                <tr>
                                <td>7</td>
                                  <td> ¿Cuál fue el motivo de su salida? </td>
                                  <td><input id="ReferenciaLaboralPreguntasCriterio_7" type="text" class="form-control"  
                        value=""/></td>
                                </tr> 
                                <tr>
                                <td>8</td>
                                  <td>En el caso lo contraten ¿Qué recomendación le haría a su jefe?</td>
                                  <td><input id="ReferenciaLaboralPreguntasCriterio_8" type="text" class="form-control"  
                        value=""/></td>
                                </tr>
                                <tr>
                                <td>9</td>
                                  <td>¿Si tuviera oportunidad de contratarlo de nuevo lo haría?</td>
                                  <td><input id="ReferenciaLaboralPreguntasCriterio_9" type="text" class="form-control"  
                        value=""/></td>
                                </tr>  
                                <tr>
                                <td>10</td>
                                  <td>Observaciones</td>
                                  <td><input id="ReferenciaLaboralPreguntasCriterio_10" type="text" class="form-control"  
                        value=""/></td>
                                </tr>  
                              </body>
                            </table>
                          </div>
                        </div>
                      </div>   
                                                 
                      <div class="box-primary" style="margin-top:10px">
                        <div class="box-header no-padding">
                          <div class="box-body table-responsive no-padding">
                            <table class="datatable table table-striped table-bordered" id="ReferenciaLaboralPreguntasCriterioRecomienda">
                              <thead>
                                <tr>                               
                                  <th></th>
                                  <th>SI</th>                                                     <th>NO</th>      
                                </tr>
                              </thead>
                              <body>
                                <tr>                                 
                                  <td>Lo recomienda</td>
                                  <td><input class="form-check-input check_referencia_laboral_recomendaciones" type="radio" name="RL_1" id="1"> </td>
                                  <td><input class="form-check-input check_referencia_laboral_recomendaciones" type="radio" name="RL_1" id="0"></td>  
                                </tr>                            
                              </body>
                            </table>
                          </div>
                        </div>
                      </div>   

                  </div> 
                   
                  <div class="btn-group" role="group" aria-label="Basic example" style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">                    
                     
                     <button type="button" class="btn btn-success" onclick="insert_registro_referencia_laboral();">Guardar</button>                                            
                   <!-- <button type="button" class="btn btn-warning">Editar</button>                                             -->                                                                    
                 </div>
               </div>    
            </div>
            </div>
            <div class="tab-pane" id="datos004" >
            <div class="row">
                <div class="col-md-3">
                  <div class="list-group">
                    <a href="#" id="link_HistorialFichaPersonal" class="list-group-item list-group-item-action active" aria-current="true" onclick="HistorialFichaPersonal();">
                    <i class="fa fa-folder-open margin-r-5"></i>Historial de Ficha de Personal
                    </a>
                    <a href="#" id="link_NuevoRegistroFichaPersonal" class="list-group-item list-group-item-action" onclick="NuevoRegistroFichaPersonal();"><i class="fa fa-folder margin-r-5" ></i>Nueva Ficha Personal </a>                
                  </div>
                </div>
                <div class="col-md-9" id="HistorialFichaPersonal" >
                   <div class="box box-body">                                  
                     <div class="form-group" style="margin-bottom:5px;">                    
                        <div class="input-group" id="RegistroEntrevistaPersonasSearch">
                                <span class="input-group-addon" title="Buscar" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i></span>
                                <input id="1" type="text" class="form-control" placeholder="Buscar por nombres"/>                                
                                <span class="input-group-addon" title="Buscar" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i></span>
                                <input id="3" type="text" class="form-control"  placeholder="Buscar por dni"/>  
                                
                                <span class="input-group-addon" title="Buscar" style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i></span>
                                <input id="4" type="text" class="form-control"  placeholder="Buscar por fecha"/>  
                                                                                     
                        </div>
                      </div> 
                    </div>                   
                    <div class="box-primary" style="width:100%">
                      <div class="box-header no-padding">
                        <div class="box-body table-responsive no-padding">
                          <table style="width:100%"class="datatable table table-striped table-bordered" id="grd01EntrevistaHistorial" >
                              <thead>
                                <tr>
                                  <th>ITEM</th>
                                  <th>NOMBRES Y APELLIDOS</th>
                                  <th>DNI</th>                               
                                  <th>FECHA</th>                            
                                  <th></th>
                                </tr>
                              </thead>                            
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example" style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">                    
                                                                      
                    </div>  
                  </div>
                  <div class="col-md-9" id="NuevoRegistroFichaPersonal" style="display:none">
                    <div class="box box-body">  
                          <ul class="nav nav-tabs" id="123" role="tablist">
                          <li class="active" title="Control de fatiga y somnolencia"><a href="#submenu0" data-toggle="tab"> DATOS GENERALES</a></li>
                            <li class="" title="Registro"><a href="#submenu1" data-toggle="tab"> OTROS DATOS </a></li>
                            <li class="" title="Registro"><a href="#submenu2" data-toggle="tab"> INSTRUCCIÓN</a></li>
                            <li class="" title="Registro"><a href="#submenu3" data-toggle="tab"> IDIOMAS</a></li>
                            <li class="" title="Registro"><a href="#submenu4" data-toggle="tab"> REFERENCIAS LABORALES</a></li>
                            <li class="" title="Registro"><a href="#submenu5" data-toggle="tab">DATOS DEL CÓNYUGE O CONVIVIENTE</a></li>
                            <li class="" title="Registro"><a href="#submenu6" data-toggle="tab">DATOS DE LOS PADRES</a></li>
                            <li class="" title="Registro"><a href="#submenu7" data-toggle="tab">DATOS DE LOS HIJOS </a></li>
                            <li class="" title="Registro"><a href="#submenu8" data-toggle="tab">PERSONA A LLAMAR EN CASO DE EMERGENCIA </a></li>
                            <li class="" title="Registro"><a href="#submenu9" data-toggle="tab">MOVILIDAD</a></li>
                            <li class="" title="Registro"><a href="#submenu10" data-toggle="tab">ANTECEDENTES</a></li>
                            <li class="" title="Registro"><a href="#submenu11" data-toggle="tab">ADJUNTOS</a></li>
                          </ul>
                          <div class="tab-content" id="myTabContent">
                          <div class="tab-pane active" id="submenu0" role="tabpanel" aria-labelledby="home-tab">
                            <div class="box box-body">                                                                              
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES</span>
                                <input id="txt_ficha_personal_nombres" type="text" class="form-control"  
                                value=""/>
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">APELLIDOS</span>
                                <input id="txt_ficha_personal_apellidos" type="text" class="form-control" placeholder="..." value="" />                        
                              </div>                                                 
                            </div>  
                   
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA DE NACIMIENTO</span>
                                <input id="txt_ficha_personal_nacimiento" type="date" class="form-control"  
                                value=""/>
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">LUGAR DE NACIMIENTO</span>
                                <input id="txt_ficha_personal_lugar" type="text" class="form-control" placeholder="..." value="" />                        
                              </div>                                                 
                            </div>  
                    <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">                             
                                <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;padding-right: 81px;">DEPARTAMENTO</span>
                              <select id="select_Ficha_Personal_departamento_g" class="form-control selectpicker">
                              <option value="-1">Selecciona...</option>
                              </select>
                              <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;padding-right: 81px;">PROVINCIA</span>
                              <select id="select_Ficha_Personal_provincia_g" class="form-control selectpicker">
                              <option value="-1">Selecciona...</option>
                              </select>
                              <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;padding-right: 81px;">DISTRITO</span>
                              <select id="select_Ficha_Personal_distrito_g" class="form-control selectpicker">
                              <option value="-1">Selecciona...</option>
                              </select>                   
                              </div>                                                 
                            </div>  
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DNI</span>
                                <input id="txt_ficha_personal_dni" type="number" class="form-control"  
                                value=""/>
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TELÉFONO FIJO</span>
                                <input id="txt_ficha_personal_telefono" type="number" class="form-control" placeholder="..." value="" />        
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CELULAR</span>
                                <input id="txt_ficha_personal_celular" type="number" class="form-control" placeholder="..." value="" />                        
                              </div>                                                 
                            </div>  
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DOMICILIO</span>
                                <input id="txt_ficha_personal_domicilio" type="text" class="form-control"  
                                value=""/>                                           
                              </div>                                                 
                            </div>  
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">URBANIZACIÓN</span>
                                <input id="txt_ficha_personal_ubanizacion" type="text" class="form-control"  
                                value=""/>
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DISTRITO</span>
                                <input id="txt_ficha_personal_distrito" type="text" class="form-control" placeholder="..." value="" />                                       
                              </div>                                                 
                            </div>  
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                  <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ESTADO CIVIL</span>
                                  <select id="txt_ficha_personal_civil" class="form-control ">
                                    <option value="-1">Selecciona...</option>
                                    <option value="0">Casado (a)</option>
                                    <option value="1">Soltero (a)</option>
                                    <option value="2">Divorciado (a)</option>
                                    <option value="3">Viudo (a)</option>                                    
                                </select>                                
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">EDAD</span>
                                <input id="txt_ficha_personal_edad" type="text" class="form-control" placeholder="..." value="" />             
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Nº HIJOS</span>
                                <input id="txt_ficha_personal_n_hijos" type="text" class="form-control" placeholder="..." value="" />                                         
                              </div>                                                 
                            </div>  
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">SEXO</span>
                                <input id="txt_ficha_personal_sexo" type="number" class="form-control"  
                                value=""/>
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TALLA</span>
                                <input id="txt_ficha_personal_talla" type="text" class="form-control" placeholder="..." value="" />             
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CONTEXTURA</span>
                                <input id="txt_ficha_personal_contextura" type="text" class="form-control" placeholder="..." value="" />                                         
                              </div>                                                 
                            </div>  
                          </div>  
                          </div>
                            <div class="tab-pane" id="submenu1" role="tabpanel" aria-labelledby="home-tab">
                            <div class="box box-body">                                                                              
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">RUC</span>
                                <input id="txt_ficha_personal_ruc" type="text" class="form-control"  
                                value=""/>                                            
                              </div>                                                 
                            </div>  
                   
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ESSALUD</span>
                                <input id="txt_ficha_personal_essalud" type="text" class="form-control"  
                                value=""/>
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ONP/AFP</span>
                                <input id="txt_ficha_personal_onp" type="text" class="form-control" placeholder="..." value="" />                        
                              </div>                                                 
                            </div>  
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CUSSPP</span>
                                <input id="txt_ficha_personal_cusspp" type="text" class="form-control"  
                                value=""/>
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA DE AFILIACIÓN</span>
                                <input id="txt_ficha_personal_fecha_afiliacion" type="date" class="form-control" placeholder="..." value="" />                                       
                              </div>                                                 
                            </div>                                                                                                             
                            </div>
                            </div>
                            <div class="tab-pane" id="submenu2" role="tabpanel" aria-labelledby="profile-tab">  
                               <div class="box box-body">                                                              <div class="form-group" style="margin-bottom:5px;">
                                <div class="input-group">
                                  <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PROFESIÓN</span>
                                  <button class="btn btn-primary"  type="button" onclick="addFichaPersonalProfesion();"><i class="fa fa-plus-circle "
                                  ></i></button>                                                  
                                </div>                                                                   
                            </div>               
                            <div class="box-primary">
                              <div class="box-header no-padding">
                                <div class="box-body table-responsive no-padding">
                                  <table class="datatable table table-striped table-bordered" id="table_FichaPersonalProfesion">
                                    <thead>
                                      <tr>
                                        
                                        <th>Profesión</th>
                                        <th>Estado</th>
                                        <th>Lugar</th>
                                        <th>Ope</th>                                                                                                                                                                             
                                      </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                           <!--<div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PROFESIÓN</span>
                                <input id="txt_ficha_personal_profesion" type="text" class="form-control"  
                                value=""/>
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ESTADO</span>
                                <select id="txt_ficha_personal_profesion_estado" class="form-control ">
                                  <option value="-1">Selecciona...</option>
                                  <option value="0">TITULO</option>
                                  <option value="1">BACHILLER</option>                     
                                  <option value="2">EGRESADO</option>                     
                                  <option value="3">CURSANDO</option>                                           
                                  </select> 
                                  <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">LUGAR</span>
                                <input id="txt_ficha_personal_profesion_lugar" type="text" class="form-control"  
                                value=""/>
                              </div>                                                 
                            </div> -->
                            <div class="form-group" style="margin-bottom:5px;">
                                <div class="input-group">
                                  <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TÉCNICA</span>
                                  <button class="btn btn-primary"  type="button" onclick="addFichaPersonalTecnica();"><i class="fa fa-plus-circle "
                                  ></i></button>                                                  
                                </div>                                                                   
                            </div>      
                            <div class="box-primary">
                              <div class="box-header no-padding">
                                <div class="box-body table-responsive no-padding">
                                  <table class="datatable table table-striped table-bordered" id="table_FichaPersonalTecnica">
                                    <thead>
                                      <tr>
                                        
                                        <th>Técnica</th>
                                        <th>Estado</th>
                                        <th>Lugar</th>
                                        <th>Ope</th>                                                                                                                                                                             
                                      </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                            <!--<div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TÉCNICA</span>
                                <input id="txt_entrevistas_nombres" type="text" class="form-control"  
                                value=""/>
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ESTADO</span>
                                <select id="txt_entrevistas_civil" class="form-control ">
                                  <option value="-1">Selecciona...</option>
                                  <option value="0">TITULO</option>                                                     
                                  <option value="1">EGRESADO</option>                     
                                  <option value="2">CURSANDO</option>                                           
                                  </select> 
                                  <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">LUGAR</span>
                                <input id="txt_entrevistas_nombres" type="text" class="form-control"  
                                value=""/>
                              </div>                                                 
                            </div>  -->
                            <div class="form-group" style="margin-bottom:5px;">
                                <div class="input-group">
                                  <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">OTROS ESTUDIOS</span>
                                  <button class="btn btn-primary"  type="button" onclick="addFichaPersonalOtrosEstudios();"><i class="fa fa-plus-circle "
                                  ></i></button>                                                  
                                </div>                                                                   
                            </div>   
                            <div class="box-primary">
                              <div class="box-header no-padding">
                                <div class="box-body table-responsive no-padding">
                                  <table class="datatable table table-striped table-bordered" id="table_FichaPersonalOtrosEstudios">
                                    <thead>
                                      <tr>
                                        
                                        <th>Descripción</th>                                  
                                        <th>Ope</th>                                                                                                                                                                             
                                      </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                            <!--<div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">OTROS ESTUDIOS</span>
                                <input id="txt_entrevistas_nombres" type="text" class="form-control"  
                                value=""/>                                                          
                              </div>                                                 
                            </div>     -->                                                                                                                                
                              </div>                         
                            </div>
                            <div class="tab-pane" id="submenu3" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="box box-body">                                                                         <div class="form-group" style="margin-bottom:5px;">
                                <div class="input-group">
                                  <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">IDIOMAS</span>
                                  <button class="btn btn-primary"  type="button" onclick="addFichaPersonalIdiomas();"><i class="fa fa-plus-circle "
                                  ></i></button>                                                  
                                </div>                                                                   
                            </div>   
                            <div class="box-primary">
                              <div class="box-header no-padding">
                                <div class="box-body table-responsive no-padding">
                                  <table class="datatable table table-striped table-bordered" id="table_FichaPersonalIdiomas">
                                    <thead>
                                      <tr>
                                        
                                        <th>Idioma</th>                                  
                                        <th>Nivel</th>  
                                        <th>Ope</th>                                                                                                                                                                             
                                      </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>                                                                     
                          <!--  <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">IDIOMAS</span>
                                <select id="txt_entrevistas_civil" class="form-control ">
                                  <option value="-1">Selecciona...</option>
                                  <option value="0">ESPAÑOL</option>
                                  <option value="1">INGLES</option>                     
                                  <option value="2">PORTUGUES</option>                     
                                  <option value="3">GRANCES</option>                                           
                                  </select> 
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NIVEL</span>
                                <select id="txt_entrevistas_civil" class="form-control ">
                                  <option value="-1">Selecciona...</option>
                                  <option value="0">BASICO</option>
                                  <option value="1">INTERMEDIO</option>                     
                                  <option value="2">AVANZADO</option>                                                                                       
                                  </select> 
                                  
                              </div>                                                 
                            </div>  -->
                                                                                                                                 
                              </div>    
                            </div>               
                            <div class="tab-pane" id="submenu4" role="tabpanel" aria-labelledby="contact-tab">

                            <div class="box box-body">                                                                                                                                             
                           <!-- <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PERSONA DE REFERENCIA</span>
                                <input id="txt_entrevistas_nombres" type="text" class="form-control"  
                                value=""/>
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CARGO</span>
                                <input id="txt_entrevistas_nombres" type="text" class="form-control"  
                                value=""/>
                                 
                              </div>                                                 
                            </div>  
                   
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                              <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TELEFONO</span>
                                <input id="txt_entrevistas_nombres" type="text" class="form-control"  
                                value=""/>
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">EMPRESA</span>
                                <input id="txt_entrevistas_nombres" type="text" class="form-control"  
                                value=""/>
                              </div>                                                 
                            </div>                                                         -->                                                 <div class="form-group" style="margin-bottom:5px;">
                                <div class="input-group">
                                  <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">REFERENCIA</span>
                                  <button class="btn btn-primary"  type="button" onclick="addFichaPersonalReferencia();"><i class="fa fa-plus-circle "
                                  ></i></button>                                                  
                                </div>                                                                   
                            </div>   
                            <div class="box-primary">
                              <div class="box-header no-padding">
                                <div class="box-body table-responsive no-padding">
                                  <table class="datatable table table-striped table-bordered" id="table_FichaPersonalReferencia">
                                    <thead>
                                      <tr>
                                        
                                <th>Nombre</th>                                  
                                        <th>Cargo</th>  
                                        <th>Telefono</th> 
                                        <th>Empresa</th> 
                                        <th>Ope</th>                                                                                                                                                                             
                                      </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>                                                          
                              </div> 

                            </div>
                            <div class="tab-pane" id="submenu5" role="tabpanel" aria-labelledby="contact-tab">

                            <div class="box box-body">                                                                                                                                             
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES</span>
                                <input id="txt_ficha_personal_fecha_conyuge_nombre" type="text" class="form-control"  
                                value=""/>                               
                                  <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">APELLIDOS</span>
                                <input id="txt_ficha_personal_fecha_conyuge_apellido" type="text" class="form-control"  
                                value=""/>
                              </div>                                                 
                            </div>  
                   
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA</span>
                                <input id="txt_ficha_personal_fecha_conyuge_fecha" type="text" class="form-control"  
                                value=""/>
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">LUGAR DE NACIMIENTO</span>
                                <input id="txt_ficha_personal_fecha_conyuge_lugar" type="text" class="form-control"  
                                value=""/>
                                  <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">EDAD</span>
                                <input id="txt_ficha_personal_fecha_conyuge_edad" type="text" class="form-control"  
                                value=""/>
                              </div>                                                 
                            </div>  

                        <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">                             
                                <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;padding-right: 81px;">DEPARTAMENTO</span>
                              <select id="select_Ficha_Personal_departamento_conyuge_g" class="form-control selectpicker">
                              <option value="-1">Selecciona...</option>
                              </select>
                              <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;padding-right: 81px;">PROVINCIA</span>
                              <select id="select_Ficha_Personal_provincia_conyuge_g" class="form-control selectpicker">
                              <option value="-1">Selecciona...</option>
                              </select>
                              <span class="input-group-addon" title="Prioridad" style="background:#EEEEEE;font-weight:bold;padding-right: 81px;">DISTRITO</span>
                              <select id="select_Ficha_Personal_distrito_conyuge_g" class="form-control selectpicker">
                              <option value="-1">Selecciona...</option>
                              </select>                   
                              </div>                                                 
                            </div> 
                       <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DNI</span>
                                <input id="select_Ficha_Personal_dni_conyuge" type="text" class="form-control"  
                                value=""/>   
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">RUC</span>
                                <input id="select_Ficha_Personal_ruc_conyuge" type="number" class="form-control"  
                                value=""/>                                                                               
                              </div>                                                 
                            </div>                                                                          <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PROFESIÓN</span>
                                <input id="select_Ficha_Personal_profesion_conyuge" type="text" class="form-control"  
                                value=""/>   
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">OCUPACIÓN</span>
                                <input id="select_Ficha_Personal_ocupacion_conyuge" type="text" class="form-control"  
                                value=""/>  
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CENTRO DE TRABAJO ACTUAL</span>
                                <input id="select_Ficha_Personal_centro_conyuge" type="text" class="form-control"  
                                value=""/>                                                
                              </div>                                                 
                            </div>          
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DIRECCIÓN</span>
                                <input id="select_Ficha_Personal_direccion_conyuge" type="text" class="form-control"  
                                value=""/>   
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TELÉFONO</span>
                                <input id="select_Ficha_Personal_telefono_conyuge" type="number" class="form-control"  
                                value=""/>  
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CELULAR</span>
                                <input id="select_Ficha_Personal_celular_conyuge" type="number" class="form-control"  
                                value=""/>                                                
                              </div>                                                 
                            </div>          
                              </div>                         
                            </div>
                           
                            <div class="tab-pane" id="submenu6" role="tabpanel" aria-labelledby="contact-tab">

                            <div class="box box-body">                                                                                                                                <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PADRE</span>
                                                           
                                 
                              </div>                                                 
                            </div>     
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES</span>
                                <input id="txt_Ficha_Personal_padre_nombre" type="text" class="form-control"  
                                value=""/>                               
                                  <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">APELLIDOS</span>
                                <input id="txt_Ficha_Personal_padre_apellido" type="text" class="form-control"  
                                value=""/>
                              </div>                                                 
                            </div>  
                   
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CENTRO DE TRABAJO</span>
                                <input id="txt_Ficha_Personal_padre_centro" type="text" class="form-control"  
                                value=""/>
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">OCUPACIÓN</span>
                                <input id="txt_Ficha_Personal_padre_ocupacion" type="text" class="form-control"  
                                value=""/>                                 
                              </div>                                                 
                            </div>  
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DIRECCIÓN</span>
                                <input id="txt_Ficha_Personal_padre_direccion" type="text" class="form-control"  
                                value=""/>   
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TELÉFONO</span>
                                <input id="txt_Ficha_Personal_padre_telefono" type="text" class="form-control"  
                                value=""/>  
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CELULAR</span>
                                <input id="txt_Ficha_Personal_padre_celular" type="text" class="form-control"  
                                value=""/>                                                
                              </div>                                                 
                            </div>                                                                                                                                                                                                             <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">MADRE</span>
                                                           
                                 
                              </div>                                                 
                            </div>     
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES</span>
                                <input id="txt_Ficha_Personal_madre_nombres" type="text" class="form-control"  
                                value=""/>                               
                                  <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">APELLIDOS</span>
                                <input id="txt_Ficha_Personal_madre_apellidos" type="text" class="form-control"  
                                value=""/>
                              </div>                                                 
                            </div>  
                   
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CENTRO DE TRABAJO</span>
                                <input id="txt_Ficha_Personal_madre_centro" type="text" class="form-control"  
                                value=""/>
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">OCUPACIÓN</span>
                                <input id="txt_Ficha_Personal_madre_ocupacion" type="text" class="form-control"  
                                value=""/>                                 
                              </div>                                                 
                            </div>  
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DIRECCIÓN</span>
                                <input id="txt_Ficha_Personal_madre_direccion" type="text" class="form-control"  
                                value=""/>   
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TELÉFONO</span>
                                <input id="txt_Ficha_Personal_madre_telefono" type="text" class="form-control"  
                                value=""/>  
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CELULAR</span>
                                <input id="txt_Ficha_Personal_madre_celular" type="text" class="form-control"  
                                value=""/>                                                
                              </div>                                                 
                            </div>      
                              </div>  



                            </div>
                            <div class="tab-pane" id="submenu7" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="box box-body">    
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">HIJOS</span>
                                <button class="btn btn-primary"  type="button" onclick="addChildren();"><i class="fa fa-plus-circle "
                                ></i></button>                                                  
                              </div>                                                                    
                          </div>
                          <div class="box-primary">
                            <div class="box-header no-padding">
                              <div class="box-body table-responsive no-padding">
                                <table class="datatable table table-striped table-bordered" id="table_children_personas">
                                  <thead>
                                    <tr>
                                      
                                      <th>Nombres</th>
                                      <th>Apellidos</th>
                                      <th>Fecha de Nacimiento</th>
                                      <th>Edad</th>
                                      <th>Sexo</th>
                                      <th>DNI</th>
                                      <th>Ope</th>                                                                                                                                                                          
                                    </tr>
                                  </thead>
                                  <tbody>

                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                            </div>
                            </div>
                            <div class="tab-pane" id="submenu8" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="box box-body">                                                                                                                       
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES</span>
                                <input id="txt_Ficha_Personal_referencia_nombre" type="text" class="form-control"  
                                value=""/>                               
                                  <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">APELLIDOS</span>
                                <input id="txt_Ficha_Personal_referencia_apellido" type="text" class="form-control"  
                                value=""/>                               
                              </div>                                                 
                            </div>  
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">                               
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PARENTESCO</span>
                                <input id="txt_Ficha_Personal_referencia_parentesco" type="text" class="form-control"  
                                value=""/>
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TELÉFONOS</span>
                                <input id="txt_Ficha_Personal_referencia_telefono" type="text" class="form-control"  
                                value=""/>                               
                              </div>                                                 
                            </div>                                                                                                                                                                                                                                         
                              </div>  
                            </div>
                            <div class="tab-pane" id="submenu9" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="box box-body">                                                           
                              <div class="box-primary" style="margin-top:10px;margin-bottom:10px">
                        <div class="box-header no-padding">
                          <div class="box-body table-responsive no-padding">
                            <table class="datatable table table-striped table-bordered" id="table_Ficha_Personal_movilidad">
                              <thead>
                                <tr>                               
                                  <th></th>
                                  <th>SI</th>                                                     <th>NO</th>      
                                </tr>
                              </thead>
                              <body>
                                <tr>                                 
                                  <td>POSEE MOVILIDAD PROPIA</td>
                                  <td><input class="form-check-input check_Ficha_Personal_movilidad" type="radio" name="CMP_1" id="1"> </td>
                                  <td><input class="form-check-input check_Ficha_Personal_movilidad" type="radio" name="CMP_1" id="0"></td>  
                                </tr>                            
                              </body>
                            </table>
                          </div>
                        </div>
                      </div>                                             
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Nº DE LICENCIA DE CONDUCIR</span>
                                <input id="check_Ficha_Personal_licencia" type="text" class="form-control"  
                                value=""/>                               
                                  <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TIPO DE VEHICULO</span>
                                <input id="check_Ficha_Personal_tipo_vehiculo" type="text" class="form-control"  
                                value=""/>                               
                              </div>                                                 
                            </div>  
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">                               
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">MARCA</span>
                                <input id="check_Ficha_Personal_tipo_marca" type="text" class="form-control"  
                                value=""/>
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">AÑO</span>
                                <input id="check_Ficha_Personal_tipo_anio" type="text" class="form-control"  
                                value=""/>
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PLACA</span>
                                <input id="check_Ficha_Personal_tipo_placa" type="text" class="form-control"  
                                value=""/>
                              </div>                                                 
                            </div>  
                   
                                                                                                                                                                                                                        
                              </div>  

                            </div>
                            <div class="tab-pane" id="submenu10" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="box box-body">                                                                  <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                                <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">POLICIALES Y/O PENAL</span>                                                            
                              </div>                                                 
                            </div>                                                  
                            <div class="box-primary" style="margin-top:10px">
                        <div class="box-header no-padding">
                          <div class="box-body table-responsive no-padding">
                            <table class="datatable table table-striped table-bordered" id="">
                              <thead>
                                <tr>                               
                                  <th>Nº</th>
                                  <th></th>    
                                  <th></th>      
                                </tr>
                              </thead>
                              <body>
                                <tr>                                 
                                  <td>1</td>
                                  <td>Ha sido detenido y/o enjuiciado en alguna oportunidad </td>
                                  <td> <input id="Ficha_Personal_antecedentes_1" type="text" class="form-control"  
                        value=""/></td>  
                                </tr>   
                                <tr>                                 
                                  <td>2</td>
                                  <td>Dependencia Policial donde sufrió la detención </td>
                                  <td> <input id="Ficha_Personal_antecedentes_2" type="text" class="form-control"  
                        value=""/></td>  
                                </tr>   
                                <tr>                                 
                                  <td>3</td>
                                  <td>Juzgado que vió su caso </td>
                                  <td><input id="Ficha_Personal_antecedentes_3" type="text" class="form-control"  
                        value=""/> </td>  
                                </tr>     
                                <tr>                                 
                                  <td>4</td>
                                  <td>Motivo </td>
                                  <td><input id="Ficha_Personal_antecedentes_4" type="text" class="form-control"  
                        value=""/> </td>  
                                </tr>                            
                              </body>
                            </table>
                          </div>
                        </div>
                      </div>  
                      

                              </div>  
                         
                            </div>
                            <div class="tab-pane" id="submenu11" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="box box-body">                                                           
                                                                   
                            <div class="form-group" style="margin-bottom:5px;">
                              <div class="input-group">
                              <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DNI</span>
  <input class="form-control" type="file" id="formFile">                       
                                              
                              </div>      
                              <div class="input-group">
                                                  
  <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PARTIDA DE NACIMIENTO</span>
  <input class="form-control" type="file" id="formFile">                                                      
                              </div>     
                              <div class="input-group">
                              <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">LICENCIA DE CONDUCIR</span>
  <input class="form-control" type="file" id="formFile">                       
   
                                                     
                              </div>      
                              <div class="input-group">
                                                 
  <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">EXÁMEN MÉDICO</span>
  <input class="form-control" type="file" id="formFile">   
                                                     
                              </div>    
                              <div class="input-group">
                              <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CERTIFICADO DE ANTECEDENTES PENALES</span>
  <input class="form-control" type="file" id="formFile">                       

                                                     
                              </div>       
                              <div class="input-group">
                                                  
  <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CERTIFICADO DE ANTECEDENTES POLICIALES</span>
  <input class="form-control" type="file" id="formFile">   
                                                     
                              </div>        
                              <div class="input-group">
                              <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DNI HIJOS</span>
  <input class="form-control" type="file" id="formFile">                       
                                          
                              </div>     
                              <div class="input-group">
                                                    
  <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DNI ESPOSA</span>
  <input class="form-control" type="file" id="formFile">   
                                              
                              </div>   
                              <div class="input-group">                             
  <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ACTA DE MATRIMONIO</span>
  <input class="form-control" type="file" id="formFile">                                            
                              </div>                                         
                            </div>      
                          
                   
                                                                                                                                                                                                                        
                              </div>  
                              <div class="btn-group" role="group" aria-label="Basic example" style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">                    
                     
                     <button type="button" class="btn btn-success" >Guardar</button>                                            
                   <!-- <button type="button" class="btn btn-warning">Editar</button>                                             -->                                                                    
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

<script src="pages/catalogos/personas/personas.js"></script>
<script>
  $(document).ready(function(){    
    var ubigeo = window.ubigeo


 
      $('#txt_fecha_g_personas').val(new Date().toISOString().slice(0, 10));  
      //$('#txt_fecha_g_personas').val(new Date().getHours()+":"+ new Date().getMinutes());
      gridSecondRequerimientos();
      gridEntrevistas();
      gridReferenciaLaboral();
      loadDepartamentos(window.ubigeo,"select_Ficha_Personal_departamento_conyuge_g");
      loadDepartamentos(window.ubigeo,"select_Ficha_Personal_departamento_g");

      $('#select_Ficha_Personal_departamento_g').change(function() {  
        var $option = $(this).find('option:selected');
        var value = $option.val();//to get content of "value" attrib
        console.log(value)
        $('#select_Ficha_Personal_provincia_g option').remove();
        $('#select_Ficha_Personal_provincia_g').append($("<option>", { 
          value: "-1",
          text : "Selecciona..." ,
          //selected:item.value===value?true:false
      }));
        $.each(ubigeo.provincias[value], function (i, item) {
      //console.log(item.value)

   
      $('#select_Ficha_Personal_provincia_g').append($("<option>", { 
          value: item.id_ubigeo,
          text : item.nombre_ubigeo ,
          //selected:item.value===value?true:false
      }));
    });
  })
  $('#select_Ficha_Personal_departamento_conyuge_g').change(function() {  
        var $option = $(this).find('option:selected');
        var value = $option.val();//to get content of "value" attrib
        console.log(value)
        $('#select_Ficha_Personal_provincia_conyuge_g option').remove();
        $('#select_Ficha_Personal_provincia_conyuge_g').append($("<option>", { 
          value: "-1",
          text : "Selecciona..." ,
          //selected:item.value===value?true:false
      }));
        $.each(ubigeo.provincias[value], function (i, item) {
      //console.log(item.value)

   
      $('#select_Ficha_Personal_provincia_conyuge_g').append($("<option>", { 
          value: item.id_ubigeo,
          text : item.nombre_ubigeo ,
          //selected:item.value===value?true:false
      }));
    });
  })
  $('#select_Ficha_Personal_provincia_conyuge_g').change(function() {  
        var $option = $(this).find('option:selected');
        var value = $option.val();//to get content of "value" attrib
        console.log(value)

        $('#select_Ficha_Personal_distrito_conyuge_g option').remove();
        $('#select_Ficha_Personal_distrito_conyuge_g').append($("<option>", { 
          value: "-1",
          text : "Selecciona..." ,
          //selected:item.value===value?true:false
      }));
        $.each(ubigeo.distritos[value], function (i, item) {
      //console.log(item.value)
   
      $('#select_Ficha_Personal_distrito_conyuge_g').append($("<option>", { 
          value: item.id_ubigeo,
          text : item.nombre_ubigeo ,
          //selected:item.value===value?true:false
      }));
    });
  })
  $('#select_Ficha_Personal_provincia_g').change(function() {  
        var $option = $(this).find('option:selected');
        var value = $option.val();//to get content of "value" attrib
        console.log(value)

        $('#select_Ficha_Personal_distrito_g option').remove();
        $('#select_Ficha_Personal_distrito_g').append($("<option>", { 
          value: "-1",
          text : "Selecciona..." ,
          //selected:item.value===value?true:false
      }));
        $.each(ubigeo.distritos[value], function (i, item) {
      //console.log(item.value)
   
      $('#select_Ficha_Personal_distrito_g').append($("<option>", { 
          value: item.id_ubigeo,
          text : item.nombre_ubigeo ,
          //selected:item.value===value?true:false
      }));
    });
  })
  });
</script>

