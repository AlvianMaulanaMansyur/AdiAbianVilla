<body>

    <?php echo form_open('Auth/process_login'); ?>
        <div class="">
            <input type="text" placeholder="username" value="<?php echo set_value('username');?>" name="username" id="username">
        </div>
        <div class="">
            <input type="text" placeholder="password" value="<?php echo set_value('password');?>" name="password" id="password">
        </div>
        <br>
        <button type="submit">Login</button>
    <?php echo form_close(); ?>   

</body>
