<div class="hotale-body-outer-wrapper">
  <div class="hotale-body-wrapper clearfix hotale-with-transparent-header hotale-with-frame">
    <div class="hotale-header-background-transparent">
      <div class="hotale-top-bar">
        <div class="hotale-top-bar-background"></div>
        <div class="hotale-top-bar-container hotale-container">
          <div class="hotale-top-bar-container-inner clearfix">
            <div class="hotale-top-bar-left hotale-item-pdlr">
              <div class="hotale-top-bar-left-text">
                <a href="<?= base_url('tamu') ?>" class="mt-4 mb-2 text-2xl" style="color: #ffffff;"><i class="fa-solid fa-user pr-2 text-2xl" style="color: #ffffff;"></i><?= $username; ?></a>
              </div>
            </div>
            <div class="hotale-top-bar-right hotale-item-pdlr">
              <div class="tourmaster-user-top-bar tourmaster-guest tourmaster-style-2" data-redirect="index.html" data-ajax-url="#">
                <?php if (!empty($this->session->userdata('identity'))) : ?>
                  <div class="flex">
                    <a class="tourmaster-user-top-bar-login " href="<?= base_url('c_home/logout'); ?>">logout</a>
                  </div>
                <?php else : ?>
                  <a class="tourmaster-user-top-bar-login" href="<?= base_url('Auth/login') ?>">Login</a>
                <?php endif; ?>

              </div>
            </div>
          </div>
        </div>
      </div>
      <header class="hotale-header-wrap hotale-header-style-plain hotale-style-center-menu hotale-sticky-navigation hotale-style-slide" data-navigation-offset="75">
        <div class="hotale-header-background"></div>
        <div class="hotale-header-container hotale-container">
          <div class="hotale-header-container-inner clearfix">
            <div class="hotale-logo hotale-item-pdlr">
              <div class="hotale-logo-inner">
                <a class="hotale-fixed-nav-logo" href="<?php echo base_url('c_home') ?>">
                  <img src="<?php echo base_url('asset/images/logog.png') ?>" alt="" width="147" height="37" title="logo-nx1" />
                </a>
                <a class="hotale-orig-logo" href="<?php echo base_url('c_home') ?>">
                  <img src="<?php echo base_url('asset/images/logog.png') ?>" alt="" width="147" height="37" title="logo-nx1" />
                </a>
              </div>
            </div>
            <div class="hotale-navigation hotale-item-pdlr clearfix">
              <div class="hotale-main-menu" id="hotale-main-menu">
                <ul id="menu-main-navigation-1" class="sf-menu">
                  <li class="menu-item menu-item-home menu-item-has-children hotale-normal-menu">
                    <a href="<?php echo base_url('c_home') ?>" class="sf-with-ul-pre">Home</a>
                  </li>

                  <li class="menu-item menu-item-has-children hotale-normal-menu">
                    <a href="<?php echo base_url('c_home/about') ?>" class="sf-with-ul-pre">About Us</a>
                  </li>
                  <li class="menu-item hotale-normal-menu">
                    <a href="<?php echo base_url('home#villa_facilities') ?>">Facilities</a>
                  </li>
                  <li class="menu-item current-menu-item menu-item-has-children hotale-normal-menu">
                    <a href="<?php echo base_url('room') ?>" class="sf-with-ul-pre">Reservation</a>

                  </li>
                  <li class="menu-ite hotale-normal-menu"><a href="<?php echo base_url('home#villa_contact') ?>" class="sf-with-ul-pre">Contact</a></li>
                  <li class="menu-ite hotale-normal-menu"><a href="<?php echo base_url('') ?>" class="sf-with-ul-pre"><i class="fa-solid fa-user"></i></a></li>
                </ul>
                <div class="hotale-navigation-slide-bar hotale-navigation-slide-bar-style-2 hotale-left" data-size-offset="0" data-width="19px" id="hotale-navigation-slide-bar"></div>
              </div>
              <div class="hotale-main-menu-right-wrap clearfix hotale-item-mglr hotale-navigation-top">
                <div class="tourmaster-room-navigation-checkout-wrap">
                  <div class="tourmaster-room-cart-item-wrap">
                    <div class="tourmaster-room-cart-items">
                      <ul></ul>
                      <a class="tourmaster-checkout-button" href="#">Check Out</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- hotale-navigation -->
          </div>
          <!-- hotale-header-inner -->
        </div>
        <!-- hotale-header-container -->
      </header>
      <!-- header -->
    </div>
    

    <div class="hotale-page-wrapper" id="hotale-page-wrapper">
    <div class="tourmaster-room-single-header-title-wrap" style="border-radius: 20px 20px 20px 20px; -moz-border-radius: 20px 20px 20px 20px; -webkit-border-radius: 20px 20px 20px 20px;">
        <div class="tourmaster-room-single-header-background-overlay"></div>
        <div class="tourmaster-container">
            <h1 class="tourmaster-item-pdlr">My Reservation</h1>
        </div>
    </div>
</div>

<div class="container">
    <h1 class="judul-pesanan">My Order</h1>
    <table class="table table-auto bg-black w-full">
        <thead class="bg-black">
            <tr class="text-center bg-black">
                <th class="text-black">ID</th>
                <th class="text-black">Booking Date</th>
                <th class="text-black">Check-in Date</th>
                <th class="text-black">Check-out Date</th>
                <th class="text-black">Number of Rooms</th>
                <th class="text-black">Status</th>
                <th class="text-black">Action</th> <!-- New column for action -->
            </tr>
        </thead>
        <tbody class="text-center">
            <?php if (!empty($bookings)): ?>
                <?php foreach ($bookings as $booking): ?>
                    <tr>
                        <td><?php echo $booking['id_pemesanan']; ?></td>
                        <td>
                            <?php
                            $date = new DateTime($booking['tgl_pemesanan']);
                            $timestamp = $date->getTimestamp();
                            $formatted_date = strftime("%e %B %Y %H:%M:%S", $timestamp);
                            ?>
                            <div class="text-sm"><?php echo $formatted_date; ?></div>
                        </td>
                        <td>
                            <?php
                            $date = new DateTime($booking['tgl_checkIn']);
                            $timestamp = $date->getTimestamp();
                            $formatted_date = strftime("%e %B %Y", $timestamp);
                            ?>
                            <div class="text-sm"><?php echo $formatted_date; ?></div>
                        </td>
                        <td>
                            <?php
                            $date = new DateTime($booking['tgl_checkOut']);
                            $timestamp = $date->getTimestamp();
                            $formatted_date = strftime("%e %B %Y", $timestamp);
                            ?>
                            <div class="text-sm"><?php echo $formatted_date; ?></div>
                        </td>
                        <td><?php echo $booking['jumlah_kamar']; ?></td>
                        <td>
                            <?php $status_data = $booking['status']; ?>
                            <?php if ($status_data == 0) : ?>
                                <div class="bg-red-500 text-white p-2"><?php echo "Pending"; ?></div>
                            <?php elseif ($status_data == 1) : ?>
                                <div class="bg-green-500 text-white p-2"><?php echo "Confirmed"; ?></div>
                            <?php endif ?>
                        </td>
                        <td>
                            <?php if ($status_data == 0) : ?>
                                <button class="bg-yellow-500 text-white p-2"><a href="<?= base_url('Payment/proses'); ?>">Pay Now</a></button>
                            <?php elseif ($status_data == 1) : ?>
                                <div class="bg-blue-500 text-white p-2">Paid</div>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center" style="padding: 200px; font-size: 20px;">
                        You don't have any upcoming reservations here.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>



  </div>
  <footer>
    <div class="hotale-footer-wrapper">
      <div class="hotale-footer-container hotale-container clearfix">
        <div class="hotale-footer-column hotale-item-pdlr hotale-column-15">
          <div id="block-21" class="widget widget_block widget_media_image hotale-widget">
            <figure class="wp-block-image">
              <img loading="lazy" width="110" height="27" src="<?php echo base_url('asset/images/adibian.png') ?>" alt="" class="wp-image-14995" />
            </figure>
          </div>
          <div id="block-7" class="widget widget_block widget_text hotale-widget">
            <p></p>
          </div>
          <div id="block-8" class="widget widget_block hotale-widget">
            <p>
              <span class="gdlr-core-space-shortcode" style="margin-top: -10px;"></span><i class="fa fa-facebook" style="font-size: 16px; color: #ffffff; margin-left: 3px; margin-right: 17px;"></i>
              <i class="fa5b fa-instagram" style="font-size: 16px; color: #ffffff; margin-left: 3px; margin-right: 17px;"></i>
              <i class="icon-envelope" style="font-size: 16px; color: #ffffff; margin-left: 3px; margin-right: 17px;"></i>
              <i class="fa5b fa5-whatsapp" style="font-size: 16px; color: #ffffff; margin-left: 3px; margin-right: 17px;"></i>
            </p>
          </div>
          <div id="block-22" class="widget widget_block widget_text hotale-widget">
            <p></p>
          </div>
          <div id="block-25" class="widget widget_block hotale-widget">
            <div class="tourmaster-currency-switcher-shortcode clearfix">
              <div class="tourmaster-currency-switcher" style="background: #333333;">
              </div>
            </div>
          </div>
        </div>
        <div class="hotale-footer-column hotale-item-pdlr hotale-column-15">
          <div id="block-10" class="widget widget_block hotale-widget">
            <h4>Contact</h4>
          </div>
          <div id="block-14" class="widget widget_block hotale-widget">
            <p><span style="color: #ffffff;">Phone</span>: 62-858-756-364</p>
            <p><span class="gdlr-core-space-shortcode" style="margin-top: -10px;"></span></p>
            <p><span style="color: #ffffff;">E-mail</span>: <a href="#">adiabian@gmail.com</a></p>
            <p><span class="gdlr-core-space-shortcode" style="margin-top: -10px;"></span></p>
          </div>
        </div>
        <div class="hotale-footer-column hotale-item-pdlr hotale-column-15">
          <div id="block-12" class="widget widget_block hotale-widget">
            <h4>Villa Address</h4>
          </div>
          <div id="block-15" class="widget widget_block hotale-widget">
            <p>
              <span style="color: #ffffff;">
                Adi Abian Villa.<br />
                Pecatu, Uluwatu<br />
                Kuta Selatan, Bali
              </span>
            </p>
          </div>
        </div>
        <div class="hotale-footer-column hotale-item-pdlr hotale-column-15">
          <div id="block-18" class="widget widget_block widget_media_image hotale-widget">
            <div class="wp-block-image">
              <figure class="aligncenter size-full">
                <img loading="lazy" width="213" height="90" src="<?php echo base_url('asset/images/puter.png') ?>" alt="" class="wp-image-15004" />
              </figure>
            </div>
          </div>
          <div id="block-20" class="widget widget_block widget_media_image hotale-widget">
            <div class="wp-block-image">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="hotale-copyright-wrapper">
      <div class="hotale-copyright-container hotale-container clearfix">
        <div class="hotale-copyright-left hotale-item-pdlr">
          <div style="text-transform: uppercase; font-weight: 500; font-size: 13px; letter-spacing: 3px;">
            <a href="index.html" style="margin-right: 22px;">Home</a>
            <a href="about-us.html" style="margin-right: 22px;">About</a>
            <a href="contact.html" style="margin-right: 22px;">Contact</a>
          </div>
        </div>
        <div class="hotale-copyright-right hotale-item-pdlr">Copyright ©PBL 2024. Adi Abian Villa.</div>
      </div>
    </div>
  </footer>
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


  $('#submit-details').click(function(event) {
    console.log('afjdfajadsafa')
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
    // if (!negara) {
    //   isValid = false;
    //   $('#negara-error').text('Nationality is required.');
    // }

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

            // Fungsi untuk mengambil nilai cookie berdasarkan namanya
            function getCookie(name) {
              let nameEQ = name + "=";
              let ca = document.cookie.split(';');
              for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) === ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
              }
              return null;
            }

            // Mengambil nilai cookie 'availability'
            let availability = getCookie('availability');

            if (availability !== null) {
              // Menyimpan nilai cookie 'availability' ke cookie baru 'availability1'
              document.cookie = "availability1=" + availability + "; path=/; max-age=" + (3 * 60 * 60 ); // Cookie valid selama 30 hari
              console.log("Cookie 'availability1' telah diset dengan nilai: " + availability);
            } else {
              console.log("Cookie 'availability' tidak ditemukan.");
            }
            const cookies = document.cookie.split(";");
            console.log(cookies);
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
    } else {
      $('#data-empty').text('Please fill your details');
    }

  });