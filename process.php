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
    <title>Data Submitted</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<style>
  body {
            background-color: #eee;
        }
</style>
<body>
<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand">MDC HOME</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDark" aria-controls="navbarDark" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse show" id="navbarDark">
      <ul class="navbar-nav me-auto mb-2 mb-xl-0">
        <li class="nav-item">
          <a class="nav-link" href="form.php?id=<?=$_SESSION['id']?>">Add Patient</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display.php?id=<?=$_SESSION['id']?>">View Patients</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="search.php?id=<?=$_SESSION['id']?>">Search Patients</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Log Out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php
include_once 'count.php';
if(isset($_POST['submit']))
{	 
	 $nama = $_POST['gi_nama'];
	 $umur = $_POST['gi_umur'];
	 $kelas = $_POST['gi_kelas'];
	// $the_sex = $_POST['gi_enrolmen'];
	 $sql = "INSERT INTO tadika (Nama,Umur,Kelas) VALUES ('$nama','$umur','$kelas')";
	 if (mysqli_query($mysql, $sql)) {
        $last_id = mysqli_insert_id($mysql);
	 } else {
		echo "Error: " . $sql . " 
		" . mysqli_error($mysql);
	 }
	 mysqli_close($mysql);
}
?>
<br><br><h1 class="text-center">New patient record successfully keyed in!</h1>
</body>
</html>