<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = new google.visualization.DataTable();
		data.addColumn('string', 'Month'); // Implicit domain label col.
		data.addColumn('number', 'Sales'); // Implicit series 1 data col.
		data.addColumn({type: 'string', role: 'tooltip', 'p': {'html': true}})
		data.addRows([
		  ['April',1000, '<div style="background: #6E6E6E; color: #f0f0f0; padding: 2px 8px; position: absolute; top: -7px; right: -1px;">2</div>'],
		  ['May',  1170, '<div style="background: #6E6E6E; color: #f0f0f0; padding: 2px 8px; position: absolute; top: -7px; right: -1px;">3</div>'],
		  ['June',  660, '<div style="background: #6E6E6E; color: #f0f0f0; padding: 2px 8px; position: absolute; top: -7px; right: -1px;">11</div>'],
		  ['July', 1530, '<div style="background: #6E6E6E; color: #f0f0f0; padding: 2px 8px; position: absolute; top: -7px; right: -1px;">222</div>']
		]);

        var options = {
          title: 'Company Performance',
          hAxis: {title: 'Year',  titleTextStyle: {color: 'red'}},
          tooltip: { isHtml: true }
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>