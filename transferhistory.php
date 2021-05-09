<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer History</title>

     <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
   <link href="css/style.css" rel="stylesheet">
</head>

<body style="background-image:url('./img/history1.jpg'); background-repeat:no-repeat; background-position:center;background-size:cover;height: 680px; width:100%;">

<nav class="navbar navbar-dark navbar-expand-sm fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="Navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item "><a class="nav-link" href="./index.html"><span class="fa fa-home fa-lg"></span> Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="./aboutus.html"><span class="fa fa-info fa-lg"></span> About</a></li>
                    <li class="nav-item"><a class="nav-link" href="./viewcustomers.php"><span class="fa fa-list fa-lg"></span> View all Customers</a></li>
                    <li class="nav-item active"><a class="nav-link" href="#"><span class="fa fa-history fa-lg"></span> Transaction History</a></li>
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
                    <li class="breadcrumb-item active">Transaction history</li>
                </ol>
               <h3></h3>
               <hr>
            </div> 
        </div>

        
        <h2 class="text-center pt-4" style="color:black;font-style:italic;font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">Transfer History</h2>
        
       <br>
       
        <div class="table-responsive-sm">
        <table class="table table-hover table-striped table-condensed table-bordered " style="color:#303C6C;background-color:#FCE181;">
        <thead class="thead-dark">
            <tr>
                <th class="text-center" style="color:#FCE181; background-color:#0b253e;">TRANSACTION ID</th>
                <th class="text-center" style="color:#F3D250; background-color:#0b253e">SENDER</th>
                <th class="text-center" style="color:#F3D250; background-color:#0b253e">RECEIVER</th>
                <th class="text-center" style="color:#F3D250; background-color:#0b253e">AMOUNT</th>
                <th class="text-center" style="color:#F3D250; background-color:#0b253e">DATE & TIME</th>
            </tr>
        </thead><b>
        <tbody>
        <?php

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


            $sql ="select * from transfer_history";

            $query =mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
        ?>

            <tr>
            <td class="py-1"><?php echo $rows['id']; ?> </td>
            <td class="py-2"><?php echo $rows['sender']; ?></td>
            <td class="py-2"><?php echo $rows['receiver']; ?></td>
            <td class="py-2"><?php echo $rows['amount']; ?> </td>
            <td class="py-2"><?php echo $rows['date_time']; ?> </td>
            </tr>    
        <?php
            }

        ?></b>
        </tbody>
    </table>
            </div>
       </div>

       
</div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>