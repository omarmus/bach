<!DOCTYPE html>
 
<html lang="en">
	<head>
		<title>DataTables example</title>
		<meta charset="utf-8" />
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700">
		<link rel="stylesheet" type="text/css" href="public_html/lib/bootstrap/css/bootstrap.css">
		<!-- <link rel="stylesheet" type="text/css" href="public_html/lib/bootstrap/plugins/datatables/DT_bootstrap.css"> -->
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript" charset="utf-8" language="javascript" src="public_html/lib/jquery/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" charset="utf-8" language="javascript" src="public_html/lib/datatables/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8" language="javascript" src="public_html/js/main.js"></script>
		<link rel="stylesheet" href="public_html/lib/bootstrap/css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="public_html/css/main.css">
		<!-- <script type="text/javascript" charset="utf-8" language="javascript" src="public_html/lib/bootstrap/plugins/datatables/DT_bootstrap.js"></script> -->

		<script type="text/javascript">
			$(document).ready(function() {
				// $('#example').dataTable();
			});
		</script>
	</head>
	<body>
		<div class="container" style="margin-top: 20px">
			<div class="row-fluid">
				<table class="table table-striped table-bordered table-hover data-table">
					<thead>
						<tr>
							<th></th>
							<th>Browser</th>
							<th>Platform(s)</th>
							<th>Engine version</th>
							<th>CSS grade</th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd gradeX">
							<td>0</td>
							<td>Internet
								 Explorer 4.0</td>
							<td>Win 95+</td>
							<td class="center"> 4</td>
							<td class="center">X</td>
						</tr>
						<tr class="even gradeC">
							<td>1</td>
							<td>Internet
								 Explorer 5.0</td>
							<td>Win 95+</td>
							<td class="center">5</td>
							<td class="center">C</td>
						</tr>
						<tr class="odd gradeA">
							<td>2</td>
							<td>Internet
								 Explorer 5.5</td>
							<td>Win 95+</td>
							<td class="center">5.5</td>
							<td class="center">A</td>
						</tr>
						<tr class="even gradeA">
							<td>3</td>
							<td>Internet
								 Explorer 6</td>
							<td>Win 98+</td>
							<td class="center">6</td>
							<td class="center">A</td>
						</tr>
						<tr class="odd gradeA">
							<td>4</td>
							<td>Internet Explorer 7</td>
							<td>Win XP SP2+</td>
							<td class="center">7</td>
							<td class="center">A</td>
						</tr>
						<tr class="even gradeA">
							<td>5</td>
							<td>AOL browser (AOL desktop)</td>
							<td>Win XP</td>
							<td class="center">6</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>6</td>
							<td>Firefox 1.0</td>
							<td>Win 98+ / OSX.2+</td>
							<td class="center">1.7</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>7</td>
							<td>Firefox 1.5</td>
							<td>Win 98+ / OSX.2+</td>
							<td class="center">1.8</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>8</td>
							<td>Firefox 2.0</td>
							<td>Win 98+ / OSX.2+</td>
							<td class="center">1.8</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>9</td>
							<td>Firefox 3.0</td>
							<td>Win 2k+ / OSX.3+</td>
							<td class="center">1.9</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>10</td>
							<td>Camino 1.0</td>
							<td>OSX.2+</td>
							<td class="center">1.8</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>11</td>
							<td>Camino 1.5</td>
							<td>OSX.3+</td>
							<td class="center">1.8</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>12</td>
							<td>Netscape 7.2</td>
							<td>Win 95+ / Mac OS 8.6-9.2</td>
							<td class="center">1.7</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>13</td>
							<td>Netscape Browser 8</td>
							<td>Win 98SE+</td>
							<td class="center">1.7</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>14</td>
							<td>Netscape Navigator 9</td>
							<td>Win 98+ / OSX.2+</td>
							<td class="center">1.8</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>15</td>
							<td>Mozilla 1.0</td>
							<td>Win 95+ / OSX.1+</td>
							<td class="center">1</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>16</td>
							<td>Mozilla 1.1</td>
							<td>Win 95+ / OSX.1+</td>
							<td class="center">1.1</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>17</td>
							<td>Mozilla 1.2</td>
							<td>Win 95+ / OSX.1+</td>
							<td class="center">1.2</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>18</td>
							<td>Mozilla 1.3</td>
							<td>Win 95+ / OSX.1+</td>
							<td class="center">1.3</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>19</td>
							<td>Mozilla 1.4</td>
							<td>Win 95+ / OSX.1+</td>
							<td class="center">1.4</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>20</td>
							<td>Mozilla 1.5</td>
							<td>Win 95+ / OSX.1+</td>
							<td class="center">1.5</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>21</td>
							<td>Mozilla 1.6</td>
							<td>Win 95+ / OSX.1+</td>
							<td class="center">1.6</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>22</td>
							<td>Mozilla 1.7</td>
							<td>Win 98+ / OSX.1+</td>
							<td class="center">1.7</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>23</td>
							<td>Mozilla 1.8</td>
							<td>Win 98+ / OSX.1+</td>
							<td class="center">1.8</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>24</td>
							<td>Seamonkey 1.1</td>
							<td>Win 98+ / OSX.2+</td>
							<td class="center">1.8</td>
							<td class="center">A</td>
						</tr>
						<tr class="gradeA">
							<td>25</td>
							<td>Epiphany 2.20</td>
							<td>Gnome</td>
							<td class="center">1.8</td>
							<td class="center">A</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>