<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylelogin.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php

                include("php/config.php");
                if(isset($_POST['submit'])){
                    $username = mysqli_real_escape_string($conn, $_POST['username']);
                    $password = mysqli_real_escape_string($conn, $_POST['password']);
                    $validuser = true;
                    $result = mysqli_query($conn, "SELECT * FROM customers WHERE username = '$username' AND password = '$password'") or die("select Error");
                    $row = mysqli_fetch_assoc($result);
                    
                    if(is_array($row) && !empty($row)){
                        $_SESSION['valid'] = $validuser;
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['password'] = $row['password'];
                        $_SESSION['id'] = $row['id'];
                    }else{
                        echo "<div class='message'>
                                <h3>Invalid Email or Password!</h3> 
                                </div> <br>";
                        echo "<a href='indexlogin.php'><button class='btn'>Go Back</button></a>";
            }

            if(isset($_SESSION['valid'])){
                header('Location: home.php');
                exit();
            }else{
                echo "<div class='message'>
                        <h3>Wrong Username or Password!</h3> 
                        </div> <br>";
                echo "<a href='indexlogin.php'><button class='btn'>Go Back</button></a>";}
            
            }
            
            ?>
        
            <h1>Login</h1>

                <form action="indexlogin.php" method="post">
                    <div class="field input">
                        <label for="username"></label>
                        <input type="text" name="username" placeholder="Username" required>
                    </div>

                    <div class="field input">
                        <label for="password"></label>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                        <br>
                        <!-- An element to toggle between password visibility -->
                    
                        <input type="checkbox" class="checkbox" onclick="myFunction()"> Show Password
                    
                        <script>
                            function myFunction() {
                                var x = document.getElementById("password");
                                if (x.type === "password") {
                                    x.type = "text";
                                } else {
                                    x.type = "password";
                                }
                            }
                        </script>
                
                    </div>

                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Login" required>
                    </div>

                    <div class="link">
                        Don't have an account? <a href="register.php">Sign Up now</a>
                    </div>
                </form>
        </div>
        <?php   ?>
    </div>
</body>
</html>
