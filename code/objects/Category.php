<?php

class Category extends DataObject {

	static $db = array(
		'Title'			=> 'Varchar(100)',
		'Content'		=> 'HTMLText'
	);
	static $has_one = array(
		'Image'	=> 'Image'
	);
	static $has_many = array(
		'Products'	=> 'Product'
	);
	
	function canExport(){
		return true;	
	}
}