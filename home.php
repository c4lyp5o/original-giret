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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    <title>Gi-Ret Cloud HOME</title>
</head>
<style>
  body {
            background-color: #eee;
        }
        </style>
<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
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
        <li class="nav-item">
          <a class="nav-link" href="generate.php?id=<?=$_SESSION['id']?>">Reten Generation</a>
        </li>
      </ul>
      <button class="btn btn-primary" onclick="location.href='logout.php';">Log Out</button>
    </div>
  </div>
</nav>
<br>
<h1 class="text-center">Hello There</h1>
<p class="text-center">Welcome to the MDC Home Page</p>
<p class="text-center">You are logged in as <?=$_SESSION['name']?></p>
<p class="text-center">Your ID is <?=$_SESSION['id']?></p>
<p class="text-center">There are <?php include 'count.php';
    $counttd="SELECT id FROM tadika";
    if ($result=mysqli_query($mysql,$counttd)){
    // Return the number of rows in result set
    $rowcount=mysqli_num_rows($result);
    printf("%d",$rowcount);
    ?><?php
    // Free result set
    mysqli_free_result($result);
    }
    ?> entries in the database!</p>
</html>