@extends('../layout')

@section('page')
<div class="container bg-light pt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Boldtadvice Login') }}</div>

                <div class="card-body px-3 pt-0">

                    <div class="row pb-3" >
                        <div class="w-100 text-center ">
                           <!--  <img style="width: 75%; margin: auto;height: 200px;" src="images/logo.png"> -->
                          
                        </div>
                       
                        <div>
    
                        </div>
                    </div>

                    <div class="px-4 pt-4 pb-5 bg-white text-center" style="z-index:100;">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3 text-center">
                            <label for="email" class="font-weight-bold text-left col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-11 text-center">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="font-weight-bold text-left col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-11">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       <!-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <div class="row mb-0">
                            <div class="col-md-7 ">
                                <button style="background:#7c563cf0;" type="submit" class="px-3 py-2 btn float-left btn-primary">
                                    {{ __('Login') }}
                                </button>

                               
                            </div>

                            <div class="col-md-5  d-none">

                                @if (Route::has('password.request'))
                                    <a class="text-secondary btn btn-link" href="{{route('forgot','email')}}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>

                        </div>

                        <div class="row mt-4">
                            <div class="col-md-7 ">
                                
                                <p class="mt-2 small text-left">Don't have an account?</p>
                               
                            </div>

                            <div class="col-md-5 ">

                               <a style="background:#008353;" href="register" class="px-3 py-1 btn float-left btn-primary">
                                    {{ __('Register') }}
                                </a>
                            </div>

                        </div>

                    </form>
                    </div>
                    <div class="py-4"></div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
