<link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" />
  <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="app/css/fonts.css" />
  <link rel="stylesheet" href="app/css/interfaz.css" />
  <link rel="stylesheet" href="app/css/admin.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">


  <!--<script src="libs/jquery/jquery-3.3.1.min.js"></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>  
  <script src="libs/jquery-ui/jquery-ui.min.js"></script>
 
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.56/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.56/vfs_fonts.js"></script>        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/clocklet/css/clocklet.min.css">
<script src="https://cdn.jsdelivr.net/npm/clocklet"></script>
 <!--  <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script> -->
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

  <script src="libs/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="libs/webtoolkit/webtoolkit.sha1.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="app/js/admin.js"></script>
  <script src="app/js/funciones.js"></script>
  <script src="app/js/interfaz.js"></script>
  <script src="pages/catalogos/Seguridad/validate.js"></script>
  <style>
     .error{
    color:#ff2424;
    font-size:10px;
  }
</style>
<header class="main-header">
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" style="background-color: #3c8dbc;">
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Notificaciones: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu" style="display:none;">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span id="lblNotifiCount1" class="label label-warning NotifiCount"></span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">_ <span id="lblNotifiCount2" class="NotifiCount"></span> notificaciones</li>
                <li>
                  <ul class="menu" id="appInterfazNotificaciones">
                  </ul>
                </li>
                <li class="footer"><a href="#">_</a></li>
              </ul>
            </li>
            <!-- Menu Usuario: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="data/personas/fotoUser.jpg" class="user-image" alt="Usuario">
                <span class="hidden-xs"> _ </span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="data/personas/fotoUser.jpg" class="img-circle" alt="User Image">
                  <p>
                    _                    <small>--</small>
                  </p>
                </li>                          
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
<section class="content-header">
  
  <h1><i class="fa fa-tasks"></i> Asistencia</h1>
  <ol class="breadcrumb">  
    <li class="active">Asistencia</li>
  </ol>
</section>
<section class="content">
<div class="row">
    <div class="col-md-6">
        <div class="form-group" style="margin-bottom:5px;">
          <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">ASISTENTE</span>
          <div style="display:flex">
          <input id="txt_search_asistance_dni" type="text" class="form-control" placeholder="Ingrese DNI" value=""/>
          <input type="hidden" id="idAsistenciaHidden" name="" value="">
          <span class="input-group-addon" title="Asistente" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;"> <button class="fa fa-search" type="button" aria-hidden="true" onclick="searchAsistance();"></button></span>
          </div>
          <input id="txt_search_asistance_dni_view" type="text" class="form-control" placeholder="" value="" disabled/>
        </div>
        <div class="form-group" style="margin-bottom:5px;">
        <span class="input-group-addon" title="Expositor" style="background:#EEEEEE;font-weight:bold;padding-right: 52px;">CAPACITACION</span>
        <div style="display:flex">
        <select id="asistencia_capacitacion" class="form-control selectpicker">
        <option value="-1">Selecciona...</option>
        </select>
        </div>
        <div class="btn-group" role="group" aria-label="Basic example" style="margin-top:20px;display:flex;justify-content:flex-end;gap:1rem">                    

        <button type="button" class="btn btn-success" onclick="insert_asistance();">Guardar</button>                                                                                      
        </div>  
        </div>
        </div>
    </div>
  </div>

</section>

<script src="pages/catalogos/Seguridad/seguridad.js"></script>
<script>
  $(document).ready(function(){
    select_asistencia_capacitacion("asistencia_capacitacion");
  console.log("sdsd");
  });
</script>
