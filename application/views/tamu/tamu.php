<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-100 to-blue-300 py-12 px-4 lg:px-0">
    <div class="w-full max-w-6xl grid grid-cols-1 lg:grid-cols-2 gap-8">
        <?php foreach ($tamu as $tamus) : ?>
            <!-- Profile Card -->
            <div class="bg-white shadow-2xl rounded-lg overflow-hidden p-6 transition transform hover:scale-105 hover:shadow-xl">
                <h2 class="text-4xl font-bold mb-10 text-center text-black-600">Profile Tamu</h2>
                <form class="mb-10">
                    <div class="flex flex-col items-center mb-6">
                        <?php if (!empty($tamus['foto_profil'])) : ?>
                            <img class="w-32 h-32 rounded-full object-cover mb-4 border-4 border-gray-300 hover:shadow-lg transition duration-500 ease-in-out" src="<?php echo base_url('assets/foto/') . $tamus['foto_profil'] ?>" alt="Profile Picture">
                        <?php else : ?>
                            <!-- Default Profile Picture -->
                            <img class="w-32 h-32 rounded-full object-cover mb-4 border-4 border-gray-300 hover:shadow-lg transition duration-500 ease-in-out" src="<?php echo base_url('assets/foto/icon_user.jpg') ?>" alt="Default Profile Picture">
                        <?php endif; ?>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                        <input type="text" value="<?php echo $tamus['username'] ?>" class="w-full px-3 py-2 border rounded-lg text-gray-700 shadow-sm focus:outline-none focus:border-blue-500" disabled>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">No. Telp</label>
                        <input type="text" value="<?php echo $tamus['no_telp'] ?>" class="w-full px-3 py-2 border rounded-lg text-gray-700 shadow-sm focus:outline-none focus:border-blue-500" disabled>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input type="text" value="<?php echo $tamus['email'] ?>" class="w-full px-3 py-2 border rounded-lg text-gray-700 shadow-sm focus:outline-none focus:border-blue-500" disabled>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Jenis Kelamin</label>
                        <input type="text" value="<?php echo $tamus['jenis_kelamin'] ?>" class="w-full px-3 py-2 border rounded-lg text-gray-700 shadow-sm focus:outline-none focus:border-blue-500" disabled>
                    </div>
                </form>
                <!-- Button Section -->
                <div class="flex justify-between mt-10">
                    <a href="<?php echo base_url('c_home') ?>" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                        Kembali
                    </a>
                    <a href="<?php echo base_url('tamu/editProfile/') . $tamus['id_tamu'] ?>" class="bg-yellow-500 text-white px-6 py-3 rounded-lg hover:bg-yellow-600 transition duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                        Edit Profil
                    </a>
                </div>
            </div>
            <!-- Additional Info Card -->
            <div class="bg-white shadow-2xl rounded-lg overflow-hidden p-6 transition transform hover:scale-105 hover:shadow-xl">
                <h2 class="text-4xl font-bold mb-10 text-center text-black-600">Additional Info</h2>
                <p class="text-gray-700 mb-4">Hello, <?php echo $tamus['username']; ?>. Welcome to your profile dashboard! Here, you have access to additional details about your profile.</p>
                <p class="text-gray-700 mb-4">You're in control of your personal information. Feel free to make any updates you need. Whether it's changing your username, updating your phone number, adjusting your gender, or refreshing your profile picture, it's all in your hands.</p>
                <p class="text-gray-700">Remember, your email information is permanent and cannot be changed. However, for any other assistance or inquiries, our support team is just a click away.</p>
                <p class="text-gray-700 mb-4">If you have any questions or need further assistance, don't hesitate to reach out. We're here to help!</p>
            </div>
        <?php endforeach ?>
    </div>
</div>
