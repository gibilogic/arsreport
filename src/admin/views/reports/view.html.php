<?php
/*
 *      @version       $Id: views/reports/view.html.php 2012-09-01 14:11:21 CEST zanardi $
 *      @package       GiBi ArsReport
 *      @author        GiBiLogic
 *      @authorUrl     http://www.gibilogic.com
 *      @authorEmail   info@gibilogic.com
 *      @copyright     Copyright (C) 2012 GiBiLogic snc - All rights reserved.
 *      @license       GNU/GPL v2 or later
 */

jimport('joomla.application.component.view');

class ArsreportViewReports extends JView{
  function display( $tpl )
  { 
    $this->controller_url = 'index.php?option=com_arsreport&controller=' . $this->getName();
    if( $tpl == 'data' ) {
      $this->loadData();
    } else {
      $tpl = 'form';
    }
    
    $this->loadHelper('arsreport');
    $helper = new ArsreportHelper();
    $this->dates = $helper->getDates(); 
    
    if(! isset( $this->data['start_date'] ) ) $this->data['start_date'] = $this->dates['7daysago'];
    if(! isset( $this->data['end_date'] ) ) $this->data['end_date'] = $this->dates['now'];
    
    JToolBarHelper::title( JText::_('COM_ARSREPORT') );
    parent::display( $tpl );
  }
  
  function loadData()
  {
    $this->model = $this->getModel();
    $this->items = $this->model->getArsItems();
    $this->releases = $this->model->getArsReleases();
    $this->categories = $this->model->getArsCategories();
    $this->data = $this->model->getArsData();
  }
}
