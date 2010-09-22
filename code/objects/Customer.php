<?php

class Customer extends DataObject {

	static $db = array(
		'Name'			=> 'Varchar(100)'				   
	);
	
	static $has_many = array(
		'OrderItems'	=> 'OrderItem'
	);
}