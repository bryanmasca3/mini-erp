<script src="libs/moment/min/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/locale/es.js"></script>


<style>
.dataTables_filter {
    display: none;
}

.error {
    color: #ff2424;
    font-size: 10px;
}
</style>
<div id="error"><input type="hidden" name="" id="error-input-general"></div>

<section class="content-header">

    <h2 class="font-bold text-3xl">
        <box-icon name='bar-chart-square' size="2rem"></box-icon>
    </h2>
    <ol class="breadcrumb">
        <li><a href="javascript:appChangePage('lineaneg');"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Mantenimiento</li>
        <li class="active" id="site_path_section">Historial de RQ de mantenimiento</li>
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
                                aria-controls="dropdowngestionpersonas-contents"><i class="fa fa-dropbox "></i>Gestion
                                de Mantenimiento
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdowngestionpersonas"
                                id="dropdowngestionpersonas-contents">
                                <li class="active view_path_url_section" title="Inventario"><a
                                        href="#HistorialSolicitudMantenimiento" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>Historial de RQ de
                                        mantenimiento</a>
                                </li>
                                <li class="view_path_url_section" title="Inventario"><a
                                        href="#NuevoRegistroSolicitudMantenimiento" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>Agregar Solicitud de
                                        Mantenimiento</a>
                                </li>
                            </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                            <a href="#" id="myTabDropInventario" class="dropdown-toggle" data-toggle="dropdown"
                                aria-controls="myTabDropInventario-contents"><i class="fa fa-dropbox"></i> Orden de
                                Trabajo
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="myTabDropInventario"
                                id="myTabDropInventario-contents">
                                <li class="view_path_url_section" title="Inventario"><a href="#HistorialOrdenTrabajo"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i> Historial de Orden de
                                        Trabajo</a>
                                </li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="#" id="dropdowngestionpersonas" class="dropdown-toggle" data-toggle="dropdown"
                                aria-controls="dropdowngestionpersonas-contents"><i class="fa fa-dropbox "></i>Garantias
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdowngestionpersonas"
                                id="dropdowngestionpersonas-contents">
                                <li class="view_path_url_section" title="Inventario"><a href="#HistorialGarantias"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i>Historial de Garantias</a>
                                </li>
                            </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                            <a href="#" id="dropdowngestionpersonas" class="dropdown-toggle" data-toggle="dropdown"
                                aria-controls="dropdowngestionpersonas-contents"><i class="fa fa-dropbox "></i>PM
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdowngestionpersonas"
                                id="dropdowngestionpersonas-contents">
                                <li class="view_path_url_section" title="Inventario"><a
                                        href="#HistorialMantenimientoPreventivo" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>Historial de Mantenimientos
                                        Preventivos</a>
                                </li>

                            </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                            <a href="#" id="dropdowngestionpersonas" class="dropdown-toggle" data-toggle="dropdown"
                                aria-controls="dropdowngestionpersonas-contents"><i class="fa fa-dropbox "></i> Gestión
                                de personas
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdowngestionpersonas"
                                id="dropdowngestionpersonas-contents">
                                <li class="view_path_url_section" title="Inventario"><a
                                        href="#HistorialRequerimientosPersonas" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>Historial de requerimientos</a>
                                </li>
                                <li class="view_path_url_section" title="Inventario"><a href="#NuevoRegistroPersonas"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i>Nuevo requerimiento</a>
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
                                <li class="view_path_url_section" title="Inventario"><a href="#HistorialRequerimientos"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i>Historial de Requerimientos</a>
                                </li>
                                <li class="view_path_url_section" title="Inventario"><a
                                        href="#NuevoRegistroRequerimientos" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>Nuevo Requerimiento</a>
                                </li>
                            </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                            <a href="#" id="dropdowngestionpersonas" class="dropdown-toggle" data-toggle="dropdown"
                                aria-controls="dropdowngestionpersonas-contents"><i class="fa fa-dropbox "></i>
                                Indicadores
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdowngestionpersonas"
                                id="dropdowngestionpersonas-contents">
                                <li class="view_path_url_section" title="Inventario"><a
                                        href="#IndicadoresMantenimientoControlVisual" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>Control Visual</a>
                                </li>
                                <li class="view_path_url_section" title="Inventario"><a
                                        href="#IndicadoresMantenimientoIndicadores" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>Indicadores</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="HistorialSolicitudMantenimiento">
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
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ACTIVO</span>
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
                                                    <option value="0">BAJA (Atendidas dentro de los 7 días).
                                                    </option>
                                                    <option value="1">MEDIA (Atendidas dentro de las 72).
                                                    </option>
                                                    <option value="2">ALTA (Atendidas dentro de las 48 hrs).
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
                        <div class="tab-pane" id="HistorialOrdenTrabajo">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="search01OordenTrabajoMantenimiento">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-primary" style="width:100%">
                                        <div class="box-header no-padding">
                                            <div class="box-body table-responsive no-padding">
                                                <table style="width:100%"
                                                    class="datatable table table-striped table-bordered"
                                                    id="grd01OordenTrabajoMantenimiento">
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
                        <div class="tab-pane" id="HistorialGarantias">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="search01OperacionGarantias">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-primary" style="width:100%">
                                        <div class="box-header no-padding">
                                            <div class="box-body table-responsive no-padding">
                                                <table style="width:100%"
                                                    class="datatable table table-striped table-bordered"
                                                    id="grd01OperacionGarantias">
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
                        <div class="tab-pane" id="HistorialMantenimientoPreventivo">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="search01OperacionMantenimientoPreventivo">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-primary" style="width:100%">
                                        <div class="box-header no-padding">
                                            <div class="box-body table-responsive no-padding">
                                                <table style="width:100%"
                                                    class="datatable table table-striped table-bordered"
                                                    id="grd01OperacionMantenimientoPreventivo">
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
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                        <button type="button" class="bg-emerald-500 py-4 px-2 text-white"
                                            onclick="add_Requerimientos();">Guardar</button>
                                        <!-- <button type="button" class="btn btn-warning">Editar</button>                                             -->
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane" id="IndicadoresMantenimientoControlVisual">
                            <div class="box-body control06" id="control06">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="box box-body">
                                            <div class="form-group" style="margin-bottom:5px;">
                                                <div class="input-group">
                                                    <span class="input-group-addon" title="Departamento"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Flota</span>
                                                    <select id="cbo06_Contenidos" class="form-control selectpicker">
                                                        <option value="-1">Selecciona...</option>
                                                    </select>
                                                    <span class="input-group-addon" title="Departamento"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Año</span>
                                                    <input id="txt06_anio" type="number" class="form-control"
                                                        placeholder="Año" value="2022" />
                                                    <span class="input-group-addon" title="Departamento"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Meses</span>
                                                    <select id="cbo06_meses" class="form-control selectpicker">
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
                                                    <select id="cbo06_Equipos" class="form-control selectpicker">
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
                                                    onclick="javascript:app06Boton_visual();"><i
                                                        class="fa fa-flash"></i> Generar grafica</button>
                                                <!-- <button type="button" class="btn btn-warning">Editar</button>                                             -->
                                            </div>
                                            <div class="form-group" style="margin-bottom:5px;">
                                                <div class="col-md-12">

                                                    <div id="chart">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="IndicadoresMantenimientoIndicadores">
                            <div class="box-body indicador06" id="indicador06">

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="box box-body">
                                            <div class="form-group" style="margin-bottom:5px;">
                                                <div class="input-group">
                                                    <span class="input-group-addon" title="Departamento"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Flota</span>
                                                    <select id="cbo07_Contenidos" class="form-control selectpicker">
                                                        <option value="-1">Selecciona...</option>
                                                    </select>
                                                    <span class="input-group-addon" title="Departamento"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Año</span>
                                                    <input id="txt07_anio" type="number" class="form-control"
                                                        placeholder="Año" value="2022" />
                                                    <span class="input-group-addon" title="Departamento"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 21px;">Meses</span>
                                                    <select id="cbo07_meses" class="form-control selectpicker">
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
                                                    <select id="cbo07_Equipos" class="form-control selectpicker">
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

                                                <button id="btn07_Visual" type="button"
                                                    class="bg-emerald-500 py-4 px-4 text-white" style="margin-left:5px"
                                                    onclick="javascript:app06Boton_indicador();"><i
                                                        class="fa fa-flash"></i> Generar grafica</button>
                                                <!-- <button type="button" class="btn btn-warning">Editar</button>                                             -->
                                            </div>
                                            <div class="form-group" style="margin-bottom:5px;">
                                                <div class="col-md-12">

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
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"
    id="ModalOpenSolicitudOrdenTrabajo">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box box-body">

                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">RQ de
                                mantenimiento</span>

                            <input id="txt_modal_solicitud_orden_trabajo_id" type="text" class="form-control" value=""
                                disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">AREA</span>

                            <input id="txt_modal_solicitud_orden_trabajo_area" type="text" class="form-control" value=""
                                disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ACTIVO</span>

                            <input id="txt_modal_solicitud_orden_trabajo_activo" type="text" class="form-control"
                                value="dni.pdf" disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA</span>

                            <input id="txt_modal_solicitud_orden_trabajo_fecha" type="text" class="form-control"
                                value="dni.pdf" disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DESCRIPCION</span>

                            <input id="txt_modal_solicitud_orden_trabajo_descripcion" type="text" class="form-control"
                                value="" disabled />

                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PRIORIDAD</span>

                            <input id="txt_modal_solicitud_orden_trabajo_prioridad" type="text" class="form-control"
                                value="" disabled />

                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">

                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ESTADO</span>
                            <select id="txt_modal_solicitud_orden_trabajo_estado" class="form-control ">
                                <option value="-1">Selecciona...
                                </option>
                                <option value="11">EN ESPERA DE PLANIFICACION
                                </option>
                                <option value="12">APROBADA
                                </option>
                                <option value="17">DENEGADA
                                </option>
                            </select>
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TIPO</span>

                            <input id="txt_modal_solicitud_orden_trabajo_tipo" type="text" class="form-control" value=""
                                disabled />
                        </div>
                    </div>
                    <div class="box-primary">
                        <div class="box-header no-padding">
                            <div class="box-body table-responsive no-padding">
                                <table class="datatable table table-striped table-bordered"
                                    id="modalOpenDetailsSolicitudMantenimiento_comentarios_table">
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
                    <div class="form-group" style="margin-bottom:5px;display:none;"
                        id="boxElementMovito_OT_solicitudMantenimiento">
                        <span class="input-group-addon text-xl" title="Expositor"
                            style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">MOTIVO
                        </span>
                        <textarea class="form-control" id="txt_modal_solicitud_orden_trabajo_motivo" rows="5"
                            disabled></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="bg-emerald-500 py-4 px-2 text-white"
                        onclick="insert_modal_orden_compra();"
                        id="buttonModalOT_solicitudMantenimiento">Guardar</button>
                    <button type="button" class="bg-stone-900 py-4 px-2 text-white" data-dismiss="modal"
                        onclick="$('#ModalOpenSolicitudOrdenTrabajo').modal('hide')">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" id="ModalOpenOrdenTrabajo">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box box-body">

                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Nº DE
                                ORDEN TRABAJO</span>

                            <input id="txt_n_orden_trabajo_id_modal" type="text" class="form-control" value=""
                                disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA DE
                                CREACION</span>

                            <input id="txt_n_orden_trabajo_fecha_modal" type="text" class="form-control" value=""
                                disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ACTIVO</span>

                            <input id="txt_n_orden_trabajo_activo_modal" type="text" class="form-control"
                                value="dni.pdf" disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">AREA</span>

                            <input id="txt_n_orden_trabajo_area_modal" type="text" class="form-control" value="dni.pdf"
                                disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DESCRIPCION</span>

                            <input id="txt_n_orden_trabajo_descripcion_modal" type="text" class="form-control"
                                value="dni.pdf" disabled />

                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;display:none;"
                        id="box_orden_trabajo_fecha_asignacion">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA DE
                                ASIGNACION</span>

                            <input id="txt_n_orden_trabajo_fecha_asignacion_modal" type="date" class="form-control"
                                value="" />

                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;display:none;"
                        id="box_orden_trabajo_hora_asignacion">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">HORA DE INICIO</span>

                            <input id="txt_n_orden_trabajo_hora_ini_asignacion_modal" type="time"
                                class="form-control" />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">HORA DE FIN</span>

                            <input id="txt_n_orden_trabajo_hora_fin_asignacion_modal" type="time"
                                class="form-control" />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">

                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ESTADO</span>
                            <select id="txt_n_orden_trabajo_estado_modal" class="form-control ">
                                <option value="-1">Selecciona...
                                </option>
                                <option value="11">EN ESPERA DE PLANIFICACION
                                </option>
                                <option value="19">PLANIFICADA
                                </option>
                                <option value="20">EN ESPERA DE INVENTARIO
                                </option>
                                <option value="14">PROGRAMADA
                                </option>
                                <option value="15">REPROGRAMADA
                                </option>
                                <option value="16">EN EJECUCION
                                </option>
                                <option value="18">CERRADA
                                </option>
                            </select>
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TIPO DE OT</span>

                            <input id="txt_n_orden_trabajo_tipo_modal" type="text" class="form-control" value="dni.pdf"
                                disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;display:none;" id="details_oc_to_orden_compra">
                        <div style="display:flex;">
                            <span class="input-group-addon text-xl" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold; width:200px">AGREGAR ITEM</span>
                            <div style="display:flex">
                                <input id="txt_ordentrabajo_withvehicle_search" type="text" class="form-control"
                                    placeholder="Buscar por codigo" value="" />
                                <input type="hidden" id="txt_ordentrabajo_withvehicle_id" name="" value="">
                                <span class="input-group-addon text-xl" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold;padding-right: 30px;">
                                    <button type="button" class="fa fa-search" aria-hidden="true"
                                        onclick="searchFuncionForNameAndSurnameOrdenTrabajo('txt_ordentrabajo_withvehicle_search','sql_ordentrabajo_vehicle_sql',[
                                                                'txt_ordentrabajo_withvehicle_id'
                                                            ],'griditemsOrdenCompraWithVehicle2','ordencompramodalVehicle');"></button></span>
                            </div>
                        </div>
                        <div class="box-primary" style="width:100%">
                            <div class="box-header no-padding">
                                <div class="box-body table-responsive no-padding">
                                    <table style="width:100%" class="datatable table table-striped table-bordered"
                                        id="griditemsOrdenCompraWithVehicle2">
                                        <thead>
                                            <th>Id</th>
                                            <th>Acitvo</th>
                                            <th>Condicion</th>
                                            <th>Fecha de Adquisicion</th>
                                            <th>Fin de Garantia</th>
                                            <th>Grupo</th>
                                            <th>Clase</th>
                                            <th></th>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="box-primary">
                            <div class="box-header no-padding">
                                <div class="box-body table-responsive no-padding">
                                    <table class="datatable table table-striped table-bordered"
                                        id="modalOpenDetailsOrdenMantenimiento_comentarios_table">
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
                    <button type="button" class="bg-emerald-500 py-4 px-2 text-white" id="button_guardar_ot_modal"
                        onclick="insert_modal_orden_trabajo();">Guardar</button>
                    <button type="button" class="bg-stone-900 py-4 px-2 text-white" data-dismiss="modal"
                        onclick="$('#ModalOpenOrdenTrabajo').modal('hide')">Cerrar</button>
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
<script src="pages/catalogos/mantenimiento/mantenimiento.js"></script>
<script>
$(document).ready(function() {
    $('#txt_solicitud_mantenimiento_fecha').val(new Date().toISOString().slice(0, 10));
    $('#txt_n_orden_trabajo_fecha_asignacion_modal').val(new Date().toISOString().slice(0, 10));

    //UtilLoadSelect("sql_select_get_tipo_area", "txt_solicitud_mantenimiento_dpt_asignado");
    UtilLoadSelect("sql_select_get_tipo_mantenimiento", "txt_solicitud_mantenimiento_tipo");


    $(".view_path_url_section").click(function() {
        let val = $(this).find("a").text()
        $("#site_path_section").text(val)
    });


    updateGrid("gridOperacionSolicitudMantenimiento");

    updateGrid("gridOperacionGarantiasHTML");
    updateGrid("grd01OperacionMantenimientoPreventivoHTML");

    updateGrid("grd01OrdenTrabajoHTML");

    UtilLoadSelect("sql_select_get_clase_flota", "cbo06_Contenidos");
    UtilLoadSelect("sql_select_get_clase_flota", "cbo07_Contenidos");
    UtilLoadSelect("sql_select_get_cargo", "txt_cargo_personas");

    UtilLoadSelect("sql_select_get_area", "slct_area_requerimiento");
    UtilLoadSelect("sql_select_get_lugar_trabajo", "personas_select_lugar");


    updateGrid("gridRequerimientoPersonalGrid");
    UtilLoadSelect("03_selected_gestionPersona_motivo", "personas_select_motivo");

    updateGrid("gridRequerimientoGrid");
    UtilLoadSelect("sql_select_get_prioridad", "slct_prioridad_requerimiento");


    $('#txt_modal_solicitud_orden_trabajo_estado').change(function() {
        var $option = $(this).find('option:selected');
        var value = $option.val();
        if (value == 17) {
            $("#boxElementMovito_OT_solicitudMantenimiento").show();
        } else {
            $("#boxElementMovito_OT_solicitudMantenimiento").hide();
        }

    })

});
</script>