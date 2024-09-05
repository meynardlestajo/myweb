<?php 

function Createdb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "uep_db";

    // Create connection
    $con = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$con) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    if (mysqli_query($con, $sql)) {
        // Connect to the created database
        $con = mysqli_connect($servername, $username, $password, $dbname);

        // Create table
        $sql = "
            CREATE TABLE IF NOT EXISTS info(
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            address VARCHAR(255)
            );
        ";

        if (mysqli_query($con, $sql)) {
            return $con;
        } else {
            echo "Error creating table: " . mysqli_error($con);
        }

    } else {
        echo "Error creating database: " . mysqli_error($con);
    }

    // Close the connection if the function fails
    mysqli_close($con);
    return null;
}

?>