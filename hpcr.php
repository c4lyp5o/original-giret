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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Search result</title>
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
<nav class="navbar sticky-top navbar-light bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php?id=<?=$_SESSION['id']?>" style="color:white">Go Back Home</a>
  </div>
</nav>
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
                include "count.php";
                $name = $_POST["search"];
                //$query = "SELECT * FROM employees
                // WHERE first_name LIKE '%{$name}%' OR last_name LIKE '%{$name}%'";
                // Check connection
                if (mysqli_connect_errno())
                {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                $key = "SELECT * FROM tadika WHERE nama LIKE '%{$name}%'";
                $result = mysqli_query($mysql, $key);
                $rowcount=mysqli_num_rows($result);
                if ($rowcount == 0) {
                    echo "<br>";
                    echo "<tr><td colspan='5'><center>No result found</center></td></tr>";
                }
                else {
                    while($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['Nama']."</td>";
                        echo "<td>".$row['Umur']."</td>";
                        echo "<td><a href='nuedit.php?id=".$row['id']."' class='btn btn-primary'>Edit</a></td>";
                        echo "<td><a href='delete.php?id=".$row['id']."' class='btn btn-danger'>Delete</a></td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>