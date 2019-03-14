CREATE TABLE Endereco (
cep varchar(16) PRIMARY KEY NOT NULL,
logradouro VARCHAR(64) NOT NULL,
numero TINYINT(8) NOT NULL,
complemento VARCHAR(16),
uf CHAR(2),
municipio varchar(32)
);

CREATE TABLE Cliente (
cpfcnpj VARCHAR(16) PRIMARY KEY UNIQUE NOT NULL,
nome VARCHAR(64) NOT NULL,
inscest INT(9),
inscmuni INT(9),
telefone VARCHAR(16),
cep varchar(16) NOT NULL,
dtregister TIMESTAMP NOT NULL,
inadmin BIT,
FOREIGN KEY (cep) REFERENCES Endereco(cep)
);

CREATE TABLE Pecas (
cod_peca INT(8) PRIMARY KEY NOT NULL UNIQUE,
valor_peca DECIMAL(10,2) NOT NULL,
descricao VARCHAR(256)
);

CREATE TABLE Ordem_servico (
cod_os INT(8) PRIMARY KEY NOT NULL UNIQUE,
cpfcnpj VARCHAR(16) NOT NULL,
modelo VARCHAR(32),
marca VARCHAR(32),
placa VARCHAR(16),
descricao_servico VARCHAR(256),
dtregister TIMESTAMP NOT NULL,
cod_peca INT(8) NOT NULL,
FOREIGN KEY (cpfcnpj) REFERENCES Cliente(cpfcnpj),
FOREIGN KEY (cod_peca) REFERENCES Pecas(cod_peca)
);

CREATE TABLE Nfe (
cod_nf INT(8) PRIMARY KEY NOT NULL UNIQUE,
cod_os INT(8) NOT NULL,
ncm VARCHAR(6) NOT NULL UNIQUE,
cest VARCHAR(16) NOT NULL UNIQUE,
cfop VARCHAR(16) NOT NULL UNIQUE,
dtregister TIMESTAMP NOT NULL,
FOREIGN KEY (cod_os) REFERENCES Ordem_servico(cod_os)
);