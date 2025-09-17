<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, #ff5a5a, #ff3b3b);
      overflow: hidden;
    }

    /* floating circles for background effect */
    .circle {
      position: absolute;
      border-radius: 50%;
      background: rgba(255,255,255,0.1);
      animation: float 10s linear infinite;
    }
    .circle:nth-child(1) { width: 200px; height: 200px; top: -50px; left: -50px; animation-delay: 0s; }
    .circle:nth-child(2) { width: 300px; height: 300px; bottom: -100px; right: -100px; animation-delay: 2s; }
    .circle:nth-child(3) { width: 150px; height: 150px; top: 100px; right: 50px; animation-delay: 4s; }

    @keyframes float {
      0% { transform: translateY(0px); }
      50% { transform: translateY(-20px); }
      100% { transform: translateY(0px); }
    }

    .login-card {
      position: relative;
      background: #fff;
      border-radius: 25px;
      padding: 50px 35px;
      width: 100%;
      max-width: 420px;
      box-shadow: 0 15px 40px rgba(0,0,0,0.3);
      z-index: 1;
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .login-card:hover{
        transform: translateY(-5px);
        box-shadow: 0 25px 60px rgba(0,0,0,0.6);
    }

    .login-card h3 {
      text-align: center;
      font-weight: 700;
      margin-bottom: 30px;
      color: #c71f1f;
    }

    .form-control {
      border-radius: 15px;
      padding: 14px;
      transition: 0.3s;
    }

    .form-control:focus {
      box-shadow: 0 0 10px rgba(199,31,31,0.5);
      border-color: #c71f1f;
    }

    .btn-login {
      border-radius: 15px;
      padding: 14px;
      background: #c71f1f;
      border: none;
      color: #fff;
      font-weight: 600;
      transition: 0.3s;
    }

    .btn-login:hover {
      background: #a21b1b;
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(199,31,31,0.4);
    }

    .extra-links {
      margin-top: 15px;
      text-align: center;
      font-size: 0.9rem;
    }

    .extra-links a {
      color: #c71f1f;
      text-decoration: none;
      font-weight: 500;
    }

    .extra-links a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <!-- floating background circles -->
  <div class="circle"></div>
  <div class="circle"></div>
  <div class="circle"></div>

  <div class="login-card">
        <div class="text-center mb-4">
            <img src="{{ asset('client/img/logo/suroviLogo.jpg') }}"
                width="80" height="80"
                alt="Surovi Logo"
                class="rounded-circle shadow-lg mb-2">
        <h4>Welcome to Surovi</h4>
        </div>

        <!-- Error show -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember">Remember Me</label>
        </div>
        <!-- Forgot Password -->
            @if (Route::has('password.request'))
                <div class="forgot-password text-end mb-3">
                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                </div>
            @endif

        <button type="submit" class="btn btn-login w-100">Login</button>

        {{-- <div class="extra-links">
            <a href="#">Forgot Password?</a> | <a href="{{ route('register') }}">Create Account</a>
        </div> --}}
        </form>
  </div>

</body>
</html>
