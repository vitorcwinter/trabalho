<?php
require_once "DB.php";

class cd
{

    private int $id;
    public function __construct(private string $titulo, private $ano = null, private $Idartista, private  $Idgravadora, private  $Idestilo)
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
        $sql = "SELECT * FROM cd";
        $addTitle='';
        $addYear='';
        $addArtista='';
        $addGravadora='';
        $addEstilo='';
        if($this->titulo != ''){
            $addTitle = " WHERE titulo = {$this->titulo} ";
            $sql = $sql .$addTitle;
        }
        if($this->ano != ''){
            if($addTitle != ''){
                $addYear = " AND ano = {$this->ano} ";    
            } else{
                $addYear = " WHERE ano = {$this->ano} ";
            }
            $sql = $sql .$addYear;
        }
        if($this->Idartista != ''){
            if($addTitle != ''){
                $addArtista = " AND artista_idArtista = {$this->Idartista}";
            } elseif($addYear != ''){
                $addArtista = " AND artista_idArtista = {$this->Idartista}";
            } else{
                $addArtista = " WHERE artista_idArtista = {$this->Idartista}";
            }

            $sql = $sql .$addArtista;
            
        }
        if($this->Idgravadora != ''){
            if($addTitle!=''){
                $addGravadora = " AND gravadora_idGravadora = {$this->Idgravadora} ";    
            } elseif($addYear=''){
                $addGravadora = " AND gravadora_idGravadora = {$this->Idgravadora} ";
            } elseif($addArtista!=''){
                $addGravadora = " AND gravadora_idGravadora = {$this->Idgravadora} ";
            } else{
                $addGravadora = " WHERE gravadora_idGravadora = {$this->Idgravadora} ";
            }
            $sql = $sql .$addGravadora;
            
        }
        if($this->Idestilo != ''){
            if($addTitle!=''){
                $addEstilo = " AND estilo_idEstilo = {$this->Idestilo} ";
            } elseif($addYear!=''){
                $addEstilo = "AND estilo_idEstilo = {$this->Idestilo} ";
            } elseif($addArtista!=''){
                $addEstilo = "AND estilo_idEstilo = {$this->Idestilo} ";
            } elseif($addGravadora!=''){
                $addEstilo = "AND estilo_idEstilo = {$this->Idestilo} ";
            } else{
                $addEstilo = " WHERE estilo_idEstilo = {$this->Idestilo} ";

            }
            $sql = $sql .$addEstilo;
            
        }
        if($sql != "SELECT * FROM cd"){
            $db = new DB();
            $resultado = $db->search($sql);
            if ($resultado) {
                return $resultado;
            } else {
                return false;
            }
        } else{
            $sql = "SELECT * FROM  cd";
            $db = new DB();
            $resultado = $db->search($sql);
            if ($resultado) {
                return $resultado;
            } else {
                return false;
            }
        }
        }
        
}