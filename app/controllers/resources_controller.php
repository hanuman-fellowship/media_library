<?php
class ResourcesController extends AppController {

	var $name = 'Resources';
	var $components = array('Uploadify');
	var $paginate = array('limit' => 15, 'order' => array('Resource.filename' => 'asc'));

	function beforeFilter() {
		parent::beforeFilter();
//		$this->Auth->allowedActions = array('upload', 'show');
	}

	function upload() {
		$filename = $this->Uploadify->upload();
		echo $filename;
		if (!$this->Resource->findByFilename($filename)) {
			$this->Resource->create();
			$this->Resource->save(array('Resource' => 
				array('filename' => $filename)
			));
		}
		$this->autoRender = false;
	}


	function add() {
		if (!empty($this->data)) {
			$resource = $this->Resource->findByFilename($this->data['Resource']['filename']);
			$this->data['Resource']['id'] = $resource['Resource']['id'];
			if ($this->Resource->save($this->data)) {
				$this->redirect(array('action' => 'index'));
			}
		}
		$fileTypes = $this->Resource->FileType->find('list');
		$this->set('collections',$this->Resource->Collection->getOptions('disabled_parents'));
		$this->set(compact('fileTypes'));
	}

	function show() {
		$args = $this->passedArgs? $this->passedArgs : array(
			'ptype' => null,
			'dtype' => null,
			'product' => null
		);
		$this->set('resources', $this->Resource->filteredData($args));
		$productTypes = $this->Resource->ProductResource->Product->Category->find('list', array(
			'conditions' => array('Category.parent_id' => null)
		));
		$this->set('product_type_id', $args['ptype']);
		$this->set(compact('productTypes'));
		$documentTypes = $this->Resource->DocumentType->find('list');
		$this->set('document_type_id', $args['dtype']);
		$this->set(compact('documentTypes'));
		$this->Resource->ProductResource->Product->order = 'part_number asc';
		$products = $this->Resource->ProductResource->Product->find('list');
		$this->set('product_id', $args['product']);
		$this->set(compact('products'));
	}

	function index() {
		$this->Resource->recursive = 0;
		$this->set('resources', $this->paginate());
	}

	function edit($id = null) {
		$this->layout = 'admin';
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Resource->save($this->data)) {
				$this->Session->setFlash(__('The file has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The file could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Resource->read(null, $id);
		}
		$this->loadModel('Category');
		$this->set('product_list', $this->Category->relatedProductList());
		$documentTypes = $this->Resource->DocumentType->find('list');
		$this->set(compact('documentTypes'));
		$fileTypes = $this->Resource->FileType->find('list');
		$this->set(compact('fileTypes'));
		$this->set('related', $this->Resource->getRelated($id));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for product', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Resource->delete($id)) {
			$this->Session->setFlash(__('Resource deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Resource was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
