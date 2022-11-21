CREATE DATABASE agenda;
USE agenda;

CREATE TABLE pessoas (
  `id_pessoa` int UNSIGNED NOT NULL COMMENT 'chave primária',
  `ds_nome` varchar(255) NOT NULL COMMENT 'nome',
  `cd_sexo` varchar(1) NOT NULL COMMENT 'sexo: M, F, N',
  `dt_nasc` date NOT NULL COMMENT 'Data de nascimento',
  `nr_telefone` decimal(11,0) NOT NULL COMMENT 'Nr telefone com DDD (apenas dígitos)',
  `ds_email` varchar(255) NOT NULL COMMENT 'E-mail',
  PRIMARY KEY (id_pessoa))
  ENGINE = InnoDB default charset=utf8mb4;

ALTER TABLE pessoas
modify id_pessoa int unsigned not null 
auto_increment comment 'chave primária', auto_increment = 001; 
commit;

INSERT INTO pessoas (ds_nome, cd_sexo, dt_nasc, nr_telefone, ds_email) VALUES
('Ana Alves', 'F', '2001-01-11', '61987650001', 'ana.alves@gmail.com'),
('Bruno Bolacchi', 'M', '2002-02-22', '61987650002', 'bruno.bolacchi@hotmail.com'),
('Cris Campos', 'N', '2003-03-13', '61987650003', 'cris.campos@gmail.com');

