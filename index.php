<?php get_header(); ?>


<div id="content">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="entry">
			
			<div class="entry-header">
				<p class="date">
					<span class="day">
						<?php the_time('j'); ?> 
					</span>
					<span class="month-year">
						<?php the_time("M") ?>, <?php the_time("y")?>
					</span>
				</p>
				
				<div class="entry-title">
					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					<p>
						<span class="info">
							<span class="explanation">Posted by </span>
							<?php the_author(); ?>
						</span>
						<span class="info">
							<span class="explanation">Filed in </span>
							<?php 
								foreach( (get_the_category()) as $category ) {
									echo $category->cat_name.' ';
								}
							?>
						</span>
					</p>
				</div> <!-- end of div.entry-title -->
			</div> <!-- end of div#entry-header -->
			
			<div class="entry-body">
				<?php the_excerpt(); ?>  <!-- the_content() will give the whole post content -->
				<!-- <p>
					<?php comments_number('No comment', '1 comment', '% comments'); ?>
				</p> -->
			</div> <!-- end of div.entry-body -->
			<h2><a href="<?php the_permalink() ?>">Read the rest of this entry</a></h2>
		</div> <!-- end of div.entry -->
	<?php endwhile; else: ?>
		<h2>Woops...</h2>
		<p>Sorry, no posts we're found.</p>
	<?php endif; ?>
	
</div> <!-- end of div#content -->
<?php get_footer(); ?>
