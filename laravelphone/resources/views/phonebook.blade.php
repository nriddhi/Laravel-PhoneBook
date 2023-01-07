<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Phonebook App</title>

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" type="text/css" href=" {{ asset('css/app.css')}} ">
</head>
<body>

	<div id="app">
		
<myheader> </myheader>

<div class="container">

  <router-view></router-view>

</div>

<myfooter> </myfooter>

	</div>
	

<script type="text/javascript" src="{{ asset('js/app.js')}}"></script>

</body>
</html>