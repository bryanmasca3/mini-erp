
<div class="grid gap-4 grid-cols-5 py-10 px-10">
<?php
    if($_SESSION['rol']==1 || $_SESSION['rol']==6){

        ?>
         <div class="bg-[#293462] text-white py-4 rounded-xl relative">
                <div>
                    <p class="text-center">Mantenimiento</p>
                </div>
                <div class="py-4">
                    <div class="flex justify-center items-center">
                        <p class="text-3xl font-bold text-center">MANT</p>
                    </div>
                    <div class="absolute top-0 right-0">
                        <box-icon name='wrench' size="6rem" color="rgba(255,255,255,0.4)"></box-icon>
                    </div>
                </div>
                <div class="py-2">
                    <hr class="mx-auto w-3/4" />
                </div>
                <div class="flex justify-center">
                    <a class="text-center block" href="javascript:appSubmitButton('mantenimiento',1);">Ingresar</a>
                    <box-icon name='left-arrow-circle' color="#fff" type='solid' flip='horizontal'></box-icon>
                </div>
            </div>
       <?php
           }  if($_SESSION['rol']==1 || $_SESSION['rol']==2){
?>
           

            <div class="bg-[#1CD6CE] text-white py-4 rounded-xl relative">
                <div>
                    <p class="text-center">Logistica</p>
                </div>
                <div class="py-4">
                    <div class="flex justify-center items-center">
                        <p class="text-3xl font-bold text-center">LOG</p>
                    </div>
                    <div class="absolute top-0 right-0">
                        <box-icon name='bar-chart-square' size="6rem" color="rgba(255,255,255,0.4)"></box-icon>
                    </div>
                </div>
                <div class="py-2">
                    <hr class="mx-auto w-3/4" />
                </div>
                <div class="flex justify-center">
                    <a class="text-center block" href="javascript:appSubmitButton('logistica',1);">Ingresar</a>
                    <box-icon name='left-arrow-circle' color="#fff" type='solid' flip='horizontal'></box-icon>
                </div>
            </div>

            <?php
           }  if($_SESSION['rol']==1 || $_SESSION['rol']==5){
?>

            <div class="bg-[#FEDB39] text-white py-4 rounded-xl relative">
                <div>
                    <p class="text-center">Operaciones</p>
                </div>
                <div class="py-4">
                    <div class="flex justify-center items-center">
                        <p class="text-3xl font-bold text-center">OPE</p>
                    </div>
                    <div class="absolute top-0 right-0">
                        <box-icon name='cog' flip='horizontal' size="6rem" color="rgba(255,255,255,0.4)"></box-icon>
                    </div>
                </div>
                <div class="py-2">
                    <hr class="mx-auto w-3/4" />
                </div>
                <div class="flex justify-center">

                    <a class="text-center block " href="javascript:appSubmitButton('operaciones',1);">Ingresar</a>
                    <box-icon name='left-arrow-circle' color="#fff" type='solid' flip='horizontal'></box-icon>
                </div>
            </div>

            <?php
           }  if($_SESSION['rol']==1 || $_SESSION['rol']==4){
?>
            <div class="bg-[#D61C4E] text-white py-4 rounded-xl relative">
                <div>
                    <p class="text-center">SSOMA</p>
                </div>
                <div class="py-4">
                    <div class="flex justify-center items-center">
                        <p class="text-3xl font-bold text-center">SEG</p>
                    </div>
                    <div class="absolute top-0 right-0">
                        <box-icon name='hard-hat' size="6rem" color="rgba(255,255,255,0.4)"></box-icon>
                    </div>
                </div>
                <div class="py-2">
                    <hr class="mx-auto w-3/4" />
                </div>
                <div class="flex justify-center">
                    <a class="text-center block" href="javascript:appSubmitButton('seguridad',1);">Ingresar</a>
                    <box-icon name='left-arrow-circle' color="#fff" type='solid' flip='horizontal'></box-icon>
                </div>
            </div>

            <?php
           }  if($_SESSION['rol']==1 || $_SESSION['rol']==3){
?>
            <div class="bg-[#083AA9] text-white py-4 rounded-xl relative">
                <div>
                    <p class="text-center">Gestión de Personas</p>
                </div>
                <div class="py-4">
                    <div class="flex justify-center items-center">
                        <p class="text-3xl font-bold text-center">PER</p>
                    </div>
                    <div class="absolute top-0 right-0">
                        <box-icon name='user-circle' size="6rem" color="rgba(255,255,255,0.4)"></box-icon>
                    </div>
                </div>
                <div class="py-2">
                    <hr class="mx-auto w-3/4" />
                </div>
                <div class="flex justify-center">
                    <a class="text-center block"  href="javascript:appSubmitButton('personas',1);">Ingresar</a>
                    <box-icon name='left-arrow-circle' color="#fff" type='solid' flip='horizontal'></box-icon>
                </div>
            </div>

            <?php
           } 
?>
        </div>
<!-- Content Header (Page header) -->

<!--<section class="content-header">
     <h1>Linea de Negocio</h1>
    <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li> 
        <li class="active">Linea de Negocio</li>
    </ol>
</section>

 Main content
<div class="grid gap-4 grid-cols-5 py-10 px-10">
    <div class="bg-[#293462] text-white py-4">
        <div>
            <p class="text-center">Mantenimiento</p>
        </div>
        <div class="flex py-10">
            <div class="flex-1 flex justify-center items-center"><p class="text-5xl font-bold text-center">MANT</p></div>
            <div class="flex-1"><box-icon name='wrench' size="6rem" color="#fff"></box-icon></div>
        </div>
        <div class="flex justify-center">
            <a class="">Ingresar</a><box-icon name='left-arrow-circle' color="#fff" type='solid' flip='horizontal' ></box-icon>
        </div>
    </div>
    <div class="bg-[#1CD6CE] text-white py-4">
        <div>
            <p class="text-center">Logistica</p>
        </div>
        <div class="flex">
            <div class="flex-1"><p class="text-lg">LOG</p></div>
            <div class="flex-1"><box-icon name='bar-chart-square'></box-icon></div>
        </div>
        <div>
            <a class="text-center block">Ingresar</a>
        </div>
    </div>
    <div class="bg-[#FEDB39] text-white py-4">
        <div>
            <p class="text-center">Operaciones</p>
        </div>
        <div class="flex">
            <div class="flex-1"><p class="text-lg">OPE</p></div>
            <div class="flex-1"><box-icon name='cog' flip='horizontal' ></box-icon></div>
        </div>
        <div>
            <a class="text-center block">Ingresar</a>
        </div>
    </div>
    <div class="bg-[#D61C4E] text-white py-4">
        <div>
            <p class="text-center">SSOMA</p>
        </div>
        <div class="flex">
            <div class="flex-1"><p class="text-lg">SEG</p></div>
            <div class="flex-1"><box-icon name='hard-hat' ></box-icon></div>
        </div>
        <div>
            <a class="text-center block">Ingresar</a>
        </div>
    </div>
    <div class="bg-[#083AA9] text-white py-4">
        <div>
            <p class="text-center">Gestión de Personas</p>
        </div>
        <div class="flex">
            <div class="flex-1"><p class="text-lg">PER</p></div>
            <div class="flex-1"><box-icon name='user-circle' ></box-icon></div>
        </div>
        <div>
            <a class="text-center block">Ingresar</a>
        </div>
    </div>
</div>-->



<!-- dashboard.js -->
<script src="pages/catalogos/lineaneg/lineaneg.js"></script>

<script>
/*
$(document).ready(function() {
    appDashBoard();
});
$.widget.bridge('uibutton', $.ui.button);*/
</script>