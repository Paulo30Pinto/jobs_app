<?php
require_once "forms/conectar.php";
mysqli_set_charset($conexao, "utf8");
session_start();
// VERIFICAAÇÃO
if(!isset($_SESSION['logado'])){
  header('Location: index.php');
}

//DADOS
$id0 = $_SESSION['freeID'];
$sql0 = "SELECT * FROM tb_prestador WHERE id_prestador = '$id0'";
$resultado0 = mysqli_query($conexao, $sql0);
$dados0 = mysqli_fetch_array($resultado0);


if(isset($_GET['id'])){
  $id_categoria = $_GET['id'];

  $sqlBusca = "SELECT * FROM tb_prestador WHERE id_trabalho LIKE  '$id_categoria'";
  $resultado = mysqli_query($conexao, $sqlBusca);
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
            <li><a class="nav-link scrollto" href="index_free.php">Inicio</a></li>

            <li><a class="nav-link scrollto" href="categoria_free.php">Serviços</a></li>

            <li><a class="nav-link scrollto active" href="#team">Comunidade</a></li>
            <li><a class="nav-link scrollto" href="chat_free.php">Chat</a></li>
            <li><a class="nav-link scrollto" href="meu_perfil.php">Meu Perfil</a></li>
          </li>
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


    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <?php
          $sqlCategoria1 = "SELECT * FROM tb_trabalho WHERE id_trabalho LIKE  '$id_categoria'";
          $resulCategoria1 = mysqli_query($conexao, $sqlCategoria1);
          // $tarefas = array();
          while ($categoria1 = mysqli_fetch_assoc($resulCategoria1)) {
            ?>
            <h2><?php  echo $categoria1['tipo_trabalho']; ?></h2>
            <p><?php  echo $categoria1['descricao_trabalho']; ?></p>
            <?php }?>
          </div>

          <div class="row">

            <?php
            if(mysqli_num_rows($resultado) > 0){
              while ($tarefa = mysqli_fetch_assoc($resultado)) {
                echo "
                <div class='col-lg-6  mt-4 mt-lg-0' data-aos='zoom-in' data-aos-delay='100'>
                <div class='member d-flex align-items-start'>
                <div class='pic'><img src='assets/img/$tarefa[img_prestador]' class='img-fluid' alt=''></div>
                <div class='member-info'>
                <h4>$tarefa[nome_prestador]</h4>
                <span>$tarefa[categoria_prestador]</span>
                <p>$tarefa[descricao_prestador]</p>
                <div class='social'>
                <a href='perfil_free.php?idPerfil=$tarefa[id_prestador]'><i class='ri-user-fill'></i></a>
                <a href='#!idPrestador=$tarefa[id_prestador]'><i class='bi bi-chat-fill'></i></a>
                <a href='' class='d-none'><i class='ri-instagram-fill'></i></a>
                <a href='' class='d-none'> <i class='ri-linkedin-box-fill'></i> </a>
                </div>
                </div>
                </div>
                </div>
                ";
              }
            }else{
              echo "
              <h1 class='py-5 text-center'>Dados da pesquisa não encotrado</h1>
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

      <div class="container footer-bottom clearfix">
        <div class="copyright">
          &copy; Copyright <strong><span>Arsha</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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
                <input type="text" class="form-control" id="loginome" name="loginome" placeholder="Seu nome">
                <label for="loginome">Nome</label>
              </div>
              <div class="form-floating">
                <input type="password" class="form-control" name='senhalogin' id="senhalogin" placeholder="Password">
                <label for="senhalogin">Password</label>
              </div>

              <div class="checkbox mb-3 my-2 text-start">
                <a href="#" class="nav-link text-primary d-none">Esqueci minha senha</a>
              </div>

              <p class="mt-5 mb-3 text-muted text-center d-flex align-items-center justify-content-center">&copy; Não tenho conta?  <a href="#" id="btn-registraP" class="p-1 nav-link btn-registra text-primary">Registrar-se</a></p>

            </div>
            <div class="modal-footer">
              <button class="w-100 btn btn-get-started" name='entraLogin' id='entraLogin' type="submit">Sign in</button>
            </div>
          </form>

          <!--LOGIN PRESTADOR-->
          <form ction="forms/login.php" enctype="multipart/form-data" method="post" class="text-center d-none" id="LoginPresta">
            <div class="modal-body">

              <img class="mb-4" src="assets/img/iconusuario.png" alt="" width="72" height="57">
              <h1 class="h3 mb-3 fw-normal">Logar-se</h1>

              <div class="form-floating py-2">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>

              <div class="checkbox mb-3 my-2 text-start">
                <a href="#" class="nav-link text-primary d-none">Esqueci minha senha</a>
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
    <div class="modal fade" id="modalCadastro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
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
