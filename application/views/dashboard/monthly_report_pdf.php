<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $selected_month; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .brand {
            display: flex;
            align-items: center;
        }

        .bali-nirvana {
            color: #D21312;
            font-weight: bold;
            margin-right: 5px;
        }

        .bulan-laporan-bulanan {
            font-size: 1.5em;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .total-row {
            font-weight: bold;
        }

        .right-align {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="header-container">
        <h2 class="bulan-laporan-bulanan">Laporan Bulanan</h2>
        <div class="brand">
            <span class="bali-nirvana">Bali Nirvana</span>
            <span class="computer">Computer</span>
        </div>
        <h3><?php echo $selected_month; ?></h3>
    </div>

    <table>
        <thead>
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
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $order['nama']; ?></td>
                    <td><?php echo $order['id_pemesanan']; ?></td>
                    <td><?php echo $order['tgl_pemesanan']; ?></td>
                    <td><?php echo $order['tgl_checkIn']; ?></td>
                    <td><?php echo $order['tgl_checkOut']; ?></td>
                    <td><?php echo $order['dewasa']; ?></td>
                    <td><?php echo $order['anak']; ?></td>
                    <td><?php echo $order['status']; ?></td>
                    <td><?php echo $order['jumlah_pembayaran']; ?></td>
                    <?php $total += $order['jumlah_pembayaran']; ?>
                </tr>
            <?php endforeach; ?>
            <tr class="total-row">
                <td colspan="9" class="right-align">Total:</td>
                <td><?php echo $this->pdf->formatCurrency($total); ?></td>
            </tr>
        </tbody>
    </table>
</body>

</html>
