<?php
class Resource extends AppModel {
	var $name = 'Resource';
	var $belongsTo = array('Collection');
	var $validate = array(
		'file_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	function beforeDelete() {
		unlink(APP . 'files' . DS . 'resources' . DS . $this->field('filename', array('Resource.id' => $this->id)));
		return true;
	}

}
