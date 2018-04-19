<?php
add_filter('wp_generate_attachment_metadata', 'lazy_loading_images');
/**
 * Esta función sirve para crear una imagen pequeña que usaremos
 * para lazy loading, inspirado en la solución de medium.com
 * https://jmperezperez.com/medium-image-progressive-loading-placeholder/
 */
function lazy_loading_images($meta) {
	$path = wp_upload_dir(); // Directorio de imágenes
	$file = $path['path'].'/'.$meta['sizes']['tiny-img']['file']; // Buscamos la imagen que acabamos de crear
	//Buscamos información sobre la imagen
	list($orig_w, $orig_h, $orig_type) = @getimagesize($file);
	// IMPORTANTE: Función deprecada, buscar alternativa, la que ofrece
	// WP wp_get_image_editor no funciona ¬¬
	$image = wp_load_image($file);
	// Primero hacemos un blur, repetimos 20 veces
	for ($x=1; $x <=20; $x++){
		imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR, 999);
	}
	// Aplicamos dos filtros más para que la imagen no se vea mal
	imagefilter($image, IMG_FILTER_SMOOTH,99);
	imagefilter($image, IMG_FILTER_BRIGHTNESS, 10);
	// Hacemos un loop por los tipos de imagen para aplicar la
	// función correspondiente según sea el caso
	switch ($orig_type) {
		case IMAGETYPE_GIF:
			imagegif( $image, $file );
			break;
		case IMAGETYPE_PNG:
			imagepng( $image, $file );
			break;
		case IMAGETYPE_JPEG:
			imagejpeg( $image, $file );
			break;
	}
	return $meta;
}

add_image_size( 'tiny-img', 25, 9999 );