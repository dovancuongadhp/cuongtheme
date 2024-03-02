<?php
/*
	Template Name: Contact
*/
?>
<?php get_header() ?>
<div class="content">
	<div id="main-content">
		<div class="contact-info">
			<h4>Địa chỉ liên hệ</h4>
			<p>An Duong - Hai Phong</p>
			<p>0312.123.123</p>
		</div>
		<div class="contact-info">
			<?php echo do_shortcode('[CONTACT FORM]');?>
		</div>
	</div>
	<div id="sidebar">
		<?php get_sidebar()?>
	</div>
</div>
<?php get_footer() ?>