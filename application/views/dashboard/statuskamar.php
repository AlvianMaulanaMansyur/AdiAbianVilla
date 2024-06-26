<div class="container mx-auto p-4">
    <div class="flex flex-wrap -mx-4">

        <!-- Cek Ketersediaan Kamar Section -->
        <div class="w-full lg:w-1/3 px-4 mb-4 flex items-stretch">
            <div class="bg-white rounded-lg p-8 shadow-lg flex-1 flex flex-col">
                <h1 id="result" class="text-gray-800 text-center text-2xl mb-6">Cek Ketersediaan Kamar</h1>
                <div class="mb-6">
                    <div class="flex justify-center mb-4">
                        <div class="flex flex-col">
                            <label for="datepicker" class="text-gray-800 font-semibold mb-2">Check-in</label>
                            <input id="datepicker" type="text" class="datepicker-input bg-gray-200 text-gray-800 px-4 py-2 rounded-lg w-64" placeholder="Select checkin">
                        </div>
                        <div class="flex flex-col ml-4">
                            <label for="datepicker2" class="text-gray-800 font-semibold mb-2">Check-out</label>
                            <input id="datepicker2" type="text" class="datepicker-input bg-gray-200 text-gray-800 px-4 py-2 rounded-lg w-64" placeholder="Select checkout">
                        </div>
                    </div>
                    <div class="flex justify-center mb-4">
                        <section id="datepicker-section" class="flex justify-center items-center"></section>
                    </div>
                </div>

                <div class="mb-6">
                    <div class="flex justify-center items-center">
                        <div class="mr-2 font-semibold text-gray-800">Ketersediaan kamar:</div>
                        <div id="availability" class="text-lg text-gray-800"></div>
                    </div>
                </div>

                <div class="overflow-x-auto mx-auto flex-1">
                    <table class="table-auto table-fixed border-collapse border border-gray-500 w-full">
                        <thead>
                            <tr class="bg-gray-200">
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

        <!-- Tambah Kamar Section -->
        <div class="w-full lg:w-2/3 px-4 mb-4 flex items-stretch">
            <div class="bg-white p-6 rounded-lg shadow-lg flex-1 flex flex-col">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Tabel Kamar AdiAbianVilla</h2>
                    <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm transition duration-300" onclick="openAddKamarModal()">Tambah Kamar</button>
                </div>

                <div class="overflow-x-auto flex-1">
                    <table class="table-auto border-collapse border border-gray-500 w-full">
                        <thead class="bg-gray-700 text-white">
                            <tr>
                                <th class="py-3 px-2 border w-1/6">No Kamar</th>
                                <th class="py-3 px-2 border w-1/6">Harga Kamar</th>
                                <th class="py-3 px-2 border w-1/6">Tipe Kamar</th>
                                <th class="py-3 px-2 border w-1/6">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <?php foreach ($kamar as $k) : ?>
                                <tr class="border-b hover:bg-gray-100">
                                    <td class="py-3 px-2 border"><?php echo $k['no_kamar']; ?></td>
                                    <td class="py-3 px-2 border"><?php echo $k['harga_kamar']; ?></td>
                                    <td class="py-3 px-2 border"><?php echo $k['tipe_kamar']; ?></td>
                                    <td class="py-3 px-2 border">
                                        <div class="flex justify-around">
                                            <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm transition duration-300" onclick="openEditKamarModal(<?php echo $k['id_kamar']; ?>, '<?php echo $k['no_kamar']; ?>', '<?php echo $k['harga_kamar']; ?>', '<?php echo $k['tipe_kamar']; ?>')">Edit</button>
                                            <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm transition duration-300" onclick="deleteKamar(<?php echo $k['id_kamar']; ?>)">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Add Kamar Modal -->
        <div id="addKamarModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                <h2 class="text-xl font-bold mb-4">Tambah Kamar Baru</h2>
                <form id="addKamarForm">
                    <div class="mb-4">
                        <label for="no_kamar" class="block text-gray-700 font-semibold">No Kamar</label>
                        <input type="text" id="no_kamar" name="no_kamar" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div class="mb-4">
                        <label for="harga_kamar" class="block text-gray-700 font-semibold">Harga Kamar</label>
                        <input type="text" id="harga_kamar" name="harga_kamar" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div class="mb-4">
                        <label for="tipe_kamar" class="block text-gray-700 font-semibold">Tipe Kamar</label>
                        <select id="tipe_kamar" name="tipe_kamar" class="w-full px-4 py-2 border rounded-lg">
                            <option value="Standard">Standard</option>
                            <option value="Deluxe">Deluxe</option>
                            <option value="Suite">Suite</option>
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg mr-2 transition duration-300" onclick="closeAddKamarModal()">Cancel</button>
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition duration-300">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit Kamar Modal -->
        <div id="editKamarModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                <h2 class="text-xl font-bold mb-4">Edit Kamar</h2>
                <form id="editKamarForm">
                    <input type="hidden" id="edit_id_kamar" name="id_kamar">
                    <div class="mb-4">
                        <label for="edit_no_kamar" class="block text-gray-700 font-semibold">No Kamar</label>
                        <input type="text" id="edit_no_kamar" name="no_kamar" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div class="mb-4">
                        <label for="edit_harga_kamar" class="block text-gray-700 font-semibold">Harga Kamar</label>
                        <input type="text" id="edit_harga_kamar" name="harga_kamar" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div class="mb-4">
                        <label for="edit_tipe_kamar" class="block text-gray-700 font-semibold">Tipe Kamar</label>
                        <select id="edit_tipe_kamar" name="tipe_kamar" class="w-full px-4 py-2 border rounded-lg">
                            <option value="Standard">Standard</option>
                            <option value="Deluxe">Deluxe</option>
                            <option value="Suite">Suite</option>
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg mr-2 transition duration-300" onclick="closeEditKamarModal()">Cancel</button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition duration-300">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function openAddKamarModal() {
        document.getElementById('addKamarModal').classList.remove('hidden');
    }

    function closeAddKamarModal() {
        document.getElementById('addKamarModal').classList.add('hidden');
    }

    function openEditKamarModal(id_kamar, no_kamar, harga_kamar, tipe_kamar) {
        document.getElementById('edit_id_kamar').value = id_kamar;
        document.getElementById('edit_no_kamar').value = no_kamar;
        document.getElementById('edit_harga_kamar').value = harga_kamar;
        document.getElementById('edit_tipe_kamar').value = tipe_kamar;
        document.getElementById('editKamarModal').classList.remove('hidden');
    }

    function closeEditKamarModal() {
        document.getElementById('editKamarModal').classList.add('hidden');
    }

    document.getElementById('addKamarForm').addEventListener('submit', function(event) {
        event.preventDefault();
        var no_kamar = document.getElementById('no_kamar').value;
        var harga_kamar = document.getElementById('harga_kamar').value;
        var tipe_kamar = document.getElementById('tipe_kamar').value;

        $.ajax({
            url: '<?php echo site_url('Dashboard/addKamar'); ?>',
            type: 'POST',
            data: {
                no_kamar: no_kamar,
                harga_kamar: harga_kamar,
                tipe_kamar: tipe_kamar
            },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status) {
                    location.reload();
                } else {
                    alert("Error: " + data.message);
                }
            },
            error: function(xhr, status, error) {
                alert("AJAX request failed: " + status + ", " + error + ". " + xhr.responseText);
            }
        });
        closeAddKamarModal();
    });

    document.getElementById('editKamarForm').addEventListener('submit', function(event) {
        event.preventDefault();
        var id_kamar = document.getElementById('edit_id_kamar').value;
        var no_kamar = document.getElementById('edit_no_kamar').value;
        var harga_kamar = document.getElementById('edit_harga_kamar').value;
        var tipe_kamar = document.getElementById('edit_tipe_kamar').value;

        $.ajax({
            url: '<?php echo site_url('Dashboard/editKamar'); ?>',
            type: 'POST',
            data: {
                id_kamar: id_kamar,
                no_kamar: no_kamar,
                harga_kamar: harga_kamar,
                tipe_kamar: tipe_kamar
            },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status) {
                    location.reload();
                } else {
                    alert("Error: " + data.message);
                }
            },
            error: function(xhr, status, error) {
                alert("AJAX request failed: " + status + ", " + error + ". " + xhr.responseText);
            }
        });
        closeEditKamarModal();
    });

    function deleteKamar(id_kamar) {
        if (confirm('Apakah Anda yakin ingin menghapus kamar ini?')) {
            $.ajax({
                url: '<?php echo site_url('Dashboard/deleteKamar'); ?>',
                type: 'POST',
                data: {
                    id_kamar: id_kamar
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.status) {
                        location.reload();
                    } else {
                        alert("Error: " + data.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert("AJAX request failed: " + status + ", " + error + ". " + xhr.responseText);
                }
            });
        }
    }
</script>