<?php
// Inicia Sessão
session_start();
if (isset($_SESSION['mensagem'])) : ?>

	<script>
		// função que espera carregar toda a página para exibir a mensagem
		window.onload = function() {
			M.toast({
				html: '<?php echo $_SESSION['mensagem']; ?>'
			});
		};
	</script>

<?php
endif;

//finaliza sessão
session_unset();
?>