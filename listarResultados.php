<?php
    require_once 'cabecalho.php';
    session_start();
?>
<div class="row">
    <div class="col-sm-12" id="navbar">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="menu">
            <div class="container-fluid">
                <a class="navbar-brand" href="painel.php"><img src="https://img.icons8.com/color/24/000000/artificial-intelligence.png"/> RecomendaIA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="painel.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php" id="logout"><?=$_SESSION['nome']?>-logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 text-center">
        <h1>Resultados de Recomendações</h1>
        <a href="painel.php" class="btn btn-danger"><svg xmlns='http://www.w3.org/2000/svg' width='1em' height='1em' fill='currentColor' class='bi bi-arrow-return-left' viewBox='0 0 16 16'><path fill-rule='evenodd' d='M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z'/></svg> Voltar</a><br><br>
    </div>
</div>

<div class="row">
    <div class="col-sm-6 text-center">
        <h4>Linguagens de Programação</h4>
        <ul class='list-group shadow bg-body rounded'>
            <?php
                //Cálculos Aqui
            ?>
            <li class='list-group-item'>nomeLinguagem <span class='badge bg-primary rounded-pill'>Nº pontos</span></li>
        </ul>
    </div>

    <div class="col-sm-6 text-center">
        <h4>Linguagens Mais Recomendadas</h4>
        <ul class='list-group shadow bg-body rounded'>
            <?php
                //Cálculos Aqui
            ?>
            <li class='list-group-item'>nomeLinguagem <span class='badge bg-primary rounded-pill'>Nº pontos</span></li>
        </ul>
    </div>
</div>

<?php require_once 'rodape.php'; ?>