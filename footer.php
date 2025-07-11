            <footer class="bg-dark text-white text-center py-3">
                <p>&copy; <?php echo date('Y'); ?> BMSCE. All Rights Reserved.</p>
            </footer>
        </div>
    </div>

    <script>
        // Preloader
        window.addEventListener("load", function () {
            const preloader = document.getElementById("preloader");
            preloader.style.display = "none";
        });

        // JavaScript to highlight active link
        const links = document.querySelectorAll('.nav-link');
        const currentPage = location.pathname.split('/').pop();

        links.forEach(link => {
            if (link.getAttribute('href') === currentPage) {
                link.classList.add('active');
            }
        });

        // Menu button
        document.addEventListener('DOMContentLoaded', function () {
            const toggleBtn = document.getElementById('toggleSidebar');
            const sidebar = document.querySelector('.sidebar');
            const icon = document.getElementById('hamburgerIcon');

            toggleBtn.addEventListener('click', function () {
                sidebar.classList.toggle('active');

                // Change icon to ✕ if sidebar is open
                icon.innerHTML = sidebar.classList.contains('active') ? '&times;' : '&#9776;';
            });
        });
    </script>
    </body>
</html>