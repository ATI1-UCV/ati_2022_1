<?php
set_error_handler(
  function ($severity, $message, $file, $line) {
      throw new ErrorException($message, $severity, $severity, $file, $line);
  }
);

  if (isset($_GET['ci']) && $_GET['ci']) {
    try {
      $string = @file_get_contents(dirname(__FILE__) . DIRECTORY_SEPARATOR . $_GET['ci']. DIRECTORY_SEPARATOR ."perfil.json", true);
    
      echo json_encode(array('success' => 1, 'message' => 'JSON encontrado.', 'data' => json_decode($string) ));
    } catch (Exception $e) {
      echo json_encode(array('success' => 0, 'message' => $e->getMessage()));
      
    }
  
  }

  if (isset($_GET['len']) && $_GET['len']) {
    setcookie("len", $_GET['len']);
    echo json_encode(array('success' => 1, 'message' => 'Idioma cambiado', 'len' => $_GET['len'] ));
  }

//restore the previous error handler
restore_error_handler();
?>