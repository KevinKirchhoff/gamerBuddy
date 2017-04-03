<html>
	<?php 
     session_start();
    ?>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" type="image/png" href="img/favicon.ico" />
<header>
	<div class ="navBar">
	   <div>
           <form action="signUp.php">	
               <button class="signUp" id="signUp">Sign Up!</button> 
           </form> 
        </div>
	   <div>
            <?php  
                 if (isset($_SESSION['loggedIn'])) {   
                    echo '<form action="logout.php">';
                 } 
                  else{
                  echo '<form action="login.php">';
                  }
                 if (isset($_SESSION['loggedIn'])) {   
                    
                    echo '<button class="logout" id="logout action="logout.php">Logout</button>';
                 } 
                  else{
                      
                  echo '<button class="login" id="Login">Login</button>';
                  
                  
                  }
                  ?>
            </form> 
        </div>
	</div>
</header>
	<body>
		<div>
			<div>
				<img class="logo" src="img/gblogo160.png" />
			</div>
		</div>
		<div class="banner-container">
			<div id="bannerMain">
				<img class="banner" src="img/gamerBuddybanner3.png" />
			</div>
		</div>
        <div class="navLeft">
            <ul class="nav">
                <li>
                    <form action="index.php">	
                        <button class="navvy">Home!</button> 
                    </form> </li>
                <li>
                 <form action="participate.php">	
                        <button class="navvy">Participate</button> 
                    </form> </li>
                <li><form action="search.php">	
                        <button class="navvy">Search</button> 
                    </form> </li>
                <li> <form action="faq.php">	
                        <button class="navvy">FAQ</button> 
                    </form> </li>
                <li> <form action="aboutUs.php">	
                        <button class="navvy">About Us</button> 
                    </form> </li>
            </ul>
        </div>
	</body>
</html>
