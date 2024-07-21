<footer>

    <section class="get_touch">

        <div class="top">

            <div class="footer-section logo-container">

                <a href="{{ url('') }}" title="Home" class="logo">

                    <img src="{{ asset('/front/images/likeminded_logo_new.png') }}" alt="Like Minded logo" />

                </a>

            </div>

            <div class="footer-section social">

                <a href="">

                    <i class="bx bxl-instagram"></i>

                </a>

                <a href="">

                    <i class="bx bxl-facebook"></i>

                </a>

            </div>

            <div class="footer-section">

                <a href="mailto:inbal@lm-collective.com" class="email">inbal@lm-collective.com</a>

            </div>

        </div>

        <div class="bottom">

            <div class="footer-container">

                <a href="{{ route('pages', 'terms-conditions') }}" title="Terms &amp; Conditions">Terms &amp; Conditions</a>&nbsp;|&nbsp;<a href="{{ route('pages', 'privacy-policy') }}" title="Privacy Policy">Privacy Policy</a>

            </div>

            <div class="footer-container">

                <span id="copyright">&copy; <?php echo date('Y'); ?> Like Minded Collective</span>

            </div>

        </div>

    </section>

</footer>
