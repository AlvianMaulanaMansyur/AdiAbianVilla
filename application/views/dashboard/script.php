    <script src="<?= base_url('assets/vendors/js/vendor.bundle.base.js'); ?>"></script>
    
    <script src="<?= base_url('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js'); ?>"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?= base_url('assets/vendors/chart.js/chart.umd.js'); ?>"></script>
    <script src="<?= base_url('assets/vendors/progressbar.js/progressbar.min.js'); ?>"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= base_url('assets/js/off-canvas.js'); ?>"></script>
    <script src="<?= base_url('assets/js/template.js'); ?>"></script>
    <script src="<?= base_url('assets/js/settings.js'); ?>"></script>
    <script src="<?= base_url('assets/js/hoverable-collapse.js'); ?>"></script>
    <script src="<?= base_url('assets/js/todolist.js'); ?>"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="<?= base_url('assets/js/jquery.cookie.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/dashboard.js'); ?>"></script>
    <!-- <script src="assets/js/Chart.roundedBarCharts.js"></script> -->
    <!-- kalender -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="<?php echo base_url('lightpick/lightpick.js') ?>"></script>
    <!-- sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- our own -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="<?php echo base_url('lightpick/lightpick.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url('assets/js/statuskamar.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/guestData.js') ?>"></script>

    <script src="<?php echo base_url('assets/js/myScript.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/sweetalert2.all.js') ?>"></script>


<script>
    //sweetAlert
    //insert and update
    const alert = $(".flash-data").data("flashdata");
    if (alert) {
        Swal.fire({
            title: '<?= $this->session->userdata('tittle'); ?>',
            text: alert,
            icon: '<?= $this->session->userdata('icon'); ?>',
            confirmButtonColor: "#07378e",
        });
    }
    //delete
    $('.hapus').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "data akan dihapus",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Batal",
            confirmButtonText: "Ya, Hapus!"
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        });
    });
</script>
