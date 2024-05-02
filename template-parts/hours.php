<div class="main-footer__hours">
    <div class="main-footer__logo">
        <?php require_once __DIR__ . '/../assets/svg/footer-logo.php'; ?>
    </div>
    <?php $opening_times = get_field('opening_times', 'options'); ?>
    <div class="main-footer__label">Orari di apertura</div>
    <?php foreach ($opening_times as $item): ?>
        <div class="main-footer__value"><?php echo $item['title']; ?></div>
    <?php endforeach; ?>
</div>
