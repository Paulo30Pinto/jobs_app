<?php
require_once "forms/conectar.php";
mysqli_set_charset($conexao, "utf8");
session_start();

// VERIFICAAÇÃO
if(!isset($_SESSION['logado'])){
  header('Location: index.php');
}
else{

  //DADOS
  $id0 = $_SESSION['freeID'];
  $sql0 = "SELECT * FROM tb_prestador WHERE id_prestador LIKE '$id0'";
  $resultado0 = mysqli_query($conexao, $sql0);
  $dados0 = mysqli_fetch_array($resultado0);
  $meuId = $dados0['id_prestador'];
  //echo json_encode($dados0) . "<br>";
  //  mysqli_close($conexao);

}

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>AUTONOMUS</title>
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
  /*
  if(isset($_SESSION['mensagem'])): ?>

  <script>

  alert('<?php	echo $_SESSION['mensagem']?>');

  </script>

  <?php
endif;
*/
?>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">

    <h1 class="logo me-auto d-flex">
      <div class="dropdown px-2">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="assets/img/<?php echo $dados0['img_prestador']; ?>" width="32" height="32" class="rounded-circle me-2">

        </a>
        <ul class="dropdown-menu dropdown-menu-white text-small shadow" aria-labelledby="dropdownUser1">
          <li style="font-weight: bold;"><a class="dropdown-item" href="#" style="font-weight: bold;">
            <?php echo $dados0['nome_prestador']; ?>
          </a></li>
          <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#alterPerfil">Alterar perfil</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="forms/sair.php">Sair da conta</a></li>
        </ul>
      </div>
      <a href="index_free.php">BIKO</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Inicio</a></li>
          <li><a class="nav-link scrollto" href="#about">Sobre</a></li>
          <li><a class="nav-link scrollto" href="#services">Serviços</a></li>

          <li><a class="nav-link scrollto" href="#team">Comunidade</a></li>
          <li><a class="nav-link scrollto" href="chat_free.php">Chat</a></li>
          <li><a class="nav-link scrollto" href="meu_perfil.php">Meu Perfil</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contacto</a></li>
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
          <h1>BIKO</h1>
          <h2>Encontre aqui os serviços que você procura ou faça parte da nossa comunidade</h2>
          <div class="d-flex justify-content-center justify-content-lg-start d-none">
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
            <p>BIKO, é uma plataforma desenvolvida por angolanos para os angolanos, como o objetivo de
              facilitar o processo de busca e contratação de serviços, com essa platafporma procuramos:

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

    <!-- ======= Why Us Section =======
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
<section id="skills" class="skills">
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

    </div>

    <div class="row">

      <?php
      $sqlBusca = 'SELECT * FROM tb_trabalho WHERE destaque_trabalho > 0 ORDER BY destaque_trabalho DESC LIMIT 8';
      $resultado = mysqli_query($conexao, $sqlBusca);
      // $tarefas = array();
      while ($tarefa = mysqli_fetch_assoc($resultado)) {

        echo "

        <div class='col-6 col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0 my-2 work' data-aos='zoom-in' data-aos-delay='100'>
        <div class='icon-box'>
        <div class='pic'><img src='assets/img/$tarefa[img_categoria]' alt='' class='img-fluid'></div>
        <h4><a href='freelancer_free.php?id=$tarefa[id_trabalho]'>$tarefa[tipo_trabalho]</a></h4>
        <p>$tarefa[descricao_trabalho]</p>
        </div>
        </div>

        ";

      }
      ?>
      <div class="col-12 text-center py-4">
        <a href="#!" class="btn btn-get-started d-none" data-bs-toggle="modal" data-bs-target="#modalLogin">Ver Mais ></a>
        <a href="categoria_free.php" class="btn btn-get-started">Ver Mais ></a>
      </div>
    </div>

  </div>

</section><!-- End Services Section -->

<!-- ======= Team Section ======= -->
<section id="team" class="team section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Comunidade de trabalhadores</h2>
      <!--<p>Faça parte da nossa crescente comunidade.
      Trabalhe do seu jeito,você traz a habilidade e nós vamos facilitar o ganho!</p>-->
    </div>

    <div class="row">

      <?php
      $sqlCategoria = "SELECT * FROM tb_prestador ORDER BY solicitacao DESC LIMIT 4";
      $resulCategoria = mysqli_query($conexao, $sqlCategoria);
      // $tarefas = array();
      while ($categoria = mysqli_fetch_assoc($resulCategoria)) {
        echo "
        <div class='col-lg-6  mt-4 mt-lg-0 my-4' data-aos='zoom-in' data-aos-delay='100' >
        <div class='member d-flex align-items-start'>
        <div class='pic'><img src='assets/img/$categoria[img_prestador]' class='img-fluid' alt=''></div>
        <div class='member-info'>
        <h4>$categoria[nome_prestador]</h4>
        <span>$categoria[categoria_prestador]</span>
        <p>$categoria[descricao_prestador]</p>
        <div class='social'>
        <a href='perfil_free.php?idPerfil=$categoria[id_prestador]'><i class='ri-user-fill'></i></a>
        <a href='#!idPrestador=$categoria[id_prestador]'><i class='bi bi-chat-fill'></i></a>
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
<section id="contact" class="contact">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Assistência</h2>

    </div>

    <div class="row">

      <!--<div class="col-lg-5 d-flex align-items-stretch">
      <div class="info">
      <div class="address d-none">
      <i class="bi bi-geo-alt"></i>
      <h4>Location:</h4>
      <p>A108 Adam Street, New York, NY 535022</p>
    </div>-->
    <div class="col-md-4">
      <div class="email">
        <i class="bi bi-envelope"></i>
        <h4>Email:</h4>
        <p>bikoadmin@gmail.com</p>
      </div>

      <div class="phone">
        <i class="bi bi-phone"></i>
        <h4>Telefone:</h4>
        <p>+244 939 509 434</p>
      </div>

      <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe> -->
    </div>



    <div class="col-md-8 mt-5 mt-lg-0 d-flex align-items-stretch">
      <form action="https://formsubmit.co/cleopatraadryansantos@gmail.com" enctype="multipart/form-data" method="post" role="form" class="php-email-form">

        <div class="row">
          <div class="form-group col-md-6">
            <label for="name">Seu nome</label>
            <input type="text" name="name" class="form-control" id="name" required>
          </div>
          <div class="form-group col-md-6">
            <label for="email">Seu Email</label>
            <input type="email" class="form-control" name="email" id="email" required>
          </div>
        </div>
        <div class="form-group">
          <label for="subject">Tema</label>
          <input type="text" class="form-control" name="subject" id="subject" required>
        </div>
        <div class="form-group">
          <label for="message">Descrição</label>
          <textarea class="form-control" name="message" id="message" rows="10" required></textarea>
        </div>
        <div class="my-3">
          <div class="loading">Enviando</div>
          <div class="error-message"></div>
          <div class="sent-message">A sua mensagem foi enviada, obrigado!</div>
        </div>

        <input type="hidden" name="_next" value="http://localhost/PHP/biko/portfolio-details.html">
        <div class="text-center"><button type="submit" id="assitencia" name="assitencia">Enviar Mensagem</button></div>

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
  <!--
  <div class="footer-top">
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
</div>
-->
<div class="container footer-bottom clearfix">
  <div class="copyright">
    &copy; Copyright <strong><span>E&C</span></strong>.
  </div>
  <div class="credits">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->

  </div>
</div>
</footer><!-- End Footer -->

<div id="preloader" class="d-none"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center d-none"><i class="bi bi-arrow-up-short"></i></a>

<?php

$sqlCategoria = "SELECT * FROM tb_trabalho";
$resulCategoria = mysqli_query($conexao, $sqlCategoria);
// $tarefas = array();

?>
<!--MODAL CADASTRO-->
<div class="modal fade" id="alterPerfil" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Alterar Perfil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="forms/cadastrar.php" enctype="multipart/form-data" method="post" id="formroda">
          <input type="hidden" name="idservi" id="idservi" value="<?php echo $dados0['id_prestador']; ?>">
          <div class="row g-3" >
            <div class="col-6">
              <label for="firstName" class="form-label">Nome</label>
              <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu primeiro e ultimo nome..." value="<?php echo $dados0['nome_prestador']; ?>" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-6">
              <label for="lastName" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Digite Seu email" value="<?php echo $dados0['email_prestador']; ?>" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-6">
              <label for="username" class="form-label">Contacto</label>
              <input type="text" class="form-control" id="contacto" name="contacto" placeholder="digite o seu contato" value="<?php echo $dados0['contacto_prestador']; ?>" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>
            <div class="col-6">
              <label for="lastName" class="form-label">Especialidade</label>
              <input type="text" class="form-control" name="especialidade" id="especialidade" placeholder="Digite sua especialidade" value="<?php echo $dados0['categoria_prestador']; ?>" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-6">
              <label for="username" class="form-label">Endereço</label>
              <input type="text" class="form-control" id="local" name="local" placeholder="Digite seu endereço" value="<?php echo $dados0['endereco_prestador']; ?>" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-6">
              <label for="email" class="form-label">Data de Nacimento</label>
              <input type="date" class="form-control" id="dataFree" name="dataFree" placeholder="data" value="<?php echo $dados0['data_prestador']; ?>">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="col-6">
              <label for="address" class="form-label">Senha</label>
              <input type="password" class="form-control" id="Senha" name="Senha" placeholder="senha" required value="<?php echo $dados0['senha_prestador']; ?>">
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="col-6">
              <label for="address2" class="form-label">Formação Academica</label>
              <input type="text" class="form-control" id="formacao" name="formacao" placeholder="Que curso voce fez" value="<?php echo $dados0['formacao_prestador']; ?>">
            </div>
            <div class="col-6">
              <label for="country" class="form-label">Com o que trabalha?</label>
              <select class="form-select" id="Profissao" name="Profissao" required>
                <option value="">Sua Profição...</option>
                <?php   while ($categoria = mysqli_fetch_assoc($resulCategoria)) {
                  ?>
                  <option value="<?php  echo $categoria['id_trabalho']; ?>"><?php  echo $categoria['tipo_trabalho']; ?></option>
                  <?php
                }
                ?>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>
            <div class="col-6">
              <label for="zip" class="form-label">Imagen</label>
              <input type="file" class="form-control" id="Imagem" name="Imagem" placeholder="Insira a sua Foto de perfil" Value="<?php echo $dados0['img_prestador']; ?>">
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
            <div class="col-12">
              <label for="zip" class="form-label">Descrição</label>

              <textarea name="descricao" id="descricao"  class="form-control" cols="30" rows="3" placeholder="Deixe sua descrição" Value="<?php echo $dados0['descricao_prestador']; ?>"></textarea>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
            <div class="col-12">
              <label for="zip" class="form-label" style="opacity: 0;">Imagen</label>
              <button type="submit" class="btn btn-outline-info w-100" id="alterFree" name="alterFree">Cadastrar</button>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer d-none">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
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
<!--  <script src="assets/vendor/php-email-form/validate.js"></script> -->

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
