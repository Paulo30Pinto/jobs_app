<?php
//SESSÂO
session_start();

/**CONEXÃO**/
require_once 'conectar.php';

//CLEAR

function clear($input){
	global $conexao;

	$var = mysqli_escape_string($conexao, $input);
	$var = htmlspecialchars($var);
	return $var;
}

if (isset($_POST['apagameu'])) {
    # code...
    $meuid = $_POST['meuid'];
    $idsms = $_POST['minhasms'];
    $idPrestador = $_POST['idPrestador'];

 //   $apaga_trabalho = mysqli_escape_string($conexao, $_POST['eliminar']);

    $sql = "DELETE FROM chats WHERE enviar_id = '$meuid' AND chat_id  = '$idsms'";

    if(mysqli_query($conexao, $sql)):
      //$_SESSION['mensagem'] = "Excluido com sucesso";
      header('Location: ../chat.php?idPrestador='.$idPrestador);
    //  echo"<META HTTP-EQUIV=REFRESH CONTENT='0;URL=http://localhost/PHP/biko/admin/servico.php'>
    //  <script type=\"text/javascript\">alert(\"Apagado com sucesso!\");</script>";
    else:
      //	$_SESSION['mensagem'] = "Erro ao Exclur";
    header('Location: ../chat.php?idPrestador='.$idPrestador);
    //  echo"<META HTTP-EQUIV=REFRESH CONTENT='0;URL=http://localhost/PHP/biko/admin/servico.php'>
    //  <script type=\"text/javascript\">alert(\"Erro ao Apagar!\");</script>";
    endif;
}

if (isset($_POST['apagadele'])) {
    # code...
    $meuid = $_POST['meuid'];
    $idsms = $_POST['minhasms'];
    $idPrestador = $_POST['idPrestador'];

 //   $apaga_trabalho = mysqli_escape_string($conexao, $_POST['eliminar']);

    $sql1 = "DELETE FROM chats WHERE receber_id = '$idPrestador' AND chat_id  = '$idsms'";

    if(mysqli_query($conexao, $sql1)):
      //$_SESSION['mensagem'] = "Excluido com sucesso";
      header('Location: ../chat.php?idPrestador='.$meuid);
    //  echo"<META HTTP-EQUIV=REFRESH CONTENT='0;URL=http://localhost/PHP/biko/admin/servico.php'>
    //  <script type=\"text/javascript\">alert(\"Apagado com sucesso!\");</script>";
    else:
      //	$_SESSION['mensagem'] = "Erro ao Exclur";
    header('Location: ../chat.php?idPrestador='.$meuid);
    //  echo"<META HTTP-EQUIV=REFRESH CONTENT='0;URL=http://localhost/PHP/biko/admin/servico.php'>
    //  <script type=\"text/javascript\">alert(\"Erro ao Apagar!\");</script>";
    endif;
}
if (isset($_GET['dadosPrest'])) {
    # code...
    $meuid = $_GET['dadosCli'];
    $idsms = $_GET['dadosPrest'];
  //  $idPrestador = $_POST['idPrestador'];

 //   $apaga_trabalho = mysqli_escape_string($conexao, $_POST['eliminar']);

    $sql1 = "DELETE FROM chats WHERE receber_id = ' $idsms' AND enviar_id = '$meuid'";
    $sql2 = "DELETE FROM conversas WHERE user_1 = ' $idsms' AND user_2 = '$meuid'";
		mysqli_query($conexao, $sql2);
    if(mysqli_query($conexao, $sql1)):

      //$_SESSION['mensagem'] = "Excluido com sucesso";
      header('Location: ../chat.php?idPrestador='.$idsms);
    //  echo"<META HTTP-EQUIV=REFRESH CONTENT='0;URL=http://localhost/PHP/biko/admin/servico.php'>
    //  <script type=\"text/javascript\">alert(\"Apagado com sucesso!\");</script>";
    else:
      //	$_SESSION['mensagem'] = "Erro ao Exclur";
    header('Location: ../chat.php?idPrestador='.$idsms);
    //  echo"<META HTTP-EQUIV=REFRESH CONTENT='0;URL=http://localhost/PHP/biko/admin/servico.php'>
    //  <script type=\"text/javascript\">alert(\"Erro ao Apagar!\");</script>";
    endif;
}

if (isset($_GET['dadosMeu'])) {
    # code...
    $meuid = $_GET['dadosMeu'];
    $idsms = $_GET['dadosTeu'];
  //  $idPrestador = $_POST['idPrestador'];

 //   $apaga_trabalho = mysqli_escape_string($conexao, $_POST['eliminar']);

    $sql1 = "DELETE FROM chats WHERE receber_id = ' $idsms' AND enviar_id = '$meuid'";
    $sql2 = "DELETE FROM conversas WHERE user_1 = ' $idsms' AND user_2 = '$meuid'";
		mysqli_query($conexao, $sql2);
    if(mysqli_query($conexao, $sql1)):

      //$_SESSION['mensagem'] = "Excluido com sucesso";
      header('Location: ../chat_free.php');
    //  echo"<META HTTP-EQUIV=REFRESH CONTENT='0;URL=http://localhost/PHP/biko/admin/servico.php'>
    //  <script type=\"text/javascript\">alert(\"Apagado com sucesso!\");</script>";
    else:
      //	$_SESSION['mensagem'] = "Erro ao Exclur";
    header('Location: ../chat_free.php');
    //  echo"<META HTTP-EQUIV=REFRESH CONTENT='0;URL=http://localhost/PHP/biko/admin/servico.php'>
    //  <script type=\"text/javascript\">alert(\"Erro ao Apagar!\");</script>";
    endif;
}

if (isset($_POST['minhasms1'])) {
  # code...
  $meuid = $_POST['meuid1'];
  $idsms = $_POST['minhasms1'];
  $idPrestador = $_POST['idPrestador1'];

//   $apaga_trabalho = mysqli_escape_string($conexao, $_POST['eliminar']);

  $sql = "DELETE FROM chats WHERE enviar_id = '$meuid' AND chat_id  = '$idsms'";

  if(mysqli_query($conexao, $sql)):
 /*   echo "
        <script>
          alert('Apagou');
        </script>
    "; */
    //$_SESSION['mensagem'] = "Excluido com sucesso";
  //  header('Location: ../chat.php?idPrestador='.$idPrestador);
  //  echo"<META HTTP-EQUIV=REFRESH CONTENT='0;URL=http://localhost/PHP/biko/admin/servico.php'>
  //  <script type=\"text/javascript\">alert(\"Apagado com sucesso!\");</script>";
  else:
    //	$_SESSION['mensagem'] = "Erro ao Exclur";
 // header('Location: ../chat.php?idPrestador='.$idPrestador);
  //  echo"<META HTTP-EQUIV=REFRESH CONTENT='0;URL=http://localhost/PHP/biko/admin/servico.php'>
  //  <script type=\"text/javascript\">alert(\"Erro ao Apagar!\");</script>";
   echo " <script>
   alert('Não Apagou');
 </script>";
  endif;
}

if (isset($_POST['minhasms2'])) {
  # code...
  $meuid = $_POST['meuid2'];
  $idsms = $_POST['minhasms2'];
  $idPrestador = $_POST['idPrestador2'];

//   $apaga_trabalho = mysqli_escape_string($conexao, $_POST['eliminar']);

  $sql1 = "DELETE FROM chats WHERE receber_id = '$idPrestador' AND chat_id  = '$idsms'";

  if(mysqli_query($conexao, $sql1)):
   /* echo "
        <script>
          alert('Apagou');
        </script>
    "; */
    //$_SESSION['mensagem'] = "Excluido com sucesso";
   // header('Location: ../chat.php?idPrestador='.$meuid);
  //  echo"<META HTTP-EQUIV=REFRESH CONTENT='0;URL=http://localhost/PHP/biko/admin/servico.php'>
  //  <script type=\"text/javascript\">alert(\"Apagado com sucesso!\");</script>";
  else:
    //	$_SESSION['mensagem'] = "Erro ao Exclur";
 // header('Location: ../chat.php?idPrestador='.$meuid);
  //  echo"<META HTTP-EQUIV=REFRESH CONTENT='0;URL=http://localhost/PHP/biko/admin/servico.php'>
  //  <script type=\"text/javascript\">alert(\"Erro ao Apagar!\");</script>";
  echo " <script>
  alert('Não Apagou');
</script>";
  endif;
}

