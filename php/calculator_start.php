<?php

$args = array( 'post_type' => 'calculator', 'orderby' => 'title', 'order' => 'ASC' );
$calc_query = new WP_Query( $args );
if ( $calc_query->have_posts() ) : ?>
<div class="calculator">
		<div class="select-group group">
		<label for="programs-select">Select your program</label>
		<select id="programs-select">
		<option selected></option>
<?php while ( $calc_query->have_posts() ) : $calc_query->the_post(); ?>
		<option id="<?php the_id(); ?>"><?php the_title(); ?></option>
<?php endwhile; ?>
</select>
		</div>
		<div class="select-group group" id="select-here"></div>
		<div id="table-here"></div>
	</div>
<?php wp_reset_postdata(); endif; ?>