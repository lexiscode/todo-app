<?php

/*
require "./models/database/DbConnect.php";
require "./models/ManipulateData.php";
*/

use TodoApp\Models\Database\DbConnect;
use TodoApp\Models\ManipulateData;


// error handler function
function myErrorHandler($errno, $errstr){
    echo "<b>Error:</b> [$errno] $errstr";
}
// set error handler function
set_error_handler("myErrorHandler");



// gets connection to database
$conn = new DbConnect();
$conn->getConn();


// defining the variables
$task_message = '';
$task_date = '';


$todo_data = new ManipulateData();

// Add New Todo Task Message
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (isset($_POST['addTask'])){
        if (!empty($_POST['task']) && !empty($_POST['due_date'])){

            // getting fields contents, then checking for possible empty fields
            $todo_data->task_message = filter_input(INPUT_POST, 'task');
            $todo_data->task_date = filter_input(INPUT_POST, 'due_date');

            // INSERT into the database
            $results = $todo_data->newData($conn);

            // checking for errors, if none, then redirect the user to the new article page
            if ($results){
                
                // it is more advisable to use absolute paths below than relative path
                header("Location: /todo-app/"); 
                exit;
            }
        
        }else{
            $error = "No fields must be left empty.";
        }
    }
 
}


// Read Todo data from database
$all_todos = ManipulateData::getAll($conn);


//Clear All todos 
if(isset($_POST['clear_all'])) {
    
    $result = ManipulateData::clearAll($conn);

    if($result){

        header("Location: /todo-app/");
        exit;
    }

}


// DELETE a task from the table
if (isset($_GET['id'])){

    $id = htmlspecialchars($_GET['id']);

    $result = $todo_data->deleteData($conn, $id);

    if ($result){

        header("Location: /todo-app/"); 
        exit;
    }
}
   
require "views/index.view.php";
