// import moment from 'moment';

document.addEventListener("DOMContentLoaded", function () {
	function saveDate(start, date) {
		var strs = "";
		var stre = "";
		// // strs = start ? formatDate(start) : '';
		// // stre = end ? formatDate(end) : '...';
		strs = start ? start.format("ddd D MMMM YYYY") : "";
		stre = end ? end.format("ddd D MMMM YYYY") : "...";
		document.getElementById("datepicker").value = strs;
		document.getElementById("datepicker2").value = stre;
	}
	var prices = {
		"2024-06-25": "Rp. 500.000",
		"2024-06-26": "Rp. 600.000",
		"2024-06-27": "Rp. 550.000",
		// Tambahkan data harga untuk tanggal lainnya sesuai kebutuhan
	};
	var numberOfMonths = window.innerWidth <= 768 ? 1 : 2;
	var checkin = document.getElementById("data_checkin");
	var checkinValue = checkin.getAttribute("data");
	var checkout = document.getElementById("data_checkout");
	var checkoutValue = checkout.getAttribute("data");
	var format1 = moment(checkinValue).format("ddd D MMMM YYYY");
	var format2 = moment(checkoutValue).format("ddd D MMMM YYYY");
	// console.log(format1);
	// console.log(checkinValue);
	var picker = new Lightpick({
		field: document.getElementById("datepicker"),
		secondField: document.getElementById("datepicker2"),
		parentEl: document.getElementById("datepicker-section"),
		inline: true,
		numberOfMonths: numberOfMonths,
		minDate: new Date(),
		prices: prices,
		onSelect: function (start, end) {
			var strs = "";
			var stre = "";
			// // strs = start ? formatDate(start) : '';
			// // stre = end ? formatDate(end) : '...';
			strs = start ? start.format("ddd D MMMM YYYY") : "";
			stre = end ? end.format("ddd D MMMM YYYY") : "";
			document.getElementById("datepicker").value = strs;
			document.getElementById("datepicker2").value = stre;
			console.log(strs);

			if (start && end) {
				var card = document.getElementById("availability-card-container");
				if (card) {
					card.innerHTML = "";
				}
				$("#availability1").empty();
				const dateRange =
					start.format("YYYY-MM-DD") + " - " + end.format("YYYY-MM-DD");
				console.log("Selected date range: " + dateRange);
				$.ajax({
					url: base_url + "kamar/ketersediaankamar",
					method: "POST",
					data: {
						dateRange: dateRange,
					},
					dataType: "json",
					success: function (response) {
						console.log("afajjadlfjal");
						const cookies = document.cookie.split(";");
						console.log(cookies);
						console.log(response.availability); // Tampilkan respons dari server pada konsol
						// Menggunakan nilai dari respons untuk memperbarui tabel
						var availabilityElement = $("#availability");
						availabilityElement.html(response.availability.length);
					},
					error: function (xhr, status, error) {
						console.error(xhr.responseText); // Tampilkan pesan error jika permintaan gagal
					},
				});
			}
		},
	});

	if (checkinValue && checkoutValue) {
		document.getElementById("datepicker").value = format1;
		document.getElementById("datepicker2").value = format2;
	}

	// Menangani input secara manual untuk memastikan format benar saat memilih start date
	document.getElementById("datepicker").addEventListener("input", function () {
		var dates = this.value.split(" to ");
		if (dates.length === 1) {
			var start = moment(dates[0], "Do MMMM YYYY");
			this.value = formatDate(start);
		}
	});
});
