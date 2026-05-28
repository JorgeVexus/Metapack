<?php
/**
 * Template part for the Premium CTA section
 */
?>
<section class="mp-cta-premium" id="mp-cta-premium">
    <div class="mp-container">
        <div class="mp-cta-premium__box mp-reveal-zoom">
            <div class="mp-cta-premium__inner">
                <div class="mp-cta-premium__content">
                    <h2 class="mp-cta-premium__title"><?php echo esc_html(get_theme_mod('cta_title', '¿NECESITA UN PROVEEDOR QUE RESPONDA?')); ?></h2>
                    <p class="mp-cta-premium__text"><?php echo esc_html(get_theme_mod('cta_text', 'Deje de perder tiempo con proveedores informales. Obtenga una cotización técnica formal en menos de 24 horas.')); ?></p>
                    
                    <div class="mp-cta-premium__features">
                        <div class="mp-cta-premium__feature">
                            <span class="mp-bullet-square"></span>
                            <?php echo esc_html(get_theme_mod('cta_feature_1', 'Atención inmediata')); ?>
                        </div>
                        <div class="mp-cta-premium__feature">
                            <span class="mp-bullet-square"></span>
                            <?php echo esc_html(get_theme_mod('cta_feature_2', 'Envíos a todo México')); ?>
                        </div>
                        <div class="mp-cta-premium__feature">
                            <span class="mp-bullet-square"></span>
                            <?php echo esc_html(get_theme_mod('cta_feature_3', 'Facturación al día')); ?>
                        </div>
                    </div>
                </div>
                
                <div class="mp-cta-premium__actions">
                    <a href="#mp-contacto" class="mp-btn-premium mp-btn-premium--white">SOLICITAR COTIZACIÓN</a>
                    <a href="<?php echo home_url('/productos/'); ?>" class="mp-btn-premium mp-btn-premium--outline">VER SOLUCIONES</a>
                </div>
            </div>
        </div>
    </div>
</section>
