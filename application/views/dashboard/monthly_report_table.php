<!-- monthly_report_table -->
<div class="container-fluid px-2 mt-2 ">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 ">Laporan Bulanan</h1>
            </div>
            <div>
                <form method="get" action="<?php echo base_url('dashboard/monthlyReport') ?>">
                    <div class="row">
                        <div class="col-4">
                            <select class="form-select" name="month" id="month" required>
                                <option value="" selected>Pilih Bulan</option>
                                <?php
                                for ($i = 1; $i <= 12; $i++) {
                                    $monthValue = sprintf("%02d", $i);
                                    $monthLabel = date("F", strtotime("2023-$monthValue-01"));
                                    $selected = ($monthValue == $this->input->get('month')) ? 'selected' : '';
                                    echo "<option value='$monthValue' $selected>$monthLabel</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-4">
                            <select class="form-control" name="year" id="year" required>
                                <option value="" selected>Pilih Tahun</option>
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

                <h2><?php echo $selected_month ?></h2>
                <div class="table-responsive">
                    <?php if (empty($monthly_orders)) : ?>
                        <p>Tidak ada pesanan yang selesai.</p>
                    <?php else : ?>
                        <table class="table">
                            <thead class="">
                                <tr>
                                    <th>No</th>
                                    <th>Guest</th>
                                    <th>Booking Id</th>
                                    <th>Booking Date</th>
                                    <th>Checkin Date</th>
                                    <th>Checkout Date</th>
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
                                        <td class="text-center"><?php echo $no++ ?></td>
                                        <td class="text-center"><?php echo $order['nama']; ?></td>
                                        <td><?php echo $order['id_pemesanan']; ?></td>
                                        <td><?php echo $order['tgl_pemesanan']; ?></td>
                                        <td><?php echo $order['tgl_checkIn']; ?></td>
                                        <td><?php echo $order['tgl_checkOut']; ?></td>
                                        <td><?php echo $order['dewasa']; ?></td>
                                        <td><?php echo $order['anak']; ?></td>
                                        <td><?php echo $order['status']; ?></td>
                                        <td><?php echo $order['jumlah_pembayaran']; ?></td>
                                        <?php $total += $order['jumlah_pembayaran']; ?>

                                        <!-- <td><?php echo $dateWithoutTime; ?></td> -->
                                        <!-- <td class="format"><?php echo $sub ?></td> -->
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="5" align="right"><strong class="h6">Total :</strong></td>
                                    <td class="format"><strong><?php echo $total; ?></strong></td>
                                </tr>
                            </tbody>

                        </table>

                    <?php endif; ?>
                </div>
            </div>

            <!-- <?php if (!empty($monthly_orders)) : ?>
                <div>
                    <a href="<?php echo base_url('dashboard/saveaspdf'); ?>" class="btn" style="background-color: white;color:#D21312;border-color:#D21312;">Save as PDF</a>
                </div>
            <?php else : ?>

            <?php endif; ?> -->
        </div>
    </div>
</div>