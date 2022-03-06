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
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit Patient Record</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
<nav class="navbar sticky-top navbar-light bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php?id=<?=$_SESSION['id']?>" style="color:white">Go Back Home</a>
    <button class="btn btn-primary" name="update" type="submit" form="dental_check" value="update">Submit</button>
  </div>
</nav>
<form method="post" id="dental_check" name="dental_check">
<div class="accordion" id="accordionBasic" style="padding-left=80px">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Details and History
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionBasic">
      <div class="accordion-body">
      <div class="row">
      <div class="col">
        <label for="formControlInput" class="form-label">Nama</label>
        <input type="text" class="form-control" id="formControlInput" name="nama" value="<?php echo $data['Nama']?>" required><br>
        <label for="formControlInput" class="form-label">IC Number</label>
        <input type="number" class="form-control" id="formControlInput" name="ic_num" value="<?php echo $data['IC']?>" style="width: 400px;" required><br>
        <label for="formControlInput" class="form-label">Contact Number</label>
        <input type="number" class="form-control" id="formControlInput" name="tel_no" value="<?php echo $data['Telephone']?>" style="width: 400px;" required><br>
        <label for="formControlInput" class="form-label">Sex</label><br>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="the_sex" <?=$data['Sex']=="male" ? "checked" : ""?> value="male">
        <label class="form-check-label" for="inlineRadioChecked">Male</label>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="the_sex" <?=$data['Sex']=="female" ? "checked" : ""?> value="female">
        <label class="form-check-label" for="inlineRadioDefault">Female</label>
        </div><br><br>
        <label for="formControlInput" class="form-label">I, hereby, consent for my treatment</label><br>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="consent" id="inlineRadioChecked" checked="" value="yes">
        <label class="form-check-label" for="inlineRadioChecked">Yes</label>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="consent" id="inlineRadioDefault" value="yesnt">
        <label class="form-check-label" for="inlineRadioDefault">No</label>
        </div><br><br>
        <label for="formControlInput" class="form-label">Student's Name</label>
        <input type="text" class="form-control" id="formControlInput" name="st_name"><br>
        </div>
        <div class="col">
        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Complaint</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="complaint"></textarea>
        <label for="exampleFormControlTextarea1" class="form-label">Medical History</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="mh"></textarea>
        <label for="exampleFormControlTextarea1" class="form-label">Dental History</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="dh"></textarea>
        <label for="exampleFormControlTextarea1" class="form-label">Social History</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="sh"></textarea>
        <label for="exampleFormControlTextarea1" class="form-label">OHPB</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ohpb"></textarea>
        </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Clinical Examination
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionBasic">
      <div class="accordion-body">
      <div class="row">
      <div class="col">
        <strong><h2>Extra Oral</h2></strong><br>
        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Face</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ext_face"></textarea>
        <label for="exampleFormControlTextarea1" class="form-label">Lips</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ext_lips"></textarea>
        <label for="exampleFormControlTextarea1" class="form-label">Temporo Mandibular Joint</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ext_tmj"></textarea>
        <label for="exampleFormControlTextarea1" class="form-label">Sub LN</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ext_subln"></textarea>
        <label for="exampleFormControlTextarea1" class="form-label">Others</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ext_others"></textarea>
        </div>
            </div>
            <div class="col">
            <strong><h2>Intra Oral</h2></strong><br>
            <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">SOC</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="soc"></textarea>
        <label for="exampleFormControlTextarea1" class="form-label">Mucosa</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="muco_sa"></textarea>
        <label for="exampleFormControlTextarea1" class="form-label">Gingiva</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="gingiva"></textarea>
        <label for="exampleFormControlTextarea1" class="form-label">OH</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="o_h"></textarea>
        <label for="exampleFormControlTextarea1" class="form-label">Occlusion</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="occ_lu"></textarea>
        </div>
        </div>
        <div class="row">
      <div class="col">
          </div>
          <div class="col">
          <label for="exampleFormControlTextarea1" class="form-label">BPE</label>
        <div class="container mt-3">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td><input type="number" class="form-control" id="formControlInput" name="sek1"></td>
                    <td><input type="number" class="form-control" id="formControlInput" name="sek2"></td>
                    <td><input type="number" class="form-control" id="formControlInput" name="sek3"></td>
                </tr>
                <tr>
                    <td><input type="number" class="form-control" id="formControlInput" name="sek4"></td>
                    <td><input type="number" class="form-control" id="formControlInput" name="sek5"></td>
                    <td><input type="number" class="form-control" id="formControlInput" name="sek6"></td>
                </tr>
                </tbody>
            </table>
            </div>
            </div>
            <div class="col">
          </div>
            </div>
        <img src="chart.jpeg" alt="Charting">
        </div>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Investigation
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionBasic">
      <div class="accordion-body">
      <div class="row">
      <div class="col">
      <strong><h2>Diagnosis</h2></strong><br>
            <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">First Diagnosis</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="dx_1"></textarea>
        <label for="exampleFormControlTextarea1" class="form-label">Second Diagnosis</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="dx_2"></textarea>
        <label for="exampleFormControlTextarea1" class="form-label">Third Diagnosis</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="dx_3"></textarea>
        </div>
        <strong><h2>Treatment Plan</h2></strong><br>
            <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Emergency</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tx_emerg"></textarea>
        <label for="exampleFormControlTextarea1" class="form-label">Temporary</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tx_temp"></textarea>
        <label for="exampleFormControlTextarea1" class="form-label">Definitive</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tx_def"></textarea>
        </div>
        <h2>Referral</h2><br>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="referral"></textarea><br>
        <p>Screening approved</p>
        <label for="formControlInput" class="form-label">Name of Supervisor</label>
        <input type="text" class="form-control" id="formControlInput" name="super_screen"><br>
        </div>
        <div class="col">
        <strong><h2>Treatment Record</h2></strong><br>
        <div class="container mt-3">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Treatment</th>
                    <th>Student's Name</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><input type="date" name="date1"></td>
                    <td><textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tx_his1"></textarea></td>
                    <td><input type="text" class="form-control" id="formControlInput" name="nama_his1"><br></td>
                </tr>
                <tr>
                    <td><input type="date" name="date2"></td>
                    <td><textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tx_his2"></textarea></td>
                    <td><input type="text" class="form-control" id="formControlInput" name="nama_his2"><br></td>
                </tr>
                <tr>
                    <td><input type="date" name="date3"></td>
                    <td><textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tx_his3"></textarea></td>
                    <td><input type="text" class="form-control" id="formControlInput" name="nama_his3"><br></td>
                </tr>
                <tr>
                    <td><input type="date" name="date4"></td>
                    <td><textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tx_his4"></textarea></td>
                    <td><input type="text" class="form-control" id="formControlInput" name="nama_his4"><br></td>
                </tr>
                </tbody>
            </table>
            </div>
            <br><p>Treatment approved</p>
            <p>Name of supervisor</p>
            <input type="text" class="form-control" id="formControlInput" name="super_tx">
            <input type="hidden" id="localTime" name="localTime">
            <input type="hidden" id="localhours" name="localhours">
            <input type="hidden" id="localmins" name="localmins">
            <input type="hidden" id="localsec" name="localsec">
        </div>
      </div>
    </div>
  </div>
</div>
</form>
</body>
</html>