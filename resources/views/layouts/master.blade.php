<!DOCTYPE html>
<html lang="es">
	<head>
	    @include('layouts.header')

	    @include('layouts.style')
	    @yield('styleAdic')
	</head>
	<body >
	    <section>
	        @include('layouts.sidebar')

	        @yield('content')
	        @include('layouts.footer')

	    </section>
	    @include('layouts.script')
	    @yield('scriptAdic')
	</body>
</html>
