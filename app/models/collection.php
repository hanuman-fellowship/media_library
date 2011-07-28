<?php
class Collection extends AppModel {
	var $name = 'Collection';
	var $displayField = 'title';
	var $actsAs = array('Tree');
	var $hasMany = array('Resource', 'Subscription');
	var $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a title',
			),
		),
	);

	function getList() {
		return $this->generatetreelist(null,'{n}.Collection.id','{n}.Collection.title','&nbsp;&nbsp;&nbsp;');
	}

	function getOptions($disabled_parents = false) {
		$collections = $this->getList();
		if ($disabled_parents) {
			foreach($collections as $id => $name) {
				if ($this->childCount($id) > 0) {
					$collections[$id] = array(
						'name' => $name,
						'value' => '',
						'disabled' => true
					);
				}
			}
		}
		return $collections;
	}

}
