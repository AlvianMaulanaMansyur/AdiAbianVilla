<body>
    <div class="flex justify-center items-center min-h-screen">
        <div class=" w-100 mx-0">
            <div class="col-lg-4 mx-auto">
                <div class="py-5 px-4 px-sm-5">
                    <p class="font-bold text-md">Sign in or Create Account</p>
                    <form action="<?= site_url('auth/login'); ?>" method="post" class="pt-3">
                        <div class="form-group">
                            <h5>Email or Username</h5>
                            <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                        </div>
                        <div class="mt-3 d-grid gap-2">
                            <a class="btn btn-primary btn-md">Continue</a>
                        </div>
                        <div class="my-2 d-flex justify-content-end align-items-center">
                            <a href="#" class="auth-link text-black">Forgot password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
</body>