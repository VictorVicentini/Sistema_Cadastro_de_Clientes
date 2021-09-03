<?php
// Inicia Sessão
session_start();
// Conexão
require_once 'db_connect.php';

if (isset($_POST['btn-deletar'])) :

	$id = mysqli_escape_string($connect, $_POST['id']);
	$sql = "DELETE FROM endereco WHERE id_cliente = '$id'";

	//exclui o cliente e os contatos e endereços pertencentes a ele
	if (mysqli_query($connect, $sql)) {
		$sql = "DELETE FROM telefone WHERE id_cliente = '$id'";

		if (mysqli_query($connect, $sql)) {
			$sql = "DELETE FROM clientes WHERE id = '$id'";

			if (mysqli_query($connect, $sql)) {
				$_SESSION['mensagem'] = "Deletado com sucesso!";
				header('Location: ../index.php');
			} else {
				$_SESSION['mensagem'] = "Erro ao deletar";
				header('Location: ../index.php');
			}
		} else {
			$_SESSION['mensagem'] = "Erro ao deletar";
			header('Location: ../index.php');
		}
	} else {
		$_SESSION['mensagem'] = "Erro ao deletar";
		header('Location: ../index.php');
	}

endif;

//Exclui um contato específico
if (isset($_POST['btn-deletar-contato'])) :

	$id = mysqli_escape_string($connect, $_POST['id_contato']);
	$id_cliente = mysqli_escape_string($connect, $_POST['id_cliente_contato']);

	$sql = "DELETE FROM telefone WHERE id = '$id' AND id_cliente ='$id_cliente'";

	if (mysqli_query($connect, $sql)) :
		$_SESSION['mensagem'] = "Deletado com sucesso!";
		header("Location: ../visualizar.php?id=$id_cliente");
	else :
		$_SESSION['mensagem'] = "Erro ao deletar";
		header("Location: ../visualizar.php?id=$id_cliente");
	endif;
endif;

//Exclui um Endereco específico
if (isset($_POST['btn-deletar-endereco'])) :

	$id = mysqli_escape_string($connect, $_POST['id']);
	$id_cliente = mysqli_escape_string($connect, $_POST['id_cliente_endereco']);

	$sql = "DELETE FROM endereco WHERE id = '$id' AND id_cliente ='$id_cliente'";

	if (mysqli_query($connect, $sql)) :
		$_SESSION['mensagem'] = "Deletado com sucesso!";
		header("Location: ../visualizar.php?id=$id_cliente");
	else :
		$_SESSION['mensagem'] = "Erro ao deletar";
		header("Location: ../visualizar.php?id=$id_cliente");
	endif;
endif;
