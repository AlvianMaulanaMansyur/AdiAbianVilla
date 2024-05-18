<body>

    <?= form_open('Auth/register'); ?>
    <ul>
        <li><input type="text" placeholder="username" value="<?= set_value('username'); ?>" name="username" id="username"></li>
        <li><input type="text" placeholder="email" value="<?= set_value('email')?>" name="email" id="email"></li>
        <li><input type="text" placeholder="password" value="<?= set_value('password')?>" name="password" id="password"></li>
    </ul>
    <button type="submit" class="btn btn-primary">Register</button>

    <?= form_close(); ?>
</body>
