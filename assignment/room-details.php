<?php include 'header.php';?>

<div class="container">

<h1 class="title">Home Information</h1>

<?php 
  $id = $_GET['id'];
  $sql = "SELECT N.image, N.price, N.priceWater, N.priceElectric, N.size, N.description
          FROM Nha N
          WHERE N.id = $id";
  require 'connection.php';
  $result = $conn ->query ($sql);
  $row = $result -> fetch_assoc();        
?>

 <!-- RoomDetails -->
            <div id="RoomDetails" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="item active"><img src="<?php echo $row['image']?>" class="img-responsive" alt="slide"></div>
                
                </div>
                <!-- Controls -->
                
            </div>
  <!-- RoomCarousel-->

<div class="room-features spacer">
  <div class="row">
    
    <div class="col-sm-6 col-md-3 amenitites"> 
    <h3>Descriptions</h3>    
    <p> <?php echo $row['description'] ?></p>
    

    </div>  
    <div class="col-sm-3 col-md-2">
      <div class="size-price">Size<span><?php echo $row['size']?> sq</span></div>
    </div>
    <div class="col-sm-3 col-md-2">
      <div class="size-price">Price<span>$<?php echo $row['price']?></span></div>
    </div>
    <div class="col-sm-3 col-md-2">
      <div class="size-price">Price Water<span>$<?php echo $row['priceWater']?></span></div>
    </div>
    <div class="col-sm-3 col-md-2">
      <div class="size-price">Price Electric<span>$<?php echo $row['priceElectric']?></span></div>
    </div>
  </div>
</div>
                     


</div>
<?php include 'footer.php';?>