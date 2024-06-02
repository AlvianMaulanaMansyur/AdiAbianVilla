document.addEventListener('DOMContentLoaded', function () {
    function getDaySuffix(date) {
        const j = date % 10, k = date % 100;
        if (j == 1 && k != 11) {
            return date + "st";
        }
        if (j == 2 && k != 12) {
            return date + "nd";
        }
        if (j == 3 && k != 13) {
            return date + "rd";
        }
        return date + "th";
    }

    function formatDate(date) {
        return getDaySuffix(date.date()) + " " + date.format('MMMM YYYY');
    }
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
            strs = start ? formatDate(start) : '';
            stre = end ? formatDate(end) : '...';
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
                        console.log(response.kamar); // Tampilkan respons dari server pada konsol
                        document.getElementById('availability').innerHTML = response.availability.length;
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); // Tampilkan pesan error jika permintaan gagal
                    },
                });
            }
        }
    });

    // Menangani input secara manual untuk memastikan format benar saat memilih start date
    document.getElementById('datepicker').addEventListener('input', function () {
        var dates = this.value.split(' to ');
        if (dates.length === 1) {
            var start = moment(dates[0], 'Do MMMM YYYY');
            this.value = formatDate(start);
        }
    });
});