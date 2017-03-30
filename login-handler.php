<?php
require_once "dao.php";
session_start();

if(isset($_POST["username"])  && $_POST["username"] != ""){
		$username = $_POST['username'];
		$_SESSION['username'] = $username;
    
		unset($_SESSION['errorusernameNotEntered']);
	}
	//Error
	else{
		unset($_SESSION['username']);
		$_SESSION["errorusernameNotEntered"] = "Must enter a username!";
	}
if(isset($_POST["password"])  && $_POST["password"] != ""){
		$password = $_POST["password"];
		$_SESSION["password"] = $password;
		unset($_SESSION['passwordNotEntered']);
			//password length must be 8 or greater 
			if(!preg_match('/^[\w\d]{6,16}$/',$password)){
				$_SESSION["passwordNotEntered"] = "Password Must be between 6-16 chars";
			}
	}
	else{
		unset($_SESSION['password']);
		$_SESSION["passwordNotEntered"] = "Must enter a password!";
	}



header('Location: login.php');


?>