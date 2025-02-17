<?php 

class Database{

    private $hostname='localhost';
    private $username='root';
    private $password='';
    private $database ='todo_app_mysql_oop';

    public $con;


    public function connect(){
        $this->con=null;
        try{
            $this->con =new mysqli($this->hostname, $this->username, $this->password, $this->database);
            if($this->con->connect_error){
                die("Conexiune esuata" . $this->con->connect_error);
            }
           

        }catch(Exception $error){
            echo "Eroare conexiune" . $error->getMessage();

        }
        return $this->con;
    }
}


?>