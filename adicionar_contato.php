<?php
// Header
include_once 'includes/header.php';
// Conexão
include_once 'php_action/db_connect.php';


if (isset($_GET['id'])) :
	//pega o id do cliente passado pela url
	$id = mysqli_escape_string($connect, $_GET['id']);
?>
	<!--Input cadastro de contatos-->
	<div class="row">
		<div class="col s12 m6 push-m3">
			<h3 class="light"> Novo Contato </h3>
			<form action="php_action/create.php" method="POST">

				<div class="input-field col s12 lime lighten-5">

					<div class="input-field col s6">
						<input type="text" name="tipoContato" id="tipoContato" minlength="2" required>
						<label for="tipoContato">Tipo de Telefone</label>
					</div>

					<div class="input-field col s6">
						<input type="text" name="telefone" id="telefone" minlength="14" required>
						<label for="telefone">Telefone</label>
					</div>
					
				</div>
				<input type="hidden" name="id_cliente" value="<?php echo $id; ?>">
				<button type="submit" name="btn-add-contato" class="btn"> Cadastrar </button>
			</form>
		</div>
	</div>


<?php
endif;
// Footer
include_once 'includes/footer.php';
?>