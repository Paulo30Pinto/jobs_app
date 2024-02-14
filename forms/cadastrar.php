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

if(isset($_POST['clientCad'])):


	$img = $_FILES["imagen"];
	move_uploaded_file($img["tmp_name"], "../assets/img/".$img["name"]);
	$novoNome = $img["name"];

	$nome = clear($_POST['nome']);
	$email = clear($_POST['email']);
	$telefone = clear($_POST['telefone']);
	$dataNace = clear($_POST['dataNace']);
	$senha = clear($_POST['senha']);
	$endereco = clear($_POST['endereco']);
	$sexo = clear($_POST['genero']);


	$sql = "INSERT INTO tb_cliente (nome_cliente, numero_cliente, endereco_cliente, email_cliente, data_cliente, senha_cliente, genero, img_cliente)
	VALUES (
		'$nome', '$telefone', '$endereco', '$email',  '$dataNace', '$senha', '$sexo', '$novoNome')";

		// move_uploaded_file($_FILES['musica']['tmp_name'],'audio/'.$musica);

		if(mysqli_query($conexao, $sql)):
			$_SESSION['mensagem'] = "Cadastrado com sucesso";
			header('Location: ../index.php?sucesso');

			//	echo "Cadastro com Sucesso";
		else:
			$_SESSION['mensagem'] = "Erro de cadastro";
			header('Location: ../index.php?Error');
			//		echo "erro de cadastro";
		endif;

	endif;

	if(isset($_POST['cadeFree'])){

		$img = $_FILES["imagen"];
		move_uploaded_file($img["tmp_name"], "../assets/img/".$img["name"]);
		$novoNome = $img["name"];

		$nome = clear($_POST['nome']);
		$email = clear($_POST['email']);
		$telefone = clear($_POST['contacto']);
		$dataNace = clear($_POST['dataFree']);
		$senha = clear($_POST['Senha']);
		$especialidade = clear($_POST['especialidade']);
		$trabalho = clear($_POST['Profissao']);
		$localidade = clear($_POST['local']);
		$sexo = clear($_POST['genero']);
		$forma = clear($_POST['forma']);
		$descricao = clear($_POST['descricao']);

		$sql = "INSERT INTO  tb_prestador (nome_prestador, contacto_prestador, categoria_prestador, senha_prestador, data_prestador, endereco_prestador, email_prestador, descricao_prestador, formacao_prestador, Genero, img_prestador, id_trabalho)
		VALUES (
			'$nome', '$telefone', '$especialidade', '$senha',  '$dataNace', '$localidade', '$email', '$descricao', '$forma', '$sexo', '$novoNome', '$trabalho')";


			if(mysqli_query($conexao, $sql)){
				$_SESSION['mensagem'] = "Cadastrado com sucesso";
				header('Location: ../index.php?sucesso');
			}
			//	echo "Cadastro com Sucesso";
			else{
				$_SESSION['mensagem'] = "Erro de cadastro";
				header('Location: ../index.php?Error');
				//		echo "erro de cadastro";
			}
		}


		if(isset($_POST['addServi'])){

			$img = $_FILES["picservi"];
			move_uploaded_file($img["tmp_name"], "../assets/img/".$img["name"]);
			$novoNome = $img["name"];

			$descricao = clear($_POST['descservi']);
			$usearioid = clear($_POST['idservi']);


			$sql = "INSERT INTO  tb_trabalhos_feitos (descricao_trabalho, pic_trabalho, id_prestador_trabalho)
			VALUES (
				'$descricao', '$novoNome', '$usearioid')";


				if(mysqli_query($conexao, $sql)){
					//	$_SESSION['mensagem'] = "Cadastrado com sucesso";
					header('Location: ../meu_perfil.php?sucesso');
				}
				//	echo "Cadastro com Sucesso";
				else{
					//	$_SESSION['mensagem'] = "Erro de cadastro";
					header('Location: ../meu_perfil.php?Error');
					//		echo "erro de cadastro";
				}
			}




			if(isset($_POST['clientAlter'])):

				$id = clear($_POST['alteid']);
				$img = $_FILES["imagen"];
				move_uploaded_file($img["tmp_name"], "../assets/img/".$img["name"]);
				$novoNome = $img["name"];

				$nome = clear($_POST['nome']);
				$email = clear($_POST['email']);
				$telefone = clear($_POST['telefone']);
				$dataNace = clear($_POST['dataNace']);
				$senha = clear($_POST['senha']);
				$senha2 = clear($_POST['senha2']);


				$sql = "UPDATE tb_cliente SET nome_cliente = '$nome', numero_cliente = '$telefone', endereco_cliente = '$senha2', email_cliente = '$email', data_cliente = '$dataNace', senha_cliente = '$senha', img_cliente = '$novoNome' WHERE id_cliente = '$id'";

				// move_uploaded_file($_FILES['musica']['tmp_name'],'audio/'.$musica);

				if(mysqli_query($conexao, $sql)):
					//	$_SESSION['mensagem'] = "Cadastrado com sucesso";
					header('Location: ../index_cliente.php?sucesso');

					//	echo "Cadastro com Sucesso";
				else:
					//	$_SESSION['mensagem'] = "Erro de cadastro";
					header('Location: ../index_cliente.php?Error');
					//		echo "erro de cadastro";
				endif;

			endif;


			if(isset($_POST['alterFree'])){
				$id = clear($_POST['idservi']);
				$img = $_FILES["Imagem"];
				move_uploaded_file($img["tmp_name"], "..assets/img/".$img["name"]);
				$novoNome = $img["name"];

				$nome = clear($_POST['nome']);
				$email = clear($_POST['email']);
				$telefone = clear($_POST['contacto']);
				$dataNace = clear($_POST['dataFree']);
				$senha = clear($_POST['Senha']);
				$especialidade = clear($_POST['especialidade']);
				$trabalho = clear($_POST['Profissao']);
				$localidade = clear($_POST['local']);
				$formacao = clear($_POST['formacao']);
				$descricao = clear($_POST['descricao']);

				$sql = "UPDATE tb_prestador SET nome_prestador = '$nome', contacto_prestador = '$telefone', categoria_prestador = '$especialidade', senha_prestador = '$senha', data_prestador = '$dataNace', endereco_prestador = '$localidade', email_prestador = '$email', id_trabalho = '$trabalho', formacao_prestador = '$formacao', 	descricao_prestador = '$descricao', img_prestador = '$novoNome' WHERE id_prestador = '$id'";


				if(mysqli_query($conexao, $sql)){
					//	$_SESSION['mensagem'] = "Cadastrado com sucesso";
					header('Location: ../meu_perfil.php?sucesso');
				}
				//	echo "Cadastro com Sucesso";
				else{
					//	$_SESSION['mensagem'] = "Erro de cadastro";
					header('Location: ../meu_perfil.php?Error');
					//		echo "erro de cadastro";
				}
			}




			//FAVORITOS
			if(isset($_POST['IdBaixar'])){
				$idgosto = $_POST['IdBaixar'];
				$like = $_POST['inputBaixados'];
				$sql = "UPDATE tb_prestador SET destaques = '$like' WHERE id_prestador = '$idgosto'";
				mysqli_query($conexao,$sql);
			}

			//SOLICITAÇÕES
			if(isset($_POST['solicita'])){
				$idsolita = $_POST['solicita'];
				$solconta = $_POST['total'];
				$usuario = $_POST['usuario'];

				/*$sql = "UPDATE tb_prestador SET solicitacao = '$solconta' WHERE id_prestador = '$idsolita'";
				mysqli_query($conexao,$sql); */

				$sql1 =  "INSERT INTO  tb_solicitacao (solicitado, id_prestador, id_cliente)
				VALUES (
					1, '$idsolita', '$usuario')";

					mysqli_query($conexao,$sql1);
				}

				//ACEITAR SOLICITAÇÕES
				if(isset($_POST['solicitaDados'])){
					$idsolita = $_POST['solicitaDados'];
					$usuarioId = $_POST['usuarioDados'];
					$solconta = $_POST['total'];

					$sql1 = "UPDATE tb_prestador SET solicitacao = '$solconta' WHERE id_prestador = '$idsolita'";
					mysqli_query($conexao,$sql1);

					$sql = "UPDATE tb_solicitacao SET pedido_aceite = 1 WHERE id_prestador = '$idsolita' AND id_cliente = '$usuarioId'";
					mysqli_query($conexao,$sql);
				}
				//CANCELAR SOLICITAÇÕES
				if(isset($_POST['cancelarSolicita'])){

					$idsolita = $_POST['cancelarSolicita'];
					//$solconta = $_POST['total'];
					$usuario = $_POST['usuarioDados'];

					/*	$sql = "UPDATE tb_prestador SET solicitacao = '$solconta' WHERE id_prestador = '$idsolita'";
					mysqli_query($conexao, $sql); */
					  $sql1 = "DELETE FROM tb_solicitacao WHERE id_prestador = '$idsolita' AND id_cliente = '$usuario'";
			//		$sql1 =  "UPDATE tb_solicitacao SET solicitado = 0 WHERE id_prestador = '$idsolita' AND id_cliente = '$usuario'";
					mysqli_query($conexao, $sql1);

				}

				//CANCELAR SOLICITAÇÕES
				if(isset($_GET['cansol'])){

					$idsolita = $_GET['cansol'];
					//$solconta = $_POST['total'];
					$usuario = $_GET['cliId'];

					/*	$sql = "UPDATE tb_prestador SET solicitacao = '$solconta' WHERE id_prestador = '$idsolita'";
					mysqli_query($conexao, $sql); */
						$sql1 = "DELETE FROM tb_solicitacao WHERE id_prestador = '$idsolita' AND id_cliente = '$usuario'";
			//		$sql1 =  "UPDATE tb_solicitacao SET solicitado = 0 WHERE id_prestador = '$idsolita' AND id_cliente = '$usuario'";
				//	mysqli_query($conexao, $sql1);
					if(mysqli_query($conexao, $sql1)):
						//$_SESSION['mensagem'] = "Excluido com sucesso";
						header('Location: ../index_cliente.php?sucesso');
					//  echo"<META HTTP-EQUIV=REFRESH CONTENT='0;URL=http://localhost/PHP/biko/admin/servico.php'>
					//  <script type=\"text/javascript\">alert(\"Apagado com sucesso!\");</script>";
					else:
						//	$_SESSION['mensagem'] = "Erro ao Exclur";
					header('Location: ../index_cliente.php?ERRO');
					//  echo"<META HTTP-EQUIV=REFRESH CONTENT='0;URL=http://localhost/PHP/biko/admin/servico.php'>
					//  <script type=\"text/javascript\">alert(\"Erro ao Apagar!\");</script>";
					endif;

				}


				/**APAGAR CLIENTE**/
  if (isset($_GET['apagaCliente'])) {

    $apaga_trabalho = mysqli_escape_string($conexao, $_GET['apagaCliente']);

    $sql = "DELETE FROM tb_cliente WHERE id_cliente = '$apaga_trabalho'";

    if(mysqli_query($conexao, $sql)):
      //$_SESSION['mensagem'] = "Excluido com sucesso";
      header('Location: ../index.php?sucesso');
	  echo "
			<script>alert('Conta Eliminada')</script>
	  ";
   //   echo"<META HTTP-EQUIV=REFRESH CONTENT='0;URL=http://localhost/PHP/biko/admin/servico.php'>
     // <script type=\"text/javascript\">alert(\"Apagado com sucesso!\");</script>";
    else:
      //	$_SESSION['mensagem'] = "Erro ao Exclur";
      header('Location: ../index_cliente.php?Error');
	  echo "
			<script>alert('Erro ao Eliminar Conta')</script>
	  ";
    //  echo"<META HTTP-EQUIV=REFRESH CONTENT='0;URL=http://localhost/PHP/biko/admin/servico.php'>
   //   <script type=\"text/javascript\">alert(\"Erro ao Apagar!\");</script>";
    endif;
  }

  /**APAGAR PRESTADOR**/
  if (isset($_GET['apagaiPrestador'])) {

	$apaga_trabalho = mysqli_escape_string($conexao, $_GET['apagaPrestador']);

    $tirachave1 = "DELETE FROM tb_trabalhos_feitos WHERE id_prestador_trabalho = '$apaga_trabalho'";
    mysqli_query($conexao, $tirachave1);
    
    $tirachave0 ="UPDATE tb_trabalhos_feitos SET id_prestador_trabalho = NULL WHERE id_prestador_trabalho = $apaga_trabalho";
    mysqli_query($conexao, $tirachave0);

    $sql1 = "UPDATE tb_prestador SET id_trabalho = 0 WHERE id_prestador = '$apaga_trabalho'";
		mysqli_query($conexao, $sql1);

    $solicitacao1 = "DELETE FROM tb_solicitacao WHERE id_prestador = '$apaga_trabalho'";
    mysqli_query($conexao, $solicitacao1);

    $formacao1 = "DELETE FROM tb_formacao WHERE Id_Pestador = '$apaga_trabalho'";
    mysqli_query($conexao, $formacao1);

    $comentario = "DELETE FROM tb_comentarios WHERE ID_Prestador = '$apaga_trabalho'";
    mysqli_query($conexao, $comentario);

    $sql = "DELETE FROM tb_prestador WHERE id_prestador = '$apaga_trabalho'";

    if(mysqli_query($conexao, $sql)):
      //$_SESSION['mensagem'] = "Excluido com sucesso";
      header('Location: ../index.php?sucesso');
     // echo"<META HTTP-EQUIV=REFRESH CONTENT='0;URL=http://localhost/PHP/biko/meu_perfil.php'>
     // <script type=\"text/javascript\">alert(\"Conta Eliminada!\");</script>";
    else:
      //	$_SESSION['mensagem'] = "Erro ao Exclur";
      header('Location: ../meu_perfil.php?Error');
     // echo"<META HTTP-EQUIV=REFRESH CONTENT='0;URL=http://localhost/PHP/biko/meu_perfil.php'>
    //  <script type=\"text/javascript\">alert(\"Erro ao Apagar!\");</script>";
    endif;
  }