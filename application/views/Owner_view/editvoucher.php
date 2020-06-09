
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="container">
	<div class="row">
		<div class="col-sm-12 col-sm-offset-1" style="background-color: white;padding:20px;">
            <h2 class="text-gray">Voucher</h2><br><br>
            <?php foreach($voucher2 as $a) : ?>
			<form action="<?= base_url('Owner_controller/A_voucher/ubahvoucher'); ?>" method="post">
				<div class="form-group col-md-12">
                    Kode Voucher :
					<input type="hidden" name="id_voucher" value="<?= $a->id_voucher; ?>" class="form-control" required="required" placeholder="kode">
					<input type="text" name="kode_voucher" value="<?= $a->kode_voucher; ?>" class="form-control" required="required" placeholder="kode">
				</div>
				
				<div class="form-group col-md-3">
					Nama Voucher:
					<input type="text" name="nama_voucher" value="<?= $a->nama_voucher; ?>" class="form-control" required="required" placeholder="nama voucher">
				</div> 
				<div class="form-group col-md-3">
					Tanggal awal:
					<input type="date" name="tgl_awal" value="<?= $a->tgl_awal; ?>" class="form-control" required="required" placeholder="tanggal awak">
				</div> 
				<div class="form-group col-md-3">
					Tanggal Akhir:
					<input type="date" name="tgl_akhir" value="<?= $a->tgl_akhir; ?>" class="form-control" required="required" placeholder="tanggal akhir">
				</div> 
				<div class="form-group col-md-3">
					Total Voucher:
					<input   name="total_voucher" min="1" value="<?= $a->total_voucher; ?>" class="form-control" required="required" placeholder="total voucher">
				</div>
                <div class="form-group col-md-3">
					Minimum Belanja:
					<input   name="minimum_belanja" min="1" value="<?= $a->minimum_belanja; ?>" class="form-control" required="required" placeholder="minimum belanja">
				</div>
				<div class="form-group col-md-12">
					Keterangan:
					<textarea name="keterangan"  required="required" class="form-control" rows="8" placeholder="Keterangan"><?= $a->kode_voucher; ?></textarea>
				
				</div>        
				<div class="form-group col-md-12">
					<button type="submit" name="submit" class="btn btn-primary">
					<a href="##"><button type="button" value="batal" class="btn btn-primary">Batal</button></a>
				</div>
				</form>
		</div>
            <?php endforeach; ?>
	</div>
</div>
</div>
</div>