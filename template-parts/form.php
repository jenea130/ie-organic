<?php $footer = get_field('main_footer', 'option'); ?>
<div class="form main-footer__form">
    <div class="main-footer__label">Scrivici</div>
    <div class="main-footer__value">Ti risponderemo il prima<br> possibile!</div>
    <?php echo do_shortcode($footer['form_shortcode']); ?>
</div>
