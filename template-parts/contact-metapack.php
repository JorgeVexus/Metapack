<?php
/**
 * Template part for the Contact Form section
 * 
 * Usage: get_template_part('template-parts/contact', 'metapack', array('message' => 'Your custom message here'));
 */

$default_message = $args['message'] ?? '¿Tienes un proyecto o necesitas una cotización? Escríbenos o llámanos, con gusto te atenderemos.';
$form_textarea_value = $args['form_message'] ?? 'Me interesa cotizar: ' . get_the_title();
?>

<section class="mp-contact-v2" id="mp-contacto">
    <div class="mp-container">
        <div class="mp-contact-v2__grid">

            <!-- Columna Izquierda: Info y Mapa -->
            <div class="mp-contact-v2__left mp-reveal-left">
                <div class="mp-contact-info-card-premium">
                    <h2 class="mp-contact-info-card__title">CONTACTO</h2>
                    <p class="mp-contact-info-card__description"><?php echo esc_html($default_message); ?></p>

                    <div class="mp-contact-details-premium">
                        <!-- Dirección -->
                        <div class="mp-contact-detail-v2">
                            <div class="mp-contact-detail-v2__icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                            </div>
                            <div class="mp-contact-detail-v2__content">
                                <strong>Dirección</strong>
                                <div class="mp-address-block" style="margin-bottom: 12px;">
                                    <span class="mp-address-label">OFICINAS CORPORATIVAS</span>
                                    <p><?php echo esc_html(get_theme_mod('contact_address', 'Francisco Sarabia 1399 Col. Talpita CP. 44710 Guadalajara, Jalisco, México')); ?></p>
                                </div>
                                <div class="mp-address-block">
                                    <span class="mp-address-label">CEDIS</span>
                                    <p><?php echo esc_html(get_theme_mod('contact_address_cedis', 'Camino a Colimilla No. 240 Col. La Noria, CP. 45413, Tonalá, Jalisco, México.')); ?></p>
                                </div>
                            </div>
                        </div>

                        <!-- Teléfonos -->
                        <div class="mp-contact-detail-v2">
                            <div class="mp-contact-detail-v2__icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l2.28-2.28a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>
                            </div>
                            <div class="mp-contact-detail-v2__content">
                                <strong>Teléfonos</strong>
                                <p>Oficina: <?php echo esc_html(get_theme_mod('contact_phone_office', '33 3649 0281')); ?></p>
                                <p>Atención al cliente: <?php echo esc_html(get_theme_mod('contact_phone_sales', '33 1301 1647')); ?></p>
                            </div>
                        </div>

                        <!-- Correo -->
                        <div class="mp-contact-detail-v2">
                            <div class="mp-contact-detail-v2__icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </div>
                            <div class="mp-contact-detail-v2__content">
                                <strong>Correo Electrónico</strong>
                                <p><?php echo esc_html(get_theme_mod('contact_email_sales', 'ventas@metapack.com.mx')); ?></p>
                                <p><?php echo esc_html(get_theme_mod('contact_email_info', 'info@metapack.com.mx')); ?></p>
                            </div>
                        </div>

                        <!-- Horario -->
                        <div class="mp-contact-detail-v2">
                            <div class="mp-contact-detail-v2__icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                            </div>
                            <div class="mp-contact-detail-v2__content">
                                <strong>Horario de Atención</strong>
                                <p><?php echo esc_html(get_theme_mod('contact_hours', 'Lunes a Viernes: 8:00 AM - 5:30 PM')); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mapa -->
                <div class="mp-contact-map-premium">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3732.55627233!2d-103.3!3d20.7!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjDCsDQyJzAwLjAiTiAxMDPCsDE4JzAwLjAiVw!5e0!3m2!1ses!2smx!4v1"
                        width="100%" height="230" style="border:0; border-radius: 12px;" allowfullscreen=""
                        loading="lazy" title="Ubicación de las oficinas de Metapack en Google Maps"></iframe>
                </div>
            </div>

            <!-- Columna Derecha: Formulario de Cotización -->
            <div class="mp-contact-v2__right mp-reveal-right">
                <div class="mp-quote-form-card">
                    <h2 class="mp-quote-form-card__title">Solicitud de Cotización</h2>
                    <?php if (!empty($args['form_intro'])) : ?>
                        <p class="mp-quote-form-card__intro" style="font-family: var(--mp-font-body); font-size: 15px; color: var(--mp-gray); margin-bottom: 20px; line-height: 1.6; border-left: 3px solid var(--mp-primary); padding-left: 12px; margin-top: 10px;">
                            <?php echo esc_html($args['form_intro']); ?>
                        </p>
                    <?php else : ?>
                        <p class="mp-quote-form-card__intro" style="font-family: var(--mp-font-body); font-size: 15px; color: var(--mp-gray); margin-bottom: 20px; line-height: 1.6; border-left: 3px solid var(--mp-primary); padding-left: 12px; margin-top: 10px;">
                            Optimice su cadena de suministro con soluciones de empaque y bobinas de aluminio a la medida. Solicite calibres y anchos industriales con atención directa.
                        </p>
                    <?php endif; ?>

                    <!-- Beneficios B2B clave para conversión -->
                    <div class="mp-form-b2b-benefits" style="margin: 15px 0 25px 0; padding: 16px; background-color: var(--mp-light-gray); border-left: 4px solid var(--mp-primary); border-radius: 4px;">
                        <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 10px;">
                            <li style="display: flex; align-items: flex-start; gap: 10px; font-family: var(--mp-font-body); font-size: 14px; color: var(--mp-dark-gray); line-height: 1.4;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--mp-primary)" stroke-width="3" style="margin-top: 2px; flex-shrink: 0;">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                <span><strong>Respuesta rápida:</strong> Propuesta comercial y técnica formal en menos de 24 horas hábiles.</span>
                            </li>
                            <li style="display: flex; align-items: flex-start; gap: 10px; font-family: var(--mp-font-body); font-size: 14px; color: var(--mp-dark-gray); line-height: 1.4;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--mp-primary)" stroke-width="3" style="margin-top: 2px; flex-shrink: 0;">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                <span><strong>Capacidad Industrial B2B:</strong> Suministro continuo para altos volúmenes y contratos comerciales.</span>
                            </li>
                            <li style="display: flex; align-items: flex-start; gap: 10px; font-family: var(--mp-font-body); font-size: 14px; color: var(--mp-dark-gray); line-height: 1.4;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--mp-primary)" stroke-width="3" style="margin-top: 2px; flex-shrink: 0;">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                <span><strong>Certificación e Inocuidad:</strong> Aluminio 100% aprobado por la FDA para contacto directo con alimentos.</span>
                            </li>
                        </ul>
                    </div>
                    <?php 
                    if (shortcode_exists('contact-form-7')) {
                        $cf7_id = get_theme_mod('contact_cf7_id', '4cb8e5f');
                        echo do_shortcode('[contact-form-7 id="' . esc_attr($cf7_id) . '" title="Formulario de contacto"]');
                    } else {
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
                                <textarea id="mensaje" name="mensaje" class="mp-form-textarea" rows="4"><?php echo esc_textarea($form_textarea_value); ?></textarea>
                            </div>
                            <div class="mp-form-group mp-form-group--full">
                                <button type="submit" class="mp-btn mp-btn--primary mp-btn--submit">
                                    <span>Solicitar cotización</span>
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M5 12h14M12 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
