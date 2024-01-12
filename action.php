<?php
    include 'config.php';
    session_start();

    if (!isset($_SESSION['username']))
    {
        header('location:home.php');
    }
    $username = $_SESSION['username'];
    $query="SELECT * FROM movie WHERE category='action'";
    $result=mysqli_query($con,$query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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

        .container {
            display: flex;
            margin-top: 70px; /* Adjust the margin based on your design */
        }

        .categories-menu {
            color: white;
            margin-right: 10px;
            padding: 10px;
            background-color: #333;
            border-radius: 5px;
        }

        .categories-menu h2 {
            margin-bottom: 10px;
        }

        .categories-menu ul {
            list-style-type: none;
            padding: 0;
        }

        .categories-menu li {
            cursor: pointer;
            padding: 5px;
            margin-bottom: 5px;
            border-radius: 3px;
            background-color: #4CAF50;
        }

        .categories-menu li:hover {
            background-color: #bbb;
        }

    </style>

    <title>Streamnet</title>
</head>

<body>
    <div class="top-menu">
        <img src="streamnet.png" alt="StreamNet Logo" class="logo">
        <h4>
            <?php
                echo 'Hallo '.$_SESSION['username']
            ?>
        </h4>
        <!-- Add the dropdown menu for categories -->
        <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="categoriesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Είδος
                </button>
                <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
                    <a class="dropdown-item" href="adventure.php">Περιπέτεια</a>
                    <a class="dropdown-item" href="action.php">Δράση</a>
                    <a class="dropdown-item" href="comedy.php">Κωμωδία</a>
                    <!-- Add more categories as needed -->
                </div>
            </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="categoriesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Χρονολογία
                </button>
                <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
                    <a class="dropdown-item" href="year_i.php">2023</a>
                    <a class="dropdown-item" href="year_ii.php">2022</a>
                    <a class="dropdown-item" href="year_iii.php">2021</a>
                    <!-- Add more categories as needed -->
                </div>
            </div>
        <button onclick="location.href='signout.php'">Sign out</button>
    </div>
    <div>
        <div class="card-deck">
            <?php
                if ($result)
                {
                    while($data=mysqli_fetch_assoc($result))
                    {
                        echo'<div class="card bg-dark text-white">
                        <a href="movie.php? title='.$data['title'].'" class="text-light">
                            <img class="card-img" src="'.$data['image'].'" alt="Card image">
                        </a>    
                        </div>';
                    }
                }
            ?>

            
            
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</html>
