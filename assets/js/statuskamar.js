// import moment from 'moment';

document.addEventListener('DOMContentLoaded', function () {
    var numberOfMonths = window.innerWidth < 640 ? 1 : 2;
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
                       
                        var availabilityElement = $('#availability');
                        var roomsTable = $('#rooms-table');
                        roomsTable.empty(); // Kosongkan tabel sebelum mengisinya kembali

                        response.availability.available_kamar.forEach(function(room) {
                            var roomRow = '<tr>' +
                                '<td class="border border-gray-500 px-4 py-2">' + room.no_kamar + '</td>' +
                                '<td class="border border-gray-500 px-4 py-2">' + 'Available' + '</td>' +
                                '</td>' +
                                '</tr>';
                            roomsTable.append(roomRow);
                            console.log(room); 
                        });
                        

                        availabilityElement.html(response.availability.count);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); 
                    },
                });
            }

        }
    });

    document.getElementById('datepicker').addEventListener('input', function () {
        var dates = this.value.split(' to ');
        if (dates.length === 1) {
            var start = moment(dates[0], 'Do MMMM YYYY');
            this.value = formatDate(start);
        }
    });
});