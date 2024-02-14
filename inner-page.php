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
  header('Location: chatfree.php');
  exit;
}

$chatCom1 = pegarUsuario($_GET['idCliente'], $conexao);

//$id_user = pegarUsuario($_SESSION['id_cliente'], $conexao);
$id_user1 = PegarPrestador($_SESSION['freeID'], $conexao);

$chatsDados1 = PegarChat($_SESSION['freeID'], $chatCom1['id_cliente'], $conexao);

//   print_r($chatsDados);

if(empty($chatCom1)){
  //  echo  "<script>alert('Pegui')</script>";
  header('Location: chatfree.php');
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>AUTONOMOUS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/perfil.css" rel="stylesheet">
  <link href="assets/css/chat.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
  .received_withd_msg p {
    background: #ebebeb none repeat scroll 0 0 !important;
    border-radius: 3px !important;
    color: #646464 !important;
    font-size: 14px !important;
    margin: 0 !important;
    padding: 5px 10px 5px 12px !important;
    width: 100% !important;
  }
  </style>
</head>

<body>

  <main id="main" class='position-relative'>
    <div class="mesgs position-relative" style="height: 85vh;">
      <div class="msg_history" id="smschat" style="height: 100%;">

        <!--ENTRADA-->
        <?php
        if (!empty($chatsDados1)) {
          foreach ($chatsDados1 as $dadosChat) {
            if ($dadosChat['receber_id'] == $_SESSION['freeID']) {
              ?>
              <div class="incoming_msg position-relative">
                <div class="incoming_msg_img"> <img src="assets/img/<?php echo $chatCom1['img_cliente'] ?>" alt="sunil"> </div>
                <div class="received_msg">
                  <div class="received_withd_msg">
                    <p> <?=$dadosChat['messagem']?></p>
                    <span class="time_date"> <?php echo $dadosChat['criar_tempo']; ?></span></div>
                  </div>
                  <div class="dropdown px-2 position-absolute" style="left: 60%;">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-three-dots-vertical opcoes" style="color: #111 !important; left: 95%; bottom: 1px;"></i>

                    </a>
                    <ul class="dropdown-menu dropdown-menu-white text-small shadow" aria-labelledby="dropdownUser1">
                      <li class="d-none" style="font-weight: bold;"><a class="dropdown-item" href="#" style="font-weight: bold;">
                        Eliminar
                      </a></li>
                      <li>
                        <form action="forms/eliminachat.php" method="post" id="<?=$dadosChat['chat_id']?>">
                          <input type="hidden" name="meuid2" id="meuid2" value="<?=$dadosChat['enviar_id']?>">
                          <input type="hidden" name="minhasms2" id="minhasms2" value="<?=$dadosChat['chat_id']?>">
                          <input type="hidden" name="idPrestador2" id="idPrestador2" value="<?=$dadosChat['receber_id']?>">
                          <button type="submit" name="eliminadele" id="eliminadele" class="btn btn-default">Eliminear</button>
                        </form>
                      </li>

                    </ul>
                  </div>
                </div>
                <?php
              } else{ ?>
                <!--SAIDA-->
                <div class="outgoing_msg position-relative">
                  <div class="sent_msg">
                    <p><?=$dadosChat['messagem']?></p>
                    <span class="time_date"><?php echo $dadosChat['criar_tempo']; ?></span> </div>
                    <div class="dropstart px-2 position-absolute" style="left: 50%; top: 5px;">
                      <a href="#" class="d-flex align-items-center text-white text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical opcoes" style="color: #111 !important; left: 95%; bottom: 1px;"></i>

                      </a>
                      <ul class="dropdown-menu dropdown-menu-white text-small shadow" aria-labelledby="dropdownUser1" style="">
                        <li class="d-none" style="font-weight: bold; z-index: 999 !important;"><a class="dropdown-item" href="#!?recicla=<?=$dadosChat['enviar_id']?>&idEnvia=<?=$dadosChat['chat_id']?>" style="font-weight: bold;">
                          Eliminar
                        </a></li>
                        <li>
                          <form action="forms/eliminachat.php" method="post" class="meuelimina" id="<?=$dadosChat['chat_id']?>">
                            <input type="hidden" name="meuid1" id="meuid1" value="<?=$dadosChat['enviar_id']?>">
                            <input type="hidden" name="minhasms1" id="minhasms1" value="<?=$dadosChat['chat_id']?>">
                            <input type="hidden" name="idPrestador1" id="idPrestador1" value="<?=$dadosChat['receber_id']?>">
                            <button type="submit" name="eliminameu1" id="eliminameu1" class="btn btn-default">Eliminear</button>
                            
                          </form>
                        </li>

                      </ul>
                    </div>
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

        </main><!-- End #main -->

        <!-- Vendor JS Files -->
        <script src="assets/js/jquery-3.5.1.min.js"></script>
        <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/typed.js/typed.min.js"></script>
        <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="assets/js/perfil.js"></script>
        <script src="assets/js/chat.js"></script>

      </body>
      <script>
      $("form").submit(function(event){
      //  event.preventDefault();
        var formData = $(this).serialize();
       // let btnEnvia = $(this).attr("id")
       // alert(formData);
          // Send the AJAX request
  $.ajax({
    type: 'POST',
    url: 'forms/eliminachat.php',
    data: formData,
    success: function(response) {
      // Handle the server's response
    
      console.log(response);
      // Additional actions or UI updates based on the response
    },
    error: function(xhr, status, error) {
      // Handle errors, if any
    
      console.error(error);
    }
  });
      });

      // Attach event listener to form submission
      /*
$('#myForm').submit(function(event) {
  // Prevent default form submission
  event.preventDefault();

  // Serialize the form data
  var formData = $(this).serialize();

  // Send the AJAX request
  $.ajax({
    type: 'POST',
    url: 'your_server_endpoint',
    data: formData,
    success: function(response) {
      // Handle the server's response
      console.log(response);
      // Additional actions or UI updates based on the response
    },
    error: function(xhr, status, error) {
      // Handle errors, if any
      console.error(error);
    }
  });
}); */


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

    </html>
