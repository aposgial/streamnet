<?php
    $con= new mysqli('localhost','root','','streamnet');

    if (!$con)
    {
        die(mysqli_error($con));
    }
?>