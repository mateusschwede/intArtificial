<?php require_once 'cabecalhoLogado.php'?>

<div class="row">
    <div class="col-sm-12 text-center">
        <h1>Resultados de Recomendações</h1>
        <a href="painel.php" class="btn btn-danger"><svg xmlns='http://www.w3.org/2000/svg' width='1em' height='1em' fill='currentColor' class='bi bi-arrow-return-left' viewBox='0 0 16 16'><path fill-rule='evenodd' d='M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z'/></svg> Voltar</a><br><br>
    </div>
</div>

<div class="row">
    <div class="col-sm-6 text-center">
        <h4>Linguagens mais sugeridas à você</h4>
        <p class="text-muted">Confira abaixo as linguagens de programação mais recomendadas pelo sistema à você, de acordo com suas curtidas</p>
        <ul class='list-group shadow bg-body rounded'>
            <?php
                $frontend = 0;
                $backend = 0;
                $desktop = 0;
                $mobile = 0;
                $web = 0;
                $plataforma = null;

                $r = $db->prepare("SELECT * FROM usuario_postagem WHERE idUsuario=?");
                $r->execute(array($_SESSION['id']));
                $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                foreach($linhas as $l) {

                    //Soma pontuação das características das postagens, com relação às características das linguagens
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
                ?>

                <div class="container">
                    <!--Gráfico de Ambientes-->
                    <script type="text/javascript">
                        google.charts.load("current", {packages:["corechart"]});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Ambiente', 'Pontuação'],
                                ['Frontend', <?=(int)$frontend?>],
                                ['Backend', <?=(int)$backend?>]
                            ]);
                            var options = {title: 'Ambiente',pieHole: 0.4};
                            var chart = new google.visualization.PieChart(document.getElementById('donutchart1'));
                            chart.draw(data, options);
                        }
                    </script>
                    <div id="donutchart1" style="width: 600px; height: 400px;"></div>

                    <!--Gráfico de Plataformas-->
                    <script type="text/javascript">
                        google.charts.load("current", {packages:["corechart"]});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Plataforma', 'Pontuação'],
                                ['Desktop', <?=(int)$desktop?>],
                                ['Mobile', <?=(int)$mobile?>],
                                ['Web', <?=(int)$web?>]
                            ]);
                            var options = {title: 'Plataforma',pieHole: 0.4};
                            var chart = new google.visualization.PieChart(document.getElementById('donutchart2'));
                            chart.draw(data, options);
                        }
                    </script>
                    <div id="donutchart2" style="width: 600px; height: 400px;"></div>
                </div>

                <?php
                //Qual ambiente: Se Front ou Back ou Ambos
                if($frontend>$backend) {$frontBack="frontend";}
                elseif($frontend<$backend) {$frontBack="backend";}
                else {$frontBack="fullstack";}

                //Qual Plataforma: Se Desktop ou Mobile ou Web
                if( ($desktop>$mobile) and ($desktop>$web) ) {$plataforma = "desktop";}
                if( ($web>$desktop) and ($web>$mobile) ) {$plataforma = "web";}
                if( ($mobile>$desktop) and ($mobile>$web) ) {$plataforma = "mobile";}

                echo "<br><p><b>Ambiente(s) mais recomendado(s):</b> ".$frontBack."</p>";
                echo "<p><b>Plataforma(s) mais recomendada(s):</b> ".$plataforma."</p>";

                //Listar linguagens, de acordo com características somadas
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
                    $r = $db->query("SELECT nome FROM linguagem WHERE frontend=1 AND backend=0 AND desktop=1");
                    $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                    foreach($linhas as $l) {
                        $listaLinguagens[] = $l['nome'];
                    }
                }

                if( ($frontBack=="frontend") and ($plataforma=="web") ) {
                    $r = $db->query("SELECT nome FROM linguagem WHERE frontend=1 AND backend=0 AND web=1");
                    $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                    foreach($linhas as $l) {
                        $listaLinguagens[] = $l['nome'];
                    }
                }

                if( ($frontBack=="frontend") and ($plataforma=="mobile") ) {
                    $r = $db->query("SELECT nome FROM linguagem WHERE frontend=1 AND backend=0 AND mobile=1");
                    $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                    foreach($linhas as $l) {
                        $listaLinguagens[] = $l['nome'];
                    }
                }

                if( ($frontBack=="backend") and ($plataforma=="desktop") ) {
                    $r = $db->query("SELECT nome FROM linguagem WHERE backend=1 AND frontend=0 AND desktop=1");
                    $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                    foreach($linhas as $l) {
                        $listaLinguagens[] = $l['nome'];
                    }
                }

                if( ($frontBack=="backend") and ($plataforma=="web") ) {
                    $r = $db->query("SELECT nome FROM linguagem WHERE backend=1 AND frontend=0 AND web=1");
                    $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                    foreach($linhas as $l) {
                        $listaLinguagens[] = $l['nome'];
                    }
                }

                if( ($frontBack=="backend") and ($plataforma=="mobile") ) {
                    $r = $db->query("SELECT nome FROM linguagem WHERE backend=1 AND frontend=0 AND mobile=1");
                    $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                    foreach($linhas as $l) {
                        $listaLinguagens[] = $l['nome'];
                    }
                }
            
                //Mostrar listagem de linguagens mais sugeridas à você, de acordo com somatório de características(Ambiente e Plataforma)
                if(count($listaLinguagens)>5) {
                    $c = 0;
                    array_rand($listaLinguagens);
                    foreach($listaLinguagens as $li) {
                        if($c==5) {break;}
                        else {$c++;}
                        $r = $db->prepare("SELECT * FROM linguagem WHERE nome=?");
                        $r->execute(array($li));
                        $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                        foreach($linhas as $l) {
                            $descricao = $l['descricao'];
                            $popularidade = $l['popularidade'];
                        }
                        $r = $db->prepare("UPDATE linguagem SET popularidade=? WHERE nome=?");
                        $r->execute(array($popularidade+1,$li));
                        echo "<li class='list-group-item'><b>$li</b><br>$descricao</li>";
                    }
                } else {
                    foreach($listaLinguagens as $li) {
                        $r = $db->prepare("SELECT * FROM linguagem WHERE nome=?");
                        $r->execute(array($li));
                        $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                        foreach($linhas as $l) {
                            $descricao = $l['descricao'];
                            $popularidade = $l['popularidade'];
                        }
                        $r = $db->prepare("UPDATE linguagem SET popularidade=? WHERE nome=?");
                        $r->execute(array(($popularidade+1),$li));
                        echo "<li class='list-group-item'><b>$li</b><br>$descricao</li>";
                    }
                }
            ?>
        </ul>
    </div>

    <div class="col-sm-6 text-center">
        <h4>Top 5 linguagens</h4>
        <p class="text-muted">Confira abaixo as 5 linguagens de programação mais recomendadas aos usuários do sistema, de acordo com suas curtidas</p>
        <ul class='list-group shadow bg-body rounded'>
            <?php
                //Mostrar listagem de linguagens top 5, de acordo com maior pontuação geral
                $r = $db->query("SELECT nome,popularidade FROM linguagem ORDER BY popularidade DESC LIMIT 5");
                $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                foreach($linhas as $l) {
                    if($l['popularidade']>0) {echo "<li class='list-group-item'>".$l['nome']." <span class='badge bg-primary rounded-pill'>".$l['popularidade']." ponto(s)</span></li>";}
                }
            ?>

            <!--Gráfico de Linguagens-->
            <div class="container">
                <script type="text/javascript">
                    google.charts.load("current", {packages:["corechart"]});
                    google.charts.setOnLoadCallback(drawChart);
                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Linguagem', 'Pontuação'],
                            <?php
                                $r = $db->query("SELECT nome,popularidade FROM linguagem");
                                $linhas = $r->fetchAll(PDO::FETCH_ASSOC);
                                foreach($linhas as $l) {
                                echo "['".$l['nome']."', ".$l['popularidade']."],";
                            }
                            ?>
                        ]);
                        var options = {title: 'Linguagens',pieHole: 0.4};
                        var chart = new google.visualization.PieChart(document.getElementById('donutchart3'));
                        chart.draw(data, options);
                    }
                </script>
                <div id="donutchart3" style="width: 600px; height: 400px;"></div>
            </div>

        </ul>
        <br><a href="limparPopularidade.php" class="btn btn-warning" onclick="return confirm('Deseja mesmo limpar o historico do sistema?');"><svg xmlns='http://www.w3.org/2000/svg' width='1em' height='1em' fill='currentColor' class='bi bi-dash-circle' viewBox='0 0 16 16'><path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/><path d='M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z'/></svg> Limpar Dados Gerais</a>
    </div>
</div>

<?php require_once 'rodape.php'; ?>