<style>
  /* The Modal (background) */
.modal {
  
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
<!-- fungsi input hanya angka -->
<script>
  function hanyaAngka(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
    return true;
  }
</script>

<!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="container">
	<div class="row">
		<div class="col-sm-4 col-sm-offset-1" style="background-color: white;padding:20px;">
			<h2 class="text-gray">Tambah Produk</h2><br>
			<form action="<?php echo base_url('Produk/insert_produk'); ?>" id="main-contact-form" class="contact-form row" name="contact-form" method="post" enctype="multipart/form-data">
				<div class="form-group col-md-12">
					Nama produk :
					<input type="text" name="nama_produk" class="form-control" required="required" placeholder="Nama produk anda">
				</div> 
			
				<?php foreach($kategori as $a){?> 
				<input type="hidden" name="id_kategori" value="<?php echo $a->id_kategori; ?>">
				<?php } ?>
				<div class="form-group col-md-12">
					Kategori :
					<select name="kategori" class="form-control">
						<?php foreach($kategori as $a){?>
						<?php echo "<option>".$a->nama_kategori."</option>"; ?>
						<?php } ?>
					</select>
				</div> 
				<div class="form-group col-md-12">
					Stok produk:
					<input onkeypress="return hanyaAngka(event)" maxlength="4" name="stok" min="1" class="form-control" required="required" placeholder="Stok produk">
				</div> 
				<div class="form-group col-md-12">
					Harga produk:
					<input onkeypress="return hanyaAngka(event)" maxlength="9" name="harga" min="1" class="form-control" required="required" placeholder="Harga produk">
				</div>
                <div class="form-group col-md-12">
					Berat produk (gram):
					<input type="number" name="berat" min="1" class="form-control" required="required" placeholder="Berat produk">
                </div>
				<div class="form-group col-md-6">
					Upload gambar :<br><br>
					<input type="file" name="filefoto"  required="required" placeholder="Upload gambar">
				</div> 
				<div class="form-group col-md-12">
					Keterangan produk:
					<textarea name="keterangan" required="required" class="form-control" rows="8" placeholder="Keterangan produk"></textarea>
					<!-- <input type="textarea" name="keterangan" class="form-control" required="required" placeholder="Keterangan produk"> -->
				</div>        
				<div class="form-group col-md-12">
					<input type="submit" name="submit" class="btn btn-primary" value="Submit">
					<a href="<?php echo base_url('Produk'); ?>"><button type="button" value="batal" class="btn btn-primary">Batal</button></a>
				</div>
			</form>
		</div>
		<div class="col-sm-8 col-sm-offset-1" style="background-color: white;padding:20px;">
			<h2 class="text-gray">Daftar Produk</h2><br>
      <form>
      <input type="text" name="keyword" />
      <input type="submit" value="search" />
      </form>
      <button id="myBtn">+ Tambah Stok</button>
    
      <!-- The Modal -->
      <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
          <span class="close">&times;</span>
          <form action="<?php echo base_url('Admin_controller/Beranda/tambahstok') ?>" method="post">
            <input type="text" name="id_produk" placeholder="#Id Produk" required="required">
            <input type="number" min="1" name="tambahstok" placeholder="Jumlah stok" required="required">
          <button class="btn btn-primary">Tambah</button>
          </form>
        </div>
      </div>
			<div class="table-responsive" style="margin-top: 10px;">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            
                          </th> 
                          <th>
                            #
                          </th>
                          <th>
                            Id Produk
                          </th>
                          <th>
                            Nama Produk
                          </th>
                          <th>
                            Stok 
                          </th>
                          <th>
                            Kategori
                          </th>
                          <th>
                            Harga
                          </th>
                          <th>
                            Berat
                          </th>
                          <th>                      
                            Keterangan
                          </th>                  
                        </tr>
                      </thead>
                      <tbody>
                      	<?php foreach($produk as $b){?>
                        <tr>
                          <td>    
                            <a href="<?php echo base_url('Produk/update_produk/'.$b->id_produk); ?>"><i class="menu-icon mdi mdi-pencil-box"></i> Edit</a><br><br>
                            <a onclick="return confirm_alert(this);" href="<?php echo base_url('Produk/hapus_produk/'.$b->id_produk); ?>"><i class="menu-icon mdi mdi-delete"></i> Hapus</a>
                          </td>
                          <td class="font-weight-medium">
                          	<a target="_blank" href="<?php echo base_url($b->gambar); ?>"><img src="<?php echo base_url($b->gambar); ?>"></a>
                          </td>
                          <td>
                          	<?php echo $b->id_produk; ?>
                          </td>
                          <td>
                          	<?php echo $b->nama_produk; ?>
                          </td>
                          <td>
                            <?php echo $b->stok; ?>
                          </td>
                          <td>
                          	<?php echo $b->nama_kategori; ?>
                          </td>
                        
                          <td>
                          	Rp <?php $format_indonesia = number_format ($b->harga, 0, ',', '.');
                          echo $format_indonesia; ?>
                          </td>
                          <td>
                            <?php echo $b->berat; ?> gram
                          </td>
                        
                          <td>
                          	<?php echo $b->keterangan; ?>
                          </td>
                          
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
		</div>
	</div>
</div>
</div>
</div>
<!-- content-wrapper ends -->

<!-- Pop up -->
<script type="text/javascript">
  function confirm_alert(node) {
      return confirm("Apakah anda yakin ingin menghapus produk?");
  }
</script>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>


