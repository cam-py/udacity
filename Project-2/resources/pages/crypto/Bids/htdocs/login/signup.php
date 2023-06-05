
        
        <?php 
            include_once 'header.php';
        ?>
        <hr  class="get-started-line">
        
        
        <h2 class="get-started">REGISTER WITH US</h2>
         <section class="signup-container">
               
             <form action="includes/signup.inc.php" method="POST">
                 <input type="=text" id="name" name="name" placeholder="Full name" required>
                 <input type="text" id="email" name="email" placeholder="Email" required>
                 <input type="text" id="phone" name="phone" placeholder="Phone" required>
                 <input type="text" id="uid" name="uid" placeholder="Username/Email" required>
                 <input type="password" id="pwd" name="pwd" placeholder="Password" required>
                 <input type="password" id="pwdRepeat" name="pwdRepeat" placeholder="Re-enter password" required>
                 <!--<textarea  id="service" name="service" placeholder="Service inquiry: &#10;example: mobile app, website, crypto wallet etc...?" style="height: 200px"></textarea>-->
                 <button type="submit" name="Submit">Sign Up</button> 
            </form>
            <?php 
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p>Fill in all fields!</p>";
                }
                else if ($_GET["error"] == "invaliduid") {
                    echo "<p>Username doesn't reach requirements!</p>";
                }
                else if ($_GET["error"] == "invalidemail") {
                    echo "<p>Invalid email!</p>";
                }
                else if ($_GET["error"] == "passwordsdontmatch") {
                    echo "<p>Passwords do not match!</p>";
                }
                else if ($_GET["error"] == "stmtfailed") {
                    echo "<p>Soemthing went wrong, try again!</p>";
                }
                else if ($_GET["error"] == "usernametaken") {
                    echo "<p>Username taken!</p>";
                }
                else if ($_GET["error"] == "none") {
                    echo "<p>Welcome to Montey!</p>";
                }
            }
        ?>
        </section>  
      

        <?php 
            include_once 'footer.php';
        ?>
