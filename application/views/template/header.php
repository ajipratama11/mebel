<header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.html"> <img src="<?= base_url() ?>vendor/mebel/img/logo.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('Dashboard/index'); ?>"">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       Kategori
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">

                                        <a class="dropdown-item" href="<?php echo base_url('Dashboard/kategori')?>">All</a>
                                        <?php foreach($kategori as $u){?>
                                  
                                    <a class="dropdown-item" href="<?php echo base_url('Dashboard/kategori/'.$u->id_kategori); ?>"><?php echo $u->nama_kategori ; ?></a>
                                  
                                    <?php } ?>
                                        
                                       
                                        
                                        
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Transaksi
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="<?php echo base_url('Transaksi'); ?>">Transaksi Anda</a>
                                        <!-- <a class="dropdown-item" href="tracking.html">tracking</a>
                                        <a class="dropdown-item" href="checkout.html">product checkout</a>
                                        <a class="dropdown-item" href="cart.html">shopping cart</a>
                                        <a class="dropdown-item" href="confirmation.html">confirmation</a>
                                        <a class="dropdown-item" href="elements.html">elements</a> -->
                                    </div>
                                </li>
                               <!--  <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('Dashboard/testimonial')?>">Testimonial</a>
                                </li> -->
                             <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Info
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="<?php echo base_url('Dashboard/contact')?>">contact</a>
                                        <a class="dropdown-item" href="<?php echo base_url('Dashboard/faq')?>">FAQ</a>
                                        
                                       
                                        
                                    </div>
                                </li>
                                <?php if($this->session->userdata('status') == "login"){ ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_2"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Hai, Aku <?php echo $this->session->userdata("namauser"); ?>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="<?php echo base_url('Logout'); ?>">Logout</a>
                                    </div>
                                </li>
                                <?php }else{ ?>
                                    <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('Landing_controller/Login') ?>">Login</a>
                                </li>
                                    <?php } ?>  
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex">
                            <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <!-- <a href=""><i class="ti-heart"></i></a> -->
                            <i style="margin-left: 10px; margin-top: 2px" class="fas fa-cart-plus"><a >  Keranjang : 
                            <?php $keranjang = $this->cart->total_items()  ?>
                                        <?php echo anchor('Dashboard/detail_keranjang', $keranjang)  ?>
                                        </a></i>
                            <!-- <div class="dropdown cart">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown3" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cart-plus"></i>
                                </a>
                                 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <div class="single_product">
    
                                    </div>
                                </div> 
                                
                            </div> -->
                            
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>