// document.addEventListener("DOMContentLoaded", function() {
//     // Get the checkin date from PHP
//     let checkinDate = "<?php echo $kamar['checkin']; ?>";
//     console.log(checkinDate);
//     // Format the date using moment.js
//     let formattedCheckinDate = moment(checkinDate).format('ddd D MMMM YYYY');
//     console.log(formattedCheckinDate);

//     // Set the formatted date into the input
//     document.getElementById('start_date').innerText = formattedCheckinDate;

//     let checkoutDate = "<?php echo $kamar['checkout']; ?>";
//     // Format the date using moment.js
//     let formattedCheckoutDate = moment(checkoutDate).format('ddd D MMMM YYYY');
//     console.log(formattedCheckoutDate);

//     // Set the formatted date into the input
//     document.getElementById('end_date').innerText = formattedCheckoutDate;

//     // Calculate nights using moment.js
//     let checkin = moment(checkinDate);
//     let checkout = moment(checkoutDate);
//     let nights = checkout.diff(checkin, 'days');
//     console.log(nights);
//     document.getElementById('night').innerText = nights + " Nights";
//     document.getElementById('night2').innerText = "(" + nights + " Nights)";

//     var calPriceElement = document.getElementById('calPrice')
//     var calPriceValue = calPriceElement.getAttribute('data')
//     var price = parseFloat(calPriceValue) * parseFloat(nights)
//     var priceTaxValue = parseFloat(calPriceValue) * 0.11
//     var total = price + priceTaxValue

//     function formatRupiah(value) {
//       return new Intl.NumberFormat('id-ID', {
//         style: 'currency',
//         currency: 'IDR',
//         minimumFractionDigits: 0,
//         maximumFractionDigits: 0
//       }).format(value);
//     }

//     document.getElementById('price').innerText = formatRupiah(price);
//     document.getElementById('priceTax').innerText = formatRupiah(priceTaxValue);
//     document.getElementById('total_price').innerText = formatRupiah(total);

//     window.totalPrice = total;
//   });


//   $('#submit-details').click(function(event) {
//     console.log('afjdfajadsafa')
//     event.preventDefault();

//     // Clear previous error messages
//     $('.error').text('');

//     let isValid = true;

//     // Get form values
//     let username = $('#username').val();
//     let noTelp = $('#no_telp').val();
//     let email = $('#email').val();
//     let negara = $('#negara').val();
//     var jenisKelamin = $('#jenis_kelamin').val();

//     // Validate full name
//     if (!username) {
//       isValid = false;
//       $('#username-error').text('Full name is required.');
//     }

//     // Validate telephone number
//     let telpPattern = /^[0-9]{10,15}$/;
//     if (!noTelp || !telpPattern.test(noTelp)) {
//       isValid = false;
//       $('#no_telp-error').text('Valid telephone number is required.');
//     }

//     // Validate email
//     let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
//     if (!email || !emailPattern.test(email)) {
//       isValid = false;
//       $('#email-error').text('Valid email is required.');
//     }

//     // Validate nationality
//     // if (!negara) {
//     //   isValid = false;
//     //   $('#negara-error').text('Nationality is required.');
//     // }

//     // Validate gender
//     if (!jenisKelamin) {
//       isValid = false;
//       $('#jenis_kelamin-error').text('Gender is required.');
//     }
//     console.log(isValid);

//     if (isValid) {
//       // $('#reservation-form').submit();
//       $.ajax({
//         type: "POST",
//         url: "<?php echo base_url('pemesanan/createpemesanan'); ?>",
//         data: {
//           // username: username,
//           // no_telp: noTelp,
//           // email: email,
//           // negara: negara,
//           // jenis_kelamin: jenisKelamin.value,
//           jumlah_pembayaran: window.totalPrice
//         },
//         dataType: "json",
//         success: function(response) {
//           // console.log(response.pemesanan.id_pemesanan)
//           //console.log(response.pemesanan[0])
//           var order = response.pemesanan[0]
//           //console.log(order.id_pemesanan)

//           if (response.status == 'Fail') {
//             Swal.fire({
//               title: response.status,
//               text: response.message,
//               icon: 'warning',
//               showCancelButton: true,
//               confirmButtonColor: '#3085d6',
//               cancelButtonColor: '#d33',
//               cancelButtonText: 'Back',
//               confirmButtonText: 'Ok',

//             }).then((result) => {
//               if (result.isConfirmed) {
//                 window.location.href = base_url + 'payment/proses/';
//               }
//             });
//           } else {
//             function deleteCookie(name) {
//               document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
//             }
//             deleteCookie('roomsData');
//             deleteCookie('availability');
//             deleteCookie('kamar');
//             deleteCookie('harga');
//             deleteCookie('jenis_kamar');
//             window.location.href = base_url + 'payment/proses';
//           }
//         },
//         error: function(xhr, status, error) {
//           console.error("Error:", error);
//         }
//       });
//     } else {
//       $('#data-empty').text('Please fill your details');
//     }

// });