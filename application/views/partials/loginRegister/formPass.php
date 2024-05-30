<body>
    <form action="<?= site_url('auth/verify_password'); ?>" method="post">
        <input type="hidden" name="email" value="<?= $email; ?>">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Login</button>
        <?php if (isset($error)) {
            echo '<p>' . $error . '</p>';
        } ?>
    </form>
</body>