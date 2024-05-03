<?php 
$believe = get_field('believe');
$image = $believe['image'];
?>

<div class="believe">
  <div class="container">
  <div class="believe__wrap">
    <div class="believe__img">
      <img src="<?php echo $image; ?>" alt="">
    </div>
  </div>
  </div>
</div>