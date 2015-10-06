<?
$prices = simplify(load_tone_data('devices')->get(), 'cost', 'type');
$forms_steps = simplify(load_tone_data('forms')->get(), 'post_id', 'step');

$first_step_post = get_post($forms_steps->FIRST);
$second_step_post = get_post($forms_steps->SECOND);
?>
<script src="<? bloginfo('stylesheet_directory'); ?>/js/consistency_checker.js"></script>
<script>
	var $j = jQuery.noConflict();
	$j(function(){
		var prices = <?= json_encode($prices); ?>;

		function calcCosts(phones_qty) {
			var costs = {
				"phone_system": prices.PBX*1 + phones_qty*prices.PHONE,
				"installation": prices.INSTALLATION*1
			};
			costs.total = costs.phone_system + costs.installation;
			
			return costs;
		}
		
		function setCosts(costs) {
			$j('#phone-system-cost').html(costs.phone_system);
			$j('#installation-cost').html(costs.installation);
			$j('#total-cost').html(costs.total);
		}
		

		 	
		$j('.button-next').on('click', function(event) {
			var step = $j(this).parent().parent().attr('id').split('--')[1].split('-')[1];
			var next_step = step*1+1;
			
			event.preventDefault();
			$j('#phone-system-builder--step-' + next_step).show();
			$j('#phone-system-builder--step-' + step).hide();
		});
		
		$j('.button-prev').on('click', function(event) {
			var step = $j(this).parent().parent().attr('id').split('--')[1].split('-')[1];
			var prev_step = step*1-1;
			
			event.preventDefault();
			$j('#phone-system-builder--step-' + prev_step).show();
			$j('#phone-system-builder--step-' + step).hide();
		})
		
		$j('#phone-system-builder input[name=quantity]').on('change', function() {
			if ($j(this).val() > 100) { $j(this).val(100); }
			if ($j(this).val() < 1 ) { $j(this).val(1); }
			if (Math.ceil($j(this).val())-$j(this).val() > 0) { alert ('Please, type integer number'); $j(this).val(1); }
			
			setCosts(calcCosts($j(this).val()));
		})
		
		
		
		
		// Mail
		$j('.button-send').on('click', function(event) { 
			event.preventDefault();

			// Consistency check
			var verifable_elements = [
				{ 
					name: 'client_data[name]',
					value: $j('input[name="client_data[name]"]').val()
				},
				{ 
					name: 'client_data[phone]',
					value: $j('input[name="client_data[phone]"]').val()
				},
				{ 
					name: 'client_data[email]',
					value: $j('input[name="client_data[email]"]').val()
				}	
			];
			
			check_result = check(verifable_elements);
			if (!check_result.passed) {
				alert('Fill necessary fields please');
				markEmptyFields(check_result.error_fields);
				
				// Handler for unmark fields
				$j('.consistency-check-failed').on('change', function() {
					$j(this).removeClass('consistency-check-failed');
				});
				
				return false;
			}
			// End of check
			
									
			
			var data = $j('#phone-system-builder-form').serialize();
			var url = '<?= get_site_subfolder(); ?>/wp-admin/admin-ajax.php';

			$j('.buttons').html('');
			$j('.sending').html('<span>Sending email...</span>');
			$j.post(url, data, function(response) {
				if (response == 10 || response == 1) {
					$j('#phone-system-builder--step-1').hide();
					$j('#phone-system-builder--step-2').hide();
					$j('#phone-system-builder--step-3').hide();
					$j('#phone-system-builder--step-4').show();
					
					$j('#return-section')[0].click();
				}
			});
		});
	});
</script>
<style>

</style>

<div style="display: none;">
<div class="box-modal" id="phone-system-builder">



<form action="" method="post" id="phone-system-builder-form">
<div class="box-modal_close arcticmodal-close"><i class="fa fa-times-circle"></i></div>
	<input type="hidden" name="action" value="mail_report"></input>
	
	<div id="phone-system-builder--step-1">
		<span class="steps">Step 1 of 3</span>
		<h2>build your phone system now</h2>
		<span>Select how many phone devices do you need</span>
		<input name="quantity" type="number" step="1" value="1"></input>
		
		<div class="description-calc">
			<p><?= $first_step_post->post_content; ?></p>
		</div>
		<div class="calc-buttons">
			<button class="button-next">Next</button>
		</div>
	</div>
	
	<div style="display: none;" id="phone-system-builder--step-2">
		<span class="steps">Step 2 of 3</span>
		
		<table>
			<thead class="header-calculate">
				<tr>
					<th class="table-name-">Product Name</th>
					<th class="table-name-">Price</th>
				</tr>
			</thead>
			
			<tbody>
				<tr>
					<td>Phone system</td>
					<td id="phone-system-cost"><?= $prices->PBX + $prices->PHONE; ?><span> CAD</span></td>
				</tr>
				<tr>
					<td>Installation</td>
					<td id="installation-cost"><?= $prices->INSTALLATION*1; ?><span> CAD</span></td> 
				</tr>	
				<tr>
					<td>Total</td>
					<td id="total-cost"><?= $prices->PBX + $prices->PHONE + $prices->INSTALLATION; ?><span> CAD</span></td>
				</tr>		
			</tbody>
		</table>
		
		<div class="description-calc">
			<p><?= $second_step_post->post_content; ?></p>
		</div>
		
		<div class="calc-buttons">
			<button class="button-prev">Prev</button>
			<button class="button-no box-modal_close arcticmodal-close">No, thanks</button>
			<button class="button-next">Send Request</button>
		</div>
	</div>
	
	<div style="display: none;" id="phone-system-builder--step-3">
		<span class="steps">Step 3 of 3</span>
		
		<h2>Complete the contact form</h2>
		<div class="calc-contact-form">
			<div class="calc-form-n first-row"><input class="calc-form-name" name="client_data[name]" type="text" placeholder="Name"></input></div>
			<div class="calc-form-n first-row"><input class="calc-form-mail" name="client_data[email]" type="email" placeholder="E-Mail"></input></div>
			<div class="calc-form-n"><input class="calc-form-phone" name="client_data[phone]" type="tel" placeholder="Contact Phone Number"></input></div>
			
			<div class="calc-form-n"><input class="calc-form-comp-name" name="client_data[company]" type="text" placeholder="Company Name"></input></div>
			<div class="calc-form-n"><input class="calc-form-web" name="client_data[site]" type="url" placeholder="Website"></input></div>
		</div>
		
		<div class="calc-buttons">
			<button class="buttons button-prev">Prev</button>
			<button class="buttons button-send">Send</button>
			<div class="sending"></div>
		</div>
	</div>
	
	<div style="display: none;" id="phone-system-builder--step-4">
		<div class="calc-final-wrapper">
			<span>Your request has been send successfully.</span> 
			<p>We also offer our high quality services for your phone system</p>
			
			<span class="menu-item"><a style="display:none;" href="#price-block" id="return-section"></a></span>
			<span><a class="calc-fin-button box-modal_close arcticmodal-close" href="http://sites.qcldev.ru/lp/#price-block">to find out please click here <i class="fa fa-chevron-circle-right"></i> </a></span>
		</div>
	</div>
</form>



</div>
</div>
