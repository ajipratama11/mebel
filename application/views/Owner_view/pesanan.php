<!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h2 style="color: #1E7BCB;">Detail Pesanan</h2><br>

                
                    

                    <div class="row">
  <div class="col-md-12">
<table class="table">

<?php foreach($pesanan as $a) { ?>
   
      <tr><th>Id pesanan</th>
        <td> <?= $a->id_pesan ?> </td>
      </tr>
      <tr><th>Jenis Pesanan</th>
        <td><?= $a->nama_kategori ?> </td>
      </tr>
      <tr><th>Kode Produk</th>
        <td><?= $a->id_produk ?></td>
      </tr>
       <tr><th>Jumlah</th>
        <td><?= $a->jumlah ?></td>
      </tr>
       <tr><th>P</th>
        <td><?= $a->panjang ?></td>
      </tr>
      <tr><th>L</th>
        <td><?= $a->lebar ?></td>
      </tr>
      <tr><th>T</th>
        <td><?= $a->tinggi ?></td>
      </tr>

      <tr><th>Total</th>
        <td><?= $a->total_pesan ?></td>
      </tr>
      <tr><th>Penambahan ukuran</th>
      <?php foreach($produk as $c) { ?>
        <?php 
        $p = $c->panjang1;
        $l = $c->lebar1;
        $t = $c->tinggi1;

        $p2 = $c->panjang2;
        $l2 = $c->lebar2;
        $t2 = $c->tinggi2;

        $p3 = $p-$p2;
        $l3 = $l-$l2;
        $t3 = $t-$t2;

        ?>
        <td>Panjang= <?= $p3 ?>,lebar= <?= $l3 ?>, tinggi= <?= $t3 ?></td>
      </tr>
      <?php }?>
       <tr><th>Gambar</th>  </tr>
       
       
      </table>  
      <div class="centered">
        <td><img style="margin-right: 20px;" height="250px" width="250px" src="<?php echo base_url('./assets/images/samping2/'.$a->gambar2); ?>" /></td>
        <td><img style="margin-right: 20px;" height="250px" width="250px" src="<?php echo base_url('./assets/images/depan/'.$a->gambar); ?>" /></td>
        <td><img height="250px" width="250px" src="<?php echo base_url('./assets/images/samping3/'.$a->gambar3); ?>" /></td>
        
      </div>
    <?php }?>
  





                 
                  <br><br>
                
        <!-- content-wrapper ends -->
</div>
</div>
</div>
</div>