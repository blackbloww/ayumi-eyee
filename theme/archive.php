<?php
$year     = get_query_var('year');
$monthnum = get_query_var('monthnum');
$day      = get_query_var('day');

// 現在ページ
$paged = 1; 
if (get_query_var('paged')) {
    $paged = get_query_var('paged');
} 
elseif (get_query_var('page')) {
    $paged = get_query_var('page');
}

// ページのデータ
$posts_per_page = get_option('posts_per_page');
$datas = new WP_Query(
    array(
        'post_type' => 'post',
        'numberposts' => -1,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'posts_per_page' => $posts_per_page,       
        'paged' => $paged,
        'date_query' => array(
            array(
                'year' => $year,
                'compare' => '='
            ),
            array(
                'month' => $monthnum,
                'compare' => '='
            ),
        )
    )
);
?>

<?php get_header(); ?>

<?php if ($datas->have_posts()) {
    while ($datas->have_posts()) { $datas->the_post(); ?>
        <a href="<?php the_permalink() ?>" class="new">
            <?php if (has_post_thumbnail()) { ?>
                <div class="image">
                    <img src="<?php the_post_thumbnail_url('thumb') ?>" alt="">
                </div>
            <?php } else { ?>
                <div class="image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/news-01.png" alt="">
                </div>
            <?php }?>
            <div class="title">
                <p><?php echo the_title()?></p>
            </div>
            <div class="info">
                <p><?php echo get_the_date('Y.m.d') ?></p>
                <span>　｜　</span>
                <p>コラム</p>
            </div>
        </a>
    <?php }
} ?>

<?php my_pagination($datas->max_num_pages, $paged); ?>

<?php get_footer(); ?>