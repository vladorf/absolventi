<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
$listOrder=$this->escape($this->state->get('list.ordering'));
$orderDirn=$this->escape($this->state->get('list.direction'));

// load tooltip behavior
//JHtml::_('behavior.formvalidation');
JHtml::_('behavior.tooltip');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');
?>
<form action="<?php echo JRoute::_('index.php?option=com_absolventi'); ?>" method="post" id="adminForm" name="adminForm">
	<table class="table table-striped"  >
		<thead>
			<tr>
				<th width="20"><?php echo JHtml::_('grid.checkall'); ?></th>
				<th><?php echo JHtml::_('grid.sort','ID','tr.id',$orderDirn,$listOrder);?></th>
				<th><?php echo JHtml::_('grid.sort','Rok Nastupu','tr.rok_nastupu',$orderDirn,$listOrder);?></th>
				<th><?php echo JHtml::_('grid.sort','Rok Vystupu','tr.rok_vystupu',$orderDirn,$listOrder);?></th>
				<th>Triedy</th>
				<th><?php echo JHtml::_('grid.sort','Ucitel','uc.priezvisko',$orderDirn,$listOrder);?></th>
				<th>Tablo</th>
				<th>Zobraz triedy</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach($this->items as $i => $item): ?>
				<tr class="row<?php echo $i % 2; ?>">
					<td><?php echo JHtml::_('grid.id', $i, $item->id); ?></td>
					<td><?php echo $item->id; ?></td>
					<td><?php echo $item->rok_nastupu; ?></td>
					<td><?php echo $item->rok_vystupu; ?></td>
					<td><?php echo $item->trieda; ?></td>
					<td><?php echo $item->meno." ".$item->priezvisko; ?></td>
					<?php if($item->tablo_url) echo "<td>$item->tablo_url</td>"; else echo "<td>No Tablo</td>";?>
					<td><a href="index.php?option=com_absolventi&view=ziacilist&trieda_id=<?php echo $item->id; ?>">Zobraz triedu</td>
			<?php endforeach; ?>
		</tbody>

		<tfoot>
			<tr>
				<td colspan="4"><?php echo $this->pagination->getListFooter(); ?></td>
				
			</tr>
		</tfoot>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $orderDirn; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</table>
</form>