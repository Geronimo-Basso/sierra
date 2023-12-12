<footer class="footerF">
    <img src="assets/images/spain-flag-footer.svg" alt="footer image" class="footerImage">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var footer = document.querySelector('.footerF');

            function adjustFooterPosition() {
                var bodyHeight = document.body.scrollHeight;
                var viewportHeight = window.innerHeight;

                if (bodyHeight <= viewportHeight) {
                    footer.style.position = 'absolute';
                    footer.style.bottom = '0';
                    footer.style.width = '100%';
                } else {
                    footer.style.position = 'relative';
                    footer.style.bottom = 'auto';
                }
            }

            adjustFooterPosition();

            window.addEventListener('resize', adjustFooterPosition);
        });
    </script>
</footer>