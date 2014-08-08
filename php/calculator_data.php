<?php

ini_set('display_errors', 'On');

require('../../../../wp-blog-header.php');

$args = array( 'post_type' => 'calculator', 'orderby' => 'title', 'order' => 'ASC' );
$data_query = new WP_Query( $args );
	if ( $data_query->have_posts() ) : while ( $data_query->have_posts() ) : $data_query->the_post(); ?>
		<div class="program-<?php the_ID(); ?>" id="<?php the_ID(); ?>">
			<h1 id="<?php the_id(); ?>-title"><?php the_title(); ?></h1>
			<?php $p = 1; ?>
			<?php if( have_rows('year') ):
				while ( have_rows('year') ) : the_row(); ?>
			<div id="<?php the_ID(); ?>-<?php echo $p; ?>">
			<h2><?php the_sub_field('title'); ?></h2>
			<div class="programyear">
			<?php $i = 1; ?>
			<?php if( have_rows('costs') ):
				  while ( have_rows('costs') ) : the_row(); ?>
			<div class="row group">
				<div class="cost-name"><?php the_sub_field('name'); ?></div>
			    	<?php if( get_sub_field('editable') ) { ?>
						<?php $number = get_sub_field('expense');
				    	$amount = number_format ($number, 0, '.', ','); ?>
				        <div class="cost-amount sum" id="<?php the_sub_field('expense'); ?>"><?php echo $number; ?></div>
				        <div class="edit"><a id="<?php echo $i; ?>" class="edit-link">edit</a></div>
				        </div>
			        	<div id="slide-<?php echo $i; ?>" class="edit-pane" colspan="3">
			        		<div class="edit-pane-content">
			        			<h3>Enter your yearly cost for:</h3>
			        			<div class="edit-pane-input group"><label type="range" for="field">Food</label><input id="field"></div>
			        			<div class="edit-pane-input group"><label for="field">Clothes</label><input id="field"></div>
			        			<div class="edit-pane-input group"><label for="field">Entertainment</label><input id="field"></div>
			        			<div class="edit-pane-input group"><label for="field">Laundry</label><input id="field"></div>
			        			<div class="edit-pane-input group"><label for="field">Other</label><input id="field"></div>
			        		</div>
			        	</div>
				        <?php $i++; ?>
				    <?php } else { ?>
				    	<?php $number = get_sub_field('expense');
				    	$amount = number_format ($number, 0, '.', ','); ?>
				        <div id="<?php the_sub_field('expense'); ?>" class="cost-amount sum"><?php echo $number; ?></div>
				        <div></div>
				        </div>
				    <?php } ?>
				<?php endwhile; endif; ?>
				<div class="add-more">
					<a class="add-more-link"><div class="add-more-name">+ Add more expenses</div></a>
					<div class="add-more-pane">
						<div style="padding-top:20px;" class="add-more-input group"><label for="field">Transportation</label><input id="field"></div>
						<div class="add-more-input group"><label for="field">Debt Repayment</label><input id="field"></div>
						<div class="add-more-input group"><label for="field">Other Expenses</label><input id="field"></div>
					</div>
				</div>
				<div class="total group">
					<div class="total-name">Total</div>
					<div class="total-amount"></div>
				</div>
			</div>
			</div>
			<?php $p++; ?>
			<?php endwhile; endif; ?>
		</div>
	<?php endwhile; endif; ?>