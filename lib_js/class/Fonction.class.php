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
            $this->init();
        }
    }

    public function init()
    {
        $query = "SELECT * FROM t_fonctions WHERE id_fnc=:id_fnc";
        try {
            $stmt = $this->pdo->prepare($query);
            $args[':id_fnc'] = $this->get_id();
            $stmt->execute($args);
            $tab = $stmt->fetch();

            $this->set_nom($tab['nom_fnc']);
            $this->set_abreviation($tab['abr_fnc']);
            $this->set_Description($tab['desc_fnc']);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function add($tab){
        $args['nom_fnc'] = $tab['nom_fnc'];
        $args['abr_fnc'] = $tab['abr_fnc'];
        $args['desc_fnc'] = $tab['desc_fnc'];

        $query = "INSERT INTO t_fonctions SET "
            . "nom_fnc = :nom_fnc, "
            . "abr_fnc = :abr_fnc, "
            . "desc_fnc = :desc_fnc";

        try{
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($args);
            return $this->pdo->lastInsertId();
        }catch (Exception $e){
            echo $e;
            return false;
        }
    }

    public function check_abr($abr){
        $query = "SELECT * FROM t_fonctions WHERE abr_fnc = :abr LIMIT 1";
        try{
            $stmt = $this->pdo->prepare($query);
            $args[':abr'] = $abr;
            $stmt->execute($args);
            $tab = $stmt->fetch();
            if($tab != null){
                return true;
            }else{
                return false;
            }
        }catch (Exception $e){
            return false;
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