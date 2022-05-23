<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Unidad Operativa</h1>
  <ol class="breadcrumb">
    <li><a href="javascript:appChangePage('lineaneg');"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Unidad Operativa</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <input type="hidden" id="uniopeID" value="<?php echo($_SESSION["padreID"]);?>" />
  <div class="row" id="div_unioperativas">    
  </div>
</section>

<!-- dashboard.js -->
<script src="pages/catalogos/uniopera/uniopera.js"></script>

<script>
  $(document).ready(function(){ appDashBoard(); });
  $.widget.bridge('uibutton', $.ui.button);
</script>
