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
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" />
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="app/css/fonts.css" />
    <link rel="stylesheet" href="app/css/interfaz.css" />
    <link rel="stylesheet" href="app/css/admin.css" />




    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>









    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400;700&display=swap" rel="stylesheet">
    <!--<script src="libs/jquery/jquery-3.3.1.min.js"></script>-->
    
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
    <script src='https://cdn.plot.ly/plotly-2.12.1.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js'></script>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <!--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>-->

    <script src="app/js/sweetalert.min.js"></script>
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

    body {
        font-family: 'Barlow', sans-serif;
    }
    </style>
</head>

<body oncontextmenu="return false" ondragstart="return false" onselectstart="return false">

    <div class="bg-[#f7f7f7] flex h-screen">
        <div class="bg-white grow-0 border-r-2 flex flex-col justify-around px-8 w-96">
            <div class="h-40 py-2 ">
                <img src="img/logo.jpeg" class="h-full mx-auto overflow-hidden object-cover" />
            </div>
            <div>
                <ul>
                    <li class=" rounded-xl hover:text-white flex items-center gap-2 py-4 font-bold hover:bg-[#1aaf91]">
                        <box-icon name='dashboard' type='solid'></box-icon><span>Principal</span>
                    </li>
                    <li
                        class=" rounded-xl hover:text-white flex text-[#c1c1c1]  items-center gap-2 py-4 hover:bg-[#1aaf91]">
                        <box-icon name='user-circle' color="#c1c1c1"></box-icon><span>Usuarios</span>
                    </li>
                    <li
                        class=" rounded-xl hover:text-white flex items-center gap-2 py-4 text-[#c1c1c1] hover:bg-[#1aaf91]">
                        <box-icon name='cog' type='solid' color="#c1c1c1"></box-icon><span>Configuracion</span>
                    </li>

                </ul>
            </div>

            <div>
                <hr />
                <!--<p class="text-black font-bold my-8">Perfil</p>-->
                <ul>
                    <!--    <li class="flex items-center gap-2 py-4">
                <img src="img/icon.png" class="w-10"/>Jnayhua</span>
                </li>-->
                    <li class="flex items-center gap-2 py-4">
                        <a href="javascript:appSubmitButton('logout');"><box-icon name='log-out'></box-icon><span>Salir</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="grow">
            <div class="bg-white py-12 px-10 flex justify-between">
                <div>
                    <h3 class="font-bold text-5xl">Bienvenido</h3>
                    <p class="font-light">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                </div>
                <!--<div class="bg-[#f7f7f7] flex items-center rounded-md">
                <input type="text" name="price" id="txt_UserName" class="bg-[#f7f7f7] block py-4 w-full  px-10"
                    placeholder="Buscar" required />
                <box-icon name='search'></box-icon>
            </div>-->
                <div class="flex gap-8 items-center relative">
                    <div class="rounded-full">
                        <box-icon name='bell'></box-icon>
                    </div>

                    <div class="flex gap-4 items-center">
                        <img src="img/icon.png" class="w-10 h-10" />
                        <span class="font-bold"><?php echo $_SESSION['usr_login'];?> </span>
                        <box-icon name='chevron-down'></box-icon>
                    </div>
                    <div
                        class="hidden absolute bg-white border-2 rounded-lg rigth-0 z-10 top-[50px] py-8 px-4 flex flex-col justify-around gap-4 justify-center items-center w-72 h-48">
                        <img src="img/icon.png" class="w-10 h-10" />
                        <span class="font-bold">jnayhua</span>
                        <div class="flex w-full justify-between">
                            <button>Perfil</button>
                            <a href="javascript:appSubmitButton('logout');">Salir</a>
                        </div>
                    </div>
                </div>
            </div>

            <!--  <header class="main-header">
   
      <nav class="navbar navbar-static-top">
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
    
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
        
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="data/personas/fotoUser.jpg" class="user-image" alt="Usuario">
                <span class="hidden-xs"> <?php echo $_SESSION['usr_login'];?> </span>
                <input type="hidden" id="id_user_login"name="" value= "<?php echo $_SESSION['usr_ID'];?>">
              </a>
              <ul class="dropdown-menu">
       
                <li class="user-header">
                  <img src="data/personas/fotoUser.jpg" class="img-circle" alt="User Image">
                  <p>
                    <?php echo $_SESSION['usr_login'];?>
                    <small>--</small>
                  </p>
                </li>
             
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
    </header>-->
            <!-- =========================== MENU ============================== -->
            <?php
  $menuCat = "";
  $menuCatMaestro = "";
  $menuCatUbigeo = "";

  $appPage = "pages/catalogos/lineaneg/lineaneg.php";
  if(isset($_SESSION["page"])){
    switch ($_SESSION["page"]) {
      //case "profile": $appPage =$_SESSION['rol']? "pages/global/profile/profile.php":"pages/catalogos/utils/whitepage.php"; break;
      case "uniope": $appPage =$_SESSION['rol']? "pages/catalogos/uniopera/uniopera.php":"pages/catalogos/utils/whitepage.php"; break;
      case "arbol": $appPage =$_SESSION['rol']? "pages/catalogos/arbol/arbol.php":"pages/catalogos/utils/whitepage.php"; break;
      case "lineaneg": $appPage =$_SESSION['rol']? "pages/catalogos/lineaneg/lineaneg.php":"pages/catalogos/utils/whitepage.php"; break;
      case "mantenimiento": $appPage =$_SESSION['rol']==1 || $_SESSION['rol']==6 ? "pages/catalogos/mantenimiento/mantenimiento.php":"pages/catalogos/utils/whitepage.php"; break;
      case "logistica": $appPage =$_SESSION['rol']==1 || $_SESSION['rol']==2 ? "pages/catalogos/logistica/logistica.php":"pages/catalogos/utils/whitepage.php"; break;
      case "personas": $appPage =$_SESSION['rol']==1 || $_SESSION['rol']==3? "pages/catalogos/personas/personas.php":"pages/catalogos/utils/whitepage.php"; break;
      case "seguridad": $appPage =$_SESSION['rol']==1 || $_SESSION['rol']==4? "pages/catalogos/seguridad/seguridad.php":"pages/catalogos/utils/whitepage.php"; break;
      case "operaciones": $appPage =$_SESSION['rol']==1 || $_SESSION['rol']==5? "pages/catalogos/operaciones/operaciones.php":"pages/catalogos/utils/whitepage.php"; break;
      default:

      break;
     // case "catMaestro" :   $menuCat = 'active menu-open'; $menuCatMaestro = 'class="active"'; $appPage = "pages/catalogos/maestro/maestro.php"; break;
     // case "catUbigeo" :    $menuCat = 'active menu-open'; $menuCatUbigeo = 'class="active"'; $appPage = "pages/catalogos/ubigeo/ubigeo.php"; break;
     // case "catMisiones" :  $menuCat = 'active menu-open'; $menuCatMisiones = 'class="active"'; $appPage = "pages/catalogos/misiones/misiones.php"; break;
    //  case "catDistritos" : $menuCat = 'active menu-open'; $menuCatDistritos = 'class="active"'; $appPage = "pages/catalogos/distritos/distritos.php"; break;
     // case "catUsuarios" :  $menuCat = 'active menu-open'; $menuCatUsuarios = 'class="active"'; $appPage = "pages/catalogos/usuarios/usuarios.php"; break;
    //  case "catPredios" :   $menuCat = 'active menu-open'; $menuCatPredios = 'class="active"'; $appPage = "pages/catalogos/predios/predios.php"; break;
    //  case "rptResMision" : $menuRpt = 'active menu-open'; $menuRptResMision = 'class="active"'; $appPage = "pages/reportes/mision/mision.php"; break;
   //   case "rptPredios" :   $menuRpt = 'active menu-open'; $menuRptPredios = 'class="active"'; $appPage = "pages/reportes/predios/predios.php"; break;
    }
  }
?>


            <!-- ========================= CONTENIDO  ====================== -->
            <div class="content-wrapper">
                <?php include_once($appPage); ?>
            </div>
        </div>
    </div>
</body>

</html>
<?php
  } else {
    header('location:index.php');
  }
?>