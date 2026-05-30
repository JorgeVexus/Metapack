<?php
/**
 * Template para detalle de Producto Individual
 * 
 * Diseño según Figma - con lightbox y secciones adicionales
 */

// ACF Fields (Compatible con ACF Free)
$modelo = get_field('modelo');
$calibre_raw = get_field('calibre');
$imagen_2 = get_field('imagen_2');
$imagen_3 = get_field('imagen_3');
$imagen_4 = get_field('imagen_4');
$especificaciones_texto = get_field('especificaciones_texto');
$ficha_tecnica = get_field('ficha_tecnica');

// Parsear calibres separados por coma
$calibres = array();
if ($calibre_raw) {
    $calibres = array_map('trim', explode(',', $calibre_raw));
}

// Construir array de imágenes para galería
$galeria_imagenes = array();
if (has_post_thumbnail()) {
    $galeria_imagenes[] = array(
        'full' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
        'large' => get_the_post_thumbnail_url(get_the_ID(), 'large'),
        'thumb' => get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'),
    );
}
if ($imagen_2) {
    $galeria_imagenes[] = array(
        'full' => $imagen_2['url'],
        'large' => $imagen_2['sizes']['large'] ?? $imagen_2['url'],
        'thumb' => $imagen_2['sizes']['thumbnail'] ?? $imagen_2['url'],
    );
}
if ($imagen_3) {
    $galeria_imagenes[] = array(
        'full' => $imagen_3['url'],
        'large' => $imagen_3['sizes']['large'] ?? $imagen_3['url'],
        'thumb' => $imagen_3['sizes']['thumbnail'] ?? $imagen_3['url'],
    );
}
if ($imagen_4) {
    $galeria_imagenes[] = array(
        'full' => $imagen_4['url'],
        'large' => $imagen_4['sizes']['large'] ?? $imagen_4['url'],
        'thumb' => $imagen_4['sizes']['thumbnail'] ?? $imagen_4['url'],
    );
}

// Parsear especificaciones de texto a array
$especificaciones = array();
if ($especificaciones_texto) {
    $lineas = explode("\n", $especificaciones_texto);
    foreach ($lineas as $linea) {
        $linea = trim($linea);
        if (strpos($linea, ':') !== false) {
            list($titulo, $valor) = explode(':', $linea, 2);
            $especificaciones[] = array(
                'titulo' => trim($titulo),
                'valor' => trim($valor),
            );
        }
    }
}

// Taxonomías
$industrias = get_the_terms(get_the_ID(), 'industria');
$categorias = get_the_terms(get_the_ID(), 'categoria_producto');

// WhatsApp
$whatsapp = get_theme_mod('contact_whatsapp', '523313011647');
$mensaje_whatsapp = urlencode("Hola, me interesa cotizar:\n\n📦 Producto: " . get_the_title() . "\n" . ($modelo ? "📏 Modelo: " . $modelo . "\n" : "") . ($calibre_raw ? "⚙️ Calibre: " . $calibre_raw . "\n" : "") . "\n¿Me pueden dar más información?");

// FASE 2: Marcado JSON-LD Schema.org para productos B2B
$prod_description = get_field('descripcion_larga') ?: (get_the_excerpt() ?: wp_strip_all_tags(get_the_content()));
$prod_calibre = get_field('calibre_micras') ?: $calibre_raw;
$prod_ancho = get_field('ancho_cm') ?: '';
$prod_largo = get_field('largo_m') ?: '';
$prod_gramaje = get_field('gramaje') ?: '';
$prod_disponibilidad = get_field('disponibilidad') ?: 'InStock';

// Intentar extraer valores si no están definidos
if (empty($prod_ancho) || empty($prod_gramaje)) {
    if (!empty($especificaciones)) {
        foreach ($especificaciones as $spec) {
            $titulo_clean = strtolower(str_replace(
                array('á','é','í','ó','ú','Á','É','Í','Ó','Ú','ñ','Ñ'),
                array('a','e','i','o','u','A','E','I','O','U','n','N'),
                $spec['titulo']
            ));
            if (empty($prod_ancho) && (strpos($titulo_clean, 'ancho') !== false || strpos($titulo_clean, 'dimension') !== false)) {
                $prod_ancho = $spec['valor'];
            }
            if (empty($prod_gramaje) && strpos($titulo_clean, 'gramaje') !== false) {
                $prod_gramaje = $spec['valor'];
            }
        }
    }
}

$product_schema = array(
    '@context' => 'https://schema.org/',
    '@type' => 'Product',
    'name' => get_the_title(),
    'image' => array_column($galeria_imagenes, 'full'),
    'description' => esc_attr(wp_strip_all_tags($prod_description)),
    'sku' => $modelo ?: get_the_ID(),
    'brand' => array(
        '@type' => 'Brand',
        'name' => 'MetaPack'
    ),
    'offers' => array(
        '@type' => 'Offer',
        'url' => get_permalink(),
        'priceCurrency' => 'MXN',
        'price' => '0.00',
        'priceValidUntil' => '2027-12-31',
        'availability' => 'https://schema.org/' . ($prod_disponibilidad === 'InStock' ? 'InStock' : 'OutOfStock'),
        'itemCondition' => 'https://schema.org/NewCondition'
    )
);

$additional_property = array();
if (!empty($prod_calibre)) {
    $additional_property[] = array(
        '@type' => 'PropertyValue',
        'name' => 'Calibre',
        'value' => $prod_calibre
    );
}
if (!empty($prod_ancho)) {
    $additional_property[] = array(
        '@type' => 'PropertyValue',
        'name' => 'Ancho',
        'value' => $prod_ancho
    );
}
if (!empty($prod_largo)) {
    $additional_property[] = array(
        '@type' => 'PropertyValue',
        'name' => 'Largo',
        'value' => $prod_largo
    );
}
if (!empty($prod_gramaje)) {
    $additional_property[] = array(
        '@type' => 'PropertyValue',
        'name' => 'Gramaje',
        'value' => $prod_gramaje
    );
}
if (!empty($additional_property)) {
    $product_schema['additionalProperty'] = $additional_property;
}

// Agregar el script al head
add_action('wp_head', function() use ($product_schema) {
    echo '<script type="application/ld+json">' . json_encode($product_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
}, 15);

// Incluir header compartido
get_template_part('template-parts/header', 'metapack');
?>


<!-- ============================================ -->
<!-- BREADCRUMB                                  -->
<!-- ============================================ -->

<div class="mp-breadcrumb">
    <div class="mp-container">
        <?php if (function_exists('metapack_breadcrumbs')) { metapack_breadcrumbs('mp-breadcrumb'); } ?>
    </div>
</div>


<!-- ============================================ -->
<!-- DETALLE DEL PRODUCTO                        -->
<!-- ============================================ -->

<section class="mp-producto-detalle">
    <div class="mp-container">
        <div class="mp-producto-detalle__grid">
            
            <!-- Columna Izquierda: Galería -->
            <div class="mp-producto-detalle__galeria mp-reveal-left">
                <!-- Imagen Principal con Lightbox -->
                <div class="mp-galeria-principal" id="galeria-principal">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php 
                        echo wp_get_attachment_image(
                            get_post_thumbnail_id(), 
                            'large', 
                            false, 
                            array(
                                'class' => 'mp-galeria-principal__img',
                                'id' => 'imagen-principal',
                                'data-full' => get_the_post_thumbnail_url(get_the_ID(), 'full')
                            )
                        );
                        ?>
                        <button class="mp-galeria-zoom" id="btn-zoom" aria-label="Ver imagen en grande">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="M21 21l-4.35-4.35"></path>
                                <path d="M11 8v6M8 11h6"></path>
                            </svg>
                        </button>
                    <?php else : ?>
                        <div class="mp-galeria-principal__placeholder">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                        </div>
                    <?php endif; ?>
                </div>
                
                <!-- Miniaturas -->
                <?php if (count($galeria_imagenes) > 1) : ?>
                <div class="mp-galeria-thumbs">
                    <?php $first = true; foreach ($galeria_imagenes as $idx => $imagen) : ?>
                        <button class="mp-galeria-thumb <?php echo $first ? 'mp-galeria-thumb--active' : ''; ?>" 
                                data-src="<?php echo esc_url($imagen['large']); ?>"
                                data-full="<?php echo esc_url($imagen['full']); ?>"
                                data-index="<?php echo $idx; ?>">
                            <?php 
                            if (!empty($imagen['id'])) {
                                echo wp_get_attachment_image($imagen['id'], 'thumbnail', false, array('class' => 'mp-galeria-thumb__img'));
                            } else {
                                ?>
                                <img src="<?php echo esc_url($imagen['thumb']); ?>" 
                                     alt="<?php the_title(); ?>"
                                     class="mp-galeria-thumb__img"
                                     width="150" height="150">
                                <?php
                            }
                            ?>
                        </button>
                    <?php $first = false; endforeach; ?>
                </div>
                <?php endif; ?>
                
                <!-- Card de Maquila -->
                <div class="mp-maquila-card">
                    <h4 class="mp-maquila-card__title">¿Necesitas medidas especiales?</h4>
                    <p class="mp-maquila-card__text">Fabricamos anchos y calibres especiales bajo pedido mínimo. Servicio de maquila disponible.</p>
                    <div class="mp-maquila-card__buttons">
                        <a href="<?php echo home_url('/'); ?>#mp-maquila" class="mp-btn mp-btn--outline-primary">Conocer servicio de maquila</a>
                        <a href="<?php echo home_url('/productos/'); ?>" class="mp-btn mp-btn--text-primary">Contactar un asesor</a>
                    </div>
                </div>
            </div>
            
            <!-- Columna Derecha: Información -->
            <div class="mp-producto-detalle__info mp-reveal-right">
                
                <!-- Tags de industria -->
                <?php if ($industrias && !is_wp_error($industrias)) : ?>
                <div class="mp-producto-detalle__tags">
                    <?php foreach ($industrias as $ind) : ?>
                        <span class="mp-tag mp-tag--industry"><?php echo esc_html(strtoupper($ind->name)); ?></span>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                
                <!-- Título -->
                <h1 class="mp-producto-detalle__title"><?php the_title(); ?></h1>
                
                <!-- Descripción -->
                <div class="mp-producto-detalle__descripcion">
                    <?php the_content(); ?>
                </div>
                
                <!-- Info grid: Calibres al rolar y Selección de rollos -->
                <div class="mp-producto-specs-grid">
                    <?php if (!empty($calibres)) : ?>
                    <div class="mp-producto-specs-box">
                        <span class="mp-producto-specs-box__label">Calibres al rodar:</span>
                        <div class="mp-producto-specs-box__badges">
                            <?php foreach ($calibres as $cal) : ?>
                                <span class="mp-calibre-badge"><?php echo esc_html($cal); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($modelo) : ?>
                    <div class="mp-producto-specs-box">
                        <span class="mp-producto-specs-box__label">Selecciona el rollo:</span>
                        <div class="mp-producto-specs-box__badges">
                            <span class="mp-calibre-badge mp-calibre-badge--active"><?php echo esc_html($modelo); ?></span>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                
                <!-- Especificaciones Principales -->
                <?php if ($especificaciones) : ?>
                <div class="mp-specs-main">
                    <h3 class="mp-specs-main__title">Especificaciones principales</h3>
                    <ul class="mp-specs-main__list">
                        <?php foreach (array_slice($especificaciones, 0, 4) as $spec) : ?>
                        <li>
                            <span class="mp-specs-main__label"><?php echo esc_html($spec['titulo']); ?>:</span>
                            <span class="mp-specs-main__value"><?php echo esc_html($spec['valor']); ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
                
                <!-- Información Técnica (Acordeón) -->
                <div class="mp-info-tecnica">
                    <button class="mp-info-tecnica__toggle" id="toggle-info">
                        <span>Información técnica</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="mp-info-tecnica__content" id="info-content">
                        <?php if ($especificaciones) : ?>
                        <table class="mp-info-tecnica__table">
                            <?php foreach ($especificaciones as $spec) : ?>
                            <tr>
                                <th><?php echo esc_html($spec['titulo']); ?></th>
                                <td><?php echo esc_html($spec['valor']); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Botones de Acción -->
                <div class="mp-producto-detalle__actions">
                    <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo $mensaje_whatsapp; ?>" 
                       class="mp-btn mp-btn--primary mp-btn--lg mp-btn--icon" 
                       target="_blank">
                        Cotizar ahora
                    </a>
                    
                    <?php if ($ficha_tecnica) : ?>
                    <a href="<?php echo esc_url($ficha_tecnica['url']); ?>" 
                       class="mp-btn mp-btn--outline-primary mp-btn--lg" 
                       target="_blank"
                       download>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                            <polyline points="7 10 12 15 17 10"/>
                            <line x1="12" y1="15" x2="12" y2="3"/>
                        </svg>
                        Descargar ficha técnica
                    </a>
                    <?php endif; ?>
                </div>
                
            </div>
        </div>
    </div>
</section>


<!-- ============================================ -->
<!-- OTROS PRODUCTOS QUE PODRÍAN INTERESARTE     -->
<!-- ============================================ -->

<?php
// Obtener productos relacionados
$related_args = array(
    'post_type' => 'producto',
    'posts_per_page' => 3,
    'post__not_in' => array(get_the_ID()),
    'orderby' => 'rand',
);

if ($categorias && !is_wp_error($categorias)) {
    $related_args['tax_query'] = array(
        array(
            'taxonomy' => 'categoria_producto',
            'field' => 'term_id',
            'terms' => wp_list_pluck($categorias, 'term_id'),
        ),
    );
}

$related_query = new WP_Query($related_args);

if ($related_query->have_posts()) :
?>
<section class="mp-otros-productos">
    <div class="mp-container">
        <div class="mp-otros-productos__header mp-reveal-up">
            <h2 class="mp-otros-productos__title">Otros productos que podrían interesarte</h2>
            <div class="mp-otros-productos__nav">
                <button class="mp-slider-arrow mp-slider-arrow--prev" id="prev-related">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>
                <button class="mp-slider-arrow mp-slider-arrow--next" id="next-related">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>
            </div>
        </div>
        
        <div class="mp-otros-productos__grid" id="related-grid">
            <?php while ($related_query->have_posts()) : $related_query->the_post(); 
                $rel_industrias = get_the_terms(get_the_ID(), 'industria');
                $rel_calibre = get_field('calibre');
                $rel_calibres = $rel_calibre ? array_map('trim', explode(',', $rel_calibre)) : array();
            ?>
            <article class="mp-product-card">
                <?php if ($rel_industrias && !is_wp_error($rel_industrias)) : ?>
                <div class="mp-product-card__tag-wrap">
                    <span class="mp-product-card__industry-tag"><?php echo esc_html(strtoupper($rel_industrias[0]->name)); ?></span>
                </div>
                <?php endif; ?>
                
                <div class="mp-product-card__image">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('medium_large', array('class' => 'mp-product-card__img')); ?>
                    <?php else : ?>
                        <div class="mp-product-card__placeholder">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            </svg>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="mp-product-card__content">
                    <h3 class="mp-product-card__title"><?php the_title(); ?></h3>
                    <p class="mp-product-card__excerpt"><?php echo wp_trim_words(get_the_excerpt(), 12); ?></p>
                    
                    <?php if (!empty($rel_calibres)) : ?>
                    <div class="mp-product-card__calibres">
                        <span class="mp-product-card__calibres-label">Calibres disponibles:</span>
                        <div class="mp-product-card__calibres-list">
                            <?php foreach (array_slice($rel_calibres, 0, 4) as $cal) : ?>
                                <span class="mp-product-card__calibre-badge"><?php echo esc_html($cal); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <div class="mp-product-card__buttons">
                        <a href="<?php the_permalink(); ?>" class="mp-product-card__btn mp-product-card__btn--outline">VER DETALLES</a>
                        <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo urlencode('Hola, me interesa cotizar: ' . get_the_title()); ?>" class="mp-product-card__btn mp-product-card__btn--primary" target="_blank">COTIZAR</a>
                    </div>
                </div>
            </article>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
        
        <!-- Paginación dots -->
        <div class="mp-otros-productos__dots">
            <span class="mp-dot mp-dot--active"></span>
            <span class="mp-dot"></span>
        </div>
    </div>
</section>
<?php endif; ?>


<!-- ============================================ -->
<!-- APLICACIONES POR SECTOR                     -->
<!-- ============================================ -->

<?php
// Obtener todas las industrias
$all_industrias = get_terms(array(
    'taxonomy' => 'industria',
    'hide_empty' => true,
));

if (!empty($all_industrias) && !is_wp_error($all_industrias)) :
?>
<section class="mp-aplicaciones-sector">
    <div class="mp-container">
        <div class="mp-aplicaciones-sector__header mp-reveal-up">
            <h2 class="mp-aplicaciones-sector__title">Aplicaciones por sector</h2>
            <p class="mp-aplicaciones-sector__subtitle">Encuentra las soluciones de empaque ideales para tu industria. Cada sector tiene necesidades específicas que cubrimos.</p>
            <a href="<?php echo home_url('/productos/'); ?>" class="mp-btn mp-btn--outline-primary">Ver todos los productos</a>
        </div>
        
        <div class="mp-aplicaciones-sector__grid">
            <?php 
            $sector_images = array(
                'industria-alimenticia' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=400&h=300&fit=crop',
                'restaurantes' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=400&h=300&fit=crop',
                'hogar' => 'https://images.unsplash.com/photo-1556909114-44e3e70034e2?w=400&h=300&fit=crop',
                'default' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=300&fit=crop',
            );
            
            foreach (array_slice($all_industrias, 0, 4) as $industria) : 
                $image_url = $sector_images[$industria->slug] ?? $sector_images['default'];
            ?>
            <a href="<?php echo home_url('/productos/?industria=' . $industria->slug); ?>" class="mp-sector-card">
                <div class="mp-sector-card__image">
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($industria->name); ?>" width="400" height="300" loading="lazy">
                    <div class="mp-sector-card__overlay"></div>
                </div>
                <div class="mp-sector-card__content">
                    <h3 class="mp-sector-card__title"><?php echo esc_html($industria->name); ?></h3>
                    <p class="mp-sector-card__desc"><?php echo esc_html($industria->description ?: 'Soluciones de empaque especializadas para ' . strtolower($industria->name)); ?></p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>


<!-- ============================================ -->
<!-- CONTACTO (REUSABLE)                         -->
<!-- ============================================ -->
<?php 
get_template_part('template-parts/contact', 'metapack', array(
    'form_message' => 'Me interesa cotizar: ' . get_the_title()
)); 
?>


<!-- ============================================ -->
<!-- LIGHTBOX                                    -->
<!-- ============================================ -->

<div class="mp-lightbox" id="lightbox">
    <div class="mp-lightbox__overlay"></div>
    <div class="mp-lightbox__content">
        <button class="mp-lightbox__close" id="lightbox-close">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
        <button class="mp-lightbox__arrow mp-lightbox__arrow--prev" id="lightbox-prev">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
        </button>
        <img src="" alt="" class="mp-lightbox__img" id="lightbox-img">
        <button class="mp-lightbox__arrow mp-lightbox__arrow--next" id="lightbox-next">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </button>
    </div>
</div>


<!-- Script de galería, lightbox y acordeón -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Variables
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxClose = document.getElementById('lightbox-close');
    const lightboxPrev = document.getElementById('lightbox-prev');
    const lightboxNext = document.getElementById('lightbox-next');
    const thumbs = document.querySelectorAll('.mp-galeria-thumb');
    const mainImg = document.getElementById('imagen-principal');
    const btnZoom = document.getElementById('btn-zoom');
    
    let currentIndex = 0;
    const images = [];
    
    // Construir array de imágenes
    thumbs.forEach((thumb, idx) => {
        images.push(thumb.dataset.full);
    });
    
    // Si no hay thumbs, usar imagen principal
    if (images.length === 0 && mainImg) {
        images.push(mainImg.dataset.full || mainImg.src);
    }
    
    // Cambiar imagen principal al hacer clic en miniatura
    thumbs.forEach((thumb, idx) => {
        thumb.addEventListener('click', function() {
            if (mainImg) {
                mainImg.src = this.dataset.src;
                mainImg.dataset.full = this.dataset.full;
            }
            thumbs.forEach(t => t.classList.remove('mp-galeria-thumb--active'));
            this.classList.add('mp-galeria-thumb--active');
            currentIndex = idx;
        });
    });
    
    // Abrir lightbox
    function openLightbox(index) {
        if (images.length === 0) return;
        currentIndex = index;
        lightboxImg.src = images[currentIndex];
        lightbox.classList.add('mp-lightbox--open');
        document.body.style.overflow = 'hidden';
    }
    
    // Cerrar lightbox
    function closeLightbox() {
        lightbox.classList.remove('mp-lightbox--open');
        document.body.style.overflow = '';
    }
    
    // Navegación lightbox
    function showPrev() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        lightboxImg.src = images[currentIndex];
    }
    
    function showNext() {
        currentIndex = (currentIndex + 1) % images.length;
        lightboxImg.src = images[currentIndex];
    }
    
    // Event listeners para lightbox
    if (btnZoom) {
        btnZoom.addEventListener('click', () => openLightbox(currentIndex));
    }
    
    if (mainImg) {
        mainImg.addEventListener('click', () => openLightbox(currentIndex));
        mainImg.style.cursor = 'zoom-in';
    }
    
    if (lightboxClose) lightboxClose.addEventListener('click', closeLightbox);
    if (lightboxPrev) lightboxPrev.addEventListener('click', showPrev);
    if (lightboxNext) lightboxNext.addEventListener('click', showNext);
    
    // Cerrar con overlay
    if (lightbox) {
        lightbox.querySelector('.mp-lightbox__overlay').addEventListener('click', closeLightbox);
    }
    
    // Teclas de navegación
    document.addEventListener('keydown', function(e) {
        if (!lightbox.classList.contains('mp-lightbox--open')) return;
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowLeft') showPrev();
        if (e.key === 'ArrowRight') showNext();
    });
    
    // Acordeón de información técnica
    const toggleInfo = document.getElementById('toggle-info');
    const infoContent = document.getElementById('info-content');
    
    if (toggleInfo && infoContent) {
        toggleInfo.addEventListener('click', function() {
            this.classList.toggle('mp-info-tecnica__toggle--active');
            infoContent.classList.toggle('mp-info-tecnica__content--open');
        });
    }
});
</script>

<?php
// Incluir footer compartido
get_template_part('template-parts/footer', 'metapack');
?>
