<?php include 'header.php'; ?>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Erro!</h2>
                </div>
                <div class="card-body">
                    <div class="name"><?= current(@max($_SESSION['error'])); ?> <br><a href="<?= $_SERVER['HTTP_REFERER']; ?>"> clique aqui para retornar ao formulario</a></div>
                </div>
                <!-- <?php print_r($_SESSION); ?> -->
            </div>
        </div>
    </div>
</body>

</html>
