<?php
/**
 * Template Name: Landing Industria
 * 
 * Plantilla de página para presentar soluciones específicas por industria.
 */

// Usar el header compartido
get_template_part('template-parts/header', 'metapack');

// Datos para la sección de problemas/soluciones
$problema_titulo = get_field('problema_titulo') ?: 'Desafíos comunes en el sector';
$problema_descripcion = get_field('problema_descripcion') ?: 'Las operaciones industriales requieren empaques confiables que garanticen la higiene, la resistencia térmica y la preservación óptima. Cualquier variación en el calibre o la pureza del aluminio puede detener la línea de producción o afectar la calidad del producto final.';
$solucion_titulo = get_field('solucion_titulo') ?: 'La Solución MetaPack';
$solucion_descripcion = get_field('solucion_descripcion') ?: 'Suministramos rollos de aluminio y complementos bajo estrictas normas de grado alimenticio y calibres controlados. Nuestra capacidad de maquila y personalización asegura que reciba el material con el ancho y espesor exactos para su maquinaria.';

// Obtener slug de industria
$page_slug = get_post_field('post_name', get_the_ID());
$term_slug = get_field('slug_industria') ?: $page_slug;

// Query para obtener productos de esta industria
$args = array(
    'post_type' => 'producto',
    'posts_per_page' => 6,
    'tax_query' => array(
        array(
            'taxonomy' => 'industria',
            'field' => 'slug',
            'terms' => $term_slug,
        )
    )
);
$query = new WP_Query($args);
?>

<!-- ============================================ -->
<!-- HERO DE LA INDUSTRIA                         -->
<!-- ============================================ -->
<section class="mp-quienes-hero-v2">
    <div class="mp-container">
        <div class="mp-quienes-hero-v2__box mp-reveal-scale">
            <div class="mp-quienes-hero-v2__content">
                <span class="mp-section-tag" style="color: var(--mp-white); opacity: 0.8; margin-bottom: 8px; display: inline-block;">SOLUCIONES POR SECTOR</span>
                <h1 class="mp-quienes-hero-v2__title"><?php the_title(); ?></h1>
                <div class="mp-quienes-hero-v2__subtitle-wrap">
                    <p class="mp-quienes-hero-v2__subtitle">
                        <?php echo esc_html(get_the_excerpt() ?: 'Soluciones de empaque en aluminio optimizadas para los requerimientos técnicos y estándares de su industria.'); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- RETOS Y SOLUCIÓN                             -->
<!-- ============================================ -->
<section class="mp-sector-desafios" style="padding: 80px 0; background: var(--mp-light-gray);">
    <div class="mp-container">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px; align-items: center;">
            <div class="mp-reveal-left">
                <span class="mp-section-tag">EL RETO</span>
                <h2 class="mp-section-title" style="margin-bottom: 20px; font-size: 28px; text-transform: uppercase;"><?php echo esc_html($problema_titulo); ?></h2>
                <p style="font-family: var(--mp-font-body); color: var(--mp-dark-gray); line-height: 1.7; font-size: 16px;"><?php echo esc_html($problema_descripcion); ?></p>
            </div>
            <div class="mp-reveal-right" style="background: var(--mp-white); padding: 40px; border-radius: 8px; border-left: 5px solid var(--mp-primary); box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
                <span class="mp-section-tag">NUESTRA RESPUESTA</span>
                <h3 style="font-family: var(--mp-font-title); font-size: 22px; font-weight: 700; color: var(--mp-dark); margin: 10px 0 20px;"><?php echo esc_html($solucion_titulo); ?></h3>
                <p style="font-family: var(--mp-font-body); color: var(--mp-dark-gray); line-height: 1.7; font-size: 15px;"><?php echo esc_html($solucion_descripcion); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- PRODUCTOS RECOMENDADOS                       -->
<!-- ============================================ -->
<section class="mp-sector-productos" style="padding: 80px 0;">
    <div class="mp-container">
        <div class="mp-sector-productos__header mp-reveal-up" style="text-align: center; margin-bottom: 50px;">
            <span class="mp-section-tag">CATÁLOGO EXCLUSIVO</span>
            <h2 class="mp-section-title">Soluciones recomendadas</h2>
            <p class="mp-section-subtitle">Productos específicamente diseñados y aprobados para su uso en este sector.</p>
        </div>
        
        <?php if ($query->have_posts()) : ?>
            <div class="mp-otros-productos__grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
                <?php while ($query->have_posts()) : $query->the_post(); 
                    $rel_calibre = get_field('calibre');
                    $rel_calibres = $rel_calibre ? array_map('trim', explode(',', $rel_calibre)) : array();
                    $whatsapp = get_theme_mod('contact_whatsapp', '523313011647');
                ?>
                <article class="mp-product-card">
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
                            <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>?text=<?php echo urlencode('Hola, me interesa cotizar para el sector ' . get_the_title() . ': ' . get_the_title()); ?>" class="mp-product-card__btn mp-product-card__btn--primary" target="_blank">COTIZAR</a>
                        </div>
                    </div>
                </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php else : ?>
            <div style="text-align: center; padding: 40px; background: var(--mp-light-gray); border-radius: 8px;">
                <p style="font-family: var(--mp-font-body); color: var(--mp-gray); margin: 0 0 20px;">No se encontraron productos específicos para esta industria en este momento.</p>
                <a href="<?php echo home_url('/productos/'); ?>" class="mp-btn mp-btn--primary">Ver catálogo completo</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- ============================================ -->
<!-- TESTIMONIOS                                  -->
<!-- ============================================ -->
<?php
$testimonios_args = array(
    'post_type' => 'testimonio',
    'posts_per_page' => 3
);
$testimonios_query = new WP_Query($testimonios_args);

if ($testimonios_query->have_posts()) :
?>
<section class="mp-sector-testimonios" style="padding: 80px 0; background: var(--mp-light-gray);">
    <div class="mp-container">
        <div style="text-align: center; margin-bottom: 50px;">
            <span class="mp-section-tag">CASOS DE ÉXITO</span>
            <h2 class="mp-section-title">Lo que dicen nuestros clientes</h2>
        </div>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
            <?php while ($testimonios_query->have_posts()) : $testimonios_query->the_post(); 
                $role = get_post_meta(get_the_ID(), '_testimonial_role', true);
                $stars = get_post_meta(get_the_ID(), '_testimonial_stars', true) ?: 5;
            ?>
            <div style="background: var(--mp-white); padding: 30px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
                <div style="color: #FFC107; margin-bottom: 15px;">
                    <?php for ($i = 0; $i < 5; $i++) {
                        echo $i < $stars ? '★' : '☆';
                    } ?>
                </div>
                <p style="font-family: var(--mp-font-body); font-style: italic; color: var(--mp-dark-gray); line-height: 1.6; margin-bottom: 20px;">
                    "<?php echo wp_strip_all_tags(get_the_content()); ?>"
                </p>
                <h4 style="font-family: var(--mp-font-title); font-size: 16px; font-weight: 700; color: var(--mp-dark); margin: 0;"><?php the_title(); ?></h4>
                <?php if ($role) : ?>
                    <span style="font-family: var(--mp-font-body); font-size: 14px; color: var(--mp-gray);"><?php echo esc_html($role); ?></span>
                <?php endif; ?>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ============================================ -->
<!-- FORMULARIO DE CONTACTO                       -->
<!-- ============================================ -->
<?php 
get_template_part('template-parts/contact', 'metapack', array(
    'form_message' => 'Me interesa cotizar soluciones para el sector: ' . get_the_title()
)); 

// Usar el footer compartido
get_template_part('template-parts/footer', 'metapack');
?>
