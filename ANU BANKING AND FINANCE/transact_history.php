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
    
           <!-- ======= Call To Action Section ======= -->
 <section id="call-to-action">
      <div class="container text-center" data-aos="zoom-in">
        <h3>Transaction History</h3>
        <div class="row about-cols">
</section>
<br><br>
        <section>
            <div class="container">
                <div class="activities-grid">
                    <table>
                        <thead>
                            <tr id="header">
                                <th>S NO</th>
                                <th>SENDER</th>
                                <th>RECEIVER</th>
                                <th>AMOUNT</th>
                                <th>TIME</th>
                            </tr>
                        </thead>

                        <tbody class="t-body">
                            <?php

                                include 'config.php';

                                $sql = "select * from transaction";

                                $query = mysqli_query($conn, $sql);

                                while ($rows = mysqli_fetch_assoc($query)) {
                            ?>

                            <tr>
                                <td><?php echo $rows['sno']; ?></td>
                                <td><?php echo $rows['sender']; ?></td>
                                <td><?php echo $rows['receiver']; ?></td>
                                <td><?php echo $rows['balance']; ?> </td>
                                <td><?php echo $rows['datetime']; ?> </td>

                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </main>
    <br><br>

    <!--Ion Icons-->
	<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <!--Our own javascript-->
    <script type="text/javascript" src="scripts.js"></script>
</body>
</html>
