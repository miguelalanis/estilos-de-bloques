# Plugin de Estilos de Bloques Gutenberg

## Resumen

Este repositorio es una introducción a una de las formas más simples de personalización en el editor: Estilos de bloque. Los estilos de bloque sólo añaden un nombre de clase extra a un bloque, por lo que son relativamente sencillos de crear y personalizar. 

Este sencillo plugin esta basado en el repositorio https://github.com/Automattic/gutenberg-block-styles con la diferencia que este plugin pone los estilos de bloques inline.

![Ejemplo de estilos de bloque](https://archive.org/download/block-styles-ejemplo/block-styles-ejemplo.png)

Lee más sobre los estilos de bloque en este post de ThemeShaper: 

[**📄 Personalización de los bloques de Gutenberg con estilos de bloque**](https://themeshaper.com/2019/02/15/customizing-gutenberg-blocks-with-block-styles/)

Este repositorio es un plugin de WordPress que incluye un único estilo de bloque personalizado. Es bastante sencillo, y está destinado a proporcionar un punto de partida para plugins más complicados. El código aquí es una introducción ligera a la personalización de bloques de Gutenberg, y no requiere que te metas con `npm`, temas, php, o (mucho) JavaScript. 

Todo lo que realmente necesitas para empezar es: 

- Editar unas pocas líneas en un solo archivo PHP. 
- Conocimientos de CSS.
- Un sitio de WordPress para subir este plugin.  

## Personalización

Añadir mas estilos de bloques es un proceso de tres pasos: 

**1. Abre el archivo `index.php` y ajusta el tipo de bloque, el nombre y la etiqueta para tu nuevo estilo de bloque.**

Por ejemplo, el ejemplo incorporado añade un estilo de bloque "Párrafo azul" al bloque principal Párrafo: 

```php
register_block_style(
	'core/paragraph',
		array(
			'name'  => 'blue-paragraph',
			'label' => __( 'Blue Paragraph', 'textdomain' ),
			'inline_style' => '
				.is-style-blue-paragraph {  
					background-color: #0087be;
					color: #FFF;
					padding: 16px;
				}
			',
		)		
);
```

Aquí tenemos otro ejemplo, añadiendo un estilo "Sombra" al bloque de imagen:

```php
register_block_style(
	'core/image', // Nombre del tipo de bloque "image" incluyendo "core/" antes
		array( // Propiedades del estilo
		'name'  => 'image-sombra',
		'label' => __( 'Sombra', 'textdomain' ),
		'inline_style' => // Estilos Inline
            '
			.is-style-image-sombra {
				box-shadow: 0 4px 10px rgba(0,0,0,0.2);
				}',
		)		
);
```

* El nombre del bloque en la segunda línea debe referirse al título oficial del bloque.
* La propiedad `name` debe ser letras minúsculas con guiones. Se utiliza para generar la clase de su estilo de bloque.
* La propiedad `label` debe ser legible y probablemente traducible.
* La propiedad `inline_style` tiene que contener los estilos CSS.

Si quiere añadir varios estilos de bloque en el mismo plugin, duplique esas líneas hasta `);` y sustituya las Propiedades.

**2. A partir de ahí, añade el CSS para dar estilo a tu nuevo estilo de bloque.**

Los nombres de clase de los estilos de bloque se crean automáticamente con el siguiente formato: 

`.is-style-[name]`

El campo `[name]` corresponde al campo `name:` del paso 1.  Así que los nombres de clase para los dos ejemplos anteriores serían: 

`.is-style-blue-paragraph`
`.is-style-image-sombra`.

Añada los estilos CSS entre `'inline_style' => '` y `',`. Todo lo que declare se añadirá automáticamente tanto en el front-end como en el editor.

**3. Prueba los cambios.**

Comprima el plugin con sus cambios y súbalo a su sitio, o si lo prefiere, pruebe los cambios en tiempo real utilizando el editor de plugins en WordPress. 🎉

## ¿Preguntas? 

Estaré encantado de ayudarte. Abre una incidencia, envía un mensaje a `@miguelalanispro` en twitter, o a `@miguelalanis` en Telegram
