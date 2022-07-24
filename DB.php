<?php
define("HOST","localhost");
define("DB_NAME","cds");
define("DB_USER","root");
define("DB_PASSWORD","");

class DB{
    
    public $conect;

    public function __construct(){
        $this->conect = new mysqli(HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if ($this->conect->connect_errno) {
            echo "Falha ao conectar no MySQL: " . $this->conect->connect_error;
        }
    }

    public function search(string $consulta){
        $resultado = $this->conect->query($consulta);
        $dados = array();
        while($linha = $resultado->fetch_assoc()){
            $dados[] = $linha;
        }
        return $dados;
    }

    public function executar(string $fazer){
        $resultado = $this->conect->query($fazer);
        return $resultado;
    }
}

?>