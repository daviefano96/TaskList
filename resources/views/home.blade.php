@extends('layouts.master')
@section('content')
<!-- Pills navs -->
<ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
      aria-controls="pills-login" aria-selected="true">Login</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
      aria-controls="pills-register" aria-selected="false">Register</a>
  </li>
</ul>
<!-- Pills navs -->

<!-- Pills content -->
<div class="tab-content">
  <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
        <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action=" {{ route('user.login') }} " method="post">
                    @csrf
                <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                    
                </div>

                <div class="divider d-flex align-items-center my-4">
                    <p class="text-center fw-bold mx-3 mb-0">Sign in</p>
                    
                </div>
                @error('email')
                                <div class="alert-danger" >{{ $message }}</div>
                @enderror

                <!-- Email input -->
                <div class="form-outline mb-4">
                
                    <input type="email" id="email" name="email" class="form-control form-control-lg"
                    placeholder="Enter a valid email address" required/>
                    <label class="form-label" for="form3Example3">Email address</label>
                   
                </div>

                <!-- Password input -->
                <div class="form-outline mb-3">
                    <input type="password" id="password" name="password" class="form-control form-control-lg"
                    placeholder="Enter password" required/>
                    <label class="form-label" for="form3Example4">Password</label>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <!-- Checkbox -->
                    <div class="form-check mb-0">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                    <label class="form-check-label" for="form2Example3">
                        Remember me
                    </label>
                    </div>
                    <a href="#!" class="text-body">Forgot password?</a>
                </div>

                <div class="text-center text-lg-start mt-4 pt-2">
                    <button type="submit" class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                    <!-- <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                        class="link-danger">Register</a></p> -->
                </div>

                </form>
            </div>
            </div>
        </div>
        </section>
  </div>

  <!-- Sign Up Pill -->
  <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
    <!-- Section: Design Block -->
            <section class="text-center text-lg-start">
            <style>
                .cascading-right {
                margin-right: -50px;
                }

                @media (max-width: 991.98px) {
                .cascading-right {
                    margin-right: 0;
                }
                }
            </style>

            <!-- Jumbotron -->
            <div class="container py-4">
                <div class="row g-0 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card cascading-right" style="
                        background: hsla(0, 0%, 100%, 0.55);
                        backdrop-filter: blur(30px);
                        ">
                    <div class="card-body p-5 shadow-5 text-center">
                        <h2 class="fw-bold mb-5">Sign up now</h2>
                        <form action=" {{ route('user.signup') }}" method="post">
                            @csrf
                        <!-- 2 column grid layout with text inputs for thfirst and last names -->
                        <div class="row">
                            <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="firstname" name="firstname" class="form-control"/>
                                <label class="form-label" for="form3Example1">First name</label>
                                @error('firstname')
                                <div class="alert-danger" >{{ $message }}</div>
                                @enderror
                            </div>
                            </div>
                            <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="lastname" name="lastname" class="form-control" required/>
                                <label class="form-label" for="form3Example2">Last name</label>
                                @error('lastname')
                                <div class="alert-danger" >{{ $message }}</div>
                                @enderror
                            </div>
                            </div>
                        </div>

                        <!-- Username input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="username" name="username" class="form-control" required/>
                            <label class="form-label" for="form3Example3">Desired Username</label>
                            @error('username')
                            <div class="alert-danger" >{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="email" name="email" class="form-control" required/>
                            <label class="form-label" for="form3Example3">Email address</label>
                            @error('email')
                            <div class="alert-danger" >{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="password" name="password" class="form-control" required/>
                            <label class="form-label" for="form3Example4">Password</label>
                            @error('password')
                            <div class="alert-danger" >{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4">
                            Sign up
                        </button>
                        </form>
                    </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">
                    <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" class="w-100 rounded-4 shadow-4"
                    alt="" />
                </div>
                </div>
            </div>
            <!-- Jumbotron -->
            </section>
<!-- Section: Design Block -->
  </div>
</div>
<!-- Pills content -->
@endsection