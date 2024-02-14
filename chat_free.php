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



// $chatCom = pegarUsuario($_SESSION['id_cliente'], $conexao);
$id_user = PegarPrestador($_SESSION['freeID'], $conexao);
$conversas = TrazConversas($id_user['id_prestador'], $conexao);
// echo "<pre>";
//  print_r($conversas);
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
  <link href="assets/img/itel-logo.png" rel="icon">
  <link href="assets/img/itel-logo.png" rel="apple-touch-icon">

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

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="headind_srch">
        <div class="recent_heading">
          <h4><a href="meu_perfil.php" class="voltar" id="voltar"><i class="bx bx-arrow-back"></i></a></h4>
        </div>
        <div class="srch_bar">
          <div class="stylish-input-group d-none">
            <input type="text" class="search-bar"  placeholder="Search" >
            <span class="input-group-addon">
              <button type="button"> <i class="bi bi-search" aria-hidden="true"></i> </button>
            </span> </div>
          </div>
        </div>
        <div class="inbox_chat">
          <?php
          if(!empty($conversas)){

            foreach($conversas as $conversar){

              $id_1 = $_SESSION['freeID'];
              $id_2 = $conversar['id_cliente'];
              $open = 0;

              $calculo	=	$conexao->prepare('SELECT COUNT(messagem) FROM  chats WHERE receber_id = :id_1 AND enviar_id = :id_2 GROUP BY receber_id ORDER BY chat_id DESC'
            );
            $calculo->execute([':id_1'	=>	$id_1, ':id_2'	=>	$id_2]);
            $contar	=	 $calculo->fetch(PDO::FETCH_ASSOC);
            //  print_r($contar);


            $query	=	$conexao->prepare('SELECT messagem FROM  chats WHERE receber_id = :id_1 AND enviar_id = :id_2 GROUP BY receber_id ORDER BY chat_id DESC'
          );
          $query->execute([':id_1'	=>	$id_1, ':id_2'	=>	$id_2]);
          $dados	=	$query->fetch(PDO::FETCH_ASSOC);
          //  print_r($dados);
          ?>
          <div class="chat_list position-relative" style="" id="idPrestador<?= $conversar['id_cliente']; ?>">
            <a  href="inner-page.php?idCliente=<?=$conversar['id_cliente']; ?>" target="iframe_a" class="chat_people" id="">
              <div class="chat_img"> <img src="assets/img/<?=$conversar['img_cliente']; ?>" alt="sunil"> </div>
              <div class="chat_ib">
                <h5><?= $conversar['nome_cliente']; ?> <span class="chat_date">
                  <?php
                  if(!empty($dados['messagem'])){

                    //  echo  substr($dados['criar_tempo'], 11);
                  }else{
                    echo substr($conversar['ver_tempo'], 11);
                  }


                  ?>
                </span></h5>
                <p>  <?php
                if(!empty($dados['messagem'])){
                  echo $dados['messagem'];

                }else{
                  echo "...";
                }


                ?></p>
              </div>
              <div class="dropdown px-2" style="float: right; margin-top: -15px;">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-three-dots-vertical opcoes" style="color: #cecece !important; left: 95%; bottom: 1px;"></i>

                </a>
                <ul class="dropdown-menu dropdown-menu-white text-small shadow" aria-labelledby="dropdownUser1">
                  <li class="" style="font-weight: bold;"><a class="dropdown-item apagatudo" href="forms/eliminachat.php?dadosMeu=<?= $conversar['id_cliente']; ?>&dadosTeu=<?= $id_user['id_prestador']; ?>" style="font-weight: bold;">
                    Eliminar
                  </a></li>




                </ul>
              </div>
            </a>
          </div>
          <?php

        }
      }


      else{
        ?>
        <div class="alert alert-info alert-dismissible fade show d-none" role="alert">
          <i class="bi bi-chat-dots-fill d-block" style="font-size: 3rem;"></i>
          Sem resposta no momento...
        </div>

        <?php

      }

      ?>
      <div class="chat_list d-none">
        <a href='#' class="chat_people">
          <div class="chat_img"> <img src="assets/img/Pintor.png" alt="sunil"> </div>
          <div class="chat_ib">
            <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
            <p>Test, which is a new approach to have all solutions
              astrology under one roof.</p>
            </div>
          </a>
        </div>

      </div>
    </div>
  </header><!-- End Header -->

  <main id="main" class='' height="100vh" style="min-height: 100vh !important;">

      <article id="sem-sms" class="sem-sms" style="">

      </article>

    <iframe class='d-none' src="chat_free2.php" name="iframe_a" height="100vh" width="100%" title="Iframe Example" style='min-height: 98vh !important;'></iframe>


  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
/**OBJETO HISTORY**/
function hB(){
  window.history.back();
}


function comeco(){
  btnB=document.getElementById("voltar");


  btnB.addEventListener("click", hB);


}
window.addEventListener("load",comeco);
$(".chat_people").click(()=>{
  $("article").addClass("d-none");
  $("iframe").removeClass("d-none");
})



</script>

</html>
