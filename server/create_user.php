<?php

  include('conector.php');

  $data['name'] = "'Alejandro'";
  $data['lastname'] = "'Soto'";
  $data['username'] = "'asotopaez@gmail.com'";
  $data['password'] = "'".password_hash('123456', PASSWORD_DEFAULT)."'";


  $data2['name'] = "'usuario1'";
  $data2['lastname'] = "'uno'";
  $data2['username'] = "'usuario1@gmail.com'";
  $data2['password'] = "'".password_hash('123456', PASSWORD_DEFAULT)."'";


  $data3['name'] = "'usuario2'";
  $data3['lastname'] = "'dos'";
  $data3['username'] = "'usuario2@gmail.com'";
  $data3['password'] = "'".password_hash('123456', PASSWORD_DEFAULT)."'";

  $con = new ConectorBD('localhost','agenda_db','123456');
  $response['conexion'] = $con->initConexion('agenda_db');

  if ($response['conexion']=='OK') {
    if($con->insertData('usuarios', $data)){
      $response['msg']="exito en la inserción 1".$data;
    }else {
      $response['msg']= "Hubo un error y los datos no han sido cargados";
    }

    if($con->insertData('usuarios', $data2)){
      $response['msg']="exito en la inserción".$data2;
    }else {
      $response['msg']= "Hubo un error y los datos no han sido cargados";
    }

    if($con->insertData('usuarios', $data3)){
      $response['msg']="exito en la inserción".$data3;
    }else {
      $response['msg']= "Hubo un error y los datos no han sido cargados";
    }
  }else {
    $response['msg']= "No se pudo conectar a la base de datos";
  }

  echo json_encode($response);


 ?>
