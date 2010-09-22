<?php

class OrderItem extends DataObject {

	static $db = array(
		'Title'			=> 'Varchar(100)'				   
	);
	
	static $has_one = array(
		'Product'	=> 'Product'
	);
	
	function getCMSActions() {
		$a = parent::getCMSActions();
		
			$a->push(new FormAction("sendmail", _t('Silverlist.SENDMAIL', "Verzend Mailing"), '', '', 'email'));
			$a->push(new FormAction("preview", _t('Silverlist.SENDMAIL', "Bekijk voorbeeld"), '', '', 'preview'));
		
		return $a;	
	}
}