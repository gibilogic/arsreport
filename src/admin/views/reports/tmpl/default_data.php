<?php defined('_JEXEC') or die('The way is shut!');
/*
 * @version       $Id: views/reports/tmpl/default_data.php 2012-09-01 14:16:21 CEST zanardi $
 * @package       GiBi ArsReport
 * @author        GiBiLogic
 * @authorUrl     http://www.gibilogic.com
 * @authorEmail   info@gibilogic.com
 * @copyright     Copyright (C) 2012 GiBiLogic snc - All rights reserved.
 * @license       GNU/GPL v2 or later
 */ 
$document =& JFactory::getDocument();
$document->addScript( 'https://www.google.com/jsapi' );
$document->addScript( '/administrator/components/com_arsreport/assets/charts.js' );
?>
<script type="text/javascript">
	var values = [];
	<?php foreach( $this->data['items'] as $data ) : ?>
		<?php if( $data->tot == '' ) $data->tot = 0 ?> 
		values.push({ 'title': '<?php echo $this->items[ $data->item_id ]->title ?>', 'tot': <?php echo $data->tot ?> });
	<?php endforeach ?>
	google.load('visualization', '1.0', {'packages':['corechart']});
	google.setOnLoadCallback(function(){ drawItemsChart( values, $('arsreportitemsgraph') )});
</script>
<script type="text/javascript">
	var releases = [];
	<?php foreach( $this->data['releases'] as $data ) : ?>
		<?php if( $data->tot == '' ) $data->tot = 0 ?> 
		releases.push({ 'title': '<?php echo $this->categories[ $data->category_id ]->title . ' ' . $this->releases[ $data->release_id ]->version ?>', 'tot': <?php echo $data->tot ?> });
	<?php endforeach ?>
	google.load('visualization', '1.0', {'packages':['corechart']});
	google.setOnLoadCallback(function(){ drawReleasesChart( releases, $('arsreportreleasesgraph') )});
</script>
<script type="text/javascript">
	var categories = [];
	<?php foreach( $this->data['categories'] as $data ) : ?>
		<?php if( $data->tot == '' ) $data->tot = 0 ?> 
		categories.push({ 'title': '<?php echo $this->categories[ $data->category_id ]->title ?>', 'tot': <?php echo $data->tot ?> });
	<?php endforeach ?>
	google.load('visualization', '1.0', {'packages':['corechart']});
	google.setOnLoadCallback(function(){ drawCategoriesChart( categories, $('arsreportcategoriesgraph') )});
</script>
<?php echo $this->loadTemplate('form'); ?>
<hr />
<a id="top"></a>
<a class="btn" href="#arsreportitems">Items</a></li>
<a class="btn" href="#arsreportreleases">Releases</a></li>
<a class="btn" href="#arsreportcategories">Categories</a></li>
<!-- items -->
<h2 id="arsreportitems">Results: items</h2>
<a class="btn btn-mini" href="#top">^ Top</a>
<div class="row">
  <div class="span4">
    <table class="table table-striped" style="width: auto">  
      <thead>
        <tr>
          <th><?php echo JText::_('COM_ARSREPORT_EXTENSION_LABEL') ?></th>
          <th><?php echo JText::_('COM_ARSREPORT_DOWNLOADS_LABEL') ?></th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ( $this->data['items'] as $record ) : ?>
        <tr>
          <td><?php echo $this->items[ $record->item_id ]->title ?></td>
          <td><?php echo $record->tot ?></td>
        </tr>
      <?php endforeach ?>
      </tbody>
    </table>
  </div>
  <div class="span8" id="arsreportitemsgraph"></div>
</div>
<!-- releases -->
<h2 id="arsreportreleases">Results: releases</h2>
<a class="btn btn-mini" href="#top">^ Top</a>
<div class="row">
  <div class="span4" >
    <table class="table table-striped" style="width: auto">  
      <thead>
        <tr>
          <th><?php echo JText::_('COM_ARSREPORT_EXTENSION_LABEL') ?></th>
          <th><?php echo JText::_('COM_ARSREPORT_DOWNLOADS_LABEL') ?></th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ( $this->data['releases'] as $record ) : ?>
        <tr>
          <td><?php echo $this->categories[ $record->category_id ]->title . " " . $this->releases[ $record->release_id ]->version ?></td>
          <td><?php echo $record->tot ?></td>
        </tr>
      <?php endforeach ?>
      </tbody>
    </table>
  </div>
  <div class="span8" id="arsreportreleasesgraph"></div>
</div>
<h2 id="arsreportcategories">Results: categories</h2>
<a class="btn btn-mini" href="#top">^ Top</a>
<div class="row">
  <div class="span4">
    <table class="table table-striped" style="width: auto">  
      <thead>
        <tr>
          <th><?php echo JText::_('COM_ARSREPORT_EXTENSION_LABEL') ?></th>
          <th><?php echo JText::_('COM_ARSREPORT_DOWNLOADS_LABEL') ?></th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ( $this->data['categories'] as $record ) : ?>
        <tr>
          <td><?php echo $this->categories[ $record->category_id ]->title ?></td>
          <td><?php echo $record->tot ?></td>
        </tr>
      <?php endforeach ?>
      </tbody>
    </table>
  </div>
  <div class="span8" id="arsreportcategoriesgraph"></div>
</div>
