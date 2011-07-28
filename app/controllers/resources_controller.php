<?php
class ResourcesController extends AppController {

	var $name = 'Resources';

	function index() {
		$this->Resource->recursive = 0;
		$this->set('resources', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid resource', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('resource', $this->Resource->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Resource->create();
			if ($this->Resource->save($this->data)) {
				$this->Session->setFlash(__('The resource has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resource could not be saved. Please, try again.', true));
			}
		}
		$fileTypes = $this->Resource->FileType->find('list');
		$collections = $this->Resource->Collection->find('list');
		$this->set(compact('fileTypes', 'collections'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid resource', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Resource->save($this->data)) {
				$this->Session->setFlash(__('The resource has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resource could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Resource->read(null, $id);
		}
		$fileTypes = $this->Resource->FileType->find('list');
		$collections = $this->Resource->Collection->find('list');
		$this->set(compact('fileTypes', 'collections'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for resource', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Resource->delete($id)) {
			$this->Session->setFlash(__('Resource deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Resource was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
