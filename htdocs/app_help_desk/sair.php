<?php 
	session_start();

  // if (isset($_SESSION['AUTENTICADO']) || $_SESSION['AUTENTICADO'] == 'SIM') {
  //   $_SESSION['AUTENTICADO'] = 'NAO';
  //   header('location: index.php=logof');

  // }
	session_destroy();
	header('location: index.php?login=logof');

 ?>