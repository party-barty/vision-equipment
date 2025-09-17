<?php get_header(); ?>
<style type="text/css">
	<?php if( get_field('background_image') ) : ?>
	.page_title {
    background: rgba(0, 0, 0, 0) url("<?php echo get_field('background_image'); ?>") no-repeat scroll 0 0 / cover ;
}
	<?php else : ?>
<?php endif;?>
</style>
<div class="page_title">
	<div class="container">
	<?php if( is_home() ) : ?>
	<h2>blog</h2>
	<?php else : ?>
	<?php FLTheme::archive_page_header(); ?>
	<?php endif;?>
	</div>
</div>
<div class="fl-archive container">
	<div class="row">
		
		<?php FLTheme::sidebar('left'); ?>
		
		<div class="fl-content <?php FLTheme::content_class(); ?>" itemscope="itemscope" itemtype="http://schema.org/Blog">

			
			
			<?php if(have_posts()) : ?>
			
				<?php while(have_posts()) : the_post(); ?>
					<?php get_template_part('content', get_post_format()); ?>
				<?php endwhile; ?>
				
				<?php FLTheme::archive_nav(); ?>
				
			<?php else : ?>
		
				<?php get_template_part('content', 'no-results'); ?>
		
			<?php endif; ?>
			
		</div>
		
		<?php FLTheme::sidebar('right'); ?>
		
	</div>
</div>

<?php get_footer(); ?>