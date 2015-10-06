<br clear="all" />

<h3>Forms Posts</h3>
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
					<th>Step</th>
					<th>Post</th>
				</tr>
		</thead>

		<tbody>
			<? foreach ($forms as $i=>$form) { ?>							
				<tr class="<?= (($i%2 == 0) ? 'alternate' : ''); ?>">
					<input type="hidden" name="forms[<?= $i ?>][id]" value="<?= $form->id; ?>"></input>
					
					<td><?= $form->step; ?></td>
					<td>
						<select name="forms[<?= $i ?>][post_id]">
							<? foreach ($posts as $post) { ?>
								<option 
										<?= ($post->ID == $form->post_id ? 'selected="selected"' : ''); ?>
										value="<?= $post->ID; ?>"
									>
									<?= $post->post_title; ?>
								</option>
							<? } ?>						
						</select>
					</td>
				</tr>
			<? } ?>
		</tbody>
	</table>
	
	<div class="tablenav bottom">
		<button class="button">Save</button>
	</div>
</form>
