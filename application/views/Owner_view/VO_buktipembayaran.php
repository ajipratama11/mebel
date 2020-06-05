<!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h2 style="color: #1E7BCB;">Bukti Transfer</h2><br>

                  <?php foreach($bayar as $a) : ?>

                    <h1><?php echo $a->kode_pesan ?></h1>
                    
                  <?php endforeach; ?>
                  <br><br>
                
        <!-- content-wrapper ends -->
