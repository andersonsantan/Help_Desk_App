<?php 
  session_start();
  if (!isset($_SESSION['AUTENTICADO']) || $_SESSION['AUTENTICADO'] != 'SIM') {
    header('location: index.php?login=autentication_erro');
  }
 ?>