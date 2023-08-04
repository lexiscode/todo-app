<?php


namespace TodoApp\Models;
use PDO;


class ManipulateData
{
    public $id;
    public $task_message;
    public $task_date;


     /**
     * Insert a new the data with its current property values
     * 
     * @param object $conn Connection to the database
     * 
     * @return boolean True if the insert was successful, false otherwise
     */
     
     public function newData($conn)
     {
             
        // Add the data into the database server
        $sql = "INSERT INTO tasks_record (task, due_date)
                VALUES (:task_message, :task_date)";
 
        // Prepares the statement for execution
        $stmt = $conn->prepare($sql);
 
        // Binds a value to a corresponding named/question-mark placeholder in the SQL statement that was used to prepare the statement. 
        $stmt->bindValue(':task_message', $this->task_message, PDO::PARAM_STR);
        $stmt->bindValue(':task_date', $this->task_date, PDO::PARAM_STR);
 
        // Executes a PDO prepared statement
        if ($stmt->execute()){
            
            return true;
        }
 
    }


    /**
     * Get all the todo tasks
     * @param object $conn Connection to the database
     * @return array An associative array of all the todo records
     */
     public static function getAll($conn)
     {
 
         // READING FROM THE DATABASE AND CHECKING FOR ERRORS
         $sql = "SELECT * 
                 FROM tasks_record
                 ORDER BY id;";
 
         // Execute the sql statement, returning a result set as a PDOStatement object
         $results = $conn->query($sql); 
 
         $data = $results->fetchAll(PDO::FETCH_ASSOC);
 
         return $data;
    }


    public static function clearAll($conn)
    {
        // SQL query to delete all data from the table
        $sql = "TRUNCATE TABLE tasks_record";

        // Execute SQL query
        $result = $conn->query($sql);

        return $result;
    }



    /**
     * Delete the current article
     * 
     * @param object $conn Connection to the database
     * 
     * @return boolean True if the delete was successful, false otherwise
     */

     public function deleteData($conn, $id)
     {
         // update the data into the database server
         $sql = "DELETE FROM tasks_record 
                 WHERE id = :id";
 
         // Prepares the statement for execution
         $stmt = $conn->prepare($sql);
 
         $stmt->bindValue(':id', $id, PDO::PARAM_INT);
 
         // Executes a PDO prepared statement
         $result = $stmt->execute();
 
         return $result;
     }


     /**
     * Get the article record based on the ID
     * 
     * @param object $conn connection to the database
     * @param integer $id the article ID
     * 
     * @return mixed An object of this class, or null if not found
     */

    public static function getDataById($conn, $id){
      
        $sql = "SELECT * FROM tasks_record WHERE id = :id"; 

        // Prepares a statement for execution and returns a PDOstatement object
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        // Set the default fetch mode for this statement
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'ManipulateData');

        // Executes a PDO prepared statement
        $result = $stmt->execute();

        if ($result === true) {
            
            // Fetches the next row from a result set in an object format
            return $stmt->fetch();
        }
    }

    /**
     * Update the article with its current property values
     * 
     * @param object $conn Connection to the database
     * 
     * @return boolean True if the update was successful, false otherwise
     */
     
     public function updateData($conn, $id)
     {
             
         // update the data into the database server
         $sql = "UPDATE tasks_record 
                 SET task = :task, 
                     due_date = :due_date
                 WHERE id = :id";
 
         // Prepares the statement for execution
         $stmt = $conn->prepare($sql);
 
         // Binds a value to a corresponding named/question-mark placeholder in the SQL statement that was used to prepare the statement. 
         // NB: PARAM_INT for int type of parameter, PARAM_STR for string type of parameter, PARAM_BOOL for boolean type of parameter
         $stmt->bindValue(':id', $id, PDO::PARAM_INT);
         $stmt->bindValue(':task', $this->task_message, PDO::PARAM_STR);
         $stmt->bindValue(':due_date', $this->task_date, PDO::PARAM_STR);
      
         // Executes a PDO prepared statement
         $result = $stmt->execute();
 
         return $result;
        
     }
}