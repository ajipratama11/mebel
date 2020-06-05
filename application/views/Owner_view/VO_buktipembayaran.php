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




                      <p>
                      <tr><th>ID bayar    :   </th>
                        <td><?php echo $a->id_bayar?></td>
                      </tr>
                      </p>
                    <p>
                      <tr><th>Nama Pemilik    :    </th>
                        <td><?php echo $a->nama_pemilik ?></td>
                      </tr>
                       </p>
                       <p>
                      <tr><th>BANK    :    </th>
                        <td><?php echo $a->bank ?></td>
                      </tr>
                      </p>
                  
                    <img style="margin-bottom: 50px;" height="500px" width="500px" src="<?php echo base_url('./assets/images/'.$a->bukti_pembayaran); ?>"> 
                  <?php endforeach; ?>
                  <br><br>
                
        <!-- content-wrapper ends -->
