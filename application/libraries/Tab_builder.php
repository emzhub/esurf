<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * library to build uniform form elements with bootstrap styling.
 * @author sim wicki
 */
class Tab_builder {
	
	public function __construct() {
		
	}
	
	/**
	 * adds a new tab title.
	 * @param attributes array
	 * 		- id
	 * 		- name
	 * 		- active
	 * 		- icon
	 * 		- dropdown (not implemented)
	 * 			- id
	 * 			- name
	 * 			- href
	 */
	public function add_tabs($attributes) {
		$default_active = true;
		echo '<ul class="nav nav-tabs">';
		foreach ($attributes as $attribute) {
			$attribute = (object)$attribute;
			echo '<li class="'. (((isset($attribute->active) && $attributes->active) || $default_active) ? 'active' : '') .'">';
			echo "<a href='#{$attribute->id}' data-toggle='tab'>";
			if (isset($attribute->icon)) {
			echo "<i class='{$attribute->icon}'></i> ";
			}
			echo "{$attribute->name}</a>";
			echo '</li>';
				$default_active = false;
		}
		echo '</ul>';
	}
	
	public function start_tab() {
		echo '<div class="tab-content">';
	}
	
	/**
	 * starts a tab content container that needs to be finished with end_tab_content();
	 */
	public function start_tab_content($id, $active = false) {
		echo "<div class='tab-pane ". ($active ? 'active' : '') ."' id='{$id}'>";
	}
	
	/**
	 * ends a tab content container that needs to be started with start_tab_content(id);
	 */
	public function end_tab_content() {
		echo '</div>';
	}
	
	/**
	 * ends the tab container that needs to be started with start_tab().
	 */
	public function end_tab() {
		echo '</div>';
	}
	
}



//
//within the controller:
//
//$this->load->library('tab_builder');
//within the view:
//
//<?php
//  // could also be passed from the controller
//  $_tabs = array();
//  foreach (array(1, 2, 3) as $idx) {
//    array_push($_tabs, array('id' => "tabContract{$idx}", 'name' => "Tab {$idx}"));
//  }
//  $this->tab_builder->add_tabs($_tabs);
//?>

<?php
//  $this->tab_builder->start_tab();
//  
//  foreach (array(1, 2, 3) as $idx) {
//	  $this->tab_builder->start_tab_content("tab{$target->contract_id}", ($idx == 1));
?>

<!--<div>-->
<!--  tab content-->
 <?php //echo $idx;?>
<!--</div>-->

<?php
//    $this->tab_builder->end_tab_content();
//  } // end foreach
//  
//  $this->tab_builder->end_tab();
?>