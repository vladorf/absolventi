<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.modeladmin');

class AbsolventiModelZiaciAdmin extends JModelAdmin
{
	public function getTable($type='Ziaci',$prefix='AbsolventiTable',$config=array())
	{
		return JTable::getInstance($type,$prefix,$config);	
	}

	public function getForm($data=array(),$loadData=true) 
	{
		$form=$this->loadForm('com_absolventi.ziaci','ziaci',array('control'=>'jform','load_data'=>$loadData));
		return $form;
	}
}