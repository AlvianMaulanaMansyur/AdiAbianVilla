Daftar Pemesanan
<div class="relative overflow-x-auto">

    <table class="table table-auto bg-black w-full">
        <thead class="bg-black">
            <tr class="text-center bg-black">
                <th>ID</th>
                <th>Booking Date</th>
                <th>Check-in Date</th>
                <th>Check-out Date</th>
                <th>Status</th>
                <th>Number of Rooms</th>
                <th>Adults</th>
                <th>Children</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php foreach ($pemesanan as $p) : ?>
                <tr class="text-center">
                    <td>
                        <div class="text-sm"><?php echo $p->id_pemesanan; ?></div>
                    </td>

                    <td>
                        <?php
                        $date = new DateTime($p->tgl_pemesanan);
                        $timestamp = $date->getTimestamp();
                        $formatted_date = strftime("%e %B %Y %H:%M:%S", $timestamp);
                        ?>
                        <div class="text-sm"><?php echo $formatted_date; ?></div>
                    </td>
                    <td>
                        <?php
                        $date = new DateTime($p->tgl_checkIn);
                        $timestamp = $date->getTimestamp();
                        $formatted_date = strftime("%e %B %Y", $timestamp);
                        ?>
                        <div class="text-sm"><?php echo $formatted_date; ?></div>

                    </td>
                    <td>
                        <?php
                        $date = new DateTime($p->tgl_checkOut);
                        $timestamp = $date->getTimestamp();
                        $formatted_date = strftime("%e %B %Y", $timestamp);
                        ?>
                        <div class="text-sm"><?php echo $formatted_date; ?></div>

                    </td>
                    <td>
                        <?php $status_data = $p->status; ?>
                        <?php if ($status_data == 0) : ?>
                            <div class="bg-red-500 text-white p-2"><?php echo "Pending"; ?></div>
                        <?php elseif ($status_data == 1) : ?>
                            <div class="bg-green-500 text-white p-2"><?php echo "Confirmed"; ?></div>
                        <?php endif ?>
                    </td>
                    <td>
                        <div class="text-sm"><?php echo $p->jumlah_kamar; ?></div>
                    </td>
                    <td>
                        <div class="text-sm"><?php echo $p->dewasa; ?></div>
                    </td>
                    <td>
                        <div class="text-sm"><?php echo $p->anak; ?></div>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>