<?php
    include 'header.php';
    include 'Terms.php';

    $t = new Terms();
?>

<style>
body {font-family: Arial, Helvetica, sans-serif;}

#meudiv {
  background-color:lightGreen;
  width:300px;
  height:150px;
  padding:10px;
}


/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: black;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  color: white;
  background: linear-gradient(to top right, #08aeea 0%, #b721ff 100%);
}
</style>


<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Cadastra-se aqui !</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= BaseClass::getRoute('users_insert'); ?>" class="needs-validation">
                        <div class="form-row m-b-55">
                            <div class="name">*Nome</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" id="nome" type="text" name="first_name" placeholder="Nome completo" required>
                                            <label class="label--desc"></label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="last_name" placeholder="Apelido">
                                            <label class="label--desc"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row m-b-55">
                            <div class="name">*CPF</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" id="cpf" type="text" name="cpf" placeholder="CPF" required>
                                            <label class="label--desc"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row m-b-55">
                            <div class="name">*Nascimento</div>
                            <div class="value">
                                <div class="row row-space datepicker">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5 datepicker" id="nascimento" type="text" name="data_nasc" placeholder="Nascimento" readonly required>
                                            <label class="label--desc"></label>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <label class="label--desc" style="left: -80%;">idade:</label>
                                            <input class="input--style-5 age" id="idade" type="text" name="age" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row m-b-55">
                            <div class="name">*Rua/AV.</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" id="endereco" type="text" name="rua" placeholder="Endereço" required>
                                            <label class="label--desc"></label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <label class="label--desc" style="left: -80%;">Numero:</label>
                                            <input class="input--style-5" id="numero" type="text" name="numero" placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row m-b-55">
                            <div class="name">*CEP</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" id="cep" type="text" name="cep" placeholder="CEP" required>
                                            <label class="label--desc"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row m-b-55">
                            <div class="name">*Bairro</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" id="bairro" type="text" name="bairro" placeholder="" style="width: 80%;" required>
                                            <label class="label--desc"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">*Complemento</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" id="complemento" type="text" name="Complemento" placeholder="" required>
                                            <label class="label--desc"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row m-b-55">
                            <div class="name">*Município</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="cidade" placeholder="" required>
                                            <label class="label--desc"></label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <label class="label--desc" style="left: -80%;">uf:</label>
                                            <div class="input-group">
                                                <div class="rs-select2 js-select-simple select--no-search">
                                                    <select name="uf" required>
                                                        <option disabled="disabled" selected="selected"></option>
                                                        <option value="AC">AC</option>
                                                        <option value="AP">AP</option>
                                                        <option value="AM">AM</option>
                                                        <option value="BA">BA</option>
                                                        <option value="CE">CE</option>
                                                        <option value="DF">DF</option>
                                                        <option value="ES">ES</option>
                                                        <option value="GO">GO</option>
                                                        <option value="MA">MA</option>
                                                        <option value="MT">MT</option>
                                                        <option value="MS">MS</option>
                                                        <option value="MG">MG</option>
                                                        <option value="PA">PA</option>
                                                        <option value="PB">PB</option>
                                                        <option value="PR">PR</option>
                                                        <option value="PE">PE</option>
                                                        <option value="PI">PI</option>
                                                        <option value="RJ">RJ</option>
                                                        <option value="RN">RN</option>
                                                        <option value="RS">RS</option>
                                                        <option value="RO">RO</option>
                                                        <option value="RR">RR</option>
                                                        <option value="SC">SC</option>
                                                        <option value="SP">SP</option>
                                                        <option value="SE">SE</option>
                                                        <option value="TO">TO</option>
                                                        <option value="EX">EX</option>
                                                        <option value="AL">AL</option>
                                                    </select>
                                                    <div class="select-dropdown"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row m-b-55">
                            <div class="name">*Telefone</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" id="celular" type="text" name="celular" placeholder="Celular" required>
                                            <label class="label--desc"></label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" id="fixo" type="text" name="fixo" placeholder="Fixo">
                                            <label class="label--desc"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">*Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" id="email" type="email" name="email" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">*Confimação Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" id="emailConf" type="email" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row m-b-55">
                            <div class="name">*Senha</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" id="senha" type="password" name="senha" required>
                                            <label class="label--desc">*A senha deve conter de 5 a 8 caracters.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row m-b-55">
                            <div class="name">*Confimação Senha</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" id="senhaConf" type="password" required>
                                            <label class="label--desc"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="value">
                                <div class="input-group">
                                    <input type="button" class="btn btn--radius-2 btn--green" id="myBtn" value="Ler o Termo"/>
                                </div>
                            </div>
                        </div>

                        <iframe src="/assina_pdf/assinatura.php" frameborder="0" width="600" height="350"></iframe>

                        <div>
                            <button class="btn btn--radius-2 btn--red" id="bntRegistrar" type="submit">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-header card-heading">
          <span class="close">&times;</span>
          <h2>Termo</h2>
        </div>
        <div class="modal-body">
            <?= $t->getLastTerm(); ?>
        </div>
      </div>

    </div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

    <script src="js/validaAprender.js"></script>
    <script src="js/validaEsportes.js"></script>
    <script src="js/validaSenha.js"></script>
    <script src="js/validaEmail.js"></script>
    <script src="js/validaCampoNumero.js"></script>
    <script src="js/validaTelefone.js"></script>
    <script src="js/validaData.js"></script>
    <script src="js/validaCPF.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>
    <script src="js/global.js"></script>

</body>

</html>
