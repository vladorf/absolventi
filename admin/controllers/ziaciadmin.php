<?php
defined('_JEXEC') or die('Acces Deny');
jimport('joomla.application.component.controller');

class AbsolventiControllerZiaciAdmin extends JControllerAdmin
{
	
	public function getModel($name = 'ZiaciAdmin', $prefix = 'AbsolventiModel', $config = array()) 
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}

	public function delete(){
		parent::delete();
		$this->input = $this->input->post->get('trieda_id', 0, 'int');
		$this->setRedirect(JRoute::_('index.php?option=com_absolventi&view=ziacilist&trieda_id='.$this->input, false));
		$this->redirect;
	}
}