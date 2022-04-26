<?php
  session_name("erp");
  session_start();
  $_SESSION["page"] = "";
  $_SESSION["padreID"] = "";
  session_unset();
  session_destroy();
  session_start();
  session_regenerate_id(true);
  Header ("Location:../index.php");
?>
