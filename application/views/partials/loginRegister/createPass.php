<form action="<?= site_url('auth/createPass'); ?>" method="post">
    <input type="hidden" name="email" value="<?= $email; ?>">
    <label for="password">Create Password:</label>
    <input type="password" name="password" id="password" required>
    <button type="submit">Register</button>
</form>
