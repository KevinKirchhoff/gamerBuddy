<?php

require_once 'Dao.php';
echo "here";
$dao=new Dao();

$fName= htmlentities($_POST['fName']);
$lName= htmlentities($_POST['lName']);
$email= htmlentities($_POST['email']);
$zipcode= htmlentities($_POST['zipcode']);
$username= htmlentities($_POST['username']);
$password= htmlentities($_POST['password']);

$dao->saveUser($fName,$lName,$email,$zipcode,$username,$password);





header("Location:registered.php");

end;

    

?>