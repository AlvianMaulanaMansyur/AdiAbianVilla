function toggleModal(modalId) {
	const modal = document.getElementById(modalId);
	if (modal.classList.contains("hidden")) {
		modal.classList.remove("hidden");
	} else {
		modal.classList.add("hidden");
	}
}

document.addEventListener("DOMContentLoaded", (event) => {
	const addRoomButton = document.getElementById("add-room-button");
	const roomContainer = document.getElementById("room-container");
	const modalContainer = document.getElementById("modal-container");
	const buttonsContainer = document.getElementById("buttons-container");
	const submitButton = document.getElementById("submit-button");

	function updateCounts() {
		let adults = 0;
		let kids = 0;
		var rooms = 0;

		const cookies = document.cookie.split(";");
		console.log(cookies);
		const roomsDataCookie = cookies.find((cookie) =>
			cookie.trim().startsWith("roomsData=")
		);
        console.log('rooms data cookie : ',roomsDataCookie);

		// console.log(roomsDataCookie.length)
		if (roomsDataCookie) {
			const roomsData = JSON.parse(roomsDataCookie.split("=")[1]);
			roomsData.forEach((room) => {
				adults += parseInt(room.adults);
				kids += parseInt(room.kids);
				rooms++;

				console.log("adfadfadfadfadfadfad");
			});
            console.log('wkwkwkwkwkwkwk');
			console.log("dewasa = ", adults);
			console.log("anak = ", kids);
		} else {
			const roomSections = document.getElementsByClassName("room-section");
			Array.from(roomSections).forEach((roomSection) => {
				const adultCount = parseInt(
					roomSection.querySelector(".select-adult").value
				);
				const kidCount = parseInt(
					roomSection.querySelector(".select-kid").value
				);
				adults += adultCount;
				kids += kidCount;
				rooms++;
			});
            console.log('akakakakakakakakak');

		}

		var persons = adults + kids;
		console.log("persons", persons);
		console.log("rooms", rooms);

		// Perbarui tampilan di modal Anda
		$("#total-persons").text(persons);
		$("#total-rooms").text(rooms);
	}
	updateCounts();

	function saveRoomsData() {
		const roomsData = [];
		const roomSections = roomContainer.getElementsByClassName("room-section");
		Array.from(roomSections).forEach((roomSection, index) => {
			const adultSelect = roomSection.querySelector(".select-adult");
			const kidSelect = roomSection.querySelector(".select-kid");
			roomsData.push({
				room: index + 1,
				adults: adultSelect.value,
				kids: kidSelect.value,
			});
		});

		const date = new Date();
		date.setTime(date.getTime() + 24 * 60 * 60 * 1000); // 1 hari
		const expires = "; expires=" + date.toUTCString();

		// Mengatur cookie dengan tanggal kedaluwarsa
		document.cookie =
			"roomsData=" + JSON.stringify(roomsData) + expires + "; path=/";
	}

	// Function to load data from cookie
	function loadRoomsData() {
		const cookies = document.cookie.split(";");
		const roomsDataCookie = cookies.find((cookie) =>
			cookie.trim().startsWith("roomsData=")
		);
		if (roomsDataCookie) {
			const roomsData = JSON.parse(roomsDataCookie.split("=")[1]);
			roomContainer.innerHTML = "";

			// Tambahkan judul hanya sekali di awal
			const roomTemplate = `
            <div class="text-md font-bold mb-4">Manage Room Details</div>
        `;
			const titleSection = document.createElement("div");
			titleSection.innerHTML = roomTemplate;
			roomContainer.appendChild(titleSection.firstElementChild);

			roomsData.forEach((room) => {
				const roomTemplate = `
                <div class="flex flex-col mb-4 room-section">
                    <div class="border border-black h-px w-full mb-4"></div>

                    <div class="flex items-center mb-4">
                        <img class="w-10 h-10 mr-4" src="<?php echo base_url('assets/foto/person.png') ?>" />
                        <div class="text-black text-sm font-normal mr-auto">Adult</div>
                        <div>
                            <select name="dewasa" class="select-adult appearance-auto border-1 w-24 h-8 rounded">
                                <option value="1" ${room.adults == 1 ? "selected" : ""}>1</option>
                                <option value="2" ${room.adults == 2 ? "selected" : ""}>2</option>
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
                                <option value="0" ${room.kids == 0 ? "selected" : ""}>0</option>
                                <option value="1" ${room.kids == 1 ? "selected" : ""}>1</option>
                                <option value="2" ${room.kids == 2 ? "selected" : ""}>2</option>
                            </select>
                        </div>
                    </div>
                    <button class="remove-room-button bg-red-500 text-white px-4 py-2 rounded">Remove Room</button>
                </div>
            `;
				const newRoomSection = document.createElement("div");
				newRoomSection.innerHTML = roomTemplate;
				roomContainer.appendChild(newRoomSection.firstElementChild);
			});

			updateRoomContainerHeight();
		}
	}

	function updateRoomContainerHeight() {
		const roomSections = roomContainer.getElementsByClassName("room-section");
		if (roomSections.length > 1) {
			roomContainer.style.overflowY = "scroll";
			modalContainer.style.height = "400px"; // Tetapkan tinggi tetap dengan scroll
		} else {
			roomContainer.style.overflowY = "hidden";
			modalContainer.style.height = `${
				roomContainer.scrollHeight + buttonsContainer.scrollHeight
			}px`;
		}
	}

	addRoomButton.addEventListener("click", () => {
		const roomCount =
			roomContainer.getElementsByClassName("room-section").length;
		console.log("halo");
		if (roomCount >= 10) {
			addRoomButton.disabled = true;
			return;
		}

		const roomTemplate = `
            <div class="flex flex-col room-section">
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

		const newRoomSection = document.createElement("div");
		newRoomSection.innerHTML = roomTemplate;
		roomContainer.appendChild(newRoomSection.firstElementChild);

		updateRoomContainerHeight();
		updateRemoveRoomButtons();
	});

	function updateRemoveRoomButtons() {
		const removeButtons = document.querySelectorAll(".remove-room-button");
		removeButtons.forEach((button) => {
			button.addEventListener("click", (event) => {
				const roomSections =
					roomContainer.getElementsByClassName("room-section");
				console.log("roomSections = ", roomSections.length);
				if (roomSections.length > 1) {
					event.target.closest(".room-section").remove();
					updateRoomContainerHeight();
					if (roomSections.length < 10) {
						addRoomButton.disabled = false;
					}
				} else {
					alert("At least one room must be present.");
				}
			});
		});
	}

	submitButton.addEventListener("click", () => {
		saveRoomsData();
		updateCounts();
		$("#availability-card-container").empty();
		$("#availability1").empty();
		console.log("Rooms data saved to cookie.");
		closeModal(); // Panggil fungsi penutupan modal di sini
	});

	// Load data when modal is opened
	document
		.querySelector("button[onclick*='toggleModal']")
		.addEventListener("click", () => {
			loadRoomsData();
			updateRemoveRoomButtons();
		});

	function closeModal() {
		// Reset form or close modal as needed
		document.getElementById("modal").classList.add("hidden"); // Sesuaikan dengan cara Anda menutup modal
	}
});
// Fungsi untuk menyimpan nilai ke dalam cookie
function setCookie(name, value, days) {
	var expires = "";
	if (days) {
		var date = new Date();
		date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
		expires = "; expires=" + date.toUTCString();
	}
	document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

// Fungsi untuk mendapatkan nilai dari cookie
function getCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(";");
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == " ") c = c.substring(1, c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
	}
	return null;
}

// Fungsi untuk menghapus cookie
function eraseCookie(name) {
	document.cookie = name + "=; Max-Age=-99999999; path=/";
}

function formatRupiah(value) {
	return new Intl.NumberFormat("id-ID", {
		style: "currency",
		currency: "IDR",
		minimumFractionDigits: 0,
		maximumFractionDigits: 0,
	}).format(value);
}

window.onload = function () {
	let adults = 0;
	let kids = 0;
	var roomsi = 0;

	// Muat data dari cookie jika tersedia
	const cookies = document.cookie.split(";");
	const roomsDataCookie = cookies.find((cookie) =>
		cookie.trim().startsWith("roomsData=")
	);
	// console.log(roomsDataCookie.length)
	if (roomsDataCookie) {
		const roomsData = JSON.parse(roomsDataCookie.split("=")[1]);
		roomsData.forEach((room) => {
			adults += parseInt(room.adults);
			kids += parseInt(room.kids);
			roomsi++;
			console.log("adfadfadfadfadfadfad = ", roomsi);
		});
	}

	// var availabilityCookie = getCookie('availability');
	var availabilityCookie = getCookie("availability");
	var kamarCookie = getCookie("kamar");
	var hargaCookie = getCookie("harga");
	var jenisKamarCookie = getCookie("jenis_kamar");
	console.log(availabilityCookie);
	if (availabilityCookie) {
		var availability = JSON.parse(availabilityCookie);
		var kamar = JSON.parse(kamarCookie);
		var harga = JSON.parse(hargaCookie);
		var jenis_kamar = JSON.parse(jenisKamarCookie);

		// Lanjutkan dengan logika Anda menggunakan nilai dari cookie
		var checkinCookie = getCookie("checkin");
		var checkoutCookie = getCookie("checkout");
		// var check_in = checkinCookie;
		// var check_out = JSON.parse(checkoutCookie);
		let checkin = moment(checkinCookie);
		let checkout = moment(checkoutCookie);
		let nights = checkout.diff(checkin, "days");
		let price = parseInt(roomsi) * parseInt(harga) * parseInt(nights);
		console.log("malam", nights);
		console.log("price", kamar);
		console.log("roomsi", roomsi);

		$("#availability-card-container").empty();
		$("#availability1").empty();

		if (kamar >= roomsi) {
			// $("#error-message").html(`<div class="text-green-500"><i class="fa-solid fa-circle-check"></i> There are ${kamar} rooms available. You can continue booking by clicking the reserve button </div>`);
			console.log("aahahhghghghghg");
			const avak = `
                <div class="flex flex-col items-center pb-10" id="details-container">
        <div class="border h-px lg:w-5/6 md:w-full sm:w-full mt-3"></div>
        <div class="text-2xl font-bold text-center lg:w-5/6 md:w-full sm:w-full mt-5" >Details</div>

        <div class="bg-white shadow-md rounded-lg mb-4 lg:w-5/6 md:w-full sm:w-full p-5">
            <div id="availability-card-container" class="bg-white mb-4"></div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <div class="text-black font-bold text-lg mb-2">Available Rooms: ${kamar}</div>
                    <div class="font-bold">Room Type: <span class="font-normal">${jenis_kamar}</span></div>
                </div>

                <div>
                    <div class="mb-2">Room Selected: <span class="font-bold">${roomsi}</span></div>
                    <div class="mb-2">Nights: <span class="font-bold">${nights}</span></div>
                    <div class="mb-2">${adults} Adults and ${kids} Kids</div>
                </div>
                
                <div>
                    <div class="text-lg font-bold mb-2">Price: <span class="font-normal">${formatRupiah(price)}</span></div>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <button class="px-6 py-3 bg-red-500 text-white font-bold rounded-lg border border-red-500 hover:bg-red-600 transition duration-300" id="reserve">Booking</button>
            </div>
        </div>
    </div>
            `;
			$("#availability1").append(avak);
			$("#reserve").click(function (event) {
				console.log("halo");
				window.location.href = base_url + "pemesanan";
			});
		}
	}
};

$("#check").click(function (event) {
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
		$("#error-message").text(
			"Check-out date cannot be earlier than check-in date."
		);
		return;
	}
	let adults = 0;
	let kids = 0;
	var roomsi = 0;

	// Muat data dari cookie jika tersedia
	const cookies = document.cookie.split(";");
	const roomsDataCookie = cookies.find((cookie) =>
		cookie.trim().startsWith("roomsData=")
	);
	// console.log(roomsDataCookie.length)
	if (roomsDataCookie) {
		const roomsData = JSON.parse(roomsDataCookie.split("=")[1]);
		roomsData.forEach((room) => {
			adults += parseInt(room.adults);
			kids += parseInt(room.kids);
			roomsi++;
			console.log("adfadfadfadfadfadfad = ", roomsi);
		});
	} else {
        console.log('alamakakakakakak');
		const roomSections = document.getElementsByClassName("room-section");
		Array.from(roomSections).forEach((roomSection) => {
			const adultCount = parseInt(roomSection.querySelector(".select-adult").value);
			const kidCount = parseInt(roomSection.querySelector(".select-kid").value);
			adults += adultCount;
			kids += kidCount;
			roomsi++;
		});
	}

	const dateRange = checkIn + " - " + checkOut;

	$.ajax({
		url: base_url + "kamar/ketersediaankamar",
		method: "POST",
		data: {
			dateRange: dateRange,
		},
		dataType: "json",
		success: function (response) {
        const cookies = document.cookie.split(";");
	    const roomsDataCookie = cookies.find((cookie) =>
		cookie.trim().startsWith("roomsData="));
            if (!roomsDataCookie) {
                const roomContainer = document.getElementById("room-container");
                const roomsData = [];
                const roomSections = roomContainer.getElementsByClassName("room-section");
                Array.from(roomSections).forEach((roomSection, index) => {
                    const adultSelect = roomSection.querySelector(".select-adult");
                    const kidSelect = roomSection.querySelector(".select-kid");
                    roomsData.push({
                        room: index + 1,
                        adults: adultSelect.value,
                        kids: kidSelect.value,
                    });
                console.log('adultSelect : ',adultSelect.value);
    
                });
                console.log("roomsData : ",roomsData)
    
    
                // Mengatur tanggal kedaluwarsa (misalnya, 1 hari dari sekarang)
                const date = new Date();
                date.setTime(date.getTime() + 24 * 60 * 60 * 1000); // 1 hari
                const expires = "; expires=" + date.toUTCString();
    
                // Mengatur cookie dengan tanggal kedaluwarsa
                document.cookie = "roomsData=" + JSON.stringify(roomsData) + expires + "; path=/";
            } 
			
			var availability = response.availability;
			var kamar = availability.count;
			var harga = 500000;
			var jenis_kamar = "Deluxe";
            console.log(cookies);
			console.log("jumlah kamar", availability.count);
			setCookie("availability", JSON.stringify(availability), 1);
			setCookie("availability1", JSON.stringify(availability), 1);
			setCookie("kamar", JSON.stringify(kamar), 1);
			setCookie("jumlah_kamar", JSON.stringify(roomsi), 1);
			setCookie("harga", JSON.stringify(harga), 1);
			setCookie("jenis_kamar", JSON.stringify(jenis_kamar), 1);

			var checkinCookie = getCookie("checkin");
			var checkoutCookie = getCookie("checkout");
			let checkin = moment(checkinCookie);
			let checkout = moment(checkoutCookie);
			let nights = checkout.diff(checkin, "days");
			let price = parseInt(roomsi) * parseInt(harga) * parseInt(nights);
			console.log("malam", nights);

			$("#availability-card-container").empty();
			$("#availability1").empty();

			if (kamar >= roomsi) {
				$("#error-message").html(
					`<div class="text-green-500"><i class="fa-solid fa-circle-check"></i> There are ${kamar} rooms available. You can continue booking by clicking the booking button </div>`
				);

				const avak = `
                    <div class="flex flex-col items-center pb-10" id="details-container">
        <div class="border h-px lg:w-5/6 md:w-full sm:w-full mt-3"></div>
        <div class="text-2xl font-bold text-center mb-4 mt-5" >Details</div>

        <div class="bg-white shadow-md rounded-lg mb-4 lg:w-5/6 md:w-full sm:w-full p-5">
            <div id="availability-card-container" class="bg-white mb-4"></div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <div class="text-black font-bold text-lg mb-2">Available Rooms: ${kamar}</div>
                    <div class="font-bold">Room Type: <span class="font-normal">${jenis_kamar}</span></div>
                </div>

                <div>
                    <div class="mb-2">Room Selected: <span class="font-bold">${roomsi}</span></div>
                    <div class="mb-2">Nights: <span class="font-bold">${nights}</span></div>
                    <div class="mb-2">${adults} Adults and ${kids} Kids</div>
                </div>
                
                <div>
                    <div class="text-lg font-bold mb-2">Price: <span class="font-normal">${formatRupiah(
											price
										)}</span></div>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <button class="px-6 py-3 bg-red-500 text-white font-bold rounded-lg border border-red-500 hover:bg-red-600 transition duration-300" id="reserve">Booking</button>
            </div>
        </div>
    </div>
                          
                    `;
				$("#availability1").append(avak);
				$("#reserve").click(function (event) {
					console.log("halo");
					window.location.href = base_url + "pemesanan";
				});

				$("html, body").animate(
					{
						scrollTop: $("#details-container").offset().top,
					},
					1000
				);
			} else {
				$("#error-message").html(
					`<div class="text-yellow-500"><i class="fas fa-exclamation-circle"></i> There are ${kamar} rooms available. You need ${roomsi} rooms. Please choose another date or adjust the number of rooms.</div>`
				);

				const avak = `
                            <div class="text-black">Available Rooms: ${kamar}</div>
                    `;
				$("#availability1").append(avak);
				console.log("adfadf", kamar);

				$("html, body").animate(
					{
						scrollTop: $("#details-container").offset().top,
					},
					10
				);
			}
		},
	});
});