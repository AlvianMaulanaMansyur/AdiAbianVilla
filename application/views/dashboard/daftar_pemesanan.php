Daftar Pemesanan
<div class="relative overflow-x-auto">

    <table class="w-full text-md text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr class="text-center">
                <th>ID</th>
                <th>Tanggal Pemesanan</th>
                <th>Tanggal Checkin</th>
                <th>Tanggal Checkout</th>
                <th>status</th>
                <th>Jumlah Kamar</th>
                <th>Dewasa</th>
                <th>Anak</th>
                <!-- <th>Tamu</th> -->
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
                        <?php echo $p->status; ?>

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
                    <!-- <td>
                        <?php echo $p->id_tamu; ?>
                    </td> -->

                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>