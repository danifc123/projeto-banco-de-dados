-- Inserir 10 registros para a tabela "Aluno" com cidades variadas
CREATE DATABASE banco_unir;

INSERT INTO aluno (matricula, nome, endereco, cidade)
VALUES
  (123, 'Daniel Silva', 'Rua A, 123', 'Santa Helena'),
  (223, 'Fernanda Santos', 'Avenida B, 456', 'Santa Helena'),
  (323, 'Rafael Lima', 'Rua C, 789', 'Rio Verde'),
  (423, 'Carolina Ferreira', 'Rua D, 321', 'Rio Verde'),
  (523, 'Lucas Oliveira', 'Avenida E, 654', 'Rio Verde'),
  (623, 'Amanda Souza', 'Rua F, 987', 'Acreúna'),
  (723, 'Pedro Barbosa', 'Avenida G, 222', 'Acreúna'),
  (823, 'Mariana Alves', 'Rua H, 555', 'Montividiu'),
  (923, 'Diego Pereira', 'Avenida I, 777', 'Montividiu'),
  (1023, 'Larissa Gomes', 'Rua J, 888', 'Montividiu');


-- Inserir registros para a tabela "Turmas"
INSERT INTO turma (COD_DISC, COD_TURMA, COD_PROF, ANO, horario)
VALUES
  ('BDS222', 1, 212131, 2020, '18H-20H'),
  ('POO201', 1, 192011, 2022, '08H-09H'),
  ('IHC207', 1, 192011, 2022, '20H-22H'),
  ('ENG203', 1, 122135, 2022, '10H-11H'),
  ('BDS222', 3, 212131, 2022, '18H-20H'),
  ('BDS222', 2, 212131, 2022, '20H-22H');
  
  INSERT INTO universidade.professor (COD_PROF, nome, endereco, cidade)
VALUES
    (212131, 'Nickerson Pires', 'Rua Manaíra', 'Santa Helena'),
    (122135, 'Doralice Bezerra', 'Avenida Salgado Filho', 'Rio Verde'),
    (192011, 'Teodoro Oliveira', 'Avenida Roberto Freire', 'Montividiu');

INSERT INTO universidade.turma (COD_DISC, COD_TURMA, COD_PROF, ANO, horario)
VALUES
    ('BDS222', 1, 212131, 2020, '18H-20H'),
    ('POO201', 1, 192011, 2022, '08H-09H'),
    ('IHC207', 1, 192011, 2022, '20H-22H'),
    ('ENG203', 1, 122135, 2022, '10H-11H'),
    ('BDS222', 3, 212131, 2022, '18H-20H'),
    ('BDS222', 2, 212131, 2022, '20H-22H');

