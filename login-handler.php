<?php

require_once "dao.php";
session_start();

if (isset($_POST["username"]) && $_POST["username"] != "") {
    $username = $_POST['username'];
    $_SESSION['username'] = $username;

    unset($_SESSION['errorusernameNotEntered']);
}
//Error
else {
    unset($_SESSION['username']);
    $_SESSION["errorusernameNotEntered"] = "Must enter a username!";
}
if (isset($_POST["password"]) && $_POST["password"] != "") {
    $password = $_POST["password"];
    $_SESSION["password"] = $password;
    unset($_SESSION['passwordNotEntered']);
    //password length must be 8 or greater 
    if (!preg_match('/^[\w\d]{6,16}$/', $password)) {
        $_SESSION["passwordNotEntered"] = "Password Must be between 6-16 chars";
    }
} else {
    unset($_SESSION['password']);
    $_SESSION["passwordNotEntered"] = "Must enter a password!";
}

if(isset($_SESSION['']) || isset($_SESSION['passwordNotEntered'])){
    header('Location: login.php');
} else {
    

$dao = new Dao();
$username = $_SESSION['username'];
$password = $_SESSION['password'];

if ($dao->getConnection()) {
    $isValid = $dao->checkUserAndPass($username, $password);

    if ($isValid) { //valid username and password combination in database
      
        $_SESSION = array();
        $_SESSION['loggedIn'] = "logged in";
       header('Location: login.php');
    } else {
        
        $_SESSION['invalid'] = " invalid username or password!";
        
        header('Location: login.php');
    }
} else {
echo "connection failed";    
}
}



?>