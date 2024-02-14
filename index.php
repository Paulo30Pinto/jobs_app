<?php
require_once "forms/conectar.php";
mysqli_set_charset($conexao, "utf8");
session_start();

?>



<!DOCTYPE html>
<html lang="pt-br">
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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <?php
  //SESSÂO

  if(isset($_SESSION['mensagem'])): ?>

  <script>

  alert('<?php	echo $_SESSION['mensagem']; ?>');

  </script>
  <?php
endif;
session_unset();
session_destroy();
?>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center position-relative">

    <h1 class="logo me-auto">
    <img src="assets/img/itel-logo.png" alt="" width="100" height="" class="img-fluid position-absolute" style="min-height: 100px; top: -1em; left: -1em;">
    <a href="index.php" style="margin-left: 55px;">autonomous</a></h1>

    <!-- Uncomment below if you prefer to use an image logo -->


    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto active" href="#hero">Inicio</a></li>
        <li><a class="nav-link scrollto" href="#about">Sobre</a></li>
        <li><a class="nav-link scrollto" href="#services">Serviços</a></li>

        <li><a class="nav-link scrollto" href="#team">Comunidade</a></li>
        <!-- <li><a class="nav-link scrollto" href="#contact">Contacto</a></li> -->
        <li><a class="d-none getstarted scrollto" href="#about">Pesquisar</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
        <h1>AUTONOMOUS</h1>
        <h2>Encontre aqui os serviços que você procura ou faça parte da nossa comunidade</h2>
        <div class="d-flex justify-content-center justify-content-lg-start">
          <a href="#" class="btn-get-started scrollto" data-bs-toggle="modal" data-bs-target="#modalLogin">Iniciar Sessão</a>
          <a href="#" class="btn-get-started scrollto mx-1" data-bs-toggle="modal" data-bs-target="#modalCadastro"><span>Cadastrar-se</span></a>
        </div>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
        <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>

</section><!-- End Hero -->

<main id="main">

  <!-- ======= About Us Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Sobre Nós</h2>
      </div>

      <div class="row content">
        <div class="col-lg-6">
          <p>
            Autonomous, é uma plataforma desenvolvida por angolanos para os angolanos, com o objetivo de facilitar
            o processo de busca e contratação de serviços, com essa platafporma procuramos:
          </p>
          <ul>
            <li><i class="ri-check-double-line"></i> Aumentar o alcance dos trabalhadores autónomos</li>
            <li><i class="ri-check-double-line"></i> Facilitar a busca por serviços</li>
            <li><i class="ri-check-double-line"></i> Aumentar o número de oportunidades para os trabalhadores</li>
          </ul>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0">
          <p>

          </p>

        </div>
      </div>

    </div>
  </section><!-- End About Us Section -->

  <!--======= Why Us Section =======
  <section id="why-us" class="why-us section-bg">
  <div class="container-fluid" data-aos="fade-up">

  <div class="row">

  <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

  <div class="content">
  <h3>Eum ipsam laborum deleniti <strong>velit pariatur architecto aut nihil</strong></h3>
  <p>
  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
</p>
</div>

<div class="accordion-list">
<ul>
<li>
<a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
<div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
<p>
Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
</p>
</div>
</li>

<li>
<a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
<div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
<p>
Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
</p>
</div>
</li>

<li>
<a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
<div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
<p>
Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
</p>
</div>
</li>

</ul>
</div>

</div>

<div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("assets/img/why-us.png");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
</div>

</div>
</section> End Why Us Section -->

<!-- ======= Skills Section ======= -->
<section id="skills" class="skills d-none">
  <div class="container" data-aos="fade-up">

    <div class="row">
      <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
        <img src="assets/img/skills.png" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
        <h3>Categorias de serviços mais procurados</h3>
        <p class="fst-italic">



        </p>

        <div class="skills-content">
          <?php
          $sqlBusca = 'SELECT * FROM tb_trabalho WHERE destaque_trabalho > 0 ORDER BY destaque_trabalho DESC LIMIT 4';
          $resultado = mysqli_query($conexao, $sqlBusca);
          // $tarefas = array();
          while ($tarefa = mysqli_fetch_assoc($resultado)) {
            echo "
            <div class='progress'>
            <span class='skill'>$tarefa[tipo_trabalho]<i class='val'>$tarefa[destaque_trabalho]%</i></span>
            <div class='progress-bar-wrap'>
            <div class='progress-bar' role='progressbar' aria-valuenow='$tarefa[destaque_trabalho]' aria-valuemin='0' aria-valuemax='$tarefa[destaque_trabalho]'></div>
            </div>
            </div>
            ";
          }
          ?>

        </div>

      </div>
    </div>

  </div>
</section><!-- End Skills Section -->

<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Serviços</h2>
      <p>Encontre os serviços que você procura com apenas alguns clique</p>
    </div>

    <div class="row">

      <?php
      $sqlBusca = 'SELECT * FROM tb_trabalho WHERE destaque_trabalho > 0 ORDER BY destaque_trabalho DESC LIMIT 8';
      $resultado = mysqli_query($conexao, $sqlBusca);
      // $tarefas = array();
      while ($tarefa = mysqli_fetch_assoc($resultado)) {

        echo "

        <div class='col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0 my-2 work' data-aos='zoom-in' data-aos-delay='100'>
        <div class='icon-box' data-bs-toggle='modal' data-bs-target='#modalLogin'>
        <div class='pic'><img src='assets/img/$tarefa[img_categoria]' alt='' class='img-fluid'></div>
        <h4><a href='#!'>$tarefa[tipo_trabalho]</a></h4>
        <p>$tarefa[descricao_trabalho]</p>
        </div>
        </div>

        ";

      }
      ?>
      <div class="col-12 text-center py-4">
        <a href="#!" class="btn btn-get-started" data-bs-toggle="modal" data-bs-target="#modalLogin">Ver Mais ></a>
        <a href="categoria.php" class="d-none btn btn-get-started">Ver Mais ></a>
      </div>
    </div>

  </div>

</section><!-- End Services Section -->

<!-- ======= Team Section ======= -->
<section id="team" class="team section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Comunidade de Trabalhadores</h2>
      <p>Faça parte da nossa crescente comunidade.
        Trabalhe do seu jeito, você traz a habilidade e nós vamos facilitar o ganho!</p>
      </div>

      <div class="row">

        <?php
        $sqlCategoria = "SELECT * FROM tb_prestador ORDER BY solicitacao DESC LIMIT 4";
        $resulCategoria = mysqli_query($conexao, $sqlCategoria);
        // $tarefas = array();
        while ($categoria = mysqli_fetch_assoc($resulCategoria)) {
          echo "
          <div class='col-lg-6  mt-4 mt-lg-0 my-4' data-aos='zoom-in' data-aos-delay='100'>
          <div class='member d-flex align-items-start'>
          <div class='pic'><img src='assets/img/$categoria[img_prestador]' class='img-fluid' alt=''></div>
          <div class='member-info'>
          <h4>$categoria[nome_prestador]</h4>
          <span>$categoria[categoria_prestador]</span>
          <p>$categoria[descricao_prestador]</p>
          <div class='social'>
          <a href='#' data-bs-toggle='modal' data-bs-target='#modalLogin'><i class='ri-user-fill'></i></a>
          <a href='#' data-bs-toggle='modal' data-bs-target='#modalLogin'><i class='bi bi-chat-fill'></i></a>
          <a href='' class='d-none'><i class='ri-instagram-fill'></i></a>
          <a href='' class='d-none'> <i class='ri-linkedin-box-fill'></i> </a>
          </div>
          </div>
          </div>
          </div>
          ";
        }
        ?>



      </div>

    </div>
  </section><!-- End Team Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact d-none">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Assistência</h2>
      </div>

      <div class="row">

        <!-- <div class="col-lg-5 d-flex align-items-stretch">
        <div class="info">
        <div class="address">
        <i class="bi bi-geo-alt"></i>
        <h4>Location:</h4>
        <p>A108 Adam Street, New York, NY 535022</p>
      </div>-->

      <div class="email">
        <i class="bi bi-envelope"></i>
        <h4>Email:</h4>
        <p>autonomousadmin@gmail.com</p>
      </div>

      <div class="phone">
        <i class="bi bi-phone"></i>
        <h4>Telefone:</h4>
        <p>+244 939 509 434</p>
      </div>

      <!--<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
    -->
  </div>

</div>

<div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
  <form action="forms/contact.php" method="post" role="form" class="php-email-form">
    <div class="row">
      <div class="form-group col-md-6">
        <label for="name">Nome</label>
        <input type="text" name="name" class="form-control" id="name" required>
      </div>
      <div class="form-group col-md-6">
        <label for="name">Email</label>
        <input type="email" class="form-control" name="email" id="email" required>
      </div>
    </div>
    <div class="form-group">
      <label for="name">Tema</label>
      <input type="text" class="form-control" name="subject" id="subject" required>
    </div>
    <div class="form-group">
      <label for="name">Mensagem</label>
      <textarea class="form-control" name="message" rows="10" required></textarea>
    </div>
    <div class="my-3">
      <div class="loading">Enviando</div>
      <div class="error-message"></div>
      <div class="sent-message">A sua mensagem foi enviada, obrigado!</div>
    </div>
    <div class="text-center"><button type="submit" data-bs-toggle="modal" data-bs-target="#modalLogin">Enviar Mensagem</button></div>
  </form>
</div>

</div>

</div>
</section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

  <div class="footer-newsletter d-none">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <h4>Join Our Newsletter</h4>
          <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
          <form action="" method="post">
            <input type="email" name="email"><input type="submit" value="Subscribe">
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--<div class="footer-top">
  <div class="container">
  <div class="row">

  <div class="col-lg-3 col-md-6 footer-contact">
  <h3>Arsha</h3>
  <p>
  A108 Adam Street <br>
  New York, NY 535022<br>
  United States <br><br>
  <strong>Phone:</strong> +1 5589 55488 55<br>
  <strong>Email:</strong> info@example.com<br>
</p>
</div>

<div class="col-lg-3 col-md-6 footer-links">
<h4>Useful Links</h4>
<ul>
<li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
<li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
<li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
<li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
<li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
</ul>
</div>

<div class="col-lg-3 col-md-6 footer-links">
<h4>Our Services</h4>
<ul>
<li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
<li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
<li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
<li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
<li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
</ul>
</div>

<div class="col-lg-3 col-md-6 footer-links">
<h4>Our Social Networks</h4>
<p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
<div class="social-links mt-3">
<a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
<a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
<a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
<a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
<a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
</div>
</div>

</div>
</div>
</div>-->

<div class="container footer-bottom clearfix">
  <div class="copyright">
    &copy; Copyright <strong><span>E&C</span></strong>. All Rights Reserved
  </div>
  <div class="credits">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
    Designed by <a href="https://bootstrapmade.com/">E&C</a>
  </div>
</div>
</footer><!-- End Footer -->

<div id="preloader" class="d-none"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center d-none"><i class="bi bi-arrow-up-short"></i></a>



<!-- Modal LOGIN-->
<div class="modal fade" id="modalLogin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">

        <h1 class="modal-title fs-5" id="staticBackdropLabel">Por favor inicie sua sessão</h1>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body text-center" id="iniLog">
        <div class="d-flex justify-content-center justify-content-lg-center">
          <a href="#" class="btn-get-started scrollto" id="clinteForm">Como Clinte</a>
          <a href="#" class="btn-get-started scrollto mx-1" id="prestForm"><span>Como Prestador</span></a>
        </div>
      </div>

      <!--LOGIN CLIENTE-->
      <form action="forms/login.php" enctype="multipart/form-data" method="post" class="text-center d-none" id="LoginCli">
        <div class="modal-body">

          <img class="mb-4" src="assets/img/iconusuario.png" alt="" width="72" height="57">
          <h1 class="h3 mb-3 fw-normal">Logar-se</h1>

          <div class="form-floating py-2">
            <input type="text" class="form-control" id="loginome" name="loginome" placeholder="Seu nome" required>
            <label for="loginome">Nome</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" name='senhalogin' id="senhalogin" placeholder="Password" required>
            <label for="senhalogin">Password</label>
          </div>

          <div class="checkbox mb-3 my-2 text-start">
            <a href="#" class="nav-link text-primary d-none">Esqueci minha senha</a>
          </div>

          <p class="mt-5 mb-3 text-muted text-center d-flex align-items-center justify-content-center">&copy; Não tem uma conta?  <a href="#" id="btn-registraP" data-bs-toggle="modal" data-bs-target="#modalCadastro" class="p-1 nav-link btn-registra text-primary">Registrar-se!</a></p>

        </div>
        <div class="modal-footer">
          <button class="w-100 btn btn-get-started" name='entraLogin' id='entraLogin' type="submit">Iniciar Sessão</button>
        </div>
      </form>

      <!--LOGIN PRESTADOR-->
      <form action="forms/login.php" enctype="multipart/form-data" method="post" class="text-center d-none" id="LoginPresta">
        <div class="modal-body">

          <img class="mb-4" src="assets/img/iconusuario.png" alt="" width="72" height="57">
          <h1 class="h3 mb-3 fw-normal">Entrar</h1>

          <div class="form-floating py-2">
            <input type="text" class="form-control" id="loginomeP" name='loginomeP' placeholder="Seu nome" required>
            <label for="floatingInput">Seu Nome</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="senhaloginP" name='senhaloginP' placeholder="Password" required>
            <label for="floatingPassword">Password</label>
          </div>

          <div class="checkbox mb-3 my-2 text-start">
            <a href="#" class="nav-link text-primary d-none">Esqueci minha senha</a>
          </div>

          <p class="mt-5 mb-3 text-muted text-center d-flex align-items-center justify-content-center">&copy; Não tem uma conta?  <a href="#" id="btn-registraP" data-bs-toggle="modal" data-bs-target="#modalCadastro" class="p-1 nav-link btn-registra text-primary">Registrar-se</a></p>

        </div>
        <div class="modal-footer">
          <button class="w-100 btn btn-get-started" name='loginEntra' id='loginEntra' type="submit">Entrar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal CADASTRO-->
<div class="modal fade" id="modalCadastro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Por favor faça o seu cadastro</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body text-center" id="escolheCad">
        <div class="d-flex justify-content-center justify-content-lg-center">
          <a href="#" class="btn-get-started scrollto" id="cliForm">Como Clinte</a>
          <a href="#" class="btn-get-started scrollto mx-1" id='preForm'><span>Como Prestador</span></a>
        </div>
      </div>

      <!--Cadastro Cliente-->
      <form action="forms/cadastrar.php" enctype="multipart/form-data" method="post" class="text-center d-none" id='formCliCad'>
        <div class="modal-body" id='modal-body' style='max-height: 60vh !important; overflow-y: auto !important;'>

          <img class="mb-4" src="assets/img/iconusuario.png" alt="" width="72" height="57">
          <h1 class="h3 mb-3 fw-normal">Faça o seu cadastro</h1>

          <div class="row g-3 text-start">
            <div class="col-md-6">
              <label for="nome" class="form-label">Nome</label>
              <input type="text" class="form-control" name='nome' id="nome" placeholder='seu nome' required>
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder='seu email' required>
            </div>
            <div class="col-md-6">
              <label for="telefone" class="form-label">Contacto</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon1">+244</span>
                <input type="text" class="form-control" name="telefone" id="telefone" placeholder="numero" aria-label="Username" aria-describedby="basic-addon1" maxlength="9">
              </div>
            </div>
            <div class="col-md-6">
              <label for="endereco" class="form-label">Endereço</label>
              <input type="text" class="form-control" name='endereco' id="endereco" placeholder="Endereço">
            </div>
            <div class="col-md-6">
              <label for="dataNace" class="form-label">Data</label>
              <input type="date" max="2005-01-01" min="1975-01-01"  class="form-control" id="dataNace" name="dataNace" required>
            </div>
            <div class="col-md-6">
              <label for="senha" size="" class="form-label">Senha</label>
              <input type="password" minlength="4" class="form-control" name='senha' id="senha" placeholder='Sua senha' required>
            </div>
            <div class="col-md-6">
              <label for="inputState" class="form-label d-block">Genero</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="genero" id="generoM" value="1">
                <label class="form-check-label" for="generoM">Masculino</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="genero" id="generoF" value="0">
                <label class="form-check-label" for="generoF">Femenino</label>
              </div>
            </div>

            <div class="col-6">
              <label for="imagen" class="form-label">Imagem</label>
              <input type="file" class="form-control" name='imagen' id="imagen" placeholder='sua imagen' required>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button class="w-100 btn btn-get-started" name='clientCad' id='clientCad' type="submit">Cadastrar-se</button>
        </div>
      </form>


      <!--Cadastro Prestador-->
      <form action="forms/cadastrar.php" enctype="multipart/form-data" method="post" class="text-center d-none" id='formPreCad'>
        <?php

        $sqlCategoria = "SELECT * FROM tb_trabalho";
        $resulCategoria = mysqli_query($conexao, $sqlCategoria);
        // $tarefas = array();

        ?>
        <div class="modal-body" id='modal-body' style='max-height: 60vh !important; overflow-y: auto !important;'>

          <img class="mb-4" src="assets/img/iconusuario.png" alt="" width="72" height="57">
          <h1 class="h3 mb-3 fw-normal">Faça o seu cadastro</h1>

          <div class="row g-3 text-start">
            <div class="col-md-6">
              <label for="nome" class="form-label">Nome</label>
              <input type="text" class="form-control" name='nome' id="nome" placeholder='seu nome' required>
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder='seu email' required>
            </div>
            <div class="col-md-6">
              <label for="contacto" class="form-label">Contacto</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon1">+244</span>
                <input type="text" class="form-control" maxlength="9" name="contacto" id="contacto" placeholder="numero" aria-label="Username" aria-describedby="basic-addon1">
              </div>
            </div>
            <div class="col-md-6">
              <label for="local" class="form-label">Endereço</label>
              <input type="text" class="form-control" name='local' id="local" placeholder="Sua morada">
            </div>
            <div class="col-md-6">
              <label for="dataFree" class="form-label">Data</label>
              <input type="date" max="2005-01-01" min="1975-01-01" class="form-control" id="dataFree" name="dataFree">
            </div>
            <div class="col-md-6">
              <label for="especialidade" class="form-label">Especialidade</label>
              <input type="text" class="form-control" name='especialidade' id="especialidade" placeholder="Sua especialidade">
            </div>
            <div class="col-md-6">
              <label for="forma" class="form-label">Formação</label>
              <input type="text" class="form-control" id="forma" name="forma" placeholder="Formação proficional ou academica">
            </div>
            <div class="col-md-6">
              <label for="Profissao" class="form-label">Tipo de Trabalho</label>
              <select class="form-select" id="Profissao" name="Profissao" required>
                <option value="">Sua Profição...</option>
                <?php   while ($categoria = mysqli_fetch_assoc($resulCategoria)) {
                  ?>
                  <option value="<?php  echo $categoria['id_trabalho']; ?>"><?php  echo $categoria['tipo_trabalho']; ?></option>
                  <?php
                }
                ?>
              </select>
            </div>
            <div class="col-md-6">
              <label for="Senha" class="form-label">Senha</label>
              <input type="password" minlength="4" class="form-control" name='Senha' id="Senha" placeholder='Sua senha'>
            </div>
            <div class="col-md-6">
              <label for="senha" class="form-label">Repetir a senha</label>
              <input type="password" size="9" minlength="4" class="form-control" name='senha1' id="senha1" placeholder='Sua senha'>
            </div>
            <div class="col-md-6">
              <label for="inputState" class="form-label d-block">Genero</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="genero" id="generoM1" value="1">
                <label class="form-check-label" for="generoM1">Masculino</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="genero" id="generoF1" value="0">
                <label class="form-check-label" for="generoF1">Femenino</label>
              </div>
            </div>

            <div class="col-6">
              <label for="imagen" class="form-label">Imagem</label>
              <input type="file" class="form-control" name='imagen' id="imagen" placeholder='sua imagen' required>
            </div>
            <div class="col-12">
              <label for="descricao" class="form-label">Descrição</label>
              <textarea class="form-control" name="descricao" id="descricao" cols="1" rows="5" placeholder="Fale um pouco sobre suas suas ablidades..."></textarea>
            </div>


          </div>
        </div>
        <div class="modal-footer">
          <button class="w-100 btn btn-get-started" name='cadeFree' id='cadeFree' type="submit">Cadastrar-se</button>
        </div>
      </form>
    </div>
  </div>
</div>



</body>
<!-- Vendor JS Files -->
<script src="assets/js/jquery-3.5.1.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script src="assets/js/index.js"></script>
<script>
// var servico = "pesquisar.php?prestador";

/*   $("#entraLogin").on("click", function(event){
event.preventDefault();
let nomeCli = $("#loginome").val();
let senhaCli = $("#senhalogin").val();
//  alert(senhaCli);
$.post("forms/login.php",
{
loginome: nomeCli,
senhalogin: senhaCli
},
function(data, status){
// $("#tudo").html(data);
alert(status);

}
);



}) */
</script>

</html>
