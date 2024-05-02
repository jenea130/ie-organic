<?php $footer = get_field('main_footer', 'option'); ?>
<div class="main-footer__contacts">
    <ul class="main-footer__list">
        <li>
            <div class="main-footer__label">Contatti</div>
            <div class="main-footer__value"><?php echo get_field('short_company_name', 'option'); ?></div>
        </li>
        <li>
            <div class="main-footer__label">Indirizzo</div>
            <div class="main-footer__value"><?php echo get_field('full_address', 'option'); ?></div>
        </li>
        <li>
            <?php $phone_number = get_field('phone_number', 'option'); ?>
            <?php $phone_clear = clear_phone($phone_number); ?>
            <div class="main-footer__label">Telefono</div>
            <div class="main-footer__value"><a href="tel:<?php echo $phone_clear; ?>"><?php echo $phone_number; ?></a></div>
        </li>
        <li>
            <?php $watsapp_number = get_field('watsup', 'option'); ?>
            <?php $watsapp_clear = clear_phone($watsapp_number); ?>
            <div class="main-footer__label">WhatsApp</div>
            <div class="main-footer__value"><a href="https://api.whatsapp.com/send/?phone=<?php echo $watsapp_clear; ?>"><?php echo $watsapp_number; ?></a></div>
        </li>
        <li>
            <?php $email = get_field('email', 'options'); ?>
            <div class="main-footer__label">Email</div>
            <div class="main-footer__value"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div>
        </li>
    </ul>

</div>