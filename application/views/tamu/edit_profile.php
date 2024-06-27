<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-100 to-blue-300 py-12 px-4 lg:px-0">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-3xl mx-4 sm:mx-auto">
        <h2 class="text-3xl font-bold mb-8 text-center text-gray-700">Edit Profile</h2>

        <?php if ($this->session->flashdata('message')) : ?>
            <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3 mb-6" role="alert">
                <p class="text-sm"><?php echo $this->session->flashdata('message'); ?></p>
            </div>
        <?php endif; ?>

        <?php echo form_open_multipart('tamu/updateProfile'); ?>
        <input type="hidden" name="id_tamu" value="<?php echo $tamu['id_tamu']; ?>">

        <div class="mb-6">
            <label for="username" class="block text-gray-700 font-semibold mb-2">Username</label>
            <input type="text" id="username" name="username" class="bg-gray-100 w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo $tamu['username']; ?>">
            <?php echo form_error('username', '<div class="text-red-500 text-xs mt-1">', '</div>'); ?>
        </div>

        <div class="mb-6 hidden">
            <input type="hidden" id="password" name="password" class="bg-gray-100 w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo $tamu['password']; ?>">
            <?php echo form_error('password', '<div class="text-red-500 text-xs mt-1">', '</div>'); ?>
        </div>

        <div class="mb-6">
            <label for="no_telp" class="block text-gray-700 font-semibold mb-2">No Telp</label>
            <input type="text" id="no_telp" name="no_telp" class="bg-gray-100 w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo $tamu['no_telp']; ?>">
            <?php echo form_error('no_telp', '<div class="text-red-500 text-xs mt-1">', '</div>'); ?>
        </div>

        <div class="mb-6">
            <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
            <input disabled type="email" id="email" name="email" class="bg-gray-100 w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo $tamu['email']; ?>">
        </div>

        <div class="mb-6">
            <label for="jenis_kelamin" class="block text-gray-700 font-semibold mb-2">Jenis Kelamin</label>
            <select id="jenis_kelamin" name="jenis_kelamin" class="bg-gray-100 w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="Laki-laki" <?php echo ($tamu['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                <option value="Perempuan" <?php echo ($tamu['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
            </select>
            <?php echo form_error('jenis_kelamin', '<div class="text-red-500 text-xs mt-1">', '</div>'); ?>
        </div>

        <div class="mb-6">
            <label for="foto_profil" class="block text-gray-700 font-semibold mb-2">Foto Profil</label>
            <input type="file" id="foto_profil" name="foto_profil" class="bg-gray-100 w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

            <?php if (!empty($tamu['foto_profil'])) : ?>
                <div class="mt-4 flex items-center space-x-4">
                    <img src="<?php echo base_url('assets/foto/' . $tamu['foto_profil']); ?>" alt="Foto Profil" class="w-24 h-24 object-cover rounded-full shadow-md">
                    <a href="<?php echo base_url('tamu/deletePhoto/' . $tamu['id_tamu']); ?>" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-300 ease-in-out">
                        Hapus Foto
                    </a>
                </div>
            <?php endif; ?>

            <?php if (isset($upload_error)) : ?>
                <div class="text-red-500 text-xs mt-1"><?php echo $upload_error; ?></div>
            <?php endif; ?>
        </div>

        <div class="flex justify-between">
            <a href="<?php echo base_url('tamu/') ?>" class="bg-gray-500 text-white px-6 py-3 rounded-md hover:bg-gray-600 hover:shadow-lg transition duration-300 ease-in-out">
                Kembali
            </a>
            <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 hover:shadow-lg transition duration-300 ease-in-out">
                Save
            </button>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>