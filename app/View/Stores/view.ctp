<div class="stores view">
<h2><?php echo __('Store'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($store['Store']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Store Name'); ?></dt>
		<dd>
			<?php echo h($store['Store']['store_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Extra'); ?></dt>
		<dd>
			<?php echo h($store['Store']['extra']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($store['Store']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street Address'); ?></dt>
		<dd>
			<?php echo h($store['Store']['street_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Locality'); ?></dt>
		<dd>
			<?php echo h($store['Store']['locality']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Region'); ?></dt>
		<dd>
			<?php echo h($store['Store']['region']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Postal Code'); ?></dt>
		<dd>
			<?php echo h($store['Store']['postal_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mon Hrs'); ?></dt>
		<dd>
			<?php echo h($store['Store']['mon_hrs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tue Hrs'); ?></dt>
		<dd>
			<?php echo h($store['Store']['tue_hrs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wed Hrs'); ?></dt>
		<dd>
			<?php echo h($store['Store']['wed_hrs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Thu Hrs'); ?></dt>
		<dd>
			<?php echo h($store['Store']['thu_hrs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fri Hrs'); ?></dt>
		<dd>
			<?php echo h($store['Store']['fri_hrs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sat Hrs'); ?></dt>
		<dd>
			<?php echo h($store['Store']['sat_hrs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sun Hrs'); ?></dt>
		<dd>
			<?php echo h($store['Store']['sun_hrs']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Store'), array('action' => 'edit', $store['Store']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Store'), array('action' => 'delete', $store['Store']['id']), array(), __('Are you sure you want to delete # %s?', $store['Store']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Stores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store'), array('action' => 'add')); ?> </li>
	</ul>
</div>
