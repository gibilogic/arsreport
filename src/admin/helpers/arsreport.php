<?php defined('_JEXEC') or die('The way is shut!');
/**
 * @version		    $Id: helpers/arsreport.php 2012-09-10 19:40:00 CEST zanardi $
 * @package		    GiBi ArsReport
 * @author		    GiBiLogic
 * @authorUrl	    http://www.gibilogic.com
 * @authorEmail	  info@gibilogic.com
 * @copyright	    Copyright (C) 2012 GiBiLogic. All rights reserved.
 * @license		    GNU/GPL v2 or later
 */

class ArsreportHelper
{
  function getDates()
  {
    $dates = array();
    $date = new DateTime();
    
    $dates['today'] = $date->format('Y-m-d');
    
    $dates['now'] = $date->format('Y-m-d H:i:s');
        
    $date->modify('-1 days');
    $dates['yesterday'] = $date->format('Y-m-d');

    $date->modify('-6 days');
    $dates['7daysago'] = $date->format('Y-m-d H:i:s');
    
    $date->modify('-23 days');
    $dates['30daysago'] = $date->format('Y-m-d H:i:s');

    $date->modify('-335 days');
    $dates['365daysago'] = $date->format('Y-m-d H:i:s');
    
    // back to start to calculate week days
    $date = new DateTime(); 
    
    $date->modify('-' . ( $date->format('w') - 1 ) . ' days');
    $dates['thisweekmonday'] = $date->format('Y-m-d');

    $date->modify('-1 days');
    $dates['lastweeksunday'] = $date->format('Y-m-d');

    $date->modify('-6 days');
    $dates['lastweekmonday'] = $date->format('Y-m-d');

    // back to start to calculate month days
    $date = new DateTime(); 
    
    $date->modify('-' . ( $date->format('j') - 1 ) . ' days');
    $dates['thismonthstart'] = $date->format('Y-m-d');

    $date->modify('-1 days');
    $dates['lastmonthend'] = $date->format('Y-m-d');

    $date->modify('-' . ( $date->format('j') - 1 ) . ' days');
    $dates['lastmonthstart'] = $date->format('Y-m-d');

    //echo "<pre>"; print_r( $dates );echo "</pre>";
    
    return( $dates );
  }
}
