CREATE SCHEMA `prova_remsoft`;

CREATE TABLE `prova_remsoft`.`tarefa` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(255) NULL,
  `finalizado` TINYINT(1) NULL,
  `dt_finalizado` DATETIME NULL,
  `dt_criacao` DATETIME NULL,
  `dt_ult_alt` DATETIME NULL,
  `excluido` TINYINT(1) NULL,
  PRIMARY KEY (`id`));
)

SELECT * FROM Tasks;