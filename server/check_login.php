<?php


  require('./conector.php');

  $con = new ConectorBD('localhost','agenda_db','123456');

  $response['conexion'] = $con->initConexion('agenda_db');

  if ($response['conexion']=='OK') {
    $resultado_consulta = $con->consultar(['usuarios'],
    ['id','username', 'password'], 'WHERE username="'.$_POST['username'].'"');

    if ($resultado_consulta->num_rows != 0) {
      $fila = $resultado_consulta->fetch_assoc();
      if (password_verify($_POST['password'], $fila['password'])) {
        $response['msg'] = 'OK';
        session_start();
        $_SESSION['user_id']=$fila['id'];
      }else {
        $response['msg'] = 'Contraseña incorrecta';
      }
    }else{
      $response['msg'] = 'Email incorrecto';
    }
  }
  header('Content-Type: application/json');
  echo json_encode($response);

  $con->cerrarConexion();




 ?>
