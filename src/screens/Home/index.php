<?php
require_once '../../database/Read.php';
require_once '../../database/crud.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>To-Do</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
    <div class="main">
        <div class="adicionar">
            <button type="button" data-toggle="modal" data-target="#modal" data-descricao="" data-id="" data-act="Adicionar Tarefa">Adicionar Tarefa</button>
        </div>
        <div class="listar-tarefas">
            <?php
            $read = new Read();
            $tarefas = $read->read();
            ?>
            <?php if ($tarefas->num_rows <= 0) { ?>
                <div class="tarefa">
                    <div class="vazia">
                        <h1>Você não tem tarefas!</h1>
                    </div>
                </div>
            <?php } ?>

            <?php while ($row = $tarefas->fetch_assoc()) { ?>
                <div class="tarefa">
                    <form method="POST" action="../../database/crud.php">
                        <input name="id" type="hidden" value="<?php echo $row['id']; ?>">
                        <input name="request" type="hidden" value="delete">
                        <button type="submit" class="remover-tarefa" onclick="return confirm('Deseja mesmo excluir a tarefa?');">x</button>
                    </form>
                    <?php if ($row['finalizado'] == "1") { ?>
                        <form method="POST" action="../../database/crud.php">
                            <input name="id" type="hidden" value="<?php echo $row['id']; ?>">
                            <input name="request" type="hidden" value="finalizar">
                            <button type="submit" class="checkButton">✓</button>
                        </form>
                        <h2 class="finalizado"><?php echo $row['descricao'] ?></h2>
                        <small>Finalizado em: <?php echo $row['dt_finalizado'] ?></small>

                    <?php } else { ?>

                        <form method="POST" action="../../database/crud.php">
                            <input name="id" type="hidden" value="<?php echo $row['id']; ?>">
                            <input name="request" type="hidden" value="finalizar">
                            <button type="submit" class="checkButton"></button>
                        </form>
                        <button type="button" class="edit" data-toggle="modal" data-target="#modal" data-descricao="<?php echo $row['descricao'] ?>" data-id="<?php echo $row['id']; ?>" data-act="Atualizar Tarefa"><?php echo $row['descricao'] ?></button>
                        <small>Criado em: <?php echo $row['dt_criacao'] ?> <br> Última alteração: <?php echo $row['dt_ult_alt'] ?> </small>

                    <?php } ?>
                </div>
            <?php } ?>
        </div>


        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="../../database/crud.php">
                            <div class="form-group">
                                <label for="descricao" class="col-form-label">Descrição:</label>
                                <input name="descricao" type="text" class="form-control" id="descricao">
                                <input name="id" type="hidden" id="id_tarefa">
                                <input name="request" type="hidden" id="request">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary" id="tipoBotao">Atualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script type="text/javascript">
        $('#modal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var tipo = button.data('act')
            var descricaoTarefa = button.data('descricao')
            var idTarefa = button.data('id')
            var modal = $(this)
            modal.find('.modal-title').text(tipo)
            modal.find('#id_tarefa').val(idTarefa)
            modal.find('#descricao').val(tipo == "Atualizar Tarefa" ? descricaoTarefa : '')
            modal.find('#request').val(tipo == "Atualizar Tarefa" ? 'update' : 'create')
            modal.find('#tipoBotao').text(tipo == "Atualizar Tarefa" ? 'Atualizar' : 'Criar')
        })
    </script>
</body>

</html>