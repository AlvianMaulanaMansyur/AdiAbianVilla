<!-- monthly_report_table -->
<div class="container-fluid px-2 mt-2 ">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 ">Monthly Report</h1>
            </div>
            <div>
                <form method="get" action="<?php echo base_url('dashboard/monthlyReport') ?>">
                    <div class="row">
                        <div class="col-4">
                            <select class="form-select text-black" name="month" id="month" required>
                                <!-- <option class="text-black" value="" selected>Select Month</option> -->
                                <?php
                                for ($i = 1; $i <= 12; $i++) {
                                    $monthValue = sprintf("%02d", $i);
                                    $monthLabel = date("F", strtotime("2023-$monthValue-01"));
                                    $selected = ($monthValue == $this->input->get('month')) ? 'selected' : '';
                                    echo "<option class='text-black' value='$monthValue' $selected>$monthLabel</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-4">
                            <select class="form-control text-black" name="year" id="year" required>
                                <!-- <option value="" selected></option> -->
                                <?php
                                $currentYear = date("Y");
                                for ($i = $currentYear; $i >= ($currentYear - 5); $i--) {
                                    $selected = ($i == $this->input->get('year')) ? 'selected' : '';
                                    echo "<option value='$i' $selected>$i</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-4">
                            <button type="submit" id="submitButton" class="btn" style="background-color: #D21312;color:white">Submit</button>
                        </div>
                    </div>

                </form>
            </div>

            <div id="monthlyReportContainer" class="pt-4">

                <h2 class="font-semibold text-lg pb-2"><?php echo $selected_month ?></h2>
                <div class="table-responsive">
                    <?php if (empty($monthly_orders)) : ?>
                        <p class="text-sm">No orders have been completed.</p>
                    <?php else : ?>
                        <table class="table">
                            <thead class="">
                                <tr>
                                    <th>No</th>
                                    <th>Guest</th>
                                    <th>Booking ID</th>
                                    <th>Booking Date</th>
                                    <th>Check-in Date</th>
                                    <th>Check-out Date</th>
                                    <th>Adults</th>
                                    <th>Kids</th>
                                    <th>Payment Status</th>
                                    <th>Payment Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0; ?>
                                <?php $no = 1; ?>
                                <?php foreach ($monthly_orders as $order) : ?>
                                    <tr>
                                        <?php
                                        // Mengambil tanggal dari database atau sumber lain
                                        $datetimeFromDatabase = $order['tgl_pemesanan'];

                                        $dateWithoutTime = date('d-m-Y', strtotime($datetimeFromDatabase));
                                        ?>
                                        <td class="text-center">
                                            <div class="text-sm"><?php echo $no++ ?></div>
                                        </td>
                                        <td class="text-center">
                                            <div class="text-sm"><?php echo $order['nama']; ?></div>
                                        </td>
                                        <td class="text-center">
                                            <div class="text-sm"><?php echo $order['id_pemesanan']; ?></div>
                                        </td>
                                        <td>
                                            <?php
                                            $date = new DateTime($order['tgl_pemesanan']);
                                            $timestamp = $date->getTimestamp();
                                            $formatted_date = strftime("%e %B %Y %H:%M:%S", $timestamp);
                                            ?>
                                            <div class="text-sm"><?php echo $formatted_date; ?></div>
                                        </td>
                                        <td>
                                            <?php
                                            $date = new DateTime($order['tgl_checkIn']);
                                            $timestamp = $date->getTimestamp();
                                            $formatted_date = strftime("%e %B %Y", $timestamp);
                                            ?>
                                            <div class="text-sm"><?php echo $formatted_date; ?></div>
                                        </td>
                                        <td>
                                            <?php
                                            $date = new DateTime($order['tgl_checkOut']);
                                            $timestamp = $date->getTimestamp();
                                            $formatted_date = strftime("%e %B %Y", $timestamp);
                                            ?>
                                            <div class="text-sm"><?php echo $formatted_date; ?></div>
                                        </td>
                                        <td><div class="text-sm"><?php echo $order['dewasa']; ?></div></td>
                                        <td><div class="text-sm"><?php echo $order['anak']; ?></div></td>
                                        <td>
                                            <?php $status_data = $order['status']; ?>
                                            <?php if ($status_data == 0) : ?>
                                                <div class="bg-red-500 text-white p-2 text-sm"><?php echo "Pending"; ?></div>
                                            <?php elseif ($status_data == 1) : ?>
                                                <div class="bg-green-500 text-white p-2 text-sm"><?php echo "Confirmed"; ?></div>
                                            <?php endif ?>
                                        </td>
                                        <?php $jumlah_pembayaran = "Rp." . number_format($order['jumlah_pembayaran'], 0, ',', '.'); ?>
                                        <td><div class="text-sm"><?php echo $jumlah_pembayaran; ?></div></td>
                                        <?php $total += $order['jumlah_pembayaran']; ?>

                                        <?php $total_pembayaran = "Rp." . number_format($total, 0, ',', '.'); ?>
                                        <!-- <td><?php echo $dateWithoutTime; ?></td> -->
                                        <!-- <td class="format"><?php echo $sub ?></td> -->
                                    </tr>
                                <?php endforeach; ?>
                                <tr class="">
                                    <td><strong class="h6 text-base font-bold">TOTAL :</strong></td>
                                    <td class="format"><strong class="text-base"><?php echo $total_pembayaran; ?></strong></td>
                                </tr>
                            </tbody>

                        </table>

                    <?php endif; ?>
                </div>
            </div>

            <?php if (!empty($monthly_orders)) : ?>
                <div>
                    <a href="<?php echo base_url('dashboard/exportexcel'); ?>" class="btn" style="background-color: white;color:#D21312;border-color:#D21312;">Export to Excel</a>
                </div>
            <?php else : ?>

            <?php endif; ?>
        </div>
    </div>
</div>