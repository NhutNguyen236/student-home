<?php
$address = $_POST["address"];
$category = $_POST["category"];
$size= $_POST["size"];
$price = $_POST["price"];
$priceElectric= $_POST["priceElectric"];
$priceWater= $_POST["priceWater"];
$description = $_POST["description"];
$id_contact = 1;

$target_dir = "uploads/";
$target_file = $target_dir . $_FILES["fileToUpload"]["name"];

if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	die("Sorry, there was an error uploading your file.");
}

require "connection.php";

if (empty($_POST["id"])) {
	$sql = "INSERT INTO nha(address, category, size, price, priceElectric, priceWater, description, image, id_contact) 
	VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ssiiiissi", $address, $category, $size, $price, $priceElectric , $priceWater, $description, $target_file, $id_contact);
} else {
	$sql = "UPDATE nha SET address=?, category=?, size=?, price=?, priceElectric= ?, priceWater=?, description=?, image=? WHERE id=" . $_POST["id"];
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ssiss", $address, $category, $size, $price, $priceElectric, $priceWater, $description, $target_file);
}



if ($stmt->execute() === FALSE) {
	die("Error: " . $sql . "<br>" . $conn->error);
}

$conn->close();

header("Location: list.php");

?>