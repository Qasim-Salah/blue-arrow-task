<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8"/>

    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    @include('layouts.includes.head-css')
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/owl.carousel/owl.carousel.min.css') }}">

</head>
<body data-bs-spy="scroll" data-bs-target="#topnav-menu" data-bs-offset="60">
@include('layouts.includes.navbar')

@yield('content')

<!-- Footer start -->
@include('layouts.includes.footer')
<!-- Footer end -->
@include('layouts.includes.vendor-scripts')


</body>

</html>
