<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn, $sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn, $sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount) < 0) {
        echo '<script type="text/javascript">';
        echo ' alert("Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }



    // constraint to check insufficient balance.
    else if ($amount > $sql1['balance']) {

        echo '<script type="text/javascript">';
        echo ' alert("Insufficient Balance!! Transaction Cancelled")';  // showing an alert box.
        echo '</script>';
    }



    // constraint to check zero values
    else if ($amount == 0) {

        echo "<script type='text/javascript'>";
        echo "alert('Zero value cannot be transferred!')";
        echo "</script>";
    } else {

        // deducting amount from sender's account
        $newbalance = $sql1['balance'] - $amount;
        $sql = "UPDATE users set balance=$newbalance where id=$from";
        mysqli_query($conn, $sql);


        // adding amount to reciever's account
        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE users set balance=$newbalance where id=$to";
        mysqli_query($conn, $sql);

        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "<script> alert('Transaction is Successful !!');
                                     window.location='transactions-details.php';
                           </script>";
        }

        $newbalance = 0;
        $amount = 0;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details & Transfer Money</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <style type="text/css">
        button {
            border: none;
            background: #d9d9d9;
        }

        button:hover {
            background-color: green;
            transform: scale(1.1);
            color: aliceblue;
        }
    </style>

</head>

<body>

    <style>
        #hide {
            position: absolute;
            overflow: hidden;
            z-index: 2400;
            right: 375px;
            display: block;
            top: 32px !important;
            margin-bottom: 30px;
        }

        .tble1{
            color: aqua;
        }

        .card {
            margin: auto;
            width: 600px;
            padding: 3rem 3.5rem;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            background-color: inherit;
        }

        .mt-50 {
            margin-top: 50px
        }

        .mb-50 {
            margin-bottom: 50px
        }

        @media(max-width:767px) {
            .card {
                width: 90%;
                padding: 1.5rem
            }
        }

        @media(height:1366px) {
            .card {
                width: 90%;
                padding: 8vh
            }
        }

        .card-title {
            color: white;
            font-weight: 700;
            font-size: 2.5em
        }

        .active {
            border-bottom: 2px solid black;
            font-weight: bold
        }


        form .row {
            margin: 0;
            overflow: hidden
        }

        form .row-1 {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 0.5rem;
            outline: none;
            width: 100%;
            min-width: unset;
            border-radius: 5px;
            background-color: rgba(221, 228, 236, 0.301);
            border-color: rgba(221, 228, 236, 0.459);
            margin: 2vh 0;
            overflow: hidden
        }

        form .row-2 {
            border: none;
            outline: none;
            background-color: transparent;
            margin: 0;
            padding: 0 0.8rem
        }

        form .row .row-2 {
            border: none;
            outline: none;
            background-color: transparent;
            margin: 0;
            padding: 0 0.8rem
        }

        form .row .col-2,
        .col-10,
        .col-3 {
            display: flex;
            align-items: center;
            text-align: center;
            padding: 0 1vh
        }

        form .row .col-2 {
            padding-right: 0
        }

        #card-header {
            color: white;
            font-weight: bold;
            font-size: 0.9rem
        }

        #card-inner {
            font-size: 0.7rem;
            color: gray
        }

        .three .col-10 {
            padding-left: 0
        }

        .three {
            overflow: hidden;
            justify-content: space-between
        }

        .three .col-2 {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 0.5rem;
            outline: none;
            width: 100%;
            min-width: unset;
            border-radius: 5px;
            background-color: rgba(221, 228, 236, 0.301);
            border-color: rgba(221, 228, 236, 0.459);
            margin: 2vh 0;
            width: fit-content;
            overflow: hidden
        }

        .three .col-2 input {
            font-size: 0.7rem;
            margin-left: 1vh
        }

        .btn {
            width: 100%;
            background-color: rgb(65, 202, 127);
            border-color: rgb(65, 202, 127);
            color: white;
            justify-content: center;
            padding: 2vh 0;
            margin-top: 3vh
        }

        .btnnew {
            cursor: pointer;
            background-color: rgb(65, 202, 127);
            border-color: rgb(65, 202, 127);
            color: white;
            width: 300px;
            justify-content: center;
            padding: 2vh 0;
            margin-top: 13vh;
            border-radius: .25rem;
        }

        input:focus::-webkit-input-placeholder {
            color: transparent
        }

        input:focus:-moz-placeholder {
            color: transparent
        }

        input:focus::-moz-placeholder {
            color: transparent
        }

        input:focus:-ms-input-placeholder {
            color: transparent
        }
    </style>

    <div class="wrapper">
        <!-- Navigation bar-->
        <div class="nav">
            <div class="logo">
                <h4>GRIP Bank</h4>
            </div>
            <div class="links">
                <a href="index.html" class="mainlink">Home</a>
                <a href="customers.php">View Customers</a>
                <a href="#">FAQ</a>
                <a href="#">About Us</a>
                <a href="#">Contact Us</a>
            </div>
        </div>

        <div id="blr" class="container">
            <h2 class="text-center pt-4" style="color : white;">Customer Account Details</h2>
            <?php
            include 'config.php';
            $sid = $_GET['id'];
            $sql = "SELECT * FROM  users where id=$sid";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo "Error : " . $sql . "<br>" . mysqli_error($conn);
            }
            $rows = mysqli_fetch_assoc($result);
            ?>

            <div class="card mt-50 mb-50">
                <div class="tble1">
                    <table class="table table-striped table-condensed table-bordered">
                        <tr style="color : white;">
                            <th class="text-center">Account No.</th>
                            <td class="py-2"><?php echo $rows['id'] ?></td>
                        </tr>
                        <tr style="color : white;">
                            <th class="text-center">Account Name</th>
                            <td class="py-2"><?php echo $rows['name'] ?></td>
                        </tr>
                        <tr style="color : white;">
                            <th class="text-center">E-mail</th>
                            <td class="py-2"><?php echo $rows['email'] ?></td>
                        </tr>
                        <tr style="color : white;">
                            <th class="text-center">Account Balane(in Rs.)</th>
                            <td class="py-2"><?php echo $rows['balance'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div id="hide">
            <div class="card mt-50 mb-50">
                <div class="card-title mx-auto"> Make Payment </div>
                <form method="post" name="tcredit" class="tabletext">
                    <span id="card-header">Transfer To:</span>
                    <div class="row row-1">
                        <div class="col-2"><img class="img-fluid" src="https://img.icons8.com/office/48/000000/user.png"></div>
                        <div class="col-10"> <select name="to" class="form-control" required>
                                <option value="" disabled selected>Choose account</option>
                                <?php
                                include 'config.php';
                                $sid = $_GET['id'];
                                $sql = "SELECT * FROM users where id!=$sid";
                                $result = mysqli_query($conn, $sql);
                                if (!$result) {
                                    echo "Error " . $sql . "<br>" . mysqli_error($conn);
                                }
                                while ($rows = mysqli_fetch_assoc($result)) {
                                ?>
                                    <option class="table" value="<?php echo $rows['id']; ?>">

                                        <?php echo $rows['name']; ?>
                                        (A/C No:
                                        <?php echo $rows['id']; ?> )

                                    </option>
                                <?php
                                }
                                ?>
                                <div>
                            </select>
                        </div>
                    </div>
                    <span id="card-header">Amount:</span>
                    <div class="row row-1">
                        <div class="col-2"><img class="img-fluid" src="https://img.icons8.com/color/48/000000/rupee--v1.png" /></div>
                        <div class="col-10"> <input type="number" class="form-control" name="amount" required> </div>
                    </div>
                    <button class="btn d-flex mx-auto" name="submit" type="submit" id="myBtn"><b>Send</b></button>
                </form>
            </div>
        </div>

        <input name="btnnew" class="btnnew d-flex mx-auto" type="button" value="Send Money" id="bt" onclick="toggle(this)">
    </div>


    <div class="footer">
        <h2>&copy;2021 Sourav Mondal</h2>
        <div class="footerlinks">
            <a href="index.html" class="mainlink">Home</a>
            <a href="#">FAQ</a>
            <a href="#">About Us</a>
            <a href="#">Contact Us</a>
        </div>
    </div>
    </div>


    <script type="text/javascript">
        var cont = document.getElementById('hide');
        cont.style.display = 'none';
        var element = document.getElementById("blr");

        function toggle(ele) {
            var cont = document.getElementById('hide');
            if (cont.style.display == 'block') {
                cont.style.display = 'none';
                element.classList.toggle("container1");
                document.getElementById(ele.id).value = 'Send Money';
            } else {
                cont.style.display = 'block';
                document.getElementById(ele.id).value = 'Cancel Payment';
                element.classList.toggle("container1");
            }
        }
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>