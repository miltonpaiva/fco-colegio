<?php
    include 'header.php';
    include 'Terms.php';

    $t = new Terms();

    @session_start();
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
                                        <input class="input--style-5" style="width:200%" id="nome" type="text" name="first_name" placeholder="Nome completo" required value="<?= $_SESSION['user_data']['first_name']?>">
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
                                            <input class="input--style-5" id="cpf" type="text" name="cpf" placeholder="CPF" required value="<?= $_SESSION['user_data']['cpf']?>">
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
                                            <input class="input--style-5 datepicker" id="nascimento" type="text" name="data_nasc" placeholder="Nascimento" readonly required value="<?= $_SESSION['user_data']['data_nasc']?>">
                                            <label class="label--desc"></label>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <label class="label--desc" style="left: -80%;">idade:</label>
                                            <input class="input--style-5 age" id="idade" type="text" name="age" readonly value="<?= $_SESSION['user_data']['age']?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">*Nacionalidade</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" id="nacionalidade" type="text" name="nacionalidade" placeholder="Nacionalidade" required value="<?= $_SESSION['user_data']['nacionalidade']?>">
                                            <label class="label--desc"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">*Profissão</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" id="profissao" type="text" name="profissao" placeholder="Profissao" required value="<?= $_SESSION['user_data']['profissao']?>">
                                            <label class="label--desc"></label>
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
                                            <input class="input--style-5" id="endereco" type="text" name="rua" placeholder="Endereço" required value="<?= $_SESSION['user_data']['rua']?>">
                                            <label class="label--desc"></label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <label class="label--desc" style="left: -80%;">Numero:</label>
                                            <input class="input--style-5" id="numero" type="text" name="numero" placeholder="" required value="<?= $_SESSION['user_data']['numero']?>">
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
                                            <input class="input--style-5" id="cep" type="text" name="cep" placeholder="CEP" required value="<?= $_SESSION['user_data']['cep']?>">
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
                                            <input class="input--style-5" id="bairro" type="text" name="bairro" placeholder="" style="width: 80%;" required value="<?= $_SESSION['user_data']['bairro']?>">
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
                                            <input class="input--style-5" id="complemento" type="text" name="Complemento" placeholder="" required value="<?= $_SESSION['user_data']['Complemento']?>">
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
                                            <input class="input--style-5" type="text" name="cidade" placeholder="" required value="<?= $_SESSION['user_data']['cidade']?>">
                                            <label class="label--desc"></label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <label class="label--desc" style="left: -80%;">UF:</label>
                                            <div class="input-group">
                                                <div class="rs-select2 js-select-simple select--no-search">
                                                    <select name="uf" required >
                                                        <option disabled="disabled" selected="selected"></option>
                                                        <option value="AC" <?= $_SESSION['user_data']['uf'] == 'AC' ? 'selected' : '' ; ?> >AC</option>
                                                        <option value="AP" <?= $_SESSION['user_data']['uf'] == 'AP' ? 'selected' : '' ; ?> >AP</option>
                                                        <option value="AM" <?= $_SESSION['user_data']['uf'] == 'AM' ? 'selected' : '' ; ?> >AM</option>
                                                        <option value="BA" <?= $_SESSION['user_data']['uf'] == 'BA' ? 'selected' : '' ; ?> >BA</option>
                                                        <option value="CE" <?= $_SESSION['user_data']['uf'] == 'CE' ? 'selected' : '' ; ?> >CE</option>
                                                        <option value="DF" <?= $_SESSION['user_data']['uf'] == 'DF' ? 'selected' : '' ; ?> >DF</option>
                                                        <option value="ES" <?= $_SESSION['user_data']['uf'] == 'ES' ? 'selected' : '' ; ?> >ES</option>
                                                        <option value="GO" <?= $_SESSION['user_data']['uf'] == 'GO' ? 'selected' : '' ; ?> >GO</option>
                                                        <option value="MA" <?= $_SESSION['user_data']['uf'] == 'MA' ? 'selected' : '' ; ?> >MA</option>
                                                        <option value="MT" <?= $_SESSION['user_data']['uf'] == 'MT' ? 'selected' : '' ; ?> >MT</option>
                                                        <option value="MS" <?= $_SESSION['user_data']['uf'] == 'MS' ? 'selected' : '' ; ?> >MS</option>
                                                        <option value="MG" <?= $_SESSION['user_data']['uf'] == 'MG' ? 'selected' : '' ; ?> >MG</option>
                                                        <option value="PA" <?= $_SESSION['user_data']['uf'] == 'PA' ? 'selected' : '' ; ?> >PA</option>
                                                        <option value="PB" <?= $_SESSION['user_data']['uf'] == 'PB' ? 'selected' : '' ; ?> >PB</option>
                                                        <option value="PR" <?= $_SESSION['user_data']['uf'] == 'PR' ? 'selected' : '' ; ?> >PR</option>
                                                        <option value="PE" <?= $_SESSION['user_data']['uf'] == 'PE' ? 'selected' : '' ; ?> >PE</option>
                                                        <option value="PI" <?= $_SESSION['user_data']['uf'] == 'PI' ? 'selected' : '' ; ?> >PI</option>
                                                        <option value="RJ" <?= $_SESSION['user_data']['uf'] == 'RJ' ? 'selected' : '' ; ?> >RJ</option>
                                                        <option value="RN" <?= $_SESSION['user_data']['uf'] == 'RN' ? 'selected' : '' ; ?> >RN</option>
                                                        <option value="RS" <?= $_SESSION['user_data']['uf'] == 'RS' ? 'selected' : '' ; ?> >RS</option>
                                                        <option value="RO" <?= $_SESSION['user_data']['uf'] == 'RO' ? 'selected' : '' ; ?> >RO</option>
                                                        <option value="RR" <?= $_SESSION['user_data']['uf'] == 'RR' ? 'selected' : '' ; ?> >RR</option>
                                                        <option value="SC" <?= $_SESSION['user_data']['uf'] == 'SC' ? 'selected' : '' ; ?> >SC</option>
                                                        <option value="SP" <?= $_SESSION['user_data']['uf'] == 'SP' ? 'selected' : '' ; ?> >SP</option>
                                                        <option value="SE" <?= $_SESSION['user_data']['uf'] == 'SE' ? 'selected' : '' ; ?> >SE</option>
                                                        <option value="TO" <?= $_SESSION['user_data']['uf'] == 'TO' ? 'selected' : '' ; ?> >TO</option>
                                                        <option value="EX" <?= $_SESSION['user_data']['uf'] == 'EX' ? 'selected' : '' ; ?> >EX</option>
                                                        <option value="AL" <?= $_SESSION['user_data']['uf'] == 'AL' ? 'selected' : '' ; ?> >AL</option>
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
                                            <input class="input--style-5" id="celular" type="text" name="celular" placeholder="Celular" required value="<?= $_SESSION['user_data']['celular']?>">
                                            <label class="label--desc"></label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" id="fixo" type="text" name="fixo" placeholder="Fixo" value="<?= $_SESSION['user_data']['fixo']?>">
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
                                    <input class="input--style-5" id="email" type="email" name="email" required value="<?= $_SESSION['user_data']['email']?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">*Confimação Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" id="emailConf" type="email" required value="<?= $_SESSION['user_data']['email']?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-row m-b-55">
                            <div class="name">*Senha</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" id="senha" type="password" name="senha" required value="<?= $_SESSION['user_data']['senha']?>">
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
                                            <input class="input--style-5" id="senhaConf" type="password" required value="<?= $_SESSION['user_data']['senha']?>">
                                            <label class="label--desc"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="value">
                                <div class="input-group">
                                    <input type="button" class="btn btn--radius-2 btn--green" id="myBtn" onclick="setUrlIframe()" value="Visualizar Contrato"/>
                                </div>
                            </div>
                        </div>

                        <iframe src="" frameborder="0" width="600" height="350" id="iframe_assinatura"></iframe>

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
        <?= str_replace("\n", '<br>', $t->getLastTerm()); ?>
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

    if (!setUrlIframe()) {
        return false
    }

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


function setUrlIframe() {
    let iframe_assinatura = document.getElementById('iframe_assinatura');
    let imput_cpf         = document.getElementById('cpf');

    if (imput_cpf.value == '') {
        alert('preencha o cpf primeiro!');
        return false;
    }

    iframe_assinatura.src = './assinatura.php?cpf=' + imput_cpf.value.replace(/([^\d])+/gim, '');

    return true;
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
