<?php $this->load->view('template/head'); ?>

<body>
  <!--::header part start::-->
  <?php $this->load->view('template/header'); ?>
  <!-- Header part end-->


  <!--================Home Banner Area =================-->
  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Cart Products</h2>
              <p>Home <span>-</span>Cart Products</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Cart Area =================-->
  <section class="cart_area padding_top">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Kode Produk</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Sub Total</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $total_berat = 0;
              foreach ($this->cart->contents() as $items) :  ?>
                <tr>
                  <td>
                    <div class="media">
                      <!-- <div class="d-flex">
                      <img src="<?= base_url() ?>vendor/mebel/img/product/single-product/cart-1.jpg" alt="" />
                    </div> -->
                      <div class="media-body">
                        <p><?php echo $items['id'] ?></p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="media">
                      <!-- <div class="d-flex">
                      <img src="<?= base_url() ?>vendor/mebel/img/product/single-product/cart-1.jpg" alt="" />
                    </div> -->
                      <div class="media-body">
                        <p><?php echo $items['name'] ?></p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <h5>Rp. <?php $format_indonesia = number_format($items['price'], 0, ',', '.');
                            echo $format_indonesia ?>,00-</h5>
                  </td>
                  <td>
                    <div class="product_count">
                      <span class="input-number-decrement"> <i class="ti-angle-down"></i></span>
                      <h5><?php echo $items['qty'] ?><h5>
                          <span class="input-number-increment"> <i class="ti-angle-up"></i></span>
                    </div>
                  </td>
                  <td>
                    <h5>Rp. <?php $format_indonesia = number_format($items['subtotal'], 0, ',', '.');
                            echo $format_indonesia ?>,00-</h5>
                  </td>
                </tr>
              <?php endforeach; ?>
              <!-- <tr class="bottom_button">
                <td>
                  <a class="btn_1" href="#">Update Cart</a>
                </td>
                <td></td>
                <td></td>
                <td>
                  <div class="cupon_text float-right">
                    <a class="btn_1" href="#">Close Coupon</a>
                  </div>
                </td>
              </tr> -->
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <h5>Total</h5>
                </td>
                <td>
                  <h5>Rp. <?php $format_indonesia = number_format(($this->cart->total()), 0, ',', '.');
                          echo $format_indonesia  ?>,00-</h5>
                </td>
              </tr>
              <!-- <tr class="shipping_area">
                <td></td>
                <td></td>
                <td>
                  <h5>Shipping</h5>
                </td>
                <td>
                  <div class="shipping_box">
                    <ul class="list">
                      <li>
                        <a href="#">Flat Rate: $5.00</a>
                      </li>
                      <li>
                        <a href="#">Free Shipping</a>
                      </li>
                      <li>
                        <a href="#">Flat Rate: $10.00</a>
                      </li>
                      <li class="active">
                        <a href="#">Local Delivery: $2.00</a>
                      </li>
                    </ul>
                    <h6>
                      Calculate Shipping
                      <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </h6>
                    <select class="shipping_select">
                      <option value="1">Bangladesh</option>
                      <option value="2">India</option>
                      <option value="4">Pakistan</option>
                    </select>
                    <select class="shipping_select section_bg">
                      <option value="1">Select a State</option>
                      <option value="2">Select a State</option>
                      <option value="4">Select a State</option>
                    </select>
                    <input type="text" placeholder="Postcode/Zipcode" />
                    <a class="btn_1" href="#">Update Details</a>
                  </div>
                </td>
              </tr> -->
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="<?php echo base_url('Dashboard') ?>">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="<?php echo base_url('Dashboard/hapus_keranjang') ?>">Hapus Keranjang</a>
          </div>
        </div>
      </div>
      <?php foreach ($pelanggan as $a) { ?>
        <div class="billing_details">
          <div class="row">
            <div class="col-lg-8">
              <h3>Billing Details</h3>
              <form class="row contact_form" action="#" method="post" novalidate="novalidate">

                <div class="col-md-12 form-group">
                  <h5>Nama Penerima : </h5>
                  <input type="text" class="form-control" id="company" name="namapengirim" placeholder="nama Anda" value="<?php echo $a->nama_kostumer ?>" />
                </div>
                <div class="col-md-6 form-group p_star">
                  <h5>Nomor Telpon Penerima : </h5>
                  <input type="text" class="form-control" id="number" name="number" value="<?php echo $a->no_telp ?>" />
                </div>
                <div class="col-md-6 form-group p_star">
                  <h5>Kode Pos : </h5>
                  <input type="text" class="form-control" id="email" name="compemailany" />
                </div>
                <div class="col-md-12 form-group p_star">
                  <h5>Provinsi Tujuan : </h5>
                  <select class="country_select" name="propinsi_tujuan" id="propinsi_tujuan">
                    <option value="" selected="" disabled="">Pilih Provinsi</option>
                    <?php $this->load->view('rajaongkir/GetProvince'); ?>
                  </select>
                </div>
                <div class="col-md-12 form-group p_star">
                  <h5>Kabupaten/Kota Tujuan : </h5>
                  <select class="country_select" name="destination" id="destination">
                    <option value="" selected="" disabled="">Pilih Kota</option>
                  </select>
                </div>
                <div class="col-md-6 form-group p_star">
                  <h5>Kecamatan : </h5>
                  <input type="text" class="form-control" id="number" name="number" />
                </div>
                <div class="col-md-6 form-group p_star">
                  <h5>Desa/Dusun : </h5>
                  <input type="text" class="form-control" id="email" name="compemailany" />
                </div>
                <div class="col-md-6 form-group p_star">
                  <h5>Rt : </h5>
                  <input type="text" class="form-control" id="number" name="number" />
                </div>
                <div class="col-md-6 form-group p_star">
                  <h5>Rw : </h5>
                  <input type="text" class="form-control" id="email" name="compemailany" />
                </div>
                <!-- Alamat asli jember -->
                <div style="visibility: hidden;">
                  <select class="form-control" name="propinsi_asal" id="propinsi_asal" required="required">
                    <!-- <option value="" selected="" disabled="">Pilih Provinsi</option> -->
                    <?php $this->load->view('rajaongkir/GetProvince2'); ?>
                  </select>

                  <select class="form-control" name="origin" id="origin">
                    <?php $this->load->view('rajaongkir/GetCity'); ?>
                  </select>
                </div>

            </div>

          </div>
        </div>
      <?php } ?>
  </section>
  <!--================End Cart Area =================-->

  <!--::footer_part start::-->
  <?php $this->load->view('template/footer'); ?>
  <!--::footer_part end::-->

  <!-- jquery plugins here-->
  <?php $this->load->view('template/foot'); ?>
</body>
<script>
	function tampil_data(act) {
		var w = $('#origin').val();
		var x = $('#destination').val();
		var y = $('#berat').val();
		var z = $('#courier').val();
		var a = $('#namapengirim').val();
		var b = $('#kecamatan').val();
		var c = $('#desa').val();
		var d = $('#kodepos').val();
		var e = $('#telp').val();

		$.ajax({
			url: "../Rajaongkir/getCost",
			type: "GET",
			data: {
				origin: w,
				destination: x,
				berat: y,
				courier: z,
				namapengirim: a,
				kecamatan: b,
				desa: c,
				kodepos: d,
				telp: e
			},
			success: function(ajaxData) {
				//$('#tombol_export').show();
				//$('#hasilReport').show();
				$("#hasil").html(ajaxData);
			}
		});
	};
</script>
<script>
  $(document).ready(function() {

    $("#propinsi_asal").click(function() {
      $.post("<?php echo base_url(); ?>index.php/Landing/getCity/" + $('#propinsi_asal').val(), function(obj) {
        $('#origin').html(obj);
      });

    });

    $("#propinsi_tujuan").click(function() {
      $.post("<?php echo base_url(); ?>index.php/Landing/getCity/" + $('#propinsi_tujuan').val(), function(obj) {
        $('#destination').html(obj);
      });

    });

    /*
    $("#cari").click(function(){
    	$.post("<?php echo base_url(); ?>index.php/rajaongkir/getCost/"+$('#origin').val()+'&dest='+$('#destination').val()+'&berat='+$('#berat').val()+'&courier='+$('#courier').val(),function(obj){
    		$('#hasil').html(obj);
    	});
    });

    */


  });
</script>

</html>