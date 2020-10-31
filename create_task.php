<?php
// include database and object files
include_once 'config/database.php';
include_once 'objects/task.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// pass connection to objects
$task = new Task($db);

// set page headers
$page_title = "Create Task";
include_once "header.php"; 
?>
<?php 
if($_POST){
  
    // set task property values
    $task->name = $_POST['name'];
    $task->description = $_POST['description'];
    $task->due_date = $_POST['due_date'];
  
    // create the task
    if($task->create()){
        echo "<div class='alert alert-success alert-dismissible'>Task ".$task->name." was created successfully.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
    }
  
    // if unable to create the task, tell the user
    else{
        echo "<div class='alert alert-danger alert-dismissible'>Unable to create task".$task->name.".
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
    }
}
?>
<!-- create task form -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="name">Task Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Task Name" required>
        </div>
        <div class="form-group col-md-6">
            <label for="due_date">Due Date</label>
            <input type="date" class="form-control" id="due_date" name="due_date" min=""<?php echo date('Y'); ?>" required>
        </div>
    </div>
    <div class="form-group">
        <label for="description">Task Description</label>
        <textarea class="form-control ckeditor" id="description" name="description" placeholder="Enter your detailed task description here" rows="7"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
    <button type="reset" class="btn btn-secondary" value="Reset">Reset</button>
</form>
<script>
var today = new Date().toISOString().split('T')[0];
document.getElementsByName("due_date")[0].setAttribute('min', today);
</script>
<?php
  
// footer
include_once "footer.php";
?>