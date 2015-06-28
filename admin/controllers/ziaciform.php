<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.controllerform');


class AbsolventiControllerZiaciForm extends JControllerForm
{

	public function getModel($name = 'ZiaciAdmin', $prefix = 'AbsolventiModel', $config = array()) 
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}

	function create(){
		JToolBarHelper::Title('Trieda');
 		JToolBarHelper::save('ziaciForm.save');
 		$this->input = JFactory::getApplication()->input->getInt('trieda_id', 0);
 		$model = $this->getModel();
 		$form = $model->getForm();
 		$form->setValue('trieda', null, $this->input);
 		echo "<form action='index.php?option=com_absolventi&trieda_id=$this->input' method='post' name='adminForm' id='adminForm'>";
        	foreach($form->getFieldset() as $field){
            	echo "<dt>".$field->label."</dt>";
            	echo "<dd>".$field->input."</dd>";
        	}
        	echo "<input type='hidden' name='task' value='' />";
        	echo JHtml::_('form.token');
		echo "</form>";
 		
	}
	public function save($key = null, $urlVar = null){
		parent::save($key = null, $urlVar = null);
		// $this->input = $this->input->post->get('ziak_id', 0, 'int');
		// echo $this->input;
		$this->input = JFactory::getApplication()->input->getInt('trieda_id', 0);
		$this->setRedirect(JRoute::_('index.php?option=com_absolventi&view=ziacilist&trieda_id='.$this->input, false));
		$this->redirect;
	}
	function update(){
		JToolBarHelper::Title('Trieda');
 		JToolBarHelper::save('ziaciForm.edit');
 		$this->input= JFactory::getApplication()->input->get('cid', array(), 'array');
		jimport('joomla.utilities.arrayhelper');
		JArrayHelper::toInteger($this->input);
 		// $input = JFactory::getApplication()->input->getInt('ziak_id', 0);
 		$model = $this->getModel();
 		$form = $model->getForm();
 		$table = $model->getTable();
 		$table->load($this->input[0]);
 		$form->setValue('meno', null, $table->meno);
		$form->setValue('priezvisko', null, $table->priezvisko);
		$form->setValue('trieda', null, $table->trieda);
 		echo "<form action='index.php?option=com_absolventi' method='post' name='adminForm' id='adminForm'>";
        	foreach($form->getFieldset() as $field){
            	echo "<dt>".$field->label."</dt>";
            	echo "<dd>".$field->input."</dd>";
        	}
        	echo "<input type='hidden' name='task' value='' />";
        	echo "<input type='hidden' name='trieda_id' value=".$this->input[0]."/>"; 
        	echo JHtml::_('form.token');
		echo "</form>";
	}

	public function edit($key = null, $urlVar = null){
		$input= JFactory::getApplication()->input->getCmd('ziak_id', 0);
		$model = $this->getModel();
		$table = $model->getTable();
		$table->load($input);
		// print_r($table);
		print_r($form = $this->input->post->get('jform', array(), 'array'));
		$table->bind($this->input->post->get('jform', array(), 'array'));
		$table->store();
		$this->setRedirect('index.php?option=com_absolventi', 'Done');
		$this->redirect;
	} // dako lepsie poriesit treba
	
	function delete(){
		$cid = JFactory::getApplication()->input->get('cid', array(), 'array');
		print_r($cid);
	}
	
}
// zrusit redirecty pouzit nativne redirecty