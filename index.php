<?php 
session_start();
require_once('db.php');

$db = new DB();
$cursos = $db->getCursos();

require_once('adicionaCarrinho.php');

require_once('removeCarrinho.php');

require_once('pedidoWhatsapp.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Lista de tarefas</title>
    <style>
        input {
            width: 100%;
            border-radius: 10px;
            border-color: #010101;
        }
        button {
            width: 100%;
            border-radius: 4px;
            border-color: #888;
        }
        li {
            display: flex;
            width: 100%;
            justify-content: space-between;
        }
        .excluir {
            width: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="text-center">
        <h6>Produtos</h6>
    </div>
    <div class="d-flex row justify-content-center">
        <?php foreach ($cursos as $curso): ?>
            <div class="card col-md-3" style="width: 18rem;">
                <img src="<?= $curso->imagem ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $curso->nome ?></h5>
                    <form action="" method="POST">
                        <input type="text" hidden name="id" value="<?= $curso->id ?>">
                        <button type="submit" name="adicionar" class="btn btn-primary">Adicionar</button>
                    </form>
                </div>
                </div>
        <?php endforeach ?>
        </div>
        
        <div >
            <h6 class="text-center w-100">Carrinho</h6>
            <ul class="list-group">
            <?php foreach ($_SESSION['lista'] ?? [] as $item): ?>
                <li class="list-group-item d-flex justify-content-between">
                    <span>
                        ID: <?= $item->id ?> - <?= $item->nome ?><br>
                        R$ <?= $item->preco ?>
                    </span>
                    <form action="" method="POST">
                        <input type="text" hidden name="id" value="<?= $item->id ?>">
                        <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
                    </form>
                </li>
            <?php endforeach ?>
            </ul>
            
            <?php if (!empty($_SESSION['lista'])): ?>
                <form action="" method="POST">
                    <button type="submit" name="whatsapp" class="btn btn-primary">Fazer pedido</button>
                </form>
            <?php endif ?>
        </div>


    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

