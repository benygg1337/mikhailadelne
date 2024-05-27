<?php  

add_action( 'wp_enqueue_scripts', function(){

	wp_enqueue_style( 'stylesheet', get_template_directory_uri() . '/assets/css/style.min.css');

    wp_enqueue_script( 'vendors', get_template_directory_uri() . '/assets/js/vendors.min.js', [], '5.0.4', 'true' );
    wp_enqueue_script( 'app.min', get_template_directory_uri() . '/assets/js/app.min.js', array('vendors'), '6.4', 'true' );
    wp_enqueue_script( 'gcaptcha', 'https://www.google.com/recaptcha/enterprise.js?render=6Lc9Q-kpAAAAABPME8-R-wSWKJeqkJ5YH92vT_XQ', array(), '3', false );

});

// add_theme_support('post-thumbnails');
// // add_theme_support('title-tag');
// add_theme_support('custom-logo');

// // Добавляем SVG в список разрешенных для загрузки файлов
// add_filter('upload_mimes', 'svg_upload_allow');
// function svg_upload_allow($mimes)
// {
//     $mimes['svg']  = 'image/svg+xml';
//     return $mimes;
// }

// function custom_404_template($template) {
//     if (is_404()) {
//         // Здесь указывайте путь к вашему файлу 404.php
//         $template = __DIR__ . '/404.php';
//     }
//     return $template;
// }
// add_filter('template_include', 'custom_404_template');


// # Исправление MIME типа для SVG файлов
// add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5);
// function fix_svg_mime_type($data, $file, $filename, $mimes, $real_mime = '')
// {
//     if (version_compare($GLOBALS['wp_version'], '5.1.0', '>='))
//         $dosvg = in_array($real_mime, ['image/svg', 'image/svg+xml']);
//     else
//         $dosvg = ('.svg' === strtolower(substr($filename, -4)));

//     if ($dosvg) {
//         if (current_user_can('manage_options')) {
//             $data['ext']  = 'svg';
//             $data['type'] = 'image/svg+xml';
//         } else {
//             $data['ext'] = $type_and_ext['type'] = false;
//         }
//     }

//     return $data;
// }

add_action('wp_default_scripts', function ($scripts) {
    if (!empty($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, ['jquery-migrate']);
    }
});

// // В этом коде мы использовали функцию get_post() для получения объекта блока по его ID
// // Затем мы извлекаем содержимое блока из свойства post_content объекта блока и выводим его.

// function my_custom_block_shortcode($atts) {
//     $block_id = $atts['id'];
//     $block = get_post($block_id);

//     if ($block) {
//         $block_content = $block->post_content;
//         return $block_content;
//     }

//     return ''; // Возвращаем пустую строку, если блок не найден
// }
// add_shortcode('my_custom_block', 'my_custom_block_shortcode');
// add_shortcode('my_custom_block_2', 'my_custom_block_shortcode');
// add_shortcode('my_custom_block_3', 'my_custom_block_shortcode');



?>