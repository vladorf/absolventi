<?php
defined('_JEXEC') or die('Access Deny');
ini_set('display_errors',true);  error_reporting( E_ALL ); 
jimport('joomla.application.component.view');

class AbsolventiViewAbsolventi extends JViewLegacy
{
	function display($tpl = null)
	{
		$this->form = $this->get('Form');
		parent::display($tpl);
	}
}
