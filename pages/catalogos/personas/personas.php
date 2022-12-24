<!-- ztree treeview -->
<link rel="stylesheet" href="libs/ztree/css/ztreestyle.css" />
<script src="libs/ztree/js/jquery.ztree.core.js"></script>

<!-- bootstrap datepicker -->
<link rel="stylesheet" href="libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="libs/moment/min/moment.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/locale/es.js"></script>

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
#gridRequerimientoshtml_filter,
#grd01ProgramacionCapacitacion_filter,
#grd01FichaPersonal_filter,
#grd01EntrevistaHistorial_filter {
    display: none;
}

.error {
    color: #ff2424;
    font-size: 10px;
}
</style>
<section class="content-header">

    <h1><i class="fa fa-tasks"></i> </h1>
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
                        <li role="presentation" class="dropdown active">
                            <a href="#" id="dropdowngestionpersonas" class="dropdown-toggle" data-toggle="dropdown"
                                aria-controls="dropdowngestionpersonas-contents"><i class="fa fa-dropbox "></i> Gestión
                                de personas
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdowngestionpersonas"
                                id="dropdowngestionpersonas-contents">
                                <li class="active" title="Inventario"><a href="#HistorialRequerimientosPersonas"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i>Historial de requerimientos</a>
                                </li>
                                <li class="" title="Inventario"><a href="#NuevoRegistroPersonas" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>Nuevo requerimiento</a>
                                </li>
                            </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                            <a href="#" id="dropdownentrevistapersonal" class="dropdown-toggle" data-toggle="dropdown"
                                aria-controls="dropdownentrevistapersonal-contents"><i class="fa fa-dropbox"></i> Ficha
                                de entrevista de personal
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownentrevistapersonal"
                                id="dropdownentrevistapersonal-contents">
                                <li class="" title="Inventario"><a href="#HistorialEntrevistaPersonas"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i>Historial de entrevistas</a>
                                </li>
                                <li class="" title="Inventario"><a href="#NuevoRegistroEntrevistaPersonas"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i>Nuevo registro</a>
                                </li>
                            </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                            <a href="#" id="dropdownverificacionreferenciapersonal" class="dropdown-toggle"
                                data-toggle="dropdown"
                                aria-controls="dropdownverificacionreferenciapersonal-contents"><i
                                    class="fa fa-dropbox"></i> Ver. de Referencia Laboral
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownverificacionreferenciapersonal"
                                id="dropdownverificacionreferenciapersonal-contents">
                                <li class="" title="Inventario"><a href="#HistorialReferenciaLaboral"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i>Historial de Referencia
                                        Laboral</a>
                                </li>
                                <li class="" title="Inventario"><a href="#NuevoRegistroReferenciaLaboral"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i>Nuevo Referencia Laboral</a>
                                </li>
                            </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                            <a href="#" id="dropdownfichapersonal" class="dropdown-toggle" data-toggle="dropdown"
                                aria-controls="dropdownfichapersonal-contents"><i class="fa fa-dropbox"></i> Ficha de
                                Personal
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownfichapersonal"
                                id="dropdownfichapersonal-contents">
                                <li class="" title="Inventario"><a href="#HistorialFichaPersonal" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>Historial de Ficha Personal</a>
                                </li>
                                <li class="" title="Inventario"><a href="#NuevoRegistroFichaPersonal"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i>Nuevo Ficha Personal</a>
                                </li>
                            </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                            <a href="#" id="dropdownseguimientoprogramacion" class="dropdown-toggle"
                                data-toggle="dropdown" aria-controls="dropdownseguimientoprogramacion-contents"><i
                                    class="fa fa-dropbox"></i> Seg. y prog. de capacitación
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownseguimientoprogramacion"
                                id="dropdownseguimientoprogramacion-contents">
                                <li class="" title="Inventario"><a href="#HistorialProgramaCapacitacion"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i>Historial de Capacitaciones</a>
                                </li>
                                <li class="" title="Inventario"><a href="#NuevoProgramaCapacitacion"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i>Nuevo Registro de Capacitaciones</a>
                                </li>
                            </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                            <a href="#" id="dropdownRequerimientoCompra" class="dropdown-toggle" data-toggle="dropdown"
                                aria-controls="dropdownRequerimientoCompra-contents"><i class="fa fa-dropbox"></i>
                                Requerimiento
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownRequerimientoCompra"
                                id="dropdownRequerimientoCompra-contents">
                                <li class="" title="Inventario"><a href="#HistorialRequerimientos" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>Historial de Requerimientos</a>
                                </li>
                                <li class="" title="Inventario"><a href="#NuevoRegistroRequerimientos"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i>Nuevo Requerimiento</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="HistorialRequerimientosPersonas">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="RegistroRequerimientosPersonasSearch">
                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="0" type="text" class="form-control"
                                                    placeholder="Buscar por area" />
                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="1" type="text" class="form-control"
                                                    placeholder="Buscar por cargo" />

                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="4" type="text" class="form-control"
                                                    placeholder="Buscar por motivo" />

                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="5" type="text" class="form-control"
                                                    placeholder="Buscar por estado" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-primary" style="width:100%">
                                        <div class="box-header no-padding">
                                            <div class="box-body table-responsive no-padding">
                                                <table style="width:100%"
                                                    class="datatable table table-striped table-bordered text-xl"
                                                    id="grd01RequerimientosHistorial">
                                                    <thead>
                                                        <tr>

                                                            <th>AREA</th>
                                                            <th>CARGO</th>
                                                            <th>VACANTES</th>
                                                            <th>ASIGNADOS</th>
                                                            <th>MOTIVO</th>
                                                            <th>ESTADO</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="NuevoRegistroPersonas">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div style="display:flex;">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold; width:200px">SOLICITANTE</span>
                                                <div style="display:flex">
                                                    <input id="txt_search_solicitante" type="text" class="form-control"
                                                        placeholder="Buscar por DNI para Ingresar" value="" />
                                                    <input type="hidden" id="idsolicitanteHidden" name="" value="">
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 30px;">
                                                        <button type="button" class="fa fa-search" aria-hidden="true"
                                                            onclick="searchSolicitante();"></button></span>
                                                </div>
                                            </div>
                                            <div class="input-group" style="margin-top:20px;">

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES
                                                    DEL SOLICITANTE</span>
                                                <input id="txt_solicitante_nombres" type="text" class="form-control"
                                                    placeholder="..." value="" disabled />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">APELLIDOS
                                                    DEL SOLICITANTE</span>
                                                <input id="txt_solicitante_apellidos" type="text" class="form-control"
                                                    placeholder="..." value="" disabled />
                                            </div>
                                        </div>
                                        <!--<div class="form-group" style="margin-bottom:5px;">
                                            <span class="input-group-addon text-xl" title="Expositor"
                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Solicitante</span>
                                            <div style="display:flex">
                                                <input id="txt_search_solicitante" type="text" class="form-control"
                                                    placeholder="Ingrese DNI" value="" />
                                                <input type="hidden" id="idsolicitanteHidden" name="" value="">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                    <button class="fa fa-search" type="button" aria-hidden="true"
                                                        onclick="searchSolicitante();"></button></span>
                                            </div>
                                            <div class="input-group">

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES</span>
                                                <input id="txt_solicitante_nombres" type="text" class="form-control"
                                                    placeholder="..." value="" disabled />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">APELLIDOS</span>
                                                <input id="txt_solicitante_apellidos" type="text" class="form-control"
                                                    placeholder="..." value="" disabled />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DNI</span>
                                                <input id="txt_solicitante_dni" type="text" class="form-control"
                                                    placeholder="..." value="" disabled />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PRETENCION
                                                    SALARIAL</span>
                                                <input id="txt_solicitante_pretencion_salarial" type="text"
                                                    class="form-control" placeholder="..." value="" disabled />
                                            </div>
                                        </div>-->
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CARGO</span>
                                                <select id="txt_cargo_personas" class="form-control ">
                                                    <option value="-1">Selecciona...</option>
                                                </select>
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">N°
                                                    DE VACANTES</span>
                                                <input id="txt_n_vacantes_personas" type="number" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">AREA</span>
                                                <select id="personas_select_area" class="form-control ">
                                                    <option value="-1">Selecciona...</option>
                                                </select>
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                    PLAZO DE CONTRATO</span>
                                                <select id="personas_select_contrato" class="form-control ">
                                                    <option value="-1">Selecciona...</option>
                                                    <option value="1">Permanente</option>
                                                    <option value="2">Temporal</option>
                                                    <option value="3">Otro</option>
                                                </select>
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                    MOTIVO DEL PEDIDO</span>
                                                <select id="personas_select_motivo" class="form-control">
                                                    <option value="-1">Selecciona...</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group"
                                            style="margin-bottom:5px;margin-top:10px;margin-bottom:10px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="font-weight:bold;text-align:left;">CONDICIONES DEL
                                                    PUESTO</span>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">LUGAR
                                                    DEL TRABAJO</span>
                                                <select id="personas_select_lugar" class="form-control selectpicker">
                                                    <option value="-1">Selecciona...</option>

                                                </select>
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DURACIÓN
                                                    ESTIMADA</span>
                                                <input id="personas_select_duracion" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">(meses)</span>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA
                                                    INCORPORACIÓN</span>
                                                <input id="txt_fecha_g_personas" type="date" class="form-control"
                                                    value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">REMUNERACIÓN
                                                    A OFRECER</span>
                                                <input id="personas_remuneracion" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">OBSERVACIONES</span>
                                                <button class="bg-cyan-500 py-4 px-4 text-white" type="button"
                                                    onclick="addObservacionespersonas();"><i
                                                        class="fa fa-plus-circle "></i></button>
                                            </div>
                                        </div>
                                        <div class="box-primary">
                                            <div class="box-header no-padding">
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="datatable table table-striped table-bordered text-xl"
                                                        id="table_observaciones_personas">
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
                                        <div class="btn-group" role="group" aria-label="Basic example"
                                            style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                            <button type="button" class="bg-emerald-500 py-4 px-2 text-white"
                                                onclick="insert_registro_personas();">Guardar</button>
                                            <!-- <button type="button" class="btn btn-warning">Editar</button>                                             -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="HistorialEntrevistaPersonas">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="RegistroEntrevistaPersonasSearch">
                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="1" type="text" class="form-control"
                                                    placeholder="Buscar por nombres" />
                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="2" type="text" class="form-control"
                                                    placeholder="Buscar por dni" />

                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="3" type="text" class="form-control"
                                                    placeholder="Buscar por Estado" />

                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-primary" style="width:100%">
                                        <div class="box-header no-padding">
                                            <div class="box-body table-responsive no-padding">
                                                <table style="width:100%"
                                                    class="datatable table table-striped table-bordered text-xl"
                                                    id="grd01EntrevistaHistorial">
                                                    <thead>
                                                        <tr>
                                                            <th>ITEM</th>
                                                            <th>NOMBRES Y APELLIDOS</th>
                                                            <th>DNI</th>
                                                            <th>ESTADO</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="NuevoRegistroEntrevistaPersonas">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl font-bold" title="Expositor"
                                                    style="background:#EEEEEE;padding-right: 52px;">NOMBRES</span>
                                                <input id="txt_entrevistas_nombres" type="text" class="form-control"
                                                    value="" />
                                                <span class="input-group-addon text-xl  font-bold" title="Expositor"
                                                    style="background:#EEEEEE;padding-right: 52px;">APELLIDOS</span>
                                                <input id="txt_entrevistas_apellidos" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>

                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DNI</span>
                                                <input id="txt_entrevistas_dni" type="number" class="form-control"
                                                    value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">EDAD</span>
                                                <input id="txt_entrevistas_edad" type="number" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA
                                                    DE NACIMIENTO</span>
                                                <input id="txt_entrevistas_fecha" type="date" class="form-control"
                                                    value="" />
                                                <!--   <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ESTADO
                                                    CIVIL</span>
                                                <select id="txt_entrevistas_civil" class="form-control text-xl">
                                                    <option value="-1">Selecciona...</option>
                                                    <option value="0">CASADO</option>
                                                    <option value="1">SOLTERO</option>
                                                    <option value="2">VIUDO</option>
                                                    <option value="3">DIVORCIADO</option>
                                                    <option value="4">CONVIVIENTE</option>
                                                </select>-->
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CORREO
                                                    ELECTRONICO</span>
                                                <input id="txt_entrevistas_correo" type="text" class="form-control"
                                                    value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TELEFONO</span>
                                                <input id="txt_entrevistas_telefono" type="number" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PUESTO
                                                    AL QUE POSTULA</span>
                                                <select id="txt_entrevistas_puesto" class="form-control ">
                                                    <option value="-1">Selecciona...</option>
                                                </select>                                                
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PRETENCIONES
                                                    SALARIALES</span>
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">S/.</span>
                                                <input id="txt_entrevistas_pretenciones" type="number"
                                                    class="form-control" placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">

                                            <span class="input-group-addon text-xl" title="Expositor"
                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">SISTEMA
                                                DE GESTION</span>
                                        </div>
                                        <div class="box-primary">
                                            <div class="box-header no-padding">
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="datatable table table-striped table-bordered text-xl"
                                                        id="sistemaGestionEnbtrevista">
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
                                                                <td><input
                                                                        class="form-check-input check_gestion_entrevista"
                                                                        type="radio" name="S_1" id="3"></td>
                                                                <td><input
                                                                        class="form-check-input check_gestion_entrevista"
                                                                        type="radio" name="S_1" id="2"></td>
                                                                <td><input
                                                                        class="form-check-input check_gestion_entrevista"
                                                                        type="radio" name="S_1" id="1"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Formación</td>
                                                                <td><input
                                                                        class="form-check-input check_gestion_entrevista"
                                                                        type="radio" name="S_2" id="3"></td>
                                                                <td><input
                                                                        class="form-check-input check_gestion_entrevista"
                                                                        type="radio" name="S_2" id="2"></td>
                                                                <td><input
                                                                        class="form-check-input check_gestion_entrevista"
                                                                        type="radio" name="S_2" id="1"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>Experiencia</td>
                                                                <td><input
                                                                        class="form-check-input check_gestion_entrevista"
                                                                        type="radio" name="S_3" id="3"></td>
                                                                <td><input
                                                                        class="form-check-input check_gestion_entrevista"
                                                                        type="radio" name="S_3" id="2"></td>
                                                                <td><input
                                                                        class="form-check-input check_gestion_entrevista"
                                                                        type="radio" name="S_3" id="1"></td>
                                                            </tr>
                                                        </body>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">

                                            <span class="input-group-addon text-xl" title="Expositor"
                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">OTROS
                                                (ADICIONALES)</span>
                                        </div>
                                        <div class="box-primary">
                                            <div class="box-header no-padding">
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="datatable table table-striped table-bordered text-xl"
                                                        id="sistemaGestionEnbtrevistaOtros">
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
                                                                <td><input
                                                                        class="form-check-input check_otros_entrevistas"
                                                                        type="radio" name="O_1" id="3"></td>
                                                                <td><input
                                                                        class="form-check-input check_otros_entrevistas"
                                                                        type="radio" name="O_1" id="2"></td>
                                                                <td><input
                                                                        class="form-check-input check_otros_entrevistas"
                                                                        type="radio" name="O_1" id="1"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Capacidad de comunicación (Se comunica
                                                                    adecuadamente)</td>
                                                                <td><input
                                                                        class="form-check-input check_otros_entrevistas"
                                                                        type="radio" name="O_2" id="3"></td>
                                                                <td><input
                                                                        class="form-check-input check_otros_entrevistas"
                                                                        type="radio" name="O_2" id="2"></td>
                                                                <td><input
                                                                        class="form-check-input check_otros_entrevistas"
                                                                        type="radio" name="O_2" id="1"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>Expresión verbal y corporal</td>
                                                                <td><input
                                                                        class="form-check-input check_otros_entrevistas"
                                                                        type="radio" name="O_3" id="3"></td>
                                                                <td><input
                                                                        class="form-check-input check_otros_entrevistas"
                                                                        type="radio" name="O_3" id="2"></td>
                                                                <td><input
                                                                        class="form-check-input check_otros_entrevistas"
                                                                        type="radio" name="O_3" id="1"></td>
                                                            </tr>
                                                        </body>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem" >

                                        <button type="button" class="bg-emerald-500 py-4 px-2 text-white" id="button_insert_registro_entrevistas"
                                            onclick="insert_registro_entrevistas();">Guardar</button>
                                        <!-- <button type="button" class="btn btn-warning">Editar</button>                                             -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="HistorialReferenciaLaboral">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="RegistroReferenciaLaboralSearch">
                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="1" type="text" class="form-control"
                                                    placeholder="Buscar por nombres del candidato" />
                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="2" type="text" class="form-control"
                                                    placeholder="Buscar por nombres del referente" />
                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="3" type="text" class="form-control"
                                                    placeholder="Buscar por telefono referente" />
                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="4" type="text" class="form-control"
                                                    placeholder="Busca por nombre de Empresa" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-primary" style="width:100%">
                                        <div class="box-header no-padding">
                                            <div class="box-body table-responsive no-padding">
                                                <table style="width:100%"
                                                    class="datatable table table-striped table-bordered text-xl"
                                                    id="grd01ReferenciaLaboral">
                                                    <thead>
                                                        <tr>
                                                            <th>ITEM</th>
                                                            <th>NOMBRES DEL CANDIDATO</th>
                                                            <th>NOMBRES DEL REFERENTE</th>
                                                            <th>TELEFONO DEL REFERENTE</th>
                                                            <th>EMPRESA DEL REFERENTE</th>
                                                            <!--<th>CARGO DEL REFERENTE</th>-->
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="HistorialRequerimientos">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="searchRequerimientoshtml">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-primary" style="width:100%">
                                        <div class="box-header no-padding">
                                            <div class="box-body table-responsive no-padding">
                                                <table style="width:100%"
                                                    class="datatable table table-striped table-bordered"
                                                    id="gridRequerimientoshtml">
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane" id="NuevoRegistroRequerimientos">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div style="display:flex;">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold; width:200px">SOLICITANTE</span>
                                                <div style="display:flex">
                                                    <input id="txt_search_requerimiento_compra" type="text"
                                                        class="form-control" placeholder="Buscar por DNI para Ingresar"
                                                        value="" />
                                                    <input type="hidden" id="idrequerimientoCompraHidden" name=""
                                                        value="">
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 30px;">
                                                        <button type="button" class="fa fa-search" aria-hidden="true"
                                                            onclick="search_personal_orden_compra();"></button></span>
                                                </div>
                                            </div>
                                            <div class="input-group" style="margin-top:20px;">

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES
                                                    DEL SOLICITANTE</span>
                                                <input id="txt_search_name_requerimientoCompra" type="text"
                                                    class="form-control" placeholder="..." value="" disabled />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">APELLIDOS
                                                    DEL SOLICITANTE</span>
                                                <input id="txt_search_apellido_requerimientoCompra" type="text"
                                                    class="form-control" placeholder="..." value="" disabled />
                                            </div>
                                        </div>
                                        <!--<div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">AREA</span>

                                                <select id="slct_area_requerimiento" class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>
                                                    <option value="0">MANTENIMIENTO
                                                    </option>
                                                    <option value="1">OPERACIONES
                                                    </option>
                                                    <option value="2">GESTION DE PERSONAS
                                                    </option>
                                                    <option value="3">LOGISTICAS
                                                    </option>
                                                    <option value="4">FINANZAS
                                                    </option>
                                                    </option>
                                                </select>                                               
                                            </div>
                                        </div>-->
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA
                                                    DE REQUERIMIENTO</span>
                                                <input id="txt_fecha_requerimiento_requerimiento" type="date"
                                                    class="form-control" placeholder="..." value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CENTRO
                                                    DE COSTOS</span>
                                                <input id="txt_centro_costo_requerimiento" type="text"
                                                    class="form-control" placeholder="..." value="" />

                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px; ">PRIORIDAD</span>
                                                <select id="slct_prioridad_requerimiento" class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>
                                                    <option value="1">BAJA (Atendidas dentro de los 7 días).
                                                    </option>
                                                    <option value="2">MEDIA (Atendidas dentro de las 72).

                                                    </option>
                                                    <option value="3">ALTA (Atendidas dentro de las 48 hrs. (Suministros
                                                        críticos).
                                                    </option>
                                                </select>
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">MOTIVO
                                                    DEL REQUERIMIENTO</span>
                                                <input id="txt_motivo_requerimiento" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ITEM
                                                    DE REQUERIMIENTO</span>
                                                <button class="bg-cyan-500 py-4 px-4 text-white" type="button"
                                                    onclick="addItemRequerimiento('tableItemRequerimiento');"><i
                                                        class="fa fa-plus-circle "></i></button>
                                            </div>
                                        </div>
                                        <div class="box-primary">
                                            <div class="box-header no-padding">
                                                <div class="box-body table-responsive no-padding">

                                                    <table class="datatable table table-striped table-bordered text-xl"
                                                        id="tableItemRequerimiento">
                                                        <thead>
                                                            <tr>

                                                                <th>ITEM</th>
                                                                <th>CODIGO</th>
                                                                <th>Nº DE PARTE</th>
                                                                <th>DESCRIPCION</th>
                                                                <th>CANTIDAD</th>
                                                                <th>UNIDAD MEDIDA</th>                                                               
                                                                <th>OBSERVACION</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                        <button type="button" class="bg-emerald-500 py-4 px-2 text-white"
                                            onclick="add_Requerimientos();">Guardar</button>
                                        <!-- <button type="button" class="btn btn-warning">Editar</button>                                             -->
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane" id="NuevoRegistroReferenciaLaboral">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div style="display:flex;">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold; width:200px">PERSONAL</span>
                                                <div style="display:flex">
                                                    <input id="txt_search_aspirante" type="text" class="form-control"
                                                        placeholder="Buscar por DNI para Ingresar" value="" />
                                                    <input type="hidden" id="idAspiranteHidden" name="" value="">
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 30px;">
                                                        <button type="button" class="fa fa-search" aria-hidden="true"
                                                            onclick="search_personal_reeferencia();"></button></span>
                                                </div>
                                            </div>
                                            <div class="input-group" style="margin-top:20px;">

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES
                                                    DE CANDIDATO</span>
                                                <input id="txt_search_name_aspirante" type="text" class="form-control"
                                                    placeholder="..." value="" disabled />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">APELLIDOS
                                                    DE CANDIDATO</span>
                                                <input id="txt_search_apellido_aspirante" type="text"
                                                    class="form-control" placeholder="..." value="" disabled />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES
                                                    DE REFERENTE</span>
                                                <input id="txt_referencia_laboral_referente_nombres" type="text"
                                                    class="form-control" value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">APELLIDOS
                                                    DE REFERENTE</span>
                                                <input id="txt_referencia_laboral_referente_apellidos" type="text"
                                                    class="form-control" placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TELEFONO</span>
                                                <input id="txt_referencia_laboral_referente_telefono" type="number"
                                                    class="form-control" value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CARGO</span>                                               
                                                <input id="txt_referencia_laboral_referente_cargo" type="text"
                                                    class="form-control" value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">EMPRESA</span>
                                                <input id="txt_referencia_laboral_referente_empresa" type="text"
                                                    class="form-control" value="" />
                                            </div>
                                        </div>

                                        <div class="form-group" style="margin-bottom:5px;">

                                            <span class="input-group-addon text-xl" title="Expositor"
                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PREGUNTAS</span>
                                        </div>
                                        <div class="box-primary">
                                            <div class="box-header no-padding">
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="datatable table table-striped table-bordered text-xl"
                                                        id="ReferenciaLaboralPreguntasCriterio">
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
                                                                <td>¿Recuerda en qué fecha laboro con usted, fue su jefe
                                                                    directo, de qué empresa?</td>
                                                                <td><input id="ReferenciaLaboralPreguntasCriterio_1"
                                                                        type="text" class="form-control" value="" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>¿Qué puesto ocupaba?
                                                                </td>
                                                                <td><input id="ReferenciaLaboralPreguntasCriterio_2"
                                                                        type="text" class="form-control" value="" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>Mencione sus principales cualidades o fortalezas
                                                                </td>
                                                                <td><input id="ReferenciaLaboralPreguntasCriterio_3"
                                                                        type="text" class="form-control" value="" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>Mencione sus principales logros </td>
                                                                <td><input id="ReferenciaLaboralPreguntasCriterio_4"
                                                                        type="text" class="form-control" value="" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>5</td>
                                                                <td>¿Cómo se llevaba con sus compañeros y jefes?</td>
                                                                <td><input id="ReferenciaLaboralPreguntasCriterio_5"
                                                                        type="text" class="form-control" value="" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>6</td>
                                                                <td>¿Cuál considera que es su área de mejora? </td>
                                                                <td><input id="ReferenciaLaboralPreguntasCriterio_6"
                                                                        type="text" class="form-control" value="" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>7</td>
                                                                <td> ¿Cuál fue el motivo de su salida? </td>
                                                                <td><input id="ReferenciaLaboralPreguntasCriterio_7"
                                                                        type="text" class="form-control" value="" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>8</td>
                                                                <td>En el caso lo contraten ¿Qué recomendación le haría
                                                                    a su jefe?</td>
                                                                <td><input id="ReferenciaLaboralPreguntasCriterio_8"
                                                                        type="text" class="form-control" value="" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>9</td>
                                                                <td>¿Si tuviera oportunidad de contratarlo de nuevo lo
                                                                    haría?</td>
                                                                <td><input id="ReferenciaLaboralPreguntasCriterio_9"
                                                                        type="text" class="form-control" value="" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>10</td>
                                                                <td>Observaciones</td>
                                                                <td><input id="ReferenciaLaboralPreguntasCriterio_10"
                                                                        type="text" class="form-control" value="" />
                                                                </td>
                                                            </tr>
                                                        </body>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="box-primary" style="margin-top:10px">
                                            <div class="box-header no-padding">
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="datatable table table-striped table-bordered text-xl"
                                                        id="ReferenciaLaboralPreguntasCriterioRecomienda">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>SI</th>
                                                                <th>NO</th>
                                                            </tr>
                                                        </thead>

                                                        <body>
                                                            <tr>
                                                                <td>Lo recomienda</td>
                                                                <td><input
                                                                        class="form-check-input check_referencia_laboral_recomendaciones"
                                                                        type="radio" name="RL_1" id="1"> </td>
                                                                <td><input
                                                                        class="form-check-input check_referencia_laboral_recomendaciones"
                                                                        type="radio" name="RL_1" id="0"></td>
                                                            </tr>
                                                        </body>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                        <button type="button" class="bg-emerald-500 py-4 px-2 text-white"
                                            onclick="insert_registro_referencia_laboral();">Guardar</button>
                                        <!-- <button type="button" class="btn btn-warning">Editar</button>                                             -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="HistorialFichaPersonal">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="FichaPersonalSearch">
                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="0" type="text" class="form-control"
                                                    placeholder="Buscar por nombres" />
                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="1" type="text" class="form-control"
                                                    placeholder="Buscar por dni" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-primary" style="width:100%">
                                        <div class="box-header no-padding">
                                            <div class="box-body table-responsive no-padding">
                                                <table style="width:100%"
                                                    class="datatable table table-striped table-bordered text-xl"
                                                    id="grd01FichaPersonal">
                                                    <thead>
                                                        <tr>
                                                            <th>NOMBRES Y APELLIDOS</th>
                                                            <th>DNI</th>
                                                            <th>DNI</th>
                                                            <th>LIC. CONDUCIR</th>
                                                            <th>LIC. ESPECIAL</th>
                                                            <th>SCTR</th>
                                                            <th>SEG. DE VIDA</th>
                                                            <th>ANT. POLICIAL</th>
                                                            <th>ANT. JUDICIAL</th>
                                                            <th>ANT. PENAL</th>
                                                            <th>CONT. TRABAJO</th>
                                                            <th>EXAM. MEDICO</th>
                                                            <th>LIC. INTERNA</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="NuevoRegistroFichaPersonal">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <ul class="nav nav-tabs" id="123" role="tablist">
                                            <li class="active" title="Control de fatiga y somnolencia"><a
                                                    href="#submenu0" data-toggle="tab"> DATOS GENERALES</a></li>
                                            <li class="" title="Registro"><a href="#submenu1" data-toggle="tab"> OTROS
                                                    DATOS </a></li>
                                            <li class="" title="Registro"><a href="#submenu2" data-toggle="tab">
                                                    INSTRUCCIÓN</a></li>
                                            <li class="" title="Registro"><a href="#submenu3" data-toggle="tab">
                                                    IDIOMAS</a></li>
                                            <li class="" title="Registro"><a href="#submenu4" data-toggle="tab">
                                                    REFERENCIAS LABORALES</a></li>
                                            <li class="forDisabled" title="Registro"><a href="#submenu5"
                                                    data-toggle="tab" class="forDisabled">DATOS
                                                    DEL CÓNYUGE O CONVIVIENTE</a></li>
                                            <li class="forDisabledStatusPadre" title="Registro"><a href="#submenu6"
                                                    data-toggle="tab" class="forDisabledStatusPadre">DATOS DE
                                                    LOS PADRES</a></li>
                                            <li class="" title="Registro"><a href="#submenu7" data-toggle="tab">DATOS DE
                                                    LOS HIJOS </a></li>
                                            <li class="" title="Registro"><a href="#submenu8" data-toggle="tab">PERSONA
                                                    A LLAMAR EN CASO DE EMERGENCIA </a></li>
                                            <li class="" title="Registro"><a href="#submenu9"
                                                    data-toggle="tab">MOVILIDAD</a></li>
                                            <li class="" title="Registro"><a href="#submenu10"
                                                    data-toggle="tab">ANTECEDENTES</a></li>
                                            <li class="" title="Registro"><a href="#submenu11"
                                                    data-toggle="tab">DOCUMENTOS</a></li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane active" id="submenu0" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <div class="box box-body">

                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div style="display:flex;">
                                                            <span class="input-group-addon text-xl" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold; width:200px">POSTULANTE</span>
                                                            <div style="display:flex">
                                                                <input id="txt_search_postulante" type="text"
                                                                    class="form-control"
                                                                    placeholder="Buscar por DNI para Ingresar"
                                                                    value="" />
                                                                <input type="hidden" id="idpostulanteHidden" name=""
                                                                    value="">
                                                                <span class="input-group-addon text-xl"
                                                                    title="Expositor"
                                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 30px;">
                                                                    <button type="button" class="fa fa-search"
                                                                        aria-hidden="true"
                                                                        onclick="search_postulante();"></button></span>
                                                            </div>
                                                        </div>
                                                        <div class="input-group" style="margin-top:20px;">

                                                            <span class="input-group-addon text-xl" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES
                                                                DEL POSTULANTE</span>
                                                            <input id="txt_search_name_postulante" type="text"
                                                                class="form-control" placeholder="..." value=""
                                                                disabled />
                                                            <span class="input-group-addon text-xl" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">APELLIDOS
                                                                DEL POSTULANTE</span>
                                                            <input id="txt_search_apellido_postulante" type="text"
                                                                class="form-control" placeholder="..." value=""
                                                                disabled />
                                                        </div>
                                                        <div class="input-group" style="margin-top:5px;">

                                                            <span class="input-group-addon text-xl" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DNI
                                                                DEL POSTULANTE</span>
                                                            <input id="txt_search_dni_postulante" type="text"
                                                                class="form-control" placeholder="..." value=""
                                                                disabled />
                                                            <span class="input-group-addon text-xl" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TELEFONO
                                                                DEL POSTULANTE</span>
                                                            <input id="txt_search_telefono_postulante" type="text"
                                                                class="form-control" placeholder="..." value=""
                                                                disabled />
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">LUGAR
                                                                DE NACIMIENTO</span>
                                                            <input id="txt_ficha_personal_lugar" type="text"
                                                                class="form-control" placeholder="..." value="" />
                                                            <span class="input-group-addon text-xl" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ESTADO
                                                                CIVIL</span>
                                                            <select id="txt_ficha_personal_civil"
                                                                class="form-control text-xl">
                                                                <option value="-1">Selecciona...</option>
                                                                <option value="0">CASADO</option>
                                                                <option value="1">SOLTERO</option>
                                                                <option value="2">VIUDO</option>
                                                                <option value="3">DIVORCIADO</option>
                                                                <option value="4">CONVIVIENTE</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Prioridad"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 81px;">DEPARTAMENTO</span>
                                                            <select id="select_Ficha_Personal_departamento_g"
                                                                class="form-control selectpicker">
                                                                <option value="-1">Selecciona...</option>
                                                            </select>
                                                            <span class="input-group-addon" title="Prioridad"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 81px;">PROVINCIA</span>
                                                            <select id="select_Ficha_Personal_provincia_g"
                                                                class="form-control selectpicker">
                                                                <option value="-1">Selecciona...</option>
                                                            </select>
                                                            <span class="input-group-addon" title="Prioridad"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 81px;">DISTRITO</span>
                                                            <select id="select_Ficha_Personal_distrito_g"
                                                                class="form-control selectpicker">
                                                                <option value="-1">Selecciona...</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DOMICILIO</span>
                                                            <input id="txt_ficha_personal_domicilio" type="text"
                                                                class="form-control" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">URBANIZACIÓN</span>
                                                            <input id="txt_ficha_personal_ubanizacion" type="text"
                                                                class="form-control" value="" />
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DISTRITO</span>
                                                            <input id="txt_ficha_personal_distrito" type="text"
                                                                class="form-control" placeholder="..." value="" />
                                                        </div>
                                                    </div>
                                                    <!--<div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">

                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Nº
                                                                HIJOS</span>
                                                            <input id="txt_ficha_personal_n_hijos" type="text"
                                                                class="form-control" placeholder="..." value="" />
                                                        </div>
                                                    </div>-->
                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">SEXO</span>
                                                            <select id="txt_ficha_personal_sexo" class="form-control ">
                                                                <option value="-1">Selecciona...</option>
                                                                <option value="0">Masculino</option>
                                                                <option value="1">Femenino</option>
                                                            </select>
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ESTATURA</span>
                                                                <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">(m)</span>
                                                            <input id="txt_ficha_personal_talla" type="text"
                                                                class="form-control" placeholder="..." value="" />
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CONTEXTURA</span>
                                                            <select id="txt_ficha_personal_contextura"
                                                                class="form-control ">
                                                                <option value="-1">Selecciona...</option>
                                                                <option value="0">S</option>
                                                                <option value="1">M</option>
                                                                <option value="2">L</option>
                                                                <option value="3">XL</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">¿SU
                                                                PADRE VIVE?</span>
                                                            <select id="state_padre"
                                                                class="form-control txt_ficha_personal_estado_padres">
                                                                <option value="-1">Selecciona...</option>
                                                                <option value="2">SI</option>
                                                                <option value="1">NO</option>
                                                            </select>
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">¿SU
                                                                MADRE VIVE?</span>
                                                            <select id="state_madre"
                                                                class="form-control txt_ficha_personal_estado_padres">
                                                                <option value="-1">Selecciona...</option>
                                                                <option value="2">SI</option>
                                                                <option value="1">NO</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="submenu1" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <div class="box box-body">
                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">RUC</span>
                                                            <input id="txt_ficha_personal_ruc" type="text"
                                                                class="form-control" value="" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ESSALUD</span>
                                                            <input id="txt_ficha_personal_essalud" type="text"
                                                                class="form-control" value="" />
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FONDO
                                                                DE PENSIÓN</span>
                                                            <select id="txt_ficha_personal_onp" class="form-control ">
                                                                <option value="-1">Selecciona...</option>
                                                                <option value="0">ONP</option>
                                                                <option value="1">AFP</option>
                                                            </select>
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TIPO</span>
                                                            <select id="txt_ficha_personal_afp" class="form-control ">
                                                                <option value="-1">Selecciona...</option>
                                                                <option value="0">AFP Habitat</option>
                                                                <option value="1">AFP Profuturo</option>
                                                                <option value="2">Prima AFP</option>
                                                                <option value="3">AFP Integra</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CUSSPP</span>
                                                            <input id="txt_ficha_personal_cusspp" type="text"
                                                                class="form-control" value="" />
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA
                                                                DE AFILIACIÓN</span>
                                                            <input id="txt_ficha_personal_fecha_afiliacion" type="date"
                                                                class="form-control" placeholder="..." value="" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="submenu2" role="tabpanel"
                                                aria-labelledby="profile-tab">
                                                <div class="box box-body">
                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PROFESIÓN</span>
                                                            <button class="bg-cyan-500 py-4 px-4 text-white"
                                                                type="button" onclick="addFichaPersonalProfesion();"><i
                                                                    class="fa fa-plus-circle "></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="box-primary">
                                                        <div class="box-header no-padding">
                                                            <div class="box-body table-responsive no-padding">
                                                                <table
                                                                    class="datatable table table-striped table-bordered"
                                                                    id="table_FichaPersonalProfesion">
                                                                    <thead>
                                                                        <tr>

                                                                            <th>Profesión</th>
                                                                            <th>Nivel</th>
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

                                                </div>
                                            </div>
                                            <div class="tab-pane" id="submenu3" role="tabpanel"
                                                aria-labelledby="contact-tab">
                                                <div class="box box-body">
                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">IDIOMAS</span>
                                                            <button class="bg-cyan-500 py-4 px-4 text-white"
                                                                type="button" onclick="addFichaPersonalIdiomas();"><i
                                                                    class="fa fa-plus-circle "></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="box-primary">
                                                        <div class="box-header no-padding">
                                                            <div class="box-body table-responsive no-padding">
                                                                <table
                                                                    class="datatable table table-striped table-bordered"
                                                                    id="table_FichaPersonalIdiomas">
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


                                                </div>
                                            </div>
                                            <div class="tab-pane" id="submenu4" role="tabpanel"
                                                aria-labelledby="contact-tab">

                                                <div class="box box-body">

                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">REFERENCIA</span>
                                                            <button class="bg-cyan-500 py-4 px-4 text-white"
                                                                type="button" onclick="addFichaPersonalReferencia();"><i
                                                                    class="fa fa-plus-circle "></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="box-primary">
                                                        <div class="box-header no-padding">
                                                            <div class="box-body table-responsive no-padding">
                                                                <table
                                                                    class="datatable table table-striped table-bordered"
                                                                    id="table_FichaPersonalReferencia">
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
                                            <div class="tab-pane" id="submenu5" role="tabpanel"
                                                aria-labelledby="contact-tab">

                                                <div class="box box-body">
                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES</span>
                                                            <input id="txt_ficha_personal_fecha_conyuge_nombre"
                                                                type="text" class="form-control" value="" />
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">APELLIDOS</span>
                                                            <input id="txt_ficha_personal_fecha_conyuge_apellido"
                                                                type="text" class="form-control" value="" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA
                                                                DE NACIMIENTO</span>
                                                            <input id="txt_ficha_personal_fecha_conyuge_fecha"
                                                                type="date" class="form-control" value="" />
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">LUGAR
                                                                DE NACIMIENTO</span>
                                                            <input id="txt_ficha_personal_fecha_conyuge_lugar"
                                                                type="text" class="form-control" value="" />
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">EDAD</span>
                                                            <input id="txt_ficha_personal_fecha_conyuge_edad"
                                                                type="text" class="form-control" value="" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Prioridad"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 81px;">DEPARTAMENTO</span>
                                                            <select id="select_Ficha_Personal_departamento_conyuge_g"
                                                                class="form-control selectpicker">
                                                                <option value="-1">Selecciona...</option>
                                                            </select>
                                                            <span class="input-group-addon" title="Prioridad"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 81px;">PROVINCIA</span>
                                                            <select id="select_Ficha_Personal_provincia_conyuge_g"
                                                                class="form-control selectpicker">
                                                                <option value="-1">Selecciona...</option>
                                                            </select>
                                                            <span class="input-group-addon" title="Prioridad"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 81px;">DISTRITO</span>
                                                            <select id="select_Ficha_Personal_distrito_conyuge_g"
                                                                class="form-control selectpicker">
                                                                <option value="-1">Selecciona...</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DNI</span>
                                                            <input id="select_Ficha_Personal_dni_conyuge" type="text"
                                                                class="form-control" value="" />
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">RUC</span>
                                                            <input id="select_Ficha_Personal_ruc_conyuge" type="number"
                                                                class="form-control" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NIVEL
                                                                DE ESTUDIO</span>
                                                            <select id="select_Ficha_Personal_profesion_conyuge"
                                                                class="form-control">
                                                                <option value="-1">Selecciona...</option>
                                                                <option value="1">PRIMARIA</option>
                                                                <option value="2">SECUNDARIA</option>
                                                                <option value="3">TÉCNICO</option>
                                                                <option value="4">UNIVERSITARIO</option>
                                                                <option value="5">BACHILLER</option>
                                                                <option value="6">MAESTRIA</option>
                                                                <option value="7">DOCTORADO</option>
                                                            </select>
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">OCUPACIÓN</span>
                                                            <input id="select_Ficha_Personal_ocupacion_conyuge"
                                                                type="text" class="form-control" value="" />
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CENTRO
                                                                DE TRABAJO ACTUAL</span>
                                                            <input id="select_Ficha_Personal_centro_conyuge" type="text"
                                                                class="form-control" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DIRECCIÓN</span>
                                                            <input id="select_Ficha_Personal_direccion_conyuge"
                                                                type="text" class="form-control" value="" />
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TELÉFONO</span>
                                                            <input id="select_Ficha_Personal_telefono_conyuge"
                                                                type="number" class="form-control" value="" />
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CELULAR</span>
                                                            <input id="select_Ficha_Personal_celular_conyuge"
                                                                type="number" class="form-control" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DOCUMENTO
                                                                DNI</span>
                                                            <input
                                                                class="form-control input_files_ficha_personal_conyuge"
                                                                type="file" id="formFileDniConyuge">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PARTIDA
                                                                DE MATRIMONIO</span>
                                                            <input
                                                                class="form-control input_files_ficha_personal_conyuge"
                                                                type="file" id="formFile">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="submenu6" role="tabpanel"
                                                aria-labelledby="contact-tab">

                                                <div class="box box-body">
                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PADRE</span>


                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES</span>
                                                            <input id="txt_Ficha_Personal_padre_nombre" type="text"
                                                                class="form-control" value="" />
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">APELLIDOS</span>
                                                            <input id="txt_Ficha_Personal_padre_apellido" type="text"
                                                                class="form-control" value="" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CENTRO
                                                                DE TRABAJO</span>
                                                            <input id="txt_Ficha_Personal_padre_centro" type="text"
                                                                class="form-control" value="" />
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">OCUPACIÓN</span>
                                                            <input id="txt_Ficha_Personal_padre_ocupacion" type="text"
                                                                class="form-control" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DIRECCIÓN</span>
                                                            <input id="txt_Ficha_Personal_padre_direccion" type="text"
                                                                class="form-control" value="" />
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TELÉFONO</span>
                                                            <input id="txt_Ficha_Personal_padre_telefono" type="text"
                                                                class="form-control" value="" />
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CELULAR</span>
                                                            <input id="txt_Ficha_Personal_padre_celular" type="text"
                                                                class="form-control" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">MADRE</span>


                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES</span>
                                                            <input id="txt_Ficha_Personal_madre_nombres" type="text"
                                                                class="form-control" value="" />
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">APELLIDOS</span>
                                                            <input id="txt_Ficha_Personal_madre_apellidos" type="text"
                                                                class="form-control" value="" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CENTRO
                                                                DE TRABAJO</span>
                                                            <input id="txt_Ficha_Personal_madre_centro" type="text"
                                                                class="form-control" value="" />
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">OCUPACIÓN</span>
                                                            <input id="txt_Ficha_Personal_madre_ocupacion" type="text"
                                                                class="form-control" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DIRECCIÓN</span>
                                                            <input id="txt_Ficha_Personal_madre_direccion" type="text"
                                                                class="form-control" value="" />
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TELÉFONO</span>
                                                            <input id="txt_Ficha_Personal_madre_telefono" type="text"
                                                                class="form-control" value="" />
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CELULAR</span>
                                                            <input id="txt_Ficha_Personal_madre_celular" type="text"
                                                                class="form-control" value="" />
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>
                                            <div class="tab-pane" id="submenu7" role="tabpanel"
                                                aria-labelledby="contact-tab">
                                                <div class="box box-body">
                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">HIJOS</span>
                                                            <button class="bg-cyan-500 py-4 px-4 text-white"
                                                                type="button" onclick="addChildren();"><i
                                                                    class="fa fa-plus-circle "></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="box-primary">
                                                        <div class="box-header no-padding">
                                                            <div class="box-body table-responsive no-padding">
                                                                <table
                                                                    class="datatable table table-striped table-bordered"
                                                                    id="table_children_personas">
                                                                    <thead>
                                                                        <tr>

                                                                            <th>Nombres</th>
                                                                            <th>Apellidos</th>
                                                                            <th>Fecha de Nacimiento</th>
                                                                            <th>Edad</th>
                                                                            <th>Sexo</th>
                                                                            <th>DNI</th>
                                                                            <th>DOCUMENTO DNI</th>
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
                                            <div class="tab-pane" id="submenu8" role="tabpanel"
                                                aria-labelledby="contact-tab">
                                                <div class="box box-body">
                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES</span>
                                                            <input id="txt_Ficha_Personal_referencia_nombre" type="text"
                                                                class="form-control" value="" />
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">APELLIDOS</span>
                                                            <input id="txt_Ficha_Personal_referencia_apellido"
                                                                type="text" class="form-control" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PARENTESCO</span>
                                                            <input id="txt_Ficha_Personal_referencia_parentesco"
                                                                type="text" class="form-control" value="" />
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TELÉFONOS</span>
                                                            <input id="txt_Ficha_Personal_referencia_telefono"
                                                                type="text" class="form-control" value="" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="submenu9" role="tabpanel"
                                                aria-labelledby="contact-tab">
                                                <div class="box box-body">
                                                    <div class="box-primary" style="margin-top:10px;margin-bottom:10px">
                                                        <div class="box-header no-padding">
                                                            <div class="box-body table-responsive no-padding">
                                                                <table
                                                                    class="datatable table table-striped table-bordered"
                                                                    id="table_Ficha_Personal_movilidad">
                                                                    <thead>
                                                                        <tr>
                                                                            <th></th>
                                                                            <th>SI</th>
                                                                            <th>NO</th>
                                                                        </tr>
                                                                    </thead>

                                                                    <body>
                                                                        <tr>
                                                                            <td>POSEE MOVILIDAD PROPIA</td>
                                                                            <td><input
                                                                                    class="form-check-input check_Ficha_Personal_movilidad"
                                                                                    type="radio" name="PMP_FP" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input check_Ficha_Personal_movilidad"
                                                                                    type="radio" name="PMP_FP" id="0">
                                                                            </td>
                                                                        </tr>
                                                                    </body>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Nº
                                                                DE LICENCIA DE CONDUCIR</span>
                                                            <input id="check_Ficha_Personal_licencia" type="text"
                                                                class="form-control" value="" />
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TIPO
                                                                DE VEHICULO</span>
                                                            <input id="check_Ficha_Personal_tipo_vehiculo" type="text"
                                                                class="form-control" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">MARCA</span>
                                                            <input id="check_Ficha_Personal_tipo_marca" type="text"
                                                                class="form-control" value="" />
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">AÑO</span>
                                                            <input id="check_Ficha_Personal_tipo_anio" type="text"
                                                                class="form-control" value="" />
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PLACA</span>
                                                            <input id="check_Ficha_Personal_tipo_placa" type="text"
                                                                class="form-control" value="" />
                                                        </div>
                                                    </div>


                                                </div>

                                            </div>
                                            <div class="tab-pane" id="submenu10" role="tabpanel"
                                                aria-labelledby="contact-tab">
                                                <div class="box box-body">
                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">POLICIALES
                                                                Y/O PENAL</span>
                                                        </div>
                                                    </div>
                                                    <div class="box-primary" style="margin-top:10px">
                                                        <div class="box-header no-padding">
                                                            <div class="box-body table-responsive no-padding">
                                                                <table
                                                                    class="datatable table table-striped table-bordered"
                                                                    id="">
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
                                                                            <td>Tiene Registro de Antecedentes Penales
                                                                                y/o Policiales </td>
                                                                            <td> SI <input
                                                                                    class="form-check-input filter_penales_judiciales"
                                                                                    type="radio" name="ANPF_1" id="1">
                                                                                NO <input
                                                                                    class="form-check-input filter_penales_judiciales"
                                                                                    type="radio" name="ANPF_1" id="0">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>2</td>
                                                                            <td>Ha sido detenido y/o enjuiciado en
                                                                                alguna oportunidad </td>
                                                                            <td> <input
                                                                                    id="Ficha_Personal_antecedentes_1"
                                                                                    type="text" class="form-control"
                                                                                    value="" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>3</td>
                                                                            <td>Dependencia Policial donde sufrió la
                                                                                detención </td>
                                                                            <td> <input
                                                                                    id="Ficha_Personal_antecedentes_2"
                                                                                    type="text" class="form-control"
                                                                                    value="" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>4</td>
                                                                            <td>Juzgado que vió su caso </td>
                                                                            <td><input
                                                                                    id="Ficha_Personal_antecedentes_3"
                                                                                    type="text" class="form-control"
                                                                                    value="" /> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>5</td>
                                                                            <td>Motivo </td>
                                                                            <td><input
                                                                                    id="Ficha_Personal_antecedentes_4"
                                                                                    type="text" class="form-control"
                                                                                    value="" /> </td>
                                                                        </tr>
                                                                    </body>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                            </div>
                                            <div class="tab-pane" id="submenu11" role="tabpanel"
                                                aria-labelledby="contact-tab">
                                                <div class="box box-body">

                                                    <div class="form-group" style="margin-bottom:5px;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DNI</span>
                                                            <input class="form-control input_files_ficha_personal"
                                                                type="file" id="formFile_personal_1">

                                                        </div>
                                                        <div class="input-group">

                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">LICENCIA
                                                                DE CONDUCIR</span>
                                                            <input class="form-control input_files_ficha_personal"
                                                                type="file" id="formFile_personal_2">
                                                        </div>
                                                        <div class="input-group">

                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">LICENCIA
                                                                ESPECIAL</span>
                                                            <input class="form-control input_files_ficha_personal"
                                                                type="file" id="formFile_personal_3">
                                                        </div>
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">SCTR</span>
                                                            <input class="form-control input_files_ficha_personal"
                                                                type="file" id="formFile_personal_4">


                                                        </div>
                                                        <div class="input-group">

                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">SEGURO
                                                                DE VIDA</span>
                                                            <input class="form-control input_files_ficha_personal"
                                                                type="file" id="formFile_personal_5">

                                                        </div>
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ANTECEDENTES
                                                                POLICIALES</span>
                                                            <input class="form-control input_files_ficha_personal"
                                                                type="file" id="formFile_personal_6">


                                                        </div>
                                                        <div class="input-group">

                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ANTECEDENTES
                                                                JUDICIALES</span>
                                                            <input class="form-control input_files_ficha_personal"
                                                                type="file" id="formFile_personal_7">

                                                        </div>
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ANTECEDENTES
                                                                PENALES</span>
                                                            <input class="form-control input_files_ficha_personal"
                                                                type="file" id="formFile_personal_8">

                                                        </div>
                                                        <div class="input-group">

                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CONTRATO
                                                                DE TRABAJO</span>
                                                            <input class="form-control input_files_ficha_personal "
                                                                type="file" id="formFile_personal_9">

                                                        </div>
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">EXAMEN
                                                                MEDICO</span>
                                                            <input class="form-control input_files_ficha_personal"
                                                                type="file" id="formFile_personal_10">
                                                        </div>
                                                        <div class="input-group">
                                                            <span class="input-group-addon" title="Expositor"
                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">LICENCIA
                                                                INTERNA</span>
                                                            <input class="form-control input_files_ficha_personal"
                                                                type="file" id="formFile_personal_11">
                                                        </div>
                                                    </div>



                                                </div>
                                                <div class="btn-group" role="group" aria-label="Basic example"
                                                    style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                                    <button type="button" class="bg-emerald-500 py-4 px-2 text-white"
                                                        onClick="save_FichaPersonal();">Guardar</button>
                                                    <!-- <button type="button" class="btn btn-warning">Editar</button>                                             -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="HistorialProgramaCapacitacion">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="ProgramaCapacitacionSearch">
                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="0" type="text" class="form-control"
                                                    placeholder="Buscar por nombres" />
                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="1" type="text" class="form-control"
                                                    placeholder="Buscar por dni" />

                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-primary" style="width:100%">
                                        <div class="box-header no-padding">
                                            <div class="box-body table-responsive no-padding">
                                                <table style="width:100%"
                                                    class="datatable table table-striped table-bordered text-xl"
                                                    id="grd01ProgramacionCapacitacion">
                                                    <thead>
                                                        <tr>
                                                            <th>NOMBRES Y APELLIDOS</th>
                                                            <th>DNI</th>
                                                            <th>INDUCCION EN AAQ</th>
                                                            <th>MANEJO DEFENSIVO</th>
                                                            <th>MAT. PELIGROSO 1</th>
                                                            <th>MAT. PELIGROSO 2</th>
                                                            <th>MAT. PELIGROSO 3</th>
                                                            <th>PRI. AUXILIO</th>
                                                            <th>MAN. DE EXTINTORES</th>
                                                            <th>TRAB. EN ALTURA</th>
                                                            <th>FAT. Y SOMNOLENCIA</th>
                                                            <th>CURSO VOLVO</th>
                                                            <th>INDUCC. PLANTA ILO</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="NuevoProgramaCapacitacion">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group">
                                            <div style="display:flex;">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold; width:200px">Personal</span>
                                                <div style="display:flex">
                                                    <input id="txt_search_personal" type="text" class="form-control"
                                                        placeholder="Buscar por DNI para Ingresar" value="" />
                                                    <input type="hidden" id="idPersonalHidden" name="" value="">
                                                    <span class="input-group-addon" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                        <button type="button" class="fa fa-search" aria-hidden="true"
                                                            onclick="search_Personal();"></button></span>
                                                </div>
                                            </div>
                                            <div class="input-group" style="margin-top:20px;">

                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Nombres</span>
                                                <input id="txt_search_name_personal" type="text" class="form-control"
                                                    disabled />
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Apellidos</span>
                                                <input id="txt_search_apellido_personal" type="text"
                                                    class="form-control" disabled />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">INDUCCION
                                                    EN AAQ</span>
                                                <input class="form-control input_files_programacion_capacitacion"
                                                    type="file" id="formFile_1">

                                            </div>
                                            <div class="input-group">

                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">MANEJO
                                                    DEFENSIVO</span>
                                                <input class="form-control input_files_programacion_capacitacion"
                                                    type="file" id="formFile_2">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">MATERIALES
                                                    PELIGROSOS 1</span>
                                                <input class="form-control input_files_programacion_capacitacion"
                                                    type="file" id="formFile_3">


                                            </div>
                                            <div class="input-group">

                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">MATERIALES
                                                    PELIGROSOS 2</span>
                                                <input class="form-control input_files_programacion_capacitacion"
                                                    type="file" id="formFile_4">

                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">MATERIALES
                                                    PELIGROSOS 3</span>
                                                <input class="form-control input_files_programacion_capacitacion"
                                                    type="file" id="formFile_5">


                                            </div>
                                            <div class="input-group">

                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PRIMEROS
                                                    AUXILIOS</span>
                                                <input class="form-control input_files_programacion_capacitacion"
                                                    type="file" id="formFile_6">

                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">MANEJO
                                                    DE EXTINTORES</span>
                                                <input class="form-control input_files_programacion_capacitacion"
                                                    type="file" id="formFile_7">

                                            </div>
                                            <div class="input-group">

                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TRABAJO
                                                    EN ALTURA</span>
                                                <input class="form-control input_files_programacion_capacitacion "
                                                    type="file" id="formFile_8">

                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FATIGA
                                                    Y SOMNOLENCIA </span>
                                                <input class="form-control input_files_programacion_capacitacion"
                                                    type="file" id="formFile_9">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CURSO
                                                    VOLVO</span>
                                                <input class="form-control input_files_programacion_capacitacion"
                                                    type="file" id="formFile_10">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">INDUCCION
                                                    PLANTA ILO</span>
                                                <input class="form-control input_files_programacion_capacitacion"
                                                    type="file" id="formFile_11">
                                            </div>
                                        </div>



                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                        <button type="button" class="bg-emerald-500 py-4 px-2 text-white"
                                            onClick="save_programacion_capacitacion();">Guardar</button>
                                        <!-- <button type="button" class="btn btn-warning">Editar</button>                                             -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
        id="modal_ProgramaCapacitacion">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="box box-body">

                        <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                                <span class="input-group-addon" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DOCUMENTO</span>

                                <input id="txt_id_modal_programa_capacitacion_name" type="text" class="form-control"
                                    value="dni.pdf" disabled />



                                <input type="hidden" id="txt_id_programa_capacitacion" value="">
                                <input type="hidden" id="txt_id_modal_programa_capacitacion_type" value="">
                               


                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">

                                <span class="input-group-addon" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA DE
                                    EMISION</span>

                                <input id="txt_programa_capacitacion_emi_modal" type="date" class="form-control" />

                                <span class="input-group-addon" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA
                                    CADUCIDAD</span>
                                <input id="txt_programa_capacitacion_cadu_modal" type="date" class="form-control"
                                    placeholder="..." value="" />

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="bg-emerald-500 py-4 px-2 text-white"
                            onclick="insert_modal_date_Programa_capacitacion();">Guardar</button>
                        <button type="button" class="bg-gray-500 py-4 px-2 text-white" data-dismiss="modal"
                            onclick="$('#modal_ProgramaCapacitacion').modal('hide')">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
        id="modal_gestionPersonasSearch">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="box box-body">
                        <div class="form-group" style="margin-bottom:5px;">
                            <div style="display:flex;">
                                <span class="input-group-addon text-xl" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold; width:200px">VACANTE</span>
                                <div style="display:flex">
                                    <input id="txt-modal-gestion-personas-vacante-search" type="text"
                                        class="form-control" placeholder="Buscar por DNI para Ingresar" value="" />
                                    <input id="txt-modal-gestion-personas-vacante-requerimiento" type="hidden" />
                                    <span class="input-group-addon text-xl" title="Expositor"
                                        style="background:#EEEEEE;font-weight:bold;padding-right: 30px;">
                                        <button type="button" class="fa fa-search" aria-hidden="true"
                                            onclick="searchForGestionPersonalVacante();"></button></span>
                                </div>
                            </div>
                        </div>
                        <div class="box-primary" style="margin-bottom:5px;">
                            <div class="box-header no-padding">
                                <div class="box-body table-responsive no-padding">
                                    <table class="datatable table table-striped table-bordered text-xl"
                                        id="table_gestion_personas_vacante">
                                        <thead>
                                            <tr>

                                                <th>Nombres</th>
                                                <th>Apellidos</th>
                                                <th>Dni</th>
                                                <th>Puesto al Postular</th>
                                                <th>Puesto Actual</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="btn-group" role="group" aria-label="Basic example"
                            style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">
                            <input type="hidden" id="txt-modal-gestion-personas-id-personal" />
                            <input type="hidden" id="txt-modal-gestion-personas-id-cargo" />
                            <button type="button" class="bg-cyan-500 py-4 px-2 text-white"
                                onclick="addvacanteForGestionPersonal();">Agregar a
                                Vacante</button>
                            <button type="button" class="bg-gray-500 py-4 px-4 text-white" data-dismiss="modal"
                                onclick="$('#modal_gestionPersonasSearch').modal('hide')">Cerrar</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
        id="modal_gestionPersonas">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="box box-body">

                        <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                                <span class="input-group-addon" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES DEL
                                    SOLICITANTE</span>

                                <input id="txt-modal-gestion-personas-nombre" type="text" class="form-control"
                                    value="dni.pdf" disabled />
                                <span class="input-group-addon" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">APELLIDOS DEL
                                    SOLICITANTE</span>

                                <input id="txt-modal-gestion-personas-apellido" type="text" class="form-control"
                                    value="dni.pdf" disabled />
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                                <span class="input-group-addon" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">AREA</span>

                                <input id="txt-modal-gestion-personas-area" type="text" class="form-control"
                                    value="dni.pdf" disabled />
                                <span class="input-group-addon" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CARGO
                                    SOLICITADO</span>

                                <input id="txt-modal-gestion-personas-cargo" type="text" class="form-control"
                                    value="dni.pdf" disabled />
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                                <span class="input-group-addon" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">MOTIVO</span>

                                <input id="txt-modal-gestion-personas-motivo" type="text" class="form-control"
                                    value="dni.pdf" disabled />
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                                <span class="input-group-addon" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">VACANTES</span>

                                <input id="txt-modal-gestion-personas-vacantes" type="text" class="form-control"
                                    value="dni.pdf" disabled />
                                <span class="input-group-addon" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ESTADO</span>

                                <input id="txt-modal-gestion-personas-estado" type="text" class="form-control"
                                    value="dni.pdf" disabled />
                            </div>
                        </div>
                        <div class="box-primary" style="margin-bottom:10px">
                            <div class="box-header no-padding">
                                <div class="box-body table-responsive no-padding">
                                    <table class="datatable table table-striped table-bordered text-xl"
                                        id="table_gestion_personas_vacante_list_observaciones">
                                        <thead>
                                            <tr>

                                                <th>Observaciones</th>                                              
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="box-primary" style="margin-bottom:10px">
                            <div class="box-header no-padding">
                                <div class="box-body table-responsive no-padding">
                                    <table class="datatable table table-striped table-bordered text-xl"
                                        id="table_gestion_personas_vacante_list">
                                        <thead>
                                            <tr>

                                                <th>Nombres</th>
                                                <th>Apellidos</th>
                                                <th>Dni</th>
                                                <th>Puesto Actual</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="bg-gray-500 py-4 px-4 text-white" data-dismiss="modal"
                            onclick="$('#modal_gestionPersonas').modal('hide')">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" id="ModalOpenRequerimiento">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box box-body">

                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Nº DE
                                REQUERIMIENTO</span>

                            <input id="txt_n_requerimiento_modal" type="text" class="form-control" value="" disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">AREA</span>

                            <input id="txt_area_requerimiento_modal" type="text" class="form-control" value=""
                                disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">SOLICITANTE</span>

                            <input id="txt_solicitante_requerimiento_modal" type="text" class="form-control"
                                value="dni.pdf" disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CENTRO DE COSTO</span>

                            <input id="txt_centro_costo_requerimiento_modal" type="text" class="form-control"
                                value="dni.pdf" disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA DE
                                REQUERIMIENTO</span>

                            <input id="txt_fecha_requerimiento_modal" type="text" class="form-control" value="dni.pdf"
                                disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PRIORIDAD</span>

                            <input id="txt_prioridad_requerimiento_modal" type="text" class="form-control"
                                value="dni.pdf" disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">MOTIVO</span>

                            <input id="txt_motivo_requerimiento_modal" type="text" class="form-control" value="dni.pdf"
                                disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">

                            <select id="txt_estado_requerimiento_modal" class="form-control " disabled>
                                <option value="-1">Selecciona...
                                </option>
                                <option value="1">PENDIENTE
                                </option>
                                <option value="8">EN EVALUACION
                                </option>
                                <option value="5">ATENDIDO
                                </option>
                            </select>
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TIEMPO DE
                                ATENCION</span>

                            <input id="txt_tiempo_atencion_requerimiento_modal" type="text" class="form-control"
                                value="dni.pdf" disabled />
                        </div>
                    </div>
                    <div class="box-primary">
                        <div class="box-header no-padding">
                            <div class="box-body table-responsive no-padding">

                                <table class="datatable table table-striped table-bordered"
                                    id="tableItemRequerimientoModalShow">
                                    <thead>
                                        <tr>

                                            <th>ITEM</th>
                                            <th>CODIGO</th>
                                            <th>Nº DE PARTE</th>
                                            <th>DESCRIPCION</th>
                                            <th>CANTIDAD</th>
                                            <th>UNIDAD MEDIDA</th>                                           
                                            <th>OBSERVACION</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">                 
                    <button type="button" class="bg-stone-900 py-4 px-2 text-white" data-dismiss="modal"
                        onclick="$('#ModalOpenRequerimiento').modal('hide')">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="modal_FichaPersonal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box box-body">

                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DOCUMENTO</span>

                            <input id="txt_id_name_pdf_ficha_personal" type="text" class="form-control" value="dni.pdf"
                                disabled />
                            <input type="hidden" id="txt_id_type_pdf_Ficha_Personal" value="">
                            <input type="hidden" id="txt_id_type" value="">                            
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">

                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA DE EMISION</span>

                            <input id="txt_ficha_Personal_emi_modal" type="date" class="form-control" />

                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA CADUCIDAD</span>
                            <input id="txt_ficha_Personal_cadu_modal" type="date" class="form-control" placeholder="..."
                                value="" />

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="bg-emerald-500 py-4 px-2 text-white"
                        onclick="insert_modal_date_Ficha_Personal();">Guardar</button>
                    <button type="button" class="bg-gray-500 py-4 px-2 text-white" data-dismiss="modal"
                        onclick="$('#modal_FichaPersonal').modal('hide')">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="pages/catalogos/personas/personas.js"></script>
    <script>
    $(document).ready(function() {
        var ubigeo = window.ubigeo



        $('#txt_fecha_g_personas').val(new Date().toISOString().slice(0, 10));
        $('#txt_entrevistas_fecha').val(new Date().toISOString().slice(0, 10));
        $('#txt_fecha_requerimiento_requerimiento').val(new Date().toISOString().slice(0, 10));

        $('#txt_ficha_personal_fecha_afiliacion').val(new Date().toISOString().slice(0, 10));
        $('#txt_ficha_personal_nacimiento').val(new Date().toISOString().slice(0, 10));

        $('#txt_ficha_personal_fecha_conyuge_fecha').val(new Date().toISOString().slice(0, 10));

        //$('#txt_fecha_g_personas').val(new Date().getHours()+":"+ new Date().getMinutes());
        gridSecondRequerimientos();
        gridEntrevistas();
        gridReferenciaLaboral();
        gridProgramacionCapacitacion();
        gridFichaPersonal();
        loadDepartamentos(window.ubigeo, "select_Ficha_Personal_departamento_conyuge_g");
        loadDepartamentos(window.ubigeo, "select_Ficha_Personal_departamento_g");

        $('input[type=radio][name=ANPF_1]').change(function() {
            enabledButtonAPenalesJudiciales(this.id == "0" ? true : false);
        });
        $('input[type=radio][name=PMP_FP]').change(function() {
            enabledButtonMovilidad(this.id == "0" ? true : false);
        });


        $(".txt_ficha_personal_estado_padres").change(function() {
            //console.log("payas")
            var padre = $("#state_padre").find('option:selected').val();
            var madre = $("#state_madre").find('option:selected').val();

            if (Number(padre) + Number(madre) == 2) {
                enabledStatePadres(false)
            } else {
                enabledStatePadres(true, padre, madre)
            }

            /*if(["0","4"].find(el => el == value)){
                enabledButtonConyuge(true)
            }else{
                enabledButtonConyuge(false)
            }*/
        })

        $("#txt_ficha_personal_civil").change(function() {
            console.log("payas")
            var $option = $(this).find('option:selected');
            var value = $option.val();
            console.log(value)
            if (["0", "4"].find(el => el == value)) {
                enabledButtonConyuge(true)
            } else {
                enabledButtonConyuge(false)
            }
        })
        $('#select_Ficha_Personal_departamento_g').change(function() {
            var $option = $(this).find('option:selected');
            var value = $option.val(); //to get content of "value" attrib
            console.log(value)
            $('#select_Ficha_Personal_provincia_g option').remove();
            $('#select_Ficha_Personal_provincia_g').append($("<option>", {
                value: "-1",
                text: "Selecciona...",
                //selected:item.value===value?true:false
            }));
            $.each(ubigeo.provincias[value], function(i, item) {
                //console.log(item.value)


                $('#select_Ficha_Personal_provincia_g').append($("<option>", {
                    value: item.id_ubigeo,
                    text: item.nombre_ubigeo,
                    //selected:item.value===value?true:false
                }));
            });
        })
        $('#select_Ficha_Personal_departamento_conyuge_g').change(function() {
            var $option = $(this).find('option:selected');
            var value = $option.val(); //to get content of "value" attrib
            console.log(value)
            $('#select_Ficha_Personal_provincia_conyuge_g option').remove();
            $('#select_Ficha_Personal_provincia_conyuge_g').append($("<option>", {
                value: "-1",
                text: "Selecciona...",
                //selected:item.value===value?true:false
            }));
            $.each(ubigeo.provincias[value], function(i, item) {
                //console.log(item.value)


                $('#select_Ficha_Personal_provincia_conyuge_g').append($("<option>", {
                    value: item.id_ubigeo,
                    text: item.nombre_ubigeo,
                    //selected:item.value===value?true:false
                }));
            });
        })
        $('#select_Ficha_Personal_provincia_conyuge_g').change(function() {
            var $option = $(this).find('option:selected');
            var value = $option.val(); //to get content of "value" attrib
            console.log(value)

            $('#select_Ficha_Personal_distrito_conyuge_g option').remove();
            $('#select_Ficha_Personal_distrito_conyuge_g').append($("<option>", {
                value: "-1",
                text: "Selecciona...",
                //selected:item.value===value?true:false
            }));
            $.each(ubigeo.distritos[value], function(i, item) {
                //console.log(item.value)

                $('#select_Ficha_Personal_distrito_conyuge_g').append($("<option>", {
                    value: item.id_ubigeo,
                    text: item.nombre_ubigeo,
                    //selected:item.value===value?true:false
                }));
            });
        })



        $("#txt_ficha_personal_afp").prop("disabled", true);


        $('#txt_ficha_personal_onp').change(function() {
            var $option = $(this).find('option:selected');
            var value = $option.val();
            console.log(value)
            if (value == 1) {
                $("#txt_ficha_personal_afp").prop("disabled", false);
            } else {
                $("#txt_ficha_personal_afp").prop("disabled", true);


            }
        })

        $('#select_Ficha_Personal_provincia_g').change(function() {
            var $option = $(this).find('option:selected');
            var value = $option.val(); //to get content of "value" attrib
            console.log(value)

            $('#select_Ficha_Personal_distrito_g option').remove();
            $('#select_Ficha_Personal_distrito_g').append($("<option>", {
                value: "-1",
                text: "Selecciona...",
                //selected:item.value===value?true:false
            }));
            $.each(ubigeo.distritos[value], function(i, item) {
                //console.log(item.value)

                $('#select_Ficha_Personal_distrito_g').append($("<option>", {
                    value: item.id_ubigeo,
                    text: item.nombre_ubigeo,
                    //selected:item.value===value?true:false
                }));
            });
        })
        $('a[data-toggle="tab"]').click(function(e) {
            if ($(this).hasClass("disabled")) {
                e.preventDefault();
                e.stopPropagation();

                e.stopImmediatePropagation();

                return false;

            }
        });
        loadSelectedGestionPersonasArea();
        loadSelectedGestionPersonasMotivo();
        updateGrid("gridRequerimientoGrid");

        UtilLoadSelect("sql_select_get_cargo", "txt_cargo_personas");
        UtilLoadSelect("sql_select_get_cargo", "txt_entrevistas_puesto");
        UtilLoadSelect("sql_select_get_lugar_trabajo", "personas_select_lugar");

       // UtilLoadSelect("sql_select_get_prioridad", "slct_prioridad_requerimiento");
    });
    </script>