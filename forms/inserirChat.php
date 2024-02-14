<?php

session_start();


if(!isset($_SESSION['logado'])){
  header('Location: ../index.php');
}

include 'conexao.php';
include 'pegarusuario.php';





// if (isset($_POST['mandarsms']) && isset($_SESSION['id_cliente'])){
if (isset($_POST['mandarsms'])) {

  $id_user1 = pegarUsuario($_SESSION['id_cliente'], $conexao);

  $mensagem =  $_POST['messagem'];
  $enviar_id	= $_SESSION['id_cliente'];
  $receber_id = $_POST['receber_id'];

  $sql = "INSERT INTO chats (receber_id, enviar_id, messagem) VALUES(?, ?, ?)";

  $stmt = $conexao->prepare($sql);
  $res = $stmt->execute([$receber_id, $enviar_id, $mensagem]);

  if ($res) {

    $sql2 = "SELECT * FROM conversas WHERE (user_1=? AND user_2=?) OR (user_2=? AND user_1=?)";

    $stmt2 = $conexao -> prepare($sql2);
    $stmt2->execute([$receber_id, $enviar_id, $receber_id, $enviar_id]);

    define('TIMEZONE', 'Africa/Luanda');
    date_default_timezone_set(TIMEZONE);

    $time = date("h:i:s a");

    if ($stmt2->rowCount() == 0) {
      $sql3 = "INSERT INTO conversas (user_1, user_2) VALUES(?, ?)";
      $stmt3 = $conexao->prepare($sql3);
      $stmt3->execute([$receber_id, $enviar_id]);
    }


    echo "

    <div class='outgoing_msg'>
    <div class='sent_msg'>
    <p>".$mensagem."</p>
    <span class='time_date'>".$time."</span> </div>
    <div class='dropdown px-2' style='float: right; margin-top: -15px;'>
    <a href='#' class='d-flex align-items-center text-white text-decoration-none' id='dropdownUser1' data-bs-toggle='dropdown' aria-expanded='false'>
    <i class='bi bi-three-dots-vertical opcoes' style='color: #cecece !important; left: 95%; bottom: 1px;'></i>

    </a>
    <ul class='dropdown-menu dropdown-menu-white text-small shadow' aria-labelledby='dropdownUser1'>
      <li style='font-weight: bold;'><a class='dropdown-item' href='#' style='font-weight: bold;'>
        Eliminar
      </a></li>
    
    </ul>
  </div>
    </div>

    ";


  }

}
// if (isset($_POST['mandarsms']) && isset($_SESSION['id_cliente'])){
if (isset($_POST['smsfree'])) {

  $id_user1 = PegarPrestador($_SESSION['freeID'], $conexao);

  $mensagem =  $_POST['messagem'];
  $enviar_id	= $_SESSION['freeID'];
  $receber_id = $_POST['receber_id'];

  $sql = "INSERT INTO chats (receber_id, enviar_id, messagem) VALUES(?, ?, ?)";

  $stmt = $conexao->prepare($sql);
  $res = $stmt->execute([$receber_id, $enviar_id, $mensagem]);

  if ($res) {

    $sql2 = "SELECT * FROM conversas WHERE (user_1=? AND user_2=?) OR (user_2=? AND user_1=?)";

    $stmt2 = $conexao -> prepare($sql2);
    $stmt2->execute([$receber_id, $enviar_id, $receber_id, $enviar_id]);

    define('TIMEZONE', 'Africa/Luanda');
    date_default_timezone_set(TIMEZONE);

    $time = date("h:i:s a");

    if ($stmt2->rowCount() == 0) {
      $sql3 = "INSERT INTO conversas (user_1, user_2) VALUES(?, ?)";
      $stmt3 = $conexao->prepare($sql3);
      $stmt3->execute([$receber_id, $enviar_id]);
    }


    echo "
    <div class='outgoing_msg'>
    <div class='sent_msg'>
    <p>".$mensagem."</p>
    <span class='time_date'>".$time."</span> </div>
    <div class='dropdown px-2' style='float: right; margin-top: -15px;'>
    <a href='#' class='d-flex align-items-center text-white text-decoration-none' id='dropdownUser1' data-bs-toggle='dropdown' aria-expanded='false'>
    <i class='bi bi-three-dots-vertical opcoes' style='color: #cecece !important; left: 95%; bottom: 1px;'></i>

    </a>
    <ul class='dropdown-menu dropdown-menu-white text-small shadow' aria-labelledby='dropdownUser1'>
      <li style='font-weight: bold;'><a class='dropdown-item' href='#' style='font-weight: bold;'>
        Eliminar
      </a></li>
    
    </ul>
  </div>
    </div>

    ";


  }

}


?>
