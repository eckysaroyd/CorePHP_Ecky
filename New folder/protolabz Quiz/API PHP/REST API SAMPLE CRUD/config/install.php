<?php
include_once './dbclass.php';
try 
{
  $dbclass = new DBClass(); 
  $connection = $dbclass.getConnection();
  $sql = file_get_contents("data/database.sql"); //We are placing the contents of the config/data/database.sql file into a variable
  $connection->exec($sql);
  echo "Database and tables created successfully!";
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>
<!-- What is PHP PDO?
The PHP Data Objects (PDO) extension defines a lightweight, consistent interface for accessing databases in PHP. Each database driver that implements the PDO interface can expose database-specific features as regular extension functions. Note that you cannot perform any database functions using the PDO extension by itself; you must use a database-specific PDO driver to access a database server -->