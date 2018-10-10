<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Category_model
 *
 * @author kennypc
 */
class Category_model extends MY_Model {
    //put your code here
    	function __construct()
    {
       $this->has_many['sector'] = array('Sector_model','sector_id','sector_id');
        parent::__construct();
    }
}
