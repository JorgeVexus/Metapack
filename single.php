<?php
/**
 * Template Name: Single Post
 * Template Post Type: post
 */

get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
        $post_id = get_the_ID();
        $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');
        $categories = get_the_category();
        $author_name = get_the_author();
        $post_date = get_the_date('d M Y');
        $reading_time = metapack_reading_time(get_the_content());
        $post_url = get_permalink();
        $post_title = get_the_title();
?>

<!-- ============================================ -->
<!-- BLOG HERO                                    -->
<!-- ============================================ -->
<section class="mp-single-hero mp-reveal-zoom" style="background-image: url('<?php echo esc_url($featured_img_url); ?>');">
    <div class="mp-single-hero__overlay"></div>
    <div class="mp-container">
        <div class="mp-single-hero__content mp-reveal-up">
            <div class="mp-single-hero__tag-box">
                <?php if (!empty($categories)) : ?>
                    <span class="mp-single-hero__tag"><?php echo esc_html($categories[0]->name); ?></span>
                <?php endif; ?>
            </div>
            <h1 class="mp-single-hero__title"><?php the_title(); ?></h1>
            <div class="mp-single-hero__meta">
                <span class="mp-single-hero__author"><?php echo esc_html($author_name); ?></span>
                <span class="mp-single-hero__dot"></span>
                <span class="mp-single-hero__date"><?php echo esc_html($post_date); ?></span>
                <span class="mp-single-hero__dot"></span>
                <span class="mp-single-hero__time"><?php echo $reading_time; ?> min de lectura</span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- BLOG CONTENT AREA                            -->
<!-- ============================================ -->
<div class="mp-single-layout">
    <div class="mp-container">
        <div class="mp-single-grid mp-reveal-up">
            
            <!-- Main Content -->
            <main class="mp-single-main">
                <!-- Breadcrumbs -->
                <?php if (function_exists('metapack_breadcrumbs')) { metapack_breadcrumbs('mp-breadcrumbs'); } ?>

                <!-- Post Body -->
                <article class="mp-single-content">
                    <?php the_content(); ?>
                </article>

                <!-- Share Section -->
                <div class="mp-single-share">
                    <div class="mp-single-share__text-box">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="18" cy="5" r="3"></circle>
                            <circle cx="6" cy="12" r="3"></circle>
                            <circle cx="18" cy="19" r="3"></circle>
                            <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                            <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                        </svg>
                        <span>Compartir este artículo</span>
                    </div>
                    <div class="mp-single-share__icons">
                        <!-- Facebook -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($post_url); ?>" target="_blank" rel="noopener">
                            <svg width="27" height="27" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12.525.02c1.31-.032 2.617-.023 3.926-.03.03 1.223-.024 2.446.015 3.669-.328.01-.663-.045-1 .03-1.423.11-2.11 1.076-2.023 2.45v1.858h3.047v3.47h-3.047v8.385H9.375v-8.385H6.328v-3.47h3.047V6.632C9.375 3.235 11.53.033 12.525.02z" />
                            </svg>
                        </a>
                        <!-- Instagram (No sharer URL exists, usually links to profile or uses generic icon) -->
                        <a href="<?php echo esc_url(get_theme_mod('social_instagram', '#')); ?>" target="_blank" rel="noopener">
                            <svg width="27" height="27" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>
                        </a>
                        <!-- WhatsApp -->
                        <a href="https://api.whatsapp.com/send?text=<?php echo urlencode($post_title . ' ' . $post_url); ?>" target="_blank" rel="noopener">
                            <svg width="27" height="27" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </main>

            <!-- Sidebar: Artículos Relacionados -->
            <aside class="mp-single-sidebar">
                <h3 class="mp-single-sidebar__title">Artículos relacionados</h3>
                <div class="mp-related-posts">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'post__not_in' => array($post_id),
                        'category__in' => wp_get_post_categories($post_id),
                        'orderby' => 'rand'
                    );
                    $related_query = new WP_Query($args);
                    if ($related_query->have_posts()) :
                        while ($related_query->have_posts()) : $related_query->the_post();
                    ?>
                        <article class="mp-blog-card-v2 mp-blog-card-v2--vertical">
                            <div class="mp-blog-card-v2__image-box">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('large'); ?>
                                    <?php else : ?>
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/placeholder.jpg" alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="mp-blog-card-v2__content-box">
                                <div class="mp-blog-card-v2__meta">
                                    <div class="mp-blog-card-v2__tag">
                                        <?php 
                                        $rel_categories = get_the_category();
                                        if (!empty($rel_categories)) echo esc_html($rel_categories[0]->name);
                                        ?>
                                    </div>
                                    <span class="mp-blog-card-v2__date"><?php echo get_the_date('d M Y'); ?></span>
                                </div>
                                <h4 class="mp-blog-card-v2__title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h4>
                                <p class="mp-blog-card-v2__excerpt"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                            </div>
                        </article>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else:
                        echo '<p>No hay artículos relacionados todavía.</p>';
                    endif;
                    ?>
                </div>
            </aside>

        </div>
    </div>
</div>

<?php 
    endwhile;
endif;

get_footer(); ?>
