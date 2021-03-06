<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Acceso Restringido...</title>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" />
    <link type="text/css" rel="stylesheet" href="app/css/fonts.css" />
    <link type="text/css" rel="stylesheet" href="app/css/login.css" />

    <script type="text/javascript" src="libs/jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="libs/webtoolkit/webtoolkit.sha1.js"></script>
    <script type="text/javascript" src="app/js/login.js"></script>
  </head>
  <body>
    <form action="" id="frmLogin">
      <div id="loginBackground">
        <div id="loginBack" class="loginBack">
          <div class="loginLogo"></div>
          <div class="loginPanel">
            <div class="loginGroup loginGroupUser" style="top:16px;">
              <span>Usuario</span>
              <input type="text" id="txt_UserName" tabindex="1" class="loginText" required placeholder="usuario..." autocomplete/>
            </div>
            <div class="loginGroup loginGroupUser" style="top:38px;">
              <span>Password</span>
              <input type="password" id="txt_UserPass" tabindex="2" class="loginText" required placeholder="password..." autocomplete="off"/>
            </div>
          </div>
          <div class="loginButton">
            <input type="submit" id="botonOK" tabindex="3" class="btn-primary btn-large" value="ACCESAR" />
          </div>
        </div>
      </div>
    </form>
    <div class="login_WarningBack">
      <div id="pn_Warning" class="login_WarningText">
        <span id="lbl_Warning" style="position:relative;top:10px;">
          !!!Los datos son incorrectos!!!
        </span>
      </div>
    </div>
  </body>
</html>
