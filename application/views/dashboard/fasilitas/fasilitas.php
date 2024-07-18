<div class="container-fluid">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between align-items-center py-3">
            <h6 class="m-0 font-weight-bold text-blue">Data Fasilitas</h6>
            <button data-modal-target="modalFasilitas" data-modal-toggle="modalFasilitas" class="modalFasilitasTambah block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-7 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                <span class="icon text-white-50">
                    <i class="fas fa-user-plus"></i>
                </span>
                <span class="text">Tambah Data</span>
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Nama Fasilitas</th>
                            <th>Admin</th>
                            <th class="aksi-column">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($fasilitas->result_array() as $key) :
                        ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td class="text-center"><img src="<?= base_url($key['image']) ?>" alt="image fasilitas" class="img-center fotoFasilitas"></td>
                                <td><?= $key['nama_fasilitas'] ?></td>
                                <td><?= $key['username'] ?></td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a data-modal-target="modalFasilitas" data-modal-toggle="modalFasilitas" class="modalFasilitasUbah block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-7 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 me-2" type="button" data-id="<?= $key['id_fasilitas'] ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a>
                                        <a class="btn btn-danger btn-icon-split hapus" href="<?= base_url('c_fasilitas/c_fasilitas/delete/' . $key['id_fasilitas']) ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Hapus</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div id="modalFasilitas" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-md max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <!-- Modal header -->
      <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white" id="modalTitle">
          Edit Data Fasilitas
        </h3>
        <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modalFasilitas">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
      </div>
      <!-- Modal body -->
      <div class="formAction p-4 md:p-5">
        <form action="" class="user" method="post" enctype='multipart/form-data'>
            <input hidden class="form-control" type="text" id="id" name="id">
            <div class="mb-2">
                <label for="fasilitas" class="form-label">Nama fasilitas</label>
                <input class="form-control" type="text" id="fasilitas" name="nama_fasilitas" required>
            </div>
            <div class="mb-2 d-flex flex-column">
                <label for="image" class="form-label-file">Image</label>
                <img class="my-3 img-center" id="image" width="100" height="100" alt="icon fasilitas">
                <input class="form-control-file" type="file" id="imageFasilitas" name="image">
                <small class="text-danger"><i>( maksimal 200 KB )</i></small>
                <small class="ket"><i>( Biarkan kosong jika tidak diubah )</i></small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-red-500 text-white hover:bg-red-600 me-2" data-modal-hide="modalFasilitas">Batal</button>
                <button type="submit" class="btn bg-green-500 text-white hover:bg-green-600"></button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<style>
    .aksi-column {
        width: 150px; /* Atur sesuai kebutuhan Anda */
    }
    .btn {
        padding: 10px 20px;
        border-radius: 10px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .btn:hover {
        opacity: 0.9;
    }
    .btn.bg-red-500 {
        background-color: #f56565;
    }
    .btn.bg-red-500:hover {
        background-color: #e53e3e;
    }
    .btn.bg-green-500 {
        background-color: #48bb78;
    }
    .btn.bg-green-500:hover {
        background-color: #38a169;
    }
    .img-center {
        display: block;
        margin: 0 auto;
    }
    .fotoFasilitas{
        border-radius: 0 !important;
    }
</style>


