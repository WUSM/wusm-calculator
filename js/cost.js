jQuery('.toggler').click(function() {
    jQuery(this).toggleClass('drop');
    jQuery('.toggler-year').removeClass('drop');
});

var source = jQuery("#programs-select");
var selected = source.find("option[selected]");
var options = jQuery("option", source);
options.each(function(){
    jQuery("#programs-drop").append('<li>' + 
        jQuery(this).text() + '<span class="value">' + 
        jQuery(this).attr('id') + '</span></li>');
});
jQuery("#programs-drop li").click(function() {
    var text = jQuery(this).html();
    jQuery("#programs-select-generate .choose").html(text);
    jQuery(".toggler").removeClass('drop');
    var source = jQuery("#programs-select");
    source.val(jQuery(this).find("span.value").html()).change();
    console.log(jQuery(this).find("span.value").html());
});

jQuery(document).click(function() {
    jQuery(".toggler").removeClass('drop');
});
jQuery(".dropdown-menu").click(function(event) {
    event.stopPropagation();
});

var pluginsUrl = (calclocation.calcurl);
jQuery('#programs-select').change(function() {
	jQuery('#table-here').hide();
	jQuery('#select-here').hide();
	var selectID = jQuery('#programs-select option:selected').attr('id');
	jQuery('#select-here').load(pluginsUrl + '/wusm-calculator/php/year_select.php #' + selectID, function(){
		jQuery('.toggler-year').click(function() {
		    jQuery(this).toggleClass('drop');
		});
		var source = jQuery("#year-select");
		var selected = source.find("option[selected]");
		var options = jQuery("option", source);
		options.each(function(){
		    jQuery("#year-drop").append('<li>' + 
		        jQuery(this).text() + '<span class="value">' + 
		        jQuery(this).attr('id') + '</span></li>');
		});
		jQuery("#year-drop li").click(function() {
		    var text = jQuery(this).html();
		    jQuery("#year-select-generate .choose").html(text);
		    jQuery(".toggler-year").removeClass('drop');
		    var source = jQuery("#year-select");
		    source.val(jQuery(this).find("span.value").html()).change();
		    console.log(jQuery(this).find("span.value").html());
		});
		jQuery(document).click(function() {
		    jQuery(".toggler-year").removeClass('drop');
		});
		jQuery(".dropdown-menu").click(function(event) {
		    event.stopPropagation();
		});
		jQuery('#select-here').show();
		jQuery('#year-select').change(function() {
		var programID = jQuery('#programs-select option:selected').attr('id');
		var tableID = jQuery('#year-select option:selected').attr('id');
		jQuery('#table-here').load(pluginsUrl + '/wusm-calculator/php/calculator_data.php #' + programID + '-title, #' + tableID, function(){
			var sum = 0;
			jQuery('.cost-amount').each(function() {
				sum += parseFloat(jQuery(this).attr('id'));
			});
			jQuery('.total-amount').text(sum);
			jQuery('.total-amount').attr('id', sum);
			jQuery('.sum, .total-amount').currency({decimals: 0});
			jQuery('.edit-pane').hide();
			jQuery('.add-more-pane').hide();
			jQuery('#table-here').show();
			jQuery('.edit-value').click(function() {
				var editID = jQuery(this).attr('id');
				jQuery('#slide-' + editID).slideToggle();
			});
			jQuery('.close-button').click(function() {
				var editID = jQuery(this).attr('id');
				jQuery('#slide-' + editID).slideToggle();
			});
			jQuery('.add-more-name').click(function() {
				jQuery('.add-more-pane').slideToggle();
			});
			jQuery('.add-more-close-button').click(function() {
				jQuery('.add-more-pane').slideToggle();
			});
			jQuery('.editable').each(function(){
				var id = jQuery(this).data("id");
			jQuery('.field').numeric({decimal: false, negative: false});
			jQuery('#slide-'+id+' .field').each(function() {
				jQuery(this).keyup(function() {
					var slideTotal = 0;
					jQuery('#slide-'+id+' .field').each(function() {
						if(!isNaN(this.value) && this.value.length!=0) {
							slideTotal += parseFloat(this.value);
						}
					});
					var classNum = jQuery(this).parent().parent().attr('id');
					if (slideTotal != 0) {
						jQuery('.field-'+id).attr("id", slideTotal);
						jQuery('.field-'+id).text(slideTotal);
						jQuery('.field-'+id).currency({decimals: 0});
					}
					else {
						jQuery('.field-'+id).attr("id", classNum);
						jQuery('.field-'+id).text(classNum);
						jQuery('.field-'+id).currency({decimals: 0});
					}
					var sum = 0;
					jQuery('.cost-amount').each(function() {
						sum += parseFloat(jQuery(this).attr('id'));
					});
					var initialtotal = jQuery('.total-amount').attr('id');
					if (initialtotal == sum) {
						jQuery('.personal-total').hide();
						jQuery('.max-total').hide();
					}
					else {
						jQuery('.personal-total').css('display','inline-block');
						jQuery('.max-total').show();
						jQuery('.personal-total-amount').text(sum);
						jQuery('.personal-total-amount').currency({decimals: 0});
					}
				});
			});
			});
			var summerSum = 0;
			jQuery('.cost-amount-summer').each(function() {
				summerSum += parseFloat(jQuery(this).attr('id'));
			});
			jQuery('.summer-total-amount').text(summerSum);
			jQuery('.summer-total-amount').attr('id', summerSum);
			jQuery('.summer-total-amount').currency({decimals: 0});

			jQuery('.summer-field').each(function() {
				jQuery(this).keyup(function() {
					var summerTotal = 0;
					jQuery('.cost-amount-summer').each(function() {
						summerTotal += parseFloat(jQuery(this).attr('id'));
					});
					var initialstotal = jQuery('.summer-total-amount').attr('id');
					if (initialstotal == summerTotal) {
						jQuery('.s-personal-total').hide();
						jQuery('.s-max-total').hide();
					}
					else {
						jQuery('.s-personal-total').css('display','inline-block');
						jQuery('.s-max-total').show();
						jQuery('.s-personal-total-amount').attr("id", summerTotal);
						jQuery('.s-personal-total-amount').text(summerTotal);
						jQuery('.s-personal-total-amount').currency({decimals: 0});
					}
				});
			});



			jQuery('.add-more .field').each(function() {
				jQuery(this).keyup(function() {
					var addmoreTotal = 0;
					jQuery('.add-more .field').each(function() {
						if(!isNaN(this.value) && this.value.length!=0) {
							addmoreTotal += parseFloat(this.value);
						}
					});
					jQuery('.add-more-total').attr("id", addmoreTotal);
					var sum = 0;
					jQuery('.cost-amount').each(function() {
						sum += parseFloat(jQuery(this).attr('id'));
					});
					jQuery('.total-amount').text(sum + addmoreTotal);
					jQuery('.total-amount').currency({decimals: 0});
				});
			});
			});
		});
	});
});