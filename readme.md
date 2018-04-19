# TinyImage

Función sencilla para agregar un tamaño nuevo de imagen en Wordpress `tiny-img`

Esta imagen será para cargarla como un "placeholder" cuando hagamos lazy loading de nuestras imágenes, es la misma idea que usa [medium](http://medium.com/)

Idea sacada de este [post](https://jmperezperez.com/medium-image-progressive-loading-placeholder/) por José Pérez

Le corremos varios filtros para aplicarle un difuminado para que se vea bien en todos los navegadores una vez que la agrandemos, la idea es usar este código en conjunto con algún plugin de lazy loading, como [lazysizes](http://afarkas.github.io/lazysizes/)


## Uso

La idea es colocar este código en tu `functions.php` y cada vez que se sube una imagen se generará una imagen de `25px` de ancho y el alto proporcional de la misma.
