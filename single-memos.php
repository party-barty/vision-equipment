<?php get_header(); ?>
<style type="text/css">
	<?php if( get_field('background_image') ) : ?>
	.page_title {
    background: rgba(0, 0, 0, 0) url("<?php echo get_field('background_image'); ?>") no-repeat scroll 0 0 / cover ;
}
	<?php else : ?>
<?php endif;?>
</style>
<?php if( is_front_page() ) : ?>
<?php echo do_shortcode('[slider]'); ?>
<?php else : ?>
<div class="page_title">
	<div class="container">
	<?php if( get_field('title') ) : ?>
		<div class="page_title_contents">
			<?php echo get_field('title'); ?>
		</div>
		<?php else : ?>
		<h2><?php the_title(); ?></h2>
		<?php endif;?>
	</div>
</div>
<?php endif;?>
<div class="memos_contents">
	<div class="container">
		<div class="row">
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
				<!-- .fl-post -->
			<?php endwhile; endif; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>