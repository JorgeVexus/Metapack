<?php
/**
 * Template Name: Maquila y Personalización
 * Template Post Type: page
 */

get_template_part('template-parts/header', 'metapack');
?>

<!-- ============================================ -->
<!-- HERO MAQUILA (DISEÑO FIGMA - IGUAL QUE QUIÉNES SOMOS) -->
<!-- ============================================ -->

<section class="mp-quienes-hero-v2">
    <div class="mp-container">
        <div class="mp-quienes-hero-v2__box mp-reveal-scale">
            <div class="mp-quienes-hero-v2__content">
                <h1 class="mp-quienes-hero-v2__title">MAQUILA Y PERSONALIZACIÓN</h1>
                <div class="mp-quienes-hero-v2__subtitle-wrap">
                    <p class="mp-quienes-hero-v2__subtitle">
                        Ponemos nuestra capacidad instalada al servicio de su marca. Soluciones integrales de manufactura para terceros.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ============================================ -->
<!-- SU SOCIO ESTRATÉGICO EN MANUFACTURA (FIGMA) -->
<!-- ============================================ -->

<section class="mp-socio-v2">
    <div class="mp-container">
        <div class="mp-socio-v2__content mp-reveal-up">
            <h2 class="mp-socio-v2__title">Su socio estratégico en manufactura</h2>
            <p class="mp-socio-v2__text">
                Entendemos que cada cliente tiene necesidades únicas. Nuestro servicio de maquila le permite acceder a tecnología de punta sin la inversión en maquinaria, obteniendo productos terminados con sus especificaciones exactas.
            </p>
            <p class="mp-socio-v2__text">
                Ya sea que requiera una marca privada (Private Label) o un proceso específico de conversión, MetaPack actúa como su departamento de producción externo
            </p>
            <a href="#mp-contacto" class="mp-btn mp-btn--primary">Cotizar proyecto</a>
        </div>
    </div>
</section>


<!-- ============================================ -->
<!-- CARRUSEL DE IMÁGENES                        -->
<!-- ============================================ -->

<?php
// Obtener imágenes del carrusel desde el Customizer
$carousel_images = array(
    get_theme_mod('maquila_carousel_img_1', 'https://www.metapack.com.mx/wp-content/uploads/2026/01/Product-image.webp'),
    get_theme_mod('maquila_carousel_img_2', 'https://www.metapack.com.mx/wp-content/uploads/2026/01/Product-image-1.webp'),
    get_theme_mod('maquila_carousel_img_3', 'https://www.metapack.com.mx/wp-content/uploads/2026/01/Product-image-2.webp'),
    get_theme_mod('maquila_carousel_img_4', 'https://www.metapack.com.mx/wp-content/uploads/2026/01/Product-image.webp'),
);
?>

<section class="mp-image-carousel">
    <div class="mp-image-carousel__container">
        <div class="mp-image-carousel__track" id="imageCarouselTrack">
            <?php foreach ($carousel_images as $index => $image_url) : ?>
                <div class="mp-image-carousel__slide">
                    <img src="<?php echo esc_url($image_url); ?>" 
                         alt="Maquila <?php echo ($index + 1); ?>" 
                         class="mp-image-carousel__img"
                         width="541" height="354"
                         loading="lazy">
                </div>
            <?php endforeach; ?>
            <!-- Duplicate images for infinite loop -->
            <?php foreach ($carousel_images as $index => $image_url) : ?>
                <div class="mp-image-carousel__slide">
                    <img src="<?php echo esc_url($image_url); ?>" 
                         alt="Maquila <?php echo ($index + 1); ?>" 
                         class="mp-image-carousel__img"
                         width="541" height="354"
                         loading="lazy">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- ============================================ -->
<!-- CAPACIDADES DE PRODUCCIÓN (FIGMA)           -->
<!-- ============================================ -->

<section class="mp-capacidades-v2">
    <div class="mp-container">
        <div class="mp-capacidades-v2__header mp-reveal-up">
            <h2 class="mp-capacidades-v2__title">Capacidades de producción</h2>
            <p class="mp-capacidades-v2__subtitle">Contamos con líneas de producción versátiles capaces de manejar diversos anchos, calibres y acabados.</p>
        </div>
        
        <div class="mp-capacidades-v2__grid">
            <!-- Card 1: Grabado (Embossing) -->
            <div class="mp-capacidad-v2 mp-reveal-up mp-delay-1">
                <div class="mp-capacidad-v2__icon">
                    <img src="https://www.metapack.com.mx/wp-content/uploads/2026/01/pluma.webp" alt="Grabado" width="48" height="48" loading="lazy">
                </div>
                <h3 class="mp-capacidad-v2__title">Grabado (Embossing)</h3>
                <div class="mp-capacidad-v2__content">
                    <p class="mp-capacidad-v2__text">Aplicación de textura tipo diamante o patrones personalizados sobre la hoja de aluminio.</p>
                    <ul class="mp-capacidad-v2__list">
                        <li>Mejora la resistencia mecánica</li>
                        <li>Facilita la separación de hojas</li>
                        <li>Estética premium para el consumidor</li>
                    </ul>
                </div>
            </div>
            
            <!-- Card 2: Corte y rebobinado -->
            <div class="mp-capacidad-v2 mp-reveal-up mp-delay-2">
                <div class="mp-capacidad-v2__icon">
                    <img src="https://www.metapack.com.mx/wp-content/uploads/2026/01/tijeras.webp" alt="Corte" width="48" height="48" loading="lazy">
                </div>
                <h3 class="mp-capacidad-v2__title">Corte y rebobinado</h3>
                <div class="mp-capacidad-v2__content">
                    <p class="mp-capacidad-v2__text">Transformación de Rollos Madre (Jumbos) a presentaciones comerciales exactas.</p>
                    <ul class="mp-capacidad-v2__list">
                        <li>Corte de precisión milimétrica</li>
                        <li>Control de tensión automatizado</li>
                        <li>Desde 4m domésticos hasta 400m industriales</li>
                    </ul>
                </div>
            </div>
            
            <!-- Card 3: Private label -->
            <div class="mp-capacidad-v2 mp-reveal-up mp-delay-3">
                <div class="mp-capacidad-v2__icon">
                    <img src="https://www.metapack.com.mx/wp-content/uploads/2026/01/caja.webp" alt="Private Label" width="48" height="48" loading="lazy">
                </div>
                <h3 class="mp-capacidad-v2__title">Private label</h3>
                <div class="mp-capacidad-v2__content">
                    <p class="mp-capacidad-v2__text">Entregamos el producto 100% terminado con su imagen corporativa, listo para venta.</p>
                    <ul class="mp-capacidad-v2__list">
                        <li>Impresión de cajas personalizadas</li>
                        <li>Centro de cartón con su logo</li>
                        <li>Etiquetado y paletizado a medida</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ============================================ -->
<!-- SECCIÓN: MAQUILA Y PROYECTOS (IDÉNTICA HOME)-->
<!-- ============================================ -->

<section class="mp-maquila" id="mp-maquila">
    <div class="mp-container">
        <!-- Main Header -->
        <div class="mp-maquila__header">
            <span class="mp-section-tag">SERVICIO PERSONALIZADO</span>
            <h2 class="mp-maquila__title">MAQUILA Y PROYECTOS A LA MEDIDA</h2>
            <p class="mp-maquila__description">Nuestros casos de éxito representan desarrollos realizados a través de
                nuestros servicios de maquila. Trabajamos con adaptación de maquinaria, diseño de empaques individuales
                y colectivos, y procesos de grabado, enfocados en resolver necesidades específicas de cada cliente.</p>
            <a href="#mp-contacto" class="mp-btn mp-btn--primary">Conocer servicio de maquila</a>
        </div>

        <!-- Sub Header -->
        <div class="mp-maquila__sub-header">
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
                    <?php
                    $casos_maquila_query = new WP_Query(array(
                        'post_type'      => 'caso_exito',
                        'posts_per_page' => 6,
                        'post_status'    => 'publish',
                    ));

                    if ($casos_maquila_query->have_posts()) :
                        while ($casos_maquila_query->have_posts()) : $casos_maquila_query->the_post();
                            $caso_cliente   = get_post_meta(get_the_ID(), '_caso_cliente', true);
                            $caso_industria = get_post_meta(get_the_ID(), '_caso_industria', true);
                            $caso_servicios = get_post_meta(get_the_ID(), '_caso_servicios', true);
                            $caso_enlace    = get_post_meta(get_the_ID(), '_caso_enlace', true);
                            if (!$caso_enlace) {
                                $caso_enlace = '#mp-contacto';
                            }
                            $services_array = !empty($caso_servicios) ? array_filter(array_map('trim', explode("\n", str_replace(',', "\n", $caso_servicios)))) : array();
                            ?>
                            <div class="mp-maquila-slide">
                                <div class="mp-maquila-card">
                                    <div class="mp-maquila-card__image">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('large', array('alt' => get_the_title(), 'loading' => 'lazy')); ?>
                                        <?php else : ?>
                                            <img src="https://www.metapack.com.mx/wp-content/uploads/2026/01/Product-image.webp" alt="<?php the_title_attribute(); ?>" width="541" height="354" loading="lazy">
                                        <?php endif; ?>
                                    </div>
                                    <div class="mp-maquila-card__content">
                                        <h4 class="mp-maquila-card__card-title"><?php the_title(); ?></h4>
                                        <div class="mp-maquila-card__tags">
                                            <?php if ($caso_cliente) : ?>
                                                <div class="mp-maquila-card__tag">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                        <path d="M15 15H3V6L9 3L15 6V15Z" stroke="white" stroke-width="1.5" />
                                                        <path d="M6 15V10H9V15" stroke="white" stroke-width="1.5" />
                                                    </svg>
                                                    <?php echo esc_html($caso_cliente); ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($caso_industria) : ?>
                                                <div class="mp-maquila-card__tag"><?php echo esc_html($caso_industria); ?></div>
                                            <?php endif; ?>
                                        </div>
                                        <p class="mp-maquila-card__text"><?php echo get_the_excerpt() ? esc_html(get_the_excerpt()) : wp_trim_words(get_the_content(), 25); ?></p>
                                        <?php if (!empty($services_array)) : ?>
                                            <div class="mp-maquila-card__services">
                                                <h5 class="mp-maquila-card__services-title">Servicios aplicados</h5>
                                                <ul class="mp-maquila-card__services-list">
                                                    <?php foreach ($services_array as $service) : ?>
                                                        <li><span class="mp-bullet"></span> <?php echo esc_html($service); ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>
                                        <a href="<?php echo esc_url($caso_enlace); ?>" class="mp-btn mp-btn--primary mp-btn--full">Ver aplicación</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        // Fallback de proyectos demostrativos sin nombres no administrados
                        ?>
                        <!-- Slide 1 -->
                        <div class="mp-maquila-slide">
                            <div class="mp-maquila-card">
                                <div class="mp-maquila-card__image">
                                    <img src="https://www.metapack.com.mx/wp-content/uploads/2026/01/Product-image.webp"
                                        alt="Empaque industrial" width="541" height="354" loading="lazy">
                                </div>
                                <div class="mp-maquila-card__content">
                                    <h4 class="mp-maquila-card__card-title">Empaque industrial para alimentos preparados</h4>
                                    <div class="mp-maquila-card__tags">
                                        <div class="mp-maquila-card__tag">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                <path d="M15 15H3V6L9 3L15 6V15Z" stroke="white" stroke-width="1.5" />
                                                <path d="M6 15V10H9V15" stroke="white" stroke-width="1.5" />
                                            </svg>
                                            PROYECTO INDUSTRIAL
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
                                    <a href="#mp-contacto" class="mp-btn mp-btn--primary mp-btn--full">Solicitar cotización</a>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2 -->
                        <div class="mp-maquila-slide">
                            <div class="mp-maquila-card">
                                <div class="mp-maquila-card__image">
                                    <img src="https://www.metapack.com.mx/wp-content/uploads/2026/01/Product-image-1.webp"
                                        alt="Cadena de restaurantes" width="541" height="354" loading="lazy">
                                </div>
                                <div class="mp-maquila-card__content">
                                    <h4 class="mp-maquila-card__card-title">Solución de empaque para cadenas de servicio</h4>
                                    <div class="mp-maquila-card__tags">
                                        <div class="mp-maquila-card__tag">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                <path d="M15 15H3V6L9 3L15 6V15Z" stroke="white" stroke-width="1.5" />
                                                <path d="M6 15V10H9V15" stroke="white" stroke-width="1.5" />
                                            </svg>
                                            FOOD SERVICE
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
                                    <a href="#mp-contacto" class="mp-btn mp-btn--primary mp-btn--full">Solicitar cotización</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
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
<!-- ¿CÓMO FUNCIONA EL PROCESO?                  -->
<!-- ============================================ -->

<section class="mp-proceso">
    <div class="mp-container">
        <div class="mp-proceso__header">
            <h2 class="mp-proceso__title">¿Cómo funciona el proceso?</h2>
            <p class="mp-proceso__subtitle">Cada etapa del proceso está diseñada para garantizar precisión y consistencia.</p>
        </div>
        
        <div class="mp-proceso__timeline">
            <!-- Step 1 -->
            <div class="mp-proceso-step" data-step="1">
                <div class="mp-proceso-step__marker">
                    <div class="mp-proceso-step__circle">
                        <span>1</span>
                    </div>
                    <div class="mp-proceso-step__line"></div>
                </div>
                <div class="mp-proceso-step__content">
                    <h3 class="mp-proceso-step__title">Análisis de requerimiento</h3>
                    <p class="mp-proceso-step__text">Definimos especificaciones: aleación, temple, calibre, ancho y metraje.</p>
                </div>
            </div>
            
            <!-- Step 2 -->
            <div class="mp-proceso-step" data-step="2">
                <div class="mp-proceso-step__marker">
                    <div class="mp-proceso-step__circle">
                        <span>2</span>
                    </div>
                    <div class="mp-proceso-step__line"></div>
                </div>
                <div class="mp-proceso-step__content">
                    <h3 class="mp-proceso-step__title">Producción y control</h3>
                    <p class="mp-proceso-step__text">Ejecución bajo normas ISO con monitoreo constante de calidad.</p>
                </div>
            </div>
            
            <!-- Step 3 -->
            <div class="mp-proceso-step" data-step="3">
                <div class="mp-proceso-step__marker">
                    <div class="mp-proceso-step__circle">
                        <span>3</span>
                    </div>
                </div>
                <div class="mp-proceso-step__content">
                    <h3 class="mp-proceso-step__title">Logística y entrega</h3>
                    <p class="mp-proceso-step__text">Despacho a sus almacenes o centros de distribución.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ============================================ -->
<!-- CTA PREMIUM (DAMA)                          -->
<!-- ============================================ -->
<?php get_template_part('template-parts/cta', 'metapack'); ?>


<!-- ============================================ -->
<!-- CONTACTO (CTA con Formulario)               -->
<!-- ============================================ -->

<!-- ============================================ -->
<!-- CONTACTO (REUSABLE)                         -->
<!-- ============================================ -->
<?php 
get_template_part('template-parts/contact', 'metapack', array(
    'message' => '¿Tienes un proyecto de maquila o personalización? Escríbenos, con gusto te asesoraremos.',
    'form_message' => 'Me interesa conocer el servicio de maquila y personalización'
)); 
?>


<!-- Script del carousel -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const track = document.getElementById('mp-maquilaTrack');
    const prevBtn = document.getElementById('mp-maquilaPrev');
    const nextBtn = document.getElementById('mp-maquilaNext');
    const pagination = document.getElementById('mp-maquilaPagination');
    const dots = pagination?.querySelectorAll('.mp-pagination-dot');
    const slides = track?.querySelectorAll('.mp-maquila-slide');
    
    if (!track || !slides || slides.length === 0) return;
    
    let currentIndex = 0;
    const totalSlides = slides.length;
    
    function updateCarousel() {
        const offset = -currentIndex * 100;
        track.style.transform = `translateX(${offset}%)`;
        
        // Update dots
        if (dots) {
            dots.forEach((dot, index) => {
                if (index === currentIndex) {
                    dot.classList.add('mp-pagination-dot--active');
                } else {
                    dot.classList.remove('mp-pagination-dot--active');
                }
            });
        }
    }
    
    if (prevBtn) {
        prevBtn.addEventListener('click', function() {
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            updateCarousel();
        });
    }
    
    if (nextBtn) {
        nextBtn.addEventListener('click', function() {
            currentIndex = (currentIndex + 1) % totalSlides;
            updateCarousel();
        });
    }
    
    if (dots) {
        dots.forEach((dot, index) => {
            dot.addEventListener('click', function() {
                currentIndex = index;
                updateCarousel();
            });
        });
    }
});

// Image Carousel Auto-Scroll
const imageCarouselTrack = document.getElementById('imageCarouselTrack');
if (imageCarouselTrack) {
    let scrollPosition = 0;
    const scrollSpeed = 0.5; // pixels per frame
    
    function autoScroll() {
        scrollPosition += scrollSpeed;
        
        // Get the width of one image
        const slideWidth = imageCarouselTrack.querySelector('.mp-image-carousel__slide')?.offsetWidth || 0;
        const totalWidth = slideWidth * (imageCarouselTrack.children.length / 2); // Half because duplicated
        
        // Reset when we've scrolled through the first set
        if (scrollPosition >= totalWidth) {
            scrollPosition = 0;
        }
        
        imageCarouselTrack.style.transform = `translateX(-${scrollPosition}px)`;
        requestAnimationFrame(autoScroll);
    }
    
    autoScroll();
}
</script>

<?php
get_template_part('template-parts/footer', 'metapack');
?>
