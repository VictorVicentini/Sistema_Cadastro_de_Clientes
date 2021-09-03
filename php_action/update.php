<?php
// Inicia Sessão
session_start();
// Conexão
require_once 'db_connect.php';

//Atualiza as informações pessoas do cliente
if (isset($_POST['btn-editar'])) :
	$nome = mysqli_escape_string($connect, $_POST['nome']);
	$rg = mysqli_escape_string($connect, $_POST['rg']);
	$cpf = mysqli_escape_string($connect, $_POST['cpf']);
	$facebook = mysqli_escape_string($connect, $_POST['facebook']);
	$twitter = mysqli_escape_string($connect, $_POST['twitter']);
	$instagram = mysqli_escape_string($connect, $_POST['instagram']);
	$linkedin = mysqli_escape_string($connect, $_POST['linkedin']);
	$data_nascimento = $_POST['data_nascimento'];


	$id = mysqli_escape_string($connect, $_POST['id']);

	$sql = "UPDATE clientes SET nome = '$nome', rg = '$rg', cpf = '$cpf', facebook = '$facebook', twitter = '$twitter', instagram = '$instagram', linkedin = '$linkedin', data_nascimento = '$data_nascimento' WHERE id = '$id'";

	if (mysqli_query($connect, $sql)) :
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		header("Location: ../visualizar.php?id=$id");
	else :
		$_SESSION['mensagem'] = "Erro ao atualizar";
		header('Location: ../index.php');
	endif;
endif;


//Atualiza contato
if (isset($_POST['btn-editar-contato'])) :
	$tipo_contato = mysqli_escape_string($connect, $_POST['tipoContato']);
	$numero = mysqli_escape_string($connect, $_POST['telefone']);
	$id_cliente = mysqli_escape_string($connect, $_POST['id_cliente']);

	$id = mysqli_escape_string($connect, $_POST['id']);

	$sql = "UPDATE telefone SET tipo_contato = '$tipo_contato', numero = '$numero' WHERE id = '$id'";

	if (mysqli_query($connect, $sql)) :
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		header("Location: ../visualizar.php?id=$id_cliente");
	else :
		$_SESSION['mensagem'] = "Erro ao atualizar";
		header('Location: ../index.php');
	endif;
endif;

//Atualiza Endereco
if (isset($_POST['btn-editar-endereco'])) :
	$tipo_endereco = mysqli_escape_string($connect, $_POST['tipo_endereco']);
	$endereco = mysqli_escape_string($connect, $_POST['endereco']);
	$numero = mysqli_escape_string($connect, $_POST['numero']);
	$bairro = mysqli_escape_string($connect, $_POST['bairro']);
	$cep = mysqli_escape_string($connect, $_POST['cep']);
	$cidade = mysqli_escape_string($connect, $_POST['cidade']);
	$estado = mysqli_escape_string($connect, $_POST['estado']);
	$complemento = mysqli_escape_string($connect, $_POST['complemento']);
	$id_cliente = mysqli_escape_string($connect, $_POST['id_cliente']);

	$id = mysqli_escape_string($connect, $_POST['id']);

	$sql = "UPDATE endereco SET tipo_endereco = '$tipo_endereco', logradouro = '$endereco',numero = '$numero', bairro = '$bairro', cep = '$cep', cidade = '$cidade', estado = '$estado', complemento = '$complemento' , id_cliente = '$id_cliente' WHERE id = '$id'";

	if (mysqli_query($connect, $sql)) :
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		header("Location: ../visualizar.php?id=$id_cliente");
	else :
		$_SESSION['mensagem'] = "Erro ao atualizar";
		header('Location: ../index.php');
	endif;
endif;
