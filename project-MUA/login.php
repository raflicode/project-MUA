<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      background: #000;
      font-family: 'Segoe UI', sans-serif;
      min-height: 100vh;
      display: flex;
    }

    .left {
      width: 50%;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 60px 80px;
      background: #000;
      color: #fff;
    }

    .left h1 {
      font-size: 2.8rem;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .left p {
      color: #aaa;
      font-size: 0.95rem;
      margin-bottom: 36px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      font-size: 0.9rem;
      color: #fff;
      margin-bottom: 8px;
    }

    .form-group input {
      width: 100%;
      padding: 14px 16px;
      background: #1a1a1a;
      border: none;
      border-radius: 8px;
      color: #fff;
      font-size: 0.95rem;
      outline: none;
    }

    .form-group input:focus {
      background: #222;
    }

    .row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 28px;
    }

    .remember {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 0.875rem;
      color: #fff;
      cursor: pointer;
    }

    .remember input[type="checkbox"] {
      width: 16px;
      height: 16px;
      accent-color: #9b59b6;
      cursor: pointer;
    }

    .forgot {
      font-size: 0.875rem;
      color: #fff;
      text-decoration: none;
    }

    .forgot:hover { text-decoration: underline; }

    .btn-login {
      width: 100%;
      padding: 15px;
      background: linear-gradient(to right, #9b59b6, #b56ac9);
      border: none;
      border-radius: 50px;
      color: #fff;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: opacity 0.2s;
    }

    .btn-login:hover { opacity: 0.9; }

    .signup-text {
      text-align: center;
      margin-top: 20px;
      font-size: 0.875rem;
      color: #aaa;
    }

    .signup-text a {
      color: #b56ac9;
      text-decoration: none;
    }

    .signup-text a:hover { text-decoration: underline; }

    .right {
      width: 50%;
      min-height: 100vh;
      background-image: url('assets/foto_mua.jpeg');
      background-size: cover;
      background-position: center;
    }

    /* ── MOBILE ── */
    @media (max-width: 768px) {
      body {
        flex-direction: column;
        min-height: 100vh;
      }

      /* foto muncul di atas */
      .right {
        width: 100%;
        min-height: 220px;
        height: 220px;
        order: -1;
      }

      .left {
        width: 100%;
        min-height: unset;
        padding: 36px 24px 48px;
      }

      .left h1 {
        font-size: 2rem;
      }

      .left p {
        margin-bottom: 24px;
      }
    }
  </style>
</head>
<body>

  <div class="left">
    <h1>Welcome</h1>
    <p>please enter your details</p>

    <form action="login_proses.php" method="POST">

      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="" required>
      </div>

      <div class="row">
        <label class="remember">
          <input type="checkbox" name="remember"> Remember me
        </label>
        <a href="forgot-password.php" class="forgot">Forgot Password?</a>
      </div>

      <button type="submit" name="login" class="btn-login">Login</button>

    </form>

    <div class="signup-text">
      Don't have an account? <a href="register.php">Sign Up</a>
    </div>
  </div>

  <div class="right"></div>

</body>
</html>