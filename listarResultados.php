<?php require_once 'cabecalho.php'; ?>
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
        <h4>Linguagens Mais Sugeridas</h4>
        <ul class='list-group shadow bg-body rounded'>
            <?php
                $frontend = 0;
                $backend = 0;
                $desktop = 0;
                $mobile = 0;
                $web = 0;

                $r = $db->prepare("SELECT * FROM usuario_postagem WHERE idUsuario=?");
                $r->execute(array($_SESSION['id']));
                $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                foreach($linhas as $l) {

                    $r = $db->prepare("SELECT * FROM postagem WHERE id=?");
                    $r->execute(array($l['idPostagem']));
                    $linhas2 = $r->fetchAll(PDO::FETCH_ASSOC);
                    foreach($linhas2 as $l2) {
                        if($l2['frontend']==true) {$frontend++;}
                        if($l2['backend']==true) {$backend++;}
                        if($l2['desktop']==true) {$desktop++;}
                        if($l2['mobile']==true) {$mobile++;}
                        if($l2['web']==true) {$web++;}
                    }

                }
                
                echo "Front: ".$frontend."<br>Back: ".$backend."<br>Desktop: ".$desktop."<br>Mobile: ".$mobile."<br>Web: ".$web."<br>";

                //Se Front ou Back
                if($frontend>$backend) {$frontBack="frontend";}
                elseif($frontend<$backend) {$frontBack="backend";}
                else {$frontBack="fullstack";}
                echo $frontBack."<br>";

                //Qual Plataforma
                if( ($desktop>$mobile) and ($desktop>$web) ) {$plataforma = "desktop";}
                if( ($web>$desktop) and ($web>$mobile) ) {$plataforma = "web";}
                if( ($mobile>$desktop) and ($mobile>$web) ) {$plataforma = "mobile";}
                echo $plataforma."<br>";

                //Listar linguagens
                $listaLinguagens = [];

                if( ($frontBack=="fullstack") and ($plataforma=="desktop") ) {
                    $r = $db->query("SELECT nome FROM linguagem WHERE frontend=1 AND backend=1 AND desktop=1");
                    $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                    foreach($linhas as $l) {
                        $listaLinguagens[] = $l['nome'];
                    }
                }

                if( ($frontBack=="fullstack") and ($plataforma=="web") ) {
                    $r = $db->query("SELECT nome FROM linguagem WHERE frontend=1 AND backend=1 AND web=1");
                    $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                    foreach($linhas as $l) {
                        $listaLinguagens[] = $l['nome'];
                    }
                }

                if( ($frontBack=="fullstack") and ($plataforma=="mobile") ) {
                    $r = $db->query("SELECT nome FROM linguagem WHERE frontend=1 AND backend=1 AND mobile=1");
                    $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                    foreach($linhas as $l) {
                        $listaLinguagens[] = $l['nome'];
                    }
                }

                if( ($frontBack=="frontend") and ($plataforma=="desktop") ) {
                    $r = $db->query("SELECT nome FROM linguagem WHERE frontend=1 AND desktop=1");
                    $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                    foreach($linhas as $l) {
                        $listaLinguagens[] = $l['nome'];
                    }
                }

                if( ($frontBack=="frontend") and ($plataforma=="web") ) {
                    $r = $db->query("SELECT nome FROM linguagem WHERE frontend=1 AND web=1");
                    $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                    foreach($linhas as $l) {
                        $listaLinguagens[] = $l['nome'];
                    }
                }

                if( ($frontBack=="frontend") and ($plataforma=="mobile") ) {
                    $r = $db->query("SELECT nome FROM linguagem WHERE frontend=1 AND mobile=1");
                    $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                    foreach($linhas as $l) {
                        $listaLinguagens[] = $l['nome'];
                    }
                }

                if( ($frontBack=="backend") and ($plataforma=="desktop") ) {
                    $r = $db->query("SELECT nome FROM linguagem WHERE backend=1 AND desktop=1");
                    $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                    foreach($linhas as $l) {
                        $listaLinguagens[] = $l['nome'];
                    }
                }

                if( ($frontBack=="backend") and ($plataforma=="web") ) {
                    $r = $db->query("SELECT nome FROM linguagem WHERE backend=1 AND web=1");
                    $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                    foreach($linhas as $l) {
                        $listaLinguagens[] = $l['nome'];
                    }
                }

                if( ($frontBack=="backend") and ($plataforma=="mobile") ) {
                    $r = $db->query("SELECT nome FROM linguagem WHERE backend=1 AND mobile=1");
                    $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                    foreach($linhas as $l) {
                        $listaLinguagens[] = $l['nome'];
                    }
                }
            
                if(count($listaLinguagens)>5) {
                    $c = 0;
                    array_rand($listaLinguagens);
                    foreach($listaLinguagens as $li) {
                        if($c==5) {break;}
                        else {$c++;}
                        $r = $db->prepare("SELECT descricao FROM linguagem WHERE nome=?");
                        $r->execute(array($li));
                        $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                        foreach($linhas as $l) {$descricao = $l['descricao'];}
                        echo "<li class='list-group-item'><b>$li</b><br>$descricao</li>";
                    }
                } else {
                    foreach($listaLinguagens as $li) {
                        $r = $db->prepare("SELECT descricao FROM linguagem WHERE nome=?");
                        $r->execute(array($li));
                        $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                        foreach($linhas as $l) {$descricao = $l['descricao'];}
                        echo "<li class='list-group-item'><b>$li</b><br>$descricao</li>";
                    }
                }
            ?>
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