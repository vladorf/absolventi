<?php
ini_set('display_errors',true);  error_reporting( E_ALL ); 
defined('_JEXEC') or die('Access Deny');
jimport('joomla.application.component.controller');

class AbsolventiController extends JControllerLegacy
{
	function getData(){
		$db = JFactory::getDbo();
		$jform = $this->input->get('jform', array(), 'array');

		$query = $db->getQuery(true);
		$query
			->select('zc.meno, zc.priezvisko, uc.meno as ucmeno, uc.priezvisko as ucpriezvisko, tr.rok_nastupu, tr.rok_vystupu, tr.trieda, tr.tablo_url')
			->from('#__absolventi_ziaci as zc')
			->join('INNER', '#__absolventi_triedy as tr ON tr.id = zc.trieda')
			->join('INNER', '#__absolventi_ucitelia as uc ON uc.id = tr.triedny')
			->where('(zc.meno LIKE "%'.$jform['name'].'%" OR zc.priezvisko LIKE "%'.$jform['name'].'%")');

        if ($jform['ucitel']) $query->where('uc.id = '.$jform['ucitel']);
        if ($jform['rok_nastupu']) $query->where('tr.rok_nastupu = '.$jform['rok_nastupu']);
        if ($jform['rok_vystupu']) $query->where('tr.rok_vystupu = '.$jform['rok_vystupu']);
        if ($jform['trieda']) $query->where('tr.trieda = \''.$jform['trieda'].'\'');
		$db->setQuery($query);
		$db->query();
        
        $view = $this->getView('Absolventi', 'html', 'AbsolventiView');
        $view->pocet = $db->getNumRows();
		$view->results = $db->loadObjectList();
        $view->display('tabulka');
	}
}
?>
