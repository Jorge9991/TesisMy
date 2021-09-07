<?php
require '../../lib/PHPMailer/Exception.php';
require '../../lib/PHPMailer/PHPMailer.php';
require '../../lib/PHPMailer/SMTP.php';
require_once '../conexion/DataBase.php';
include('../correo/correoaprobacionrequisitos.php');
include('../correo/correoaprobacionanteproyecto.php');
include('../correo/correoaprobacionformatosytema.php');
include('../correo/correoaprobaciontesis.php');
include('../correo/correoasignacionjuradoanteproyecto.php');
include('../correo/correoasignacionjuradotesis.php');
include('../correo/correoasignacionparciego.php');
include('../dao/daoCorreo.php');
//envio requisitos
function enviorequisitos($datos){
  requisitoscorreo($datos);  
}
//envio anteproyecto
function envioanteproyecto($datos){
  anteproyectocorreo($datos);  
}
//envio formatos
function envioformatos($datos){
  formatoscorreo($datos);  
}
//envio tesis
function enviotesis($datos){
  tesiscorreo($datos);  
}
//envio jurado anteproyecto
function enviojuradoanteproyecto($datos){
  juradoanteproyectocorreo($datos);  
}
//envio jurado tesis
function enviojuradotesis($datos){
  juradotesiscorreo($datos);  
}
//envio tesis
function envioparciego($datos){
  parciegocorreo($datos);  
}



