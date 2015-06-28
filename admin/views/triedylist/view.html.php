<?php
defined('_JEXEC') or die('Access Deny');
jimport('joomla.application.component.view');

class AbsolventiViewTriedyList extends JViewLegacy{
	function display($tpl = null) 
	{
		// Get data from the model
		$this->state = $this->get('State');
		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');

		$this->addToolbar();
 		
		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		// Display the template
		parent::display($tpl);
	}

	public function addToolbar(){
 		JToolbarHelper::Title('Absolventi - Triedy');
 		JToolbarHelper::addNew('triedyAdmin.vytvorTriedu');
 		JToolbarHelper::editList('triedyAdmin.upravTriedu');
 		JToolBarHelper::deleteList('Are you sure you want to delete this Site Table?', 'triedyAdmin.delete');
 		JToolbarHelper::back('Ucitelia','index.php?option=com_absolventi&view=ucitelialist');
 		JToolbarHelper::back('CSV','index.php?option=com_absolventi&task=csv.csv');
	}
}