@extends('layouts.front')
@section('content')

<section class="page-section">
    <div class="container">
        <!-- Contact Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Registration Form</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                <!-- Form Start-->       
                <form action="{{ route('register.post') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf

                    <!-- First Name input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="fname" name="fname" type="text"  value="{{old('fname')}}"/>
                        <label for="fname">First name</label>
                        @if ($errors->has('fname'))
                            <span class="text-danger">{{ $errors->first('fname') }}</span>
                        @endif
                    </div>

                    <!-- Last Name input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="lname" name="lname" type="text" value="{{old('lname')}}"/>
                        <label for="lname">Last name</label>
                        @if ($errors->has('lname'))
                            <span class="text-danger">{{ $errors->first('lname') }}</span>
                        @endif
                    </div>

                    <!-- Email address input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" name="email" type="email"  value="{{old('email')}}"/>
                        <label for="email">Email address</label>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <!-- Password input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="password" name="password" type="password" value="{{old('password')}}"/>
                        <label for="password">Password</label>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <!-- Profile Picture input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="img" name="img" type="file"  />
                        <label for="img">Profile Picture</label>
                        @if ($errors->has('img'))
                            <span class="text-danger">{{ $errors->first('img') }}</span>
                        @endif
                    </div>

                    <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Register</button>
                </form>
                <!-- /. Form End-->
            </div>
        </div>
    </div>
</section>

@endsection