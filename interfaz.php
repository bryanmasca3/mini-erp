<?php
  include_once('includes/sess_verifica.php');
  include_once('includes/web_config.php');
  if(isset($_SESSION['usr_ID'])) {
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>sistema ERP</title>
  <link rel="shortcut icon" href="favicon.ico" />
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
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="app/js/admin.js"></script>
  <script src="app/js/funciones.js"></script>
  <script src="app/js/interfaz.js"></script>
  <style>
    .btn-circle {
    width: 27px;
    height: 27px;
    padding: 5px 5px;
    border-radius: 15px;
    text-align: center;
    font-size: 13px;
    line-height: 1.42857;
}
  </style>
</head>
<body class="skin-blue sidebar-mini" oncontextmenu="return false" ondragstart="return false" onselectstart="return false">
  <div class="wrapper">
    <header class="main-header">
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Notificaciones: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu" style="display:none;">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span id="lblNotifiCount1" class="label label-warning NotifiCount"></span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">Tienes <span id="lblNotifiCount2" class="NotifiCount"></span> notificaciones</li>
                <li>
                  <ul class="menu" id="appInterfazNotificaciones">
                  </ul>
                </li>
                <li class="footer"><a href="javascript:appSubmitButton('notificaciones');">Ver todas...</a></li>
              </ul>
            </li>
            <!-- Menu Usuario: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="data/personas/fotoUser.jpg" class="user-image" alt="Usuario">
                <span class="hidden-xs"> <?php echo $_SESSION['usr_login'];?> </span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="data/personas/fotoUser.jpg" class="img-circle" alt="User Image">
                  <p>
                    <?php echo $_SESSION['usr_login'];?>
                    <small>--</small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="javascript:appSubmitButton('profile');" class="btn btn-default btn-flat">Perfil</a>
                  </div>
                  <div class="pull-right">
                    <a href="javascript:appSubmitButton('logout');" class="btn btn-default btn-flat">Salir</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
  <!-- =========================== MENU ============================== -->
<?php
  $menuCat = "";
  $menuCatMaestro = "";
  $menuCatUbigeo = "";

  $appPage = "pages/catalogos/lineaneg/lineaneg.php";
  if(isset($_SESSION["page"])){
    switch ($_SESSION["page"]) {
      case "profile": $appPage = "pages/global/profile/profile.php"; break;
      case "uniope": $appPage = "pages/catalogos/uniopera/uniopera.php"; break;
      case "arbol": $appPage = "pages/catalogos/arbol/arbol.php"; break;
      case "lineaneg": $appPage = "pages/catalogos/lineaneg/lineaneg.php"; break;
      case "logistica": $appPage = "pages/catalogos/logistica/logistica.php"; break;
      case "personas": $appPage = "pages/catalogos/personas/personas.php"; break;
      case "seguridad": $appPage = "pages/catalogos/Seguridad/seguridad.php"; break;
      case "operaciones": $appPage = "pages/catalogos/operaciones/operaciones.php"; break;
      case "catMaestro" :   $menuCat = 'active menu-open'; $menuCatMaestro = 'class="active"'; $appPage = "pages/catalogos/maestro/maestro.php"; break;
      case "catUbigeo" :    $menuCat = 'active menu-open'; $menuCatUbigeo = 'class="active"'; $appPage = "pages/catalogos/ubigeo/ubigeo.php"; break;
      case "catMisiones" :  $menuCat = 'active menu-open'; $menuCatMisiones = 'class="active"'; $appPage = "pages/catalogos/misiones/misiones.php"; break;
      case "catDistritos" : $menuCat = 'active menu-open'; $menuCatDistritos = 'class="active"'; $appPage = "pages/catalogos/distritos/distritos.php"; break;
      case "catUsuarios" :  $menuCat = 'active menu-open'; $menuCatUsuarios = 'class="active"'; $appPage = "pages/catalogos/usuarios/usuarios.php"; break;
      case "catPredios" :   $menuCat = 'active menu-open'; $menuCatPredios = 'class="active"'; $appPage = "pages/catalogos/predios/predios.php"; break;
      case "rptResMision" : $menuRpt = 'active menu-open'; $menuRptResMision = 'class="active"'; $appPage = "pages/reportes/mision/mision.php"; break;
      case "rptPredios" :   $menuRpt = 'active menu-open'; $menuRptPredios = 'class="active"'; $appPage = "pages/reportes/predios/predios.php"; break;
    }
  }
?>


    <!-- ========================= CONTENIDO  ====================== -->
    <div class="content-wrapper">
      <?php include_once($appPage); ?>
    </div>
  </div>
</body>
</html>
<?php
  } else {
    header('location:index.php');
  }
?>
