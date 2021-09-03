<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';
//faz o tratamento do conteúdo dos input para poder ser inserido no banco de dados
function clear($input)
{
	global $connect;
	// sql
	$var = mysqli_escape_string($connect, $input);
	// xss
	$var = htmlspecialchars($var);
	return $var;
}


function validaCPF($cpf) {
 
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;

}

//Adiciona cliente no banco de dados
if (isset($_POST['btn-cadastrar'])) :
	$nome = clear($_POST['nome']);
	$rg = clear($_POST['rg']);
	$cpf = clear($_POST['cpf']);
	$facebook = clear($_POST['facebook']);
	$twitter = clear($_POST['twitter']);
	$instagram = clear($_POST['instagram']);
	$linkedin = clear($_POST['linkedin']);
	$data_nascimento = $_POST['data_nascimento'];

	

	$sql = "INSERT INTO clientes (nome, rg, cpf, facebook, twitter, instagram, linkedin, data_nascimento) VALUES ('$nome', '$rg', '$cpf', '$facebook','$twitter','$instagram','$linkedin','$data_nascimento')";


	if (mysqli_query($connect, $sql)) :
		$_SESSION['mensagem'] = "Cadastrado com sucesso!";
		$id = mysqli_insert_id($connect);

		header("Location: ../visualizar.php?id=$id");
	else :
		$_SESSION['mensagem'] = "Erro ao cadastrar";
		header('Location: ../index.php');
	endif;

endif;


//Adicionar contato no banco de dados
if (isset($_POST['btn-add-contato'])) :
	$tipo_contato = clear($_POST['tipoContato']);
	$telefone = clear($_POST['telefone']);
	$id_cliente = clear($_POST['id_cliente']);


	$sql = "INSERT INTO telefone (tipo_contato, numero, id_cliente) VALUES ('$tipo_contato', '$telefone', '$id_cliente')";


	if (mysqli_query($connect, $sql)) :
		$_SESSION['mensagem'] = "Cadastrado com sucesso!";
		$id = mysqli_insert_id($connect);

		header("Location: ../visualizar.php?id=$id_cliente");
	else :
		$_SESSION['mensagem'] = "Erro ao cadastrar";
		header('Location: ../index.php');
	endif;
endif;


//Adicionar endereço no banco de dados
if (isset($_POST['btn-add-endereco'])) :
	$tipo_endereco = clear($_POST['tipo_endereco']);
	$endereco = clear($_POST['endereco']);
	$numero = clear($_POST['numero']);
	$bairro = clear($_POST['bairro']);
	$cep = clear($_POST['cep']);
	$estado = clear($_POST['estado']);
	$id_cliente = clear($_POST['id_cliente']);
	$cidade = clear($_POST['cidade']);
	$complemento = clear($_POST['complemento']);



	$sql = "INSERT INTO endereco (tipo_endereco, logradouro, cep, numero, bairro, cidade, estado, complemento, id_cliente) VALUES ('$tipo_endereco', '$endereco', '$cep', '$numero', '$bairro', '$cidade', '$estado', '$complemento','$id_cliente')";


	if (mysqli_query($connect, $sql)) :
		$_SESSION['mensagem'] = "Cadastrado com sucesso!";
		$id = mysqli_insert_id($connect);

		header("Location: ../visualizar.php?id=$id_cliente");
	else :
		$_SESSION['mensagem'] = "Erro ao cadastrar";
		header('Location: ../index.php');
	endif;
endif;
