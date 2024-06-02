<div class="flex justify-center items-center h-screen bg-gray-100">
    <div class="bg-white rounded-lg p-8 shadow-lg">
        <h1 id="result" class="text-gray-800 text-center text-2xl mb-4">Cek Ketersediaan Kamar</h1>
        <div class="relative mb-4">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
            </div>
            <div class="container mx-auto">
                <div class="flex justify-between mb-4">
                    <div class="flex flex-col">
                        <label for="datepicker" class="text-gray-800 font-semibold mb-2">Check-in</label>
                        <input id="datepicker" type="text" class="datepicker-input bg-gray-200 text-gray-800 px-4 py-2 rounded-lg w-48" placeholder="Select checkin">
                    </div>
                    <div class="flex flex-col">
                        <label for="datepicker2" class="text-gray-800 font-semibold mb-2">Check-out</label>
                        <input id="datepicker2" type="text" class="datepicker-input bg-gray-200 text-gray-800 px-4 py-2 rounded-lg w-48" placeholder="Select checkout">
                    </div>
                </div>
                <section id="datepicker-section"></section>
            </div>
        </div>

        <div class="mb-4">
            <div class="flex justify-center items-center">
                <div class="mr-2 font-semibold text-gray-800">Ketersediaan kamar:</div>
                <div id="availability" class="text-lg text-gray-800"></div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="table-auto border-collapse border border-gray-500 w-full">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-500 px-4 py-2">ID Kamar</th>
                        <th class="border border-gray-500 px-4 py-2">No Kamar</th>
                        <th class="border border-gray-500 px-4 py-2">Tanggal CheckIn</th>
                        <th class="border border-gray-500 px-4 py-2">Tanggal CheckOut</th>
                    </tr>
                </thead>
                <tbody id="rooms-table">
                    <!-- Rows will be appended here by JavaScript -->
                </tbody>
            </table>
        </div>
    </div>
</div>



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