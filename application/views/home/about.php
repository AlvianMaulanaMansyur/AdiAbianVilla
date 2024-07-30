<div class="hotale-body-outer-wrapper">
  <div class="hotale-body-wrapper clearfix hotale-with-transparent-header hotale-with-frame">
    <div class="hotale-header-background-transparent">
      <div class="hotale-top-bar">
        <div class="hotale-top-bar-background"></div>
        <div class="hotale-top-bar-container hotale-container">
          <div class="hotale-top-bar-container-inner clearfix">
            <div class="hotale-top-bar-left hotale-item-pdlr">
              <div class="hotale-top-bar-left-text">
                <a href="<?= base_url('tamu') ?>" class="mt-4 mb-2 text-2xl" style="color: #ffffff;"><i class="fa-solid fa-user pr-2 text-2xl" style="color: #ffffff;"></i><?= $username; ?></a>
              </div>
            </div>
            <div class="hotale-top-bar-right hotale-item-pdlr">
              <div class="tourmaster-user-top-bar tourmaster-guest tourmaster-style-2" data-redirect="index.html" data-ajax-url="#">
                <?php if (!empty($this->session->userdata('identity'))) : ?>
                  <div class="flex">
                    <a class="tourmaster-user-top-bar-login " href="<?= base_url('c_home/logout'); ?>">logout</a>
                  </div>
                <?php else : ?>
                  <a class="tourmaster-user-top-bar-login" href="<?= base_url('Auth/login') ?>">Login</a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <header class="hotale-header-wrap hotale-header-style-plain hotale-style-center-menu hotale-sticky-navigation hotale-style-slide" data-navigation-offset="75">
        <div class="hotale-header-background"></div>
        <div class="hotale-header-container hotale-container">
          <div class="hotale-header-container-inner clearfix">
            <div class="hotale-logo hotale-item-pdlr">
              <div class="hotale-logo-inner">
                <a class="hotale-fixed-nav-logo" href="<?php echo base_url('home') ?>">
                  <img src="<?php echo base_url('asset/images/logog.png') ?>" alt="" width="147" height="37" title="logo-nx1" />
                </a>
                <a class="hotale-orig-logo" href="<?php echo base_url('home') ?>">
                  <img src="<?php echo base_url('asset/images/logog.png') ?>" alt="" width="147" height="37" title="logo-nx1" />
                </a>
              </div>
            </div>
            <div class="hotale-navigation hotale-item-pdlr clearfix">
              <div class="hotale-main-menu" id="hotale-main-menu">
                <ul id="menu-main-navigation-1" class="sf-menu">
                  <li class="menu-item menu-item-home menu-item-has-children hotale-normal-menu">
                    <a href="<?php echo base_url('home') ?>" class="sf-with-ul-pre">Home</a>
                  </li>

                  <li class="menu-item menu-item-has-children hotale-normal-menu">
                    <a href="<?php echo base_url('about') ?>" class="sf-with-ul-pre">About Us</a>
                  </li>
                  <li class="menu-item hotale-normal-menu">
                    <a href="<?php echo base_url('home#villa_facilities') ?>">Facilities</a>
                  </li>
                  <li class="menu-item menu-item-has-children hotale-normal-menu">
                    <a href="<?php echo base_url('pesanan') ?>" class="sf-with-ul-pre">Reservation</a>
                  </li>
                  <li class="menu-ite hotale-normal-menu"><a href="<?php echo base_url('contact') ?>" class="sf-with-ul-pre">Contact</a></li>
                  <!-- <li class="menu-ite hotale-normal-menu"><a href="<?php echo base_url('') ?>" class="sf-with-ul-pre"><i class="fa-solid fa-user"></i></a></li> -->
                </ul>
                <div class="hotale-navigation-slide-bar hotale-navigation-slide-bar-style-2 hotale-left" data-size-offset="0" data-width="19px" id="hotale-navigation-slide-bar"></div>
              </div>
              <div class="hotale-main-menu-right-wrap clearfix hotale-item-mglr hotale-navigation-top">
                <div class="tourmaster-room-navigation-checkout-wrap">
                  <div class="tourmaster-room-cart-item-wrap">
                    <div class="tourmaster-room-cart-items">
                      <ul></ul>
                      <a class="tourmaster-checkout-button" href="#">Check Out</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- hotale-navigation -->
          </div>
          <!-- hotale-header-inner -->
        </div>
        <!-- hotale-header-container -->
      </header>
      <!-- header -->
    </div>

    <div class="hotale-page-wrapper" id="hotale-page-wrapper">
      <div class="tourmaster-room-single-header-title-wrap" style="border-radius: 20px 20px 20px 20px; -moz-border-radius: 20px 20px 20px 20px; -webkit-border-radius: 20px 20px 20px 20px;">
        <div class="tourmaster-room-single-header-background-overlay"></div>
        <div class="tourmaster-container">
          <h1 class="tourmaster-item-pdlr">About Us</h1>
        </div>
      </div>
    </div>
    <main class="container mx-auto px-4 py-8">
        <div class="bg-white p-6 rounded shadow-md">
            <h2 class="text-2xl font-semibold mb-4">Adi Abian Villa</h2>
            <p class="mb-4">
            Welcome to Adi Abian Villa, a charming 3-star villa nestled in the serene area of Pecatu, Bali. Our villa offers a perfect blend of traditional Balinese architecture and modern comforts, ensuring an unforgettable stay for our guests.
            </p>
            <h2 class="text-2xl font-semibold mb-4">Location</h2>
            <p class="mb-4">
            Located in the tranquil region of Pecatu, Adi Abian Villa provides a peaceful retreat away from the hustle and bustle of city life. Surrounded by lush greenery and picturesque landscapes, our villa is the ideal destination for those seeking relaxation and rejuvenation. Despite its serene setting, Adi Abian Villa is conveniently close to some of Bali's most famous attractions, including the stunning Uluwatu Temple and the beautiful beaches of Bingin and Padang Padang.
            </p>
            <h2 class="text-2xl font-semibold mb-4">Accommodations</h2>
            <p class="mb-4">
            Adi Abian Villa features elegantly designed rooms that blend traditional Balinese décor with contemporary amenities. Each room is equipped with comfortable bedding, air conditioning, a private bathroom, and complimentary Wi-Fi. Our accommodations are designed to provide a cozy and restful environment for our guests, ensuring a comfortable and memorable stay.
            </p>
            <h2 class="text-2xl font-semibold mb-4">Experiences</h2>
            <p class="mb-4">
            At Adi Abian Villa, we pride ourselves on delivering exceptional hospitality and personalized service. Whether you are here for a romantic getaway, a family vacation, or a solo retreat, our dedicated team is committed to making your stay as enjoyable and comfortable as possible.
            </p>
            <p class="mb-4">
            Discover the beauty and tranquility of Pecatu, Bali, and experience the warm hospitality of Adi Abian Villa. We look forward to welcoming you and creating unforgettable memories together.
            </p>
        </div>
    </main>
    
    <!-- Back button -->
    <div class="container mx-auto px-4 py-4 text-center">
        <a href="javascript:history.back()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Back To Home</a>
    </div>

  </div>
  <footer>
        <div class="hotale-footer-wrapper">
            <div class="hotale-footer-container hotale-container clearfix">
                <div class="hotale-footer-column hotale-item-pdlr hotale-column-15">
                    <div id="block-21" class="widget widget_block widget_media_image hotale-widget">
                        <figure class="wp-block-image">
                            <img loading="lazy" width="110" height="27" src="<?php echo base_url('asset/images/adibian.png') ?>" alt="" class="wp-image-14995" />
                        </figure>
                    </div>
                    <div id="block-7" class="widget widget_block widget_text hotale-widget">
                        <p></p>
                    </div>
                    <!-- <div id="block-8" class="widget widget_block hotale-widget">
                        <p>
                            <span class="gdlr-core-space-shortcode" style="margin-top: -10px;"></span>
                            <i class="fa fa-phone" style="font-size: 16px; color: #ffffff; margin-left: 3px; margin-right: 17px;"></i>
                            <i class="fa fa-envelope-o" style="font-size: 16px; color: #ffffff; margin-left: 3px; margin-right: 17px;"></i>
                            <i class="fa5b fa-instagram" style="font-size: 16px; color: #ffffff; margin-left: 3px; margin-right: 17px;"></i>
                        </p>
                    </div> -->
                    <div id="block-22" class="widget widget_block widget_text hotale-widget">
                        <p></p>
                    </div>
                </div>
                <div class="hotale-footer-column hotale-item-pdlr hotale-column-15">
                    <div id="block-10" class="widget widget_block hotale-widget">
                        <h4>Contact</h4>
                    </div>
                    <div id="block-14" class="widget widget_block hotale-widget">
                        <p><span style="color: #ffffff;">Telephone</span><a href="https://wa.me/6285739481215">: +62-816-470-0311</a></p>
                        <p><span class="gdlr-core-space-shortcode" style="margin-top: -10px;"></span></p>
                        <p><span style="color: #ffffff;">Email</span>: <a href="#">adiabian1@gmail.com</a></p>
                        <p><span class="gdlr-core-space-shortcode" style="margin-top: -10px;"></span></p>
                        <p><span style="color: #ffffff;">Instagram</span>: <a href="https://www.instagram.com/adiabianvi?igsh=dmZ2cTVnMmI2bGd4">@adiabianvi</a></p>
                    </div>
                </div>
                <div class="hotale-footer-column hotale-item-pdlr hotale-column-15">
                    <div id="block-12" class="widget widget_block hotale-widget">
                        <h4>Villa Address</h4>
                    </div>
                    <div id="block-15" class="widget widget_block hotale-widget">
                        <p>
                            <span style="color: #ffffff;">
                                Jl. Raya Uluwatu Pecatu<br />
                                No.108, Pecatu, Kec. Kuta Sel.<br />
                                Kabupaten Badung, Bali 80361.
                            </span>
                        </p>
                    </div>
                </div>
                <div class="hotale-footer-column hotale-item-pdlr hotale-column-15">
                    <div id="block-18" class="widget widget_block widget_media_image hotale-widget">
                        <div class="wp-block-image">
                            <figure class="aligncenter size-full">
                                <img loading="lazy" width="213" height="90" src="<?php echo base_url('asset/images/puter.png') ?>" alt="" class="wp-image-15004" />
                            </figure>
                        </div>
                    </div>
                    <div id="block-20" class="widget widget_block widget_media_image hotale-widget">
                        <div class="wp-block-image">
                            <figure class="aligncenter is-resized">
                                <img loading="lazy" width="154" height="26" src="<?php echo base_url('asset/images/pisa.png') ?>" alt="" class="wp-image-15004" />
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hotale-copyright-wrapper">
            <div class="hotale-copyright-container hotale-container clearfix">
                <div class="hotale-copyright-left hotale-item-pdlr">
                    <div style="text-transform: uppercase; font-weight: 500; font-size: 13px; letter-spacing: 3px;">
                    <a href="<?php echo base_url('home') ?>" style="margin-right: 22px;">Home</a>
            <a href="<?php echo base_url('about') ?>" style="margin-right: 22px;">About</a>
            <a href="<?php echo base_url('contact') ?>" style="margin-right: 22px;">Contact</a>
                    </div>
                </div>
                <div class="hotale-copyright-right hotale-item-pdlr">Copyright © Tim Vian. PBL 2024.</div>
            </div>
        </div>
    </footer>
</div>
</div>
