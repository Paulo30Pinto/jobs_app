<?php
//SESSÂO
session_start();
/**CONEXÃO**/
require_once 'conectar.php';

function clear($input){
  global $conexao;

  $var = mysqli_escape_string($conexao, $input);
  $var = htmlspecialchars($var);
  return $var;
}

if(isset($_POST['assitencia'])){
  $from_name = $_POST['name'];
  $from_email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $sql = "INSERT INTO assintacia (nome_assiste, email_assiste, assunto_assiste, descricao_assiste)
  VALUES (
    '$from_name', '$from_email', '$subject', '$message')";

    // move_uploaded_file($_FILES['musica']['tmp_name'],'audio/'.$musica);

    if(mysqli_query($conexao, $sql)):
      $_SESSION['mensagem'] = "Cadastrado com sucesso";
      header('Location: ../index_cliente.php?sucesso');

      //	echo "Cadastro com Sucesso";
    else:
      $_SESSION['mensagem'] = "Erro de cadastro";
      header('Location: ../index_cliente.php?Error');
      //		echo "erro de cadastro";
    endif;
  }


  if(isset($_POST['btn_comenta'])){

    $from_name = $_POST['name'];
    $from_email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $idCliente = $_POST['id_cliente'];
    $idPrestador = $_POST['id_prestador'];

    $sql = "INSERT INTO tb_comentarios (Nome, Email, Assunto, Comentario, ID_Prestador, ID_Cliente)
    VALUES (
      '$from_name', '$from_email', '$subject', '$message', $idPrestador, $idCliente)";

      // move_uploaded_file($_FILES['musica']['tmp_name'],'audio/'.$musica);

      if(mysqli_query($conexao, $sql)):
        $_SESSION['mensagem'] = "Cadastrado com sucesso";
        header('Location: ../perfil.php?idPerfil='.$idPrestador);

        //	echo "Cadastro com Sucesso";
      else:
        $_SESSION['mensagem'] = "Erro de cadastro";
        header('Location: ../perfil.php?idPerfil='.$idPrestador);
        //		echo "erro de cadastro";
      endif;
    }

    if(isset($_POST['resp_comenta'])){

      $from_name = $_POST['name'];
      $from_email = $_POST['email'];
      $subject = $_POST['subject'];
      $message = $_POST['message'];
      $idPrestador = $_POST['id_prestador'];

      $sql = "INSERT INTO tb_comentarios (Nome, Email, Assunto, Comentario, ID_Prestador)
      VALUES (
        '$from_name', '$from_email', '$subject', '$message', $idPrestador)";

        // move_uploaded_file($_FILES['musica']['tmp_name'],'audio/'.$musica);

        if(mysqli_query($conexao, $sql)):
          $_SESSION['mensagem'] = "Cadastrado com sucesso";
          header('Location: ../meu_perfil.php?sucesso');

          //  echo "Cadastro com Sucesso";
        else:
          $_SESSION['mensagem'] = "Erro de cadastro";
          header('Location: ../meu_perfil.php?Error');
          //    echo "erro de cadastro";
        endif;
      }


      //FORMAÇÂO
      if(isset($_POST['AddForma'])){

        $nomeForma = $_POST['nomeForma'];
        $dataForma = $_POST['dataForma'];
        $uniForma = $_POST['uniForma'];
        $descForma = $_POST['descForma'];
        $idPrestador = $_POST['idForma'];

        $sql = "INSERT INTO tb_formacao (nivel_academico, data_estudo, local_estudo, info_estudo, Id_Pestador)
        VALUES (
          '$nomeForma', '$dataForma', '$uniForma', '$descForma', $idPrestador)";

          // move_uploaded_file($_FILES['musica']['tmp_name'],'audio/'.$musica);

          if(mysqli_query($conexao, $sql)):
            $_SESSION['mensagem'] = "Cadastrado com sucesso";
            header('Location: ../meu_perfil.php?sucesso');

            //  echo "Cadastro com Sucesso";
          else:
            $_SESSION['mensagem'] = "Erro de cadastro";
            header('Location: ../meu_perfil.php?Error');
            //    echo "erro de cadastro";
          endif;
        }

        //CURSOS
        if(isset($_POST['AddCurso'])){

          $nomeForma = $_POST['nomeForma'];
          $dataForma = $_POST['dataForma'];
          $uniForma = $_POST['uniForma'];
          $descForma = $_POST['descForma'];
          $idPrestador = $_POST['idForma'];

          $sql = "INSERT INTO tb_formacao (nome_formacao, data_formacao, local_formacao, info_formacao, Id_Pestador)
          VALUES (
            '$nomeForma', '$dataForma', '$uniForma', '$descForma', $idPrestador)";

            // move_uploaded_file($_FILES['musica']['tmp_name'],'audio/'.$musica);

            if(mysqli_query($conexao, $sql)):
              $_SESSION['mensagem'] = "Cadastrado com sucesso";
              header('Location: ../meu_perfil.php?sucesso');

              //  echo "Cadastro com Sucesso";
            else:
              $_SESSION['mensagem'] = "Erro de cadastro";
              header('Location: ../meu_perfil.php?Error');
              //    echo "erro de cadastro";
            endif;
          }

          ?>
