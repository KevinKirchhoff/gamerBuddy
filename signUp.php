<html>
    <?php
    include("header.php");
    require_once("dao.php");
    session_start();
    ?>
    <body bgcolor="000000">

        <div class="jumbotron2">
            <div class="jumbo2">
                <div style="text-align:center;padding-right:250px;"><h2>Sign Up!</h2></div>
                <form class="formL" method="POST" action="signUpHandler.php" >

                    <table>
                        <tr>
                            <td>Name:</td> <td><input type="text" name="fName" value="<?php
                                if (isset($_SESSION['fName'])) {
                                    echo htmlentities($_SESSION['fName']);
                                }
                                ?>"><br>
                        </tr>
                        <tr>
                            <td>Last Name:</td> <td><input type="text" name="lName" value="<?php
                                if (isset($_SESSION['lName'])) {
                                    echo htmlentities($_SESSION['lName']);
                                }
                                ?>"><br>
                        </tr>
                        <tr>
                            <td>Email :</td> 
                            <td>
                                <input type="email" name="email" value="<?php
                                    if (isset($_SESSION['email'])) {
                                        echo htmlentities($_SESSION['email']);
                                    }
                                                        ?>"><br>
                        </tr>
                        <tr>
                            <td>Zip code:</td> <td><input type="zipcode" name="zipcode"><br>
                        </tr>
                        <tr>
                            <td>Username:</td> <td><input type="text" name="username" value="<?php
                                                        if (isset($_SESSION['username'])) {
                                                            echo htmlentities($_SESSION['username']);
                                                        }
                                                        ?>"></td><br>
                        </tr>
                        <tr>
                            <td>Password:</td> <td><input type="password" name="password" ></td><br>
                        </tr>
                        <tr>
                            <td>Confirm Password:</td> <td><input type="password" name="ConfirmPassword"><br>
                        </tr>
                        <tr >
                            <td style="padding-bottom:15px;">
                                    <button class="submit" id="Submit" type="submit">Submit!</button>
                                 </td>
                        </tr>
                    </table>
                </form>
                <div class="error"><?php
                    if (isset($_SESSION["errorFirstNameNotEntered"])) {
                        echo $_SESSION["errorFirstNameNotEntered"];
                        echo "<br>";
                    }
                    if (isset($_SESSION["errorLastNameNotEntered"])) {
                        echo $_SESSION["errorLastNameNotEntered"];
                        echo "<br>";
                    }
                    if (isset($_SESSION["errorEmailNotEntered"])) {
                        echo $_SESSION["errorEmailNotEntered"];
                        echo "<br>";
                    }
                    if (isset($_SESSION["UsernameNotEntered"])) {
                        echo $_SESSION["UsernameNotEntered"];
                        echo "<br>";
                    }
                    if (isset($_SESSION["passwordNotEntered"])) {
                        echo $_SESSION["passwordNotEntered"];
                        echo "<br>";
                    }
                    if (isset($_SESSION["ConfirmPasswordNotEntered"])) {
                        echo $_SESSION["ConfirmPasswordNotEntered"];
                        echo "<br>";
                    }


                    $dao = new Dao();


                    $fName = $_SESSION['fName'];
                    $lName = $_SESSION['lName'];
                    $email = $_SESSION['email'];
                    $zipcode = $_SESSION['zipcode'];
                    $username = $_SESSION['username'];
                    $password = $_SESSION['password'];
                    if (isset($_SESSION["errorFirstNameNotEntered"]) || isset($_SESSION["errorLastNameNotEntered"]) || isset($_SESSION["errorEmailNotEntered"]) || isset($_SESSION["UsernameNotEntered"]) || isset($_SESSION["PasswordNotEntered"]) || isset($_SESSION["ConfirmPasswordNotEntered"])) {

                        header('Location: signup.php');
                    }

                    if(isset($_SESSION['registered'] )){
                        
                    
                    if ($dao->getConnection()) {
                        /*
                          unset($_SESSION['UsernameTaken']);
                          $_SESSION["UsernameTaken"] = "Username taken!";
                          echo $_SESSION["UsernameTaken"];
                          header('Location: signup.php');
                         */
                        $dao->saveUser($fName, $lName, $email, $zipcode, $username, $password);
                        
                        session_unset();
                        var_dump($_SESSION);
                        $_SESSION["CreateSuccess"] = "Account Created Successfully!";
                        
                    } else {
                        echo "connection broke";
                    }
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>

<?php include("footer.php");
?>

</html>
