<?php
    require_once 'cabecalho.php';
    if(!empty($_POST['nome'])) {
        $r = $db->prepare("SELECT id FROM usuario WHERE nome=?");
        $r->execute(array($_POST['nome']));
        if($r->rowCount()==0) {echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Nome não cadastrado!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";}
        else {
            session_start();
            $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
            foreach($linhas as $l) {$_SESSION['id'] = $l['id']; header("location: painel.php");}
        }
    }
?>

<div class="row">
    <div class="col-sm-12 text-center">
        <img src="https://img.icons8.com/color/96/000000/artificial-intelligence.png"/>
        <h1>RecomendaIA</h1>
        <h4 class="text-muted">Software de recomendações de linguagens de programação</h4>
        <form action="index.php" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" maxlength="20" name="nome" required placeholder="nome" style="text-transform: lowercase;">
            </div>
            <button type="submit" class="btn btn-primary btn-lg">Entrar</button>
        </form>
        <br>
        <a href="addUsuario.php" class="btn btn-secondary">Cadastrar-se</a>
    </div>
</div>

<?php require_once 'rodape.php'?>