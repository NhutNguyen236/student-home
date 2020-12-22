<?php include 'header.php';?>

<div class="container">

<h2>Rooms & Tariff</h2>


<!-- form -->
<?php
	$id = "";
	$address = "";
	$category = "";
	$price = "";
	$description = "";
	$buttonTitle = "Liên Hệ";
	
if (isset($_GET["id"])) {
		require "connection.php";
		$id = $_GET["id"];
		$sql = "SELECT * FROM nha WHERE id=" . $id;
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if ($row) {
			$address = $row["address"];
			$category = $row["category"];
			$price = $row["price"];
			$description = $row["description"];
		}
		$buttonTitle = "Update";
	}
	
?>
<div class="row">
	<?php
		require "connection.php";
		if (isset($_GET["searchkey"])){
			$key = $_GET["searchkey"];
			$sql = "SELECT N.description, N.address, N.image, N.price ,N.id
						FROM nha N
						WHERE N.description LIKE '%$key%'
							OR N.address LIKE '%$key%'";
		}
		
		else {
			$sql = "SELECT * FROM nha";
		}
		
		if (isset($_GET["category"])) {
			$category = $_GET["category"];
			$sql .= " WHERE category='$category'";
		}
		$result = $conn->query($sql);
		while ($row=$result->fetch_assoc()) {
		?>
	<div class="col-sm-6 wowload fadeInUp">
		<div class="rooms"><img src="<?php echo ($row["image"]);?>" class="img-responsive">
		<div class="info"><h3><?php echo ($row["address"]);?></h3><p><?php echo ($row["description"]); ?></p>
		<a href="room-details.php?id=<?php echo ($row['id']) ?>" class="btn btn-default">Check Details</a>
		</div>
		</div>
		</div><?php }?>
</div>

                     <div class="text-center">
                     <ul class="pagination">
                     	<li class="disabled"><a href="#">«</a></li>
                     	<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                     	
                     	<li><a href="#">»</a></li>
                     </ul>
                     </div>


</div>
<?php include 'footer.php';?>