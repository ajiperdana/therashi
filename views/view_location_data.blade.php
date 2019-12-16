<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Location Data</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<br>
<br>
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
				<div class="card-header">{{ __('Location Data') }}</div>
				<div><a href="/location_data/add">+ Location Data</a><a href=" {{url('logout')}} " class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <span>Logout</span></a></li>
            <form id="logout-form" action=" {{url('logout')}} " method="POST">
                    @csrf
                </form></div>
	<table border = "1">
		<tr>
			<th>Location ID</th>
			<th>Location Name</th>
			<th>Location Address</th>
			<th>Location Description</th>
			<th>Location Picture</th>
			<th>Options</th>
		</tr>
		@foreach($location_data as $p)
		<tr>
			<td>{{ $p->location_id }}</td>
			<td>{{ $p->location_name }}</td>
			<td>{{ $p->location_address }}</td>
			<td>{{ $p->location_description }}</td>
			<td>{{ $p->location_picture }}</td>
			<td><a href="/location_data/edit/{{ $p->location_id }}">Edit</a>
				|
				<a href="/location_data/delete/{{ $p->location_id }}">Delete</a>
			</td>
		</tr>
		@endforeach
	</table>
			</div>
		</div>
	</div>
	</div>
</body>
</html>

