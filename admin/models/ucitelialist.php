<?php
defined('_JEXEC') or die('Access Deny');
jimport('joomla.application.component.modellist');

class AbsolventiModelUciteliaList extends JModelList{

	public function __construct($config = array())
	{   
		$config['filter_fields'] = array('id', 'meno', 'priezvisko');
		parent::__construct($config);
	}

	protected function populateState($ordering = null, $direction = null) {
		parent::populateState('id', 'ASC');
	}

	function getListQuery(){	
		$query = parent::getListQuery();
 		$query
		    ->select('id, meno ,priezvisko')
		    ->from('#__absolventi_ucitelia')
		    ->order($this->getState('list.ordering','default_sort_column').' '.$this->getState('list.direction','ASC'));
	
		return $query;
	}

	
}