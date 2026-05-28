<?php
/**
 * Functions para el tema Metapack
 * 
 * Añade este código al functions.php de tu tema hijo
 * o crea un nuevo functions.php en tu tema personalizado
 */

// =================================================
// REGISTRAR ESTILOS Y SCRIPTS DE METAPACK
// =================================================
function metapack_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style(
        'metapack-fonts',
        'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Open+Sans:wght@400;600;700;800&display=swap',
        array(),
        null
    );
    
    // Estilos principales de Metapack
    wp_enqueue_style(
        'metapack-styles',
        get_stylesheet_directory_uri() . '/assets/css/metapack-styles.css',
        array('metapack-fonts'),
        '1.0.2'
    );
    
    // Script de Metapack
    wp_enqueue_script(
        'metapack-script',
        get_stylesheet_directory_uri() . '/assets/js/metapack-script.js',
        array(),
        '1.0.4',
        true // Cargar en el footer
    );
}
add_action('wp_enqueue_scripts', 'metapack_enqueue_assets');


// =================================================
// ESTRUCTURA LIMPIA PARA TODO EL SITIO
// =================================================
function metapack_hide_theme_elements() {
    if (is_admin()) return;
    ?>
    <style>
        /* Reset Global */
        html, body {
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
            height: 100% !important;
        }

        /* Ocultar elementos del tema base que puedan interferir */
        .site-header, #site-header, header#masthead, .masthead, #masthead, .main-header, #main-header,
        .site-footer, #colophon, footer.site-footer, .footer-copy, .site-info, #footer,
        .entry-header, .page-header, .entry-title, h1.entry-title {
            display: none !important;
        }
        
        /* Asegurar que el contenido use todo el ancho */
        .site-content, #content, .content-area, main.site-main, .entry-content, .site {
            padding: 0 !important;
            margin: 0 !important;
            max-width: 100% !important;
            width: 100% !important;
        }
    </style>
    <?php
}
add_action('wp_head', 'metapack_hide_theme_elements');


// =================================================
// SOPORTE PARA LOGO PERSONALIZADO
// =================================================
function metapack_theme_setup() {
    // Soporte para logo personalizado
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Soporte para títulos
    add_theme_support('title-tag');
    
    // Soporte para miniaturas
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'metapack_theme_setup');


// =================================================
// REGISTRAR MENÚS DE NAVEGACIÓN
// =================================================
function metapack_register_menus() {
    register_nav_menus(array(
        'primary'   => __('Menú Principal', 'metapack'),
        'footer'    => __('Menú Footer', 'metapack'),
        'products'  => __('Menú Productos', 'metapack'),
    ));
}
add_action('init', 'metapack_register_menus');


// =================================================
// CUSTOM POST TYPE: PRODUCTOS
// =================================================
function metapack_register_productos_cpt() {
    $labels = array(
        'name'                  => 'Productos',
        'singular_name'         => 'Producto',
        'menu_name'             => 'Productos',
        'name_admin_bar'        => 'Producto',
        'add_new'               => 'Añadir Nuevo',
        'add_new_item'          => 'Añadir Nuevo Producto',
        'new_item'              => 'Nuevo Producto',
        'edit_item'             => 'Editar Producto',
        'view_item'             => 'Ver Producto',
        'all_items'             => 'Todos los Productos',
        'search_items'          => 'Buscar Productos',
        'not_found'             => 'No se encontraron productos.',
        'not_found_in_trash'    => 'No hay productos en la papelera.',
        'featured_image'        => 'Imagen del Producto',
        'set_featured_image'    => 'Establecer imagen del producto',
        'remove_featured_image' => 'Eliminar imagen del producto',
        'use_featured_image'    => 'Usar como imagen del producto',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true, // Habilitar Gutenberg
        'query_var'          => true,
        'rewrite'            => array('slug' => 'productos', 'with_front' => false),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
    );

    register_post_type('producto', $args);
}
add_action('init', 'metapack_register_productos_cpt');


// =================================================
// TAXONOMÍA: INDUSTRIAS (Para filtros)
// =================================================
function metapack_register_industrias_taxonomy() {
    $labels = array(
        'name'              => 'Industrias',
        'singular_name'     => 'Industria',
        'search_items'      => 'Buscar Industrias',
        'all_items'         => 'Todas las Industrias',
        'parent_item'       => 'Industria Padre',
        'parent_item_colon' => 'Industria Padre:',
        'edit_item'         => 'Editar Industria',
        'update_item'       => 'Actualizar Industria',
        'add_new_item'      => 'Añadir Nueva Industria',
        'new_item_name'     => 'Nombre de Nueva Industria',
        'menu_name'         => 'Industrias',
    );

    $args = array(
        'hierarchical'      => true, // Como categorías
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'industria'),
    );

    register_taxonomy('industria', array('producto'), $args);
}
add_action('init', 'metapack_register_industrias_taxonomy');


// =================================================
// TAXONOMÍA: CATEGORÍAS DE PRODUCTO
// =================================================
function metapack_register_categoria_producto_taxonomy() {
    $labels = array(
        'name'              => 'Categorías de Producto',
        'singular_name'     => 'Categoría de Producto',
        'search_items'      => 'Buscar Categorías',
        'all_items'         => 'Todas las Categorías',
        'parent_item'       => 'Categoría Padre',
        'parent_item_colon' => 'Categoría Padre:',
        'edit_item'         => 'Editar Categoría',
        'update_item'       => 'Actualizar Categoría',
        'add_new_item'      => 'Añadir Nueva Categoría',
        'new_item_name'     => 'Nombre de Nueva Categoría',
        'menu_name'         => 'Categorías',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'categoria-producto'),
    );

    register_taxonomy('categoria_producto', array('producto'), $args);
}
add_action('init', 'metapack_register_categoria_producto_taxonomy');


// =================================================
// FLUSH REWRITE RULES (Solo una vez después de activar)
// =================================================
function metapack_rewrite_flush() {
    metapack_register_productos_cpt();
    metapack_register_industrias_taxonomy();
    metapack_register_categoria_producto_taxonomy();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'metapack_rewrite_flush');


// =================================================
// SHORTCODE PARA EL FORMULARIO DE CONTACTO
// =================================================
function metapack_contact_form_shortcode($atts) {
    // Si tienes Contact Form 7, usa su shortcode
    if (shortcode_exists('contact-form-7')) {
        // Reemplaza "123" con el ID real de tu formulario CF7
        return do_shortcode('[contact-form-7 id="123" title="Formulario de Contacto"]');
    }
    
    // Formulario HTML básico como fallback
    ob_start();
    ?>
    <form class="mp-form-grid" method="post" action="">
        <div class="mp-form-group">
            <label class="mp-form-label" for="nombre">Nombre completo *</label>
            <input type="text" id="nombre" name="nombre" class="mp-form-input" required>
        </div>
        <div class="mp-form-group">
            <label class="mp-form-label" for="empresa">Empresa</label>
            <input type="text" id="empresa" name="empresa" class="mp-form-input">
        </div>
        <div class="mp-form-group">
            <label class="mp-form-label" for="email">Correo electrónico *</label>
            <input type="email" id="email" name="email" class="mp-form-input" required>
        </div>
        <div class="mp-form-group">
            <label class="mp-form-label" for="telefono">Teléfono *</label>
            <input type="tel" id="telefono" name="telefono" class="mp-form-input" required>
        </div>
        <div class="mp-form-group mp-form-group--full">
            <label class="mp-form-label" for="mensaje">¿Cómo podemos ayudarte?</label>
            <textarea id="mensaje" name="mensaje" class="mp-form-textarea" rows="4"></textarea>
        </div>
        <div class="mp-form-group mp-form-group--full">
            <button type="submit" class="mp-btn mp-btn--primary mp-btn--submit">
                <span>Enviar solicitud</span>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14M12 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </form>
    <?php
    return ob_get_clean();
}
add_shortcode('metapack_contact_form', 'metapack_contact_form_shortcode');


// =================================================
// PERSONALIZADOR - OPCIONES EDITABLES PARA EL CLIENTE
// =================================================
function metapack_customizer_settings($wp_customize) {
    
    // ========== SECCIÓN: HERO ==========
    $wp_customize->add_section('metapack_hero', array(
        'title'    => __('Hero (Portada)', 'metapack'),
        'priority' => 30,
    ));
    
    // Título del Hero
    $wp_customize->add_setting('hero_title', array(
        'default'           => 'Soluciones de aluminio para operaciones que no pueden detenerse',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_title', array(
        'label'   => __('Título Principal', 'metapack'),
        'section' => 'metapack_hero',
        'type'    => 'text',
    ));
    
    // Descripción del Hero
    $wp_customize->add_setting('hero_description', array(
        'default'           => 'Fabricamos y suministramos soluciones de empaque en aluminio con enfoque industrial, trazabilidad y cumplimiento.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('hero_description', array(
        'label'   => __('Descripción', 'metapack'),
        'section' => 'metapack_hero',
        'type'    => 'textarea',
    ));
    
    // Video URL
    $wp_customize->add_setting('hero_video', array(
        'default'           => 'https://assets.mixkit.co/videos/preview/mixkit-industrial-machines-in-operation-4419-large.mp4',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('hero_video', array(
        'label'   => __('URL del Video de Fondo', 'metapack'),
        'section' => 'metapack_hero',
        'type'    => 'url',
    ));
    
    // ========== SECCIÓN: CONTACTO ==========
    $wp_customize->add_section('metapack_contact', array(
        'title'    => __('Información de Contacto', 'metapack'),
        'priority' => 35,
    ));
    
    // Teléfono Oficina
    $wp_customize->add_setting('contact_phone_office', array(
        'default'           => '33 3649 0281',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_phone_office', array(
        'label'   => __('Teléfono Oficina', 'metapack'),
        'section' => 'metapack_contact',
        'type'    => 'text',
    ));
    
    // Teléfono Ventas
    $wp_customize->add_setting('contact_phone_sales', array(
        'default'           => '33 1301 1647',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_phone_sales', array(
        'label'   => __('Teléfono Atención al Cliente', 'metapack'),
        'section' => 'metapack_contact',
        'type'    => 'text',
    ));
    
    // Email Ventas
    $wp_customize->add_setting('contact_email_sales', array(
        'default'           => 'ventas@metapack.com.mx',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('contact_email_sales', array(
        'label'   => __('Email de Ventas', 'metapack'),
        'section' => 'metapack_contact',
        'type'    => 'email',
    ));
    
    // Email Info
    $wp_customize->add_setting('contact_email_info', array(
        'default'           => 'info@metapack.com.mx',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('contact_email_info', array(
        'label'   => __('Email General', 'metapack'),
        'section' => 'metapack_contact',
        'type'    => 'email',
    ));
    
    // Dirección Oficinas
    $wp_customize->add_setting('contact_address', array(
        'default'           => 'Francisco Sarabia 1399 Col. Talpita CP. 44710 Guadalajara, Jalisco, México',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('contact_address', array(
        'label'   => __('Dirección Oficinas', 'metapack'),
        'section' => 'metapack_contact',
        'type'    => 'textarea',
    ));

    // Dirección CEDIS
    $wp_customize->add_setting('contact_address_cedis', array(
        'default'           => 'Camino a Colimilla No. 240 Col. La Noria, CP. 45413, Tonalá, Jalisco, México.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('contact_address_cedis', array(
        'label'   => __('Dirección CEDIS', 'metapack'),
        'section' => 'metapack_contact',
        'type'    => 'textarea',
    ));
    
    // Horario
    $wp_customize->add_setting('contact_hours', array(
        'default'           => 'Lunes a Viernes: 8:00 AM - 5:30 PM',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_hours', array(
        'label'   => __('Horario de Atención', 'metapack'),
        'section' => 'metapack_contact',
        'type'    => 'text',
    ));
    
    // WhatsApp
    $wp_customize->add_setting('contact_whatsapp', array(
        'default'           => '523313011647',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_whatsapp', array(
        'label'       => __('Número de WhatsApp', 'metapack'),
        'description' => __('Sin espacios ni guiones, ej: 5215512345678', 'metapack'),
        'section'     => 'metapack_contact',
        'type'        => 'text',
    ));
    
    // ========== SECCIÓN: REDES SOCIALES ==========
    $wp_customize->add_section('metapack_social', array(
        'title'    => __('Redes Sociales', 'metapack'),
        'priority' => 40,
    ));
    
    // TikTok
    $wp_customize->add_setting('social_tiktok', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('social_tiktok', array(
        'label'   => __('TikTok URL', 'metapack'),
        'section' => 'metapack_social',
        'type'    => 'url',
    ));
    
    // Instagram
    $wp_customize->add_setting('social_instagram', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('social_instagram', array(
        'label'   => __('Instagram URL', 'metapack'),
        'section' => 'metapack_social',
        'type'    => 'url',
    ));
    
    // YouTube
    $wp_customize->add_setting('social_youtube', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('social_youtube', array(
        'label'   => __('YouTube URL', 'metapack'),
        'section' => 'metapack_social',
        'type'    => 'url',
    ));
}
add_action('customize_register', 'metapack_customizer_settings');


// =================================================
// FUNCIONES HELPER PARA OBTENER OPCIONES
// =================================================
function metapack_get_option($option, $default = '') {
    return get_theme_mod($option, $default);
}


// =================================================
// PERSONALIZADOR - SECCIONES ADICIONALES
// =================================================
function metapack_customizer_extra_settings($wp_customize) {
    
    // ========== SECCIÓN: KPIs ==========
    $wp_customize->add_section('metapack_kpis', array(
        'title'    => __('KPIs / Beneficios', 'metapack'),
        'priority' => 32,
    ));
    
    // KPI 1
    $wp_customize->add_setting('kpi_1_title', array(
        'default' => 'INFRAESTRUCTURA',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('kpi_1_title', array(
        'label'   => __('KPI 1 - Título', 'metapack'),
        'section' => 'metapack_kpis',
        'type'    => 'text',
    ));
    $wp_customize->add_setting('kpi_1_text', array(
        'default' => 'Maquinaria de origen italiano para rebobinado y corte de precisión.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('kpi_1_text', array(
        'label'   => __('KPI 1 - Descripción', 'metapack'),
        'section' => 'metapack_kpis',
        'type'    => 'textarea',
    ));
    
    // KPI 2
    $wp_customize->add_setting('kpi_2_title', array(
        'default' => 'SERVICIO Y VENTAS',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('kpi_2_title', array(
        'label'   => __('KPI 2 - Título', 'metapack'),
        'section' => 'metapack_kpis',
        'type'    => 'text',
    ));
    $wp_customize->add_setting('kpi_2_text', array(
        'default' => 'Asesoría especializada. Atención personalizada y entregas puntuales.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('kpi_2_text', array(
        'label'   => __('KPI 2 - Descripción', 'metapack'),
        'section' => 'metapack_kpis',
        'type'    => 'textarea',
    ));
    
    // KPI 3
    $wp_customize->add_setting('kpi_3_title', array(
        'default' => 'CALIDAD CERTIFICADA',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('kpi_3_title', array(
        'label'   => __('KPI 3 - Título', 'metapack'),
        'section' => 'metapack_kpis',
        'type'    => 'text',
    ));
    $wp_customize->add_setting('kpi_3_text', array(
        'default' => 'Productos avalados por FDA y normativas mexicanas. Trazabilidad completa.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('kpi_3_text', array(
        'label'   => __('KPI 3 - Descripción', 'metapack'),
        'section' => 'metapack_kpis',
        'type'    => 'textarea',
    ));
    
    // KPI 4
    $wp_customize->add_setting('kpi_4_title', array(
        'default' => 'DISTRIBUCIÓN NACIONAL',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('kpi_4_title', array(
        'label'   => __('KPI 4 - Título', 'metapack'),
        'section' => 'metapack_kpis',
        'type'    => 'text',
    ));
    $wp_customize->add_setting('kpi_4_text', array(
        'default' => 'Logística eficiente para entregas puntuales a todo México.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('kpi_4_text', array(
        'label'   => __('KPI 4 - Descripción', 'metapack'),
        'section' => 'metapack_kpis',
        'type'    => 'textarea',
    ));
    
    // ========== SECCIÓN: POR QUÉ ELEGIRNOS ==========
    $wp_customize->add_section('metapack_whyus', array(
        'title'    => __('Por Qué Elegirnos', 'metapack'),
        'priority' => 33,
    ));
    
    $wp_customize->add_setting('whyus_title', array(
        'default' => '¿POR QUÉ ELEGIRNOS?',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('whyus_title', array(
        'label'   => __('Título de la Sección', 'metapack'),
        'section' => 'metapack_whyus',
        'type'    => 'text',
    ));
    
    $wp_customize->add_setting('whyus_subtitle', array(
        'default' => 'Combinamos capacidad industrial con atención al detalle para entregar empaques que cumplen con las normativas más exigentes.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('whyus_subtitle', array(
        'label'   => __('Subtítulo', 'metapack'),
        'section' => 'metapack_whyus',
        'type'    => 'textarea',
    ));
    
    // Estadísticas
    $wp_customize->add_setting('stat_1_number', array('default' => '+20', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('stat_1_number', array('label' => 'Estadística 1 - Número', 'section' => 'metapack_whyus', 'type' => 'text'));
    $wp_customize->add_setting('stat_1_label', array('default' => 'Años de experiencia', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('stat_1_label', array('label' => 'Estadística 1 - Etiqueta', 'section' => 'metapack_whyus', 'type' => 'text'));
    
    $wp_customize->add_setting('stat_2_number', array('default' => '100%', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('stat_2_number', array('label' => 'Estadística 2 - Número', 'section' => 'metapack_whyus', 'type' => 'text'));
    $wp_customize->add_setting('stat_2_label', array('default' => 'Capital humano', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('stat_2_label', array('label' => 'Estadística 2 - Etiqueta', 'section' => 'metapack_whyus', 'type' => 'text'));
    
    $wp_customize->add_setting('stat_3_number', array('default' => 'ISO', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('stat_3_number', array('label' => 'Estadística 3 - Número', 'section' => 'metapack_whyus', 'type' => 'text'));
    $wp_customize->add_setting('stat_3_label', array('default' => 'Procesos estandarizados', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('stat_3_label', array('label' => 'Estadística 3 - Etiqueta', 'section' => 'metapack_whyus', 'type' => 'text'));
    
    $wp_customize->add_setting('stat_4_number', array('default' => '24H', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('stat_4_number', array('label' => 'Estadística 4 - Número', 'section' => 'metapack_whyus', 'type' => 'text'));
    $wp_customize->add_setting('stat_4_label', array('default' => 'Capacidad operativa', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('stat_4_label', array('label' => 'Estadística 4 - Etiqueta', 'section' => 'metapack_whyus', 'type' => 'text'));
    
    // ========== SECCIÓN: CTA ==========
    $wp_customize->add_section('metapack_cta', array(
        'title'    => __('Llamada a la Acción (CTA)', 'metapack'),
        'priority' => 36,
    ));
    
    $wp_customize->add_setting('cta_title', array(
        'default' => '¿NECESITA UN PROVEEDOR QUE RESPONDA?',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cta_title', array(
        'label'   => __('Título del CTA', 'metapack'),
        'section' => 'metapack_cta',
        'type'    => 'text',
    ));
    
    $wp_customize->add_setting('cta_text', array(
        'default' => 'Deje de perder tiempo con proveedores informales. Obtenga una cotización técnica formal en menos de 24 horas.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('cta_text', array(
        'label'   => __('Texto del CTA', 'metapack'),
        'section' => 'metapack_cta',
        'type'    => 'textarea',
    ));
    
    $wp_customize->add_setting('cta_feature_1', array('default' => 'Atención inmediata', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('cta_feature_1', array('label' => 'Característica 1', 'section' => 'metapack_cta', 'type' => 'text'));
    
    $wp_customize->add_setting('cta_feature_2', array('default' => 'Envíos a todo México', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('cta_feature_2', array('label' => 'Característica 2', 'section' => 'metapack_cta', 'type' => 'text'));
    
    $wp_customize->add_setting('cta_feature_3', array('default' => 'Facturación al día', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('cta_feature_3', array('label' => 'Característica 3', 'section' => 'metapack_cta', 'type' => 'text'));
    
    // ========== SECCIÓN: FOOTER ==========
    $wp_customize->add_section('metapack_footer', array(
        'title'    => __('Footer', 'metapack'),
        'priority' => 45,
    ));
    
    $wp_customize->add_setting('footer_slogan', array(
        'default' => 'Líderes en fabricación y maquila de empaques para alimentos en México. Calidad, higiene y tecnología a su servicio.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('footer_slogan', array(
        'label'   => __('Eslogan del Footer', 'metapack'),
        'section' => 'metapack_footer',
        'type'    => 'textarea',
    ));
    
    $wp_customize->add_setting('footer_copyright', array(
        'default' => 'MetaPack. Todos los derechos reservados.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_copyright', array(
        'label'   => __('Texto de Copyright', 'metapack'),
        'section' => 'metapack_footer',
        'type'    => 'text',
    ));
}
add_action('customize_register', 'metapack_customizer_extra_settings');


// =================================================
// CUSTOMIZER - PÁGINA DE MAQUILA
// =================================================
function metapack_maquila_customizer($wp_customize) {
    // Sección de Maquila
    $wp_customize->add_section('metapack_maquila', array(
        'title'    => __('Página de Maquila', 'metapack'),
        'priority' => 35,
    ));
    
    // Carrusel de Imágenes - Imagen 1
    $wp_customize->add_setting('maquila_carousel_img_1', array(
        'default' => get_template_directory_uri() . '/assets/images/default-carousel-1.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'maquila_carousel_img_1', array(
        'label'    => __('Carrusel - Imagen 1', 'metapack'),
        'section'  => 'metapack_maquila',
        'settings' => 'maquila_carousel_img_1',
        'priority' => 10,
    )));
    
    // Carrusel de Imágenes - Imagen 2
    $wp_customize->add_setting('maquila_carousel_img_2', array(
        'default' => get_template_directory_uri() . '/assets/images/default-carousel-2.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'maquila_carousel_img_2', array(
        'label'    => __('Carrusel - Imagen 2', 'metapack'),
        'section'  => 'metapack_maquila',
        'settings' => 'maquila_carousel_img_2',
        'priority' => 20,
    )));
    
    // Carrusel de Imágenes - Imagen 3
    $wp_customize->add_setting('maquila_carousel_img_3', array(
        'default' => get_template_directory_uri() . '/assets/images/default-carousel-3.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'maquila_carousel_img_3', array(
        'label'    => __('Carrusel - Imagen 3', 'metapack'),
        'section'  => 'metapack_maquila',
        'settings' => 'maquila_carousel_img_3',
        'priority' => 30,
    )));
    
    // Carrusel de Imágenes - Imagen 4
    $wp_customize->add_setting('maquila_carousel_img_4', array(
        'default' => get_template_directory_uri() . '/assets/images/default-carousel-4.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'maquila_carousel_img_4', array(
        'label'    => __('Carrusel - Imagen 4', 'metapack'),
        'section'  => 'metapack_maquila',
        'settings' => 'maquila_carousel_img_4',
        'priority' => 40,
    )));
}
add_action('customize_register', 'metapack_maquila_customizer');

// =================================================
// HELPER PARA TIEMPO DE LECTURA
// =================================================
function metapack_reading_time($content) {
    if (empty($content)) return 0;
    $word_count = str_word_count(strip_tags($content));
    $readingtime = ceil($word_count / 200);
    return $readingtime > 0 ? $readingtime : 1;
}
// =================================================
// CUSTOM POST TYPE: TESTIMONIOS
// =================================================
function metapack_register_testimonios_cpt() {
    $labels = array(
        'name'                  => 'Testimonios',
        'singular_name'         => 'Testimonio',
        'menu_name'             => 'Testimonios',
        'add_new'               => 'Añadir Nuevo',
        'add_new_item'          => 'Añadir Nuevo Testimonio',
        'edit_item'             => 'Editar Testimonio',
        'all_items'             => 'Todos los Testimonios',
        'featured_image'        => 'Foto de la persona',
        'set_featured_image'    => 'Establecer foto',
        'remove_featured_image' => 'Eliminar foto',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-testimonial',
        'supports'           => array('title', 'editor', 'thumbnail'),
    );

    register_post_type('testimonio', $args);
}
add_action('init', 'metapack_register_testimonios_cpt');

/**
 * Añadir campos extras (Metabox) para Cargo y Estrellas
 */
function metapack_testimonial_metabox() {
    add_meta_box(
        'metapack_testimonial_details',
        'Detalles del Testimonio',
        'metapack_testimonial_metabox_callback',
        'testimonio',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'metapack_testimonial_metabox');

function metapack_testimonial_metabox_callback($post) {
    wp_nonce_field('metapack_testimonial_save', 'metapack_testimonial_nonce');
    $role = get_post_meta($post->ID, '_testimonial_role', true);
    $stars = get_post_meta($post->ID, '_testimonial_stars', true);
    if (!$stars) $stars = 5;
    ?>
    <p>
        <label for="testimonial_role">Cargo / Empresa:</label><br>
        <input type="text" id="testimonial_role" name="testimonial_role" value="<?php echo esc_attr($role); ?>" style="width:100%;">
    </p>
    <p>
        <label for="testimonial_stars">Estrellas (1-5):</label><br>
        <input type="number" id="testimonial_stars" name="testimonial_stars" min="1" max="5" value="<?php echo esc_attr($stars); ?>">
    </p>
    <?php
}

function metapack_testimonial_save_meta($post_id) {
    if (!isset($_POST['metapack_testimonial_nonce'])) return;
    if (!wp_verify_nonce($_POST['metapack_testimonial_nonce'], 'metapack_testimonial_save')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['testimonial_role'])) {
        update_post_meta($post_id, '_testimonial_role', sanitize_text_field($_POST['testimonial_role']));
    }
    if (isset($_POST['testimonial_stars'])) {
        update_post_meta($post_id, '_testimonial_stars', sanitize_text_field($_POST['testimonial_stars']));
    }
}
add_action('save_post', 'metapack_testimonial_save_meta');

// =================================================
// CORRECCIONES CONTACT FORM 7 Y FLAMINGO
// =================================================
add_filter('wpcf7_mail_components', 'metapack_fix_cf7_mail', 10, 3);
function metapack_fix_cf7_mail($components, $contact_form, $mail_template) {
    // 1. Obtener la sumisión actual
    $submission = WPCF7_Submission::get_instance();
    if (!$submission) return $components;
    
    $data = $submission->get_posted_data();
    
    // 2. Detectar campos comunes (compatible con nombres estándar y personalizados)
    $name = $data['your-name'] ?? $data['nombre'] ?? 'Usuario';
    $email = $data['your-email'] ?? $data['email'] ?? $data['correo'] ?? '';
    // Intentar obtener asunto, si no existe, construir uno
    $subject_raw = $data['your-subject'] ?? $data['asunto'] ?? '';
    if (empty($subject_raw)) {
        $subject_raw = 'Solicitud de Cotización';
    }

    // 3. Corregir "From" (Remitente)
    // Debe ser un dominio del sitio para evitar spam (ej: no-reply@metapack.com.mx)
    $domain = 'metapack.com.mx'; 
    if (isset($_SERVER['SERVER_NAME'])) {
        $domain = str_replace('www.', '', $_SERVER['SERVER_NAME']);
    }
    // "WordPress" <no-reply@domino.com>
    $components['sender'] = 'Web Metapack <no-reply@' . $domain . '>';

    // 4. Corregir "Subject" (Asunto en Flamingo y Correo)
    $components['subject'] = $subject_raw . ' - De: ' . $name;

    // 5. Establecer Destinatario (Change the email address assigned)
    // Usamos el email configurado en el personalizador o fallback a ventas
    $target_email = get_theme_mod('contact_email_sales', 'ventas@metapack.com.mx');
    if (!empty($target_email)) {
        $components['recipient'] = $target_email;
    }

    // 6. Corregir "Reply-To" (Responder a)
    // Esto asegura que al dar "Responder" en el correo, vaya al cliente
    if (!empty($email)) {
        $headers = "Reply-To: $email\r\n";
        // Mantener otros headers si existen
        if (isset($components['additional_headers']) && !empty($components['additional_headers'])) {
             $headers .= $components['additional_headers'];
        }
        $components['additional_headers'] = $headers;
    }

    return $components;
}

// Corregir el Asunto específicamente en la lista de Flamingo (Inbound Messages)
add_filter('flamingo_inbound_subject', 'metapack_fix_flamingo_subject', 10, 1);
function metapack_fix_flamingo_subject($subject) {
    // Si el asunto es genérico o vacío, intentar sacarlo del POST
    if (empty($subject) || strpos($subject, 'Formulario de contacto') !== false) {
         if (isset($_POST['your-subject'])) return sanitize_text_field($_POST['your-subject']);
         if (isset($_POST['asunto'])) return sanitize_text_field($_POST['asunto']);
         if (isset($_POST['your-name'])) return 'Mensaje de ' . sanitize_text_field($_POST['your-name']);
         if (isset($_POST['nombre'])) return 'Mensaje de ' . sanitize_text_field($_POST['nombre']);
    }
    return $subject;
}

// =================================================
// CLASES PARA EL MENÚ (Para mantener diseño BEM)
// =================================================
function metapack_add_menu_link_class($atts, $item, $args) {
    if ($args->theme_location == 'primary') {
        $atts['class'] = 'mp-nav__link';
        if ($item->current) {
            $atts['class'] .= ' mp-nav__link--active';
        }
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'metapack_add_menu_link_class', 10, 3);

// =================================================
// OPTIMIZACIÓN DE CONTACT FORM 7
// =================================================
add_filter('wpcf7_load_js', '__return_false');
add_filter('wpcf7_load_css', '__return_false');

function metapack_enqueue_cf7_selectively() {
    if (is_page('contacto') || is_page('cotizar') || is_front_page() || is_singular('producto') || is_page_template('page-industria.php')) {
        if (function_exists('wpcf7_enqueue_scripts')) {
            wpcf7_enqueue_scripts();
        }
        if (function_exists('wpcf7_enqueue_styles')) {
            wpcf7_enqueue_styles();
        }
    }
}
add_action('wp_enqueue_scripts', 'metapack_enqueue_cf7_selectively', 20);

// =================================================
// BREADCRUMBS DINÁMICOS Y MARCADO JSON-LD (BREADCRUBLIST)
// =================================================
function metapack_breadcrumbs($class_prefix = 'mp-breadcrumb') {
    $home_title = 'Inicio';
    $home_url = home_url('/');
    
    $crumbs = array();
    $crumbs[] = array('name' => $home_title, 'url' => $home_url);
    
    if (is_singular('producto')) {
        $crumbs[] = array('name' => 'Productos', 'url' => home_url('/productos/'));
        $crumbs[] = array('name' => get_the_title(), 'url' => get_permalink());
    } elseif (is_single()) {
        $blog_page_id = get_option('page_for_posts');
        $blog_title = $blog_page_id ? get_the_title($blog_page_id) : 'Blog';
        $blog_url = $blog_page_id ? get_permalink($blog_page_id) : home_url('/blog/');
        $crumbs[] = array('name' => $blog_title, 'url' => $blog_url);
        $crumbs[] = array('name' => get_the_title(), 'url' => get_permalink());
    } elseif (is_page()) {
        $crumbs[] = array('name' => get_the_title(), 'url' => get_permalink());
    } elseif (is_tax()) {
        $term = get_queried_object();
        if ($term->taxonomy === 'industria' || $term->taxonomy === 'categoria_producto') {
            $crumbs[] = array('name' => 'Productos', 'url' => home_url('/productos/'));
        }
        $crumbs[] = array('name' => $term->name, 'url' => get_term_link($term));
    }
    
    if (empty($crumbs)) {
        return;
    }
    
    // Output HTML
    if ($class_prefix === 'mp-breadcrumbs') {
        echo '<nav class="mp-breadcrumbs">';
        foreach ($crumbs as $i => $crumb) {
            if ($i > 0) {
                echo ' / ';
            }
            if ($i === count($crumbs) - 1) {
                echo '<span>' . esc_html($crumb['name']) . '</span>';
            } else {
                echo '<a href="' . esc_url($crumb['url']) . '">' . esc_html($crumb['name']) . '</a>';
            }
        }
        echo '</nav>';
    } else {
        echo '<nav class="mp-breadcrumb__nav">';
        foreach ($crumbs as $i => $crumb) {
            if ($i > 0) {
                echo '<span class="mp-breadcrumb__separator">/</span>';
            }
            if ($i === count($crumbs) - 1) {
                echo '<span class="mp-breadcrumb__current">' . esc_html($crumb['name']) . '</span>';
            } else {
                echo '<a href="' . esc_url($crumb['url']) . '">' . esc_html($crumb['name']) . '</a>';
            }
        }
        echo '</nav>';
    }
    
    // Output JSON-LD
    $json_ld = array(
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => array()
    );
    foreach ($crumbs as $i => $crumb) {
        $json_ld['itemListElement'][] = array(
            '@type' => 'ListItem',
            'position' => $i + 1,
            'name' => $crumb['name'],
            'item' => $crumb['url']
        );
    }
    
    echo '<script type="application/ld+json">' . json_encode($json_ld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
}

// =================================================
// CANONICAL LINK DINÁMICO EN EL HEADER (wp_head)
// =================================================
function metapack_dynamic_canonical() {
    global $wp;
    
    if (is_front_page()) {
        $canonical_url = home_url('/');
    } elseif (is_home()) {
        $canonical_url = get_permalink(get_option('page_for_posts'));
    } elseif (is_singular()) {
        $canonical_url = get_permalink();
    } elseif (is_tax() || is_category() || is_tag()) {
        $canonical_url = get_term_link(get_queried_object());
    } elseif (is_post_type_archive()) {
        $canonical_url = get_post_type_archive_link(get_query_var('post_type'));
    } else {
        $canonical_url = home_url(add_query_arg(array(), $wp->request ?? ''));
    }
    
    if (!empty($canonical_url) && !is_wp_error($canonical_url)) {
        // Remover canonical de WordPress core si existe
        remove_action('wp_head', 'rel_canonical');
        echo '<link rel="canonical" href="' . esc_url($canonical_url) . '" />' . "\n";
    }
}
add_action('wp_head', 'metapack_dynamic_canonical', 5);
