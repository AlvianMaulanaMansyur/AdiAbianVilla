<body>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <img src="<?php echo base_url('assets/images/loginregistIMG/bgLogin.jpg') ?>" alt="background" class="z-0 absolute blur-sm w-screen h-screen">
        <div class="container w-4/12 h-96 border-2 bg-white rounded-md p-12 z-10">
            <div class=" w-100 ">
                <div class=" mx-auto">
                    <p class="flex justify-center align-items-center text-green-600 font-bold text-3xl">Adi Abian <span class="text-black"> Villa</span></p>
                    <p class="flex justify-center text-xs">ADMIN MODE</p>
                    <form action="<?php echo site_url('authadmin/process_login'); ?>" method="post" class="pt-3">
                        <?php 
                        if ($this->session->flashdata('error_message')) {
                            echo '<p style="color:red;">' . $this->session->flashdata('error_message') . '</p>';
                        }
                        ?>
                        <div class="form-group">
                            <h5>Username</h5>
                            <input type="text" class="form-control form-control-lg" placeholder="Email or Username" name="username">
                        </div>
                        <div class="form-group mt-3">
                            <h5>Password</h5>
                            <input type="password" class="form-control form-control-lg" placeholder="Enter Your Password!" name="password">
                        </div>
                        <div class="mt-3 d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-md">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
