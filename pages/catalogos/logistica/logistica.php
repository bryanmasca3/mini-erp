<!-- ztree treeview -->
<link rel="stylesheet" href="libs/ztree/css/ztreestyle.css" />
<script src="libs/ztree/js/jquery.ztree.core.js"></script>

<!-- bootstrap datepicker -->
<link rel="stylesheet" href="libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="libs/moment/min/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/locale/es.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="pages/catalogos/logistica/ubigeo.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
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
        <li class="active">Logística</li>
    </ol>
</section>
<section class="content">
    <div class="row" id="edit">
        <form class="form-horizontal" id="frmWorker" autocomplete="off">

            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <!--<li role="presentation" class="dropdown active">
                            <a href="#" id="dropdowngestionpersonas" class="dropdown-toggle" data-toggle="dropdown"
                                aria-controls="dropdowngestionpersonas-contents"><i class="fa fa-dropbox "></i>Almacen
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdowngestionpersonas"
                                id="dropdowngestionpersonas-contents">
                                <li class="active" title="Inventario"><a href="#HistorialAlmacenes" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>Almacenes</a>
                                </li>
                                <li class="" title="Inventario"><a href="#NuevoRegistroAlmacen" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>Agregar Almacen</a>
                                </li>
                            </ul>
                        </li>-->
                        <li role="presentation" class="dropdown">
                            <a href="#" id="myTabDropInventario" class="dropdown-toggle" data-toggle="dropdown"
                                aria-controls="myTabDropInventario-contents"><i class="fa fa-dropbox"></i> Gestión de
                                Inventario
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="myTabDropInventario"
                                id="myTabDropInventario-contents">
                                <li class="" title="Inventario"><a href="#HistorialItems" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i> Inventario</a>
                                </li>
                                <li class="" title="Inventario"><a href="#NuevoRegistroItems" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i> Crear Items</a>
                                </li>
                                <li class="" title="Inventario"><a href="#NuevoRegistroAgregarItems"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i> Agregar Items</a>
                                </li>
                                <li class="" title="Inventario"><a href="#HistorialGrupos" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i> Grupo</a>
                                </li>
                                <li class="" title="Inventario"><a href="#NuevoRegistroGrupos" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i> Agregar Grupo</a>
                                </li>
                                <li class="" title="Inventario"><a href="#HistorialGruposClass" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i> Grupo de
                                        Clase</a></li>
                                <li class="" title="Inventario"><a href="#NuevoRegistroGruposClass" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>Agregar Grupo de
                                        Clase</a>
                                </li>
                                <!--<li class="" title="Inventario"><a href="#" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i> Retiro</a></li>
                                <li class="" title="Inventario"><a href="#" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i> Devoluciones</a></li>-->
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="#" id="dropdowngestionpersonas" class="dropdown-toggle" data-toggle="dropdown"
                                aria-controls="dropdowngestionpersonas-contents"><i
                                    class="fa fa-dropbox "></i>Proveedores
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdowngestionpersonas"
                                id="dropdowngestionpersonas-contents">
                                <li class="" title="Inventario"><a href="#HistorialProveedor" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>Registro de Proveedores</a>
                                </li>
                                <li class="" title="Inventario"><a href="#NuevoRegistroProveedor" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>Agregar Proveedor</a>
                                </li>
                                <li class="" title="Inventario"><a href="#NuevaCategoriaProveedor" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>Agregar Categoria</a>
                                </li>
                                <li class="" title="Inventario"><a href="#NuevaHistorialSeleccionProveedor"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i>Historial de Seleccion de
                                        Proveedores</a>
                                </li>
                                <li class="" title="Inventario"><a href="#NuevaSeleccionProveedor" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>Seleccion de Proveedores</a>
                                </li>
                                <li class="" title="Inventario"><a href="#NuevaHistorialEvaluacionProveedor"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i>Historial de Evaluacion de
                                        Proveedores</a>
                                </li>
                                <li class="" title="Inventario"><a href="#NuevaEvaluacionProveedor" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>Evaluacion de Proveedores</a>
                                </li>
                            </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                            <a href="#" id="dropdowngestionpersonas" class="dropdown-toggle" data-toggle="dropdown"
                                aria-controls="dropdowngestionpersonas-contents"><i
                                    class="fa fa-dropbox "></i>Req.Compra
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdowngestionpersonas"
                                id="dropdowngestionpersonas-contents">
                                <li class="" title="Inventario"><a href="#HistorialRequerimientos" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>Historial de Requerimientos</a>
                                </li>
                                <li class="" title="Inventario"><a href="#NuevoRegistroRequerimientos"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i>Nuevo Requerimiento</a>
                                </li>
                            </ul>
                        </li>
                        <li class="" title="Cotizar proveedor"><a href="#reqordcompramenuItem" data-toggle="tab"><i
                                    class="fa fa-legal"></i> Ord.
                                Compra</a></li>
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


                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="HistorialAlmacenes">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="searchAlmacenhtml">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-primary" style="width:100%">
                                        <div class="box-header no-padding">
                                            <div class="box-body table-responsive no-padding">
                                                <table style="width:100%"
                                                    class="datatable table table-striped table-bordered"
                                                    id="gridAlmacenhtml">
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
                        <div class="tab-pane" id="NuevoRegistroAlmacen">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ESTADO</span>

                                                <select id="slct_estado_almacen" class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>
                                                    <option value="0">ACTIVO
                                                    </option>
                                                    <option value="1">INACTIVO
                                                    </option>
                                                    </option>
                                                </select>
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DESCRIPCION</span>
                                                <input id="txt_descripcion_almacen" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">SEDE</span>
                                                <input id="txt_sede_almacen" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DIRECCION</span>
                                                <input id="txt_direccion_almacen" type="text" class="form-control"
                                                    value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">REFERENCIA</span>
                                                <input id="txt_referencia_almacen" type="text" class="form-control"
                                                    placeholder="..." value="" />

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TELEFONO</span>
                                                <input id="txt_telefono_almacen" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DEPARTAMENTO</span>

                                                <select id="txt_departamento_almacen" class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>

                                                </select>
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PROVINCIA</span>

                                                <select id="txt_provincia_almacen" class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>

                                                </select>
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DISTRITO</span>

                                                <select id="txt_distrito_almacen" class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>
                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                        <button type="button" class="bg-emerald-500 py-4 px-2 text-white"
                                            onclick="add_Almacen();">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane active" id="HistorialItems">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="searchItemshtml">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-primary" style="width:100%">
                                        <div class="box-header no-padding">
                                            <div class="box-body table-responsive no-padding">
                                                <table style="width:100%"
                                                    class="datatable table table-striped table-bordered"
                                                    id="gridItemshtml">
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
                        <div class="tab-pane" id="NuevoRegistroItems">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">GRUPO</span>

                                                <select id="slct_group" class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>
                                                </select>
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">GRUPO
                                                    DE CLASE</span>

                                                <select id="slct_groupClass" class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>
                                                </select>
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CODIGO</span>
                                                <input id="txt_codigo_items" type="text" class="form-control"
                                                    placeholder="..." value="" disabled />
                                            </div>

                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DESCRIPCION</span>
                                                <input id="txt_descripcion_items" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">COLOQUIAL</span>
                                                <input id="txt_descripcion_coloquial" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA
                                                    DE ADQUISICION</span>
                                                <input id="txt_fecha_items" type="date" class="form-control"
                                                    placeholder="..." value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NUMERO
                                                    DE SERIE</span>
                                                <input id="txt_numero_serie" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NUMERO
                                                    DE PARTE</span>
                                                <input id="txt_numero_parte" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">UNIDAD
                                                    DE MEDIDA</span>
                                                <input id="txt_unidad_medida_item" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">MARCA</span>
                                                <input id="txt_marca_item" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PRECIO
                                                    UNITARIO</span>
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">S/.</span>
                                                <input id="txt_precio_item" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <!--<div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PLACA</span>
                                                <input id="txt_numero_placa" type="text" class="form-control"
                                                    value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">HOROMETRO</span>
                                                <input id="txt_numero_horometro" type="number" class="form-control"
                                                    placeholder="..." value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">MARCA</span>
                                                <input id="txt_marca_item" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">MODELO</span>
                                                <input id="txt_modelo_item" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>-->
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CONDICION</span>
                                                <select id="slct_tipo_orden_condicion" class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>
                                                    <option value="0">Nuevo
                                                    </option>
                                                    <option value="1">Remanufacturado
                                                    </option>
                                                    <option value="2">Usado
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group"> <span class="input-group-addon text-xl"
                                                    title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">INICIO
                                                    DE GARANTIA</span>
                                                <input id="txt_garantia_item_inicio" type="date" class="form-control"
                                                    placeholder="..." value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TIEMPO
                                                    DE GARANTIA</span>
                                                <input id="txt_garantia_item" type="number" class="form-control"
                                                    placeholder="..." value="" />

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">MESES</span>

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FIN
                                                    DE GARANTIA</span>
                                                <input id="txt_garantia_item_fin" type="date" class="form-control"
                                                    placeholder="..." value="" disabled />

                                            </div>
                                        </div>
                                    </div>

                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                        <button type="button" class="bg-emerald-500 py-4 px-2 text-white"
                                            onclick="checkIfisIntoOR();">Guardar</button>
                                        <button id="buttonforVehicleItem" style="display:none" type="button"
                                            class="bg-gray-500 py-4 px-2 text-white"
                                            onclick="ModalAddComponentIntoVehicle();">Agregar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="NuevoRegistroAgregarItems">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">GRUPO</span>

                                                <select id="slct_group_add_items" class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>
                                                </select>
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">GRUPO
                                                    DE CLASE</span>

                                                <select id="slct_groupClass_add_items" class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>
                                                </select>

                                            </div>

                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ITEM</span>
                                                <select id="slct_items_add_items" class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>
                                                </select>
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DESCRIPCION</span>
                                                <input id="txt_descripcion_items_add" type="text" class="form-control"
                                                    placeholder="..." value="" disabled />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CANTIDAD</span>
                                                <input id="txt_cantidad_items_add" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                                <input id="txt_unidad_medida_items_add" type="text" class="form-control"
                                                    placeholder="..." value="" disabled/> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                        <button type="button" class="bg-emerald-500 py-4 px-2 text-white"
                                            onclick="addCantidad_items();">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="HistorialGrupos">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="searchGrouphtml">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-primary" style="width:100%">
                                        <div class="box-header no-padding">
                                            <div class="box-body table-responsive no-padding">
                                                <table style="width:100%"
                                                    class="datatable table table-striped table-bordered"
                                                    id="gridGrouphtml">
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
                        <div class="tab-pane" id="NuevoRegistroGrupos">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CODIGO</span>
                                                <input id="txt_codigo" type="text" class="form-control"
                                                    placeholder="..." value="" disabled />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DESCRIPCION</span>
                                                <input id="txt_descripcion" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>


                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                        <button type="button" class="bg-emerald-500 py-4 px-2 text-white"
                                            onclick="add_Groups();">Guardar</button>
                                        <!-- <button type="button" class="btn btn-warning">Editar</button>                                             -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="HistorialGruposClass">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="searchGroupClasshtml">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-primary" style="width:100%">
                                        <div class="box-header no-padding">
                                            <div class="box-body table-responsive no-padding">
                                                <table style="width:100%"
                                                    class="datatable table table-striped table-bordered"
                                                    id="gridGroupClasshtml">
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
                        <div class="tab-pane" id="NuevoRegistroGruposClass">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">GRUPO
                                                </span>

                                                <select id="slct_group_GruposClass" class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>
                                                </select>
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CODIGO</span>
                                                <input id="txt_codigo_GruposClass" type="text" class="form-control"
                                                    placeholder="..." value="" disabled />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DESCRIPCION</span>
                                                <input id="txt_descripcion_GruposClass" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>


                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                        <button type="button" class="bg-emerald-500 py-4 px-2 text-white"
                                            onclick="add_GroupClass();">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="HistorialProveedor">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="searchProveedorhtml">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-primary" style="width:100%">
                                        <div class="box-header no-padding">
                                            <div class="box-body table-responsive no-padding">
                                                <table style="width:100%"
                                                    class="datatable table table-striped table-bordered"
                                                    id="gridProveedorhtml">
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
                        <div class="tab-pane" id="NuevoRegistroProveedor">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">


                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TIPO
                                                </span>

                                                <select id="slct_tipo_proveedor_proveedor" class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>
                                                    <option value="0">A (CRITICO)
                                                    </option>
                                                    <option value="1">B (IMPORTANTE)
                                                    </option>
                                                    <option value="2">C (NO CRITICO)
                                                    </option>
                                                </select>
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CATEGORIA
                                                </span>

                                                <select id="slct_categoria_proveedor" class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DEPARTAMENTO
                                                </span>

                                                <select id="slct_departamento_proveedor" class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>
                                                </select>
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PROVINCIA
                                                </span>

                                                <select id="slct_provincia_proveedor" class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>
                                                </select>
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DISTRITO
                                                </span>

                                                <select id="slct_distrito_proveedor" class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">GRUPO
                                                </span>

                                                <select id="slct_grupo_proveedor" class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>
                                                </select>

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CLASE
                                                    DE GRUPO
                                                </span>

                                                <select id="slct_clase_proveedor" class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">RUC</span>
                                                <input id="txt_ruc_proveedor_proveedor" type="text" class="form-control"
                                                    placeholder="..." value="" />

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">RAZON
                                                    SOCIAL</span>
                                                <input id="txt_razonSocial_proveedor" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DIRECCION</span>
                                                <input id="txt_direccion_proveedor" type="text" class="form-control"
                                                    placeholder="..." value="" />

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TELEFONO</span>
                                                <input id="txt_telefono_proveedor" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CELULAR</span>
                                                <input id="txt_celular_proveedor" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CORREO</span>
                                                <input id="txt_correo_proveedor" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">N°
                                                    de cuenta En soles</span>
                                                <input id="txt_cSoles_proveedor" type="text" class="form-control"
                                                    placeholder="..." value="" />

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CCI
                                                    cuenta en Soles</span>
                                                <input id="txt_ccisSoles_proveedor" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">BANCO</span>

                                                <select id="slct_proveedor_banco_soles" class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>
                                                    <option value="0">MIBANCO
                                                    </option>
                                                    <option value="1">SCOTIABANK
                                                    </option>
                                                    <option value="2">BANCO DE COMERCIO
                                                    </option>
                                                    <option value="3">BANCO DE CREDITO
                                                    </option>
                                                    <option value="4">NACION
                                                    </option>
                                                    <option value="5">BANCO PICHINCHA
                                                    </option>
                                                    <option value="6">BANBIF
                                                    </option>
                                                    <option value="7">INTERBANK
                                                    </option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">


                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">N°
                                                    de cuenta en dólares</span>
                                                <input id="txt_cdolares_proveedor" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CCI
                                                    cuenta en dólares</span>
                                                <input id="txt_cciscdolares_proveedor" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">BANCO</span>

                                                <select id="slct_proveedor_banco_dolares" class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>
                                                    <option value="0">MIBANCO
                                                    </option>
                                                    <option value="1">SCOTIABANK
                                                    </option>
                                                    <option value="2">BANCO DE COMERCIO
                                                    </option>
                                                    <option value="3">BANCO DE CREDITO
                                                    </option>
                                                    <option value="4">NACION
                                                    </option>
                                                    <option value="5">BANCO PICHINCHA
                                                    </option>
                                                    <option value="6">BANBIF
                                                    </option>
                                                    <option value="7">INTERBANK
                                                    </option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">


                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">N°
                                                    de cuenta de detracciones</span>
                                                <input id="txt_detracciones_proveedor" type="text" class="form-control"
                                                    placeholder="..." value="" />

                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                        <button type="button" class="bg-emerald-500 py-4 px-2 text-white"
                                            onclick="add_Proveedor();">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="NuevaCategoriaProveedor">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="col-md-6">
                                        <div class="box box-body">
                                            <div class="form-group" style="margin-bottom:5px;">
                                                <div class="input-group">
                                                    <span class="input-group-addon" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DESCRIPCION</span>
                                                    <input id="txt_categoryProveedorNew" type="text"
                                                        class="form-control" placeholder="..." value="" />
                                                </div>
                                            </div>

                                        </div>
                                        <div class="btn-group" role="group" aria-label="Basic example"
                                            style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                            <button type="button" class="bg-emerald-500 py-4 px-2 text-white"
                                                onclick="add_ProveedorCategoria();">Guardar</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="box box-body">
                                            <div class="form-group" style="margin-bottom:5px;">
                                                <div class="input-group" id="searchProveedorCategoryhtml">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-primary" style="width:100%">
                                            <div class="box-header no-padding">
                                                <div class="box-body table-responsive no-padding">
                                                    <table style="width:100%"
                                                        class="datatable table table-striped table-bordered"
                                                        id="gridProveedorCategoryhtml">
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
                        </div>
                        <div class="tab-pane" id="NuevaHistorialSeleccionProveedor">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="searchSeleccionProveedorhtml">
                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="0" type="text" class="form-control"
                                                    placeholder="Buscar por Proveedor" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-primary" style="width:100%">
                                        <div class="box-header no-padding">
                                            <div class="box-body table-responsive no-padding">
                                                <table style="width:100%"
                                                    class="datatable table table-striped table-bordered text-xl"
                                                    id="gridSeleccionProveedorhtml">
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
                        <div class="tab-pane" id="NuevaHistorialEvaluacionProveedor">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="searchEvaluacionProveedorhtml">
                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="0" type="text" class="form-control"
                                                    placeholder="Buscar por Proveedor" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-primary" style="width:100%">
                                        <div class="box-header no-padding">
                                            <div class="box-body table-responsive no-padding">
                                                <table style="width:100%"
                                                    class="datatable table table-striped table-bordered text-xl"
                                                    id="gridEvaluacionProveedorhtml">
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
                        <div class="tab-pane" id="NuevaSeleccionProveedor">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div style="display:flex;">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold; width:200px">EVALUADOR</span>
                                                <div style="display:flex">
                                                    <input id="txt_search_evaluador_proveedor_selected" type="text"
                                                        class="form-control" placeholder="Buscar por DNI para Ingresar"
                                                        value="" />
                                                    <input type="hidden"
                                                        id="txt_seleccion_evaluacionProveedor_evaluador" name=""
                                                        value="">
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 30px;">
                                                        <button type="button" class="fa fa-search" aria-hidden="true"
                                                            onclick="searchFuncionForNameAndSurname('txt_search_evaluador_proveedor_selected','02_search_solicitante',[
                                                                'txt_seleccion_evaluacionProveedor_evaluador',
                                                                'txt_solicitante_nombres_seleccion_proveedor',
                                                                'txt_solicitante_apellidos_seleccion_proveedor',
                                                            ]);"></button></span>
                                                </div>
                                            </div>
                                            <div class="input-group" style="margin-top:20px;">

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES
                                                    DEL EVALUADOR</span>
                                                <input id="txt_solicitante_nombres_seleccion_proveedor" type="text"
                                                    class="form-control" placeholder="..." value="" disabled />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">APELLIDOS
                                                    DEL EVALUADOR</span>
                                                <input id="txt_solicitante_apellidos_seleccion_proveedor" type="text"
                                                    class="form-control" placeholder="..." value="" disabled />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TIPO
                                                    DE SERVICIO</span>
                                                <input id="txt_seleccion_evaluacionProveedor_tipo" type="text"
                                                    class="form-control" placeholder="..." value="" />
                                            </div>
                                        </div>

                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">LEYENDA</span>
                                                <table style="width:100%" class="table">

                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    style="width:15px;height:15px;background-color:green">
                                                                </div>
                                                            </td>
                                                            <td><strong>PROVEEDOR CON EXCELENTES CARACTERISTICAS
                                                                    (PEX)</strong> igual o mayor a 2.25</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    style="width:15px;height:15px;background-color:yellow">
                                                                </div>
                                                            </td>
                                                            <td><strong>PROVEEDOR ACEPTABLE (PAC)</strong> igual o mayor
                                                                a 2 y menor a 2.25
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    style="width:15px;height:15px;background-color:red">
                                                                </div>
                                                            </td>
                                                            <td><strong>PROVEEDOR CON MALAS CARACTERISTICAS
                                                                    (PMC)</strong> menor a 2
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!--<div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">AGREGAR
                                                    CRITERIO DE EVALUACION</span>
                                                <button class="bg-cyan-500 py-4 px-4 text-white" type="button"
                                                    onclick="addComentario('tableSeleccionProveedor','selectProveedorSeleccion');"><i
                                                        class="fa fa-plus-circle "></i></button>
                                            </div>
                                        </div>-->
                                        <div class="box-primary">
                                            <div class="box-header no-padding">
                                                <div class="box-body table-responsive no-padding">

                                                    <table class="datatable table table-striped table-bordered text-xl"
                                                        id="tableSeleccionProveedor">
                                                        <thead>
                                                            <tr>

                                                                <th>CRITERIOS A EVALUAR</th>
                                                                <th>
                                                                    <select id="proveedorSeleccion-1"
                                                                        class='form-control CriterioEvaluacionSelectProveedor'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                    </select>
                                                                </th>
                                                                <th>
                                                                    <select id="proveedorSeleccion-2"
                                                                        class='form-control CriterioEvaluacionSelectProveedor'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                    </select>
                                                                </th>
                                                                <th>
                                                                    <select id="proveedorSeleccion-3"
                                                                        class='form-control CriterioEvaluacionSelectProveedor'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                    </select>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr id='rowItemSelection1' class=''>
                                                                <td>Legalmente constituida</td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorSeleccion-1'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorSeleccion-2'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorSeleccion-3'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <!--<td>
                                                                    <div
                                                                        style='display:flex;justify-content:center;gap:2rem;'>
                                                                        <button type='button'
                                                                            class='fa fa-trash bg-rose-500 py-2 px-2 text-white'
                                                                            onclick='removeComentarios("rowItemSelection1")'></button>
                                                                    </div>
                                                                </td>-->
                                                            </tr>
                                                            <tr id='rowItemSelection2' class=''>
                                                                <td>Experiencia en el mercado (al menos 5años)</td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorSeleccion-1'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorSeleccion-2'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorSeleccion-3'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <!--<td>
                                                                    <div
                                                                        style='display:flex;justify-content:center;gap:2rem;'>
                                                                        <button type='button'
                                                                            class='fa fa-trash bg-rose-500 py-2 px-2 text-white'
                                                                            onclick='removeComentarios("rowItemSelection2")'></button>
                                                                    </div>
                                                                </td>-->
                                                            </tr>
                                                            <tr id='rowItemSelection3' class=''>
                                                                <td>Equipo de trabajo propio</td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorSeleccion-1'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorSeleccion-2'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorSeleccion-3'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <!--<td>
                                                                    <div
                                                                        style='display:flex;justify-content:center;gap:2rem;'>
                                                                        <button type='button'
                                                                            class='fa fa-trash bg-rose-500 py-2 px-2 text-white'
                                                                            onclick='removeComentarios("rowItemSelection3")'></button>
                                                                    </div>
                                                                </td>-->
                                                            </tr>
                                                            <tr id='rowItemSelection4' class=''>
                                                                <td>Brindar Garantía en el servicio</td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorSeleccion-1'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorSeleccion-2'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorSeleccion-3'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <!--<td>
                                                                    <div
                                                                        style='display:flex;justify-content:center;gap:2rem;'>
                                                                        <button type='button'
                                                                            class='fa fa-trash bg-rose-500 py-2 px-2 text-white'
                                                                            onclick='removeComentarios("rowItemSelection4")'></button>
                                                                    </div>
                                                                </td>-->
                                                            </tr>
                                                            <tr id='rowItemSelection5' class=''>
                                                                <td>Tiene recomendaciones (al menos 3)</td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorSeleccion-1'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorSeleccion-2'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorSeleccion-3'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <!--<td>
                                                                    <div
                                                                        style='display:flex;justify-content:center;gap:2rem;'>
                                                                        <button type='button'
                                                                            class='fa fa-trash bg-rose-500 py-2 px-2 text-white'
                                                                            onclick='removeComentarios("rowItemSelection5")'></button>
                                                                    </div>
                                                                </td>-->
                                                            </tr>
                                                            <tr id='rowItemSelection6' class=''>
                                                                <td>Capacidad de atención</td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorSeleccion-1'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorSeleccion-2'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorSeleccion-3'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <!--<td>
                                                                    <div
                                                                        style='display:flex;justify-content:center;gap:2rem;'>
                                                                        <button type='button'
                                                                            class='fa fa-trash bg-rose-500 py-2 px-2 text-white'
                                                                            onclick='removeComentarios("rowItemSelection6")'></button>
                                                                    </div>
                                                                </td>-->
                                                            </tr>
                                                            <tr id='rowItemSelection7' class=''>
                                                                <td>Contar con equipos propios</td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorSeleccion-1'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorSeleccion-2'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorSeleccion-3'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <!--<td>
                                                                    <div
                                                                        style='display:flex;justify-content:center;gap:2rem;'>
                                                                        <button type='button'
                                                                            class='fa fa-trash bg-rose-500 py-2 px-2 text-white'
                                                                            onclick='removeComentarios("rowItemSelection7")'></button>
                                                                    </div>
                                                                </td>-->
                                                            </tr>
                                                            <tr id='rowItemSelection8' class=''>
                                                                <td>Contar con stock de repuestos propios</td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorSeleccion-1'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorSeleccion-2'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorSeleccion-3'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <!--<td>
                                                                    <div
                                                                        style='display:flex;justify-content:center;gap:2rem;'>
                                                                        <button type='button'
                                                                            class='fa fa-trash bg-rose-500 py-2 px-2 text-white'
                                                                            onclick='removeComentarios("rowItemSelection8")'></button>
                                                                    </div>
                                                                </td>-->
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-primary">
                                            <div class="box-header no-padding">
                                                <div class="box-body table-responsive no-padding">

                                                    <table class="datatable table table-striped table-bordered" id="">
                                                        <thead>
                                                            <tr>

                                                                <th width="500"> <span>TOTAL</span></th>
                                                                <th id="result_seleccion_1">
                                                                    <input type="text" id="totalSeleccionProveedor1"
                                                                        disabled />
                                                                </th>
                                                                <th id="result_seleccion_2">
                                                                    <input type="text" id="totalSeleccionProveedor2"
                                                                        disabled />
                                                                </th>
                                                                <th id="result_seleccion_3">
                                                                    <input type="text" id="totalSeleccionProveedor3"
                                                                        disabled />
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                        <button type="button" class="bg-cyan-500 py-4 px-2 text-white"
                                            onclick="EvaluarSeleccionProveedor();">Evaluar</button>
                                        <button type="button" class="bg-emerald-500 py-4 px-2 text-white"
                                            onclick="add_EvaluarSeleccionProveedor();">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="NuevaEvaluacionProveedor">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div style="display:flex;">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold; width:200px">EVALUADOR</span>
                                                <div style="display:flex">
                                                    <input id="txt_search_evaluador_proveedor_evaluated" type="text"
                                                        class="form-control" placeholder="Buscar por DNI para Ingresar"
                                                        value="" />
                                                    <input type="hidden"
                                                        id="txt_evaluacion_evaluacionProveedor_evaluador2" name=""
                                                        value="">
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 30px;">
                                                        <button type="button" class="fa fa-search" aria-hidden="true"
                                                            onclick="searchFuncionForNameAndSurname('txt_search_evaluador_proveedor_evaluated','02_search_solicitante',[
                                                                'txt_evaluacion_evaluacionProveedor_evaluador2',
                                                                'txt_solicitante_nombres_evaluador_proveedor',
                                                                'txt_solicitante_apellidos_evaluador_proveedor',
                                                            ]);"></button></span>
                                                </div>
                                            </div>
                                            <div class="input-group" style="margin-top:20px;">

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES
                                                    DEL EVALUADOR</span>
                                                <input id="txt_solicitante_nombres_evaluador_proveedor" type="text"
                                                    class="form-control" placeholder="..." value="" disabled />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">APELLIDOS
                                                    DEL EVALUADOR</span>
                                                <input id="txt_solicitante_apellidos_evaluador_proveedor" type="text"
                                                    class="form-control" placeholder="..." value="" disabled />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">LEYENDA</span>
                                                <table style="width:100%" class="table">

                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    style="width:15px;height:15px;background-color:green">
                                                                </div>
                                                            </td>
                                                            <td><strong>PROVEEDOR CON EXCELENTES CARACTERISTICAS
                                                                    (PEX)</strong> igual o mayor a 2.25</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    style="width:15px;height:15px;background-color:yellow">
                                                                </div>
                                                            </td>
                                                            <td><strong>PROVEEDOR ACEPTABLE (PAC)</strong> igual o mayor
                                                                a 2 y menor a 2.25
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div
                                                                    style="width:15px;height:15px;background-color:red">
                                                                </div>
                                                            </td>
                                                            <td><strong>PROVEEDOR CON MALAS CARACTERISTICAS
                                                                    (PMC)</strong> menor a 2
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!--<div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">AGREGAR
                                                    CRITERIO DE EVALUACION</span>
                                                <button class="bg-cyan-500 py-4 px-4 text-white" type="button"
                                                    onclick="addComentario('tableEvaluacionProveedor','selectProveedorEvaluacion');"><i
                                                        class="fa fa-plus-circle"></i></button>
                                            </div>
                                        </div>-->
                                        <div class="box-primary">
                                            <div class="box-header no-padding">
                                                <div class="box-body table-responsive no-padding">

                                                    <table class="datatable table table-striped table-bordered text-xl"
                                                        id="tableEvaluacionProveedor">
                                                        <thead>
                                                            <tr>

                                                                <th>CRITERIOS A EVALUAR</th>
                                                                <th>
                                                                    <select id="proveedorEvalucion-1"
                                                                        class='form-control CriterioEvaluacionEvaluarSelectProveedor'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                    </select>
                                                                </th>
                                                                <th>
                                                                    <select id="proveedorEvalucion-2"
                                                                        class='form-control CriterioEvaluacionEvaluarSelectProveedor'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                    </select>
                                                                </th>
                                                                <th>
                                                                    <select id="proveedorEvalucion-3"
                                                                        class='form-control CriterioEvaluacionEvaluarSelectProveedor'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                    </select>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr id='' class=''>
                                                                <td>Cumple con contrato</td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorEvaluacion-1'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorEvaluacion-2'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorEvaluacion-3'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <!--<td>
                                                                    <div
                                                                        style='display:flex;justify-content:center;gap:2rem;'>
                                                                        <button type='button'
                                                                            class='fa fa-trash bg-rose-500 py-2 px-2 text-white'
                                                                            onclick='removeComentarios("+(new Date()).getTime()+")'></button>
                                                                    </div>
                                                                </td>-->
                                                            </tr>
                                                            <tr id='' class=''>
                                                                <td>Entrega a tiempo</td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorEvaluacion-1'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorEvaluacion-2'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select id=''
                                                                        class='form-control selectProveedorEvaluacion-3'>
                                                                        <option value='-1'>Selecciona...
                                                                        </option>
                                                                        <option value='0'>0
                                                                        </option>
                                                                        <option value='1'>1
                                                                        </option>
                                                                        <option value='2'>2
                                                                        </option>
                                                                        <option value='3'>3
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <!--<td>
                                                                    <div
                                                                        style='display:flex;justify-content:center;gap:2rem;'>
                                                                        <button type='button'
                                                                            class='fa fa-trash bg-rose-500 py-2 px-2 text-white'
                                                                            onclick='removeComentarios("+(new Date()).getTime()+")'></button>
                                                                    </div>
                                                                </td>-->
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-primary">
                                            <div class="box-header no-padding">
                                                <div class="box-body table-responsive no-padding">

                                                    <table class="datatable table table-striped table-bordered" id="">
                                                        <thead>
                                                            <tr>

                                                                <th width="350">TOTAL</th>

                                                                <th id="result_evaluacion_1">
                                                                    <input type="text" id="totalEvalucionProveedor1"
                                                                        disabled />
                                                                </th>
                                                                <th id="result_evaluacion_2">
                                                                    <input type="text" id="totalEvalucionProveedor2"
                                                                        disabled />
                                                                </th>
                                                                <th id="result_evaluacion_3">
                                                                    <input type="text" id="totalEvalucionProveedor3"
                                                                        disabled />
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                        <button type="button" class="bg-cyan-500 py-4 px-2 text-white"
                                            onclick="EvaluarEvaluacionProveedor();">Evaluar</button>
                                        <button type="button" class="bg-emerald-500 py-4 px-2 text-white"
                                            onclick="add_EvaluarEvaluacionProveedor();">Guardar</button>
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
                                                    class="datatable table table-striped table-bordered text-xl"
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
                                                    <input id="txt_search_solicitanteReqCompra" type="text"
                                                        class="form-control" placeholder="Buscar por DNI para Ingresar"
                                                        value="" />
                                                    <input type="hidden" id="txt_solicitante_requerimiento" name=""
                                                        value="">
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 30px;">
                                                        <button type="button" class="fa fa-search" aria-hidden="true"
                                                            onclick="searchSolicitanteReqCompra();"></button></span>
                                                </div>
                                            </div>
                                            <div class="input-group" style="margin-top:20px;">

                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES
                                                    DEL SOLICITANTE</span>
                                                <input id="txt_solicitante_nombres_reqCompra" type="text"
                                                    class="form-control" placeholder="..." value="" disabled />
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">APELLIDOS
                                                    DEL SOLICITANTE</span>
                                                <input id="txt_solicitante_apellidos_reqCompra" type="text"
                                                    class="form-control" placeholder="..." value="" disabled />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">AREA</span>

                                                <select id="slct_area_requerimiento" class="form-control ">
                                                    <option value="-1">Selecciona...
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
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
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PRIORIDAD</span>
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

                                        <button type="button" class="bg-emerald-500 py-2 px-2 text-white"
                                            onclick="add_Requerimientos();">Guardar</button>
                                        <!-- <button type="button" class="btn btn-warning">Editar</button>                                             -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="reqordcompramenuItem">

                            <div class="row">
                                <div class="col-md-12" id="HistorialOrdenDeCompra">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="searchOrdenDeComprahtml">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-primary" style="width:100%">
                                        <div class="box-header no-padding">
                                            <div class="box-body table-responsive no-padding">
                                                <table style="width:100%"
                                                    class="datatable table table-striped table-bordered"
                                                    id="gridOrdenDeComprahtml">
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
                    </div>
                </div>
            </div>
        </form>
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
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ESTADO</span>
                            <select id="txt_estado_requerimiento_modal" class="form-control ">
                                <option value="-1">Selecciona...
                                </option>
                                <option value="1">PENDIENTE
                                </option>
                                <option value="8">EN EVALUACION
                                </option>
                                <option value="12">APROBADA
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
                    <button type="button" class="bg-emerald-500 py-4 px-2 text-white" id="btn-requeriment-save"
                        onclick="insert_modal_orden_compra();">Guardar</button>
                    <button type="button" class="bg-stone-900 py-4 px-2 text-white" data-dismiss="modal"
                        onclick="$('#ModalOpenRequerimiento').modal('hide')">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"
    id="modalAddComponentIntoVehicle">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box box-body">
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PERTENECE A ORDEN DE
                                COMPRA</span>

                            <select id="txt_estado_oc_componenttoVehicle" class="form-control">
                                <option value="-1">Selecciona...
                                </option>
                                <option value="0">NO
                                </option>
                                <option value="1">SI
                                </option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom:5px;display:none;" id="details_oc_to_componentVehicle">
                        <div style="display:flex;">
                            <span class="input-group-addon text-xl" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold; width:200px">ID ORDEN DE COMPRA</span>
                            <div style="display:flex">
                                <input id="txt_ordencompra_withvehicle_search" type="text" class="form-control"
                                    placeholder="Buscar por codigo" value="" />
                                <input type="hidden" id="txt_ordencompra_withvehicle_id" name="" value="">
                                <span class="input-group-addon text-xl" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold;padding-right: 30px;">
                                    <button type="button" class="fa fa-search" aria-hidden="true"
                                        onclick="searchFuncionForNameAndSurnameOrdenCompra('txt_ordencompra_withvehicle_search','sql_ordencompra_vehicle_sql',[
                                                                'txt_ordencompra_withvehicle_id',
                                                                'txt_ordencompra_withvehicle_name',
                                                                'txt_ordencompra_withvehicle_surname',
                                                            ],'griditemsOrdenCompraWithVehicle2','ordencompramodalVehicle');"></button></span>
                            </div>
                        </div>
                        <div class="input-group" style="margin-top:5px;">

                            <span class="input-group-addon text-xl" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CODIGO</span>
                            <input id="txt_ordencompra_withvehicle_name" type="text" class="form-control"
                                placeholder="..." value="" disabled />
                            <span class="input-group-addon text-xl" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA</span>
                            <input id="txt_ordencompra_withvehicle_surname" type="text" class="form-control"
                                placeholder="..." value="" disabled />
                        </div>
                        <div class="box-primary" style="width:100%">
                            <div class="box-header no-padding">
                                <div class="box-body table-responsive no-padding">
                                    <table style="width:100%" class="datatable table table-striped table-bordered"
                                        id="griditemsOrdenCompraWithVehicle2">
                                        <thead>
                                            <th>Id</th>
                                            <th>descripcion</th>
                                            <th>prioridad</th>
                                            <th>cantidad</th>
                                            <th>cumplidos</th>
                                            <th></th>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div style="display:flex;">
                            <span class="input-group-addon text-xl" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold; width:200px">VEHICULO</span>
                            <div style="display:flex">
                                <input id="txt_ordencompra_vehiclemodal_search" type="text" class="form-control"
                                    placeholder="Buscar por DNI para Ingresar" value="" />
                                <input type="hidden" id="txt_ordencompra_vehiclemodal_id" name="" value="">
                                <span class="input-group-addon text-xl" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold;padding-right: 30px;">
                                    <button type="button" class="fa fa-search" aria-hidden="true" onclick="searchFuncionForNameAndSurname('txt_ordencompra_vehiclemodal_search','sql_search_vechiculo',[
                                                                'txt_ordencompra_vehiclemodal_id',
                                                                'txt_ordencompra_vehiclemodal_name',
                                                                'txt_ordencompra_vehiclemodal_surname',
                                                            ]);"></button></span>
                            </div>
                        </div>
                        <div class="input-group" style="margin-top:5px;">

                            <span class="input-group-addon text-xl" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ACTIVO</span>
                            <input id="txt_ordencompra_vehiclemodal_name" type="text" class="form-control"
                                placeholder="..." value="" disabled />
                            <span class="input-group-addon text-xl" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CATEGORIA</span>
                            <input id="txt_ordencompra_vehiclemodal_surname" type="text" class="form-control"
                                placeholder="..." value="" disabled />
                        </div>
                    </div>
                    <div class="box-primary">
                        <div class="box-header no-padding">
                            <div class="box-body table-responsive no-padding">

                                <table class="datatable table table-striped table-bordered"
                                    id="tableItemOrdenComprachecksistem">
                                    <thead>
                                        <tr>

                                            <th>MOTOR</th>
                                            <th>TREN PRO.</th>
                                            <th>AROS LLAN. Y TREN.</th>
                                            <th>SIS. SUSPENSION</th>
                                            <th>SIS. ELECTRICO</th>
                                            <th>SIS. HIDRAULICO</th>
                                            <th>CAR. CHASIS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td><input type="radio" class="checksistemavehicleradio" name="orcom" id="1" />
                                        </td>
                                        <td><input type="radio" class="checksistemavehicleradio" name="orcom" id="2" />
                                        </td>
                                        <td><input type="radio" class="checksistemavehicleradio" name="orcom" id="3" />
                                        </td>
                                        <td><input type="radio" class="checksistemavehicleradio" name="orcom" id="4" />
                                        </td>
                                        <td><input type="radio" class="checksistemavehicleradio" name="orcom" id="5" />
                                        </td>
                                        <td><input type="radio" class="checksistemavehicleradio" name="orcom" id="6" />
                                        </td>
                                        <td><input type="radio" class="checksistemavehicleradio" name="orcom" id="7" />
                                        </td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="bg-emerald-500 py-4 px-2 text-white"
                        onclick="add_ItemsIntoVehicle();">Guardar</button>
                    <button type="button" class="bg-stone-900 py-4 px-2 text-white" data-dismiss="modal"
                        onclick="$('#modalAddComponentIntoVehicle').modal('hide')">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" id="ModalOpenOrdenCompra">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box box-body">

                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Nº DE
                                ORDEN DE COMPRA</span>

                            <input id="txt_n_orden_compra_modal" type="text" class="form-control" value="" disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Nº DE
                                REQUERIMIENTO</span>

                            <input id="txt_n_requerimiento_oc_modal" type="text" class="form-control" value=""
                                disabled />

                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">AREA</span>

                            <input id="txt_area_orden_compra_modal" type="text" class="form-control" value=""
                                disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">SOLICITANTE</span>

                            <input id="txt_solicitante_orden_compra_modal" type="text" class="form-control"
                                value="dni.pdf" disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CENTRO DE COSTO</span>

                            <input id="txt_centro_costo_orden_compra_modal" type="text" class="form-control"
                                value="dni.pdf" disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PRIORIDAD</span>


                            <input id="txt_prioridad_orden_compra_modal" type="text" class="form-control"
                                value="dni.pdf" disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">MOTIVO</span>

                            <input id="txt_motivo_orden_comrpa_modal" type="text" class="form-control" value="dni.pdf"
                                disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ESTADO</span>

                            <select id="txt_estado_orden_comrpa_modal" class="form-control">
                                <option value="-1">Selecciona...
                                </option>
                                <option value="9">EN COTIZACION
                                </option>
                                <option value="10">EMITIDA
                                </option>

                            </select>
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA DE
                                CREACION</span>

                            <input id="txt_fecha_orden_comrpa_modal" type="date" class="form-control" value=""
                                disabled />
                        </div>
                    </div>
                    <div id="contentProviderOC" style="display:none;">
                        <div class="form-group" style="margin-bottom:5px;">
                            <div style="display:flex;">
                                <span class="input-group-addon text-xl" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold; width:200px">PROVEEDOR</span>
                                <div style="display:flex">
                                    <input id="txt_proveedor_modal_search_ordencompra" type="text" class="form-control"
                                        placeholder="Buscar por DNI para Ingresar" value="" />
                                    <input type="hidden" id="txt_proveedor_modal_id_ordencompra" name="" value="">
                                    <span class="input-group-addon text-xl" title="Expositor"
                                        style="background:#EEEEEE;font-weight:bold;padding-right: 30px;">
                                        <button type="button" class="fa fa-search" aria-hidden="true" onclick="searchFuncionForNameAndSurname('txt_proveedor_modal_search_ordencompra','sql_proveedor_orden_compra',[
                                                                'txt_proveedor_modal_id_ordencompra',
                                                                'txt_proveedor_modal_nombre_ordencompra',
                                                                'txt_proveedor_modal_apellido_ordencompra',
                                                            ]);"></button></span>
                                </div>
                            </div>
                            <div class="input-group" style="margin-top:5px;">

                                <span class="input-group-addon text-xl" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES
                                    DEL PROVEEDOR</span>
                                <input id="txt_proveedor_modal_nombre_ordencompra" type="text" class="form-control"
                                    placeholder="..." value="" disabled />
                                <span class="input-group-addon text-xl" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">APELLIDOS
                                    DEL PROVEEDOR</span>
                                <input id="txt_proveedor_modal_apellido_ordencompra" type="text" class="form-control"
                                    placeholder="..." value="" disabled />
                            </div>
                        </div>
                        <!--<div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                                <span class="input-group-addon" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PROVEEDOR</span>

                                <input id="txt_subtotal_orden_compra_modal" type="text" class="form-control" value="" />
                                <span class="input-group-addon" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">RUC</span>

                                <input id="txt_subtotal_orden_compra_modal" type="text" class="form-control" value="" />
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                                <span class="input-group-addon" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DIRECCION</span>

                                <input id="txt_subtotal_orden_compra_modal" type="text" class="form-control" value="" />
                                <span class="input-group-addon" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CONTACTO</span>

                                <input id="txt_subtotal_orden_compra_modal" type="text" class="form-control" value="" />
                            </div>
                        </div>-->
                        <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                                <span class="input-group-addon" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CONDICION</span>

                                <input id="txt_proveedor_modal_condicion_ordencompra" type="text" class="form-control"
                                    value="" />
                                <span class="input-group-addon" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">MONEDA</span>

                                <select id="txt_proveedor_modal_moneda_ordencompra" class="form-control ">
                                    <option value="-1">Selecciona...
                                    </option>
                                    <option value="0">SOLES
                                    </option>
                                    <option value="1">DOLARES
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                                <span class="input-group-addon" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA DE
                                    EMISION</span>

                                <input id="txt_proveedor_modal_fecha_emision_ordencompra" type="date"
                                    class="form-control" value="" />
                                <span class="input-group-addon" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA DE
                                    ATENCION</span>

                                <input id="txt_proveedor_modal_fecha_atencion_ordencompra" type="date"
                                    class="form-control" value="" />
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">

                                <span class="input-group-addon" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TIEMPO DE ATENCION
                                    DE LA OC</span>

                                <input id="txt_proveedor_modal_tiempo_atencion_ordencompra" type="text"
                                    class="form-control" value="" />
                                <span class="input-group-addon" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TIEMPO DE ATENCION
                                    DEL PROVEEDOR</span>

                                <input id="txt_proveedor_modal_tiempo_proveedor_ordencompra" type="text"
                                    class="form-control" value="" />
                            </div>
                        </div>
                    </div>

                    <div class="box-primary">
                        <div class="box-header no-padding">
                            <div class="box-body table-responsive no-padding">

                                <table class="datatable table table-striped table-bordered"
                                    id="tableItemOrdenCompraModalShow">
                                    <thead>
                                        <tr>

                                            <th>ITEM</th>
                                            <th>CODIGO</th>
                                            <th>Nº DE PARTE</th>
                                            <th>DESCRIPCION</th>
                                            <th>CANTIDAD</th>
                                            <th>UNIDAD MEDIDA</th>
                                            <th>PRECIO UNITARIO</th>
                                            <th>PRECIO TOTAL</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">SUBTOTAL</span>

                            <input id="txt_subtotal_orden_compra_moda" type="text" class="form-control" value=""
                                disabled />
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">I.G.V. 18%</span>

                            <input id="txt_igv_orden_compra_modal" type="text" class="form-control" value="" disabled />
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TOTAL</span>

                            <input id="txt_total_orden_compra_modal" type="text" class="form-control" value=""
                                disabled />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="bg-emerald-500 py-4 px-2 text-white" id="addbutonMainOrdenCompra"
                        onclick="insert_modal_Orden_compra_2();">Guardar</button>
                    <button type="button" class="bg-stone-900 py-4 px-2 text-white" data-dismiss="modal"
                        onclick="$('#ModalOpenOrdenCompra').modal('hide')">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"
    id="modaladdItemComponentCheckIfOC">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box box-body">
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PERTENECE A ORDEN DE
                                COMPRA</span>
                            <select id="txt_estado_p_od_pertenece" class="form-control">
                                <option value="-1">Selecciona...
                                </option>
                                <option value="0">NO
                                </option>
                                <option value="1">SI
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="display:none;" id="detailsOC_component">
                        <div style="display:flex;">
                            <span class="input-group-addon text-xl" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold; width:200px">ID ORDEN DE COMPRA</span>
                            <div style="display:flex">
                                <input id="txt_ordencompravehicicle_search" type="text" class="form-control"
                                    placeholder="Buscar por codigo" value="" />
                                <input type="hidden" id="txt_ordencompravehicicle_id" name="" value="">
                                <span class="input-group-addon text-xl" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold;padding-right: 30px;">
                                    <button type="button" class="fa fa-search" aria-hidden="true"
                                        onclick="searchFuncionForNameAndSurnameOrdenCompra('txt_ordencompravehicicle_search','sql_ordencompra_vehicle_sql',[
                                                                'txt_ordencompravehicicle_id',
                                                                'txt_ordencompravehicicle_codigo',
                                                                'txt_ordencompravehicicle_fecha',
                                                            ],'griditemsOrdenCompraVehicle','ordencompramodal');"></button></span>
                            </div>
                        </div>
                        <div class="input-group" style="margin-top:5px;">
                            <span class="input-group-addon text-xl" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CODIGO</span>
                            <input id="txt_ordencompravehicicle_codigo" type="text" class="form-control"
                                placeholder="..." value="" disabled />
                            <span class="input-group-addon text-xl" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA</span>
                            <input id="txt_ordencompravehicicle_fecha" type="text" class="form-control"
                                placeholder="..." value="" disabled />
                        </div>
                        <div class="box-primary" style="width:100%">
                            <div class="box-header no-padding">
                                <div class="box-body table-responsive no-padding">
                                    <table style="width:100%" class="datatable table table-striped table-bordered"
                                        id="griditemsOrdenCompraVehicle">
                                        <thead>
                                            <th>Id</th>
                                            <th>descripcion</th>
                                            <th>prioridad</th>
                                            <th>cantidad</th>
                                            <th>cumplidos</th>
                                            <th></th>
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
                    <button type="button" class="bg-emerald-500 py-4 px-2 text-white"
                        onclick="add_Items();">Guardar</button>
                    <button type="button" class="bg-stone-900 py-4 px-2 text-white" data-dismiss="modal"
                        onclick="$('#modaladdItemComponentCheckIfOC').modal('hide')">Cerrar</button>
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

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
    id="modal_showDetail_seleccionProveedor">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-group" style="margin-bottom:5px;">
                    <div class="input-group">
                        <span class="input-group-addon" title="Expositor"
                            style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TIPO DE SERVICIO</span>

                        <input id="modal_showDetail_seleccionProveedor_tipo" type="text" class="form-control"
                            value="dni.pdf" disabled />
                        <span class="input-group-addon" title="Expositor"
                            style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA DE EVALUACION</span>

                        <input id="modal_showDetail_seleccionProveedor_fecha" type="text" class="form-control"
                            value="dni.pdf" disabled />
                    </div>
                </div>
                <div class="box box-body">
                    <div class="box-header no-padding">
                        <div class="box-body table-responsive no-padding">
                            <table class="datatable table table-striped table-bordered text-xl"
                                id="modal_showDetail_seleccionProveedor_table">
                                <thead>

                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="bg-gray-500 py-4 px-4 text-white" data-dismiss="modal"
                        onclick="$('#modal_showDetail_seleccionProveedor').modal('hide')">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
    id="modal_showDetail_evaluacionProveedor">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-group" style="margin-bottom:5px;">
                    <div class="input-group">
                        <span class="input-group-addon" title="Expositor"
                            style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA DE EVALUACION</span>

                        <input id="modal_showDetail_evaluacionProveedor_fecha" type="text" class="form-control"
                            value="dni.pdf" disabled />
                    </div>
                </div>
                <div class="box box-body">
                    <div class="box-header no-padding">
                        <div class="box-body table-responsive no-padding">
                            <table class="datatable table table-striped table-bordered text-xl"
                                id="modal_showDetail_evaluacionProveedor_table">
                                <thead>

                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="bg-gray-500 py-4 px-4 text-white" data-dismiss="modal"
                        onclick="$('#modal_showDetail_evaluacionProveedor').modal('hide')">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" id="ModalViewItemsDetails">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box box-body">
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
                                                    <tr>
                                                        <th>Unidad de Medida</th>
                                                        <td><span id="det_unidad_medida"></span>
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
                                                    <tr>
                                                        <th>Marca</th>
                                                        <td><span id="det_marca"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Precio Unitario</th>
                                                        <td><span id="det_precio_unitario"></span>
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
                                                        </th>
                                                        <th>Clase
                                                        </th>
                                                        <th>Grupo
                                                        </th>
                                                        <th>Condiciones
                                                        </th>
                                                        <th>Fecha Adquisicion
                                                        </th>
                                                        <th>Fin Garantia
                                                        </th>
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
                                                        </th>
                                                        <th>Clase
                                                        </th>
                                                        <th>Grupo
                                                        </th>
                                                        <th>Condiciones
                                                        </th>
                                                        <th>Fecha Adquisicion
                                                        </th>
                                                        <th>Fin Garantia
                                                        </th>
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
                                                        </th>
                                                        <th>Clase
                                                        </th>
                                                        <th>Grupo
                                                        </th>
                                                        <th>Condiciones
                                                        </th>
                                                        <th>Fecha Adquisicion
                                                        </th>
                                                        <th>Fin Garantia
                                                        </th>
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
                                                        </th>
                                                        <th>Clase
                                                        </th>
                                                        <th>Grupo
                                                        </th>
                                                        <th>Condiciones
                                                        </th>
                                                        <th>Fecha Adquisicion
                                                        </th>
                                                        <th>Fin Garantia
                                                        </th>
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
                                                        </th>
                                                        <th>Clase
                                                        </th>
                                                        <th>Grupo
                                                        </th>
                                                        <th>Condiciones
                                                        </th>
                                                        <th>Fecha Adquisicion
                                                        </th>
                                                        <th>Fin Garantia
                                                        </th>
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
                                                        </th>
                                                        <th>Clase
                                                        </th>
                                                        <th>Grupo
                                                        </th>
                                                        <th>Condiciones
                                                        </th>
                                                        <th>Fecha Adquisicion
                                                        </th>
                                                        <th>Fin Garantia
                                                        </th>
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
                                                        </th>
                                                        <th>Clase
                                                        </th>
                                                        <th>Grupo
                                                        </th>
                                                        <th>Condiciones
                                                        </th>
                                                        <th>Fecha Adquisicion
                                                        </th>
                                                        <th>Fin Garantia
                                                        </th>
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
                <div class="modal-footer">

                    <button type="button" class="bg-stone-900 py-4 px-2 text-white" data-dismiss="modal"
                        onclick="$('#ModalViewItemsDetails').modal('hide')">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"
    id="ModalViewItemsComponentsDetails">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box box-body">
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CODIGO</span>

                            <input id="modal_item_component_item_codigo" type="text" class="form-control"
                                value="dni.pdf" disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DESCRIPCION</span>

                            <input id="modal_item_component_item_descripcion" type="text" class="form-control"
                                value="dni.pdf" disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">COLOQUIAL</span>

                            <input id="modal_item_component_item_coloquial" type="text" class="form-control"
                                value="dni.pdf" disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CANTIDAD</span>

                            <input id="modal_item_component_item_cantidad" type="text" class="form-control"
                                value="dni.pdf" disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">GRUPO</span>

                            <input id="modal_item_component_item_grupo" type="text" class="form-control"
                                value="dni.pdf" disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CLASE</span>

                            <input id="modal_item_component_item_clase" type="text" class="form-control"
                                value="dni.pdf" disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">SERIE</span>

                            <input id="modal_item_component_item_serie" type="text" class="form-control"
                                value="dni.pdf" disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PARTE</span>

                            <input id="modal_item_component_item_parte" type="text" class="form-control"
                                value="dni.pdf" disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA DE ADQUISICION</span>

                            <input id="modal_item_component_fecha_adquisicion" type="text" class="form-control"
                                value="dni.pdf" disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">MARCA</span>

                            <input id="modal_item_component_marca" type="text" class="form-control"
                                value="dni.pdf" disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">UNIDAD DE MEDIDA</span>

                            <input id="modal_item_component_unidad_medida" type="text" class="form-control"
                                value="dni.pdf" disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PRECIO UNITARIO</span>

                            <input id="modal_item_component_precio_unitario" type="text" class="form-control"
                                value="dni.pdf" disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CONDICION</span>

                            <input id="modal_item_component_condicion" type="text" class="form-control"
                                value="dni.pdf" disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FIN DE GARANTIA</span>

                            <input id="modal_item_component_fin_garantia" type="text" class="form-control"
                                value="dni.pdf" disabled />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="bg-stone-900 py-4 px-2 text-white" data-dismiss="modal"
                        onclick="$('#ModalViewItemsComponentsDetails').modal('hide')">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="pages/catalogos/logistica/logistica.js"></script>
<script>
$(document).ready(function() {

    function addMonths(numOfMonths, date = new Date()) {
        date.setMonth(date.getMonth() + numOfMonths);

        return date;
    }
    $('#txt_fecha_g_personas').val(new Date().toISOString().slice(0, 10));
    $('#txt_fecha_requerimiento_requerimiento').val(new Date().toISOString().slice(0, 10));



    $('#txt_garantia_item_inicio').val(new Date().toISOString().slice(0, 10));
    $('#txt_garantia_item_fin').val(new Date().toISOString().slice(0, 10));
    $('#txt_fecha_items').val(new Date().toISOString().slice(0, 10));

    updateGrid("gridAlmacenGrid");
    updateGrid("gridProveedorCategory");
    updateGrid("gridItemsGrid");
    updateGrid("gridGroupGrid");
    updateGrid("gridGroupClassGrid");
    updateGrid("gridProveedorGrid");
    updateGrid("gridRequerimientoGrid");
    updateGrid("gridOrdenCompraGrid");

    updateGrid("gridRequerimientoPersonalGrid");

    updateGrid("gridHistoriaSeleccionProveedorGrid");
    updateGrid("gridHistoriaEvaluacionProveedorGrid");

    UtilLoadSelect("sql_select_get_cargo", "txt_cargo_personas");
    UtilLoadSelect("sql_select_get_area", "slct_area_requerimiento");
    UtilLoadSelect("sql_select_get_lugar_trabajo", "personas_select_lugar");


    //gridSecondRequerimientos();
    loadSelectedGestionPersonasMotivo();
    $("#accordion").accordion({
        collapsible: true
    });
    Date.isLeapYear = function(year) {
        return (((year % 4 === 0) && (year % 100 !== 0)) || (year % 400 === 0));
    };

    Date.getDaysInMonth = function(year, month) {
        return [31, (Date.isLeapYear(year) ? 29 : 28), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][month];
    };

    Date.prototype.isLeapYear = function() {
        return Date.isLeapYear(this.getFullYear());
    };

    Date.prototype.getDaysInMonth = function() {
        return Date.getDaysInMonth(this.getFullYear(), this.getMonth());
    };

    Date.prototype.addMonths = function(value) {
        var n = this.getDate();
        this.setDate(1);
        this.setMonth(this.getMonth() + value);
        this.setDate(Math.min(n, this.getDaysInMonth()));
        return this;
    };


    $('#txt_garantia_item').keyup(function() {
        var value = $(this).val();
        var newDate = new Date($("#txt_garantia_item_inicio").val());
        var result = new Date(newDate.getTime() + (value * 30) * 24 * 60 * 60 * 1000);
        $("#txt_garantia_item_fin").val(result.toISOString().slice(0, 10))
    })

});
</script>