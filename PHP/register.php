<?php ob_start();
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>Register at E-BookStore</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <style>
        body {
            background-color: midnightblue;
        }

        .container {
            background-color: #1e88e5;
            box-shadow: 6px 6px 5px white;
            padding: 14px;
            align-content: center;
            max-width: 400px;
            margin-top: 18px;
            border-radius: 9px;
            margin-bottom: 40px;
        }

        h3 {
            color: aliceblue;
            text-align: center;
            margin-top: 70px;
            margin-bottom: 40px;
            margin-left: 20px;
        }

        .container .form-group .form-control {
            color: aliceblue;
        }
    </style>
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
            <span style="font-size: 2em; color: white; margin-right: 0.5rem;">
                <i class="fas fa-book-open"></i>
            </span>
            <a class="navbar-brand" href="../index.php">E-BookStore</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto ">
                    <a class="nav-item nav-link " href="../index.php" style="color: antiquewhite" ;>Home <span
                            class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="./login.php" style="color: antiquewhite" ;>Login</a>
                    <a class="nav-item nav-link" href="./register.php" style="color: antiquewhite" ;>Register</a>
                </div>
            </div>

        </nav>
    </div>

    <h3>Create An Account</h3>
    <div class="container">
        <form action="" method="post">
            <div class="form-group">
                <label for="name" style="color: aliceblue;"><b>First Name:</b></label>
                <input type="text" class="form-control" name="fname" required id="name" placeholder="Enter your name"
                    style="color: black;">
            </div>
            <div class="form-group">
                <label for="lname" style="color: aliceblue;"><b>Last Name:</b></label>
                <input type="text" class="form-control" required name="lname" id="lname" placeholder="Enter surname"
                    style="color: black;">
            </div>

            <div class="form-group">
                <label for="email" style="color: aliceblue;"><b>Email address:</b></label>
                <input type="email" class="form-control" name="email" required id="email" placeholder="Enter Email-id"
                    style="color: black;">
            </div>
            <div class="form-group">
                <label for="pwd" style="color: aliceblue;"><b>Password:</b></label>
                <input type="password" class="form-control" required name="pw" minlength="8" maxlength="15" id="pwd"
                    placeholder="Enter Password" style="color: black;">
            </div>
            <div class="form-group">
                <label for="pwd" style="color: aliceblue;"><b>Confirm Password:</b></label>
                <input type="password" class="form-control" required minlength="8" name="cpw" maxlength="15" id="pwd"
                    placeholder="Re-enter Password" style="color: black;">
            </div>
            <div class="form-group">
                <label for="age" style="color: aliceblue;"><b>Age:</b></label>
                <input type="number" class="form-control" required id="age" name="age" placeholder="Enter age"
                    style="color: black;">
            </div>
            <div class="form-group">
                <label for="num" style="color: aliceblue;"><b>Contact Number:</b></label>
                <input type="text" class="form-control" required id="num" placeholder="Enter your number" required
                    name="pno" maxlength="10" minlength="10" style="color: black;">
            </div>
            <div class="form-group">
                <label for="add" style="color: aliceblue;"><b>Address:</b></label>
                <input type="text" class="form-control" required name="add" id="add" placeholder="Enter your address"
                    style="color: black;">
            </div>
            <a href="./login.php" style="color: aliceblue;">Already a member? Log In </a><br><br>
            <button type="submit" class="btn btn-primary" name="submit"
                style="background-color: blue;box-shadow: 2px 2px white;">Submit</button>
        </form>
        <?php
        session_start();
        if (isset($_POST["submit"])) {
            $varname = $_POST["fname"];
            $varlname = $_POST["lname"];
            $varemail = $_POST["email"];
            $varpassword = $_POST["pw"];
            $varcpassword = $_POST["cpw"];
            $varage = $_POST["age"];
            $varpnumber = $_POST["pno"];
            $varaddress = $_POST["add"];
            if ($varpassword != $varcpassword) {
                echo "<h4>Entered Passwords do not match! Try Again.</h4>";
            } else {
                require_once('./config.php');
                $user_check_query = "SELECT * FROM userinfo WHERE email = '$varemail' LIMIT 1";
                $result = mysqli_query($conn, $user_check_query);
                $user = mysqli_fetch_assoc($result);
                if ($user) {
                    if ($user['email'] === $varemail) {
                        echo "<br>";
                        echo "<h4>Email already exists!</h4>";
                    }
                } else {
                    $query = "INSERT INTO userinfo (firstname,lastname,email,password,age,pnumber,address)
                          VALUES('$varname','$varlname', '$varemail','$varpassword','$varage','$varpnumber','$varaddress')";
                    mysqli_query($conn, $query);
                    $_SESSION['username'] = $varemail;
                    $_SESSION['success'] = "You are now logged in";
                    header('location: sample.php');
                }
                mysqli_close($conn);
            }
        }
        ob_end_flush();
        ?>

    </div>
</body>

</html>