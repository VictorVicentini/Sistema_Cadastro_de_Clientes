<?php
// Conexão
include_once 'php_action/db_connect.php';
// Header
include_once 'includes/header.php';
// Select
if (isset($_GET['id'])) :
    //pega o id do endereço para ser atualizado
    $id = mysqli_escape_string($connect, $_GET['id']);

    $sql = "SELECT * FROM endereco WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
endif;
?>

<!-- campo para atualizar o endereco-->
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Editar Endereco </h3>
        <form action="php_action/update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
            <input type="hidden" name="id_cliente" value="<?php echo $dados['id_cliente']; ?>">
            <div class="input-field col s12 lime lighten-5">

                <div class="input-field col s8">
                    <input type="text" name="tipo_endereco" id="tipo_endereco" value="<?php echo $dados['tipo_endereco']; ?>" minlength="2" required>
                    <label for="tipo_endereco">Tipo Endereço</label>
                </div>

                <div class="input-field col s4">
                    <input type="text" name="cep" id="cep" value="<?php echo $dados['cep']; ?>" required>
                    <label for="cep">CEP</label>
                </div>

                <div class="input-field col s9">
                    <input type="text" name="endereco" id="endereco" value="<?php echo $dados['logradouro']; ?>">
                    <label for="endereco">Endereco</label>
                </div>

                <div class="input-field col s3">
                    <input type="text" name="numero" id="numero" value="<?php echo $dados['numero']; ?>">
                    <label for="numero">Nº</label>
                </div>

                <div class="input-field col s4">
                    <input type="text" name="bairro" id="bairro" value="<?php echo $dados['bairro']; ?>">
                    <label for="bairro">Bairro</label>
                </div>

                <div class="input-field col s4">
                    <input type="text" name="cidade" id="cidade" value="<?php echo $dados['cidade']; ?>">
                    <label for="cidade">Cidade</label>
                </div>

                <div class="input-field col s4">
                    <input type="text" name="estado" id="estado" value="<?php echo $dados['estado']; ?>">
                    <label for="estado">Estado</label>
                </div>

                <div class="input-field col s12">
                    <input type="text" name="complemento" id="complemento" value="<?php echo $dados['complemento']; ?>">
                    <label for="complemento">Complemento</label>
                </div>
                
            </div>
            <button type="submit" name="btn-editar-endereco" class="btn"> Atualizar</button>
        </form>
    </div>
</div>


<?php
// Footer
include_once 'includes/footer.php';
?>