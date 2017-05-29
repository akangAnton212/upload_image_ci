<div class="container" style="margin-top:50px;">

<h1>Sistem Pengelolaan Gambar</h1>

<?php
if ($error == true) {
?>
<div class="alert alert-danger alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
	<strong><?=$error?></strong>
</div>
<?php } ?>

<?php
if (@$this->input->get('stat') == "sukses") {
?>
<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
	<strong>Data berhasil di-upload!</strong>
</div>
<?php } ?>

<hr>
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#tambahDataModal"><i class="glyphicon glyphicon-plus"></i> Tambah Image</button>
<hr>

<?php
$i = 1;

if ($total==null) {
?>
	<div class="alert alert-danger" role="alert">
		<strong>No records found!</strong>
	</div>
<?php
} else {
?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Gambar</th>
			<th>Keterangan Gambar</th>
			<th>Preview</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>

<?php
foreach ($image as $row) {
?>

		<tr>
			<td><?php echo $i++;?></td>
			<td><?php echo $row['nm_img'];?></td>
			<td><?php echo $row['ket_img'];?></td>
			<td><img src="<?php echo base_url()?>assets/uploads/hasil_resize/<?=$row['path_img']?>"></td>
			<td>
				<!-- Memilih event dari modal.php -->
				<button type="button" class="btn btn-success tombol"
				data-toggle="modal"
				data-target="#editDataModal"
				data-id="<?php echo $row['id'];?>"
				data-nama="<?php echo $row['nm_img'];?>"
				data-keterangan="<?php echo $row['ket_img'];?>"
				data-path="<?php echo $row['path_img'];?>"
				><span class="glyphicon glyphicon-pencil"></span></button>

				<button type="button" class="btn btn-danger tombol"
				data-toggle="modal"
				data-target="#hapusDataModal"
				data-id="<?php echo $row['id'];?>"
				data-path="<?php echo $row['path_img'];?>"
				data-baseurl="<?php echo base_url();?>"
				><span class="glyphicon glyphicon-trash"></span></button>

			</td>
		</tr>
	</tbody>

<?php //$i++; 
	}
	} ?>
	</table>
</div>