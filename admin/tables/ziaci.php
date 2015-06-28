<?php
defined('_JEXEC') or die('Access Deny');

class AbsolventiTableZiaci extends JTable{
	
	function __construct(&$db){
		parent::__construct('#__absolventi_ziaci', 'id', $db);
	}
	
}