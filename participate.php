<html>
<?php
  include("header.php");
     session_start();
?>
<head>
  <title>GamerBuddy</title>
 </head>
 <body bgcolor="#000000">
     
     <div class="jumbotron2">
        <div class="jumbo2">
             <div style="text-align:center;padding-right:250px;"><h2>Find a Buddy!</h2></div>
      <form class="formL" method="POST" action="saveParticipate.php" >
          
       <table>
          
        <tr>
         <td>Game:</td> <td><input type="text" name="game"></td><br>
        </tr>
        <tr>
         <td>Gaming Platform:</td> <td><input type="text" name="console"></td><br>
        </tr>
        <tr>
         <td>Age:</td> <td><input type="text" name="age"><br>
        </tr>
               <tr>
         <td>Notes:</td> <td><input type="note" name="note"><br>
        </tr>
        <tr >
         <td style="padding-bottom:15px;">	
               <button class="submit" id="Submit">Submit!</button> 
                </td>
        </tr>
       </table>
      </form>
        </div>   
    </div>
 </body>
<?php
  include("footer.php");
?>

</html>
