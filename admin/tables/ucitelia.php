<?php
defined('_JEXEC') or die('Access Deny');

class AbsolventiTableUcitelia extends JTable{
	
	function __construct(&$db){
		parent::__construct('#__absolventi_ucitelia', 'id', $db);
	}
	
}