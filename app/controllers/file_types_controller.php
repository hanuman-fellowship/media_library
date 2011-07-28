<?php
class FileTypesController extends AppController {

	var $name = 'FileTypes';

	function index() {
		$this->FileType->recursive = 0;
		$this->set('fileTypes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid file type', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('fileType', $this->FileType->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->FileType->create();
			if ($this->FileType->save($this->data)) {
				$this->Session->setFlash(__('The file type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The file type could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid file type', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->FileType->save($this->data)) {
				$this->Session->setFlash(__('The file type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The file type could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->FileType->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for file type', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->FileType->delete($id)) {
			$this->Session->setFlash(__('File type deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('File type was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
