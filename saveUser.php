<?php

require_once 'Dao.php';

$dao=new Dao();

$firstName= htmlentities($_POST['firstName']);
$lastName= htmlentities($_POST['lastName']);
$email= htmlentities($_POST['email']);
$zipcode= htmlentities($_POST['zipcode']);
$username= htmlentities($_POST['username']);
$password= htmlentities($_POST['password']);

$dao->saveUser($firstName,$lastName,$email,$zipcode,$username,$password);





header("Location:registered.php");

end;

    

?>