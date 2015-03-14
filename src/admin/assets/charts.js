/*
 * @version		$Id: assets/charts.js 2012-08-29 20:45:00Z zanardi $
 * @package		Jesto
 * @copyright	Copyright (C) 2012 GiBiLogic. All rights reserved.
 * @license		GNU/GPLv2
 */
 
function drawItemsChart( values, element ) 
{	
	// Create the data table.
	items = new google.visualization.DataTable();
	items.addColumn('string', 'Title');
	items.addColumn('number', 'Tot');
	for( i=0; i<values.length; i++ ) {
		if( !values[i].tot ) { values[i].tot = 0; }
		items.addRows([
			[ values[i].title, values[i].tot ]
		]);
	}

	// Set chart options
	options = {	'title': 'Stats', 'width': 600, 'height': 600 };

	// Instantiate and draw our chart, passing in some options.
	chart = new google.visualization.ColumnChart( element );
	chart.draw(items, options);
}
function drawReleasesChart( values, element ) 
{	
	// Create the data table.
	releases = new google.visualization.DataTable();
	releases.addColumn('string', 'Title');
	releases.addColumn('number', 'Tot');
	for( i=0; i<values.length; i++ ) {
		if( !values[i].tot ) { values[i].tot = 0; }
		releases.addRows([
			[ values[i].title, values[i].tot ]
		]);
	}

	// Set chart options
	options = {	'title': 'Stats', 'width': 600, 'height': 600 };

	// Instantiate and draw our chart, passing in some options.
	chart = new google.visualization.ColumnChart( element );
	chart.draw(releases, options);
}
function drawCategoriesChart( values, element ) 
{	
	// Create the data table.
	categories = new google.visualization.DataTable();
	categories.addColumn('string', 'Title');
	categories.addColumn('number', 'Tot');
	for( i=0; i<values.length; i++ ) {
		if( !values[i].tot ) { values[i].tot = 0; }
		categories.addRows([
			[ values[i].title, values[i].tot ]
		]);
	}

	// Set chart options
	options = {	'title': 'Stats', 'width': 600, 'height': 600 };

	// Instantiate and draw our chart, passing in some options.
	chart = new google.visualization.ColumnChart( element );
	chart.draw(categories, options);
}
