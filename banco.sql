CREATE DATABASE recomendaia CHARSET=utf8;
USE recomendaia;

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30) NOT NULL
);

CREATE TABLE linguagem (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30) NOT NULL,
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

INSERT INTO linguagem (nome,frontend,backend,desktop,mobile,web) VALUES
("php",0,1,0,0,1),
("python",0,1,1,0,0),
("java",1,1,1,1,0),
("delphi",1,1,1,1,1),
("c#",0,1,1,0,0),
("kotlin",0,1,0,1,0),
("swift",1,1,1,1,0),
("cobol",0,1,1,0,0),
("javascript",1,0,0,0,1),
("ruby",0,1,1,0,0),
("go",0,1,1,0,0),
("assembly",0,1,1,0,0),
("r",0,1,1,0,0);

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
("")