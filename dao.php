<?php

class Dao{
    /*
      private $host = "localhost";
      private $db = "gamerBuddy";
      private $user = "kevin";
      private $pass = "kevin";
       mysql://beb06ad863425c:bbc7888d@us-cdbr-iron-east-03.cleardb.net/heroku_b0ea6126fdb0ba2?reconnect=true
      */
    private $host = "us-cdbr-iron-east-03.cleardb.net";
      private $db = "heroku_b0ea6126fdb0ba2";
      private $user = "beb06ad863425c";
      private $pass = "bbc7888d";
   
    
    public function getConnection () {
        
        try {
          $conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
                $this->pass);
        } catch (Exception $e) {
          echo "issue with the connections getConnection";
           exit;
        }
        return $conn;
    }

        public function save($game,$console,$age,$note){
        try{
        $conn= $this->getConnection();
        }catch(Exception $e){
            echo e;
        }
        $saveQuery = "insert into buddyPost (game,console,age,note) values (:game,:console,:age,:note); ";
        $q=$conn->prepare($saveQuery); 
            
        $q->bindParam(":game", $game);
        $q->bindParam(":console", $console);
        $q->bindParam(":age", $age);
        $q->bindParam(":note", $note);
        $q->execute();
    }
    
    public function getRequest() {
        $conn = $this->getConnection();
         return $conn->query("select game,console,age,note from buddyPost;");
    }
       public function saveUser($fName,$lName,$email,$zipcode,$username,$password){
        try{
        $conn= $this->getConnection();
        }catch(Exception $e){
            echo e;
        }
        $saveQuery = "INSERT INTO UserData (firstName, lastName, email, zipcode, username, password) VALUES (:fName,:lName,:email,:zipcode, :username,:password );";
        $q=$conn->prepare($saveQuery); 
            
        $q->bindParam(":fName", $fName);
        $q->bindParam(":lName", $lName);
        $q->bindParam(":email", $email);
        $q->bindParam(":zipcode", $zipcode);
        $q->bindParam(":username", $username);
        $q->bindParam(":password", $password);
        $q->execute();
    }
  
    public function checkuser ($username) {
    $conn = $this->getConnection();
    $getQuery = "SELECT username FROM UserData WHERE username = :username";
    $q = $conn->prepare($getQuery);
    $q->bindParam(":username", $username);
    $q->execute();
    return reset($q->fetchAll());
  }
    public function checkUserAndPass ($username, $password) {
    $conn = $this->getConnection();
    $getQuery = "SELECT username FROM UserData WHERE username = ':username' AND password = ':password'";
        
    $q = $conn->prepare($getQuery);
    $q->bindParam(":username", $username);
    $q->bindParam(":password", $password);
    $q->execute();
        
    return reset($q->fetchAll());
  }
}


?>