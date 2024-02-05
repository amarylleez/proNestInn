<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylelogin.css">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="box form-box">

        <?php
            include("php/config.php");
    
            if(isset($_POST['submit'])){
                $username = $_POST ['username'];
                $password = $_POST ['password'];
                
                $fullname = $_POST ['fullname'];
                $email = $_POST ['email'];
                $phone = $_POST ['phone'];
                $address = $_POST ['address'];

            // verifying the unique email

            $verify_query = mysqli_query($conn, "SELECT email FROM customers WHERE email = '$email'") or die("Error: " . mysqli_error($conn));

            if( mysqli_num_rows($verify_query) != 0){
                echo "<div class='message'>
                        <h3>Sorry, the email is already taken. Try another one please!</h3> 
                        </div> <br>";
                echo "<a href='connection.php'><button class='btn'>Go Back</button></a>";
            }
            else{
                mysqli_query($conn, "INSERT INTO customers (username, password, fullname, email, phone, address) VALUES ('$username', '$password', '$fullname', '$email', '$phone', '$address')") or die("Error: " . mysqli_error($conn));
                
                echo "<div class='message'>
                        <h3>Account created successfully!</h3> 
                        </div> <br>";
                echo "<a href='indexlogin.php'><button class='btn'>Login Now</button></a>";
                }
            }
        ?>
      

            <h1>Sign Up</h1>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label><br>
                    <input type="text" name="username" id="Username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label><br>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                    <br>
                    <input type="checkbox" class="checkbox" onclick="myFunction()">Show Password
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
                <br><br>

                <div class="field input">
                    <label for="fullname">Full Name</label><br>
                    <input type="text" name="fullname" id="fullname" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label><br>
                    <input type="email" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="phone">Phone</label><br>
                    <input type="text" name="phone" id="phone" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="address">Address</label><br>
                    <input type="text" name="address" id="address" autocomplete="off" required>
                </div>

               
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>

                <div class="link">
                    Already a member? <a href="home.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php

        ?>
    </div>
</body>
</html>
