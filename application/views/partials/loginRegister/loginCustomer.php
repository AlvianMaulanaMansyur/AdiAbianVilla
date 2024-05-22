<body>
<form id="email-form">
        <input type="email" name="email" id="email" placeholder="Email" required>
        <button type="submit">Next</button>
    </form>

    <form id="password-form" style="display:none;">
        <input type="password" name="password" id="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

    <form id="create-password-form" style="display:none;">
        <input type="password" name="new_password" id="new_password" placeholder="Create Password" required>
        <button type="submit">Create Password</button>
    </form>
</body>

<script>
    $(document).ready(function() {
    $('#email-form').on('submit', function(e) {
        e.preventDefault();
        var email = $('#email').val();
        console.log("Email submitted: " + email);

        $.post("<?php echo site_url('auth/check_email'); ?>", { email: email }, function(data) {
            console.log("Response received: " + data);
            var response = JSON.parse(data);
            if (response.exists) {
                $('#password-form').show();
                $('#create-password-form').hide();
            } else {
                $('#create-password-form').show();
                $('#password-form').hide();
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.error("Request failed: " + textStatus + ", " + errorThrown);
        });
    });

    $('#password-form').on('submit', function(e) {
        e.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();

        $.post("<?php echo site_url('auth/process_login'); ?>", { email: email, password: password }, function(data) {
            var response = JSON.parse(data);
            if (response.success) {
                window.location.href = "<?php echo site_url('main'); ?>";
            } else {
                alert(response.message);
            }
        });
    });

    $('#create-password-form').on('submit', function(e) {
        e.preventDefault();
        var email = $('#email').val();
        var newPassword = $('#new_password').val();

        $.post("<?php echo site_url('auth/create_password'); ?>", { email: email, password: newPassword }, function(data) {
            console.log("Create password response: " + data);
            // Handle create password response
        });
    });
});

</script>
