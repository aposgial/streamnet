<?php
    include 'config.php';
    session_start();

    if (isset($_POST['submit']))
    {
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password = md5($_POST['password']);

        $query = "SELECT * FROM user WHERE username = '$username' && password = '$password'";
        $result=mysqli_query($con,$query);

        if (mysqli_num_rows($result)>0)
        {
            $data = mysqli_fetch_array($result);

            $_SESSION['firstname'] = $data['firstname'];
            $_SESSION['lastname'] = $data['lastname'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['email'] = $data['email'];

            header('location:dashboard.php');
        } else 
        {
            $err[] = 'Wrong username or password';
        }
    }
?>


<!doctype html>
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
            width: 320px;
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

        <title>Sign-in</title>
    </head>
    <body>
        <div class="top-menu">
            <img src="streamnet.png" alt="StreamNet Logo" class="logo">
            <button onclick="location.href='signup.php'">Sign up</button>
        </div>
            <form method="post">
                <br>
                <?php
                    if (isset($err))
                    {
                        foreach ($err as $err)
                        {
                            echo $err;
                        }
                    }
                ?>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <br>
                <center>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </center>
            </form>
    </body>
</html>