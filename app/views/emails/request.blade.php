
<h2>problem with an Icon request</h2>
<table border="1">
	<thead>
		<tr>
			<th>name</th>
			<th>value</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>project name</td>
			<td>{{$projName}}</td>
		</tr>
		<tr>
			<td>message</td>
			<td>{{$msg}}</td>
		</tr>
		<tr>
			<td>url</td>
			<td>{{$url}}</td>
		</tr>
		<tr>
			<td>image</td>
			<td><img width="100" src="{{$message->embed($path)}}" alt=""></td>
		</tr>
	</tbody>
</table>
