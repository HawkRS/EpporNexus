<!-- Footer Start -->
<footer class="footer">
    <div class="page-container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start">
              <?php use Carbon\Carbon; $currentDate = Carbon::now(); $currentYear = $currentDate->year; ?>
              {{$currentYear}} © Eppor Nexus - Por <span class="fw-bold text-decoration-underline text-uppercase text-reset font-12">Hawk Media</span>
            </div>
            <div class="col-md-6">
              {{--
                <div class="text-md-end footer-links d-none d-md-block">
                    <a href="javascript: void(0);">About</a>
                    <a href="javascript: void(0);">Support</a>
                    <a href="javascript: void(0);">Contact Us</a>
                </div>
              --}}
            </div>
        </div>
    </div>
</footer>
<!-- end Footer -->