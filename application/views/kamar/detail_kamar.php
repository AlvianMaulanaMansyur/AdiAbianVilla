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
                                            <a class="tourmaster-user-top-bar-login " href="<?= base_url('c_home/logout');?>">logout</a>
                                        </div>
                                    <?php else : ?>
                                        <a class="tourmaster-user-top-bar-login" href="<?= base_url('Auth/login')?>">Login</a>
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
                                    <a class="hotale-fixed-nav-logo" href="<?php echo base_url('c_home') ?>">
                                        <img src="<?php echo base_url('asset/images/logog.png') ?>" alt="" width="147" height="37" title="logo-nx1" />
                                    </a>
                                    <a class="hotale-orig-logo" href="<?php echo base_url('c_home') ?>">
                                        <img src="<?php echo base_url('asset/images/logog.png') ?>" alt="" width="147" height="37" title="logo-nx1" />
                                    </a>
                                </div>
                            </div>
                            <div class="hotale-navigation hotale-item-pdlr clearfix">
                                <div class="hotale-main-menu" id="hotale-main-menu">
                                    <ul id="menu-main-navigation-1" class="sf-menu">
                                        <li class="menu-item menu-item-home menu-item-has-children hotale-normal-menu">
                                            <a href="<?php echo base_url('c_home') ?>" class="sf-with-ul-pre">Home</a>
                                        </li>

                                        <li class="menu-item menu-item-has-children hotale-normal-menu">
                                            <a href="<?php echo base_url('c_home/aboutus') ?>" class="sf-with-ul-pre">About Us</a>
                                        </li>
                                        <li class="menu-item hotale-normal-menu">
                                            <a href="<?php echo base_url('c_home#villa_facilites') ?>">Facilities</a>
                                        </li>
                                        <li class="menu-item current-menu-item menu-item-has-children hotale-normal-menu">
                                            <a href="<?php echo base_url('kamar') ?>" class="sf-with-ul-pre">Reservation</a>

                                        </li>
                                        <li class="menu-ite hotale-normal-menu"><a href="<?php echo base_url('c_home#villa_contact') ?>" class="sf-with-ul-pre">Contact</a></li>
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
                        <h1 class="tourmaster-item-pdlr">Deluxe Suite Room</h1>
                    </div>
                </div>
                <div class="gdlr-core-page-builder-body">
                    <div class="gdlr-core-pbf-sidebar-wrapper gdlr-core-sticky-sidebar gdlr-core-js" id="gdlr-core-sidebar-wrapper-1">
                        <div class="gdlr-core-pbf-sidebar-container gdlr-core-line-height-0 clearfix gdlr-core-js gdlr-core-container">
                            <div class="gdlr-core-pbf-sidebar-content gdlr-core-pbf-sidebar-padding gdlr-core-line-height gdlr-core-column-extend-left">
                                <div class="gdlr-core-pbf-sidebar-content-inner">
                                    <div class="gdlr-core-pbf-column gdlr-core-column-first">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js">
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-image-item gdlr-core-item-pdb gdlr-core-center-align gdlr-core-item-pdlr">
                                                        <div class="gdlr-core-image-item-wrap gdlr-core-media-image gdlr-core-image-item-style-round" style="border-width: 0px; border-radius: 20px; -moz-border-radius: 20px; -webkit-border-radius: 20px;">
                                                            <img src="<?php echo base_url('asset/images/ab3.jpg') ?>" alt="" width="1150" height="490" title="christopher-jolly-GqbU78bdJFM-unsplash" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-60 gdlr-core-column-first" id="gdlr-core-column-1">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js" style="margin: 0px 0px 0px 0px; padding: 10px 0px 20px 0px;">
                                            <div class="gdlr-core-pbf-background-wrap"></div>
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="tourmaster-room-title-item tourmaster-item-mglr tourmaster-item-pdb clearfix" style="padding-bottom: 35px;">
                                                        <h3 class="tourmaster-room-title-item-title">Deluxe Suite Room</h3>
                                                        <div class="tourmaster-room-title-item-caption">Room Features</div>
                                                        <div class="tourmaster-room-title-price">
                                                            <div class="tourmaster-head">
                                                                <span class="tourmaster-label">From</span><span class="tourmaster-price"> <?php echo 'Rp' . number_format($harga, 0, ',', '.'); ?></span>
                                                            </div>
                                                            <div class="tourmaster-tail">per night</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align">
                                                        <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-20 gdlr-core-column-first" id="gdlr-core-column-2">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js">
                                            <div class="gdlr-core-pbf-background-wrap"></div>
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-column-service-item gdlr-core-item-pdb gdlr-core-left-align gdlr-core-column-service-icon-left gdlr-core-with-caption gdlr-core-item-pdlr" style="padding-bottom: 20px;">
                                                        <div class="gdlr-core-column-service-media gdlr-core-media-icon">
                                                            <i class="gdlr-icon-double-bed2" style="font-size: 33px; line-height: 33px; width: 33px; color: #0a0a0a;"></i>
                                                        </div>
                                                        <div class="gdlr-core-column-service-content-wrapper">
                                                            <div class="gdlr-core-column-service-title-wrap">
                                                                <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 19px; font-weight: 600; text-transform: none;">Bed</h3>
                                                                <div class="gdlr-core-column-service-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 17px; font-weight: 500; font-style: normal; margin-top: 0px;">
                                                                    1 King Bed
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-20" id="gdlr-core-column-3">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js">
                                            <div class="gdlr-core-pbf-background-wrap"></div>
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-column-service-item gdlr-core-item-pdb gdlr-core-left-align gdlr-core-column-service-icon-left gdlr-core-with-caption gdlr-core-item-pdlr" style="padding-bottom: 20px;">
                                                        <div class="gdlr-core-column-service-media gdlr-core-media-icon" style="margin-top: 0px; margin-right: 26px;">
                                                            <i class="gdlr-icon-group" style="font-size: 40px; line-height: 40px; width: 40px; color: #0a0a0a;"></i>
                                                        </div>
                                                        <div class="gdlr-core-column-service-content-wrapper">
                                                            <div class="gdlr-core-column-service-title-wrap">
                                                                <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 19px; font-weight: 600; text-transform: none;">Max Guest</h3>
                                                                <div class="gdlr-core-column-service-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 17px; font-weight: 500; font-style: normal; margin-top: 0px;">
                                                                    3 Guests
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-20">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js">
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js"></div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-20 gdlr-core-column-first" id="gdlr-core-column-4">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js">
                                            <div class="gdlr-core-pbf-background-wrap"></div>
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-column-service-item gdlr-core-item-pdb gdlr-core-left-align gdlr-core-column-service-icon-left gdlr-core-with-caption gdlr-core-item-pdlr" style="padding-bottom: 20px;">
                                                        <div class="gdlr-core-column-service-media gdlr-core-media-icon"><i class="gdlr-icon-resize" style="font-size: 34px; line-height: 34px; width: 34px; color: #0a0a0a;"></i></div>
                                                        <div class="gdlr-core-column-service-content-wrapper">
                                                            <div class="gdlr-core-column-service-title-wrap">
                                                                <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 19px; font-weight: 600; text-transform: none;">Room Space</h3>
                                                                <div class="gdlr-core-column-service-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 17px; font-weight: 500; font-style: normal; margin-top: 0px;">
                                                                    30 sqm.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-20" id="gdlr-core-column-5">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js">
                                            <div class="gdlr-core-pbf-background-wrap"></div>
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-column-service-item gdlr-core-item-pdb gdlr-core-left-align gdlr-core-column-service-icon-left gdlr-core-with-caption gdlr-core-item-pdlr" style="padding-bottom: 20px;">
                                                        <div class="gdlr-core-column-service-media gdlr-core-media-icon" style="margin-right: 27px;">
                                                            <i class="gdlr-icon-nature" style="font-size: 37px; line-height: 37px; width: 37px; color: #0a0a0a;"></i>
                                                        </div>
                                                        <div class="gdlr-core-column-service-content-wrapper">
                                                            <div class="gdlr-core-column-service-title-wrap">
                                                                <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 19px; font-weight: 600; text-transform: none;">Room View</h3>
                                                                <div class="gdlr-core-column-service-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 17px; font-weight: 500; font-style: normal; margin-top: 0px;">
                                                                    Forest View
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-20">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js">
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js"></div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-60 gdlr-core-column-first" id="gdlr-core-column-6">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js" style="padding: 10px 0px 0px 0px;">
                                            <div class="gdlr-core-pbf-background-wrap"></div>
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align">
                                                        <div class="gdlr-core-text-box-item-content" style="font-size: 18px; text-transform: none;">
                                                            <p>
                                                                Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the
                                                                coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country,
                                                                in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day
                                                                however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.
                                                            </p>
                                                            <p>
                                                                The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She
                                                                packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on
                                                                the skyline of her hometown
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-60 gdlr-core-column-first" id="gdlr-core-column-7">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js" style="margin: 0px 0px 0px 0px; padding: 0px 0px 25px 0px;">
                                            <div class="gdlr-core-pbf-background-wrap"></div>
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align">
                                                        <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-60 gdlr-core-column-first">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js">
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 40px;">
                                                        <div class="gdlr-core-title-item-title-wrap">
                                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title class-test" style="font-size: 25px; font-weight: 500; letter-spacing: 0px; text-transform: none;">
                                                                Room Amenities<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-20 gdlr-core-column-first" id="gdlr-core-column-8">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js gdlr-core-move-up-with-shadow" style="margin: 0px 10px 20px 20px; padding: 25px 0px 0px 10px; border-radius: 20px 20px 20px 20px; -moz-border-radius: 20px 20px 20px 20px; -webkit-border-radius: 20px 20px 20px 20px;">
                                            <div class="gdlr-core-pbf-background-wrap" style="
                                                    border-radius: 20px 20px 20px 20px;
                                                    -moz-border-radius: 20px 20px 20px 20px;
                                                    -webkit-border-radius: 20px 20px 20px 20px;
                                                    border-width: 1px 1px 1px 1px;
                                                    border-color: #e5e5e5;
                                                    border-style: solid;
                                                "></div>
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 10px;">
                                                        <div class="gdlr-core-title-item-left-icon" style="margin: -12px 16px 0px 0px; font-size: 35px;"><i class="gdlr-icon-watch-tv" style="color: #1e1e1e;"></i></div>
                                                        <div class="gdlr-core-title-item-left-icon-wrap">
                                                            <div class="gdlr-core-title-item-title-wrap">
                                                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title class-test" style="font-size: 17px; font-weight: 500; letter-spacing: 0px; text-transform: none; color: #848484;">
                                                                    TV<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-20" id="gdlr-core-column-9">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js gdlr-core-move-up-with-shadow" style="margin: 0px 10px 20px 10px; padding: 25px 0px 0px 10px; border-radius: 20px 20px 20px 20px; -moz-border-radius: 20px 20px 20px 20px; -webkit-border-radius: 20px 20px 20px 20px;">
                                            <div class="gdlr-core-pbf-background-wrap" style="
                                                    border-radius: 20px 20px 20px 20px;
                                                    -moz-border-radius: 20px 20px 20px 20px;
                                                    -webkit-border-radius: 20px 20px 20px 20px;
                                                    border-width: 1px 1px 1px 1px;
                                                    border-color: #e5e5e5;
                                                    border-style: solid;
                                                "></div>
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 10px;">
                                                        <div class="gdlr-core-title-item-left-icon" style="margin: -12px 15px 0px 0px; font-size: 35px;"><i class="gdlr-icon-wifi-signal" style="color: #1e1e1e;"></i></div>
                                                        <div class="gdlr-core-title-item-left-icon-wrap">
                                                            <div class="gdlr-core-title-item-title-wrap">
                                                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title class-test" style="font-size: 17px; font-weight: 500; letter-spacing: 0px; text-transform: none; color: #848484;">
                                                                    Free Wifi<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-20" id="gdlr-core-column-10">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js gdlr-core-move-up-with-shadow" style="margin: 0px 20px 20px 10px; padding: 25px 0px 0px 10px; border-radius: 20px 20px 20px 20px; -moz-border-radius: 20px 20px 20px 20px; -webkit-border-radius: 20px 20px 20px 20px;">
                                            <div class="gdlr-core-pbf-background-wrap" style="
                                                    border-radius: 20px 20px 20px 20px;
                                                    -moz-border-radius: 20px 20px 20px 20px;
                                                    -webkit-border-radius: 20px 20px 20px 20px;
                                                    border-width: 1px 1px 1px 1px;
                                                    border-color: #e5e5e5;
                                                    border-style: solid;
                                                "></div>
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 10px;">
                                                        <div class="gdlr-core-title-item-left-icon" style="margin: -12px 15px 0px 0px; font-size: 35px;"><i class="gdlr-icon-safe-box1" style="color: #1e1e1e;"></i></div>
                                                        <div class="gdlr-core-title-item-left-icon-wrap">
                                                            <div class="gdlr-core-title-item-title-wrap">
                                                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title class-test" style="font-size: 17px; font-weight: 500; letter-spacing: 0px; text-transform: none; color: #848484;">
                                                                    Safe<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-20 gdlr-core-column-first" id="gdlr-core-column-11">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js gdlr-core-move-up-with-shadow" style="margin: 0px 10px 20px 20px; padding: 25px 0px 0px 10px; border-radius: 20px 20px 20px 20px; -moz-border-radius: 20px 20px 20px 20px; -webkit-border-radius: 20px 20px 20px 20px;">
                                            <div class="gdlr-core-pbf-background-wrap" style="
                                                    border-radius: 20px 20px 20px 20px;
                                                    -moz-border-radius: 20px 20px 20px 20px;
                                                    -webkit-border-radius: 20px 20px 20px 20px;
                                                    border-width: 1px 1px 1px 1px;
                                                    border-color: #e5e5e5;
                                                    border-style: solid;
                                                "></div>
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 10px;">
                                                        <div class="gdlr-core-title-item-left-icon" style="margin: -12px 16px 0px 0px; font-size: 35px;"><i class="gdlr-icon-shower" style="color: #1e1e1e;"></i></div>
                                                        <div class="gdlr-core-title-item-left-icon-wrap">
                                                            <div class="gdlr-core-title-item-title-wrap">
                                                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title class-test" style="font-size: 17px; font-weight: 500; letter-spacing: 0px; text-transform: none; color: #848484;">
                                                                    None Smoking<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-20" id="gdlr-core-column-12">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js gdlr-core-move-up-with-shadow" style="margin: 0px 10px 20px 10px; padding: 25px 0px 0px 10px; border-radius: 20px 20px 20px 20px; -moz-border-radius: 20px 20px 20px 20px; -webkit-border-radius: 20px 20px 20px 20px;">
                                            <div class="gdlr-core-pbf-background-wrap" style="
                                                    border-radius: 20px 20px 20px 20px;
                                                    -moz-border-radius: 20px 20px 20px 20px;
                                                    -webkit-border-radius: 20px 20px 20px 20px;
                                                    border-width: 1px 1px 1px 1px;
                                                    border-color: #e5e5e5;
                                                    border-style: solid;
                                                "></div>
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 10px;">
                                                        <div class="gdlr-core-title-item-left-icon" style="margin: -12px 15px 0px 0px; font-size: 35px;"><i class="gdlr-icon-air-conditioner1" style="color: #1e1e1e;"></i></div>
                                                        <div class="gdlr-core-title-item-left-icon-wrap">
                                                            <div class="gdlr-core-title-item-title-wrap">
                                                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title class-test" style="font-size: 17px; font-weight: 500; letter-spacing: 0px; text-transform: none; color: #848484;">
                                                                    Air Conditioning<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-20" id="gdlr-core-column-13">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js gdlr-core-move-up-with-shadow" style="margin: 0px 20px 20px 10px; padding: 25px 0px 0px 10px; border-radius: 20px 20px 20px 20px; -moz-border-radius: 20px 20px 20px 20px; -webkit-border-radius: 20px 20px 20px 20px;">
                                            <div class="gdlr-core-pbf-background-wrap" style="
                                                    border-radius: 20px 20px 20px 20px;
                                                    -moz-border-radius: 20px 20px 20px 20px;
                                                    -webkit-border-radius: 20px 20px 20px 20px;
                                                    border-width: 1px 1px 1px 1px;
                                                    border-color: #e5e5e5;
                                                    border-style: solid;
                                                "></div>
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 10px;">
                                                        <div class="gdlr-core-title-item-left-icon" style="margin: -12px 15px 0px 0px; font-size: 35px;"><i class="gdlr-icon-oil-heater-1" style="color: #1e1e1e;"></i></div>
                                                        <div class="gdlr-core-title-item-left-icon-wrap">
                                                            <div class="gdlr-core-title-item-title-wrap">
                                                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title class-test" style="font-size: 17px; font-weight: 500; letter-spacing: 0px; text-transform: none; color: #848484;">
                                                                    Heater<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-20 gdlr-core-column-first" id="gdlr-core-column-14">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js gdlr-core-move-up-with-shadow" style="margin: 0px 10px 20px 20px; padding: 25px 0px 0px 10px; border-radius: 20px 20px 20px 20px; -moz-border-radius: 20px 20px 20px 20px; -webkit-border-radius: 20px 20px 20px 20px;">
                                            <div class="gdlr-core-pbf-background-wrap" style="
                                                    border-radius: 20px 20px 20px 20px;
                                                    -moz-border-radius: 20px 20px 20px 20px;
                                                    -webkit-border-radius: 20px 20px 20px 20px;
                                                    border-width: 1px 1px 1px 1px;
                                                    border-color: #e5e5e5;
                                                    border-style: solid;
                                                "></div>
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 10px;">
                                                        <div class="gdlr-core-title-item-left-icon" style="margin: -12px 16px 0px 0px; font-size: 35px;"><i class="gdlr-icon-telephone" style="color: #1e1e1e;"></i></div>
                                                        <div class="gdlr-core-title-item-left-icon-wrap">
                                                            <div class="gdlr-core-title-item-title-wrap">
                                                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title class-test" style="font-size: 17px; font-weight: 500; letter-spacing: 0px; text-transform: none; color: #848484;">
                                                                    Phone<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-20" id="gdlr-core-column-15">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js gdlr-core-move-up-with-shadow" style="margin: 0px 10px 20px 10px; padding: 25px 0px 0px 10px; border-radius: 20px 20px 20px 20px; -moz-border-radius: 20px 20px 20px 20px; -webkit-border-radius: 20px 20px 20px 20px;">
                                            <div class="gdlr-core-pbf-background-wrap" style="
                                                    border-radius: 20px 20px 20px 20px;
                                                    -moz-border-radius: 20px 20px 20px 20px;
                                                    -webkit-border-radius: 20px 20px 20px 20px;
                                                    border-width: 1px 1px 1px 1px;
                                                    border-color: #e5e5e5;
                                                    border-style: solid;
                                                "></div>
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 10px;">
                                                        <div class="gdlr-core-title-item-left-icon" style="margin: -12px 15px 0px 0px; font-size: 35px;"><i class="gdlr-icon-hair-dryer1" style="color: #1e1e1e;"></i></div>
                                                        <div class="gdlr-core-title-item-left-icon-wrap">
                                                            <div class="gdlr-core-title-item-title-wrap">
                                                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title class-test" style="font-size: 17px; font-weight: 500; letter-spacing: 0px; text-transform: none; color: #848484;">
                                                                    Hair Dryer<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-60 gdlr-core-column-first" id="gdlr-core-column-16">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js" style="margin: 0px 0px 0px 0px; padding: 45px 0px 0px 0px;">
                                            <div class="gdlr-core-pbf-background-wrap"></div>
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 40px;">
                                                        <div class="gdlr-core-title-item-title-wrap">
                                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title class-test" style="font-size: 25px; font-weight: 500; letter-spacing: 0px; text-transform: none;">
                                                                Hotel Amenities<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-20 gdlr-core-column-first" id="gdlr-core-column-17">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js gdlr-core-move-up-with-shadow" style="margin: 0px 10px 20px 20px; padding: 25px 0px 0px 10px; border-radius: 20px 20px 20px 20px; -moz-border-radius: 20px 20px 20px 20px; -webkit-border-radius: 20px 20px 20px 20px;">
                                            <div class="gdlr-core-pbf-background-wrap" style="
                                                    border-radius: 20px 20px 20px 20px;
                                                    -moz-border-radius: 20px 20px 20px 20px;
                                                    -webkit-border-radius: 20px 20px 20px 20px;
                                                    border-width: 1px 1px 1px 1px;
                                                    border-color: #e5e5e5;
                                                    border-style: solid;
                                                "></div>
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 10px;">
                                                        <div class="gdlr-core-title-item-left-icon" style="margin: -12px 16px 0px 0px; font-size: 35px;"><i class="gdlr-icon-weights" style="color: #1e1e1e;"></i></div>
                                                        <div class="gdlr-core-title-item-left-icon-wrap">
                                                            <div class="gdlr-core-title-item-title-wrap">
                                                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title class-test" style="font-size: 17px; font-weight: 500; letter-spacing: 0px; text-transform: none; color: #848484;">
                                                                    Gym<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-20" id="gdlr-core-column-18">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js gdlr-core-move-up-with-shadow" style="margin: 0px 10px 20px 10px; padding: 25px 0px 0px 10px; border-radius: 20px 20px 20px 20px; -moz-border-radius: 20px 20px 20px 20px; -webkit-border-radius: 20px 20px 20px 20px;">
                                            <div class="gdlr-core-pbf-background-wrap" style="
                                                    border-radius: 20px 20px 20px 20px;
                                                    -moz-border-radius: 20px 20px 20px 20px;
                                                    -webkit-border-radius: 20px 20px 20px 20px;
                                                    border-width: 1px 1px 1px 1px;
                                                    border-color: #e5e5e5;
                                                    border-style: solid;
                                                "></div>
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 10px;">
                                                        <div class="gdlr-core-title-item-left-icon" style="margin: -12px 15px 0px 0px; font-size: 35px;"><i class="gdlr-icon-parking" style="color: #1e1e1e;"></i></div>
                                                        <div class="gdlr-core-title-item-left-icon-wrap">
                                                            <div class="gdlr-core-title-item-title-wrap">
                                                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title class-test" style="font-size: 17px; font-weight: 500; letter-spacing: 0px; text-transform: none; color: #848484;">
                                                                    Parking<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-20" id="gdlr-core-column-19">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js gdlr-core-move-up-with-shadow" style="margin: 0px 20px 20px 10px; padding: 25px 0px 0px 10px; border-radius: 20px 20px 20px 20px; -moz-border-radius: 20px 20px 20px 20px; -webkit-border-radius: 20px 20px 20px 20px;">
                                            <div class="gdlr-core-pbf-background-wrap" style="
                                                    border-radius: 20px 20px 20px 20px;
                                                    -moz-border-radius: 20px 20px 20px 20px;
                                                    -webkit-border-radius: 20px 20px 20px 20px;
                                                    border-width: 1px 1px 1px 1px;
                                                    border-color: #e5e5e5;
                                                    border-style: solid;
                                                "></div>
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 10px;">
                                                        <div class="gdlr-core-title-item-left-icon" style="margin: -12px 15px 0px 0px; font-size: 35px;"><i class="gdlr-icon-massage" style="color: #1e1e1e;"></i></div>
                                                        <div class="gdlr-core-title-item-left-icon-wrap">
                                                            <div class="gdlr-core-title-item-title-wrap">
                                                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title class-test" style="font-size: 17px; font-weight: 500; letter-spacing: 0px; text-transform: none; color: #848484;">
                                                                    Spa<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-20 gdlr-core-column-first" id="gdlr-core-column-20">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js gdlr-core-move-up-with-shadow" style="margin: 0px 10px 20px 20px; padding: 25px 0px 0px 10px; border-radius: 20px 20px 20px 20px; -moz-border-radius: 20px 20px 20px 20px; -webkit-border-radius: 20px 20px 20px 20px;">
                                            <div class="gdlr-core-pbf-background-wrap" style="
                                                    border-radius: 20px 20px 20px 20px;
                                                    -moz-border-radius: 20px 20px 20px 20px;
                                                    -webkit-border-radius: 20px 20px 20px 20px;
                                                    border-width: 1px 1px 1px 1px;
                                                    border-color: #e5e5e5;
                                                    border-style: solid;
                                                "></div>
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 10px;">
                                                        <div class="gdlr-core-title-item-left-icon" style="margin: -12px 16px 0px 0px; font-size: 35px;"><i class="gdlr-icon-dish" style="color: #1e1e1e;"></i></div>
                                                        <div class="gdlr-core-title-item-left-icon-wrap">
                                                            <div class="gdlr-core-title-item-title-wrap">
                                                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title class-test" style="font-size: 17px; font-weight: 500; letter-spacing: 0px; text-transform: none; color: #848484;">
                                                                    Restaurant<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-20" id="gdlr-core-column-21">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js gdlr-core-move-up-with-shadow" style="margin: 0px 10px 20px 10px; padding: 25px 0px 0px 10px; border-radius: 20px 20px 20px 20px; -moz-border-radius: 20px 20px 20px 20px; -webkit-border-radius: 20px 20px 20px 20px;">
                                            <div class="gdlr-core-pbf-background-wrap" style="
                                                    border-radius: 20px 20px 20px 20px;
                                                    -moz-border-radius: 20px 20px 20px 20px;
                                                    -webkit-border-radius: 20px 20px 20px 20px;
                                                    border-width: 1px 1px 1px 1px;
                                                    border-color: #e5e5e5;
                                                    border-style: solid;
                                                "></div>
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 10px;">
                                                        <div class="gdlr-core-title-item-left-icon" style="margin: -12px 15px 0px 0px; font-size: 35px;"><i class="gdlr-icon-food-service-copy" style="color: #1e1e1e;"></i></div>
                                                        <div class="gdlr-core-title-item-left-icon-wrap">
                                                            <div class="gdlr-core-title-item-title-wrap">
                                                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title class-test" style="font-size: 17px; font-weight: 500; letter-spacing: 0px; text-transform: none; color: #848484;">
                                                                    Room Service<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gdlr-core-pbf-column gdlr-core-column-20" id="gdlr-core-column-22">
                                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js gdlr-core-move-up-with-shadow" style="margin: 0px 20px 20px 10px; padding: 25px 0px 0px 10px; border-radius: 20px 20px 20px 20px; -moz-border-radius: 20px 20px 20px 20px; -webkit-border-radius: 20px 20px 20px 20px;">
                                            <div class="gdlr-core-pbf-background-wrap" style="
                                                    border-radius: 20px 20px 20px 20px;
                                                    -moz-border-radius: 20px 20px 20px 20px;
                                                    -webkit-border-radius: 20px 20px 20px 20px;
                                                    border-width: 1px 1px 1px 1px;
                                                    border-color: #e5e5e5;
                                                    border-style: solid;
                                                "></div>
                                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 10px;">
                                                        <div class="gdlr-core-title-item-left-icon" style="margin: -12px 15px 0px 0px; font-size: 35px;"><i class="gdlr-icon-swimming-pool1" style="color: #1e1e1e;"></i></div>
                                                        <div class="gdlr-core-title-item-left-icon-wrap">
                                                            <div class="gdlr-core-title-item-title-wrap">
                                                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title class-test" style="font-size: 17px; font-weight: 500; letter-spacing: 0px; text-transform: none; color: #848484;">
                                                                    Swimming Pool<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="gdlr-core-pbf-wrapper" id="gdlr-core-wrapper-2">
                        <div class="gdlr-core-pbf-background-wrap"></div>
                        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js">
                            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-pbf-wrapper-full">
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-gallery-item gdlr-core-item-pdb clearfix gdlr-core-gallery-item-style-scroll gdlr-core-item-pdlr">
                                        <div class="gdlr-core-sly-slider gdlr-core-js-2">
                                            <ul class="slides">
                                                <li class="gdlr-core-gallery-list gdlr-core-item-mglr" style="margin-left: 5px; margin-right: 5px;">
                                                    <div class="gdlr-core-media-image" style="height: 500px;">
                                                        <a class="gdlr-core-lightgallery gdlr-core-js" href="upload/shutterstock_1298236804.jpg" data-lightbox-group="gdlr-core-img-group-1">
                                                            <img src="<?php echo base_url('asset/images/ab2.jpg') ?>" alt="" width="2200" height="1467" title="shutterstock_1298236804" />
                                                        </a>
                                                    </div>
                                                </li>

                                                
                                                <li class="gdlr-core-gallery-list gdlr-core-item-mglr" style="margin-left: 5px; margin-right: 5px;">
                                                    <div class="gdlr-core-media-image" style="height: 500px;">
                                                        <a class="gdlr-core-lightgallery gdlr-core-js" href="upload/shutterstock_1354405256.jpg" data-lightbox-group="gdlr-core-img-group-1">
                                                            <img src="<?php echo base_url('asset/images/ab11.jpg') ?>" alt="" width="2000" height="1334" title="shutterstock_1354405256" />
                                                        </a>
                                                    </div>
                                                </li>
                                                <li class="gdlr-core-gallery-list gdlr-core-item-mglr" style="margin-left: 5px; margin-right: 5px;">
                                                    <div class="gdlr-core-media-image" style="height: 500px;">
                                                        <a class="gdlr-core-lightgallery gdlr-core-js" href="upload/jen-p-541467-unsplash-scaled.jpg" data-lightbox-group="gdlr-core-img-group-1">
                                                            <img src="<?php echo base_url('asset/images/ab9.jpg') ?>" alt="" width="1920" height="2560" title="jen-p-541467-unsplash" />
                                                        </a>
                                                    </div>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                        <div class="gdlr-core-sly-scroll">
                                            <div class="gdlr-core-sly-scroll-handle"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-section">
                        <div class="gdlr-core-pbf-section-container gdlr-core-container clearfix">
                            <div class="gdlr-core-pbf-column gdlr-core-column-60 gdlr-core-column-first" id="gdlr-core-column-23">
                                <div class="gdlr-core-pbf-column-content-margin gdlr-core-js" style="margin: 0px 0px 0px 0px; padding: 30px 0px 10px 0px;">
                                    <div class="gdlr-core-pbf-background-wrap"></div>
                                    <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js">
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align" style="margin-bottom: 20px;">
                                                <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-2xl font-bold text-center mt-10 mb-4">Check Availability</div>

                    <div class="flex items-center justify-center pb-5">
                        <div class="flex items-center justify-center lg:w-5/6 md:w-full sm:w-full bg-white shadow rounded">
                            <div class="text-center">
                                <h1 id="result" class="mb-4"></h1>
                                <div class="relative">
                                    <div class="container">
                                        <div id="error-message"></div>
                                        <div class="input-container">
                                            <div>
                                                <div class="flex items-center">
                                                    <div class="text-sm font-bold m-3 ms-0 text-base">
                                                        Check-in
                                                    </div>
                                                    <img src="<?php echo base_url('assets/foto/enter.png') ?>" class="text-white w-10" alt="">
                                                </div>

                                                <div id="data_checkin" data="<?php echo $kamar['checkin'] ?>"></div>
                                                <div class="flex justify-center">
                                                    <input id="datepicker" class="appearance-none w-48 py-2 px-3 text-gray-900 bg-white border-none" type="text" placeholder="Select check-in" disabled>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="flex items-center">
                                                    <div class="text-sm font-bold m-3 ms-0 text-base">
                                                        Check-out
                                                    </div>
                                                    <img src="<?php echo base_url('assets/foto/enter.png') ?>" class="text-white w-10 rotate-180" alt="">
                                                </div>

                                                <div id="data_checkout" data="<?php echo $kamar['checkout'] ?>"></div>
                                                <input id="datepicker2" class="appearance-none w-48 py-2 px-3 text-gray-900 bg-white border-none" type="text" placeholder="Select check-out" disabled>
                                            </div>
                                            <div class="pt-4 flex gap-1">
                                                <div>
                                                    <button class="w-72 h-12 relative" onclick="toggleModal('modal')">
                                                        <div class="w-72 h-12 px-3.5 py-2.5 left-0 top-0 absolute bg-red-500 rounded border border-red-500 flex-col justify-center items-start inline-flex">
                                                            <div class="text-center text-white text-sm font-bold leading-7">Rooms</div>
                                                        </div>
                                                        <div class="w-24 h-12 left-[173.60px] top-0 absolute">
                                                            <img class="w-9 h-8 left-[51.12px] top-[7px] absolute" src="<?php echo base_url('assets/foto/people.png') ?>" />
                                                            <div id="total-persons" class="w-2 h-4 left-[25.40px] top-[11px] absolute text-black text-md font-bold text-white">2</div>
                                                        </div>
                                                        <div class="w-20 h-9 left-[91px] top-[1px] absolute">
                                                            <img class="w-10 h-9 left-[25.23px] top-0 absolute" src="<?php echo base_url('assets/foto/bed.png') ?>" />
                                                            <div id="total-rooms" class="w-2 h-4 left-0 top-[10px] absolute text-black text-md font-bold text-white">1</div>
                                                        </div>
                                                        <div class="w-0.5 h-11 bg-white left-[178px] top-0.5 absolute"></div>
                                                    </button>
                                                </div>



                                                <div id="modal" class="hidden absolute z-10 mt-3 w-96">
                                                    <div id="modal-container" class="w-96 h-72 left-0 top-12 bg-white shadow-lg rounded relative overflow-hidden">
                                                        <div id="room-container" class="p-4" style="max-height: calc(100% - 96px);">
                                                            <!-- <div class="text-lg font-bold mb-4">Room 1</div> -->
                                                            <!-- Adult Section -->
                                                            <div class="text-md font-bold">Manage Room Details</div>
                                                            <div class="flex flex-col mb-4 room-section">
                                                                <div class="border border-black h-px w-full mb-4"></div>
                                                                <div class="flex items-center mb-4">
                                                                    <img class="w-10 h-10 mr-4" src="<?php echo base_url('assets/foto/person.png') ?>" />
                                                                    <div class="text-black text-sm font-normal mr-auto">Adult</div>
                                                                    <div>
                                                                        <select name="dewasa" class="select-adult appearance-auto border-1 w-24 h-8 rounded">
                                                                            <option value="1">1</option>
                                                                            <option value="2" selected>2</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="flex items-center mb-4">
                                                                    <img class="w-10 h-10 mr-4" src="<?php echo base_url('assets/foto/kid.png') ?>" />
                                                                    <div class="flex flex-col items-start mr-auto">
                                                                        <div class="text-black text-sm font-normal">Kid</div>
                                                                        <div class="text-gray-500 text-sm font-normal">Ages 6 and below</div>
                                                                    </div>
                                                                    <div>
                                                                        <select name="anak" class="select-kid appearance-auto border-1 w-24 h-8 rounded">
                                                                            <option value="0" selected>0</option>
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="buttons-container" class="p-4 flex justify-between">

                                                            <button id="add-room-button" class="w-36 h-10 bg-green-500 text-white mt-4 rounded"><span><i class="fa-solid fa-plus"></i></span>
                                                                Add Room
                                                            </button>
                                                            <button id="submit-button" class="w-36 h-10 bg-red-500 text-white mt-4 rounded bg-red-500">
                                                                Submit
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <button id="check" class="w-20 h-12 px-3.5 py-2.5 bg-red-500 text-white font-bold rounded border border-red-500 flex-col justify-center items-start inline-flex relative">Check</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-center">
                                        <section id="datepicker-section" class="pb-5"></section>
                                    </div>
                                </div>


                            </div>


                        </div>

                    </div>
                    <div id="availability1"></div>

                </div>
                <!-- Modal Overlay and Content -->
                <div id="modal-success" class="hidden fixed inset-0 z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <!-- Background backdrop, show/hide based on modal state. -->
                    <div id="modal-backdrop" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                            <!-- Modal panel, show/hide based on modal state. -->
                            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                    <div class="sm:flex sm:items-start">
                                        <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                            <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                            </svg>
                                        </div>
                                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                            <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Deactivate account</h3>
                                            <div class="mt-2">
                                                <p class="text-sm text-gray-500">Are you sure you want to deactivate your account? All of your data will be permanently removed. This action cannot be undone.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                    <button type="button" id="deactivate-button" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Deactivate</button>
                                    <button type="button" id="cancel-button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
                            <div id="block-8" class="widget widget_block hotale-widget">
                                <p>
                                    <span class="gdlr-core-space-shortcode" style="margin-top: -10px;"></span><i class="fa fa-facebook" style="font-size: 16px; color: #ffffff; margin-left: 3px; margin-right: 17px;"></i>
                                    <i class="fa5b fa-instagram" style="font-size: 16px; color: #ffffff; margin-left: 3px; margin-right: 17px;"></i>
                                    <i class="icon-envelope" style="font-size: 16px; color: #ffffff; margin-left: 3px; margin-right: 17px;"></i>
                                    <i class="fa5b fa5-whatsapp" style="font-size: 16px; color: #ffffff; margin-left: 3px; margin-right: 17px;"></i>
                                </p>
                            </div>
                            <div id="block-22" class="widget widget_block widget_text hotale-widget">
                                <p></p>
                            </div>
                            <div id="block-25" class="widget widget_block hotale-widget">
                                <div class="tourmaster-currency-switcher-shortcode clearfix">
                                    <div class="tourmaster-currency-switcher" style="background: #333333;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hotale-footer-column hotale-item-pdlr hotale-column-15">
                            <div id="block-10" class="widget widget_block hotale-widget">
                                <h4>Contact</h4>
                            </div>
                            <div id="block-14" class="widget widget_block hotale-widget">
                                <p><span style="color: #ffffff;">Phone</span>: 62-858-756-364</p>
                                <p><span class="gdlr-core-space-shortcode" style="margin-top: -10px;"></span></p>
                                <p><span style="color: #ffffff;">E-mail</span>: <a href="#">adiabian@gmail.com</a></p>
                                <p><span class="gdlr-core-space-shortcode" style="margin-top: -10px;"></span></p>
                            </div>
                        </div>
                        <div class="hotale-footer-column hotale-item-pdlr hotale-column-15">
                            <div id="block-12" class="widget widget_block hotale-widget">
                                <h4>Villa Address</h4>
                            </div>
                            <div id="block-15" class="widget widget_block hotale-widget">
                                <p>
                                    <span style="color: #ffffff;">
                                        Adi Abian Villa.<br />
                                        Pecatu, Uluwatu<br />
                                        Kuta Selatan, Bali
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hotale-copyright-wrapper">
                    <div class="hotale-copyright-container hotale-container clearfix">
                        <div class="hotale-copyright-left hotale-item-pdlr">
                            <div style="text-transform: uppercase; font-weight: 500; font-size: 13px; letter-spacing: 3px;">
                                <a href="index.html" style="margin-right: 22px;">Home</a>
                                <a href="about-us.html" style="margin-right: 22px;">About</a>
                                <a href="contact.html" style="margin-right: 22px;">Contact</a>
                            </div>
                        </div>
                        <div class="hotale-copyright-right hotale-item-pdlr">Copyright ©PBL 2024. Adi Abian Villa.</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    