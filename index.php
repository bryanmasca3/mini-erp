<!DOCTYPE html>
<html lang="es">

<head>
    <title>Acceso Restringido...</title>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" />
    <!--  <link type="text/css" rel="stylesheet" href="app/css/fonts.css" />
    <link type="text/css" rel="stylesheet" href="app/css/login.css" />-->

    <script type="text/javascript" src="libs/jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="libs/webtoolkit/webtoolkit.sha1.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script type="text/javascript" src="app/js/login.js"></script>
</head>
<style>

</style>
<body>
    <div class="h-screen pt-16 bg-[#003560]">
        <form action="" id="frmLogin">
            <div class="max-w-xl  bg-white mx-auto drop-shadow-2xl pt-8 pb-16 rounded-lg">
                <div class="h-48 py-2">
                    <img src="img/logo.jpeg" class="h-full mx-auto overflow-hidden object-cover" />
                </div>
                <div class="px-8">
                    <div class="mb-4">
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500 sm:text-sm">
                                    <box-icon name='user'></box-icon>
                                </span>
                            </div>
                            <input type="text" name="price" id="txt_UserName"
                                class="block py-4 w-full rounded-md border-gray-300 pl-12 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                placeholder="Usuario" required />
                        </div>
                    </div>
                    <div>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500 sm:text-sm">
                                    <box-icon name='lock-open-alt'></box-icon>
                                </span>
                            </div>
                            <input type="password" name="price" id="txt_UserPass"
                                class="block py-4 w-full rounded-md border-gray-300 pl-12 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                placeholder="Contraseña" required />
                        </div>

                    </div>
                    <div>
                        <div class="py-8 px-4">

                            <input
                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                                Recuérdame
                            </label>
                        </div>

                    </div>
                    <div class="login_WarningBack">
                        <div id="pn_Warning" class="login_WarningText">
                            <p id="lbl_Warning" class="text-center text-red-600">
                                Los datos son incorrectos!!!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col px-10 pt-8 gap-4">
                    <input type="submit" id="lbl_Warning" class="bg-[#1aaf91] text-white w-full py-4 cursor-pointer"
                        value="INICIAR SESIÓN" />
                    <p class="text-center">¿Eres un usuario nuevo?</p>
                    <button class="bg-[#003560] text-white w-full py-4">REGÍSTRATE</button>
                    <p class="text-center">¿Olvidó su contraseña?</p>
                </div>
                <div>

                </div>
            </div>
        </form>
    </div>
</body>
<script>
    $(document).ready(function(){
      $('#pn_Warning').slideUp('fast'); 
  });
</script>
</html>