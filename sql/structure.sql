CREATE TABLE emissor_rg (
	sigla char(4) NOT NULL,
	nome varchar(64) NOT NULL,
	CONSTRAINT PK_Emissores_RG PRIMARY KEY (sigla)
);

CREATE TYPE est_civil_type AS ENUM('solteiro','casado','viuvo','divorciado');
CREATE TYPE tipo_sangue_type AS ENUM('A+','A-','B+','B-','AB+','AB-','O+','O-');
CREATE TYPE tipo_cnh_type AS ENUM('A','B','C','D','E','AB','AC','AD','AE');
CREATE TYPE sexo_type AS ENUM('M', 'F');
CREATE TYPE formacao_type AS ENUM('fundamental incompleto', 'fundamental completo', 'médio incompleto', 'médio completo', 'superior incompleto','superior completo');

CREATE TABLE pessoa
(
	cpf numeric(11) NOT NULL,
	nome varchar(128) NOT NULL,
	data_nasc DATE NOT NULL,
	nome_pai varchar(128),
	nome_mae varchar(128),
	endereco varchar(256) NOT NULL,
	num_rg numeric(12) NOT NULL,
	sigla_emissor char(4) NOT NULL,
	naturalidade varchar(32) NOT NULL,
	est_civil est_civil_type NOT NULL,
	sexo sexo_type NOT NULL,
	profissao varchar(32) NOT NULL,
	email varchar(254) NOT NULL,
	tipo_sangue tipo_sangue_type NOT NULL,
	tipo_cnh tipo_cnh_type,
	tel1 numeric(15) NOT NULL,
	tel2 numeric(15),
	formacao formacao_type NOT NULL,
	obs varchar(1024),
	CONSTRAINT PK_Pessoa_CPF PRIMARY KEY(CPF),
	CONSTRAINT FK_Pessoa_Sigla_Emissor FOREIGN KEY(sigla_emissor) REFERENCES emissor_rg(sigla) ON DELETE RESTRICT ON UPDATE RESTRICT
);

CREATE INDEX index_email ON pessoa USING btree(email);

CREATE TABLE filial
(
  codigo SERIAL NOT NULL,
  estado char(40) NOT NULL CONSTRAINT UNIQ_Filial_Estado UNIQUE,
  endereco varchar(200) NOT NULL,
  CONSTRAINT PK_Filial_Codigo PRIMARY KEY(codigo)
);
  

CREATE TABLE funcionario
(
	cpf numeric(11) NOT NULL,
	cod_filial INTEGER NOT NULL,
	username char(20) NOT NULL,
	password char(20) NOT NULL,
	CONSTRAINT PK_Funcionario_Matr PRIMARY KEY(cpf),
	CONSTRAINT FK_Funcionario_CPF FOREIGN KEY (cpf) REFERENCES pessoa(cpf) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT FK_Funcionario_Cod_Filial FOREIGN KEY(cod_filial) REFERENCES filial(codigo) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE UNIQUE INDEX index_un_username ON funcionario(username);


CREATE TABLE atividade (
	codigo SERIAL NOT NULL,
	cod_filial INTEGER NOT NULL,
	cpf_responsavel numeric(11),
	nome varchar(128) NOT NULL,
	data date,
	endereco varchar(256),
	descricao varchar(256),
	CONSTRAINT PK_Atividade_Codigo PRIMARY KEY(codigo),
	CONSTRAINT FK_Atividade_Cod_Filial FOREIGN KEY(cod_filial) REFERENCES filial(codigo) ON DELETE RESTRICT ON UPDATE CASCADE,
	CONSTRAINT FK_Atividade_Cod_Responsavel FOREIGN KEY(cpf_responsavel) REFERENCES pessoa(cpf) ON DELETE SET NULL ON UPDATE CASCADE
);
CREATE INDEX index_ativ_data ON atividade(data);


CREATE TABLE lingua (
	codigo SERIAL NOT NULL,
	nome varchar(128) NOT NULL,
	dialeto varchar(128) UNIQUE,
	CONSTRAINT PK_Lingua_Codigo PRIMARY KEY(codigo)
);


CREATE TYPE nivel_ling_type AS ENUM('iniciante', 'medio', 'fluente');
CREATE TABLE fala (
	cpf NUMERIC(11) NOT NULL,
	cod_ling INTEGER NOT NULL,
	nivel nivel_ling_type NOT NULL,
	CONSTRAINT PK_Fala_PK PRIMARY KEY (cpf, cod_ling),
	CONSTRAINT Fala_CPF_FK FOREIGN KEY (cpf) REFERENCES pessoa(cpf) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT Fala_CodLing_FK FOREIGN KEY(cod_ling) REFERENCES lingua(codigo) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE participacao (
	cpf  NUMERIC(11) NOT NULL,
	cod_ativ INTEGER NOT NULL,
	horas_trab SMALLINT NOT NULL,
	descricao varchar(256) NOT NULL,
	CONSTRAINT PK_Participacao_CPF_CodLing PRIMARY KEY(cpf, cod_ativ),
	CONSTRAINT FK_Participacao_CPF FOREIGN KEY(cpf) REFERENCES pessoa(cpf) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT FK_Participacao_CodAtiv FOREIGN KEY(cod_ativ) REFERENCES Atividade(codigo) ON DELETE RESTRICT ON UPDATE CASCADE,
	CONSTRAINT CK_Participacao_Horas check( horas_trab between 1 and 8 )
);

CREATE VIEW voluntario AS
SELECT * FROM pessoa p WHERE NOT EXISTS(
	SELECT * FROM funcionario f WHERE f.cpf = p.cpf
);

-- Solucao para erro de insert em view que occore no servidor do LabBio
CREATE RULE voluntario_ins AS ON INSERT TO voluntario
DO INSTEAD
INSERT INTO pessoa VALUES (
	NEW.cpf,NEW.nome,NEW.data_nasc,NEW.nome_pai,NEW.nome_mae,NEW.endereco,
	NEW.num_rg,NEW.sigla_emissor,NEW.naturalidade,NEW.est_civil,NEW.sexo,
	NEW.profissao,NEW.email,NEW.tipo_sangue,NEW.tipo_cnh,NEW.tel1,NEW.tel2,NEW.formacao,NEW.obs
);

CREATE RULE voluntario_upd AS ON UPDATE TO voluntario
DO INSTEAD
UPDATE pessoa SET
	cpf=NEW.cpf,nome=NEW.nome,data_nasc=NEW.data_nasc,nome_pai=NEW.nome_pai,nome_mae=NEW.nome_mae,endereco=NEW.endereco,
	num_rg=NEW.num_rg,sigla_emissor=NEW.sigla_emissor,naturalidade=NEW.naturalidade,est_civil=NEW.est_civil,sexo=NEW.sexo,
	profissao=NEW.profissao,email=NEW.email,tipo_sangue=NEW.tipo_sangue,tipo_cnh=NEW.tipo_cnh,tel1=NEW.tel1,tel2=NEW.tel2,
	formacao=NEW.formacao,obs=NEW.obs
WHERE cpf = NEW.cpf;


