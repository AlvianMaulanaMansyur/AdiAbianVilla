<body>
<div class="overflow-x-auto">
  <table class="table">
    <!-- head -->
    <thead>
      <tr>
        <th>No</th>
        <th>Foto Profil</th>
        <th>Username</th>
        <th>Email</th>
        <th>No Telp</th>
        <th>Jenis Kelamin</th>
        <th>Negara</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if (isset($guest) && !empty($guest)) : ?>
        <?php $no = 1; ?>
        <?php foreach ($guest as $key) : ?>
          <tr>
            <td><?= $no++; ?></td>
            <td>
              <div class="flex items-center  gap-3 mr-2">
                <div class="avatar">
                  <div class="mask mask-squircle w-12 h-12">
                    <img src="<?= base_url($key['foto_profil']); ?>" alt="Profile Picture" />
                  </div>
                </div>
              </div>  
            </td>
            <td><?= $key['username']; ?></td>
            <td><?= $key['email']; ?></td>
            <td><?= $key['no_telp']; ?></td>
            <td><?= $key['jenis_kelamin']; ?></td>
            <td><?= $key['negara']; ?></td>
            <td> 
              <a href=""><button class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></button></a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
    <!-- foot -->
  </table>
</div>
</body>
