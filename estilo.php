<?php
require_once "DB.php";

class estilo
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
    public function addEstilo()
    {
        $sql = "INSERT INTO estilo (identificacao) VALUES ('$this->nome')";
        $db = new DB();
        $resultado = $db->executar($sql);
        if ($resultado == 1) {
            return true;
        } else {
            return false;
        }
    }
    public static function listarestilos()
    {
        $sql = "SELECT * FROM estilo";
        $db = new DB();
        $resultado = $db->search($sql);
        if ($resultado) {
            return $resultado;
        } else {
            return false;
        }
    }
    public function listarEstilo($id){
        $sql = "SELECT identificacao FROM estilo WHERE idEstilo = $id";
        $db = new DB();
        $resultado = $db->search($sql);
        if ($resultado) {
            return $resultado;
        } else {
            return false;
        }
    }
}
