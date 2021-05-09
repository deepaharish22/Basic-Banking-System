<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
   <link href="css/style.css" rel="stylesheet">
</head>

<body style="background-image: url('img/transaction.jpg');background-repeat: no-repeat; background-size: 100% 130%;font-size:100%;">
<div class="container">
        <h2 class="text-center" style="color:black;font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode',  Verdana, sans-serif;">Transfer your money instantly to other user</h2>
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
         
            $account=$_GET['acc'];
            $sql = "SELECT * FROM  customers where acc=$account";
            $result=mysqli_query($conn,$sql);
            if(!$result)
            {
                echo "Error : ".$sql."<br>".mysqli_error($conn);
            }
            $rows=mysqli_fetch_assoc($result);
        ?>
    <form method="post" name="tcredit" class="tabletext" ><br>
        <div class="row row-content">
            <div class="col-12 col-sm-6">
                <div class="card align-self-center" id="sender">
                    <h3 class="card-header bg-danger text-white"><i class="fa fa-arrow-circle-up"></i> SENDER DETAILS</h3>
                    <div class="card-body text-info">
                        <form class=" form-inline justify-content-center">
                            <div class="form-group row">
                                <label for="acc" class="col-sm-4 col-form-label">Account No</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="acc" value="<?php echo $rows['acc'] ?>">
                                </div>    
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="name" value="<?php echo $rows['name'] ?>">
                                </div>    
                            </div>   
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label">Emailid</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="email" value="<?php echo $rows['emailid'] ?>">
                                </div>    
                            </div>   
                            <div class="form-group row">
                                <label for="balance" class="col-sm-4 col-form-label">Balance</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="balance" value="<?php echo $rows['balance'] ?>">
                                </div>    
                            </div>
                        </form>
                        <!--<table class="table table-dark table-striped table-condensed table-bordered">
                        <thead >
                        <tr>
                            <th class="text-center">Account Number</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Balance</th>
                        </tr>         
                        </thead>
                            <tr>
                                <td class="py-2"><?php echo $rows['acc'] ?></td>
                                <td class="py-2"><?php echo $rows['name'] ?></td>
                                <td class="py-2"><?php echo $rows['emailid'] ?></td>
                                <td class="py-2"><?php echo $rows['balance'] ?></td>
                            </tr>
                        </table>-->
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="card align-self-center" id="receiver">
                    <h3 class="card-header bg-success border-warning text-white"><i class="fa fa-arrow-circle-down"></i> RECEIVER DETAILS</h3>
                    <div class="card-body text-info">
                        <form class="form-inline justify-content-center" method="post">
                            <div class="form-group row">
                                <label for="transfer" class="col-sm-2 col-form-label">Transfer</label>
                                <div class="offset-sm-2 col-sm-7">
                                    <select name="to" class="form-control" required>
                                    <option value="" disabled selected>Choose</option>
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
                                            
                                            $ac=$_GET['acc'];
                                            $sql = "SELECT * FROM customers where acc!=$ac";
                                            $result=mysqli_query($conn,$sql);
                                            if(!$result)
                                            {
                                                echo "Error ".$sql."<br>".mysqli_error($conn);
                                            }
                                            while($rows = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <option class="table" value="<?php echo $rows['acc'];?>" >
                                        
                                            <?php echo $rows['name'] ;?> 
                                            (Balance: 
                                            <?php echo $rows['balance'] ;?> ) 
                                    
                                        </option>
                                    <?php 
                                        } 
                                    ?>
                                    </select>
                                </div>  
                            </div> <br><br><br>
                            <div class="form-group row">
                                <label  for="amount" class="col-sm-1 col-form-label">Amount</label>
                                <div class="offset-sm-3 col-sm-7">
                                    <input type="number" class="form-control" id="amount" name="amount" required>  
                                </div>
                            </div> 
                            
                        <br>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="approve" id="approve" value="" required>
                                    <label class="form-check-label" for="approve">
                                        Are you sure to proceed with the transaction?
                                    </label>
                                </div>
                            </div><br><br><br>
                            <div class="offset-5">
                                <button type="submit" name="submit" class="btn btn-primary" id="myBtn">Transfer</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
    </form>
        </div>
    

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

if(isset($_POST['submit']))
{
    $from = $_GET['acc'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customers where acc=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from customers where acc=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);


    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';
        echo '</script>';
    }


  
    
    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")'; 
        echo '</script>';
    }
    


   
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        $newbalance = $sql1['balance'] - $amount;
        $sql = "UPDATE customers set balance=$newbalance where acc=$from";
        mysqli_query($conn,$sql);
        

        
        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE customers set balance=$newbalance where acc=$to";
        mysqli_query($conn,$sql);
        
        

        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        $sql = "INSERT INTO transfer_history(sender, receiver, amount) VALUES ('$sender','$receiver','$amount')";
        $query=mysqli_query($conn,$sql);

        if($query){
                //echo "<script> alert('Transaction Successful');
                  //              window.location='transferhistory.php';
                    //</script>";
                echo '<script>
                    swal({title:"Done!",text: "Transaction Successful!",type:"success"}).then (function(){
                        window.location.href="transferhistory.php";});
                     </script> ';
                 
        }
        else
       {
    
           echo '<script>
           swal("Error!", "Error Occured!", "error");
          </script>';
       }
        $newbalance= 0;
        $amount =0;
        }
    
}
?>
</div>
   <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
   <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>