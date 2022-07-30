<?php
require_once "DB.php";

class artista
{

    private int $id;
    public function __construct(private string $nome)
    {
    }
    public function  getId(): int
    {
        return $this->id;
    }
    public function setId(int $id)
    {
        $this->id = $id;
    }
    public function  getNome(): string
    {
        return $this->nome;
    }
    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }
    public function addArtista()
    {
        $sql = "INSERT INTO artista (nome) VALUES ('$this->nome')";
        $db = new DB();
        $resultado = $db->executar($sql);
        if ($resultado == 1) {
            return true;
        } else {
            return false;
        }
    }
    public static function listarartistas()
    {
        $sql = "SELECT * FROM artista";
        $db = new DB();
        $resultado = $db->search($sql);
        if ($resultado) {
            return $resultado;
        } else {
            return false;
        }
    }
    public function listarArtista($id)
    {
        $sql = "SELECT nome FROM artista WHERE idArtista = $id";
        $db = new DB();
        $resultado = $db->search($sql);
        if ($resultado) {
            return $resultado;
        } else {
            return false;
        }
    }
}
