<?php
// Conexão
include_once 'php_action/db_connect.php';
// Header
include_once 'includes/header.php';
// Message
include_once 'includes/message.php';

if (isset($_GET['id'])) :
    //pega o id do cliente passo pela url
    $id = mysqli_escape_string($connect, $_GET['id']);

    $sql = "SELECT * FROM clientes WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);

    if (mysqli_num_rows($resultado) > 0) :
        while ($dados = mysqli_fetch_array($resultado)) :
?>
            <div class="row">
                <div class="col s12 m6 push-m3 ">

                    <div class="input-field col s12 ">
                        <h3 class="light">Cliente </h3>
                        <hr>
                    </div>

                    <!--exibi as informações pessoais do cliente-->
                    <div class="input-field col s11 ">
                        <a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange right"><i class="material-icons">edit</i></a>
                    </div>

                    <div class="input-field col s1 ">
                        <a href="#cmodal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger right"><i class="material-icons">delete</i></a>
                    </div>

                    <!-- Modal Structure -->
                    <div id="cmodal<?php echo $dados['id']; ?>" class="modal">
                        <div class="modal-content">
                            <h4>Opa!</h4>
                            <p>Tem certeza que deseja excluir esse cliente?</p>
                        </div>

                        <div class="modal-footer">
                            <!--mensagem de confirmação de exclusão do cliente-->
                            <form action="php_action/delete.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                                <button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>

                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
                            </form>
                        </div>

                    </div>

                    <div class="input-field col s12 lime lighten-5">
                        <div class="input-field col s12 ">
                            <input type="text" name="nome" id="nome" value="<?php echo $dados['nome']; ?>" readonly=“true”>
                            <label for="Nome Completo">Nome</label>
                        </div>

                        <div class="input-field col s4">
                            <input type="text" name="cpf" id="cpf" value="<?php echo $dados['cpf']; ?>" readonly=“true”>
                            <label for="cpf">CPF</label>
                        </div>

                        <div class="input-field col s4">
                            <input type="text" name="rg" id="rg" value="<?php echo $dados['rg']; ?>" readonly=“true”>
                            <label for="rg">RG</label>
                        </div>

                        <div class="input-field col s4">
                            <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $dados['data_nascimento']; ?>" readonly=“true”>
                            <label for="data_nascimento">Data de Nascimento</label>
                        </div>

                        <!--redes sociais-->
                        <div class="input-field col s6">
                            <input type="text" name="facebook" id="facebook" value="<?php echo $dados['facebook']; ?>" readonly=“true”>
                            <label for="facebook"><i class="fab fa-facebook-f"></i></label>
                        </div>

                        <div class="input-field col s6">
                            <input type="text" name="twitter" id="twitter" value="<?php echo $dados['twitter']; ?>" readonly=“true”>
                            <label for="twitter"><i class="fab fa-twitter"></i></label>
                        </div>

                        <div class="input-field col s6">
                            <input type="text" name="instagram" id="instagram" value="<?php echo $dados['instagram']; ?>" readonly=“true”>
                            <label for="instagram"><i class="fab fa-instagram"></i></label>
                        </div>

                        <div class="input-field col s6">
                            <input type="text" name="linkedin" id="linkedin" value="<?php echo $dados['linkedin']; ?>" readonly=“true”>
                            <label for="linkedin"><i class="fab fa-linkedin"></i></label>
                        </div>
                    </div>

                    <!--Todos os telefones do cliente é exibido aqui-->
                    <div class="input-field col s12">
                        <h3 class="light">Contato </h3>
                        <a href="adicionar_contato.php?id=<?php echo $dados['id']; ?>" class="btn-floating green darken-1 right"><i class="material-icons">add_circle_outline</i></a>
                        <hr>
                    </div>

                    <!--Contatos-->
                    <?php
                    $sql = "SELECT * FROM telefone WHERE id_cliente = '$id'";
                    $resultado_contatos = mysqli_query($connect, $sql);

                    if (mysqli_num_rows($resultado_contatos) > 0) :
                        while ($dados = mysqli_fetch_array($resultado_contatos)) :
                    ?>
                            <div class="input-field col s12 lime lighten-5">

                                <div class="input-field col s5 ">
                                    <input type="text" name="tipoContato" id="tipoContato" value="<?php echo $dados['tipo_contato']; ?>" readonly=“true”>
                                    <label for="tipoContato">Tipo Contato</label>
                                </div>

                                <div class="input-field col s5">
                                    <input type="text" name="telefone" id="telefone" value="<?php echo $dados['numero']; ?>" readonly=“true”>
                                    <label for="telefone">Número</label>
                                </div>

                                <div class="input-field col s1">
                                    <a href="editar_contato.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange right"><i class="material-icons">edit</i></a>
                                </div>

                                <div class="input-field col s1">
                                    <a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger "><i class="material-icons">delete</i></a>
                                </div>

                            </div>


                            <!-- Modal Structure para exibir mesnagem de exclusão do telefone-->
                            <div id="modal<?php echo $dados['id']; ?>" class="modal">
                                <div class="modal-content">
                                    <h4>Opa!</h4>
                                    <p>Tem certeza que deseja excluir esse contato?</p>
                                </div>

                                <div class="modal-footer">
                                    <form action="php_action/delete.php" method="POST">
                                        <input type="hidden" name="id_contato" value="<?php echo $dados['id']; ?>">
                                        <input type="hidden" name="id_cliente_contato" value="<?php echo $dados['id_cliente']; ?>">

                                        <button type="submit" name="btn-deletar-contato" class="btn red">Sim, quero deletar</button>

                                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                    </form>
                                </div>

                            </div>
                    <?php

                        endwhile;

                    endif;
                    ?>



                    <!--Todos os endereços do cliente são exibidos aqui-->
                    <div class="input-field col s12">
                        <h3 class="light">Endereço </h3>
                        <a href="adicionar_endereco.php?id=<?php echo $id; ?>" class="btn-floating green darken-1 right"><i class="material-icons">add_circle_outline</i></a>
                        <hr>
                    </div>

                    <?php
                    $sql = "SELECT * FROM endereco WHERE id_cliente = '$id'";
                    $resultado_endereco = mysqli_query($connect, $sql);

                    if (mysqli_num_rows($resultado_endereco) > 0) :
                        while ($dados = mysqli_fetch_array($resultado_endereco)) :

                    ?>
                            <div class="input-field col s12 lime lighten-5">

                                <div class="input-field col s8 ">
                                    <input type="text" name="tipo_endereco" id="tipo_endereco" value="<?php echo $dados['tipo_endereco']; ?>" readonly="true">
                                    <label for="tipo_endereco">Tipo Endereço</label>
                                </div>

                                <div class="input-field col s4">
                                    <input type="text" name="cep" id="cep" value="<?php echo $dados['cep']; ?>" readonly="true">
                                    <label for="cep">CEP</label>
                                </div>

                                <div class="input-field col s9">
                                    <input type="text" name="endereco" id="endereco" value="<?php echo $dados['logradouro']; ?>" readonly="true">
                                    <label for="endereco">Endereco</label>
                                </div>

                                <div class="input-field col s3">
                                    <input type="text" name="numero" id="numero" value="<?php echo $dados['numero']; ?>" readonly="true">
                                    <label for="numero">Nº</label>
                                </div>

                                <div class="input-field col s4">
                                    <input type="text" name="bairro" id="bairro" value="<?php echo $dados['bairro']; ?>" readonly="true">
                                    <label for="bairro">Bairro</label>
                                </div>

                                <div class="input-field col s4">
                                    <input type="text" name="cidade" id="cidade" value="<?php echo $dados['cidade']; ?>" readonly="true">
                                    <label for="cidade">Cidade</label>
                                </div>

                                <div class="input-field col s4">
                                    <input type="text" name="estado" id="estado" value="<?php echo $dados['estado']; ?>" readonly="true">
                                    <label for="estado">Estado</label>
                                </div>

                                <div class="input-field col s12">
                                    <input type="text" name="complemento" id="complemento" value="<?php echo $dados['complemento']; ?>" readonly="true">
                                    <label for="complemento">Complemento</label>

                                </div>

                                <div class="input-field col s11">
                                    <a href="editar_endereco.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange right"><i class="material-icons">edit</i></a>
                                </div>

                                <div class="input-field col s1">
                                    <a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a>
                                </div>
                            </div>


                            <!-- Modal Structure para exibir a mensagem de confirmação de exclusão do endereço-->
                            <div id="modal<?php echo $dados['id']; ?>" class="modal">
                                <div class="modal-content">
                                    <h4>Opa!</h4>
                                    <p>Tem certeza que deseja excluir esse endereço?</p>

                                </div>

                                <div class="modal-footer">
                                    <form action="php_action/delete.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                                        <input type="hidden" name="id_cliente_endereco" value="<?php echo $dados['id_cliente']; ?>">
                                        <button type="submit" name="btn-deletar-endereco" class="btn red">Sim, quero deletar</button>

                                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                    </form>

                                </div>
                            </div>
                    <?php

                        endwhile;

                    endif;
                    ?>
                    </form>
                </div>
            </div>


<?php

        endwhile;

    endif;

endif;

// Footer
include_once 'includes/footer.php';
?>