 <?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "sprucecoteriedb";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM login";
$result=mysqli_query($conn,$sql);
if(!$result)
{
	echo"failed bruh";
};
$datas = array();
while($row = mysqli_fetch_assoc($result))
{
	$datas[] = $row['date'];
}
$final = array();
for($i = 0;$i<12;$i++)
{
  $final[$i] = 0;
}
for ($i=0; $i <$result->num_rows; $i++) {
  // code...
switch ($datas[$i][5].$datas[$i][6]) {
  case '01':
    // code...
    $final[0] = $final[0]+1;
    break;
    case '02':
      // code...
      $final[1] = $final[1]+1;
      break;
    case '03':
        // code...
        $final[2] = $final[2]+1;
        break;
    case '04':
          // code...
          $final[3] = $final[3]+1;
          break;
    case '05':
            // code...
      $final[4] = $final[4]+1;
            break;
    case '06':
              // code...
              $final[5] = $fina[5]+1;
              break;
    case '07':
                // code...
            $final[6] = $final[6]+1;
                break;
    case '08':
                  // code...
                  $final[7] = $final[7]+1;
                  break;
    case '09':
                  // code...
                    $final[8] = $final[8]+1;
                    break;
    case '10':
                      // code...
                      $final[9] = $final[9]+1;
                      break;
    case '11':
                        // code...
                        $final[10] = $final[10]+1;
                        break;
    case '12':
                          // code...
                          $final[11] = $final[11]+1;
                          break;

  default:
    // code...
    break;
}

}
print_r(json_encode($final));
?>
