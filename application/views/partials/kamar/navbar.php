<div class="hotale-mobile-header-wrap">
    <div class="hotale-mobile-header hotale-header-background hotale-style-slide hotale-sticky-mobile-navigation" id="hotale-mobile-header">
        <div class="hotale-mobile-header-container hotale-container clearfix">
            <div class="hotale-logo hotale-item-pdlr">
                <div class="hotale-logo-inner">
                    <a class="hotale-fixed-nav-logo" href="#">
                        <img src="<?php echo base_url('asset/images/logog.png') ?>" alt="" width="147" height="37" title="logo-nx1" />
                    </a>
                    <a class="hotale-orig-logo" href="#">
                        <img src="<?php echo base_url('asset/images/logog.png') ?>" alt="" width="147" height="37" title="logo-nx1" />
                    </a>
                </div>
            </div>
            <div class="hotale-mobile-menu-right">

                <!-- LOGIN & Register Forms. -->

                <div class="tourmaster-user-top-bar tourmaster-guest tourmaster-style-2" data-redirect="index.html" data-ajax-url="#">
                    <span class="tourmaster-user-top-bar-login" data-tmlb="login"><i class="icon_lock_alt"></i><span class="tourmaster-text">Login</span></span>
                    <div class="tourmaster-lightbox-content-wrap" data-tmlb-id="login">
                        <div class="tourmaster-lightbox-head">
                            <?php if (!empty($this->session->userdata('identity'))) : ?>
                                <div class="flex">
                                    <a class="tourmaster-user-top-bar-login " href="<?= base_url('c_home/logout'); ?>">logout</a>
                                </div>
                            <?php else : ?>
                                <a class="tourmaster-user-top-bar-login" href="<?= base_url('Auth/login') ?>">Login</a>
                            <?php endif; ?>
                        </div>
                        <div class="tourmaster-lightbox-content">
                            <form class="tourmaster-login-form tourmaster-form-field tourmaster-with-border" method="post" action="#">
                                <div class="tourmaster-login-form-fields clearfix">
                                    <p class="tourmaster-login-user">
                                        <label>Username or E-Mail</label>
                                        <input type="text" name="log" />
                                    </p>
                                    <p class="tourmaster-login-pass">
                                        <label>Password</label>
                                        <input type="password" name="pwd" />
                                    </p>
                                </div>

                                <p class="tourmaster-login-submit">
                                    <input type="submit" name="wp-submit" class="tourmaster-button" value="Sign In!" />
                                </p>
                                <p class="tourmaster-login-lost-password">
                                    <a href="#">Forget Password?</a>
                                </p>

                            </form>

                            <div class="tourmaster-login-bottom">
                                <h3 class="tourmaster-login-bottom-title">Do not have an account?</h3>
                                <a class="tourmaster-login-bottom-link" href="register.html">Create an Account</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hotale-mobile-menu">
                    <a class="hotale-mm-menu-button hotale-mobile-menu-button hotale-mobile-button-hamburger" href="#hotale-mobile-menu"><span></span></a>
                    <div class="hotale-mm-menu-wrap hotale-navigation-font" id="hotale-mobile-menu" data-slide="right">
                        <ul id="menu-main-navigation" class="m-menu">
                            <li class="menu-item menu-item-home current-menu-item  menu-item-has-children">
                                <a href="index.html" aria-current="page">Home</a>
                                <ul class="sub-menu">
                                    <li class="menu-item menu-item-home">
                                        <a href="index.html" aria-current="page"> &#8211; Resort 1</a>
                                    </li>
                                    <li class="menu-item">
                                        <a target="_blank" rel="noopener" href="../resort2/index.html">Home &#8211; Resort 2</a>
                                    </li>
                                    <li class="menu-item">
                                        <a target="_blank" rel="noopener" href="../hotel1/index.html">Home &#8211; Hotel 1</a>
                                    </li>
                                    <li class="menu-item">
                                        <a target="_blank" rel="noopener" href="../hotel2/index.html">Home &#8211; Hotel 2</a>
                                    </li>
                                    <li class="menu-item">
                                        <a target="_blank" rel="noopener" href="../apartment/index.html">Home &#8211; Apartment</a>
                                    </li>
                                    <li class="menu-item">
                                        <a target="_blank" rel="noopener" href="../apartment2/index.html">Home &#8211; Apartment 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children">
                                <a href="#">Pages</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="about-us.html">About Us</a></li>
                                    <li class="menu-item"><a href="about-us-2.html">About Us 2</a></li>
                                    <li class="menu-item"><a href="about-us-3.html">About Us 3</a></li>
                                    <li class="menu-item"><a href="our-team.html">Our Team</a></li>
                                    <li class="menu-item"><a href="hotel-review.html">Hotel Review</a></li>
                                    <li class="menu-item"><a href="faq.html">FAQ</a></li>
                                    <li class="menu-item"><a href="gallery.html">Gallery</a></li>
                                    <li class="menu-item"><a href="price-table.html">Price Table</a></li>
                                    <li class="menu-item"><a href="maintenance.html">Maintenance</a></li>
                                    <li class="menu-item"><a href="coming-soon.html">Coming Soon</a></li>
                                    <li class="menu-item"><a href="404.html">404 Page</a></li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children">
                                <a href="room-grid-style-1.html">Rooms</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="room-grid-style-1.html">Room Grid Style 1</a></li>
                                    <li class="menu-item"><a href="room-grid-style-2.html">Room Grid Style 2</a></li>
                                    <li class="menu-item"><a href="room-grid-style-3.html">Room Grid Style 3</a></li>
                                    <li class="menu-item"><a href="room-grid-style-4.html">Room Grid Style 4</a></li>
                                    <li class="menu-item"><a href="room-modern-style.html">Room Modern Style</a></li>
                                    <li class="menu-item"><a href="room-side-thumbnail.html">Room Side Thumbnail</a></li>
                                </ul>
                            </li>
                            <li class="menu-item"><a href="room-search.html">Reservation</a></li>
                            <li class="menu-item menu-item-has-children">
                                <a href="blog-full-right-sidebar.html">Blog</a>
                                <ul class="sub-menu">
                                    <li class="menu-item menu-item-has-children">
                                        <a href="blog-3-columns-with-frame.html">Blog Columns</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item"><a href="blog-2-columns.html">Blog 2 Columns</a></li>
                                            <li class="menu-item">
                                                <a href="blog-2-columns-with-frame.html">Blog 2 Columns With Frame</a>
                                            </li>
                                            <li class="menu-item"><a href="blog-3-columns.html">Blog 3 Columns</a></li>
                                            <li class="menu-item">
                                                <a href="blog-3-columns-with-frame.html">Blog 3 Columns With Frame</a>
                                            </li>
                                            <li class="menu-item"><a href="blog-4-columns.html">Blog 4 Columns</a></li>
                                            <li class="menu-item">
                                                <a href="blog-4-columns-with-frame.html">Blog 4 Columns With Frame</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item menu-item-has-children">
                                        <a href="blog-full-right-sidebar.html">Blog Full</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item">
                                                <a href="blog-full-right-sidebar.html">Blog Full Right Sidebar</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="blog-full-right-sidebar-with-frame.html">Blog Full Right Sidebar With Frame</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="blog-full-left-sidebar.html">Blog Full Left Sidebar</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="blog-full-left-sidebar-with-frame.html">Blog Full Left Sidebar With Frame</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="blog-full-both-sidebar.html">Blog Full Both Sidebar</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="blog-full-both-sidebar-with-frame.html">Blog Full Both Sidebar With Frame</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item menu-item-has-children">
                                        <a href="blog-grid-3-columns.html">Blog Grid</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item"><a href="blog-grid-2-columns.html">Blog Grid 2 Columns</a></li>
                                            <li class="menu-item">
                                                <a href="blog-grid-2-columns-no-space.html">Blog Grid 2 Columns No Space</a>
                                            </li>
                                            <li class="menu-item"><a href="blog-grid-3-columns.html">Blog Grid 3 Columns</a></li>
                                            <li class="menu-item">
                                                <a href="blog-grid-3-columns-no-space.html">Blog Grid 3 Columns No Space</a>
                                            </li>
                                            <li class="menu-item"><a href="blog-grid-4-columns.html">Blog Grid 4 Columns</a></li>
                                            <li class="menu-item">
                                                <a href="blog-grid-4-columns-no-space.html">Blog Grid 4 Columns No Space</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item"><a href="single-blog.html">Single Posts</a></li>
                                </ul>
                            </li>
                            <li class="menu-item"><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>