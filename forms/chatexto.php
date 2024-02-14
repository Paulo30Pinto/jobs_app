
<?php
session_start();

if(!isset($_SESSION['logado'])){
  header('Location: ../index.php');
}



if(isset($_SESSION['id_cliente'])){
  if (isset($_POST['id_2'])){

    include 'conexao.php';
    include 'pegarusuario.php';

    $id_1 = $_SESSION['id_cliente'];
    $id_2 = $_POST['id_2'];
    $open = 0;

    $pega_usuario = pegarUsuario($id_1, $conexao);
    $pega_prestador = PegarPrestador($id_2, $conexao);



    $sql = "SELECT * FROM  chats WHERE (receber_id=? AND enviar_id=?) ORDER BY chat_id ASC";

    $stmt = $conexao->prepare($sql);
    $stmt->execute([$id_1, $id_2]);

    if($stmt->rowCount() > 0){
      $chats = $stmt->fetchAll();
      foreach ($chats as $chateado) {
        if ($chateado['abrindo'] == 0) {
          $abrir = 1;
          $chat_id = $chateado['chat_id'];

          //	print_r($chat_id);


          $sql2 = "UPDATE chats SET abrindo = ? WHERE chat_id = ?";

          $stmt2 = $conexao->prepare($sql2);
          $stmt2->execute([$abrir, $chat_id]);
          echo "
          <!--MENSSAGEM Q ENTRA -->


          <div class='incoming_msg' >
            <div class='incoming_msg_img'> <img src='assets/img/$pega_prestador[img_prestador]' alt='sunil'> </div>
            <div class='received_msg0>
              <div class='received_withd_msg'>
                <p> $chateado[messagem]</p>
                
                <span class='time_date'> $chateado[criar_tempo]</span>
              </div>
            </div>
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
      //return $chats;
    }else{
      $chats = [];
      return $chats;
    }


  }
}

if(isset($_SESSION['freeID'])){
  if (isset($_POST['id_2'])){
    include 'conexao.php';
    include 'pegarusuario.php';


    $id_1 = $_SESSION['freeID'];
    $id_2 = $_POST['id_2'];
    $open = 0;

    $pega_usuario = pegarUsuario($id_2, $conexao);
    $pega_prestador = PegarPrestador($id_1, $conexao);


    $sql = "SELECT * FROM  chats WHERE (receber_id=? AND enviar_id=?) ORDER BY chat_id ASC";

    $stmt = $conexao->prepare($sql);
    $stmt->execute([$id_1, $id_2]);

    if($stmt->rowCount() > 0){
      $chats = $stmt->fetchAll();
      foreach ($chats as $chateado) {
        if ($chateado['abrindo'] == 0) {
          $abrir = 1;
          $chat_id = $chateado['chat_id'];

          //	print_r($chat_id);


          $sql2 = "UPDATE chats SET abrindo = ? WHERE chat_id = ?";

          $stmt2 = $conexao->prepare($sql2);
          $stmt2->execute([$abrir, $chat_id]);
          echo "
          <!--MENSSAGEM Q ENTRA -->

          <div class='incoming_msg'>
            <div class='incoming_msg_img'> <img src='assets/img/$pega_usuario[img_cliente]' alt='sunil'> </div>
            <div class='received_msg0>
              <div class='received_withd_msg'>
                <p> $chateado[messagem]</p>

                <span class='time_date'> $chateado[criar_tempo]</span>
              </div>

            </div>
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
      //return $chats;
    }else{
      $chats = [];
      return $chats;
    }


  }
}
