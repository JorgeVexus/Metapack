<?php
/**
 * Template Name: Cotizar
 * 
 * Plantilla de página para solicitud de cotizaciones directas.
 */

// Usar el header compartido
get_template_part('template-parts/header', 'metapack');
?>

<!-- ============================================ -->
<!-- HERO DE COTIZACIÓN                           -->
<!-- ============================================ -->
<section class="mp-quienes-hero-v2" style="min-height: 280px; display: flex; align-items: center; justify-content: center; text-align: center;">
    <div class="mp-container">
        <div class="mp-quienes-hero-v2__content" style="margin: 0 auto; max-width: 800px;">
            <span class="mp-section-tag" style="color: var(--mp-white); opacity: 0.8; margin-bottom: 8px; display: inline-block; letter-spacing: 2px;">SOLICITUD DE COTIZACIÓN</span>
            <h1 class="mp-quienes-hero-v2__title" style="font-size: 3.5rem; text-shadow: 0 2px 10px rgba(0,0,0,0.3);"><?php the_title(); ?></h1>
        </div>
    </div>
</section>

<?php 
get_template_part('template-parts/contact', 'metapack', array(
    'message' => 'Consiga un suministro confiable, estable y alineado con los estándares más estrictos de su industria. Nuestro departamento técnico y de ventas resolverá sus necesidades de volumen con la máxima prioridad.',
    'form_message' => 'Me interesa solicitar una cotización técnica B2B.',
    'form_intro' => 'Acelere su cadena de suministro. Proporcione sus especificaciones (calibres, espesores, anchos y aplicaciones) para recibir una propuesta formal y detallada en tiempo récord.'
)); 
?>

<?php
// Usar el footer compartido
get_template_part('template-parts/footer', 'metapack');
?>
