<?php
    include 'config.php';

    if (isset($_POST['submit']))
    {
        $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password1 = md5($_POST['password1']);
        $password2 = md5($_POST['password2']);

        $query = "SELECT * FROM user WHERE username = '$username' && password = '$password1'";
        $result=mysqli_query($con,$query);

        if (mysqli_num_rows($result)>0)
        {
            $err[] = 'This user is already registred';
        } else
        {
            if ($password1 == $password2)
            {
                $query= "INSERT into user (firstname,lastname,username,email,password) VALUES('$firstname','$lastname','$username','$email','$password1')";
                $result=mysqli_query($con,$query);
                
                if($result)
                {
                    header('location:signin.php');
                } else
                {
                    die(mysqli_error($con));
                }
            } else
            {
                $err[] = 'Your passwords are not the same';
            }
        }
        
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <style>
        body {
            background: url('https://res.cloudinary.com/practicaldev/image/fetch/s--BuPz-p40--/c_imagga_scale,f_auto,fl_progressive,h_420,q_auto,w_1000/https://dev-to-uploads.s3.amazonaws.com/uploads/articles/nphrgz8yfnjylrwfr0yl.png') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        form {
            background-color: rgba(255, 255, 255, 0.4);
            padding: 20px;
            border-radius: 10px;
            width: 500px;
        }

        .top-menu {
            background-color: #333;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 2;
        }

        .logo {
            width: 150px;
            height: 55px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>

    <title>Streamnet</title>
</head>

<body>
    <div class="top-menu">
        <img src="streamnet.png" alt="StreamNet Logo" class="logo">
        <button onclick="location.href='signin.php'">Sign In</button>
    </div>
    <form method="post">
        <?php
        if (isset($err)) {
            foreach ($err as $err) {
                echo $err;
            }
        }
        ?>
        <div class="mb-3">
            <label for="firstname" class="form-label">First name</label>
            <input type="text" class="form-control" name="firstname" placeholder="Enter first name">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last name</label>
            <input type="text" class="form-control" name="lastname" placeholder="Enter last name">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Enter username">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email address">
        </div>
        <div class="mb-3">
            <label for="password1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password1" placeholder="Password">
        </div>
        <div class="mb-3">
            <label for="password2" class="form-label">Check password</label>
            <input type="password" class="form-control" name="password2" placeholder="Check password" aria-describedby="passwordHelpBlock">
            <div id="passwordHelpBlock" class="form-text">
                Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
            </div>
        </div>
        <br>
        <center>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </center>
    </form>
</body>

</html>
