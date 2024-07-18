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
        <div class="mb-6">
            <label for="nama" class="block text-gray-700 font-semibold mb-2">Name</label>
            <input type="text" id="nama" name="nama" class="bg-gray-100 w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo $tamu['nama']; ?>">
            <?php echo form_error('nama', '<div class="text-red-500 text-xs mt-1">', '</div>'); ?>
        </div>

        <div class="mb-6 hidden">
            <input type="hidden" id="password" name="password" class="bg-gray-100 w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo $tamu['password']; ?>">
            <?php echo form_error('password', '<div class="text-red-500 text-xs mt-1">', '</div>'); ?>
        </div>

        <div class="mb-6">
            <label for="no_telp" class="block text-gray-700 font-semibold mb-2">Phone number</label>
            <input type="text" id="no_telp" name="no_telp" class="bg-gray-100 w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo $tamu['no_telp']; ?>">
            <?php echo form_error('no_telp', '<div class="text-red-500 text-xs mt-1">', '</div>'); ?>
        </div>

        <div class="mb-6">
            <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
            <input disabled type="email" id="email" name="email" class="bg-gray-100 w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo $tamu['email']; ?>">
        </div>

        <div class="mb-6">
            <label for="jenis_kelamin" class="block text-gray-700 font-semibold mb-2">Gender</label>
            <select id="jenis_kelamin" name="jenis_kelamin" class="bg-gray-100 w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="Male" <?php echo ($tamu['jenis_kelamin'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo ($tamu['jenis_kelamin'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                <option value="Other" <?php echo ($tamu['jenis_kelamin'] == 'Other') ? 'selected' : ''; ?>>Other</option>
            </select>
            <?php echo form_error('jenis_kelamin', '<div class="text-red-500 text-xs mt-1">', '</div>'); ?>
        </div>

        <div class="mb-6">
            <label for="negara" class="block text-gray-700 font-semibold mb-2">Nationality</label>
            <select name="negara" id="negara" class="bg-gray-100 w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">-- select one --</option>
                <option value="afghan">Afghan</option>
                <option value="albanian">Albanian</option>
                <option value="algerian">Algerian</option>
                <option value="american">American</option>
                <option value="andorran">Andorran</option>
                <option value="angolan">Angolan</option>
                <option value="antiguans">Antiguans</option>
                <option value="argentinean">Argentinean</option>
                <option value="armenian">Armenian</option>
                <option value="australian">Australian</option>
                <option value="austrian">Austrian</option>
                <option value="azerbaijani">Azerbaijani</option>
                <option value="bahamian">Bahamian</option>
                <option value="bahraini">Bahraini</option>
                <option value="bangladeshi">Bangladeshi</option>
                <option value="barbadian">Barbadian</option>
                <option value="barbudans">Barbudans</option>
                <option value="batswana">Batswana</option>
                <option value="belarusian">Belarusian</option>
                <option value="belgian">Belgian</option>
                <option value="belizean">Belizean</option>
                <option value="beninese">Beninese</option>
                <option value="bhutanese">Bhutanese</option>
                <option value="bolivian">Bolivian</option>
                <option value="bosnian">Bosnian</option>
                <option value="brazilian">Brazilian</option>
                <option value="british">British</option>
                <option value="bruneian">Bruneian</option>
                <option value="bulgarian">Bulgarian</option>
                <option value="burkinabe">Burkinabe</option>
                <option value="burmese">Burmese</option>
                <option value="burundian">Burundian</option>
                <option value="cambodian">Cambodian</option>
                <option value="cameroonian">Cameroonian</option>
                <option value="canadian">Canadian</option>
                <option value="cape verdean">Cape Verdean</option>
                <option value="central african">Central African</option>
                <option value="chadian">Chadian</option>
                <option value="chilean">Chilean</option>
                <option value="chinese">Chinese</option>
                <option value="colombian">Colombian</option>
                <option value="comoran">Comoran</option>
                <option value="congolese">Congolese</option>
                <option value="costa rican">Costa Rican</option>
                <option value="croatian">Croatian</option>
                <option value="cuban">Cuban</option>
                <option value="cypriot">Cypriot</option>
                <option value="czech">Czech</option>
                <option value="danish">Danish</option>
                <option value="djibouti">Djibouti</option>
                <option value="dominican">Dominican</option>
                <option value="dutch">Dutch</option>
                <option value="east timorese">East Timorese</option>
                <option value="ecuadorean">Ecuadorean</option>
                <option value="egyptian">Egyptian</option>
                <option value="emirian">Emirian</option>
                <option value="equatorial guinean">Equatorial Guinean</option>
                <option value="eritrean">Eritrean</option>
                <option value="estonian">Estonian</option>
                <option value="ethiopian">Ethiopian</option>
                <option value="fijian">Fijian</option>
                <option value="filipino">Filipino</option>
                <option value="finnish">Finnish</option>
                <option value="french">French</option>
                <option value="gabonese">Gabonese</option>
                <option value="gambian">Gambian</option>
                <option value="georgian">Georgian</option>
                <option value="german">German</option>
                <option value="ghanaian">Ghanaian</option>
                <option value="greek">Greek</option>
                <option value="grenadian">Grenadian</option>
                <option value="guatemalan">Guatemalan</option>
                <option value="guinea-bissauan">Guinea-Bissauan</option>
                <option value="guinean">Guinean</option>
                <option value="guyanese">Guyanese</option>
                <option value="haitian">Haitian</option>
                <option value="herzegovinian">Herzegovinian</option>
                <option value="honduran">Honduran</option>
                <option value="hungarian">Hungarian</option>
                <option value="icelander">Icelander</option>
                <option value="indian">Indian</option>
                <option value="indonesian">Indonesian</option>
                <option value="iranian">Iranian</option>
                <option value="iraqi">Iraqi</option>
                <option value="irish">Irish</option>
                <option value="israeli">Israeli</option>
                <option value="italian">Italian</option>
                <option value="ivorian">Ivorian</option>
                <option value="jamaican">Jamaican</option>
                <option value="japanese">Japanese</option>
                <option value="jordanian">Jordanian</option>
                <option value="kazakhstani">Kazakhstani</option>
                <option value="kenyan">Kenyan</option>
                <option value="kittian and nevisian">Kittian and Nevisian</option>
                <option value="kuwaiti">Kuwaiti</option>
                <option value="kyrgyz">Kyrgyz</option>
                <option value="laotian">Laotian</option>
                <option value="latvian">Latvian</option>
                <option value="lebanese">Lebanese</option>
                <option value="liberian">Liberian</option>
                <option value="libyan">Libyan</option>
                <option value="liechtensteiner">Liechtensteiner</option>
                <option value="lithuanian">Lithuanian</option>
                <option value="luxembourger">Luxembourger</option>
                <option value="macedonian">Macedonian</option>
                <option value="malagasy">Malagasy</option>
                <option value="malawian">Malawian</option>
                <option value="malaysian">Malaysian</option>
                <option value="maldivan">Maldivan</option>
                <option value="malian">Malian</option>
                <option value="maltese">Maltese</option>
                <option value="marshallese">Marshallese</option>
                <option value="mauritanian">Mauritanian</option>
                <option value="mauritian">Mauritian</option>
                <option value="mexican">Mexican</option>
                <option value="micronesian">Micronesian</option>
                <option value="moldovan">Moldovan</option>
                <option value="monacan">Monacan</option>
                <option value="mongolian">Mongolian</option>
                <option value="moroccan">Moroccan</option>
                <option value="mosotho">Mosotho</option>
                <option value="motswana">Motswana</option>
                <option value="mozambican">Mozambican</option>
                <option value="namibian">Namibian</option>
                <option value="nauruan">Nauruan</option>
                <option value="nepalese">Nepalese</option>
                <option value="new zealander">New Zealander</option>
                <option value="ni-vanuatu">Ni-Vanuatu</option>
                <option value="nicaraguan">Nicaraguan</option>
                <option value="nigerien">Nigerien</option>
                <option value="north korean">North Korean</option>
                <option value="northern irish">Northern Irish</option>
                <option value="norwegian">Norwegian</option>
                <option value="omani">Omani</option>
                <option value="pakistani">Pakistani</option>
                <option value="palauan">Palauan</option>
                <option value="panamanian">Panamanian</option>
                <option value="papua new guinean">Papua New Guinean</option>
                <option value="paraguayan">Paraguayan</option>
                <option value="peruvian">Peruvian</option>
                <option value="polish">Polish</option>
                <option value="portuguese">Portuguese</option>
                <option value="qatari">Qatari</option>
                <option value="romanian">Romanian</option>
                <option value="russian">Russian</option>
                <option value="rwandan">Rwandan</option>
                <option value="saint lucian">Saint Lucian</option>
                <option value="salvadoran">Salvadoran</option>
                <option value="samoan">Samoan</option>
                <option value="san marinese">San Marinese</option>
                <option value="sao tomean">Sao Tomean</option>
                <option value="saudi">Saudi</option>
                <option value="scottish">Scottish</option>
                <option value="senegalese">Senegalese</option>
                <option value="serbian">Serbian</option>
                <option value="seychellois">Seychellois</option>
                <option value="sierra leonean">Sierra Leonean</option>
                <option value="singaporean">Singaporean</option>
                <option value="slovakian">Slovakian</option>
                <option value="slovenian">Slovenian</option>
                <option value="solomon islander">Solomon Islander</option>
                <option value="somali">Somali</option>
                <option value="south african">South African</option>
                <option value="south korean">South Korean</option>
                <option value="spanish">Spanish</option>
                <option value="sri lankan">Sri Lankan</option>
                <option value="sudanese">Sudanese</option>
                <option value="surinamer">Surinamer</option>
                <option value="swazi">Swazi</option>
                <option value="swedish">Swedish</option>
                <option value="swiss">Swiss</option>
                <option value="syrian">Syrian</option>
                <option value="taiwanese">Taiwanese</option>
                <option value="tajik">Tajik</option>
                <option value="tanzanian">Tanzanian</option>
                <option value="thai">Thai</option>
                <option value="togolese">Togolese</option>
                <option value="tongan">Tongan</option>
                <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
                <option value="tunisian">Tunisian</option>
                <option value="turkish">Turkish</option>
                <option value="tuvaluan">Tuvaluan</option>
                <option value="ugandan">Ugandan</option>
                <option value="ukrainian">Ukrainian</option>
                <option value="uruguayan">Uruguayan</option>
                <option value="uzbekistani">Uzbekistani</option>
                <option value="venezuelan">Venezuelan</option>
                <option value="vietnamese">Vietnamese</option>
                <option value="welsh">Welsh</option>
                <option value="yemenite">Yemenite</option>
                <option value="zambian">Zambian</option>
                <option value="zimbabwean">Zimbabwean</option>
            </select>
        </div>

        <div class="mb-6">
            <label for="foto_profil" class="block text-gray-700 font-semibold mb-2">Profile picture</label>
            <input type="file" id="foto_profil" name="foto_profil" class="bg-gray-100 w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

            <?php if (!empty($tamu['foto_profil'])) : ?>
                <div class="mt-4 flex items-center space-x-4">
                    <img src="<?php echo base_url('assets/foto/' . $tamu['foto_profil']); ?>" alt="Foto Profil" class="w-24 h-24 object-cover rounded-full shadow-md">
                    <a href="<?php echo base_url('tamu/deletePhoto/' . $tamu['id_tamu']); ?>" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-300 ease-in-out">
                        Delete Photo
                    </a>
                </div>
            <?php endif; ?>

            <?php if (isset($upload_error)) : ?>
                <div class="text-red-500 text-xs mt-1"><?php echo $upload_error; ?></div>
            <?php endif; ?>
        </div>

        <div class="flex justify-between">
            <a href="<?php echo base_url('tamu/') ?>" class="bg-gray-500 text-white px-6 py-3 rounded-md hover:bg-gray-600 hover:shadow-lg transition duration-300 ease-in-out">
                Back
            </a>
            <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 hover:shadow-lg transition duration-300 ease-in-out flex items-center space-x-2">
                <span>Save</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 2a8 8 0 100 16 8 8 0 000-16zM9 13a1 1 0 11-2 0 1 1 0 012 0zm2-4a1 1 0 00-2 0v3a1 1 0 102 0V9z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>