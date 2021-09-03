      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>

      <!--Inicialisa o javascript usado para exibir as mensagens de sucesso no cadastro-->
      <script>
        M.AutoInit();
      </script>

      <!--Máscara aplicada nos campos dos input -->
      <script>
        $(document).ready(function() {
          $("#telefone").mask("(00) 0000-00009");
          $("#cep").mask("00000-000");
          $("#cpf").mask("000.000.000-00");
          $("#rg").mask("99.999.999-9");
        });
      </script>

<!--scripit para preencher endereço automático a partir do CEP-->
      <script type="text/javascript">
        $("#cep").focusout(function() {
          //Início do Comando AJAX
          $.ajax({
            //O campo URL diz o caminho de onde virá os dados
            //É importante concatenar o valor digitado no CEP
            url: 'https://viacep.com.br/ws/' + $(this).val() + '/json/unicode/',
            //Aqui você deve preencher o tipo de dados que será lido,
            //no caso, estamos lendo JSON.
            dataType: 'json',
            //SUCESS é referente a função que será executada caso
            //ele consiga ler a fonte de dados com sucesso.
            //O parâmetro dentro da função se refere ao nome da variável
            //que você vai dar para ler esse objeto.
            success: function(resposta) {
              //Agora basta definir os valores que você deseja preencher
              //automaticamente nos campos acima.
              $("#endereco").val(resposta.logradouro);
              $("#complemento").val(resposta.complemento);
              $("#bairro").val(resposta.bairro);
              $("#cidade").val(resposta.localidade);
              $("#estado").val(resposta.uf);
              //Vamos incluir para que o Número seja focado automaticamente
              //melhorando a experiência do usuário
              $("#endereco").focus();
              $("#bairro").focus();
              $("#cidade").focus();
              $("#complemento").focus();
              $("#estado").focus();
              $("#numero").focus();
            }
          });
        });
      </script>


      <!--Rodapé da página -->
      <footer class="page-footer blue-grey lighten-1 z-depth-3">
        <div class="container">
          <div class="row">
            <div class="col l6 s12">
              <h5 class="white-text">Cadastro de Clientes</h5>
              <p class="grey-text text-lighten-4">...</p>
            </div>
            <div class="col l4 offset-l2 s12">
              <h5 class="white-text">Links</h5>
              <ul>
                <li><a class="grey-text text-lighten-3" href="index.php">LISTAR CLIENTES</a></li>
               
                
                <li><a class="grey-text text-lighten-3" href="adicionar.php">CADASTRAR CLIENTE</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-copyright">
          <div class="container">
            © 2021 Copyright
            <a class="grey-text text-lighten-4 right" href="#!">Mais Links</a>
          </div>
        </div>
      </footer>


      </body>

      </html>