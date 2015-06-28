<?php
defined('_JEXEC') or die('Acces Deny');
jimport('joomla.application.component.controllerform');
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');
if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);

class AbsolventiControllerTriedyForm extends JControllerForm
{

	public function getModel($name = 'TriedyAdmin', $prefix = 'AbsolventiModel', $config = array()) 
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}

	public function save($key = null, $urlVar = null){
		// print_r($this);
		$file = $this->input->files->get('jform')['tablo_url'];
		$form = $this->input->post->get('jform', array(), 'array');
		//pridanie nazvu suboru do zapisu
		$this->input->post->set('jform', array_merge($form, array('tablo_url' => $file['name'])));
		// upload suboru
		if(!$this->upload($file)){
			echo JText::_( 'ERROR MOVING FILE' );
		}

		parent::save($key = null, $urlVar = null);

		$this->setRedirect('index.php?option=com_absolventi');
		$this->redirect;
	}

	function upload($file){
		$uploadPath = JPATH_ROOT .DS. 'images' .DS. 'tablo' .DS. $file['name'];

		if(!JFile::upload($file['tmp_name'], $uploadPath)){
			
        	return False;
		}
	}
	
	function cancel($key = NULL){
		parent::cancel();
		$this->setRedirect('index.php?option=com_absolventi');
		$this->redirect;
	}

	public function edit($key = null, $urlVar = null){
		$input = $this->input->post->get('trieda_id', 0, 'int');
		$file = $this->input->files->get('jform')['tablo_url']['name'];
		$form = $this->input->post->get('jform', array(), 'array');
		if($file){
			$this->input->post->set('jform', array_merge($form, array('tablo_url' => $file)));
		}
		$table = $this->getModel()->getTable();
		$table->load($input);
		$table->bind($this->input->post->get('jform', array(), 'array'));
		$table->store();
		$this->setRedirect('index.php?option=com_absolventi', 'Done');
		$this->redirect;
	} // dako lepsie poriesit treba
}
