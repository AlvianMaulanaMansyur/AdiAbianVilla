<div class="container mx-auto p-4">
    <div class="flex flex-wrap -mx-4">

        <!-- Cek Ketersediaan Kamar Section -->
        <div class="w-full lg:w-1/3 px-4 mb-4 flex items-stretch">
            <div class="bg-white rounded-lg p-8 shadow-lg flex-1 flex flex-col">
                <h1 id="result" class="text-gray-800 text-center text-2xl mb-6">Check Room Availability</h1>
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
                        <div class="mr-2 font-semibold text-gray-800">Room availability :</div>
                        <div id="availability" class="text-lg text-black"></div>
                    </div>
                </div>

                <div class="overflow-x-auto mx-auto flex-1 w-2/3"> <!-- Ubah w-full menjadi w-2/3 -->
                    <table class="table-auto table-fixed border-collapse border border-gray-500 w-full">
                        <thead>
                            <tr class="bg-gray-700">
                                <th class="border border-gray-500 px-4 py-2 w-1/2 text-white">Room number</th> <!-- Atur lebar kolom -->
                                <th class="border border-gray-500 px-4 py-2 w-1/2 text-white">Room status</th> <!-- Atur lebar kolom -->
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
                <div class="flex flex-wrap justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 lg:mb-0">AdiAbianVilla Room Table</h2>
                    <div class="flex flex-wrap gap-2 justify-end w-full lg:w-auto">
                        <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm flex items-center space-x-2 transition duration-300" onclick="openAddtipeModal()">
                            <span>Add Room Type</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </button>
                        <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm flex items-center space-x-2 transition duration-300" onclick="openAddKamarModal()">
                            <span>Add Room</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto flex-1">
                    <table class="table-auto border-collapse border border-gray-500 w-full">
                        <thead class="bg-gray-700 text-white">
                            <tr>
                                <th class="py-3 px-2 border w-1/6">Room Number</th>
                                <th class="py-3 px-2 border w-1/6">Room price</th>
                                <th class="py-3 px-2 border w-1/6">Room type</th>
                                <th class="py-3 px-2 border w-1/6">Description</th>
                                <th class="py-3 px-2 border w-1/6 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <?php foreach ($kamar as $k) : ?>
                                <tr class="border-b hover:bg-gray-100">
                                    <td class="py-3 px-2 border"><?php echo $k['no_kamar']; ?></td>
                                    <td class="py-3 px-2 border"><?php echo $k['harga']; ?></td>
                                    <td class="py-3 px-2 border"><?php echo $k['jenis_kamar']; ?></td>
                                    <td class="py-3 px-2 border"><?php echo $k['deskripsi']; ?></td>
                                    <td class="py-3 px-2 border text-center">
                                        <div class="flex justify-center space-x-2">
                                            <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm flex items-center space-x-2 transition duration-300" onclick="openEditKamarModal(<?php echo $k['id_kamar']; ?>, '<?php echo $k['no_kamar']; ?>','<?php echo $k['harga'] ?>', '<?php echo $k['jenis_kamar'] ?>')">
                                                <span>Edit</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636a9 9 0 011.415 1.415l-6.364 6.364L9 12l1.636-4.415 6.364-6.364z" />
                                                </svg>
                                            </button>
                                            <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm flex items-center space-x-2 transition duration-300" onclick="deleteKamar(<?php echo $k['id_kamar']; ?>)">
                                                <span>Delete</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- Tabel Tipe Kamar Section -->
        <div class="w-full px-4 mb-4 flex items-stretch">
            <div class="bg-white p-6 rounded-lg shadow-lg flex-1 flex flex-col">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Room Type Table</h2>
                <div class="overflow-x-auto flex-1">
                    <table class="table-auto border-collapse border border-gray-500 w-full">
                        <thead class="bg-gray-700 text-white">
                            <tr>
                                <th class="py-3 px-2 border">Room type</th>
                                <th class="py-3 px-2 border">Price</th>
                                <th class="py-3 px-2 border">Description</th>
                                <th class="py-3 px-1 border text-center w-24">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <?php foreach ($tipekamar as $tipe) : ?>
                                <tr class="border-b hover:bg-gray-100">
                                    <td class="py-3 px-2 border"><?php echo $tipe['jenis_kamar']; ?></td>
                                    <td class="py-3 px-2 border"><?php echo $tipe['harga']; ?></td>
                                    <td class="py-3 px-2 border"><?php echo $tipe['deskripsi']; ?></td>
                                    <td class="py-3 px-1 border text-center">
                                        <div class="flex justify-center space-x-2">
                                            <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm flex items-center space-x-2 transition duration-300" onclick="openEdittipeModal('<?php echo $tipe['id_detail_kamar']; ?>','<?php echo $tipe['jenis_kamar']; ?>', '<?php echo $tipe['harga']; ?>', '<?php echo $tipe['deskripsi']; ?>')">
                                                <span>Edit</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636a9 9 0 011.415 1.415l-6.364 6.364L9 12l1.636-4.415 6.364-6.364z" />
                                                </svg>
                                            </button>
                                            <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm flex items-center space-x-2 transition duration-300" onclick="deleteTipe('<?php echo $tipe['id_detail_kamar']; ?>')">
                                                <span>Delete</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
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
                <h2 class="text-xl font-bold mb-4">Add New Room</h2>
                <form id="addKamarForm">
                    <div class="mb-4">
                        <label for="no_kamar" class="block text-gray-700 font-semibold">Room number</label>
                        <input type="text" id="no_kamar" name="no_kamar" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div class="mb-4">
                        <label for="jenis_kamar" class="block text-gray-700 font-semibold">Room type</label>
                        <select id="jenis_kamar" name="jenis_kamar" class="w-full px-4 py-2 border rounded-lg">
                            <?php foreach ($tipekamar as $tk) : ?>
                                <option value="<?php echo $tk['jenis_kamar'] ?>"><?php echo $tk['jenis_kamar'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg mr-2 transition duration-300" onclick="closeAddKamarModal()">Cancel</button>
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition duration-300">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Add tipe kamar Modal -->
        <div id="addtipeModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                <h2 class="text-xl font-bold mb-4">Add Room Type</h2>
                <form id="addtipeForm">
                    <div class="mb-4">
                        <label for="harga" class="block text-gray-700 font-semibold">Room price</label>
                        <input type="text" id="harga" name="harga" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div class="mb-4">
                        <label for="jenis_kamar" class="block text-gray-700 font-semibold">type of room</label>
                        <input type="text" id="jenis_add" name="jenis_kamar" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div class="mb-4">
                        <label for="deskripsi" class="block text-gray-700 font-semibold">Room description</label>
                        <input type="text" id="deskripsi" name="deskripsi" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg mr-2 transition duration-300" onclick="closeAddtipeModal()">Cancel</button>
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition duration-300">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit Kamar Modal -->
        <div id="editKamarModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                <h2 class="text-xl font-bold mb-4">Edit Room</h2>
                <form id="editKamarForm">
                    <input type="hidden" id="edit_id_kamar" name="id_kamar">
                    <div class="mb-4">
                        <label for="edit_no_kamar" class="block text-gray-700 font-semibold">Room number</label>
                        <input type="text" id="edit_no_kamar" name="no_kamar" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div class="mb-4">
                        <label for="edit_tipe_kamar" class="block text-gray-700 font-semibold">Room type</label>
                        <select id="edit_tipe_kamar" name="tipe_kamar" class="w-full px-4 py-2 border rounded-lg">
                            <?php foreach ($tipekamar as $tk) : ?>
                                <option value="<?php echo $tk['jenis_kamar'] ?>"><?php echo $tk['jenis_kamar'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg mr-2 transition duration-300" onclick="closeEditKamarModal()">Cancel</button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition duration-300">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal Edit Tipe Kamar -->
        <div id="edittipeModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                <h2 class="text-xl font-bold mb-4">Edit room</h2>
                <form id="edittipeForm">
                    <input type="hidden" id="edit_id_detail_kamar" name="id_detail_kamar">
                    <div class="mb-4">
                        <label for="edit_jenis_kamar" class="block text-gray-700 font-semibold">Room type</label>
                        <input type="text" id="edit_jenis_kamar" name="jenis_kamar" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div class="mb-4">
                        <label for="edit_harga" class="block text-gray-700 font-semibold">Price</label>
                        <input type="text" id="edit_harga" name="harga" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div class="mb-4">
                        <label for="edit_deskripsi" class="block text-gray-700 font-semibold">Description</label>
                        <input type="text" id="edit_deskripsi" name="deskripsi" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg mr-2 transition duration-300" onclick="closeEdittipeModal()">Cancel</button>
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

    function openAddtipeModal() {
        document.getElementById('addtipeModal').classList.remove('hidden');
    }

    function closeAddtipeModal() {
        document.getElementById('addtipeModal').classList.add('hidden');
    }

    function openEditKamarModal(id_kamar, no_kamar, harga_kamar, tipe_kamar) {
        document.getElementById('edit_id_kamar').value = id_kamar;
        document.getElementById('edit_no_kamar').value = no_kamar;
        document.getElementById('edit_tipe_kamar').value = tipe_kamar;
        document.getElementById('editKamarModal').classList.remove('hidden');
        let selectElement = document.getElementById('edit_tipe_kamar');
        for (let i = 0; i < selectElement.options.length; i++) {
            if (selectElement.options[i].value == tipe_kamar) {
                selectElement.options[i].selected = true;
                console.log(selectElement.options[i].selected);
                break;
            }
        }
    }

    function closeEditKamarModal() {
        document.getElementById('editKamarModal').classList.add('hidden');
    }

    function openEdittipeModal(id_detail_kamar, jenis_kamar, harga, deskripsi) {
        document.getElementById('edit_id_detail_kamar').value = id_detail_kamar;
        document.getElementById('edit_jenis_kamar').value = jenis_kamar;
        document.getElementById('edit_harga').value = harga;
        document.getElementById('edit_deskripsi').value = deskripsi;

        document.getElementById('edittipeModal').classList.remove('hidden');
    }

    function closeEdittipeModal() {
        document.getElementById('edittipeModal').classList.add('hidden');
    }

    document.getElementById('addKamarForm').addEventListener('submit', function(event) {
        event.preventDefault();
        var no_kamar = document.getElementById('no_kamar').value;
        var jenis_kamar = document.getElementById('jenis_kamar').value;

        $.ajax({
            url: '<?php echo site_url('Dashboard/addKamar'); ?>',
            type: 'POST',
            data: {
                no_kamar: no_kamar,
                jenis_kamar: jenis_kamar
            },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status) {
                    location.reload();
                } else {
                    console.log("Error: " + data.message);
                }
            },
            error: function(xhr, status, error) {
                alert("AJAX request failed: " + status + ", " + error + ". " + xhr.responseText);
            }
        });
        closeAddKamarModal();
    });

    document.getElementById('addtipeForm').addEventListener('submit', function(event) {
        event.preventDefault();
        var harga = document.getElementById('harga').value;
        var jenis_kamar = document.getElementById('jenis_add').value;
        var deskripsi = document.getElementById('deskripsi').value;

        $.ajax({
            url: '<?php echo site_url('Dashboard/addtipekamar'); ?>',
            type: 'POST',
            data: {
                harga: harga,
                jenis_kamar: jenis_kamar,
                deskripsi: deskripsi
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
        closeAddtipeModal();
    });

    document.getElementById('editKamarForm').addEventListener('submit', function(event) {
        event.preventDefault();
        var id_kamar = document.getElementById('edit_id_kamar').value;
        var no_kamar = document.getElementById('edit_no_kamar').value;
        var jenis_kamar = document.getElementById('edit_tipe_kamar').value;

        $.ajax({
            url: '<?php echo site_url('Dashboard/editKamar'); ?>',
            type: 'POST',
            data: {
                id_kamar: id_kamar,
                no_kamar: no_kamar,
                jenis_kamar: jenis_kamar

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
    $(document).ready(function() {
        $('#edittipeForm').on('submit', function(event) {
            event.preventDefault();

            var id_detail_kamar = $('#edit_id_detail_kamar').val();
            var jenis_kamar = $('#edit_jenis_kamar').val();
            var harga = $('#edit_harga').val();
            var deskripsi = $('#edit_deskripsi').val();

            $.ajax({
                url: '<?php echo base_url('dashboard/editTipeKamar'); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    id_detail_kamar: id_detail_kamar,
                    jenis_kamar: jenis_kamar,
                    harga: harga,
                    deskripsi: deskripsi
                },
                success: function(response) {
                    if (response.status) {
                        // Berhasil mengubah data, langsung reload halaman
                        location.reload();
                    } else {
                        // Gagal mengubah data, tampilkan pesan error jika perlu
                        console.log('Gagal mengubah data kamar.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Terjadi kesalahan: ' + error);
                }
            });
        });
    });

    function deleteTipe(id_detail_kamar) {
        if (confirm('Apakah Anda yakin ingin menghapus tipe kamar ini?')) {
            $.ajax({
                url: "<?php echo base_url('dashboard/deleteTipeKamar'); ?>",
                type: "POST",
                data: {
                    id_detail_kamar: id_detail_kamar
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