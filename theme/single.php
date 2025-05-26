<?php get_header(); ?>

<div class="title">
    <span>
        <?php echo get_the_date('Y.m.d'); ?>

        <?php $cats = get_the_category($post->ID) ?>
        <?php if ($cats) { foreach($cats as $cd) { ?>
            　｜　<a href="<?php echo get_category_link($cd->term_id) ?>"><?php echo $cd->name ?></a>
        <?php }} ?>
    </span>
    <h2><?php the_title(); ?></h2>
</div>

<?php if (has_post_thumbnail()) { ?>
    <div class="image-thum">
        <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title() ?>" style="width: 100%;">
    </div>
<?php } ?>

<div class="content-post">
    <?php the_content() ?>
</div>
<div class="list-btn">
    <?php $prev_post = get_previous_post() ?>
    <?php $next_post = get_next_post() ?>

    <?php if ($prev_post):?>
        <a href="<?php echo get_permalink( $prev_post->ID ) ?>" class="btn-page prev">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/news/ic_arrow.png" alt="">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/news/ic_arrow_w.png" alt="">
        </a>
    <?php endif; ?>

    <a href="<?php echo home_url()?>/news" class="btn-main">
        <span>一覧へ戻る</span>
        <span class="bg-btn"></span>
    </a>
    
    <?php if ($next_post):?>
        <a href="<?php echo get_permalink( $next_post->ID ) ?>" class="btn-page next">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/news/ic_arrow.png" alt="">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/news/ic_arrow_w.png" alt="">
        </a>
    <?php endif; ?>
</div>

<?php get_footer(); ?>