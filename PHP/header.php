<header>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="homePage">
                <img src="..\Images\logo.PNG" alt="Snickers Logo" style="width: 200px; height: auto;">
                <!--Step Up Strong-->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($activePage == 'home') ? 'active' : ''; ?>"
                            href="homePage.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($activePage == 'articles') ? 'active' : ''; ?>"
                            href="allArticles.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($activePage == 'about') ? 'active' : ''; ?>"
                            href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($activePage == 'contact') ? 'active' : ''; ?>"
                            href="contact.php">Contact</a>
                    </li>
                </ul>


            </div>

        </div>
    </nav>
</header>