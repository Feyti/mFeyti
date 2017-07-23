<?php
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

if ($row['nda'] == "true") {
	# code...
if ($row['blacklist'] == "true") {
	# code...
	echo '[{"text":"Your drug is Registered and Blacklisted with National Drug Authority. Thank You for verifying with Mfeyti"}]';
}else if ($row['blacklist'] == "false") {
	# code...
	echo '[{"text":"Your drug is Registered with National Drug Authority and good for use. Thank You for verifying with Mfeyti"}]';
}else{
	echo '[{"text":"Your drug verification failed. Please retry verifying with Mfeyti"}]';
}

}else if ($row['nda'] == "false") {
	# code...
	if ($row['blacklist'] == "true") {
	# code...
	 echo '[{"text":"Your drug is not registered with National Drug Authority but is not Blacklisted with National Drug Authority . Thank You for verifying with Mfeyti"}]';

}else if ($row['blacklist'] == "false") {
	# code...
	echo '[{"text":"Your drug is neither Registered nor Blacklisted with National Drug Authority. Thank You for verifying with Mfeyti"}]';
}else{
		echo '[{"text":"Your drug verification failed. Please retry verifying with Mfeyti"}]';
}

}

       

    }

}else{
	echo '[{"text":"Your drug verification failed,Drug not yet registered. Please retry verifying with Mfeyti"}]';

}

$conn->close();

 ?>
