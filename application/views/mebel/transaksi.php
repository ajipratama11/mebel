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
                            <h2>Producta Checkout</h2>
                            <p>Home <span>-</span> Shop Single</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Checkout Area =================-->
    <section class="checkout_area padding_top">
       
    </section>
    <!--====== FOOTER PART START ======-->

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

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/JQuery.min.js"></script>

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