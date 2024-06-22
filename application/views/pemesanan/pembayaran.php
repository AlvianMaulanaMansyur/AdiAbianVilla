<div class="text-xl font bold" id="idPemesanan" data="<?php echo $pemesanan->id_pemesanan ?>">Id Pemesanan: <?php echo $pemesanan->id_pemesanan ?></div>
<button id="button-pay" class="w-12 h-9 bg-red-500 text-white">
    pay
</button>


<script>
    $('#button-pay').click(function(event) {
        event.preventDefault();
        var IdPemesanan = document.getElementById('idPemesanan');
        var IdPemesananValue = IdPemesanan.getAttribute('data');
        $.ajax({
            type: 'POST',
            url: base_url + 'pemesanan/pay/' + IdPemesananValue,
            data: {
                status: 1,
            },
            dataType: "json",
            success: function(response) {
                console.log(response);
                console.log(response.status)
                alert('Pembayaran Berhasil');
                if (response.status == 'Success') {
                    $.ajax({
                        url: base_url + 'pemesanan/paysuccess/' + IdPemesananValue,
                        // type: 'GET',
                        dataType: "json",
                        success: function(response) {
                            console.log(response);
                            alert('pembayaran mantap')
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                            alert('Pembayaran Gagal');
                        }
                    });
                }

                // window.location.href = '<?php echo base_url('pemesanan') ?>';
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                alert('Pembayaran Gagal');
            }
        });
    });
</script>