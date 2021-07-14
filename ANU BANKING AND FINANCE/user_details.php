<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Hey there! No negativity here")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Oooops! Your balance is insufficient")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('No null values here!')";
         echo "</script>";
     }


    else {
        
                // deducting amount from sender's account
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             

                // adding amount to reciever's account
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Money transfer Successful!');
                                     window.location='transact_history.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>


<!doctype html>
<html lang="en">
<head>
    <title>Anu Banking and Finance</title>
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="others/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="others/vendor/aos/aos.css" rel="stylesheet">
  <link href="others/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="others/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="others/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="others/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!--Our own stylesheet-->
    <link href="others/css/style.css" rel="stylesheet">


</head>

<body>
	

    <main>
       <section id="call-to-action">
      <div class="container text-center" data-aos="zoom-in">
        <h3>Transaction</h3>
     </section>
     <br><br>
            <?php
            include 'config.php';
            $sid = $_GET['id'];
            $sql = "SELECT * FROM  users where id='$sid'";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo "Error : " . $sql . "<br>" . mysqli_error($conn);
            }
            $rows = mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext"><br>
                <div class="container">
                    <div class="activities-grid">
                        <table>
                            <tr id="header">
                                <th>ID</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>BALANCE</th>
                            </tr>
                            <tr class="t-body">
                                <td><?php echo $rows['id'] ?></td>
                                <td><?php echo $rows['name'] ?></td>
                                <td><?php echo $rows['email'] ?></td>
                                <td><?php echo $rows['balance'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="container">
                    <div class="activities-grid">
                        <div class="transfer-label">
                            <label><b class="user-trans">TRANSFER TO</b></label>
                            <select name="to" class="form-control" required>
                                <option value="" disabled selected>select</option>
                                <?php
                                include 'config.php';
                                $sid = $_GET['id'];
                                $sql = "SELECT * FROM users where id!='$sid'";
                                $result = mysqli_query($conn, $sql);
                                if (!$result) {
                                    echo "Error " . $sql . "<br>" . mysqli_error($conn);
                                }
                                while ($rows = mysqli_fetch_assoc($result)) {
                                ?>
                                    <option class="table" value="<?php echo $rows['id']; ?>">

                                        <?php echo $rows['name']; ?> (Balance:
                                        <?php echo $rows['balance']; ?> )
                                    </option>
                                <?php
                                }
                                ?>
                                <div>
                            </select>
                            <br>
                            <br>
                            <label><b class="user-amt">AMOUNT</b></label>
                            <input type="number" class="form-control" name="amount" required>
                            <br><br>
                            <div class="text-center">
                                <button class="trans-btn-user" name="submit" type="submit">TRANSFER</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </section>
    </main>
    <br><br>

	



    <!--Ion Icons-->
	<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <!--Our own javascript-->
    <script type="text/javascript" src="scripts.js"></script>

     <!-- Vendor JS Files -->
  <script src="others/vendor/aos/aos.js"></script>
  <script src="others/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="others/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="others/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="others/vendor/php-email-form/validate.js"></script>
  <script src="others/vendor/purecounter/purecounter.js"></script>
  <script src="others/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="others/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="others/js/main.js"></script>
</body>
</html>
