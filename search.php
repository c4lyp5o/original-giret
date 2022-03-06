<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gi-Ret Cloud SEARCH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<body>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:weight@100;200;300;400;500;600;700;800&display=swap");

        body {
            background-color: #eee;
        }

        .height {
            height: 100vh
        }

        .search {
            position: relative;
            box-shadow: 0 0 40px rgba(51, 51, 51, .1)
        }

        .search input {
            height: 60px;
            text-indent: 25px;
            border: 2px solid #d6d4d4
        }

        .search input:focus {
            box-shadow: none;
            border: 2px solid blue
        }

        .search .fa-search {
            position: absolute;
            top: 20px;
            left: 16px
        }

        .search button {
            position: absolute;
            top: 5px;
            right: 5px;
            height: 50px;
            width: 110px;
            background: blue;
}</style>
<nav class="navbar fixed-top navbar-expand-xl navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand">Gi-Ret Cloud HOME</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDark" aria-controls="navbarDark" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse show" id="navbarDark">
      <ul class="navbar-nav me-auto mb-2 mb-xl-0">
        <li class="nav-item">
          <a class="nav-link" href="nuform.php?id=<?=$_SESSION['id']?>">Add Patient</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display.php?id=<?=$_SESSION['id']?>">View Patients</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="search.php?id=<?=$_SESSION['id']?>">Search Patients</a>
        </li>
      </ul>
      <button class="btn btn-primary" onclick="location.href='logout.php';">Log Out</button>
    </div>
  </div>
</nav>
<div class="container">
    <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-8">
        <form action="hpcr.php" method="post">
            <div class="search"> <i class="fa fa-search"></i> <input type="text" name=search class="form-control" placeholder="Search patient by name.."> <button class="btn btn-primary">Search</button> </div>
        </form>
        </div>
    </div>
</div>   
    </body>
</html>