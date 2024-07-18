// import moment from 'moment';

document.addEventListener('DOMContentLoaded', function () {
    var numberOfMonths = window.innerWidth < 640 ? 1 : 2;
    var checkin = document.getElementById('data_checkin');
    var checkout = document.getElementById('data_checkout');
    // var format1 = moment(checkinValue).format('ddd D MMMM YYYY');
    // var format2 = moment(checkoutValue).format('ddd D MMMM YYYY');
    // console.log(format1)
    // console.log(checkinValue);
    var picker = new Lightpick({
        field: document.getElementById('datepicker'),
        secondField: document.getElementById('datepicker2'),
        parentEl: document.getElementById('datepicker-section'),
        inline: true,
        numberOfMonths: numberOfMonths,
        minDate: new Date(),
        onSelect: function(start, end) {
            var strs = '';
            var stre = '';
            // // strs = start ? formatDate(start) : '';
            // // stre = end ? formatDate(end) : '...';
            strs = start ? start.format('ddd D MMMM YYYY') : '';
            stre = end ? end.format('ddd D MMMM YYYY') : '...';
            document.getElementById('datepicker').value = strs;
            document.getElementById('datepicker2').value = stre;

            if (start && end) {
                const dateRange = start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD');
                console.log('Selected date range: ' + dateRange);
                $.ajax({
                    url: base_url + 'kamar/ketersediaankamar',
                    method: "POST",
                    data: {
                        dateRange: dateRange,
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response.availability); // Tampilkan respons dari server pada konsol
                        console.log(response.detail); // Tampilkan respons dari server pada konsol
                        console.log(response.real); // Tampilkan respons dari server pada konsol
                        console.log(response.tampil); // Tampilkan respons dari server pada konsol
                        
                        // console.log(availability);
                        // Menggunakan nilai dari respons untuk memperbarui tabel
                        var availabilityElement = $('#availability');
                        var roomsTable = $('#rooms-table');
                        roomsTable.empty(); // Kosongkan tabel sebelum mengisinya kembali

                        response.availability.available_kamar.forEach(function(room) {
                            var roomRow = '<tr>' +
                                // '<td class="border border-gray-500 px-4 py-2">' + room.id_kamar + '</td>' +
                                '<td class="border border-gray-500 px-4 py-2">' + room.no_kamar + '</td>' +
                                '<td class="border border-gray-500 px-4 py-2">' + 'Available' + '</td>' +
                                // '<td class="border border-gray-500 px-4 py-2">' + room.tgl_checkIn + '</td>' +
                                // '<td class="border border-gray-500 px-4 py-2">' + room.tgl_checkOut + '</td>' +
                                '</td>' +
                                '</tr>';
                            roomsTable.append(roomRow);
                            console.log(room); 
                        });
                        

                        availabilityElement.html(response.availability.count);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); // Tampilkan pesan error jika permintaan gagal
                    },
                });
            }

        }
    });

    if (checkinValue && checkoutValue) {
        document.getElementById('datepicker').value = format1;
        document.getElementById('datepicker2').value = format2;
    }

    // Menangani input secara manual untuk memastikan format benar saat memilih start date
    document.getElementById('datepicker').addEventListener('input', function () {
        var dates = this.value.split(' to ');
        if (dates.length === 1) {
            var start = moment(dates[0], 'Do MMMM YYYY');
            this.value = formatDate(start);
        }
    });
});