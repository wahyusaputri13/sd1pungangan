<!-- Star Footer
    ============================================= -->
<footer>
    <div class="container">
        <div class="f-items default-padding">
            <div class="row">
                <div class="equal-height col-lg-4 col-md-6 item">
                    <div class="f-item about">
                        <p class="mt-3">Total Visitors : {{ $counter_web }}</p>
                    </div>
                </div>

                <div class="equal-height col-lg-2 col-md-6 item">
                    <div class="f-item link">
                        <h4 class="widget-title">Useful Links</h4>
                        <ul>
                            @foreach($related as $rr)
                            <li>
                                <a target="_blank" href="{{ $rr->url }}">{{ $rr->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="equal-height col-lg-2 col-md-6 item">
                    <div class="f-item link">

                    </div>
                </div>

                <div class="equal-height col-lg-4 col-md-6 item">
                    <div class="f-item contact">
                        <h4 class="widget-title">Contact Info</h4>
                        <p>
                            {{ $data_website->address }}
                        </p>
                        <div class="address">
                            <ul>
                                <li>
                                    <strong>Email:</strong> {{ $data_website->email }}
                                </li>
                                <li>
                                    <strong>Contact:</strong> {{ $data_website->phone }}
                                </li>
                            </ul>
                        </div>
                        <ul class="social">
                            <li class="facebook">
                                <a href="{{ $data_website->facebook }}" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a>
                            </li>
                            <li class="twitter">
                                <a href="{{ $data_website->twitter }}" target="_blank"><i
                                        class="fab fa-twitter"></i></a>
                            </li>
                            <li class="youtube">
                                <a href="{{ $data_website->youtube }}" target="_blank"><i
                                        class="fab fa-youtube"></i></a>
                            </li>
                            <li class="instagram">
                                <a href="{{ $data_website->instagram }}" target="_blank"><i
                                        class="fab fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="row">
                <div class="col-lg-6">
                    <p>&copy; Copyright 2022. Diskominfo Kab. Wonosobo by <a href="#"> Isa Maulana Tantra
                        </a></p>
                </div>
                <div class="col-lg-6 text-right link">

                </div>
            </div>
        </div>
    </div>
    <!-- Shape -->
    <div class="footer-shape" style="background-image: url(assets/front/anada/assets/img/shape/1.svg);"></div>
    <!-- End Shape -->
</footer>
<!-- End Footer-->