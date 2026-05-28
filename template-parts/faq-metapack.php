<?php
/**
 * Template part for the FAQ section
 */
?>
<section class="mp-faq" id="mp-faq">
    <div class="mp-container">
        <div class="mp-faq__header mp-reveal-up">
            <span class="mp-section-tag">SOPORTE</span>
            <h2 class="mp-section-title">Preguntas frecuentes</h2>
            <p class="mp-section-subtitle">Resolvemos las dudas más comunes para ayudarte a cotizar mejor y elegir la opción adecuada.</p>
        </div>

        <div class="mp-faq__list mp-reveal-up">
            <!-- FAQ 1 -->
            <div class="mp-faq-item">
                <button class="mp-faq-item__question">
                    <span>¿Cuáles son los tiempos de entrega para pedidos de mayoreo?</span>
                    <svg class="mp-faq-item__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M7 13l5 5 5-5M12 6v12" />
                    </svg>
                </button>
                <div class="mp-faq-item__answer">
                    <p>Para productos de línea (stock), el despacho es de 24 a 48 horas hábiles. Para pedidos personalizados o maquila, los tiempos varían entre 10 y 15 días hábiles dependiendo del volumen y especificaciones técnica requeridas.</p>
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="mp-faq-item">
                <button class="mp-faq-item__question">
                    <span>¿Puedo solicitar medidas personalizadas?</span>
                    <svg class="mp-faq-item__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M7 13l5 5 5-5M12 6v12" />
                    </svg>
                </button>
                <div class="mp-faq-item__answer">
                    <p>Sí, adaptamos el ancho, largo y calibre de nuestros productos según los requerimientos técnicos de su operación. Contamos con maquinaria versátil para ajustarnos a sus necesidades específicas.</p>
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="mp-faq-item">
                <button class="mp-faq-item__question">
                    <span>¿Realizan grabado (embossing) personalizado con mi logo?</span>
                    <svg class="mp-faq-item__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M7 13l5 5 5-5M12 6v12" />
                    </svg>
                </button>
                <div class="mp-faq-item__answer">
                    <p>Sí, contamos con tecnología para realizar grabado estructural (embossing) en el aluminio. Esto permite que su marca o logo destaque físicamente en el material, aportando identidad y seguridad a sus empaques.</p>
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="mp-faq-item">
                <button class="mp-faq-item__question">
                    <span>¿Cuál es el pedido mínimo para personalización de cajas?</span>
                    <svg class="mp-faq-item__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M7 13l5 5 5-5M12 6v12" />
                    </svg>
                </button>
                <div class="mp-faq-item__answer">
                    <p>El pedido mínimo para cajas personalizadas varía según las dimensiones y el tipo de impresión, generalmente partiendo desde las 1,000 unidades para proyectos nuevos.</p>
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="mp-faq-item">
                <button class="mp-faq-item__question">
                    <span>¿Sus productos cumplen con grado alimenticio?</span>
                    <svg class="mp-faq-item__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M7 13l5 5 5-5M12 6v12" />
                    </svg>
                </button>
                <div class="mp-faq-item__answer">
                    <p>Absolutamente. Todos nuestros aluminios y películas plásticas cuentan con certificación para contacto directo con alimentos según FDA y normas mexicanas vigentes.</p>
                </div>
            </div>

            <!-- FAQ 6 -->
            <div class="mp-faq-item">
                <button class="mp-faq-item__question">
                    <span>¿Cómo puedo cotizar?</span>
                    <svg class="mp-faq-item__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M7 13l5 5 5-5M12 6v12" />
                    </svg>
                </button>
                <div class="mp-faq-item__answer">
                    <p>A través del formulario de contacto en nuestro sitio web, por teléfono o correo electrónico. Un asesor técnico le atenderá para brindarle la mejor solución.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$faqs_json = array(
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => array(
        array(
            '@type' => 'Question',
            'name' => '¿Cuáles son los tiempos de entrega para pedidos de mayoreo?',
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text' => 'Para productos de línea (stock), el despacho es de 24 a 48 horas hábiles. Para pedidos personalizados o maquila, los tiempos varían entre 10 y 15 días hábiles dependiendo del volumen y especificaciones técnica requeridas.'
            )
        ),
        array(
            '@type' => 'Question',
            'name' => '¿Puedo solicitar medidas personalizadas?',
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text' => 'Sí, adaptamos el ancho, largo y calibre de nuestros productos según los requerimientos técnicos de su operación. Contamos con maquinaria versátil para ajustarnos a sus necesidades específicas.'
            )
        ),
        array(
            '@type' => 'Question',
            'name' => '¿Realizan grabado (embossing) personalizado con mi logo?',
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text' => 'Sí, contamos con tecnología para realizar grabado estructural (embossing) en el aluminio. Esto permite que su marca o logo destaque físicamente en el material, aportando identidad y seguridad a sus empaques.'
            )
        ),
        array(
            '@type' => 'Question',
            'name' => '¿Cuál es el pedido mínimo para personalización de cajas?',
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text' => 'El pedido mínimo para cajas personalizadas varía según las dimensiones y el tipo de impresión, generalmente partiendo desde las 1,000 unidades para proyectos nuevos.'
            )
        ),
        array(
            '@type' => 'Question',
            'name' => '¿Sus productos cumplen con grado alimenticio?',
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text' => 'Absolutamente. Todos nuestros aluminios y películas plásticas cuentan con certificación para contacto directo con alimentos según FDA y normas mexicanas vigentes.'
            )
        ),
        array(
            '@type' => 'Question',
            'name' => '¿Cómo puedo cotizar?',
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text' => 'A través del formulario de contacto en nuestro sitio web, por teléfono o correo electrónico. Un asesor técnico le atenderá para brindarle la mejor solución.'
            )
        )
    )
);
echo '<script type="application/ld+json">' . json_encode($faqs_json, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
?>
