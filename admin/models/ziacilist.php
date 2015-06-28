<?php
defined('_JEXEC') or die('Access Deny');
jimport('joomla.application.component.modellist');

class AbsolventiModelZiaciList extends JModelList{

	function getListQuery(){
		$db = $this -> getDbo();		
		$query = parent::getListQuery();
		$input = JFactory::getApplication()->input->getInt('trieda_id', 0);
 		$query
		    ->select('id, meno ,priezvisko')
		    ->from('#__absolventi_ziaci')
		    ->where('trieda' . ' = '. $input);
	
		return $query;
	}

	
}