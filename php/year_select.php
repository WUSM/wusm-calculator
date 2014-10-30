<?php

require_once('../../../../wp-blog-header.php');

$args = array( 'post_type' => 'calculator', 'orderby' => 'title', 'order' => 'ASC' );
$year_query = new WP_Query( $args );
if ( $year_query->have_posts() ) : ?>
		<?php while ( $year_query->have_posts() ) : $year_query->the_post(); ?>
				<div id="<?php the_id(); ?>">
	<select class="program-<?php the_id(); ?>" id="year-select">
		<?php $i = 1; ?>
		<?php if( have_rows('year') ): ?>
			<?php while ( have_rows('year') ) : the_row(); ?>
			<option id="<?php the_id(); ?>-<?php echo $i; ?>" value="<?php the_id(); ?>-<?php echo $i; ?>"><?php the_sub_field('title'); ?></option>
			<?php $i++; ?>
			<?php endwhile; endif; ?>
				</select>
			<div id="generated-select-year">
		<ul id="year-select-generate" class="dropdown-menu">
			<li class="toggler-year"><span class="choose">Select your class year</span></li>
			<ul id="year-drop">

			</ul>
		</ul>
		</div>
		</div>
		<?php endwhile; ?>
<?php wp_reset_postdata(); endif; ?>