<?php
include("config.php");

$error_array = array(); //Holds error messages
$tracking_nunber = "";
$tracks = array(); //holds all the track number from the database

if(isset($_POST["track_container_form"]))//checking if the form is submitted
{
    if(isset($_POST['tracking_number']))//checking if the tracking number value was filled up. 
    {
        $tracking_nunber = strip_tags($_POST['tracking_number']);

        $sql = "SELECT tracking_number AS track FROM containers";
        $query = mysqli_query($con, $sql);
        $count = 0;

        while($row = mysqli_fetch_assoc($query))
        {
            $tracks[$count] = $row['track'];//assigns the tracking number from the databse to the array
            $count ++;
        }

        if(in_array($tracking_nunber, $tracks)) //if the tracking number exist in the array of tracking numbers
        {
            $_SESSION['track_number'] = $tracking_nunber; // creates a session that carries the specific tracking number
            header("Location: container_details.php");//redirects to the container details page
            exit();// exits the current page
        }
        else{//else if tracking number is not found
            array_push($error_array,  "Invalid Track Number");// produce the error message "Invalid track number"
        }
    }
    else{
        array_push($error_array, "The tracking number is not set");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Container</title>
    <link rel="stylesheet" href="track.css">
</head>
<body>
<div class="header">
            <div id="logo"> LOGO</div>
                <div>
                    <ul>
                        <li><a href="C:\xampp\htdocs\myFirstSite-master\firstSite.html">HOME</a> </li>
                        
                    </ul>   
                </div>
    </div>
    <div id="hr"></div>





    <h1>TRACK YOUR CONTAINER</h1>
    
    <div class="info">
        <form action="track.php" method="post">
            <label for="Tracking Number"></label>
            <input type="text" name="tracking_number"  size="40px" placeholder="Enter your tracking number" autocomplete="off"><br>
            <span style="color: red;">
            <?php if(in_array("Invalid Track Number", $error_array)) echo "Invalid Track Number<br>"; ?>
            <?php if(in_array("The tracking number is not set", $error_array)) echo "Tracking Number Cannot be Empty<br>"; ?>
           </span><br>
            <button type="submit" name="track_container_form">Track</button>
        </form>
    </div>
</body>
</html>