<?php

Class Fonction{

    private $id;
    private $nom;
    private $abreviation;
    private $Description;
    private $pdo;


    public function __construct($id = null){
        $this->pdo = new PDO('mysql:dbname=' . BASE_NAME . ';host=' . SQL_HOST, SQL_USER, SQL_PASSWORD,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
        if($id){
            $this->set_id($id);
        }
    }

    public function set_id($id){
        $this->id = $id;
    }
    public function get_id(){
        return $this->id;
    }
    public function set_nom($nom){
        $this->nom = $nom;
    }
    public function get_nom(){
        return $this->nom;
    }
    public function set_abreviation($abreviation){
        $this->abreviation = $abreviation;
    }
    public function get_abreviation(){
        return $this->abreviation;
    }
    public function set_Description($Description){
        $this->Description = $Description;
    }
    public function get_Description(){
        return $this->Description;
    }














}
?>