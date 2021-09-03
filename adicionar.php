<?php
// Header
include_once 'includes/header.php';
// Message
include_once 'includes/message.php';
?>

<!--Área para cadastrar as informações pessoais do cliente-->
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Novo Cliente </h3>
        <form action="php_action/create.php" method="POST">
            <div class="input-field col s12 lime lighten-5">

                <div class="input-field col s12">
                    <input type="text" name="nome" id="nome" minlength="2" required>
                    <label for="Nome Completo">Nome</label>
                </div>

                <div class="input-field col s4">
                    <input type="text" name="cpf" id="cpf" minlength="14" maxlength="14" required>
                    <label for="cpf">CPF</label>
                    <label for="cpf" value="<?php echo $_SESSION['mensagem']; ?>">CPF</label>
                </div>

                <div class="input-field col s4">
                    <input type="text" name="rg" id="rg" minlength="13" required>
                    <label for="rg">RG</label>
                </div>

                <div class="input-field col s4">
                    <input type="date" name="data_nascimento" id="data_nascimento">
                    <label for="data_nascimento">Data de Nascimento</label>
                </div>

                <div class="input-field col s6">
                    <input type="text" name="facebook" id="facebook">
                    <label for="facebook"><i class="fab fa-facebook-f"></i></label>
                </div>

                <div class="input-field col s6">
                    <input type="text" name="twitter" id="twitter">
                    <label for="twitter"><i class="fab fa-twitter"></i></label>
                </div>

                <div class="input-field col s6">
                    <input type="text" name="instagram" id="instagram">
                    <label for="instagram"><i class="fab fa-instagram"></i></label>
                </div>

                <div class="input-field col s6">
                    <input type="text" name="linkedin" id="linkedin">
                    <label for="linkedin"><i class="fab fa-linkedin"></i></label>
                </div>

            </div>
            <button type="submit" name="btn-cadastrar" class="btn"> Cadastrar </button>
        </form>
    </div>
</div>


<?php
// Footer
include_once 'includes/footer.php';
?>