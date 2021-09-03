<?php
// Conexão
include_once 'php_action/db_connect.php';
// Header
include_once 'includes/header.php';
// Message
include_once 'includes/message.php';
?>
<div class="row">
	<div class="col s12 m8 push-m2">
		<div class="col s4 ">
			<h3 class="light"> Clientes </h3>
		</div>

		<!--Formulario usado para pesquisar cliente-->
		<form method="GET" action="pesquisar.php">
			
			<div class="input-field col s6 ">
				<input type="text" name="pesquisar" class="form-control" id="pesquisar">
				<label for="nome"><i class="material-icons left">search</i>Nome</label>
			</div>

			<div class="input-field  col s2">
				<button type="submit" class="btn btn-primary">Pesquisar</button>
			</div>

		</form>
		<div class="  col s12">
			<hr>
		</div>

		<table class="striped">
			<thead>
				<tr>
					<!--Titulo das colunas da tabela-->
					<th>NOME</th>
					<th>RG</th>
					<th>CPF</th>
				</tr>
			</thead>

			<tbody>
				<?php
				//receber o numero da página pela url
				$pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);

				//verifica se a variável pagina existe na url
				$pag = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

				//verifica se a variavel pesquisar existe na url
				if (!isset($_GET['pesquisar'])) {
					header("Location: index.php");
				} else {
					$valor_pesquisar = $_GET['pesquisar'];
				}


				$busca = "SELECT * FROM clientes WHERE nome LIKE '%$valor_pesquisar%'";
				$todos = mysqli_query($connect, "$busca");

				//número de registros a ser exibido em cada página
				$registros = "5";

				$tr = mysqli_num_rows($todos); //quantidade de cliente
				$tp = ceil($tr / $registros); //quantidade de páginas

				//inicio de cada página
				$inicio = ($registros * $pag) - $registros;
				$resultado = mysqli_query($connect, "$busca LIMIT $inicio, $registros");

				$anterior = $pag - 1;
				$proximo = $pag + 1;

				if (mysqli_num_rows($resultado) > 0) :

					while ($dados = mysqli_fetch_array($resultado)) :
				?>
						<tr>
							<td><?php echo $dados['nome']; ?></td>
							<td><?php echo $dados['rg']; ?></td>
							<td><?php echo $dados['cpf']; ?></td>
							<td style="width:50px"><a href="visualizar.php?id=<?php echo $dados['id']; ?>" class="btn-floating blue lighten-1"><i class="material-icons">remove_red_eye</i></a></td>

						</tr>
					<?php
					endwhile;
				else : ?>
					<tr>
						<td>-</td>
						<td>-</td>
						<td>-</td>
						<td>-</td>
					</tr>
				<?php
				endif;
				?>
			</tbody>
		</table>
		<br>
		
	</div>


	<!--Paginação-->
	<div class="col s12 m8 push-m2 center">
		<ul class="pagination">
			<?php
			//págnina anterior
			if ($pag > 1) {
			?>
				<li class="waves-effect">
					<a href="?pagina=<?= $anterior; ?>&pesquisar=<?= $valor_pesquisar; ?>" aria-label="Anterior">
						<span aria-hidden="true"><i class="material-icons">chevron_left</i></span>
					</a>
				</li>
			<?php } else {

			?>
				<li class="disabled">
					<a href="?pagina=<?= $pag; ?>&pesquisar=<?= $valor_pesquisar; ?>" aria-label="Anterior">
						<span aria-hidden="true"><i class="material-icons">chevron_left</i></span>
					</a>
				</li>
			<?php
			}
			?>

			<?php
			//limite de links a ser exibido antes e depois
			$lim = 3;
			//início da exibição de acordo com a página atual e o limite
			$iniciop = ((($pag - $lim) > 1) ? $pag - $lim : 1);
			$fim = ((($pag + $lim) < $tp) ? $pag + $lim : $tp);

			//cria todos os links de todas as páginas
			if ($tp > 1 && $pag <= $tp) {
				for ($i = $iniciop; $i <= $fim; $i++) {

					if ($i == $pag) {
						echo "<li class='waves-effect active green'><a href='?pagina=$i&pesquisar=$valor_pesquisar'>$i</a></li>";
					} else {
						echo "<li class='waves-effect'><a href='?pagina=$i&pesquisar=$valor_pesquisar'>$i</a></li>";
					}
				}
			}


			//próxima página
			if ($pag < $tp) {
			?>
				<li class="waves-effect">
					<a href="?pagina=<?= $proximo; ?>&pesquisar=<?= $valor_pesquisar; ?>" aria-label="Próximo">
						<span aria-hidden="true"><i class="material-icons">chevron_right</i></span>
					</a>
				</li>
			<?php } else {

			?>
				<li class="disabled">
					<a href="?pagina=<?= $pag; ?>&pesquisar=<?= $valor_pesquisar; ?>" aria-label="Próximo">
						<span aria-hidden="true"><i class="material-icons">chevron_right</i></span>

					</a>
				</li>
			<?php
			}

			?>
		</ul>
	</div>
</div>


<?php

// Footer
include_once 'includes/footer.php';
?>