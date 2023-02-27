@extends('auth.master')
@section('content')
<section>
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <!-- <img src="/img/team-1.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm"> -->
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ auth()->user()->firstname }} Dashboard
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            <!-- Public Relations -->
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Dashboard</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                <div class="card">
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="numbers">
                                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Completed Tasks</p>
                                                    <h5 class="font-weight-bolder">
                                                        {{$tasks->complete}}
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                <div class="card">
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="numbers">
                                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Ongoing Tasks</p>
                                                    <h5 class="font-weight-bolder">
                                                        {{$tasks->ongoing}}
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="col-4 text-end">
                                                <div
                                                    class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                <div class="card">
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="numbers">
                                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Not Started</p>
                                                    <h5 class="font-weight-bolder">
                                                        {{$tasks->noprogress}}
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="col-4 text-end">
                                                <div
                                                    class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                <div class="card">
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="numbers">
                                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Archieved</p>
                                                    <h5 class="font-weight-bolder">
                                                        --
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="col-4 text-end">
                                                <div
                                                    class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
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
</section>
@endsection
