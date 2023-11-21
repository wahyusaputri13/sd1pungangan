<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="footer-content">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <h3>{{ $data_website->web_name }}</h3>
                        <p>
                            {{ $data_website->address }}<br><br>
                            <strong style="color: white;">Phone:</strong> {{ $data_website->phone }}<br>
                            <strong style="color: white;">Email:</strong> {{ $data_website->email }}<br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        @foreach($related as $rr)
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ $rr->url }}" target="_blank">{{ $rr->name
                                }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <!-- <h4>Our Services</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Graphic Design</a></li>
                    </ul> -->
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <!-- <h4>Our Newsletter</h4> -->
                    <p class="mt-3">Total Visitors : {{ $counter_web }}</p>
                    <!-- <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form> -->

                </div>

            </div>
        </div>
    </div>

    <div class="footer-legal text-center">
        <div
            class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

            <div class="d-flex flex-column align-items-center align-items-lg-start">
                <div class="copyright">
                    &copy; 2022 <strong><span style="color: white;">Diskominfo Kab. Wonosobo</span></strong>
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
                    Develop by <a href="#">Isa Maulana Tantra</a>
                </div>
            </div>

            <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                <a href="{{ $data_website->twitter }}" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="{{ $data_website->facebook }}" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="{{ $data_website->instagram }}" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="{{ $data_website->youtube }}" class="youtube"><i class="bi bi-youtube"></i></a>
            </div>

        </div>
    </div>

</footer><!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>