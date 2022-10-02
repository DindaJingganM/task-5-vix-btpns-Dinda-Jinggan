<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Favicon -->
  <link href="{{ asset('logo.png') }}" rel="shortcut icon" />
  
    <title>Login </title>

  <!-- Bootstrap -->
  <link href="{{asset('assetsadmin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{asset('assetsadmin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- NProgress -->
  <link href="{{asset('assetsadmin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
  <!-- Animate.css -->
  <link href="{{asset('assetsadmin/vendors/animate.css/animate.min.css')}}" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="{{asset('assetsadmin/build/css/custom.min.css')}}" rel="stylesheet">
</head>

<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <h1>Login Form</h1>
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
              <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div>
              <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                  {{ __('Remember Me') }}
                </label>
              </div>
            </div>
            <br>
            <div>
              <button class="btn btn-primary btn-sm btn-flat" type="submit" class="btn btn-link btn-sm" >
                {{ __('Login') }}
              </button>
              
            </div>
          </form>

          <div class="clearfix"></div>

          <div class="separator">
            <p class="change_link">Belum Memiliki Akun?
            <button class="btn btn-warning btn-sm btn-flat">
              <a href="{{ route('register') }}" class="to_register" style="color: white;"> Register Akun DIsini </a></button>
            </p>
            <p class="change_link">Kembali Ke Website?
              <a href="{{ route('homepengunjung') }}" class="to_register"> Back </a>
            </p>
            <div class="clearfix"></div>
            <br />

            <div>
              <h1><i class="fa fa-user"></i> Makam Bung Karno !</h1>
              <p>©2022 Dinas Pariwisata Kota Blitar. Makam Bung Karno. Mahasiswa Politeknik Negeri Malang</p>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</body>

</html>