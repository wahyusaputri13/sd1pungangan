@if(Route::current()->getName() != 'root')
<!-- clients-style-four -->
<section class="clients-style-four style-five">
    <div class="image-layer" style="background-image: url('/assets/front/appway/images/icons/layer-image-7.png');">
    </div>
    <div class="container">
        <div class="clients-carousel owl-carousel owl-theme owl-dots-none">
            <!-- <figure class="image-box"><a href="#"><img
                        src="{{ asset('assets/front/appway/images/clients/client-1.png') }}" alt=""></a></figure>
            <figure class="image-box"><a href="#"><img
                        src="{{ asset('assets/front/appway/images/clients/client-2.png') }}" alt=""></a></figure>
            <figure class="image-box"><a href="#"><img
                        src="{{ asset('assets/front/appway/images/clients/client-3.png') }}" alt=""></a></figure>
            <figure class="image-box"><a href="#"><img
                        src="{{ asset('assets/front/appway/images/clients/client-4.png') }}" alt=""></a></figure> -->
        </div>
    </div>
</section>
<!-- clients-style-four end -->

<!-- main-footer -->
<footer class="main-footer style-five style-six">
    <div class="anim-icons">
        <div class="icon icon-1"><img src="{{ asset('assets/front/appway/images/icons/pattern-21.png') }}" alt="">
        </div>
    </div>
    <div class="image-layer" style="background-image: url('/assets/front/appway/images/icons/footer-bg-6.png');">
    </div>
    <div class="container">
        <div class="footer-top">
            <div class="widget-section">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                        <div class="about-widget footer-widget">
                            <figure class="footer-logo"><a href="/"><img
                                        src="{{ asset('assets/front/appway/images/footer-logo-2.png') }}" alt=""
                                        hidden></a>
                            </figure>
                            <div class="text">Total Visitors : {{ $counter_web }}</div>
                            <!-- <div class="apps-download">
                                <h3>Download the App</h3>
                                <div class="download-btn">
                                    <a href="#" class="app-store-btn">
                                        <i class="fab fa-apple"></i>
                                        <span>Download on the</span>
                                        App Store
                                    </a>
                                    <a href="#" class="google-play-btn">
                                        <i class="fab fa-android"></i>
                                        <span>Get on it</span>
                                        Google Play
                                    </a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                        <!-- <div class="links-widget footer-widget">
                            <h4 class="widget-title">Services</h4>
                            <div class="widget-content">
                                <ul class="list clearfix">
                                    <li><a href="#">Business Dashboards</a></li>
                                    <li><a href="#">Sales Analytics</a></li>
                                    <li><a href="#">Digital Marketing</a></li>
                                    <li><a href="#">Financial Help</a></li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                        <div class="contact-widget footer-widget">
                            <h4 class="widget-title">Contact Us</h4>
                            <div class="widget-content">
                                <ul class="contact-info clearfix">
                                    <li><i class="fas fa-map-marker-alt"></i>{{ $data_website->address }}</li>
                                    <li><i class="fas fa-phone"></i><a href="tel:+62{{ $data_website->phone }}">{{
                                            $data_website->phone }}</a></li>
                                    <li><i class="fas fa-envelope"></i><a href="mailto:{{ $data_website->email }}">{{
                                            $data_website->email }}</a></li>
                                </ul>
                            </div>
                            <ul class="social-links clearfix">
                                <li><a href="{{ $data_website->facebook }}" target="_blank"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{ $data_website->twitter }}" target="_blank"><i
                                            class="fab fa-twitter"></i></a></li>
                                <li><a href="{{ $data_website->youtube }}" target="_blank"><i
                                            class="fab fa-youtube"></i></a></li>
                                <li><a href="{{ $data_website->instagram }}" target="_blank"><i
                                            class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                        <div class="links-widget footer-widget">
                            <h4 class="widget-title">Useful Links</h4>
                            <div class="widget-content">
                                <ul class="list clearfix">
                                    @foreach($related as $rr)
                                    <li>
                                        <a target="_blank" href="{{ $rr->url }}">{{ $rr->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom clearfix">
            <!-- <ul class="footer-nav pull-right">
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Legal</a></li>
            </ul> -->
        </div>
    </div>
    <div class="copyright">&copy; 2023. Diskominfo Kab. Wonosobo by <a href="#"> Isa Maulana Tantra</a></div>

</footer>
<!-- main-footer end -->

<!-- sidebar cart item -->
<div class="xs-sidebar-group info-group info-sidebar">
    <div class="xs-overlay xs-bg-black"></div>
    <div class="xs-sidebar-widget">
        <div class="sidebar-widget-container">
            <div class="widget-heading">
                <a href="#" class="close-side-widget">
                    X
                </a>
            </div>
            <div class="sidebar-textwidget">

                <!-- Sidebar Info Content -->
                <div class="sidebar-info-contents">
                    <div class="content-inner">
                        <div class="logo">
                            <a href="/"><img src="{{ asset('assets/front/appway/images/logo-2.png') }}" alt="" /></a>
                        </div>
                        <div class="content-box">
                            <h4>About Us</h4>
                            <p class="text">Lorem ipsum dolor amet consectetur sed do eiusmod tempor incididunt ut
                                labore. Lorem ipsum dolor amet consectetur adipisicing sed do eiusmod tempor
                                incididunt ut labore.</p>
                            <a href="#" class="theme-btn-two">Explore</a>
                        </div>
                        <div class="contact-info">
                            <h4>Contact Info</h4>
                            <ul>
                                <li>Chicago 12, Melborne City, USA</li>
                                <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                                <li><a href="mailto:info@example.com">info@example.com</a></li>
                            </ul>
                        </div>
                        <!-- Social Box -->
                        <ul class="social-box">
                            <li class="facebook"><a href="#" class="fab fa-facebook-f"></a></li>
                            <li class="twitter"><a href="#" class="fab fa-twitter"></a></li>
                            <li class="linkedin"><a href="#" class="fab fa-linkedin-in"></a></li>
                            <li class="instagram"><a href="#" class="fab fa-instagram"></a></li>
                            <li class="youtube"><a href="#" class="fab fa-youtube"></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- END sidebar widget item -->

<!--Scroll to top-->
<button class="scroll-top scroll-to-target" data-target="html">
    <span class="fa fa-arrow-up"></span>
</button>
@else
<!-- main-footer -->
<footer class="main-footer">
    <div class="image-layer" style="background-image: url(assets/front/appway/images/icons/footer-bg.png);"></div>
    <div class="container">
        <div class="footer-top">
            <div class="widget-section">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                        <div class="about-widget footer-widget">
                            <figure class="footer-logo"><a href="index.html"><img
                                        src="{{ asset('assets/front/appway/images/footer-logo.png') }}" alt=""
                                        hidden></a>
                            </figure>
                            <div class="text">Total Visitors : {{ $counter_web }}</div>
                            <ul class="social-links">
                                <li>
                                    <h6>Follow Us :</h6>
                                </li>
                                <li><a href="{{ $data_website->facebook }}" target="_blank"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{ $data_website->twitter }}" target="_blank"><i
                                            class="fab fa-twitter"></i></a></li>
                                <li><a href="{{ $data_website->youtube }}" target="_blank"><i
                                            class="fab fa-youtube"></i></a></li>
                                <li><a href="{{ $data_website->instagram }}" target="_blank"><i
                                            class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                        <div class="links-widget footer-widget">
                            <!-- <h4 class="widget-title">Support</h4>
                            <div class="widget-content">
                                <ul class="list clearfix">
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Submit a Ticket</a></li>
                                    <li><a href="#">Visit Knowledge Base</a></li>
                                    <li><a href="#">Support System</a></li>
                                    <li><a href="#">Refund Policy</a></li>
                                    <li><a href="#">Professional Services</a></li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                        <div class="links-widget footer-widget">
                            <h4 class="widget-title">Useful Links</h4>
                            <div class="widget-content">
                                <ul class="list clearfix">
                                    @foreach($related as $rr)
                                    <li>
                                        <a target="_blank" href="{{ $rr->url }}">{{ $rr->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                        <div class="contact-widget footer-widget">
                            <h4 class="widget-title">Contact Info</h4>
                            <div class="widget-content">
                                <ul class="list clearfix">
                                    <li><i class="fas fa-map-marker-alt"></i>
                                        {{ $data_website->address }}
                                    </li>
                                    <li>
                                        <i class="fas fa-phone-volume"></i>
                                        <a href="tel:+62{{ $data_website->phone }}">{{ $data_website->phone }}</a>
                                    </li>
                                    <li>
                                        <i class="fas fa-envelope"></i>
                                        <a href="mailto:{{ $data_website->email }}">{{ $data_website->email }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="copyright">&copy; 2023. Diskominfo Kab. Wonosobo by <a href="#"> Isa Maulana Tantra</a></div>
        </div>
    </div>
</footer>
<!-- main-footer end -->

<!--Scroll to top-->
<button class="scroll-top scroll-to-target" data-target="html">
    <span class="fa fa-arrow-up"></span>
</button>
@endif