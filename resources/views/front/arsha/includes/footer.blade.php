<!-- ======= Footer ======= -->
<footer id="footer">

    <!-- <div class="footer-newsletter">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h4>Join Our Newsletter</h4>
                    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div> -->

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>{{ $data_website->web_name }}</h3>
                    <p>
                        {{ $data_website->address }}<br><br>
                        <strong>Phone:</strong> {{ $data_website->phone }}<br>
                        <strong>Email:</strong> {{ $data_website->email }}<br>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        @foreach($related as $rr)
                        <li>
                            <i class="bx bx-chevron-right"></i>
                            <a target="_blank" href="{{ $rr->url }}">{{ $rr->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <!-- <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                    </ul> -->
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Social Networks</h4>
                    <!--<p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p> -->
                    <div class="social-links mt-3">
                        <a href="{{ $data_website->twitter }}" target="_blank" class="twitter"><i
                                class="bx bxl-twitter"></i></a>
                        <a href="{{ $data_website->facebook }}" target="_blank" class="facebook"><i
                                class="bx bxl-facebook"></i></a>
                        <a href="{{ $data_website->instagram }}" target="_blank" class="instagram"><i
                                class="bx bxl-instagram"></i></a>
                        <a href="{{ $data_website->youtube }}" target="_blank" class="youtube"><i
                                class="bx bxl-youtube"></i></a>
                    </div>
                    <p class="mt-3">Total Visitors : {{ $counter_web }}</p>
                </div>

            </div>
        </div>
    </div>

    <div class="container footer-bottom clearfix">
        <div class="copyright">
            &copy; <strong><span>Diskominfo Kab.
                    Wonosobo.</span></strong>
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
            by <a href="#">Isa Maulana Tantra</a>
        </div>
    </div>
</footer>
<!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>