<?php
$believe = get_field('believe');
$image = $believe['image'];
?>

<div class="believe">
  <img src="<?php echo $image; ?>" alt="">
  <div class="container">
    <div class="believe__content">
    </div>
  </div>
</div>