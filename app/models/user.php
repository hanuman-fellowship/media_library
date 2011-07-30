<?php
class User extends AppModel {
	var $name = 'User';
	var $displayField = 'username';
	var $hasMany = array('Subscription');
	var $validate = array(
		'first' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a first name',
			),
		),
		'last' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a last name',
			),
		),
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a username',
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a password',
			),
		),
	);
}
