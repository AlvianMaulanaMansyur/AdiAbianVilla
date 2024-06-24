<div class="ketersedian bg-gray-100">
    <!-- Main modal -->


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
            Welcome to Adi Abian Villa, where luxury meets tropical nature.This villa offers spacious open areas, an infinity pool, and serene tropical gardens. Equipped with modern amenities and elegant design, each bedroom provides a comfortable resting place. Enjoy an unforgettable vacation at Adi Abian Villa, where comfort and natural beauty blend perfectly.
            <br><br>
            Each room can accommodate up to 2 adults and 1 child. Children under 6 years old stay for free.
        </div>
    </div>
    <div class="text-2xl font-bold text-center mt-10 mb-4">Check Availability</div>

    <div class="flex items-center justify-center pb-5">
        <div class="flex items-center justify-center w-4/6 bg-white shadow rounded">
            <div class="text-center">
                <h1 id="result" class="mb-4"></h1>
                <div class="relative">
                    <div class="container">
                        <div id="error-message"></div>
                        <div class="input-container">
                            <div>
                                <div class="flex items-center">
                                    <div class="text-sm font-bold m-3 ms-0 text-base">
                                        Check-in
                                    </div>
                                    <img src="<?php echo base_url('assets/foto/enter.png') ?>" class="text-white w-10" alt="">
                                </div>

                                <div id="data_checkin" data="<?php echo $kamar['checkin'] ?>"></div>
                                <input id="datepicker" class="appearance-none w-48 py-2 px-3 text-gray-900 bg-white border-none" type="text" placeholder="Select check-in" value="<?php echo $kamar['checkin'] ?>" disabled>
                            </div>
                            <div>
                                <div class="flex items-center">
                                    <div class="text-sm font-bold m-3 ms-0 text-base">
                                        Check-out
                                    </div>
                                    <img src="<?php echo base_url('assets/foto/enter.png') ?>" class="text-white w-10 rotate-180" alt="">
                                </div>

                                <div id="data_checkout" data="<?php echo $kamar['checkout'] ?>"></div>
                                <input id="datepicker2" class="appearance-none w-48 py-2 px-3 text-gray-900 bg-white border-none" type="text" placeholder="Select check-out" value="<?php echo $kamar['checkout'] ?>" disabled>
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



                                <div id="modal" class="hidden absolute z-10 mt-3 w-96">
                                    <div id="modal-container" class="w-96 h-72 left-0 top-0 bg-white shadow-lg rounded relative overflow-hidden">
                                        <div id="room-container" class="p-4" style="max-height: calc(100% - 96px);">
                                            <!-- <div class="text-lg font-bold mb-4">Room 1</div> -->
                                            <!-- Adult Section -->
                                            <div class="text-md font-bold">Manage Room Details</div>
                                            <div class="flex flex-col mb-4 room-section">
                                                <div class="border border-black h-px w-full mb-4"></div>
                                                <div class="flex items-center mb-4">
                                                    <img class="w-10 h-10 mr-4" src="<?php echo base_url('assets/foto/person.png') ?>" />
                                                    <div class="text-black text-sm font-normal mr-auto">Adult</div>
                                                    <div>
                                                        <select name="dewasa" class="select-adult appearance-auto border-1 w-24 h-8 rounded">
                                                            <option value="1">1</option>
                                                            <option value="2" selected>2</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="flex items-center mb-4">
                                                    <img class="w-10 h-10 mr-4" src="<?php echo base_url('assets/foto/kid.png') ?>" />
                                                    <div class="flex flex-col items-start mr-auto">
                                                        <div class="text-black text-sm font-normal">Kid</div>
                                                        <div class="text-gray-500 text-sm font-normal">Ages 6 and below</div>
                                                    </div>
                                                    <div>
                                                        <select name="anak" class="select-kid appearance-auto border-1 w-24 h-8 rounded">
                                                            <option value="0" selected>0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="buttons-container" class="p-4 flex justify-between">

                                            <button id="add-room-button" class="w-36 h-10 bg-green-500 text-white mt-4 rounded"><span><i class="fa-solid fa-plus"></i></span>
                                                Add Room
                                            </button>
                                            <button id="submit-button" class="w-36 h-10 bg-red-500 text-white mt-4 rounded bg-red-500">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div>
                                <button id="check" class="mt-4 w-20 h-12 px-3.5 py-2.5 left-0 top-0 bg-red-500 text-white font-bold rounded border border-red-500 flex-col justify-center items-start inline-flex">Check</button>
                                <!-- <button id="hapus-cookie">
                                    hapus cookie
                                </button> -->
                                <!-- <button id="open-modal" class="bg-blue-500 text-white px-4 py-2 rounded">Open Modal</button> -->
                            </div>
                        </div>
                        <section id="datepicker-section" class="pb-5"></section>

                    </div>
                </div>


            </div>


        </div>

    </div>
    <div id="availability1"></div>
    <!-- <div class="flex flex-col items-center">
        <div class="border h-px w-4/6 mt-3"></div>
        <div class="text-2xl font-bold text-center mb-4 mt-5">Select Rooms</div>

        <div class="bg-white shadow-md rounded-lg mb-4 w-4/6 p-5">
            <div id="availability-card-container" class="bg-white"></div>
            <div class="flex justify-between">
            <div>
                <div class="text-black">Available Rooms : 1</div>
                <div>Room type</div>
            </div>

            <div>
                <div>Room Selected 1</div>
                <div>(1 Night)</div>
                <div>2 Adults and 1 kid</div>
            </div>
            <div>
                <div>Price : Rp.500.000</div>
            </div>
            <div>
                <button>Booking</button>
            </div>
            </div>
        </div>
    </div> -->

</div>
<!-- Modal Overlay and Content -->
<div id="modal-success" class="hidden fixed inset-0 z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <!-- Background backdrop, show/hide based on modal state. -->
    <div id="modal-backdrop" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <!-- Modal panel, show/hide based on modal state. -->
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                            <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Deactivate account</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">Are you sure you want to deactivate your account? All of your data will be permanently removed. This action cannot be undone.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button type="button" id="deactivate-button" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Deactivate</button>
                    <button type="button" id="cancel-button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // const modal = document.getElementById('modal-success');
    // const openModalButton = document.getElementById('open-modal');
    // const cancelButton = document.getElementById('cancel-button');
    // const modalBackdrop = document.getElementById('modal-backdrop');

    // // Function to open the modal
    // function openModal() {
    //     modal.classList.remove('hidden');
    //     modal.classList.add('flex');
    // }

    // // Function to close the modal
    // function closeModal() {
    //     modal.classList.remove('flex');
    //     modal.classList.add('hidden');
    // }

    // // Event listeners
    // openModalButton.addEventListener('click', openModal);
    // cancelButton.addEventListener('click', closeModal);
    // modalBackdrop.addEventListener('click', closeModal);

    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal.classList.contains('hidden')) {
            modal.classList.remove('hidden');
        } else {
            modal.classList.add('hidden');
        }
    }

    document.addEventListener('DOMContentLoaded', (event) => {
        const addRoomButton = document.getElementById('add-room-button');
        const roomContainer = document.getElementById('room-container');
        const modalContainer = document.getElementById('modal-container');
        const buttonsContainer = document.getElementById('buttons-container');
        const submitButton = document.getElementById('submit-button');

        function updateCounts() {
            let adults = 0;
            let kids = 0;
            var rooms = 0;

            // Muat data dari cookie jika tersedia
            const cookies = document.cookie.split(';');
            console.log(cookies)
            const roomsDataCookie = cookies.find(cookie => cookie.trim().startsWith('roomsData='));
            // console.log(roomsDataCookie.length)
            if (roomsDataCookie) {
                const roomsData = JSON.parse(roomsDataCookie.split('=')[1]);
                roomsData.forEach(room => {
                    adults += parseInt(room.adults);
                    kids += parseInt(room.kids);
                    rooms++;

                    console.log('adfadfadfadfadfadfad')
                });
                console.log('dewasa = ', adults)
                console.log('anak = ', kids)
            } else {
                // Iterasi setiap bagian ruangan untuk menjumlahkan dewasa dan anak-anak dari pilihan saat ini
                const roomSections = document.getElementsByClassName('room-section');
                Array.from(roomSections).forEach(roomSection => {
                    const adultCount = parseInt(roomSection.querySelector('.select-adult').value);
                    const kidCount = parseInt(roomSection.querySelector('.select-kid').value);
                    adults += adultCount;
                    kids += kidCount;
                    rooms++;
                });
            }

            var persons = adults + kids
            console.log('persons', persons)
            console.log('rooms', rooms)


            // Perbarui tampilan di modal Anda
            $('#total-persons').text(persons);
            $('#total-rooms').text(rooms);
        }
        updateCounts();

        function saveRoomsData() {
            const roomsData = [];
            const roomSections = roomContainer.getElementsByClassName('room-section');
            Array.from(roomSections).forEach((roomSection, index) => {
                const adultSelect = roomSection.querySelector('.select-adult');
                const kidSelect = roomSection.querySelector('.select-kid');
                roomsData.push({
                    room: index + 1,
                    adults: adultSelect.value,
                    kids: kidSelect.value
                });
            });

            // Mengatur tanggal kedaluwarsa (misalnya, 1 hari dari sekarang)
            const date = new Date();
            date.setTime(date.getTime() + (24 * 60 * 60 * 1000)); // 1 hari
            const expires = "; expires=" + date.toUTCString();

            // Mengatur cookie dengan tanggal kedaluwarsa
            document.cookie = "roomsData=" + JSON.stringify(roomsData) + expires + "; path=/";
            // document.cookie = "roomsData=" + JSON.stringify(roomsData) + "; path=/";
        }

        // Function to load data from cookie
        function loadRoomsData() {
            const cookies = document.cookie.split(';');
            const roomsDataCookie = cookies.find(cookie => cookie.trim().startsWith('roomsData='));
            if (roomsDataCookie) {
                const roomsData = JSON.parse(roomsDataCookie.split('=')[1]);
                roomContainer.innerHTML = '';

                // Tambahkan judul hanya sekali di awal
                const roomTemplate = `
            <div class="text-md font-bold mb-4">Manage Room Details</div>
        `;
                const titleSection = document.createElement('div');
                titleSection.innerHTML = roomTemplate;
                roomContainer.appendChild(titleSection.firstElementChild);

                roomsData.forEach(room => {
                    const roomTemplate = `
                <div class="flex flex-col mb-4 room-section">
                    <div class="border border-black h-px w-full mb-4"></div>

                    <div class="flex items-center mb-4">
                        <img class="w-10 h-10 mr-4" src="<?php echo base_url('assets/foto/person.png') ?>" />
                        <div class="text-black text-sm font-normal mr-auto">Adult</div>
                        <div>
                            <select name="dewasa" class="select-adult appearance-auto border-1 w-24 h-8 rounded">
                                <option value="1" ${room.adults == 1 ? 'selected' : ''}>1</option>
                                <option value="2" ${room.adults == 2 ? 'selected' : ''}>2</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex items-center mb-4">
                        <img class="w-10 h-10 mr-4" src="<?php echo base_url('assets/foto/kid.png') ?>" />
                        <div class="flex flex-col items-start mr-auto">
                            <div class="text-black text-sm font-normal">Kid</div>
                            <div class="text-gray-500 text-sm font-normal">Ages 6 and below</div>
                        </div>
                        <div>
                            <select name="anak" class="select-kid appearance-auto border-1 w-24 h-8 rounded">
                                <option value="0" ${room.kids == 0 ? 'selected' : ''}>0</option>
                                <option value="1" ${room.kids == 1 ? 'selected' : ''}>1</option>
                                <option value="2" ${room.kids == 2 ? 'selected' : ''}>2</option>
                            </select>
                        </div>
                    </div>
                    <button class="remove-room-button bg-red-500 text-white px-4 py-2 rounded">Remove Room</button>
                </div>
            `;
                    const newRoomSection = document.createElement('div');
                    newRoomSection.innerHTML = roomTemplate;
                    roomContainer.appendChild(newRoomSection.firstElementChild);
                });

                updateRoomContainerHeight();
            }
        }

        function updateRoomContainerHeight() {
            const roomSections = roomContainer.getElementsByClassName('room-section');
            if (roomSections.length > 1) {
                roomContainer.style.overflowY = 'scroll';
                modalContainer.style.height = '400px'; // Tetapkan tinggi tetap dengan scroll
            } else {
                roomContainer.style.overflowY = 'hidden';
                modalContainer.style.height = `${roomContainer.scrollHeight + buttonsContainer.scrollHeight}px`;
            }
        }

        addRoomButton.addEventListener('click', () => {
            const roomCount = roomContainer.getElementsByClassName('room-section').length;
            console.log('halo')
            if (roomCount >= 10) {
                addRoomButton.disabled = true;
                return;
            }

            const roomTemplate = `
            <div class="flex flex-col mb-4 room-section">
                <div class="border border-black h-px w-full mb-4"></div>
                <div class="flex items-center mb-4">
                    <img class="w-10 h-10 mr-4" src="<?php echo base_url('assets/foto/person.png') ?>" />
                    <div class="text-black text-sm font-normal mr-auto">Adult</div>
                    <div>
                        <select name="dewasa" class="select-adult appearance-auto border-1 w-24 h-8 rounded">
                            <option value="1">1</option>
                            <option value="2" selected>2</option>
                        </select>
                    </div>
                </div>
                <div class="flex items-center mb-4">
                    <img class="w-10 h-10 mr-4" src="<?php echo base_url('assets/foto/kid.png') ?>" />
                    <div class="flex flex-col items-start mr-auto">
                        <div class="text-black text-sm font-normal">Kid</div>
                        <div class="text-gray-500 text-sm font-normal">Ages 6 and below</div>
                    </div>
                    <div>
                        <select name="anak" class="select-kid appearance-auto border-1 w-24 h-8 rounded">
                            <option value="0" selected>0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                </div>
                <button class="remove-room-button bg-red-500 text-white px-4 py-2 rounded">Remove Room</button>
            </div>
        `;

            const newRoomSection = document.createElement('div');
            newRoomSection.innerHTML = roomTemplate;
            roomContainer.appendChild(newRoomSection.firstElementChild);

            updateRoomContainerHeight();
            updateRemoveRoomButtons();
        });

        function updateRemoveRoomButtons() {
            const removeButtons = document.querySelectorAll('.remove-room-button');
            removeButtons.forEach(button => {
                button.addEventListener('click', (event) => {
                    const roomSections = roomContainer.getElementsByClassName('room-section');
                    console.log('roomSections = ', roomSections.length)
                    if (roomSections.length > 1) {
                        event.target.closest('.room-section').remove();
                        updateRoomContainerHeight();
                        if (roomSections.length < 10) {
                            addRoomButton.disabled = false;
                        }
                    } else {
                        alert('At least one room must be present.');
                    }
                });
            });
        }

        submitButton.addEventListener('click', () => {
            saveRoomsData();
            updateCounts();

            console.log('Rooms data saved to cookie.');
            closeModal(); // Panggil fungsi penutupan modal di sini

        });

        // Load data when modal is opened
        document.querySelector("button[onclick*='toggleModal']").addEventListener('click', () => {
            loadRoomsData();
            updateRemoveRoomButtons();
        });

        function closeModal() {
            // Reset form or close modal as needed
            document.getElementById('modal').classList.add('hidden'); // Sesuaikan dengan cara Anda menutup modal
        }
    });



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

        // Validasi bahwa check-out tidak lebih awal dari check-in
        if (checkOutDate < checkInDate) {
            $("#error-message").text("Check-out date cannot be earlier than check-in date.");
            return;
        }
        let adults = 0;
        let kids = 0;
        var roomsi = 0;

        // Muat data dari cookie jika tersedia
        const cookies = document.cookie.split(';');
        const roomsDataCookie = cookies.find(cookie => cookie.trim().startsWith('roomsData='));
        // console.log(roomsDataCookie.length)
        if (roomsDataCookie) {
            const roomsData = JSON.parse(roomsDataCookie.split('=')[1]);
            roomsData.forEach(room => {
                adults += parseInt(room.adults);
                kids += parseInt(room.kids);
                roomsi++;
                console.log('adfadfadfadfadfadfad = ', roomsi)
            });
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
                var availability = response.availability
                var kamar = availability.length;
                var harga = availability[0].harga
                var jenis_kamar = availability[0].jenis_kamar
                // console.log(kamar)
                $("#availability-card-container").empty();
                $("#availability1").empty();

                if (kamar >= roomsi) {
                    $("#error-message").html(`<div class="text-green-500"><i class="fa-solid fa-circle-check"></i> There are ${kamar} rooms available. You can continue booking by clicking the reserve button </div>`);

                    // openModal();

                    // Swal.fire({
                    //     title: 'Room Available',
                    //     text: "Click continue in to the next step",
                    //     // icon: 'Succes',
                    //     showCancelButton: true,
                    //     confirmButtonColor: '#3085d6',
                    //     cancelButtonColor: '#d33',
                    //     cancelButtonText: 'Back',
                    //     confirmButtonText: 'Continue',

                    // }).then((result) => {
                    //     if (result.isConfirmed) {
                    //         window.location.href = base_url + 'pemesanan';
                    //     }
                    // });


                    response.availability.forEach(function(item) {
                        //     const cardHTML = `
                        //     <div class="">
                        //         <div class="text-xl font-semibold mb-2">${item.id_kamar}</div>
                        //     </div>
                        // `;
                        // $("#availability-card-container").append(cardHTML);
                    });
                    const avak = `
                    <div class="flex flex-col items-center">
        <div class="border h-px w-4/6 mt-3"></div>
        <div class="text-2xl font-bold text-center mb-4 mt-5">Select Rooms</div>

        <div class="bg-white shadow-md rounded-lg mb-4 w-4/6 p-5">
            <div id="availability-card-container" class="bg-white"></div>
            <div class="flex justify-between">
            <div>
                <div class="text-black font-bold">Available Rooms : ${kamar}</div>
                <div>Room type : ${jenis_kamar}</div>
            </div>

            <div>
                <div>Room Selected ${roomsi}</div>
                <div>(1 Night)</div>
                <div>${adults} Adults and ${kids} kid</div>
            </div>
            <div>
                <div>Price : ${harga}</div>
            </div>
            <div>
                <button class="px-2 h-12 bg-red-500 text-white font-bold rounded border border-red-500 flex-col justify-center items-start inline-flex" id="reserve">Booking</button>
            </div>
            </div>
        </div>
    </div>
                          
                    `;
                    $("#availability1").append(avak);
                    $("#reserve").click(function(event) {
                        console.log('halo');
                        window.location.href = base_url + 'pemesanan';
                    });
                    // console.log('adfadf', availability);

                    $('html, body').animate({
                        scrollTop: $("#availability-card-container").offset().top
                    }, 1000);

                } else {
                    $("#error-message").html(`<div class="text-yellow-500"><i class="fas fa-exclamation-circle"></i> There are ${kamar} rooms available. You need ${roomsi} rooms. Please choose another date or adjust the number of rooms.</div>`);

                    const avak = `
                            <div class="text-black">Available Rooms: ${kamar}</div>
                    `;
                    $("#availability1").append(avak);
                    console.log('adfadf', kamar);

                    $('html, body').animate({
                        scrollTop: $("#availability-card-container").offset().top
                    }, 10);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Tampilkan pesan error jika permintaan gagal
            },
        });

        // Lakukan tindakan lebih lanjut seperti submit form atau AJAX request
        // Misalnya: $("#yourFormId").submit();
    });


    // $(document).ready(function() {
    //     $.ajax({
    //         type: "GET",
    //         url: "<?php echo base_url('kamar/getSessionValues'); ?>", // URL endpoint PHP untuk mendapatkan data session
    //         success: function(response) {
    //             // Parse respons JSON dari server
    //             var sessionData = JSON.parse(response);

    //             // Perbarui elemen HTML dengan nilai dari session
    //             $('#total-persons').text(parseInt(sessionData.adults) + parseInt(sessionData.kids));
    //             $('#total-rooms').text(parseInt(sessionData.rooms));

    //             // Juga memperbarui counter di dalam modal
    //             $('.adult').text(sessionData.adults);
    //             $('.kid').text(sessionData.kids);
    //             $('.room').text(sessionData.rooms);
    //         },
    //         error: function(xhr, status, error) {
    //             console.error("Error:", error);
    //         }
    //     });
    // });

    // Event listener for the submit button
    // document.getElementById('submit-button').addEventListener('click', function() {
    //     let adults = parseInt(document.querySelector('.adult').innerText);
    //     let kids = parseInt(document.querySelector('.kid').innerText);
    //     let rooms = parseInt(document.querySelector('.room').innerText);

    //     // Send data to server using AJAX
    //     $.ajax({
    //         type: "POST",
    //         url: "<?php echo base_url('kamar/sessionRooms'); ?>",
    //         data: {
    //             adults: adults,
    //             kids: kids,
    //             rooms: rooms
    //         },
    //         success: function(response) {
    //             // Handle success response if needed
    //             console.log("Data sent successfully!");
    //             var responseData = JSON.parse(response);

    //             // Update the button displaying the counts
    //             document.getElementById('total-persons').innerText = parseInt(responseData.adults) + parseInt(responseData.kids); // Total persons
    //             document.getElementById('total-rooms').innerText = parseInt(responseData.rooms); // Rooms

    //             // Close the modal
    //             toggleModal('modal');
    //         },
    //         error: function(xhr, status, error) {
    //             // Handle error response if needed
    //             console.error("Error:", error);
    //         }
    //     });
    // });

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