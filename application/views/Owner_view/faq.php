<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                 <h2 style="color: #1E7BCB;">Bukti Pembayaran</h2><br>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #Id Bayar
                          </th>
                          <th>
                            <center>#Kode_pesan</center>
                          </th>
                          <th>
                            <center>Nama pemilik rekening</center>
                          </th>
                        
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($hfaq as $f) {?>
                        <tr>
                          <td class="font-weight-medium">
                            <?php echo $f->id_faq; ?>
                          </td>
                          <td>
                            <?php echo $f->nama; ?>
                          </td>
                          <td>
                            <?php echo $f->kritik; ?>
                          </td>
                     
                           
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
        
