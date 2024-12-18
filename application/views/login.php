<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <!-- Login Form -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Login</h3>
                        <?php if ($this->session->flashdata('alert')): ?>
                            <div class="alert alert-danger text-center">
                                <?= $this->session->flashdata('alert'); ?>
                            </div>
                        <?php endif; ?>
                        <form action="<?= base_url('auth/login') ?>" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                        <div class="text-center mt-3">
                            <p>Tidak punya akun? <a href="<?= base_url('auth/view_register') ?>" class="text-primary">Ayo buat!</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Registration Form -->
        </div>
    </div>
</body>
</html>
