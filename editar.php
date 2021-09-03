<?php
// Conexão
include_once 'php_action/db_connect.php';
// Header
include_once 'includes/header.php';
// Select
if (isset($_GET['id'])) :
    //id do cliente da url para ser atualizado
    $id = mysqli_escape_string($connect, $_GET['id']);

    $sql = "SELECT * FROM clientes WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
endif;
?>

<!--área para edição dos dados pessoais do cliente-->
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Editar Cliente </h3>
        <form action="php_action/update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
            <div class="input-field col s12 lime lighten-5">

                <div class="input-field col s12">
                    <input type="text" name="nome" id="nome" value="<?php echo $dados['nome']; ?>" minlength="2" required>
                    <label for="Nome">Nome</label>
                </div>

                <div class="input-field col s4">
                    <input type="text" name="cpf" id="cpf" value="<?php echo $dados['cpf']; ?>" required>
                    <label for="cpf">CPF</label>
                </div>

                <div class="input-field col s4">
                    <input type="text" name="rg" id="rg" value="<?php echo $dados['rg']; ?>" required>
                    <label for="rg">RG</label>
                </div>

                <div class="input-field col s4">
                    <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $dados['data_nascimento']; ?>">
                    <label for="data_nascimento">Data de Nascimento</label>
                </div>

                <div class="input-field col s6">
                    <input type="text" name="facebook" id="facebook" value="<?php echo $dados['facebook']; ?>">
                    <label for="facebook"><i class="fab fa-facebook-f"></i></label>
                </div>

                <div class="input-field col s6">
                    <input type="text" name="twitter" id="twitter" value="<?php echo $dados['twitter']; ?>">
                    <label for="twitter"><i class="fab fa-twitter"></i></label>
                </div>

                <div class="input-field col s6">
                    <input type="text" name="instagram" id="instagram" value="<?php echo $dados['instagram']; ?>">
                    <label for="instagram"><i class="fab fa-instagram"></i></label>
                </div>

                <div class="input-field col s6">
                    <input type="text" name="linkedin" id="linkedin" value="<?php echo $dados['linkedin']; ?>">
                    <label for="linkedin"><i class="fab fa-linkedin"></i></label>
                </div>
                
            </div>
            <button type="submit" name="btn-editar" class="btn"> Atualizar</button>
        </form>

    </div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>