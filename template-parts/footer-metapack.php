<?php
/**
 * Footer reutilizable para Metapack
 * Basado en el diseño de Figma: https://www.figma.com/design/TcHd7AjID82CkKR3mssk5I/Metapack?node-id=31-395&m=dev
 */

// Obtener logo
$custom_logo_id = get_theme_mod('custom_logo');
if ($custom_logo_id) {
    $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
} else {
    // Fallback logo
    $logo_url = get_stylesheet_directory_uri() . '/assets/images/logo_metapack_footer.png';
}
?>

<footer class="mp-footer-v2" id="mp-footer-v2">
    <div class="mp-container">
        <div class="mp-footer-v2__main">
            <!-- Columna 1: Marca -->
            <div class="mp-footer-v2__col mp-footer-v2__col--brand">
                <a href="<?php echo home_url('/'); ?>" class="mp-footer-v2__logo-link">
                    <img src="<?php echo esc_url($logo_url); ?>" alt="Metapack Logo" class="mp-footer-v2__logo">
                </a>
                <p class="mp-footer-v2__slogan">Líderes en fabricación y maquila de empaques para alimentos en México. Calidad, higiene y tecnología a su servicio.</p>
            </div>

            <!-- Columna 2: Productos -->
            <div class="mp-footer-v2__col">
                <h4 class="mp-footer-v2__title">Productos</h4>
                <?php if (has_nav_menu('products')) : ?>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'products',
                        'container'      => false,
                        'menu_class'     => 'mp-footer-v2__links',
                        'fallback_cb'    => false,
                    )); ?>
                <?php else : ?>
                    <ul class="mp-footer-v2__links">
                        <li><a href="<?php echo home_url('/productos/'); ?>#rollo-de-aluminio">Rollo de aluminio</a></li>
                        <li><a href="<?php echo home_url('/productos/'); ?>#pelicula">Película</a></li>
                        <li><a href="<?php echo home_url('/productos/'); ?>#papel-encerado">Papel encerado</a></li>
                    </ul>
                <?php endif; ?>
            </div>

            <!-- Columna 3: Navegación -->
            <div class="mp-footer-v2__col">
                <h4 class="mp-footer-v2__title">Navegación</h4>
                <?php if (has_nav_menu('footer')) : ?>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'menu_class'     => 'mp-footer-v2__links',
                        'fallback_cb'    => false,
                    )); ?>
                <?php else : ?>
                    <ul class="mp-footer-v2__links">
                        <li><a href="<?php echo home_url('/'); ?>#mp-nosotros">Quiénes somos</a></li>
                        <li><a href="<?php echo home_url('/'); ?>#mp-servicios">Servicios</a></li>
                        <li><a href="<?php echo home_url('/'); ?>#mp-maquila">Maquila</a></li>
                        <li><a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">Blog</a></li>
                        <li><a href="<?php echo home_url('/'); ?>#mp-contacto">Contacto</a></li>
                    </ul>
                <?php endif; ?>
            </div>

            <!-- Columna 4: Contacto -->
            <div class="mp-footer-v2__col mp-footer-v2__col--contact">
                <h4 class="mp-footer-v2__title">Contacto</h4>
                <div class="mp-footer-v2__info">
                    <!-- Teléfonos -->
                    <div class="mp-footer-v2__info-group">
                        <div class="mp-footer-v2__info-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l2.28-2.28a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                        </div>
                        <div class="mp-footer-v2__info-content">
                            <strong>Teléfonos</strong>
                            <p>Oficina: <a href="tel:<?php echo preg_replace('/[^0-9+]/', '', get_theme_mod('contact_phone_office', '+52 (55) 1234-5678')); ?>"><?php echo esc_html(get_theme_mod('contact_phone_office', '+52 (55) 1234-5678')); ?></a></p>
                            <p>Ventas: <a href="tel:<?php echo preg_replace('/[^0-9+]/', '', get_theme_mod('contact_phone_sales', '+52 (55) 8765-4321')); ?>"><?php echo esc_html(get_theme_mod('contact_phone_sales', '+52 (55) 8765-4321')); ?></a></p>
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="mp-footer-v2__info-group">
                        <div class="mp-footer-v2__info-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </div>
                        <div class="mp-footer-v2__info-content">
                            <strong>Correo Electrónico</strong>
                            <p><a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email_sales', 'ventas@metapack.com.mx')); ?>"><?php echo esc_html(get_theme_mod('contact_email_sales', 'ventas@metapack.com.mx')); ?></a></p>
                            <p><a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email_general', 'info@metapack.com.mx')); ?>"><?php echo esc_html(get_theme_mod('contact_email_general', 'info@metapack.com.mx')); ?></a></p>
                        </div>
                    </div>
                </div>

                <!-- Iconos Redes Sociales -->
                <div class="mp-footer-v2__social-row">
                    <a href="https://wa.me/<?php echo esc_attr(get_theme_mod('contact_whatsapp', '521812345678')); ?>" class="mp-footer-v2__social-icon" target="_blank" rel="noopener">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                           <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                        </svg>
                    </a>
                    <a href="<?php echo esc_url(get_theme_mod('social_tiktok', '#')); ?>" class="mp-footer-v2__social-icon" target="_blank" rel="noopener" aria-label="TikTok">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1-.1z"/>
                        </svg>
                    </a>
                    <a href="<?php echo esc_url(get_theme_mod('social_instagram', '#')); ?>" class="mp-footer-v2__social-icon" target="_blank" rel="noopener">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                        </svg>
                    </a>
                    <a href="<?php echo esc_url(get_theme_mod('social_youtube', '#')); ?>" class="mp-footer-v2__social-icon" target="_blank" rel="noopener">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path>
                            <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="mp-footer-v2__bottom">
            <span>© <?php echo date('Y'); ?> <?php echo esc_html(get_theme_mod('footer_copyright', 'MetaPack. Todos los derechos reservados.')); ?> | <a href="<?php echo home_url('/aviso-de-privacidad/'); ?>">Aviso de Privacidad</a></span>
        </div>
    </div>
</footer>

<!-- WHATSAPP FLOTANTE -->
<a href="https://wa.me/<?php echo esc_attr(get_theme_mod('contact_whatsapp', '521812345678')); ?>" class="mp-whatsapp-float" target="_blank" rel="noopener">
    <svg viewBox="0 0 24 24" fill="currentColor">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
    </svg>
</a>

<!-- Metapack Script already enqueued in functions.php -->
<?php wp_footer(); ?>
</body>
</html>
