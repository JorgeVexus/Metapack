<?php
/**
 * Header reutilizable para Metapack
 * IDÉNTICO al de page-home.php para coherencia
 */

// Obtener logo dinámico o usar el de home
$custom_logo_id = get_theme_mod('custom_logo');
if ($custom_logo_id) {
    $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
} else {
    $logo_url = 'https://www.metapack.com.mx/wp-content/uploads/2026/01/logo_viejo-1.png';
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ============================================ -->
<!-- HEADER/NAVBAR (Igual que home)              -->
<!-- ============================================ -->

<header class="mp-header" id="mp-header">
    <div class="mp-header__container">
        <a href="<?php echo home_url('/'); ?>" class="mp-logo">
            <img src="<?php echo esc_url($logo_url); ?>" alt="Metapack Logo" class="mp-logo__img" loading="eager" width="180" height="45">
        </a>
        <nav class="mp-nav" id="mp-nav">
            <?php if (has_nav_menu('primary')) : ?>
                <?php wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'mp-nav__list',
                    'fallback_cb'    => false,
                )); ?>
            <?php else : ?>
                <ul class="mp-nav__list">
                    <li><a href="<?php echo home_url('/'); ?>" class="mp-nav__link <?php echo is_front_page() ? 'mp-nav__link--active' : ''; ?>">Inicio</a></li>
                    <li><a href="<?php echo home_url('/quienes-somos/'); ?>" class="mp-nav__link <?php echo is_page('quienes-somos') ? 'mp-nav__link--active' : ''; ?>">Quiénes Somos</a></li>
                    <li><a href="<?php echo home_url('/productos/'); ?>" class="mp-nav__link <?php echo (is_post_type_archive('producto') || is_singular('producto')) ? 'mp-nav__link--active' : ''; ?>">Productos</a></li>
                    <li><a href="<?php echo home_url('/maquila/'); ?>" class="mp-nav__link <?php echo is_page('maquila') ? 'mp-nav__link--active' : ''; ?>">Maquila</a></li>
                    <li><a href="<?php echo home_url('/'); ?>#mp-consumo" class="mp-nav__link">Línea de consumo</a></li>
                    <li><a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="mp-nav__link <?php echo (is_home() || is_archive() || is_single()) && !is_post_type_archive('producto') && !is_singular('producto') ? 'mp-nav__link--active' : ''; ?>">Blog</a></li>
                </ul>
            <?php endif; ?>
        </nav>
        <a href="<?php echo home_url('/cotizar/'); ?>" class="mp-btn mp-btn--primary mp-btn--nav">Cotizar ahora</a>
        <button class="mp-nav__toggle" id="mp-navToggle" aria-label="Abrir menú">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</header>
