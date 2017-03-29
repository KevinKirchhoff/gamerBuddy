<?php

class Dao{
      private $host = "localhost";
      private $db = "gamerBuddy";
      private $user = "kevin";
      private $pass = "kevin";
    
    
    public function getConnection () {
        
        try {
          $conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
                $this->pass);
        } catch (Exception $e) {
          echo "issue with the connections";
           exit;
        }
        return $conn;
    }

        public function save($game,$platform,$age,$note){
        try{
        $conn= $this->getConnection();
        }catch(Exception $e){
            echo e;
        }
        $saveQuery = "insert into buddyPost (game,platform,age,note) values (:game,:platform,:age,:note); ";
        $q=$conn->prepare($saveQuery); 
            
        $q->bindParam(":game", $game);
        $q->bindParam(":platform", $platform);
        $q->bindParam(":age", $age);
        $q->bindParam(":note", $note);
        $q->execute();
    }
    public function getRequest() {
        $conn = $this->getConnection();
         return $conn->query("select game,platform,age,note from BuddyPost;");
    }
       public function saveUser($firstName,$lastName,$email,$zipcode,$username,$password){
        try{
        $conn= $this->getConnection();
        }catch(Exception $e){
            echo e;
        }
        $saveQuery = "insert into UserData (firstName,lastName,email,zipcode,username,password) values (:firstName,:lastName,:email,:zipcode,:username,:password); ";
        $q=$conn->prepare($saveQuery); 
            
        $q->bindParam(":firstName", $firstName);
        $q->bindParam(":lastName", $lastName);
        $q->bindParam(":email", $email);
        $q->bindParam(":zipcode", $zipcode);
        $q->bindParam(":username", $username);
        $q->bindParam(":password", $password);
        $q->execute();
    }
}


?>