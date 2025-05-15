<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-com Prac 2</title>
	@include('includes.style')

</head>
<body>
@include('includes.header')

	{{-- For Main Content  --}}
    <main>
        @yield('content')
    </main>

	@include('includes.footer')


	@include('includes.script')
</body>
</html>