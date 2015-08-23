<div class="stores form">
<?php echo $this->Form->create('Store'); ?>
	<fieldset>
		<legend><?php echo __('Add Store'); ?></legend>
	<?php
		echo $this->Form->input('store_name');
		echo $this->Form->input('extra');
		echo $this->Form->input('code');
		echo $this->Form->input('street_address');
		echo $this->Form->input('locality');
		echo $this->Form->input('region');
		echo $this->Form->input('postal_code');
		echo $this->Form->input('mon_hrs');
		echo $this->Form->input('tue_hrs');
		echo $this->Form->input('wed_hrs');
		echo $this->Form->input('thu_hrs');
		echo $this->Form->input('fri_hrs');
		echo $this->Form->input('sat_hrs');
		echo $this->Form->input('sun_hrs');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Stores'), array('action' => 'index')); ?></li>
	</ul>
</div>
