<?php
defined('_JEXEC') or die('Acces Deny');
jimport('joomla.application.component.controller');
error_reporting(E_ALL);
ini_set('display_errors',1);

class AbsolventiController extends JControllerLegacy{
	
	function display($cachable = false, $urlparams = false){
		$input = JFactory::getApplication()->input;
		$input->set('view', $input->getCmd('view', 'triedyList')); 
		parent::display($cachable);
	}
}