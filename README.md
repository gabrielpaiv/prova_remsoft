# Objetivo
### Criar um sistema de “Daily task” onde será adicionado as tarefas a serem feitas do dia (podendo alterar e excluir elas) e ir marcando como feita.
- Criar uma tela PHP para inserir uma grid das tarefas cadastradas, na grid, pode marcar a tarefa como feita, alterar e excluir a tarefa. 
- Ao clicar em alterar, abrir outra tela em PHP com os dados da tarefa para alterar. 
- Ao excluir uma tarefa, exibir uma confirmação para o usuário confirmar a exclusão e caso confirme, fazer uma exclusão lógica no banco de dados;
- Ao marcar a tarefa como feita, deve alterar no banco de dados e mudar o botão para desmarcar a tarefa;
- Na tela PHP da grid, criar um botão para inserir uma tarefa. Ao clicar nela, enviar para a tela de inserção da tarefa (usar a mesma tela onde altera a tarefa);

## Tecnologias a ser usada
- PHP (Puro ou algum framework MVC)
- HTML (HTML ou HTML5)
- CSS (CSS/CSS3/SCSS)
- JavaScript (Puro/JQuery /Ajax/Angular)
- MySQL

#### OBS.: No banco de dados, criar:
##### Database: prova_remsoft
##### Tabela: tarefa
##### Campos: id (int 11 – PK - AUTO INCREMENTAL), descrição (varchar 255), finalizado (tinyint 1), dt_finalizado (datetime), dt_criacao (datetime), dt_ult_alt (datetime), excluído (tinyint 1)



 
