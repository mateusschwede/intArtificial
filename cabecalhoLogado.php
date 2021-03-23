<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-sm-12" id="navbar">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="menu">
            <div class="container-fluid">
                <a class="navbar-brand" href="painel.php"><img src="https://img.icons8.com/color/24/000000/artificial-intelligence.png"/> RecomendaIA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="painel.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php" id="logout" onclick="return confirm('Deseja mesmo sair de sua conta?');"><?=$_SESSION['nome']?>-logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>