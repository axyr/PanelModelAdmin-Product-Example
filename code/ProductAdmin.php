<?php

class ProductAdmin extends PanelModelAdmin{
	
	static $url_segment 	= 'panelmodeladmin';
	static $menu_title 		= 'My Product Admin';
	static $page_length 	= 5;
	static $default_model 	= 'Product';	
	
	static $managed_models =array(
		'Product',
		'Category',
		'OrderItem',
		'Customer'
	);
	
	public static $allowed_actions = array(
		'editcategory',
		'editcategoryinline'
	);

	function init(){
		 
		parent::init();
		Requirements::block('sapphire/thirdparty/jquery-ui-themes/base/jquery-ui-1.8rc3.custom.css');
		
		Requirements::css('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/base/jquery-ui.css');
		Requirements::javascript('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js');
		
		/**
		 * Add some multiple panels.
		 */
		$this->addPanels(array(
			'SearchPanel' 	=> new ModelAdminSearchPanel('Search Products', 'open', array('Product')),
			'MenuPanel' 	=> new ModelAdminMenuPanel('Customers', 'closed', array('Customer'))
		));
		
		/**
		 * Add a single panel and set an option first
		 */
		$panel = new ModelAdminSearchPanel('Search Customers', 'closed', array('Customer'));
		$panel->canView(true);
		$this->addPanel('SearchPanel2', $panel, 'SearchPanel');
		
		/**
		 * Add a nested panel with a parent and some children
		 */
		$this->addPanel('MenuPanel4', new CategoryMenuPanel('Products', 'open', array(
				'Category' => array('Product','OrderItem') // RootItems => ChildItems
			)
		), 'MenuPanel');
		
		$panel = new RSSPanel('CNN Business', 'open');
		$panel->setFeed('http://rss.cnn.com/rss/edition_business.rss');
		$this->addPanel('CNNBusiness', $panel);
		
		/**
		 * Remove a panel
		 */
		#$this->removePanelByName('MenuPanel');
		
	}
	
	/**
	 * Some custom methods defined in Product.php
	 */
	function editcategory($request){
		$id = $request->postVar('CategoryID');	
		return $this->getRecordController($request,'Category', $id)->edit($request);
	}
	
	function editcategoryinline($request){
		$id = $request->postVar('CategoryID');
		return $this->getRecordController($request,'Category', $id)->edit($request);
	}
}