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


<?php
    include 'config.php';
    if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $balance=$_POST['balance'];
    $sql="insert into users(name,email,balance) values('{$name}','{$email}','{$balance}')";
    $result=mysqli_query($conn,$sql);
    if($result){
               echo "<script> alert('Whooopee! New user created');
                               window.location='make_transaction.php';
                     </script>";
                    
    }
  }
?>

<body>
 <section id="call-to-action">
      <div class="container text-center" data-aos="zoom-in">
        <h3>Create User</h3>
</div>
</section>
        <section>
            <div class="usercontainer">
                <div class="activities-grid">
                    <div class="login-box">
                        <ion-icon class="user-login-img" name="person-circle"></ion-icon>
                        <form class="app-form" method="post">
                            <div class="textbox">
                            <input class="app-form-control" placeholder="NAME" type="text" name="name" required>
                            </div>
                            
                            <div class="textbox">
                            <input class="app-form-control" placeholder="EMAIL" type="email" name="email" required>
                            </div>
                            <div class="textbox">
                            <input class="app-form-control" placeholder="BALANCE" type="number" name="balance" required>
                            </div>
                            <br>
                            <div class="button">
                            <input class="submit-btn" type="submit" value="CREATE" name="submit"></input>
                            <input class="reset-btn" type="reset" value="RESET" name="reset"></input>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>





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
