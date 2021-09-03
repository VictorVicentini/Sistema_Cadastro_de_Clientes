<?php
// Header
include_once 'includes/header.php';
// Conexão
include_once 'php_action/db_connect.php';

if (isset($_GET['id'])) :
	//pega o valor do id do cliente passado pela url
	$id = mysqli_escape_string($connect, $_GET['id']);
?>

	<div class="row">
		<div class="col s12 m6 push-m3">
			<h3 class="light"> Novo Endereço </h3>
			<form action="php_action/create.php" method="POST">
				<div class="input-field col s12 lime lighten-5">

					<div class="input-field col s8">
						<input type="text" name="tipo_endereco" id="tipo_endereco" minlength="2" required>
						<label for="tipo_endereco">Tipo Endereço</label>
					</div>

					<div class="input-field col s4">
						<input type="text" name="cep" id="cep" required>
						<label for="cep">CEP</label>
					</div>

					<div class="input-field col s9">
						<input type="text" name="endereco" id="endereco">
						<label for="endereco">Endereco</label>
					</div>

					<div class="input-field col s3">
						<input type="text" name="numero" id="numero">
						<label for="numero">Nº</label>
					</div>

					<div class="input-field col s4">
						<input type="text" name="bairro" id="bairro">
						<label for="bairro">Bairro</label>
					</div>

					<div class="input-field col s4">
						<input type="text" name="cidade" id="cidade">
						<label for="cidade">Cidade</label>
					</div>

					<div class="input-field col s4">
						<input type="text" name="estado" id="estado">
						<label for="estado">Estado</label>
					</div>

					<div class="input-field col s12">
						<input type="text" name="complemento" id="complemento">
						<label for="complemento">Complemento</label>
					</div>
					
				</div>
				<!--Serve para passar o id do clinente para ser utilizado na página create.php-->
				<input type="hidden" name="id_cliente" value="<?php echo $id; ?>">
				<button type="submit" name="btn-add-endereco" class="btn"> Cadastrar </button>
			</form>
		</div>
	</div>

<?php
endif;
// Footer
include_once 'includes/footer.php';
?>