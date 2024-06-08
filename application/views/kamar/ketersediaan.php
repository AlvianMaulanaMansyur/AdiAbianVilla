<div class="ketersedian bg-gray-100">

    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
          -->
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex flex-shrink-0 items-center">
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                    </div>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="#" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Dashboard</a>
                            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Team</a>
                            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Projects</a>
                            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Calendar</a>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View notifications</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>
                    </button>

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            </button>
                        </div>

                        <!--
            Dropdown menu, show/hide based on menu state.

            Entering: "transition ease-out duration-100"
              From: "transform opacity-0 scale-95"
              To: "transform opacity-100 scale-100"
            Leaving: "transition ease-in duration-75"
              From: "transform opacity-100 scale-100"
              To: "transform opacity-0 scale-95"
          -->
                    </div>
                </div>
            </div>
        </div>

    </nav>


    <!-- Start Carousel -->

    <!-- End Carousel -->
    <div id="default-carousel" class="relative w-full overflow-hidden" data-carousel="slide">
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96 flex" style="width: 100%;">
            <!-- Item 1 -->
            <div class="carousel-item duration-700 ease-in-out flex-shrink-0" style="width: 33.3333%;">
                <img src="<?php echo base_url('assets/foto/villa.jpg') ?>" class="object-cover block w-full h-full" alt="Villa 1">
            </div>
            <!-- Item 2 -->
            <div class="carousel-item duration-700 ease-in-out flex-shrink-0" style="width: 33.3333%;">
                <img src="<?php echo base_url('assets/foto/villa.jpg') ?>" class="object-cover block w-full h-full" alt="Villa 2">
            </div>
            <!-- Item 3 -->
            <div class="carousel-item duration-700 ease-in-out flex-shrink-0" style="width: 33.3333%;">
                <img src="<?php echo base_url('assets/foto/villa.jpg') ?>" class="object-cover block w-full h-full" alt="Villa 3">
            </div>
            <!-- Item 4 -->
            <div class="carousel-item duration-700 ease-in-out flex-shrink-0" style="width: 33.3333%;">
                <img src="<?php echo base_url('assets/foto/villa.jpg') ?>" class="object-cover block w-full h-full" alt="Villa 4">
            </div>
            <!-- Item 5 -->
            <div class="carousel-item duration-700 ease-in-out flex-shrink-0" style="width: 33.3333%;">
                <img src="<?php echo base_url('assets/foto/villa.jpg') ?>" class="object-cover block w-full h-full" alt="Villa 5">
            </div>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    <!-- <?php var_dump($kamar) ?> -->
    <!-- <?php var_dump($harga) ?> -->

    <div class="w-4/5 mx-auto py-5">
        <div class="text-3xl font-bold text-center">Adi Abian Villa</div>
        <div class="text-xl font-semibold text-center text-gray-500 mt-2"><?php echo 'Rp' . number_format($harga, 0, ',', '.'); ?> / night</div>
        <div class="text-base pt-3 leading-relaxed text-center">
            Selamat datang di Adi Abian Villa, tempat di mana kemewahan bertemu dengan alam tropis. Dengan pemandangan laut yang menakjubkan, villa ini menawarkan ruang terbuka yang luas, kolam renang infinity, dan taman tropis yang menenangkan. Dilengkapi dengan fasilitas modern dan desain yang elegan, setiap kamar tidurnya menawarkan tempat istirahat yang nyaman. Nikmati liburan tak terlupakan di Adi Abian Villa, tempat di mana kenyamanan dan keindahan alam menyatu dengan sempurna.
        </div>
    </div>
    <div class="text-2xl font-bold text-center mt-10 mb-4">Check Availability</div>
    <div class="flex items-center justify-center pb-5">
        <div class="flex items-center justify-center w-4/6 bg-white shadow rounded">
            <div class="text-center">
                <h1 id="result" class="mb-4"></h1>
                <div class="relative">
                    <div class="container">
                        <div id="error-message" class="error text-red-600"></div>
                        <div class="input-container">
                            <div>
                                <div class="flex items-center">
                                    <div class="text-sm font-bold m-3 ms-0 text-base">
                                        Check-in
                                    </div>
                                    <img src="<?php echo base_url('assets/foto/enter.png') ?>" class="text-white w-10" alt="">
                                </div>

                                <div id="data_checkin" data="<?php echo $kamar['checkin'] ?>"></div>
                                <input id="datepicker" class="appearance-none w-48 py-2 px-3 text-gray-900 bg-white" type="text" placeholder="Select check-in" value="<?php echo $kamar['checkin'] ?>" disabled>
                            </div>
                            <div>
                                <div class="flex items-center">
                                    <div class="text-sm font-bold m-3 ms-0 text-base">
                                        Check-out
                                    </div>
                                    <img src="<?php echo base_url('assets/foto/enter.png') ?>" class="text-white w-10 rotate-180" alt="">
                                </div>

                                <div id="data_checkout" data="<?php echo $kamar['checkout'] ?>"></div>
                                <input id="datepicker2" class="appearance-none w-48 py-2 px-3 text-gray-900 bg-white" type="text" placeholder="Select check-out" value="<?php echo $kamar['checkout'] ?>" disabled>
                            </div>
                            <div class="pt-4">
                                <div>
                                    <button class="w-72 h-12 relative" onclick="toggleModal('modal')">
                                        <div class="w-72 h-12 px-3.5 py-2.5 left-0 top-0 absolute bg-red-500 rounded border border-red-500 flex-col justify-center items-start inline-flex">
                                            <div class="text-center text-white text-sm font-bold leading-7">Rooms</div>
                                        </div>
                                        <div class="w-24 h-12 left-[173.60px] top-0 absolute">
                                            <img class="w-9 h-8 left-[51.12px] top-[7px] absolute" src="<?php echo base_url('assets/foto/people.png') ?>" />
                                            <div id="total-persons" class="w-2 h-4 left-[25.40px] top-[11px] absolute text-black text-md font-bold text-white">2</div>
                                        </div>
                                        <div class="w-20 h-9 left-[91px] top-[1px] absolute">
                                            <img class="w-10 h-9 left-[25.23px] top-0 absolute" src="<?php echo base_url('assets/foto/bed.png') ?>" />

                                            <div id="total-rooms" class="w-2 h-4 left-0 top-[10px] absolute text-black text-md font-bold text-white">1</div>
                                        </div>
                                        <div class="w-0.5 h-11 bg-white left-[178px] top-0.5 absolute"></div>
                                    </button>
                                </div>

                                <div id="modal" class="hidden absolute z-10 mt-3 w-80 h-80">
                                    <div class="w-96 h-72 left-0 top-0 bg-white shadow-lg rounded relative">
                                        <div class="relative">
                                            <!-- Adult Section -->
                                            <div class="w-32 h-9 absolute left-[210px] top-[37px] bg-red-500 rounded flex justify-between items-center px-2" data-max="2">
                                                <button class="btn-plus">
                                                    <img class="w-7 h-7" src="<?php echo base_url('assets/foto/plus-math2.png') ?>" />
                                                </button>
                                                <div class="adult counter text-black text-md font-normal text-white"><?php echo $kamar['adults'] ?></div>
                                                <button class="btn-minus">
                                                    <img class="w-7 h-7" src="<?php echo base_url('assets/foto/minus-math2.png') ?>" />
                                                </button>
                                            </div>
                                            <!-- Kid Section -->
                                            <div class="w-32 h-9 absolute left-[210px] top-[97px] bg-red-500 rounded flex justify-between items-center px-2" data-max="1">
                                                <button class="btn-plus">
                                                    <img class="w-7 h-7" src="<?php echo base_url('assets/foto/plus-math2.png') ?>" />
                                                </button>
                                                <div class="kid counter text-black text-md font-normal text-white"><?php echo $kamar['kids'] ?></div>
                                                <button class="btn-minus-kid">
                                                    <img class="w-7 h-7" src="<?php echo base_url('assets/foto/minus-math2.png') ?>" />
                                                </button>
                                            </div>
                                            <!-- Room Section -->
                                            <div class="w-32 h-9 absolute left-[210px] top-[157px] bg-red-500 rounded flex justify-between items-center px-2" data-max="10">
                                                <button class="btn-plus">
                                                    <img class="w-7 h-7" src="<?php echo base_url('assets/foto/plus-math2.png') ?>" />
                                                </button>
                                                <div class="room counter text-black text-md font-normal text-white"><?php echo $kamar['rooms'] ?></div>
                                                <button class="btn-minus">
                                                    <img class="w-7 h-7" src="<?php echo base_url('assets/foto/minus-math2.png') ?>" />
                                                </button>
                                            </div>
                                            <img class="w-10 h-10 absolute left-[41px] top-[89px]" src="<?php echo base_url('assets/foto/kid.png') ?>" />
                                            <img class="w-10 h-10 absolute left-[41px] top-[150px]" src="<?php echo base_url('assets/foto/bed2.png') ?>" />
                                            <img class="w-10 h-10 absolute left-[41px] top-[27px]" src="<?php echo base_url('assets/foto/person.png') ?>" />
                                            <div class="absolute text-black text-sm font-normal left-[114px] top-[45px]">Adult</div>
                                            <div class="absolute text-black text-sm font-normal left-[114px] top-[101px]">Kid</div>
                                            <div class="absolute text-black text-sm font-normal left-[114px] top-[164px]">Room</div>
                                            <button id="submit-button" class="absolute w-36 h-10 bg-blue-500 text-white mt-4 rounded top-[210px] right-[110px] bg-red-500">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button id="check" class="mt-4 w-20 h-12 px-3.5 py-2.5 left-0 top-0 bg-red-500 text-white font-bold rounded border border-red-500 flex-col justify-center items-start inline-flex">Check</button>
                            </div>
                        </div>
                        <section id="datepicker-section" class="pb-5"></section>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal.classList.contains('hidden')) {
            modal.classList.remove('hidden');
        } else {
            modal.classList.add('hidden');
        }
    }
    
    $("#check").click(function(event) {
        // Mencegah form submit jika menggunakan form
        event.preventDefault();

        // Ambil nilai dari input datepicker
        let checkIn = $("#datepicker").val();
        let checkOut = $("#datepicker2").val();

        // Clear previous error messages
        $("#error-message").text("");

        // Validasi bahwa kedua input tidak kosong
        if (checkIn === "" || checkOut === "") {
            $("#error-message").text("Both check-in and check-out dates are required.");
            return;
        }

        // Convert input ke Date objects untuk validasi lebih lanjut
        let checkInDate = new Date(checkIn);
        let checkOutDate = new Date(checkOut);

        // console.log(checkInDate)

        // Validasi bahwa check-out tidak lebih awal dari check-in
        if (checkOutDate < checkInDate) {
            $("#error-message").text("Check-out date cannot be earlier than check-in date.");
            return;
        }

        const dateRange = checkIn + ' - ' + checkOut;

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

                console.log('ava: ' + response.availability.length);
                var availability = response.availability.length;
                // Menggunakan nilai dari respons untuk memperbarui tabel
                $("#error-message").text("Dates are valid. Proceeding..." + response.availability.length);
                if (availability >= 1) {
                    Swal.fire({
                        title: 'Room Available',
                        text: "Click continue in to the next step",
                        // icon: 'Succes',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Back',
                        confirmButtonText: 'Continue',

                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = base_url + 'pemesanan';
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Room Not Available',
                        text: "Please choose another date",
                        // icon: 'Succes',
                        showCancelButton: true,
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Back',
                    });
                }


            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Tampilkan pesan error jika permintaan gagal
            },
        });



        // Lakukan tindakan lebih lanjut seperti submit form atau AJAX request
        // Misalnya: $("#yourFormId").submit();
    });
    $(document).ready(function() {
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('kamar/getSessionValues'); ?>", // URL endpoint PHP untuk mendapatkan data session
            success: function(response) {
                // Parse respons JSON dari server
                var sessionData = JSON.parse(response);

                // Perbarui elemen HTML dengan nilai dari session
                $('#total-persons').text(parseInt(sessionData.adults) + parseInt(sessionData.kids));
                $('#total-rooms').text(parseInt(sessionData.rooms));

                // Juga memperbarui counter di dalam modal
                $('.adult').text(sessionData.adults);
                $('.kid').text(sessionData.kids);
                $('.room').text(sessionData.rooms);
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });

    });

    // Event listener for the submit button
    document.getElementById('submit-button').addEventListener('click', function() {
        let adults = parseInt(document.querySelector('.adult').innerText);
        let kids = parseInt(document.querySelector('.kid').innerText);
        let rooms = parseInt(document.querySelector('.room').innerText);

        // Send data to server using AJAX
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('kamar/sessionRooms'); ?>",
            data: {
                adults: adults,
                kids: kids,
                rooms: rooms
            },
            success: function(response) {
                // Handle success response if needed
                console.log("Data sent successfully!");
                var responseData = JSON.parse(response);

                // Update the button displaying the counts
                document.getElementById('total-persons').innerText = parseInt(responseData.adults) + parseInt(responseData.kids); // Total persons
                document.getElementById('total-rooms').innerText = parseInt(responseData.rooms); // Rooms

                // Close the modal
                toggleModal('modal');
            },
            error: function(xhr, status, error) {
                // Handle error response if needed
                console.error("Error:", error);
            }
        });
    });
    document.querySelectorAll('.btn-plus').forEach(button => {
        button.addEventListener('click', function() {
            let counterElement = this.nextElementSibling;
            let count = parseInt(counterElement.innerText);
            let maxCount = parseInt(this.parentElement.getAttribute('data-max'));
            if (count < maxCount) {
                count++;
                counterElement.innerText = count;
            }
        });
    });

    document.querySelectorAll('.btn-minus').forEach(button => {
        button.addEventListener('click', function() {
            let counterElement = this.previousElementSibling;
            let count = parseInt(counterElement.innerText);
            if (count > 1) {
                count--;
                counterElement.innerText = count;
            }
        });
    });
    document.querySelectorAll('.btn-minus-kid').forEach(button => {
        button.addEventListener('click', function() {
            let counterElement = this.previousElementSibling;
            let count = parseInt(counterElement.innerText);
            if (count >= 1) {
                count--;
                counterElement.innerText = count;
            }
        });
    });
</script>