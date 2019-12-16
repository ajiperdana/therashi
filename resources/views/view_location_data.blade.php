<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Haunted Jogja</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Tempusdominus Bbootstrap 4 -->
		<link rel="stylesheet" href="/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
		<!-- iCheck -->
		<link rel="stylesheet" href="/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
		<!-- JQVMap -->
		<link rel="styleshe et" href="/adminlte/plugins/jqvmap/jqvmap.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
		<!-- overlayScrollbars -->
		<link rel="stylesheet" href="/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
		<!-- Daterange picker -->
		<link rel="stylesheet" href="/adminlte/plugins/daterangepicker/daterangepicker.css">
		<!-- summernote -->
		<link rel="stylesheet" href="/adminlte/plugins/summernote/summernote-bs4.css">
		<!-- Google Font: Source Sans Pro -->
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	  </head>
<body>
<br>
<br>
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
				<div class="card-header">{{ __('Location Data') }}</div>
				<div><a href="/location_data/add">+ Location Data</a>
					<div class="card-body table-responsive p-0" style="height: 300px;">
	<table class="table table-head">
			<thead>
		<tr>
			<th>Location ID</th>
			<th>Location Name</th>
			<th>Location Address</th>
			<th>Location Description</th>
			<th>Location Picture</th>
			<th>Picture</th>
			<th>Options</th>
		</tr>
	</thead>
		@foreach($location_data as $p)
		<tr>
			<td>{{ $p->location_id }}
			<td>{{ $p->location_name }}</td>
			<td>{{ $p->location_address }}</td>
			<td>{{ $p->location_description }}</td>
			<td>{{ $p->location_picture }}</td>
			<td>
					<img src="<?=$p->location_picture?>" alt="image" style="width:100px">
			  </td>
			<td><a href="/location_data/edit/{{ $p->location_id }}"class="btn btn-warning">Edit</a>
				
				<a href="/location_data/delete/{{ $p->location_id }}" class="btn btn-danger">Delete</a>
			</td>
		</tr>
		@endforeach
	</table>
			</div>
			{{-- ---------------------------------------
			<div class="card-body table-responsive p-0" style="height: 300px;">
				<table class="table table-head">
				  <thead>
					<tr>
						<th>Location ID</th>
						<th>Location Name</th>
						<th>Location Address</th>
						<th>Location Description</th>
						<th>Location Picture</th>
						<th>Options</th>
					</tr>
				  </thead>
				  <tbody>
					@foreach ($wisata as $iwst)
					<tr>
						<td>{{ $p->location_id }}</td>
						<td>{{ $p->location_name }}</td>
						<td>{{ $p->location_address }}</td>
						<td>{{ $p->location_description }}</td>
						<td>{{ $p->location_picture }}</td>
					  <td>
						@if($iwst->foto)
							<img src="{{url('images/user/'. $iwst->foto)}}" alt="image" style="width:100px" />
						@else
							<img src="{{url('images/default.png')}}" alt="image" style="width:30px" />
						@endif
					  </td>
					  <td>
						<a href="/admin/edit/{{ $iwst->id }}" class="btn btn-warning">Edit</a>
						<a href="/admin/destroy/{{ $iwst->id }}" class="btn btn-danger">Hapus</a>
					  </td>
					</tr>    
					@endforeach
				  </tbody>
				</table>
			  </div>
			  --------------------------------------------------- --}}
		</div>
	</div>
	</div>
</body>
</html>

