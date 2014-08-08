<?php

require_once('../../../../wp-blog-header.php');

$args = array( 'post_type' => 'calculator', 'orderby' => 'title', 'order' => 'ASC' );
$year_query = new WP_Query( $args );
if ( $year_query->have_posts() ) : ?>
		<?php while ( $year_query->have_posts() ) : $year_query->the_post(); ?>
				<div id="<?php the_id(); ?>">
	<label for="year-select">Select your class year</label>
	<select class="program-<?php the_id(); ?>" id="year-select">
		<option selected></option>
		<?php $i = 1; ?>
		<?php if( have_rows('year') ): ?>
			<?php while ( have_rows('year') ) : the_row(); ?>
			<option id="<?php the_id(); ?>-<?php echo $i; ?>"><?php the_sub_field('title'); ?></option>
			<?php $i++; ?>
			<?php endwhile; endif; ?>
				</select>
			</div>
		<?php endwhile; ?>
<?php wp_reset_postdata(); endif; ?>