<html>
<?php
  include("header.php");
    require_once("renderSearch.php");
    require_once("dao.php");
    $dao = new Dao();
?>
<head>
  <title>GamerBuddy</title>
 </head>
 <body bgcolor="#000000">
         <div class="jumbotron">
    <div class="jumbo3">
    <h2>Post: Here!! </h2>
        
      <?php 
        
        renderSearch::renderTable($dao->getRequest());?>
       
    </div>
   
</div>


 </body>
<?php
  include("footer.php");
?>

</html>
