<?php
class Subscription extends AppModel {
	var $name = 'Subscription';
	var $belongsTo = array('User', 'Collection');
	var $validate = array(
		'user_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please choose a User',
			),
		),
		'collection_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please choose a Collection',
			),
		),
		'expiration_date' => array(
			'date' => array(
				'rule' => array('date'),
				'message' => 'Please select a valid date',
			),
		),
	);

}
