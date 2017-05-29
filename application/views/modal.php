<!-- Tambah Data Gambar -->
<div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Gambar</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?=base_url()?>index.php/upload/insertImage" enctype="multipart/form-data">
            <div class="form-group">
		      	<label for="nama">Nama Gambar</label>
		      	<input class="form-control" type="text" name="nama" placeholder="Nama Gambar" required>
		    </div>
		    <div class="form-group">
		      	<label for="caption">Caption</label>
		      	<input class="form-control" type="text" name="keterangan" placeholder="Caption" required>
		    </div>
		    <div class="form-group">
		      	<label for="gambar">Image</label>
		      	<input class="form-control" type="file" name="gambar" required>
		    </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Edit Data Gambar -->
<div class="modal fade" id="editDataModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Data Gambar</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?=base_url()?>index.php/upload/editImage" enctype="multipart/form-data">
            <div class="form-group">
		      	<label for="nama">Nama Gambar</label>
		      	<input class="form-control nm-img" type="text" name="nama" placeholder="Nama Gambar" required>
		    </div>
		    <div class="form-group">
		      	<label for="caption">Caption</label>
		      	<input class="form-control ket-img" type="text" name="keterangan" placeholder="Caption" required>
		    </div>
		    <div class="form-group">
		      	<label for="gambar">Image</label>
		      	<input class="form-control" type="file" name="gambar">
		    </div>
            
      </div>
      <div class="modal-footer">
      	<input class="id" type="hidden" name="id">
      	<input class="path" type="hidden" name="path">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button class="btn btn-primary">Edit</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Hapus Data Image -->
<div class="modal fade" id="hapusDataModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Hapus Data Gambar</h4>
      </div>
      <div class="modal-body">
        	<div class="view-image text-center"></div> 
        	<br/>
          	<div class="text-delete text-center"></div>
      </div>
      <div class="modal-footer">
        <form method="post" action="<?=base_url()?>index.php/upload/deleteimage">
            <input class="id" type="hidden" name="id">
            <input class="path" type="hidden" name="path">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>




