<?php
require_once "dao.php";
session_start();

	if(isset($_POST["fName"])  && $_POST["fName"] != ""){
		$fName = $_POST['fName'];
		$_SESSION['fName'] = $fName;
		unset($_SESSION['errorFirstNameNotEntered']);
	}
	//Error
	else{
		unset($_SESSION['fName']);
		$_SESSION["errorFirstNameNotEntered"] = "Must enter a firstname!";
	}
	//check last name field
	if(isset($_POST["lName"]) && $_POST["lName"] != ""){
		$lName = $_POST["lName"];
		$_SESSION["lName"] = $lName;
		unset($_SESSION['errorLastNameNotEntered']);
	}
	//Error
	else{
		unset($_SESSION['lName']);
		$_SESSION["errorLastNameNotEntered"] = "Must enter a lastname!";
	}
    if(isset($_POST["email"])  && $_POST["email"] != ""){
		if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		     //The email address is valid.
			$email = $_POST["email"];
			$_SESSION["email"] = $email;
			unset($_SESSION['errorEmailNotEntered']);
		} else{
		     //Error The email address is invalid.
				unset($_SESSION['email']);
				$_SESSION["errorEmailNotEntered"] = "Enter a valid email address format!";
		}	
	}
	else{
		//Error
		unset($_SESSION['email']);
		$_SESSION["errorEmailNotEntered"] = "Must enter an email!";
	}
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
if(isset($_POST["ConfirmPassword"])  && $_POST["ConfirmPassword"] != "" && $_POST["ConfirmPassword"] === $_POST["password"]){
		$ConfirmPassword = $_POST["ConfirmPassword"];
		$_SESSION["ConfirmPassword"] = $ConfirmPassword;
		unset($_SESSION['ConfirmPasswordNotEntered']);
	}
	else{
		unset($_SESSION['ConfirmPassword']);
		if($_POST["ConfirmPassword"] === ""){
			$_SESSION["ConfirmPasswordNotEntered"] = "Must enter a second password!";
		}
		else{
			$_SESSION["ConfirmPasswordNotEntered"] = "Passwords must match!";
		}
	}


if(isset($_SESSION["errorFirstNameNotEntered"]) || isset($_SESSION["errorLastNameNotEntered"]) 
		|| isset($_SESSION["errorEmailNotEntered"]) || isset($_SESSION["UsernameNotEntered"]) 
		|| isset($_SESSION["PasswordNotEntered"])
		|| isset($_SESSION["ConfirmPasswordNotEntered"])){
			
			header('Location: signUp.php');
	}
else{
           
          session_unset();
               $dao = new Dao();
            if ($dao->getConnection()) {
              
                        /*
                          unset($_SESSION['UsernameTaken']);
                          $_SESSION["UsernameTaken"] = "Username taken!";
                          echo $_SESSION["UsernameTaken"];
                          header('Location: signup.php');
                         */
                    
              
                        $dao->saveUser($fName, $lName, $email, $zipcode, $username, $password);
                        
                       
                        
                        $_SESSION["CreateSuccess"] = "Account Created Successfully!";
                      
                        header('Location: registered.php');
                        
                    } else {
                        echo "connection broke";
                    }
            
 
}

?>
