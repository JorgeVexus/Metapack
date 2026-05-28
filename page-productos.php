<?php
/**
 * Template Name: Catálogo de Productos
 * Template Post Type: page
 * 
 * Plantilla para la página de catálogo de productos de Metapack
 */

get_header(); ?>


<!-- ============================================ -->
<!-- HERO PRODUCTOS (ESTILO QUIÉNES SOMOS)       -->
<!-- ============================================ -->

<section class="mp-quienes-hero-v2">
    <div class="mp-container">
        <div class="mp-quienes-hero-v2__box mp-reveal-scale">
            <div class="mp-quienes-hero-v2__content">
                <h1 class="mp-quienes-hero-v2__title">NUESTROS PRODUCTOS</h1>
                <div class="mp-quienes-hero-v2__subtitle-wrap">
                    <p class="mp-quienes-hero-v2__subtitle">
                        Soluciones de empaque en aluminio diseñadas para las industrias más exigentes. Calidad certificada y trazabilidad completa.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ============================================ -->
<!-- FILTROS Y CATÁLOGO                          -->
<!-- ============================================ -->

<section class="mp-productos-catalogo" id="mp-productos-catalogo">
    <div class="mp-container">
        
        <!-- Barra de Filtros -->
        <div class="mp-filtros mp-reveal-up">
            <div class="mp-filtros__grupo">
                <label class="mp-filtros__label">Filtrar por:</label>
                
                <!-- Filtro por Categoría -->
                <div class="mp-filtros__select-wrapper">
                    <select class="mp-filtros__select" id="filtro-categoria" data-filter="categoria_producto">
                        <option value="">Todas las categorías</option>
                        <?php
                        $categorias = get_terms(array(
                            'taxonomy' => 'categoria_producto',
                            'hide_empty' => true,
                        ));
                        if (!empty($categorias) && !is_wp_error($categorias)) :
                            foreach ($categorias as $categoria) : ?>
                                <option value="<?php echo esc_attr($categoria->slug); ?>">
                                    <?php echo esc_html($categoria->name); ?>
                                </option>
                            <?php endforeach;
                        endif;
                        ?>
                    </select>
                    <svg class="mp-filtros__arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </div>
                
                <!-- Filtro por Industria -->
                <div class="mp-filtros__select-wrapper">
                    <select class="mp-filtros__select" id="filtro-industria" data-filter="industria">
                        <option value="">Todas las industrias</option>
                        <?php
                        $industrias = get_terms(array(
                            'taxonomy' => 'industria',
                            'hide_empty' => true,
                        ));
                        if (!empty($industrias) && !is_wp_error($industrias)) :
                            foreach ($industrias as $industria) : ?>
                                <option value="<?php echo esc_attr($industria->slug); ?>">
                                    <?php echo esc_html($industria->name); ?>
                                </option>
                            <?php endforeach;
                        endif;
                        ?>
                    </select>
                    <svg class="mp-filtros__arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </div>
            </div>
            
            <!-- Búsqueda -->
            <div class="mp-filtros__busqueda">
                <input type="text" class="mp-filtros__input" id="busqueda-producto" placeholder="Buscar producto...">
                <svg class="mp-filtros__search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </div>
        </div>
        
        <!-- Contador de resultados -->
        <div class="mp-productos__contador">
            <span id="productos-count">0</span> productos encontrados
        </div>
        
        <!-- Grid de Productos -->
        <div class="mp-productos__grid" id="productos-grid">
            <?php
            $productos_query = new WP_Query(array(
                'post_type' => 'producto',
                'posts_per_page' => -1,
                'orderby' => 'title',
                'order' => 'ASC',
            ));
            
            if ($productos_query->have_posts()) :
                while ($productos_query->have_posts()) : $productos_query->the_post();
                    // Obtener taxonomías para data attributes
                    $categorias_terms = get_the_terms(get_the_ID(), 'categoria_producto');
                    $industrias_terms = get_the_terms(get_the_ID(), 'industria');
                    
                    $categorias_slugs = '';
                    $industrias_slugs = '';
                    
                    if ($categorias_terms && !is_wp_error($categorias_terms)) {
                        $categorias_slugs = implode(' ', wp_list_pluck($categorias_terms, 'slug'));
                    }
                    if ($industrias_terms && !is_wp_error($industrias_terms)) {
                        $industrias_slugs = implode(' ', wp_list_pluck($industrias_terms, 'slug'));
                    }
                    
                    // ACF Fields
                    $modelo = get_field('modelo');
                    $calibre = get_field('calibre');
            ?>
            
            <article class="mp-producto-card" 
                     data-categoria="<?php echo esc_attr($categorias_slugs); ?>"
                     data-industria="<?php echo esc_attr($industrias_slugs); ?>"
                     data-titulo="<?php echo esc_attr(strtolower(get_the_title())); ?>">
                
                <a href="<?php the_permalink(); ?>" class="mp-producto-card__link">
                    <div class="mp-producto-card__image">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium_large', array('class' => 'mp-producto-card__img')); ?>
                        <?php else : ?>
                            <div class="mp-producto-card__placeholder">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <polyline points="21 15 16 10 5 21"></polyline>
                                </svg>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="mp-producto-card__content">
                        <h3 class="mp-producto-card__title"><?php the_title(); ?></h3>
                        
                        <?php if ($modelo) : ?>
                            <p class="mp-producto-card__modelo">Modelo: <?php echo esc_html($modelo); ?></p>
                        <?php endif; ?>
                        
                        <?php if (has_excerpt()) : ?>
                            <p class="mp-producto-card__excerpt"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                        <?php endif; ?>
                        
                        <?php if ($industrias_terms && !is_wp_error($industrias_terms)) : ?>
                            <div class="mp-producto-card__tags">
                                <?php foreach (array_slice($industrias_terms, 0, 2) as $term) : ?>
                                    <span class="mp-producto-card__tag"><?php echo esc_html($term->name); ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        
                        <span class="mp-producto-card__cta">
                            Ver detalles
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </span>
                    </div>
                </a>
            </article>
            
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <div class="mp-productos__empty">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                    <p>No hay productos disponibles en este momento.</p>
                    <p>Vuelve pronto o contáctanos para más información.</p>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Mensaje de no resultados (oculto por defecto) -->
        <div class="mp-productos__no-results" id="no-results" style="display: none;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                <line x1="8" y1="8" x2="14" y2="14"></line>
                <line x1="14" y1="8" x2="8" y2="14"></line>
            </svg>
            <p>No se encontraron productos con los filtros seleccionados.</p>
            <button class="mp-btn mp-btn--primary" id="limpiar-filtros">Limpiar filtros</button>
        </div>
        
    </div>
</section>


<!-- ============================================ -->
<!-- CTA COTIZACIÓN                              -->
<!-- ============================================ -->

<section class="mp-cta-section mp-cta-section--productos">
    <div class="mp-container">
        <div class="mp-cta-box">
            <div class="mp-cta-box__inner">
                <div class="mp-cta-box__content">
                    <h2 class="mp-cta-box__title">¿No encuentras lo que buscas?</h2>
                    <p class="mp-cta-box__text">Contamos con capacidad de fabricación personalizada. Cuéntanos tu proyecto y te ayudamos a encontrar la solución ideal.</p>
                </div>
                <div class="mp-cta-box__actions">
                    <a href="<?php echo home_url('/'); ?>#mp-contacto" class="mp-btn mp-btn--white">SOLICITAR COTIZACIÓN</a>
                    <a href="https://wa.me/<?php echo esc_attr(get_theme_mod('contact_whatsapp', '521812345678')); ?>" class="mp-btn mp-btn--outline-white" target="_blank">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Filtrado de productos
document.addEventListener('DOMContentLoaded', function() {
    const productos = document.querySelectorAll('.mp-producto-card');
    const filtroCategoria = document.getElementById('filtro-categoria');
    const filtroIndustria = document.getElementById('filtro-industria');
    const busqueda = document.getElementById('busqueda-producto');
    const contador = document.getElementById('productos-count');
    const noResults = document.getElementById('no-results');
    const limpiarBtn = document.getElementById('limpiar-filtros');
    
    if (!productos.length) return;

    function filtrarProductos() {
        const categoriaVal = filtroCategoria.value.toLowerCase();
        const industriaVal = filtroIndustria.value.toLowerCase();
        const busquedaVal = busqueda.value.toLowerCase();
        
        let visibles = 0;
        
        productos.forEach(producto => {
            const categoria = producto.dataset.categoria || '';
            const industria = producto.dataset.industria || '';
            const titulo = producto.dataset.titulo || '';
            
            const matchCategoria = !categoriaVal || categoria.includes(categoriaVal);
            const matchIndustria = !industriaVal || industria.includes(industriaVal);
            const matchBusqueda = !busquedaVal || titulo.includes(busquedaVal);
            
            if (matchCategoria && matchIndustria && matchBusqueda) {
                producto.style.display = '';
                visibles++;
            } else {
                producto.style.display = 'none';
            }
        });
        
        if (contador) contador.textContent = visibles;
        if (noResults) noResults.style.display = visibles === 0 ? 'flex' : 'none';
    }
    
    // Event listeners
    if (filtroCategoria) filtroCategoria.addEventListener('change', filtrarProductos);
    if (filtroIndustria) filtroIndustria.addEventListener('change', filtrarProductos);
    if (busqueda) busqueda.addEventListener('input', filtrarProductos);
    
    if (limpiarBtn) {
        limpiarBtn.addEventListener('click', function() {
            if (filtroCategoria) filtroCategoria.value = '';
            if (filtroIndustria) filtroIndustria.value = '';
            if (busqueda) busqueda.value = '';
            filtrarProductos();
        });
    }
    
    // Inicializar contador
    if (contador) contador.textContent = productos.length;
});
</script>

<?php get_footer(); ?>
