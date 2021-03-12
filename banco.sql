CREATE DATABASE recomendaia CHARSET=utf8;
USE recomendaia;

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30) NOT NULL
);

CREATE TABLE linguagem (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30) NOT NULL,
    descricao VARCHAR(1000) NOT NULL,
    frontend BOOLEAN NOT NULL,
    backend BOOLEAN NOT NULL,
    desktop BOOLEAN NOT NULL,
    mobile BOOLEAN NOT NULL,
    web BOOLEAN NOT NULL,
    popularidade INT NOT NULL DEFAULT 0 /*A cada resultado de listagem com essa linguagem, soma-se 1, para depois mostrar 'lista das mais populares'*/
);

CREATE TABLE postagem (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(300) NOT NULL,
    descricao VARCHAR(3000) NOT NULL,
    frontend BOOLEAN NOT NULL DEFAULT 0,
    backend BOOLEAN NOT NULL DEFAULT 0,
    desktop BOOLEAN NOT NULL DEFAULT 0,
    mobile BOOLEAN NOT NULL DEFAULT 0,
    web BOOLEAN NOT NULL DEFAULT 0
);

CREATE TABLE usuario_linguagem (
    dtRelacao DATETIME NOT NULL DEFAULT now(),
    idUsuario INT NOT NULL,
    idLinguagem INT NOT NULL
);

CREATE TABLE usuario_postagem (
    dtRelacao DATETIME NOT NULL DEFAULT now(),
    idUsuario INT NOT NULL,
    idPostagem INT NOT NULL
);

INSERT INTO linguagem (nome,descricao,frontend,backend,desktop,mobile,web) VALUES
("php","linguagem backend, com foco web, muito utilizada para desenvolvimento de sistemas web",0,1,0,0,1),
("python","linguagem backend, com desktop e mobile, muito famosa por sua sintaxe simplificada",0,1,1,0,0),
("java","linguagem backend, com foco desktop e mobile, utilizada na maioria dos dispositivos eletrônicos existentes",0,1,1,1,0),
("delphi","linguagem fullstack, multi plataforma, com desenvolvimento rad e suporte à inúmeros plugins",1,1,1,1,0),
("c#","linguagem backend, com foco desktop, muito utilizada para softwares microsoft nos dias atuais",0,1,1,0,0),
("kotlin","linguagem backend, com foco mobile, altamente recomendada à desenvolvimento android, por se tornar mais otimizada que as demais no segmento",0,1,0,1,0),
("swift","linguagem fullstack, multi plataforma, utilizada pela apple nos seus projetos atuais",0,1,1,1,0),
("cobol","linguagem backend, com foco desktop, cujo cunho, antigo, objetiva o hardware específico e baixo nível",0,1,1,0,0),
("javascript","linguagem frontend, com foco web, que mais cresce no mundo, por sua sintaxe alternativa e simples",1,0,0,0,1),
("ruby","linguagem backend, com foco desktop, com sintaxe simples e amigável, priorizando desenpenho no desenvolvimento",0,1,1,0,0),
("go","linguagem backend, com foco mobile, utilizada pela google para desenvolvimento nos seus projetos atuais e aprendizado",0,1,1,0,0),
("assembly","linguagem backend, com foco desktop, com sintaxe complexa, muito usada para código de máquina específica desktop",0,1,1,0,0),
("r","linguagem backend, com foco desktop, muito utilizada para desenvolvimento de projetos envolvendo estatísticas e dados relacionáveis",0,1,1,0,0);

INSERT INTO postagem(titulo,descricao,frontend,backend,desktop,mobile,web) VALUES
("Soluções em Cloud: Novidades no visual","Uma nova era está sendo desenvolvida com relação ao visual dos novos softwares desenvolvidos na núvem. Trata-se de técnicas específicas de UX Design contemporâneo, envolvendo heurísticas de Nielsen e outros pontos de extrema importância para o mundo web",1,0,0,0,1),
("Nova Arquitetura Android Chegando","Uma nova arquitetura de desenvolvimento do SO Android está sendo desenvolvido, com auxílio de grandes empresas. Segundo essas empresas, a novidade no SO promete revolucionar os sistemas de smartphones e tablets da área",0,1,0,1,0),
("O Melhor ERP para Windows","Segundo a empresa XYZ, o grande software de gestão empresarial XXX foi eleito como o ERP mais completo da área. As razões para a escolha da solução foram o desempenho em conjunto com o SO, além da automatização de 90% das funções desempenhadas, o que resultará em maior produtividade para o cliente",0,1,1,0,0),
("Design de Apps iOS de Investimento","O design dos apps de investimento para smartphones e tablets foi renovado, a fim de trazer maiores detalhes e dinamismo de experiência visual do usuário na navegação dos mesmos",1,0,0,1,0),
("Novo Bootstrap 5 em Sites","Com a novidade do Bootstrap versão 5, os sites estão ainda mais responsivos, dinâmicos e bonitos, com novos layouts de elementos, como botões e formulários digitais",1,0,0,0,1),
("Como aumentar o desempenho de sites","Com as novidades no mundo dos 'motores web', tem-se novas tecnologias para aumentar o desempenho de sites profissionais e e-commerce. Com a adesão de tais tenologias, pode-se obter, em média, cerca de 50% mais desempenho na execução de funções em segundo plano",0,1,0,0,1),
("Motor de sistema E-Commerce Multi-Plataforma","Com a evolução dos dispositivos, tem-se a criação de sistemas multi-plataforma, ou seja, que funcionam em qualquer dispositivo, inclusive na web",0,1,1,1,1),
("Novo visual de planilhas eletrônicas MacOS","Está lançado o novo visual do software de planilhas eletrônicas de MacOS, onde foram acrescentados novos elementos visuais, como botões e ícones, todos renovados e padronizados, em conformidade com as novas tendências de design contemporâneo",1,0,1,0,0),
("Ciência de Dados Agora na Palma da Mão","Com as novas tecnologias, agora é possível desenvolver algoritmos de ciência de dados através de apps no seu smartphone ou tablet, basta instalar o SDK da tecnologia responsável e baixar a ferramenta XYZ para que você possa desenvolver livremente suas ideias de algoritmos",0,1,0,1,0),
("Novas técnicas para desenvolvimento Full-Stack em celulares","O portal ZYX postou, na data de ontem, as novas e melhores técnicas e tecnologias para realizar o desenvolvimento Full-Stack em celulares com a maior vantagem na curva de aprendizagem e custo zero",1,1,0,1,0),
("Melhorias no SDK nos Google Apps","Ao longo dessa semana, o Google lançou novas melhorias no SDK dos Googles Apps para celulares. As melhorias incluem correções de bugs e melhorias de desempenho para execução de threads nos mais variados dispositivos de mão",0,1,0,1,0),
("Como o desempenho dos Apps do Google Funcionam","Os aplicativos do Google são muito populares pelo seu belo desempenho, graças à suas técnicas de linguagens por trás dos planos. Dessa forma, o Google procura maior foco à celulares, não discartando os tablets",0,1,0,1,0),
("Visual do Site do Spotify mais Dinâmico","A poucos dias fora revelado o novo visual do site do Spotify. Entre as muitas novidades, tem-se a adição de muitas animações nos ícones relacionados. A ideia é trazer mais dinamismo ao site, inspirado no software por eles distribuído",1,0,0,0,1),
("Melhores Softwares Gráficos para seu Computador","Entre muitos softwares gráficos, fizemos uma listagem com os melhores softwares gráficos instaláveis para seu computador/notebook. Entre eles, encontram-se várias alternativas gratuitas, inclusive com código fonte aberto, sendo algumas inclusive Open Source",1,1,1,0,0),
("Código de Software Online de Vídeo Conferência","Um dos casos mais comentados atualmente é a necessidade de se possuir software de vídeo conferência, onde a busca principal segue por algo online. Nós do portal, discobrimos um código fonte para realizar a montagem inicial de um software de vídeo conferência online",0,1,0,0,1),
("Mineração de Bitcoins na Palma da Mão","Atualmente está cada vez mais fácil realizar mineração de bitcoins, de forma simples e prática. Agora você pode realizar a mineração de Bitcoins pelo App de Mineração com seu celular, de forma simples. O App possui interface simples e pode ser baixado no loja do seu smartphone",1,1,0,1,0),
("App de Academia Disponível Gratuitamente","Com a chegada da pandemia de Covid-19, as rotinas tem sido adaptadas. Uma das grandes novidades são as aulas de academia orientadas por profissional via aplicativo. Então, nós do RecomendaIA selecionamos o App, Android e iOS, para que você possa utilizar, tendo em vista melhor experiência de treino com o mesmo",1,1,0,1,0),
("Melhor software de Streaming Gamer para seu computador","Nós do RecomendaIA selecionamos uma breve lista com os melhores softwares de Streaming Gamer para seu computador. Entre todos eles, o software XYZ foi considerado o melhor entre eles",1,1,1,0,0),
("Material Design para Dispositivos Android","Já está disponível o novo conjunto de elementos visuais do Material Design, disponibilizado pela Google, para testes em dispositivos Android, confira",1,0,0,1,0),
("Novo Canivete Suíço para Testes de Invasão à computadores","A empresa XXX disponibilizou, nesta semana, um novo kit de códigos para realização de testes de invasão em dispositivos desktop. O canivete suíço está disponível no site oficial da empresa",0,1,1,0,0),
("Nova atualização do Ajax","A biblioteca web Ajax recebeu uma importante atualização ao longo deste último mês, onde foram liberados novos códigos recheados de novidades para o desenvolvimento web mais produtivo",0,1,0,0,1),
("Stack Overflow agora no VSCode","Isso mesmo, agora o Stack Overflow está disponível como plugin do editor de códigos VSCode. Para conferir mais detalhes, baixe a extensão na loja do editor",1,1,1,0,1),
("Software para celular e computador de monitoramento Covid-19","Por razão da pandemia de Covid-19, elencamos um software multi-plataforma que realiza o monitoramento de casos de Covid-19 mais pertos do usuário",1,1,1,1,0),
("Nova atualização do Java","A linguagem de programação Java recebeu uma importante atualização ao longo deste último mês, onde foram liberados novos códigos recheados de novidades para o desenvolvimento desktop mais produtivo",0,1,1,1,0),
("Novos códigos MetroUI 5 em Sites","Com a novidade do MetroUI versão 5, os sites estão ainda mais responsivos, dinâmicos e bonitos, com novos layouts de elementos, como botões e formulários digitais. Isso, além de menos código para a programação dos mesmos",1,1,0,0,1),
("Melhorias no SDK do Ruby","Ao longo dessa semana, a empresa oficial responsável pela linguagem de programação Ruby lançou novas melhorias no SDK da linguagem. As melhorias incluem correções de bugs e melhorias de desempenho para execução de threads nos mais variados dispositivos desktop",0,1,1,0,0),
("O Melhor App auxiliador de ERP","Segundo a empresa ZZY, o grande App de gestão em auxílio empresarial de software ERP, XXX,  foi eleito como o auxilliador de ERP mais completo da área. As razões para a escolha da solução foram o desempenho, além da automatização de 90% das funções desempenhadas, o que resultará em maior produtividade para o cliente",1,1,0,1,0),
("Como aumentar o desempenho de Apps iOS","Com as novidades no mundo dos Apps, tem-se novas tecnologias para aumentar o desempenho de Apps profissionais, envolvendo o SO iOS. Com a adesão de tais tenologias, pode-se obter, em média, cerca de 50% mais desempenho na execução de funções em segundo plano",0,1,0,1,0),
("Cloud do Futuro: Pela frente e por trás dos panos","Uma nova era está sendo desenvolvida com relação ao visual dos novos softwares desenvolvidos na núvem. Tratam-se de técnicas específicas de UX Design e programação backend contemporâneas, envolvendo pontos de extrema importância para o mundo web",1,1,0,0,1),
("Código para software com Inteligência Artificial","Nós do RecomendaIA fornecemos nosso código fonte para que você, leitor, possa usufruir em seus projetos pessoais e profissionais",0,1,0,0,1);