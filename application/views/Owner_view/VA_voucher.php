
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="container">
	<div class="row">
		<div class="col-sm-12 col-sm-offset-1" style="background-color: white;padding:20px;">
            <h2 class="text-gray">Voucher</h2><br><br>
            
			
				<div class="form-group col-md-12">
					Kode Voucher :
					<input type="text" name="kode_voucher" class="form-control" required="required" placeholder="kode">
				</div>
				
				<div class="form-group col-md-3">
					Nama Voucher:
					<input type="text" name="nama_voucher" class="form-control" required="required" placeholder="nama voucher">
				</div> 
				<div class="form-group col-md-3">
					Tanggal awal:
					<input type="date" name="tanggal_awal" class="form-control" required="required" placeholder="tanggal awak">
				</div> 
				<div class="form-group col-md-3">
					Tanggal Akhir:
					<input type="date" name="nama_voucher" class="form-control" required="required" placeholder="tanggal akhir">
				</div> 
				<div class="form-group col-md-3">
					Total Voucher:
					<input onkeypress="return hanyaAngka(event)" maxlength="7" name="harga" min="1" class="form-control" required="required" placeholder="total voucher">
				</div>
                <div class="form-group col-md-3">
					Minimum Belanja:
					<input onkeypress="return hanyaAngka(event)" maxlength="7" name="harga" min="1" class="form-control" required="required" placeholder="minimum belanja">
				</div>
				<div class="form-group col-md-12">
					Keterangan:
					<textarea name="keterangan" required="required" class="form-control" rows="8" placeholder="Keterangan"></textarea>
				
				</div>        
				<div class="form-group col-md-12">
					<input type="submit" name="submit" class="btn btn-primary" value="Submit">
					<a href="##"><button type="button" value="batal" class="btn btn-primary">Batal</button></a>
				</div>
			
		</div>
	</div>
</div>
</div>
</div>