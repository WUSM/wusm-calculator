jQuery('#programs-select').change(function() {
	jQuery('#table-here').hide();
	jQuery('#select-here').hide();
	var selectID = jQuery('#programs-select option:selected').attr('id');
	jQuery('#select-here').load('wp-content/plugins/wusm-calculator/php/year_select.php #' + selectID, function(){
		jQuery('#select-here').show();
		jQuery('#year-select').change(function() {
		var programID = jQuery('#programs-select option:selected').attr('id');
		var tableID = jQuery('#year-select option:selected').attr('id');
		jQuery('#table-here').load('wp-content/plugins/wusm-calculator/php/calculator_data.php #' + programID + '-title, #' + tableID, function(){
			var sum = 0;
			jQuery('.cost-amount').each(function() {
				sum += parseFloat(jQuery(this).attr('id'));
			});
			jQuery('.total-amount').text(sum);
			jQuery('.sum, .total-amount').currency({decimals: 0});
			jQuery('.edit-pane').hide();
			jQuery('.add-more-pane').hide();
			jQuery('#table-here').show();
			jQuery('.edit-link').click(function() {
				var editID = jQuery(this).attr('id');
				jQuery('#slide-' + editID).slideToggle();
			});
			jQuery('.add-more-name').click(function() {
				jQuery('.add-more-pane').slideToggle();
			});
			});
		});
	});
});

