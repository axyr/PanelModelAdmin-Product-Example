<?php

class Product extends DataObject {

	static $db = array(
		'Title'			=> 'Varchar(100)',
		'Price'			=> 'Varchar(20)'
	);
	
	static $has_one = array(
		'Category'	=> 'Category'
	);
	
	static $summary_fields = array(
		'Title' 	=> 'Title',
		'Price' 	=> 'Price'
	);
	static $searchable_fields = array(
		'Title',
		'Price',
		'CategoryID' => 'ExactMatchFilter'
	);
	
	static $admin_table_field = 'TableField';
	static $admin_parent_class = 'Category';
	
	function canExport(){
		return true;	
	}
	function canView(){
		return true;	
	}
	function canEdit(){
		return true;	
	}
	function canDelete(){
		return true;	
	}
	function canCreate(){
		return true;	
	}
	function canPrint(){
		return false;	
	}
	function getCMSActions() {
		$a = parent::getCMSActions();
		if($this->ID){
			$a->push(new FormAction("editcategoryinline", 'Edit Category Inline', '', '', 'pma rightpane edit'));
			$a->push(new FormAction("editcategory", 'Edit Category in Popup', '', '', 'pma popup'));
		}
		return $a;	
	}
	
	function ModelAdminResultsForm(){
		
	}
}