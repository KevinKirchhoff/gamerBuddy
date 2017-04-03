<html> 
    <?php
    include("header.php");
    require_once "dao.php";
    session_start();
    ?>
    <body bgcolor="000000">
        <div class="jumbotron2">
            <div class="jumbo2">
                <div style="text-align:center;padding-right:250px;"><h2>Login!</h2></div>
                <form class="formL" method="POST" action ="login-handler.php" >

                    <table>

                        <tr>
                            <td>Username :</td> <td><input type="text" name="username" value="<?php if(isset($_SESSION['username'])){
    echo htmlentities($_SESSION['username']);
    }
    ?>"></td><br>
                        </tr>
                        <tr>
                            <td>Password :</td> <td><input type="password" name="password"></td><br>
                        </tr>

                        <tr >
                            <td style="padding-bottom:15px;">	
                                    <button class="submit" id="Submit" type="submit">Submit!</button> 
                                </td>
                        </tr>
                    </table>
                </form>

                <div class="error" style="padding-top:25px;padding-bottom:30px;"><?php
                    if(isset($_SESSION["errorusernameNotEntered"])){
                    echo $_SESSION['errorusernameNotEntered'];
                    echo "<br>";
                    unset($_SESSION['usernameNotEntered']);
                    }
                    if(isset($_SESSION["passwordNotEntered"])){
                    echo $_SESSION['passwordNotEntered'];
                    echo "<br>";
                    unset($_SESSION['passwordNotEntered']);
                    }

                    

                    if(isset($_SESSION['loggedIn'])){
                        echo $_SESSION['loggedIn'];
                   
                    }else{
                        echo "loggedOut";
                    }
                   
                    
                    ?>
                </div>
            </div>   
        </div>

    </body>
<?php include("footer.php");
?>
</html>
