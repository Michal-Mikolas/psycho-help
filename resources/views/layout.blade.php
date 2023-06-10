<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel</title>

	<!-- Styles -->
	<link rel="stylesheet" href="{{ asset('css/app.css') }}" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

	@yield('head')
</head>
<body data-theme="bumblebee" class="min-h-screen py-4">
	<div class="container max-w-2xl mx-auto
		rounded-xl shadow-lg
		p-4
	">
		<h1 class="text-primary-content text-3xl pb-4">
			ESN psycho help!
			<sup>
				<div class="badge badge-primary">
					<i class="fa-solid fa-check mr-1"></i>
					anonymous
				</div>
			</sup>
		</h1>

		@yield('content')
	</div>

	@yield('tail')
</body>
</html>
