<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Saya - Adi Abian Villa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> <!-- Font Awesome library -->
    <style>
        body {
            padding: 20px;
            background-color: #fff; /* Mengubah warna latar belakang menjadi putih */
        }
        .container {
            max-width: 1000px; /* Mengatur lebar maksimum kontainer */
            margin: auto;
            padding: 20px; /* Menambahkan ruang di dalam kontainer */
            background-color: #f9f9f9; /* Mengubah warna latar belakang kontainer */
            border-radius: 10px; /* Menggunakan sudut border */
            box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Menambahkan bayangan */
            min-height: 80vh; /* Mengatur tinggi minimum kontainer */
        }
        .booking-table {
            margin-top: 20px;
            max-height: 60vh; /* Mengatur tinggi maksimum tabel */
            overflow-y: auto; /* Menambahkan scroll vertikal jika konten melebihi tinggi maksimum */
        }
        .judul-pesanan {
            font-size: 32px; /* Memperbesar ukuran font judul */
            margin-bottom: 20px; /* Menambahkan ruang di bawah judul */
            color: #333; /* Warna teks lebih gelap */
        }
        .nav-item {
            margin-right: 10px; /* Memberikan jarak antara ikon-ikon */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Adi Abian Villa</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-envelope"></i></a> <!-- Icon Pesan -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-bell"></i></a> <!-- Icon Notifikasi -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-user"></i></a> <!-- Icon Profile -->
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 class="judul-pesanan">Pesanan Saya</h1> <!-- Menambahkan kelas untuk judul -->
        <table class="table table-striped booking-table">
            <thead>
                <tr>
                    <th>ID Pesanan</th>
                    <th>Tanggal Pesanan</th>
                    <th>Tanggal Check-in</th>
                    <th>Tanggal Check-out</th>
                    <th>Jumlah Kamar</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($bookings)): ?>
                    <?php foreach ($bookings as $booking): ?>
                        <tr>
                            <td><?php echo $booking['id_pemesanan']; ?></td>
                            <td><?php echo $booking['tgl_pemesanan']; ?></td>
                            <td><?php echo $booking['tgl_checkIn']; ?></td>
                            <td><?php echo $booking['tgl_checkOut']; ?></td>
                            <td><?php echo $booking['jumlah_kamar']; ?></td>
                            <td><?php echo $booking['status']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Anda tidak memiliki pemesanan mendatang di sini</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
