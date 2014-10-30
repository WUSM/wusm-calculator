<?php

$args = array( 'post_type' => 'calculator', 'orderby' => 'title', 'order' => 'ASC' );
$calc_query = new WP_Query( $args );
if ( $calc_query->have_posts() ) : ?>
<div class="calculator">
		<div class="select-group group">
		<select id="programs-select">
<?php while ( $calc_query->have_posts() ) : $calc_query->the_post(); ?>
		<option id="<?php the_id(); ?>" value="<?php the_id(); ?>"><?php the_title(); ?></option>
<?php endwhile; ?>
</select>
		</div>
		<div id="generated-select-programs">
		<ul id="programs-select-generate" class="dropdown-menu">
			<li class="toggler"><span class="choose">Select your program</span></li>
			<ul id="programs-drop">

			</ul>
		</ul>
		</div>
		<div class="select-group group" id="select-here"></div>
		<div id="table-here"></div>
	</div>
<?php wp_reset_postdata(); endif; ?>