<?php
if (isset($_POST['adicionar'])) {
    if (!isset($_SESSION['lista'])) {
        $_SESSION['lista'] = array();
    }
    $id = $_POST['id'];

    $cursoEncontrado = array_filter($cursos, function ($curso) use ($id) {
        return $curso->id == $id;
    });
    $_SESSION['lista'][] = array_shift($cursoEncontrado);
}