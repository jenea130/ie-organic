<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
function privacy_func()
{
    ob_start();
    ?>
<?php
    $show_coockie_notice = get_field('show_coockie_notice', 'options');
    $cookie_notice = get_field('cookie_notice', 'options');
    $show_ga = get_field('show_ga', 'options');
    $ga = get_field('ga', 'options');
    $show_ga_xxxxxxxx = get_field('show_ga_xxxxxxxx', 'options');
    $ga_xxxxxxxx = get_field('ga_xxxxxxxx', 'options');
    $show_gid = get_field('show_gid', 'options');
    $gid = get_field('gid', 'options');
    $show_gat_gtag_xxxxxxx = get_field('show_gat_gtag_xxxxxxx', 'options');
    $gat_gtag_xxxxxxx = get_field('gat_gtag_xxxxxxx', 'options');
    $show_wpglobus_language = get_field('show_wpglobus-language', 'options');
    $wpglobus_language = get_field('wpglobus-language', 'options');
    $show_wpglobus_language_old = get_field('show_wpglobus-language-old', 'options');
    $wpglobus_language_old = get_field('wpglobus-language-old', 'options');
    $show_custom_1 = get_field('show_custom_1', 'options');
    $custom_1 = get_field('custom_1', 'options');
    $show_custom_2 = get_field('show_custom_2', 'options');
    $custom_2 = get_field('custom_2', 'options');
    $show_custom_3 = get_field('show_custom_3', 'options');
    $custom_3 = get_field('custom_3', 'options');
    $show_custom_4 = get_field('show_custom_4', 'options');
    $custom_4 = get_field('custom_4', 'options');
    $show_custom_5 = get_field('show_custom_5', 'options');
    $custom_5 = get_field('custom_5', 'options');
    ?>
<table>
    <tbody>
        <tr>
            <th>Nome</th>
            <th>Scopo</th>
            <th>Scadenza</th>
            <th>Tipo</th>
            <th>Parte</th>
        </tr>
        <?php if ($show_coockie_notice): ?>
        <tr>
            <td><?php echo $cookie_notice['name']; ?></td>
            <td><?php echo $cookie_notice['scope']; ?></td>
            <td><?php echo $cookie_notice['time']; ?></td>
            <td><?php echo $cookie_notice['type']; ?></td>
            <td><?php echo $cookie_notice['part']; ?></td>
        </tr>
        <?php endif; ?>
        <?php if ($show_ga): ?>
        <tr>
            <td><?php echo $ga['name']; ?></td>
            <td><?php echo $ga['scope']; ?></td>
            <td><?php echo $ga['time']; ?></td>
            <td><?php echo $ga['type']; ?></td>
            <td><?php echo $ga['part']; ?></td>
        </tr>
        <?php endif; ?>
        <?php if ($show_ga_xxxxxxxx): ?>
        <tr>
            <td><?php echo $ga_xxxxxxxx['name']; ?></td>
            <td><?php echo $ga_xxxxxxxx['scope']; ?></td>
            <td><?php echo $ga_xxxxxxxx['time']; ?></td>
            <td><?php echo $ga_xxxxxxxx['type']; ?></td>
            <td><?php echo $ga_xxxxxxxx['part']; ?></td>
        </tr>
        <?php endif; ?>
        <?php if ($show_gid): ?>
        <tr>
            <td><?php echo $gid['name']; ?></td>
            <td><?php echo $gid['scope']; ?></td>
            <td><?php echo $gid['time']; ?></td>
            <td><?php echo $gid['type']; ?></td>
            <td><?php echo $gid['part']; ?></td>
        </tr>
        <?php endif; ?>
        <?php if ($show_gat_gtag_xxxxxxx): ?>
        <tr>
            <td><?php echo $gat_gtag_xxxxxxx['name']; ?></td>
            <td><?php echo $gat_gtag_xxxxxxx['scope']; ?></td>
            <td><?php echo $gat_gtag_xxxxxxx['time']; ?></td>
            <td><?php echo $gat_gtag_xxxxxxx['type']; ?></td>
            <td><?php echo $gat_gtag_xxxxxxx['part']; ?></td>
        </tr>
        <?php endif; ?>
        <?php if ($show_wpglobus_language): ?>
        <tr>
            <td><?php echo $wpglobus_language['name']; ?></td>
            <td><?php echo $wpglobus_language['scope']; ?></td>
            <td><?php echo $wpglobus_language['time']; ?></td>
            <td><?php echo $wpglobus_language['type']; ?></td>
            <td><?php echo $wpglobus_language['part']; ?></td>
        </tr>
        <?php endif; ?>
        <?php if ($show_wpglobus_language_old): ?>
        <tr>
            <td><?php echo $wpglobus_language_old['name']; ?></td>
            <td><?php echo $wpglobus_language_old['scope']; ?></td>
            <td><?php echo $wpglobus_language_old['time']; ?></td>
            <td><?php echo $wpglobus_language_old['type']; ?></td>
            <td><?php echo $wpglobus_language_old['part']; ?></td>
        </tr>
        <?php endif; ?>
        <?php if ($show_custom_1): ?>
        <tr>
            <td><?php echo $custom_1['name']; ?></td>
            <td><?php echo $custom_1['scope']; ?></td>
            <td><?php echo $custom_1['time']; ?></td>
            <td><?php echo $custom_1['type']; ?></td>
            <td><?php echo $custom_1['part']; ?></td>
        </tr>
        <?php endif; ?>
        <?php if ($show_custom_2): ?>
        <tr>
            <td><?php echo $custom_2['name']; ?></td>
            <td><?php echo $custom_2['scope']; ?></td>
            <td><?php echo $custom_2['time']; ?></td>
            <td><?php echo $custom_2['type']; ?></td>
            <td><?php echo $custom_2['part']; ?></td>
        </tr>
        <?php endif; ?>
        <?php if ($show_custom_3): ?>
        <tr>
            <td><?php echo $custom_3['name']; ?></td>
            <td><?php echo $custom_3['scope']; ?></td>
            <td><?php echo $custom_3['time']; ?></td>
            <td><?php echo $custom_3['type']; ?></td>
            <td><?php echo $custom_3['part']; ?></td>
        </tr>
        <?php endif; ?>
        <?php if ($show_custom_4): ?>
        <tr>
            <td><?php echo $custom_4['name']; ?></td>
            <td><?php echo $custom_4['scope']; ?></td>
            <td><?php echo $custom_4['time']; ?></td>
            <td><?php echo $custom_4['type']; ?></td>
            <td><?php echo $custom_4['part']; ?></td>
        </tr>
        <?php endif; ?>
        <?php if ($show_custom_5): ?>
        <tr>
            <td><?php echo $custom_5['name']; ?></td>
            <td><?php echo $custom_5['scope']; ?></td>
            <td><?php echo $custom_5['time']; ?></td>
            <td><?php echo $custom_5['type']; ?></td>
            <td><?php echo $custom_5['part']; ?></td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>
<?php
    return ob_get_clean();
}

add_shortcode('privacy_shortcode', 'privacy_func');
?>