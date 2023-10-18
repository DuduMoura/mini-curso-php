<?php
if (isset($_POST['excluir'])) {
    $id = $_POST['id'];
    $minhaLista = $_SESSION['lista'];
    $minhaNovaListaSemOItemExcluido = array_filter($minhaLista, function ($item) use ($id) {
        return $item->id != $id;
    });
    $_SESSION['lista'] = $minhaNovaListaSemOItemExcluido;
}