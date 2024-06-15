Daftar Pemesanan
<!-- <button class="inline-flex items-center justify-center p-1 me-3 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
    <span class="sr-only">Quantity button</span>
    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
    </svg>
</button>
<div>
    <input type="number" id="first_product" class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1" required />
</div>
<button class="inline-flex items-center justify-center h-6 w-6 p-1 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
    <span class="sr-only">Quantity button</span>
    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
    </svg>
</button> -->
<div class="relative overflow-x-auto">

    <table class="w-full text-md text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr class="text-center">
                <th>ID</th>
                <th>Tanggal Pemesanan</th>
                <th>Tanggal Checkin</th>
                <th>Tanggal Checkout</th>
                <th>Jumlah Kamar</th>
                <th>Dewasa</th>
                <th>Anak</th>
                <th>Tamu</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php foreach ($pemesanan as $p) : ?>
                <tr class="text-center">
                    <td><?php echo $p->id_pemesanan; ?></td>

                    <td>
                        <?php echo $p->tgl_pemesanan; ?>

                    </td>
                    <td>
                        <?php echo $p->tgl_checkIn; ?>

                    </td>
                    <td>
                        <?php echo $p->tgl_checkOut; ?>

                    </td>
                    <td>
                        <?php echo $p->jumlah_kamar; ?>

                    </td>
                    <td>
                        <?php echo $p->dewasa; ?>

                    </td>
                    <td>
                        <?php echo $p->anak; ?>

                    </td>
                    <td>
                        <?php echo $p->id_tamu; ?>
                    </td>
                    <td><a href="<?php echo base_url('pemesanan/editpemesanan/'.$p->id_pemesanan) ?>">Edit</a>
                       <a href="<?php echo base_url('pemesanan/deletepemesanan/'.$p->id_pemesanan) ?>">Hapus</a></td>

                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>