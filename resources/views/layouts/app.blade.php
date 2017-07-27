<!doctype html>
<html lang="{{ config('app.locale') }}">
	<head>
		@include('partials/site/meta')
	</head>
  <body>

    <div id="app">
    
      @yield('banner')

      <div class="inner">
          @yield('content')
      </div>

      @include('partials/site/footer')

    </div>

    @include('partials/site/postscript')

    </body>
</html>