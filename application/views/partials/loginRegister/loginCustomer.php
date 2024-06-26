<body>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <img src="<?php echo base_url('assets/images/loginregistIMG/bgLogin.jpg') ?>" alt="background" class="z-0 absolute blur-sm w-screen h-screen">
        <div class="container w-4/12 h-96 border-2 bg-white rounded-md p-12 z-10">
            <div class=" w-100 ">
                <div class=" mx-auto">
                    <p class="flex justify-center align-items-center text-green-600 font-bold text-3xl">Adi Abian <span class="text-black"> Villa</span></p>
                    <p class="font-bold text-md">Sign in or Create Account</p>
                    <form action="<?php echo site_url('auth/login'); ?>" method="post" class="pt-3">
                        <div class="form-group">
                            <h5>Email or Username</h5>
                            <input type="text" class="form-control form-control-lg" placeholder="Email or Username" name="identity">
                        </div>
                        <small class="text-danger"><?= form_error('identity')?></small>
                        <div class="mt-3 d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-md">Continue</button>
                        </div>
                        <div class="my-2 d-flex justify-content-end align-items-center">
                            <a href="<?= base_url('Auth/forgotPassword'); ?>" class="auth-link text-black">Forgot password?</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>