

<form action="<?php echo base_url('pemesanan/submiteditpemesanan') ?>" method="post">
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="id_pemesanan">
            Id
        </label>
        <input class="disabled shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="id_pemesanan" name="id_pemesanan" type="text" placeholder="Nama Lengkap" value="<?php echo $pemesanan[0]->id_pemesanan ?>">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="tgl_pemesanan">
            Tanggal Pemesanan
        </label>
        <input class="disabled shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="tgl_pemesanan" name="tgl_pemesanan" type="text" placeholder="Nama Lengkap" value="<?php echo $pemesanan[0]->tgl_pemesanan ?>">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="tgl_checkIn">
            Tanggal Checkin
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="tgl_checkIn" name="tgl_checkIn" type="text" placeholder="Nama Lengkap" value="<?php echo $pemesanan[0]->tgl_checkIn ?>">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="tgl_checkOut">
            Tanggal Checkout
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="tgl_checkOut" name="tgl_checkOut" type="text" placeholder="Nama Lengkap" value="<?php echo $pemesanan[0]->tgl_checkOut ?>">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="jumlah_kamar">
            Jumlah Kamar
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="jumlah_kamar" name="jumlah_kamar" type="text" placeholder="Nama Lengkap" value="<?php echo $pemesanan[0]->jumlah_kamar ?>">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="status">
            Status
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="status" name="status" type="text" placeholder="Nama Lengkap" value="<?php echo $pemesanan[0]->status ?>">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="dewasa">
            Dewasa
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="dewasa" name="dewasa" type="text" placeholder="Nama Lengkap" value="<?php echo $pemesanan[0]->dewasa ?>">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="anak">
            Anak
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="anak" name="anak" type="text" placeholder="Nama Lengkap" value="<?php echo $pemesanan[0]->anak ?>">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="id_tamu">
            Tamu
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="id_tamu" name="id_tamu" type="text" placeholder="Nama Lengkap" value="<?php echo $pemesanan[0]->id_tamu ?>">
    </div>
     <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
            Id_Admin
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" type="text" placeholder="Nama Lengkap" value="<?php echo $pemesanan[0]->id_admin ?>">
    </div>
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Submit
      </button>
</form>