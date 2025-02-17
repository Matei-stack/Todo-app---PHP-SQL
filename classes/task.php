<?php 

class Task {

private $con;
private $table = 'tasks';
public $id;
public $task;
public $is_completed;

public function __construct($db){
    $this->con=$db;
}

public function create(){
    $query = "INSERT INTO " . $this->table . "(task) VALUES (?)";
    $stmt = $this-> con->prepare($query);
    $stmt->bind_param("s", $this->task);
    return $stmt ->execute();
}

public function read(){

    $query = "SELECT * FROM " . $this->table . " ORDER BY created_at DESC";
    $result= $this->con->query($query);
    return $result;
}

public function complete($id){
   //$query = "UPDATE" . $this->table . "SET is_completed = 1";
   $query = "UPDATE " . $this->table . " SET is_completed = 1 WHERE id = ?";
   $stmt = $this->con->prepare($query);
   $stmt->bind_param("i", $id);
   return $stmt->execute();
}
public function undoComplete($id){
    //$query = "UPDATE" . $this->table . "SET is_completed = 1";
    $query = "UPDATE " . $this->table . " SET is_completed = 0 WHERE id = ?";
    $stmt = $this->con->prepare($query);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
 }
 public function delete($id){
    //$query = "UPDATE" . $this->table . "SET is_completed = 1";
    $query = "DELETE FROM " . $this->table . " WHERE id = ?";
    $stmt = $this->con->prepare($query);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
 }
}

?>