<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.modeladmin');

class AbsolventiModelTriedyAdmin extends JModelAdmin
{
	public function getTable($type='Triedy',$prefix='AbsolventiTable',$config=array())
	{
		return JTable::getInstance($type,$prefix,$config);	
	}

	public function getForm($data=array(),$loadData=true) 
	{
		$form=$this->loadForm('com_absolventi.vytvortriedu','vytvortriedu',array('control'=>'jform','load_data'=>$loadData));
		return $form;
	}

	public function getFormUpdate($data=array(),$loadData=true) 
	{
		$form=$this->loadForm('com_absolventi.upravtriedu','upravtriedu',array('control'=>'jform','load_data'=>$loadData));
		return $form;
	}

}
