<?php get_header(); ?>

<div style="text-align: center; padding: 100px 0 100px;">
	<img style="display: inline-block;" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/404-img.jpg">
	<p style="text-align: center;">
		ページ内容が見つかりませんでした。<br>
		<a href="<?php echo home_url() ?>" class="btn btn-default">トップページへ戻る</a>
	</p>
</div>

<?php get_footer(); ?>