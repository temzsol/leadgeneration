@extends('layouts.master-without-nav')
@section('title')
    Maintenance
@endsection
@section('content')
    <div class="auth-maintenance d-flex align-items-center min-vh-100">
        <div class="bg-overlay bg-light"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11">
                    <div>
                        <div class="text-center mb-4">
                            <a href="index" class="">
                                <img src="{{ URL::asset('build/images/logo-dark.png') }}" alt="" height="25"
                                    class="auth-logo logo-dark mx-auto">
                                <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="" height="25"
                                    class="auth-logo logo-light mx-auto">
                            </a>
                            <h4 class="mt-4">Site is Under Maintenance</h4>
                            <p class="text-muted">Please check back in sometime.</p>
                        </div>

                        <div class="row justify-content-center align-items-center pt-4">
                            <div class="col-sm-5">
                                <div class="maintenance-img">
                                    <img src="{{ URL::asset('build/images/maintenance-bg.png') }}" alt="maintenance-bg"
                                        class="img-fluid mx-auto d-block">
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mt-5 pt-5">
                            <div class="col-xl-4">
                                <div class="card maintenance-box">
                                    <div class="card-body p-4">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-xs me-3">
                                                    <span class="avatar-title text-white rounded-circle bg-primary">
                                                        01
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="font-size-16 text-uppercase">Why is the Site Down?</h5>
                                                <p class="text-muted mb-0">There are many variations of passages of
                                                    Lorem Ipsum available, but the majority have suffered alteration.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="card maintenance-box">
                                    <div class="card-body p-4">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-xs me-3">
                                                    <span class="avatar-title text-white rounded-circle bg-primary">
                                                        02
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="font-size-16 text-uppercase">
                                                    What is the Downtime?</h5>
                                                <p class="text-muted mb-0">Contrary to popular belief, Lorem Ipsum is not
                                                    simply random text. It has roots in a piece of classical.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="card maintenance-box">
                                    <div class="card-body p-4">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-xs me-3">
                                                    <span class="avatar-title text-white rounded-circle bg-primary">
                                                        03
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="flex-grow-1">
                                                <h5 class="font-size-16 text-uppercase">
                                                    Do you need Support?</h5>
                                                <p class="text-muted mb-0">If you are going to use a passage of Lorem
                                                    Ipsum, you need to be sure there isn't anything embar.. <a
                                                        href="mailto:no-reply@domain.com"
                                                        class="text-decoration-underline">no-reply@domain.com</a></p>
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
@endsection
@section('scripts')
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
