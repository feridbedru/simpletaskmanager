<?php
class Task{
    // database connection and table name
    private $conn;

    // object properties
    public $id;
    public $name;
    public $description;
    public $due_date;
    public $is_completed;
    public $created_at;

    public function __construct($db){
        $this->conn = $db;
    }

    // create task
    function create(){
        $query = "INSERT INTO tasks SET name=:name, description=:description, due_date=:due_date, created_at=:created_at";
        $stmt = $this->conn->prepare($query);

        // clean input
        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        // posted values
        $this->name = test_input($_POST["name"]);
        $this->description = test_input($_POST["description"]);
        $this->due_date = $_POST["due_date"];
        $this->created_at = date('Y-m-d H:i:s');

        // bind values 
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":due_date", $this->due_date);
        $stmt->bindParam(":created_at", $this->created_at);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    // read all data on the database
    function readAll(){
        $query = "SELECT id, name, description, due_date, created_at FROM tasks ORDER BY due_date ASC";
      
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
      
        return $stmt;
    }

    // read a single record from the database
    function readOne(){
  
        $query = "SELECT * FROM tasks WHERE id = ?";
      
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
      
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
      
        $this->name = $row['name'];
        $this->description = $row['description'];
        $this->due_date = $row['due_date'];
        $this->created_at = $row['created_at'];
        $this->is_completed = $row['is_completed'];
    }
}
?>