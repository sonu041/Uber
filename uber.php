<?php
/*  Uber Price Tracker
    Developer: Shuvankar Sarkar
    Date: 20-Nov-2018
*/
$ch = curl_init();
$url = "https://api.uber.com/v1.2/estimates/price";
$server_token = "Enter Server Token from Uber Dashboard";
$start_latitude = "22.641469";
$start_longitude = "88.408814";
$end_latitude = "22.581640";
$end_longitude = "88.487682";
$vars = "start_latitude=$start_latitude&start_longitude=$start_longitude".
        "&end_latitude=$end_latitude&end_longitude=$end_longitude";
curl_setopt($ch, CURLOPT_URL,$url.'?'.$vars);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = [
    'Authorization: Token '.$server_token,
    'Accept-Language: en_US',
    'Content-Type: application/json'
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$server_output = curl_exec ($ch);
curl_close ($ch);
$data = json_decode($server_output,true);

/*foreach($data['prices'] as $item) {
    print $item['display_name'];
    print ' - ';
    print $item['estimate'];
}*/
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Uber Price Tracker by Shuvankar Sarkar</title>
  </head>
  <body>
    <h1>Uber Price Tracker</h1>
    <h3>Developed by Shuvankar Sarkar</h3>

    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Car</th>
          <th scope="col">Price Range</th>
        </tr>
      </thead>
      <tbody>
          <?php foreach($data['prices'] as $item) {
            echo "<tr>";
              echo "<td>".$item['display_name']."</td>";
              echo "<td>".$item['estimate']."</td>";
            echo "</tr>";
          } ?>
      </tbody>
    </table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
