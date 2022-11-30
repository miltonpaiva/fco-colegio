<?php include 'header.php'; ?>
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

                        <div>
                            <button class="btn btn--radius-2 btn--red" id="bntRegistrar" type="submit">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
