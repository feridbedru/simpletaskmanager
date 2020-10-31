<?php
// set page header
$page_title = "Task List";
include_once "header.php";

// include database and object files
include_once 'config/database.php';
include_once 'objects/task.php';
  
// instantiate database and objects
$database = new Database();
$db = $database->getConnection();
  
$task = new Task($db);
  
// query tasks
$stmt = $task->readAll();
$num = $stmt->rowCount();

// display the tasks if there are any
if($num>0){
    echo '<div class="card-columns">';
    echo '
        <div class="card border-success mb-3">
        <div class="card-body">
          <p class="card-text text-center">
          <a href="create_task.php">
            <span class="fa fa-plus fa-5x text-success" aria-hidden="true"></span>
          </a>
          </p>
        </div>
          <div class="card-footer">
          <a href="create_task.php" class="btn btn-success text-center d-block">Create Task</a>
        </div>
      </div>';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $dt = new DateTime($created_at);
        $a = $dt->format('Ymd');
        $b= $dt->format('hms');
        $start = $a.'T'.$b.'Z';
        $dt = new DateTime($due_date);
        $c = $dt->format('Ymd');
        $d= $dt->format('hms');
        $end = $c.'T'.$d.'Z';
        echo '
        <div class="card border-primary mb-3">
        <div class="card-header bg-transparent border-primary h3">'.$name.'</div>
        <div class="card-body">
          <p class="card-text">Due Date: '.$due_date.'</p>
          <p class="card-text">'.$description.'</p>
          
        </div>
          <div class="card-footer row mx-auto ">
          <div class="col-md-4">
          <a href="view_task.php?id='.$id.'" class="btn btn-success">View</a>
          </div>
          <div class="col-md-4">
          <a href="https://outlook.live.com/owa/?path=/calendar/action/compose#subject='.$name.'&body='.$description.'&startdt='.$start.'&enddt='.$end.'" target="_blank" class="btn btn-warning">Outlook</a>
          </div>
          <div class="col-md-4">
          <a href="https://www.google.com/calendar/render?action=TEMPLATE&amp;text='.$name.'&amp;dates='.$start.'/'.$end.'&amp;details='.$description.'&amp;location=&amp;sprop=&amp;sprop=name:" target="_blank" class="btn btn-primary">Google</a>
          </div>
        </div>
      </div>';
    }
    echo '</div>';
}
else{
    echo "<div class='alert alert-info'>No tasks found.</div>";
    echo '<div class="card-columns">';
    echo '
        <div class="card border-success mb-3">
        <div class="card-body">
          <p class="card-text text-center">
          <a href="create_task.php">
            <span class="fa fa-plus fa-5x text-success" aria-hidden="true"></span>
          </a>
          </p>
        </div>
          <div class="card-footer">
          <a href="create_task.php" class="btn btn-success text-center d-block">Create Task</a>
        </div>
      </div>';
}

// set page footer
include_once "footer.php";
?>