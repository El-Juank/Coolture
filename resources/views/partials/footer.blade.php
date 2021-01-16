<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-info">
                    <img src="{{ asset('img/logo.png') }}" alt="Coolture">
                    <p>Copyright
                        <script>
                            document.write(new Date().getFullYear() + ".");

                        </script>
                        {{ __('lang.footer_licence') }}
                    </p>
                    <div class="social-links mt-3">
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Coolture</h4>
                    <ul>
                        <li><i class="fa fa-angle-right"></i> <a href=" {{route("howItWorks")}} ">{{ __('lang.footer_howitworks') }}</a></li>
                        <li><i class="fa fa-angle-right"></i> <a href=" {{route("aboutUs")}} ">{{ __('lang.footer_whoweare') }}</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>{{ __('lang.footer_support') }}</h4>
                    <ul>
                        <li><i class="fa fa-angle-right"></i> <a href=" {{route("post_concert")}} ">{{ __('lang.footer_post') }}</a></li>
                        <li><i class="fa fa-angle-right"></i> <a href=" {{route("post_concert_rules")}} ">{{ __('lang.footer_post_rules') }}</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>{{ __('lang.footer_legal') }}</h4>
                    <ul>
                        <li><i class="fa fa-angle-right"></i> <a href=" {{route("terms_and_conditions")}} ">{{ __('lang.footer_conditions') }}</a></li>
                        <li><i class="fa fa-angle-right"></i> <a href=" {{route("privacy_policy")}} ">{{ __('lang.footer_privacity') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
