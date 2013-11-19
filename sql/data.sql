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
(1, 'Rio de Janeiro', 'Praça da Cruz Vermelha, 10 - Centro - Rio de Janeiro - RJ');

INSERT INTO pessoa VALUES
('12345678909', 'Felipe Luiz', '1994-06-17', NULL, NULL, 'Av. Rio Branco 1 - Centro - Rio de Janeiro - RJ', '123456', 'SSP', 'Rio de Janeiro', 'solteiro', 'M', 'Estudante', 'ferocha@globo.com', 'A+', 'B', '97794229', NULL, 'superior incompleto', NULL)
;

INSERT INTO funcionario VALUES
('12345678909', 1, 'fulano', '1234')
;

INSERT INTO atividade VALUES
(DEFAULT, 1, '12345678909', 'Evento', '01/01/2013', 'Praça São Fulano da Silva - Centro - Rio de Janeiro', 'Ativiidade da CVB')
;

INSERT INTO participacao VALUES
('12345678909', 1, 6, 'Voluntario')
;


