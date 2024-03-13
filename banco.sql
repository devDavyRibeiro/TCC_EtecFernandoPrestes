CREATE DATABASE marmoraria_bd;
USE marmoraria_bd;

CREATE TABLE Clientes(
    id_cliente int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome_cliente varchar(100) NOT NULL,
    telefone_cliente varchar(11) NOT NULL,
    email_cliente varchar(100) NOT NULL,
    rg_cliente varchar(9) NOT NULL,
    endereco_cliente VARCHAR(250) NOT NULL,
	concordo_cliente TINYINT  NOT NULL,
	senha_cliente VARCHAR(100) NOT NULL
);
CREATE TABLE Funcionarios(
    id_funcionario int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome_funcionario VARCHAR (300) NOT NULL,
    telefone_funcionario varchar(11) NOT NULL,
    email_funcionario varchar(100) NOT NULL,
    rg_funcionario varchar(9) NOT NULL,
    endereco_funcionario VARCHAR(250) NOT NULL,
    salario_funcionario DECIMAL NOT NULL,
	senha_funcionario VARCHAR(100) NOT NULL,
	nivel_funcionario CHAR NOT NULL,
    cargo_funcionario VARCHAR(50) NOT NULL
);
CREATE TABLE Agendas(
    id_agenda int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    descricao_agenda VARCHAR (300) NOT NULL,
    visita_agenda datetime NOT NULL, -- data da visita
    fk_funcionario int NOT NULL,
    FOREIGN KEY (fk_funcionario) REFERENCES Funcionarios(id_funcionario),
    fk_cliente int NOT NULL,
    FOREIGN KEY (fk_cliente) REFERENCES Clientes(id_cliente)
);
CREATE TABLE Produtos(
    id_produto int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome_produto VARCHAR (300) NOT NULL,
    valor_produto DECIMAL NOT NULL,
    foto_produto VARCHAR(200) NOT NULL
);
CREATE TABLE Orcamentos(
    id_orcamento int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    entrega_orcamento date, -- data de entrega
    parcelas_orcamento int NOT NULL, -- numero de parcelas
    valorTotal_orcamento DECIMAL NOT NULL,
    valorParcelas_orcamento DECIMAL NOT NULL,
    formapag_orcamento VARCHAR (50) NOT NULL,
    conclupag_orcamento CHAR NOT Null,

    fk_cliente int NOT NULL,
    FOREIGN KEY (fk_cliente) REFERENCES Clientes(id_cliente),
    fk_funcionario int NOT NULL,
    FOREIGN KEY(fk_funcionario) REFERENCES Funcionarios(id_funcionario)
);
CREATE TABLE Orcamento_Produtos(
    id_orcamento_produto int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    material_orcamento_produto VARCHAR(50) NOT NULL,
    servico_orcamento_produto VARCHAR(50) NOT NULL,
    medida_orcamento_produto VARCHAR(100) NOT NULL,

    fk_orcamento int NOT NULL,
    FOREIGN KEY (fk_orcamento) REFERENCES Orcamentos(id_orcamento),
    fk_produto int NOT NULL,
    FOREIGN KEY (fk_produto) REFERENCES Produtos(id_produto)
);
-- por enquanto esse vai ser o cadastro do Admin

INSERT INTO `funcionarios`(`id_funcionario`,`nome_funcionario`, `telefone_funcionario`, `email_funcionario`, `rg_funcionario`, `endereco_funcionario`, `salario_funcionario`, `senha_funcionario`, `nivel_funcionario`,`cargo_funcionario`) VALUES ('1','Chioveto','11991984343','chiovetto@gmail.com','123456789','Rua Comendador Vicente do Amaral','0','$2a$08$CflfllePArKlBJomMOF6a.JApjuTgn84RmWIijESLx7r4Pa4CWg3W','2','admin'); -- 123123
INSERT INTO `funcionarios`(`nome_funcionario`, `telefone_funcionario`, `email_funcionario`, `rg_funcionario`, `endereco_funcionario`, `salario_funcionario`, `senha_funcionario`, `nivel_funcionario`,`cargo_funcionario`) VALUES ('Alib','11991984343','alib@gmail.com','123456789','Rua Comendador Vicente do Amaral','0','$2a$08$CflfllePArKlBJomMOF6a.EmZaNGdstz6Y76f.0I8cC4B3QpnE81q','1','Orçamento'); -- 123456

INSERT INTO `clientes`(`nome_cliente`, `telefone_cliente`, `email_cliente`, `rg_cliente`, `endereco_cliente`, `concordo_cliente`, `senha_cliente`) VALUES ('Emaunuel','991984343','emanuel@gmail.com','123456789','Rua Encomendador','1','$2a$08$CflfllePArKlBJomMOF6a.GgvxvDpCtKmWBUensmqy3wwBpaAq7/W'); -- 123456789
INSERT INTO `clientes` (`nome_cliente`, `telefone_cliente`, `email_cliente`, `rg_cliente`, `endereco_cliente`, `concordo_cliente`, `senha_cliente`) VALUES ('Manu', '01234567891', 'manu@gmail.com', '123456789', 'Rua da Penha', '1', '$2a$08$CflfllePArKlBJomMOF6a.JApjuTgn84RmWIijESLx7r4Pa4CWg3W'); -- 123123

INSERT INTO `produtos` (`nome_produto`,`valor_produto`,`foto_produto`) VALUES('Balcão de cozinha','100','balcao1.jpg');
INSERT INTO `produtos` (`nome_produto`,`valor_produto`,`foto_produto`) VALUES('Balcão pia claro','150','balcao2.jpg');
INSERT INTO `produtos` (`nome_produto`,`valor_produto`,`foto_produto`) VALUES('Balcão pia escuro','175','balcao3.jpg');
INSERT INTO `produtos` (`nome_produto`,`valor_produto`,`foto_produto`) VALUES('Cuba de banheiro','125','banheiro1.jpg');
INSERT INTO `produtos` (`nome_produto`,`valor_produto`,`foto_produto`) VALUES('Cuba branca','140','banheiro2.jpg');
INSERT INTO `produtos` (`nome_produto`,`valor_produto`,`foto_produto`) VALUES('Cuba bege','210','banheiro3.jpg');
INSERT INTO `produtos` (`nome_produto`,`valor_produto`,`foto_produto`) VALUES('Pia escura','120','slide1.jpg');
INSERT INTO `produtos` (`nome_produto`,`valor_produto`,`foto_produto`) VALUES('Pia grande','135','slide2.jpg');
INSERT INTO `produtos` (`nome_produto`,`valor_produto`,`foto_produto`) VALUES('Pia moderna','168','slide3.jpg');

INSERT INTO `agendas`(`descricao_agenda`, `visita_agenda`, `fk_funcionario`, `fk_cliente`) VALUES ('Pia','2023-10-22 22:10','2','1');

INSERT INTO `orcamentos` (`entrega_orcamento`, `parcelas_orcamento`, `valorTotal_orcamento`, `valorParcelas_orcamento`, `formapag_orcamento`, `conclupag_orcamento`, `fk_cliente`, `fk_funcionario`) VALUES (NULL, '4', '100', '25', 'Pix', 'n', '2', '2');




