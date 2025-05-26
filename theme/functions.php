<?php
// Enable Title
add_theme_support( 'title-tag' );
add_theme_support('post-thumbnails');
add_image_size( 'thumb', 260, 190, true );

/**
 * body tag class
 */
function wphe_body_classes($classes) {
	global $post;

	$classes = array();
	$classes[] = "main";

	if(is_home() || is_front_page()) {  
		$classes[] = "toppage";  
	}

	if (is_singular('')) {  
		$classes[] = "archive single";  
	}

	if (is_page()) { 
		$classes[] = "page page-{$post->post_name}";  
	}

	if ( is_archive() ) { 
		$classes[] = "archive";  
		// if (is_archive('work')) {
		// 	$classes[] = "page-work";  
		// }
	}

	return $classes;
}
add_filter("body_class", "wphe_body_classes");

/**
 * 固定ページからpタグ削除
 */
function wpautop_filter($content) {
	global $post;
	$remove_filter = false;
	$arr_types = array('page'); 
	$post_type = get_post_type( $post->ID );
	if (in_array($post_type, $arr_types)) $remove_filter = true;
	if ( $remove_filter ) {
		remove_filter('the_content', 'wpautop');
		remove_filter('the_excerpt', 'wpautop');
	}
	return $content;
}
add_filter('the_content', 'wpautop_filter', 9);

/**
* pタグやbrタグの自動挿入がストップ
*/
function mvwpform_autop_filter() {
	if (class_exists('MW_WP_Form_Admin')) {
		$mw_wp_form_admin = new MW_WP_Form_Admin();
		$forms = $mw_wp_form_admin->get_forms();
		foreach ($forms as $form) {
			add_filter('mwform_content_wpautop_mw-wp-form-' . $form->ID, '__return_false');
		}
	}
}
mvwpform_autop_filter();

/**
 * テーマのパスを出力するショートコード
 */
function shortcode_my_theme() {
	return get_template_directory_uri();
}
add_shortcode('my_theme', 'shortcode_my_theme');

/**
 * TOP URL
 */
add_shortcode('my_url', 'shortcode_my_url');
function shortcode_my_url() {
	return home_url();
}

/**
 * 画像URL
 */
function content_replace($content) {
	$replace = array(
		'"./assets' => '"'.get_template_directory_uri().'/assets',
		'"assets' => '"'.get_template_directory_uri().'/assets',
	);

	$content = str_replace(array_keys($replace), $replace, $content);

	return $content;
}
add_filter('the_content', 'content_replace');

// function prefix_filter_description( $description ) {
//   if (is_singular('post')) {
//     $description = '';
//   }
//   return $description;
// }
// add_filter( 'wpseo_metadesc', 'prefix_filter_description' );

/**
 * ページ処理
 */
function my_pagination( $pages, $paged, $range = 4, $show_only = false ) {
    $pages = ( int ) $pages;
    $paged = $paged ?: 1;

    $text_first   = '';
    $text_before  = '<img src="'.get_template_directory_uri().'/assets/images/news/ic_arrow.png"><img src="'.get_template_directory_uri().'/assets/images/news/ic_arrow_w.png" alt="">';
    $text_next    = '<img src="'.get_template_directory_uri().'/assets/images/news/ic_arrow.png" alt=""><img src="'.get_template_directory_uri().'/assets/images/news/ic_arrow_w.png" alt="">';
    $text_last    = '';

    if ( $show_only && $pages === 1 ) {
        // １ページのみで表示設定が true の時
        echo '<span class="pages__item">1</span>';
        return;
    }

    if ( $pages === 1 ) return;    // １ページのみで表示設定もない場合

    echo '';
    if ( 1 !== $pages ) {
        if ( $paged > 1 ) {
            // 「前へ」 の表示
            echo '<a href="'.get_pagenum_link( $paged - 1 ).'" class="btn-page prev">'.$text_before.'</a>';
        }

        for ( $i = 1; $i <= $pages; $i++ ) {
            if ( $i <= $paged + $range && $i >= $paged - $range ) {
                // $paged +- $range 以内であればページ番号を出力
                if ( $paged === $i ) {
                    echo '<a class="btn-page active" href="', get_pagenum_link( $i ) ,'">', $i ,'</a>';
                } else {
                    echo '<a class="btn-page" href="', get_pagenum_link( $i ) ,'">', $i ,'</a>';
                }
            }
        }
        if ( $paged < $pages ) {
            // 「次へ」 の表示
            echo '<a href="'.get_pagenum_link( $paged + 1 ) .'" class="btn-page next">'.$text_next.'</a>';
        }
    }
    echo '';
}

/**
 * Debug
 */
function my_debug($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}
