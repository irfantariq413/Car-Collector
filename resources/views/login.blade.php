@extends('layouts.front')
@section('content')

<section class="page-section">
    <div class="container">
        <!-- Contact Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Login</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>

        <div class="row justify-content-center">
            <!-- Error Messages-->
            @if ($message = Session::get('danger'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ $message }}
                </div>
            @endif

            <div class="col-lg-8 col-xl-7">
                <!-- Form Start-->
                <form action="{{ route('login.post') }}" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" name="email" type="email"  value="{{old('email')}}"/>
                        <label for="email">Email address</label>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="password" name="password" type="password" value="{{old('password')}}"/>
                        <label for="password">Password</label>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Login</button>
                </form>
                <!-- /.Form End-->
            </div>
        </div>
    </div>
</section>

@endsection