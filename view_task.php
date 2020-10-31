<?php

// get ID of the product to be read
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
  
// include database and object files
include_once 'config/database.php';
include_once 'objects/task.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare objects
$task = new Task($db);
  
// set ID property of task to be read
$task->id = $id;
  
// read the details of task to be read
$task->readOne();

// set page headers
$page_title = "View Task";
include_once "header.php";
  
// display task details
echo "<table class='table table-striped table-borderless'>";
echo "<tbody>";
    echo '<tr class="table-success">';
    echo "<td>Name</td>";
    echo "<td>{$task->name}</td>";
    echo "</tr>";

    echo '<tr class="table-danger">';
    echo "<td>Due Date</td>";
    echo "<td>{$task->due_date}</td>";
    echo "</tr>";

    echo '<tr class="table-info">';
    echo "<td>Description</td>";
    echo "<td>{$task->description}</td>";
    echo "</tr>";

    echo '<tr class="table-warning">';
    echo "<td>Created At</td>";
    echo "<td>{$task->created_at}</td>";
    echo "</tr>";
echo "</tbody>";
echo "</table>";
  
// set footer
include_once "footer.php";
?>