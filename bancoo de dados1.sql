CREATE DATABASE Cadastro;

USE Industria;

-- Tabela de Departamentos
CREATE TABLE Departamento (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero INT NOT NULL,
    setor VARCHAR(255) NOT NULL
);

-- Tabela de Funcionários
CREATE TABLE Funcionario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero INT NOT NULL,
    salario DECIMAL(10, 2) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    departamento_id INT,
    FOREIGN KEY (departamento_id) REFERENCES Departamento(id)
);

-- Tabela de Projetos
CREATE TABLE Projeto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero INT NOT NULL,
    orcamento DECIMAL(10, 2) NOT NULL,
    data_inicio DATE NOT NULL,
    horas_trabalhadas INT NOT NULL
);

-- Tabela de Fornecedores
CREATE TABLE Fornecedor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero INT NOT NULL,
    endereco VARCHAR(255) NOT NULL
);

-- Tabela de Peças
CREATE TABLE Peca (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero INT NOT NULL,
    peso DECIMAL(10, 2) NOT NULL,
    cor VARCHAR(50) NOT NULL
);

-- Tabela de Depósitos
CREATE TABLE Deposito (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero INT NOT NULL,
    endereco VARCHAR(255) NOT NULL
);

-- Tabela de Relacionamento entre Projetos e Fornecedores
CREATE TABLE Projeto_Fornecedor (
    projeto_id INT,
    fornecedor_id INT,
    PRIMARY KEY (projeto_id, fornecedor_id),
    FOREIGN KEY (projeto_id) REFERENCES Projeto(id),
    FOREIGN KEY (fornecedor_id) REFERENCES Fornecedor(id)
);

-- Tabela de Relacionamento entre Projetos e Peças
CREATE TABLE Projeto_Peca (
    projeto_id INT,
    peca_id INT,
    PRIMARY KEY (projeto_id, peca_id),
    FOREIGN KEY (projeto_id) REFERENCES Projeto(id),
    FOREIGN KEY (peca_id) REFERENCES Peca(id)
);

-- Tabela de Relacionamento entre Funcionários e Projetos
CREATE TABLE Funcionario_Projeto (
    funcionario_id INT,
    projeto_id INT,
    PRIMARY KEY (funcionario_id, projeto_id),
    FOREIGN KEY (funcionario_id) REFERENCES Funcionario(id),
    FOREIGN KEY (projeto_id) REFERENCES Projeto(id)
);

