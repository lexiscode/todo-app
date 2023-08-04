<?php

/*
require "./models/database/DbConnect.php";
require "./models/ManipulateData.php";
*/

use TodoApp\Models\Database\DbConnect;
use TodoApp\Models\ManipulateData;


// connect to the database server
$conn = new DbConnect();
$conn->getConn();

// READING or RETRIEVING from the database to get specific article post by their ids
if (isset($_GET['id'])){

    $id = htmlspecialchars($_GET['id']);

    // checks if the article's id exits in the database, then returns an associative array, which stores in $article variable
    $todo_data = ManipulateData::getDataById($conn, $id); 

    if (!$todo_data){
        // if a non-existing id number is in the link
        die("Invalid ID. No data found");
    }

} else {
    // if no id is in the link
    die("ID not supplied. No data found");
}


$update_todo_data = new ManipulateData();

// REPEAT VALIDATION, no need declaring $title, $content, or $date_published variables again here
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if the save/submit button has been clicked, and check if the fields ain't empty also
    if (isset($_POST['updateTask'])){
        if (!empty($_POST['task']) && !empty($_POST['due_date'])){

            // getting fields contents, then checking for possible empty fields
            $id = htmlspecialchars($todo_data->id);
            $update_todo_data->task_message = filter_input(INPUT_POST, 'task');
            $update_todo_data->task_date = filter_input(INPUT_POST, 'due_date');

            // UPDATE PDO query
            $result = $update_todo_data->updateData($conn, $id);

            if ($result){
            
                header("Location: /todo-app/"); 
                exit;
            }
            
        }
    }
}

require "./views/edit_task.view.php";
