<?php
include("config.php");
$sql = "SELECT * FROM containers WHERE tracking_number = {$_SESSION['track_number']}"; // gets the details of the container usin the session track number from the previous page
$query = mysqli_query($con, $sql);
$result = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Container_details</title>
    <link rel="stylesheet" href="container_details.css">
</head>
<body>
    <!-- this is for the header section -->
<div class="header">
            <div id="logo"> LOGO</div>
                <div>
                    <ul>
                        <li class="home"><a href="track.php">BACK</a> </li>
                        
                    </ul>   
                </div>
    </div> 
    <div id="hr"></div>

<!--this is for the container details section  -->
    <h1>Here is your Container Details</h1>
<div id="details">
    <ul>
        <li><span>tracking_number: </span>               <?php echo $result['tracking_number'];?></li>
        <li><span>content: </span>                        <?php echo $result['content']; ?></li>
        <li><span>Recievers Name: </span>                  <?php echo $result['reciever_name']; ?></li>
        <li><span>Recievers Address:  </span>             <?php echo $result['reciever_address']; ?></li>
        <li><span>Recievers Contact:  </span>             <?php echo $result['reciever_contact']; ?></li>
        <li><span>Ship date:   </span>                     <?php echo $result['ship_date']; ?></li>
        <li><span>Estimated Date of Delivery:</span>      <?php echo $result['est_date_for_delivery']; ?></li>
        <li><span>Status:   </span>                       <?php echo $result['status']; ?></li>
    </ul>
    </div>
    <br>
    <a href="track.php">Back</a>
</body>
</html>