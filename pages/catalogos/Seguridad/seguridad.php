<!-- ztree treeview -->
<link rel="stylesheet" href="libs/ztree/css/ztreestyle.css" />
<script src="libs/ztree/js/jquery.ztree.core.js"></script>


<script src="libs/moment/min/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/locale/es.js"></script>

<script src="pages/catalogos/seguridad/validate.js"></script>
<style>
#grd01Datos_filter,
#grd01Pernocte_filter,
#grd03DatosHistorialFatigaSomnolencia_filter,
#gridRequrimientoPersonalLogisticahtml_filter,
#gridRequerimientoshtml_filter,
#grd01Sintomatologia_filter,
#grd02ModalPernocte_View_Workers_filter,
#grd01checkListHistorial_filter {
    display: none;
}

.error {
    color: #ff2424;
    font-size: 10px;
}

ul li {
    list-style: none;
}
</style>
<section class="content-header">

    <h1><i class="fa fa-tasks"></i> </h1>
    <ol class="breadcrumb">
        <li><a href="javascript:appChangePage('lineaneg');"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sistema de Gestión Seguridad</li>
    </ol>
</section>
<section class="content">
    <div class="row" id="edit">
        <form class="form-horizontal" id="frmWorker" autocomplete="off">

            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <!--<li class="active" title="Control de fatiga y somnolencia"><a href="#datos00" data-toggle="tab"><i class="fa fa-home"></i> Inicio</a></li>-->
                        <li role="presentation" class="dropdown active">
                            <a href="#" id="dropdowngestionpersonas" class="dropdown-toggle" data-toggle="dropdown"
                                aria-controls="dropdowngestionpersonas-contents"><i
                                    class="fa fa-dropbox "></i>Capacitaciones
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdowngestionpersonas"
                                id="dropdowngestionpersonas-contents">
                                <li class="active" title="Inventario"><a href="#SeguridadHistorialRegistro"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i>Historial de registros</a>
                                </li>
                                <li class="" title="Inventario"><a href="#SeguridadNuevoRegistro" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>Nuevo Registro</a>
                                </li>
                            </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                            <a href="#" id="dropdowngestionpersonas" class="dropdown-toggle" data-toggle="dropdown"
                                aria-controls="dropdowngestionpersonas-contents"><i class="fa fa-dropbox "></i>Ctrl
                                de fatiga y somnolencia
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdowngestionpersonas"
                                id="dropdowngestionpersonas-contents">
                                <li class="" title="Inventario"><a href="#SeguridadHistorial" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>Historial</a>
                                </li>
                                <li class="" title="Inventario"><a href="#SeguridadNuevoControl" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>Nuevo Control</a>
                                </li>
                            </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                            <a href="#" id="dropdowngestionpersonas" class="dropdown-toggle" data-toggle="dropdown"
                                aria-controls="dropdowngestionpersonas-contents"><i class="fa fa-dropbox "></i>Check
                                list de pre uso
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdowngestionpersonas"
                                id="dropdowngestionpersonas-contents">
                                <li class="" title="Inventario"><a href="#SeguridadHistorialCamio_Cisterna"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i>Historial</a>
                                </li>
                                <li class="" title="Inventario"><a href="#SeguridadCamioneta" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>Camioneta</a>
                                <li class="" title="Inventario"><a href="#SeguridadCisterna" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>Camioneta Cisterna</a>
                                </li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="#" id="dropdowngestionpersonas" class="dropdown-toggle" data-toggle="dropdown"
                                aria-controls="dropdowngestionpersonas-contents"><i class="fa fa-dropbox "></i>Ctrl
                                de Pernocte
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdowngestionpersonas"
                                id="dropdowngestionpersonas-contents">
                                <li class="" title="Inventario"><a href="#SeguridadCrearPernocte" data-toggle="tab"><i
                                            class="fa fa-dropbox"></i>Crear control de Pernocte</a>
                                </li>
                                <li class="" title="Inventario"><a href="#SeguridadRegistrarPernocte"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i>Registrarse en control de
                                        Pernocte</a>
                                </li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="#" id="dropdowngestionpersonas" class="dropdown-toggle" data-toggle="dropdown"
                                aria-controls="dropdowngestionpersonas-contents"><i class="fa fa-dropbox "></i>Decl. de
                                Sintomas
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdowngestionpersonas"
                                id="dropdowngestionpersonas-contents">
                                <li class="" title="Inventario"><a href="#SectionDeclaracionNoSintoHistorial"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i>Historial de Declaración de
                                        sintomatología</a>
                                </li>
                                <li class="" title="Inventario"><a href="#SectionDeclaracionNoSintoRegistro"
                                        data-toggle="tab"><i class="fa fa-dropbox"></i>Nuevo Registro de
                                        sintomatología</a>
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
                        <div class="tab-pane" id="datos00">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="section_1_home col-md-2">
                                        <ul>
                                            <li><button type="button"
                                                    onclick="openCell('section_2_home','section_2_home')">SGSSO</button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="section_2_home col-md-2" style="display:none">
                                        <ul>
                                            <li><button type="button"
                                                    onclick="openCell('section_3_home','politica_2')">1.
                                                    POLÍTICA</button></li>
                                            <li><button type="button"
                                                    onclick="openCell('section_3_home','reglamento_2')">2.
                                                    REGLAMENTO</button></li>
                                            <li><button type="button"
                                                    onclick="openCell('section_3_home','estandar_2')">3.
                                                    ESTÁNDAR</button></li>
                                            <li><button type="button" onclick="openCell('section_3_home','manual_2')">4.
                                                    MANUAL</button></li>
                                            <li><button type="button" onclick="openCell('section_3_home','plan_2')">5.
                                                    PLAN Y PROGRAMA</button></li>
                                            <li><button type="button"
                                                    onclick="openCell('section_3_home','proced_y_protocolo_2')">6.
                                                    PROCED Y PROTOCOLO</button></li>
                                            <li><button type="button"
                                                    onclick="openCell('section_3_home','instructivo_2')">7.
                                                    INSTRUCTIVO</button></li>
                                        </ul>
                                    </div>
                                    <div class="section_3_home col-md-2" style="display:none">
                                        <div class="politica_2">
                                            <ul>
                                                <li><button type="button"
                                                        onclick="openCell('section_4_home','politica_3')">POLÍTICA</button>
                                                </li>
                                                <ul>
                                        </div>
                                        <div class="reglamento_2">
                                            <ul>
                                                <li><button type="button"
                                                        onclick="openCell('section_4_home','reglamento_3')">REGLAMENTO</button>
                                                </li>
                                                <ul>
                                        </div>
                                        <div class="estandar_2">
                                            <ul>
                                                <li><button type="button"
                                                        onclick="openCell('section_4_home','estandar_3_1')">ESTÁNDAR DE
                                                        GESTIÓN</button></li>
                                                <li><button type="button"
                                                        onclick="openCell('section_4_home','estandar_3_2')">ESTÁNDAR
                                                        OPERATIVO</button></li>
                                                <ul>
                                        </div>
                                        <div class="manual_2">
                                            <ul>
                                                <li><button type="button"
                                                        onclick="openCell('section_4_home','manual_3')">MANUAL</button>
                                                </li>
                                                <ul>
                                        </div>
                                        <div class="plan_2">
                                            <ul>
                                                <li><button type="button"
                                                        onclick="openCell('section_4_home','plan_3')">PLAN</button></li>
                                                <ul>
                                        </div>
                                        <div class="proced_y_protocolo_2">
                                            <ul>
                                                <li><button type="button"
                                                        onclick="openCell('section_4_home','proced_y_protocolo_3_1')">PROCEDIMIENTO</button>
                                                </li>
                                                <li><button type="button"
                                                        onclick="openCell('section_4_home','proced_y_protocolo_3_2')">PROTOCOLO</button>
                                                </li>
                                                <ul>
                                        </div>
                                        <div class="instructivo_2">
                                            <ul>
                                                <li><button type="button"
                                                        onclick="openCell('section_3_home','instructivo_3')">INSTRUCTIVO</button>
                                                </li>
                                                <ul>
                                        </div>
                                    </div>
                                    <div class="section_4_home col-md-3" style="display:none">
                                        <div class="politica_3">
                                            <ul>
                                                <li><button>POLÍTICA DE SEGURIDAD Y SALUD OCUPACIONAL</button></li>
                                                <li><button>POLÍTICA DEL DERECHO A DECIR NO</button></li>
                                                <li><button>POLÍTICA DE FATIGA Y SOMNOLENCIA</button></li>
                                                <li><button>POLÍTICA DE USO RESPONSABLE</button></li>
                                                <li><button>POLÍTICA DE COMPORTAMIENTO</button></li>
                                                <li><button>TARJETA ROJA</button></li>
                                                <ul>
                                        </div>
                                        <div class="reglamento_3">
                                            <ul>
                                                <li><button>RISSO</button></li>
                                                <li><button>RITRA</button></li>
                                                <li><button>RISSO IP</button></li>
                                                <li><button>RICAI</button></li>
                                                <ul>
                                        </div>
                                        <div class="estandar_3_1">
                                            <ul>
                                                <li><button>04. COMUNICACIÓN, CONSULTA</button></li>
                                                <li><button>05. REPORTE, REGISTRO E INESTIGACIÓN</button></li>
                                                <li><button>06. GESTIÓN DE RIESGOS DE SEGURIDAD</button></li>
                                                <li><button>08. MONITOREOS DE AGENTES DE</button></li>
                                                <li><button>11. PREPARACIÓN Y RESPUESTA</button></li>
                                                <li><button>12. EXÁMENES MÉDICOS</button></li>
                                                <li><button>13. REGLAS POR LA VIDA</button></li>
                                                <li><button>14. LIDERAZGO VISIBLE</button></li>

                                                <ul>
                                        </div>
                                        <div class="estandar_3_2">
                                            <ul>
                                                <li><button>01. INTERACCIÓN HOMBRE - MÁQUINA</button></li>
                                                <li><button>03. SEÑALIZACION Y CÓDIGO</button></li>
                                                <li><button>05. TRABAJOS EN TENSIÓN</button></li>
                                                <li><button>06. TRABAJOS CERCA O SOBRE</button></li>
                                                <li><button>07. HERRAMIENTAS MANUALES</button></li>
                                                <li><button>09. TRABAJOS EN CALIENTE</button></li>
                                                <li><button>12. ESTANDAR DE EPP</button></li>
                                                <li><button>13. EXPLOSIVOS Y VOLADURA</button></li>
                                                <li><button>14. USO Y ALMACENAMIENTO DE</button></li>
                                                <ul>
                                        </div>
                                        <div class="manual_3">
                                            <ul>
                                                <li><button>GESTIÓN DE SEGURIDAD Y SALUD</button></li>
                                                <ul>
                                        </div>
                                        <div class="plan_3">
                                            <ul>
                                                <li><button>PLAN ANUAL DE SALUD E HIGIENE</button></li>
                                                <li><button>PLAN ANUAL DE SEGURIDAD</button></li>
                                                <li><button>PLAN INTEGRADO DE RESPUESTA</button></li>
                                                <li><button>PLAN PARA LA VIGILANCIA</button></li>
                                                <ul>
                                        </div>
                                        <div class="proced_y_protocolo_3_1">
                                            <ul>
                                                <li><button>02. DESARROLLO DEL PROGRAMA</button></li>
                                                <li><button>03. ELABORACIÓN DE PLANES</button></li>
                                                <li><button>04. DESAHILITACIÓN DE SCI</button></li>
                                                <li><button>05. AUTORIZACIÓN DE PROFESIO</button></li>
                                                <li><button>11. CONTROL DE ALCOHOL Y</button></li>
                                                <li><button>13. LINEAMIENTOS PARA LA</button></li>
                                                <ul>
                                        </div>
                                        <div class="proced_y_protocolo_3_2">
                                            <ul>
                                                <li><button>01. CONTROL DE INGRESO DE MER</button></li>
                                                <li><button>02. AISLAMIENTO SOCIAL DENTRO</button></li>
                                                <li><button>03. ATENCIÓN, AISLAMIENTO Y</button></li>
                                                <li><button>04. PROMOCIÓN DE LA SALUD</button></li>
                                                <li><button>05. MEDIDAS PREVENTIVAS PARA</button></li>
                                                <li><button>07. MOVILIZACION Y DESMOVILIZACIÓN</button></li>
                                                <ul>
                                        </div>
                                        <div class="instructivo_3">
                                            <ul>
                                                <li><button>02. PRUEBA DE ALCOTEST</button></li>
                                                <li><button>03. CRITERIO PARA LA</button></li>
                                                <li><button>04. CRITERIO PARA LA CLASIFICACIÓN</button></li>
                                                <li><button>05. MÉTODO DE ANALISIS DE CAUSA</button></li>
                                                <li><button>06. NOTIFICACIÓN A LA AUTORIDAD</button></li>
                                                <li><button>07.CONSIDERACIÓNES IPERC</button></li>
                                                <li><button>08. LISTA DE PELIGROS Y RIESGOS</button></li>
                                                <li><button>09. LMP AGENTES SSO</button></li>

                                                <ul>
                                        </div>
                                    </div>
                                    <div class="section_5_home col-md-3" style="display:none">
                                        contenido
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane active" id="SeguridadHistorialRegistro">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="SearchSeguridadHistorialRegistro">
                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="1" type="text" class="form-control"
                                                    placeholder="Buscar por tipo" />
                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="2" type="text" class="form-control"
                                                    placeholder="Buscar por área" />

                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="3" type="text" class="form-control"
                                                    placeholder="Buscar por tema" />

                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="4" type="text" class="form-control"
                                                    placeholder="Buscar por fecha" />


                                            </div>
                                        </div>
                                        <div class="box-primary" style="width:100%">
                                            <div class="box-header no-padding">
                                                <div class="box-body table-responsive no-padding">
                                                    <table style="width:100%"
                                                        class="datatable table table-striped table-bordered"
                                                        id="grd01Datos">
                                                        <thead>
                                                            <tr>
                                                                <th>ITEM</th>
                                                                <th>TIPO DE REGISTRO</th>
                                                                <th>ÁREA</th>
                                                                <th>TEMA</th>
                                                                <th>FECHA</th>
                                                                <th>Nº ASISTENTES</th>
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
                        </div>
                        <div class="tab-pane" id="SeguridadNuevoRegistro">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">

                                            <div class="input-group">

                                                <span class="input-group-addon" title="Tema"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Tema</span>
                                                <input id="txt_tema" type="text" class="form-control" value=""
                                                    name="tema" />
                                                <span class="input-group-addon" title="Prioridad"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 81px;">Tipo
                                                    de Registro</span>
                                                <select id="seguridad_tipo_registro_select"
                                                    class="form-control selectpicker">
                                                    <option value="-1">Selecciona...</option>
                                                </select>
                                                <span class="input-group-addon" title="Prioridad"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 81px;">Organizado
                                                    por:</span>
                                                <select id="seguridad_area_select" class="form-control selectpicker">
                                                    <option value="-1">Selecciona...</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group" style="margin-bottom:5px;">
                                            <span class="input-group-addon" title="Expositor"
                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Expositor</span>
                                            <div style="display:flex">
                                                <input id="txt_search_expositor" type="text" class="form-control"
                                                    placeholder="Ingrese DNI" value="" />
                                                <input type="hidden" id="idExpositorHidden" name="" value="">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                    <button class="fa fa-search" type="button" aria-hidden="true"
                                                        onclick="searchFuncionForNameAndSurname('txt_search_expositor','02_search_Expositor',[
                                                                'idExpositorHidden',
                                                                'txt_expositor_name',
                                                                'txt_expositor_surname',
                                                            ]);"></button></span>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Nombre
                                                    Expositor</span>
                                                <input id="txt_expositor_name" type="text" class="form-control"
                                                    placeholder="..." value="" disabled />
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                    Apellido Expositor</span>
                                                <input id="txt_expositor_surname" type="text" class="form-control"
                                                    placeholder="..." value="" disabled />
                                            </div>
                                        </div>

                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA</span>
                                                <input id="txt_fecha_capacitaciones" type="text" class="form-control"
                                                    style="width:115px;" value="12-12-21" />
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">HORA
                                                    INICIO</span>
                                                <input id="txt_hora_inicio" type="text" class="form-control"
                                                    placeholder="..." value="" data-clocklet />
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">HORA
                                                    FINAL</span>
                                                <input id="txt_hora_final" type="text" class="form-control"
                                                    placeholder="..." value="" data-clocklet />
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TOTAL
                                                    HORAS</span>
                                                <input id="txt_hora_total" type="text" class="form-control"
                                                    placeholder="..." value="" disabled />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">OBJETIVOS</span>
                                                <input id="txt_objetivos" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">EMPRESA
                                                    EXPOSITOR</span>
                                                <input id="txt_empresa_expositor" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>

                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">MATERIALES
                                                    USADOS:</span>
                                                <input id="txt_materiales" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">LUGAR
                                                    DE CAPACITACIÓN:</span>
                                                <input id="txt_lugar" type="text" class="form-control" placeholder="..."
                                                    value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;" id="">
                                            <div style="display:flex;">
                                                <span class="input-group-addon text-xl" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold; width:200px">AGREGAR
                                                    PARTICIPANTES</span>
                                                <div style="display:flex">
                                                    <input id="txt_search_participante_capacitacion_search" type="text"
                                                        class="form-control" placeholder="Buscar por codigo" value="" />
                                                    <input type="hidden" id="txt_id_participante_capacitacion_id"
                                                        name="" value="">
                                                    <span class="input-group-addon text-xl" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 30px;">
                                                        <button type="button" class="fa fa-search" aria-hidden="true"
                                                            onclick="searchFuncionForNameAndSurnameCapacitacion('txt_search_participante_capacitacion_search','02_search_participante_capacitacion',[
                                                                'txt_id_participante_capacitacion_id'
                                                            ],'grid_capacitacion_add_participante','capacitacionaddparticipantes');"></button></span>
                                                </div>
                                            </div>
                                            <div class="box-primary" style="width:100%">
                                                <div class="box-header no-padding">
                                                    <div class="box-body table-responsive no-padding">
                                                        <table style="width:100%"
                                                            class="datatable table table-striped table-bordered"
                                                            id="grid_capacitacion_add_participante">
                                                            <thead>
                                                                <th>Id</th>
                                                                <th>Nombre</th>
                                                                <th>Apellido</th>
                                                                <th>Cargo</th>
                                                                <th>DNI</th>
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
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">OBSERVACIONES</span>
                                                <button class="bg-cyan-500 py-4 px-4 text-white" type="button"
                                                    onclick="addObservacionesCapacitaciones();"><i
                                                        class="fa fa-plus-circle "></i></button>
                                            </div>
                                        </div>
                                        <div class="box-primary">
                                            <div class="box-header no-padding">
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="datatable table table-striped table-bordered"
                                                        id="table_observaciones_capacitaciones">
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
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ACUERDOS
                                                    Y COMPROMISOS</span>
                                                <button class="bg-cyan-500 py-4 px-4 text-white" type="button"
                                                    onclick="addAcuerdosCompromisosCapacitaciones();"><i
                                                        class="fa fa-plus-circle "></i></button>
                                            </div>
                                        </div>
                                        <div class="box-primary">
                                            <div class="box-header no-padding">
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="datatable table table-striped table-bordered"
                                                        id="table_Acuerdos_Compromisos_Capacitaciones">
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
                                            onclick="insert_capacitacion();">Guardar</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="SeguridadHistorial">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="SearchGroupFatigaSomnolencia">
                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="1" type="text" class="form-control"
                                                    placeholder="Buscar por Nombre Operador" />
                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="2" type="text" class="form-control"
                                                    placeholder="Buscar por Nombre Evaluador" />

                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="3" type="text" class="form-control"
                                                    placeholder="Buscar por Fecha" />
                                            </div>
                                        </div>
                                        <div class="box-primary">
                                            <div class="box-header no-padding">
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="datatable table table-striped table-bordered"
                                                        id="grd03DatosHistorialFatigaSomnolencia" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>ITEM</th>
                                                                <th>NOMBRES OPERADOR</th>
                                                                <th>NOMBRES DEL EVALUADOR</th>
                                                                <th>FECHA</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="SeguridadNuevoControl">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div style="display:flex;gap:1rem">
                                                <div style="flex:1">
                                                    <span class="input-group-addon" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;">Evaluador</span>
                                                    <div style="display:flex">
                                                        <input id="txt_search_evaluador" type="text"
                                                            class="form-control" placeholder="Ingrese DNI" value="" />
                                                        <input type="hidden" id="idEvaluadorHidden" name="" value="">
                                                        <span class="input-group-addon" title="Expositor"
                                                            style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                            <button class="fa fa-search" aria-hidden="true"
                                                                type="button" onclick="searchFuncionForNameAndSurnameTemplate('txt_search_evaluador','02_search_Evaluador',[
                                                                'idEvaluadorHidden',
                                                                'txt_view_evaluador',
                                                                'txt_evaluador_surname',
                                                            ]);"></button></span>
                                                    </div>
                                                    <input id="txt_view_evaluador" type="text" class="form-control"
                                                        value="" disabled />

                                                </div>
                                                <div style="flex:1">
                                                    <span class="input-group-addon" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Operador</span>
                                                    <div style="display:flex">
                                                        <input id="txt_search_operador" type="text" class="form-control"
                                                            placeholder="Ingrese DNI" value="" />
                                                        <input type="hidden" id="idOperadorHidden" name="" value="">
                                                        <span class="input-group-addon" title="Expositor"
                                                            style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                            <button class="fa fa-search" aria-hidden="true"
                                                                type="button" onclick="searchFuncionForNameAndSurnameTemplate('txt_search_operador','02_search_Operador',[
                                                                'idOperadorHidden',
                                                                'txt_view_operador',
                                                                'txt_operador_surname',
                                                            ]);"></button></span>
                                                    </div>
                                                    <input id="txt_view_operador" type="text" class="form-control"
                                                        value="" disabled />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Proyecto/Operacion</span>
                                                <input id="txt01_proyecto_somnolencia" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA</span>
                                                <input id="txt_fecha_control" type="date" class="form-control"
                                                    style="width:115px;" value="12-12-21" />

                                            </div>
                                        </div>
                                        <div class="box-primary">
                                            <div class="box-header no-padding">
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="datatable table table-striped table-bordered"
                                                        id="grd04Datos">
                                                        <thead>
                                                            <tr>
                                                                <th>N</th>
                                                                <th>Evidencias notables en el operador</th>
                                                                <th>SI</th>
                                                                <th>NO</th>
                                                                <th>Observaciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>Ojos rojos</td>
                                                                <td><input class="form-check-input check_Section_1"
                                                                        type="radio" name="P_1" id="1"> </td>
                                                                <td><input class="form-check-input check_Section_1"
                                                                        type="radio" name="P_1" id="0"></td>
                                                                <td><input type='text'
                                                                        class='form-control input_section_1'
                                                                        id="P_1_obs" /></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">2</th>
                                                                <td>Movimientos más lentos</td>
                                                                <td><input class="form-check-input check_Section_1"
                                                                        type="radio" name="P_2" id="1"> </td>
                                                                <td><input class="form-check-input check_Section_1"
                                                                        type="radio" name="P_2" id="0"></td>
                                                                <td><input type='text'
                                                                        class='form-control input_section_1 '
                                                                        id="P_2_obs" /></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">3</th>
                                                                <td>Dificultades para coordinar movimientos</td>
                                                                <td><input class="form-check-input check_Section_1"
                                                                        type="radio" name="P_3" id="1"> </td>
                                                                <td><input class="form-check-input check_Section_1"
                                                                        type="radio" name="P_3" id="0"></td>
                                                                <td><input type='text'
                                                                        class='form-control input_section_1'
                                                                        id="P_3_obs" /></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">4</th>
                                                                <td>Tiempo de respuesta más lento de lo normal (ej.
                                                                    Contacto por radio)</td>
                                                                <td><input class="form-check-input check_Section_1"
                                                                        type="radio" name="P_4" id="1"> </td>
                                                                <td><input class="form-check-input check_Section_1"
                                                                        type="radio" name="P_4" id="0"></td>
                                                                <td><input type='text'
                                                                        class='form-control input_section_1'
                                                                        id="P_4_obs" /></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">5</th>
                                                                <td>Dificultades de atención y/o concentración</td>
                                                                <td><input class="form-check-input check_Section_1"
                                                                        type="radio" name="P_5" id="1"> </td>
                                                                <td><input class="form-check-input check_Section_1"
                                                                        type="radio" name="P_5" id="0"></td>
                                                                <td><input type='text'
                                                                        class='form-control input_section_1'
                                                                        id="P_5_obs" /></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">6</th>
                                                                <td>Tareas sin finalizar</td>
                                                                <td><input class="form-check-input check_Section_1"
                                                                        type="radio" name="P_6" id="1"> </td>
                                                                <td><input class="form-check-input check_Section_1"
                                                                        type="radio" name="P_6" id="0"></td>
                                                                <td><input type='text'
                                                                        class='form-control input_section_1'
                                                                        id="P_6_obs" /></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">7</th>
                                                                <td>Pérdida de memoria a corto plazo (olvida
                                                                    instrucciones)</td>
                                                                <td><input class="form-check-input check_Section_1"
                                                                        type="radio" name="P_7" id="1"> </td>
                                                                <td><input class="form-check-input check_Section_1"
                                                                        type="radio" name="P_7" id="0"></td>
                                                                <td><input type='text'
                                                                        class='form-control input_section_1'
                                                                        id="P_7_obs" /></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">8</th>
                                                                <td>Cabeceos</td>
                                                                <td><input class="form-check-input check_Section_1"
                                                                        type="radio" name="P_8" id="1"> </td>
                                                                <td><input class="form-check-input check_Section_1"
                                                                        type="radio" name="P_8" id="0"></td>
                                                                <td><input type='text'
                                                                        class='form-control input_section_1'
                                                                        id="P_8_obs" /></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">9</th>
                                                                <td>Tiene antecedentes de incidentes o accidentes a
                                                                    causa de somnolencia o fatiga</td>
                                                                <td><input class="form-check-input check_Section_1"
                                                                        type="radio" name="P_9" id="1"> </td>
                                                                <td><input class="form-check-input check_Section_1"
                                                                        type="radio" name="P_9" id="0"></td>
                                                                <td><input type='text'
                                                                        class='form-control input_section_1'
                                                                        id="P_9_obs" /></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">10</th>
                                                                <td>Irritabilidad o enojos infundados</td>
                                                                <td><input class="form-check-input check_Section_1"
                                                                        type="radio" name="P_10" id="1"> </td>
                                                                <td><input class="form-check-input check_Section_1"
                                                                        type="radio" name="P_10" id=" "></td>
                                                                <td><input type='text'
                                                                        class='form-control input_section_1'
                                                                        id="P_10_obs" /></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:20px;margin-top:20px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Horas
                                                    transcurridas desde su ultimo sueño</span>
                                                <input id="txt01_horas_ultimo_sue" type="number" class="form-control"
                                                    placeholder="..." value="" />
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Cuantas
                                                    horas durmió antes del turno</span>
                                                <input id="txt01_horas_durmio" type="number" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="box-primary">
                                            <div class="box-header no-padding">
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="datatable table table-striped table-bordered"
                                                        id="grd05Datos">
                                                        <thead>
                                                            <tr>
                                                                <th>N</th>
                                                                <th>Indicar observaciones si corresponde</th>
                                                                <th>SI</th>
                                                                <th>NO</th>
                                                                <th>Observaciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>¿Viaja mas de 2 horas para llegar a faena?</td>
                                                                <td><input class="form-check-input check_Section_2"
                                                                        type="radio" name="T_1" id="1"> </td>
                                                                <td><input class="form-check-input check_Section_2"
                                                                        type="radio" name="T_1" id="0"></td>
                                                                <td><input type='text'
                                                                        class='form-control input_section_2'
                                                                        id="T_1_obs" /></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">2</th>
                                                                <td>¿Siente párpados pesados?</td>
                                                                <td><input class="form-check-input check_Section_2"
                                                                        type="radio" name="T_2" id="1"> </td>
                                                                <td><input class="form-check-input check_Section_2"
                                                                        type="radio" name="T_2" id="0"></td>
                                                                <td><input type='text'
                                                                        class='form-control input_section_2'
                                                                        id="T_2_obs" /></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">3</th>
                                                                <td>Ha bebido algun liquido y/o consumido alguna comida
                                                                    durante su turno?</td>
                                                                <td><input class="form-check-input check_Section_2"
                                                                        type="radio" name="T_3" id="1"> </td>
                                                                <td><input class="form-check-input check_Section_2"
                                                                        type="radio" name="T_3" id="0"></td>
                                                                <td><input type='text'
                                                                        class='form-control input_section_2'
                                                                        id="T_3_obs" /></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">4</th>
                                                                <td>Ha ingerido algun fármaco que pueda provocar la
                                                                    disminución de sus reflejos? Ej. Antialérgicos,
                                                                    relajantes musculares, antidepresivos, etc.
                                                                </td>
                                                                <td><input class="form-check-input check_Section_2"
                                                                        type="radio" name="T_4" id="1"> </td>
                                                                <td><input class="form-check-input check_Section_2"
                                                                        type="radio" name="T_4" id="0"></td>
                                                                <td><input type='text'
                                                                        class='form-control input_section_2'
                                                                        id="T_4_obs" /></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">5</th>
                                                                <td>¿Bosteza de forma contínua?</td>
                                                                <td><input class="form-check-input check_Section_2"
                                                                        type="radio" name="T_5" id="1"> </td>
                                                                <td><input class="form-check-input check_Section_2"
                                                                        type="radio" name="T_5" id="0"></td>
                                                                <td><input type='text'
                                                                        class='form-control input_section_2'
                                                                        id="T_5_obs" /></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">6</th>
                                                                <td>¿Presenta dolores de cabeza?</td>
                                                                <td><input class="form-check-input check_Section_2"
                                                                        type="radio" name="T_6" id="1"> </td>
                                                                <td><input class="form-check-input check_Section_2"
                                                                        type="radio" name="T_6" id="0"></td>
                                                                <td><input type='text'
                                                                        class='form-control input_section_2'
                                                                        id="T_6_obs" /></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">7</th>
                                                                <td>¿Siente cansancio físico?</td>
                                                                <td><input class="form-check-input check_Section_2"
                                                                        type="radio" name="T_7" id="1"> </td>
                                                                <td><input class="form-check-input check_Section_2"
                                                                        type="radio" name="T_7" id="0"></td>
                                                                <td><input type='text'
                                                                        class='form-control input_section_2'
                                                                        id="T_7_obs" /></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">8</th>
                                                                <td>¿Requiere descansar mas tiempo?</td>
                                                                <td><input class="form-check-input check_Section_2"
                                                                        type="radio" name="T_8" id="1"> </td>
                                                                <td><input class="form-check-input check_Section_2"
                                                                        type="radio" name="T_8" id="0"></td>
                                                                <td><input type='text'
                                                                        class='form-control input_section_2'
                                                                        id="T_8_obs" /></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">9</th>
                                                                <td>Le resulta dificil concentrarse</td>
                                                                <td><input class="form-check-input check_Section_2"
                                                                        type="radio" name="T_9" id="1"> </td>
                                                                <td><input class="form-check-input check_Section_2"
                                                                        type="radio" name="T_9" id="0"></td>
                                                                <td><input type='text'
                                                                        class='form-control input_section_2'
                                                                        id="T_9_obs" /></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">10</th>
                                                                <td>Su periodo de descanso fue satisfactorio? (Si es
                                                                    "No" no puede iniciar ruta)</td>
                                                                <td><input class="form-check-input check_Section_2"
                                                                        type="radio" name="T_10" id="1"> </td>
                                                                <td><input class="form-check-input check_Section_2"
                                                                        type="radio" name="T_10" id="0"></td>
                                                                <td><input type='text'
                                                                        class='form-control input_section_2'
                                                                        id="T_10_obs" /></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="input-group-addon" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CONCLUSION</span>
                                                    <input id="txt01_control_somnolencia_conclusion" type="text"
                                                        class="form-control" placeholder="..." value="" />
                                                </div>
                                                <!--     <div class="col-md-4">
                                                    <span class="input-group-addon" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FIRMA
                                                        DEL OPERADOR / CONDUCTOR</span>
                                                    <input id="txt01_control_somnolencia_firma_operador" type="text"
                                                        class="form-control" placeholder="Ingresa Código de Firma"
                                                        value="" />
                                                </div>
                                                <div class="col-md-4">
                                                    <span class="input-group-addon" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FIRMA
                                                        DEL EVALUADOR</span>
                                                    <input id="txt01_control_somnolencia_firma_evaluador" type="text"
                                                        class="form-control" placeholder="Ingresa Código de Firma"
                                                        value="" />
                                                </div>-->
                                            </div>

                                        </div>

                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                        <button type="button" class="bg-emerald-500 py-4 px-4 text-white"
                                            onclick="insert_control();">Guardar</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="SeguridadHistorialCamio_Cisterna">
                            <div class="row">
                                <div class="col-md-12" id="">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="SearchCheckListHistorialGroup">
                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="1" type="text" class="form-control"
                                                    placeholder="Buscar por nombres" />
                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="2" type="text" class="form-control"
                                                    placeholder="Buscar por fecha" />

                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="3" type="text" class="form-control"
                                                    placeholder="Buscar por actividad" />

                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="4" type="text" class="form-control"
                                                    placeholder="Buscar por tipo" />


                                            </div>
                                        </div>
                                        <div class="box-primary" style="width:100%">
                                            <div class="box-header no-padding">
                                                <div class="box-body table-responsive no-padding">
                                                    <table style="width:100%"
                                                        class="datatable table table-striped table-bordered"
                                                        id="grd01checkListHistorial">
                                                        <thead>
                                                            <tr>
                                                                <th>ITEM</th>
                                                                <th>CONDUCTOR</th>
                                                                <th>FECHA</th>
                                                                <th>ACTIVIDAD</th>
                                                                <!--<th>TIPO</th>-->
                                                                <th>OPE</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="SeguridadCamioneta">
                            <div class="row">

                                <div class="col-md-12" id="">
                                    <div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div style="display:flex;">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold; width:200px">Conductor</span>
                                                <div style="display:flex">
                                                    <input id="txt_search_camioneta_conductor" type="text"
                                                        class="form-control" placeholder="Ingrese DNI" value="" />
                                                    <span class="input-group-addon" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                        <button class="fa fa-search" type="button" onclick="searchFuncionForNameAndSurname('txt_search_camioneta_conductor','02_search_conductor_camioneta',[
                                                                'txt01_camioneta_conductor_id',
                                                                'txt01_camioneta_nombres_conductor',
                                                                'txt01_camioneta_apellidos_conductor',
                                                            ]);"></button></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES</span>
                                                <input id="txt01_camioneta_conductor_id" name="prodId" type="hidden"
                                                    value="">
                                                <input id="txt01_camioneta_nombres_conductor" type="text"
                                                    class="form-control" placeholder="..." value="" disabled />
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">APELLIDOS</span>
                                                <input id="txt01_camioneta_apellidos_conductor" type="text"
                                                    class="form-control" placeholder="..." value="" disabled />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA</span>
                                                <input id="txt01_camioneta_fecha" type="date" class="form-control"
                                                    placeholder="..." value="" />
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">HORA
                                                    DE INSPECCION</span>
                                                <input id="txt01_camioneta_hora" type="text" class="form-control"
                                                    placeholder="..." value="" data-clocklet />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PLACA</span>
                                                <input id="seguridad_placa_camioneta" type="text" class="form-control"
                                                    placeholder="..." value="" />

                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">KM
                                                    INICIAL</span>
                                                <input id="txt01_camioneta_km_inicial" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">KM
                                                    FINAL</span>
                                                <input id="txt01_camioneta_km_final" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:20px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ACTIVIDAD
                                                    / DESTINO</span>
                                                <input id="txt01_camioneta_km_actividad" type="text"
                                                    class="form-control" placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="box-primary">
                                            <div class="box-header no-padding">
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="table table-striped table-bordered"
                                                        id="declaracion_jurada_camioneta">
                                                        <thead>
                                                            <tr>
                                                                <th>N</th>
                                                                <th>DECLARACIÓN JURADA DEL CONDUCTOR</th>
                                                                <th>SI</th>
                                                                <th>NO</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>He descansado lo suficiente y me encuentro en
                                                                    condiciones de concluir</td>
                                                                <td><input
                                                                        class="form-check-input checkList_declaracion_jurada"
                                                                        type="radio" name="CK_L_DJ_P_1" id="1"> </td>
                                                                <td><input
                                                                        class="form-check-input checkList_declaracion_jurada"
                                                                        type="radio" name="CK_L_DJ_P_1" id="0"></td>

                                                            </tr>
                                                            <tr>
                                                                <th scope="row">2</th>
                                                                <td>Me siento en buenas condiciones fisicas y no tengo
                                                                    ninguna dolencia o enfermedad que me impida conducir
                                                                    en forma segura</td>
                                                                <td><input
                                                                        class="form-check-input checkList_declaracion_jurada"
                                                                        type="radio" name="CK_L_DJ_P_2" id="1"> </td>
                                                                <td><input
                                                                        class="form-check-input checkList_declaracion_jurada"
                                                                        type="radio" name="CK_L_DJ_P_2" id="0"></td>

                                                            </tr>
                                                            <tr>
                                                                <th scope="row">3</th>
                                                                <td>Estoy tomando medicamentos recetados por un médico
                                                                    quien me ha asegurado que no son impedimento para
                                                                    conducir de forma segura</td>
                                                                <td><input
                                                                        class="form-check-input checkList_declaracion_jurada"
                                                                        type="radio" name="CK_L_DJ_P_3" id="1"> </td>
                                                                <td><input
                                                                        class="form-check-input checkList_declaracion_jurada"
                                                                        type="radio" name="CK_L_DJ_P_3" id="0"></td>

                                                            </tr>
                                                            <tr>
                                                                <th scope="row">4</th>
                                                                <td>Me encuentro emocional y personalmente en buenas
                                                                    condiciones para poder concentrarme en la conducción
                                                                    segura del vehiculo</td>
                                                                <td><input
                                                                        class="form-check-input checkList_declaracion_jurada"
                                                                        type="radio" name="CK_L_DJ_P_4" id="1"> </td>
                                                                <td><input
                                                                        class="form-check-input checkList_declaracion_jurada"
                                                                        type="radio" name="CK_L_DJ_P_4" id="0"></td>

                                                            </tr>
                                                            <tr>
                                                                <th scope="row">5</th>
                                                                <td>Estoy consciente de la responsabilidad que significa
                                                                    conducir este vehiculo, sin poner en riesgo mi
                                                                    integridad, la demis compñeros ni el patrimonio de
                                                                    la empresa.</td>
                                                                <td><input
                                                                        class="form-check-input checkList_declaracion_jurada"
                                                                        type="radio" name="CK_L_DJ_P_5" id="1"> </td>
                                                                <td><input
                                                                        class="form-check-input checkList_declaracion_jurada"
                                                                        type="radio" name="CK_L_DJ_P_5" id="0"></td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-primary">
                                            <div class="box-header no-padding">
                                                <div class="box-body">
                                                    <!--Grid column-->
                                                    <div class="col-md-3 mb-4 ">

                                                        <ul class="nav nav-tabs d-flex flex-column">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="headerpanel11"
                                                                    data-toggle="tab" href="#panel11"
                                                                    role="tab">Luces</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="headerpanel12" data-toggle="tab"
                                                                    href="#panel12" role="tab">Documentos</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" id="headerpanel13"
                                                                    href="#panel13" role="tab">General</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" id="headerpanel14"
                                                                    href="#panel14" role="tab">Neumaticos</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" id="headerpanel15"
                                                                    href="#panel15" role="tab">Motor</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" id="headerpanel16"
                                                                    href="#panel16" role="tab">Seguridad</a>
                                                            </li>
                                                        </ul>

                                                    </div>

                                                    <div class="col-md-9 mb-4">

                                                        <div class="tab-content pt-0">

                                                            <div class="tab-pane fade active in" role="tabpanel"
                                                                id="panel11">
                                                                <table class="table table-striped table-bordered"
                                                                    id="camioneta_luces">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>N</th>
                                                                            <th>LUCES</th>
                                                                            <th>SI</th>
                                                                            <th>NO</th>
                                                                            <th>N / A</th>
                                                                            <th>Observaciones</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">1</th>
                                                                            <td>Luces de retroceso</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_luces"
                                                                                    type="radio" name="CK_L_L_P_1"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_luces"
                                                                                    type="radio" name="CK_L_L_P_1"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_luces"
                                                                                    type="radio" name="CK_L_L_P_1"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_luces_camioneta'
                                                                                    id="LC_1_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">2</th>
                                                                            <td>Luces de parqueo</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_luces"
                                                                                    type="radio" name="CK_L_L_P_2"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_luces"
                                                                                    type="radio" name="CK_L_L_P_2"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_luces"
                                                                                    type="radio" name="CK_L_L_P_2"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_luces_camioneta'
                                                                                    id="LC_2_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">3</th>
                                                                            <td>Indicadores de tablero</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_luces"
                                                                                    type="radio" name="CK_L_L_P_4"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_luces"
                                                                                    type="radio" name="CK_L_L_P_4"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_luces"
                                                                                    type="radio" name="CK_L_L_P_4"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_luces_camioneta'
                                                                                    id="LC_3_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">4</th>
                                                                            <td>Circulina (ambar) / Baliza
                                                                                estroboscópica</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_luces"
                                                                                    type="radio" name="CK_L_L_P_5"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_luces"
                                                                                    type="radio" name="CK_L_L_P_5"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_luces"
                                                                                    type="radio" name="CK_L_L_P_5"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_luces_camioneta'
                                                                                    id="LC_4_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">5</th>
                                                                            <td>Faros principales / Faros neblineros /
                                                                                Luces pirata</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_luces"
                                                                                    type="radio" name="CK_L_L_P_6"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_luces"
                                                                                    type="radio" name="CK_L_L_P_6"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_luces"
                                                                                    type="radio" name="CK_L_L_P_6"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_luces_camioneta'
                                                                                    id="LC_5_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">6</th>
                                                                            <td>Direccionales (izq. / der.)</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_luces"
                                                                                    type="radio" name="CK_L_L_P_9"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_luces"
                                                                                    type="radio" name="CK_L_L_P_9"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_luces"
                                                                                    type="radio" name="CK_L_L_P_9"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_luces_camioneta'
                                                                                    id="LC_6_obs" /></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="tab-pane fade" id="panel12" role="tabpanel">
                                                                <table class="table table-striped table-bordered"
                                                                    id="camioneta_documentos">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>N</th>
                                                                            <th>DOCUMENTOS</th>
                                                                            <th>SI</th>
                                                                            <th>NO</th>
                                                                            <th>N / A</th>
                                                                            <th>Observaciones</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">1</th>
                                                                            <td>Licencia de conducir</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_documentos"
                                                                                    type="radio" name="CK_L_D_P_1"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_documentos"
                                                                                    type="radio" name="CK_L_D_P_1"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_documentos"
                                                                                    type="radio" name="CK_L_D_P_1"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_documentos_camioneta'
                                                                                    id="DC_1_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">2</th>
                                                                            <td>DNI del conductor</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_documentos"
                                                                                    type="radio" name="CK_L_D_P_2"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_documentos"
                                                                                    type="radio" name="CK_L_D_P_2"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_documentos"
                                                                                    type="radio" name="CK_L_D_P_2"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_documentos_camioneta'
                                                                                    id="DC_2_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">3</th>
                                                                            <td>Tarjeta de Propiedad</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_documentos"
                                                                                    type="radio" name="CK_L_D_P_3"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_documentos"
                                                                                    type="radio" name="CK_L_D_P_3"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_documentos"
                                                                                    type="radio" name="CK_L_D_P_3"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_documentos_camioneta'
                                                                                    id="DC_3_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">4</th>
                                                                            <td>SOAT</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_documentos"
                                                                                    type="radio" name="CK_L_D_P_4"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_documentos"
                                                                                    type="radio" name="CK_L_D_P_4"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_documentos"
                                                                                    type="radio" name="CK_L_D_P_4"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_documentos_camioneta'
                                                                                    id="DC_4_obs" /></td>

                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">5</th>
                                                                            <td>Fotocheck con licencia interna de manejo
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_documentos"
                                                                                    type="radio" name="CK_L_D_P_5"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_documentos"
                                                                                    type="radio" name="CK_L_D_P_5"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_documentos"
                                                                                    type="radio" name="CK_L_D_P_5"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_documentos_camioneta'
                                                                                    id="DC_5_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">6</th>
                                                                            <td>Revision Técnica</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_documentos"
                                                                                    type="radio" name="CK_L_D_P_6"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_documentos"
                                                                                    type="radio" name="CK_L_D_P_6"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_documentos"
                                                                                    type="radio" name="CK_L_D_P_6"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_documentos_camioneta'
                                                                                    id="DC_6_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">7</th>
                                                                            <td>Cartilla de emergencias</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_documentos"
                                                                                    type="radio" name="CK_L_D_P_7"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_documentos"
                                                                                    type="radio" name="CK_L_D_P_7"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_documentos"
                                                                                    type="radio" name="CK_L_D_P_7"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_documentos_camioneta'
                                                                                    id="DC_7_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">8</th>
                                                                            <td>Otros.</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_documentos"
                                                                                    type="radio" name="CK_L_D_P_8"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_documentos"
                                                                                    type="radio" name="CK_L_D_P_8"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_documentos"
                                                                                    type="radio" name="CK_L_D_P_8"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_documentos_camioneta'
                                                                                    id="DC_8_obs" /></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                            <div class="tab-pane fade" id="panel13" role="tabpanel">
                                                                <table class="table table-striped table-bordered"
                                                                    id="camioneta_general">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>N</th>
                                                                            <th>GENERAL</th>
                                                                            <th>SI</th>
                                                                            <th>NO</th>
                                                                            <th>N / A</th>
                                                                            <th>Observaciones</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">1</th>
                                                                            <td>Estado de máscara frontal</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_1" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_1" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_1" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_general_camioneta'
                                                                                    id="GC_1_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">2</th>
                                                                            <td>Espejos retrovisores e interiores</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_2" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_2" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_2" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_general_camioneta'
                                                                                    id="GC_2_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">3</th>
                                                                            <td>Estado de la carroceria</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_3" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_3" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_3" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_general_camioneta'
                                                                                    id="GC_3_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">4</th>
                                                                            <td>Parabrisas y ventanas sin rajaduras</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_4" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_4" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_4" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_general_camioneta'
                                                                                    id="GC_4_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">5</th>
                                                                            <td>Plumillas limpias y lava parabrisas</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_5" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_5" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_5" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_general_camioneta'
                                                                                    id="GC_5_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">6</th>
                                                                            <td>Cinturones de seguridad</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_6" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_6" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_6" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_general_camioneta'
                                                                                    id="GC_6_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">7</th>
                                                                            <td>Seguro de puerta</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_7" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_7" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_7" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_general_camioneta'
                                                                                    id="GC_7_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">8</th>
                                                                            <td>Claxon</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_8" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_8" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_8" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_general_camioneta'
                                                                                    id="GC_8_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">9</th>
                                                                            <td>Espárragos, tuercas (Torque según
                                                                                fabricante), seguro de tuercas</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_9" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_9" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_9" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_general_camioneta'
                                                                                    id="GC_9_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">10</th>
                                                                            <td>Letreros identificatorios</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_10"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_10"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_10"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_general_camioneta'
                                                                                    id="GC_10_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">11</th>
                                                                            <td>Frenos ABS</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_11"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_11"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_11"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_general_camioneta'
                                                                                    id="GC_11_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">12</th>
                                                                            <td>Sistema de comunicación: Radio base y/o
                                                                                teléfono satelital.
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_12"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_12"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_G_12"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_general_camioneta'
                                                                                    id="GC_12_obs" /></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <th scope="row">13</th>
                                                                            <td>Alarma de retroceso</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_L_P_3"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_L_P_3"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_L_P_3"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_general_camioneta'
                                                                                    id="GC_13_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">14</th>
                                                                            <td>Bocina</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_L_P_7"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_L_P_7"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_L_P_7"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_general_camioneta'
                                                                                    id="GC_14_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">15</th>
                                                                            <td>Limpia parabrisas</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_L_P_8"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_L_P_8"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_general"
                                                                                    type="radio" name="CK_L_L_P_8"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_general_camioneta'
                                                                                    id="GC_15_obs" /></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="tab-pane fade" id="panel14" role="tabpanel">
                                                                <table class="table table-striped table-bordered"
                                                                    id="camioneta_neumaticos">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>N</th>
                                                                            <th>NEUMÁTICOS</th>
                                                                            <th>SI</th>
                                                                            <th>NO</th>
                                                                            <th>N / A</th>
                                                                            <th>Observaciones</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">1</th>
                                                                            <td>Presion de Aire</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_neumatico"
                                                                                    type="radio" name="CK_L_N_1" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_neumatico"
                                                                                    type="radio" name="CK_L_N_1" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_neumatico"
                                                                                    type="radio" name="CK_L_N_1" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_neumaticos_camioneta'
                                                                                    id="NC_1_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">2</th>
                                                                            <td>Abultamientos</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_neumatico"
                                                                                    type="radio" name="CK_L_N_2" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_neumatico"
                                                                                    type="radio" name="CK_L_N_2" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_neumatico"
                                                                                    type="radio" name="CK_L_N_2" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_neumaticos_camioneta'
                                                                                    id="NC_2_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">3</th>
                                                                            <td>Cortaduras</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_neumatico"
                                                                                    type="radio" name="CK_L_N_3" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_neumatico"
                                                                                    type="radio" name="CK_L_N_3" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_neumatico"
                                                                                    type="radio" name="CK_L_N_3" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_neumaticos_camioneta'
                                                                                    id="NC_3_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">4</th>
                                                                            <td>Llanta de repuesto</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_neumatico"
                                                                                    type="radio" name="CK_L_N_4" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_neumatico"
                                                                                    type="radio" name="CK_L_N_4" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_neumatico"
                                                                                    type="radio" name="CK_L_N_4" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_neumaticos_camioneta'
                                                                                    id="NC_4_obs" /></td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="tab-pane fade" id="panel15" role="tabpanel">
                                                                <table
                                                                    class="datatable table table-striped table-bordered"
                                                                    id="camioneta_motor">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>N</th>
                                                                            <th>MOTOR</th>
                                                                            <th>SI</th>
                                                                            <th>NO</th>
                                                                            <th>N / A</th>
                                                                            <th>Observaciones</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">1</th>
                                                                            <td>Nivel de aceite</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_motor"
                                                                                    type="radio" name="CK_L_M_1" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_motor"
                                                                                    type="radio" name="CK_L_M_1" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_motor"
                                                                                    type="radio" name="CK_L_M_1" id="0">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_motor_camioneta'
                                                                                    id="MC_1_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">2</th>
                                                                            <td>Nivel de refrigerante</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_motor"
                                                                                    type="radio" name="CK_L_M_2" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_motor"
                                                                                    type="radio" name="CK_L_M_2" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_motor"
                                                                                    type="radio" name="CK_L_M_2" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_motor_camioneta'
                                                                                    id="MC_2_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">3</th>
                                                                            <td>Nivel de liquido de frenos</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_motor"
                                                                                    type="radio" name="CK_L_M_3" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_motor"
                                                                                    type="radio" name="CK_L_M_3" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_motor"
                                                                                    type="radio" name="CK_L_M_3" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_motor_camioneta'
                                                                                    id="MC_3_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">4</th>
                                                                            <td>Nivel de liquido de embriague</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_motor"
                                                                                    type="radio" name="CK_L_M_4" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_motor"
                                                                                    type="radio" name="CK_L_M_4" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_motor"
                                                                                    type="radio" name="CK_L_M_4" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_motor_camioneta'
                                                                                    id="MC_4_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">5</th>
                                                                            <td>Nivel de agua para limpia parabrisas
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_motor"
                                                                                    type="radio" name="CK_L_M_5" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_motor"
                                                                                    type="radio" name="CK_L_M_5" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_motor"
                                                                                    type="radio" name="CK_L_M_5" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_motor_camioneta'
                                                                                    id="MC_5_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">6</th>
                                                                            <td>Fugas hidraulicas</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_motor"
                                                                                    type="radio" name="CK_L_M_6" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_motor"
                                                                                    type="radio" name="CK_L_M_6" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_motor"
                                                                                    type="radio" name="CK_L_M_6" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_motor_camioneta'
                                                                                    id="MC_6_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">7</th>
                                                                            <td>Estado de Fajas</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_motor"
                                                                                    type="radio" name="CK_L_M_7" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_motor"
                                                                                    type="radio" name="CK_L_M_7" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_motor"
                                                                                    type="radio" name="CK_L_M_7" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_motor_camioneta'
                                                                                    id="MC_7_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">8</th>
                                                                            <td>Estado de Radiador</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_motor"
                                                                                    type="radio" name="CK_L_M_8" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_motor"
                                                                                    type="radio" name="CK_L_M_8" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_motor"
                                                                                    type="radio" name="CK_L_M_8" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_motor_camioneta'
                                                                                    id="MC_8_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">9</th>
                                                                            <td>Estado de Bateria</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_motor"
                                                                                    type="radio" name="CK_L_M_9" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_motor"
                                                                                    type="radio" name="CK_L_M_9" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_motor"
                                                                                    type="radio" name="CK_L_M_9" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_motor_camioneta'
                                                                                    id="MC_9_obs" /></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="tab-pane fade" id="panel16" role="tabpanel">
                                                                <table
                                                                    class="datatable table table-striped table-bordered"
                                                                    id="camioneta_seguridad">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>N</th>
                                                                            <th>SEGURIDAD</th>
                                                                            <th>SI</th>
                                                                            <th>NO</th>
                                                                            <th>N / A</th>
                                                                            <th>Observaciones</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">1</th>
                                                                            <td>Barra antivuelco (Interno y Externo)
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_1" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_1" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_1" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_camioneta'
                                                                                    id="SC_1_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">2</th>
                                                                            <td>Kit basico de herramientas</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_2" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_2" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_2" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_camioneta'
                                                                                    id="SC_2_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">3</th>
                                                                            <td>Llave de ruedas tipo cruz</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_3" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_3" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_3" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_camioneta'
                                                                                    id="SC_3_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">4</th>
                                                                            <td>Gata (Doble peso bruto) y sus accesorios
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_4" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_4" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_4" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_camioneta'
                                                                                    id="SC_4_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">5</th>
                                                                            <td>Botiquin</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_5" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_5" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_5" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_camioneta'
                                                                                    id="SC_5_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">6</th>
                                                                            <td>Linterna</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_6" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_6" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_6" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_camioneta'
                                                                                    id="SC_6_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">7</th>
                                                                            <td>Triangulos(2)</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_7" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_7" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_7" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_camioneta'
                                                                                    id="SC_7_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">8</th>
                                                                            <td>Conos de Seguridad (3) con cinta
                                                                                reflectiva</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_8" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_8" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_8" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_camioneta'
                                                                                    id="SC_8_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">9</th>
                                                                            <td>Extintor = Cant.... Capacidad....</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_9" id="1">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_9" id="0">
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_9" id="2">
                                                                            </td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_camioneta'
                                                                                    id="SC_9_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">10</th>
                                                                            <td>Tacos (02)</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_10"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_10"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_10"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_camioneta'
                                                                                    id="SC_10_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">11</th>
                                                                            <td>Pico (01) y Pala (01)</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_11"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_11"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_11"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_camioneta'
                                                                                    id="SC_11_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">12</th>
                                                                            <td>Cable de remolque / Grillere / Eslinga
                                                                                de remolque</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_12"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_12"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_12"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_camioneta'
                                                                                    id="SC_12_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">13</th>
                                                                            <td>Cable para pasar corriente</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_13"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_13"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_13"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_camioneta'
                                                                                    id="SC_13_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">14</th>
                                                                            <td>Gata Hidraulica</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_14"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_14"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_14"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_camioneta'
                                                                                    id="SC_14_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">15</th>
                                                                            <td>Kit antiderrame</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_15"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_15"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_15"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_camioneta'
                                                                                    id="SC_15_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">16</th>
                                                                            <td>Pértiga</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_16"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_16"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_16"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_camioneta'
                                                                                    id="SC_16_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">17</th>
                                                                            <td>Banderolas (2) color rojo</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_17"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_17"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList_category_seguridad"
                                                                                    type="radio" name="CK_L_S_17"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_camioneta'
                                                                                    id="SC_17_obs" /></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="form-group" style="margin-bottom:5px;">
                                                <div class="input-group">
                                                    <span class="input-group-addon" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PASAJEROS</span>
                                                    <button class="bg-cyan-500 py-4 px-4 text-white fa fa-plus-circle"
                                                        type="button" onClick="addPasajerosChecklist();"></button>
                                                </div>
                                            </div>
                                            <div class="box-primary" style="margin-bottom:20px;">
                                                <div class="box-header no-padding">
                                                    <div class="box-body table-responsive no-padding">
                                                        <table class="table table-striped table-bordered"
                                                            id="table_pasajeros_checklist">
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
                                            <div class="form-group" style="margin-bottom:20px;">
                                                <div class="input-group">
                                                    <span class="input-group-addon" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">OBSERVACIONES</span>
                                                    <input id="txt01_camioneta_osbervaciones" type="text"
                                                        class="form-control" placeholder="..." value="" />
                                                </div>
                                            </div>
                                            <div class="btn-group" role="group" aria-label="Basic example"
                                                style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                                <button type="button" class="bg-emerald-500 py-4 px-4 text-white"
                                                    onclick="insert_checklist_camioneta();">Guardar</button>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="SeguridadCisterna">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div style="display:flex;">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold; width:200px">Conductor</span>
                                                <div style="display:flex">
                                                    <input id="txt_search_cisterna_conductor" type="text"
                                                        class="form-control" placeholder="Ingrese DNI" value="" />
                                                    <input id="txt01_conductor_cisterna_id" type="hidden"
                                                        class="form-control" placeholder="" value="" />
                                                    <span class="input-group-addon" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                        <button class="fa fa-search" type="button" onclick="searchFuncionForNameAndSurname('txt_search_cisterna_conductor','02_search_conductor_camioneta',[
                                                                'txt01_conductor_cisterna_id',
                                                                'txt01_conductor_cisterna_nombre',
                                                                'txt01_conductor_cisterna_dni',
                                                            ]);"></button></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRE</span>
                                                <input id="txt01_conductor_cisterna_nombre" type="text"
                                                    class="form-control" placeholder="..." value="" disabled />

                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">APELLIDO</span>
                                                <input id="txt01_conductor_cisterna_dni" type="text"
                                                    class="form-control" placeholder="..." value="" disabled />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CAPACIDAD</span>
                                                <input id="txt01_conductor_cisterna_capacidad" type="text"
                                                    class="form-control" placeholder="..." value="" />
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA</span>
                                                <input id="txt01_conductor_cisterna_fecha" type="date"
                                                    class="form-control" placeholder="..." value="" />
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">HORA</span>
                                                <input id="txt01_conductor_cisterna_hora" type="text"
                                                    class="form-control" placeholder="..." value="" data-clocklet />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PLACA
                                                    DE TRACTO</span>
                                                <input id="txt01_conductor_cisterna_placas" type="text"
                                                    class="form-control" placeholder="..." value="" />
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PLACA
                                                    DE CISTERNA</span>
                                                <input id="txt01_conductor_cisterna_km_tracto" type="number"
                                                    class="form-control" placeholder="..." value="" />
                                                <!--<span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">KM
                                                    CISTERNA</span>
                                                <input id="txt01_conductor_cisterna_km_cisterna" type="number"
                                                    class="form-control" placeholder="..." value="" />-->
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">

                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="height:100%;background:#EEEEEE;font-weight:bold;padding-right: 52px;">ACTIVIDAD</span>
                                                <input id="txt01_conductor_cisterna_actividad" type="text"
                                                    class="form-control" placeholder="..." value=""
                                                    style="height:100%;" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:20px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">KILOMETRAJE
                                                    INICIAL</span>
                                                <input id="txt01_conductor_km_inicial" type="number"
                                                    class="form-control" placeholder="..." value="" />
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">HORA</span>
                                                <input id="txt01_conductor_hora_ini" type="text" class="form-control"
                                                    placeholder="..." value="" data-clocklet />
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">KILOMETRAJE
                                                    FINAL</span>
                                                <input id="txt01_conductor_km_inicial_2" type="number"
                                                    class="form-control" placeholder="..." value="" />
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">HORA</span>
                                                <input id="txt01_conductor_hora_ini_2" type="text" class="form-control"
                                                    placeholder="..." value="" data-clocklet />
                                            </div>


                                        </div>
                                        <div class="box-primary" style="margin-bottom:20px;">
                                            <div class="box-header no-padding">
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="table table-striped table-bordered"
                                                        id="declaracion_jurada_cisterna">
                                                        <thead>
                                                            <tr>
                                                                <th>N</th>
                                                                <th>DECLARACIÓN JURADA DEL CONDUCTOR</th>
                                                                <th>SI</th>
                                                                <th>NO</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>He descansado lo suficiente y me encuentro en
                                                                    condiciones de concluir</td>
                                                                <td><input
                                                                        class="form-check-input checkList2_declaracion_jurada"
                                                                        type="radio" name="CK_L2_DJ_P_1" id="1"> </td>
                                                                <td><input
                                                                        class="form-check-input checkList2_declaracion_jurada"
                                                                        type="radio" name="CK_L2_DJ_P_1" id="0"></td>

                                                            </tr>
                                                            <tr>
                                                                <th scope="row">2</th>
                                                                <td>Me siento en buenas condiciones fisicas y no tengo
                                                                    ninguna dolencia o enfermedad que me impida conducir
                                                                    en forma segura</td>
                                                                <td><input
                                                                        class="form-check-input checkList2_declaracion_jurada"
                                                                        type="radio" name="CK_L2_DJ_P_2" id="1"> </td>
                                                                <td><input
                                                                        class="form-check-input checkList2_declaracion_jurada"
                                                                        type="radio" name="CK_L2_DJ_P_2" id="0"></td>

                                                            </tr>
                                                            <tr>
                                                                <th scope="row">3</th>
                                                                <td>Estoy tomando medicamentos recetados por un médico
                                                                    quien me ha asegurado que no son impedimento para
                                                                    conducir de forma segura</td>
                                                                <td><input
                                                                        class="form-check-input checkList2_declaracion_jurada"
                                                                        type="radio" name="CK_L2_DJ_P_3" id="1"> </td>
                                                                <td><input
                                                                        class="form-check-input checkList2_declaracion_jurada"
                                                                        type="radio" name="CK_L2_DJ_P_3" id="0"></td>

                                                            </tr>
                                                            <tr>
                                                                <th scope="row">4</th>
                                                                <td>Me encuentro emocional y personalmente en buenas
                                                                    condiciones para poder concentrarme en la conducción
                                                                    segura del vehiculo</td>
                                                                <td><input
                                                                        class="form-check-input checkList2_declaracion_jurada"
                                                                        type="radio" name="CK_L2_DJ_P_4" id="1"> </td>
                                                                <td><input
                                                                        class="form-check-input checkList2_declaracion_jurada"
                                                                        type="radio" name="CK_L2_DJ_P_4" id="0"></td>

                                                            </tr>
                                                            <tr>
                                                                <th scope="row">5</th>
                                                                <td>Estoy consciente de la responsabilidad que significa
                                                                    conducir este vehiculo, sin poner en riesgo mi
                                                                    integridad, la demis compñeros ni el patrimonio de
                                                                    la empresa.</td>
                                                                <td><input
                                                                        class="form-check-input checkList2_declaracion_jurada"
                                                                        type="radio" name="CK_L2_DJ_P_5" id="1"> </td>
                                                                <td><input
                                                                        class="form-check-input checkList2_declaracion_jurada"
                                                                        type="radio" name="CK_L2_DJ_P_5" id="0"></td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="box-primary">
                                            <div class="box-header no-padding">
                                                <div class="box-body">
                                                    <!--Grid column-->
                                                    <div class="col-md-3 mb-4 ">

                                                        <ul class="nav md-pills pills-secondary d-flex flex-column">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" data-toggle="tab"
                                                                    href="#panel21" role="tab"
                                                                    id="headerpanel21">Luces</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#panel22"
                                                                    role="tab" id="headerpanel22">Documentos</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#panel23"
                                                                    role="tab" id="headerpanel23">General</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#panel24"
                                                                    role="tab" id="headerpanel24">Neumaticos</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#panel25"
                                                                    role="tab" id="headerpanel25">Motor</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#panel26"
                                                                    role="tab" id="headerpanel26">Seguridad</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#panel27"
                                                                    role="tab" id="headerpanel27">Sistema de recarga y
                                                                    abastecimiento</a>
                                                            </li>
                                                        </ul>

                                                    </div>
                                                    <!--Grid column-->

                                                    <!--Grid column-->
                                                    <div class="col-md-9 mb-4">
                                                        <div class="tab-content pt-0">
                                                            <div class="tab-pane fade active in" id="panel21"
                                                                role="tabpanel">
                                                                <table class="table table-striped table-bordered"
                                                                    id="cisterna_luces_table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>N</th>
                                                                            <th>LUCES</th>
                                                                            <th>SI</th>
                                                                            <th>NO</th>
                                                                            <th>N / A</th>
                                                                            <th>Observaciones</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">1</th>
                                                                            <td>Luces altas</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_1"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_1"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_1"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_luces_cisterna'
                                                                                    id="LCIS_1_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">2</th>
                                                                            <td>Luces bajas</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_2"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_2"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_2"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_luces_cisterna'
                                                                                    id="LCIS_2_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">3</th>
                                                                            <td>Luces laterales</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_3"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_3"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_3"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_luces_cisterna'
                                                                                    id="LCIS_3_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">4</th>
                                                                            <td>Luz de placa</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_4"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_4"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_4"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_luces_cisterna'
                                                                                    id="LCIS_4_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">5</th>
                                                                            <td>Luz de Frenos</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_5"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_5"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_5"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_luces_cisterna'
                                                                                    id="LCIS_5_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">6</th>
                                                                            <td>Luz de emergencia</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_6"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_6"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_6"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_luces_cisterna'
                                                                                    id="LCIS_6_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">7</th>
                                                                            <td>Luz de proceso</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_7"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_7"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_7"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_luces_cisterna'
                                                                                    id="LCIS_7_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">8</th>
                                                                            <td>Luz de parqueo</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_8"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_8"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_8"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_luces_cisterna'
                                                                                    id="LCIS_8_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">9</th>
                                                                            <td>Indicadores del tablero</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_9"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_9"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_9"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_luces_cisterna'
                                                                                    id="LCIS_9_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">10</th>
                                                                            <td>Cicrulina (ambar) / Baliza
                                                                                estroboscopica</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_10"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_10"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_10"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_luces_cisterna'
                                                                                    id="LCIS_10_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">11</th>
                                                                            <td>Faros principales / Faros neblineros /
                                                                                Luces pirata</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_11"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_11"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_11"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_luces_cisterna'
                                                                                    id="LCIS_11_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">12</th>
                                                                            <td>Bocina</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_12"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_12"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_12"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_luces_cisterna'
                                                                                    id="LCIS_12_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">13</th>
                                                                            <td>Limpia parabrisas</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_13"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_13"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_13"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_luces_cisterna'
                                                                                    id="LCIS_13_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">14</th>
                                                                            <td>Direcionales (izq. - der.)</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_14"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_14"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_luces"
                                                                                    type="radio" name="CK_L2_L_14"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_luces_cisterna'
                                                                                    id="LCIS_14_obs" /></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="tab-pane fade" id="panel22" role="tabpanel">
                                                                <table class="table table-striped table-bordered"
                                                                    id="cisterna_documentos_table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>N</th>
                                                                            <th>DOCUMENTOS</th>
                                                                            <th>SI</th>
                                                                            <th>NO</th>
                                                                            <th>N / A</th>
                                                                            <th>Observaciones</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">1</th>
                                                                            <td>Licencia de conducir</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_1"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_1"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_1"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_documentos_cisterna'
                                                                                    id="DCIS_1_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">2</th>
                                                                            <td>Certificados de Cursos de Capacitación
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_2"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_2"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_2"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_documentos_cisterna'
                                                                                    id="DCIS_2_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">3</th>
                                                                            <td>Tarjeta de Propiedad</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_3"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_3"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_3"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_documentos_cisterna'
                                                                                    id="DCIS_3_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">4</th>
                                                                            <td>SOAT</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_4"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_4"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_4"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_documentos_cisterna'
                                                                                    id="DCIS_4_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">5</th>
                                                                            <td>Fotocheck con licencia interna de manejo
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_5"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_5"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_5"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_documentos_cisterna'
                                                                                    id="DCIS_5_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">6</th>
                                                                            <td>Revision Técnica</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_6"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_6"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_6"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_documentos_cisterna'
                                                                                    id="DCIS_6_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">7</th>
                                                                            <td>Cartilla de emergencias</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_7"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_7"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_7"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_documentos_cisterna'
                                                                                    id="DCIS_7_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">8</th>
                                                                            <td>Plan de emergencia</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_9"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_9"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_9"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_documentos_cisterna'
                                                                                    id="DCIS_8_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">9</th>
                                                                            <td>MSDS</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_10"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_10"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_10"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_documentos_cisterna'
                                                                                    id="DCIS_9_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">10</th>
                                                                            <td>Directorio de emergencia</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_11"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_11"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_11"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_documentos_cisterna'
                                                                                    id="DCIS_10_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">11</th>
                                                                            <td>Poliza de seguros y responsabilidad
                                                                                civil</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_12"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_12"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_12"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_documentos_cisterna'
                                                                                    id="DCIS_11_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">12</th>
                                                                            <td>SCTR Pensión y salud</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_13"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_13"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_13"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_documentos_cisterna'
                                                                                    id="DCIS_12_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">13</th>
                                                                            <td>Seguro de vida Ley</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_14"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_14"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_14"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_documentos_cisterna'
                                                                                    id="DCIS_13_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">14</th>
                                                                            <td>Certificado de Aptitud Medica
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_15"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_15"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_15"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_documentos_cisterna'
                                                                                    id="DCIS_14_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">15</th>
                                                                            <td>Tarjeta cubicación vigente</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_16"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_16"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_16"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_documentos_cisterna'
                                                                                    id="DCIS_15_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">16</th>
                                                                            <td>Ficha de registro por OSINERGMING (DGH)
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_17"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_17"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_17"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_documentos_cisterna'
                                                                                    id="DCIS_16_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">17</th>
                                                                            <td>Certificado de hermeticidad del tanque
                                                                                císterna (copia)</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_18"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_18"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_18"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_documentos_cisterna'
                                                                                    id="DCIS_17_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">18</th>
                                                                            <td>Otros.</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_8"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_8"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_documentos"
                                                                                    type="radio" name="CK_L2_D_8"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_documentos_cisterna'
                                                                                    id="DCIS_18_obs" /></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                            <div class="tab-pane fade" id="panel23" role="tabpanel">
                                                                <table class="table table-striped table-bordered"
                                                                    id="cisterna_general_table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>N</th>
                                                                            <th>GENERAL</th>
                                                                            <th>SI</th>
                                                                            <th>NO</th>
                                                                            <th>N / A</th>
                                                                            <th>Observaciones</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">1</th>
                                                                            <td>Estado de máscara frontal</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_1"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_1"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_1"
                                                                                    id="2"></td>                                                                         
                                                                            <td><input type='text'
                                                                                    class='form-control input_general_cisterna'
                                                                                    id="GCIS_1_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">2</th>
                                                                            <td>Espejos retrovisores e interiores</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_2"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_2"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_2"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_general_cisterna'
                                                                                    id="GCIS_2_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">3</th>
                                                                            <td>Estado de la carroceria</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_3"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_3"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_3"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_general_cisterna'
                                                                                    id="GCIS_3_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">4</th>
                                                                            <td>Espejos convexos</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_4"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_4"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_4"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_general_cisterna'
                                                                                    id="GCIS_4_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">5</th>
                                                                            <td>Defensas laterales</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_5"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_5"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_5"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_general_cisterna'
                                                                                    id="GCIS_5_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">6</th>
                                                                            <td>Llave de corte de energia</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_6"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_6"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_6"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_general_cisterna'
                                                                                    id="GCIS_6_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">7</th>
                                                                            <td>Sistema de aire acondicionado y
                                                                                calefacción operativo</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_7"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_7"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_7"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_general_cisterna'
                                                                                    id="GCIS_7_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">8</th>
                                                                            <td>Traba tuercas (12)</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_8"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_8"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_8"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_general_cisterna'
                                                                                    id="GCIS_8_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">9</th>
                                                                            <td>Bandeja pequeña en caja de válvulas de
                                                                                carga / descarga</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_9"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_9"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_9"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_general_cisterna'
                                                                                    id="GCIS_9_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">10</th>
                                                                            <td>Exterior de la cisterna en buen esstado
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_10"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_10"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_10"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_general_cisterna'
                                                                                    id="GCIS_10_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">11</th>
                                                                            <td>Parabrisas y ventanas sin rajaduras</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_11"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_11"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_11"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_general_cisterna'
                                                                                    id="GCIS_11_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">12</th>
                                                                            <td>Plumillas limpia y lava parabrisas</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_12"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_12"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_12"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_general_cisterna'
                                                                                    id="GCIS_12_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">13</th>
                                                                            <td>Seguro de puertas</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_13"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_13"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_general"
                                                                                    type="radio" name="CK_L2_G_13"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_general_cisterna'
                                                                                    id="GCIS_13_obs" /></td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="tab-pane fade" id="panel24" role="tabpanel">
                                                                <table class="table table-striped table-bordered"
                                                                    id="cisterna_neumaticos_table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>N</th>
                                                                            <th>NEUMÁTICOS</th>
                                                                            <th>SI</th>
                                                                            <th>NO</th>
                                                                            <th>N / A</th>
                                                                            <th>Observaciones</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">1</th>
                                                                            <td>Presion de Aire</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_neumaticos"
                                                                                    type="radio" name="CK_L2_N_1"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_neumaticos"
                                                                                    type="radio" name="CK_L2_N_1"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_neumaticos"
                                                                                    type="radio" name="CK_L2_N_1"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_neumaticos_cisterna'
                                                                                    id="NCIS_1_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">2</th>
                                                                            <td>Abultamientos</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_neumaticos"
                                                                                    type="radio" name="CK_L2_N_2"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_neumaticos"
                                                                                    type="radio" name="CK_L2_N_2"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_neumaticos"
                                                                                    type="radio" name="CK_L2_N_2"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_neumaticos_cisterna'
                                                                                    id="NCIS_2_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">3</th>
                                                                            <td>Cortaduras</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_neumaticos"
                                                                                    type="radio" name="CK_L2_N_3"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_neumaticos"
                                                                                    type="radio" name="CK_L2_N_3"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_neumaticos"
                                                                                    type="radio" name="CK_L2_N_3"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_neumaticos_cisterna'
                                                                                    id="NCIS_3_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">4</th>
                                                                            <td>Llanta de repuesto (02)</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_neumaticos"
                                                                                    type="radio" name="CK_L2_N_4"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_neumaticos"
                                                                                    type="radio" name="CK_L2_N_4"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_neumaticos"
                                                                                    type="radio" name="CK_L2_N_4"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_neumaticos_cisterna'
                                                                                    id="NCIS_4_obs" /></td>
                                                                        </tr>
                                                                        <!--<tr>
                                                                            <th scope="row">5</th>
                                                                            <td>Luces bajas </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_neumaticos"
                                                                                    type="radio" name="CK_L2_N_5"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_neumaticos"
                                                                                    type="radio" name="CK_L2_N_5"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_neumaticos"
                                                                                    type="radio" name="CK_L2_N_5"
                                                                                    id="2"></td>
                                                                        </tr>-->
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="tab-pane fade" id="panel25" role="tabpanel">
                                                                <table class="table table-striped table-bordered"
                                                                    id="cisterna_motor_table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>N</th>
                                                                            <th>MOTOR</th>
                                                                            <th>SI</th>
                                                                            <th>NO</th>
                                                                            <th>N / A</th>
                                                                            <th>Observaciones</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">1</th>
                                                                            <td>Nivel de aceite</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_motor"
                                                                                    type="radio" name="CK_L2_M_1"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_motor"
                                                                                    type="radio" name="CK_L2_M_1"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_motor"
                                                                                    type="radio" name="CK_L2_M_1"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_motor_cisterna'
                                                                                    id="MCIS_1_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">2</th>
                                                                            <td>Nivel de refrigerante</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_motor"
                                                                                    type="radio" name="CK_L2_M_2"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_motor"
                                                                                    type="radio" name="CK_L2_M_2"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_motor"
                                                                                    type="radio" name="CK_L2_M_2"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_motor_cisterna'
                                                                                    id="MCIS_2_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">3</th>
                                                                            <td>Nivel de liquido de frenos</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_motor"
                                                                                    type="radio" name="CK_L2_M_3"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_motor"
                                                                                    type="radio" name="CK_L2_M_3"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_motor"
                                                                                    type="radio" name="CK_L2_M_3"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_motor_cisterna'
                                                                                    id="MCIS_3_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">4</th>
                                                                            <td>Nivel de liquido de Embrague</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_motor"
                                                                                    type="radio" name="CK_L2_M_4"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_motor"
                                                                                    type="radio" name="CK_L2_M_4"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_motor"
                                                                                    type="radio" name="CK_L2_M_4"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_motor_cisterna'
                                                                                    id="MCIS_4_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">5</th>
                                                                            <td>Nivel de agua para limpia parabrisas
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_motor"
                                                                                    type="radio" name="CK_L2_M_5"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_motor"
                                                                                    type="radio" name="CK_L2_M_5"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_motor"
                                                                                    type="radio" name="CK_L2_M_5"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_motor_cisterna'
                                                                                    id="MCIS_5_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">6</th>
                                                                            <td>Fugas hidraulicas</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_motor"
                                                                                    type="radio" name="CK_L2_M_6"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_motor"
                                                                                    type="radio" name="CK_L2_M_6"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_motor"
                                                                                    type="radio" name="CK_L2_M_6"
                                                                                    id="2"></td>                                                                         
                                                                            <td><input type='text'
                                                                                    class='form-control input_motor_cisterna'
                                                                                    id="MCIS_6_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">7</th>
                                                                            <td>Estado de Fajas</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_motor"
                                                                                    type="radio" name="CK_L2_M_7"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_motor"
                                                                                    type="radio" name="CK_L2_M_7"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_motor"
                                                                                    type="radio" name="CK_L2_M_7"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_motor_cisterna'
                                                                                    id="MCIS_7_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">8</th>
                                                                            <td>Estado de Radiador</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_motor"
                                                                                    type="radio" name="CK_L2_M_8"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_motor"
                                                                                    type="radio" name="CK_L2_M_8"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_motor"
                                                                                    type="radio" name="CK_L2_M_8"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_motor_cisterna'
                                                                                    id="MCIS_8_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">9</th>
                                                                            <td>Estado de Bateria</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_motor"
                                                                                    type="radio" name="CK_L2_M_9"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_motor"
                                                                                    type="radio" name="CK_L2_M_9"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_motor"
                                                                                    type="radio" name="CK_L2_M_9"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_motor_cisterna'
                                                                                    id="MCIS_9_obs" /></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="tab-pane fade" id="panel26" role="tabpanel">
                                                                <table
                                                                    class="datatable table table-striped table-bordered"
                                                                    id="cisterna_seguridad_table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>N</th>
                                                                            <th>SEGURIDAD</th>
                                                                            <th>SI</th>
                                                                            <th>NO</th>
                                                                            <th>N / A</th>
                                                                            <th>Observaciones</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">1</th>
                                                                            <td>Rombos NFPA</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_1"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_1"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_1"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_1_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">2</th>
                                                                            <td>Números UN</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_2"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_2"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_2"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_2_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">3</th>
                                                                            <td>Rombos DOT (4 lados)</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_3"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_3"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_3"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_3_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">4</th>
                                                                            <td>Cadena de arrastre</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_4"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_4"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_4"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_4_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">5</th>
                                                                            <td>Mata chisps en tubo de escape</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_5"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_5"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_5"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_5_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">6</th>
                                                                            <td>Cinturón de seguridad</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_6"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_6"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_6"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_6_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">7</th>
                                                                            <td>Alarma de retroceso</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_7"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_7"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_7"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_7_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">8</th>
                                                                            <td>Bocina</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_8"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_8"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_8"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_8_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">9</th>
                                                                            <td>EPP completo y en buen estado</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_9"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_9"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_9"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_9_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">10</th>
                                                                            <td>Ropa impermeable</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_10"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_10"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_10"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_10_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">11</th>
                                                                            <td>Extintores Cargados y vigentes</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_11"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_11"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_11"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_11_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">12</th>
                                                                            <td>01 kit de herramientas</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_12"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_12"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_12"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_12_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">13</th>
                                                                            <td>01 kit de antiderrames</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_13"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_13"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_13"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_13_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">14</th>
                                                                            <td>Gata y palanca</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_14"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_14"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_14"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_14_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">15</th>
                                                                            <td>Tacos de madera para gata hidráulica
                                                                                (02)</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_15"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_15"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_15"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_15_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">16</th>
                                                                            <td>Llave de ruedas</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_16"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_16"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_16"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_16_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">17</th>
                                                                            <td>Manguera de aire</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_17"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_17"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_17"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_17_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">18</th>
                                                                            <td>Botiquín</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_18"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_18"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_18"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_18_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">19</th>
                                                                            <td>Linterna</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_19"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_19"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_19"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_19_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">20</th>
                                                                            <td>Triángulos reflectivos (02)</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_20"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_20"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_20"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_20_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">21</th>
                                                                            <td>Conos de seguridad con cinta reflectiva
                                                                                (03)</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_21"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_21"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_21"
                                                                                    id="2"></td>
                                                                          
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_21_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">22</th>
                                                                            <td>Tacos de madera (02)</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_22"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_22"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_22"
                                                                                    id="2"></td>
                                                                     
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_22_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">23</th>
                                                                            <td>Tacos de goma para llantas (02)</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_23"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_23"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_23"
                                                                                    id="2"></td>
                                                                    
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_23_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">24</th>
                                                                            <td>Estrobo (01) cable remolcador de 1'' x
                                                                                5m de largo</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_24"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_24"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_24"
                                                                                    id="2"></td>
                                                                   
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_24_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">25</th>
                                                                            <td>Cables cocdrillo de terminal rojo y
                                                                                verde (02)</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_25"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_25"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_25"
                                                                                    id="2"></td>
                                                                         
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_25_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">26</th>
                                                                            <td>Maletín de parchado</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_26"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_26"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_26"
                                                                                    id="2"></td>
                                                                       
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_26_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">27</th>
                                                                            <td>Lampa y pico</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_27"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_27"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_27"
                                                                                    id="2"></td>
                                                                          
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_27_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">28</th>
                                                                            <td>Equipo de comunicación (Celular o radio
                                                                                de comunicación)</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_28"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_28"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_28"
                                                                                    id="2"></td>
                                                                         
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_28_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">29</th>
                                                                            <td>GPS con señal</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_29"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_29"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_29"
                                                                                    id="2"></td>
                                                                       
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_29_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">30</th>
                                                                            <td>Cámaras HD Operativas</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_30"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_30"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_30"
                                                                                    id="2"></td>
                                                                         
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_30_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">31</th>
                                                                            <td>Tablet copiloto con rutas cargadas</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_31"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_31"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_seguridad"
                                                                                    type="radio" name="CK_L2_S_31"
                                                                                    id="2"></td>
                                                                          
                                                                            <td><input type='text'
                                                                                    class='form-control input_seguridad_cisterna'
                                                                                    id="SCIS_31_obs" /></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="tab-pane fade" id="panel27" role="tabpanel">
                                                                <table class="table table-striped table-bordered"
                                                                    id="cisterna_sistema_recarga_table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>N</th>
                                                                            <th>SISTEMA DE DESCARGA Y ABASTECIMIENTO
                                                                            </th>
                                                                            <th>SI</th>
                                                                            <th>NO</th>
                                                                            <th>N / A</th>
                                                                            <th>Observaciones</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">1</th>
                                                                            <td>Tapas de manhole hermeticamente cerrada
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_sistema_recarga"
                                                                                    type="radio" name="CK_L2_RA_1"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_sistema_recarga"
                                                                                    type="radio" name="CK_L2_RA_1"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_sistema_recarga"
                                                                                    type="radio" name="CK_L2_RA_1"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_descarga_abastecimiento_cisterna'
                                                                                    id="SDACIS_1_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">2</th>
                                                                            <td>Válvulas de fondo (*)</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_sistema_recarga"
                                                                                    type="radio" name="CK_L2_RA_2"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_sistema_recarga"
                                                                                    type="radio" name="CK_L2_RA_2"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_sistema_recarga"
                                                                                    type="radio" name="CK_L2_RA_2"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_descarga_abastecimiento_cisterna'
                                                                                    id="SDACIS_2_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">3</th>
                                                                            <td>Mangueras de descarga en buen estado
                                                                            </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_sistema_recarga"
                                                                                    type="radio" name="CK_L2_RA_3"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_sistema_recarga"
                                                                                    type="radio" name="CK_L2_RA_3"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_sistema_recarga"
                                                                                    type="radio" name="CK_L2_RA_3"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_descarga_abastecimiento_cisterna'
                                                                                    id="SDACIS_3_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">4</th>
                                                                            <td>Puesta a tierra</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_sistema_recarga"
                                                                                    type="radio" name="CK_L2_RA_4"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_sistema_recarga"
                                                                                    type="radio" name="CK_L2_RA_4"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_sistema_recarga"
                                                                                    type="radio" name="CK_L2_RA_4"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_descarga_abastecimiento_cisterna'
                                                                                    id="SDACIS_4_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">5</th>
                                                                            <td>Mangueras de reuperación de gases 4'' x
                                                                                6m incluye tapas y cadenas</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_sistema_recarga"
                                                                                    type="radio" name="CK_L2_RA_5"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_sistema_recarga"
                                                                                    type="radio" name="CK_L2_RA_5"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_sistema_recarga"
                                                                                    type="radio" name="CK_L2_RA_5"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_descarga_abastecimiento_cisterna'
                                                                                    id="SDACIS_5_obs" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">6</th>
                                                                            <td>Codo visor</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_sistema_recarga"
                                                                                    type="radio" name="CK_L2_RA_6"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_sistema_recarga"
                                                                                    type="radio" name="CK_L2_RA_6"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_sistema_recarga"
                                                                                    type="radio" name="CK_L2_RA_6"
                                                                                    id="2"></td>
                                                                            <td><input type='text'
                                                                                    class='form-control input_descarga_abastecimiento_cisterna'
                                                                                    id="SDACIS_6_obs" /></td>
                                                                        </tr>
                                                                        <!--<tr>
                                                                            <th scope="row">7</th>
                                                                            <td>01 acople 4'' pulgadas macho macho</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_sistema_recarga"
                                                                                    type="radio" name="CK_L2_RA_7"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_sistema_recarga"
                                                                                    type="radio" name="CK_L2_RA_7"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_sistema_recarga"
                                                                                    type="radio" name="CK_L2_RA_7"
                                                                                    id="2"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">8</th>
                                                                            <td>Manta polar</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_sistema_recarga"
                                                                                    type="radio" name="CK_L2_RA_8"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_sistema_recarga"
                                                                                    type="radio" name="CK_L2_RA_8"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_sistema_recarga"
                                                                                    type="radio" name="CK_L2_RA_8"
                                                                                    id="2"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">9</th>
                                                                            <td>Frazada</td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_sistema_recarga"
                                                                                    type="radio" name="CK_L2_RA_9"
                                                                                    id="1"> </td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_sistema_recarga"
                                                                                    type="radio" name="CK_L2_RA_9"
                                                                                    id="0"></td>
                                                                            <td><input
                                                                                    class="form-check-input checkList2_sistema_recarga"
                                                                                    type="radio" name="CK_L2_RA_9"
                                                                                    id="2"></td>
                                                                        </tr>-->
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:20px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">OBSERVACIONES</span>
                                                <input id="txt01_camioneta_km_observaciones" type="text"
                                                    class="form-control" placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <!--<div class="form-group" style="margin-bottom:5px;">
                                            <div class="col-md-6" style="padding:0px">
                                                <span class="input-group-addon"
                                                    style="background:#EEEEEE;font-weight:bold;">FIRMA DEL CONDUCTOR
                                                    ESCOLTA</span>
                                                <input id="txt_firma_conductor_citerna" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                            <div class="col-md-6" style="padding:0px">
                                                <span class="input-group-addon"
                                                    style="background:#EEEEEE;font-weight:bold;">FIRMA DEL SUPERVISOR DE
                                                    OPERACIONES</span>
                                                <input id="txt_firma_supervisor_citerna" type="text"
                                                    class="form-control" placeholder="..." value="" />
                                            </div>
                                        </div>-->

                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                        <button type="button" class="bg-emerald-500 py-4 px-4 text-white"
                                            onclick="insert_checklist_cisterna();">Guardar</button>
                                        <!-- <button type="button" class="btn btn-warning">Editar</button>                                             -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="SeguridadCrearPernocte">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div style="display:flex;">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold; width:200px">SUPERVISOR</span>
                                                <div style="display:flex">
                                                    <input id="txt_search_supervisor" type="text" class="form-control"
                                                        placeholder="Ingrese DNI" value="" />
                                                    <input type="hidden" id="txt_uspervisor_search" name="" value="">
                                                    <span class="input-group-addon" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                        <button type="button" class="fa fa-search" aria-hidden="true"
                                                            onclick="searchFuncionForNameAndSurname('txt_search_supervisor','02_search_Supervisor',[
                                                                'txt_uspervisor_search',
                                                                'txt_nombre_supervisor',
                                                                'txt_apellido_supervisor',
                                                            ]);"></button></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES</span>
                                                <input id="txt_nombre_supervisor" type="text" class="form-control"
                                                    placeholder="..." value="" disabled />
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">APELLIDOS</span>
                                                <input id="txt_apellido_supervisor" type="text" class="form-control"
                                                    placeholder="..." value="" disabled />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA
                                                    DE INICIO DE RUTA</span>
                                                <input id="txt_fecha_inicio_ruta" type="date" class="form-control"
                                                    style="width:115px;" />
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PROYECTO
                                                    O RUTA</span>
                                                <input id="txt_proyecto" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA
                                                    DE INICIO DE PERNOCTE</span>
                                                <input id="txt_fecha_inicio_pernocte" type="date" class="form-control"
                                                    style="width:115px;" />
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA
                                                    DE FIN DE PERNOCTE</span>
                                                <input id="txt_fecha_fin_pernocte" type="date" class="form-control"
                                                    style="width:115px;" />
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">LUGAR</span>
                                                <input id="txt_lugar_pernocte" type="text" class="form-control"
                                                    placeholder="..." value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                        <button type="button" class="bg-emerald-500 py-4 px-4 text-white"
                                            onclick="insertPernocte();">Guardar</button>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="SeguridadRegistrarPernocte">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="SearchControlPernocte">
                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="1" type="text" class="form-control"
                                                    placeholder="Buscar Proyecto o Ruta" />
                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="2" type="text" class="form-control"
                                                    placeholder="Buscar por fecha de inicio de Ruta" />

                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="3" type="text" class="form-control"
                                                    placeholder="Buscar por fecha de inicio de Pernocte" />

                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="4" type="text" class="form-control"
                                                    placeholder="Buscar por fecha de fin de Pernocte" />


                                            </div>
                                        </div>
                                        <div class="box-primary">
                                            <div class="box-header no-padding">
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="datatable table table-striped table-bordered"
                                                        id="grd01Pernocte" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>PROYECTO O RUTA</th>
                                                                <th>FECHA DE INICIO DE RUTA</th>
                                                                <th>FECHA DE INICIO DE PERNOCTE</th>
                                                                <th>FECHA DE FIN DE PERNOCTE</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="SectionDeclaracionNoSintoHistorial">
                            <div class="row">
                                <div class="col-md-12" id="">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group" id="SearchButtonSintomatologia">
                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="1" type="text" class="form-control"
                                                    placeholder="Buscar por nombre" />
                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="2" type="text" class="form-control"
                                                    placeholder="Buscar por dni" />

                                                <span class="input-group-addon" title="Buscar"
                                                    style="background:#EEEEEE;font-weight:bold;"><i class="fa fa-search"
                                                        aria-hidden="true"></i></span>
                                                <input id="3" type="text" class="form-control"
                                                    placeholder="Buscar por area" />

                                            </div>
                                        </div>
                                        <div class="box-primary" style="width:100%">
                                            <div class="box-header no-padding">
                                                <div class="box-body table-responsive no-padding">
                                                    <table style="width:100%"
                                                        class="datatable table table-striped table-bordered"
                                                        id="grd01Sintomatologia">
                                                        <thead>
                                                            <tr>
                                                                <th>ITEM</th>
                                                                <th>NOMBRES</th>
                                                                <th>DNI</th>
                                                                <!--<th>AREA</th>-->
                                                                <th>Ope</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="SectionDeclaracionNoSintoRegistro">
                            <div class="row">
                                <div class="col-md-12" id="">
                                    <div class="box box-body">
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div style="display:flex;">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold; width:200px">Operador</span>
                                                <div style="display:flex">
                                                    <input id="txt_search_operador_sintomatologia" type="text"
                                                        class="form-control" placeholder="Ingrese DNI" value="" />
                                                    <input type="hidden" id="txtOperadorSearchSintomatologia" name=""
                                                        value="">
                                                    <span class="input-group-addon" title="Expositor"
                                                        style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">
                                                        <button class="fa fa-search" type="button" aria-hidden="true"
                                                            onclick="searchFuncionForNameAndSurname('txt_search_operador_sintomatologia','02_search_Operador',[
                                                                'txtOperadorSearchSintomatologia',
                                                                'txt_nombre_operador',
                                                                'txt_apellido_operador',
                                                            ]);"></button></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NOMBRES</span>
                                                <input id="txt_nombre_operador" type="text" class="form-control"
                                                    placeholder="..." value="" disabled />
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">APELLIDOS</span>
                                                <input id="txt_apellido_operador" type="text" class="form-control"
                                                    placeholder="..." value="" disabled />
                                            </div>
                                        </div>
                                        <!--<div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ÁREA
                                                    DE TRABAJO</span>
                                                <input id="txt_area_operador" type="text" class="form-control"
                                                    placeholder="..." value="" disabled />
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DNI</span>
                                                <input id="txt_dni_operador" type="text" class="form-control"
                                                    placeholder="..." value="" disabled />
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">DIRECCION</span>
                                                <input id="txt_direccion_operador" type="text" class="form-control"
                                                    placeholder="..." value="" disabled />
                                                <span class="input-group-addon" title="Expositor"
                                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">NUMERO</span>
                                                <input id="txt_numero_operador" type="text" class="form-control"
                                                    placeholder="..." value="" disabled />
                                            </div>
                                        </div>-->
                                        <div class="form-group" style="margin-bottom:5px;">

                                            <span class="input-group-addon" title="Expositor"
                                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Ficha
                                                de sintomatológica COVID-19 para el regreso o reincorporación al
                                                trabajo</span>
                                            <input id="txt01_Descripción" type="text" class="form-control"
                                                placeholder="..."
                                                value="He recibido explicación del objetivo de esta evaluación y me comprometo a responder con la verdad"
                                                disabled />
                                        </div>
                                        <div class="box-primary">
                                            <div class="box-header no-padding">
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="datatable table table-striped table-bordered"
                                                        id="grd09Datos">
                                                        <thead>
                                                            <tr>
                                                                <th>N º</th>
                                                                <th>DESCRIPCION</th>
                                                                <th>SI</th>
                                                                <th>NO</th>
                                                            </tr>
                                                        </thead>

                                                        <body>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>Sensacion de alza termica o fiebre</td>
                                                                <td><input class="form-check-input check_sintomatologia"
                                                                        type="radio" name="P_1" id="1"></td>
                                                                <td><input class="form-check-input check_sintomatologia"
                                                                        type="radio" name="P_1" id="0"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Dolor de garganta, tos, estornudos o dificultad para
                                                                    respirar</td>
                                                                <td><input class="form-check-input check_sintomatologia"
                                                                        type="radio" name="P_2" id="1"></td>
                                                                <td><input class="form-check-input check_sintomatologia"
                                                                        type="radio" name="P_2" id="0"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>Dolor de cabeza, diarrea o congestión nasal</td>
                                                                <td><input class="form-check-input check_sintomatologia"
                                                                        type="radio" name="P_3" id="1"></td>
                                                                <td><input class="form-check-input check_sintomatologia"
                                                                        type="radio" name="P_3" id="0"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>Pérdida del gusto y/o del olfato</td>
                                                                <td><input class="form-check-input check_sintomatologia"
                                                                        type="radio" name="P_4" id="1"></td>
                                                                <td><input class="form-check-input check_sintomatologia"
                                                                        type="radio" name="P_4" id="0"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>5</td>
                                                                <td>Contacto con un caso confirmado de COVID-19</td>
                                                                <td><input class="form-check-input check_sintomatologia"
                                                                        type="radio" name="P_5" id="1"></td>
                                                                <td><input class="form-check-input check_sintomatologia"
                                                                        type="radio" name="P_5" id="0"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>6</td>
                                                                <td>Está tomando alguna medicación (detallar cuál o
                                                                    cuáles)</td>
                                                                <td><input class="form-check-input check_sintomatologia"
                                                                        type="radio" name="P_6" id="1"></td>
                                                                <td><input class="form-check-input check_sintomatologia"
                                                                        type="radio" name="P_6" id="0"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>7</td>
                                                                <td>Pertenece a algún grupo de Riesgo para COVID-19</td>
                                                                <td><input class="form-check-input check_sintomatologia"
                                                                        type="radio" name="P_7" id="1"></td>
                                                                <td><input class="form-check-input check_sintomatologia"
                                                                        type="radio" name="P_7" id="0"></td>
                                                            </tr>
                                                        </body>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="margin-bottom:5px;display:flex;justify-content:flex-end;gap:1rem">

                                        <button type="button" class="bg-emerald-500 py-4 px-4 text-white"
                                            onclick="insert_sintomatologia();">Guardar</button>
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
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="modal_pernocte_view">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box box-body">


                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">PROYECTO</span>
                            <input type="hidden" id="txt_id_pernocte" value="">
                            <input id="txt_proyecto_modal" type="text" class="form-control" style="width:115px;"
                                value="12-12-21" disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA INICIO
                                RUTA</span>
                            <input id="txt_hora_inicio_ruta_modal" type="text" class="form-control" placeholder="..."
                                value="" disabled />

                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:20px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA INICIO
                                PERNOCTE</span>
                            <input id="txt_hora_inicio_pernocte_modal" type="text" class="form-control"
                                placeholder="..." value="" disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA FIN
                                PERNOCTE</span>
                            <input id="txt_hora_fin_pernocte_modal" type="text" class="form-control" placeholder="..."
                                value="" disabled />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">LUGAR</span>
                            <input id="txt_lugar_pernocte_modal" type="text" class="form-control" placeholder="..."
                                value="" disabled />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:20px;">
                        <div style="display:flex;">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold; width:200px">Personal</span>
                            <div style="display:flex">
                                <input id="txt_search_trabajador" type="text" class="form-control"
                                    placeholder="Buscar por DNI para Ingresar" value="" />
                                <span class="input-group-addon" title="Expositor"
                                    style="background:#EEEEEE;font-weight:bold;padding-right: 52px;"> <button
                                        class="fa fa-search" aria-hidden="true"
                                        onclick="search_Trabajador();"></button></span>
                            </div>
                        </div>
                    </div>
                    <div class="box-primary">
                        <div class="box-header no-padding">
                            <div class="box-body table-responsive no-padding">
                                <table style="width:100%" class="datatable table table-striped table-bordered"
                                    id="grd02ModalPernocte_View_Workers">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>APELLIDOS Y NOMBRES</th>
                                            <th>DNI</th>
                                            <th>CORREO</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="bg-gray-500 py-2 px-2 text-white" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="modal_add_horario_pernocte">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box box-body">
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Tema"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">HORA INICIO</span>
                            <input type="hidden" id="id_hidden_trabajador" value="">
                            <input type="hidden" id="id_hidden_pernocte" value="">
                            <input id="txt_horarios_pernocte_inicio_modal" type="text" class="form-control" value=""
                                data-clocklet />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">HORA FIN</span>
                            <input id="txt_horarios_pernocte_fin_modal" type="text" class="form-control" value=""
                                data-clocklet />
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="bg-emerald-500  py-2 px-2 text-white"
                    onclick="insert_horario_pernocte_modal_add();">Guardar</button>
                <button type="button" class="bg-gray-500  py-2 px-2 text-white"
                    onclick="$('#modal_add_horario_pernocte').modal('hide')">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="modal_edit_capacitacion">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box box-body">
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Prioridad"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 81px;">Tipo de
                                Registro</span>
                            <select id="seguridad_tipo_registro_select_modal" class="form-control selectpicker">
                                <option value="-1">Selecciona...</option>
                            </select>
                            <span class="input-group-addon" title="Prioridad"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 81px;">Organizado
                                por:</span>
                            <select id="seguridad_area_select_modal" class="form-control selectpicker">
                                <option value="-1">Selecciona...</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Tema"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Tema</span>
                            <input id="txt_tema_modal" type="text" class="form-control" placeholder="..." value="" />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Expositor</span>
                            <input id="txt_expositor_modal" type="text" class="form-control" placeholder="..."
                                value="" />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">Empresa
                                Expositor</span>
                            <input id="txt_expositor_empresa_modal" type="text" class="form-control" placeholder="..."
                                value="" />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">FECHA</span>
                            <input id="txt_fecha_capacitaciones_modal" type="date" class="form-control"
                                style="width:115px;" value="12-12-21" />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">HORA INICIO</span>
                            <input id="txt_hora_inicio_modal" type="text" class="form-control" placeholder="..."
                                value="" />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">HORA FINAL</span>
                            <input id="txt_hora_final_modal" type="text" class="form-control" placeholder="..."
                                value="" />
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">TOTAL HORAS</span>
                            <input id="txt_hora_total_modal" type="text" class="form-control" placeholder="..."
                                value="" />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">OBJETIVOS</span>
                            <input id="txt_objetivos_modal" type="text" class="form-control" placeholder="..."
                                value="" />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">MATERIALES
                                USADOS:</span>
                            <input id="txt_materiales_modal" type="text" class="form-control" placeholder="..."
                                value="" />
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">LUGAR DE
                                CAPACITACIÓN:</span>
                            <input id="txt_lugar_modal" type="text" class="form-control" placeholder="..." value="" />
                        </div>
                    </div>
                    <div class="box-primary">
                        <div class="box-header no-padding">
                            <div class="box-body table-responsive no-padding">
                                <table class="datatable table table-striped table-bordered" id="grd02ModalEdit">
                                    <thead>
                                        <tr>
                                            <th>Ope.</th>
                                            <th>Id</th>
                                            <th>DNI</th>
                                            <th>APELLIDOS Y NOMBRES</th>
                                            <th>ÁREA</th>
                                            <th>CARGO</th>
                                            <th>FIRMA</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">OBSERVACIONES</span>
                            <button class="btn btn-primary" onclick="addObservacionesCapacitaciones_modal();"><i
                                    class="fa fa-plus-circle "></i></button>
                        </div>
                    </div>
                    <div class="box-primary">
                        <div class="box-header no-padding">
                            <div class="box-body table-responsive no-padding">
                                <table class="datatable table table-striped table-bordered"
                                    id="table_observaciones_capacitaciones_modal">
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
                    <div class="form-group" style="margin-bottom:5px;">
                        <div class="input-group">
                            <span class="input-group-addon" title="Expositor"
                                style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ACUERDOS Y
                                COMPROMISOS</span>
                            <button class="btn btn-primary" onclick="addAcuerdosCompromisosCapacitaciones_modal();"><i
                                    class="fa fa-plus-circle "></i></button>
                        </div>
                    </div>
                    <div class="box-primary">
                        <div class="box-header no-padding">
                            <div class="box-body table-responsive no-padding">
                                <table class="datatable table table-striped table-bordered"
                                    id="table_Acuerdos_Compromisos_Capacitaciones_modal">
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
                <button type="button" class="btn btn-success">Guardar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
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
<script src="pages/catalogos/seguridad/seguridad.js"></script>
<script>
function openCell(parent, section, nex = null) {
    $(this).click(function() {
        $("." + parent).css({
            "display": "block"
        });
        $("." + parent + " > div").css({
            "display": "none"
        });

        $("." + section).css({
            "display": "block"
        });
    });
}
</script>
<script>
$(document).ready(function() {
    select_load_tipo_regitro("seguridad_tipo_registro_select");
    select_load_area_select("seguridad_area_select");
    select_loal_camioneta("seguridad_placa_camioneta");

    updateGrid("gridRequerimientoPersonalGrid");
    updateGrid("gridRequerimientoGrid");

    UtilLoadSelect("sql_select_get_cargo", "txt_cargo_personas");
    UtilLoadSelect("sql_select_get_area", "slct_area_requerimiento");
    UtilLoadSelect("sql_select_get_lugar_trabajo", "personas_select_lugar");
    UtilLoadSelect("03_selected_gestionPersona_motivo", "personas_select_motivo");

    UtilLoadSelect("sql_select_get_prioridad", "slct_prioridad_requerimiento");
    // select_load_operadores();

    /*$('#seguridad_area_select').change(function() {  
     var $option = $(this).find('option:selected');
     var value = $option.val();//to get content of "value" attrib
     gridFirst(value)
     });*/
    /*$('#seguridad_dni_operador').change(function() {
    //Use $option (with the "$") to see that the variable is a jQuery object
    var $option = $(this).find('option:selected');
    //Added with the EDIT
    var value = $option.val();//to get content of "value" attrib
    //var text = $option.text();//to get <option>Text</option> content  
    load_field_sintomatologia(value)
    });*/
    document.getElementById("txt_hora_final").addEventListener("input", function(event) {
        let time_first = $('#txt_hora_inicio').val().split(":")
        let time_last = $('#txt_hora_final').val().split(":")

        let seconds1 = parseInt((time_first[0] * 60)) + parseInt(time_first[1])
        let seconds2 = parseInt((time_last[0] * 60)) + parseInt(time_last[1])

        let result = seconds2 - seconds1;

        $('#txt_hora_total').val((~~(result / 60)).toString() + ":" + (result % 60).toString())
    });
    document.getElementById("txt_hora_inicio").addEventListener("input", function(event) {
        let time_first = $('#txt_hora_inicio').val().split(":")
        let time_last = $('#txt_hora_final').val().split(":")

        let seconds1 = parseInt((time_first[0] * 60)) + parseInt(time_first[1])
        let seconds2 = parseInt((time_last[0] * 60)) + parseInt(time_last[1])

        let result = seconds2 - seconds1;

        $('#txt_hora_total').val((~~(result / 60)).toString() + ":" + (result % 60).toString())
    });

    // $("#txt_fecha_capacitaciones").datepicker("setDate", moment().format("DD/MM/YYYY"));
    //  $("#txt_fecha_control").datepicker("setDate", moment().format("DD/MM/YYYY"));
    //  $("#txt_fecha_inicio_ruta").datepicker("setDate", moment().format("DD/MM/YYYY"));
    //////  $("#txt_fecha_inicio_pernocte").datepicker("setDate", moment().format("DD/MM/YYYY"));
    // $("#txt_fecha_fin_pernocte").datepicker("setDate", moment().format("DD/MM/YYYY"));
    // $("#txt01_camioneta_fecha").datepicker("setDate", moment().format("DD/MM/YYYY"));
    //  $("#txt01_conductor_cisterna_fecha").datepicker("setDate", moment().format("DD/MM/YYYY"));

    gridPernocte();
    gridThird();
    gridSecond();
    gridSintomatologia();
    gridCheckListPreUso();

    $('.checkList_category_luces').change(function() {
        let size_ = $(".checkList_category_luces:radio:checked").length;
        if (size_ == 6) {
            $("#headerpanel11").css({
                "background-color": "#e0e0e0"
            })
        }
    });
    $('.checkList_category_documentos').change(function() {
        let size_ = $(".checkList_category_documentos:radio:checked").length;
        if (size_ == 8) {
            $("#headerpanel12").css({
                "background-color": "#e0e0e0"
            })
        }
    });
    $('.checkList_category_general').change(function() {
        let size_ = $(".checkList_category_general:radio:checked").length;
        if (size_ == 15) {
            $("#headerpanel13").css({
                "background-color": "#e0e0e0"
            })
        }
    });
    $('.checkList_category_neumatico').change(function() {
        let size_ = $(".checkList_category_neumatico:radio:checked").length;
        if (size_ == 4) {
            $("#headerpanel14").css({
                "background-color": "#e0e0e0"
            })
        }
    });
    $('.checkList_category_motor').change(function() {
        let size_ = $(".checkList_category_motor:radio:checked").length;
        if (size_ == 9) {
            $("#headerpanel15").css({
                "background-color": "#e0e0e0"
            })
        }
    });
    $('.checkList_category_seguridad').change(function() {
        let size_ = $(".checkList_category_seguridad:radio:checked").length;
        if (size_ == 17) {
            $("#headerpanel16").css({
                "background-color": "#e0e0e0"
            })
        }
    });
    /*----------------------------------------------------------------*/
    $('.checkList2_luces').change(function() {
        let size_ = $(".checkList2_luces:radio:checked").length;
        if (size_ == 14) {
            $("#headerpanel21").css({
                "background-color": "#e0e0e0"
            })
        }
    });
    $('.checkList2_documentos').change(function() {
        let size_ = $(".checkList2_documentos:radio:checked").length;
        if (size_ == 18) {
            $("#headerpanel22").css({
                "background-color": "#e0e0e0"
            })
        }
    });
    $('.checkList2_general').change(function() {
        let size_ = $(".checkList2_general:radio:checked").length;
        if (size_ == 13) {
            $("#headerpanel23").css({
                "background-color": "#e0e0e0"
            })
        }
    });
    $('.checkList2_neumaticos').change(function() {
        let size_ = $(".checkList2_neumaticos:radio:checked").length;
        if (size_ == 4) {
            $("#headerpanel24").css({
                "background-color": "#e0e0e0"
            })
        }
    });
    $('.checkList2_motor').change(function() {
        let size_ = $(".checkList2_motor:radio:checked").length;
        if (size_ == 9) {
            $("#headerpanel25").css({
                "background-color": "#e0e0e0"
            })
        }
    });
    $('.checkList2_seguridad').change(function() {
        let size_ = $(".checkList2_seguridad:radio:checked").length;
        if (size_ == 31) {
            $("#headerpanel26").css({
                "background-color": "#e0e0e0"
            })
        }
    });
    $('.checkList2_sistema_recarga').change(function() {
        let size_ = $(".checkList2_sistema_recarga:radio:checked").length;
        if (size_ == 6) {
            $("#headerpanel27").css({
                "background-color": "#e0e0e0"
            })
        }
    });

});
</script>