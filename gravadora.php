<?php
require_once "DB.php";

class gravadora
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
    public function addGravadora()
    {
        $sql = "INSERT INTO gravadora (identificacao) VALUES ('$this->nome')";
        $db = new DB();
        $resultado = $db->executar($sql);
        if ($resultado == 1) {
            return true;
        } else {
            return false;
        }
    }
    public static function listargravadoras()
    {
        $sql = "SELECT * FROM gravadora";
        $db = new DB();
        $resultado = $db->search($sql);
        if ($resultado) {
            return $resultado;
        } else {
            return false;
        }
    }
    public function listarGravadora($id)
    {
        $sql = "SELECT identificacao FROM gravadora WHERE idGravadora = $id";
        $db = new DB();
        $resultado = $db->search($sql);
        if ($resultado) {
            return $resultado;
        } else {
            return false;
        }
    }
}
