<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
$listOrder=$this->escape($this->state->get('list.ordering'));
$orderDirn=$this->escape($this->state->get('list.direction'));
JHtml::_('behavior.tooltip');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('dropdown.init');
JHtml::_('formbehavior.chosen', 'select');
?>
<form action="index.php?option=com_absolventi&view=ucitelialist" method="post" name="adminForm" id="adminForm">
	<table class="table table-striped">
		<thead>
			<tr>
				<th width="20"><?php echo JHtml::_('grid.checkall'); ?></th>
				<th><?php echo JHtml::_('grid.sort','ID','id',$orderDirn,$listOrder);?></th>
				<th><?php echo JHtml::_('grid.sort','Meno','meno',$orderDirn,$listOrder);?></th>
				<th><?php echo JHtml::_('grid.sort','Priezvisko','priezvisko',$orderDirn,$listOrder);?></th>
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

		<tfoot>
			<tr>
				<td colspan="4"><?php echo $this->pagination->getListFooter(); ?></td>
				
			</tr>
		</tfoot>

	</table>
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
    <?php echo JHtml::_('form.token'); ?>
</form>