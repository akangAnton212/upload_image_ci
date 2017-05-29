$(document).on("click", '.tombol', function(e){
	var id = $(this).data('id');
	var nama = $(this).data('nama');
	var keterangan = $(this).data('keterangan');
	var path = $(this).data('path');
	var baseurl = $(this).data('baseurl');

	$(".id").val(id);
	$(".nm-img").val(nama);
	$(".ket-img").val(keterangan);
	$(".path").val(path);

	$(".text-delete").text("Apakah anda yakin akan menghapus gambar " + path + "?");
	$('.view-image').html("<img src=\"" + baseurl +"assets/uploads/" + path + "\" style=\"max-width:500px;\">");

})