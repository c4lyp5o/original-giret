
<?php

//php_spreadsheet_export.php

include 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;


$connect = new PDO("mysql:host=localhost;dbname=mdc", "root", "");


$query = "SELECT * FROM patient ORDER BY id DESC";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

if(isset($_POST["export"]))
{
  $file = new Spreadsheet();

  $active_sheet = $file->getActiveSheet();

  $active_sheet->setCellValue('A1', 'Nama');
  $active_sheet->setCellValue('B1', 'IC');
  $active_sheet->setCellValue('C1', 'Telephone');
  $active_sheet->setCellValue('D1', 'Sex');

  $count = 2;

  foreach($result as $row)
  {
    $active_sheet->setCellValue('A' . $count, $row["Nama"]);
    $active_sheet->setCellValue('B' . $count, $row["IC"]);
    $active_sheet->setCellValue('C' . $count, $row["Telephone"]);
    $active_sheet->setCellValue('D' . $count, $row["Sex"]);

    $count = $count + 1;
  }

  $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, $_POST["file_type"]);

  $file_name = 'CRA-' . time() . '.' . strtolower($_POST["file_type"]);

  ob_end_clean();

  $writer->save($file_name);

  header('Content-Type: application/x-www-form-urlencoded');

  header('Content-Transfer-Encoding: Binary');

  header("Content-disposition: attachment; filename=\"".$file_name."\"");

  readfile($file_name);

  unlink($file_name);

  exit;

}

?>
<!DOCTYPE html>
<html>
   <head>
     <title>Export Data From Mysql to Excel using PHPSpreadsheet</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   </head>
   <body>
     <div class="container">
      <br />
      <h3 align="center">Export Data From Mysql to Excel using PHPSpreadsheet</h3>
      <br />
        <div class="panel panel-default">
          <div class="panel-heading">
            <form method="post">
              <div class="row">
                <div class="col-md-6">User Data</div>
                <div class="col-md-4">
                  <select name="file_type" class="form-control input-sm">
                    <option value="Xlsx">Xlsx</option>
                    <option value="Xls">Xls</option>
                    <option value="Csv">Csv</option>
                  </select>
                </div>
                <div class="col-md-2">
                  <input type="submit" name="export" class="btn btn-primary btn-sm" value="Export" />
                </div>
              </div>
            </form>
          </div>
          <div class="panel-body">
          <div class="table-responsive">
           <table class="table table-striped table-bordered">
                <tr>
                  <th>Nama</th>
                  <th>IC</th>
                  <th>Telephone</th>
                  <th>Sex</th>
                </tr>
                <?php

                foreach($result as $row)
                {
                  echo '
                  <tr>
                    <td>'.$row["Nama"].'</td>
                    <td>'.$row["IC"].'</td>
                    <td>'.$row["Telephone"].'</td>
                    <td>'.$row["Sex"].'</td>
                  </tr>
                  ';
                }
                ?>

              </table>
          </div>
          </div>
        </div>
     </div>
      <br />
      <br />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  </body>
</html>