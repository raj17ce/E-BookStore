<?php
session_start();
if (!isset($_SESSION['username']))
    header("location: login.php?Message=Login To Continue");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Books">
    <meta name="author" content="Shivangi Gupta">
    <title> Description</title>
    <!-- Bootstrap -->
    <link href="../CSS/bootstrap.min.css" rel="stylesheet">
    <link href="../CSS/custom.css" rel="stylesheet">

    <style>
        @media only screen and (width: 768px) {
            body {
                margin-top: 150px;
            }
        }

        @media only screen and (max-width: 760px) {
            #books .row {
                margin-top: 10px;
            }
        }

        .ft-row {
            width: 60%;
            text-align: center;
            margin-inline: auto;
            display: flex;
            justify-content: center;
        }

        .tag {
            display: inline;
            float: left;
            padding: 2px 5px;
            width: auto;
            background: #F5A623;
            color: #fff;
            height: 23px;
        }

        .tag-side {
            display: inline;
            float: left;
        }

        #books {
            border: 1px solid #DEEAEE;
            margin-bottom: 20px;
            padding-top: 30px;
            padding-bottom: 20px;
            background: #fff;
            margin-left: 10%;
            margin-right: 10%;
        }

        #description {
            border: 1px solid #DEEAEE;
            margin-bottom: 20px;
            padding: 20px 50px;
            background: #fff;
            margin-left: 10%;
            margin-right: 10%;
        }

        #description hr {
            margin: auto;
        }

        #service {
            background: #fff;
            padding: 20px 10px;
            width: 112%;
            margin-left: -6%;
            margin-right: -6%;
        }

        .glyphicon {
            color: #D67B22;
        }
    </style>

</head>

<body>

    <div id="top">
        <div id="searchbox" class="container-fluid" style="width:112%;margin-left:-6%;margin-right:-6%;">
            <div>
                <form role="search" action="./result.php" method="post">
                    <input type="text" name="keyword" class="form-control"
                        placeholder="Search for a Book , Author Or Category"
                        style="width:80%;margin:20px 10% 20px 10%;">
                </form>
            </div>
        </div>
    </div>


    <?php
    include "./config.php";
    $PID = $_GET['ID'];
    $query = "SELECT * FROM products WHERE PID='$PID'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $path = "../img/books/" . $row['PID'] . ".jpg";
            $target = "./cart.php?ID=" . $PID . "&";
            echo '
  <div class="container-fluid" id="books">
    <div class="row">
      <div class="col-sm-10 col-md-6">
                          <div class="tag">' . $row["Discount"] . '%OFF</div>
                         <img class="center-block img-responsive" src="' . $path . '" height="550px" style="padding:20px;">
      </div>
      <div class="col-sm-10 col-md-4 col-md-offset-1">
        <h2> ' . $row["Title"] . '</h2>
                                <span style="color:#00B9F5;">
                                 #' . $row["Author"] . '&nbsp &nbsp #' . $row["Publisher"] . '
                                </span>
        <hr>
                                <span style="font-weight:bold;"> Quantity : </span>';
            echo '
                                <select id="quantity">';
            for ($i = 1; $i <= $row['Available']; $i++)
                echo '<option value="' . $i . '">' . $i . '</option>';

            echo ' </select>';
            echo '                           <br><br><br>
                                <a id="buyLink" href="' . $target . '" class="btn btn-lg btn-danger" style="padding:15px;color:white;text-decoration:none;">
                                    ADD TO CART for Rs ' . $row["Price"] . ' <br>
                                    <span style="text-decoration:line-through;"> RS' . $row["MRP"] . '</span>
                                    | ' . $row["Discount"] . '% discount
                                 </a>

      </div>
    </div>
          </div>
     ';
            echo '
          <div class="container-fluid" id="description">
    <div class="row">
      <h2> Description </h2>
                        <p>' . $row['Description'] . '</p>
                        <pre style="background:inherit;border:none;">
   PRODUCT CODE  ' . $row["PID"] . '   <hr>
   TITLE         ' . $row["Title"] . ' <hr>
   AUTHOR        ' . $row["Author"] . ' <hr>
   AVAILABLE     ' . $row["Available"] . ' <hr>
   PUBLISHER     ' . $row["Publisher"] . ' <hr>
   EDITION       ' . $row["Edition"] . ' <hr>
   LANGUAGE      ' . $row["Language"] . ' <hr>
   PAGES         ' . $row["page"] . ' <hr>
   WEIGHT        ' . $row["weight"] . ' <hr>
                        </pre>
    </div>
  </div>
';
        }
    }
    echo '</div>';
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(function () {
            var link = $('#buyLink').attr('href');
            $('#buyLink').attr('href', link + 'quantity=' + $('#quantity option:selected').val());
            $('#quantity').on('change', function () {
                $('#buyLink').attr('href', link + 'quantity=' + $('#quantity option:selected').val());
            });
        });
    </script>
</body>

</html>