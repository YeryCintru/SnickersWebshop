<header>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="homePage.php">
            <img src="../Images/logo.jpg" alt="Snickers Logo" style="width: 200px; height: auto;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?= ($activePage == 'home') ? 'active' : ''; ?>" href="homePage.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= ($activePage == 'articles') ? 'active' : ''; ?>"
                        href="allArticles.php" role="button" data-bs-toggle="dropdown">
                        Shop
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="allArticles.php">All Articles</a></li>
                        <li><a class="dropdown-item" href="newArrivals.php">New Arrivals</a></li>
                        <li><a class="dropdown-item" href="streetWear.php">Street Wear</a></li>
                        <li><a class="dropdown-item" href="basketBall.php">Basketball</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($activePage == 'about') ? 'active' : ''; ?>" href="aboutus.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($activePage == 'contact') ? 'active' : ''; ?>" href="contact.php">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

</header>