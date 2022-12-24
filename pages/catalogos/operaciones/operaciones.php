<!-- ztree treeview -->
<link rel="stylesheet" href="libs/ztree/css/ztreestyle.css" />
<script src="libs/ztree/js/jquery.ztree.core.js"></script>

<!-- bootstrap datepicker -->
<link rel="stylesheet" href="libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

<style>
.dataTables_filter {
    display: none;
}

.error {
    color: #ff2424;
    font-size: 10px;
}
</style>

<script src="libs/moment/min/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/locale/es.js"></script>
<script src="pages/catalogos/operaciones/validate.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script> -->

<!--datetimepicker-->
<!-- <link href="https://cdn.bootcss.com/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
      rel="stylesheet">
<script src="https://cdn.bootcss.com/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script> -->

<section class="content-header">


    <h1><i class="fa fa-tasks"></i> </h1>
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
                        <li class="active" title="Almacenes"><a href="#datos01" data-toggle="tab"
                                onClick="resumenEstadoFlota();resumenAsignacionFlota();"><i class="fa fa-truck"></i>
                                Resumen</a></li>
                        <li role="presentation" class="dropdown">
                            <a href="#" id="myTabDropInventario" class="dropdown-toggle" data-toggle="dropdown"
                                aria-controls="myTabDropInventario-contents"><i class="fa fa-dropbox"></i> Reportes
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="myTabDropInventario"
                                id="myTabDropInventario-contents">

                                <li class="" title="Combustible"><a href="#reportesCombustible" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i> Combustible</a></li>
                                <li class="" title="Mantenimiento"><a href="#reportesMantenimiento" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i> Mantenimiento</a></li>
                                <li class="" title="Mantenimiento"><a href="#reportesGastoOperativo"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i> Otros Gastos</a></li>
                                <li class="" title="Mantenimiento"><a href="#reportesGastoOperativoTotal"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i> Gasto Operativo</a></li>
                            </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                            <a href="#" id="myTabDropInventario" class="dropdown-toggle" data-toggle="dropdown"
                                aria-controls="myTabDropInventario-contents"><i class="fa fa-dropbox"></i> Operación
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="myTabDropInventario"
                                id="myTabDropInventario-contents">
                                <!--<li class="" title="Tareas"><a href="#HistorialTareas" data-toggle="tab"
                                        onclick="javascript:app04GridAll();"><i class="fa fa-dropbox"></i> Historial de
                                        Asignación de
                                        Tareas</a>
                                </li>
                                <li class="" title="Tareas"><a href="#NuevoRegistroTareas" data-toggle="tab"
                                        onclick="javascript:app04GridAll();"><i class="fa fa-dropbox"></i> Agregar
                                        Tareas</a>
                                </li>-->
                                <li class="" title="Combustible"><a href="#HistorialCombustible" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i> Historial de Combustible</a></li>
                                <li class="" title="Combustible"><a href="#NuevoRegistroCombustible"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i>Agregar Combustible</a></li>


                                <!--<li class="" title="Mantenimiento"><a href="#HistorialMantenimiento"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i> Historial de Mantenimiento</a>
                                </li>

                                <li class="" title="Mantenimiento"><a href="#NuevoRegistroMantenimiento"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i> Agregar Mantenimiento</a></li>-->


                                <li class="" title="Mantenimiento"><a href="#HistorialCostosOperarios"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i>Historial de Otros Gastos</a>
                                </li>
                                <li class="" title="Mantenimiento"><a href="#OperacionGastoOperativo"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i>Agregar Otros Gastos</a></li>

                            </ul>
                        </li>

                        <li role="test2" class="dropdown">
                            <a href="#" id="myTabDropInventario3" class="dropdown-toggle" data-toggle="dropdown"
                                aria-controls="myTabDropInventario3-contents"><i class="fa fa-dropbox"></i> Flota <span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="myTabDropInventario3"
                                id="myTabDropInventario3-contents">
                                <li class="" title="Vehiculos"><a href="#flotavehiculos" data-toggle="tab"
                                        onclick='updateGrid("gridVehiculo");'><i class="fa fa-dropbox"></i>
                                        Vehiculos</a>
                                </li>
                                <li class="" title="Conductores"><a href="#flotaconductores" data-toggle="tab"
                                        onclick='updateGrid("gridConductor");'><i class="fa fa-dropbox"></i>
                                        Conductores</a></li>
                                <li class="" title="Vehiculos"><a href="#HistorialdeDocumentos" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>
                                        Historial de Documentos</a>
                                </li>
                                <li class="" title="Proveedores"><a href="#AgregarDocumentos" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>
                                        Agregar Documentos</a></li>
                                <!--<li class="" title="Proveedores"><a href="#flotaproveedores" data-toggle="tab"
                                        onclick='updateGrid("gridProveedor");'><i class="fa fa-dropbox"></i>
                                        Proveedores</a></li>-->
                            </ul>
                        </li>
                        <!--<li role="test2" class="dropdown">
                            <a href="#" id="myTabDropInventario3" class="dropdown-toggle" data-toggle="dropdown"
                                aria-controls="myTabDropInventario3-contents"><i class="fa fa-dropbox"></i> Documentos
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="myTabDropInventario3"
                                id="myTabDropInventario3-contents">
                                <li class="" title="Vehiculos"><a href="#HistorialdeDocumentos" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>
                                        Historial de Documentos</a>
                                </li>
                                <li class="" title="Proveedores"><a href="#AgregarDocumentos" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>
                                        Agregar Documentos</a></li>
                            </ul>
                        </li>-->
                        <li role="test2" class="dropdown">
                            <a href="#" id="myTabDropInventario3" class="dropdown-toggle" data-toggle="dropdown"
                                aria-controls="myTabDropInventario3-contents"><i class="fa fa-dropbox"></i> Req.
                                Mantenimiento<span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="myTabDropInventario3"
                                id="myTabDropInventario3-contents">
                                <li class="" title="Mantenimiento"><a href="#HistorialSolicitudMantenimiento"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i> Historial de RQ de
                                        Mantenimiento</a></li>

                                <li class="" title="Mantenimiento"><a href="#NuevoRegistroSolicitudMantenimiento"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i> Nuevo RQ de
                                        Mantenimiento</a></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="#" id="dropdowngestionpersonas" class="dropdown-toggle" data-toggle="dropdown"
                                aria-controls="dropdowngestionpersonas-contents"><i class="fa fa-dropbox "></i> Gestión
                                de personas
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdowngestionpersonas"
                                id="dropdowngestionpersonas-contents">
                                <li class="" title="Inventario"><a href="#HistorialRequerimientosPersonas"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i>Historial de requerimientos</a>
                                </li>
                                <li class="" title="Inventario"><a href="#NuevoRegistroPersonas" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>Nuevo requerimiento</a>
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
                        <div class="tab-pane fade in active" id="datos01">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Estado de la flota</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <!--<div class="col-md-12">
                                                        <p><i class="fa fa-taxi"></i> &nbsp; &nbsp;Asignados: &nbsp;1
                                                            &nbsp; &nbsp; Sin asignar: &nbsp;2</p>
                                                    </div>-->

                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-12">

                                                                <table class="table" id="tablaResumenflota">

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
                                                <h3 class="panel-title">Asignaciones</h3>
                                            </div>
                                            <div class="panel-body" id="tablaResumenflotaTarea">
                                                <div class="row" style="margin-bottom:25px">
                                                    <div class="col-md-12">
                                                        <p><span id="asig_asignar"></span> &nbsp; &nbsp;Asignados&nbsp;
                                                            &nbsp; &nbsp; <span id="asig_sinasignar"></span>&nbsp;
                                                            &nbsp;Sin Asignar</p>
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
                                                <h3 class="panel-title">Gasto Operativo</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <!--<div class="col-md-12">
                                                        <ul class="nav nav-pills">
                                                            <li role="presentation" class="active"><a
                                                                    onclick='managenementGraphs("sql_combustible_by_all", "gastoOperativoAll", "resumencombustibleGraphMensual")'
                                                                    data-toggle="tab"
                                                                    href="#resumencombustibleGraphMensual"
                                                                    aria-expanded="true">Mensual</a></li>
                                                            <li role="presentation"><a
                                                                    onclick='managenementGraphs("sql_combustible_by_all", "gastoOperativoAll", "resumencombustibleGraphAnual",365)'
                                                                    data-toggle="tab"
                                                                    href="#resumencombustibleGraphAnual"
                                                                    aria-expanded="true">Anual</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-12 tab-content">

                                                        <div class="row tab-pane fade in active"
                                                            id="resumencombustibleGraphMensual"></div>
                                                        <div class="row tab-pane fade"
                                                            id="resumencombustibleGraphAnual"></div>
                                                    </div>-->
                                                    <div class="col-md-12">
                                                        <div class="box box-body">
                                                            <div class="form-group" style="margin-bottom:5px;">
                                                                <div class="input-group">

                                                                    <span class="input-group-addon" title="Departamento"
                                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Año</span>
                                                                    <input id="txt06_anio_gasto_operativo_total_resumen"
                                                                        type="number" class="form-control"
                                                                        placeholder="Año" value="2022" />
                                                                    <span class="input-group-addon" title="Departamento"
                                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Meses</span>
                                                                    <select
                                                                        id="cbo06_meses_gasto_operativo_total_resumen"
                                                                        class="form-control selectpicker">
                                                                        <option value="-1">Todos los meses</option>
                                                                        <option value="1">Enero</option>
                                                                        <option value="2">Febrero</option>
                                                                        <option value="3">Marzo</option>
                                                                        <option value="4">Abril</option>
                                                                        <option value="5">Mayo</option>
                                                                        <option value="6">Junio</option>
                                                                        <option value="7">Julio</option>
                                                                        <option value="8">Agosto</option>
                                                                        <option value="9">Setiembre</option>
                                                                        <option value="10">Octubre</option>
                                                                        <option value="11">Noviembre</option>
                                                                        <option value="12">Diciembre</option>
                                                                    </select>
                                                                </div>


                                                            </div>
                                                            <!--<div class="btn-group" role="group"
                                                                aria-label="Basic example"
                                                                style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                                                <button id="btn06_Visual" type="button"
                                                                    class="bg-emerald-500 py-4 px-4 text-white"
                                                                    style="margin-left:5px"
                                                                    onclick="javascript:resporte_gasto_operativo_total_resumen_fixed();"><i
                                                                        class="fa fa-flash"></i> Generar
                                                                    grafica</button>                                                                                                     
                                                            </div>-->
                                                            <div class="form-group" style="margin-bottom:5px;">
                                                                <div class="col-md-12">

                                                                    <div id="chart_gasto_operativo_total_resumen">
                                                                    </div>
                                                                </div>
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
                                                <h3 class="panel-title">Costos de mantenimientos</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="col-md-12">
                                                    <ul class="nav nav-pills">
                                                        <li role="presentation" class="active"><a
                                                                onclick='managenementGraphs("sql_mantenimiento_by_all", "mantenimientoAll", "resumenMantenimientoGraphMensual")'
                                                                data-toggle="tab"
                                                                href="#resumenMantenimientoGraphMensual"
                                                                aria-expanded="true">Mensual</a></li>
                                                        <li role="presentation"><a
                                                                onclick='managenementGraphs("sql_mantenimiento_by_all", "mantenimientoAll", "resumenMantenimientoGraphAnual",365)'
                                                                data-toggle="tab" href="#resumenMantenimientoGraphAnual"
                                                                aria-expanded="true">Anual</a></li>
                                                    </ul>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 tab-content">
                                                        <div class="row tab-pane fade in active"
                                                            id="resumenMantenimientoGraphMensual"></div>
                                                        <div class="row tab-pane fade"
                                                            id="resumenMantenimientoGraphAnual"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--  <div class="row">
                                    <div class="col-md-6">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Conductores</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p>3</p>
                                                        <a href="#">
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-success"
                                                                    role="progressbar" aria-valuenow="40"
                                                                    aria-valuemin="0" aria-valuemax="100"
                                                                    style="width: 100%">
                                                                    <span class="sr-only">40% Complete (success)</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <p style="font-size:10px;">asignados</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>1</p>
                                                        <a href="#">
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-primary"
                                                                    role="progressbar" aria-valuenow="40"
                                                                    aria-valuemin="0" aria-valuemax="100"
                                                                    style="width: 100%">
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
                                                            <div class="progress-bar progress-bar-success"
                                                                role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                                aria-valuemax="100" style="width: 100%">
                                                                <span class="sr-only">40% Complete (success)</span>
                                                            </div>
                                                        </div>
                                                        <p style="font-size:10px;">activos</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>0</p>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-danger"
                                                                role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                                aria-valuemax="100" style="width: 100%">
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
                                                    <div class="col-md-6">
                                                        <div class="text-center"
                                                            style="padding :18% 0%; border:1px solid #dddddd;display:flex;align-items:center;justify-content:center">
                                                            <span
                                                                style="display:block;font-weight:bold;font-size:16px;padding:0px;width: 50px;height: 50px;line-height: 50px;background:#f1f1f1;border-radius:50%;">4</span>
                                                        </div>
                                                        <p class="text-center" style="font-size:10px;">Programados para
                                                            los proximos 15 dias.</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="text-center"
                                                            style="padding :18% 0%; border:1px solid #dddddd;display:flex;align-items:center;justify-content:center">
                                                            <span
                                                                style="display:block;font-weight:bold;font-size:16px;padding:0px;width: 50px;height: 50px;line-height: 50px;background:#f1f1f1;border-radius:50%;">3</span>
                                                        </div>
                                                        <p class="text-center" style="font-size:10px;">En proceso</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="text-center"
                                                            style="padding :18% 0%; border:1px solid #dddddd;display:flex;align-items:center;justify-content:center">
                                                            <span
                                                                style="display:block;font-weight:bold;font-size:16px;padding:0px;width: 50px;height: 50px;line-height: 50px;background:#f1f1f1;border-radius:50%;">1</span>
                                                        </div>

                                                        <p class="text-center" style="font-size:10px;">Realizados en los
                                                            ultimos 15 dias</p>
                                                    </div>

                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>-->

                            </div>
                        </div>
                        <!--<div class="tab-pane fade " id="reportesCombustible">
                            <div class="row">
                                <div class="col-md-12" id="">
                                    <div class="box box-body">
                                        <div class="col-md-10">
                                            <div class="form-group" style="margin-bottom:5px;">
                                                <div class="input-group">
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NUMERO
                                                        DE ACTIVO</span>

                                                    <input id="txt_search_vehiculo_responsable" type="text"
                                                        class="form-control" placeholder="Ingrese codigo" value="" />
                                                    <input type="hidden" id="txt_search_vehiculo_responsable_report_id"
                                                        name="" value="">
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                        <button class="fa fa-search" type="button" aria-hidden="true"
                                                            onclick="searchInput('searchVehiculoReportCombustible');"></button></span>

                                                </div>
                                                <div class="input-group">

                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Nº
                                                        de Activo</span>
                                                    <input id="txt_search_vehiculo_responsable_report_activo"
                                                        type="text" class="form-control" placeholder="..." value=""
                                                        disabled />
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Descripcion</span>
                                                    <input id="txt_search_vehiculo_responsable_report_descripcion"
                                                        type="text" class="form-control" placeholder="..." value=""
                                                        disabled />
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Tipo
                                                    </span>
                                                    <input id="txt_search_vehiculo_responsable_report_tipo" type="text"
                                                        class="form-control" placeholder="..." value="" disabled />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <ul class="nav nav-pills">
                                                <li role="presentation" class=""><button
                                                        onclick='managementGraphsReport("sql_combustible_report_by_id", "combustibleByReportId", "resumencombustibleGraphReportIndividualMensual")'
                                                        data-toggle="tab" class="bg-cyan-500 py-4 px-4 text-white"
                                                        href="#resumencombustibleGraphReportIndividualMensual"
                                                        aria-expanded="true">Mensual</button></li>
                                                <li role="presentation"><button
                                                        onclick='managementGraphsReport("sql_combustible_report_by_id", "combustibleByReportId", "resumencombustibleGraphReportIndividualAnual",365)'
                                                        data-toggle="tab" class="bg-emerald-500 py-4 px-4 text-white"
                                                        href="#resumencombustibleGraphReportIndividualAnual"
                                                        aria-expanded="true">Anual</button></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-md-12 tab-content">
                                        <div class="row tab-pane fade in active"
                                            id="resumencombustibleGraphReportIndividualMensual"></div>
                                        <div class="row tab-pane fade"
                                            id="resumencombustibleGraphReportIndividualAnual"></div>
                                    </div>
                                </div>

                            </div>
                        </div>-->
                        <div class="tab-pane fade " id="reportesCombustible">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Departamento"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Flota</span>
                                                <select id="cbo06_Contenidos_combustible"
                                                    class="form-control selectpicker">
                                                    <option value="-1">Selecciona...</option>
                                                </select>
                                                <span class="input-group-addon" title="Departamento"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Año</span>
                                                <input id="txt06_anio_combustible" type="number" class="form-control"
                                                    placeholder="Año" value="2022" />
                                                <span class="input-group-addon" title="Departamento"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Meses</span>
                                                <select id="cbo06_meses_combustible" class="form-control selectpicker">
                                                    <option value="-1">Todos los meses</option>
                                                    <option value="1">Enero</option>
                                                    <option value="2">Febrero</option>
                                                    <option value="3">Marzo</option>
                                                    <option value="4">Abril</option>
                                                    <option value="5">Mayo</option>
                                                    <option value="6">Junio</option>
                                                    <option value="7">Julio</option>
                                                    <option value="8">Agosto</option>
                                                    <option value="9">Setiembre</option>
                                                    <option value="10">Octubre</option>
                                                    <option value="11">Noviembre</option>
                                                    <option value="12">Diciembre</option>
                                                </select>
                                                <span class="input-group-addon" title="Departamento"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Equipo</span>
                                                <select id="cbo06_Equipos_combustible"
                                                    class="form-control selectpicker">
                                                    <option value="-1">Todos los Equipo</option>
                                                </select>
                                            </div>

                                            <!--<div class="col-md-2" style="display:none;">
                                                <div class="form-group" style="margin-bottom:5px;">
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
                                            </div>-->
                                        </div>
                                        <div class="btn-group" role="group" aria-label="Basic example"
                                            style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                            <button id="btn06_Visual" type="button"
                                                class="bg-emerald-500 py-4 px-4 text-white" style="margin-left:5px"
                                                onclick="javascript:resporte_combustible_fixed();"><i
                                                    class="fa fa-flash"></i> Generar grafica</button>
                                            <!-- <button type="button" class="btn btn-warning">Editar</button>                                             -->
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="col-md-12">

                                                <div id="chart_combustible">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="tab-pane fade" id="reportesMantenimiento">
                            <div class="row">
                                <div class="col-md-12" id="">
                                    <div class="box box-body">
                                        <div class="col-md-10">
                                            <div class="form-group" style="margin-bottom:5px;">
                                                <div class="input-group">
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">VEHICULO</span>

                                                    <input id="txt_search_vehiculo_mantenimiento2" type="text"
                                                        class="form-control" placeholder="Ingrese codigo" value="" />
                                                    <input type="hidden"
                                                        id="txt_search_vehiculo_mantenimiento_report_id" name=""
                                                        value="">
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                        <button class="fa fa-search" type="button" aria-hidden="true"
                                                            onclick="searchInput('searchVehiculoReportMantenimiento');"></button></span>



                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Activo</span>
                                                    <input id="txt_search_vehiculo_mantenimiento_report_activo"
                                                        type="text" class="form-control" placeholder="..." value=""
                                                        disabled />
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Descripcion</span>
                                                    <input id="txt_search_vehiculo_mantenimiento_report_descripcion"
                                                        type="text" class="form-control" placeholder="..." value=""
                                                        disabled />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <ul class="nav nav-pills">
                                                <li role="presentation" class="active"><button
                                                        onclick='managementGraphsReport("sql_mantenimiento_report_by_id", "mantenimientoByReportId", "resumenmantenimientoGraphReportIndividualMensual")'
                                                        data-toggle="tab" class="bg-cyan-500 py-4 px-4 text-white"
                                                        href="#resumenmantenimientoGraphReportIndividualMensual"
                                                        aria-expanded="true">Mensual</button></li>
                                                <li role="presentation"><button
                                                        onclick='managementGraphsReport("sql_mantenimiento_report_by_id", "mantenimientoByReportId", "resumenmantenimientoGraphReportIndividualAnual",365)'
                                                        data-toggle="tab" class="bg-emerald-500 py-4 px-4 text-white"
                                                        href="#resumenmantenimientoGraphReportIndividualAnual"
                                                        aria-expanded="true">Anual</button></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-md-12 tab-content">

                                        <div class="row tab-pane fade in active"
                                            id="resumenmantenimientoGraphReportIndividualMensual"></div>
                                        <div class="row tab-pane fade"
                                            id="resumenmantenimientoGraphReportIndividualAnual"></div>
                                    </div>

                                </div>
                            </div>

                        </div>-->
                        <div class="tab-pane fade " id="reportesMantenimiento">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Departamento"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Flota</span>
                                                <select id="cbo06_Contenidos_combustible"
                                                    class="form-control selectpicker">
                                                    <option value="-1">Selecciona...</option>
                                                </select>
                                                <span class="input-group-addon" title="Departamento"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Año</span>
                                                <input id="txt06_anio_combustible" type="number" class="form-control"
                                                    placeholder="Año" value="2022" />
                                                <span class="input-group-addon" title="Departamento"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Meses</span>
                                                <select id="cbo06_meses_combustible" class="form-control selectpicker">
                                                    <option value="-1">Todos los meses</option>
                                                    <option value="1">Enero</option>
                                                    <option value="2">Febrero</option>
                                                    <option value="3">Marzo</option>
                                                    <option value="4">Abril</option>
                                                    <option value="5">Mayo</option>
                                                    <option value="6">Junio</option>
                                                    <option value="7">Julio</option>
                                                    <option value="8">Agosto</option>
                                                    <option value="9">Setiembre</option>
                                                    <option value="10">Octubre</option>
                                                    <option value="11">Noviembre</option>
                                                    <option value="12">Diciembre</option>
                                                </select>
                                                <span class="input-group-addon" title="Departamento"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Equipo</span>
                                                <select id="cbo06_Equipos_combustible"
                                                    class="form-control selectpicker">
                                                    <option value="-1">Todos los Equipo</option>
                                                </select>
                                            </div>

                                            <!--<div class="col-md-2" style="display:none;">
                                                <div class="form-group" style="margin-bottom:5px;">
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
                                            </div>-->
                                        </div>
                                        <div class="btn-group" role="group" aria-label="Basic example"
                                            style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                            <button id="btn06_Visual" type="button"
                                                class="bg-emerald-500 py-4 px-4 text-white" style="margin-left:5px"
                                                onclick="javascript:resporte_combustible_fixed();"><i
                                                    class="fa fa-flash"></i> Generar grafica</button>
                                            <!-- <button type="button" class="btn btn-warning">Editar</button>                                             -->
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="col-md-12">

                                                <div id="chart_combustible">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="tab-pane fade" id="reportesGastoOperativo">
                            <div class="row">
                                <div class="col-md-12" id="">
                                    <div class="box box-body">
                                        <div class="col-md-10">
                                            <div class="form-group" style="margin-bottom:5px;">
                                                <div class="input-group">
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">VEHICULO</span>

                                                    <input id="txt_search_vehiculo_costoOperacional" type="text"
                                                        class="form-control" placeholder="Ingrese codigo" value="" />
                                                    <input type="hidden"
                                                        id="txt_search_vehiculo_costoOperacional_report_id" name=""
                                                        value="">
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                        <button class="fa fa-search" type="button" aria-hidden="true"
                                                            onclick="searchInput('searchVehiculoReportGastoOperativo');"></button></span>



                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Activo</span>
                                                    <input id="txt_search_vehiculo_costoOperacional_report_activo"
                                                        type="text" class="form-control" placeholder="..." value=""
                                                        disabled />
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Descripcion</span>
                                                    <input id="txt_search_vehiculo_costoOperacional_report_descripcion"
                                                        type="text" class="form-control" placeholder="..." value=""
                                                        disabled />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <ul class="nav nav-pills">
                                                <li role="presentation" class="active"><button
                                                        onclick='managementGraphsReport("sql_costoOperacional_report_by_id", "costoOperacionalByReportId", "resumencostoOperacionalGraphReportIndividualMensual")'
                                                        class="bg-cyan-500 py-4 px-4 text-white" data-toggle="tab"
                                                        href="#resumencostoOperacionalGraphReportIndividualMensual"
                                                        aria-expanded="true">Mensual</button></li>
                                                <li role="presentation"><button
                                                        onclick='managementGraphsReport("sql_costoOperacional_report_by_id", "costoOperacionalByReportId", "resumencostoOperacionalGraphReportIndividualAnual",365)'
                                                        class="bg-emerald-500 py-4 px-4 text-white" data-toggle="tab"
                                                        href="#resumencostoOperacionalGraphReportIndividualAnual"
                                                        aria-expanded="true">Anual</button></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-md-12 tab-content">

                                        <div class="row tab-pane fade in active"
                                            id="resumencostoOperacionalGraphReportIndividualMensual"></div>
                                        <div class="row tab-pane fade"
                                            id="resumencostoOperacionalGraphReportIndividualAnual"></div>
                                    </div>

                                </div>
                            </div>

                        </div>-->
                        <div class="tab-pane fade " id="reportesGastoOperativo">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Departamento"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Flota</span>
                                                <select id="cbo06_Contenidos_gasto_operativo"
                                                    class="form-control selectpicker">
                                                    <option value="-1">Selecciona...</option>
                                                </select>
                                                <span class="input-group-addon" title="Departamento"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Año</span>
                                                <input id="txt06_anio_gasto_operativo" type="number"
                                                    class="form-control" placeholder="Año" value="2022" />
                                                <span class="input-group-addon" title="Departamento"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Meses</span>
                                                <select id="cbo06_meses_gasto_operativo"
                                                    class="form-control selectpicker">
                                                    <option value="-1">Todos los meses</option>
                                                    <option value="1">Enero</option>
                                                    <option value="2">Febrero</option>
                                                    <option value="3">Marzo</option>
                                                    <option value="4">Abril</option>
                                                    <option value="5">Mayo</option>
                                                    <option value="6">Junio</option>
                                                    <option value="7">Julio</option>
                                                    <option value="8">Agosto</option>
                                                    <option value="9">Setiembre</option>
                                                    <option value="10">Octubre</option>
                                                    <option value="11">Noviembre</option>
                                                    <option value="12">Diciembre</option>
                                                </select>
                                                <span class="input-group-addon" title="Departamento"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Equipo</span>
                                                <select id="cbo06_Equipos_gasto_operativo"
                                                    class="form-control selectpicker">
                                                    <option value="-1">Todos los Equipo</option>
                                                </select>
                                            </div>

                                            <!--<div class="col-md-2" style="display:none;">
                                                <div class="form-group" style="margin-bottom:5px;">
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
                                            </div>-->
                                        </div>
                                        <div class="btn-group" role="group" aria-label="Basic example"
                                            style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                            <button id="btn06_Visual" type="button"
                                                class="bg-emerald-500 py-4 px-4 text-white" style="margin-left:5px"
                                                onclick="javascript:resporte_gasto_operativo_fixed();"><i
                                                    class="fa fa-flash"></i> Generar grafica</button>
                                            <!-- <button type="button" class="btn btn-warning">Editar</button>                                             -->
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="col-md-12">

                                                <div id="chart_gasto_operativo">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="tab-pane fade" id="reportesGastoOperativoTotal">
                            <div class="row">
                                <div class="col-md-12" id="">
                                    <div class="box box-body">
                                        <div class="col-md-10">
                                            <div class="form-group" style="margin-bottom:5px;">
                                                <div class="input-group">
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">VEHICULO</span>

                                                    <input id="txt_search_vehiculo_costoOperacional_total" type="text"
                                                        class="form-control" placeholder="Ingrese codigo" value="" />
                                                    <input type="hidden"
                                                        id="txt_search_vehiculo_costoOperacional_report_id_total"
                                                        name="" value="">
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                        <button class="fa fa-search" type="button" aria-hidden="true"
                                                            onclick="searchInput('searchVehiculoReportGastoOperativoTotal');"></button></span>



                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Activo</span>
                                                    <input id="txt_search_vehiculo_costoOperacional_report_activo_total"
                                                        type="text" class="form-control" placeholder="..." value=""
                                                        disabled />
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Descripcion</span>
                                                    <input
                                                        id="txt_search_vehiculo_costoOperacional_report_descripcion_total"
                                                        type="text" class="form-control" placeholder="..." value=""
                                                        disabled />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <ul class="nav nav-pills">
                                                <li role="presentation" class=""><button
                                                        onclick='managementGraphsReport("sql_costoOperacional_report_by_idTotal", "costoOperacionalByReportIdTotal", "resumencostoOperacionalGraphReportIndividualMensualTotal")'
                                                        data-toggle="tab" class="bg-cyan-500 py-4 px-4 text-white"
                                                        href="#resumencostoOperacionalGraphReportIndividualMensualTotal"
                                                        aria-expanded="true">Mensual</button></li>
                                                <li role="presentation"><button
                                                        onclick='managementGraphsReport("sql_costoOperacional_report_by_idTotal", "costoOperacionalByReportIdTotal", "resumencostoOperacionalGraphReportIndividualAnualTotal",365)'
                                                        data-toggle="tab" class="bg-emerald-500 py-4 px-4 text-white"
                                                        href="#resumencostoOperacionalGraphReportIndividualAnualTotal"
                                                        aria-expanded="true">Anual</button></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-md-12 tab-content">

                                        <div class="row tab-pane fade in active"
                                            id="resumencostoOperacionalGraphReportIndividualMensualTotal"></div>
                                        <div class="row tab-pane fade"
                                            id="resumencostoOperacionalGraphReportIndividualAnualTotal"></div>
                                    </div>

                                </div>
                            </div>

                        </div>-->
                        <div class="tab-pane fade " id="reportesGastoOperativoTotal">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Departamento"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Flota</span>
                                                <select id="cbo06_Contenidos_gasto_operativo_total"
                                                    class="form-control selectpicker">
                                                    <option value="-1">Selecciona...</option>
                                                </select>
                                                <span class="input-group-addon" title="Departamento"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Año</span>
                                                <input id="txt06_anio_gasto_operativo_total" type="number"
                                                    class="form-control" placeholder="Año" value="2022" />
                                                <span class="input-group-addon" title="Departamento"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Meses</span>
                                                <select id="cbo06_meses_gasto_operativo_total"
                                                    class="form-control selectpicker">
                                                    <option value="-1">Todos los meses</option>
                                                    <option value="1">Enero</option>
                                                    <option value="2">Febrero</option>
                                                    <option value="3">Marzo</option>
                                                    <option value="4">Abril</option>
                                                    <option value="5">Mayo</option>
                                                    <option value="6">Junio</option>
                                                    <option value="7">Julio</option>
                                                    <option value="8">Agosto</option>
                                                    <option value="9">Setiembre</option>
                                                    <option value="10">Octubre</option>
                                                    <option value="11">Noviembre</option>
                                                    <option value="12">Diciembre</option>
                                                </select>
                                                <span class="input-group-addon" title="Departamento"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Equipo</span>
                                                <select id="cbo06_Equipos_gasto_operativo_total"
                                                    class="form-control selectpicker">
                                                    <option value="-1">Todos los Equipo</option>
                                                </select>
                                            </div>

                                            <!--<div class="col-md-2" style="display:none;">
                                                <div class="form-group" style="margin-bottom:5px;">
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
                                            </div>-->
                                        </div>
                                        <div class="btn-group" role="group" aria-label="Basic example"
                                            style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                            <button id="btn06_Visual" type="button"
                                                class="bg-emerald-500 py-4 px-4 text-white" style="margin-left:5px"
                                                onclick="javascript:resporte_gasto_operativo_total_fixed();"><i
                                                    class="fa fa-flash"></i> Generar grafica</button>
                                            <!-- <button type="button" class="btn btn-warning">Editar</button>                                             -->
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="col-md-12">

                                                <div id="chart_gasto_operativo_total">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="HistorialCombustible">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="search01OperacionCumbustible">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-primary" style="width:100%">
                                        <div class="box-header no-padding">
                                            <div class="box-body table-responsive no-padding">
                                                <table style="width:100%"
                                                    class="datatable table table-striped table-bordered"
                                                    id="grd01OperacionCumbustible">
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
                        <div class="tab-pane fade" id="NuevoRegistroCombustible">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">VEHICULO</span>
                                                <div style="display:flex">
                                                    <input id="txt_search_vehiculo_comburtible" type="text"
                                                        class="form-control" placeholder="Ingrese Numero de Activo"
                                                        value="" />
                                                    <input type="hidden" id="txt_tarea_vehiculo_comburtible" name=""
                                                        value="">
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                        <button class="fa fa-search" type="button" aria-hidden="true"
                                                            onclick="searchInput('searchVehiculoCombustible');"></button></span>
                                                </div>
                                                <div class="input-group">

                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Activo</span>
                                                    <input id="txt_input_search_vehiculo_comburtibleactivo" type="text"
                                                        class="form-control" placeholder="..." value="" disabled />
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Descripcion</span>
                                                    <input id="txt_input_search_vehiculo_comburtibledescripcion"
                                                        type="text" class="form-control" placeholder="..." value=""
                                                        disabled />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CONDUCTOR</span>
                                                <div style="display:flex">
                                                    <input id="txt_search_vehiculo_ope" type="text" class="form-control"
                                                        placeholder="Ingrese Numero de DNI" value="" />
                                                    <input type="hidden" id="txt_vehiculo_combustible" name="" value="">
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                        <button class="fa fa-search" type="button" aria-hidden="true"
                                                            onclick="searchInput('searchConductor2');"></button></span>
                                                </div>
                                                <div class="input-group">

                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Nombre</span>
                                                    <input id="txt_vehiculo_combustible_nombre" type="text"
                                                        class="form-control" placeholder="..." value="" disabled />
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Apellido</span>
                                                    <input id="txt_vehiculo_combustible_apellido" type="text"
                                                        class="form-control" placeholder="..." value="" disabled />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PROVEEDOR</span>
                                                <div style="display:flex">
                                                    <input id="txt_search_combustible_proveedor" type="text"
                                                        class="form-control" placeholder="Ingrese Numero de RUC"
                                                        value="" />
                                                    <input type="hidden" id="txt_combustible_proveedor_id" name=""
                                                        value="">
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                        <button class="fa fa-search" type="button" aria-hidden="true"
                                                            onclick="searchInput('searchProveedor');"></button></span>
                                                </div>
                                                <div class="input-group">

                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Nombre</span>
                                                    <input id="txt_combustible_proveedor_nombre" type="text"
                                                        class="form-control" placeholder="..." value="" disabled />
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Direccion</span>
                                                    <input id="txt_combustible_proveedor_apellido" type="text"
                                                        class="form-control" placeholder="..." value="" disabled />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TIPO
                                                    DE COMBUSTIBLE</span>

                                                <select id="txt_combustible_tipo" class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>
                                                    <option value="0">Gasolina de 90
                                                    </option>
                                                    <option value="1">Gasolina de 95
                                                    </option>
                                                    <option value="2">Gasolina de 97
                                                    </option>
                                                    <option value="4">Diésel
                                                    </option>
                                                    <option value="5">GLP
                                                    </option>
                                                </select>
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA</span>
                                                <input id="txt_combustible_fecha" type="date" class="form-control"
                                                    placeholder="..." value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">HORA</span>
                                                <input id="txt_combustible_hora" type="time" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CANTIDAD
                                                    (En galones)
                                                </span>
                                                <input id="txt_combustible_cantidad" type="number" class="form-control"
                                                    value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PRECIO
                                                    POR GALON (En soles S/.)
                                                </span>
                                                <input id="txt_combustible_precio" type="number" class="form-control"
                                                    placeholder="..." value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TOTAL</span>
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">S/.</span>
                                                <input id="txt_combustible_total" type="number" class="form-control"
                                                    placeholder="..." value="" disabled />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                        <button type="button" class="bg-emerald-500 py-4 px-4 text-white"
                                            onclick="add_combustible();">Guardar</button>
                                        <!-- <button type="button" class="btn btn-warning">Editar</button>                                             -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="HistorialTareas">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="search01OperacionTarea">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-primary" style="width:100%">
                                        <div class="box-header no-padding">
                                            <div class="box-body table-responsive no-padding">
                                                <table style="width:100%"
                                                    class="datatable table table-striped table-bordered"
                                                    id="grd01OperacionTarea">
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
                        <!--<div class="tab-pane fade" id="NuevoRegistroTareas">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DESCRIPCION
                                                    DE LA TAREA</span>
                                                <input id="txt_tarea_nombre" type="text" class="form-control"
                                                    value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TIPO
                                                    DE LA TAREA</span>
                                                <input id="txt_tarea_tipo" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA
                                                    LIMITE</span>
                                                <input id="txt_tarea_fecha_limite" type="date" class="form-control"
                                                    value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PRIORIDAD</span>

                                                <select id="txt_tarea_prioridad" class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>
                                                    <option value="0">Baja
                                                    </option>
                                                    <option value="1">Media
                                                    </option>
                                                    <option value="2">Alta
                                                    </option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">VEHICULO</span>
                                                <div style="display:flex">
                                                    <input id="txt_search_vehiculo" type="text" class="form-control"
                                                        placeholder="Ingrese Numero de Activo" value="" />
                                                    <input type="hidden" id="txt_tarea_vehiculo_empleado" name=""
                                                        value="">
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                        <button class="fa fa-search" type="button" aria-hidden="true"
                                                            onclick="searchInput('searchVehiculo');"></button></span>
                                                </div>
                                                <div class="input-group">

                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Activo</span>
                                                    <input id="txt_input_search_vehiculo_activo" type="text"
                                                        class="form-control" placeholder="..." value="" disabled />
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Descripcion</span>
                                                    <input id="txt_input_search_vehiculo_descripcion" type="text"
                                                        class="form-control" placeholder="..." value="" disabled />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">RESPONSABLE</span>
                                                <div style="display:flex">
                                                    <input id="txt_search_responsable" type="text" class="form-control"
                                                        placeholder="Ingrese DNI" value="" />
                                                    <input type="hidden" id="txt_tarea_responsable" name="" value="">
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                        <button class="fa fa-search" type="button" aria-hidden="true"
                                                            onclick="searchInput('searchResponsable');"></button></span>
                                                </div>
                                                <div class="input-group">

                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Nombres</span>
                                                    <input id="txt_input_search_responsable_nombres" type="text"
                                                        class="form-control" placeholder="..." value="" disabled />
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Apellidos</span>
                                                    <input id="txt_input_search_responsable_apellidos" type="text"
                                                        class="form-control" placeholder="..." value="" disabled />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CONDUCTOR</span>
                                                <div style="display:flex">
                                                    <input id="txt_search_conductor" type="text" class="form-control"
                                                        placeholder="Ingrese DNI" value="" />
                                                    <input type="hidden" id="txt_tarea_conductor" name="" value="">
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                        <button class="fa fa-search" type="button" aria-hidden="true"
                                                            onclick="searchInput('searchConductor');"></button></span>
                                                </div>
                                                <div class="input-group">

                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Nombres</span>
                                                    <input id="txt_input_search_conductor_nombres" type="text"
                                                        class="form-control" placeholder="..." value="" disabled />
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Apellidos</span>
                                                    <input id="txt_input_search_conductor_apellidos" type="text"
                                                        class="form-control" placeholder="..." value="" disabled />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">COMENTARIO</span>
                                                <button class="bg-cyan-500 py-4 px-4 text-white" type="button"
                                                    onclick="addComentario('txt_tarea_comentario','ComentarioParent','tareaComentarioHijo');"><i
                                                        class="fa fa-plus-circle "></i></button>
                                            </div>
                                        </div>
                                        <div class="box-primary">
                                            <div class="box-header no-padding">
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="datatable table table-striped table-bordered text-xl"
                                                        id="txt_tarea_comentario">
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
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                        <button type="button" class="bg-emerald-500 py-4 px-4 text-white"
                                            onclick="add_tarea();">Guardar</button>                                     
                                    </div>
                                </div>
                            </div>
                        </div>-->
                        <div class="tab-pane" id="HistorialMantenimiento">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="search01OperacionMantenimiento">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-primary" style="width:100%">
                                        <div class="box-header no-padding">
                                            <div class="box-body table-responsive no-padding">
                                                <table style="width:100%"
                                                    class="datatable table table-striped table-bordered"
                                                    id="grd01OperacionMantenimiento">
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
                        <div class="tab-pane" id="HistorialSolicitudMantenimiento">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="search01OperacionSolicitudMantenimiento">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-primary" style="width:100%">
                                        <div class="box-header no-padding">
                                            <div class="box-body table-responsive no-padding">
                                                <table style="width:100%"
                                                    class="datatable table table-striped table-bordered"
                                                    id="grd01OperacionSolicitudMantenimiento">
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
                        <div class="tab-pane" id="NuevoRegistroSolicitudMantenimiento">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">VEHICULO</span>
                                                <div style="display:flex">
                                                    <input id="txt_search_vehiculo_solicitud_mantenimiento" type="text"
                                                        class="form-control" placeholder="Ingrese Numero de codigo"
                                                        value="" />
                                                    <input type="hidden" id="txt_vehiculo_solicitud_mantenimiento"
                                                        name="" value="">
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                        <button class="fa fa-search" type="button" aria-hidden="true"
                                                            onclick="searchInput('searchVehiculoSolicitudMantenimiento');"></button></span>
                                                </div>
                                                <div class="input-group">

                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Activo</span>
                                                    <input id="txt_vehiculo_solicitud_mantenimiento_activo" type="text"
                                                        class="form-control" placeholder="..." value="" disabled />
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Descripcion</span>
                                                    <input id="txt_vehiculo_solicitud_mantenimiento_descripcion"
                                                        type="text" class="form-control" placeholder="..." value=""
                                                        disabled />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <!--<span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DPTO
                                                    ASIGNADO
                                                </span>
                                                <select id="txt_solicitud_mantenimiento_dpt_asignado"
                                                    class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>

                                                </select>-->
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PRIORIDAD</span>
                                                <select id="txt_solicitud_mantenimiento_prioridad"
                                                    class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>
                                                    <option value="1">BAJA (Atendidas dentro de los 7 días).
                                                    </option>
                                                    <option value="2">MEDIA (Atendidas dentro de las 72).

                                                    </option>
                                                    <option value="3">ALTA (Atendidas dentro de las 48 hrs. (Suministros
                                                        críticos)).
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TIPO
                                                    DE MANTENIMIENTO
                                                </span>
                                                <select id="txt_solicitud_mantenimiento_tipo" class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>
                                                </select>
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA</span>
                                                <input id="txt_solicitud_mantenimiento_fecha" type="date"
                                                    class="form-control" value="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <span class="input-group-addon text-xl" title="Expositor"
                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DESCRIPCION
                                            </span>
                                            <textarea class="form-control" id="txt_solicitud_mantenimiento_descripcion"
                                                rows="5"></textarea>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">COMENTARIO</span>
                                                <button class="bg-cyan-500 py-4 px-4 text-white" type="button"
                                                    onclick="addComentario('txt_solicitud_mantenimiento_comentario','ComentarioParentSolicitudMantenimiento','ComentarioHijoSolicitudMantenimiento');"><i
                                                        class="fa fa-plus-circle "></i></button>
                                            </div>
                                        </div>

                                        <div class="box-primary">
                                            <div class="box-header no-padding">
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="datatable table table-striped table-bordered"
                                                        id="txt_solicitud_mantenimiento_comentario">
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
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                        <button type="button" class="bg-emerald-500 py-4 px-4 text-white"
                                            onclick="add_solicitudMantenimiento();">Guardar</button>
                                        <!-- <button type="button" class="btn btn-warning">Editar</button>                                             -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="NuevoRegistroMantenimiento">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRE
                                                    DEL SERVICIO</span>
                                                <input id="txt_mantenimiento_nombre" type="text" class="form-control"
                                                    value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TIPO
                                                    DE MANTENIMIENTO</span>
                                                <select id="txt_mantenimiento_tipo" class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>
                                                    <option value="0">1
                                                    </option>
                                                    <option value="1">2
                                                    </option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">REFERENCIA</span>
                                                <input id="txt_mantenimiento_referencia" type="text"
                                                    class="form-control" value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA
                                                    INICIO DE MANTENIMIENTO</span>
                                                <input id="txt_mantenimiento_fecha_inicio" type="date"
                                                    class="form-control" value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">HORA
                                                    INICIO</span>
                                                <input id="txt_mantenimiento_hora_inicio" type="time"
                                                    class="form-control" placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA
                                                    ESTIMADA DE ENTREGA</span>
                                                <input id="txt_mantenimiento_fecha_entrega" type="date"
                                                    class="form-control" value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">HORA
                                                    ESTIMADA</span>
                                                <input id="txt_mantenimiento_hora_estimada" type="time"
                                                    class="form-control" value="" />
                                            </div>
                                        </div>
                                        <!--<div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ETIQUETAS</span>
                                                <input id="txt_mantenimiento_etiqueta" type="text" class="form-control"
                                                    value="" />
                                            </div>
                                        </div>-->
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ORDEN
                                                    DE SERVICIO</span>
                                                <input id="txt_mantenimiento_orden" type="text" class="form-control"
                                                    value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CAUSA
                                                    RAIZ</span>
                                                <input id="txt_mantenimiento_causa" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">UBICACION</span>
                                                <input id="txt_mantenimiento_ubicacion" type="text" class="form-control"
                                                    value="" />
                                            </div>
                                        </div>




                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">VEHICULO</span>
                                                <div style="display:flex">
                                                    <input id="txt_search_vehiculo_mantenimiento" type="text"
                                                        class="form-control" placeholder="Ingrese Numero de codigo"
                                                        value="" />
                                                    <input type="hidden" id="txt_vehiculo_combustible_id" name=""
                                                        value="">
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                        <button class="fa fa-search" type="button" aria-hidden="true"
                                                            onclick="searchInput('searchVehiculoMantenimiento');"></button></span>
                                                </div>
                                                <div class="input-group">

                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Activo</span>
                                                    <input id="txt_vehiculo_combustible_activo" type="text"
                                                        class="form-control" placeholder="..." value="" disabled />
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Descripcion</span>
                                                    <input id="txt_vehiculo_combustible_descripcion" type="text"
                                                        class="form-control" placeholder="..." value="" disabled />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CONDUCTOR</span>
                                                <div style="display:flex">
                                                    <input id="txt_vehiculo_combustible_conductor" type="text"
                                                        class="form-control" placeholder="Ingrese Numero de DNI"
                                                        value="" />
                                                    <input type="hidden" id="txt_vehiculo_combustible_conductor_id"
                                                        name="" value="">
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                        <button class="fa fa-search" type="button" aria-hidden="true"
                                                            onclick="searchInput('searchConductorMantenimiento');"></button></span>
                                                </div>
                                                <div class="input-group">

                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Nombre</span>
                                                    <input id="txt_vehiculo_combustible_conductor_nombre" type="text"
                                                        class="form-control" placeholder="..." value="" disabled />
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Apellido</span>
                                                    <input id="txt_vehiculo_combustible_conductor_apellido" type="text"
                                                        class="form-control" placeholder="..." value="" disabled />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">RESPONSABLE</span>
                                                <div style="display:flex">
                                                    <input id="txt_vehiculo_combustible_responsable" type="text"
                                                        class="form-control" placeholder="Ingrese Numero de DNI"
                                                        value="" />
                                                    <input type="hidden" id="txt_vehiculo_combustible_responsable_id"
                                                        name="" value="">
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                        <button class="fa fa-search" type="button" aria-hidden="true"
                                                            onclick="searchInput('searchResponsableMantenimiento');"></button></span>
                                                </div>
                                                <div class="input-group">

                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Nombre</span>
                                                    <input id="txt_vehiculo_combustible_responsable_nombre" type="text"
                                                        class="form-control" placeholder="..." value="" disabled />
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Apellido</span>
                                                    <input id="txt_vehiculo_combustible_responsable_apellido"
                                                        type="text" class="form-control" placeholder="..." value=""
                                                        disabled />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PROVEEDOR</span>
                                                <div style="display:flex">
                                                    <input id="txt_vehiculo_combustible_proveedor" type="text"
                                                        class="form-control" placeholder="Ingrese Numero de DNI"
                                                        value="" />
                                                    <input type="hidden" id="txt_vehiculo_combustible_proveedor_id"
                                                        name="" value="">
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                        <button class="fa fa-search" type="button" aria-hidden="true"
                                                            onclick="searchInput('searchProveedorantenimiento');"></button></span>
                                                </div>
                                                <div class="input-group">

                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Nombre</span>
                                                    <input id="txt_vehiculo_combustible_proveedor_nombre" type="text"
                                                        class="form-control" placeholder="..." value="" disabled />
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Apellido</span>
                                                    <input id="txt_vehiculo_combustible_proveedor_apellido" type="text"
                                                        class="form-control" placeholder="..." value="" disabled />
                                                </div>
                                            </div>
                                        </div>
                                        <!--  <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">VEHICULO</span>
                                                <input id="txt_mantenimiento_vehiculo" type="text" class="form-control"
                                                    value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CONDUCTOR</span>
                                                <input id="txt_mantenimiento_conductor" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">RESPONSABLE</span>
                                                <input id="txt_mantenimiento_responsable" type="text"
                                                    class="form-control" value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PROVEEDOR</span>
                                                <input id="txt_mantenimiento_proveedor" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>-->
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">COMENTARIO</span>
                                                <button class="bg-cyan-500 py-4 px-4 text-white" type="button"
                                                    onclick="addComentario('txt_combustible_comentario','ComentarioParentCombustible','ComentarioHijoCombustible');"><i
                                                        class="fa fa-plus-circle "></i></button>
                                            </div>
                                        </div>
                                        <div class="box-primary">
                                            <div class="box-header no-padding">
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="datatable table table-striped table-bordered"
                                                        id="txt_combustible_comentario">
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
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                        <button type="button" class="bg-emerald-500 py-4 px-4 text-white"
                                            onclick="add_mantenimiento();">Guardar</button>
                                        <!-- <button type="button" class="btn btn-warning">Editar</button>                                             -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="HistorialCostosOperarios">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="search01OperacionCostosOperativos">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-primary" style="width:100%">
                                        <div class="box-header no-padding">
                                            <div class="box-body table-responsive no-padding">
                                                <table style="width:100%"
                                                    class="datatable table table-striped table-bordered"
                                                    id="grd01OperacionCostosOperativos">
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
                        <div class="tab-pane fade" id="OperacionGastoOperativo">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRE
                                                    DEL GASTO</span>
                                                <input id="txt_gastosoperarios_nombre" type="text" class="form-control"
                                                    value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TIPO
                                                    DE GASTO</span>
                                                <input id="txt_gastosoperarios_tipo" type="text" class="form-control"
                                                    value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">VEHICULO</span>
                                                <div style="display:flex">
                                                    <input id="txt_gastosoperarios_search_vehiculo" type="text"
                                                        class="form-control" placeholder="Ingrese Numero de codigo"
                                                        value="" />
                                                    <input type="hidden" id="txt_gastosoperarios_search_vehiculo_id"
                                                        name="" value="">
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                        <button class="fa fa-search" type="button" aria-hidden="true"
                                                            onclick="searchInput('searchVehiculoCostosOperarios');"></button></span>
                                                </div>
                                                <div class="input-group">

                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Activo</span>
                                                    <input id="txt_gastosoperarios_search_activo" type="text"
                                                        class="form-control" placeholder="..." value="" disabled />
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Descripcion</span>
                                                    <input id="txt_gastosoperarios_search_descripcion" type="text"
                                                        class="form-control" placeholder="..." value="" disabled />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CONDUCTOR</span>
                                                <div style="display:flex">
                                                    <input id="txt_gastosoperarios_search_conductor" type="text"
                                                        class="form-control" placeholder="Ingrese Numero de codigo"
                                                        value="" />
                                                    <input type="hidden" id="txt_gastosoperarios_search_conductor_id"
                                                        name="" value="">
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                        <button class="fa fa-search" type="button" aria-hidden="true"
                                                            onclick="searchInput('searchConductorCostosOperarios');"></button></span>
                                                </div>
                                                <div class="input-group">

                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Activo</span>
                                                    <input id="txt_gastosoperarios_conductor_search_activo" type="text"
                                                        class="form-control" placeholder="..." value="" disabled />
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Descripcion</span>
                                                    <input id="txt_gastosoperarios_conductor_search_descripcion"
                                                        type="text" class="form-control" placeholder="..." value=""
                                                        disabled />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">REFERENCIA</span>
                                                <input id="txt_gastosoperarios_referencia" type="text"
                                                    class="form-control" value="" />
                                                <!--<span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ETIQUETAS</span>
                                                <input id="txt_gastosoperarios_etiquetas" type="text"
                                                    class="form-control" value="" />-->
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA
                                                    EN QUE SUCEDIO</span>
                                                <input id="txt_gastosoperarios_fecha" type="date" class="form-control"
                                                    value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">HORA
                                                    DE CARGA</span>
                                                <input id="txt_gastosoperarios_hora" type="time" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CANTIDAD</span>
                                                <input id="txt_gastosoperarios_cantidad" type="number"
                                                    class="form-control" value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">COSTO
                                                    UNITARIO (En soles S/.)</span>
                                                <input id="txt_gastosoperarios_precio" type="number"
                                                    class="form-control" placeholder="..." value="" />

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TOTAL</span>
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">S/.</span>
                                                <input id="txt_gastosoperarios_total" type="text" class="form-control"
                                                    value="" disabled />
                                            </div>
                                        </div>

                                        <!--  <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">VEHICULO</span>
                                                <input id="txt_mantenimiento_vehiculo" type="text" class="form-control"
                                                    value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CONDUCTOR</span>
                                                <input id="txt_mantenimiento_conductor" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">RESPONSABLE</span>
                                                <input id="txt_mantenimiento_responsable" type="text"
                                                    class="form-control" value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PROVEEDOR</span>
                                                <input id="txt_mantenimiento_proveedor" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>-->
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                        <button type="button" class="bg-emerald-500 py-4 px-4 text-white"
                                            onclick="add_costosoperativos();">Guardar</button>
                                        <!-- <button type="button" class="btn btn-warning">Editar</button>                                             -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="flotavehiculos">
                            <div class="row">
                                <!-- <div class="col-md-2">
                                    <div class="list-group">
                                        <a href="#" id="link_Flota_Vehiculos"
                                            class="list-group-item list-group-item-action active" aria-current="true"
                                            onclick='HistorialdeVehiculo();'>
                                            <i class="fa fa-folder-open margin-r-5"></i>Historial de Vehiculos
                                        </a>
                                    </div>
                                </div>-->
                                <div class="col-md-12" id="contentVehiculos">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="search01FlotaVehiculo">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-primary" style="width:100%">
                                        <div class="box-header no-padding">
                                            <div class="box-body table-responsive no-padding">
                                                <table style="width:100%"
                                                    class="datatable table table-striped table-bordered"
                                                    id="grd01FlotaVehiculo">
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                    </div>
                                </div>
                                <div class="col-md-12" style="display:none" id="detalleVehiculo">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <a href="#" style="background-color:#fff;
                                                                                border-radius:50%;
                                                                                padding:15px;
                                                                                display:inline-block;">
                                                                <i class="fa fa-car fa-3x"></i>
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"><span
                                                                    id="view_descripcion"></span>
                                                            </h4>
                                                            <hr>
                                                            <div class="row">

                                                                <div class="col-md-2">
                                                                    <p style="color:gray; font-size:13px;"><i
                                                                            class="fa fa-film"></i> <span
                                                                            id="view_placa"></span></p>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="color:gray; font-size:13px;"><i
                                                                            class="fa fa-tachometer"
                                                                            style="color:gray;"></i><span
                                                                            id="view_odometro"></span></p>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="color:gray; font-size:13px;"><i
                                                                            class="fa fa-toggle-on"
                                                                            style="color:gray;"></i><span
                                                                            id="view_estado"></span></p>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <!--<p style="color:gray; font-size:13px;"><i
                                                                            class="fa fa-share-alt"
                                                                            style="color:gray;"></i><span
                                                                            id="view_marca"></span></p>-->
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <!--<p style="color:gray; font-size:13px;"><i
                                                                            class="fa fa-user-circle-o"
                                                                            style="color:gray;"></i> <span
                                                                            id="view_conductor"></span></p>-->
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div
                                                                        style="color:black; font-size:13px;text-align:right;">
                                                                        <i class="fa fa-chevron-circle-left"
                                                                            onClick="ViewVehicleDetalle();" ;
                                                                            style="font-size:25px"></i><span
                                                                            id=""></span></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </h3>
                                            </div>
                                            <div class="panel-body">
                                                <ul class="nav nav-pills">
                                                    <li role="" class="active"><a data-toggle="tab"
                                                            href="#vehiculoresumen">Resumen</a></li>
                                                    <li role="presentation"><a data-toggle="tab"
                                                            href="#vehiculodetalle">Detalle
                                                            del
                                                            vehiculo</a></li>
                                                    <li role="presentation"><a data-toggle="tab"
                                                            href="#vehiculodocumentos">Documentos</a></li>
                                                    <li role="presentation" class="dropdown">
                                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"
                                                            role="button" aria-haspopup="true" aria-expanded="false">
                                                            Operación <span class="caret"></span>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <!--<li role="presentation"><a data-toggle="tab"
                                                                    href="#vehiculotarea">Asignación de tarea</a></li>-->
                                                            <li role="presentation"><a data-toggle="tab"
                                                                    href="#vehiculocombustible">Combustible</a></li>
                                                            <li role="presentation"><a data-toggle="tab"
                                                                    href="#vehiculomantenimiento">Mantenimiento</a></li>
                                                            <li role="presentation"><a data-toggle="tab"
                                                                    href="#vehiculogastooperativo">Gasto Operativo</a>
                                                            </li>

                                                    </li>
                                                </ul>
                                                </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 tab-content">
                                        <div id="vehiculoresumen" class="tab-pane fade in active">
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
                                                                    <button type="button"
                                                                        class="bg-cyan-500  py-2 px-2 text-white btn-circle "
                                                                        data-toggle="modal"
                                                                        data-target="#ModalOdometro"><i
                                                                            class="fa fa-plus"></i>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="panel-body">
                                                            <table class="datatable table" id="odometroTable">

                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal -->
                                                <div class="modal fade" id="ModalOdometro" tabindex="-1" role="dialog"
                                                    aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close"><span
                                                                        aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="myModalLabel">Agregar
                                                                    Odometro
                                                                </h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="box box-body">

                                                                    <!--<div class="form-group" style="margin-bottom:5px;">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon text-xl"
                                                                                title="Expositor"
                                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA</span>

                                                                            <input id="txt_odo_add_fecha" type="date"
                                                                                class="form-control" value="" />


                                                                            <span class="input-group-addon text-xl"
                                                                                title="Expositor"
                                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">HORA

                                                                            </span>

                                                                            <input id="txt_odo_add_hora" type="time"
                                                                                class="form-control" />
                                                                            <input type="hidden"
                                                                                id="txt_id_programa_capacitacion"
                                                                                value="">
                                                                            <input type="hidden"
                                                                                id="txt_id_modal_programa_capacitacion_type"
                                                                                value="">

                                                                        </div>
                                                                    </div>-->
                                                                    <div class="form-group" style="margin-bottom:5px;">
                                                                        <div class="input-group">



                                                                            <span class="input-group-addon text-xl"
                                                                                title="Expositor"
                                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ODOMETRO</span>
                                                                            <input id="txt_odo_add_odometro"
                                                                                type="number" class="form-control"
                                                                                placeholder="..." value="" />

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button"
                                                                    class="bg-gray-500  py-2 px-2 text-white"
                                                                    data-dismiss="modal">Cancelar</button>
                                                                <button type="button"
                                                                    class="bg-emerald-500  py-2 px-2 text-white"
                                                                    onclick="add_odometro();">Guardar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <div class="row">
                                                                <div class="col-md-11">
                                                                    <h3 class="panel-title">Asignacione de Tarea</h3>
                                                                </div>
                                                                <div class="col-md-1" style="padding:0px 10px">
                                                                    <!-- Button trigger modal -->
                                                                    <button type="button"
                                                                        class="bg-cyan-500  py-2 px-2 text-white btn-circle "
                                                                        onClick="openModalGeneric('ModalAsigacionesVehiculo');"><i
                                                                            class="fa fa-plus"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="ModalAsigacionesVehiculo"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="asignacionesLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close"><span
                                                                                aria-hidden="true">&times;</span></button>
                                                                        <h4 class="modal-title" id="asignacionesLabel"
                                                                            style="color:black">Agregar asignación</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="box box-body">
                                                                            <div class="form-group">
                                                                                <div style="display:flex;">
                                                                                    <span
                                                                                        class="input-group-addon text-xl"
                                                                                        title="Expositor"
                                                                                        style="background:#EEEEEE;font-weight:bold; width:200px">Conductor</span>
                                                                                    <div style="display:flex">
                                                                                        <input
                                                                                            id="txt_search_conductor_operaciones_asignaciones"
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder="Buscar por DNI para Ingresar"
                                                                                            value="" />
                                                                                        <input type="hidden"
                                                                                            id="txt_id_hidden_conductor_operaciones_asignaciones"
                                                                                            name="" value="">
                                                                                        <span
                                                                                            class="input-group-addon text-xl"
                                                                                            title="Expositor"
                                                                                            style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                                                            <button type="button"
                                                                                                class="fa fa-search"
                                                                                                aria-hidden="true"
                                                                                                onclick="searchInput('searchConductorOperacionesAsignacion');"></button></span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="input-group"
                                                                                    style="margin-top:20px;">

                                                                                    <span
                                                                                        class="input-group-addon text-xl"
                                                                                        title="Expositor"
                                                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Nombres</span>
                                                                                    <input
                                                                                        id="txt_search_conductor_nombres_operaciones_asignaciones"
                                                                                        type="text" class="form-control"
                                                                                        placeholder="..." value=""
                                                                                        disabled />
                                                                                    <span
                                                                                        class="input-group-addon text-xl"
                                                                                        title="Expositor"
                                                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Apellidos</span>
                                                                                    <input
                                                                                        id="txt_search_conductor_apellidos_operaciones_asignaciones"
                                                                                        type="text" class="form-control"
                                                                                        placeholder="..." value=""
                                                                                        disabled />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group"
                                                                                style="margin-bottom:5px;">
                                                                                <div class="input-group">
                                                                                    <span
                                                                                        class="input-group-addon text-xl"
                                                                                        title="Expositor"
                                                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">RESPONSABLE</span>
                                                                                    <div style="display:flex">
                                                                                        <input
                                                                                            id="txt_search_responsable"
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder="Ingrese DNI"
                                                                                            value="" />
                                                                                        <input type="hidden"
                                                                                            id="txt_tarea_responsable"
                                                                                            name="" value="">
                                                                                        <span
                                                                                            class="input-group-addon text-xl"
                                                                                            title="Expositor"
                                                                                            style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                                                            <button class="fa fa-search"
                                                                                                type="button"
                                                                                                aria-hidden="true"
                                                                                                onclick="searchInput('searchResponsable');"></button></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group"
                                                                                style="margin-bottom:5px;">
                                                                                <div class="input-group">
                                                                                    <div class="input-group">

                                                                                        <span
                                                                                            class="input-group-addon text-xl"
                                                                                            title="Expositor"
                                                                                            style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Nombres</span>
                                                                                        <input
                                                                                            id="txt_input_search_responsable_nombres"
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder="..." value=""
                                                                                            disabled />
                                                                                        <span
                                                                                            class="input-group-addon text-xl"
                                                                                            title="Expositor"
                                                                                            style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Apellidos</span>
                                                                                        <input
                                                                                            id="txt_input_search_responsable_apellidos"
                                                                                            type="text"
                                                                                            class="form-control"
                                                                                            placeholder="..." value=""
                                                                                            disabled />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group"
                                                                                style="margin-bottom:5px;">
                                                                                <div class="input-group">
                                                                                    <span
                                                                                        class="input-group-addon text-xl"
                                                                                        title="Expositor"
                                                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                                                        PROYECTO / CONTRATO</span>

                                                                                    <input id="txt_asi_add_nombre"
                                                                                        type="text" class="form-control"
                                                                                        value="" />

                                                                                </div>

                                                                            </div>
                                                                            <div class="form-group"
                                                                                style="margin-bottom:5px;">
                                                                                <div class="input-group">
                                                                                    <span
                                                                                        class="input-group-addon text-xl"
                                                                                        title="Expositor"
                                                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DESCRIPCION
                                                                                        DE LA TAREA</span>
                                                                                    <input id="txt_tarea_nombre"
                                                                                        type="text" class="form-control"
                                                                                        value="" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group"
                                                                                style="margin-bottom:5px;">
                                                                                <div class="input-group">
                                                                                    <span
                                                                                        class="input-group-addon text-xl"
                                                                                        title="Expositor"
                                                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                                                        TIPO</span>
                                                                                    <select
                                                                                        id="txt_select_operaciones_asignaciones_tipo"
                                                                                        class="form-control ">
                                                                                        <option value="-1">Selecciona...
                                                                                        </option>
                                                                                        <option value="0">Alquiler
                                                                                        </option>
                                                                                        <option value="1">Servicio
                                                                                        </option>
                                                                                    </select>

                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group"
                                                                                style="margin-bottom:5px;">
                                                                                <div class="input-group">
                                                                                    <span
                                                                                        class="input-group-addon text-xl"
                                                                                        title="Expositor"
                                                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA
                                                                                        INICIAL</span>

                                                                                    <input id="txt_asig_add_fecha_ini"
                                                                                        type="date" class="form-control"
                                                                                        value="" />


                                                                                    <span
                                                                                        class="input-group-addon text-xl"
                                                                                        title="Expositor"
                                                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">HORA
                                                                                        INICIAL

                                                                                    </span>

                                                                                    <input id="txt_asig_add_hora_ini"
                                                                                        type="time"
                                                                                        class="form-control" />
                                                                                    <input type="hidden"
                                                                                        id="txt_id_programa_capacitacion"
                                                                                        value="">
                                                                                    <input type="hidden"
                                                                                        id="txt_id_modal_programa_capacitacion_type"
                                                                                        value="">

                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group"
                                                                                style="margin-bottom:5px;">
                                                                                <div class="input-group">



                                                                                    <span
                                                                                        class="input-group-addon text-xl"
                                                                                        title="Expositor"
                                                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA
                                                                                        FINAL</span>

                                                                                    <input id="txt_asig_add_fecha_fin"
                                                                                        type="date" class="form-control"
                                                                                        value="" />


                                                                                    <span
                                                                                        class="input-group-addon text-xl"
                                                                                        title="Expositor"
                                                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">HORA
                                                                                        FINAL

                                                                                    </span>

                                                                                    <input id="txt_asig_add_hora_fin"
                                                                                        type="time"
                                                                                        class="form-control" />

                                                                                </div>
                                                                            </div>


                                                                            <div class="form-group"
                                                                                style="margin-bottom:5px;">
                                                                                <div class="input-group">



                                                                                    <span
                                                                                        class="input-group-addon text-xl"
                                                                                        title="Expositor"
                                                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PUNTO
                                                                                        DE PARTIDA</span>

                                                                                    <input
                                                                                        id="txt_asig_add_punto_partida"
                                                                                        type="text"
                                                                                        class="form-control" />

                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group"
                                                                                style="margin-bottom:5px;">
                                                                                <div class="input-group">




                                                                                    <span
                                                                                        class="input-group-addon text-xl"
                                                                                        title="Expositor"
                                                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PUNTO
                                                                                        DE CARGA

                                                                                    </span>

                                                                                    <input id="txt_asig_add_punto_carga"
                                                                                        type="text"
                                                                                        class="form-control" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group"
                                                                                style="margin-bottom:5px;">
                                                                                <div class="input-group">



                                                                                    <span
                                                                                        class="input-group-addon text-xl"
                                                                                        title="Expositor"
                                                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PUNTO
                                                                                        DE DESCARGA</span>

                                                                                    <input
                                                                                        id="txt_asig_add_punto_decarga"
                                                                                        type="text"
                                                                                        class="form-control" />


                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group"
                                                                                style="margin-bottom:5px;">
                                                                                <div class="input-group">


                                                                                    <span
                                                                                        class="input-group-addon text-xl"
                                                                                        title="Expositor"
                                                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PUNTO
                                                                                        DE RETORNO

                                                                                    </span>

                                                                                    <input
                                                                                        id="txt_asig_add_punto_retorno"
                                                                                        type="text"
                                                                                        class="form-control" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group"
                                                                                style="margin-bottom:5px;">
                                                                                <div class="input-group">
                                                                                    <span
                                                                                        class="input-group-addon text-xl"
                                                                                        title="Expositor"
                                                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">GUIA
                                                                                        1


                                                                                    </span>

                                                                                    <input
                                                                                        id="txt_file_operaciones_asignaciones_guia1"
                                                                                        type="file"
                                                                                        class="form-control" />

                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group"
                                                                                style="margin-bottom:5px;">
                                                                                <div class="input-group">
                                                                                    <span
                                                                                        class="input-group-addon text-xl"
                                                                                        title="Expositor"
                                                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">GUIA
                                                                                        2


                                                                                    </span>

                                                                                    <input
                                                                                        id="txt_file_operaciones_asignaciones_guia2"
                                                                                        type="file"
                                                                                        class="form-control" />

                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group"
                                                                                style="margin-bottom:5px;">
                                                                                <div class="input-group">
                                                                                    <span
                                                                                        class="input-group-addon text-xl"
                                                                                        title="Expositor"
                                                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">HORÓMETRO/KILOMETRAJE
                                                                                        INICIAL

                                                                                    </span>

                                                                                    <input id="txt_asig_add_odometro"
                                                                                        type="text" class="form-control"
                                                                                        disabled />

                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group"
                                                                                style="margin-bottom:5px;">
                                                                                <div class="input-group">
                                                                                    <span
                                                                                        class="input-group-addon text-xl"
                                                                                        title="Expositor"
                                                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">COMENTARIO</span>
                                                                                    <button
                                                                                        class="bg-cyan-500 py-4 px-4 text-white"
                                                                                        type="button"
                                                                                        onclick="addComentario('txt_tarea_comentario','ComentarioParent','tareaComentarioHijo');"><i
                                                                                            class="fa fa-plus-circle "></i></button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="box-primary">
                                                                                <div class="box-header no-padding">
                                                                                    <div
                                                                                        class="box-body table-responsive no-padding">
                                                                                        <table
                                                                                            class="datatable table table-striped table-bordered text-xl"
                                                                                            id="txt_tarea_comentario">
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
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="bg-gray-500  py-2 px-2 text-white"
                                                                            data-dismiss="modal">Cancelar</button>
                                                                        <button type="button"
                                                                            onclick="add_asignacion_vehiculo();"
                                                                            class="bg-emerald-500  py-2 px-2 text-white">Guardar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <table class="datatable table" id="asignacionesTables">

                                                            </table>

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
                                                                    <button type="button"
                                                                        class="bg-cyan-500  py-2 px-2 text-white btn-circle"
                                                                        data-toggle="modal"
                                                                        data-target="#ModalEstadosVehiculo"><i
                                                                            class="fa fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="ModalEstadosVehiculo" tabindex="-1"
                                                            role="dialog" aria-labelledby="estadosLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close"><span
                                                                                aria-hidden="true">&times;</span></button>
                                                                        <h4 class="modal-title" id="estadosLabel"
                                                                            style="color:black">Cambiar estado del
                                                                            vehiculo
                                                                        </h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="box box-body">

                                                                            <div class="form-group"
                                                                                style="margin-bottom:5px;">
                                                                                <div class="input-group">
                                                                                    <span
                                                                                        class="input-group-addon text-xl"
                                                                                        title="Expositor"
                                                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ESTADO
                                                                                        DE VEHICULO</span>


                                                                                    <select id="txt_estado_add_estado"
                                                                                        class="form-control ">
                                                                                        <option value="-1">Selecciona...
                                                                                        </option>
                                                                                        <option value="0">Operativo
                                                                                        </option>
                                                                                        <option value="1">Baja</option>
                                                                                        <option value="2">Asignados
                                                                                        </option>
                                                                                        <option value="3">Alquilados
                                                                                        </option>
                                                                                        <option value="4">En el taller
                                                                                        </option>
                                                                                        <option value="5">Inactivo
                                                                                        </option>
                                                                                        <option value="6">Siniestrado
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <span class="input-group-addon text-xl"
                                                                                    title="Expositor"
                                                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">MOTIVO

                                                                                </span>
                                                                                <textarea class="form-control"
                                                                                    id="txt_estado_add_motivo"
                                                                                    rows="5"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="bg-gray-500  py-2 px-2 text-white"
                                                                            data-dismiss="modal">Cancelar</button>
                                                                        <button type="button"
                                                                            onclick="add_estado_vehiculo();"
                                                                            class="bg-cyan-500  py-2 px-2 text-white">Guardar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <table class="datatable table" id="EstadosTables">

                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <div class="row">
                                                                <div class="col-md-11">
                                                                    <h3 class="panel-title">Comentarios</h3>
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <button type="button"
                                                                        class="bg-cyan-500  py-2 px-2 text-white btn-circle "
                                                                        data-toggle="modal"
                                                                        data-target="#ModalComentarioVehiculo"><i
                                                                            class="fa fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal fade" id="ModalComentarioVehiculo"
                                                            tabindex="-1" role="dialog" aria-labelledby="estadosLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close"><span
                                                                                aria-hidden="true">&times;</span></button>
                                                                        <h4 class="modal-title" id="estadosLabel"
                                                                            style="color:black">Agregar comentario
                                                                        </h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="box box-body">
                                                                            <div class="form-group"
                                                                                style="margin-bottom:5px;">
                                                                                <div class="input-group">



                                                                                    <span
                                                                                        class="input-group-addon text-xl"
                                                                                        title="Expositor"
                                                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">COMENTARIOS</span>

                                                                                    <textarea class="form-control"
                                                                                        id="txt_comentario_add_comentario"
                                                                                        rows="5"></textarea>


                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="bg-gray-500 py-2 px-2 text-white"
                                                                            data-dismiss="modal">Cancelar</button>
                                                                        <button type="button"
                                                                            onclick="add_comentario_vehiculo();"
                                                                            class="bg-emerald-500  py-2 px-2 text-white">Guardar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <table class="datatable table"
                                                                id="ComentariosVehiculoTables">

                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Mantenimiento</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="col-md-12">
                                                                <ul class="nav nav-pills">
                                                                    <li role="presentation" class="active"><a
                                                                            onclick='managementGraphsReport("sql_mantenimiento_report_by_id", "mantenimientoVehiculo","VehiculoTablesMantenimientoMensual")'
                                                                            data-toggle="tab"
                                                                            href="#VehiculoTablesMantenimientoMensual"
                                                                            aria-expanded="true">Mensual</a></li>
                                                                    <li role="presentation"><a
                                                                            onclick='managementGraphsReport("sql_mantenimiento_report_by_id", "mantenimientoVehiculo","VehiculoTablesMantenimientoAnual",365)'
                                                                            data-toggle="tab"
                                                                            href="#VehiculoTablesMantenimientoAnual"
                                                                            aria-expanded="true">Anual</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 tab-content">

                                                                    <div class="row tab-pane fade in active"
                                                                        id="VehiculoTablesMantenimientoMensual"></div>
                                                                    <div class="row tab-pane fade"
                                                                        id="VehiculoTablesMantenimientoAnual"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Gasto operativos totales</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <!--<div class="col-md-12">
                                                                <ul class="nav nav-pills">
                                                                    <li role="presentation" class="active"><a
                                                                            onclick='managementGraphsReport("sql_costoOperacional_report_by_id_vehiculo", "costoOperacionaVehiculo","VehiculoTablesGastoOperativoMensual")'
                                                                            data-toggle="tab"
                                                                            href="#VehiculoTablesGastoOperativoMensual"
                                                                            aria-expanded="true">Mensual</a></li>
                                                                    <li role="presentation"><a
                                                                            onclick='managementGraphsReport("sql_costoOperacional_report_by_id_vehiculo", "costoOperacionaVehiculo","VehiculoTablesGastoOperativoAnual",365)'
                                                                            data-toggle="tab"
                                                                            href="#VehiculoTablesGastoOperativoAnual"
                                                                            aria-expanded="true">Anual</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 tab-content">
                                                                    <div class="row tab-pane fade in active"
                                                                        id="VehiculoTablesGastoOperativoMensual"></div>
                                                                    <div class="row tab-pane fade"
                                                                        id="VehiculoTablesGastoOperativoAnual"></div>
                                                                </div>
                                                            </div>-->
                                                            <div class="col-md-12">
                                                                <div class="box box-body">
                                                                    <div class="form-group" style="margin-bottom:5px;">
                                                                        <div class="input-group">

                                                                            <span class="input-group-addon"
                                                                                title="Departamento"
                                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Año</span>
                                                                            <input
                                                                                id="txt06_anio_gasto_operativo_total_resumen_vehicle"
                                                                                type="number" class="form-control"
                                                                                placeholder="Año" value="2022" />
                                                                            <span class="input-group-addon"
                                                                                title="Departamento"
                                                                                style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Meses</span>
                                                                            <select
                                                                                id="cbo06_meses_gasto_operativo_total_resumen_vehicle"
                                                                                class="form-control selectpicker">
                                                                                <option value="-1">Todos los meses
                                                                                </option>
                                                                                <option value="1">Enero</option>
                                                                                <option value="2">Febrero</option>
                                                                                <option value="3">Marzo</option>
                                                                                <option value="4">Abril</option>
                                                                                <option value="5">Mayo</option>
                                                                                <option value="6">Junio</option>
                                                                                <option value="7">Julio</option>
                                                                                <option value="8">Agosto</option>
                                                                                <option value="9">Setiembre</option>
                                                                                <option value="10">Octubre</option>
                                                                                <option value="11">Noviembre</option>
                                                                                <option value="12">Diciembre</option>
                                                                            </select>
                                                                        </div>


                                                                    </div>
                                                                    <!--<div class="btn-group" role="group"
                                                                aria-label="Basic example"
                                                                style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                                                <button id="btn06_Visual" type="button"
                                                                    class="bg-emerald-500 py-4 px-4 text-white"
                                                                    style="margin-left:5px"
                                                                    onclick="javascript:resporte_gasto_operativo_total_resumen_fixed();"><i
                                                                        class="fa fa-flash"></i> Generar
                                                                    grafica</button>                                                                                                     
                                                            </div>-->
                                                                    <div class="form-group" style="margin-bottom:5px;">
                                                                        <div class="col-md-12">

                                                                            <div
                                                                                id="chart_gasto_operativo_total_resumen_vehicle">
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

                                        <div id="vehiculodetalle" class="row tab-pane fade">
                                            <div class="col-md-12">
                                                <div id="accordion">
                                                    <h3>Detalles del Vehiculo</h3>
                                                    <div class="h-[250px]">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="panel-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <tr>
                                                                                <th>Identificador</th>
                                                                                <td><span id="det_categoria"></span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Activo</th>
                                                                                <td><span id="det_activo"></span>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th>Clase</th>
                                                                                <td><span id="det_marca"></span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Grupo</th>
                                                                                <td><span id="det_modelo"></span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Condicion</th>
                                                                                <td><span id="det_anio"></span>
                                                                                </td>
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
                                                                                <th>Inicio de Garantia</th>
                                                                                <td><span id="det_odometro"></span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Fin de Garantia</th>
                                                                                <td><span id="det_propiedad"></span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Numero de serie</th>
                                                                                <td><span id="det_serie"></span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Parte</th>
                                                                                <td><span id="det_descripcion"></span>
                                                                                </td>
                                                                            </tr>
                                                                            <!--<tr>
                                                                                    <th>Propietario</th>
                                                                                    <td><span
                                                                                            id="det_propietario"></span>
                                                                                    </td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <th>Motor</th>
                                                                                    <td><span id="det_motor"></span>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Transmicion</th>
                                                                                    <td><span
                                                                                            id="det_transmision"></span>
                                                                                    </td>
                                                                                </tr>-->
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h3>Motor</h3>
                                                    <div>
                                                        <div class="col-md-12">
                                                            <div class="panel-body">
                                                                <div class="table-responsive">
                                                                    <table class="table" id="table_tipo_sistema_11">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Activo
                                                                                <th>
                                                                                <th>Clase
                                                                                <th>
                                                                                <th>Grupo
                                                                                <th>
                                                                                <th>Condiciones
                                                                                <th>
                                                                                <th>Fecha Adquisicion
                                                                                <th>
                                                                                <th>Fin Garantia
                                                                                <th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h3>Tren Propulsor</h3>
                                                    <div>
                                                        <div class="col-md-12">
                                                            <div class="panel-body">
                                                                <div class="table-responsive">
                                                                    <table class="table" id="table_tipo_sistema_12">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Activo
                                                                                <th>
                                                                                <th>Clase
                                                                                <th>
                                                                                <th>Grupo
                                                                                <th>
                                                                                <th>Condiciones
                                                                                <th>
                                                                                <th>Fecha Adquisicion
                                                                                <th>
                                                                                <th>Fin Garantia
                                                                                <th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h3>Aros Llantas y Trenes</h3>
                                                    <div>
                                                        <div class="col-md-12">
                                                            <div class="panel-body">
                                                                <div class="table-responsive">
                                                                    <table class="table" id="table_tipo_sistema_13">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Activo
                                                                                <th>
                                                                                <th>Clase
                                                                                <th>
                                                                                <th>Grupo
                                                                                <th>
                                                                                <th>Condiciones
                                                                                <th>
                                                                                <th>Fecha Adquisicion
                                                                                <th>
                                                                                <th>Fin Garantia
                                                                                <th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h3>Sistema de Suspension</h3>
                                                    <div>
                                                        <div class="col-md-12">
                                                            <div class="panel-body">
                                                                <div class="table-responsive">
                                                                    <table class="table" id="table_tipo_sistema_14">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Activo
                                                                                <th>
                                                                                <th>Clase
                                                                                <th>
                                                                                <th>Grupo
                                                                                <th>
                                                                                <th>Condiciones
                                                                                <th>
                                                                                <th>Fecha Adquisicion
                                                                                <th>
                                                                                <th>Fin Garantia
                                                                                <th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h3>Sistema Electrico</h3>
                                                    <div>
                                                        <div class="col-md-12">
                                                            <div class="panel-body">
                                                                <div class="table-responsive">
                                                                    <table class="table" id="table_tipo_sistema_15">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Activo
                                                                                <th>
                                                                                <th>Clase
                                                                                <th>
                                                                                <th>Grupo
                                                                                <th>
                                                                                <th>Condiciones
                                                                                <th>
                                                                                <th>Fecha Adquisicion
                                                                                <th>
                                                                                <th>Fin Garantia
                                                                                <th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h3>Sistema Hidraulico</h3>
                                                    <div>
                                                        <div class="col-md-12">
                                                            <div class="panel-body">
                                                                <div class="table-responsive">
                                                                    <table class="table" id="table_tipo_sistema_16">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Activo
                                                                                <th>
                                                                                <th>Clase
                                                                                <th>
                                                                                <th>Grupo
                                                                                <th>
                                                                                <th>Condiciones
                                                                                <th>
                                                                                <th>Fecha Adquisicion
                                                                                <th>
                                                                                <th>Fin Garantia
                                                                                <th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h3>Carroceria, Chasis</h3>
                                                    <div>
                                                        <div class="col-md-12">
                                                            <div class="panel-body">
                                                                <div class="table-responsive">
                                                                    <table class="table" id="table_tipo_sistema_17">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Activo
                                                                                <th>
                                                                                <th>Clase
                                                                                <th>
                                                                                <th>Grupo
                                                                                <th>
                                                                                <th>Condiciones
                                                                                <th>
                                                                                <th>Fecha Adquisicion
                                                                                <th>
                                                                                <th>Fin Garantia
                                                                                <th>
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
                                            </div>
                                        </div>

                                        <div id="vehiculodocumentos" class="row tab-pane fade">
                                            <!--<div class="col-md-1 col-md-offset-11">
                                                <div class="panel-body">
                                                     Button trigger modal 
                                                    <button type="button" class="btn btn-primary btn-circle "
                                                        data-toggle="modal" data-target="#documentosVehiculoNuevo"><i
                                                            class="fa fa-plus"></i>
                                                </div>
                                            </div>
                                            <div class="modal fade" tabindex="-1" role="dialog"
                                                id="documentosVehiculoNuevo" aria-labelledby="#documentosVehiculoNuevo">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="documentosVehiculoNuevo"
                                                                style="color:black">Agregar Documento
                                                            </h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="box box-body">
                                                                <div class="form-group" style="margin-bottom:5px;">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon text-xl"
                                                                            title="Expositor"
                                                                            style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Resolución
                                                                            de bonificación</span>
                                                                        <input class="form-control" type="file"
                                                                            id="doc_vehiculo_1">
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon text-xl"
                                                                            title="Expositor"
                                                                            style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Certificación
                                                                            de instalación de GPS</span>
                                                                        <input class="form-control" type="file"
                                                                            id="doc_vehiculo_2">

                                                                    </div>
                                                                    <div class="input-group">

                                                                        <span class="input-group-addon text-xl"
                                                                            title="Expositor"
                                                                            style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Peso</span>
                                                                        <input class="form-control" type="file"
                                                                            id="doc_vehiculo_3">
                                                                    </div>
                                                                    <div class="input-group">

                                                                        <span class="input-group-addon text-xl"
                                                                            title="Expositor"
                                                                            style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Revisión
                                                                            técnica</span>
                                                                        <input class="form-control" type="file"
                                                                            id="doc_vehiculo_4">
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon text-xl"
                                                                            title="Expositor"
                                                                            style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Cubicación</span>
                                                                        <input class="form-control" type="file"
                                                                            id="doc_vehiculo_5">


                                                                    </div>
                                                                    <div class="input-group">

                                                                        <span class="input-group-addon text-xl"
                                                                            title="Expositor"
                                                                            style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DGN</span>
                                                                        <input class="form-control" type="file"
                                                                            id="doc_vehiculo_6">

                                                                    </div>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon text-xl"
                                                                            title="Expositor"
                                                                            style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Tarjeta
                                                                            de mercancías</span>
                                                                        <input class="form-control" type="file"
                                                                            id="doc_vehiculo_7">


                                                                    </div>
                                                                    <div class="input-group">

                                                                        <span class="input-group-addon text-xl"
                                                                            title="Expositor"
                                                                            style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Certificado
                                                                            de operativo</span>
                                                                        <input class="form-control" type="file"
                                                                            id="doc_vehiculo_8">

                                                                    </div>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon text-xl"
                                                                            title="Expositor"
                                                                            style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Certificado
                                                                            de Hermeticidad</span>
                                                                        <input class="form-control" type="file"
                                                                            id="doc_vehiculo_9">

                                                                    </div>
                                                                    <div class="input-group">

                                                                        <span class="input-group-addon text-xl"
                                                                            title="Expositor"
                                                                            style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Certificado
                                                                            de Epoxicado</span>
                                                                        <input class="form-control" type="file"
                                                                            id="doc_vehiculo_10">

                                                                    </div>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon text-xl"
                                                                            title="Expositor"
                                                                            style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Lavado
                                                                            interno</span>
                                                                        <input class="form-control" type="file"
                                                                            id="doc_vehiculo_11">
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon text-xl"
                                                                            title="Expositor"
                                                                            style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Línea
                                                                            de vida</span>
                                                                        <input class="form-control" type="file"
                                                                            id="doc_vehiculo_12">
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon text-xl"
                                                                            title="Expositor"
                                                                            style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Materiales
                                                                            peligrosos MATPEL</span>
                                                                        <input class="form-control" type="file"
                                                                            id="doc_vehiculo_13">
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon text-xl"
                                                                            title="Expositor"
                                                                            style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Check
                                                                            List</span>
                                                                        <input class="form-control" type="file"
                                                                            id="doc_vehiculo_14">
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon text-xl"
                                                                            title="Expositor"
                                                                            style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Contrato</span>
                                                                        <input class="form-control" type="file"
                                                                            id="doc_vehiculo_15">
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon text-xl"
                                                                            title="Expositor"
                                                                            style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">SOAT</span>
                                                                        <input class="form-control" type="file"
                                                                            id="doc_vehiculo_16">
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon text-xl"
                                                                            title="Expositor"
                                                                            style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Responsabilidad
                                                                            Civil</span>
                                                                        <input class="form-control" type="file"
                                                                            id="doc_vehiculo_17">
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon text-xl"
                                                                            title="Expositor"
                                                                            style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Póliza
                                                                            vehicular</span>
                                                                        <input class="form-control" type="file"
                                                                            id="doc_vehiculo_18">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Cancelar</button>
                                                            <button type="button" class="btn btn-primary"
                                                                onclick="add_document();">Guardar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>-->

                                            <div class="col-md-12">
                                                <div class="panel-body">
                                                    <div class="">
                                                        <div class="form-group">
                                                            <div class="input-group" id="search01VehiculoDocumento">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="box-primary" style="width:100%">
                                                        <div class="box-header no-padding">
                                                            <div class="box-body table-responsive no-padding">
                                                                <table style="width:100%"
                                                                    class="datatable table table-striped table-bordered"
                                                                    id="grd01VehiculoDocumento">
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="modal fade" tabindex="-1" role="dialog"
                                            aria-labelledby="myLargeModalLabel" aria-hidden="true"
                                            id="modal_updateFiles">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="box box-body">
                                                            <div class="form-group" style="margin-bottom:5px;">
                                                                <div class="input-group">

                                                                    <span class="input-group-addon text-xl"
                                                                        title="Expositor"
                                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ARCHIVO</span>

                                                                    <input id="txt_name_file_update" type="file"
                                                                        class="form-control" />
                                                                    <input type="hidden"
                                                                        id="txt_file_vehiculo_update_file" value="">
                                                                    <input type="hidden"
                                                                        id="txt_file_vehiculo_update_type" value="">
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button"
                                                            class="bg-emerald-500 py-4 px-4 text-white"
                                                            onclick="update_document_vehiculo_file();">Guardar</button>
                                                        <button type="button" class="bg-gray-500 py-4 px-4 text-white"
                                                            data-dismiss="modal"
                                                            onclick="$('#modal_updateFiles').modal('hide')">Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="modal fade" tabindex="-1" role="dialog"
                                            aria-labelledby="myLargeModalLabel" aria-hidden="true"
                                            id="modal_FichaPersonal">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="box box-body">

                                                            <div class="form-group" style="margin-bottom:5px;">
                                                                <div class="input-group">
                                                                    <!-- <span class="input-group-addon text-xl"
                                                                        title="Expositor"
                                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ARCHIVO</span>

                                                                    <input id="txt_id_name_pdf_ficha_personal"
                                                                        type="text" class="form-control" value="ddf"
                                                                        disabled />
-->


                                                                    <input type="hidden"
                                                                        id="txt_id_type_pdf_Ficha_Personal" value="">
                                                                    <input type="hidden" id="txt_id_type" value="">


                                                                </div>
                                                            </div>
                                                            <div class="form-group" style="margin-bottom:5px;">
                                                                <div class="input-group">

                                                                    <span class="input-group-addon text-xl"
                                                                        title="Expositor"
                                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA
                                                                        DE EMISION</span>

                                                                    <input id="txt_ficha_Personal_emi_modal" type="date"
                                                                        class="form-control" />

                                                                    <span class="input-group-addon text-xl"
                                                                        title="Expositor"
                                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA
                                                                        CADUCIDAD</span>
                                                                    <input id="txt_ficha_Personal_cadu_modal"
                                                                        type="date" class="form-control"
                                                                        placeholder="..." value="" />

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button"
                                                            class="bg-emerald-500 py-4 px-4 text-white""
                                                            onclick=" update_document_vehiculo();">Guardar</button>
                                                        <button type="button" class="bg-gray-500 py-4 px-4 text-white""
                                                            data-dismiss=" modal"
                                                            onclick="$('#modal_FichaPersonal').modal('hide')">Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                        <!--<div id="vehiculotarea" class="tab-pane fade">
                                            <div class="box box-body">
                                                <div class="form-group" style="margin-bottom:5px;">
                                                    <div class="input-group" id="01_searchTareaVehiculo">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-primary" style="width:100%">
                                                <div class="box-header no-padding">
                                                    <div class="box-body table-responsive no-padding">
                                                        <table style="width:100%"
                                                            class="datatable table table-striped table-bordered"
                                                            id="01_gridTareaVehiculo">
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->
                                        <div id="vehiculocombustible" class="tab-pane fade">
                                            <div class="box box-body">
                                                <div class="form-group" style="margin-bottom:5px;">
                                                    <div class="input-group" id="01_searchCombustibleVehiculo">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-primary" style="width:100%">
                                                <div class="box-header no-padding">
                                                    <div class="box-body table-responsive no-padding">
                                                        <table style="width:100%"
                                                            class="datatable table table-striped table-bordered"
                                                            id="01_gridCombustibleVehiculo">
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="vehiculomantenimiento" class="tab-pane fade">
                                            <div class="box box-body">
                                                <div class="form-group" style="margin-bottom:5px;">
                                                    <div class="input-group" id="01_searchMantenimientoVehiculo">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-primary" style="width:100%">
                                                <div class="box-header no-padding">
                                                    <div class="box-body table-responsive no-padding">
                                                        <table style="width:100%"
                                                            class="datatable table table-striped table-bordered"
                                                            id="01_gridMantenimientoVehiculo">
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="vehiculogastooperativo" class="tab-pane fade">
                                            <div class="box box-body">
                                                <div class="form-group" style="margin-bottom:5px;">
                                                    <div class="input-group" id="01_searchGastoOperativo">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-primary" style="width:100%">
                                                <div class="box-header no-padding">
                                                    <div class="box-body table-responsive no-padding">
                                                        <table style="width:100%"
                                                            class="datatable table table-striped table-bordered"
                                                            id="01_gridGastoOperativo">
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <!--<div class="tab-pane fade" id="flotaproveedores">
                            <div class="row">
                                <div class="col-md-12" id="HistorialProveedores">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="search01FloatProveedor">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-primary" style="width:100%">
                                        <div class="box-header no-padding">
                                            <div class="box-body table-responsive no-padding">
                                                <table style="width:100%"
                                                    class="datatable table table-striped table-bordered"
                                                    id="grd01FloatProveedor">
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                    </div>
                                </div>
                            </div>
                        </div>-->
                        <div class="tab-pane fade" id="flotaconductores">
                            <div class="row">
                                <div class="col-md-12" id="HistorialConductores">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="search01FlotaConductor">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-primary" style="width:100%">
                                        <div class="box-header no-padding">
                                            <div class="box-body table-responsive no-padding">
                                                <table style="width:100%"
                                                    class="datatable table table-striped table-bordered"
                                                    id="grd01Conductores">
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                    </div>
                                </div>
                                <!--<div class="col-md-10" id="NuevoRegistroConductores" style="display:none">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES</span>
                                                <input id="txt_conductor_nombre" type="text" class="form-control"
                                                    value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">APELLIDOS</span>
                                                <input id="txt_conductor_apellido" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA
                                                    DE INGRESO</span>
                                                <input id="txt_conductor_fecha_ingreso" type="date" class="form-control"
                                                    value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ESTADO
                                                    DEL CONDUCTOR</span>
                                                <input id="txt_conductor_estado" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NUMERO
                                                    DE EMPLEADO</span>
                                                <input id="txt_conductor_n_empleado" type="text" class="form-control"
                                                    value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">EMAIL</span>
                                                <input id="txt_conductor_email" type="email" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TELEFONO</span>
                                                <input id="txt_conductor_telefono" type="number" class="form-control"
                                                    value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TELEFONO
                                                    DE EMERGENCIA</span>
                                                <input id="txt_conductor_telefono_emergencia" type="number"
                                                    class="form-control" placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CIUDAD</span>
                                                <input id="txt_conductor_ciudad" type="text" class="form-control"
                                                    value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DIRECCION</span>
                                                <input id="txt_conductor_direccion" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA
                                                    DE NACIMIENTO</span>
                                                <input id="txt_conductor_fecha_nacimiento" type="date"
                                                    class="form-control" value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TARJETA
                                                    DE TELEPEAJE</span>
                                                <input id="txt_conductor_tarjeta" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TIPO
                                                    DE LICENCIA</span>
                                                <input id="txt_conductor_tipo_licencia" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NUMERO
                                                    DE LICENCIA</span>
                                                <input id="txt_conductor_n_licencia" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                    FECHA DE VENCIMIENTO</span>
                                                <input id="txt_conductor_fecha_vencimiento" type="date"
                                                    class="form-control" placeholder="..." value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                    GRUPO</span>
                                                <select id="txt_conductor_grupo" class="form-control">
                                                    <option value="-1">Selecciona...</option>
                                                    <option value="0">Renuncia del titular</option>
                                                    <option value="1">Cancelación de contrato</option>
                                                    <option value="2">Se crea un nuevo cargo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">COMENTARIOS</span>

                                                <textarea class="form-control" id="txt_conductor_comentario"
                                                    rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="btn-group" role="group" aria-label="Basic example"
                                            style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                            <button type="button" class="btn btn-success"
                                                onclick="add_conductor();">Guardar</button>
                                             <button type="button" class="btn btn-warning">Editar</button>                                             
                                        </div>

                                    </div>

                                </div>-->
                            </div>
                        </div>
                        <div class="tab-pane fade" id="HistorialdeDocumentos">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="search01OdeDocumentos">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-primary">
                                        <div class="box-header no-padding">
                                            <div class="box-body table-responsive no-padding"
                                                style="overflow-x:scroll;width:100%:">
                                                <table style="" class="datatable table table-striped table-bordered"
                                                    id="grd01OdeDocumentos">
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
                        <div class="tab-pane fade" id="AgregarDocumentos">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">VEHICULO</span>

                                                <input id="txt_search_documentos_vehiculo" type="text"
                                                    class="form-control" placeholder="Ingrese codigo" value="" />
                                                <input type="hidden" id="txt_search_documento_vehiculo_id" name=""
                                                    value="">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                    <button class="fa fa-search" type="button" aria-hidden="true"
                                                        onclick="searchInput('searchDocumentoVehiculo');"></button></span>



                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Activo</span>
                                                <input id="txt_search_vehiculo_documento_activo" type="text"
                                                    class="form-control" placeholder="..." value="" disabled />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Descripcion</span>
                                                <input id="txt_search_vehiculo_documento_descripcion" type="text"
                                                    class="form-control" placeholder="..." value="" disabled />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Resolución
                                                    de bonificación</span>
                                                <input class="form-control" type="file" id="doc_vehiculo_1">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Certificación
                                                    de instalación de GPS</span>
                                                <input class="form-control" type="file" id="doc_vehiculo_2">

                                            </div>
                                            <div class="input-group">

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Peso</span>
                                                <input class="form-control" type="file" id="doc_vehiculo_3">
                                            </div>
                                            <div class="input-group">

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Revisión
                                                    técnica</span>
                                                <input class="form-control" type="file" id="doc_vehiculo_4">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Cubicación</span>
                                                <input class="form-control" type="file" id="doc_vehiculo_5">


                                            </div>
                                            <div class="input-group">

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DGN</span>
                                                <input class="form-control" type="file" id="doc_vehiculo_6">

                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Tarjeta
                                                    de mercancías</span>
                                                <input class="form-control" type="file" id="doc_vehiculo_7">


                                            </div>
                                            <div class="input-group">

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Certificado
                                                    de operativo</span>
                                                <input class="form-control" type="file" id="doc_vehiculo_8">

                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Certificado
                                                    de Hermeticidad</span>
                                                <input class="form-control" type="file" id="doc_vehiculo_9">

                                            </div>
                                            <div class="input-group">

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Certificado
                                                    de Epoxicado</span>
                                                <input class="form-control" type="file" id="doc_vehiculo_10">

                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Lavado
                                                    interno</span>
                                                <input class="form-control" type="file" id="doc_vehiculo_11">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Línea
                                                    de vida</span>
                                                <input class="form-control" type="file" id="doc_vehiculo_12">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Materiales
                                                    peligrosos MATPEL</span>
                                                <input class="form-control" type="file" id="doc_vehiculo_13">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Check
                                                    List</span>
                                                <input class="form-control" type="file" id="doc_vehiculo_14">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Contrato</span>
                                                <input class="form-control" type="file" id="doc_vehiculo_15">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">SOAT</span>
                                                <input class="form-control" type="file" id="doc_vehiculo_16">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Responsabilidad
                                                    Civil</span>
                                                <input class="form-control" type="file" id="doc_vehiculo_17">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Póliza
                                                    vehicular</span>
                                                <input class="form-control" type="file" id="doc_vehiculo_18">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                        <button type="button" class="bg-emerald-500 py-4 px-4 text-white"
                                            onclick="add_document();">Guardar</button>
                                        <!-- <button type="button" class="btn btn-warning">Editar</button>                                             -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="HistorialRequerimientosPersonas">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="searchRequrimientoPersonalLogisticahtml">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-primary" style="width:100%">
                                        <div class="box-header no-padding">
                                            <div class="box-body table-responsive no-padding">
                                                <table style="width:100%"
                                                    class="datatable table table-striped table-bordered text-xl"
                                                    id="gridRequrimientoPersonalLogisticahtml">
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
                                                <!--<span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">AREA</span>
                                                <select id="personas_select_area" class="form-control ">
                                                    <option value="-1">Selecciona...</option>
                                                </select>-->
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                    PLAZO DE CONTRATO</span>
                                                <select id="personas_select_contrato" class="form-control ">
                                                    <option value="-1">Selecciona...</option>
                                                    <option value="0">Permanente</option>
                                                    <option value="1">Temporal</option>
                                                    <option value="2">Otro</option>
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
                                                        críticos)).
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

                    </div>

                </div>
            </div>
    </div>
    </form>
    </div>
</section>
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

                            <input id="txt-modal-gestion-personas-area" type="text" class="form-control" value="dni.pdf"
                                disabled />
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
                                            <th>PRIORIDAD</th>
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

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" id="modalOpenDetailsTarea">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box box-body">

                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DESCRIPCION DE
                                TAREA</span>

                            <input id="modalOpenDetailsTarea_nombre" type="text" class="form-control" value=""
                                disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TIPO DE TAREA</span>

                            <input id="modalOpenDetailsTarea_tipo" type="text" class="form-control" value="" disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA</span>

                            <input id="modalOpenDetailsTarea_fecha" type="text" class="form-control" value=""
                                disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PRIORIDAD</span>

                            <input id="modalOpenDetailsTarea_prioridad" type="text" class="form-control" value=""
                                disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ACTIVO</span>

                            <input id="modalOpenDetailsTarea_activo" type="text" class="form-control" value=""
                                disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DESCRIPCION
                                VEHICULO</span>

                            <input id="modalOpenDetailsTarea_descripcioin" type="text" class="form-control" value=""
                                disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;"> CONDICION</span>

                            <input id="modalOpenDetailsTarea_condicion" type="text" class="form-control" value=""
                                disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES
                                CONDUCTOR</span>

                            <input id="modalOpenDetailsTarea_conductor" type="text" class="form-control" value=""
                                disabled />

                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES RESPONSABLE
                                VEHICULO</span>

                            <input id="modalOpenDetailsTarea_responsable" type="text" class="form-control" value=""
                                disabled />
                        </div>
                    </div>
                    <div class="box-primary">
                        <div class="box-header no-padding">
                            <div class="box-body table-responsive no-padding">
                                <table class="datatable table table-striped table-bordered"
                                    id="modalOpenDetailsTarea_comentarios_table">
                                    <thead>
                                        <tr>

                                            <th>Nª</th>
                                            <th>COMENTARIOS</th>

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
                        onclick="$('#modalOpenDetailsTarea').modal('hide')">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"
    id="modalOpenDetailsCombustible">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box box-body">

                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TIPO DE
                                COMBUSTIBLE</span>

                            <input id="modalOpenDetailsCombustible_tipo_combustible" type="text" class="form-control"
                                value="" disabled />

                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA</span>

                            <input id="modalOpenDetailsCombustible_fecha" type="text" class="form-control" value=""
                                disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">HORA</span>

                            <input id="modalOpenDetailsCombustible_hora" type="text" class="form-control" value=""
                                disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CANTIDAD (En
                                Galones)</span>

                            <input id="modalOpenDetailsCombustible_cantidad" type="text" class="form-control" value=""
                                disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PRECIO POR GALÓN</span>

                            <input id="modalOpenDetailsCombustible_precio" type="text" class="form-control" value=""
                                disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TOTAL</span>

                            <input id="modalOpenDetailsCombustible_total" type="text" class="form-control" value=""
                                disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DESCRIPCION
                                VEHICULO</span>

                            <input id="modalOpenDetailsCombustible_vehiculo" type="text" class="form-control" value=""
                                disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ACTIVO VEHICULO</span>

                            <input id="modalOpenDetailsCombustible_active" type="text" class="form-control" value=""
                                disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CONDICION</span>

                            <input id="modalOpenDetailsCombustible_condicion" type="text" class="form-control" value=""
                                disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRE CONDUCTOR</span>

                            <input id="modalOpenDetailsCombustible_nombres_conductor" type="text" class="form-control"
                                value="" disabled />

                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PROVEEDOR</span>

                            <input id="modalOpenDetailsCombustible_proveedor" type="text" class="form-control" value=""
                                disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">RUC PROVEEDOR</span>

                            <input id="modalOpenDetailsCombustible_ruc" type="text" class="form-control" value=""
                                disabled />
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="bg-stone-900 py-4 px-2 text-white" data-dismiss="modal"
                        onclick="$('#modalOpenDetailsCombustible').modal('hide')">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"
    id="modalOpenDetailsOtrosGastos">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box box-body">

                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DESCRIPCION DE
                                GASTO</span>

                            <input id="modalOpenDetailsOtrosGastos_nombre" type="text" class="form-control" value=""
                                disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TIPO DE GASTO</span>

                            <input id="modalOpenDetailsOtrosGastos_tipo" type="text" class="form-control" value=""
                                disabled />

                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">

                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA</span>

                            <input id="modalOpenDetailsOtrosGastos_fecha" type="text" class="form-control" value=""
                                disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">HORA</span>

                            <input id="modalOpenDetailsOtrosGastos_hora" type="text" class="form-control" value=""
                                disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">

                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">REFERENCIA</span>

                            <input id="modalOpenDetailsOtrosGastos_referencia" type="text" class="form-control" value=""
                                disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CODIGO DEL VEHICULO
                            </span>

                            <input id="modalOpenDetailsOtrosGastos_vehiculo" type="text" class="form-control" value=""
                                disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DESCRIPCION DEL
                                VEHICULO</span>

                            <input id="modalOpenDetailsOtrosGastos_descripcion" type="text" class="form-control"
                                value="" disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PRECIO
                                UNITARIO</span>

                            <input id="modalOpenDetailsOtrosGastos_precio" type="text" class="form-control" value=""
                                disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CANTIDAD</span>

                            <input id="modalOpenDetailsOtrosGastos_cantidad" type="text" class="form-control" value=""
                                disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TOTAL</span>

                            <input id="modalOpenDetailsOtrosGastos_total" type="text" class="form-control" value=""
                                disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRE CONDUCTOR</span>

                            <input id="modalOpenDetailsOtrosGastos_nombres_conductor" type="text" class="form-control"
                                value="" disabled />

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="bg-stone-900 py-4 px-2 text-white" data-dismiss="modal"
                        onclick="$('#modalOpenDetailsCombustible').modal('hide')">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"
    id="ModalViewAsignacionVehiculo">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box box-body">

                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA INICIAL</span>

                            <input id="txt_ModalViewAsignacionVehiculo_fecha_ini" type="text" class="form-control"
                                value="" disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">HORA INICIAL</span>

                            <input id="txt_ModalViewAsignacionVehiculo_hora_ini" type="text" class="form-control"
                                value="" disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA FINAL</span>

                            <input id="txt_ModalViewAsignacionVehiculo_fecha_final" type="text" class="form-control"
                                value="" disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">HORA FINAL</span>

                            <input id="txt_ModalViewAsignacionVehiculo_hora_final" type="text" class="form-control"
                                value="" disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">>ODOMETRO</span>

                            <input id="txt_ModalViewAsignacionVehiculo_odometro" type="text" class="form-control"
                                value="" disabled />

                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PUNTO DE PARTIDA</span>

                            <input id="txt_ModalViewAsignacionVehiculo_punto_partida" type="text" class="form-control"
                                value="" disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PUNTO DE CARGA</span>

                            <input id="txt_ModalViewAsignacionVehiculo_punto_carga" type="text" class="form-control"
                                value="" disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PUNTO DECARGA</span>

                            <input id="txt_ModalViewAsignacionVehiculo_punto_decarga" type="text" class="form-control"
                                value="" disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PUNTO RETORNO</span>

                            <input id="txt_ModalViewAsignacionVehiculo_punto_retorno" type="text" class="form-control"
                                value="" disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PROYECTO/CONTRATO</span>

                            <input id="txt_ModalViewAsignacionVehiculo_nombre" type="text" class="form-control" value=""
                                disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TIPO</span>

                            <input id="txt_ModalViewAsignacionVehiculo_tipo" type="text" class="form-control" value=""
                                disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DESCRIPCION DE
                                TAREA</span>

                            <input id="txt_ModalViewAsignacionVehiculo_descripcion_tarea" type="text"
                                class="form-control" value="" disabled />

                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CODIGO VEHICULO</span>

                            <input id="txt_ModalViewAsignacionVehiculo_activo_vehiculo" type="text" class="form-control"
                                value="" disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DESCRIPCION DE
                                VEHICULO</span>

                            <input id="txt_ModalViewAsignacionVehiculo_descripcion_vehiculo" type="text"
                                class="form-control" value="" disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CONDUCTOR</span>

                            <input id="txt_ModalViewAsignacionVehiculo_nombres_conductor" type="text"
                                class="form-control" value="" disabled />

                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">RESPONSABLE</span>

                            <input id="txt_ModalViewAsignacionVehiculo_nombres_responsable" type="text"
                                class="form-control" value="" disabled />

                        </div>
                    </div>
                    <div class="box-primary">
                        <div class="box-header no-padding">
                            <div class="box-body table-responsive no-padding">

                                <table class="datatable table table-striped table-bordered"
                                    id="txt_ModalViewAsignacionVehiculo_table">
                                    <thead>
                                        <tr>

                                            <th>Nº</th>
                                            <th>COMENTARIO</th>
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
                        onclick="$('#ModalViewAsignacionVehiculo').modal('hide')">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="pages/catalogos/operaciones/operaciones.js"></script>
<script>
$(document).ready(function() {


    updateGrid("gridCombustibleVehiculo");
    updateGrid("gridTareaVehiculo");
    //updateGrid("gridMantenimientoVehiculo");
    updateGrid("gridGastosOperativosVehiculo");

    //updateGrid("gridOperacionMantenimiento");
    updateGrid("gridOperacionTarea");
    updateGrid("gridOperacionCumbustible");
    // updateGrid("gridDocumentoVehiculo");
    updateGrid("gridOperacionCostosOperarios");

    updateGrid("gridOperacionSolicitudMantenimiento");
    updateGrid("gridRequerimientoPersonalOrdenCompra");
    updateGrid("gridRequerimientoPersonalGrid");
    // updateGrid("gridOperacionSolicitudTrabajo");
    updateGrid("griddeDocumentos");

    updateGrid("gridRequerimientoPersonalOperaciones");

    resumenEstadoFlota();
    resumenAsignacionFlota();

    UtilLoadSelect("sql_select_get_tipo_mantenimiento", "txt_solicitud_mantenimiento_tipo");

    UtilLoadSelect("sql_select_get_tipo_area", "txt_solicitud_mantenimiento_dpt_asignado");
    //managenementGraphs("sql_combustible_by_id", "combustible", "reporteCombustible");
    //managenementGraphs("sql_mantenimiento_by_id", "mantenimiento", "reporteMantenimiento");
    //managenementGraphs("sql_gastoOperativo_by_id", "gastoOperativo", "reporteGastoOperativo");

    //managenementGraphs("sql_combustible_by_all", "gastoOperativoAll", "resumencombustibleGraphMensual");
    //managenementGraphs("sql_combustible_by_all", "gastoOperativoAll", "resumencombustibleGraphAnual", 365);
    //managenementGraphs("sql_mantenimiento_by_all", "mantenimientoAll", "resumenMantenimientoGraphMensual");
    //managenementGraphs("sql_mantenimiento_by_all", "mantenimientoAll", "resumenMantenimientoGraphAnual", 365);

    $('#txt_tarea_fecha_limite').val(new Date().toISOString().slice(0, 10));
    $('#txt_asig_add_fecha_fin').val(new Date().toISOString().slice(0, 10));
    $('#txt_asig_add_fecha_ini').val(new Date().toISOString().slice(0, 10));
    $('#txt_fecha_g_personas').val(new Date().toISOString().slice(0, 10));

    $('#txt_solicitud_mantenimiento_fecha').val(new Date().toISOString().slice(0, 10));

    $('#txt_asig_add_hora_ini').val(new Date().getHours() + ":" + new Date().getMinutes());
    $('#txt_asig_add_hora_fin').val(new Date().getHours() + ":" + new Date().getMinutes());

    $('#txt_combustible_fecha').val(new Date().toISOString().slice(0, 10));
    $('#txt_combustible_hora').val(new Date().getHours() + ":" + new Date().getMinutes());

    $('#txt_mantenimiento_fecha_entrega').val(new Date().toISOString().slice(0, 10));
    $('#txt_mantenimiento_hora_inicio').val(new Date().getHours() + ":" + new Date().getMinutes());
    $('#txt_mantenimiento_fecha_inicio').val(new Date().toISOString().slice(0, 10));
    $('#txt_mantenimiento_hora_estimada').val(new Date().getHours() + ":" + new Date().getMinutes());
    $('#txt_gastosoperarios_fecha').val(new Date().toISOString().slice(0, 10));
    $('#txt_gastosoperarios_hora').val(new Date().getHours() + ":" + new Date().getMinutes());

    UtilLoadSelect("sql_select_get_cargo", "txt_cargo_personas");
    UtilLoadSelect("03_selected_gestionPersona_motivo", "personas_select_motivo");
    UtilLoadSelect("sql_select_get_lugar_trabajo", "personas_select_lugar");

    //UtilLoadSelect("sql_select_get_prioridad", "slct_prioridad_requerimiento");

    UtilLoadSelect("sql_select_get_clase_flota", "cbo06_Contenidos_combustible");
    UtilLoadSelect("sql_select_get_clase_flota", "cbo06_Contenidos_gasto_operativo");
    UtilLoadSelect("sql_select_get_clase_flota", "cbo06_Contenidos_gasto_operativo_total");

    updateGrid("gridRequerimientoGrid");

    $('#txt_conductor_fecha_nacimiento').val(new Date().toISOString().slice(0, 10));

    $('#txt_conductor_fecha_vencimiento').val(new Date().toISOString().slice(0, 10));

    $('#txt_conductor_fecha_ingreso').val(new Date().toISOString().slice(0, 10));

    $("#txt_combustible_precio").keyup(function() {
        let cantidad = $("#txt_combustible_cantidad").val()
        let precio = $("#txt_combustible_precio").val()

        let total = (Number(cantidad) * Number(precio)).toString()
        $("#txt_combustible_total").val(total);
    });

    $("#txt_gastosoperarios_precio").keyup(function() {
        let cantidad = $("#txt_gastosoperarios_cantidad").val()
        let precio = $("#txt_gastosoperarios_precio").val()
        $("#txt_gastosoperarios_total").val(Number(cantidad) * Number(precio));
    });

    $("#accordion").accordion({
        collapsible: true
    });


    $('#cbo06_Contenidos_combustible').change(function() {

        var $option = $(this).find('option:selected');
        var value = $option.val();


        let datos = {
            TipoQuery: 'sqlGroupClassByGroup',
            data: value
        };

        console.log(value)
        appAjaxQuery(datos, rutaSQL).done(function(resp) {
            $("#cbo06_Equipos_combustible option[value!='-1']").remove();
            resp.data.forEach((item) => {
                $('#cbo06_Equipos_combustible').append($("<option>", {
                    value: item.id,
                    text: item.description
                }));
            })

        });

    })


    $('#cbo06_Contenidos_gasto_operativo').change(function() {

        var $option = $(this).find('option:selected');
        var value = $option.val();


        let datos = {
            TipoQuery: 'sqlGroupClassByGroup',
            data: value
        };

        console.log(value)
        appAjaxQuery(datos, rutaSQL).done(function(resp) {
            $("#cbo06_Equipos_gasto_operativo option[value!='-1']").remove();
            resp.data.forEach((item) => {
                $('#cbo06_Equipos_gasto_operativo').append($("<option>", {
                    value: item.id,
                    text: item.description
                }));
            })

        });

    })


    $('#cbo06_Contenidos_gasto_operativo_total').change(function() {

        var $option = $(this).find('option:selected');
        var value = $option.val();


        let datos = {
            TipoQuery: 'sqlGroupClassByGroup',
            data: value
        };

        console.log(value)
        appAjaxQuery(datos, rutaSQL).done(function(resp) {
            $("#cbo06_Equipos_gasto_operativo_total option[value!='-1']").remove();
            resp.data.forEach((item) => {
                $('#cbo06_Equipos_gasto_operativo_total').append($("<option>", {
                    value: item.id,
                    text: item.description
                }));
            })

        });

    })
   
    resporte_gasto_operativo_total_resumen_fixed();
    
    $('#cbo06_meses_gasto_operativo_total_resumen').change(function() {
        resporte_gasto_operativo_total_resumen_fixed();
    })
    $('#cbo06_meses_gasto_operativo_total_resumen_vehicle').change(function() {
        resporte_gasto_operativo_total_resumen_vehicle_fixed();
    })
});
</script>