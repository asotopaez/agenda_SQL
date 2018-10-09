<?php
 
  require('./conector.php');

  session_start();

  if (isset($_SESSION['user_id'])) {
    $con = new ConectorBD('localhost', 'agenda_db', '123456');
    if ($con->initConexion('agenda_db')=='OK') {


      $filter = "id='".$_POST['id']."'" ;
      $data['start_date'] = "'".$_POST['start_date']."'";  
      $data['end_date'] = "'".$_POST['end_date']."'";
      $data['start_hour'] = "'".$_POST['start_hour']."'";
      $data['end_hour'] = "'".$_POST['end_hour']."'";

      if ($con->actualizarRegistro('agenda', $data, $filter)) {
        $response['msg']= 'OK';
      }else {
        $response['msg']= 'No se pudo realizar la actualizacion de los datos';
      }
    }else {
      $response['msg']= 'No se pudo conectar a la base de datos';
    }
  }else {
    $response['msg']= 'No se ha iniciado una sesión';
  }

  echo json_encode($response);

 ?>
