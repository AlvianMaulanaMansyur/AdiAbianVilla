// modal kategori
$(function () {
	$(".modalFasilitasTambah").on("click", function () {
		$("#image").hide();
		$(".ket").hide();
		$("#imageFasilitas").attr("required", "required");
		// $("#FasilitasLabel").html("Tambah Data fasilitas");
		$(".modal-footer button[type=submit]").html("Tambah Data");
		$("#fasilitas").val("");
		$(".formAction form").attr(
			"action",
			"http://localhost/adiabianvilla/c_fasilitas/c_fasilitas/insert"
		);
	});

	$(".modalFasilitasUbah").on("click", function () {
		$("#image").show();
		$(".ket").show();
		$("#imageFasilitas").removeAttr("required");
		$("#FasilitasLabel").html("Ubah Data fasilitas");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		const id = $(this).data("id");
		$(".formAction form").attr(
			"action",
			"http://localhost/adiabianvilla/c_fasilitas/c_fasilitas/ubah/" + id
		);
		$.ajax({
			url: "http://localhost/adiabianvilla/c_fasilitas/c_fasilitas/edit",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
				$("#id").val(data.id_fasilitas);
				$("#image").attr("src", "http://localhost/adiabianvilla/" + data.image);
				$("#fasilitas").val(data.nama_fasilitas);
			},
		});
	});
});
