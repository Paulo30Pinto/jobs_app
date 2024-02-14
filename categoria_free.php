<?php
require_once "forms/conectar.php";
mysqli_set_charset($conexao, "utf8");
session_start();

// VERIFICAAÇÃO
if(!isset($_SESSION['logado'])){
  header('Location: index.php');
}

$sqlCategoria = "SELECT * FROM tb_trabalho";
$resulCategoria = mysqli_query($conexao, $sqlCategoria);
// $tarefas = array();
while ($categoria = mysqli_fetch_assoc($resulCategoria)) {
  //   $tarefas[] = $tarefa;
  // echo $categoria['tipo_trabalho'];
  //  echo json_encode($categoria) . "<br>";
}

//DADOS
$id0 = $_SESSION['freeID'];
$sql0 = "SELECT * FROM tb_prestador WHERE id_prestador = '$id0'";
$resultado0 = mysqli_query($conexao, $sql0);
$dados0 = mysqli_fetch_array($resultado0);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BIKO</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
      <div class='d-flex'>
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
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id='formpesqu'>
            <input type="search" name="search" id='search'>
            <button type="submit" class='btnpesqu' id='btnpesqu' name='btnpesqu'>
              <i class='bi bi-search' style='font-size: 21px;'></i>
            </button>
          </form>
        </div>

        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto" href="index_free.php">Inicio</a></li>

            <li><a class="nav-link scrollto active" href="#services">Serviços</a></li>


            <li><a class="nav-link scrollto" href="chat_free.php">Chat</a></li>
            <li><a class="nav-link scrollto" href="meu_perfil.php">Meu Perfil</a></li>

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
            <h1>Better Solutions For Your Business</h1>
            <h2>We are team of talented designers making websites with Bootstrap</h2>
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



      <!-- ======= Skills Section ======= -->
      <section id="skills" class="skills d-none">
        <div class="container" data-aos="fade-up">

          <div class="row">
            <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
              <img src="assets/img/skills.png" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
              <h3>Voluptatem dignissimos provident quasi corporis voluptates</h3>
              <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
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
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>

          <div class="row">

            <?php
            if(isset($_POST['btnpesqu'])){
              $texto = $_POST['search'];

              //  echo $texto;
              $sqlCategoria = "SELECT * FROM tb_trabalho WHERE tipo_trabalho LIKE  '%$texto%'";
              $resulCategoria = mysqli_query($conexao, $sqlCategoria);
              // $tarefas = array();
              if(mysqli_num_rows($resulCategoria) > 0){
                while ($categoria = mysqli_fetch_assoc($resulCategoria)) {
                  echo "

                  <div class='col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0 my-2' data-aos='zoom-in' data-aos-delay='100'>
                  <div class='icon-box'>
                  <div class='pic'><img src='assets/img/$categoria[img_categoria]' alt='' class='img-fluid'></div>
                  <h4><a href='freelancer_free.php?id=$categoria[id_trabalho]'>$categoria[tipo_trabalho]</a></h4>
                  <p>$categoria[descricao_trabalho]</p>
                  </div>
                  </div>

                  ";
                }
              } else{
                echo "
                <h1 class='py-5 text-center'>Dados da pesquisa não encotrado</h1>
                ";
              }
            } else{
              $sqlBusca = 'SELECT * FROM tb_trabalho ORDER BY destaque_trabalho DESC';
              $resultado = mysqli_query($conexao, $sqlBusca);
              // $tarefas = array();
              while ($tarefa = mysqli_fetch_assoc($resultado)) {

                echo "

                <div class='col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0 my-2' data-aos='zoom-in' data-aos-delay='100'>
                <div class='icon-box'>
                <div class='pic'><img src='assets/img/$tarefa[img_categoria]' alt='' class='img-fluid'></div>
                <h4><a href='freelancer_free.php?id=$tarefa[id_trabalho]'>$tarefa[tipo_trabalho]</a></h4>
                <p>$tarefa[descricao_trabalho]</p>
                </div>
                </div>

                ";

              }
            }
            ?>
            <div class="col-12 text-center py-4 d-none">
              <a href="#!" class="btn btn-get-started d-none" data-bs-toggle="modal" data-bs-target="#modalLogin">Ver Mais ></a>
              <a href="categoria.php" class="btn btn-get-started">Ver Mais ></a>
            </div>
          </div>

        </div>

      </section><!-- End Services Section -->


      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Assistência</h2>
            <p class="d-none">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>

          <div class="row">

            <div class="col-lg-5 d-flex align-items-stretch">
              <div class="info">
                <div class="address">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Ond Estamos:</h4>
                  <p>Luanda / Angola</p>
                </div>

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

                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d31534.025256829707!2d13.203012999999999!3d-8.9025258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-PT!2sao!4v1684694860700!5m2!1spt-PT!2sao" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
              </div>

            </div>

            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
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

      <div class="footer-top">
        <div class="container">
          <div class="row">

            <div class="col-lg-3 col-md-6 footer-contact">
              <h3>BIKOS</h3>
              <p>
                Luanda <br>
                Angolga<br>
                Africa <br><br>
                <strong>Telefone:</strong> +244 939 509 434<br>
                <strong>Email:</strong> info@bikos.com<br>
              </p>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Links de usuario</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Sobre nós</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Serviços</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Termos de serviço</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Política de Privacidade</a></li>
              </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Nossos serviços</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Pestação de serviços</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Desenvolvimento web</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">gestão de produtos</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Design gráfico</a></li>
              </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Nossas Rede Sociais</h4>
              <p class="d-none">Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
              <div class="social-links mt-3">
                <a href="https://twitter.com/" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="https://www.facebook.com/" target="_next" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://www.instagram.com/" class="instagram" target="_next"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
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



    <!-- Modal LOGIN-->
    <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Por favor inicie sua sessão</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body text-center" id="iniLog">
            <div class="d-flex justify-content-center justify-content-lg-center">
              <a href="#" class="btn-get-started scrollto" id="clinteForm">Como Clinte</a>
              <a href="#" class="btn-get-started scrollto mx-1"><span>Como Prestador</span></a>
            </div>
          </div>


          <form class="text-center d-none" id="LoginCli">
            <div class="modal-body">

              <img class="mb-4" src="assets/img/iconusuario.png" alt="" width="72" height="57">
              <h1 class="h3 mb-3 fw-normal">Logar-se</h1>

              <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>

              <div class="checkbox mb-3 my-2 text-start">
                <a href="#" class="nav-link text-primary">Esqueci minha senha</a>
              </div>

              <p class="mt-5 mb-3 text-muted text-center d-flex align-items-center justify-content-center">&copy; Não tenho conta?  <a href="#" id="btn-registraP" class="p-1 nav-link btn-registra text-primary">Registrar-se</a></p>

            </div>
            <div class="modal-footer">
              <button class="w-100 btn btn-get-started" type="submit">Sign in</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal CADASTRO-->
    <div class="modal fade" id="modalCadastro"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Por favor faça o seu cadastro</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body text-center">
            <div class="d-flex justify-content-center justify-content-lg-center">
              <a href="#" class="btn-get-started scrollto">Como Clinte</a>
              <a href="#" class="btn-get-started scrollto mx-1"><span>Como Prestador</span></a>
            </div>
          </div>
          <form class="text-center d-none">
            <div class="modal-body">

              <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
              <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

              <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>

              <div class="checkbox mb-3">
                <label>
                  <input type="checkbox" value="remember-me"> Remember me
                </label>
              </div>

              <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>

            </div>
            <div class="modal-footer">
              <button class="w-100 btn btn-get-started" type="submit">Sign in</button>
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
  <script>
  $("#clinteForm").click(()=>{
    $("#iniLog").addClass('d-none');
    $("#LoginCli").removeClass('d-none');

    // alert("Ola mundo");
  })
  </script>

  </html>
