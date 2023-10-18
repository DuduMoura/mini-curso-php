<?php
class DB {

    private $conexao;

    function __construct()
    {
        try {
            $this->conexao = new PDO('mysql:host=localhost;dbname=miniCurso', 'root', '');
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getCursos()
    {
        $consulta = $this->conexao->query("SELECT * FROM cursos");
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

}