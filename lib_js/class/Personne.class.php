<?php
Class Personne{


    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $news_letter;

    private $pdo;

    public function __construct($id = null){
        $this->pdo = new PDO('mysql:dbname=' . BASE_NAME . ';host=' . SQL_HOST, SQL_USER, SQL_PASSWORD,
                            array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
        if($id){
            $this->set_id($id);
            $this->init();
        }
    }


    public function init(){
        $query = "SELECT * FROM t_personnes WHERE id_per=:id_per";
        try{
            $stmt = $this->pdo->prepare($query);
            $args[':id_per'] = $this->get_id();
            $stmt->execute($args);
            $tab = $stmt->fetch();

            $this->set_nom($tab['nom_per']);
            $this->set_prenom($tab['prenom_per']);
            $this->set_email($tab['email_per']);
            $this->set_password($tab['password_per']);
            $this->set_news_letter($tab['news_letter_per']);
            return true;
        }catch (Exception $e){
            return false;
        }
    }


    public function __toString(){
        $str = "<pre>";
        $str .= "\nnom = " . $this->get_nom();
        $str .= "\nprénom = " .$this->get_prenom();
        $str .= "\nemail = " .$this->get_email();
        $str .= "\npassword = " .$this->get_password();
        $str .= "\nnews_letter = " .$this->get_news_letter();
        $str .= "</pre>";
        return $str;
    }

    public function check_login($email, $password){
        $query = "SELECT id_per,password_per FROM t_personnes WHERE email_per=:email LIMIT 1";
        try{
            $stmt = $this->pdo->prepare($query);
            $args[':email'] = $email;
            $stmt->execute($args);
            $tab = $stmt->fetch();
            if(password_verify($password,$tab['password_per'])){
                $_SESSION['id'] = $tab['id_per'];
                $user_browser_ip = $_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'];
                $_SESSION['login_string'] = password_hash($tab['password_per'].$user_browser_ip, PASSWORD_DEFAULT);
                $_SESSION['email'] = $email;
            }else{
                return false;
            }
        }   catch (Exception $e){
            return false;
        }

    }






    public function add($tab){
        $this->gen_password($tab['password']);


        $args['nom_per'] = $tab['nom_per'];
        $args['prenom_per'] = $tab['prenom_per'];
        $args['email_per'] = $tab['email_per'];
        $args['password_per'] = $this->get_password();
        $args['news_letter_per'] = $tab['news_letter'];

        $query = "INSERT INTO t_personnes SET "
            . "nom_per = :nom_per, "
            . "prenom_per = :prenom_per, "
            . "password_per = :password_per, "
            . "email_per = :email_per, "
            . "news_letter_per = :news_letter_per";

        try{
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($args);
            return $this->pdo->lastInsertId();
        } catch (Exception $e){
            echo $e;
            return false;
        }

    }

    public function check_email($email){
        $query = "SELECT * FROM t_personnes WHERE email_per = :email LIMIT 1";
        try{
            $stmt = $this->pdo->prepare($query);
            $args[':email'] = $email;
            $stmt->execute($args);
            $tab = $stmt->fetch();
            if($tab != null){
                return true;
            }else{
                return false;
            }
        } catch (Exception $e){
            return false;
        }
    }

    public function gen_password($password){
        $this->set_password(password_hash($password, PASSWORD_DEFAULT));
    }

    public function check_connect(){
        if(isset($_SESSION['id'],$_SESSION['email'], $_SESSION['login_string'])){
            $user_browser_ip = $_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'];
            if(password_verify($this->get_password().$user_browser_ip,$_SESSION['login_string'])){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }


    public function set_nom($nom){
        $this->nom = $nom;
    }

    public function get_nom(){
        return $this->nom;
    }

    public function set_id($id){
        $this->id = $id;
    }

    public function get_id(){
        return $this->id;
    }

    public function set_prenom($prenom){
        $this->prenom = $prenom;
    }

    public function get_prenom(){
        return $this->prenom;
    }

    public function set_email($email){
        $this->email = $email;
    }

    public function get_email(){
        return $this->email;
    }

    public function set_password($password){
        $this->password = $password;
    }

    public function get_password(){
        return $this->password;
    }


    public function set_news_letter($news_letter){
        $this->news_letter = $news_letter;
    }

    public function get_news_letter(){
        return $this->news_letter;
    }
}
?>