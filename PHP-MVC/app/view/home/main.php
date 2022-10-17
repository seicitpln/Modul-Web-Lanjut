
<div class="container my-5">
	<h1>Tokobuah</h1>
	<div class="row my-3">
		<div class="col-md-12">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Baru</button>
		</div>
	</div>
	<div class="row my-3">
		<div class="col-md-12">
			<table class="table">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">Kode</th>
			      <th scope="col">Nama</th>
			      <th scope="col">Harga</th>
			      <th scope="col">Deskripsi</th>
			      <th scope="col">Aksi</th>
			    </tr>
			  </thead>
			  <tbody>
			    <?php foreach ($data['produk'] as $produk) :?>
			    <tr>
			      <td scope="row"><?= strtoupper($produk['product_id']) ?></td>
			      <td><?= $produk['name']; ?></td>
			      <td><?= $produk['price']; ?></td>
			      <td><?= $produk['description']; ?></td>
			      <td>
			      	<button type="button" data="<?= $produk['product_id'] ?>" class="btn btn-success btn-edit" data-toggle="modal" data-target="#editProduk">Edit</button>
			      	<a href="<?= BASE_URL.'home/hapus/'.$produk['product_id'] ?>" class="btn btn-danger">Hapus</a>
			      </td>
			    </tr>
			    <?php endforeach; ?>
			  </tbody>
			</table>
		</div>
	</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= BASE_URL; ?>home/tambah">
          <div class="form-group">
		    <label for="exampleFormControlInput1">Nama Produk</label>
		    <input class="form-control" name="name">
		  </div>
		  <div class="form-group">
		    <label for="exampleFormControlInput1">Harga</label>
		    <input type="number" class="form-control" name="price">
		  </div>
		  <div class="form-group">
		    <label for="exampleFormControlTextarea1">Deskripsi</label>
		    <textarea name="description" class="form-control" id="exampleFormControlTextarea1"></textarea>
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
		</form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="editProduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" class="edit" action="">
          <div class="form-group">
		    <label for="exampleFormControlInput1">Nama Produk</label>
		    <input class="form-control name" name="name">
		  </div>
		  <div class="form-group">
		    <label for="exampleFormControlInput1">Harga</label>
		    <input type="number" class="form-control price" name="price">
		  </div>
		  <div class="form-group">
		    <label for="exampleFormControlTextarea1">Deskripsi</label>
		    <textarea name="description" class="form-control deskripsi" id="exampleFormControlTextarea1"></textarea>
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>