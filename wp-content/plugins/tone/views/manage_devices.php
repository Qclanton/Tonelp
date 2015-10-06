<br clear="all" />

<h3>Prices</h3>
<form action="" method="post">
	<input type="hidden" name="action" value="set"></input>
	<input type="hidden" name="layout" value="<?= $layout; ?>"></input>

	<? if ($result != 'none') { ?>			
		<div style="color: <?= ($result=='success' ? 'green' : 'red') ?>;" class="message-wrapper">
			Data saved <?= ($result=='success' ? '' : 'un') ?>successfully
		</div>
	<? } ?>
	

	<table class="widefat">
		<thead>
				<tr>
					<th>Type</th>
					<th>Price</th>
				</tr>
		</thead>
		
		<tbody>
			<? foreach ($devices as $i=>$device) { ?>							
				<tr class="<?= (($i%2 == 0) ? 'alternate' : ''); ?>">
					<input type="hidden" name="devices[<?= $i; ?>][id]" value="<?= $device->id; ?>"></input>
					
					<td><?= $device->type; ?></td>
					<td><input type="text" name="devices[<?= $i; ?>][cost]" value="<?= $device->cost; ?>"></input></td>
				</tr>
			<? } ?>
		</tbody>
	</table>
	
	<div class="tablenav bottom">
		<button class="button">Save</button>
	</div>
</form>
