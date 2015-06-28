<?php
defined('_JEXEC') or die('Acces Deny');
jimport('joomla.application.component.controller');

class AbsolventiControllerTriedyAdmin extends JControllerAdmin
{
	
	public function getModel($name = 'TriedyAdmin', $prefix = 'AbsolventiModel', $config = array()) 
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}

	function ucitelia(){
		$this->setRedirect('index.php?option=com_absolventi&view=ucitelialist');
		$this->redirect();
	}

	function vytvorTriedu(){
		$model = $this->getModel();
		$form = $model->getForm();

		JToolBarHelper::Title('Trieda - new');
		JToolBarHelper::save('triedyForm.save');
		JToolBarHelper::cancel('triedyForm.cancel');
		
		echo "<form action='index.php?option=com_absolventi' method='post' name='adminForm' id='adminForm' enctype='multipart/form-data'>";
        	foreach($form->getFieldset() as $field){
            	echo "<dt>".$field->label."</dt>";
            	echo "<dd>".$field->input."</dd>";
        	}
        	echo "<input type='hidden' name='task' value='' />";
        	echo JHtml::_('form.token');
		echo "</form>";
	}

	function delete(){
		parent::delete();
		$this->setRedirect('index.php?option=com_absolventi');
		$this->redirect;
	}

	function upravTriedu($tpl = null){
		JToolBarHelper::Title('Trieda - update');
		JToolBarHelper::save('triedyForm.edit');
		
		$this->input= JFactory::getApplication()->input->get('cid', array(), 'array');
		
		jimport('joomla.utilities.arrayhelper');
		JArrayHelper::toInteger($this->input);
		$model = $this->getModel();
		$table = $model->getTable();
		$this->form = $model->getFormUpdate();
		$table->load($this->input[0]);
		
		// $this->form->setValue('rok_nastupu', null, $table->rok_nastupu);
		// $this->form->setValue('rok_vystupu', null, $table->rok_vystupu);
		// $this->form->setValue('trieda', null, $table->trieda);
		// $this->form->setValue('triedny', null, $table->triedny);
		$this->form->bind($table);

		echo "<form action='index.php?option=com_absolventi' method='post' name='adminForm' id='adminForm' enctype='multipart/form-data'>";
        	foreach($this->form->getFieldset() as $field){
            	echo "<dt>".$field->label."</dt>";
            	echo "<dd>".$field->input."</dd>";
        	}
        	echo "<input type='hidden' name='task' value='' />";
        	echo "<input type='hidden' name='trieda_id' value=".$this->input[0].">";
        	echo JHtml::_('form.token');
		echo "</form>";
		
	}



	
}
