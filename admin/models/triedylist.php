<?php
defined('_JEXEC') or die('Access Deny');
jimport('joomla.application.component.modellist');

class AbsolventiModelTriedyList extends JModelList{

	public function __construct($config = array())
	{   
		$config['filter_fields'] = array('tr.id', 'tr.rok_nastupu', 'tr.rok_vystupu', 'uc.priezvisko');
		parent::__construct($config);
	}

	protected function populateState($ordering = null, $direction = null) {
		parent::populateState('id', 'ASC');
	}

	function getListQuery()
	{
		$query = parent::getListQuery();
 		$query
		    ->select('tr.id, tr.rok_nastupu, tr.rok_vystupu, tr.trieda, uc.meno, uc.priezvisko, tr.tablo_url')
		    ->from('#__absolventi_triedy as tr')
		    ->join('INNER', '#__absolventi_ucitelia as uc ON tr.triedny = uc.id')
		    ->order($this->getState('list.ordering', 'default_sort_column').' '.$this->getState('list.direction', 'ASC'));
	
		return $query;
	}

	
}