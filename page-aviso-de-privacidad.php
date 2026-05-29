<?php
/**
 * Template Name: Aviso de Privacidad
 * 
 * Plantilla de página específica para el Aviso de Privacidad de MetaPack.
 */

// Usar el header compartido
get_template_part('template-parts/header', 'metapack');
?>

<style>
/* Estilos premium específicos para el Aviso de Privacidad con alta especificidad */
body .mp-privacy {
    padding: 100px 0 !important;
    background-color: var(--mp-light-gray) !important;
    font-family: var(--mp-font-body) !important;
}

body .mp-privacy-container {
    max-width: 960px !important;
    margin: 0 auto !important;
}

/* Main Content Card - Padding generoso para máxima legibilidad */
body .mp-privacy-content {
    background: var(--mp-white) !important;
    padding: 80px 70px !important; 
    border-radius: 12px !important;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04) !important;
    box-sizing: border-box !important;
}

body .mp-privacy-section {
    margin-bottom: 60px !important;
}

body .mp-privacy-section:last-child {
    margin-bottom: 0 !important;
}

body .mp-privacy-section__title {
    font-family: var(--mp-font-title) !important;
    font-size: 22px !important;
    font-weight: 700 !important;
    color: var(--mp-dark) !important;
    margin: 0 0 24px 0 !important;
    padding-bottom: 12px !important;
    border-bottom: 2px solid var(--mp-light-gray) !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
    display: flex !important;
    align-items: flex-start !important;
    gap: 8px !important;
}

body .mp-privacy-section__title span {
    color: var(--mp-primary) !important;
    font-weight: 800 !important;
    white-space: nowrap !important;
}

body .mp-privacy-section__text {
    font-family: var(--mp-font-body) !important;
    font-size: 15px !important;
    line-height: 1.8 !important;
    color: var(--mp-dark-gray) !important;
    margin-bottom: 20px !important;
    text-align: justify !important;
}

body .mp-privacy-section__list {
    margin: 20px 0 25px 20px !important;
    list-style-type: disc !important;
}

body .mp-privacy-section__list-item {
    font-family: var(--mp-font-body) !important;
    font-size: 15px !important;
    line-height: 1.8 !important;
    color: var(--mp-dark-gray) !important;
    margin-bottom: 10px !important;
}

/* Address & Contact Info Cards */
body .mp-privacy-address-grid {
    display: grid !important;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)) !important;
    gap: 24px !important;
    margin: 25px 0 !important;
}

body .mp-privacy-address-card {
    background: var(--mp-light-gray) !important;
    padding: 24px !important;
    border-radius: 8px !important;
    border-left: 4px solid var(--mp-primary) !important;
}

body .mp-privacy-address-card__title {
    font-family: var(--mp-font-title) !important;
    font-size: 15px !important;
    font-weight: 700 !important;
    color: var(--mp-dark) !important;
    margin-bottom: 10px !important;
    text-transform: uppercase !important;
}

body .mp-privacy-address-card__text {
    font-family: var(--mp-font-body) !important;
    font-size: 14px !important;
    line-height: 1.6 !important;
    color: var(--mp-dark-gray) !important;
    margin: 0 !important;
}

body .mp-privacy-contacts {
    background: linear-gradient(135deg, rgba(122, 32, 86, 0.05) 0%, rgba(90, 23, 64, 0.05) 100%) !important;
    padding: 25px !important;
    border-radius: 8px !important;
    border: 1px dashed rgba(122, 32, 86, 0.2) !important;
    margin-top: 25px !important;
}

body .mp-privacy-contacts__title {
    font-family: var(--mp-font-title) !important;
    font-size: 16px !important;
    font-weight: 700 !important;
    color: var(--mp-primary) !important;
    margin-bottom: 15px !important;
}

body .mp-privacy-contacts__grid {
    display: grid !important;
    grid-template-columns: 1fr 1fr !important;
    gap: 20px !important;
}

body .mp-privacy-contacts__item {
    display: flex !important;
    flex-direction: column !important;
    gap: 4px !important;
}

body .mp-privacy-contacts__label {
    font-size: 12px !important;
    font-weight: 600 !important;
    color: var(--mp-gray) !important;
    text-transform: uppercase !important;
}

body .mp-privacy-contacts__value {
    font-size: 14.5px !important;
    font-weight: 600 !important;
    color: var(--mp-dark) !important;
    text-decoration: none !important;
}

/* Category Grid for Data Collected */
body .mp-privacy-categories {
    display: grid !important;
    grid-template-columns: 1fr !important;
    gap: 20px !important;
    margin: 25px 0 !important;
}

body .mp-privacy-category-card {
    background: var(--mp-light-gray) !important;
    padding: 24px !important;
    border-radius: 8px !important;
    border-top: 3px solid var(--mp-border) !important;
    transition: all 0.3s ease !important;
}

body .mp-privacy-category-card:hover {
    border-top-color: var(--mp-primary) !important;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05) !important;
}

body .mp-privacy-category-card__header {
    display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
    margin-bottom: 12px !important;
}

body .mp-privacy-category-card__title {
    font-family: var(--mp-font-title) !important;
    font-size: 16px !important;
    font-weight: 700 !important;
    color: var(--mp-dark) !important;
    margin: 0 !important;
}

body .mp-privacy-category-card__badge {
    background: var(--mp-primary) !important;
    color: var(--mp-white) !important;
    font-size: 11px !important;
    font-weight: 600 !important;
    padding: 4px 8px !important;
    border-radius: 4px !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
}

body .mp-privacy-category-card__list {
    margin: 10px 0 0 15px !important;
    list-style-type: circle !important;
}

body .mp-privacy-category-card__item {
    font-size: 14px !important;
    line-height: 1.6 !important;
    color: var(--mp-dark-gray) !important;
    margin-bottom: 6px !important;
}

/* Date Tag */
body .mp-privacy-date {
    display: inline-block !important;
    background: var(--mp-light-gray) !important;
    color: var(--mp-gray) !important;
    padding: 6px 14px !important;
    border-radius: 4px !important;
    font-size: 13px !important;
    font-weight: 600 !important;
    margin-top: 40px !important;
}

/* Responsive Styles */
@media (max-width: 768px) {
    body .mp-privacy {
        padding: 60px 0 !important;
    }
    
    body .mp-privacy-content {
        padding: 45px 30px !important;
    }
    
    body .mp-privacy-contacts__grid {
        grid-template-columns: 1fr !important;
        gap: 15px !important;
    }
}
</style>

<!-- ============================================ -->
<!-- HERO DE AVISO DE PRIVACIDAD                  -->
<!-- ============================================ -->
<section class="mp-quienes-hero-v2">
    <div class="mp-container">
        <div class="mp-quienes-hero-v2__box mp-reveal-scale">
            <div class="mp-quienes-hero-v2__content">
                <span class="mp-section-tag" style="color: var(--mp-white); border-color: rgba(255,255,255,0.4); opacity: 0.9; margin-bottom: 8px; display: inline-block; letter-spacing: 2px;">LEGAL</span>
                <h1 class="mp-quienes-hero-v2__title">Aviso de Privacidad</h1>
                <div class="mp-quienes-hero-v2__subtitle-wrap">
                    <p class="mp-quienes-hero-v2__subtitle">
                        Formulaciones Plásticas de Aluminio de Occidente, S.A. de C.V. (MetaPack)
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- CONTENIDO DEL AVISO                          -->
<!-- ============================================ -->
<section class="mp-privacy">
    <div class="mp-container mp-privacy-container">
        
        <!-- Documento en columna única centrada -->
        <article class="mp-privacy-content mp-reveal-up">
            
            <!-- Sección I -->
            <section id="seccion-1" class="mp-privacy-section">
                <h2 class="mp-privacy-section__title">
                    <span>I.</span> Identidad y Domicilio del Responsable
                </h2>
                <p class="mp-privacy-section__text">
                    <strong>Formulaciones Plásticas de Aluminio de Occidente, S.A. de C.V.</strong>, también conocida comercialmente como <strong>MetaPack</strong>, es responsable del tratamiento de sus datos personales en términos de la Ley Federal de Protección de Datos Personales en Posesión de los Particulares (en adelante, "la Ley") y su Reglamento.
                </p>
                <p class="mp-privacy-section__text">
                    Para efectos del presente aviso, señalamos las siguientes direcciones físicas y canales de comunicación:
                </p>
                
                <div class="mp-privacy-address-grid">
                    <div class="mp-privacy-address-card">
                        <h4 class="mp-privacy-address-card__title">Oficinas Corporativas</h4>
                        <p class="mp-privacy-address-card__text">
                            Francisco Sarabia 1399, Col. Talpita,<br>
                            C.P. 44710, Guadalajara, Jalisco, México.
                        </p>
                    </div>
                    <div class="mp-privacy-address-card">
                        <h4 class="mp-privacy-address-card__title">CEDIS</h4>
                        <p class="mp-privacy-address-card__text">
                            Camino a Colimilla No. 90, Col. La Noria,<br>
                            C.P. 45413, Tonalá, Jalisco, México.
                        </p>
                    </div>
                </div>
                
                <div class="mp-privacy-contacts">
                    <h4 class="mp-privacy-contacts__title">Contacto Directo Legal</h4>
                    <div class="mp-privacy-contacts__grid">
                        <div class="mp-privacy-contacts__item">
                            <span class="mp-privacy-contacts__label">Correos Electrónicos</span>
                            <a href="mailto:info@metapack.com.mx" class="mp-privacy-contacts__value">info@metapack.com.mx</a>
                            <a href="mailto:ventas@metapack.com.mx" class="mp-privacy-contacts__value">ventas@metapack.com.mx</a>
                        </div>
                        <div class="mp-privacy-contacts__item">
                            <span class="mp-privacy-contacts__label">Teléfonos de Atención</span>
                            <a href="tel:3336490281" class="mp-privacy-contacts__value">(33) 3649-0281 (Oficina)</a>
                            <a href="tel:3313011647" class="mp-privacy-contacts__value">(33) 1301-1647 (Atención)</a>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Sección II -->
            <section id="seccion-2" class="mp-privacy-section">
                <h2 class="mp-privacy-section__title">
                    <span>II.</span> Datos Personales que se Recaban
                </h2>
                <p class="mp-privacy-section__text">
                    MetaPack podrá recabar las siguientes categorías de datos personales en función de su navegación, registro de solicitudes en formularios o contacto directo comercial:
                </p>
                
                <div class="mp-privacy-categories">
                    <div class="mp-privacy-category-card">
                        <div class="mp-privacy-category-card__header">
                            <h4 class="mp-privacy-category-card__title">Datos de Identificación y Contacto</h4>
                            <span class="mp-privacy-category-card__badge">Contacto</span>
                        </div>
                        <ul class="mp-privacy-category-card__list">
                            <li class="mp-privacy-category-card__item">Nombre completo del solicitante.</li>
                            <li class="mp-privacy-category-card__item">Nombre de la empresa, negocio o razón social.</li>
                            <li class="mp-privacy-category-card__item">Dirección de correo electrónico.</li>
                            <li class="mp-privacy-category-card__item">Número de teléfono celular / WhatsApp de contacto comercial.</li>
                            <li class="mp-privacy-category-card__item">Ciudad, municipio y estado de residencia o para el envío de producto.</li>
                        </ul>
                    </div>
                    
                    <div class="mp-privacy-category-card">
                        <div class="mp-privacy-category-card__header">
                            <h4 class="mp-privacy-category-card__title">Datos de Tipo Comercial y Operativo</h4>
                            <span class="mp-privacy-category-card__badge">Comercial</span>
                        </div>
                        <ul class="mp-privacy-category-card__list">
                            <li class="mp-privacy-category-card__item">Información específica de requerimiento de producto (calibre, presentación, cantidad, uso final).</li>
                            <li class="mp-privacy-category-card__item">Dirección exacta y destino final de entrega de la mercancía.</li>
                            <li class="mp-privacy-category-card__item">Especificaciones técnicas de empaque requeridas y notas del proyecto.</li>
                            <li class="mp-privacy-category-card__item">Archivos adjuntos cargados voluntariamente por el usuario (logotipos corporativos, referencias visuales en formatos JPG, PNG o PDF).</li>
                        </ul>
                    </div>
                    
                    <div class="mp-privacy-category-card">
                        <div class="mp-privacy-category-card__header">
                            <h4 class="mp-privacy-category-card__title">Datos de Navegación Tecnológica</h4>
                            <span class="mp-privacy-category-card__badge">Navegación</span>
                        </div>
                        <ul class="mp-privacy-category-card__list">
                            <li class="mp-privacy-category-card__item">Dirección IP de conexión de red del usuario.</li>
                            <li class="mp-privacy-category-card__item">Tipo de navegador y sistema operativo utilizados para el acceso.</li>
                            <li class="mp-privacy-category-card__item">Historial de páginas y secciones visitadas dentro del sitio web.</li>
                            <li class="mp-privacy-category-card__item">Tiempos de permanencia en el sitio y cookies del navegador.</li>
                        </ul>
                    </div>
                </div>
                
                <p class="mp-privacy-section__text">
                    <strong>Nota importante:</strong> MetaPack declara explícitamente que <strong>no recaba datos personales sensibles</strong> (definidos por ley como aquellos que revelan origen racial o étnico, estado de salud presente o futuro, información genética, creencias religiosas, filosóficas y morales, afiliación sindical, opiniones políticas o preferencia sexual).
                </p>
            </section>
            
            <!-- Sección III -->
            <section id="seccion-3" class="mp-privacy-section">
                <h2 class="mp-privacy-section__title">
                    <span>III.</span> Finalidades del Tratamiento de los Datos
                </h2>
                <p class="mp-privacy-section__text">
                    Los datos personales recabados se utilizarán bajo los principios de licitud y consentimiento para las siguientes finalidades esenciales e indispensables de nuestra relación mercantil:
                </p>
                <ul class="mp-privacy-section__list">
                    <li class="mp-privacy-section__list-item">Atender, procesar y dar seguimiento puntual a solicitudes formales de cotización de productos y servicios de empaque y maquila de aluminio.</li>
                    <li class="mp-privacy-section__list-item">Contactar al titular mediante canales electrónicos o telefónicos para ofrecer asesoría comercial y técnica personalizada.</li>
                    <li class="mp-privacy-section__list-item">Gestionar de manera interna la formalización de pedidos, contratos comerciales y la logística e instrumentación de envíos y fletes a nivel nacional.</li>
                    <li class="mp-privacy-section__list-item">Emitir y administrar la facturación fiscal correspondiente y dar cabal cumplimiento a las normativas de contabilidad e impuestos vigentes.</li>
                    <li class="mp-privacy-section__list-item">Proporcionar servicio postventa y dar trámite a sugerencias, quejas, devoluciones o reclamaciones de producto.</li>
                </ul>
                
                <p class="mp-privacy-section__text">
                    Adicionalmente, podremos utilizar su información para las siguientes <strong>finalidades secundarias</strong>, las cuales no son indispensables para la relación comercial primaria pero nos permiten ofrecerle una mejor experiencia:
                </p>
                <ul class="mp-privacy-section__list">
                    <li class="mp-privacy-section__list-item">Envío periódico de correos promocionales, catálogos digitales actualizados de producto, noticias del sector e información comercial relevante.</li>
                    <li class="mp-privacy-section__list-item">Realización de encuestas internas de satisfacción sobre la calidad de nuestros productos de aluminio y el servicio de atención comercial.</li>
                    <li class="mp-privacy-section__list-item">Análisis métrico y estadístico del comportamiento de los usuarios en nuestro sitio web para la mejora continua del portal.</li>
                </ul>
                <p class="mp-privacy-section__text">
                    Si usted desea manifestar su oposición al uso de sus datos personales para las finalidades secundarias, puede hacerlo en cualquier momento enviando un correo a <a href="mailto:info@metapack.com.mx">info@metapack.com.mx</a> expresando su negativa.
                </p>
            </section>
            
            <!-- Section IV -->
            <section id="seccion-4" class="mp-privacy-section">
                <h2 class="mp-privacy-section__title">
                    <span>IV.</span> Transferencia de Datos Personales
                </h2>
                <p class="mp-privacy-section__text">
                    MetaPack podrá transferir sus datos personales a terceros nacionales o extranjeros en los supuestos previstos por la Ley que no requieren el consentimiento del titular:
                </p>
                <ul class="mp-privacy-section__list">
                    <li class="mp-privacy-section__list-item"><strong>Autoridades Competentes:</strong> Organismos gubernamentales y de recaudación fiscal (SAT), de seguridad social (IMSS) o autoridades judiciales en cumplimiento de mandatos jurídicos expresos.</li>
                    <li class="mp-privacy-section__list-item"><strong>Empresas de Logística y Transportación:</strong> Compañías transportistas o de paquetería externas con el único fin de llevar a cabo la entrega de la mercancía y muestras a su domicilio.</li>
                    <li class="mp-privacy-section__list-item"><strong>Proveedores de Tecnología:</strong> Terceros encargados del soporte técnico del sitio web, servidores de base de datos (hosting), herramientas de correo electrónico y software CRM corporativo bajo contratos de estricta confidencialidad.</li>
                </ul>
                <p class="mp-privacy-section__text">
                    En ningún caso MetaPack venderá, rentará, cederá o transferirá sus datos personales a terceros comerciales con fines publicitarios ajenos sin obtener su consentimiento previo y expreso.
                </p>
            </section>
            
            <!-- Sección V -->
            <section id="seccion-5" class="mp-privacy-section">
                <h2 class="mp-privacy-section__title">
                    <span>V.</span> Uso de Cookies y Tecnologías de Rastreo
                </h2>
                <p class="mp-privacy-section__text">
                    El portal web <strong>www.metapack.com.mx</strong> hace uso de tecnologías electrónicas conocidas como cookies, web beacons u otros rastreadores para identificar la sesión de usuario, agilizar el rendimiento de carga del sitio, recordar preferencias de selección y realizar el análisis agregado del tráfico mediante herramientas como Google Analytics.
                </p>
                <p class="mp-privacy-section__text">
                    Usted cuenta con la plena facultad de deshabilitar, restringir o eliminar el uso de cookies directamente desde la configuración de su navegador de internet. Le sugerimos revisar la sección de "Ayuda" o "Configuración de Privacidad" de su navegador para este propósito. Es importante advertir que el bloqueo de cookies puede limitar ciertas funciones dinámicas o la correcta visualización de partes de nuestro sitio.
                </p>
            </section>
            
            <!-- Sección VI -->
            <section id="seccion-6" class="mp-privacy-section">
                <h2 class="mp-privacy-section__title">
                    <span>VI.</span> Ejercicio de Derechos ARCO
                </h2>
                <p class="mp-privacy-section__text">
                    De conformidad con lo establecido en la Ley, usted tiene en todo momento el derecho de <strong>Acceder</strong> a los datos que poseemos, <strong>Rectificar</strong> en caso de ser inexactos, solicitar su <strong>Cancelación</strong> si considera que no se requieren para las finalidades señaladas o manifestar su <strong>Oposición</strong> al tratamiento de los mismos para fines específicos.
                </p>
                <p class="mp-privacy-section__text">
                    Para ejercer cualquiera de sus Derechos ARCO, deberá ingresar una solicitud formal a través de las siguientes alternativas habilitadas:
                </p>
                <ul class="mp-privacy-section__list">
                    <li class="mp-privacy-section__list-item"><strong>Correo Electrónico:</strong> Enviando un mensaje formal a <a href="mailto:info@metapack.com.mx">info@metapack.com.mx</a>.</li>
                    <li class="mp-privacy-section__list-item"><strong>Vía Escrita / Correo Postal:</strong> Dirigido a nuestras oficinas corporativas ubicadas en: <em>Francisco Sarabia 1399, Col. Talpita, C.P. 44710, Guadalajara, Jalisco, México</em>.</li>
                </ul>
                <p class="mp-privacy-section__text">
                    La solicitud deberá contener con precisión los siguientes elementos informativos:
                </p>
                <ol class="mp-privacy-section__list" style="list-style-type: decimal;">
                    <li class="mp-privacy-section__list-item">Nombre completo del titular de los datos.</li>
                    <li class="mp-privacy-section__list-item">Descripción detallada de los datos personales respecto de los cuales busca ejercer alguno de los derechos ARCO.</li>
                    <li class="mp-privacy-section__list-item">Indicación clara del derecho que desea ejercer (Acceso, Rectificación, Cancelación u Oposición).</li>
                    <li class="mp-privacy-section__list-item">Identificación oficial vigente que acredite su personalidad (INE, Pasaporte, Cédula Profesional) digitalizada en el caso de correos electrónicos. Si actúa mediante representante legal, documento probatorio del mandato.</li>
                    <li class="mp-privacy-section__list-item">Información de contacto (correo y/o teléfono) para notificaciones oficiales.</li>
                </ol>
                <p class="mp-privacy-section__text">
                    MetaPack responderá al titular en un lapso no mayor a <strong>20 (veinte) días hábiles</strong> posteriores a la fecha de la recepción formal de su solicitud. Si la solicitud resulta procedente, se ejecutará dentro de los <strong>15 (quince) días hábiles</strong> siguientes a la fecha en que se notifique dicha resolución.
                </p>
            </section>
            
            <!-- Sección VII -->
            <section id="seccion-7" class="mp-privacy-section">
                <h2 class="mp-privacy-section__title">
                    <span>VII.</span> Revocación del Consentimiento
                </h2>
                <p class="mp-privacy-section__text">
                    Usted puede revocar el consentimiento previamente otorgado para el uso de sus datos en cualquier momento. Deberá considerar que la revocación podría impedir que continuemos brindándole los servicios comerciales o de cotización correspondientes. Para tramitar su revocación, deberá canalizar su petición por escrito o correo electrónico mediante el procedimiento indicado en el apartado anterior.
                </p>
            </section>
            
            <!-- Sección VIII -->
            <section id="seccion-8" class="mp-privacy-section">
                <h2 class="mp-privacy-section__title">
                    <span>VIII.</span> Medidas de Seguridad Aplicadas
                </h2>
                <p class="mp-privacy-section__text">
                    MetaPack ha implementado y mantiene estrictas medidas de seguridad administrativas, técnicas y organizativas para resguardar la confidencialidad, integridad y disponibilidad de sus datos personales contra pérdidas accidentales, destrucción no autorizada, robo de información, alteraciones o accesos ilícitos. El portal cuenta con certificados de seguridad SSL para encriptar la información de los formularios web y salvaguardar su transmisión en red.
                </p>
            </section>
            
            <!-- Sección IX -->
            <section id="seccion-9" class="mp-privacy-section">
                <h2 class="mp-privacy-section__title">
                    <span>IX.</span> Modificaciones al Aviso de Privacidad
                </h2>
                <p class="mp-privacy-section__text">
                    El presente Aviso de Privacidad puede experimentar modificaciones, actualizaciones o adecuaciones derivadas de reformas normativas, políticas corporativas o cambios en el modelo de atención de MetaPack. Toda actualización estará disponible para consulta permanente de los usuarios en la sección legal de nuestro sitio web: <a href="https://www.metapack.com.mx/aviso-de-privacidad" target="_blank" rel="noopener">www.metapack.com.mx/aviso-de-privacidad</a>.
                </p>
            </section>
            
            <!-- Sección X -->
            <section id="seccion-10" class="mp-privacy-section">
                <h2 class="mp-privacy-section__title">
                    <span>X.</span> Autoridad Competente en la Materia
                </h2>
                <p class="mp-privacy-section__text">
                    Si considera que su derecho a la protección de datos personales ha sido lesionado o vulnerado por alguna omisión o acción por parte de MetaPack, le informamos que puede acudir ante el Instituto Nacional de Transparencia, Acceso a la Información y Protección de Datos Personales (INAI) para interponer la queja correspondiente. Para mayor información, puede consultar el portal oficial del instituto: <a href="https://www.inai.org.mx" target="_blank" rel="nofollow noopener">www.inai.org.mx</a>.
                </p>
                
                <div style="text-align: right;">
                    <span class="mp-privacy-date">Última actualización: Mayo de 2026</span>
                </div>
            </section>
            
        </article>
        
    </div>
</section>

<?php
// Usar el footer compartido
get_template_part('template-parts/footer', 'metapack');
?>
