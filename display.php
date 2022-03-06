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
	<title>Display all patient</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<style>
	@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap');

body {
	background-color: #eee
}

.search {
    top: 6px;
    left: 10px
}

.form-control {
    border: none;
    padding-left: 32px
}

.form-control:focus {
    border: none;
    box-shadow: none
}

.green {
    color: green
}

.wrapper {
    text-align: center;
}

.button {
    position: absolute;
    top: 50%;
}
</style>
<body>
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
<br><br>
<div class="container mt-5 px-2">
    <div class="table-responsive">
        <table class="table table-responsive table-borderless">
            <thead>
                <tr class="bg-light">
                    <th scope="col" width="5%">#</th>
                    <th scope="col" width="20%">Name</th>
                    <th scope="col" width="20%">Umur</th>
                    <th scope="col" width="5%"></th>
                    <th scope="col" width="5%"></th>
                </tr>
            </thead>
            <tbody>
			<?php
								include "count.php"; // Using database connection file here
								$records = mysqli_query($mysql,"select * from tadika"); // fetch data from database
								$rowcount = 1;
								while($data = mysqli_fetch_array($records))
								{
								?>
								<tr>
									<td><?php echo $rowcount; ?></td>
									<td><?php echo $data['Nama']; ?></td>
									<td><?php echo $data['Umur']; ?></td>
									<td><button type="button" class="btn btn-success" onclick="location.href='nuedit.php?id=<?php echo $data['id']; ?>'">Edit</button></td>
									<td><button type="button" class="btn btn-danger" onclick="location.href='delete.php?id=<?php echo $data['id']; ?>'">Delete</button></td>
									<?php $rowcount++; ?>
								</tr>
								<?php
								}
								?>
            </tbody>
        </table>
    </div>
</div>
</body>
<br><br>
<div class="wrapper">
	<button type="button" class="btn btn-info" onclick="location.href='export.php';">Export to Excel</button><br>
</div>
<br>
<br>
</html>