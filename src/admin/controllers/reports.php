<?php defined('_JEXEC') or die('The way is shut!');
/*
 *      @version       $Id: reports.php 2012-08-23 12:34:29 CEST zanardi $
 *      @package       GiBi ArsReport
 *      @author        GiBiLogic
 *      @authorUrl     http://www.gibilogic.com
 *      @authorEmail   info@gibilogic.com
 *      @copyright     Copyright (C) 2012 GiBiLogic snc - All rights reserved.
 *      @license       GNU/GPL v2 or later
 */

jimport('joomla.application.component.controlleradmin');

class ArsreportControllerReports extends JControllerAdmin
{ 
  function __construct( $default = array() )
	{
		if ( ! JRequest::getCmd( 'view' ) ) {
			JRequest::setVar('view', 'reports' );
		}
		parent::__construct( $default );
		$this->_model =& $this->getModel();
		$this->_controllerUrl = 'index.php?option=com_arsreport&controller=reports';
	}
  
  function &getModel($name = '', $prefix = 'ArsreportModel')
	{
		if ( $name == '' ) {
			$name = str_replace ('ArsreportController', '', get_class( $this ) );
		}
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
  
  function display( $tpl=null )
	{
    $view =& $this->getView('reports','html');
		$view->setModel($this->_model, true);
		$view->display($tpl);
	}
  
  function showData()
  {
    $this->display('data');
  }
 
}
