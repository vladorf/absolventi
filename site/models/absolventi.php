<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.modeladmin');

class AbsolventiModelAbsolventi extends JModelAdmin
{
	public function getForm($data=array(),$loadData=true) 
	{
		$form=$this->loadForm('com_absolventi.absolventi','absolventi',array('control'=>'jform','load_data'=>$loadData));
		return $form;
	}

}
