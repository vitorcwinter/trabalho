<?php
require_once "DB.php";

class cd
{

    private int $id;
    public function __construct(private string $titulo, private int $ano, private int $Idartista, private int $Idgravadora, private int $Idestilo)
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
    public function  getTitulo(): string
    {
        return $this->titulo;
    }
    public function setTitulo(string $titulo)
    {
        $this->titulo = $titulo;
    }
    public function getAno(): int {
        return $this->ano;
    }
    public function setAno(int $ano){
        $this->ano = $ano;
    }
    public function getIdartista(): int {
        return $this->Idartista;
    }
    public function setIdartista(int $Idartista){
        $this->Idartista = $Idartista;
    }
    public function getIdgravadora(): int {
        return $this->Idgravadora;
    }
    public function setIdgravadora(int $Idgravadora){
        $this->Idgravadora = $Idgravadora;
    }
    public function getIdestilo(): int {
        return $this->Idestilo;
    }
    public function setIdestilo(int $Idestilo){
        $this->Idestilo = $Idestilo;
    }


    public function addCD()
    {
        $sql = "INSERT INTO cd (titulo,ano,artista_idArtista,gravadora_idGravadora,estilo_idEstilo) VALUES ('$this->titulo','$this->ano','$this->Idartista','$this->Idgravadora','$this->Idestilo')";
        $db = new DB();
        $resultado = $db->executar($sql);
        if ($resultado == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function pesquisar()
    {
        $sql = "SELECT * FROM cd WHERE";
        $addTitle='';
        $addYear='';
        $addArtista='';
        $addGravadora='';
        $addEstilo='';
        if($this->titulo != ''){
            $addTitle = "titulo = '$this->titulo' AND ";
        }
        if($this->ano != ''){
            $addYear = "ano = '$this->ano' AND ";
        }
        if($this->artista_idArtista != ''){
            $addArtista = "artista_idArtista = '$this->Idartista' AND ";
        }
        if($this->gravadora_idGravadora != ''){
            $addGravadora = "gravadora_idGravadora = '$this->Idgravadora' AND ";
        }
        if($this->estilo_idEstilo != ''){
            $addEstilo = "estilo_idEstilo = '$this->Idestilo' AND ";
        }
        $sql = $sql .$addTitle;
        $sql = $sql .$addYear;
        $sql = $sql .$addArtista;
        $sql = $sql .$addGravadora;
        $sql = $sql .$addEstilo;
        $db = new DB();
        $resultado = $db->search($sql);
        if ($resultado) {
            return $resultado;
        } else {
            return false;
        }
    }
}