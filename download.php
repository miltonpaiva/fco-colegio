<?php
  include 'Terms.php';
  include 'Users.php';

  $t = new Terms();
  $u = new Users();

  @session_start();

    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');

    $user = $u->getUserByEmail($_SESSION['user']['email']);

    $user['data_inicial'] = date("d/m/Y");
    $user['dia'] = date("d");
    $user['mes'] = strftime('%B', strtotime('today'));
    $user['ano'] = date("Y");

    $project_dir = dirname($_SERVER['SCRIPT_NAME']);
    $project_url = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['SERVER_NAME']}{$project_dir}";

    $relations['nome']          = 'name';
    $relations['nacionalidade'] = 'nationality';
    $relations['profissao']     = 'profession';
    $relations['cpf']           = 'cpf';
    $relations['endereco']      = 'road';
    $relations['município']     = 'County';
    $relations['uf']            = 'uf';
    $relations['data_inicial']  = 'data_inicial';
    $relations['dia']           = 'dia';
    $relations['mes']           = 'mes';
    $relations['ano']           = 'ano';

    function replace_term($str, $data = [], $relations)
    {
        $local_str = $str;
        foreach ($relations as $to_replaced => $key_data) {
            $local_str = str_replace('{{' . $to_replaced . '}}', $data[$key_data], $local_str);
        }

        return $local_str;
    }

?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css" rel="stylesheet" />
<style>
  @page {
    size: A4
  }

body {
max-width: max-content;
margin: auto;
}
</style>

<body class="A4" >

    <?php if (is_string($user)): ?>
        <h2><?= $user; ?>/a></h2>
    <?php exit(); endif; ?>

  <h2>OLÁ <?= $user['name']; ?>, VISUALIZE SEU CONTRADO ABAIXO, SE DESEJAR BAIXAR <button onclick="imprime(this)">CLIQUE AQUI</button></h2>

  <section class="sheet padding-10mm">

  <?= str_replace("\n", '<br>', replace_term($t->getLastTerm(), $user, $relations)); ?>

  <br>

  <img src="<?= "{$project_url}/images/{$user['cpf']}.jpeg"; ?>" alt="">

  </section>

  <script type="text/javascript">
      function imprime(btn) {
          btn.parentNode.style.display = 'none';
          window.print();
      }
  </script>

</body>