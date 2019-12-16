<!DOCTYPE html>
<html>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Edit Data Wisata</title>

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
				<div class="card-header">{{ __('Edit Location Data') }}</div>
 
	@foreach($location_data as $p)
	<form action="/location_data/update" method="post" enctype="multipart/form-data" >
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $p->location_id}}">
		<table style="margin:20px auto;">		
			<tr>
				<td>Location Name</td>
				<td><input type="varchar", name="location_name" required="required" value="{{ $p->location_name }}" size="30" maxlength="30"></td>
            </tr>
            <tr>
				<td>Location Address</td>
				<td><input type="varchar" name="location_address" required="required" value="{{ $p->location_address }}" size="90" maxlength="100"></td>
			</tr>
			<tr>
				<td>Location Description</td>
				<td><input type="text" name="location_description" required="required" value="{{ $p->location_description }}" size="90"></td>
            </tr>
            <tr>
				<td>Location Picture</td>
                <td><input type="file" name="location_picture" value="{{ $p->location_picture }}"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Edit Data"></td>
			</tr>
		</table>
	</form>
	@endforeach
		
 
</body>
</html>