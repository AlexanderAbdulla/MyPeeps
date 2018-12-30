<?php

    /*This class defines all operations related to the DB*/
    class dbops{

        var $conn; 

        /* Our constructor here defines all the database variables and makes a connection */
        function __construct(){

           $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "friends";
        
            $conn = new mysqli($servername, $username, $password, $dbname);
        
            if($conn->connect_error){
                die("Connection failed: " . $conn->connect_error);
            } 

            $this->conn = $conn;
        }

        function displayNames($username){
            $sql = "SELECT name FROM person WHERE username ='". $username."'";
            $result = $this->conn->query($sql);
    
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "name: " . $row["name"] . "<br>";
                }
            } else {
                echo '0 results';
            }
       }

       function checkUsernamePwd($username, $password){
           $sql = "SELECT * FROM users WHERE username = '".$username."' && password = '".$password."'" ;
           $result = $this->conn->query($sql);
           if($result->num_rows > 0){
              // echo 'found';
              // $row = $result->fetch_assoc();
              // echo $row["username"];
                return true; 
            } else {
                return false; 
            }
       }
    }
?>