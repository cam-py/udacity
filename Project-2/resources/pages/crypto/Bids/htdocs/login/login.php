

        <?php
            include_once 'header.php';
        ?>

        <section class="login-form">
            <h2>Log-in to Montey</h2>
            <form action="includes/login.inc.php" id="frmLogin" method="POST">  
                <div class="login-container"> 	   		 	 
		            <input type="text" id="username" name="uid" placeholder="Username">	 	 
		            <input type="password" id="password" name="pwd" placeholder="Password"> 
                    <button type="submit">Log In</button>
                    <input type="checkbox" checked="checked"> Keep me signed in
                </div>
                <div class="login-container">
                    <button type="checkbox" class="cancelbtn">Cancel</button>
                    <span class="psw"><a href="#">Forgot password?</a></span>
                </div> 
            </form> 
            <?php 
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p>Fill in all fields!</p>";
                }
                else if ($_GET["error"] == "wronglogin") {
                    echo "<p>Incorrect login information!</p>";
                }
    
            }
        ?>
        </section>
        
        
        <?php
            include_once 'footer.php';
        ?>
      