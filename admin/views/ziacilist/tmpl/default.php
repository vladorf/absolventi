<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
JHtml::_('behavior.tooltip');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('dropdown.init');
JHtml::_('formbehavior.chosen', 'select');
?>
<form action="index.php?option=com_absolventi&trieda_id=<?php echo $this->input;?>" method="post" name="adminForm" id="adminForm">
	<table class="table table-striped">
		<thead>
			<tr>
				<th width="20"><?php echo JHtml::_('grid.checkall'); ?></th>
				<th>id</th>
				<th>meno</th>
				<th>priezvisko</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach($this->items as $i => $item): ?>
				<tr class="row<?php echo $i % 2; ?>">
					<td><?php echo JHtml::_('grid.id', $i, $item->id); ?></td>
					<td><?php echo $item->id; ?></td>
					<td><?php echo $item->meno; ?></td>
					<td><?php echo $item->priezvisko; ?></td>
			<?php endforeach; ?>
		</tbody>
	</table>
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="trieda_id" value="<?php echo $this->input; ?>" />
    <?php echo JHtml::_('form.token'); ?>
</form>