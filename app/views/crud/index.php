<h1>CRUD System</h1>
<hr>


<table class='table table-hover table-striped '>

<thead>
	<tr>
		<th>NUM</th>
		<th>Name</th>
		<th>Phone</th>
		<th>Address</th>
		<th>Operations</th>
	</tr>
</thead>

<tbody>
	<?php foreach($crud_data as $key=>$line):?>
		<tr>
			<td><?=$key?></td>
			<td><?=$line[0]?></td>
			<td><?=$line[1]?></td>
			<td><?=$line[2]?></td>
			<td>
				<a href="<?=Base_URL?>csv/delete/<?=$key?>" class='btn btn-danger btn-sm'>Delete</a>
				<a href="<?=Base_URL?>csv/read/<?=$key?>" class='btn btn-primary btn-sm'>Edit</a>
			</td>
		</tr>
	<?php endforeach; ?>

	<form action='<?=Base_URL?>csv/create' method='POST'>
		<tr>
			<td><label for="">Add New</label></td>
			<td><input name='name' class='form-control' placeholder='Name'/></td>
			<td><input name='phone' class='form-control' placeholder='Phone'/></td>
			<td><input name='address' class='form-control' placeholder='Address'/></td>
			<td>
				<button type='submit' class='btn btn-success'>Add</button>
			</td>
		</tr>
	</form>
</tbody>

</table>
