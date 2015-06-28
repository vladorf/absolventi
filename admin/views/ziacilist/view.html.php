<?php
defined('_JEXEC') or die('Access Deny');
jimport('joomla.application.component.view');

class AbsolventiViewZiaciList extends JViewLegacy{
	function display($tpl = null) 
	{
 		JToolBarHelper::Title('Trieda');
 		JToolBarHelper::addNew('ziaciForm.create');
 		JToolBarHelper::editList('ziaciForm.update');
 		JToolBarHelper::deleteList('Ozaj chcete zmazat tychto ziakov?','ziaciAdmin.delete');
 		$this->input = JFactory::getApplication()->input->getInt('trieda_id', 0);
 		$this->items = $this->get('Items');
 		parent::display($tpl);
	}
}