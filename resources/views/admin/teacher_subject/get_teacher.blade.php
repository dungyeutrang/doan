<table class="table table-hover">
	<tr>
		<td>{{trans('admin/teachersubject_getteacher.stt')}}</td>
		<td>{{trans('admin/teachersubject_getteacher.info')}}</td>
	</tr>
	<tr>
		<td>Name</td>
		<td>{{$teacher->name}}</td>
	</tr>
	<tr>
		<td>Indentify Number</td>
		<td>{{$teacher->identity_number}}</td>
	</tr>
	<tr>
		<td>Birth day</td>
		<td>{{$teacher->birth_day}}</td>
	</tr>
	<tr>
	    <td>Address</td>
	    <td>{{$teacher->address}}</td>
	</tr>
	<tr>
	    <td>Native Place</td>
	    <td>{{$teacher->native_place}}</td>
	</tr>
</table>