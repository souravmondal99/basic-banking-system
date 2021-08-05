<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customers Details</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <div class="wrapper">
    <?php
    include 'config.php';
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    ?>

    <div class="nav">
      <div class="logo">
        <h4>GRIP Bank</h4>
      </div>
      <div class="links">
        <a href="index.php" class="mainlink">Home</a>
        <a href="transactions-details.php">Transaction History</a>
        <a href="#">FAQ</a>
        <a href="#">About Us</a>
        <a href="#">Contact Us</a>
      </div>
    </div>

    <div class="container">
      <h2 class="text-center pt-4" style="color : white;">Customer Details</h2>
      <br>
      <div class="row">
        <div class="col">
          <div class="table-responsive-sm">
            <table class="table table-hover table-sm table-striped table-condensed table-bordered" style="border-color:white;">
              <thead style="color : white;">
                <tr>
                  <th scope="col" class="text-center py-2">Account no.</th>
                  <th scope="col" class="text-center py-2">Account holder's name</th>
                  <th scope="col" class="text-center py-2">Email ID</th>
                  <th scope="col" class="text-center py-2">Account Balance(in Rs.)</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($rows = mysqli_fetch_assoc($result)) {
                ?>
                  <tr style="color : white;">
                    <td class="py-2"><?php echo $rows['id'] ?></td>
                    <td class="py-2"><?php echo $rows['name'] ?></td>
                    <td class="py-2"><?php echo $rows['email'] ?></td>
                    <td class="py-2"><?php echo $rows['balance'] ?></td>
                    <td><a href="user-details.php?id= <?php echo $rows['id']; ?>"> <button type="button" class="btn">View Details</button></a></td>
                  </tr>
                <?php
                }
                ?>

              </tbody>
            </table>
          </div>
        </div>
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

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>