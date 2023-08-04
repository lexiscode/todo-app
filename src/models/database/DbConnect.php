<?php


namespace TodoApp\Models\Database;
use PDO;
/**
 * DbConnect
 * 
 * A connection to the database
 */
class DbConnect
{   
    /**
     * Get the database connection
     * 
     * @return PDO object Connection to the database server
     */
    public function getConn()
    {

        $db_host = "localhost";
        $db_name = "todo_app";
        $db_user = "root";
        $db_passwd = "";

        $dsn = 'mysql:host='.$db_host. ';dbname='.$db_name.';charset=utf8';
        
        $conn = new PDO($dsn, $db_user, $db_passwd);

        // Error handling for the database connection
        try {

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;

        } catch (PDOException $e) {
            
            echo $e->getMessage();
            exit;
        }
    }

    /**
     * Execute an SQL query on the database
     * 
     * @param string $sql The SQL query to execute
     * @return PDOStatement The result set as a PDOStatement object
     */
    public function query($sql)
    {
        $conn = $this->getConn();
        return $conn->query($sql);
    }


    /**
     * Prepare an SQL statement for execution
     * 
     * @param string $sql The SQL statement to prepare
     * @return PDOStatement The prepared statement as a PDOStatement object
     */
    public function prepare($sql)
    {
        $conn = $this->getConn();
        return $conn->prepare($sql);
    }

  
    public function lastInsertId()
    {
        $conn = $this->getConn();
        return $conn->lastInsertId();
    }


}

