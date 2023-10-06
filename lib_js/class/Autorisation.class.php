<?php

Class Autorisation{

    private $id;

    private $nom;

    private $code;

    private $desc;


    private $pdo;



    public function __construct($id = null){
        $this->pdo = new PDO('mysql:dbname=' . BASE_NAME . ';host=' . SQL_HOST, SQL_USER, SQL_PASSWORD,
                            array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
        if($id){
            $this->set_id($id);
        }
    }

    public function init(){
        $query = "SELECT * FROM t_autorisations WHERE id_aut=:id_aut";
        try{
            $stmt = $this->pdo->prepare($query);
            $args[':id_aut'] = $this->get_id();
            $stmt->execute($args);
            $tab = $stmt->fetch();

            $this->set_nom($tab['nom_aut']);
            $this->set_code($tab['code_aut']);
            $this->set_desc($tab['desc_aut']);
            return true;
        }catch (Exception $e){
            return false;
        }
    }

    public function addA($tab){
        $args['nom_aut'] = $tab['nom_aut'];
        $args['code_aut'] = $tab['code_aut'];
        $args['desc_aut'] = $tab['desc_aut_a'];

        $query = "INSERT INTO t_autorisations SET "
            . "nom_aut = :nom_aut, "
            . "code_aut = :code_aut, "
            . "desc_aut = :desc_aut_a";

        try{
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($args);
            return $this->pdo->lastInsertId();
        }catch (Exception $e){
            echo $e;
            return false;
        }
    }

    public function addU($tab){
        $args['nom_aut'] = $tab['nom_aut'];
        $args['code_aut'] = $tab['code_aut'];
        $args['desc_aut'] = $tab['desc_aut_u'];

        $query = "INSERT INTO t_autorisations SET "
            . "nom_aut = :nom_aut, "
            . "code_aut = :code_aut, "
            . "desc_aut = :desc_aut_u";

        try{
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($args);
            return $this->pdo->lastInsertId();
        }catch (Exception $e){
            echo $e;
            return false;
        }
    }

    public function check_code($code){
        $query = "SELECT * FROM t_autorisations WHERE code_aut = :code LIMIT 1";
        try{
            $stmt = $this->pdo->prepare($query);
            $args[':code'] = $code;
            $stmt->execute($args);
            $tab = $stmt->fetch();
            if($tab != null){
                return true;
            }else{
                return false;
            }
        }catch(Exception $e){
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

    public function set_code($code){
        $this->code = $code;
    }
    public function get_code(){
        return $this->code;
    }
    public function set_desc($desc){
        $this->desc = $desc;
    }
    public function get_desc(){
        return $this->desc;
    }

}



?>