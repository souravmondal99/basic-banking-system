<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transfer History</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <div class="wrapper">
    <div class="nav">
      <div class="logo">
        <h4>GRIP Bank</h4>
      </div>
      <div class="links">
        <a href="index.php" class="mainlink">Home</a>
        <a href="customers.php">View Customers</a>
        <a href="#">FAQ</a>
        <a href="#">About Us</a>
        <a href="#">Contact Us</a>
      </div>
    </div>
    <div class="container">
      <h2 class="text-center pt-4" style="color : white;">Transfer History</h2>

      <br>
      <div class="table-responsive-sm">
        <table class="table table-hover table-striped table-condensed table-bordered">
          <thead style="color : white;">
            <tr>
              <th class="text-center">S.No.</th>
              <th class="text-center">Sender</th>
              <th class="text-center">Receiver</th>
              <th class="text-center">Amount</th>
              <th class="text-center">Date & Time</th>
            </tr>
          </thead>
          <tbody>
            <?php

            include 'config.php';

            $sql = "select * from transaction";

            $query = mysqli_query($conn, $sql);

            while ($rows = mysqli_fetch_assoc($query)) {
            ?>

              <tr style="color : white;">
                <td class="py-2"><?php echo $rows['sno']; ?></td>
                <td class="py-2"><?php echo $rows['sender']; ?></td>
                <td class="py-2"><?php echo $rows['receiver']; ?></td>
                <td class="py-2"><?php echo $rows['balance']; ?> </td>
                <td class="py-2"><?php echo $rows['datetime']; ?> </td>

              <?php
            }

              ?>
          </tbody>
        </table>

      </div>
    </div>

    <div class="footer">
      <h2>&copy;2021 Sourav Mondal</h2>
      <div class="footerlinks">
        <a href="index.php" class="mainlink">Home</a>
        <a href="#">FAQ</a>
        <a href="#">About Us</a>
        <a href="#">Contact Us</a>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>