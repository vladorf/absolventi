<?php
defined('_JEXEC') or die('Access Deny');

class AbsolventiTableTriedy extends JTable{
	
	function __construct(&$db){
		parent::__construct('#__absolventi_triedy', 'id', $db);
	}
	
}