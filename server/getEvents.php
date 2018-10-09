<?php
  require('./conector.php');

  session_start();

  if (isset($_SESSION['user_id'])) {
    $con = new ConectorBD('localhost', 'agenda_db', '123456');
    if ($con->initConexion('agenda_db')=='OK') {
      $resultado = $con->getAgendaUser($_SESSION['user_id']);
      $i=0;
      $response_array = [];
      while ($fila = $resultado->fetch_assoc()) {
        $response_one['id'] = $fila['id'];
        $response_one['title'] = $fila['titulo'];
        $response_one['start'] = $fila['start_date']."T".$fila['start_hour'];
        $response_one['end'] = $fila['end_hour']."T".$fila['end_date'];
        array_push($response_array,$response_one);
      }
      $response['msg']= 'OK';
      $response['eventos'] = $response_array;
    }else {
      $response['msg']= 'No se pudo conectar a la base de datos';
    }
  }else {
    $response['msg']= 'No se ha iniciado una sesión';
  }

  echo json_encode($response);


 ?>

