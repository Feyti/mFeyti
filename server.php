<?php

//connection

$host ='localhost';

$user ='root';

$password = '';

$database ='testdb';





// Create connection

$conn = new mysqli($host, $user, $password,$database);



// Check connection

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

//echo "Connected successfully";



//recieve the database

$sql = "SELECT * FROM drugs WHERE batch_number = '".$_GET["batch"]."'";

$result = $conn->query($sql);



//check the db for comparison



if ($result->num_rows > 0) {

    // output data of each row

    while($row = $result->fetch_assoc()) {

        echo '[{"text":"Your drug is registered with National Drug Authority and good for use. Thank You for verifying with Mfeyti"}]';

    }

}  else if (condition) {
	  while($row = $result->fetch_assoc()) {


        echo '[{"text":"Your drug is not Blacklisted  with National Drug Authority. Please consult a Phamarcist for more Information. Thank You for verifying with Mfeyti"}]';
    }

} else {

   echo '[{"text":"Your drug is not regcognized by National Drug Authority and maynot be good for your health !"}]';


}

$conn->close();



//get result



//send back response





 ?>
