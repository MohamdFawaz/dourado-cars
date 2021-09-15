<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{__('admin.auth.login')}} - {{__('admin.dourado_cars')}}</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/pages/auth.css')}}">
</head>

<body>
<div id="auth">

    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <img src="{{asset('images/logoWText-min.png')}}" alt="Logo">
                </div>
                <h1 class="auth-title">{{ __('Login') }}</h1>
                <p class="auth-subtitle mb-5">Log in to Dourado Cars Admin Portal</p>

                <form method="POST" action="{{ route('login') }}">
                    {{method_field("post")}}
                    {{csrf_field()}}
                    <div class="form-group position-relative has-icon-left mb-2">
                        <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}"
                               class="form-control form-control-xl" name="email" value="{{ old('email') }}" required
                               autocomplete="email" autofocus>
                    </div>
                    @error('email')
                    <div class="invalid-feedback" style="display: block">
                        <i class="bx bx-radio-circle"></i>
                        {{$message}}
                    </div>
                    @enderror

                    <div class="form-group position-relative has-icon-left mb-2">
                        <input id="password" type="password" placeholder="{{ __('Password') }}"
                               class="form-control form-control-xl" name="password" required
                               autocomplete="current-password">
                    </div>

                    @error('password')
                    <div class="invalid-feedback" style="display: block">
                        <i class="bx bx-radio-circle"></i>
                        {{$message}}
                    </div>
                    @enderror
                    {{--                    <div class="form-check form-check-lg d-flex align-items-end">--}}
                    {{--                        <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">--}}
                    {{--                        <label class="form-check-label text-gray-600" for="flexCheckDefault">--}}
                    {{--                            Keep me logged in--}}
                    {{--                        </label>--}}
                    {{--                    </div>--}}
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                </form>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">

            </div>
        </div>
    </div>

</div>
</body>

</html>
