<?php 
get_header();
?>
<section id="content">
    <div class="rvt-container rvt-container--senior rvt-container--center single-news-story"> 
		<div class="row">
<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		//
        // Post Content here
		wpb_set_post_views(get_the_ID());
		
		?>
		<div class="col-md-8">
			<div class="content-box">
				<article class="entry">
					<div class="single_post_header">
						<h1 class="single_post_title"><?php echo the_title(); ?></h1>
						<div class="entry_meta-holder">
								<ul class="entry_meta">
									<li class="entry_meta-author"><?php echo get_the_author(); ?></li>
									
									<li class="entry_meta-date"><?php  echo get_the_date(); ?></li>
								</ul>
						</div>
					</div><!-- post header -->
				<div class="entry_img_holder">
				<?php					
					the_post_thumbnail('full');
				?>
				</div>
				<div class="entry_article-wrap">
					<div class="entry_share">
						<div class="social-follow-wrap">
							<div class="row">
									<?= render_component('socialMediaShareButtons'); ?>
							</div><!-- row -->   
						</div>
					</div>
					<div class="entry_article">
						<?php echo the_content(); ?>
					</div>
				</div>

				</article>
			</div>
		</div>
		<div class="col-md-4 sidebar-right">
			<?php echo render_component('NewsSide'); ?>

		</div>

		<?php 
		
		//
	} // end while
} // end if
?>
		</div>
	</div>
</section>
<?php 

get_footer();