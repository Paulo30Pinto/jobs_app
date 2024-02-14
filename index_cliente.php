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
  $id0 = $_SESSION['id_cliente'];
  $sql0 = "SELECT * FROM tb_cliente WHERE id_cliente = '$id0'";
  $resultado0 = mysqli_query($conexao, $sql0);
  $dados0 = mysqli_fetch_array($resultado0);

  //echo json_encode($dados0) . "<br>";
  //  mysqli_close($conexao);

}

$pestador1 = "SELECT * FROM tb_prestador LIMIT 1";
$prestadorResult = mysqli_query($conexao, $pestador1);
$soUm = mysqli_fetch_array($prestadorResult);
//echo $soUm['id_prestador'] . "<br>";
/*
while ($soUm = mysqli_fetch_array($prestadorResult)) {
# code...
echo $soUm['id_prestador'] . "<br>";
}

*/


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
      <div class="dropdown px-2 d-none">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="assets/img/<?php echo $dados0['img_cliente']; ?>" width="32" height="32" class="rounded-circle me-2">

        </a>
        <ul class="dropdown-menu dropdown-menu-white text-small shadow" aria-labelledby="dropdownUser1">
          <li style="font-weight: bold;"><a class="dropdown-item" href="#" style="font-weight: bold;">
            <?php echo $dados0['nome_cliente']; ?>
          </a></li>
          <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#alterPerfil">Editar perfil</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="forms/sair.php">Sair da conta</a></li>
        </ul>
      </div>
      <a href="index_cliente.php">AUTONOMOUS</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Inicio</a></li>
          <li><a class="nav-link scrollto" href="#about">Sobre</a></li>
          <li><a class="nav-link scrollto" href="#services">Serviços</a></li>

          <li><a class="nav-link scrollto" href="#team">Comunidade</a></li>
          <li><a class="nav-link scrollto" href="chat.php?idPrestador=<?=$soUm['id_prestador']?>">Chat</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contacto</a></li>
          <li><a href="#" class="d-flex align-items-center text-white text-decoration-none" id="navbarSideCollapse" aria-label="Toggle navigation" aria-expanded="false">
            <img src="assets/img/<?php echo $dados0['img_cliente']; ?>" width="32" height="32" class="rounded-circle me-2">

          </a></li>
          <li class="d-none"><a class="getstarted scrollto navbar-toggler" type="button" id="navbarSideCollapse" aria-label="Toggle navigation" href="#!">Perfil</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
    <!-- =======MENU LATERAL======= -->
    <div class="navbar-collapse offcanvas-collapse" id="latMenu">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0 py-4">
        <h5>Dados Pessoais</h5>
        <li class="nav-item" style="">
          <img src="assets/img/<?php echo $dados0['img_cliente']; ?>" width="32" height="32" class="rounded-circle me-2"> <a class="nav-link active d-inline" aria-current="page" href="#"><b><?php echo $dados0['nome_cliente']; ?></b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><b>Telefone: </b><?php echo $dados0['numero_cliente']; ?> </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><b>Email: </b><?php echo $dados0['email_cliente']; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><b>Morada: </b><?php echo $dados0['endereco_cliente']; ?></a>
        </li>
      </ul>
      <hr>
      <div style="max-height: 40vh !important; overflow-y: auto;">
        <table class="table">
          <thead style="opacity: 0;">
            <tr>
              <th scope="col">#</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Handle</th>
            </tr>
          </thead>
          <tbody class="text-light">
            <label for="">Serviços Solicitado</label>
            <?php

            // $tarefas = array();

            $cliSolicita = "SELECT tb_solicitacao.solicitado, tb_solicitacao.pedido_aceite, tb_prestador.nome_prestador, tb_prestador.categoria_prestador, tb_prestador.img_prestador, tb_prestador.id_prestador  FROM tb_solicitacao INNER JOIN tb_prestador ON tb_solicitacao.id_prestador=tb_prestador.id_prestador AND tb_solicitacao.id_cliente = $id0 WHERE tb_solicitacao.solicitado = 1 GROUP BY tb_solicitacao.id_prestador";

            //  $cliSolicita = "SELECT tb_solicitacao.solicitado, tb_prestador.nome_prestador, tb_prestador.categoria_prestador, tb_prestador.img_prestador  FROM tb_solicitacao INNER JOIN tb_prestador ON tb_solicitacao.id_prestador=tb_prestador.id_prestador";

            $resulSolicita = mysqli_query($conexao, $cliSolicita);
            // $tarefas = array();
            while ($solicitei = mysqli_fetch_assoc($resulSolicita)) {
              // print_r($solicitei);
              //var_dump($solicitei)
              ?>
              <tr>
                <th scope="row">
                  <a href="perfil.php?idPerfil=<?= $solicitei['id_prestador']; ?>">
                    <img src="assets/img/<?= $solicitei['img_prestador']; ?>" alt="" width="30px" height="30px" class="rounded-circle">
                  </a>
                </th>
                <td>
                  <a href="perfil.php?idPerfil=<?= $solicitei['id_prestador']; ?>"  class="nav-link">
                    <?= $solicitei['nome_prestador']; ?><br>
                    <?php if($solicitei['pedido_aceite'] == 1){

                      ?>

                      <span class="badge border-success border-1 text-success" style="opacity: 0.4">pedido aceite</span>
                      <?php } ?>
                    </a>
                  </td>
                  <td>
                    <a href="perfil.php?idPerfil=<?= $solicitei['id_prestador']; ?>" class="nav-link">
                      <?= $solicitei['categoria_prestador']; ?>
                    </a>
                  </td>
                  <td><a href="forms/cadastrar.php?cansol=<?= $solicitei['id_prestador']; ?>&cliId=<?=$dados0['id_cliente'];?>">Cancelar</a></td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
        <div class="row mb-3">
          <div class="col-6 themed-grid-col">
            <button class="btn btn-get-started" data-bs-toggle="modal" data-bs-target="#alterPerfil">Editar Perfil</button>
          </div>
          <div class="col-6 themed-grid-col text-end">
            <a href="forms/sair.php" class="btn btn-get-started">Sair da conta</a>
          </div>
        </div>

      </div><!--FECHAR MENU LATERAL-->
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

      <div class="container">
        <div class="row">
          <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
            <h1>AUTONOMOUS</h1>
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
              <p>
                Autonomous, é uma plataforma desenvolvida por angolanos para os angolanos, como o objetivo de facilitar o processo de busca e contratação de serviços, com essa platafporma procuramos:
              </p>
              <ul>
                <li><i class="ri-check-double-line"></i> Aumentar o alcance dos trabalhadores autónomos</li>
                <li><i class="ri-check-double-line"></i> Facilitar a busca por serviços</li>
                <li><i class="ri-check-double-line"></i> Aumentar o número de oportunidades para os trabalhadores</li>
              </ul>
            </div>
            <!--
            <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
            culpa qui officia deserunt mollit anim id est laborum.
          </p>

        </div> -->
      </div>

    </div>
  </section><!-- End About Us Section -->



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
        <p>Encontre o serviço perfeito para as suas necessidades em apenas alguns cliques!</p>
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
          <h4><a href='freelancer.php?id=$tarefa[id_trabalho]'>$tarefa[tipo_trabalho]</a></h4>
          <p>$tarefa[descricao_trabalho]</p>
          </div>
          </div>

          ";

        }
        ?>
        <div class="col-12 text-center py-4">
          <a href="#!" class="btn btn-get-started d-none" data-bs-toggle="modal" data-bs-target="#modalLogin">Ver Mais ></a>
          <a href="categoria.php#services" class="btn btn-get-started">Ver Mais ></a>
        </div>
      </div>

    </div>

  </section><!-- End Services Section -->

  <!-- ======= Team Section ======= -->
  <section id="team" class="team section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Nossa Comunidade</h2>
        <p>Faça parte da nossa crescente comunidade.
          Trabalhe do seu jeito,você traz a habilidade e nós vamos facilitar o ganho!
        </p>
      </div>

      <div class="row">

        <?php
        $sqlCategoria = "SELECT * FROM tb_prestador ORDER BY solicitacao DESC LIMIT 4";
        $resulCategoria = mysqli_query($conexao, $sqlCategoria);
        // $tarefas = array();
        while ($categoria = mysqli_fetch_assoc($resulCategoria)) {
          echo "
          <div class='col-lg-6  mt-4 mt-lg-0 py-2' data-aos='zoom-in' data-aos-delay='100'>
          <div class='member d-flex align-items-start'>
          <div class='pic'><img src='assets/img/$categoria[img_prestador]' class='img-fluid' alt=''></div>
          <div class='member-info'>
          <h4>$categoria[nome_prestador]</h4>
          <span>$categoria[categoria_prestador]</span>
          <p>$categoria[descricao_prestador]</p>
          <div class='social'>
          <a href='perfil.php?idPerfil=$categoria[id_prestador]'><i class='ri-user-fill'></i></a>
          <a href='chat.php?idPrestador=$categoria[id_prestador]'><i class='bi bi-chat-fill'></i></a>
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
        <p></p>
      </div>

      <div class="row">

        <!-- <div class="col-lg-5 d-flex align-items-stretch">
        <div class="info">
        <div class="address">
        <i class="bi bi-geo-alt"></i>
        <h4>Location:</h4>
        <p>A108 Adam Street, New York, NY 535022</p>
      </div> -->
      <div class="col-md-4">
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
      </div>


      <!--  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15767.258753319775!2d13.20865545!3d-8.89681415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-PT!2sao!4v1683218923746!5m2!1spt-PT!2sao" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
    </div>-->



    <div class="col-md-8 mt-5 mt-lg-0 d-flex align-items-stretch">
      <form action="https://formsubmit.co/cleopatraadryansantos@gmail.com" enctype="multipart/form-data" method="post" role="form" class="php-email-form">

        <div class="row">
          <div class="form-group col-md-6">
            <label for="name">Nome</label>
            <input type="text" name="name" class="form-control" id="name" required>
          </div>
          <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" required>
          </div>
        </div>
        <div class="form-group">
          <label for="subject">Tema</label>
          <input type="text" class="form-control" name="subject" id="subject" required>
        </div>
        <div class="form-group">
          <label for="message">Mensagem</label>
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

  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6 footer-contact">
          <h3>Contactos</h3>
          <p>

            <strong>Telefone:</strong> +244 939 509 434<br>
            <strong>Email:</strong> autonomous.info@gmail.com<br>
          </p>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Links</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#hero">Inicio</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#about">Sobre nós</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#services">Serviços</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#team">Comunidade</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#contact">Assistência</a></li>
          </ul>
        </div>

        <!-- <div class="col-lg-3 col-md-6 footer-links">
        <h4>Nossos serviços</h4>
        <ul>
        <li><i class="bx bx-chevron-right"></i> <a href="#">Pestação de serviços</a></li>
        <li><i class="bx bx-chevron-right"></i> <a href="#">Desenvolvimento web</a></li>
        <li><i class="bx bx-chevron-right"></i> <a href="#">gestão de produtos</a></li>
        <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
        <li><i class="bx bx-chevron-right"></i> <a href="#">Design gráfico</a></li>
      </ul>
    </div> -->

    <div class="col-lg-3 col-md-6 footer-links">
      <h4>Nossas Rede Sociais</h4>
      <div class="social-links mt-3">
        <a href="https://twitter.com/?lang=pt" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="https://www.facebook.com/" target="_next" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="https://www.instagram.com/" class="instagram" target="_next"><i class="bx bxl-instagram"></i></a>
        <a href="https://www.tiktok.com/en/" target="_blank" class="google-plus"><i class="bx bxl-tiktok"></i></a>
        <a href="https://www.linkedin.com/feed/" target="_next" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>

  </div>
</div>
</div>


<div class="container footer-bottom clearfix">
  <div class="copyright">
    &copy; Copyright <strong><span>E&C</span></strong>.
  </div>
  <div class="credits">

    <!-- You can delete the links only if you purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->

  </div>
</div>
</footer><!-- End Footer -->

<div id="preloader" class="d-none"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center d-none"><i class="bi bi-arrow-up-short"></i></a>







<!--MODAL ALTERAR PERFIL-->
<div class="modal fade" id="alterPerfil" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalCenteredScrollableTitle">Editar Perfil</h1>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>


      </div>
      <br>
      <a href="forms/cadastrar.php?apagaCliente=<?php echo $dados0['id_cliente']; ?>" id="<?php echo $dados0['id_cliente']; ?>" class="text-center btn btn-danger mx-auto" style="width: 200px;">Eliminar Conta</a>
      <hr>

      <!--TELA DE CADASTRO CLIENTE 3-->
      <form action="forms/cadastrar.php" enctype="multipart/form-data" method="post" id="benvindo_cliente" class="" >
        <input type="hidden" name="alteid" id="alteid" value="<?php echo $dados0['id_cliente']; ?>">
        <div class="row g-3 container" >
          <div class="col-6">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu primeiro e ultimo nome..." value="<?php echo $dados0['nome_cliente']; ?>" required>
            <div class="invalid-feedback">
              Campo obrigratorio.
            </div>
          </div>

          <div class="col-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email..." value="<?php echo $dados0['email_cliente']; ?>" required>
            <div class="invalid-feedback">
              Campo obrigratório.
            </div>
          </div>

          <div class="col-6">
            <label for="telefone" class="form-label">Contacto</label>
            <input type="text" class="form-control" maxlength="9" id="telefone" name="telefone" placeholder="Digite seu numero de telefone..." value="<?php echo $dados0['numero_cliente']; ?>" required>
            <div class="invalid-feedback">
              Campo obrigratório.
            </div>
          </div>

          <div class="col-6">
            <label for="dataNace" class="form-label">Data de Nacimento</label>
            <input type="date" class="form-control" max="2005-01-01" min="1975-01-01" id="dataNace" name="dataNace" placeholder="sua data de nascimento" value="<?php echo $dados0['data_cliente']; ?>">
            <div class="invalid-feedback">
              Campo obrigratório.
            </div>
          </div>

          <div class="col-6">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite Sua senha" required value="<?php echo $dados0['senha_cliente']; ?>">
            <div class="invalid-feedback">
              Campo obrigratório.
            </div>
          </div>

          <div class="col-6">
            <label for="senha2" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="senha2" name="senha2" placeholder="Sua Localidade" value="<?php echo $dados0['endereco_cliente']; ?>">
          </div>

          <div class="col-6">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="imagen" name="imagen" placeholder="Insira uma foto" required value="<?php echo $dados0['img_cliente']; ?>" required>
            <div class="invalid-feedback">
              Campo obrigratório.
            </div>
          </div>
          <div class="col-6">
            <label for="zip" class="form-label" style="opacity: 0;">Botão</label>
            <button type="submit" class="btn btn-outline-info w-100" name="clientAlter" id="clientAlter">Salvar</button>
          </div>
        </div>
        <p class="mt-5 mb-3 text-muted text-center d-flex align-items-center justify-content-center">&copy; Já tem uma conta?  <a href="index.php" id="btn-login-volta" class="p-1 nav-link">Iniciar sessão</a></p>
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
<!--<script src="assets/vendor/php-email-form/validate.js"></script> -->

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script src="assets/js/index.js"></script>
<script>
$(".cola").click(()=>{
  $("#latMenu").removeClass('open');
});
</script>

</html>
