@extends('layouts.master-without-nav')

@section('title')
    Register
@endsection

@section('css')
{{--    <!-- owl.carousel css -->--}}
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/owl.carousel/owl.carousel.min.css') }}">
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('body')

    <body class="auth-body-bg">
    @endsection

    @section('content')

        <div>
            <div class="container-fluid p-0">
                <div class="row g-0">

                    <div class="col-xl-9">
                        <div class="auth-full-bg pt-lg-5 p-4">
                            <div class="w-100">
                                <div class="bg-overlay"></div>
                                <div class="d-flex h-100 flex-column">

                                    <div class="p-4 mt-auto">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-7">
                                                <div class="text-center">

                                                    <h4 class="mb-3"><i
                                                            class="bx bxs-quote-alt-left text-primary h1 align-middle me-3"></i><span
                                                            class="text-primary">20k</span>+ Satisfied clients</h4>

                                                    <div dir="ltr">
                                                        <div class="owl-carousel owl-theme auth-review-carousel"
                                                             id="auth-review-carousel">
                                                            <div class="item">
                                                                <div class="py-3">
                                                                    <p class="font-size-16 mb-4">" The Blue Arrow Company is currently
                                                                        working on a contract to buy, sell and rent apartments, with the
                                                                        completion of contracts with prominent companies in the field of
                                                                        building residential units in the city of Erbil, and to carry out
                                                                        sales and purchase deals as soon as possible and with each deal we
                                                                        emphasize creative solutions with the basics of real estate. Our
                                                                        company has not underestimated itself on the basis of old ideas when
                                                                        it comes to buying, selling and renting but we use the latest
                                                                        methods today to make it easier for Our customers.
                                                                        "</p>
                                                                </div>
                                                                <div>
                                                                    <h4 class="font-size-16 text-primary">Qasim</h4>
                                                                    <p class="font-size-14 mb-0">- Blue Arrow-User</p>
                                                                </div>

                                                            </div>

                                                            <div class="item">
                                                                <div class="py-3">
                                                                    <p class="font-size-16 mb-4">" If Every Vendor on Envato
                                                                        are as supportive as Blue Arrow, Development with
                                                                        be a nice experience. You guys are Wonderful. Keep
                                                                        us the good work. "</p>

                                                                    <div>
                                                                        <h4 class="font-size-16 text-primary">nezerious</h4>
                                                                        <p class="font-size-14 mb-0">- Blue Arrow-User</p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3">
                        <div class="auth-full-page-content p-md-5 p-4">
                            <div class="w-100">

                                <div class="d-flex flex-column h-100">
                                    <div>
                                        <a href="{{route('notes.index')}}" class="d-block auth-logo">
                                            <p style="font-size: 25px; color:black ">Blue Arrow</p>
                                        </a>
                                    </div>
                                    <div class="my-auto">

                                        <div>
                                            <h5 class="text-primary">Register account</h5>
                                            <p class="text-muted">Get your free Blue Arrow account now.</p>
                                        </div>

                                        <div class="mt-4">
                                            <form method="POST" class="form-horizontal" action="{{ route('register') }}"
                                                  enctype="multipart/form-data" autocomplete="off">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="useremail" class="form-label">Email</label>
                                                    <input type="email" class="form-control " id="useremail"
                                                           value="{{ old('email') }}" name="email" placeholder="Enter email" autofocus
                                                           required>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" class="form-control "
                                                           value="{{ old('name') }}" id="username" name="name" autofocus required
                                                           placeholder="Enter username">
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="userpassword" class="form-label">Password</label>
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                                           id="userpassword" name="password"
                                                           placeholder="Enter password" autofocus required>
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="confirmpassword" class="form-label">Confirm Password</label>
                                                    <input type="password"
                                                           class="form-control @error('password_confirmation') is-invalid @enderror"
                                                           id="confirmpassword"
                                                           name="password_confirmation" placeholder="Enter Confirm password" autofocus
                                                           required>
                                                    @error('password_confirmation')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mt-4 d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light"
                                                            type="submit">Register
                                                    </button>
                                                </div>

                                                <div class="mt-4 text-center">
                                                    <p class="mb-0">By registering you agree to the Blue Arrow <a href="#"
                                                                                                                  class="text-primary">House
                                                            of Use</a></p>
                                                </div>
                                            </form>

                                            <div class="mt-3 text-center">
                                                <p>Already have an account ? <a href="{{ url('login') }}"
                                                                                class="fw-medium text-primary"> Login</a></p>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="mt-4 mt-md-3 text-center">
                                        <p class="mb-0">©
                                            <script>
                                                document.write(new Date().getFullYear())

                                            </script>
                                            Crafted with
                                            <i class="mdi mdi-heart text-danger"></i> by
                                            BlueArrow
                                        </p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </div>

    @endsection
    @section('script-bottom')
        <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
        <!-- owl.carousel js -->
        <script src="{{ URL::asset('/assets/libs/owl.carousel/owl.carousel.min.js') }}"></script>
        <!-- auth-2-carousel init -->
        <script src="{{ URL::asset('/assets/js/pages/auth-2-carousel.init.js') }}"></script>
@endsection
