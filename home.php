<?php
/**
 * The template for displaying the blog index (posts page).
 * Real-time search and category filtering
 */

get_header(); ?>

<!-- ============================================ -->
<!-- BLOG HERO (DISEÑO FIGMA - IGUAL QUE QUIÉNES SOMOS) -->
<!-- ============================================ -->
<section class="mp-quienes-hero-v2">
    <div class="mp-container">
        <div class="mp-quienes-hero-v2__box mp-reveal-scale">
            <div class="mp-quienes-hero-v2__content">
                <h1 class="mp-quienes-hero-v2__title">BLOG</h1>
                <div class="mp-quienes-hero-v2__subtitle-wrap">
                    <p class="mp-quienes-hero-v2__subtitle">
                        Artículos, guías y contenido práctico sobre soluciones en aluminio y procesos de maquila
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- FILTROS Y BÚSQUEDA (REAL-TIME)              -->
<!-- ============================================ -->
<section class="mp-blog-filters">
    <div class="mp-container">
        <div class="mp-blog-filters__flex">
            <!-- Búsqueda en tiempo real -->
            <div class="mp-blog-search">
                <div class="mp-blog-search__form">
                    <input type="search" 
                           class="mp-blog-search__input" 
                           id="blogSearchInput"
                           placeholder="Buscar artículos..." 
                           autocomplete="off">
                    <span class="mp-blog-search__icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <circle cx="11" cy="11" r="8" stroke="#828283" stroke-width="2"/>
                            <path d="M21 21L16.65 16.65" stroke="#828283" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </span>
                </div>
            </div>

            <!-- Filtro por Categoría -->
            <div class="mp-blog-category-filter">
                <span class="mp-blog-filter-label">Filtrar por</span>
                <select class="mp-blog-select" id="blogCategoryFilter">
                    <option value="">Todas las categorías</option>
                    <?php
                    $categories = get_categories();
                    foreach($categories as $category) {
                        echo '<option value="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</option>';
                    }
                    ?>
                </select>
            </div>

            <!-- Contador de resultados -->
            <div class="mp-blog-results-count">
                <span id="blogResultsCount">0</span> artículos encontrados
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- BLOG GRID                                   -->
<!-- ============================================ -->
<section class="mp-blog-grid-section">
    <div class="mp-container">
        <div class="mp-blog-grid" id="blogGrid">
            <?php
            // Query all posts for client-side filtering
            $blog_args = array(
                'post_type' => 'post',
                'posts_per_page' => -1, // Get all posts
                'post_status' => 'publish'
            );
            $blog_query = new WP_Query($blog_args);
            
            if ($blog_query->have_posts()) :
                while ($blog_query->have_posts()) : $blog_query->the_post();
                    // Get categories for data attribute
                    $post_categories = get_the_category();
                    $cat_slugs = array_map(function($cat) { return $cat->slug; }, $post_categories);
                    $cat_names = array_map(function($cat) { return $cat->name; }, $post_categories);
            ?>
                <article class="mp-blog-card" 
                         data-categories="<?php echo esc_attr(implode(' ', $cat_slugs)); ?>"
                         data-title="<?php echo esc_attr(strtolower(get_the_title())); ?>"
                         data-excerpt="<?php echo esc_attr(strtolower(wp_strip_all_tags(get_the_excerpt()))); ?>">
                    <div class="mp-blog-card__image-container">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', ['class' => 'mp-blog-card__image']); ?>
                            <?php else : ?>
                                <div class="mp-blog-card__placeholder">
                                    <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#828283" stroke-width="1">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                        <polyline points="21 15 16 10 5 21"></polyline>
                                    </svg>
                                </div>
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="mp-blog-card__content">
                        <div class="mp-blog-card__header">
                            <div class="mp-blog-card__category">
                                <?php 
                                if (!empty($post_categories)) {
                                    echo esc_html($post_categories[0]->name);
                                }
                                ?>
                            </div>
                            <div class="mp-blog-card__date"><?php echo get_the_date('d M Y'); ?></div>
                        </div>
                        <h3 class="mp-blog-card__title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <div class="mp-blog-card__excerpt">
                            <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="mp-blog-card__btn">Leer artículo completo</a>
                    </div>
                </article>
            <?php 
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <!-- No results message -->
        <div class="mp-blog-no-results" id="blogNoResults" style="display: none;">
            <p>No se encontraron artículos que coincidan con tu búsqueda.</p>
            <button type="button" class="mp-btn mp-btn--primary" id="blogResetFilters">Ver todos los artículos</button>
        </div>
    </div>
</section>

<!-- Script de filtrado en tiempo real -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('blogSearchInput');
    const categoryFilter = document.getElementById('blogCategoryFilter');
    const blogGrid = document.getElementById('blogGrid');
    const blogCards = document.querySelectorAll('.mp-blog-card');
    const resultsCount = document.getElementById('blogResultsCount');
    const noResults = document.getElementById('blogNoResults');
    const resetBtn = document.getElementById('blogResetFilters');

    // Debounce function for search input
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // Filter function
    function filterPosts() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        const selectedCategory = categoryFilter.value;
        let visibleCount = 0;

        blogCards.forEach(card => {
            const title = card.getAttribute('data-title') || '';
            const excerpt = card.getAttribute('data-excerpt') || '';
            const categories = card.getAttribute('data-categories') || '';

            // Check search match
            const searchMatch = searchTerm === '' || 
                                title.includes(searchTerm) || 
                                excerpt.includes(searchTerm);

            // Check category match
            const categoryMatch = selectedCategory === '' || 
                                  categories.split(' ').includes(selectedCategory);

            // Show or hide card
            if (searchMatch && categoryMatch) {
                card.style.display = '';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        // Update results count
        resultsCount.textContent = visibleCount;

        // Show/hide no results message
        if (visibleCount === 0) {
            noResults.style.display = 'block';
            blogGrid.style.display = 'none';
        } else {
            noResults.style.display = 'none';
            blogGrid.style.display = '';
        }
    }

    // Event listeners
    searchInput.addEventListener('input', debounce(filterPosts, 200));
    categoryFilter.addEventListener('change', filterPosts);

    // Reset filters
    resetBtn.addEventListener('click', function() {
        searchInput.value = '';
        categoryFilter.value = '';
        filterPosts();
    });

    // Initial count
    resultsCount.textContent = blogCards.length;
});
</script>

<?php get_footer(); ?>
