<?php
$conexao = mysqli_connect('localhost','root','','jobs_bd');
mysqli_set_charset($conexao, "utf8");

session_start();
// VERIFICAAÇÃO
if(!isset($_SESSION['logado'])){
  header('Location: index.php');
}
if(($_SESSION['freeID'] == $_GET['idPerfil'])){
  header('Location: index_free.php');
}
//DADOS
$id0 = $_SESSION['freeID'];
$sql0 = "SELECT * FROM tb_prestador WHERE id_prestador = '$id0'";
$resultado0 = mysqli_query($conexao, $sql0);
$dados0 = mysqli_fetch_array($resultado0);


if(isset($_GET['idPerfil'])){
  $id_perfil = $_GET['idPerfil'];

  $sqlBusca = "SELECT * FROM tb_prestador WHERE id_prestador LIKE  '$id_perfil'";
  $resultado = mysqli_query($conexao, $sqlBusca);
  $perfil = mysqli_fetch_array($resultado);

  $sqlBusca1 = "SELECT * FROM tb_trabalho WHERE id_trabalho LIKE  '$perfil[id_trabalho]'";
  $resultado1 = mysqli_query($conexao, $sqlBusca1);
  $perfil1 = mysqli_fetch_array($resultado1);

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
        <img src="assets/img/<?php echo $perfil['img_prestador']; ?>" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.php"><?php echo $perfil['nome_prestador']; ?></a></h1>
        <div class="social-links mt-3 text-center">
          <a href="#" class="facebook voltar" id="voltar"><i class="bx bx-arrow-back"></i></a>
          <a href="#" class="instagram"><i class="bx bxs-chat"></i></a>
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
            <h3>UDados Pessoais</h3>

            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Aniversário:</strong> <span><?php echo $perfil['data_prestador']; ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Contacto:</strong> <span><?php echo $perfil['contacto_prestador']; ?></span></li>

                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span><?php echo $perfil['email_prestador']; ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Endereço:</strong> <span><?php echo $perfil['endereco_prestador']; ?></span></li>


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
        <h3 class="resume-title">Education</h3>

        <div class="resume-item">
          <h4><?php echo $perfil['formacao_prestador']; ?></h4>
          <h5><?php echo $perfil['ver_tempo']; ?></h5>
          <p><em>Experion, New York, NY </em></p>
          <ul>
            <li>Lead in the design, development, and implementation of the graphic, layout, and production communication materials</li>
            <li>Delegate tasks to the 7 members of the design team and provide counsel on all aspects of the project. </li>
            <li>Supervise the assessment of all graphic materials in order to ensure quality and accuracy of the design</li>
            <li>Oversee the efficient use of production project budgets ranging from $2,000 - $25,000</li>
          </ul>
        </div>

      </div>

      <div class="col-md-6 container" data-aos="fade-up" data-aos-delay="100">
        <h3 class="resume-title">Professional Experience</h3>

        <div class="resume-item">
          <h4><?php echo $perfil1['tipo_trabalho']; ?></h4>
          <h5>2019 - Present</h5>
          <p><em>Experion, New York, NY </em></p>
          <ul>
            <li>Lead in the design, development, and implementation of the graphic, layout, and production communication materials</li>
            <li>Delegate tasks to the 7 members of the design team and provide counsel on all aspects of the project. </li>
            <li>Supervise the assessment of all graphic materials in order to ensure quality and accuracy of the design</li>
            <li>Oversee the efficient use of production project budgets ranging from $2,000 - $25,000</li>
          </ul>
        </div>

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
                <div class="portfolio-links">
                  <a href="assets/img/<?= $categoria1['pic_trabalho'] ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?= $categoria1['descricao_trabalho'] ?>"><i class="bx bx-plus"></i></a>
                  <a href="#!" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
            <?php }else{

              echo "<h1>Não tem nenhum registros dos teus trabalhos ainda...<h1>";
            }
          }

          ?> <!--
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

</div>-->
</section><!-- End Portfolio Section -->



<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials section-bg d-none">
  <div class="container">

    <div class="section-title">
      <h2>Comentários</h2>

    </div>

    <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper">

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

        <div class="swiper-slide">
          <div class="testimonial-item" data-aos="fade-up" data-aos-delay="100">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
            <h3>Sara Wilsson</h3>
            <h4>Designer</h4>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-item" data-aos="fade-up" data-aos-delay="200">
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
            <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
            <h3>Jena Karlis</h3>
            <h4>Store Owner</h4>
          </div>
        </div><!-- End testimonial item -->

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
<section id="contact" class="contact d-none">
  <div class="container">

    <div class="section-title">
      <h2>Contact</h2>
    </div>

    <div class="row" data-aos="fade-in">

      <div class="col-lg-5 d-flex align-items-stretch">
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

      <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
          <div class="row">
            <div class="form-group col-md-6">
              <label for="name">Your Name</label>
              <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="form-group col-md-6">
              <label for="name">Your Email</label>
              <input type="email" class="form-control" name="email" id="email" required>
            </div>
          </div>
          <div class="form-group">
            <label for="name">Subject</label>
            <input type="text" class="form-control" name="subject" id="subject" required>
          </div>
          <div class="form-group">
            <label for="name">Message</label>
            <textarea class="form-control" name="message" rows="10" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit">Send Message</button></div>
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
</script>

</html>
