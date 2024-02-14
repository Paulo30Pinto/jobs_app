<?php
$conexao = mysqli_connect('localhost','root','','jobs_bd');
mysqli_set_charset($conexao, "utf8");

session_start();
// VERIFICAAÇÃO
if(!isset($_SESSION['logado'])){
  header('Location: index.php');
}

//DADOS
$id0 = $_SESSION['id_cliente'];
$sql0 = "SELECT * FROM tb_cliente WHERE id_cliente = '$id0'";
$resultado0 = mysqli_query($conexao, $sql0);
$dados0 = mysqli_fetch_array($resultado0);

if(isset($_GET['idPerfil'])){
  $id_perfil = $_GET['idPerfil'];
  /*  select c_codiclien codigo, c_razaclien razao_social,
  c_codivenda codi_venda
  from comvenda
  join comclien on
  comvenda.n_numeclien = comclien.n_numeclien
  order by c_razaclien;*/

  $sqlBusca = "SELECT * FROM tb_prestador WHERE id_prestador LIKE  '$id_perfil'";
  $resultado = mysqli_query($conexao, $sqlBusca);
  $perfil = mysqli_fetch_array($resultado);

  $sqlBusca1 = "SELECT * FROM tb_trabalho WHERE id_trabalho LIKE  '$perfil[id_trabalho]'";
  $resultado1 = mysqli_query($conexao, $sqlBusca1);
  $perfil1 = mysqli_fetch_array($resultado1);



  // $tarefas = array();
  /*    while ($tarefa = mysqli_fetch_assoc($resultado)) {
  //   $tarefas[] = $tarefa;
  //  echo $tarefa['nome'];
  echo json_encode($tarefa) . "<br>";
} */
}
else{
  echo"
  <script>
  alert('noa temos niguem que preste este serviço ainda');
  </script>
  ";
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
        <img src="assets/img/<?php echo $perfil['img_prestador']; ?>" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index_cliente.php"><?php echo $perfil['nome_prestador']; ?></a></h1>
        <div class="social-links mt-3 text-center">
          <a href="#" class="twitter d-none"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook voltar" id="voltar"><i class="bx bx-arrow-back"></i></a>
          <a href="chat.php?idPrestador=<?php echo $perfil['id_prestador']; ?>" class="instagram"><i class="bx bxs-chat"></i></a>

          <a href="#" class="google-plus d-none"><i class="bx bxl-skype"></i></a>
          <div class="d-flex justify-content-center align-items-center">
            <button class="d-block my-2 btn btn-escuro" id="solicita">
              <i class="bx bxl-linkedin d-none"></i> Solicitar Servico
            </button>
            <i class="bi bi-check-lg text-primary d-none" style="font-size: 31px;" id="verificado"></i>
            <div class="spinner-border text-primary d-none" role="status" id="leitura">
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>
          
        <div class="roda text-center">
  <ul class="rating-stars d-flex justify-content-center text-white">
    <li>
      <i id="vasio1" class="bi bi-star star-icon"></i>
      <i id="marcado1" class="bi bi-star-fill star-icon d-none"></i>
    </li>
    <li class="mx-1">
      <i id="vasio2" class="bi bi-star star-icon"></i>
      <i id="marcado2" class="bi bi-star-fill star-icon d-none"></i>
    </li>
    <li>
      <i id="vasio3" class="bi bi-star star-icon"></i>
      <i id="marcado3" class="bi bi-star-fill star-icon d-none"></i>
    </li>
    <li class="mx-1">
      <i id="vasio4" class="bi bi-star star-icon"></i>
      <i id="marcado4" class="bi bi-star-fill star-icon d-none"></i>
    </li>
    <li>
      <i id="vasio5" class="bi bi-star star-icon"></i>
      <i id="marcado5" class="bi bi-star-fill star-icon d-none"></i>
    </li>
  </ul>
          <ul class="d-flex justify-content-center text-white d-none" hidden>
            <li >
              <i id="umvasio" class="bi bi-star"><span hidden>1</span></i>
              <i id="umarcado" class="bi bi-star-fill d-none"><span hidden>0</span></i>
            </li>
            <li class="mx-1">
              <i id="doisvasio" class="bi bi-star"><span hidden>2</span></i>
              <i id="doisarcado" class="bi bi-star-fill d-none"><span hidden>1</span></i>
            </li>
            <li  class="">
              <i id="tresvasio" class="bi bi-star"><span hidden>3</span></i>
              <i id="tresmarcado" class="bi bi-star-fill d-none"><span hidden>2</span></i>
            </li>
            <li  class="mx-1">
              <i id="quatrovasio" class="bi bi-star"><span hidden>4</span></i>
              <i id="quatromarcado" class="bi bi-star-fill d-none"><span hidden>3</span></i>
            </li>
            <li>
              <i id="cincovasito" class="bi bi-star"><span hidden>5</span></i>
              <i id="cincomarcado" class="bi bi-star-fill d-none"><span hidden>4</span></i>
            </li>
          </ul>
        
        </div>
        </div>
        
      </div>
         
      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Sobre</span></a></li>
          <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Informações Profissionais</span></a></li>
          <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Meus Trabalhos</span></a></li>
          <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Comentários</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->



  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>Sobre</h2>

        </div>

        <div class="row">

          <div class="col-lg-12 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3>Dados Pessoais</h3>

            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Aniversário:</strong> <span><?php echo $perfil['data_prestador']; ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Endereço:</strong> <span><?php echo $perfil['endereco_prestador']; ?></span></li>

                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Contacto:</strong> <span><?php echo $perfil['contacto_prestador']; ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span><?php echo $perfil['email_prestador']; ?></span></li>


                </ul>
              </div>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->



    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume row container">

      <div class="section-title col-12">
        <h2>Informações Profissionais</h2>

      </div>
      <div class="col-md-6 container" data-aos="fade-up" data-aos-delay="100">
        <h3 class="resume-title">Educação</h3>

        <?php
        $sqlForma = "SELECT * FROM tb_formacao WHERE Id_Pestador = $id_perfil ORDER BY id_formacao DESC";
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

            <?php }}?>

          </div>

          <div class="col-md-6 container" data-aos="fade-up" data-aos-delay="100">
            <h3 class="resume-title">Experiência profissional</h3>

            <?php
            $sqlForma = "SELECT * FROM tb_formacao WHERE Id_Pestador = $id_perfil ORDER BY id_formacao DESC";
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

          <div class="row" data-aos="fade-up">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">All</li>

              </ul>
            </div>
          </div>

          <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
            <?php
            $sqlCategoria1 = "SELECT * FROM tb_trabalhos_feitos WHERE id_prestador_trabalho = $id_perfil";
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
                      <a href="assets/img/<?= $categoria1['pic_trabalho'] ?>" data-gallery="portfolioGallery" class="portfolio-lightbox w-100" title="<?= $categoria1['descricao_trabalho'] ?>">ver <i class="bx bx-plus"></i></a>
                      <a href="#!" title="More Details" hidden><i class="bx bx-link"></i></a>
                    </div>
                  </div>
                </div>
                <?php }else{

                  echo "<h1>Não tem nenhum registros dos teus trabalhos ainda...<h1>";
                }
              }

              ?>
              <!--
              <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
              <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <div class="portfolio-wrap">
        <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
        <div class="portfolio-links">
        <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
        <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
      </div>
    </div>
  </div>

  <div class="col-lg-4 col-md-6 portfolio-item filter-card">
  <div class="portfolio-wrap">
  <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
  <div class="portfolio-links">
  <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
</div>
</div>
</div>

<div class="col-lg-4 col-md-6 portfolio-item filter-web">
<div class="portfolio-wrap">
<img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
<div class="portfolio-links">
<a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
<a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
</div>
</div>
</div>

<div class="col-lg-4 col-md-6 portfolio-item filter-app">
<div class="portfolio-wrap">
<img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
<div class="portfolio-links">
<a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
<a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
</div>
</div>
</div>

<div class="col-lg-4 col-md-6 portfolio-item filter-card">
<div class="portfolio-wrap">
<img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
<div class="portfolio-links">
<a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
<a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
</div>
</div>
</div>

<div class="col-lg-4 col-md-6 portfolio-item filter-card">
<div class="portfolio-wrap">
<img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
<div class="portfolio-links">
<a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
<a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
</div>
</div>
</div>

<div class="col-lg-4 col-md-6 portfolio-item filter-web">
<div class="portfolio-wrap">
<img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
<div class="portfolio-links">
<a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
<a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
</div>
</div>
</div>

</div>

</div> -->
</section><!-- End Portfolio Section -->



<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials section-bg d-none">
  <div class="container">

    <div class="section-title">
      <h2>Comentários</h2>

    </div>

    <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper">
        <?php
        $sqlCategoria2 = "SELECT * FROM tb_comentarios WHERE ID_Prestador = $id_perfil";
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
              <div class="testimonial-item" data-aos="fade-up" data-aos-delay="300">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item" data-aos="fade-up" data-aos-delay="400">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" hidden>
      <div class="container">

        <div class="section-title">
          <h2>Deixe o comentario</h2>
        </div>

        <div class="row" data-aos="fade-in">

          <div class="col-lg-5 d-flex align-items-stretch d-none">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-12 col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="forms/contact.php" method="post" role="" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Seu nome</label>
                  <input type="text" name="name" class="form-control" id="name" value="<?php echo  $dados0['nome_cliente']; ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Seu email</label>
                  <input type="email" class="form-control" name="email" id="email" value="<?php echo  $dados0['email_cliente']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="name">Assunto</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group">
                <label for="name">Seu comentario</label>
                <textarea class="form-control" name="message" id="message" rows="10" required></textarea>
              </div>

              <input type="hidden" name="id_cliente" id="id_cliente" value="<?php echo  $dados0['id_cliente']; ?>">
              <input type="hidden" name="id_prestador" id="id_prestador" value="<?php echo $perfil['id_prestador']; ?>">
              <div class="text-center"><button type="submit" name="btn_comenta" id="btn_comenta">Enviar Comentario</button></div>
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
  <!--  <script src="assets/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="assets/js/perfil.js"></script>

</body>

<script>

  var dadosNome1 = "<?= $perfil['nome_prestador'] ?>";

/**Clicado**/
$("#solicita").on("click", function(event){
  event.preventDefault();

  $("#leitura").removeClass("d-none")

  let usuario = <?= $dados0['id_cliente'] ?>;
  let dadosSolicita = <?= $perfil['id_prestador'] ?>;
  let contador = <?= $perfil['solicitacao'] ?>;
  total = contador + 1;

  $.post("forms/cadastrar.php",
  {
    solicita: dadosSolicita,
    total: total,
    usuario: usuario
  },
  function(data, status){
    console.log(status);
  }
);

setTimeout(function(){

  $("#leitura").addClass("d-none")
  if($("#leitura").addClass("d-none")){
    $("#verificado").removeClass("d-none")
    //alert();
    /*     setTimeout(function(){
    $("#verificado").addClass("d-none")
  }, 1000); */
}

}, 3000);


})

// selecione o elemento que deseja fazer desaparecer
const elemento = document.querySelector('#meu-elemento');

// defina a função para fazer o elemento desaparecer
function desaparecer() {
  elemento.style.display = 'none';
}

// chame a função após 3 segundos usando setTimeout()
setTimeout(desaparecer, 3000); // 3000 milissegundos = 3 segundos


setTimeout(function(){
  $("#your-element").fadeOut("slow", function(){
    $(this).remove();
  });
}, 3000);



/**OBJETO HISTORY**/
function hB(){
  window.history.back();
}


function comeco(){
  btnB=document.getElementById("voltar");


  btnB.addEventListener("click", hB);


}
window.addEventListener("load",comeco);
/*
$("#umvasio").click(()=>{
  
  $("#umvasio").addClass('d-none')
  $(".bi-star-fill").addClass('d-none')
  $("#umarcado").removeClass('d-none')

  var dados =  $("#umvasio").text();
  //  alert(dados);
})

$("#doisvasio").click(()=>{

  $(".bi-star-fill").addClass('d-none')
  $("#doisvasio").addClass('d-none')
  $("#umvasio").addClass('d-none')
  
  $("#umarcado").removeClass('d-none')
  $("#doisarcado").removeClass('d-none')

  var dados =  $("#doisvasio").text();
   // alert(dados);
})

$("#tresvasio").click(()=>{

  $(".bi-star-fill").addClass('d-none')
  $("#doisvasio").addClass('d-none')
  $("#umvasio").addClass('d-none')
  $("#tresvasio").addClass('d-none')
  
  $("#umarcado").removeClass('d-none')
  $("#doisarcado").removeClass('d-none')
  $("#tresmarcado").removeClass('d-none')

  var dados =  $("#tresvasio").text();
   // alert(dados);

})

$("#quatrovasio").click(()=>{

  $(".bi-star-fill").addClass('d-none')
  $("#doisvasio").addClass('d-none')
  $("#umvasio").addClass('d-none')
  $("#tresvasio").addClass('d-none')
  $("#quatrovasio").addClass('d-none')
  
  $("#umarcado").removeClass('d-none')
  $("#doisarcado").removeClass('d-none')
  $("#tresmarcado").removeClass('d-none')
  $("#quatromarcado").removeClass('d-none')

  var dados =  $("#quatrovasio").text();
  //  alert(dados);

})
$("#cincovasito").click(()=>{

  $(".bi-star").addClass('d-none')
 
  $(".bi-star-fill").removeClass('d-none')

  var dados =  $("#cincovasito").text();
   // alert(dados);

})
$("#cincomarcado").click(()=>{

  
  $(".bi-star").addClass('d-none')
  $(".bi-star-fill").removeClass('d-none')
  $("#cincomarcado").addClass("d-none");
  $("#cincovasito").removeClass("d-none");
  
  var dados =  $("#cincomarcado").text();
   // alert(dados);

})
$("#quatromarcado").click(()=>{

  $(".bi-star-fill").addClass('d-none')
  $("#doisvasio").addClass('d-none')
  $("#umvasio").addClass('d-none')
  $("#tresvasio").addClass('d-none')
  $("#quatrovasio").removeClass('d-none')
  
  $("#umarcado").removeClass('d-none')
  $("#doisarcado").removeClass('d-none')
  $("#tresmarcado").removeClass('d-none')
 // $("#quatromarcado").removeClass('d-none')
 $("#cincovasito").removeClass("d-none");
  var dados =  $("#quatromarcado").text();
  //  alert(dados);

})

$("#tresmarcado").click(()=>{

  $(".bi-star-fill").addClass('d-none')
  $("#doisvasio").addClass('d-none')
  $("#umvasio").addClass('d-none')
  $("#tresvasio").removeClass('d-none')

  $("#umarcado").removeClass('d-none')
  $("#doisarcado").removeClass('d-none')
  $("#quatrovasio").removeClass('d-none')
  $("#cincovasito").removeClass("d-none");

  var dados =  $("#doisvasio").text();
   // alert(dados);
})

$("#doisarcado").click(()=>{

  $(".bi-star-fill").addClass('d-none')

  $("#umvasio").addClass('d-none')
  $("#doisvasio").removeClass('d-none')
  $("#umarcado").removeClass('d-none')
 // $("#doisarcado").removeClass('d-none')
 $("#tresvasio").removeClass('d-none')
 $("#quatrovasio").removeClass('d-none')
 $("#cincovasito").removeClass("d-none");

  var dados =  $("#doisvasio").text();
   // alert(dados);
})

$("#umarcado").click(()=>{
 // $("#umarcado").addClass('d-none')
  
  $(".bi-star-fill").addClass('d-none')
  $(".bi-star").removeClass('d-none')

  var dados =  $("#umarcado").text();
   // alert(dados);
})
*/

$(".star-icon").click(function() {
 
        var id = $(this).attr("id"); // Get the clicked star's ID
        var rating = id.replace("vasio", ""); // Remove "vasio" from the ID to get the rating number
        var rating2 = id.replace("marcado", "");

        // Mark the clicked star and all previous stars
        for (var i = 1; i <= rating; i++) {
          $("#vasio" + i + "").addClass("d-none");
          $("#marcado" + i + "").removeClass("d-none");
        }

        // Unmark all stars after the clicked star
        for (var j = parseInt(rating2) + 0; j <= 5; j++) {
          $("#vasio" + j + "").removeClass("d-none");
          $("#marcado" + j + "").addClass("d-none");
        } 

        // Store the rating in localStorage
          localStorage.setItem('idEstrela', id);
          localStorage.nome = "<?= $perfil['nome_prestador'] ?>";
         


          Dados();

        // alert(id)
      }); 

  function Dados(){
      var nomeId = localStorage.nome;
      var storedRating = localStorage.getItem('idEstrela');

          /**DESMARCADO**/
        if((storedRating == "vasio1") && (nomeId == dadosNome1) ){
           $("#vasio1").addClass('d-none')
          $(".bi-star-fill").addClass('d-none')
          $("#marcado1").removeClass('d-none')
          //  alert(storedRating)
        }
        if((storedRating == "vasio2") && (nomeId == dadosNome1) ){
          $(".bi-star-fill").addClass('d-none')
          $("#vasio2").addClass('d-none')
          $("#vasio1").addClass('d-none')
          
          $("#marcado1").removeClass('d-none')
          $("#marcado2").removeClass('d-none')

          //  alert(storedRating)
        }
        if((storedRating == "vasio3") && (nomeId == dadosNome1) ){
           $(".bi-star-fill").addClass('d-none')
            $("#vasio1").addClass('d-none')
            $("#vasio2").addClass('d-none')
            $("#vasio3").addClass('d-none')
  
  $("#marcado1").removeClass('d-none')
  $("#marcado2").removeClass('d-none')
  $("#marcado3").removeClass('d-none')
          //  alert(storedRating)
        }
        if((storedRating == "vasio4") && (nomeId == dadosNome1) ){
           $(".bi-star-fill").addClass('d-none')
  $("#vasio1").addClass('d-none')
  $("#vasio2").addClass('d-none')
  $("#vasio3").addClass('d-none')
  $("#vasio4").addClass('d-none')
  
  $("#marcado1").removeClass('d-none')
  $("#marcado2").removeClass('d-none')
  $("#marcado3").removeClass('d-none')
  $("#marcado4").removeClass('d-none')
          //  alert(storedRating)
        }
        if((storedRating == "vasio5") && (nomeId == dadosNome1) ){
             $(".bi-star").addClass('d-none')
 
            $(".bi-star-fill").removeClass('d-none')
          //  alert(storedRating)
        }


        /**MARCADO**/
              if((storedRating == "marcado5") && (nomeId == dadosNome1) ){
          $(".bi-star").addClass('d-none')
  $(".bi-star-fill").removeClass('d-none')
  $("#marcado5").addClass("d-none");
  $("#vasio5").removeClass("d-none");
          //  alert(storedRating)
        }
        if((storedRating == "marcado4") && (nomeId == dadosNome1) ){
            $(".bi-star-fill").addClass('d-none')
  $("#vasio1").addClass('d-none')
  $("#vasio2").addClass('d-none')
  $("#vasio3").addClass('d-none')
  $("#vasio4").removeClass('d-none')
  $("#vasio5").removeClass("d-none");
  
  $("#marcado1").removeClass('d-none')
  $("#marcado2").removeClass('d-none')
  $("#marcado3").removeClass('d-none')
 // $("#quatromarcado").removeClass('d-none')
 

          //  alert(storedRating)
        }
        if((storedRating == "marcado3") && (nomeId == dadosNome1) ){
            $(".bi-star-fill").addClass('d-none')
  $("#vasio1").addClass('d-none')
  $("#vasio2").addClass('d-none')
  $("#vasio3").removeClass('d-none')
  $("#vasio4").removeClass('d-none')
  $("#vasio5").removeClass("d-none");

  $("#marcado1").removeClass('d-none')
  $("#marcado2").removeClass('d-none')
  
          //  alert(storedRating)
        }
        if((storedRating == "marcado2") && (nomeId == dadosNome1) ){
         $(".bi-star-fill").addClass('d-none')

  $("#vasio1").addClass('d-none')
  $("#vasio2").removeClass('d-none')
  $("#vasio3").removeClass('d-none')
 $("#vasio4").removeClass('d-none')
 $("#vasio5").removeClass("d-none");
  
 // $("#doisarcado").removeClass('d-none')
 
 $("#marcado1").removeClass('d-none')
          //  alert(storedRating)
        }
        if((storedRating == "marcado1") && (nomeId == dadosNome1) ){
             $(".bi-star").removeClass('d-none')
 
            $(".bi-star-fill").addClass('d-none')
          //  alert(storedRating)
        }
    
     // alert(nomeId);
    }

    
  if ((localStorage.idEstrela != '')) {
        //mudaCor();
        //let tempo = setInterval(Dados,1000);
        requestAnimationFrame(Dados)
            
     }


</script>

</html>
