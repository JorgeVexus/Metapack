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

<!-- ============================================ -->
<!-- SECCIÓN PRINCIPAL: BENEFICIOS Y FORMULARIO   -->
<!-- ============================================ -->
<section class="mp-cotizar-seccion" style="padding: 80px 0; background: var(--mp-white);">
    <div class="mp-container">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 50px; align-items: start;">
            
            <!-- Columna Izquierda: Beneficios -->
            <div class="mp-reveal-left">
                <span class="mp-section-tag">¿POR QUÉ CONTRATARNOS?</span>
                <h2 class="mp-section-title" style="margin-bottom: 25px; font-size: 28px; line-height: 1.2;">Nuestros asesores están listos para atenderte</h2>
                <p style="font-family: var(--mp-font-body); color: var(--mp-dark-gray); line-height: 1.7; font-size: 16px; margin-bottom: 30px;">
                    Completa el formulario a la derecha y un especialista en empaques de aluminio se comunicará contigo para brindarte una solución a la medida de tus necesidades de producción.
                </p>
                
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="display: flex; align-items: start; margin-bottom: 20px;">
                        <span style="color: var(--mp-primary); font-size: 20px; line-height: 1; margin-right: 15px;">✓</span>
                        <div>
                            <strong style="font-family: var(--mp-font-title); font-size: 16px; color: var(--mp-dark); display: block; margin-bottom: 5px;">Asesoría técnica especializada</strong>
                            <span style="font-family: var(--mp-font-body); font-size: 14px; color: var(--mp-gray);">Te ayudamos a seleccionar los anchos, calibres y aleaciones ideales para tu maquinaria.</span>
                        </div>
                    </li>
                    <li style="display: flex; align-items: start; margin-bottom: 20px;">
                        <span style="color: var(--mp-primary); font-size: 20px; line-height: 1; margin-right: 15px;">✓</span>
                        <div>
                            <strong style="font-family: var(--mp-font-title); font-size: 16px; color: var(--mp-dark); display: block; margin-bottom: 5px;">Cumplimiento Grado Alimenticio</strong>
                            <span style="font-family: var(--mp-font-body); font-size: 14px; color: var(--mp-gray);">Materiales certificados por la FDA y normas nacionales para el contacto directo con alimentos.</span>
                        </div>
                    </li>
                    <li style="display: flex; align-items: start; margin-bottom: 20px;">
                        <span style="color: var(--mp-primary); font-size: 20px; line-height: 1; margin-right: 15px;">✓</span>
                        <div>
                            <strong style="font-family: var(--mp-font-title); font-size: 16px; color: var(--mp-dark); display: block; margin-bottom: 5px;">Tiempos de entrega garantizados</strong>
                            <span style="font-family: var(--mp-font-body); font-size: 14px; color: var(--mp-gray);">Logística eficiente con cobertura en todo el territorio mexicano para que tu operación no se detenga.</span>
                        </div>
                    </li>
                </ul>
            </div>
            
            <!-- Columna Derecha: Formulario -->
            <div class="mp-reveal-right" style="background: var(--mp-light-gray); padding: 40px; border-radius: 8px; border-top: 5px solid var(--mp-primary); box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
                <h3 style="font-family: var(--mp-font-title); font-size: 20px; font-weight: 700; color: var(--mp-dark); margin: 0 0 25px;">Formulario de Cotización</h3>
                
                <?php 
                // Renderizar el formulario mediante el shortcode oficial del tema
                if (shortcode_exists('metapack_contact_form')) {
                    echo do_shortcode('[metapack_contact_form]');
                } else {
                    echo '<p style="font-family: var(--mp-font-body); color: var(--mp-gray);">El formulario no está disponible en este momento.</p>';
                }
                ?>
            </div>
            
        </div>
    </div>
</section>

<?php
// Usar el footer compartido
get_template_part('template-parts/footer', 'metapack');
?>
