<?php
/**
 * Template Name: Metapack Home
 * Template Post Type: page
 * 
 * Plantilla completa para la página de inicio de Metapack
 */

// Usamos el header reutilizable que ahora soporta menús dinámicos
get_template_part('template-parts/header', 'metapack');
?>


<!-- ============================================ -->
<!-- SECCIÓN 2: HERO CON VIDEO DE FONDO          -->
<!-- ============================================ -->

<section class="mp-hero" id="mp-hero">
    <div class="mp-hero__background">
        <video class="mp-hero__video" autoplay muted loop playsinline
            poster="https://images.unsplash.com/photo-1565793298595-6a879b1d9492?w=1920&q=80">
            <source src="<?php echo esc_url(get_theme_mod('hero_video', 'https://assets.mixkit.co/videos/preview/mixkit-industrial-machines-in-operation-4419-large.mp4')); ?>"
                type="video/mp4">
        </video>
        <div class="mp-hero__overlay"></div>
    </div>
    <div class="mp-container">
        <div class="mp-hero__content">
            <h1 class="mp-hero__title mp-reveal-up"><?php echo esc_html(get_theme_mod('hero_title', 'Soluciones de aluminio para operaciones que no pueden detenerse')); ?></h1>
            <div class="mp-hero__description-wrapper mp-reveal-up" style="transition-delay: 0.2s;">
                <p class="mp-hero__description"><?php echo esc_html(get_theme_mod('hero_description', 'Fabricamos y suministramos soluciones de empaque en aluminio con enfoque industrial, trazabilidad y cumplimiento, diseñadas para procesos productivos que exigen confiabilidad.')); ?></p>
            </div>
            <div class="mp-hero__buttons mp-reveal-up" style="transition-delay: 0.4s;">
                <a href="#mp-contacto" class="mp-btn mp-btn--primary mp-btn--hero">
                    <span>Solicitar cotización</span>
                </a>
                <a href="#mp-productos" class="mp-btn mp-btn--outline-white mp-btn--hero-outline">
                    <span>Ver soluciones</span>
                </a>
            </div>
        </div>
    </div>
</section>


<!-- ============================================ -->
<!-- SECCIÓN 3: KPIs                              -->
<!-- ============================================ -->

<section class="mp-kpis" id="mp-kpis">
    <!-- Icon 1: Infraestructura -->
    <div class="mp-kpi-card mp-reveal-up">
        <div class="mp-kpi-card__icon">
            <svg viewBox="0 0 54 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.848 51.693C3.504 51.693 2.36 51.221 1.416 50.277C0.472 49.333 0 48.19 0 46.848V23.862C0 22.894 0.258 21.996 0.774 21.168C1.29 20.34 2.007 19.734 2.925 19.35L11.607 15.705C12.415 15.381 13.183 15.437 13.911 15.873C14.637 16.307 15 16.977 15 17.883V20.133L26.682 15.441C27.49 15.117 28.245 15.197 28.947 15.681C29.649 16.165 30 16.836 30 17.694V21.693H54V46.848C54 48.188 53.528 49.331 52.584 50.277C51.64 51.221 50.497 51.693 49.155 51.693H4.848ZM4.848 48.693H49.155C49.693 48.693 50.135 48.52 50.481 48.174C50.827 47.828 51 47.386 51 46.848V24.693H27V18.543L12 24.543V18.693L4.098 22.206C3.75 22.36 3.48 22.581 3.288 22.869C3.096 23.157 3 23.495 3 23.883V46.851C3 47.389 3.173 47.831 3.519 48.177C3.865 48.523 4.307 48.696 4.845 48.696M24.693 41.313H29.307V32.073H24.693V41.313ZM12.693 41.313H17.307V32.073H12.693V41.313ZM36.693 41.313H41.307V32.073H36.693V41.313ZM54 21.693H44.652L47.469 1.473C47.529 1.029 47.719 0.673 48.039 0.405C48.359 0.135 48.74 0 49.182 0H50.049C50.413 0 50.726 0.125 50.988 0.375C51.25 0.625 51.412 0.933 51.474 1.299L54 21.693ZM4.848 48.693H3H51H4.848Z" fill="currentColor"/>
            </svg>
        </div>
        <h2 class="mp-kpi-card__title"><?php echo esc_html(get_theme_mod('kpi_1_title', 'INFRAESTRUCTURA')); ?></h2>
        <p class="mp-kpi-card__text"><?php echo esc_html(get_theme_mod('kpi_1_text', 'Maquinaria de origen italiano para rebobinado y corte de precisión. Capacidad instalada para altos volúmenes.')); ?></p>
    </div>
    <!-- Icon 2: Servicio y Ventas -->
    <div class="mp-kpi-card mp-reveal-up" style="transition-delay: 0.1s;">
        <div class="mp-kpi-card__icon" style="width: 48px; height: 60px;">
            <svg viewBox="0 0 37 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.49414 35.0267L3.40664 14L18.5 0L33.5431 14L28.4556 35.0267H8.49414ZM10.5714 32.36H26.3757L30.6122 14.928L19.8214 4.86133V15.1093C20.3711 15.3813 20.8222 15.7742 21.1746 16.288C21.527 16.8018 21.7031 17.3893 21.7031 18.0507C21.7031 18.9289 21.3869 19.6871 20.7544 20.3253C20.1218 20.9636 19.3704 21.2827 18.5 21.2827C17.5961 21.2827 16.828 20.9636 16.1954 20.3253C15.5629 19.6871 15.2466 18.9289 15.2466 18.0507C15.2466 17.3876 15.4228 16.7911 15.7752 16.2613C16.1276 15.7316 16.5954 15.3467 17.1786 15.1067V4.86133L6.38779 14.928L10.5714 32.36ZM0 48L2.18564 41.8453H34.8144L37 48H0Z" fill="currentColor"/>
            </svg>
        </div>
        <h2 class="mp-kpi-card__title"><?php echo esc_html(get_theme_mod('kpi_2_title', 'SERVICIO Y VENTAS')); ?></h2>
        <p class="mp-kpi-card__text"><?php echo esc_html(get_theme_mod('kpi_2_text', 'Asesoría especializada. Atención personalizada y entregas puntuales en todo México.')); ?></p>
    </div>
    <!-- Icon 3: Calidad Certificada -->
    <div class="mp-kpi-card mp-reveal-up" style="transition-delay: 0.2s;">
        <div class="mp-kpi-card__icon" style="width: 48px; height: 60px;">
            <svg viewBox="0 0 36 46.5" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.213 28.386L18 24.894L23.787 28.386L22.218 21.798L27.351 17.373L20.631 16.812L18 10.617L15.369 16.812L8.649 17.373L13.782 21.798L12.213 28.386ZM0 46.5V4.848C0 3.466 0.462999 2.313 1.389 1.389C2.315 0.464999 3.468 0.002 4.848 0H31.155C32.535 0 33.688 0.462999 34.614 1.389C35.54 2.315 36.002 3.468 36 4.848V46.5L18 38.769L0 46.5ZM3 41.85L18 35.4L33 41.85V4.848C33 4.386 32.808 3.962 32.424 3.576C32.04 3.19 31.616 2.998 31.152 3H4.848C4.386 3 3.962 3.192 3.576 3.576C3.19 3.96 2.998 4.384 3 4.848V41.85Z" fill="currentColor"/>
            </svg>
        </div>
        <h2 class="mp-kpi-card__title"><?php echo esc_html(get_theme_mod('kpi_3_title', 'CALIDAD CERTIFICADA')); ?></h2>
        <p class="mp-kpi-card__text"><?php echo esc_html(get_theme_mod('kpi_3_text', 'Productos avalados por FDA y normativas mexicanas. Trazabilidad completa.')); ?></p>
    </div>
    <!-- Icon 4: Distribución Nacional -->
    <div class="mp-kpi-card mp-reveal-up" style="transition-delay: 0.3s;">
        <div class="mp-kpi-card__icon" style="width: 72px; height: 60px;">
            <svg viewBox="0 0 60 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.082 42C15.002 42 13.231 41.27 11.769 39.81C10.307 38.356 9.576 36.586 9.576 34.5H4.713C4.287 34.5 3.931 34.356 3.645 34.068C3.359 33.78 3.215 33.423 3.213 32.997C3.211 32.571 3.355 32.215 3.645 31.929C3.935 31.643 4.291 31.5 4.713 31.5H10.344C10.886 30.166 11.761 29.082 12.969 28.248C14.177 27.416 15.546 27 17.076 27C18.606 27 19.976 27.416 21.186 28.248C22.392 29.082 23.266 30.166 23.808 31.5H37.662L44.25 3H13.212C12.786 3 12.429 2.856 12.141 2.568C11.853 2.28 11.71 1.923 11.712 1.497C11.714 1.071 11.857 0.715 12.141 0.429C12.425 0.143 12.782 0 13.212 0H44.943C45.711 0 46.337 0.308 46.821 0.924C47.307 1.54 47.463 2.226 47.289 2.982L45.57 10.5H49.383C50.151 10.5 50.878 10.672 51.564 11.016C52.252 11.358 52.818 11.832 53.262 12.438L58.653 19.632C59.089 20.216 59.372 20.825 59.502 21.459C59.634 22.091 59.644 22.755 59.532 23.451L57.738 32.562C57.626 33.146 57.342 33.615 56.886 33.969C56.43 34.323 55.912 34.5 55.332 34.5H53.883C53.883 36.578 53.155 38.348 51.699 39.81C50.243 41.272 48.473 42.002 46.389 42C44.305 41.998 42.534 41.268 41.076 39.81C39.616 38.354 38.886 36.584 38.886 34.5H24.576C24.576 36.578 23.848 38.348 22.392 39.81C20.936 41.272 19.166 42.002 17.082 42ZM42.237 24.75H56.19L56.721 22.08L50.307 13.5H44.853L42.237 24.75ZM38.388 28.494L38.778 26.754C39.038 25.594 39.368 24.174 39.768 22.494C39.994 21.574 40.192 20.724 40.362 19.944C40.53 19.164 40.664 18.518 40.764 18.006L41.154 16.266C41.414 15.106 41.744 13.686 42.144 12.006C42.544 10.326 42.874 8.906 43.134 7.746L43.524 6.006L44.25 3L37.659 31.5L38.388 28.494ZM1.443 23.994C1.033 23.994 0.69 23.85 0.414 23.562C0.138 23.274 0 22.918 0 22.494C0 22.07 0.143 21.713 0.429 21.423C0.715 21.133 1.072 20.99 1.5 20.994H11.94C12.366 20.994 12.723 21.138 13.011 21.426C13.299 21.714 13.442 22.071 13.440 22.497C13.438 22.923 13.295 23.279 13.011 23.565C12.727 23.851 12.37 23.994 11.94 23.994H1.443ZM7.443 13.506C7.017 13.506 6.66 13.362 6.372 13.074C6.084 12.786 5.94 12.429 5.94 12.003C5.94 11.577 6.084 11.221 6.372 10.935C6.66 10.649 7.016 10.506 7.44 10.506H20.94C21.366 10.506 21.723 10.65 22.011 10.938C22.297 11.226 22.44 11.583 22.44 12.009C22.44 12.435 22.297 12.791 22.011 13.077C21.725 13.363 21.368 13.506 20.94 13.506H7.443ZM17.076 39C18.31 39 19.369 38.559 20.253 37.677C21.135 36.793 21.576 35.734 21.5760 34.5C21.576 33.266 21.135 32.207 20.253 31.323C19.371 30.439 18.312 29.998 17.076 30C15.84 30.002 14.781 30.443 13.899 31.323C13.017 32.207 12.576 33.266 12.576 34.5C12.576 35.734 13.017 36.793 13.899 37.677C14.783 38.559 15.842 39 17.076 39ZM46.386 39C47.62 39 48.678 38.559 49.56 37.677C50.442 36.793 50.883 35.734 50.883 34.5C50.883 33.266 50.442 32.207 49.56 31.323C48.678 30.439 47.619 29.998 46.383 30C45.147 30.002 44.089 30.443 43.209 31.323C42.325 32.207 41.883 33.266 41.883 34.5C41.883 35.734 42.324 36.793 43.206 37.677C44.09 38.559 45.15 39 46.386 39Z" fill="currentColor"/>
            </svg>
        </div>
        <h2 class="mp-kpi-card__title"><?php echo esc_html(get_theme_mod('kpi_4_title', 'DISTRIBUCIÓN NACIONAL')); ?></h2>
        <p class="mp-kpi-card__text"><?php echo esc_html(get_theme_mod('kpi_4_text', 'Logística eficiente para entregas puntuales a todo México.')); ?></p>
    </div>
</section>


<!-- ============================================ -->
<!-- SECCIÓN 4: PRODUCTOS Y SERVICIOS            -->
<!-- Pegar esto en OTRO widget HTML de Elementor -->
<!-- ============================================ -->

<section class="mp-catalogo" id="mp-productos">
    <div class="mp-container">
        <!-- Header Catalogo -->
        <div class="mp-catalogo__header mp-reveal-up">
            <span class="mp-section-tag">CATÁLOGO</span>
            <div class="mp-catalogo__header-row">
                <div class="mp-catalogo__header-left">
                    <h2 class="mp-catalogo__title">Productos y servicios</h2>
                    <p class="mp-catalogo__subtitle">Empaques, láminas y desarrollos especializados diseñados para adaptarse a tu operación.</p>
                </div>
                <a href="<?php echo home_url('/productos/'); ?>" class="mp-btn--catalogo-header">Ver todos los productos</a>
            </div>
        </div>

        <!-- Grid de tarjetas -->
        <div class="mp-catalogo__grid">
            <!-- Card 1 -->
            <div class="mp-catalogo-card mp-reveal-up" style="transition-delay: 0.1s;">
                <div class="mp-catalogo-card__image mp-catalogo-card__image--contain">
                    <img src="https://www.metapack.com.mx/wp-content/uploads/2026/01/lproduct-2.webp" alt="Rollos de Aluminio" width="357" height="168" loading="lazy">
                </div>
                <div class="mp-catalogo-card__content">
                    <h3 class="mp-catalogo-card__title">ROLLOS DE ALUMINIO</h3>
                    <p class="mp-catalogo-card__text">Soluciones en aluminio para uso industrial y comercial, disponibles en distintas presentaciones y calibres.</p>
                    <ul class="mp-catalogo-card__list">
                        <li><span class="mp-catalogo-card__bullet"></span>Diferentes calibres y formatos</li>
                        <li><span class="mp-catalogo-card__bullet"></span>Uso industrial y profesional</li>
                        <li><span class="mp-catalogo-card__bullet"></span>Opciones para alto volumen</li>
                    </ul>
                </div>
                <a href="<?php echo home_url('/productos/'); ?>" class="mp-catalogo-card__action">
                    <span>VER PRODUCTOS</span>
                    <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <!-- Card 2 -->
            <div class="mp-catalogo-card mp-reveal-up" style="transition-delay: 0.2s;">
                <div class="mp-catalogo-card__image mp-catalogo-card__image--cover">
                    <img src="https://www.metapack.com.mx/wp-content/uploads/2026/01/Image-Container.webp" alt="Maquila" width="420" height="177" loading="lazy">
                </div>
                <div class="mp-catalogo-card__content">
                    <h3 class="mp-catalogo-card__title">MAQUILA Y PERSONALIZACIÓN</h3>
                    <p class="mp-catalogo-card__text">Adaptamos nuestros procesos a tus necesidades específicas, ofreciendo soluciones personalizadas para tu marca.</p>
                    <ul class="mp-catalogo-card__list">
                        <li><span class="mp-catalogo-card__bullet"></span>Rebobinado y corte</li>
                        <li><span class="mp-catalogo-card__bullet"></span>Presentaciones a medida</li>
                        <li><span class="mp-catalogo-card__bullet"></span>Grabado y marca propia</li>
                    </ul>
                </div>
                <a href="<?php echo home_url('/maquila/'); ?>" class="mp-catalogo-card__action">
                    <span>CONOCER SERVICIO</span>
                    <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <!-- Card 3 -->
            <div class="mp-catalogo-card mp-reveal-up" style="transition-delay: 0.3s;">
                <div class="mp-catalogo-card__image mp-catalogo-card__image--cover">
                    <img src="https://www.metapack.com.mx/wp-content/uploads/2026/01/complementos-de-empaque.webp" alt="Complementos" width="420" height="177" loading="lazy">
                </div>
                <div class="mp-catalogo-card__content">
                    <h3 class="mp-catalogo-card__title">COMPLEMENTOS DE EMPAQUE</h3>
                    <p class="mp-catalogo-card__text">Productos complementarios para empaque y conservación, ideales para operaciones de food service.</p>
                    <ul class="mp-catalogo-card__list">
                        <li><span class="mp-catalogo-card__bullet"></span>Papel encerado</li>
                        <li><span class="mp-catalogo-card__bullet"></span>Película plástica</li>
                        <li><span class="mp-catalogo-card__bullet"></span>Uso profesional y comercial</li>
                    </ul>
                </div>
                <a href="<?php echo home_url('/productos/'); ?>" class="mp-catalogo-card__action">
                    <span>VER OPCIONES</span>
                    <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>


<!-- ============================================ -->
<!-- SECCIÓN 5: POR QUÉ ELEGIRNOS               -->
<!-- ============================================ -->

<section class="mp-why-us" id="mp-nosotros">
    <div class="mp-container">
        <!-- Header con título izquierda y botón derecha -->
        <div class="mp-why-us__header mp-reveal-up">
            <div class="mp-why-us__header-left">
                <span class="mp-section-tag">SOBRE NOSOTROS</span>
                <h2 class="mp-why-us__title"><?php echo esc_html(get_theme_mod('whyus_title', '¿POR QUÉ ELEGIRNOS?')); ?></h2>
                <p class="mp-why-us__subtitle"><?php echo esc_html(get_theme_mod('whyus_subtitle', 'Somos una de las empresas líderes del sector, con presencia constante en el top de la industria. Desde 1986, hemos mantenido un enfoque continuo en la innovación y en el desarrollo de productos de alta calidad, respaldados por procesos sólidos y una operación confiable.')); ?></p>
            </div>
            <a href="#mp-contacto" class="mp-btn mp-btn--primary mp-btn--shadow">SABER MÁS</a>
        </div>

        <div class="mp-stats-ghost">
            <div class="mp-stat-item mp-reveal-up" style="transition-delay: 0.1s;">
                <div class="mp-stat-item__number"><?php echo esc_html(get_theme_mod('stat_1_number', '+40')); ?></div>
                <div class="mp-stat-item__label"><?php echo esc_html(get_theme_mod('stat_1_label', 'Años de experiencia')); ?></div>
            </div>

            <div class="mp-stat-item mp-reveal-up" style="transition-delay: 0.2s;">
                <div class="mp-stat-item__number"><?php echo esc_html(get_theme_mod('stat_2_number', '1176')); ?></div>
                <div class="mp-stat-item__label"><?php echo esc_html(get_theme_mod('stat_2_label', 'Posiciones de almacenaje')); ?></div>
            </div>

            <div class="mp-stat-item mp-reveal-up" style="transition-delay: 0.3s;">
                <div class="mp-stat-item__number"><?php echo esc_html(get_theme_mod('stat_3_number', '351M²')); ?></div>
                <div class="mp-stat-item__label"><?php echo esc_html(get_theme_mod('stat_3_label', 'CEDIS')); ?></div>
            </div>

            <div class="mp-stat-item mp-reveal-up" style="transition-delay: 0.4s;">
                <div class="mp-stat-item__number"><?php echo esc_html(get_theme_mod('stat_4_number', '+8')); ?></div>
                <div class="mp-stat-item__label"><?php echo esc_html(get_theme_mod('stat_4_label', 'Unidades propias')); ?></div>
            </div>
        </div>
    </div>
</section>


<!-- ============================================ -->
<!-- SECCIÓN 6: TESTIMONIOS                     -->
<!-- ============================================ -->

<section class="mp-testimonials" id="mp-testimonios">
    <div class="mp-container">
        <div class="mp-testimonials__header mp-reveal-up">
            <h2 class="mp-testimonials__title">Opiniones de quienes confían en nosotros</h2>
            <p class="mp-testimonials__subtitle">Conoce la opinión de clientes que han integrado nuestras soluciones en su operación.</p>
        </div>

        <div class="mp-testimonials__slider mp-reveal-up">
            <div class="mp-testimonials__track" id="mp-testimonialsTrack">
                <?php
                $args = array(
                    'post_type' => 'testimonio',
                    'posts_per_page' => 10,
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                $testimonials_query = new WP_Query($args);

                if ($testimonials_query->have_posts()) :
                    while ($testimonials_query->have_posts()) : $testimonials_query->the_post();
                        $role = get_post_meta(get_the_ID(), '_testimonial_role', true);
                        $stars = get_post_meta(get_the_ID(), '_testimonial_stars', true);
                        if (!$stars) $stars = 5;
                        $image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                        if (!$image) $image = 'https://www.metapack.com.mx/wp-content/uploads/2026/01/lproduct-2.webp';
                ?>
                    <div class="mp-testimonial-card">
                        <div class="mp-testimonial-card__image-container">
                            <img src="<?php echo esc_url($image); ?>" alt="<?php the_title_attribute(); ?>" width="142" height="172" style="object-fit: cover;" loading="lazy">
                        </div>
                        <div class="mp-testimonial-card__content">
                            <div class="mp-testimonial-card__name-row">
                                <h3 class="mp-testimonial-card__name"><?php the_title(); ?></h3>
                                <div class="mp-testimonial-card__stars">
                                    <?php for($i=1; $i<=5; $i++): ?>
                                        <span class="mp-star" style="color: #7A2056;"><?php echo ($i <= $stars) ? '★' : '☆'; ?></span>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <p class="mp-testimonial-card__role"><?php echo esc_html($role); ?></p>
                            <div class="mp-testimonial-card__review">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <div class="mp-testimonial-card__quotes">
                            <svg width="44" height="31" viewBox="0 0 44 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.900098 30.6L6.8401 9L8.8201 17.19C6.2401 17.19 4.1101 16.44 2.4301 14.94C0.810098 13.38 9.76697e-05 11.28 9.76697e-05 8.64C9.76697e-05 6.06 0.840098 3.99 2.5201 2.43C4.2001 0.809995 6.2701 -5.36442e-06 8.7301 -5.36442e-06C11.2501 -5.36442e-06 13.3201 0.809995 14.9401 2.43C16.5601 3.99 17.3701 6.06 17.3701 8.64C17.3701 9.42 17.3101 10.2 17.1901 10.98C17.1301 11.7 16.9201 12.57 16.5601 13.59C16.2601 14.61 15.7501 15.96 15.0301 17.64L9.8101 30.6H0.900098ZM27.4431 30.6L33.3831 9L35.3631 17.19C32.7831 17.19 30.6531 16.44 28.9731 14.94C27.3531 13.38 26.5431 11.28 26.5431 8.64C26.5431 6.06 27.3831 3.99 29.0631 2.43C30.7431 0.809995 32.8131 -5.36442e-06 35.2731 -5.36442e-06C37.7931 -5.36442e-06 39.8631 0.809995 41.4831 2.43C43.1031 3.99 43.9131 6.06 43.9131 8.64C43.9131 9.42 43.8531 10.2 43.7331 10.98C43.6731 11.7 43.4631 12.57 43.1031 13.59C42.8031 14.61 42.2931 15.96 41.5731 17.64L36.3531 30.6H27.4431Z" fill="#7A2056"/>
                            </svg>
                        </div>
                    </div>
                <?php 
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Fallback Demo
                ?>
                    <div class="mp-testimonial-card">
                        <div class="mp-testimonial-card__image-container">
                            <img src="https://www.metapack.com.mx/wp-content/uploads/2026/01/lproduct-2.webp" alt="César Amaya" width="142" height="172" style="object-fit: cover;" loading="lazy">
                        </div>
                        <div class="mp-testimonial-card__content">
                            <div class="mp-testimonial-card__name-row">
                                <h3 class="mp-testimonial-card__name">César Amaya</h3>
                                <div class="mp-testimonial-card__stars">★★★★★</div>
                            </div>
                            <p class="mp-testimonial-card__role">Gerente de operaciones - Empresa de alimentos</p>
                            <div class="mp-testimonial-card__review">
                                <p>Encontramos una solución que se adaptó muy bien a nuestros procesos. El equipo fue flexible y entendió claramente lo que necesitábamos.</p>
                            </div>
                        </div>
                        <div class="mp-testimonial-card__quotes">
                            <svg width="44" height="31" viewBox="0 0 44 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.900098 30.6L6.8401 9L8.8201 17.19C6.2401 17.19 4.1101 16.44 2.4301 14.94C0.810098 13.38 9.76697e-05 11.28 9.76697e-05 8.64C9.76697e-05 6.06 0.840098 3.99 2.5201 2.43C4.2001 0.809995 6.2701 -5.36442e-06 8.7301 -5.36442e-06C11.2501 -5.36442e-06 13.3201 0.809995 14.9401 2.43C16.5601 3.99 17.3701 6.06 17.3701 8.64C17.3701 9.42 17.3101 10.2 17.1901 10.98C17.1301 11.7 16.9201 12.57 16.5601 13.59C16.2601 14.61 15.7501 15.96 15.0301 17.64L9.8101 30.6H0.900098ZM27.4431 30.6L33.3831 9L35.3631 17.19C32.7831 17.19 30.6531 16.44 28.9731 14.94C27.3531 13.38 26.5431 11.28 26.5431 8.64C26.5431 6.06 27.3831 3.99 29.0631 2.43C30.7431 0.809995 32.8131 -5.36442e-06 35.2731 -5.36442e-06C37.7931 -5.36442e-06 39.8631 0.809995 41.4831 2.43C43.1031 3.99 43.9131 6.06 43.9131 8.64C43.9131 9.42 43.8531 10.2 43.7331 10.98C43.6731 11.7 43.4631 12.57 43.1031 13.59C42.8031 14.61 42.2931 15.96 41.5731 17.64L36.3531 30.6H27.4431Z" fill="#7A2056"/>
                            </svg>
                        </div>
                    </div>
                <?php 
                endif; 
                ?>
            </div>

            <!-- Paginación dinámica del slider -->
            <div class="mp-slider-pagination" id="mp-testimonialsPagination">
                <?php
                if ($testimonials_query->have_posts()) {
                    $total_posts = $testimonials_query->found_posts;
                    // El usuario pide más o menos 3 por slide, pero para que sea fluido 
                    // calculamos dots según el total. Si hay pocos, sale 1.
                    $dots_needed = ceil($total_posts / 3);
                    if ($dots_needed < 1) $dots_needed = 1;

                    for ($i = 0; $i < $dots_needed; $i++) {
                        $active_class = ($i === 0) ? 'mp-pagination-dot--active' : '';
                        echo '<button class="mp-pagination-dot ' . $active_class . '" data-index="' . ($i * 3) . '" aria-label="' . sprintf(esc_attr__('Ir a la diapositiva %d', 'metapack'), $i + 1) . '"></button>';
                    }
                } else {
                    // Fallback para demo
                    echo '<button class="mp-pagination-dot mp-pagination-dot--active" data-index="0" aria-label="' . esc_attr__('Ir a la diapositiva 1', 'metapack') . '"></button>';
                }
                ?>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- SECCIÓN 7: PARTNERS/CLIENTES               -->
<!-- ============================================ -->

<?php get_template_part('template-parts/partners', 'metapack'); ?>


<!-- ============================================ -->
<!-- SECCIÓN 8: MAQUILA                          -->
<!-- ============================================ -->

<section class="mp-maquila" id="mp-maquila">
    <div class="mp-container">
        <!-- Main Header -->
        <div class="mp-maquila__header mp-reveal-up">
            <span class="mp-section-tag">SERVICIO PERSONALIZADO</span>
            <h2 class="mp-maquila__title">MAQUILA Y PROYECTOS A LA MEDIDA</h2>
            <p class="mp-maquila__description">Nuestros casos de éxito representan desarrollos realizados a través de
                nuestros servicios de maquila. Trabajamos con adaptación de maquinaria, diseño de empaques individuales
                y colectivos, y procesos de grabado, enfocados en resolver necesidades específicas de cada cliente.</p>
            <a href="#mp-contacto" class="mp-btn mp-btn--primary">Conocer servicio de maquila</a>
        </div>

        <!-- Sub Header -->
        <div class="mp-maquila__sub-header mp-reveal-up">
            <h3 class="mp-maquila__sub-title">Proyectos hechos a la medida</h3>
            <p class="mp-maquila__sub-description">Cada desarrollo refleja una necesidad distinta, en sectores que
                requieren soluciones prácticas, eficientes y adaptadas a su operación.</p>
        </div>

        <!-- Carousel -->
        <div class="mp-maquila__carousel-container">
            <button class="mp-carousel-arrow mp-carousel-arrow--prev" id="mp-maquilaPrev" aria-label="Diapositiva anterior">
                <svg width="41" height="41" viewBox="0 0 41 41" fill="none">
                    <circle cx="20.5" cy="20.5" r="20" stroke="white" />
                    <path d="M23 13L16 20.5L23 28" stroke="white" stroke-width="2" />
                </svg>
            </button>

            <div class="mp-maquila__viewport">
                <div class="mp-maquila__track" id="mp-maquilaTrack">
                    <!-- Slide 1 -->
                    <div class="mp-maquila-slide">
                        <div class="mp-maquila-card">
                            <div class="mp-maquila-card__image">
                                <img src="https://www.metapack.com.mx/wp-content/uploads/2026/01/Product-image.png"
                                    alt="Empaque industrial" width="541" height="354" loading="lazy">
                            </div>
                            <div class="mp-maquila-card__content">
                                <h4 class="mp-maquila-card__card-title">Empaque industrial para alimentos preparados
                                </h4>
                                <div class="mp-maquila-card__tags">
                                    <div class="mp-maquila-card__tag">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                                            <path d="M15 15H3V6L9 3L15 6V15Z" stroke="white" stroke-width="1.5" />
                                            <path d="M6 15V10H9V15" stroke="white" stroke-width="1.5" />
                                        </svg>
                                        ALIMENTOS SANTA ELENA
                                    </div>
                                    <div class="mp-maquila-card__tag">INDUSTRIA ALIMENTICIA</div>
                                </div>
                                <p class="mp-maquila-card__text">Desarrollo de solución en aluminio para procesos de
                                    empaque en línea de producción. Diseño de presentación adaptada a operación
                                    industrial y requerimientos del cliente.</p>
                                <div class="mp-maquila-card__services">
                                    <h5 class="mp-maquila-card__services-title">Servicios aplicados</h5>
                                    <ul class="mp-maquila-card__services-list">
                                        <li><span class="mp-bullet"></span> Maquila</li>
                                        <li><span class="mp-bullet"></span> Empaque</li>
                                        <li><span class="mp-bullet"></span> Adaptación de formato</li>
                                    </ul>
                                </div>
                                <button class="mp-btn mp-btn--primary mp-btn--full">Ver aplicación</button>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="mp-maquila-slide">
                        <div class="mp-maquila-card">
                            <div class="mp-maquila-card__image">
                                <img src="https://www.metapack.com.mx/wp-content/uploads/2026/01/Product-image-1.png"
                                    alt="Cadena de restaurantes" width="541" height="354" loading="lazy">
                            </div>
                            <div class="mp-maquila-card__content">
                                <h4 class="mp-maquila-card__card-title">Solución de empaque para cadena de restaurantes
                                </h4>
                                <div class="mp-maquila-card__tags">
                                    <div class="mp-maquila-card__tag">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                                            <path d="M15 15H3V6L9 3L15 6V15Z" stroke="white" stroke-width="1.5" />
                                            <path d="M6 15V10H9V15" stroke="white" stroke-width="1.5" />
                                        </svg>
                                        GRUPO SABORES URBANOS
                                    </div>
                                    <div class="mp-maquila-card__tag">RESTAURANTES</div>
                                </div>
                                <p class="mp-maquila-card__text">Desarrollo de empaques individuales en aluminio para
                                    servicio de alimentos y operación de cocina a gran volumen.</p>
                                <div class="mp-maquila-card__services">
                                    <h5 class="mp-maquila-card__services-title">Servicios aplicados</h5>
                                    <ul class="mp-maquila-card__services-list">
                                        <li><span class="mp-bullet"></span> Maquila</li>
                                        <li><span class="mp-bullet"></span> Diseño de empaque</li>
                                        <li><span class="mp-bullet"></span> Producción personalizada</li>
                                    </ul>
                                </div>
                                <button class="mp-btn mp-btn--primary mp-btn--full">Ver aplicación</button>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="mp-maquila-slide">
                        <div class="mp-maquila-card">
                            <div class="mp-maquila-card__image">
                                <img src="https://www.metapack.com.mx/wp-content/uploads/2026/01/Product-image-2.png"
                                    alt="Punto de venta" width="541" height="354" loading="lazy">
                            </div>
                            <div class="mp-maquila-card__content">
                                <h4 class="mp-maquila-card__card-title">Soluciones para punto de venta</h4>
                                <div class="mp-maquila-card__tags">
                                    <div class="mp-maquila-card__tag">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                                            <path d="M15 15H3V6L9 3L15 6V15Z" stroke="white" stroke-width="1.5" />
                                            <path d="M6 15V10H9V15" stroke="white" stroke-width="1.5" />
                                        </svg>
                                        DISTRIBUIDORA CENTRAL MX
                                    </div>
                                    <div class="mp-maquila-card__tag">COMERCIO Y DISTRIBUCIÓN</div>
                                </div>
                                <p class="mp-maquila-card__text">Empaques secundarios diseñados para clasificación,
                                    resguardo y entrega de productos.</p>
                                <div class="mp-maquila-card__services">
                                    <h5 class="mp-maquila-card__services-title">Servicios aplicados</h5>
                                    <ul class="mp-maquila-card__services-list">
                                        <li><span class="mp-bullet"></span> Maquila</li>
                                        <li><span class="mp-bullet"></span> Diseño de empaque</li>
                                        <li><span class="mp-bullet"></span> Logística</li>
                                    </ul>
                                </div>
                                <button class="mp-btn mp-btn--primary mp-btn--full">Ver aplicación</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="mp-carousel-arrow mp-carousel-arrow--next" id="mp-maquilaNext" aria-label="Diapositiva siguiente">
                <svg width="41" height="41" viewBox="0 0 41 41" fill="none">
                    <circle cx="20.5" cy="20.5" r="20" stroke="white" />
                    <path d="M18 13L25 20.5L18 28" stroke="white" stroke-width="2" />
                </svg>
            </button>
        </div>
    </div>
</section>


<!-- ============================================ -->
<!-- SECCIÓN 9: PRODUCTOS DESTACADOS             -->
<!-- ============================================ -->

<section class="mp-products" id="mp-consumo">
    <div class="mp-container">
        <!-- Header Centrado -->
        <div class="mp-products__header-v2 mp-reveal-up">
            <h2 class="mp-products__title-v2"><?php echo esc_html(get_theme_mod('featured_products_title', 'NUESTROS PRODUCTOS DESTACADOS')); ?></h2>
            <p class="mp-products__subtitle-v2"><?php echo esc_html(get_theme_mod('featured_products_subtitle', 'Disponibles en distintas medidas y calibres')); ?></p>
            <div class="mp-products__action-v2">
                <a href="<?php echo get_post_type_archive_link('producto'); ?>" class="mp-btn mp-btn--primary mp-btn--shadow">VER TODOS LOS PRODUCTOS</a>
            </div>
        </div>

        <!-- Slider de Productos -->
        <div class="mp-products__carousel">
            <div class="mp-products__viewport">
                <div class="mp-products__track" id="mp-productsTrack">
                    <?php
                    $featured_ids = get_theme_mod('featured_products_ids', '');
                    $p_args = array(
                        'post_type' => 'producto',
                        'posts_per_page' => 6,
                    );
                    
                    if (!empty($featured_ids)) {
                        $ids_array = array_map('intval', array_map('trim', explode(',', $featured_ids)));
                        $p_args['post__in'] = $ids_array;
                        $p_args['orderby'] = 'post__in';
                    } else {
                        $p_args['orderby'] = 'date';
                        $p_args['order'] = 'DESC';
                    }
                    
                    $products_query = new WP_Query($p_args);

                    if ($products_query->have_posts()) :
                        while ($products_query->have_posts()) : $products_query->the_post();
                            // Obtener taxonomía Industria para el Badge
                            $industrias = get_the_terms(get_the_ID(), 'industria');
                            $badge_text = ($industrias && !is_wp_error($industrias)) ? $industrias[0]->name : 'USO INDUSTRIAL';
                            
                            // Obtener Calibres (ACF field)
                            $calibre_raw = function_exists('get_field') ? get_field('calibre') : get_post_meta(get_the_ID(), 'calibre', true);
                            $calibres = array();
                            if ($calibre_raw) {
                                $calibres = array_map('trim', explode(',', $calibre_raw));
                            }
                    ?>
                        <div class="mp-product-slide">
                            <div class="mp-product-card-v2">
                                <div class="mp-product-card-v2__badge"><?php echo esc_html(strtoupper($badge_text)); ?></div>
                                <div class="mp-product-card-v2__image">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium_large'); ?>
                                    <?php else : ?>
                                        <img src="https://www.metapack.com.mx/wp-content/uploads/2026/01/rollo-de-aluminio-azul.jpg" alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="mp-product-card-v2__content">
                                    <h3 class="mp-product-card-v2__title"><?php the_title(); ?></h3>
                                    <div class="mp-product-card-v2__text">
                                        <?php if (has_excerpt()) : ?>
                                            <?php the_excerpt(); ?>
                                        <?php else : ?>
                                            <p><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <?php if (!empty($calibres)) : ?>
                                    <div class="mp-product-card-v2__specs">
                                        <span class="mp-product-card-v2__specs-label">Calibres disponibles:</span>
                                        <div class="mp-product-card-v2__spec-boxes">
                                            <?php foreach ($calibres as $un_calibre) : ?>
                                                <div class="mp-spec-box"><?php echo esc_html($un_calibre); ?></div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="mp-product-card-v2__footer">
                                    <a href="<?php the_permalink(); ?>" class="mp-product-btn mp-product-btn--dark">VER DETALLES</a>
                                    <a href="https://wa.me/<?php echo esc_attr(get_theme_mod('contact_whatsapp', '523313011647')); ?>?text=<?php echo urlencode('Hola, me interesa cotizar el producto: ' . get_the_title()); ?>" class="mp-product-btn mp-product-btn--primary" target="_blank">COTIZAR</a>
                                </div>
                            </div>
                        </div>
                    <?php 
                        endwhile;
                        wp_reset_postdata();
                    else :
                        // Si no hay productos, mostrar un mensaje o nada
                        echo '<p style="text-align:center; padding:20px; width:100%;">No hay productos destacados en este momento.</p>';
                    endif; 
                    ?>
                </div>
            </div>

            <!-- Paginación dinámica -->
            <div class="mp-products-pagination" id="mp-productsPagination">
                <?php
                if ($products_query->have_posts()) {
                    $total_prods = $products_query->post_count; // FIX: usar post_count en lugar de found_posts
                    $dots_prods = ceil($total_prods / 3);
                    if ($dots_prods > 1) {
                        for ($j = 0; $j < $dots_prods; $j++) {
                            $act = ($j === 0) ? 'mp-pagination-dot--active' : '';
                            echo '<button class="mp-pagination-dot ' . $act . '" data-index="' . $j . '" aria-label="' . sprintf(esc_attr__('Ir a los productos de la diapositiva %d', 'metapack'), $j + 1) . '"></button>';
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>


<!-- ============================================ -->
<!-- SECCIÓN 10: CTA PREMIUM (DAMA)              -->
<!-- ============================================ -->
<?php get_template_part('template-parts/cta', 'metapack'); ?>


<!-- ============================================ -->
<!-- SECCIÓN 11: BLOG                            -->
<!-- ============================================ -->

<section class="mp-blog" id="mp-blog">
    <div class="mp-container">
        <!-- Header V2 -->
        <div class="mp-blog__header-v2 mp-reveal-up">
            <span class="mp-section-tag">BLOG</span>
            <div class="mp-blog__header-text-container">
                <h2 class="mp-blog__title-v2">CONOCIMIENTO QUE RESPALDA CADA SOLUCIÓN</h2>
                <p class="mp-blog__subtitle-v2">Consejos prácticos, guías y contenido especializado para ayudarte a
                    elegir mejor tus empaques, comprender procesos de personalización y optimizar tus operaciones.</p>
            </div>
        </div>

        <!-- Slider de Blog -->
        <div class="mp-blog__slider">
            <div class="mp-blog__viewport">
                <div class="mp-blog__track" id="mp-blogTrack">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 6,
                        'orderby' => 'date',
                        'order' => 'DESC'
                    );
                    $blog_query = new WP_Query($args);
                    if ($blog_query->have_posts()) :
                        while ($blog_query->have_posts()) : $blog_query->the_post();
                    ?>
                        <div class="mp-blog-slide">
                            <article class="mp-blog-card-v2">
                                <div class="mp-blog-card-v2__image-box">
                                    <a href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr(sprintf('Leer más sobre %s', get_the_title())); ?>">
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
                                            $categories = get_the_category();
                                            if (!empty($categories)) {
                                                echo esc_html($categories[0]->name);
                                            } else {
                                                echo 'Blog';
                                            }
                                            ?>
                                        </div>
                                        <span class="mp-blog-card-v2__date"><?php echo get_the_date('d M Y'); ?></span>
                                    </div>
                                    <h3 class="mp-blog-card-v2__title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <p class="mp-blog-card-v2__excerpt"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="mp-btn mp-btn--primary mp-btn--sm">Leer artículo completo</a>
                                </div>
                            </article>
                        </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>

            <!-- Paginación Blog -->
            <div class="mp-blog__pagination" id="mp-blogPagination">
                <?php
                if ($blog_query->have_posts()) {
                    $total_posts = $blog_query->found_posts;
                    if ($total_posts > 6) $total_posts = 6; // Limit to 6
                    $dots_blog = ceil($total_posts / 2);
                    if ($dots_blog > 1) {
                        for ($i = 0; $i < $dots_blog; $i++) {
                            $act = ($i === 0) ? 'mp-pagination-dot--active' : '';
                            echo '<button class="mp-pagination-dot ' . $act . '" data-index="' . $i . '" aria-label="' . sprintf(esc_attr__('Ir a las entradas de la diapositiva %d', 'metapack'), $i + 1) . '"></button>';
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>


<!-- ============================================ -->
<!-- SECCIÓN 12: FAQ (REUSABLE)                  -->
<!-- ============================================ -->
<?php get_template_part('template-parts/faq', 'metapack'); ?>


<!-- ============================================ -->
<!-- SECCIÓN 13: CONTACTO (PREMIUM FIGMA)        -->
<!-- ============================================ -->

<!-- ============================================ -->
<!-- SECCIÓN 13: CONTACTO (REUSABLE)            -->
<!-- ============================================ -->
<?php get_template_part('template-parts/contact', 'metapack'); ?>



<?php get_footer(); ?>
