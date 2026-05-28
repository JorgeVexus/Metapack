<?php
/**
 * Archive Template for Productos
 * 
 * Catálogo de productos según diseño Figma
 */

// Incluir header compartido
get_template_part('template-parts/header', 'metapack');

// Obtener todos los calibres únicos (separados por coma)
$calibres_query = new WP_Query(array(
    'post_type' => 'producto',
    'posts_per_page' => -1,
    'meta_key' => 'calibre',
    'meta_compare' => '!=',
    'meta_value' => '',
));
$calibres_unicos = array();
if ($calibres_query->have_posts()) :
    while ($calibres_query->have_posts()) : $calibres_query->the_post();
        $calibre_raw = get_field('calibre');
        if ($calibre_raw) {
            // Separar por coma y agregar cada uno
            $calibres_arr = array_map('trim', explode(',', $calibre_raw));
            foreach ($calibres_arr as $cal) {
                if ($cal && !in_array($cal, $calibres_unicos)) {
                    $calibres_unicos[] = $cal;
                }
            }
        }
    endwhile;
    wp_reset_postdata();
endif;
// Ordenar calibres
sort($calibres_unicos);
?>

<!-- ============================================ -->
<!-- HERO CATÁLOGO (ESTILO QUIÉNES SOMOS)        -->
<!-- ============================================ -->

<section class="mp-quienes-hero-v2">
    <div class="mp-container">
        <div class="mp-quienes-hero-v2__box mp-reveal-scale">
            <div class="mp-quienes-hero-v2__content">
                <h1 class="mp-quienes-hero-v2__title">CATÁLOGO DE PRODUCTOS</h1>
                <div class="mp-quienes-hero-v2__subtitle-wrap">
                    <p class="mp-quienes-hero-v2__subtitle">
                        Explore nuestra gama de empaques flexibles de aluminio y complementos. Diseñados para satisfacer las necesidades de conservación, cocción y transporte.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ============================================ -->
<!-- CATÁLOGO PRINCIPAL                          -->
<!-- ============================================ -->

<section class="mp-catalog-section" id="mp-productos-catalogo">
    <div class="mp-container">
        
        <!-- Barra de Filtros -->
        <div class="mp-catalog-filters mp-reveal-up">
            <div class="mp-catalog-filters__group">
                <label class="mp-catalog-filters__label">Filtrar por:</label>
                
                <!-- Filtro por Categoría -->
                <div class="mp-catalog-filters__select-wrap">
                    <select class="mp-catalog-filters__select" id="filtro-categoria">
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
                    <svg class="mp-catalog-filters__arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </div>
                
                <!-- Filtro por Industria -->
                <div class="mp-catalog-filters__select-wrap">
                    <select class="mp-catalog-filters__select" id="filtro-industria">
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
                    <svg class="mp-catalog-filters__arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </div>
                
                <!-- Filtro por Calibre -->
                <div class="mp-catalog-filters__select-wrap">
                    <select class="mp-catalog-filters__select" id="filtro-calibre">
                        <option value="">Todos los calibres</option>
                        <?php foreach ($calibres_unicos as $calibre) : ?>
                            <option value="<?php echo esc_attr(sanitize_title($calibre)); ?>">
                                <?php echo esc_html($calibre); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <svg class="mp-catalog-filters__arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </div>
            </div>
            
            <!-- Búsqueda -->
            <div class="mp-catalog-filters__search">
                <input type="text" class="mp-catalog-filters__input" id="busqueda-producto" placeholder="Buscar producto...">
                <svg class="mp-catalog-filters__search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </div>
        </div>
        
        <!-- Layout: Grid + Sidebar -->
        <div class="mp-catalog-layout">
            
            <!-- Grid de Productos -->
            <div class="mp-catalog-main">
                <!-- Contador -->
                <div class="mp-catalog-counter">
                    <span id="productos-count">0</span> productos encontrados
                </div>
                
                <div class="mp-catalog-grid-v2" id="productos-grid">
                    <?php
                    $productos_query = new WP_Query(array(
                        'post_type' => 'producto',
                        'posts_per_page' => -1,
                        'orderby' => 'title',
                        'order' => 'ASC',
                    ));
                    
                    if ($productos_query->have_posts()) :
                        while ($productos_query->have_posts()) : $productos_query->the_post();
                            // Taxonomías
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
                            $calibre_raw = get_field('calibre');
                            
                            // Parsear calibres separados por coma
                            $calibres_arr = array();
                            $calibres_slugs = array();
                            if ($calibre_raw) {
                                $calibres_arr = array_map('trim', explode(',', $calibre_raw));
                                foreach ($calibres_arr as $cal) {
                                    $calibres_slugs[] = sanitize_title($cal);
                                }
                            }
                            
                            // Primera industria para el tag
                            $industria_tag = '';
                            if ($industrias_terms && !is_wp_error($industrias_terms)) {
                                $industria_tag = $industrias_terms[0]->name;
                            }
                    ?>
                    
                    <article class="mp-product-card-v2" 
                             data-categoria="<?php echo esc_attr($categorias_slugs); ?>"
                             data-industria="<?php echo esc_attr($industrias_slugs); ?>"
                             data-calibre="<?php echo esc_attr(implode(' ', $calibres_slugs)); ?>"
                             data-titulo="<?php echo esc_attr(strtolower(get_the_title())); ?>">
                        
                        <!-- Badge de industria -->
                        <?php if ($industria_tag) : ?>
                        <div class="mp-product-card-v2__badge"><?php echo esc_html(strtoupper($industria_tag)); ?></div>
                        <?php endif; ?>
                        
                        <!-- Imagen -->
                        <div class="mp-product-card-v2__image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium_large'); ?>
                            <?php else : ?>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" style="width: 60px; height: 60px; color: #828283;">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <polyline points="21 15 16 10 5 21"></polyline>
                                </svg>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Contenido -->
                        <div class="mp-product-card-v2__content">
                            <h3 class="mp-product-card-v2__title"><?php the_title(); ?></h3>
                            
                            <div class="mp-product-card-v2__text">
                                <?php if (has_excerpt()) : ?>
                                    <?php the_excerpt(); ?>
                                <?php else : ?>
                                    <p><?php echo wp_trim_words(get_the_content(), 18); ?></p>
                                <?php endif; ?>
                            </div>
                            
                            <!-- Calibres disponibles -->
                            <?php if (!empty($calibres_arr)) : ?>
                            <div class="mp-product-card-v2__specs">
                                <span class="mp-product-card-v2__specs-label">Calibres disponibles:</span>
                                <div class="mp-product-card-v2__spec-boxes">
                                    <?php foreach ($calibres_arr as $cal) : ?>
                                        <div class="mp-spec-box"><?php echo esc_html($cal); ?></div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Footer con botones -->
                        <div class="mp-product-card-v2__footer">
                            <a href="<?php the_permalink(); ?>" class="mp-product-btn mp-product-btn--dark">VER DETALLES</a>
                            <a href="https://wa.me/<?php echo esc_attr(get_theme_mod('contact_whatsapp', '521812345678')); ?>?text=<?php echo urlencode('Hola, me interesa cotizar: ' . get_the_title()); ?>" class="mp-product-btn mp-product-btn--primary" target="_blank">COTIZAR</a>
                        </div>
                    </article>
                    
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                    ?>
                        <div class="mp-catalog-empty">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                            <p>No hay productos disponibles en este momento.</p>
                        </div>
                    <?php endif; ?>
                </div>
                
                <!-- Mensaje de no resultados -->
                <div class="mp-catalog-no-results" id="no-results" style="display: none;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <p>No se encontraron productos con los filtros seleccionados.</p>
                    <button class="mp-btn mp-btn--primary" id="limpiar-filtros">Limpiar filtros</button>
                </div>
            </div>
            
            <!-- Sidebar -->
            <aside class="mp-catalog-sidebar">
                <div class="mp-sidebar-maquila">
                    <div class="mp-sidebar-maquila__text">
                        <h3 class="mp-sidebar-maquila__title">¿Necesitas medidas especiales?</h3>
                        <p class="mp-sidebar-maquila__desc">Fabricamos anchos y calibres especiales bajo pedido mínimo. Servicio de maquila disponible.</p>
                    </div>
                    <div class="mp-sidebar-maquila__btn-wrap">
                        <a href="<?php echo home_url('/'); ?>#mp-maquila" class="mp-sidebar-maquila__btn">Conocer servicio de maquila</a>
                    </div>
                </div>
                
                <div class="mp-catalog-sidebar__card mp-catalog-sidebar__card--contact">
                    <h3 class="mp-catalog-sidebar__title">¿Tienes dudas?</h3>
                    <p class="mp-catalog-sidebar__text">Nuestro equipo de ventas está listo para asesorarte.</p>
                    <a href="https://wa.me/<?php echo esc_attr(get_theme_mod('contact_whatsapp', '521812345678')); ?>" class="mp-btn mp-btn--whatsapp mp-btn--sidebar" target="_blank">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                        </svg>
                        Escríbenos por WhatsApp
                    </a>
                </div>
            </aside>
        </div>
    </div>
</section>


<!-- ============================================ -->
<!-- FAQ (Igual que Home)                        -->
<!-- ============================================ -->
<?php get_template_part('template-parts/faq', 'metapack'); ?>


<!-- ============================================ -->
<!-- CONTACTO (REUSABLE)                         -->
<!-- ============================================ -->
<?php get_template_part('template-parts/contact', 'metapack'); ?>


<!-- Script de filtrado -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const productos = document.querySelectorAll('.mp-product-card');
    const filtroCategoria = document.getElementById('filtro-categoria');
    const filtroIndustria = document.getElementById('filtro-industria');
    const filtroCalibre = document.getElementById('filtro-calibre');
    const busqueda = document.getElementById('busqueda-producto');
    const contador = document.getElementById('productos-count');
    const noResults = document.getElementById('no-results');
    const limpiarBtn = document.getElementById('limpiar-filtros');
    
    function filtrarProductos() {
        const categoriaVal = filtroCategoria ? filtroCategoria.value.toLowerCase() : '';
        const industriaVal = filtroIndustria ? filtroIndustria.value.toLowerCase() : '';
        const calibreVal = filtroCalibre ? filtroCalibre.value.toLowerCase() : '';
        const busquedaVal = busqueda ? busqueda.value.toLowerCase() : '';
        
        let visibles = 0;
        
        productos.forEach(producto => {
            const categoria = producto.dataset.categoria || '';
            const industria = producto.dataset.industria || '';
            const calibre = producto.dataset.calibre || '';
            const titulo = producto.dataset.titulo || '';
            
            const matchCategoria = !categoriaVal || categoria.includes(categoriaVal);
            const matchIndustria = !industriaVal || industria.includes(industriaVal);
            const matchCalibre = !calibreVal || calibre.includes(calibreVal);
            const matchBusqueda = !busquedaVal || titulo.includes(busquedaVal);
            
            if (matchCategoria && matchIndustria && matchCalibre && matchBusqueda) {
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
    if (filtroCalibre) filtroCalibre.addEventListener('change', filtrarProductos);
    if (busqueda) busqueda.addEventListener('input', filtrarProductos);
    
    if (limpiarBtn) {
        limpiarBtn.addEventListener('click', function() {
            if (filtroCategoria) filtroCategoria.value = '';
            if (filtroIndustria) filtroIndustria.value = '';
            if (filtroCalibre) filtroCalibre.value = '';
            if (busqueda) busqueda.value = '';
            filtrarProductos();
        });
    }
    
    // Inicializar contador
    if (contador) contador.textContent = productos.length;
});
</script>

<?php
// Incluir footer compartido
get_template_part('template-parts/footer', 'metapack');
?>
