<?php defined('_JEXEC') or die('The way is shut!');
/**
 * @version		    $Id: models/reports.php 2012-08-29 15:38:00 CEST zanardi $
 * @package		    GiBi ArsReport
 * @author		    GiBiLogic
 * @authorUrl	    http://www.gibilogic.com
 * @authorEmail	  info@gibilogic.com
 * @copyright	    Copyright (C) 2012 GiBiLogic. All rights reserved.
 * @license		    GNU/GPL v2 or later
 */

jimport('joomla.application.component.model');

class ArsreportModelReports extends JModel{

  function getArsData()
  {
    $this->data = array();
    $this->data['start_date'] = JRequest::getVar('startdate');
    $this->data['end_date'] = JRequest::getVar('enddate');
    
    $query =  "SELECT r.`category_id`, COUNT(r.`id`) AS tot " .
              "FROM `#__ars_log` l " .
              "LEFT JOIN `#__ars_items` i " .
              "ON l.`item_id` = i.`id` " .
              "LEFT JOIN `#__ars_releases` r " .
              "ON i.`release_id` = r.`id` " .
              "WHERE `accessed_on` >= '". $this->data['start_date'] ." 00:00:00' " .
              "AND `accessed_on` <= '". $this->data['end_date'] ." 23:59:59' " .
              "GROUP BY r.`category_id`" .
              "ORDER BY `tot` DESC";
    $this->_db->setQuery( $query );
    $this->data['categories'] = $this->_db->loadObjectList();
    
    $query =  "SELECT i.`release_id`, r.`category_id`, COUNT(i.`id`) AS tot " .
              "FROM `#__ars_log` l " .
              "LEFT JOIN `#__ars_items` i " .
              "ON l.`item_id` = i.`id` " .
              "LEFT JOIN `#__ars_releases` r " .
              "ON i.`release_id` = r.`id` " .
              "WHERE `accessed_on` >= '". $this->data['start_date'] ." 00:00:00' " .
              "AND `accessed_on` <= '". $this->data['end_date'] ." 23:59:59' " .
              "GROUP BY i.`release_id`" .
              "ORDER BY `tot` DESC";
    $this->_db->setQuery( $query );
    $this->data['releases'] = $this->_db->loadObjectList();
    
    $query =  "SELECT l.`item_id`, COUNT(l.`id`) AS tot " .
              "FROM `#__ars_log` l " .
              "WHERE `accessed_on` >= '". $this->data['start_date'] ." 00:00:00' " .
              "AND `accessed_on` <= '". $this->data['end_date'] ." 23:59:59' " .
              "GROUP BY `item_id`" .
              "ORDER BY `tot` DESC";
    $this->_db->setQuery( $query );
    $this->data['items'] = $this->_db->loadObjectList();
    
    return $this->data;
  }
  
  function getArsItems()
  {
    $query =  "SELECT `id`, `title` FROM `#__ars_items`" ;
    $this->_db->setQuery( $query );
    return( $this->_db->loadObjectList('id') );
  }
  
  function getArsReleases()
  {
    $query =  "SELECT `id`, `version` FROM `#__ars_releases`" ;
    $this->_db->setQuery( $query );
    return( $this->_db->loadObjectList('id') );
  }
  
  function getArsCategories()
  {
    $query =  "SELECT `id`, `title` FROM `#__ars_categories`" ;
    $this->_db->setQuery( $query );
    return( $this->_db->loadObjectList('id') );
  }
}
