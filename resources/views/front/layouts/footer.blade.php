<footer class="footer mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="widget1">
                    <div class="logo">
                        <a href="{{route('home')}}">
                            <img src="{{asset('images/dourado_logo_transparent.png')}}" class="img-fluid" alt="footer-logo">
                        </a>
                    </div>
                    <p>
                        {{trans('web.footer_about_us')}}
                    </p>
                    <div class="social-links">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fa fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="widget3">
                    <h5>
                        Links
                    </h5>
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Cars
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                About us
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="widget4">
                    <ul>
                        <li>
                            <a href="#">
                                Sell a car
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                contact us
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right-area">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p>&copy; Copyright All rights reserved {{date('Y')}}.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
