<?php
defined('_JEXEC') or die('Access Deny');
jimport('joomla.application.component.view');

class AbsolventiViewUciteliaList extends JViewLegacy{
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
 		JToolbarHelper::Title('Ucitelia');
 		JToolbarHelper::addNew('uciteliaAdmin.vytvorUcitela');
 		JToolbarHelper::editList('uciteliaAdmin.update');
 		JToolBarHelper::deleteList('Are you sure you want to delete this Site Table?', 'uciteliaAdmin.delete');
	}
}