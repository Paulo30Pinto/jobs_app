<?php
$conexao = mysqli_connect('localhost','root','','jobs_bd');
mysqli_set_charset($conexao, "utf8");

session_start();
// VERIFICAAÇÃO
if(!isset($_SESSION['logado'])){
  header('Location: index.php');
}

//DADOS
$id0 = $_SESSION['freeID'];
$sql0 = "SELECT * FROM tb_prestador WHERE id_prestador LIKE '$id0'";
$resultado0 = mysqli_query($conexao, $sql0);
$dados0 = mysqli_fetch_array($resultado0);
$meuId = $dados0['id_prestador'];

//SELECT * FROM tb_trabalho INNER JOIN tb_prestador ON tb_trabalho.cid_trabalho = tb_prestador.id_trabalho;
$sqlBusca1 = "SELECT * FROM tb_trabalho WHERE id_trabalho LIKE  '$dados0[id_trabalho]'";
$resultado1 = mysqli_query($conexao, $sqlBusca1);
$perfil1 = mysqli_fetch_array($resultado1);

/*   $sqlBusca1 = "SELECT * FROM tb_cliente INNER JOIN tb_prestador ON tb_trabalho.id_trabalho = tb_prestador.id_trabalho;";
$resultado1 = mysqli_query($conexao, $sqlBusca1);
$perfil1 = mysqli_fetch_array($resultado1); */
?>


<!DOCTYPE html>
<html lang="en">

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

  <!-- =======================================================
  * Template Name: iPortfolio
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="assets/img/<?php echo $dados0['img_prestador']; ?>" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index_free.php"><?php echo $dados0['nome_prestador']; ?></a></h1>
        <div class="social-links mt-3 text-center">
          <a href="#" class="d-none facebook voltar" id="voltar"><i class="bx bx-arrow-back"></i></a>
          <a href="forms/sair.php" class="" id=""><i class="bi bi-box-arrow-in-left"></i></a>
          <a href="#" class="facebook" id="" data-bs-toggle="modal" data-bs-target="#alterPerfil"><i class="bx bx-user"></i></a>
          <a href="chat_free.php" class="instagram"><i class="bx bxs-chat"></i></a>
          <a href="#" id="solicitaUser1" data-bs-toggle="modal" data-bs-target="#modalSolicita" class="google-plus position-relative"><i class="bx bxs-bell"></i>
            <?php
            $sqlConta = "SELECT COUNT(*) as count FROM tb_solicitacao WHERE id_prestador = $meuId AND solicitado = 1 ORDER BY id_solicita ASC";
            $resultConta = mysqli_query($conexao, $sqlConta);
            if (mysqli_num_rows($resultConta) > 0) {
              // Output data of first row
              $rowContar = mysqli_fetch_assoc($resultConta);
              if ($rowContar["count"] == 0) {
                echo "
                <span class='leitura position-absolute top-10 translate-middle badge border border-light rounded-circle bg-danger d-none' style='right: 20%;'><span class=''></span></span>
                ";
              }else{
                echo  "
                <span class='leitura position-absolute top-10 translate-middle badge border border-light rounded-circle bg-danger' style='right: 20%;'><span class=''>$rowContar[count]</span></span>
                ";
              }

            } else {
              echo "<span class='leitura position-absolute top-10 translate-middle badge border border-light rounded-circle bg-danger d-none' style='right: 20%;'><span class=''></span></span>";
            }

            ?>
          </a>
        </div>
      </div>


      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li class="inicio"><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Sobre</span></a></li>
          <li class="inicio"><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Informações Profissionais</span></a></li>
          <li class="inicio"><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Meus Trabalhos</span></a></li>
          <li class="inicio d-none"><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Comentários</span></a></li>
          <li id="vermais" class=""><a href="#corpo" class="nav-link scrollto"><i class="bi bi-exclamation-triangle"></i> <span>Ver mais</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
      <p class="lead text-light text-center py-4">
  <b class="">Avaliação</b><br> <?php
     if(empty($dados0['destaques']) AND  ($dados0['destaques']<=0)){
      echo " 
      <i class='bi bi-star'></i><i class='bi bi-star'></i><i class='bi bi-star'></i>
      <i class='bi bi-star'></i><i class='bi bi-star'></i>
      ";
    }
          if(($dados0['destaques']>=1) AND  ($dados0['destaques']<=10)){
            echo " 
            <i class='bi bi-star-half'></i><i class='bi bi-star'></i><i class='bi bi-star'></i>
            <i class='bi bi-star'></i><i class='bi bi-star'></i>
            ";
          }
          if(($dados0['destaques']>=11) AND  ($dados0['destaques']<=20)){
            echo " 
            <i class='bi bi-star-fill'></i><i class='bi bi-star'></i><i class='bi bi-star'></i>
            <i class='bi bi-star'></i><i class='bi bi-star'></i>
            ";
          }
          if(($dados0['destaques']>=21) AND  ($dados0['destaques']<=30)){
            echo " 
            <i class='bi bi-star-fill'></i><i class='bi bi-star-half'></i><i class='bi bi-star'></i>
            <i class='bi bi-star'></i><i class='bi bi-star'></i>
            ";
          }
          if(($dados0['destaques']>=31) AND  ($dados0['destaques']<=40)){
            echo " 
            <i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star'></i>
            <i class='bi bi-star'></i><i class='bi bi-star'></i>
            ";
          }
          if(($dados0['destaques']>=41) AND  ($dados0['destaques']<=50)){
            echo " 
            <i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-half'></i>
            <i class='bi bi-star'></i><i class='bi bi-star'></i>
            ";
          }
          if(($dados0['destaques']>=51) AND  ($dados0['destaques']<=60)){
            echo " 
            <i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i>
            <i class='bi bi-star'></i><i class='bi bi-star'></i>
            ";
          }
          if(($dados0['destaques']>=61) AND  ($dados0['destaques']<=70)){
            echo " 
            <i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i>
            <i class='bi bi-star-half'></i><i class='bi bi-star'></i>
            ";
          }
          if(($dados0['destaques']>=71) AND  ($dados0['destaques']<=80)){
            echo " 
            <i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i>
            <i class='bi bi-star-fill'></i><i class='bi bi-star'></i>
            ";
          }
          if(($dados0['destaques']>=81) AND  ($dados0['destaques']<=90)){
            echo " 
            <i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i>
            <i class='bi bi-star-fill'></i><i class='bi bi-star-half'></i>
            ";
          }
          if(($dados0['destaques']>=91)){
            echo " 
            <i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i>
            <i class='bi bi-star-fill'></i><i class='bi bi-star-fill'></i>
            ";
          }
          
  
  
 // echo " ".$dados0['destaques']; 
  ?>
</p>
  </header><!-- End Header -->

  <main id="corpo" class="d-none">
    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-12 col-lg-12 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
            <div class="section-title" style="">
              <h2>Categorias de serviços mais procurados</h2>

            </div>



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
            <h4><a href='#'>$tarefa[tipo_trabalho]</a></h4>
            <p>$tarefa[descricao_trabalho]</p>
            </div>
            </div>

            ";

          }
          ?>
          <div class="col-12 text-center py-4 d-none">
            <a href="#!" class="btn btn-get-started d-none" data-bs-toggle="modal" data-bs-target="#modalLogin">Ver Mais ></a>
            <a href="#" class="btn btn-get-started">Ver Mais ></a>
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
            <div class='social d-none'>
            <a href='#'><i class='ri-user-fill'></i></a>
            <a href='#'><i class='bi bi-chat-fill'></i></a>
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
    <section id="" class="contact">
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
</main>

<main id="main" class="">

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container">

      <div class="section-title">
        <h2>Sobre</h2>

      </div>

      <div class="row">

        <div class="col-lg-12 pt-4 pt-lg-0 content" data-aos="fade-left">
          <h3>Dados &amp; Pessoais.</h3>

          <div class="row">
            <div class="col-lg-6">
              <ul>
                <li><i class="bi bi-chevron-right"></i> <strong>Aniversário:</strong> <span><?php echo $dados0['data_prestador']; ?></span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Contacto:</strong> <span><?php echo $dados0['contacto_prestador']; ?></span></li>

              </ul>
            </div>
            <div class="col-lg-6">
              <ul>
                <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span><?php echo $dados0['email_prestador']; ?></span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Endereço:</strong> <span><?php echo $dados0['endereco_prestador']; ?></span></li>


              </ul>
            </div>
          </div>

        </div>
      </div>

    </div>
  </section><!-- End About Section -->




  <!-- ======= Resume Section ======= -->
  <section id="resume" class="resume row container position-relative">

    <div class="section-title col-12">
      <h2>Informações Profissionais</h2>
      <div class="d-flex justify-content-between">
        <a href="#!" class="text-start float-start" data-bs-toggle="modal" data-bs-target="#addFormacao">Adicionar Nivel Academico<i class="bi bi-arrow-right-short"></i></a>
        <a href="#!" class="text-start" style="float: left;" data-bs-toggle="modal" data-bs-target="#addCurso">Adicionar Formações Profissional<i class="bi bi-arrow-right-short"></i></a>
      </div>


    </div>

    <div class="col-md-6 container" data-aos="fade-up" data-aos-delay="100">
      <h3 class="resume-title">Educação</h3>
      <?php
      $sqlForma = "SELECT * FROM tb_formacao WHERE Id_Pestador = $meuId ORDER BY id_formacao DESC";
      $resultadoForma = mysqli_query($conexao, $sqlForma);
      // $tarefas = array();
      while ($formacao = mysqli_fetch_assoc($resultadoForma)) {
        if (!empty($formacao['nivel_academico'])) {
          ?>

          <div class="resume-item">
            <h4><?php echo $formacao['nivel_academico']; ?></h4>
            <h5><?php echo $formacao['data_estudo']; ?></h5>
            <p><em><?php echo $formacao['local_estudo']; ?></em></p>
            <ul>
              <li><?php echo $formacao['info_estudo']; ?></li>

            </ul>
          </div>

          <?php }
        }?>

      </div>

      <div class="col-md-6 container" data-aos="fade-up" data-aos-delay="100">
        <h3 class="resume-title">Experiência profissional</h3>

        <?php
        $sqlForma = "SELECT * FROM tb_formacao WHERE Id_Pestador = $meuId ORDER BY id_formacao DESC";
        $resultadoForma = mysqli_query($conexao, $sqlForma);
        // $tarefas = array();
        while ($formacao = mysqli_fetch_assoc($resultadoForma)) {
          if (!empty($formacao['nome_formacao'])) {
            // code...

            ?>

            <div class="resume-item">
              <h4><?php echo $formacao['nome_formacao']; ?></h4>
              <h5><?php echo $formacao['data_formacao']; ?></h5>
              <p><em><?php echo $formacao['local_formacao']; ?></em></p>
              <ul>
                <li><?php echo $formacao['info_formacao']; ?></li>

              </ul>
            </div>

            <?php
          }
        }
        ?>

      </div>

    </div>
  </section><!-- End Resume Section -->

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio section-bg">
    <div class="container">

      <div class="section-title">
        <h2>Meus Trabalhos</h2>

      </div>

      <div class="row" data-aos="fade-up" >
        <div class="col-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">Todos</li>
            <li data-filter="*" class="" data-bs-toggle="modal" data-bs-target="#adtrabalhos">Publicar Trabalho</li>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
        <?php
        $sqlCategoria1 = "SELECT * FROM tb_trabalhos_feitos WHERE id_prestador_trabalho = $id0";
        $resulCategoria1 = mysqli_query($conexao, $sqlCategoria1);
        // $tarefas = array();

        # code...

        while ($categoria1 = mysqli_fetch_assoc($resulCategoria1)) {
          //   $tarefas[] = $tarefa;
          // echo $categoria['tipo_trabalho'];
          if (!empty($categoria1['pic_trabalho'])) {
            ?>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="assets/img/<?= $categoria1['pic_trabalho'] ?>" class="img-fluid" alt="">
                <div class="portfolio-links d-flex justify-content-start">
                  <a href="assets/img/<?= $categoria1['pic_trabalho'] ?>" data-gallery="portfolioGallery" class="portfolio-lightbox w-100" title="<?= $categoria1['descricao_trabalho'] ?>">ver mais</a>
                </div>
              </div>
            </div>
            <?php }else{

              echo "<h1>Não tem nenhum registros dos teus trabalhos ainda...<h1>";
            }
          }

          ?>
  </div>
        </div>
        </section> <!--End Portfolio Section -->



        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials section-bg " hidden>
          <div class="container">

            <div class="section-title">
              <h2>Comentários</h2>

            </div>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
              <div class="swiper-wrapper">

                <?php
                $sqlCategoria2 = "SELECT * FROM tb_comentarios WHERE ID_Prestador = $meuId";
                $resulCategoria2 = mysqli_query($conexao, $sqlCategoria2);
                // $tarefas = array();

                # code...

                while ($categoria2 = mysqli_fetch_assoc($resulCategoria2)) {
                  //   $tarefas[] = $tarefa;
                  // echo $categoria['tipo_trabalho'];
                  if (!empty($categoria2['Comentario'])) {
                    ?>
                    <div class="swiper-slide">
                      <div class="testimonial-item" data-aos="fade-up">
                        <p>
                          <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                          <?php echo $categoria2['Comentario']; ?>
                          <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                        <h3><?= $categoria2['Nome']; ?></h3>
                        <h4><?= $categoria2['Assunto']; ?></h4>
                      </div>
                    </div><!-- End testimonial item -->
                    <?php } }?>

                    <div class="swiper-slide">
                      <div class="testimonial-item" data-aos="fade-up">
                        <p>
                          <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                          Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                          <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                        <h3>Saul Goodman</h3>
                        <h4>Ceo &amp; Founder</h4>
                      </div>
                    </div><!-- End testimonial item -->






                  </div>
                  <div class="swiper-pagination"></div>
                </div>

              </div>
            </section><!-- End Testimonials Section -->
            <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact d-none">
              <div class="container">

                <div class="section-title d-none">
                  <h2>Comentario</h2>
                </div>

                <div class="row" data-aos="fade-in">

                  <div class="col-12 col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch">
                    <form action="forms/contact.php" method="post" role="" class="php-email-form">
                      <div class="row">
                        <div class="form-group col-md-6">
                          <label for="name">Nome</label>
                          <input type="text" name="name" class="form-control" id="name" value="<?php echo  $dados0['nome_prestador']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="name">Email</label>
                          <input type="email" class="form-control" name="email" id="email" value="<?php echo  $dados0['email_prestador']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="name">Assunto</label>
                        <input type="text" class="form-control" name="subject" id="subject" required>
                      </div>
                      <div class="form-group">
                        <label for="name">Mensagem</label>
                        <textarea class="form-control" name="message" id="message" rows="10" required></textarea>
                      </div>

                      <input type="hidden" name="id_cliente" id="id_cliente" value="">
                      <input type="hidden" name="id_prestador" id="id_prestador" value="<?php echo  $dados0['id_prestador']; ?>">
                      <div class="text-center"><button type="submit" name="resp_comenta" id="resp_comenta">Enviar Comentario</button></div>
                    </form>
                  </div>

                </div>

              </div>
            </section><!-- End Contact Section -->

          </main><!-- End #main -->

          <!-- ======= Footer ======= -->
          <footer id="footer">
            <div class="container">

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->

              </div>
            </div>
          </footer><!-- End  Footer -->

          <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

          <!--MODAL SOLICITAÇÂO-->
          <div class="modal fade" id="modalSolicita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content" style="">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Solicatões de Clientes <?php echo "<span class='position-relative badge border border-light rounded-circle bg-dark'><span class=''>$rowContar[count]</span></span>"; ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="list-group list-group-flush border-bottom scrollarea">

                    <?php
                    $cliSolicita = "SELECT tb_solicitacao.solicitado, tb_solicitacao.pedido_aceite, tb_cliente.id_cliente,  tb_cliente.nome_cliente, tb_cliente.numero_cliente, tb_cliente.endereco_cliente, tb_cliente.email_cliente, tb_cliente.img_cliente FROM tb_solicitacao JOIN tb_cliente ON tb_solicitacao.id_cliente = tb_cliente.id_cliente AND tb_solicitacao.id_prestador = $meuId WHERE tb_solicitacao.solicitado = 1  GROUP BY tb_cliente.id_cliente ORDER BY id_solicita";

                    $resulSolicita = mysqli_query($conexao, $cliSolicita);
                    // $tarefas = array();
                    while ($solicitei = mysqli_fetch_assoc($resulSolicita)) {
                      // print_r($solicitei);
                      //var_dump($solicitei)
                      ?>

                      <div class="list-group-item list-group-item-action py-3 lh-tight d-flex align-items-center justify-content-around infoSolicita">
                        <div class="badge my-2 col-4">
                          <img src="assets/img/<?= $solicitei['img_cliente']; ?>" alt="" style="max-width: 100%; max-height: 100px;" class='rounded img-thumbnail'>
                        </div>
                        <div class="col-8">
                          <strong class="mb-1"><?= $solicitei['nome_cliente']; ?></strong>
                          <small class="text-muted d-block"><?= $solicitei['numero_cliente']; ?></small>
                          <div class="mb-1 small"><?= $solicitei['email_cliente']; ?></div>
                          <p><?= $solicitei['endereco_cliente']; ?></p>
                          <div class="d-flex" style="max-height: 100px !important;">
                          <?php 
                            if($solicitei['pedido_aceite'] == 1){
                          ?>
                          <div class="<?= $solicitei['id_cliente']; ?>">
                            <a class="" id="">
                              <i class="bi bi-check-lg text-primary" style="font-size: 31px;" id="verificado"></i>
                            </a>
                          </div>
                            <button class="d-none btn btn-outline-dark aceitaSo" id="<?= $solicitei['id_cliente']; ?>" name="aceitaSo">Aceitar</button>
                            <?php } else{?>
                              <div class="d-none <?= $solicitei['id_cliente']; ?>">
                            <a class="" id="">
                              <i class="bi bi-check-lg text-primary" style="font-size: 31px;" id="verificado"></i>
                            </a>
                          </div>
                            <button class="btn btn-outline-dark aceitaSo" id="<?= $solicitei['id_cliente']; ?>" name="aceitaSo">Aceitar</button>
                           <?php } ?>
                            <a href="#!" id="<?= $solicitei['id_cliente']; ?>" class="btn btn-outline-dark cancelarSolicita">Cancelar</a>
                    </div>
                        </div>
                      </div>

                      <?php
                    }


                    ?>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary d-none" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary d-none">Save changes</button>
                </div>
              </div>
            </div>
          </div>

          <!--MODAL FOTOS DE TRABALHO-->
          <div class="modal fade" id="adtrabalhos" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalCenteredScrollableTitle">Adicionar meus servicos</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="forms/cadastrar.php" enctype="multipart/form-data" method="post" id="">
                  <div class="modal-body">
                    <input type="hidden" name="idservi" id="idservi" value="<?php echo $dados0['id_prestador']; ?>">
                    <div class="mb-3 text-start">
                      <label class="form-label" for="customFile">Imagem</label>
                      <input type="file" name="picservi" id="picservi" class="form-control" id="customFile">
                    </div>
                    <div class="mb-3 text-start">
                      <label class="form-label" for="customFile">Descrição</label>
                      <textarea name="descservi" id="descservi" placeholder="Fale um pouco sobre este trabalho" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" id="addServi" name="addServi" class="btn btn-primary w-100">Add Serviço</button>
                  </div>
                </form>

              </div>
            </div>
          </div>

          <?php

          $sqlCategoria = "SELECT * FROM tb_trabalho";
          $resulCategoria = mysqli_query($conexao, $sqlCategoria);
          // $tarefas = array();

          ?>
          <!--MODAL ALTERAR PERFIL-->
          <div class="modal fade" id="alterPerfil" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Editar Perfil</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <br>
        <a href="forms/cadastrar.php?apagaiPrestador=<?php echo $dados0['id_prestador']; ?>" id="<?php echo $dados0['id_prestador']; ?>" class="text-center btn btn-danger mx-auto" style="width: 200px;">Eliminar Conta</a>
        <hr>
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
                          Insira um email valido.
                        </div>
                      </div>

                      <div class="col-6">
                        <label for="username" class="form-label">Contacto</label>
                        <input type="text" class="form-control" maxlength="9" id="contacto" name="contacto" placeholder="digite o seu contato" value="<?php echo $dados0['contacto_prestador']; ?>" required>
                        <div class="invalid-feedback">
                          Insira um contacto valido.
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
                        <input type="date" class="form-control" max="2005-01-01" min="1975-01-01" id="dataFree" name="dataFree" placeholder="data" value="<?php echo $dados0['data_prestador']; ?>">
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
                        <input type="file" class="form-control" id="Imagem" name="Imagem" placeholder="Insira a sua Foto de perfil" Value="<?php echo $dados0['img_prestador']; ?>" required>
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

          <!--MODAL CADASTRO FORMAÇÂO-->
          <div class="modal fade" id="addFormacao" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Nivel Academico</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="forms/contact.php" enctype="multipart/form-data" method="post" id="formroda">
                    <input type="hidden" name="idForma" id="idForma" value="<?php echo $dados0['id_prestador']; ?>">
                    <div class="row g-3" >
                      <div class="col-12">
                        <label for="nomeForma" class="form-label">Nome Curso</label>
                        <input type="text" class="form-control" name="nomeForma" id="nomeForma" placeholder="Sua formação academica" value="" required>
                        <div class="invalid-feedback">
                          Valid first name is required.
                        </div>
                      </div>

                      <div class="col-12">
                        <label for="dataForma" class="form-label">Data Fim do curso</label>
                        <input type="date" class="form-control" name="dataForma" id="dataForma" placeholder="Digite Seu email" value="" required>
                        <div class="invalid-feedback">
                          Valid last name is required.
                        </div>
                      </div>

                      <div class="col-12">
                        <label for="uniForma" class="form-label">Ensino Medio / Universidade</label>
                        <input type="text" class="form-control" id="uniForma" name="uniForma" placeholder="Ensino Medio ou Universidade" value="" required>
                        <div class="invalid-feedback">
                          Valid last name is required.
                        </div>
                      </div>
                      <div class="mb-3 text-start">
                        <label class="form-label" for="descForma">Descriçao</label>
                        <textarea name="descForma" id="descForma" placeholder="Fale um pouco sobre sua formação" class="form-control" cols="10" rows="4"></textarea>
                      </div>

                      <div class="col-12">
                        <label for="zip" class="form-label" style="opacity: 0;">Imagen</label>
                        <button type="submit" class="btn btn-outline-info w-100" id="AddForma" name="AddForma">Cadastrar</button>
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

          <!--MODAL CADASTRO CURSOS-->
          <div class="modal fade" id="addCurso" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Cursos Profissionais</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="forms/contact.php" enctype="multipart/form-data" method="post" id="formroda">
                    <input type="hidden" name="idForma" id="idForma" value="<?php echo $dados0['id_prestador']; ?>">
                    <div class="row g-3" >
                      <div class="col-12">
                        <label for="nomeForma" class="form-label">Nome Curso</label>
                        <input type="text" class="form-control" name="nomeForma" id="nomeForma" placeholder="Cusro Proficional" value="" required>
                        <div class="invalid-feedback">
                          Valid first name is required.
                        </div>
                      </div>

                      <div class="col-12">
                        <label for="dataForma" class="form-label">Data Fim do curso</label>
                        <input type="date" class="form-control" name="dataForma" id="dataForma" placeholder="data" value="" required>
                        <div class="invalid-feedback">
                          Valid last name is required.
                        </div>
                      </div>

                      <div class="col-12">
                        <label for="uniForma" class="form-label">Centro de formação</label>
                        <input type="text" class="form-control" id="uniForma" name="uniForma" placeholder="Nome do centro" value="" required>
                        <div class="invalid-feedback">
                          Valid last name is required.
                        </div>
                      </div>
                      <div class="mb-3 text-start">
                        <label class="form-label" for="descForma">Descriçao</label>
                        <textarea name="descForma" id="descForma" placeholder="Fale um pouco sobre seu curso" class="form-control" cols="10" rows="4"></textarea>
                      </div>

                      <div class="col-12">
                        <label for="zip" class="form-label" style="opacity: 0;">Imagen</label>
                        <button type="submit" class="btn btn-outline-info w-100" id="AddCurso" name="AddCurso">Cadastrar</button>
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
          <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

          <!-- Template Main JS File -->
          <script src="assets/js/perfil.js"></script>

        </body>

        <script>
        $("#solicitaUser1").click(()=>{
          $(".leitura").addClass("d-none");
        })

        /**Clicado**/
        Array.from($('.cancelarSolicita')).forEach((e)=>{
          e.addEventListener('click', (el)=>{

            var IdBaixar = e.id;
            let cancelarSolicita = <?= $dados0['id_prestador'] ?>;
            let contador = <?= $dados0['solicitacao'] ?>;
            // total = contador - 1;

            //   alert(IdBaixar);
            $.post("forms/cadastrar.php",
            {
              cancelarSolicita: cancelarSolicita,
              usuarioDados: IdBaixar
              // total: total
            },
            function(data, status){
              console.log(status);
            }
          );
          $(".infoSolicita").remove();

        })
      })

      /**Clicado**/
      Array.from($('.aceitaSo')).forEach((e)=>{
        e.addEventListener('click', (el)=>{
          
          var IdBaixar = e.id;
          let dadosSolicita = <?= $dados0['id_prestador'] ?>;
          let contador = <?= $dados0['solicitacao'] ?>;
          total = contador + 1;

          // alert(dadosSolicita);
          $.post("forms/cadastrar.php",
          {
            solicitaDados: dadosSolicita,
            usuarioDados: IdBaixar,
            total: total
          },
          function(data, status){
            console.log(status);
          }
          
        );

        $("#"+IdBaixar).addClass("d-none");
          $("."+IdBaixar).removeClass("d-none");

      })
    })

    /**OBJETO HISTORY**/
    function hB(){
      window.history.back();
    }


    function comeco(){
      btnB=document.getElementById("voltar");


      btnB.addEventListener("click", hB);


    }
    window.addEventListener("load",comeco);

    $(".inicio").click(()=>{
      // alert("Ola")
      $("#corpo").addClass('d-none');
      $("#main").removeClass('d-none');
      $('#vermais').removeClass('active')
      $("#vermais a").removeClass('active');
    })
    $("#vermais").click(()=>{
      //alert("Ola")
      $("#corpo").removeClass('d-none');
      $("#main").addClass('d-none');
      $(this).addClass('active')
      $("#vermais a").addClass('active');
      $(".inicio a").removeClass('active')
    })
    </script>

    </html>
