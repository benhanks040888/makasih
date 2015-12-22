<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>No</th>
				<th>Register Date</th>
				<th>Last Login</th>
				<th>Last Activities</th>
				<th>Name</th>
				<th>Phone</th>
				<th>Email</th>
				<th>Story</th>
				<th>Subcribe Email</th>
				<th>Like Facebook</th>
				<th>Follow Twitter</th>
				<th>Follow Instagram</th>
				<th>Follow Quiz</th>

			</tr>
		</thead>
		<tbody>
			@if($model)
				@foreach ($model as $key => $value)
					<tr>
						<td>{!! $key + 1 !!}</td>
						<td>{!! $value->created_at !!}</td>
						<td>{!! $value->last_login !!}</td>
						<td>{!! $value->status_activities !!}</td>
						<td>{!! $value->full_name !!}</td>
						<td>{!! $value->email !!}</td>
						<td>{!! $value->phone !!}</td>
						<td>{!! $value->story !!}</td>
						<td>{!! ($value->subcribe) ? "Yes" : "No" !!}</td>
						<td>{!! isset($value->withSocmed()->facebook()->status) ? 'Yes'  : 'No' !!}</td>
						<td>{!! isset($value->withSocmed()->twitter()->status) ? 'Yes' : 'No' !!}</td>
						<td>{!! isset($value->withSocmed()->instagram()->status) ? 'Yes' : 'No' !!}</td>
						<td>{!! isset($value->withSocmed()->quiz()->status) ? ($value->withSocmed()->quiz()->status=='0') ? 'Answer True':'Answer Wrong' : "No" !!}</td>
						
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
</body>
</html>