<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />

        <title> @yield('title') | Blue Arrow</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('layouts.includes.head-css')
  </head>

    @yield('body')

    @yield('content')

    @include('layouts.includes.vendor-scripts')
    </body>
</html>
