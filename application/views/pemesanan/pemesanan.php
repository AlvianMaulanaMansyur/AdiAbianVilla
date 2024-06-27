<div class="bg-gray-100 w-full min-h-screen flex justify-center">
  <div class="flex flex-col items-center md:items-start">
    <div class="text-black text-xl font-bold leading-7 mt-20 md:ml-96">
      Details
    </div>
    <div class="w-full md:w-[812px] h-auto mt-10 p-6 bg-white shadow rounded">
      <div class="text-black text-xl font-bold leading-7 mb-6">
        Your Details
      </div>
      <form id="reservation-form" action="<?php echo base_url('pemesanan/createpemesanan') ?>" method="post">
        <fieldset disabled>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label for="username">Full Name</label>
              <input id="username" name="username" class="h-12 w-full px-3.5 py-2.5 bg-white rounded border border-black" placeholder="ex: John Wick" value="<?php echo $tamu['nama'] ?>">
              <span class="error text-red-600" id="username-error"></span>
            </div>
            <div>
              <label for="no_telp">Telephone Number</label>
              <input id="no_telp" name="no_telp" class="h-12 w-full px-3.5 py-2.5 bg-white rounded border border-black" placeholder="ex: 085XXXXXXX" value="<?php echo $tamu['no_telp'] ?>">
              <span class="error text-red-600" id="no_telp-error"></span>
            </div>
            <div>
              <label for="email">Email</label>
              <input id="email" name="email" type="email" class="h-12 w-full px-3.5 py-2.5 bg-white rounded border border-black" placeholder="ex: example@gmail.com" value="<?php echo $tamu['email'] ?>">
              <span class="error text-red-600" id="email-error"></span>
            </div>
            <div>
              <label for="negara">Nasionality</label>
              <input id="negara" name="negara" class="h-12 w-full px-3.5 py-2.5 bg-white rounded border border-black" placeholder="ex: Dominican Republic" value="<?php echo $tamu['negara'] ?>">
              <span class="error text-red-600" id="negara-error"></span>
            </div>
            <div>
              <label for="jenis_kelamin">Gender</label>
              <input id="jenis_kelamin" name="jenis_kelamin" class="h-12 w-full px-3.5 py-2.5 bg-white rounded border border-black" placeholder="ex: Male/Female" value="<?php echo $tamu['jenis_kelamin'] ?>">
              <span class="error text-red-600" id="jenis_kelamin-error"></span>
            </div>
          </div>
        </fieldset>
        <input type="hidden" id="adults" name="dewasa" value="<?php echo $kamar['adults']; ?>">
        <input type="hidden" id="kids" name="anak" value="<?php echo $kamar['kids']; ?>">
        <input type="hidden" id="rooms" name="jumlah_kamar" value="<?php echo $kamar['rooms']; ?>">
        <input type="hidden" id="checkin" name="tgl_checkIn" value="<?php echo $kamar['checkin']; ?>">
        <input type="hidden" id="checkout" name="tgl_checkOut" value="<?php echo $kamar['checkout']; ?>">
      </form>
    </div>

    <div class="w-full flex flex-col md:flex-row gap-1">
      <div class="lg:w-full md:w-3/12 h-auto mt-10 p-6 bg-white shadow rounded">
        <div class="text-black text-xl font-bold leading-7 mb-6">
          Booking Details
        </div>
        <div>
          <div class="flex justify-around">
            <div class="mb-6">
              <div class="text-black text-md font-bold leading-7">Check-in</div>
              <div id="start_date" class="text-black text-md font-normal leading-7"><?php echo $kamar['checkin'] ?></div>
            </div>
            <div class="mb-6">
              <div class="text-black text-md font-bold leading-7">Check-out</div>
              <div id="end_date" class="text-black text-md font-normal leading-7"><?php echo $kamar['checkout'] ?></div>
            </div>
          </div>
          <div class="flex justify-around">
            <div class="mb-6">
              <div class="text-black text-md font-bold leading-7">Total nights</div>
              <div id="night" class="text-black text-md font-normal leading-7">1 Nights</div>
            </div>
            <div class="mb-6">
              <div class="text-black text-md font-bold leading-7">Requirements</div>
              <div class="text-black text-md font-normal leading-7">Rooms <?php echo $kamar['rooms'] ?></div>
              <div class="text-black text-md font-normal leading-7">Adult <?php echo  $kamar['adults'] ?> Kids <?php echo $kamar['kids'] ?></div>
            </div>
          </div>
        </div>
      </div>

      <div class="lg:w-full md:w-3/12 h-auto mt-10 p-6 bg-white shadow rounded">
        <div class="text-black text-xl font-bold leading-7 mb-6">
          Price Details
        </div>
        <div class="mb-6 flex justify-between">
          <div class="text-black text-md font-normal leading-7">Room price<br /><span class="text-sm text-gray-500"><?php echo $kamar['rooms'] ?> Rooms</span><span id="night2" class="text-sm text-gray-500"></span></div>
          <?php $price = $harga * $kamar['rooms'] ?>
          <div id="calPrice" data="<?php echo $price ?>"></div>
          <div id="price" class="text-black text-md font-normal leading-7"></div>
        </div>
        <div class="mb-6 flex justify-between">
          <div class="text-black text-md font-normal leading-7">Taxes and fees</div>
          <div id="priceTax" class="text-black text-md font-normal leading-7"></div>
        </div>
        <div class="border-t border-black my-4"></div>
        <div class="mb-6 flex justify-between">
          <div class="text-black text-base font-bold leading-7">Total price</div>
          <div id="total_price" class="text-black text-md font-bold leading-7"></div>
        </div>
        <button id="submit-details" class="w-full md:w-52 h-10 bg-blue-500 text-white mt-4 mb-5 rounded">
          Continue To Payment
        </button>
      </div>
    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Get the checkin date from PHP
    let checkinDate = "<?php echo $kamar['checkin']; ?>";
    console.log(checkinDate);
    // Format the date using moment.js
    let formattedCheckinDate = moment(checkinDate).format('ddd D MMMM YYYY');
    console.log(formattedCheckinDate);

    // Set the formatted date into the input
    document.getElementById('start_date').innerText = formattedCheckinDate;

    let checkoutDate = "<?php echo $kamar['checkout']; ?>";
    // Format the date using moment.js
    let formattedCheckoutDate = moment(checkoutDate).format('ddd D MMMM YYYY');
    console.log(formattedCheckoutDate);

    // Set the formatted date into the input
    document.getElementById('end_date').innerText = formattedCheckoutDate;

    // Calculate nights using moment.js
    let checkin = moment(checkinDate);
    let checkout = moment(checkoutDate);
    let nights = checkout.diff(checkin, 'days');
    console.log(nights);
    document.getElementById('night').innerText = nights + " Nights";
    document.getElementById('night2').innerText = "(" + nights + " Nights)";

    var calPriceElement = document.getElementById('calPrice')
    var calPriceValue = calPriceElement.getAttribute('data')
    var price = parseFloat(calPriceValue) * parseFloat(nights)
    var priceTaxValue = parseFloat(calPriceValue) * 0.11
    var total = price + priceTaxValue

    function formatRupiah(value) {
      return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
      }).format(value);
    }

    document.getElementById('price').innerText = formatRupiah(price);
    document.getElementById('priceTax').innerText = formatRupiah(priceTaxValue);
    document.getElementById('total_price').innerText = formatRupiah(total);

    window.totalPrice = total;
  });

  $(document).ready(function() {
    $('#submit-details').click(function(event) {
      event.preventDefault();

      // Clear previous error messages
      $('.error').text('');

      let isValid = true;

      // Get form values
      let username = $('#username').val();
      let noTelp = $('#no_telp').val();
      let email = $('#email').val();
      let negara = $('#negara').val();
      var jenisKelamin = $('#jenis_kelamin').val();

      // Validate full name
      if (!username) {
        isValid = false;
        $('#username-error').text('Full name is required.');
      }

      // Validate telephone number
      let telpPattern = /^[0-9]{10,15}$/;
      if (!noTelp || !telpPattern.test(noTelp)) {
        isValid = false;
        $('#no_telp-error').text('Valid telephone number is required.');
      }

      // Validate email
      let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
      if (!email || !emailPattern.test(email)) {
        isValid = false;
        $('#email-error').text('Valid email is required.');
      }

      // Validate nationality
      if (negara == 'Pilih Negara') {
        isValid = false;
        $('#negara-error').text('Nationality is required.');
      }

      // Validate gender
      if (!jenisKelamin) {
        isValid = false;
        $('#jenis_kelamin-error').text('Gender is required.');
      }
      console.log(isValid);

      if (isValid) {
        // $('#reservation-form').submit();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('pemesanan/createpemesanan'); ?>",
          data: {
            // username: username,
            // no_telp: noTelp,
            // email: email,
            // negara: negara,
            // jenis_kelamin: jenisKelamin.value,
            jumlah_pembayaran: window.totalPrice
          },
          dataType: "json",
          success: function(response) {
            // console.log(response.pemesanan.id_pemesanan)
            //console.log(response.pemesanan[0])
            var order = response.pemesanan[0]
            //console.log(order.id_pemesanan)

            if (response.status == 'Fail') {
              Swal.fire({
                title: response.status,
                text: response.message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Back',
                confirmButtonText: 'Ok',

              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = base_url + 'payment/proses/';
                }
              });
            } else {
              function deleteCookie(name) {
                document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
              }
              deleteCookie('roomsData');
              deleteCookie('availability');
              deleteCookie('kamar');
              deleteCookie('harga');
              deleteCookie('jenis_kamar');
              window.location.href = base_url + 'payment/proses';
            }
          },
          error: function(xhr, status, error) {
            console.error("Error:", error);
          }
        });
      }
    });
  });
</script>