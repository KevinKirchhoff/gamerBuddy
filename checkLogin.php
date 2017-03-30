<?php

require_once 'Dao.php';

$dao=new Dao();

$username= htmlentities($_POST['username']);
$password= htmlentities($_POST['password']);
$passwordCheck= htmlentities($_POST['passwordCheck']);


$dao->save($username,$platform,$age,$note);





header("Location:search.php");

end;

    

?>