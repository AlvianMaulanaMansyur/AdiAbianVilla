<?php $this->load->view('dashboard/header'); ?>
<?php $this->load->view('dashboard/sidebar'); ?>
<?php $this->load->view('dashboard/topbar'); ?>
<?php $this->load->view('dashboard/footer'); ?>


<div class="flex items-center justify-center min-h-screen">
    <div class="text-center">
        <h1 id="result" class="mb-4"></h1>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
            </div>
            <input id="datepicker" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
        </div>
    </div>
</div>

<div class="flex">
    <div>Ketersediaan kamar:</div>
    <h1 id="availability" class="mb-4"></h1>
</div>

<div>
    <h2 style="text-align: center;">Hallo</h2>
</div>
<table border="1">
    <thead>
        <tr>
            <th>ID Kamar</th>
            <th>No Kamar</th>
            <th>Status Ketersediaan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($kamar as $kamar) : ?>
            <tr>
                <td><?php echo $kamar['id_kamar']; ?></td>
                <td><?php echo $kamar['no_kamar']; ?></td>
                <td><?php echo ($kamar['status_ketersediaan'] == 1) ? 'Tersedia' : 'Tidak Tersedia'; ?></td>
                <td>
                    <?php if ($kamar['status_ketersediaan'] == 1) : ?>
                        <button onclick="showAlert('ubah', <?php echo $kamar['id_kamar']; ?>)" type="button" id="ubah_status" style="background-color: green; color: white; padding: 10px 10px; border: none; border-radius: 20px; cursor: pointer;">Ubah Status</button>
                    <?php else : ?>
                        <button onclick="showAlert('ada', <?php echo $kamar['id_kamar']; ?>)" type="button" id="ada_status" style="background-color: yellow; color: black; padding: 10px 10px; border: none; border-radius: 20px; cursor: pointer;">Ubah Status</button>
                    <?php endif; ?>
                </td>

                </td>

                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<!-- <div class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Daftar Kamar
        </h5>
        <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
        </a>
    </div>
    <div class="flow-root">
        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            <li class="py-3 sm:py-4">

            </li>
        </ul>
    </div>
</div> -->

<!-- Include library Swal di atas, jika belum -->
<script>
    function showAlert(status, id_kamar) {
        Swal.fire({
            title: "Do you want to save the changes?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Save",
            denyButtonText: `Don't save`
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                if (status === 'ubah') {

                    window.location.href = "<?php echo base_url('dashboard/ubah_status/'); ?>" + id_kamar;
                } else if (status === 'ada') {

                    window.location.href = "<?php echo base_url('dashboard/ada_status/'); ?>" + id_kamar;
                }
                Swal.fire("Saved!", "", "success");
                // Arahkan pengguna ke URL untuk mengubah status

            } else if (result.isDenied) {
                Swal.fire("Changes are not saved", "", "info");
                // Arahkan pengguna ke URL untuk status ada

            }
        });
    }
</script>
<!-- 
<script>
//     // Fungsi untuk menampilkan alert sesuai tombol yang diklik dan mengarahkan pengguna ke URL yang sesuai
//     function showAlert(status, id_kamar) {
//         if (status === 'ubah') {
//             alert("Tombol Ubah Status diklik!");
//             // Arahkan pengguna ke URL untuk mengubah status
//             window.location.href = "<?php echo base_url('dashboard/ubah_status/'); ?>" + id_kamar;
//         } else if (status === 'ada') {
//             alert("Tombol Ada Status diklik!");
//             // Arahkan pengguna ke URL untuk status ada
//             window.location.href = "<?php echo base_url('dashboard/ada_status/'); ?>" + id_kamar;
//         }
//     }
// </script> -->

</html>