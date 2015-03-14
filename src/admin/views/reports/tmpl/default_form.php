<?php defined('_JEXEC') or die('The way is shut!');
/*
 * @version       $Id: views/reports/tmpl/default_form.php 2012-09-10 19:15:00 CEST zanardi $
 * @package       GiBi ArsReport
 * @author        GiBiLogic
 * @authorUrl     http://www.gibilogic.com
 * @authorEmail   info@gibilogic.com
 * @copyright     Copyright (C) 2012 GiBiLogic snc - All rights reserved.
 * @license       GNU/GPL v2 or later
 */
JHTML::_('behavior.calendar');
?>
<script>
function setDates( interval ) 
{
  switch (interval) {
    case 'today':
      $('startdate').set('value','<?php echo $this->dates['today'] ?> 00:00:00');
      $('enddate').set('value','<?php echo $this->dates['now'] ?>');
      break;
    case 'yesterday':
      $('startdate').set('value','<?php echo $this->dates['yesterday'] ?> 00:00:00');
      $('enddate').set('value','<?php echo $this->dates['yesterday'] ?> 23:59:59');
      break;
    case '7days':
      $('startdate').set('value','<?php echo $this->dates['7daysago'] ?>');
      $('enddate').set('value','<?php echo $this->dates['now'] ?>');
      break;
    case '30days':
      $('startdate').set('value','<?php echo $this->dates['30daysago'] ?>');
      $('enddate').set('value','<?php echo $this->dates['now'] ?>');
      break;
    case '365days':
      $('startdate').set('value','<?php echo $this->dates['365daysago'] ?>');
      $('enddate').set('value','<?php echo $this->dates['now'] ?>');
      break;
    case 'thisweek':
      $('startdate').set('value','<?php echo $this->dates['thisweekmonday'] ?> 00:00:00');
      $('enddate').set('value','<?php echo $this->dates['now'] ?>');
      break;
    case 'lastweek':
      $('startdate').set('value','<?php echo $this->dates['lastweekmonday'] ?> 00:00:00');
      $('enddate').set('value','<?php echo $this->dates['lastweeksunday'] ?> 23:59:59');
      break;
    case 'thismonth':
      $('startdate').set('value','<?php echo $this->dates['thismonthstart'] ?> 00:00:00');
      $('enddate').set('value','<?php echo $this->dates['now'] ?>');
      break;
    case 'lastmonth':
      $('startdate').set('value','<?php echo $this->dates['lastmonthstart'] ?> 00:00:00');
      $('enddate').set('value','<?php echo $this->dates['lastmonthend'] ?> 23:59:59');
      break;
  }
  $('arsReportForm').submit();
}
</script>
<h2>Request form</h2>
<div class="row">
  <div class="span4">
    <form action="<?php echo JRoute::_( $this->controller_url ) ?>" method="post" id="arsReportForm">
      <label for="startdate"><?php echo JText::_('COM_ARSREPORT_STARTDATE_LABEL') ?></label>
      <?php echo JHtml::calendar( $this->data['start_date'], 'startdate', 'startdate', '%Y-%m-%d');?>
      <label for="enddate"><?php echo JText::_('COM_ARSREPORT_ENDDATE_LABEL') ?></label>
      <?php echo JHtml::calendar( $this->data['end_date'], 'enddate', 'enddate', '%Y-%m-%d');?>
      <label for="submit"></label>
      <input type="submit" class="btn-primary btn" value="<?php echo JText::_('COM_ARSREPORT_SUBMIT_LABEL') ?>"/>
      <input type="hidden" name="task" value="showdata" />
    </form>
  </div>
  <div class="span4">
    <a class="btn btn-block" href="javascript:setDates('today')"><?php echo JText::_('COM_ARSREPORT_TODAY') ?></a>
    <a class="btn btn-block" href="javascript:setDates('yesterday')"><?php echo JText::_('COM_ARSREPORT_YESTERDAY') ?></a>
  </div>
  <div class="span4">
    <a class="btn btn-block" href="javascript:setDates('7days')"><?php echo JText::_('COM_ARSREPORT_7DAYS') ?></a>
    <a class="btn btn-block" href="javascript:setDates('30days')"><?php echo JText::_('COM_ARSREPORT_30DAYS') ?></a>
    <a class="btn btn-block" href="javascript:setDates('365days')"><?php echo JText::_('COM_ARSREPORT_365DAYS') ?></a>
  </div>
  <div class="span4">
    <a class="btn btn-block" href="javascript:setDates('thisweek')"><?php echo JText::_('COM_ARSREPORT_THISWEEK') ?></a>
    <a class="btn btn-block" href="javascript:setDates('lastweek')"><?php echo JText::_('COM_ARSREPORT_LASTWEEK') ?></a>
    <a class="btn btn-block" href="javascript:setDates('thismonth')"><?php echo JText::_('COM_ARSREPORT_THISMONTH') ?></a>
    <a class="btn btn-block" href="javascript:setDates('lastmonth')"><?php echo JText::_('COM_ARSREPORT_LASTMONTH') ?></a>
  </div>
</div>
