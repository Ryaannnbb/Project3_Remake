<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
  <title>Corporate UI by Creative Tim</title>
  <!-- Fonts and icons -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700"
    rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/349ee9c857.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/css/corporate-ui-dashboard.css') }}" rel="stylesheet" />
</head>

<body class="">
  <main class="main-content mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="position-absolute w-40 top-0 start-0 h-100 d-md-block d-none">
                <div class="oblique-image position-absolute d-flex fixed-top ms-auto h-100 z-index-0 me-n8"
                  style="background-image:url('{{ asset('assets/img/isolated-shot-retriever-dog-ginger-cat-front-white-surface-looking-right.jpg') }}'); background-size: contain; background-repeat: no-repeat; background-position-y: center;">
                </div>
              </div>
            </div>
            <div class="col-md-4 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-black text-dark display-6">Reset Password</h3>
                  <p class="mb-0">Welcome to our Pet Shop! Please enter your details to create an account.</p>
                </div>
                <div class="card-body">
                  <form role="form" method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <label>Email Address</label>
                    <div class="mb-3">
                      <input type="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Enter your email address" aria-label="Email" aria-describedby="email-addon"
                        name="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>

                      @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <label>Password</label>
                    <div class="mb-3">
                      <input type="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Create a password" aria-label="Password" aria-describedby="password-addon"
                        name="password" autocomplete="new-password">

                      @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <label> Re-Password</label>
                    <div class="mb-3">
                      <input type="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Create a password" aria-label="Password" aria-describedby="password-addon"
                        name="password_confirmation" autocomplete="new-password">

                      @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    {{-- <div class="d-flex align-items-center">
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="text-xs font-weight-bold mx-0">Back to Login</a>
                        @endif
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-xs font-weight-bold ms-auto">Back to Register</a>
                        @endif
                    </div> --}}
                    <div class="text-center">
                      <button type="submit" class="btn btn-dark w-100 mt-4 mb-3">Reset Passoword</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  {{-- <p class="mb-4 text-xs mx-auto">
                    Already have an account?
                    @if (Route::has('login'))
                      <a href="{{ route('login') }}" class="text-dark font-weight-bold">Sign in</a>
                    @endif
                  </p> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Corporate UI Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/corporate-ui-dashboard.min.js') }}"></script>
</body>

</html>
