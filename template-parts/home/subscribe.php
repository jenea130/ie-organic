<?php
$subscribe = get_field('subscribe');
$image = $subscribe['image'];
$title = $subscribe['title'];
$placeholder = $subscribe['placeholder'];
$button_text = $subscribe['button_text'];
?>

<div class="subscribe">
  <img src="<?php echo $image; ?>" alt="">
  <div class="subscribe__wrap">
    <div class="subscribe__title title title--light"><?php echo $title; ?></div>
    <div class="subscribe__body">
      <input class="subscribe__input" type="text" placeholder="<?php echo $placeholder; ?>">
      <button class="subscribe__btn"><?php echo $button_text; ?></button>
    </div>
  </div>
</div>