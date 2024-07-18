<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>easepick 1.2.1 | configurator 1.0.8</title>
    <script src="https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.umd.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script>
        var base_url = '<?php echo base_url(); ?>';
    </script>
    <style>
        .inputs {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
            /* Adjust the margin as needed */
        }

        /* Tambahkan gaya kustom di bawah ini */
        .easepick-wrapper .easepick-calendar {
            width: 800px;
            /* Pastikan kalender mengambil seluruh lebar wrapper */
        }

        .easepick-wrapper .easepick-month {
            width: 50%;
            /* Sesuaikan nilai ini jika Anda menampilkan lebih dari satu bulan */
        }

        .easepick-wrapper .easepick-month:first-child {
            margin-right: 10px;
            /* Tambahkan margin antara bulan jika menampilkan lebih dari satu bulan */
        }
    </style>
</head>

<body>
    <div class="flex justify-center items-center">
        <input id="checkin" />
        <input id="checkout" />
    </div>

    <div class="flex justify-center items-en">
        <input type="hidden" id="picker">
    </div>

    <script>
        const picker = new easepick.create({
            element: "#picker",

            zIndex: 10,
            format: "DD MMMM YYYY",
            grid: 2,
            calendars: 2,
            inline: true,
            // repick: true,
            RangePlugin: {
                // elementEnd: "#checkout",
                tooltipNumber(num) {
            return num - 1;
          },
          locale: {
            one: 'night',
            other: 'nights',
          },
            },
            plugins: [
                "RangePlugin",
                "LockPlugin"
            ],
            css: [
                'https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.css',
                base_url + 'assets/css/easepick.css',
            ],
            LockPlugin: {
                minDate: new Date(),
                minDays: 2,
                inseparable: true,
                // filter(date, picked) {
                //     if (picked.length === 1) {
                //         const incl = date.isBefore(picked[0]) ? '[)' : '(]';
                //         return !picked[0].isSame(date, 'day') && date.inArray(bookedDates, incl);
                //     }
                //     return date.inArray(bookedDates, '[)');
                // },
            },

            setup(picker) {
                // const parentEl = document.getElementById("datepicker-section");
                // parentEl.appendChild(picker.ui.container);

                picker.on('select', (e) => {
                    const {
                        start,
                        end
                    } = e.detail;
                    document.getElementById('picker').value = '';
                    document.getElementById('checkin').value = start ? start.format('YYYY-MM-DD') : '';
                    document.getElementById('checkout').value = end ? end.format('YYYY-MM-DD') : '';
                });

                // picker.on('select', (event) => {
                //     const start = picker.getStartDate();
                //     const end = picker.getEndDate();
                //     if (start && end) {
                //         console.log(`Start date: ${start.format('YYYY-MM-DD')}`);
                //         console.log(`End date: ${end.format('YYYY-MM-DD')}`);
                //     }

                //     // Mencegah tanggal muncul di input
                //     event.preventDefault();
                //     picker.ui.nodes.input.value = '';
                //     console.log('afjafdajdja',picker.ui.nodes.input.value)
                //     if (picker.ui.nodes.secondInput) {
                //         picker.ui.nodes.secondInput.value = '';
                //     }
                // });

                picker.on('select', (event) => {
                    const start = picker.getStartDate();
                    const end = picker.getEndDate();

                    document.getElementById('picker').value = '';
                    document.getElementById('checkin').value = start ? start.format('YYYY-MM-DD') : '';
                    document.getElementById('checkout').value = end ? end.format('YYYY-MM-DD') : '';

                    if (start && end) {
                        const dateRange = `${start.format('YYYY-MM-DD')}` + ' - ' + `${end.format('YYYY-MM-DD')}`;
                        console.log(dateRange);
                        console.log(`Start date: ${start.format('YYYY-MM-DD')}`);
                        console.log(`End date: ${end.format('YYYY-MM-DD')}`);

                        $.ajax({
                            url: base_url + 'kamar/ketersediaankamar',
                            method: "POST",
                            data: {
                                dateRange: dateRange,
                            },
                            dataType: "json",
                            success: function(response) {
                                console.log(response.availability);
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText); // Tampilkan pesan error jika permintaan gagal
                            },
                        });
                    }
                });
            }
        })
    </script>
</body>

</html>