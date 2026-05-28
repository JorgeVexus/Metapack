# Metapack WordPress Theme - Guía de Instalación

## 📁 Estructura de Archivos

```
wp-theme/
├── page-home.php          # Plantilla de la página de inicio
├── functions.php          # Funciones del tema (hooks, assets, shortcodes)
├── style.css              # Archivo requerido por WordPress (metadatos del tema)
└── assets/
    ├── css/
    │   └── metapack-styles.css    # Estilos principales
    ├── js/
    │   └── metapack-script.js     # JavaScript principal
    └── images/
        └── logo.png               # Logo de respaldo
```

## 🚀 Instalación

### Opción A: Tema Hijo (Recomendado)

Si ya tienes un tema instalado (ej: Starter WordPress Theme), crea un tema hijo:

1. **Crea una carpeta** en `wp-content/themes/` llamada `starter-child` (o el nombre de tu tema + "-child")

2. **Copia estos archivos** dentro de esa carpeta:
   - `page-home.php`
   - `functions.php` (o añade el contenido al functions.php existente)
   - Carpeta `assets/` con CSS, JS e imágenes

3. **Crea un archivo `style.css`** en la carpeta del tema hijo:

```css
/*
Theme Name: Starter Child - Metapack
Template: starter-theme  /* Nombre de la carpeta del tema padre */
Version: 1.0.0
Description: Tema hijo personalizado para Metapack
*/
```

4. **Activa el tema hijo** desde Apariencia > Temas

### Opción B: Tema Personalizado Completo

Si quieres un tema independiente:

1. **Crea una carpeta** en `wp-content/themes/` llamada `metapack`

2. **Copia todos los archivos** de `wp-theme/` dentro

3. **Crea un archivo `style.css`** con los metadatos:

```css
/*
Theme Name: Metapack Theme
Version: 1.0.0
Description: Tema personalizado para Metapack
Author: Tu Nombre
*/
```

4. **Crea un archivo `index.php`** básico (requerido por WordPress):

```php
<?php get_header(); ?>
<main>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </article>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
```

5. **Activa el tema** desde Apariencia > Temas

## 📝 Uso de la Plantilla

1. Ve a **Páginas > Añadir nueva**
2. Pon un título (ej: "Inicio")
3. En el panel derecho, busca **Atributos de página > Plantilla**
4. Selecciona **"Metapack Home"**
5. Publica la página
6. Ve a **Ajustes > Lectura** y selecciona esta página como "Página de inicio estática"

## ⚙️ Configuración

### Logo
- Ve a **Apariencia > Personalizar > Identidad del sitio**
- Sube tu logo

### Menús
- Ve a **Apariencia > Menús**
- Crea menús para:
  - Menú Principal
  - Menú Footer
  - Menú Productos

### Formulario de Contacto
1. Instala **Contact Form 7**
2. Crea un formulario
3. Copia el ID del formulario
4. En `functions.php`, reemplaza `"123"` por el ID real:
   ```php
   return do_shortcode('[contact-form-7 id="TU_ID_AQUI" title="Formulario de Contacto"]');
   ```

## 🎨 Personalización

### Colores
Edita las variables CSS en `metapack-styles.css`:
```css
:root {
    --mp-primary: #7A2056;
    --mp-secondary: #FFB347;
    --mp-dark: #1A1A1A;
    /* ... */
}
```

### Contenido
Edita directamente `page-home.php` para cambiar:
- Textos
- Imágenes
- Videos
- Enlaces de redes sociales

## ❓ Solución de Problemas

### El logo no aparece
- Asegúrate de haber subido un logo en Personalizar > Identidad del sitio
- O coloca un archivo `logo.png` en `assets/images/`

### Los estilos no cargan
- Verifica que la ruta `assets/css/metapack-styles.css` sea correcta
- Limpia la caché del navegador y de WordPress

### El formulario no funciona
- Instala Contact Form 7
- Actualiza el ID del formulario en `functions.php`

---

¿Tienes dudas? Contacta al desarrollador.
