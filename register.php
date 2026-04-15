<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-black text-white" style="font-family: 'Inter', sans-serif;">

<div class="container-fluid">
    <div class="row vh-100">
        <div class="col-lg-6 d-flex align-items-center justify-content-center p-5">
            <div class="w-100" style="max-width: 400px;">
                
                <div class="text-center mb-4">
                    <h1 class="fw-normal">Welcome</h1>
                    <p class="text-secondary small">please enter your details</p>
                </div>

                <form action="includes/register_proses.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label small text-secondary">Full Name</label>
                        <input type="text" class="form-control bg-secondary-subtle border-0 rounded-3 py-2 text-dark" name="full_name">
                    </div>

                    <div class="mb-3">
                        <label class="form-label small text-secondary">Username</label>
                        <input type="text" name="username" class="form-control bg-secondary-subtle border-0 rounded-3 py-2 text-dark" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small text-secondary">Email Address</label>
                        <input type="email" name="email" class="form-control bg-secondary-subtle border-0 rounded-3 py-2 text-dark" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small text-secondary">Password</label>
                        <input type="password" name="password" class="form-control bg-secondary-subtle border-0 rounded-3 py-2 text-dark" required>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input bg-dark border-secondary" type="checkbox" id="remember">
                            <label class="form-check-label small text-secondary" for="remember">Remember me</label>
                        </div>
                        <a href="#" class="small text-secondary text-decoration-none">Forgot Password?</a>
                    </div>

                    <button type="submit" name="register" class="btn w-100 rounded-pill py-2 fw-bold text-white shadow" style="background-color: #c084fc;">Sign Up</button>
                </form>

                <p class="text-center mt-4 text-secondary" style="font-size: 0.7rem;">
                    By continuing, you agree to uptech <a href="#" class="text-white">Terms of service</a> and <a href="#" class="text-white">Privacy Policy</a>
                </p>
            </div>
        </div>

        <div class="col-lg-6 d-none d-lg-block p-0" 
             style="background: url('assets/foto_mua.jpeg') center/cover no-repeat;">
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>