<?php
    require_once 'cabecalho.php';
    if(!empty($_POST['nome'])) {
        $r = $db->prepare("SELECT id FROM usuario WHERE nome=?");
        $r->execute(array($_POST['nome']));
        if($r->rowCount()>0) {echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Nome já cadastrado!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";}
        else {
            $r = $db->prepare("INSERT INTO usuario(nome) VALUES (?)");
            $r->execute(array($_POST['nome']));
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>Usuário ".$_POST['nome']." cadastrado!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RecomendaIA</title>
    <link rel="stylesheet" href="estilo.css">
    <script type="text/javascript" src="pace.min.js"></script>
</head>
<body>

    <div class="row container">
        <div class="col-sm-12 text-center">
            <img src="https://img.icons8.com/color/96/000000/artificial-intelligence.png"/>
            <h1>RecomendaIA</h1>
            <h4 class="text-muted">Software de recomendações de linguagens de programação</h4>
            <h3 class="text-muted">Novo Usuário</h3>
            <form action="addUsuario.php" method="post">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" maxlength="20" name="nome" required placeholder="nome" style="text-transform: lowercase;">
                    <label for="floatingInput">Nome</label>
                </div>
                <button type="button" class="btn btn-danger" onclick="window.location.href='index.php'">Voltar</button>
                <button type="submit" class="btn btn-success">Cadastrar</button>
                <button type="reset" class="btn btn-warning">Limpar</button>
            </form>
            <br>
        </div>
    </div>

</body>
</html>

<?php require_once 'rodape.php'?>