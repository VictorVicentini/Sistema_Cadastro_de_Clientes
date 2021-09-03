<?php
// Conexão
include_once 'php_action/db_connect.php';
// Header
include_once 'includes/header.php';
// Select
if (isset($_GET['id'])) :
	//pega o id do contato que será atualizado
	$id = mysqli_escape_string($connect, $_GET['id']);

	$sql = "SELECT * FROM telefone WHERE id = '$id'";
	$resultado = mysqli_query($connect, $sql);
	$dados = mysqli_fetch_array($resultado);
endif;
?>

<!--Campo para edição do contato-->
<div class="row">
	<div class="col s12 m6 push-m3">
		<h3 class="light"> Editar Contato </h3>
		<form action="php_action/update.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
			<input type="hidden" name="id_cliente" value="<?php echo $dados['id_cliente']; ?>">
			<div class="input-field col s12 lime lighten-5">

				<div class="input-field col s6">
					<input type="text" name="tipoContato" id="tipoContato" value="<?php echo $dados['tipo_contato']; ?>" minlength="2">
					<label for="tipoContato">Tipo de Telefone</label>
				</div>

				<div class="input-field col s6">
					<input type="text" name="telefone" id="telefone" value="<?php echo $dados['numero']; ?>" minlength="10" required>
					<label for="telefone">Telefone</label>
				</div>
				
			</div>
			<button type="submit" name="btn-editar-contato" class="btn"> Atualizar</button>
		</form>
	</div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>