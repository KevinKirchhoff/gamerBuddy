<?php

require_once 'Dao.php';

$dao=new Dao();
echo "here";
$game= htmlentities($_POST['game']);
$console= htmlentities($_POST['console']);
$age= htmlentities($_POST['age']);
$note= htmlentities($_POST['note']);
$dao->save($game,$console,$age,$note);

header("Location:search.php");
?>