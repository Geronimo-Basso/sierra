<header>
    <div class="flexbox-container-header">
        <a href="index.php">
            <div class="flexbox-container-logo">
                <img id="logo-image" src="assets/images/logo-header.svg" alt="sierra-logo">
                <p id="header-title">Sierra</p>
            </div>
        </a>
        <div class="flexbox-spacer"></div>
        <nav>
            <ul class="ul-header-admin">
                <a href="/sierra/admin-table.php">
                    <li id="admin-header-li">Modify campaings</li>
                </a>
                <a href="/sierra/admin-contact.php">
                    <li id="admin-header-li">See messages</li>
                </a>
                <form action="includes/close-session.php" method="post">
                    <input class="ul-header-admin input" style=""  type="submit" value="Cerrar Sesión">
                </form>
            </ul>
        </nav>
    </div>
</header>