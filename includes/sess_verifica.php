<?php
  // No almacenar en el cache del navegador esta pagina.
  header("Expires: Tue, 01 Jul 2001 06:00:00 GMT");                 // Expira en fecha pasada
  header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");    // Siempre pagina modificada
  header("Cache-Control: no-store, no-cache, must-revalidate");   // HTTP/1.1
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");                                       // HTTP/1.0

  session_name("erp");
  session_start();

  if (!isset($_SESSION['usr_ID'])) {
    session_destroy();
    session_start();
    session_regenerate_id(true);
  }
?>
