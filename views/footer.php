        <!-- Footer-->
        <footer class="bg-light py-5" id="footer">
            <div class="container px-4 px-lg-5">
                <div class="small text-center"><a href="https://modops.nl">Home</a> - <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Terms & Conditions</a> - <a href="#" data-bs-toggle="modal" data-bs-target="#privacyModal">Privacy Policy</a> - <a href="#" data-bs-toggle="modal" data-bs-target="#cookieModal">Cookie Policy</a> - <a href="#" onclick="resetCookieConsent(); return false;"><?= $lang['cookie_change_link']; ?></a></p></div>
                <div class="mt-5 small text-center">Copyright &copy; <?php echo date('Y') ?> - ModOps.nl - <?=$lang['FOOTER-RIGHTS']?></div>
            </div>
        </footer>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" defer></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js" defer></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js" defer></script>
        <?php include('views/cb.php'); ?>
        <?php include('views/policy-modals.php'); ?>
        <script>
          document.addEventListener("DOMContentLoaded", function () {
            const consent = JSON.parse(localStorage.getItem('cookieConsent') || '{}');
            const gtagReady = typeof gtag === 'function';

            // Alleen op de conversiepagina uitvoeren
              if (window.location.pathname.includes('conv.php')) {
                if (consent.marketing && gtagReady) {
                  console.log("✅ Consent gegeven & gtag geladen – event wordt verzonden");

                  gtag('event', 'form_submission', {
                    'event_category': 'Application',
                    'event_label': 'Job Application Sent',
                    'value': 1
                  });
                } else {
                  console.warn("⚠️ Geen toestemming of gtag nog niet geladen, event NIET verzonden");
                }
              }

              const params = new URLSearchParams(window.location.search);
              const policy = params.get('policy');
              if (policy) {
                const modalEl = document.getElementById(policy + 'Modal');
                if (modalEl) {
                  const modal = new bootstrap.Modal(modalEl);
                  modal.show();
                }
              }
            });
        </script>
    </body>
</html>