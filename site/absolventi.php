<?php
ini_set('display_errors',true);  error_reporting( E_ALL ); 

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// Get an instance of the controller prefixed by HelloWorld
$controller = JControllerLegacy::getInstance('Absolventi');
 
// Perform the Request task
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));
 
// Redirect if set by the controller
$controller->redirect();