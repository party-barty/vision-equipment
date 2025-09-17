<?php 

/*
Template Name: No Title
*/

?>
<?php get_header('page'); ?>

	<?php if (is_front_page()){ ?>
		<div class="fl-content-full container">
			<div class="row">
				<div class="fl-content col-md-12">
					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
						<?php get_template_part('content', 'page'); ?>
					<?php endwhile; endif; ?>
				</div>
			</div>
	</div> <?php }else {?>		
		<div class="page_template_contents">
			<div class="container page_settings">
				<div class="fl-content-full container">
					<div class="row">
						<div class="fl-content col-md-12">
							<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
								<?php get_template_part('content', 'page'); ?>
							<?php endwhile; endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
<?php get_footer(); ?>