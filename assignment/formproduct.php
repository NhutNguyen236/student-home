<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laptop - Add Home</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    
  </head>

  <body class="bg-light">
	<?php
	$id = "";
	$address = "";
	$category = "";
  $size= "";
	$price = "";
  $priceElectric= "";
  $priceWater= "";
	$description = "";
	$title = "Add Home";
	$buttonTitle = "Add";
	
	if (isset($_GET["id"])) {
		require "connection.php";
		$id = $_GET["id"];
		$sql = "SELECT * FROM nha WHERE id=" . $id;
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if ($row) {
			$name = $row["address"];
      $size= $row["size"];
			$category = $row["category"];
			$price = $row["price"];
      $priceElectric = $row["priceElectric"];
      $priceWater = $row["priceWater"];
			$description = $row["description"];
		}
		$title = "Edit Home";
		$buttonTitle = "Update";
	}
	
	?>

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="data:image/jpeg;base64,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" alt="" width="72" height="72">
        <h2><?php echo $title ?></h2>
      </div>

      <div class="row">
        <div class="col-md order-md-1">
          <form action="processformproduct.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="mb-3">
              <label for="address">address</label>
              <div class="input-group">
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $address ?>" required>
              </div>
            </div>
			
			<div class="mb-3">
              <label for="name">Category</label>
              <div class="input-group">
                <select class="input-group" name="category">
					<option value="house" <?php echo $category=="house"? "selected" : "" ?>>House</option>
					<option value="apartment" <?php echo $category=="apartment"? "selected" : "" ?>>apartment</option>
				</select>
              </div>
            </div>
			

     <div class="mb-3">
              <label for="size">Size</label>
              <div class="input-group">
                <input type="text" class="form-control" id="size" name="size" value="<?php echo $size ?>" required>
              </div>
            </div>


			<div class="mb-3">
              <label for="price">Price</label>
              <div class="input-group">
                <input type="text" class="form-control" id="price" name="price" value="<?php echo $price ?>" required>
              </div>
            </div>


      <div class="mb-3">
              <label for="priceElectric">Price Electric</label>
              <div class="input-group">
                <input type="text" class="form-control" id="priceElectric" name="priceElectric" value="<?php echo $priceElectric ?>" required>
              </div>
            </div>
			
      <div class="mb-3">
              <label for="priceWater">Price Water</label>
              <div class="input-group">
                <input type="text" class="form-control" id="priceWater" name="priceWater" value="<?php echo $priceWater ?>" required>
              </div>
            </div>



			<div class="mb-3">
              <label for="description">Description</label>
              <div class="input-group">
                <textarea class="form-control" id="description" name="description" required><?php echo $description ?></textarea>
              </div>
            </div>
			
			<div class="mb-3">
              <label for="fileToUpload">Image</label>
              <div class="input-group">
                <input type="file" id="fileToUpload" name="fileToUpload" required>
              </div>
            </div>
			
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">
				<?php echo $buttonTitle ?>
			</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">Welcome to Home</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="list.php">List</a></li>
          <li class="list-inline-item"><a href="index.php">Page Home</a></li>
          <li class="list-inline-item"><a href="#">Logout</a></li>
        </ul>
      </footer>
    </div>

  </body>
</html>