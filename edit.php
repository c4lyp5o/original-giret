<?php
include "conn.php"; // Using database connection file here
$id = $_GET['id']; // get id through query string
$qry = mysqli_query($mysql,"select * from patient where id='$id'"); // select query
$data = mysqli_fetch_array($qry); // fetch data
if(isset($_POST['update'])) // when click on Update button
{
    $nama = $_POST['nama']; // get Nama
    $ic = $_POST['ic_num']; // get IC
    $telefon = $_POST['tel_no']; // get Telefon
    $the_sex = $_POST['the_sex']; // get Sex
    $edit = mysqli_query($mysql,"update patient set Nama='$nama', IC='$ic', Telephone='$telefon', Sex='$the_sex' where id='$id'");	
    if($edit)
    {
        mysqli_close($mysql); // Close connection
        header("location:success.php"); // redirects to success page
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>
!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
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
<nav class="navbar fixed-top navbar-light bg-dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="home.php?id=<?=$_SESSION['id']?>" style="color:white">Go Back Home</a>
  </div>
</nav>
<br><br><br>
<h3>Update Data</h3>
<form method="POST">
  <h2>Gi-Ret Cloud Entry</h2>
  Nama: <input type="text" name="nama" value="<?php echo $data['Nama']?>" style="width: 400px;" required>
  <br><br>
  I/C: <input type="number" name="ic_num" value="<?php echo $data['IC']?>" required>
  <br><br>
  Telefon: <input type="number" name="tel_no" value="<?php echo $data['Telephone']?>" required>
  <br><br>
  Sex: <input <?=$data['Sex']=="male" ? "checked" : ""?> name="the_sex" type="radio" value="male" /> Male <input <?=$data['Sex']=="female" ? "checked" : ""?> name="the_sex" type="radio" value="female" /> Female<br><br>
<p>I, consent</p>
<input checked="checked" name="consent" type="radio" value="yes" /> Yes <input name="consent" type="radio" value="yesnt" /> NO<br />
<br><br>
  Student's Name: <input type="text" name="st_name" style="width: 400px;">
  <br><br>
  <h2>HISTORY</h2>
  Complaint:<br><textarea cols="20" name="complaint" rows="5" style="width: 100%;"></textarea><br>
  MH:<br><textarea cols="20" name="mh" rows="5" style="width: 400px;"></textarea><br>
  DH:<br><textarea cols="20" name="dh" rows="5" style="width: 400px;"></textarea><br>
  SH:<br><textarea cols="20" name="sh" rows="5" style="width: 400px;"></textarea><br>
  OHPB:<br><textarea cols="20" name="ohpb" rows="5" style="width: 400px;"></textarea><br><br>
  <h2>CLINICAL EXAMINATION</h2>
  <p><strong>Extra Oral</strong></p>
  Face:<br><textarea cols="20" name="face" rows="5" style="width: 400px;"></textarea><br>
  Lips:<br><textarea cols="20" name="lips" rows="5" style="width: 400px;"></textarea><br>
  TMJ:<br><textarea cols="20" name="tmj" rows="5" style="width: 400px;"></textarea><br>
  Sub LN:<br><textarea cols="20" name="sub_ln" rows="5" style="width: 400px;"></textarea><br>
  Others:<br><textarea cols="20" name="others" rows="5" style="width: 400px;"></textarea><br><br>
  <p><strong>Intra Oral</strong></p>
  SOC:<br><textarea cols="20" name="soc" rows="5" style="width: 400px;"></textarea><br>
  Mucosa:<br><textarea cols="20" name="mucosa" rows="5" style="width: 400px;"></textarea><br>
  Gingiva:<br><textarea cols="20" name="ggv" rows="5" style="width: 400px;"></textarea><br>
  OH:<br><textarea cols="20" name="oh" rows="5" style="width: 400px;"></textarea><br>
  Occlusion:<br><textarea cols="20" name="occl_u" rows="5" style="width: 400px;"></textarea><br><br>
<p><strong>BPE</strong></p>
<table class="unstyledTable">
<tbody>
<tr>
<td><input type="number" name="sek1" style="width: 30px;"></td><td><input type="number" name="sek2" style="width: 30px;"></td><td><input type="number" name="sek3" style="width: 30px;"></td></tr>
<tr>
<td><input type="number" name="sek6" style="width: 30px;"></td><td><input type="number" name="sek5" style="width: 30px;"></td><td><input type="number" name="sek4" style="width: 30px;"></td></tr>
</tbody>
</tr>
</table><br><br>
<img src="chart.jpeg" alt="Charting" style="width:1000px;height:600px;"><br><br>
<h2><strong>INVESTIGATION</strong></h2>
<p><strong>DIAGNOSIS</strong></p>
1.<textarea cols="20" name="dx1" rows="5" style="width: 400px;"></textarea><br>
2.<textarea cols="20" name="dx2" rows="5" style="width: 400px;"></textarea><br>
3.<textarea cols="20" name="dx3" rows="5" style="width: 400px;"></textarea><br><br>
<p><strong>Treatment Plan</strong></p>
1. Emergency<br><textarea cols="20" name="tx_er" rows="5" style="width: 400px;"></textarea><br>
2. Temporary<br><textarea cols="20" name="tx_temp" rows="5" style="width: 400px;"></textarea><br>
3. Definitive<br><textarea cols="20" name="tx_def" rows="5" style="width: 400px;"></textarea><br><br>
<h2><strong>REFERRAL</strong></h2>
<textarea cols="20" name="refer" rows="5" style="width: 400px;"></textarea><br><br>
<p>Screening approved</p>
<p>Name of supervisor</p>
<input type="text" name="super_screen" style="width: 400px;"><br><br>
<h2>TREATMENT RECORD</h2>
<table class="unstyledTable">
<tbody>
<tr>
<td>Date</td><td>Treatment</td><td>Student's name</td></tr>
<tr>
<td><input type="date" name="date1"></td><td><textarea cols="20" name="tx_his1" rows="5" style="width: 400px;"></textarea></td><td><input type="text" name="nama_his1" style="width: 400px;"></td></tr>
<tr>
<td><input type="date" name="date2"></td><td><textarea cols="20" name="tx_his2" rows="5" style="width: 400px;"></textarea></td><td><input type="text" name="nama_his2" style="width: 400px;"></td></tr>
<tr>
<td><input type="date" name="date3"></td><td><textarea cols="20" name="tx_his3" rows="5" style="width: 400px;"></textarea></td><td><input type="text" name="nama_his3" style="width: 400px;"></td></tr>
<tr>
<td><input type="date" name="date4"></td><td><textarea cols="20" name="tx_his4" rows="5" style="width: 400px;"></textarea></td><td><input type="text" name="nama_his4" style="width: 400px;"></td></tr>
</tbody>
</tr>
</table><br>
<p>Treatment approved</p>
<p>Name of supervisor</p>
<input type="text" name="super_tx" style="width: 400px;"><br><br><br>
<input type="submit" name="update" value="Update">
</form>