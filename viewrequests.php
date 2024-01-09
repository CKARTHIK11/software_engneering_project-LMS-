<?php
    session_start();
    if($_SESSION['login']!=true) {
        header("Location:http://localhost/LMS/index.php"); 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="x.css"> -->
    <!-- <title>NITC Library</title> -->
    <style>
        @import url("https://fonts.googleapis.com/css?family=Raleway:400,700");
        @import url("https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&family=Poppins:wght@400;500;600&display=swap");
        *{
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: "Poppins", sans-serif;
        }
        body {
        background-image: url("bg.jpg");
        /* background-size: cover; */
        margin: 0;
        font-family: "Poppins", sans-serif;
        font-size: 10px;
        line-height: 2;
        }
        h1{
            font-family: "Poppins", sans-serif;
            font-size:50px !important;
        }
        .navbar-brand{
            font-size:25px !important;
        } 
        table,
        th,
        td {
        border: 1px solid black;
        }

        table {
        width: 100%;
        }
        .details {
        border: 2px solid #555;
        border-radius: 10px;
        font-size: medium;
        text-align: center;
        display: block;
        min-width: 500px;
        background-color: #fcfcfc;
        padding: 10px;
        width:50%;
        margin:auto;
        }

        .box {
        /* margin-left: 400px; */
        margin:auto;
        padding: 100px 100px;
        }

    </style> 
    <title>MAHINDRA UNIVERSITY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</head>
<body>
    <!-- <div class="head">
        <img src="nit.png">
        <h1>NITC LIBRARY</h1>
    </div>
    <ul>
        <li><a class="active" href="adminhome.php">Home</a></li>
        <li><a href="viewrequests.php">View Requests</a></li>
        <li><a href="addbook.php">Add Book</a></li>
        <li><a href="viewissued.php">Currently Issued</a></li>
        <li><a href="viewrecommended.php">View Recommended</a></li>
        <li><a href="passadmin.php">Change Password</a></li>
        <li><a href="logoutgate.php">Logout</a></li>
    </ul> -->
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <img src="QT-Mahindra-University.jpg" alt="Logo" width=60px  height=70px class="d-inline-block align-text-top">
            </a>
            <h1 >MAHINDRA UNIVERSITY</h1>
        </div>
        <!-- <div><h1>NITC LIBRARY</h1></div> -->
    </nav>
    <nav class="navbar navbar-dark navbar-expand bg-dark ">
        <div class="container-fluid">
            <a class="navbar-brand" href="adminhome.php">ADMIN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="viewrequests.php">View Requests</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="addbook.php">Add Book</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="viewissued.php">Currently Issued</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="viewrecommended.php">View Recommended</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="passadmin.php">Change Password</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="logoutgate.php">Logout</a>
                </li>
                <!-- <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
                </li> -->
            </ul>
            </div>
        </div>
    </nav>
    <div class="box">
        <div class="details">
            <?php
                $conn=mysqli_connect('localhost','root','','library');
                $sql1="select * from issue_request where admin_response=''";
                $res1=$conn->query($sql1);
                $sql2="select * from return_request where admin_response=''";
                $res2=$conn->query($sql2);
                $sql3="select * from renew_request where admin_response=''";
                $res3=$conn->query($sql3);
                echo "<h3> ISSUE REQUESTS </h3>";
                    echo "<table class='t1'>";
                        echo "<tr>";
                            echo "<th>";echo "Student ID"; echo "</th>";
                            echo "<th>";echo "Book ID"; echo "</th>";
                            echo "<th>";echo "Accept Request"; echo "</th>";
                            echo "<th>";echo "Reject Request"; echo "</th>";
                        echo "</tr>";
                        while($row1=mysqli_fetch_array($res1))
                        {
                            echo "<tr>";
                                echo "<td>";echo $row1['Sid']; echo "</td>";
                                echo "<td>";echo $row1['Bid']; echo "</td>";
                                echo '<td> 
                                        <form action="request.php" method="post">
                                            <input type="hidden" name="s_id" value="'.$row1['Sid'].'">
                                            <input type="hidden" name="b_id" value="'.$row1['Bid'].'">
                                            <button type="submit" class="btn btn-lg active butt" name="accept" value="ACCEPT">ACCEPT</button>
                                        </form>
                                    </td>';
                                echo '<td> 
                                        <form action="request.php" method="post">
                                            <input type="hidden" name="s_id1" value="'.$row1['Sid'].'">
                                            <input type="hidden" name="b_id1" value="'.$row1['Bid'].'">
                                            <button type="submit" name="reject" value="REJECT">REJECT</button>
                                        </form>
                                    </td>';
                            echo "</tr>";
                        }
                        echo "</table>";
                        echo "<br/><br/>";
                        echo "<h3> RETURN REQUESTS </h3>";
                        echo "<table class='t1'>";
                        echo "<tr>";
                            echo "<th>";echo "Student ID"; echo "</th>";
                            echo "<th>";echo "Book ID"; echo "</th>";
                            echo "<th>";echo "Accept"; echo "</th>";
                        echo "</tr>";
                        while($row2=mysqli_fetch_array($res2))
                        {
                            echo "<tr>";
                                echo "<td>";echo $row2['Sid']; echo "</td>";
                                echo "<td>";echo $row2['Bid']; echo "</td>";
                                echo '<td> 
                                        <form action="request.php" method="post">
                                            <input type="hidden" name="s_idq" value="'.$row2['Sid'].'">
                                            <input type="hidden" name="b_idq" value="'.$row2['Bid'].'">
                                            <button type="submit" name="accept_return" value="ACCEPT">ACCEPT</button>
                                        </form>
                                    </td>';
                                
                                
                            echo "</tr>";
                        }
                    echo "</table>";

                    echo "<br/><br/>";	
                    echo "<h3> RENEW REQUESTS </h3>";
                    echo "<table class='t1'>";
                        echo "<tr>";
                            echo "<th>";echo "Student ID"; echo "</th>";
                            echo "<th>";echo "Book ID"; echo "</th>";
                            echo "<th>";echo "Accept Request"; echo "</th>";
                            echo "<th>";echo "Reject Request"; echo "</th>";
                        echo "</tr>";
                        while($row3=mysqli_fetch_array($res3))
                        {
                            echo "<tr>";
                                echo "<td>";echo $row3['Sid']; echo "</td>";
                                echo "<td>";echo $row3['Bid']; echo "</td>";
                                echo '<td> 
                                        <form action="request.php" method="post">
                                            <input type="hidden" name="s_idr" value="'.$row3['Sid'].'">
                                            <input type="hidden" name="b_idr" value="'.$row3['Bid'].'">
                                            <button type="submit" class="btn btn-lg active butt" name="accept_renew" value="ACCEPT">ACCEPT</button>
                                        </form>
                                    </td>';
                                echo '<td> 
                                        <form action="request.php" method="post">
                                            <input type="hidden" name="s_idr1" value="'.$row3['Sid'].'">
                                            <input type="hidden" name="b_idr1" value="'.$row3['Bid'].'">
                                            <button type="submit" class="btn btn-lg active butt2" name="reject_renew" value="REJECT">REJECT</button>
                                        </form>

                                    </td>';
                                
                            echo "</tr>";
                        }
                    echo "</table>";
                    ?>
        </div>
    </div>
</body>
</html>