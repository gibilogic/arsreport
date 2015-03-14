<?php defined('_JEXEC') or die('The way is shut!');
/*
 * @version       $Id: arsreport.php 2012-08-29 15:39:00 CEST zanardi $
 * @package       GiBi ArsReport
 * @author        GiBiLogic
 * @authorUrl     http://www.gibilogic.com
 * @authorEmail   info@gibilogic.com
 * @copyright     Copyright (C) 2012 GiBiLogic snc - All rights reserved.
 * @license       GNU/GPL v2 or later
 */
 
$document =& JFactory::getDocument();
$document->addStyleSheet( '/media/bootstrap/css/bootstrap.min.css' );
$document->addStyleSheet( '/administrator/components/com_arsreport/assets/arsreport.css' );

$controller_name = JRequest::getWord( 'controller', 'reports' );
$path = JPATH_COMPONENT.DS.'controllers'.DS.$controller_name.'.php';
if ( file_exists( $path ) ) {
	require_once $path;
	$classname	= 'ArsreportController'.ucfirst($controller_name);
	$controller	= new $classname( );
	$controller->execute( JRequest::getCmd( 'task' ) );
	$controller->redirect();
} else {
	echo "Controller not found";
}
