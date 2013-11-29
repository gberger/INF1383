INSERT INTO emissor_rg VALUES
	('SSP', 'Secretaria de Segurança Pública'),
	('PM', 'Polícia Militar'),
	('PC', 'Policia Civil'),
	('CNT', 'Carteira Nacional de Habilitação'),
	('DIC', 'Diretoria de Identificação Civil'),
	('CTPS', 'Carteira de Trabaho e Previdência Social'),
	('FGTS', 'Fundo de Garantia do Tempo de Serviço'),
	('IFP', 'Instituto Félix Pacheco'),
	('IPF', 'Instituto Pereira Faustino'),
	('IML', 'Instituto Médico-Legal'),
	('MTE', 'Ministério do Trabalho e Emprego'),
	('MMA', 'Ministério da Marinha'),
	('MAE', 'Ministério da Aeronáutica'),
	('MEX', 'Ministério do Exército'),
	('POF', 'Polícia Federal'),
	('POM', 'Polícia Militar'),
	('SES', 'Carteira de Estrangeiro'),
	('SJS', 'Secretaria da Justiça e Segurança'),
	('SJTS', 'Secretaria da Justiça do Trabalho e Segurança'),
	('ZZZ', 'Outros (inclusive exterior)')
;

INSERT INTO filial VALUES
(DEFAULT, 'Alagoas', 'Avenida Comendador Gustavo Paiva, 2889 - Mangabeiras - Maceió - AL'),
(DEFAULT, 'Amazonas', 'Parque Residencial Adrianópolis, QB – Casa 16 - Manaus - AM'),
(DEFAULT, 'Bahia', 'Av. Luis Eduardo Magalhães, 3091 - Cabula - Salvador - BA'),
(DEFAULT, 'Ceará', 'Rua José Lourenço, 3.280 – Aldeota - Fortaleza - CE'),
(DEFAULT, 'Distrito Federal', 'SCLRN 715, Bloco C, Loja 25 - Brasília – DF'),
(DEFAULT, 'Rio de Janeiro', 'Praça da Cruz Vermelha, 10 - Centro - Rio de Janeiro - RJ'),
(DEFAULT, 'São Paulo', 'Av. Moreira Guimarães, 699 - Moema - São Paulo - SP');

INSERT INTO pessoa VALUES
('12345678909', 'Felipe Luiz', '1994-06-17', NULL, NULL, 'Av. Rio Branco 1 - Centro - Rio de Janeiro - RJ', '123456', 'SSP', 'Rio de Janeiro', 'solteiro', 'M', 'Estudante', 'ferocha@globo.com', 'A+', 'B', '97794229', NULL, 'superior incompleto', NULL),
('28246103440', 'Gabriel Siqueira', '1993-10-14', NULL, NULL, 'R. Marquês de São Vicente, 225 - Gávea - Rio de Janeiro - RJ,', '987654', 'PM', 'Rio de Janeiro', 'solteiro', 'M', 'Estudante', 'gabrielsiq@msn.com', 'A+', 'B', '96492755', NULL, 'superior incompleto', NULL),
('74114767223', 'Pedro Bandeira', '1947-11-04', 'Marcos', 'Flavia', 'R. das Laranjeiras, 33 - Laranjeiras - Rio de Janeiro - RJ,', '456987', 'PC', 'Rio de Janeiro', 'casado', 'M', 'Médico', 'pb@bol.com', 'B+', 'B', '88754789', NULL, 'superior completo', 'Ortopedista'),
('04257774720', 'Caroline Smith', '1989-07-24', NULL, NULL, 'R. AB, 55 - Moema - São Paulo - SP', '748596', 'SES', 'São Paulo', 'divorciado', 'F', 'Estudante', 'cs@aol.com', 'AB+', NULL, '98987874', NULL, 'fundamental completo', NULL),
('88884721261', 'Vera Stein', '1944-02-22', NULL, NULL, 'R. JBK, 12 - Liberdade - São Paulo - SP', '663322', 'IML', 'São Paulo', 'casado', 'F', 'Enfermeiro', 'vs@gmail.com', 'B-', NULL, '87979879', NULL, 'superior completo', NULL),
('41568633360', 'Ana Lucia', '1959-02-12', NULL, NULL, 'R. CAB, 22 - Salvador - BA', '142536', 'SSP', 'São Paulo', 'divorciado', 'F', 'Professor', 'al@outlook.com', 'AB-', 'B', '85687495', NULL, 'superior completo', NULL),
('46476479431', 'Pedro Mendes', '1945-01-15', NULL, NULL, 'R. ABC, 11 - Fortaleza - CE', '461379', 'POM', 'Fortaleza', 'casado', 'M', 'Dentista', 'pm@gmail.com', 'O-', 'A', '89988658', NULL, 'superior completo', NULL),
('19534157848', 'Maria Augusta', '1966-12-02', NULL, NULL, 'R. CBD, 14 - Brasília - DF', '712634', 'POF', 'Maceió', 'casado', 'F', 'Cozinheiro', 'ma@hotmail.com', 'O-', NULL, '75489674', NULL, 'fundamental incompleto', NULL)
;

INSERT INTO funcionario VALUES
('12345678909', 1, 'fulano', '1234'),
('28246103440', 1, 'gsiq', '123senha'),
('04257774720', 2, 'besouro', 'never123')
;

INSERT INTO atividade VALUES
(DEFAULT, 1, '12345678909', 'Evento', '2013-01-01', 'Praça São Fulano da Silva - Centro - Rio de Janeiro', 'Atividade da CVB'),
(DEFAULT, 2, '04257774720', 'Arrecadação de Alimentos', '2013-07-05', 'Praça do Feijão - Liberdade - São Paulo', 'Arrecadação de alimentos para os desabrigados das chuvas'),
(DEFAULT, 1, '28246103440', 'JMJ', '2013-07-13', 'Base Aerea de Santa Cruz - Santa Cruz - Rio de Janeiro', 'Jornada mundial da juventude')
;

INSERT INTO participacao VALUES
('12345678909', 1, 6, 'Voluntario'),
('74114767223', 1, 4, 'Socorrista'),
('88884721261', 2, 5, 'Socorrista'),
('28246103440', 3, 8, 'Coordenador'),
('12345678909', 3, 6, 'Voluntario'),
('74114767223', 3, 6, 'Socorrista')
;

INSERT INTO lingua VALUES
(DEFAULT, 'Alemão','Hochdeutsch'),
(DEFAULT, 'Alemão','Schwäbisch'),
(DEFAULT, 'Alemão','Kölsch'),
(DEFAULT, 'Espanhol','Espanha'),
(DEFAULT, 'Espanhol','Argentina'),
(DEFAULT, 'Inglês','EUA'),
(DEFAULT, 'Inglês','UK'),
(DEFAULT, 'Inglês','África do Sul')
;

INSERT INTO fala VALUES
('12345678909',6,'fluente'),
('28246103440',6,'medio'),
('28246103440',1,'iniciante'),
('74114767223',4,'fluente'),
('04257774720',8,'medio'),
('41568633360',5,'iniciante')
;


