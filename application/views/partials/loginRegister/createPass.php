<body>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <img src="<?php echo base_url('assets/images/loginregistIMG/bgLogin.jpg') ?>" alt="background" class="z-0 absolute blur-sm w-screen h-screen">
        <div class="container w-4/12 h-auto border-2 bg-white rounded-md p-12 z-10">
            <div class=" w-100 ">
                <div class=" mx-auto">
                    <p class="flex justify-center align-items-center text-green-600 font-bold text-3xl">Adi Abian <span class="text-black"> Villa</span></p>
                    <p class="font-bold text-md">Sign in or Create Account</p>
                    <form action="<?= site_url('auth/createPass'); ?>" method="post" class="pt-3">
                        <div class="form-group">
                            <input type="hidden" class="form-control form-control-lg" placeholder="Email or Username" name="identity" value="<?= $identity; ?>" required>
                        </div>
                        <div class="form-group">
                            <h5>New Password</h5>
                            <input type="password" class="form-control form-control-lg" placeholder="Enter your new password" name="password">
                        </div>
                        <small class="text-danger"><?= form_error('password'); ?></small>


                        <div class="form-group mt-3">
                            <h5>Confirm Password</h5>
                            <input type="password" class="form-control form-control-lg" placeholder="Enter Your Confirm Password" name="password2">
                        </div>
                        <small class="text-danger"><?= form_error('password2'); ?></small>

                        <?php if (isset($error)) { echo '<p>'.$error.'</p>'; } ?>
                        <div class="mt-3 d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-md">Register</button>
                        </div>
                        <div class="my-2 d-flex justify-content-end align-items-center">
                            <a href="<?= base_url('auth/forgotPassword')?>" class="auth-link text-black">Forgot password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>