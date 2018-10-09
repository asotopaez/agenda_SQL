<?php

  require('./conector.php');

  session_start();

  if (isset($_SESSION['user_id'])) {
    $con = new ConectorBD('localhost', 'agenda_db', '123456');
    if ($con->initConexion('agenda_db')=='OK') {
      $data = "id = '".$_POST['id']."'";
      if ($con->eliminarRegistro('agenda', $data)) {
        $response['msg']= 'OK';
      }else {
        $response['msg']= 'No se pudo realizar la eliminacion de los datos';
      }
    }else {
      $response['msg']= 'No se pudo conectar a la base de datos';
    }
  }else {
    $response['msg']= 'No se ha iniciado una sesión';
  }

  echo json_encode($response);



 ?>
