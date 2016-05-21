<h1>CRUD System (Read)</h1>
<hr>

<form action='<?=Base_URL?>csv/edit_csv/<?=$index?>' method='POST'>

<table class='table table-hover table-striped'>

		<tr>
			<th>Name</th>
			<th>Phone</th>
			<th>Address</th>
		</tr>

		<tr>
			<td><label for="">Add New</label></td>
			<td><input name='name' class='form-control' placeholder='Name' value='<?=$crud_data[0]?>'/></td>
			<td><input name='phone' class='form-control' placeholder='Phone'  value='<?=$crud_data[1]?>'/></td>
			<td><input name='address' class='form-control' placeholder='Address'  value='<?=$crud_data[2]?>'/></td>
		</tr>

</table>

<button type='submit' class='btn btn-primary'>Edit</button>
<button type='reset' class='btn btn-danger'>Reset</button>
</form>
