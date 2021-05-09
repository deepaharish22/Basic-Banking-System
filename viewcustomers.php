<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
    <link href="css/style.css" rel="stylesheet">
</head>
  
    <body style="background-color:#0b253e; background-size: 100% 130%;font-size:100%;">
    <nav class="navbar navbar-dark navbar-expand-sm fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="Navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item "><a class="nav-link" href="./index.html"><span class="fa fa-home fa-lg"></span> Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="./aboutus.html"><span class="fa fa-info fa-lg"></span> About</a></li>
                    <li class="nav-item active"><a class="nav-link" href="#"><span class="fa fa-list fa-lg"></span> View all Customers</a></li>
                    <li class="nav-item"><a class="nav-link" href="./transferhistory.php"><span class="fa fa-history fa-lg"></span> Transaction History</a></li>
                    <li class="nav-item"><a class="nav-link" href="./contactus.html"><span class="fa fa-address-card fa-lg"></span> Contact Us</a></li>
                </ul> 
                <div class="head ml-auto">
                    <a href="#" class="tile socialmedia"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="tile socialmedia"><i class="fa fa-facebook-official"></i></a>
                    <a href="#" class="tile socialmedia"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="tile socialmedia"><i class="fa fa-twitter-square"></i></a>
                    <div class="tile burger">
                        <div class="meat">
                            <div class="line one"></div>
                            <div class="line two"></div>
                            <div class="line three"></div>
                            <div class="line four"></div>
                        </div>
                    </div>
                </div>
            </div>          
        </div>
    </nav>
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ol class="col-12 breadcrumb">
                    <li class="breadcrumb-item"><a href="./index.html">Home</a></li>
                    <li class="breadcrumb-item active">View all Customers</li>
                </ol>
               <h3></h3>
               <hr>
            </div> 
        </div>
        <marquee><h2 style="font-style:italic;font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">This page shows all User Accounts.Choose a Sender from the list.</h2></marquee>
       
<?php
{
$host='localhost';
$username='root';
$password='';
$dbname='bankingsystem';

// Create connection
$conn = mysqli_connect($host, $username ,$password, $dbname);
// Check connection
if (!$conn) 
{
  die("Connection failed:".mysqli_connect_error());
}

$sql = "SELECT * FROM customers";
$result = mysqli_query($conn,$sql);

echo "<table border='2' class='table table-dark table-hover table-striped'>
<tr>
<th>Account Number</th>
<th>Name</th>
<th>Emailid</th>
<th>Phone Number</th>
<th>City</th>
<th>State</th>
<th>Balance</th>
<th>Transaction</th>
</tr>";

for (;$row=mysqli_fetch_assoc($result);)
{ 
    echo "<tr>";
    echo "<td>" . $row['acc']. "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['emailid'] . "</td>";
    echo "<td>" . $row['mobilenumber']. "</td>";
    echo "<td>" . $row['city']. "</td>";
    echo "<td>" . $row['state'] . "</td>";
    echo "<td>" . $row['balance']. "</td>";
    echo "<td>" ?><a href='http://localhost/basicbankingsystem/transfer.php? acc= <?php echo $row['acc'] ;?>'>  <button type="button" class="btn btn-danger btn-sm' data-toggle='button">Click here to transfer</button></a>
    <?php
    echo"</td>";
    echo "</tr>";
} 
echo "</table>";

mysqli_close($conn);
}
?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>