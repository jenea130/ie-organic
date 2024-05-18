<?php
/*
*
* @param string $class = '' | 'page_intro--small' | 'page_intro--big'
*/
function pageIntroComponent($page_intro, $title, $class = '')
{ ?>
  <?php
  // $title = $page_intro['title'];
  $image = $page_intro['image'];
  ?>
  <div class="page-intro <?php echo $class; ?>">
    <img class="page-intro__img" src="<?php echo $image ?>" alt="">
    <div class="container">
      <div class="page-intro__content">
        <h1 class="page-intro__title title-intro"><?php echo $title; ?></h1>
      </div>
    </div>
  </div>
<?php } ?>