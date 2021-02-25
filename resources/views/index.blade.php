<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>
<body>
	<h1>Home Page 123</h1>

	@if(session('success'))
		<h1 style="color: green;">{{ session('success') }}</h1>
	@endif

	<form action="{{ route('save_resize') }}" method="post" enctype="multipart/form-data">
		@csrf
		<label>Image</label>
		<input type="file" name="image">

		@error('image')
			<h2 style="color: red;" >{{ $message }}</h2>
		@enderror

		<br><br>
		<label>Select size conversion</label>
		<select name="size" >
			<option value="4">160 x 90</option>
			<option value="3">320 x 180</option>
			<option value="2">640 x 360</option>
			<option value="1"> 1280 x 720 </option>
		</select>
		<br><br>
		<input type="submit" name="submit" value="Submit">
	</form>

	<br>

	<table border="3" cellpadding="5" cellspacing="0">
		<tr>
			<th>Id</th>
			<th>Original</th>
			<th>Resized</th>
			<th>Delete</th>
		</tr>

		@foreach($data as $key => $value)

			<tr>
				
				<td>{{ $value->id }}</td>
				<td><img style="height: 150px;" src="{{ $value->getUrl() }}"></td>
				<td><img style="height: 150px;" src="{{ $value->getUrl('card') }}"></td>
				<td><a href="{{ route('delete', $value->id) }}">Delete</a></td>
			</tr>
		@endforeach

	</table>

</body>
</html>