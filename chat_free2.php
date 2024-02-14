<?php

session_start();

// VERIFICAAÇÃO
if(!isset($_SESSION['logado'])){
  header('Location: index.php');
}

include 'forms/conexao.php';
include 'forms/pegarusuario.php';
include 'forms/conversas.php';
include 'forms/tempo.php';

if(!isset($_GET['idCliente'])){
  //  echo  "<script>alert('Pegui')</script>";
  header('Location: chat_free.php');
  exit;
}

$chatCom1 = pegarUsuario($_GET['idCliente'], $conexao);

//$id_user = pegarUsuario($_SESSION['id_cliente'], $conexao);
$id_user1 = PegarPrestador($_SESSION['freeID'], $conexao);

$chatsDados1 = PegarChat($_SESSION['freeID'], $chatCom1['id_cliente'], $conexao);

//   print_r($chatsDados);

if(empty($chatCom1)){
  //  echo  "<script>alert('Pegui')</script>";
  header('Location: chat_free.php');
  exit;
}
?>


<div class="mesgs position-relative">
  <div class="msg_history" id="smschat">

    <!--ENTRADA-->
    <?php
    if (!empty($chatsDados1)) {
      foreach ($chatsDados1 as $dadosChat) {
        if ($dadosChat['receber_id'] == $_SESSION['freeID']) {
          ?>
          <div class="incoming_msg">
            <div class="incoming_msg_img"> <img src="assets/img/<?php echo $chatCom1['img_cliente'] ?>" alt="sunil"> </div>
            <div class="received_msg">
              <div class="received_withd_msg">
                <p> <?=$dadosChat['messagem']?></p>

                <span class="time_date"> <?php echo $dadosChat['criar_tempo']; ?></span></div>
              </div>

            </div>
            <?php
          } else{ ?>
            <!--SAIDA-->
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p><?=$dadosChat['messagem']?> </p>
                <span class="time_date"><?php echo $dadosChat['criar_tempo']; ?></span> </div>
              </div>

              <?php      }
            }
            ?>







            <?php
          }else{
            echo"
            <div class='alert alert-info alert-dismissible fade show d-none' role='alert'>
            <i class='bi bi-chat-dots-fill d-block' style='font-size: 3rem;'></i>
            Sem mensages no momento...
            </div>

            ";
          }
          ?>



        </div>
        <form action="forms/inserirChat.php" method="post" entype="multipart/form-data" id="formChat" class='position-absolute left-0' style='min-width: 90%; top: 89vh;'>
          <input type="hidden" name="idcliente" id="idcliente" value="<?php echo "$chatCom1[id_cliente]"; ?>">
          <div class="type_msg">
            <div class="input_msg_write">
              <input type="text" name="escrevesms" id="escrevesms" class="write_msg" placeholder="Type a message" />
              <button class="msg_send_btn" type="submit" name="smsfree" id="smsfree"><i class="bx bxs-paper-plane" aria-hidden="true"></i></button>
            </div>
          </div>
        </form>

      </div>

      <script>

      let fechData = function(){
        $.post("forms/chatexto.php",
        {
          id_2:  <?=$chatCom1['id_cliente']?>
        },
        function(data, status){

          $("#smschat").append(data);
          if (data != "") roralBaixo();

        }
      );
    }

    fechData();
    setInterval(fechData, 1000);

    

    </script>
