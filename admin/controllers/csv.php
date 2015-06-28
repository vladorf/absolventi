<?php
defined('_JEXEC') or die('Acces Deny');
jimport('joomla.application.component.controller');
jimport( 'joomla.form.form' );

class AbsolventiControllerCsv extends JControllerAdmin
{
	function csv(){
		$form = $this->getModel('Csv', 'AbsolventiModel')->getForm();
		JToolBarHelper::title('Import CSV');
		JToolBarHelper::save('Csv.smt');
		echo "<form action='index.php?option=com_absolventi' method='post' name='adminForm' id='adminForm' enctype='multipart/form-data'>";
        	foreach($form->getFieldset() as $field){
            	echo "<dt>".$field->label."</dt>";
            	echo "<dd>".$field->input."</dd>";
        	}
        	echo "<input type='hidden' name='task' value='' />";
        	echo JHtml::_('form.token');
		echo "</form>";
	}

	function smt(){
		$form = $this->input->post->get('jform', array(), 'array')['table'];
		$file = $this->input->files->get('jform')['csv']['tmp_name'];
		$model = $this->getModel($form.'Admin', 'AbsolventiModel');
		$form1 = $model->getForm();
		$handle = fopen($file, "r");
    	while(($data = fgetcsv($handle, 1000, ",")) !== FALSE){
    		foreach($form1->getFieldset() as $field){
    			$pff[$field->fieldname] = current($data);
    			next($data);
    		}
    		$table = $model->getTable();
    		
    		$table->save($pff);
    		// echo $table->id;
    	}
	}
}