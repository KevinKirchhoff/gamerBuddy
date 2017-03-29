<?php

require_once 'Dao.php';

$dao=new Dao();

$game= htmlentities($_POST['game']);
$platform= htmlentities($_POST['platform']);
$age= htmlentities($_POST['age']);
$note= htmlentities($_POST['note']);

$dao->save($game,$platform,$age,$note);





header("Location:search.php");

end;

    

?>