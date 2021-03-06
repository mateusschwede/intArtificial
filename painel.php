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
        <?php if($_SESSION['msg']!=null){echo $_SESSION['msg'];$_SESSION['msg']=null;} ?>
        
        <h1>Lista de Postagens</h1>
        <a href="limparDados.php" class="btn btn-warning"><svg xmlns='http://www.w3.org/2000/svg' width='1em' height='1em' fill='currentColor' class='bi bi-dash-circle' viewBox='0 0 16 16'><path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/><path d='M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z'/></svg> Limpar Dados</a>
        <a href="excluirConta.php" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg> Excluir Conta</a>
        <?php
            $r = $db->prepare("SELECT COUNT(idUsuario) FROM usuario_postagem WHERE idUsuario=?");
            $r->execute(array($_SESSION['id']));
            if($r->rowCount()==1) {echo "<br><br><a href='listarResultados.php' class='btn btn-success btn-lg'><svg xmlns='http://www.w3.org/2000/svg' width='1em' height='1em' fill='currentColor' class='bi bi-list-nested' viewBox='0 0 16 16'><path fill-rule='evenodd' d='M4.5 11.5A.5.5 0 0 1 5 11h10a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm-2-4A.5.5 0 0 1 1 3h10a.5.5 0 0 1 0 1H1a.5.5 0 0 1-.5-.5z'/></svg> Listar Resultados</a>";}
        ?>
        <br>
    </div>

    <div class="col-sm-4">
        <?php
            $r = $db->query("SELECT * FROM postagem WHERE id<=10");
            $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
            foreach($linhas as $l) {
                echo "
                    <br>
                    <div class='card text-center shadow bg-body rounded'>
                        <div class='card-body'>
                            <h5 class='card-title'>".$l['titulo']."</h5>
                            <p class='card-text'>".$l['descricao']."</p>
                            <a href='curtirPostagem.php?idPostagem=".$l['id']."' class='btn btn-outline-primary'><svg xmlns='http://www.w3.org/2000/svg' width='1em' height='1em' fill='currentColor' class='bi bi-heart' viewBox='0 0 16 16'><path d='M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z'/></svg> Curtir</a>
                        </div>
                    </div>
                ";
            }
        ?>
    </div>
    <div class="col-sm-4">
        <?php
            $r = $db->query("SELECT * FROM postagem WHERE id>10 AND id<=20");
            $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
            foreach($linhas as $l) {
                echo "
                    <br>
                    <div class='card text-center shadow bg-body rounded'>
                        <div class='card-body'>
                            <h5 class='card-title'>".$l['titulo']."</h5>
                            <p class='card-text'>".$l['descricao']."</p>
                            <a href='curtirPostagem.php?idPostagem=".$l['id']."' class='btn btn-outline-primary'><svg xmlns='http://www.w3.org/2000/svg' width='1em' height='1em' fill='currentColor' class='bi bi-heart' viewBox='0 0 16 16'><path d='M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z'/></svg> Curtir</a>
                        </div>
                    </div>
                ";
            }
        ?>
    </div>
    <div class="col-sm-4">
        <?php
            $r = $db->query("SELECT * FROM postagem WHERE id>20 AND id<=30");
            $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
            foreach($linhas as $l) {
                echo "
                    <br>
                    <div class='card text-center shadow bg-body rounded'>
                        <div class='card-body'>
                            <h5 class='card-title'>".$l['titulo']."</h5>
                            <p class='card-text'>".$l['descricao']."</p>
                            <a href='curtirPostagem.php?idPostagem=".$l['id']."' class='btn btn-outline-primary'><svg xmlns='http://www.w3.org/2000/svg' width='1em' height='1em' fill='currentColor' class='bi bi-heart' viewBox='0 0 16 16'><path d='M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z'/></svg> Curtir</a>
                        </div>
                    </div>
                ";

            }

        
        ?>
    </div>
</div>

<?php require_once 'rodape.php'; ?>