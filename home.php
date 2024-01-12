<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreamNet - Home</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="top-menu">
    <img src="streamnet.png" alt="StreamNet Logo" class="logo">
    <button onclick="location.href='signin.php'">Sign In</button>
</div>

<div class="hero-section">
    <div class="content">
        <h1>Welcome to StreamNet</h1>
        <p>Your go-to platform for streaming amazing content!</p>
        <button onclick="location.href='signup.php'">Sign Up</button>
    </div>
</div>

</body>
</html>

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        overflow: hidden; /* Prevent scrolling */
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

    .hero-section {
        position: relative;
        height: 100vh;
        overflow: hidden; /* Prevent scrolling */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .content {
        z-index: 2;
        text-align: center;
        color: white;
    }

    .hero-section::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('https://res.cloudinary.com/practicaldev/image/fetch/s--BuPz-p40--/c_imagga_scale,f_auto,fl_progressive,h_420,q_auto,w_1000/https://dev-to-uploads.s3.amazonaws.com/uploads/articles/nphrgz8yfnjylrwfr0yl.png');
        background-size: cover;
        background-position: center;
        opacity: 0.5;
        z-index: 1;
    }
</style>

<script>
    // You can add JavaScript code here if needed
</script>
