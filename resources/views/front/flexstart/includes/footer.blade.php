<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <div class="social-links mt-4">
                        <a href="{{ $data_website->twitter }}" target="_blank" class="twitter"><i
                                class="bi bi-twitter"></i></a>
                        <a href="{{ $data_website->facebook }}" target="_blank" class="facebook"><i
                                class="bi bi-facebook"></i></a>
                        <a href="{{ $data_website->instagram }}" target="_blank" class="instagram"><i
                                class="bi bi-instagram"></i></a>
                        <a href="{{ $data_website->youtube }}" target="_blank" class="youtube"><i
                                class="bi bi-youtube"></i></a>
                    </div>
                    <p class="mt-3">Total Visitors : {{ $counter_web }}</p>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        @foreach($related as $rr)
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a target="_blank" href="{{ $rr->url }}">{{ $rr->name }}</a>
                        </li>
                        @endforeach
                        <!-- <li><i class="bi bi-chevron-right"></i> <a target="_blank"
                                href="https://kapencar-kertek.wonosobokab.go.id/">Desa Kapencar, Kertek</a>
                        </li>
                        <li><i class="bi bi-chevron-right"></i> <a target="_blank"
                                href="https://buntu-kejajar.wonosobokab.go.id/">Desa Buntu, Kejajar</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a target="_blank"
                                href="https://kadipaten-selomerto.wonosobokab.go.id/">Desa Kadipaten,
                                Selomerto</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a target="_blank"
                                href="https://jonggolsari-leksono.wonosobokab.go.id/">Desa Jonggolsari,
                                Leksono</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a target="_blank"
                                href="https://kelurahanjaraksari.wonosobokab.go.id/">Kelurahan Jaraksari,
                                Wonosobo</a></li> -->
                    </ul>
                </div>


                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                    <p>
                        {{ $data_website->address }} <br><br>
                        <strong>Phone:</strong> {{ $data_website->phone }}<br>
                        <strong>Email:</strong> {{ $data_website->email }}<br>
                    </p>

                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span><a href="https://website.wonosobokab.go.id/">Diskominfo
                        Kab.
                        Wonosobo.</a></span></strong>
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
            <a href="#">Isa Maulana Tantra</a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>