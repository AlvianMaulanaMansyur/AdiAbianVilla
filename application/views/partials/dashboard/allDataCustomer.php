<body>
    <div class="font-semibold text-3xl">
        <h1>Guest Data</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <?php if (isset($customer) && !empty($customer)) :  ?>
                    <tr> 
                        <th scope="col">ID Guest</th>
                        <th scope="col">Username</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telephon</th>
                    </tr>
            </thead>
            <tbody>
                    <?php if (isset($customer) && !empty($customer)) ?>
                    <?php foreach ($customer as $key) : ?>

                    <tr>
                        <td><?php echo $key['id_tamu']; ?></td>
                        <td><?php echo $key['username']; ?></td>
                        <td><?php echo $key['jenis_kelamin']; ?></td>
                        <td><?php echo $key['email']; ?></td>
                        <td><?php echo $key['no_telp']; ?></td>
                    </tr>
                    <?php endforeach;?>
            </tbody>
            <?php endif; ?>
        </table>
    </div>
</body>