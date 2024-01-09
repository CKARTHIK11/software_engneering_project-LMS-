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
            <a class="navbar-brand" href="home.php">STUDENT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="yourdetails.php">Your Details</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="search.php">Search/View books</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="issued.php">Issued</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="recommend.php">Recommend</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="responses.php">View Responses</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="change.php">Change Password</a>
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
            <h3>SEARCH</h3>
            <form action="#" method="post">
                <input type="text" placeholder="Search book by name" name="bname" id="" >
                <input type="text" placeholder="Search book by author" name="author" id="" >
                <input type="submit" value="Search" name="Search">
            </form>
            <?php
                if(isset($_POST['Search'])){
                    $bname=$_POST['bname'];
                    $author=$_POST['author'];
                    $conn=new mysqli('localhost','root','','library');
                    $sqls="SELECT * FROM books WHERE bname='$bname' or bauthor='$author'";
                    $res=$conn->query($sqls);
                    echo "<table>";
                    echo "<tr>";
                        echo "<th>";echo "BOOKID";echo "</th>";
                        echo "<th>";echo "BOOK NAME";echo "</th>";
                        echo "<th>";echo "BOOK AUTHOR";echo "</th>";
                        echo "<th>";echo "QUANTITY";echo "</th>";
                        echo "<th>";echo "ISSUE";echo "</th>";
                    echo "</tr>";
                    while($b=mysqli_fetch_array($res)){
                        echo "<tr>";
                            echo "<th>";echo $b['bid'];echo "</th>";
                            echo "<th>";echo $b['bname'];echo "</th>";
                            echo "<th>";echo $b['bauthor'];echo "</th>";
                            echo "<th>";echo $b['Copies'];echo "</th>";
                            if($b['Copies']!=0){
                                echo '<td> 
                                    <form action="request.php" method="post">	
                                        <input type="hidden" name="book_id" value="'.$b['bid'].'">

                                        <button class="noselect" type="submit" name="issue" value="ISSUE">ISSUE</button>
                                    </form>
                                </td>';
                            }
                            else if($b['Copies']==0){
                                echo "<td>";echo "<input type='submit' name='issue_red' value='ISSUE'>"; echo "</td>";
                            }
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            ?>
        </div>
    </div>
</body>
</html>
