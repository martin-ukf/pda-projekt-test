<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

		::selection { background-color: #E13300; color: white; }
		::-moz-selection { background-color: #E13300; color: white; }

		body {
			background-color: #fff;
			margin: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
		}

		h1 {
			color: #444;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}

		code {
			font-family: Consolas, Monaco, Courier New, Courier, monospace;
			font-size: 12px;
			background-color: #f9f9f9;
			border: 1px solid #D0D0D0;
			color: #002166;
			display: block;
			margin: 14px 0 14px 0;
			padding: 12px 10px 12px 10px;
		}

		#body {
			margin: 0 15px 0 15px;
		}

		p.footer {
			text-align: right;
			font-size: 11px;
			border-top: 1px solid #D0D0D0;
			line-height: 32px;
			padding: 0 10px 0 10px;
			margin: 20px 0 0 0;
		}

		#container {
			margin: 10px;
			border: 1px solid #D0D0D0;
			box-shadow: 0 0 8px #D0D0D0;
		}
	</style>
</head>
<body>
<table border="1">
	<thead>
	<tr>
		<th width="20%">ID</th>
		<th width="30%">Meno</th>
		<th width="30%">Priezvisko</th>
		<th width="20%">Akcia</th>
	</tr>
	</thead>
	<tbody id="userData">
	<?php if(!empty($studenti)): foreach($studenti as $student): ?>
		<tr>
			<td><?php echo '#'.$student['id']; ?></td>
			<td><?php echo $student['meno']; ?></td>
			<td><?php echo $student['priezvisko']; ?></td>
			<td>
				<a href="<?php echo site_url('studenti/view/'.$student['id']); ?>"class="glyphicon glyphicon-eye-open">View</a>
				<a href="<?php echo site_url('studenti/edit/'.$student['id']); ?>"class="glyphicon glyphicon-edit">Edit</a>
				<a href="<?php echo site_url('studenti/delete/'.$student['id']); ?>"class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')">Delete</a>
			</td>
		</tr>
	<?php endforeach; else: ?>
		<tr><td colspan="4">Žiadni študenti ......</td></tr>
	<?php endif; ?>
	</tbody>
</table>
</body>
</html>
