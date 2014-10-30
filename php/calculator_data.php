<?php

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
			
			    	<?php if( get_sub_field('editable') ) { ?>
			    	<div class="row group editable" id="<?php the_sub_field('expense'); ?>" data-id="<?php echo $i; ?>">
			    		<div class="row-content">
						<div class="cost-name"><?php the_sub_field('name'); ?></div><?php $number = get_sub_field('expense'); $amount = number_format ($number, 0, '.', ','); ?><div class="cost-amount sum field-<?php echo $i; ?>" id="<?php the_sub_field('expense'); ?>"><?php echo $number; ?></div><div class="edit"><a id="<?php echo $i; ?>" class="edit-value">edit</a></div>
				        </div>
			        	<div id="slide-<?php echo $i; ?>" class="edit-pane">
			        		<div class="edit-pane-content" id="<?php the_sub_field('expense'); ?>">
			        			
			        		<?php if( have_rows('editable_fields') ) : ?>
			        			<h3>Enter your yearly cost for:</h3>
			        			<?php $field_value = 1; ?>
			        				<?php while ( have_rows('editable_fields') ) : the_row(); ?>
			        				<div class="edit-pane-input group"><label for="field-<?php echo $i; ?>-<?php echo $field_value; ?>"><?php the_sub_field('name'); ?></label><input id="field-<?php echo $i; ?>-<?php echo $field_value; ?>" class="field" maxlength="5" inputmode="numeric" pattern="[0-9]*"></div>
			        				<?php $field_value++; ?>
			        			<?php endwhile; ?>
			        			<?php else : ?>
			        				<h3>Enter new amount:</h3>
			        					<div class="edit-pane-input group">
			        						<input class="field" maxlength="5" inputmode="numeric" pattern="[0-9]*">
			        					</div>
			        			<?php endif; ?>
			        		</div>
			        		<div class="close"><a class="close-button" id="<?php echo $i; ?>">close</a></div>
			        	</div>
			        	</div>
				        <?php $i++; ?>
				    <?php } else { ?>
				    <div class="row group">
				<div class="cost-name"><?php the_sub_field('name'); ?></div>
				    	<?php $number = get_sub_field('expense');
				    	$amount = number_format ($number, 0, '.', ','); ?>
				        <div id="<?php the_sub_field('expense'); ?>" class="cost-amount sum"><?php echo $number; ?></div>
				        </div>
				    <?php } ?>
				<?php endwhile; endif; ?>
				<div class="row group editable" id="0" data-id="100">
				<div class="row-content">
					<div class="cost-name">Other</div><div id="0" class="cost-amount sum field-100">0</div><div class="edit"><a id="100" class="edit-value">edit</a></div>
				</div>
				<div id="slide-100" class="edit-pane">
					<div class="edit-pane-content" id="0">
						<h3>Enter new amount:</h3>
    					<div class="edit-pane-input group">
    						<input class="field" maxlength="5" inputmode="numeric" pattern="[0-9]*">
    					</div>
    				</div>
    					<div class="close"><a class="close-button" id="100">close</a></div>
        			</div>
        		</div>
        		<div class="personal-total group">
        			<div class="personal-total-name">Your Total Amount</div>
					<div class="personal-total-amount"></div>
        		</div>
				<div class="total group">
					<div class="total-name"><span class="max-total">Maximum </span>Total Amount</div>
					<div class="total-amount"></div>
				</div>
			</div>
			<div class="summer">
			<?php $e = 200; ?>
			<?php if( have_rows('summer') ): ?>
				<h2>Summer</h2>
				<?php while ( have_rows('summer') ) : the_row(); ?>
			    	<?php if( get_sub_field('editable') ) { ?>
			    	<div class="row group editable" id="<?php the_sub_field('expense'); ?>" data-id="<?php echo $e; ?>">
			    		<div class="row-content">
						<div class="cost-name"><?php the_sub_field('name'); ?></div><?php $number = get_sub_field('expense'); $amount = number_format ($number, 0, '.', ','); ?><div class="cost-amount-summer sum field-<?php echo $e; ?>" id="<?php the_sub_field('expense'); ?>"><?php echo $number; ?></div><div class="edit"><a id="<?php echo $e; ?>" class="edit-value">edit</a></div>
				        </div>
			        	<div id="slide-<?php echo $e; ?>" class="edit-pane" colspan="3">
			        		<div class="edit-pane-content" id="<?php the_sub_field('expense'); ?>">
			        			
			        		<?php if( have_rows('editable_fields') ) : ?>
			        			<h3>Enter your summer cost for:</h3>
			        			<?php $field_value = 1; ?>
			        				<?php while ( have_rows('editable_fields') ) : the_row(); ?>
			        				<div class="edit-pane-input group"><label for="field-<?php echo $e; ?>-<?php echo $field_value; ?>"><?php the_sub_field('name'); ?></label><input id="field-<?php echo $e; ?>-<?php echo $field_value; ?>" class="field summer-field" maxlength="5" inputmode="numeric" pattern="[0-9]*"></div>
			        				<?php $field_value++; ?>
			        			<?php endwhile; ?>
			        			<?php else : ?>
			        				<h3>Enter new amount:</h3>
			        					<div class="edit-pane-input group">
			        						<input class="field summer-field" maxlength="5" inputmode="numeric" pattern="[0-9]*">
			        					</div>
			        			<?php endif; ?>
			        		</div>
			        		<div class="close"><a class="close-button" id="<?php echo $e; ?>">close</a></div>
			        	</div>
			        	</div>
				        <?php $e++; ?>
				    <?php } else { ?>
				    <div class="row group">
				<div class="cost-name"><?php the_sub_field('name'); ?></div>
				    	<?php $number = get_sub_field('expense');
				    	$amount = number_format ($number, 0, '.', ','); ?>
				        <div id="<?php the_sub_field('expense'); ?>" class="cost-amount-summer sum"><?php echo $number; ?></div>
				        </div>
				    <?php } ?>
				<?php endwhile; ?>
					<div class="s-personal-total group">
	        			<div class="s-personal-total-name">Your Total Amount</div>
						<div class="s-personal-total-amount"></div>
	        		</div>
					<div class="summer-total group">
						<div class="total-name"><span class="s-max-total">Maximum </span>Total Amount</div>
						<div class="summer-total-amount"></div>
					</div>
				<?php endif; ?>
			</div>
			</div>
			<?php $p++; ?>
			<?php endwhile; endif; ?>
		</div>
	<?php endwhile; endif; ?>