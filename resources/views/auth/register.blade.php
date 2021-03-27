<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Bootstrap core CSS-->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin.css') }}" rel="stylesheet">

  </head>

  <body class="bg-dark">
  <div class="container">
      <div class="mx-auto mt-3 card card-register">
        <div class="card-header"></div>
        <div class="card-body">
            <div class="mb-3 card"style="margin-top:60px">
                <div class="card-header">
                  @if(session('success'))
                  <div class="alert alert-success" role="alert">
                      {{session('success')}}
                  </div>
                  <hr>
               @endif
          <form action="{{ url('registration') }}" method="POST">
              @csrf
          <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="firstName" class="form-control @error('name') is-invalid @enderror"" name="name" value="{{ old('name') }}" placeholder="Enter Name" required="required">
                <label for="firstName">{{ __('Name') }}</label>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control  @error('email') is-invalid @enderror" name="email" placeholder="Email address" required="required">
                <label for="inputEmail">{{ __('E-Mail Address') }}</label>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control @error('email') is-invalid @enderror" name="password" placeholder="Enter Password" required="required">
                <label for="inputPassword">{{ __('Password') }}</label>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>
            </div>

            <div class="form-group">
                <div class="form-label-group">
                    <input type="password" id="inputPassword1" class="form-control" name="password_confirmation" placeholder="Enter confirm Password" required autocomplete="new-password">
                  <label for="inputPassword1">{{ __('Confirm Password') }}</label>
                </div>
              </div>

            <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
          </form>
          <div class="text-center">
            <a class="mt-3 d-block small" href="{{ route('login') }}">Login Page</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  </body>

</html>
