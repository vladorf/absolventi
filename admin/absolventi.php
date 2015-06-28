<?php
ini_set('display_errors',true);  error_reporting( E_ALL );  
defined('_JEXEC') or die('Acces Deny');
jimport('joomla.application.component.controller');

$controller = JControllerLegacy::getInstance('Absolventi');
$controller->execute(JFactory::getApplication()->input->getCmd('task'));
$controller->redirect();