<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ar-starter
 */

?>

<!--</?php $addTitle = get_field('main_footer', 'option')['address_title'] ?>
</?php $address =  get_field('full_address', 'option') ?>
</?php $phone = get_field('phone_number', 'option') ?>
</?php $email = get_field('email', 'option') ?>
</?php $fullName =  get_field('full_company_name', 'option') ?>
</?php $shortName =  get_field('short_company_name', 'option') ?>
</?php $vat = get_field('vat', 'option') ?>
</?php $partnerUrl = get_field('partner_url', 'option') ?>
</?php $partnerLogo = get_field('parnter_logo', 'option') ?>-->

<?php
$header = get_field('header', 'option');
$logo = $header['logo'];
$footer = get_field('footer', 'option');
$email = $footer['email'];
$phone_number = $footer['phone_number'];
$full_address = $footer['full_address'];
$socials = $footer['socials'];
$title_1 = $footer['title_1'];
$title_2 = $footer['title_2'];
$text = $footer['text'];
?>


<footer class="main-footer">
  <div class="container">
    <div class="main-footer__wrap">
      <div class="main-footer__contact">
        <h3 class="main-footer__title"><?php echo $title_1; ?></h3>
        <ul class="main-footer__items">
          <li>
            <h4 class="main-footer__subtitle">Email</h4>
            <a href="mailto:<?php echo $email; ?>" target="_blank"><?php echo $email; ?></a>
          </li>
          <li>
            <h4 class="main-footer__subtitle">Phone</h4>

            <a href="tel:<?php echo clear_phone($phone_number); ?>" target="_blank"><?php echo $phone_number; ?></a>
          </li>
          <li>
            <h4 class="main-footer__subtitle">Address</h4>
            <a href=""><?php echo $full_address; ?></a>
          </li>
        </ul>
      </div>
      <div class="main-footer__content">
        <div class="main-footer__logo">
          <div class="logo">
            <a href="<?php echo home_url(); ?>">
              <?php echo $logo; ?>
            </a>
          </div>
        </div>
        <div class="main-footer__text text"><?php echo $text; ?></div>
        <ul class="main-footer__socials">
          <?php foreach ($socials as $item) : ?>
            <?php
            $icon = $item['icon'];
            $url = $item['url'];
            ?>
            <li>
              <a href="<?php echo $url; ?>" target="_blank"><?php echo $icon; ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="main-footer__utility">
        <h3 class="main-footer__title"><?php echo $title_2; ?></h3>
        <?php wp_nav_menu([
          'theme_location'  => 'footer',
          'menu'            => '',
          'container'       => '',
          'container_class' => '',
          'container_id'    => '',
          'menu_class'      => 'main-footer__list',
          'menu_id'         => '',
          'echo'            => true,
          'fallback_cb'     => 'wp_page_menu',
          'before'          => '',
          'after'           => '',
          'link_before'     => '',
          'link_after'      => '',
          'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          'depth'           => 0,
          'walker'          => '',
        ]); ?>
      </div>
    </div>
  </div>
</footer>
<footer class="footer-copyright">
  <span class="footer-copyright__text">Copyright &copy; <strong>Organick</strong></span>
</footer>

</div>
<?php wp_footer(); ?>
</body>

</html>