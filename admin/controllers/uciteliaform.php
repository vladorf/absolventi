<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.controllerform');


class AbsolventiControllerUciteliaForm extends JControllerForm
{

	public function getModel($name = 'UciteliaAdmin', $prefix = 'AbsolventiModel', $config = array()) 
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}

	public function save(){
		parent::save();
		$this->setRedirect('index.php?option=com_absolventi&view=ucitelialist');
		$this->redirect;
	}

	function cancel($key = NULL){
		parent::cancel();
		$this->setRedirect('index.php?option=com_absolventi&view=ucitelialist');
		$this->redirect;
	}

}