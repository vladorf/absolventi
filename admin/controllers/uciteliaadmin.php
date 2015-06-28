<?php
defined('_JEXEC') or die('Acces Deny');
jimport('joomla.application.component.controller');

class AbsolventiControllerUciteliaAdmin extends JControllerAdmin
{
	
	public function getModel($name = 'UciteliaAdmin', $prefix = 'AbsolventiModel', $config = array()) 
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}

	public function delete(){
		parent::delete();
		$this->setRedirect(JRoute::_('index.php?option=com_absolventi&view=ucitelialist', false));
		$this->redirect;
	}

	function vytvorUcitela(){
		$model = $this->getModel();
		$form = $model->getForm();

		JToolBarHelper::Title('Ucitel - new');
		JToolBarHelper::save('uciteliaForm.save');
		JToolBarHelper::cancel('uciteliaForm.cancel');
		
		echo "<form action='index.php?option=com_absolventi' method='post' name='adminForm' id='adminForm' enctype='multipart/form-data'>";
        	foreach($form->getFieldset() as $field){
            	echo "<dt>".$field->label."</dt>";
            	echo "<dd>".$field->input."</dd>";
        	}
        	echo "<input type='hidden' name='task' value='' />";
        	echo JHtml::_('form.token');
		echo "</form>";
	}

	function update(){
		JToolBarHelper::Title('Trieda');
 		JToolBarHelper::save('uciteliaAdmin.edit');
 		$this->input= JFactory::getApplication()->input->get('cid', array(), 'array');
		// jimport('joomla.utilities.arrayhelper');
		// JArrayHelper::toInteger($this->input);
 		// $input = JFactory::getApplication()->input->getInt('ziak_id', 0);
 		$model = $this->getModel();
 		$form = $model->getForm();
 		$table = $model->getTable();
 		$table->load($this->input[0]);
 		$form->setValue('meno', null, $table->meno);
		$form->setValue('priezvisko', null, $table->priezvisko);
 		echo "<form action='index.php?option=com_absolventi' method='post' name='adminForm' id='adminForm'>";
        	foreach($form->getFieldset() as $field){
            	echo "<dt>".$field->label."</dt>";
            	echo "<dd>".$field->input."</dd>";
        	}
        	echo "<input type='hidden' name='task' value='' />";
        	echo "<input type='hidden' name='ucitel_id' value=".$this->input[0]." />";
        	echo JHtml::_('form.token');
		echo "</form>";
	}

	public function edit($key = null, $urlVar = null){
		$input= JFactory::getApplication()->input->post->get('ucitel_id', 'int', 0);
		$model = $this->getModel();
		$table = $model->getTable();
		$table->load($input);
		// print_r($table);
		// print_r($form = $this->input->post->get('jform', array(), 'array'));
		$table->bind($this->input->post->get('jform', array(), 'array'));
		$table->store();
		$this->setRedirect('index.php?option=com_absolventi&view=ucitelialist', 'Done');
		$this->redirect;
	} // dako lepsie poriesit treba

}