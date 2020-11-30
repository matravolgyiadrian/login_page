<?php
$credentials = array();
$secrets = array();
$encode_variables = [5, -14, 31, -9, 3];

function process_data(){
  $user = $_POST["username"];
  $password = $_POST["password"];

  decode();
  authentication($user, $password);
}

function authentication($user, $password){
  global $credentials;
  global $secrets;

  if(array_key_exists($user, $credentials)){
    if($credentials[$user] == $password){
      load_db();
      echo $secrets[$user];
    } else{
      echo -2;
    }
  } else{
    echo -1;
  }
}

function decode()
{
  global $encode_variables;
  global $credentials;
  $file = fopen("password.txt", "r") or die("Cannot open password.txt");
  while(!feof($file))
  {
    $line = fgets($file);
    $line = str_replace("\n", "", $line);
    $decoded_line = "";

    for($i = 0; $i < strlen($line); $i++)
    {
        $decoded_line .= chr(ord($line[$i]) - $encode_variables[$i % count($encode_variables)]);
    }

    $credential = explode('*', $decoded_line);
    $credentials[$credential[0]] = $credential[1];
  }

  fclose($file);
}

function load_db(){
  global $secrets;

  $connection = mysqli_connect("localhost", "root", "admin", "adatok") or die("Couldn't connect to the database!");
  $sql = "Select Username, Titkos from tabla";
  $result = mysqli_query($connection, $sql);
  while($row = mysqli_fetch_row($result)){
    $secrets[$row[0]] = $row[1];
  }
}

process_data();
exit;
?>
