<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - Java Argoindustri</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?=base_url(); ?>assets/css/bootstrap.css">
        <link rel="stylesheet" href="<?=base_url(); ?>assets/vendors/bootstrap-icons/bootstrap-icons.css">
        <link rel="stylesheet" href="<?=base_url(); ?>assets/css/app.css">
        <link rel="stylesheet" href="<?=base_url(); ?>assets/css/pages/auth.css">
    </head>

    <body>
        <div id="auth">
            
            <div class="row h-100">
                <div class="col-lg-5 col-12">
                    <div id="auth-left">
                        <div class="auth-logo">
                            <img src="<?= base_url(); ?>assets/images/logo/logo2.png" alt="Logo">
                        </div>
                        <h1 class="auth-title">Log in.</h1>
                        
                        <!-- alert -->
                        <?= $this->session->flashdata('message'); ?>

                        <!-- <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p> -->

                        <form action="<?= base_url(); ?>P_auth/login" method="post" >
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input id="username" name="username" type="text" class="form-control form-control-xl" placeholder="Username" required="">
                                <div class="form-control-icon" >
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input id="password" name="password" type="password" class="form-control form-control-xl" placeholder="Password"  required="">
                                <div class="form-control-icon">
                                    <i class="bi bi-shield-lock"></i>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                        </form>

                        <!-- <div class="text-center mt-5 text-lg fs-4">
                            <p class="text-gray-600">Don't have an account? <a href="auth-register.html" class="font-bold">Sign
                                    up</a>.</p>
                            <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p>
                        </div> -->
                        
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
