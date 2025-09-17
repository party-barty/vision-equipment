<?php do_action('fl_content_close'); ?>
	
	</div><!-- .fl-page-content -->
	<?php 
		
	do_action('fl_after_content'); 
	
	if ( FLTheme::has_footer() ) :
	
	?>
	<footer class="fl-page-footer-wrap" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
		<?php 
			
		do_action('fl_footer_wrap_open');
		do_action('fl_before_footer_widgets');
		
		FLTheme::footer_widgets();
		
		do_action('fl_after_footer_widgets');
		do_action('fl_before_footer');
		
		FLTheme::footer();
		
		do_action('fl_after_footer');
		do_action('fl_footer_wrap_close');
		
		?>
	</footer>
	<?php endif; ?>
	<?php do_action('fl_page_close'); ?>
</div><!-- .fl-page -->
    <script src="<?php echo constant("FL_CHILD_THEME_URL"); ?>/js/owl.carousel.js"></script>


    <script>
    jQuery(document).ready(function() {

      var owl = jQuery("#owl-demo");

      owl.owlCarousel({
        autoPlay : true,
		items : 1,
        navigation : true,
        singleItem : true,
        transitionStyle : "fade"
      });
      //Select Transtion Type
      jQuery("#transitionType").change(function(){
        var newValue = jQuery(this).val();

        //TransitionTypes is owlCarousel inner method.
        owl.data("owlCarousel").transitionTypes(newValue);

        //After change type go to next slide
        owl.trigger("owl.next");
      });
    });
    </script>
	<script type="text/javascript">
		jQuery('a[href*="#"]:not([href="#"])').click(function() {
		  if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			var target = jQuery(this.hash);
			target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
			  jQuery('html, body').animate({
				scrollTop: target.offset().top
			  }, 1000);
			  return false;
			}
		  }
		});
	</script>
<?php 
	
wp_footer(); 

do_action('fl_body_close');

FLTheme::footer_code();

?>
</body>
</html>