<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylelogin.css" class="rel">
    <title>Change Profile</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php"> Logo </a></p>
        </div>

        <div class="right-links">
            <a href="#">Change Profile</a>
        </div>
        
        <div class="right-links">
            <a href="logout.php"> <button class="btn">Log Out</button></a>
        </div>
    </div>

    <div class="container">
        <div class="box form-box">
            <h2>Change Profile</h2>
            <form action="editt.php" method="post">
                <div class="field input">
                    <label for="username">Username</label><br>
                    <input type="text" name="username" id="Username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label><br>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                    <br>
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
                    <input type="submit" class="btn" name="submit" value="update" required>
                </div>
                
                <br><br>
                <div class="field">
                    <a href="home.php" class="btn">Back</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>